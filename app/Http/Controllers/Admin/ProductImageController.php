<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class ProductImageController extends Controller
{
    /**
     * Display a listing of images for a product.
     */
    public function index($productId)
    {
        $product = Product::with('images')->findOrFail($productId);
        return view('admin.product-images.index', compact('product'));
    }

    /**
     * Show the form for creating a new product image.
     */
    public function create($productId)
    {
        $product = Product::findOrFail($productId);
        return view('admin.product-images.create', compact('product'));
    }

    /**
     * Store a newly created product image.
     */
    public function store(Request $request, $productId)
    {
        $request->validate([
            'image' => 'required|image|max:2048',
            'alt_text' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
            'is_primary' => 'nullable|boolean'
        ]);
        
        $product = Product::findOrFail($productId);
        
        // Handle image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = 'product_' . $product->id . '_' . time() . '.' . $file->getClientOriginalExtension();
            $path = 'products/' . $filename;
            
            try {
                // Upload to S3 using put() instead of putFileAs() to avoid ACL issues
                Storage::disk('s3')->put($path, file_get_contents($file));
                
                // Store just the path instead of full URL for better portability
                // This will be converted to a full URL by the accessor in the model
                
                // If this is marked as primary, remove primary flag from other images
                if ($request->has('is_primary') && $request->is_primary) {
                    ProductImage::where('product_id', $product->id)
                        ->where('is_primary', true)
                        ->update(['is_primary' => false]);
                }
                
                // Create product image
                $image = new ProductImage([
                    'product_id' => $product->id,
                    'image_url' => $path, // Just store the path, not full URL
                    'alt_text' => $request->alt_text ?? $product->name,
                    'sort_order' => $request->sort_order ?? 0,
                    'is_primary' => $request->has('is_primary') ? $request->is_primary : false
                ]);
                
                $image->save();
                
                // If this is the first image and no primary image exists, make it primary
                $primaryExists = ProductImage::where('product_id', $product->id)
                    ->where('is_primary', true)
                    ->exists();
                    
                if (!$primaryExists) {
                    $image->is_primary = true;
                    $image->save();
                }
                
                return redirect()->route('admin.products.images.index', $product->id)
                    ->with('success', 'Product image added successfully and uploaded to S3');
            } catch (\Exception $e) {
                Log::error('S3 Upload Error: ' . $e->getMessage());
                return redirect()->back()->with('error', 'Error uploading to S3: ' . $e->getMessage());
            }
        }
        
        return redirect()->back()->with('error', 'No image was uploaded');
    }

    /**
     * Show the form for editing the specified product image.
     */
    public function edit($productId, $imageId)
    {
        $product = Product::findOrFail($productId);
        $image = ProductImage::findOrFail($imageId);
        
        return view('admin.product-images.edit', compact('product', 'image'));
    }

    /**
     * Update the specified product image.
     */
    public function update(Request $request, $productId, $imageId)
    {
        $request->validate([
            'image' => 'nullable|image|max:2048',
            'alt_text' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
            'is_primary' => 'nullable|boolean'
        ]);
        
        $product = Product::findOrFail($productId);
        $image = ProductImage::findOrFail($imageId);
        
        // Handle new image upload if provided
        if ($request->hasFile('image')) {
            try {
                $file = $request->file('image');
                $filename = 'product_' . $product->id . '_' . time() . '.' . $file->getClientOriginalExtension();
                $path = 'products/' . $filename;
                
                // Upload to S3 using put() instead of putFileAs() to avoid ACL issues
                Storage::disk('s3')->put($path, file_get_contents($file));
                
                // Get the old image path by extracting it from the URL if it's a full URL
                $oldPath = $image->image_url;
                if (str_starts_with($oldPath, 'http')) {
                    // Extract just the path part after the domain
                    $s3Endpoint = config('filesystems.disks.s3.url');
                    $oldPath = str_replace($s3Endpoint . '/', '', $oldPath);
                }
                
                // Delete the old image from S3 if it exists and is an S3 path
                if ($oldPath && str_starts_with($oldPath, 'products/')) {
                    try {
                        Storage::disk('s3')->delete($oldPath);
                        Log::info('Deleted old image from S3: ' . $oldPath);
                    } catch (\Exception $e) {
                        Log::warning('Failed to delete old image from S3: ' . $e->getMessage());
                    }
                }
                
                // Update the image path - accessor in model will convert to URL when accessed
                $image->image_url = $path;
            } catch (\Exception $e) {
                Log::error('S3 Upload Error: ' . $e->getMessage());
                return redirect()->back()->with('error', 'Error uploading to S3: ' . $e->getMessage());
            }
        }
        
        // If this is marked as primary, remove primary flag from other images
        if ($request->has('is_primary') && $request->is_primary && !$image->is_primary) {
            ProductImage::where('product_id', $product->id)
                ->where('is_primary', true)
                ->update(['is_primary' => false]);
        }
        
        // Update other fields
        $image->alt_text = $request->alt_text ?? $image->alt_text;
        $image->sort_order = $request->sort_order ?? $image->sort_order;
        $image->is_primary = $request->has('is_primary') ? $request->is_primary : $image->is_primary;
        $image->save();
        
        return redirect()->route('admin.products.images.index', $product->id)
            ->with('success', 'Product image updated successfully');
    }

    /**
     * Remove the specified product image.
     */
    public function destroy($productId, $imageId)
    {
        $image = ProductImage::findOrFail($imageId);
        
        // Get the image path
        $path = $image->image_url;
        
        // If this is a full URL, extract just the path part
        if (str_starts_with($path, 'http')) {
            $s3Endpoint = config('filesystems.disks.s3.url');
            $path = str_replace($s3Endpoint . '/', '', $path);
        }
        
        // Delete the image from S3 if it's an S3 path
        if ($path && str_starts_with($path, 'products/')) {
            try {
                Storage::disk('s3')->delete($path);
                Log::info('Deleted image from S3: ' . $path);
            } catch (\Exception $e) {
                Log::warning('Failed to delete image from S3: ' . $e->getMessage());
            }
        }
        
        // Check if it's a primary image
        $isPrimary = $image->is_primary;
        
        // Delete the image
        $image->delete();
        
        // If it was a primary image, set another image as primary if available
        if ($isPrimary) {
            $newPrimary = ProductImage::where('product_id', $productId)->first();
            if ($newPrimary) {
                $newPrimary->is_primary = true;
                $newPrimary->save();
            }
        }
        
        return redirect()->route('admin.products.images.index', $productId)
            ->with('success', 'Product image deleted successfully');
    }
    
    /**
     * Set a product image as primary.
     */
    public function setPrimary($productId, $imageId)
    {
        // Remove primary flag from all images of this product
        ProductImage::where('product_id', $productId)
            ->update(['is_primary' => false]);
        
        // Set this image as primary
        $image = ProductImage::findOrFail($imageId);
        $image->is_primary = true;
        $image->save();
        
        return redirect()->route('admin.products.images.index', $productId)
            ->with('success', 'Primary image updated successfully');
    }
    
    /**
     * Reorder product images.
     */
    public function reorder(Request $request, $productId)
    {
        $request->validate([
            'images' => 'required|array',
            'images.*' => 'required|integer|exists:product_images,id'
        ]);
        
        $order = $request->images;
        
        foreach ($order as $index => $imageId) {
            ProductImage::where('id', $imageId)
                ->update(['sort_order' => $index]);
        }
        
        return response()->json(['success' => true]);
    }
}
