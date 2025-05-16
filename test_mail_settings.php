<?php
// This file should be placed in your Laravel project root
// Run it with: php test_mail_settings.php

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Message;

echo "Testing mail settings...\n";

// Current settings
echo "Current mail settings:\n";
echo "MAIL_MAILER: " . config('mail.default') . "\n";
echo "MAIL_HOST: " . config('mail.mailers.smtp.host') . "\n";
echo "MAIL_PORT: " . config('mail.mailers.smtp.port') . "\n";
echo "MAIL_ENCRYPTION: " . config('mail.mailers.smtp.encryption') . "\n";
echo "MAIL_USERNAME: " . config('mail.mailers.smtp.username') . "\n";
echo "MAIL_FROM_ADDRESS: " . config('mail.from.address') . "\n";
echo "MAIL_FROM_NAME: " . config('mail.from.name') . "\n\n";

// Test sending a simple email
try {
    $recipient = 'your-test-email@example.com'; // Replace with your email
    
    echo "Attempting to send test email to $recipient...\n";
    
    Mail::raw('This is a test email to verify your mail settings are working correctly.', function (Message $message) use ($recipient) {
        $message->to($recipient)
            ->subject('Laravel Mail Test');
    });
    
    echo "Test email was sent successfully! Check your inbox.\n";
} catch (\Exception $e) {
    echo "Error sending email: " . $e->getMessage() . "\n";
    
    // Provide troubleshooting advice
    echo "\nTROUBLESHOOTING TIPS:\n";
    echo "1. Try changing MAIL_PORT from 465 to 587 and MAIL_ENCRYPTION from 'ssl' to 'tls'\n";
    echo "2. Verify your GoDaddy email credentials are correct\n";
    echo "3. Check if your server's outgoing connections on these ports are blocked\n";
    echo "4. Consider using a different mail provider like Mailtrap, SendGrid, or Gmail\n";
    
    echo "\nTo change your mail settings, update your .env file with these values for TLS:\n";
    echo "MAIL_MAILER=smtp\n";
    echo "MAIL_HOST=smtpout.secureserver.net\n";
    echo "MAIL_PORT=587\n";
    echo "MAIL_ENCRYPTION=tls\n";
    echo "MAIL_USERNAME=\"info@whistlerskysports.ca\"\n";
    echo "MAIL_PASSWORD=\"your-password\"\n";
} 