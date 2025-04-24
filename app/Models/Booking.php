<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'primary_phone',
        'timezone',
        'local_phone',
        'package',
        'flyer_details',
        'underage_flyers',
        'preferred_dates',
        'sunrise_flight',
        'video_package',
        'deluxe_package',
        'merch_package',
        'accommodation',
        'special_event',
        'additional_info',
        'waiver_pdf_path',
        'order_id',
        'payment_id',
        'payment_order_id',
        'status',
        'total_amount',
        'signature_data'
    ];

    protected $casts = [
        'preferred_dates' => 'date',
        'video_package' => 'boolean',
        'deluxe_package' => 'boolean',
        'merch_package' => 'integer',
        'total_amount' => 'decimal:2'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    /**
     * Get the payments for the booking.
     */
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
} 