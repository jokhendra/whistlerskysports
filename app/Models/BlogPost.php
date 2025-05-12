<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'featured_image',
        'published',
        'published_at',
        'admin_id',
        'category',
        'tags',
        'view_count'
    ];

    protected $casts = [
        'published' => 'boolean',
        'published_at' => 'datetime',
        'tags' => 'array'
    ];

    /**
     * Get the admin who authored the blog post.
     */
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    /**
     * Get the URL for the featured image
     */
    public function getFeaturedImageUrlAttribute()
    {
        if (!$this->featured_image) {
            return null;
        }
        
        // If the URL is already fully formed, return it as is
        if (str_starts_with($this->featured_image, 'http')) {
            return $this->featured_image;
        }
        
        // Check if this is an S3 path
        if (str_starts_with($this->featured_image, 'blog/')) {
            $s3Endpoint = config('filesystems.disks.s3.url');
            return rtrim($s3Endpoint, '/') . '/' . ltrim($this->featured_image, '/');
        }
        
        // Otherwise, assume it's a local path and use asset helper
        return asset($this->featured_image);
    }

    /**
     * Get the route key for the model.
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Scope a query to only include published posts.
     */
    public function scopePublished($query)
    {
        return $query->where('published', true)
                     ->where('published_at', '<=', now());
    }

    /**
     * Scope a query to order posts by most recent first.
     */
    public function scopeRecent($query)
    {
        return $query->orderBy('published_at', 'desc');
    }

    /**
     * Increment the view count
     */
    public function incrementViewCount()
    {
        $this->increment('view_count');
        return $this;
    }
}
