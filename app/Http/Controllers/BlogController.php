<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        // Since middleware method may not be available in the controller,
        // we'll handle this in routes instead
    }
    
    /**
     * Display a listing of blog posts.
     */
    public function index(Request $request)
    {
        $query = BlogPost::published()->recent();
        
        // Filter by category
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }
        
        // Filter by tag
        if ($request->filled('tag')) {
            $tag = $request->tag;
            $query->whereJsonContains('tags', $tag);
        }
        
        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%")
                  ->orWhere('excerpt', 'like', "%{$search}%");
            });
        }
        
        $blogPosts = $query->paginate(9)->withQueryString();
        
        // Get all categories for filter
        $categories = BlogPost::published()
            ->select('category')
            ->distinct()
            ->whereNotNull('category')
            ->pluck('category');
        
        // Get all tags for filter with usage count
        $tags = BlogPost::published()
            ->whereNotNull('tags')
            ->get()
            ->pluck('tags')
            ->flatten()
            ->countBy()
            ->sortDesc()
            ->take(15)
            ->keys();
        
        // Get popular posts for sidebar
        $popularPosts = BlogPost::published()
            ->orderBy('view_count', 'desc')
            ->limit(5)
            ->get();
        
        // Get recent posts for sidebar
        $recentPosts = BlogPost::published()
            ->orderBy('published_at', 'desc')
            ->limit(5)
            ->get();
            
        return view('mad-mr-bert.blog', compact('blogPosts', 'categories', 'tags', 'popularPosts', 'recentPosts'));
    }

    /**
     * Display the specified blog post.
     * This route will be protected by auth middleware in routes file.
     */
    public function show($slug)
    {
        $blogPost = BlogPost::published()
            ->where('slug', $slug)
            ->firstOrFail();
        
        // Increment view count
        $blogPost->incrementViewCount();
        
        // Get related posts based on category or tags
        $relatedPosts = BlogPost::published()
            ->where('id', '!=', $blogPost->id)
            ->where(function($query) use ($blogPost) {
                if ($blogPost->category) {
                    $query->where('category', $blogPost->category);
                }
                if (!empty($blogPost->tags)) {
                    foreach ($blogPost->tags as $tag) {
                        $query->orWhereJsonContains('tags', $tag);
                    }
                }
            })
            ->orderBy('published_at', 'desc')
            ->limit(3)
            ->get();
            
        // Get popular posts for sidebar
        $popularPosts = BlogPost::published()
            ->where('id', '!=', $blogPost->id)
            ->orderBy('view_count', 'desc')
            ->limit(5)
            ->get();
            
        // Get next and previous posts for navigation
        $nextPost = BlogPost::published()
            ->where('published_at', '>', $blogPost->published_at)
            ->orderBy('published_at', 'asc')
            ->first();
            
        $prevPost = BlogPost::published()
            ->where('published_at', '<', $blogPost->published_at)
            ->orderBy('published_at', 'desc')
            ->first();
        
        return view('mad-mr-bert.blog-post', compact(
            'blogPost', 
            'relatedPosts', 
            'popularPosts', 
            'nextPost', 
            'prevPost'
        ));
    }
    
    /**
     * Display a preview of the blog post (no auth required)
     */
    public function preview($slug)
    {
        // If user is already authenticated, redirect to the full blog post
        if (Auth::check()) {
            return redirect()->route('mad-mr-bert.blog.show', $slug);
        }
        
        $blogPost = BlogPost::published()
            ->where('slug', $slug)
            ->firstOrFail();
            
        return view('mad-mr-bert.blog-post-preview', compact('blogPost'));
    }
}
