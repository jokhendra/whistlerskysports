@extends('layouts.app')

@section('content')

<style>
    .product-description-container {
        position: relative;
    }
    
    .product-description {
        overflow: hidden;
        max-height: 3em;
        transition: max-height 0.3s ease, opacity 0.2s ease;
    }
    
    .product-description-container.expanded .product-description {
        max-height: 300px;
    }
    
    .read-more-btn {
        margin-top: 0.25rem;
        cursor: pointer;
    }
    
    .read-more-icon {
        transition: transform 0.3s ease;
    }
    
    .product-description-container.expanded .read-more-icon {
        transform: rotate(180deg);
    }
</style>

<!-- Hero Section with Animated Background -->
<div class="relative bg-gradient-to-b from-[rgb(241,97,98)] to-[rgb(200,60,60)] text-white py-16 sm:py-20 md:py-24 lg:mt-24 md:mt-24 mt-16 overflow-hidden">
    <!-- Animated Background Elements -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute -top-16 -left-16 w-64 h-64 bg-white opacity-5 rounded-full"></div>
        <div class="absolute top-1/3 right-1/4 w-40 h-40 bg-white opacity-5 rounded-full"></div>
        <div class="absolute bottom-0 left-1/3 w-80 h-80 bg-white opacity-5 rounded-full"></div>
        <div class="absolute -bottom-20 -right-20 w-72 h-72 bg-white opacity-5 rounded-full"></div>
    </div>
    
    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-3xl mx-auto text-center">
            <h1 class="text-5xl md:text-6xl font-bold mb-6 tracking-tight">MAD Mr Bert's Shop</h1>
            <p class="text-xl md:text-2xl text-[rgb(255,220,220)] mb-8">Premium Aviation Gear & Exclusive Merchandise</p>
            <div class="flex justify-center">
                <a href="#products" class="inline-flex items-center px-6 py-3 bg-white text-[rgb(200,60,60)] rounded-full font-semibold shadow-lg hover:shadow-xl transition transform hover:-translate-y-1 hover:scale-105">
                    <span>Explore Products</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M16.707 10.293a1 1 0 010 1.414l-6 6a1 1 0 01-1.414 0l-6-6a1 1 0 111.414-1.414L9 14.586V3a1 1 0 012 0v11.586l4.293-4.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
    
    <!-- Wave Shape Divider -->
    <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-none">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none" class="text-white fill-current w-full h-16">
            <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25"></path>
            <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5"></path>
            <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z"></path>
        </svg>
    </div>
</div>

