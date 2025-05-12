<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'category',
        'featured',
        'badge',
        'stock'
    ];

    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

    /**
     * Get the images for this product.
     */
    public function images()
    {
        return $this->hasMany(ProductImage::class)->orderBy('sort_order');
    }

    /**
     * Get the primary image for this product.
     */
    public function primaryImage()
    {
        return $this->hasOne(ProductImage::class)->where('is_primary', true);
    }

    /**
     * Get all images or default to main image if no additional images.
     */
    public function getAllImages()
    {
        $images = $this->images;
        
        if ($images->isEmpty()) {
            // If no additional images, create a default one from the main image
            return collect([
                (object)[
                    'id' => 0,
                    'product_id' => $this->id,
                    'image_url' => $this->image,
                    'alt_text' => $this->name,
                    'sort_order' => 0,
                    'is_primary' => true
                ]
            ]);
        }
        
        return $images;
    }

    /**
     * Get the image URL, ensuring it's properly formatted for S3.
     */
    public function getImageAttribute($value)
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
