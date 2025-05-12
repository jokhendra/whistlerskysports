<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the products.
     */
    public function index(Request $request)
    {
        $query = Product::query();
        
        // Filter by search term
        if($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('category', 'like', "%{$search}%");
            });
        }
        
        // Filter by category
        if($request->filled('category')) {
            $query->where('category', $request->category);
        }
        
        // Filter by stock status
        if($request->stock === 'in_stock') {
            $query->where('stock', '>', 0);
        } elseif($request->stock === 'low_stock') {
            $query->where('stock', '>', 0)->where('stock', '<', 5);
        } elseif($request->stock === 'out_of_stock') {
            $query->where('stock', 0);
        }
        
        $products = $query->orderBy('created_at', 'desc')->paginate(10)->withQueryString();
        
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new product.
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created product in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'required|image|max:2048',
            'category' => 'required|string|max:255',
            'stock' => 'required|integer|min:0',
            'featured' => 'boolean',
            'badge' => 'nullable|string|max:255',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = 'product_' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('products', $filename, 'public');
            $imageUrl = Storage::url($path);
        } else {
            $imageUrl = null;
        }

        // Create product
        $product = new Product([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imageUrl,
            'category' => $request->category,
            'stock' => $request->stock,
            'featured' => $request->featured ? true : false,
            'badge' => $request->badge,
        ]);

        $product->save();

        return redirect()->route('admin.products.merchandise')
            ->with('success', 'Product created successfully');
    }

    /**
     * Display the specified product.
     */
    public function show($id)
    {
        $product = Product::with('images')->findOrFail($id);
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified product.
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified product in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|max:2048',
            'category' => 'required|string|max:255',
            'stock' => 'required|integer|min:0',
            'featured' => 'boolean',
            'badge' => 'nullable|string|max:255',
        ]);

        $product = Product::findOrFail($id);

        // Handle image upload if new image provided
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = 'product_' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('products', $filename, 'public');
            $imageUrl = Storage::url($path);
            
            // Update image URL
            $product->image = $imageUrl;
        }

        // Update other product details
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category = $request->category;
        $product->stock = $request->stock;
        $product->featured = $request->featured ? true : false;
        $product->badge = $request->badge;
        
        $product->save();

        return redirect()->route('admin.products.merchandise')
            ->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified product from storage.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.products.merchandise')
            ->with('success', 'Product deleted successfully');
    }
    
    /**
     * Update product stock level.
     */
    public function updateStock(Request $request, $id)
    {
        $request->validate([
            'stock' => 'required|integer|min:0',
        ]);

        $product = Product::findOrFail($id);
        $product->stock = $request->stock;
        $product->save();

        return redirect()->back()->with('success', 'Stock updated successfully');
    }
    
    /**
     * Toggle featured status.
     */
    public function toggleFeatured($id)
    {
        $product = Product::findOrFail($id);
        $product->featured = !$product->featured;
        $product->save();

        return redirect()->back()->with('success', 'Featured status updated');
    }
}