<!-- Main Content -->
<div class="py-16 bg-white" 
     data-user-logged-in="{{ auth()->check() ? 'true' : 'false' }}">
    <div class="container mx-auto px-4">

        <!-- Featured Products -->
        <div class="max-w-6xl mx-auto mb-16" id="products">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4 text-center">Our Collection</h2>
            <p class="text-gray-600 text-center max-w-3xl mx-auto mb-12">Discover our premium selection of aviation gear and merchandise, crafted for pilots and enthusiasts alike.</p>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @php
                    $products = \App\Models\Product::where('stock', '>', 0)->get();
                @endphp
                
                @forelse($products as $product)
                <!-- Product Card -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden transform transition duration-300 hover:shadow-xl hover:-translate-y-1 group">
                    <div class="relative product-image-container">
                        @php
                            // Get all product images or default to main image
                            $productImages = $product->getAllImages();
                            $primaryImage = $product->image; // Default primary image
                        @endphp
                        
                        <div class="overflow-hidden">
                            <img src="{{ $primaryImage }}" alt="{{ $product->name }}" class="w-full h-64 object-cover product-main-image transition-transform duration-700 group-hover:scale-110">
                        </div>
                        
                        <!-- All product images (hidden container) -->
                        <div class="hidden product-all-images">
                            <!-- Primary image first -->
                            <img src="{{ $primaryImage }}" alt="{{ $product->name }}" data-index="0">
                            
                            <!-- Additional images if available (from ProductImages) -->
                            @foreach($productImages as $index => $image)
                                @if($index > 0 || ($index == 0 && $image->image_url != $primaryImage))
                                    <img src="{{ $image->image_url }}" alt="{{ $image->alt_text ?? $product->name }}" data-index="{{ $loop->index + 1 }}">
                                @endif
                            @endforeach
                            
                        </div>
                        
                        <!-- Image thumbnails -->
                        <div class="absolute bottom-2 left-0 right-0 flex justify-center space-x-1 product-thumbnails">
                            <!-- Primary image thumbnail -->
                            <div class="w-8 h-8 border-2 border-white rounded-full overflow-hidden cursor-pointer opacity-70 hover:opacity-100 active-thumbnail border-[rgb(241,97,98)]" data-index="0">
                                <img src="{{ $primaryImage }}" alt="Thumbnail 1" class="w-full h-full object-cover">
                            </div>
                            
                            <!-- Additional image thumbnails -->
                            @foreach($productImages as $index => $image)
                                @if($index > 0 || ($index == 0 && $image->image_url != $primaryImage))
                                    <div class="w-8 h-8 border-2 border-white rounded-full overflow-hidden cursor-pointer opacity-70 hover:opacity-100" data-index="{{ $loop->index + 1 }}">
                                        <img src="{{ $image->image_url }}" alt="Thumbnail {{ $loop->index + 2 }}" class="w-full h-full object-cover">
                                    </div>
                                @endif
                            @endforeach
                            
                        </div>
                        
                        <!-- Zoom overlay icon -->
                        <div class="absolute top-2 right-2 bg-white p-1.5 rounded-full cursor-pointer product-zoom-icon opacity-0 group-hover:opacity-90 transition-opacity duration-300 shadow-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-700" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M5 8a1 1 0 011-1h1V6a1 1 0 012 0v1h1a1 1 0 110 2H9v1a1 1 0 11-2 0V9H6a1 1 0 01-1-1z" />
                                <path fill-rule="evenodd" d="M2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8zm6-4a4 4 0 100 8 4 4 0 000-8z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        
                        @if($product->badge)
                        <div class="absolute top-2 left-2 bg-[rgb(241,97,98)] text-white px-3 py-1 rounded-full text-sm font-medium shadow-md">
                            {{ $product->badge }}
                        </div>
                        @endif
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-[rgb(241,97,98)] transition-colors">{{ $product->name }}</h3>
                        <div class="relative mb-3 product-description-container">
                            <p class="text-gray-600 text-sm product-description">{{ $product->description }}</p>
                            <button class="text-[rgb(241,97,98)] text-xs font-medium hover:underline mt-1 read-more-btn inline-flex items-center">
                                <span>Read more</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 ml-1 transition-transform duration-200 read-more-icon" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                        <div class="flex items-center mb-3">
                            <div class="flex text-yellow-400">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                </svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                </svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                </svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                </svg>
                                <svg class="w-4 h-4 fill-current{{ random_int(0, 1) ? ' text-gray-300' : '' }}" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                </svg>
                            </div>
                            <span class="text-gray-500 text-sm ml-2">({{ random_int(50, 200) }} reviews)</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-[rgb(241,97,98)] font-bold text-xl">CAD ${{ number_format($product->price, 2) }}</span>
                            <button type="button" 
                                class="add-to-cart-btn px-4 py-2 bg-[rgb(241,97,98)] text-white rounded-lg hover:bg-[rgb(200,60,60)] transition-all duration-300 shadow-md hover:shadow-lg transform hover:-translate-y-1"
                                data-product-id="{{ $product->id }}"
                                data-quantity="1">
                                Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center py-12">
                    <div class="bg-gray-50 p-8 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                        </svg>
                        <p class="text-gray-600 text-lg">No products available at the moment.</p>
                        <p class="text-gray-500 mt-2">Please check back soon as we update our inventory.</p>
                    </div>
                </div>
                @endforelse
            </div>
        </div>

        <!-- Aircraft & Microavionics Section -->
        <div class="max-w-6xl mx-auto mb-20 px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Aircraft Catalog Card -->
                <div class="bg-gradient-to-br from-white to-gray-50 p-8 rounded-2xl shadow-lg border border-[rgb(241,97,98,0.2)] relative overflow-hidden transform transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                    <div class="absolute top-0 right-0 w-40 h-40 -mt-10 -mr-10 bg-[rgb(241,97,98)] opacity-10 rounded-full"></div>
                    <div class="absolute bottom-0 left-0 w-32 h-32 -mb-10 -ml-10 bg-[rgb(241,97,98)] opacity-10 rounded-full"></div>
                    <h3 class="text-2xl font-bold text-[rgb(241,97,98)] mb-4 relative">Aircraft Catalog</h3>
                    <p class="text-gray-600 mb-8 relative">Explore our extensive collection of aircraft, from training planes to advanced models. Each listing includes detailed specifications and availability.</p>
                    <div class="relative">
                        <a href="/mad-mr-bert/aircraft-catalog" class="inline-flex items-center px-6 py-3 bg-[rgb(241,97,98)] text-white rounded-lg hover:bg-[rgb(200,60,60)] transition-all duration-300 shadow-md hover:shadow-lg transform hover:-translate-y-1">
                            <span>View Aircraft</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </a>
                    </div>
                    <!-- Decorative airplane icon -->
                    <div class="absolute top-6 right-6 text-[rgb(241,97,98)] opacity-20">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M21 16v-2l-8-5V3.5c0-.83-.67-1.5-1.5-1.5S10 2.67 10 3.5V9l-8 5v2l8-2.5V19l-2 1.5V22l3.5-1 3.5 1v-1.5L13 19v-5.5l8 2.5z"/>
                        </svg>
                    </div>
                </div>

                <!-- Microavionics Card -->
                <div class="bg-gradient-to-br from-white to-gray-50 p-8 rounded-2xl shadow-lg border border-[rgb(241,97,98,0.2)] relative overflow-hidden transform transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                    <div class="absolute top-0 right-0 w-40 h-40 -mt-10 -mr-10 bg-[rgb(241,97,98)] opacity-10 rounded-full"></div>
                    <div class="absolute bottom-0 left-0 w-32 h-32 -mb-10 -ml-10 bg-[rgb(241,97,98)] opacity-10 rounded-full"></div>
                    <h3 class="text-2xl font-bold text-[rgb(241,97,98)] mb-4 relative">MAD Mr Bert's Microavionics</h3>
                    <p class="text-gray-600 mb-8 relative">Discover our innovative microavionics solutions, designed and tested by MAD Mr Bert himself. Perfect for both training and advanced flight operations.</p>
                    <div class="relative">
                        <a href="/mad-mr-bert/microavionics" class="inline-flex items-center px-6 py-3 bg-[rgb(241,97,98)] text-white rounded-lg hover:bg-[rgb(200,60,60)] transition-all duration-300 shadow-md hover:shadow-lg transform hover:-translate-y-1">
                            <span>Explore Microavionics</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </a>
                    </div>
                    <!-- Decorative circuit icon -->
                    <div class="absolute top-6 right-6 text-[rgb(241,97,98)] opacity-20">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M20 7h-4V5c0-.55-.22-1.05-.59-1.41C15.05 3.22 14.55 3 14 3h-4c-1.1 0-2 .9-2 2v2H4c-1.1 0-2 .9-2 2v11c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V9c0-1.1-.9-2-2-2zM10 5h4v2h-4V5zm1 13.5l-1-1 3-3-3-3 1-1 4 4-4 4z"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Reviews Section -->
        <div class="max-w-6xl mx-auto mb-16">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">What Our Customers Say</h2>
                <div class="w-20 h-1 bg-[rgb(241,97,98)] mx-auto mb-4"></div>
                <p class="text-gray-600 max-w-2xl mx-auto">Read what pilots and aviation enthusiasts have to say about our products and services.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Review Card 1 -->
                <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100 transform transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                    <div class="flex items-center mb-4">
                        <div class="flex text-yellow-400">
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                            </svg>
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                            </svg>
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                            </svg>
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                            </svg>
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                            </svg>
                        </div>
                    </div>
                    
                    <div class="mb-6">
                        <svg class="h-8 w-8 text-gray-300 mb-2" fill="currentColor" viewBox="0 0 32 32" aria-hidden="true">
                            <path d="M9.352 4C4.456 7.456 1 13.12 1 19.36c0 5.088 3.072 8.064 6.624 8.064 3.36 0 5.856-2.688 5.856-5.856 0-3.168-2.208-5.472-5.088-5.472-.576 0-1.344.096-1.536.192.48-3.264 3.552-7.104 6.624-9.024L9.352 4zm16.512 0c-4.8 3.456-8.256 9.12-8.256 15.36 0 5.088 3.072 8.064 6.624 8.064 3.264 0 5.856-2.688 5.856-5.856 0-3.168-2.304-5.472-5.184-5.472-.576 0-1.248.096-1.44.192.48-3.264 3.456-7.104 6.528-9.024L25.864 4z" />
                        </svg>
                        <p class="text-gray-600 mb-4 italic">"The Advanced Flight Manual is incredibly detailed and well-structured. It has helped me immensely in my training. I highly recommend it to all aspiring pilots."</p>
                    </div>
                    
                    <div class="flex items-center">
                        <div class="h-10 w-10 rounded-full bg-[rgb(241,97,98)] bg-opacity-10 flex items-center justify-center text-[rgb(241,97,98)] font-bold">JD</div>
                        <div class="ml-3">
                            <h4 class="text-gray-900 font-bold">John Davis</h4>
                            <div class="flex items-center">
                                <span class="text-gray-500 text-sm">Student Pilot</span>
                                <span class="mx-2 text-gray-300">•</span>
                                <span class="text-[rgb(241,97,98)] text-sm">Verified Buyer</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Review Card 2 -->
                <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100 transform transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                    <div class="flex items-center mb-4">
                        <div class="flex text-yellow-400">
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                            </svg>
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                            </svg>
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                            </svg>
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                            </svg>
                            <svg class="w-5 h-5 fill-current text-gray-300" viewBox="0 0 20 20">
                                <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                            </svg>
                        </div>
                    </div>
                    
                    <div class="mb-6">
                        <svg class="h-8 w-8 text-gray-300 mb-2" fill="currentColor" viewBox="0 0 32 32" aria-hidden="true">
                            <path d="M9.352 4C4.456 7.456 1 13.12 1 19.36c0 5.088 3.072 8.064 6.624 8.064 3.36 0 5.856-2.688 5.856-5.856 0-3.168-2.208-5.472-5.088-5.472-.576 0-1.344.096-1.536.192.48-3.264 3.552-7.104 6.624-9.024L9.352 4zm16.512 0c-4.8 3.456-8.256 9.12-8.256 15.36 0 5.088 3.072 8.064 6.624 8.064 3.264 0 5.856-2.688 5.856-5.856 0-3.168-2.304-5.472-5.184-5.472-.576 0-1.248.096-1.44.192.48-3.264 3.456-7.104 6.528-9.024L25.864 4z" />
                        </svg>
                        <p class="text-gray-600 mb-4 italic">"Premium quality flight jacket, perfect for all weather conditions. The attention to detail is impressive. I wear it on every flight and constantly get compliments."</p>
                    </div>
                    
                    <div class="flex items-center">
                        <div class="h-10 w-10 rounded-full bg-[rgb(241,97,98)] bg-opacity-10 flex items-center justify-center text-[rgb(241,97,98)] font-bold">SM</div>
                        <div class="ml-3">
                            <h4 class="text-gray-900 font-bold">Sarah Mitchell</h4>
                            <div class="flex items-center">
                                <span class="text-gray-500 text-sm">Commercial Pilot</span>
                                <span class="mx-2 text-gray-300">•</span>
                                <span class="text-[rgb(241,97,98)] text-sm">Verified Buyer</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Review Card 3 -->
                <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100 transform transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                    <div class="flex items-center mb-4">
                        <div class="flex text-yellow-400">
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                            </svg>
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                            </svg>
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                            </svg>
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                            </svg>
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                            </svg>
                        </div>
                    </div>
                    
                    <div class="mb-6">
                        <svg class="h-8 w-8 text-gray-300 mb-2" fill="currentColor" viewBox="0 0 32 32" aria-hidden="true">
                            <path d="M9.352 4C4.456 7.456 1 13.12 1 19.36c0 5.088 3.072 8.064 6.624 8.064 3.36 0 5.856-2.688 5.856-5.856 0-3.168-2.208-5.472-5.088-5.472-.576 0-1.344.096-1.536.192.48-3.264 3.552-7.104 6.624-9.024L9.352 4zm16.512 0c-4.8 3.456-8.256 9.12-8.256 15.36 0 5.088 3.072 8.064 6.624 8.064 3.264 0 5.856-2.688 5.856-5.856 0-3.168-2.304-5.472-5.184-5.472-.576 0-1.248.096-1.44.192.48-3.264 3.456-7.104 6.528-9.024L25.864 4z" />
                        </svg>
                        <p class="text-gray-600 mb-4 italic">"The Navigation Kit has everything a pilot needs. The quality of the tools is exceptional, and they've proven reliable in various conditions. Worth every penny."</p>
                    </div>
                    
                    <div class="flex items-center">
                        <div class="h-10 w-10 rounded-full bg-[rgb(241,97,98)] bg-opacity-10 flex items-center justify-center text-[rgb(241,97,98)] font-bold">MR</div>
                        <div class="ml-3">
                            <h4 class="text-gray-900 font-bold">Michael Reynolds</h4>
                            <div class="flex items-center">
                                <span class="text-gray-500 text-sm">Flight Instructor</span>
                                <span class="mx-2 text-gray-300">•</span>
                                <span class="text-[rgb(241,97,98)] text-sm">Verified Buyer</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Testimonial CTA -->
            <div class="text-center mt-10">
                <a href="#" class="inline-flex items-center px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg transition-colors duration-300">
                    <span>Read More Reviews</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Login Modal -->
