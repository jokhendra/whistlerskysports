<?php

namespace App\Notifications;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderConfirmation extends Notification implements ShouldQueue
{
    use Queueable;

    protected $order;

    /**
     * Create a new notification instance.
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
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
        $mailMessage = (new MailMessage)
            ->subject('Order Confirmation - ' . $this->order->order_number)
            ->greeting('Thank you for your order, ' . $this->order->name . '!')
            ->line('We are pleased to confirm your order has been received and is being processed.')
            ->line('Order Number: ' . $this->order->order_number)
            ->line('Order Date: ' . $this->order->created_at->format('F j, Y, g:i A'))
            ->line('Total Amount: $' . number_format($this->order->total, 2));

        // Order items
        $mailMessage->line('Ordered Items:');
        foreach ($this->order->items as $item) {
            $mailMessage->line('- ' . $item->product_name . ' x' . $item->quantity . 
                ' ($' . number_format($item->price, 2) . ' each)');
        }

        // Shipping details
        $mailMessage->line('Shipping Details:')
            ->line($this->order->name)
            ->line($this->order->address)
            ->line($this->order->city . ', ' . ($this->order->state ? $this->order->state . ', ' : '') . 
                $this->order->postal_code)
            ->line($this->order->country);

        if ($this->order->phone) {
            $mailMessage->line('Phone: ' . $this->order->phone);
        }

        $mailMessage->action('View Your Order', url('/account/orders/' . $this->order->id))
            ->line('Thank you for shopping with Whistler Sky Sports!');

        return $mailMessage;
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'order_id' => $this->order->id,
            'order_number' => $this->order->order_number,
            'total' => $this->order->total,
            'status' => $this->order->status,
        ];
    }
}
