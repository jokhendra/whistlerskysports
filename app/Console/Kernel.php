<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\PromotionalEmail;
use App\Services\PromotionalMailService;
use Illuminate\Support\Facades\Log;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\SendPromotionalEmails::class,
        Commands\SetupCartSystem::class,
        Commands\GenerateSitemap::class,
        Commands\ProcessScheduledEmails::class,
    ];

    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // Process scheduled promotional emails every 15 minutes
        $schedule->command('promotional:process-scheduled')
                ->everyFifteenMinutes()
                ->withoutOverlapping()
                ->appendOutputTo(storage_path('logs/scheduler.log'));
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }

    /**
     * Process scheduled promotional emails that are due to be sent
     */
    protected function processScheduledEmails(): void
    {
        $now = now();
        
        // Get all scheduled emails that are due to be sent
        $scheduledEmails = PromotionalEmail::where('status', 'scheduled')
            ->where('scheduled_at', '<=', $now)
            ->get();
        
        if ($scheduledEmails->isEmpty()) {
            return;
        }
        
        Log::info("Processing " . $scheduledEmails->count() . " scheduled promotional emails");
        
        $mailService = app(PromotionalMailService::class);
        
        foreach ($scheduledEmails as $email) {
            try {
                $recipientEmails = $this->getRecipientEmails($email->recipient_group);
                
                if (!empty($recipientEmails)) {
                    // Queue emails for sending
                    $result = $mailService->queueEmailsForUsers(
                        $recipientEmails,
                        $email->subject,
                        $email->content
                    );
                    
                    // Update email status
                    $email->update([
                        'status' => 'sent',
                        'sent_at' => $now
                    ]);
                    
                    Log::info("Promotional email #{$email->id} processed", [
                        'subject' => $email->subject,
                        'recipient_group' => $email->recipient_group,
                        'queued' => $result['queued'],
                        'not_found' => $result['not_found']
                    ]);
                } else {
                    Log::warning("No recipients found for promotional email #{$email->id}", [
                        'recipient_group' => $email->recipient_group
                    ]);
                }
            } catch (\Exception $e) {
                Log::error("Failed to process promotional email #{$email->id}: " . $e->getMessage(), [
                    'email_id' => $email->id,
                    'exception' => $e->getMessage()
                ]);
            }
        }
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
                $contactEmails = \App\Models\Contact::whereNotNull('email')
                    ->pluck('email')
                    ->toArray();
                    
                $bookingEmails = \App\Models\Booking::whereNotNull('email')
                    ->pluck('email')
                    ->toArray();
                    
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
                    ->toArray();
                
            default:
                return [];
        }
    }
} 