<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\PromotionalEmail;
use App\Services\PromotionalMailService;
use Illuminate\Support\Facades\Log;

class ProcessScheduledEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'promotional:process-scheduled';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Process all scheduled promotional emails that are due to be sent';

    /**
     * The promotional mail service.
     *
     * @var PromotionalMailService
     */
    protected $mailService;

    /**
     * Create a new command instance.
     *
     * @param PromotionalMailService $mailService
     * @return void
     */
    public function __construct(PromotionalMailService $mailService)
    {
        parent::__construct();
        $this->mailService = $mailService;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Processing scheduled promotional emails...');
        
        $now = now();
        
        // Get all scheduled emails that are due to be sent
        $scheduledEmails = PromotionalEmail::where('status', 'scheduled')
            ->where('scheduled_at', '<=', $now)
            ->get();
        
        if ($scheduledEmails->isEmpty()) {
            $this->info('No scheduled emails to process at this time.');
            return 0;
        }
        
        $this->info('Found ' . $scheduledEmails->count() . ' emails to process.');
        
        $processedCount = 0;
        $errorCount = 0;
        
        foreach ($scheduledEmails as $email) {
            $this->line('');
            $this->line('Processing email #' . $email->id . ': ' . $email->subject);
            
            try {
                $recipientEmails = $this->getRecipientEmails($email->recipient_group);
                
                if (empty($recipientEmails)) {
                    $this->warn('No recipients found for this email group: ' . $email->recipient_group);
                    continue;
                }
                
                $this->line('Sending to ' . count($recipientEmails) . ' recipients...');
                
                // Queue emails for sending
                $result = $this->mailService->queueEmailsForUsers(
                    $recipientEmails,
                    $email->subject,
                    $email->content
                );
                
                // Update email status
                $email->update([
                    'status' => 'sent',
                    'sent_at' => $now
                ]);
                
                $this->info('Email processed successfully: ' . $result['queued'] . ' emails queued for sending.');
                
                if ($result['not_found'] > 0) {
                    $this->warn($result['not_found'] . ' recipients not found.');
                }
                
                if (!empty($result['errors'])) {
                    $this->warn('Errors encountered:');
                    foreach ($result['errors'] as $error) {
                        $this->line(' - ' . $error);
                    }
                }
                
                $processedCount++;
            } catch (\Exception $e) {
                $this->error('Failed to process email #' . $email->id . ': ' . $e->getMessage());
                Log::error('Error in promotional:process-scheduled command: ' . $e->getMessage(), [
                    'email_id' => $email->id,
                    'exception' => $e
                ]);
                $errorCount++;
            }
        }
        
        $this->line('');
        $this->info('Processing completed: ' . $processedCount . ' emails processed successfully, ' . $errorCount . ' errors.');
        
        return 0;
    }
    
    /**
     * Get email addresses based on recipient group
     * 
     * @param string $group
     * @return array
     */
    protected function getRecipientEmails(string $group): array
    {
        switch ($group) {
            case 'all':
                // Get emails from both contacts and bookings
                $contactEmails = \App\Models\Contact::whereNotNull('email')->pluck('email')->toArray();
                $bookingEmails = \App\Models\Booking::whereNotNull('email')->pluck('email')->toArray();
                return array_unique(array_merge($contactEmails, $bookingEmails));
                
            case 'subscribers':
                // Get emails from contacts marked as subscribers
                return \App\Models\Contact::where('newsletter', true)
                    ->whereNotNull('email')
                    ->pluck('email')
                    ->toArray();
                
            case 'customers':
                // Get emails from bookings
                return \App\Models\Booking::whereNotNull('email')
                    ->pluck('email')
                    ->unique()
                    ->toArray();
                
            default:
                return [];
        }
    }
} 