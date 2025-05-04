<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class GalleryImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'image_path',
        'thumbnail_path',
        'title',
        'description',
        'sort_order',
        'is_featured',
        'is_active'
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    protected $attributes = [
        'is_featured' => false,
        'is_active' => true,
        'sort_order' => 0,
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(GalleryCategory::class);
    }

    public function getImageUrlAttribute(): string
    {
        if (config('filesystems.default') === 's3') {
            return config('filesystems.disks.s3.url') . '/' . $this->image_path;
        }
        return asset('storage/' . $this->image_path);
    }

    public function getThumbnailUrlAttribute(): string
    {
        if (!$this->thumbnail_path) {
            return $this->image_url;
        }

        if (config('filesystems.default') === 's3') {
            return config('filesystems.disks.s3.url') . '/' . $this->thumbnail_path;
        }
        return asset('storage/' . $this->thumbnail_path);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }
} 