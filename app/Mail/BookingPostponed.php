<?php

namespace App\Mail;

use App\Models\Booking;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BookingPostponed extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The booking instance.
     *
     * @var \App\Models\Booking
     */
    public $booking;

    /**
     * The original booking date.
     *
     * @var string
     */
    public $originalDate;

    /**
     * The reason for postponement.
     *
     * @var string|null
     */
    public $postponementReason;

    /**
     * Create a new message instance.
     *
     * @param  \App\Models\Booking  $booking
     * @param  string  $originalDate
     * @param  string|null  $postponementReason
     * @return void
     */
    public function __construct(Booking $booking, string $originalDate, ?string $postponementReason)
    {
        $this->booking = $booking;
        $this->originalDate = $originalDate;
        $this->postponementReason = $postponementReason;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Your Booking Has Been Rescheduled - Whistler Sky Sports',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'emails.booking-postponed',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
} 