<div id="login-modal" class="fixed inset-0 z-50 hidden overflow-auto bg-black bg-opacity-60 backdrop-blur-sm flex items-center justify-center transition-opacity duration-300">
    <div class="bg-white rounded-xl shadow-2xl max-w-md w-full mx-4 p-8 relative transform transition-all duration-300 scale-95 opacity-0" id="login-modal-content">
        <button id="close-login-modal" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        
        <div class="text-center mb-6">
            <div class="inline-flex items-center justify-center h-14 w-14 rounded-full bg-[rgb(241,97,98)] bg-opacity-10 text-[rgb(241,97,98)] mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                </svg>
            </div>
            <h2 class="text-2xl font-bold text-gray-900 mb-2">Login Required</h2>
            <p class="text-gray-600 mb-6">Please login or create an account to add items to your cart and complete your purchase.</p>
        </div>
        
        <div class="flex flex-col md:flex-row gap-4 justify-center">
            <a href="{{ route('login') }}" class="flex-1 px-6 py-3 bg-[rgb(241,97,98)] text-white rounded-lg hover:bg-[rgb(200,60,60)] transition-all duration-300 shadow-md hover:shadow-lg text-center font-semibold">
                Login
            </a>
            <a href="{{ route('register') }}" class="flex-1 px-6 py-3 border-2 border-[rgb(241,97,98)] text-[rgb(241,97,98)] rounded-lg hover:bg-[rgb(241,97,98)] hover:text-white transition-all duration-300 text-center font-semibold">
                Register
            </a>
        </div>
    </div>
