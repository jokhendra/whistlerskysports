<?php

namespace App\Http\Controllers;

use App\Models\GalleryCategory;

class GalleryController extends Controller
{
    /**
     * Show the gallery page with images from database
     */
    public function index()
    {
        // Get all active images grouped by category
        $categories = GalleryCategory::with(['activeImages' => function ($query) {
            $query->orderBy('sort_order')->orderBy('created_at', 'desc');
        }])->get();
        
        // Filter out categories with no active images
        $categoriesWithImages = $categories->filter(function ($category) {
            return $category->activeImages->isNotEmpty();
        });
        
        return view('gallery', compact('categoriesWithImages'));
    }
} 