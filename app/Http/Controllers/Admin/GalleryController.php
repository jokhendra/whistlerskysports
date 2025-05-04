<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryCategory;
use App\Models\GalleryImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $query = GalleryImage::with('category')
            ->when($request->filled('category'), function($q) use ($request) {
                return $q->where('category_id', $request->category);
            })
            ->when($request->filled('status'), function($q) use ($request) {
                if ($request->status === 'active') {
                    return $q->active();
                } elseif ($request->status === 'inactive') {
                    return $q->where('is_active', false);
                }
            })
            ->when($request->filled('featured'), function($q) use ($request) {
                return $q->featured();
            })
            ->orderBy('sort_order')
            ->orderBy('created_at', 'desc');

        $images = $query->paginate(20)->withQueryString();
        $categories = GalleryCategory::withCount('images')->get();
            
        return view('admin.gallery.index', compact('images', 'categories'));
    }

    public function create()
    {
        $categories = GalleryCategory::all();
        return view('admin.gallery.create', compact('categories'));
    }

    public function store(Request $request)
    {
        try {
            Log::info('Request data:', $request->all());
            
            $validated = $request->validate([
                'category_id' => 'required|exists:gallery_categories,id',
                'images' => 'required|array',
                'images.*' => 'required|file|image|mimes:jpeg,png,jpg,gif|max:10240', // Increased to 10MB
                'title' => 'required|string|max:255',
                'description' => 'nullable|string',
                'is_featured' => 'boolean',
                'is_active' => 'boolean'
            ], [
                'images.required' => 'Please select at least one image to upload.',
                'images.array' => 'Invalid image format.',
                'images.*.required' => 'Each image is required.',
                'images.*.file' => 'The uploaded file is invalid.',
                'images.*.image' => 'The file must be an image.',
                'images.*.mimes' => 'Only jpeg, png, jpg and gif images are allowed.',
                'images.*.max' => 'Image size should not be greater than 10MB.',
                'category_id.required' => 'Please select a category.',
                'category_id.exists' => 'The selected category does not exist.',
                'title.required' => 'Please provide a title for the image.',
                'title.max' => 'Title should not exceed 255 characters.'
            ]);

            if (!$request->hasFile('images')) {
                throw new \Exception('No images were uploaded.');
            }

            foreach ($request->file('images') as $image) {
                if (!$image || !$image->isValid()) {
                    Log::error('Invalid file in request', ['error' => $image ? $image->getErrorMessage() : 'File is null']);
                    continue;
                }

                try {
                    $filename = 'gallery_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
                    $path = 'gallery/' . $filename;

                    // Store file using Laravel's storage facade
                    Storage::disk('s3')->putFileAs(
                        'gallery',
                        $image,
                        $filename
                    );

                    GalleryImage::create([
                        'category_id' => $validated['category_id'],
                        'image_path' => $path,
                        'title' => $validated['title'] ?? $filename,
                        'description' => $validated['description'] ?? null,
                        'is_featured' => $request->boolean('is_featured', false),
                        'is_active' => $request->boolean('is_active', true),
                        'sort_order' => GalleryImage::max('sort_order') + 1
                    ]);

                    Log::info('Image uploaded successfully', ['path' => $path]);
                } catch (\Exception $e) {
                    Log::error('Failed to process image', [
                        'error' => $e->getMessage(),
                        'file' => $image->getClientOriginalName()
                    ]);
                    throw new \Exception('Failed to upload image: ' . $image->getClientOriginalName());
                }
            }

            return redirect()->route('admin.gallery.index')->with('success', 'Images uploaded successfully');
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::warning('Validation error in store method: ' . json_encode($e->errors()));
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            Log::error('Error in store method: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Error uploading images: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function edit(GalleryImage $image)
    {
        $categories = GalleryCategory::all();
        return view('admin.gallery.edit', compact('image', 'categories'));
    }

    public function update(Request $request, GalleryImage $image)
    {
        $request->validate([
            'category_id' => 'required|exists:gallery_categories,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'new_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('new_image')) {
            // Delete old image
            if ($image->image_path) {
                Storage::disk('s3')->delete($image->image_path);
            }

            // Upload new image
            $file = $request->file('new_image');
            $filename = 'gallery_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $path = 'gallery/' . $filename;

            // Upload file without ACL
            Storage::disk('s3')->put($path, file_get_contents($file));

            $image->image_path = $path;
        }

        $image->category_id = $request->category_id;
        $image->title = $request->title;
        $image->description = $request->description;
        $image->is_featured = $request->boolean('is_featured', false);
        $image->is_active = $request->boolean('is_active', true);
        $image->save();

        return redirect()->route('admin.gallery.index')->with('success', 'Image updated successfully');
    }

    public function destroy(GalleryImage $image)
    {
        // Delete image
        if ($image->image_path) {
            Storage::disk('s3')->delete($image->image_path);
        }
        
        $image->delete();
        return redirect()->route('admin.gallery.index')->with('success', 'Image deleted successfully');
    }

    public function updateOrder(Request $request)
    {
        $request->validate([
            'images' => 'required|array',
            'images.*.id' => 'required|exists:gallery_images,id',
            'images.*.order' => 'required|integer|min:0'
        ]);

        foreach ($request->images as $imageData) {
            GalleryImage::where('id', $imageData['id'])->update(['sort_order' => $imageData['order']]);
        }

        return response()->json(['message' => 'Order updated successfully']);
    }

    public function categories()
    {
        $categories = GalleryCategory::withCount('images')->get();
        return view('admin.gallery.categories', compact('categories'));
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:gallery_categories,name'
        ]);

        GalleryCategory::create([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return redirect()->route('admin.gallery.categories')->with('success', 'Category created successfully');
    }

    public function updateCategory(Request $request, GalleryCategory $category)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:gallery_categories,name,' . $category->id
        ]);

        $category->update([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return redirect()->route('admin.gallery.categories')->with('success', 'Category updated successfully');
    }

    public function destroyCategory(GalleryCategory $category)
    {
        // Delete all images in this category
        foreach ($category->images as $image) {
            if ($image->image_path) {
                Storage::disk('s3')->delete($image->image_path);
            }
            $image->delete();
        }

        $category->delete();
        return redirect()->route('admin.gallery.categories')->with('success', 'Category and all its images deleted successfully');
    }
} 