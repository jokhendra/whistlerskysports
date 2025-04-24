<?php

namespace App\Notifications;

use App\Models\Booking;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class BookingProcessFailedNotification extends Notification
{
    use Queueable;

    protected $booking;
    protected $error;

    /**
     * Create a new notification instance.
     */
    public function __construct(Booking $booking, string $error)
    {
        $this->booking = $booking;
        $this->error = $error;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->error()
            ->subject('Booking Process Failed - Action Required')
            ->greeting('Warning: Booking Process Failed')
            ->line('A booking process has failed and requires immediate attention.')
            ->line('Booking Details:')
            ->line("Booking ID: {$this->booking->id}")
            ->line("Customer: {$this->booking->name}")
            ->line("Email: {$this->booking->email}")
            ->line("Package: {$this->booking->package}")
            ->line("Date: {$this->booking->preferred_dates->format('Y-m-d')}")
            ->line('Error Details:')
            ->line($this->error)
            ->action('View Booking Details', url("/admin/bookings/{$this->booking->id}"))
            ->line('Please review and process this booking manually.');
    }
} 