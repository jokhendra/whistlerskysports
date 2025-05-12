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
        'media_upload',
        'flight_date',
        'aircraft_type',
        'instructor_rating',
        'fun_rating',
        'safety_rating',
        'likelihood',
        'has_social_media',
        'feedback',
        'status',
        'rating'
    ];

    protected $casts = [
        'instructor_rating' => 'integer',
        'fun_rating' => 'integer',
        'safety_rating' => 'integer',
        'likelihood' => 'integer',
        'rating' => 'integer',
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

    /**
     * Get the URL for the uploaded media (photo or video)
     */
    public function getMediaUrlAttribute()
    {
        if (!$this->media_upload) {
            return null;
        }

        try {
            // Check if file is stored locally
            if (strpos($this->media_upload, 'local/') === 0) {
                $localPath = str_replace('local/', '', $this->media_upload);
                return url('storage/' . $localPath);
            }
            
            // Otherwise assume it's in S3
            $baseUrl = env('AWS_URL', 'https://whistlerskysports.s3.us-west-1.amazonaws.com');
            return rtrim($baseUrl, '/') . '/' . ltrim($this->media_upload, '/');
        } catch (\Exception $e) {
            Log::error('Failed to get media URL: ' . $e->getMessage());
            return null;
        }
    }
    
    /**
     * Determine if the media is a video
     */
    public function getIsVideoAttribute()
    {
        if (!$this->media_upload) {
            return false;
        }
        
        $videoExtensions = ['mp4', 'mov', 'avi'];
        $extension = pathinfo($this->media_upload, PATHINFO_EXTENSION);
        
        return in_array(strtolower($extension), $videoExtensions);
    }
    
    /**
     * Determine if the media is an image
     */
    public function getIsImageAttribute()
    {
        if (!$this->media_upload) {
            return false;
        }
        
        $imageExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        $extension = pathinfo($this->media_upload, PATHINFO_EXTENSION);
        
        return in_array(strtolower($extension), $imageExtensions);
    }
} 