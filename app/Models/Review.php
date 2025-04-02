<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'profile_picture',
        'rating',
        'feedback'
    ];

    protected $casts = [
        'rating' => 'integer',
    ];
} 