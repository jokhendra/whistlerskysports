<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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
        'signature_data',
        'ip_address',
        'user_agent',
        'flying_status',
        'flying_time',
        'date_of_birth',
        'weight',
        'emergency_name',
        'emergency_relationship',
        'emergency_phone',
        'cancellation_reason'
    ];

    protected $casts = [
        'preferred_dates' => 'date',
        'video_package' => 'boolean',
        'deluxe_package' => 'boolean',
        'merch_package' => 'integer',
        'total_amount' => 'decimal:2',
        'date_of_birth' => 'date',
        'weight' => 'integer'
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
    
    /**
     * Get the URL for the waiver PDF.
     * 
     * @return string|null
     */
    public function getWaiverPdfUrlAttribute()
    {
        if (!$this->waiver_pdf_path) {
            return null;
        }
        
        // If the URL is already fully formed, return it as is
        if (str_starts_with($this->waiver_pdf_path, 'http')) {
            return $this->waiver_pdf_path;
        }
        
        // Check if this is available in S3
        try {
            if (Storage::disk('s3')->exists($this->waiver_pdf_path)) {
                // Use direct S3 URL construction similar to Product model
                $s3Endpoint = config('filesystems.disks.s3.url');
                $s3Url = rtrim($s3Endpoint, '/') . '/' . ltrim($this->waiver_pdf_path, '/');
                return $s3Url;
            }
        } catch (\Exception $e) {
            // Log the error if needed
            // \Log::error('Error accessing S3 for waiver PDF: ' . $e->getMessage());
        }
        
        // Fall back to local storage
        return asset('storage/' . $this->waiver_pdf_path);
    }
} 