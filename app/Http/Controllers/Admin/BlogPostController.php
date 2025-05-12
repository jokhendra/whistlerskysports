<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class BlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = BlogPost::query();
        
        // Filter by search term
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%")
                  ->orWhere('category', 'like', "%{$search}%");
            });
        }
        
        // Filter by category
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }
        
        // Filter by status
        if ($request->filled('status')) {
            if ($request->status === 'published') {
                $query->where('published', true);
            } elseif ($request->status === 'draft') {
                $query->where('published', false);
            }
        }
        
        // Get per page value from request or default to 10
        $perPage = $request->input('perPage', 10);
        $perPage = in_array($perPage, [10, 25, 50, 100]) ? $perPage : 10;
        
        $blogPosts = $query->orderBy('created_at', 'desc')->paginate($perPage)->withQueryString();
        
        return view('admin.blog-posts.index', compact('blogPosts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blog-posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'excerpt' => 'nullable|string',
            'featured_image' => 'nullable|image|max:2048',
            'category' => 'nullable|string|max:255',
            'tags' => 'nullable|string',
            'published' => 'boolean',
        ]);

        // Generate slug from title
        $slug = Str::slug($request->title);
        $originalSlug = $slug;
        $count = 1;
        
        // Ensure slug is unique
        while (BlogPost::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }

        // Handle featured image upload to S3
        $featuredImagePath = null;
        if ($request->hasFile('featured_image')) {
            try {
                $file = $request->file('featured_image');
                $filename = 'blog_' . time() . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();
                $path = 'blog/' . $filename;
                
                // Upload to S3 using put() instead of putFileAs() to avoid ACL issues
                Storage::disk('s3')->put($path, file_get_contents($file));
                
                // Store just the path
                $featuredImagePath = $path;
                
                Log::info('Uploaded blog featured image to S3: ' . $path);
            } catch (\Exception $e) {
                Log::error('S3 Upload Error for blog image: ' . $e->getMessage());
                return redirect()->back()->with('error', 'Error uploading image to S3: ' . $e->getMessage())->withInput();
            }
        }

        // Process tags
        $tags = [];
        if ($request->filled('tags')) {
            $tagString = $request->tags;
            $tags = array_map('trim', explode(',', $tagString));
        }

        // Create blog post
        $blogPost = new BlogPost([
            'title' => $request->title,
            'slug' => $slug,
            'excerpt' => $request->excerpt,
            'content' => $request->content,
            'featured_image' => $featuredImagePath,
            'category' => $request->category,
            'tags' => $tags,
            'published' => $request->published ? true : false,
            'published_at' => $request->published ? now() : null,
            'admin_id' => Auth::guard('admin')->id(),
        ]);

        $blogPost->save();

        return redirect()->route('admin.blog-posts.index')
            ->with('success', 'Blog post created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(BlogPost $blogPost)
    {
        return view('admin.blog-posts.show', compact('blogPost'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BlogPost $blogPost)
    {
        return view('admin.blog-posts.edit', compact('blogPost'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BlogPost $blogPost)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'excerpt' => 'nullable|string',
            'featured_image' => 'nullable|image|max:2048',
            'category' => 'nullable|string|max:255',
            'tags' => 'nullable|string',
            'published' => 'boolean',
        ]);

        // Handle featured image upload if new image provided
        if ($request->hasFile('featured_image')) {
            try {
                // Upload new image to S3
                $file = $request->file('featured_image');
                $filename = 'blog_' . time() . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();
                $path = 'blog/' . $filename;
                
                // Upload to S3 using put() instead of putFileAs() to avoid ACL issues
                Storage::disk('s3')->put($path, file_get_contents($file));
                
                // Delete old image from S3 if it exists
                $oldImagePath = $blogPost->featured_image;
                if ($oldImagePath && str_starts_with($oldImagePath, 'blog/')) {
                    try {
                        Storage::disk('s3')->delete($oldImagePath);
                        Log::info('Deleted old blog image from S3: ' . $oldImagePath);
                    } catch (\Exception $e) {
                        Log::warning('Failed to delete old blog image from S3: ' . $e->getMessage());
                    }
                }
                
                // Update the image path in the model
                $blogPost->featured_image = $path;
                
                Log::info('Updated blog featured image on S3: ' . $path);
            } catch (\Exception $e) {
                Log::error('S3 Upload Error for blog image update: ' . $e->getMessage());
                return redirect()->back()->with('error', 'Error uploading image to S3: ' . $e->getMessage())->withInput();
            }
        }

        // Process tags
        if ($request->filled('tags')) {
            $tagString = $request->tags;
            $tags = array_map('trim', explode(',', $tagString));
            $blogPost->tags = $tags;
        } else {
            $blogPost->tags = [];
        }

        // Check if publishing status changed
        $wasPublished = $blogPost->published;
        $isPublished = $request->published ? true : false;
        
        // Update published_at timestamp if newly published
        if (!$wasPublished && $isPublished) {
            $blogPost->published_at = now();
        }

        // Update other blog post details
        $blogPost->title = $request->title;
        $blogPost->excerpt = $request->excerpt;
        $blogPost->content = $request->content;
        $blogPost->category = $request->category;
        $blogPost->published = $isPublished;
        
        $blogPost->save();

        return redirect()->route('admin.blog-posts.index')
            ->with('success', 'Blog post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BlogPost $blogPost)
    {
        // Delete image from S3 if it exists
        $imagePath = $blogPost->featured_image;
        if ($imagePath && str_starts_with($imagePath, 'blog/')) {
            try {
                Storage::disk('s3')->delete($imagePath);
                Log::info('Deleted blog image from S3 during blog post deletion: ' . $imagePath);
            } catch (\Exception $e) {
                Log::warning('Failed to delete blog image from S3 during blog post deletion: ' . $e->getMessage());
            }
        }
        
        $blogPost->delete();

        return redirect()->route('admin.blog-posts.index')
            ->with('success', 'Blog post deleted successfully');
    }
    
    /**
     * Toggle published status.
     */
    public function togglePublished(BlogPost $blogPost)
    {
        $blogPost->published = !$blogPost->published;
        
        // Set published_at timestamp if newly published
        if ($blogPost->published && !$blogPost->published_at) {
            $blogPost->published_at = now();
        }
        
        $blogPost->save();

        return redirect()->back()->with('success', 'Published status updated');
    }
}
