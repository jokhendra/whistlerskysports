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
} 