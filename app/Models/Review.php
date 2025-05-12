<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'profile_picture',
        'flight_date',
        'aircraft_type',
        'instructor_rating',
        'fun_rating',
        'safety_rating',
        'likelihood',
        'has_social_media',
        'feedback'
    ];

    protected $casts = [
        'instructor_rating' => 'integer',
        'fun_rating' => 'integer',
        'safety_rating' => 'integer',
        'likelihood' => 'integer',
        'aircraft_type' => 'array',
        'flight_date' => 'date',
    ];

    /**
     * Get the URL for the profile picture
     */
    public function getImageUrlAttribute()
    {
        if (!$this->profile_picture) {
            return null;
        }

        try {
            // Get the base URL from environment
            $baseUrl = env('AWS_URL', 'https://whistlerskysports.s3.us-west-1.amazonaws.com');
            
            // Return the complete URL without duplicating bucket name
            return rtrim($baseUrl, '/') . '/' . ltrim($this->profile_picture, '/');
        } catch (\Exception $e) {
            Log::error('Failed to get image URL: ' . $e->getMessage());
            return null;
        }
    }
} 