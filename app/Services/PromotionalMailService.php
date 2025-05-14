<?php

namespace App\Services;

use App\Models\Contact;
use App\Models\Booking;
use Illuminate\Support\Facades\Mail;
use App\Mail\PromotionalMail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Queue;

class PromotionalMailService
{
    /**
     * Queue promotional emails for specific users
     *
     * @param array $emails
     * @param string $subject
     * @param string $content
     * @return array
     */
    public function queueEmailsForUsers(array $emails, string $subject, string $content)
    {
        $results = [
            'queued' => 0,
            'not_found' => 0,
            'errors' => []
        ];

        foreach ($emails as $email) {
            try {
                // Find user details from contacts
                $contact = Contact::where('email', $email)->first();
                
                // If not found in contacts, check bookings
                if (!$contact) {
                    $booking = Booking::where('email', $email)->first();
                    if ($booking) {
                        $contact = (object)[
                            'name' => $booking->name,
                            'email' => $booking->email
                        ];
                    }
                }

                if ($contact) {
                    // Queue the email
                    Queue::push(function () use ($contact, $subject, $content) {
                        Mail::to($contact->email)
                            ->send(new PromotionalMail([
                                'subject' => $subject,
                                'content' => $content,
                                'name' => $contact->name
                            ]));
                    });

                    $results['queued']++;
                } else {
                    $results['not_found']++;
                    $results['errors'][] = "User not found for email: {$email}";
                }
            } catch (\Exception $e) {
                $results['errors'][] = "Error processing {$email}: " . $e->getMessage();
                Log::error("Failed to queue email for {$email}: " . $e->getMessage());
            }
        }

        return $results;
    }
    
    /**
     * Send a single test promotional email
     *
     * @param string $email
     * @param string $subject
     * @param string $content
     * @return bool
     */
    public function sendTestEmail(string $email, string $subject, string $content): bool
    {
        try {
            Mail::to($email)
                ->send(new PromotionalMail([
                    'subject' => $subject,
                    'content' => $content,
                    'name' => 'Test Recipient'
                ]));
                
            return true;
        } catch (\Exception $e) {
            Log::error("Failed to send test email to {$email}: " . $e->getMessage());
            return false;
        }
    }
} 