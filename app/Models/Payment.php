<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Payment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'booking_id',
        'provider',
        'order_id',
        'payment_id',
        'payment_order_id',
        'amount',
        'currency',
        'status',
        'is_refunded',
        'refund_amount',
        'refund_date',
        'payer_email',
        'payer_name',
        'payer_id',
        'provider_response',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'amount' => 'decimal:2',
        'refund_amount' => 'decimal:2',
        'is_refunded' => 'boolean',
        'refund_date' => 'datetime',
        'provider_response' => 'array',
    ];

    /**
     * Get the booking that owns the payment.
     */
    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
    
    /**
     * Process a refund for this payment
     * 
     * @param float $amount The amount to refund (defaults to full amount)
     * @param array $refundDetails Additional details about the refund
     * @return bool Whether the refund was successful
     */
    public function refund($amount = null, $refundDetails = [])
    {
        try {
            // If no amount specified, refund the full amount
            $refundAmount = $amount ?? $this->amount;
            
            // Update the payment record with refund information
            $this->update([
                'is_refunded' => true,
                'refund_amount' => $refundAmount,
                'refund_date' => now(),
                'provider_response' => array_merge(
                    $this->provider_response ?? [], 
                    ['refund' => array_merge(['amount' => $refundAmount], $refundDetails)]
                )
            ]);
            
            Log::info('Payment refunded', [
                'payment_id' => $this->id,
                'booking_id' => $this->booking_id,
                'amount' => $refundAmount,
                'refund_details' => $refundDetails
            ]);
            
            return true;
        } catch (\Exception $e) {
            Log::error('Failed to process refund: ' . $e->getMessage());
            return false;
        }
    }
} 