</div>

<!-- Cart notification -->
<div id="notification" class="fixed bottom-4 right-4 bg-green-500 text-white px-6 py-4 rounded-lg shadow-xl z-50 transform transition-all duration-300 translate-y-full opacity-0 flex items-center">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor">
        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
    </svg>
    <span>Product added to cart successfully!</span>
</div>

@if(session('success'))
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const notification = document.getElementById('notification');
        notification.classList.remove('translate-y-full', 'opacity-0');
        
        setTimeout(function() {
            notification.classList.add('translate-y-full', 'opacity-0');
            setTimeout(function() {
                notification.classList.add('hidden');
            }, 300);
        }, 3000);
    });
</script>
@endif

<!-- Add to Cart Script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const addToCartButtons = document.querySelectorAll('.add-to-cart-btn');
    const notification = document.getElementById('notification');
    const loginModal = document.getElementById('login-modal');
    const loginModalContent = document.getElementById('login-modal-content');
    const closeLoginModalBtn = document.getElementById('close-login-modal');
    
    // Handle Read More functionality for product descriptions
    document.querySelectorAll('.read-more-btn').forEach(button => {
        button.addEventListener('click', function() {
            const container = this.parentNode;
            const productDesc = container.querySelector('.product-description');
            
            // Toggle expanded class
            container.classList.toggle('expanded');
            
            // Update button text
            if (container.classList.contains('expanded')) {
                this.querySelector('span').textContent = 'Show less';
            } else {
                this.querySelector('span').textContent = 'Read more';
            }
        });
    });
    
    // Smooth scroll for the "Explore Products" button
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            const targetElement = document.querySelector(targetId);
            
            if (targetElement) {
                window.scrollTo({
                    top: targetElement.offsetTop - 100, // Adjust for header
                    behavior: 'smooth'
                });
            }
        });
    });
    
    // Check if user is logged in by reading from data attribute
    const isUserLoggedIn = document.querySelector('.py-16.bg-white').dataset.userLoggedIn === 'true';
    
    if (closeLoginModalBtn) {
        closeLoginModalBtn.addEventListener('click', function() {
            loginModalContent.classList.remove('scale-100', 'opacity-100');
            loginModalContent.classList.add('scale-95', 'opacity-0');
            
            setTimeout(() => {
                loginModal.classList.add('hidden');
            }, 200);
        });
    }
    
    addToCartButtons.forEach(button => {
        button.addEventListener('click', function() {
            const productId = this.getAttribute('data-product-id');
            const quantity = this.getAttribute('data-quantity');
            
            // Always try to add to cart, server will handle authentication
            addToCart(productId, quantity);
        });
    });
    
    function addToCart(productId, quantity) {
        // Disable button while processing
        const button = document.querySelector(`.add-to-cart-btn[data-product-id="${productId}"]`);
        const originalText = button.innerHTML;
        button.disabled = true;
        button.innerHTML = '<span class="flex items-center justify-center"><svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>Adding...</span>';
        
        // Create form data
        const formData = new FormData();
        formData.append('product_id', productId);
        formData.append('quantity', quantity);
        formData.append('_token', '{{ csrf_token() }}');
        
        // Make fetch request
        fetch('{{ route("mad-mr-bert.add-to-cart") }}', {
            method: 'POST',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            },
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                if (response.status === 401) {
                    // Show login modal with animation
                    loginModal.classList.remove('hidden');
                    setTimeout(() => {
                        loginModalContent.classList.remove('scale-95', 'opacity-0');
                        loginModalContent.classList.add('scale-100', 'opacity-100');
                    }, 10);
                    
                    throw new Error('Authentication required');
                }
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            // Re-enable button
            button.disabled = false;
            button.innerHTML = originalText;
            
            if (data.success) {
                console.log('Cart updated:', data);
                // Show notification
                notification.textContent = data.message;
                notification.classList.remove('translate-y-full', 'opacity-0');
                
                // Add success animation to button
                button.classList.add('bg-green-500');
                setTimeout(() => {
                    button.classList.remove('bg-green-500');
                }, 800);
                
                // Update cart count display (call the global function)
                if (typeof window.updateCartCountDisplay === 'function') {
                    window.updateCartCountDisplay(data.cart_count);
                }
                
                // Auto-hide notification after 3 seconds
                setTimeout(function() {
                    notification.classList.add('translate-y-full', 'opacity-0');
                }, 3000);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            // Only process errors other than 401 Authentication
            if (!error.message.includes('Authentication required')) {
                button.disabled = false;
                button.innerHTML = originalText;
                notification.textContent = 'Error adding product to cart';
                notification.classList.remove('bg-green-500');
                notification.classList.add('bg-red-500');
                notification.classList.remove('translate-y-full', 'opacity-0');
                
                setTimeout(function() {
                    notification.classList.add('translate-y-full', 'opacity-0');
                }, 3000);
            }
        });
    }
    
    // Function to update cart count display everywhere
    function updateCartCountDisplay(count) {
        // Desktop nav cart count
        document.querySelectorAll('.cart-count').forEach(element => {
            element.textContent = count;
            if (count > 0) {
                element.classList.remove('hidden');
            } else {
                element.classList.add('hidden');
            }
        });
        
        // Mobile nav cart count
        document.querySelectorAll('.cart-count-mobile').forEach(element => {
            element.textContent = count;
            if (count > 0) {
                element.classList.remove('hidden');
            } else {
                element.classList.add('hidden');
            }
        });
    }
});
</script>

