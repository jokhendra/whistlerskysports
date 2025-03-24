<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\PromotionalMailService;

class SendPromotionalEmails extends Command
{
    protected $signature = 'promotional:send {subject} {content} {--emails=*}';
    protected $description = 'Send promotional emails to specified users';

    protected $promotionalMailService;

    public function __construct(PromotionalMailService $promotionalMailService)
    {
        parent::__construct();
        $this->promotionalMailService = $promotionalMailService;
    }

    public function handle()
    {
        $subject = $this->argument('subject');
        $content = $this->argument('content');
        $emails = $this->option('emails');

        if (empty($emails)) {
            $this->error('Please provide at least one email address using --emails option');
            return 1;
        }

        $this->info('Starting to queue promotional emails...');
        $this->info('Emails to process: ' . implode(', ', $emails));

        try {
            $results = $this->promotionalMailService->queueEmailsForUsers($emails, $subject, $content);

            $this->info("\nEmail queueing completed:");
            $this->info("Successfully queued: {$results['queued']}");
            $this->info("Users not found: {$results['not_found']}");

            if (!empty($results['errors'])) {
                $this->error("\nErrors encountered:");
                foreach ($results['errors'] as $error) {
                    $this->error($error);
                }
            }

            $this->info("\nNote: Emails will be processed by the queue worker. Make sure queue worker is running.");
        } catch (\Exception $e) {
            $this->error('Failed to queue promotional emails: ' . $e->getMessage());
        }
    }
} 