<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class ProductImage extends Model
{
    protected $fillable = [
        'product_id',
        'image_url',
        'alt_text',
        'sort_order',
        'is_primary'
    ];

    /**
     * Get the product that owns the image.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    
    /**
     * Get the image URL, ensuring it's properly formatted for S3.
     */
    public function getImageUrlAttribute($value)
    {
        if (!$value) {
            return null;
        }
        
        // If the URL is already fully formed, return it as is
        if (str_starts_with($value, 'http')) {
            return $value;
        }
        
        // Check if this is an S3 path (assuming paths with 'products/' are S3)
        if (str_starts_with($value, 'products/')) {
            $s3Endpoint = config('filesystems.disks.s3.url');
            return rtrim($s3Endpoint, '/') . '/' . ltrim($value, '/');
        }
        
        // Otherwise, assume it's a local path and use asset helper
        return asset($value);
    }
}