<!-- Product Image Gallery Script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    setupProductGallery();
    
    // Main function to set up product gallery
    function setupProductGallery() {
        // Get all product cards
        const productCards = document.querySelectorAll('.product-image-container');
        
        // Modal elements
        const imageModal = document.getElementById('image-preview-modal');
        const modalImage = document.getElementById('modal-image');
        const modalImageContainer = document.getElementById('modal-image-container');
        const modalThumbnails = document.getElementById('modal-thumbnails');
        const closeImageModal = document.getElementById('close-image-modal');
        const prevImageBtn = document.getElementById('prev-image');
        const nextImageBtn = document.getElementById('next-image');
        
        // Current product and image index being viewed in modal
        let currentProductImages = [];
        let currentImageIndex = 0;
        
        // Set up each product card
        productCards.forEach(setupProductCardGallery);
        
        // Set up modal functionality
        setupModalControls();
        
        // Function to set up product card gallery
        function setupProductCardGallery(card) {
            // Fix initially active thumbnail
            const thumbnails = card.querySelectorAll('.product-thumbnails > div');
            if (thumbnails.length > 0) {
                // First mark all as not active
                thumbnails.forEach(thumb => {
                    thumb.classList.remove('active-thumbnail', 'border-[rgb(241,97,98)]');
                    thumb.classList.add('border-white');
                });
                
                // Then mark the first one as active
                const firstThumb = thumbnails[0];
                firstThumb.classList.add('active-thumbnail', 'border-[rgb(241,97,98)]');
                firstThumb.classList.remove('border-white');
                firstThumb.style.opacity = '1';
            }
            
            // Thumbnail click handlers
            thumbnails.forEach(thumb => {
                thumb.addEventListener('click', function(e) {
                    e.stopPropagation(); // Prevent opening modal when clicking thumbs
                    
                    // Get the index
                    const index = parseInt(this.getAttribute('data-index') || '0');
                    
                    // Get all images
                    const allImages = card.querySelectorAll('.product-all-images img');
                    if (!allImages || allImages.length === 0) return;
                    
                    // Find the image
                    const targetImage = Array.from(allImages).find(img => 
                        parseInt(img.getAttribute('data-index') || '0') === index
                    );
                    
                    if (targetImage) {
                        // Update main image with fade transition
                        const mainImage = card.querySelector('.product-main-image');
                        if (mainImage) {
                            mainImage.style.opacity = '0';
                            setTimeout(() => {
                                mainImage.src = targetImage.src;
                                mainImage.style.opacity = '1';
                            }, 200);
                        }
                    }
                    
                    // Update active thumbnail
                    thumbnails.forEach(t => {
                        t.classList.remove('active-thumbnail', 'border-[rgb(241,97,98)]');
                        t.classList.add('border-white');
                        t.style.opacity = '0.7';
                    });
                    
                    // Mark this thumbnail as active
                    this.classList.add('active-thumbnail', 'border-[rgb(241,97,98)]');
                    this.classList.remove('border-white');
                    this.style.opacity = '1';
                });
            });
            
            // Zoom icon click handler - open modal
            const zoomIcon = card.querySelector('.product-zoom-icon');
            if (zoomIcon) {
                zoomIcon.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    openImageModal(card);
                });
            }
            
            // Main image click handler - open modal
            const mainImage = card.querySelector('.product-main-image');
            if (mainImage) {
                mainImage.addEventListener('click', function(e) {
                    e.preventDefault();
                    openImageModal(card);
                });
            }
        }
        
        // Function to set up modal controls
        function setupModalControls() {
            // Close button
            if (closeImageModal) {
                closeImageModal.addEventListener('click', function(e) {
                    e.preventDefault();
                    closeModal();
                });
            }
            
            // Navigate to previous image
            if (prevImageBtn) {
                prevImageBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    navigateToPreviousImage();
                });
            }
            
            // Navigate to next image
            if (nextImageBtn) {
                nextImageBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    navigateToNextImage();
                });
            }
            
            // Close modal when clicking outside the content
            imageModal.addEventListener('click', function(e) {
                if (e.target === imageModal) {
                    closeModal();
                }
            });
            
            // Handle keyboard events
            document.addEventListener('keydown', function(e) {
                if (imageModal.classList.contains('hidden')) return;
                
                if (e.key === 'Escape') {
                    closeModal();
                } else if (e.key === 'ArrowLeft') {
                    navigateToPreviousImage();
                } else if (e.key === 'ArrowRight') {
                    navigateToNextImage();
                }
            });
        }
        
        // Function to close the modal
        function closeModal() {
            modalImageContainer.classList.add('scale-95');
            modalImageContainer.style.opacity = '0';
            imageModal.style.opacity = '0';
            
            setTimeout(() => {
                imageModal.classList.add('hidden');
                document.body.classList.remove('overflow-hidden');
                currentProductImages = [];
                currentImageIndex = 0;
            }, 300);
        }
        
        // Function to navigate to the previous image
        function navigateToPreviousImage() {
            if (currentProductImages.length <= 1) return;
            
            currentImageIndex = (currentImageIndex - 1 + currentProductImages.length) % currentProductImages.length;
            updateModalImage();
        }
        
        // Function to navigate to the next image
        function navigateToNextImage() {
            if (currentProductImages.length <= 1) return;
            
            currentImageIndex = (currentImageIndex + 1) % currentProductImages.length;
            updateModalImage();
        }
        
        // Function to open modal with product images
        function openImageModal(productCard) {
            // Find active thumbnail
            const activeThumb = productCard.querySelector('.active-thumbnail');
            let activeIndex = activeThumb ? parseInt(activeThumb.getAttribute('data-index') || '0') : 0;
            
            // Get main image as fallback
            const mainImage = productCard.querySelector('.product-main-image');
            let mainImageSrc = '';
            let mainImageAlt = '';
            
            if (mainImage) {
                mainImageSrc = mainImage.src;
                mainImageAlt = mainImage.alt || 'Product image';
            }
            
            // Get all images
            const allImagesContainer = productCard.querySelector('.product-all-images');
            if (!allImagesContainer) {
                console.error('No image container found');
                return;
            }
            
            const allImages = allImagesContainer.querySelectorAll('img');
            
            // Clear previous images
            currentProductImages = [];
            
            // Check if we have images
            if (allImages && allImages.length > 0) {
                // Store image sources
                Array.from(allImages).forEach(img => {
                    const index = parseInt(img.getAttribute('data-index') || '0');
                    currentProductImages.push({
                        src: img.src,
                        alt: img.alt || 'Product image',
                        index: index
                    });
                });
            }
            
            // If no images were found, use the main image
            if (currentProductImages.length === 0 && mainImageSrc) {
                currentProductImages.push({
                    src: mainImageSrc,
                    alt: mainImageAlt,
                    index: 0
                });
            }
            
            // Final check - if still no images, exit
            if (currentProductImages.length === 0) {
                console.error('No images found for modal');
                return;
            }
            
            // Set current index to active thumbnail or default to 0
            currentImageIndex = activeIndex;
            
            // Make sure index is valid
            if (currentImageIndex >= currentProductImages.length) {
                currentImageIndex = 0;
            }
            
            // Prevent body scrolling
            document.body.classList.add('overflow-hidden');
            
            // Clear previous thumbnails
            modalThumbnails.innerHTML = '';
            
            // Preload images for smoother experience
            currentProductImages.forEach(image => {
                const img = new Image();
                img.src = image.src;
            });
            
            // Reset modal image container styles
            modalImageContainer.classList.add('scale-95');
            modalImageContainer.style.opacity = '0';
            
            // Update modal with images
            updateModalImage(true);
            updateModalThumbnails();
            
            // Show modal with animation
            imageModal.classList.remove('hidden');
            imageModal.style.opacity = '0';
            
            // Start animation after a tiny delay to ensure DOM update
            setTimeout(() => {
                imageModal.style.opacity = '1';
                modalImageContainer.classList.remove('scale-95');
                modalImageContainer.style.opacity = '1';
            }, 10);
        }
        
        // Update the main image in modal
        function updateModalImage(isInitial = false) {
            if (currentProductImages.length === 0) return;
            
            const currentImage = currentProductImages[currentImageIndex];
            
            // Add animation only if not initial load
            if (!isInitial) {
                modalImage.style.opacity = '0';
                modalImage.style.transform = 'scale(0.95)';
            }
            
            // Change the image
            modalImage.src = currentImage.src;
            modalImage.alt = currentImage.alt;
            
            // Animate in after a short delay
            setTimeout(() => {
                modalImage.style.opacity = '1';
                modalImage.style.transform = 'scale(1)';
            }, 50);
            
            // Update active thumbnail in modal
            updateActiveThumbnail();
        }
        
        // Update the active thumbnail
        function updateActiveThumbnail() {
            const modalThumbs = modalThumbnails.querySelectorAll('.modal-thumb');
            modalThumbs.forEach(thumb => {
                const index = parseInt(thumb.getAttribute('data-index') || '0');
                
                if (index === currentImageIndex) {
                    thumb.classList.add('border-[rgb(241,97,98)]', 'ring-2', 'ring-[rgb(241,97,98)]', 'ring-offset-1');
                    thumb.classList.remove('border-white', 'opacity-70');
                    thumb.classList.add('opacity-100');
                } else {
                    thumb.classList.remove('border-[rgb(241,97,98)]', 'ring-2', 'ring-[rgb(241,97,98)]', 'ring-offset-1');
                    thumb.classList.add('border-white', 'opacity-70');
                    thumb.classList.remove('opacity-100');
                }
            });
        }
        
        // Create thumbnails in modal
        function updateModalThumbnails() {
            // Clear existing thumbnails
            modalThumbnails.innerHTML = '';
            
            // Add new thumbnails
            currentProductImages.forEach((image, index) => {
                const thumb = document.createElement('div');
                thumb.className = 'w-20 h-14 rounded overflow-hidden cursor-pointer modal-thumb border-2 transition-all duration-200 hover:opacity-100 hover:scale-105';
                thumb.setAttribute('data-index', index);
                
                if (index === currentImageIndex) {
                    thumb.classList.add('border-[rgb(241,97,98)]', 'ring-2', 'ring-[rgb(241,97,98)]', 'ring-offset-1', 'opacity-100');
                } else {
                    thumb.classList.add('border-white', 'opacity-70');
                }
                
                const img = document.createElement('img');
                img.src = image.src;
                img.alt = 'Thumbnail';
                img.className = 'w-full h-full object-cover';
                
                thumb.appendChild(img);
                modalThumbnails.appendChild(thumb);
                
                // Add click event
                thumb.addEventListener('click', function(e) {
                    e.stopPropagation();
                    if (currentImageIndex === index) return;
                    
                    currentImageIndex = index;
                    updateModalImage();
                });
            });
        }
    }
});
</script>

@endsection