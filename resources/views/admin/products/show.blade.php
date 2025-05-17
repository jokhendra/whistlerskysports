@extends('admin.layout.admin')

@section('content')
<div class="py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-lg shadow-sm overflow-hidden">
            <div class="p-6 border-b border-gray-200">
                <div class="flex justify-between items-center">
                    <h2 class="text-xl font-semibold text-gray-800">Product Details</h2>
                    <div class="flex space-x-3">
                        <a href="{{ route('admin.products.edit', $product->id) }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                            </svg>
                            Edit Product
                        </a>
                        <a href="{{ route('admin.products.merchandise') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                            Back to Products
                        </a>
                    </div>
                </div>
            </div>

            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Left Column: Main Info & Images -->
                    <div>
                        <div class="bg-gray-50 p-4 rounded-lg mb-6">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4">Product Information</h3>
                            <div class="space-y-3">
                                <div>
                                    <h4 class="text-sm font-medium text-gray-500">Name</h4>
                                    <p class="text-base text-gray-900">{{ $product->name }}</p>
                                </div>
                                <div>
                                    <h4 class="text-sm font-medium text-gray-500">Description</h4>
                                    <p class="text-base text-gray-900">{{ $product->description }}</p>
                                </div>
                                <div>
                                    <h4 class="text-sm font-medium text-gray-500">Category</h4>
                                    <p class="text-base text-gray-900">{{ ucfirst($product->category) }}</p>
                                </div>
                                <div>
                                    <h4 class="text-sm font-medium text-gray-500">Price</h4>
                                    <p class="text-base text-gray-900">CAD ${{ number_format($product->price, 2) }}</p>
                                </div>
                                <div>
                                    <h4 class="text-sm font-medium text-gray-500">Stock</h4>
                                    <p class="text-base text-gray-900 flex items-center">
                                        {{ $product->stock }}
                                        <span class="ml-2 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                                            {{ $product->stock > 0 ? ($product->stock < 5 ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-800') : 'bg-red-100 text-red-800' }}">
                                            {{ $product->stock > 0 ? ($product->stock < 5 ? 'Low Stock' : 'In Stock') : 'Out of Stock' }}
                                        </span>
                                    </p>
                                </div>
                                @if($product->badge)
                                <div>
                                    <h4 class="text-sm font-medium text-gray-500">Badge</h4>
                                    <p class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-pink-100 text-pink-800">
                                        {{ $product->badge }}
                                    </p>
                                </div>
                                @endif
                                <div>
                                    <h4 class="text-sm font-medium text-gray-500">Featured</h4>
                                    <p class="text-base text-gray-900">
                                        @if($product->featured)
                                            <span class="text-yellow-500">★</span> Yes
                                        @else
                                            No
                                        @endif
                                    </p>
                                </div>
                                <div>
                                    <h4 class="text-sm font-medium text-gray-500">Created</h4>
                                    <p class="text-base text-gray-900">{{ $product->created_at->format('M d, Y H:i') }}</p>
                                </div>
                                <div>
                                    <h4 class="text-sm font-medium text-gray-500">Last Updated</h4>
                                    <p class="text-base text-gray-900">{{ $product->updated_at->format('M d, Y H:i') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column: Images -->
                    <div>
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="text-lg font-semibold text-gray-800">Product Images</h3>
                                <a href="{{ route('admin.products.images.index', $product->id) }}" class="inline-flex items-center px-3 py-1 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    <svg class="-ml-1 mr-1 h-4 w-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg>
                                    Manage Images
                                </a>
                            </div>
                            
                            <div class="mb-4">
                                <h4 class="text-sm font-medium text-gray-500 mb-2">Primary Image</h4>
                                <div class="border border-gray-300 rounded-lg overflow-hidden">
                                    <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-auto object-cover">
                                </div>
                            </div>
                            
                            @if($product->images->count() > 0)
                            <div>
                                <h4 class="text-sm font-medium text-gray-500 mb-2">Additional Images ({{ $product->images->count() }})</h4>
                                <div class="grid grid-cols-2 md:grid-cols-3 gap-2">
                                    @foreach($product->images as $image)
                                    <div class="border border-gray-300 rounded-lg overflow-hidden {{ $image->is_primary ? 'ring-2 ring-blue-500' : '' }}">
                                        <img src="{{ $image->image_url }}" alt="{{ $image->alt_text ?? $product->name }}" class="w-full h-24 object-cover">
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 