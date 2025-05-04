@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<div class="relative bg-gradient-to-b from-[rgb(241,97,98)] to-[rgb(200,60,60)] text-white py-8 sm:py-12 md:py-16 lg:mt-24 md:mt-24 mt-16">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-6">MAD Mr Bert Shop</h1>
            <p class="text-xl text-[rgb(255,200,200)]">Aviation Gear & Exclusive Merchandise</p>
        </div>
    </div>
</div>

<!-- Main Content -->
<div class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <!-- Category Navigation -->
        <div class="max-w-6xl mx-auto mb-12">
            <div class="flex flex-wrap justify-center gap-4">
                <button class="px-6 py-2 bg-[rgb(241,97,98)] text-white rounded-lg hover:bg-[rgb(200,60,60)] transition-colors duration-300">
                    All Products
                </button>
                <button class="px-6 py-2 border border-[rgb(241,97,98)] text-[rgb(241,97,98)] rounded-lg hover:bg-[rgb(241,97,98)] hover:text-white transition-colors duration-300">
                    Training Materials
                </button>
                <button class="px-6 py-2 border border-[rgb(241,97,98)] text-[rgb(241,97,98)] rounded-lg hover:bg-[rgb(241,97,98)] hover:text-white transition-colors duration-300">
                    Apparel
                </button>
                <button class="px-6 py-2 border border-[rgb(241,97,98)] text-[rgb(241,97,98)] rounded-lg hover:bg-[rgb(241,97,98)] hover:text-white transition-colors duration-300">
                    Equipment
                </button>
            </div>
        </div>

        <!-- Featured Products -->
        <div class="max-w-6xl mx-auto mb-16">
            <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Featured Products</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
                <!-- Product Card 1 -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <div class="relative">
                        <img src="https://picsum.photos/400/300?random=1" alt="Advanced Flight Manual" class="w-full h-48 object-cover">
                        <div class="absolute top-2 right-2 bg-[rgb(241,97,98)] text-white px-2 py-1 rounded-full text-sm">
                            Bestseller
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-bold text-gray-900 mb-2">Advanced Flight Manual</h3>
                        <p class="text-gray-600 text-sm mb-2">Comprehensive guide for advanced pilots</p>
                        <div class="flex items-center mb-2">
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
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                </svg>
                            </div>
                            <span class="text-gray-500 text-sm ml-2">(128 reviews)</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-[rgb(241,97,98)] font-bold">$49.99</span>
                            <button class="px-4 py-2 bg-[rgb(241,97,98)] text-white rounded-lg hover:bg-[rgb(200,60,60)] transition-colors duration-300">
                                Add to Cart
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product Card 2 -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <div class="relative">
                        <img src="https://picsum.photos/400/300?random=2" alt="Premium Flight Jacket" class="w-full h-48 object-cover">
                        <div class="absolute top-2 right-2 bg-[rgb(241,97,98)] text-white px-2 py-1 rounded-full text-sm">
                            New
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-bold text-gray-900 mb-2">Premium Flight Jacket</h3>
                        <p class="text-gray-600 text-sm mb-2">Weather-resistant aviation jacket</p>
                        <div class="flex items-center mb-2">
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
                                <svg class="w-4 h-4 fill-current text-gray-300" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                </svg>
                            </div>
                            <span class="text-gray-500 text-sm ml-2">(86 reviews)</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-[rgb(241,97,98)] font-bold">$129.99</span>
                            <button class="px-4 py-2 bg-[rgb(241,97,98)] text-white rounded-lg hover:bg-[rgb(200,60,60)] transition-colors duration-300">
                                Add to Cart
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product Card 3 -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <div class="relative">
                        <img src="https://picsum.photos/400/300?random=3" alt="Navigation Kit" class="w-full h-48 object-cover">
                        <div class="absolute top-2 right-2 bg-[rgb(241,97,98)] text-white px-2 py-1 rounded-full text-sm">
                            Popular
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-bold text-gray-900 mb-2">Navigation Kit</h3>
                        <p class="text-gray-600 text-sm mb-2">Essential tools for flight planning</p>
                        <div class="flex items-center mb-2">
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
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                </svg>
                            </div>
                            <span class="text-gray-500 text-sm ml-2">(156 reviews)</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-[rgb(241,97,98)] font-bold">$79.99</span>
                            <button class="px-4 py-2 bg-[rgb(241,97,98)] text-white rounded-lg hover:bg-[rgb(200,60,60)] transition-colors duration-300">
                                Add to Cart
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product Card 4 -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <div class="relative">
                        <img src="https://picsum.photos/400/300?random=4" alt="Flight Log Pro" class="w-full h-48 object-cover">
                        <div class="absolute top-2 right-2 bg-[rgb(241,97,98)] text-white px-2 py-1 rounded-full text-sm">
                            Limited
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-bold text-gray-900 mb-2">Flight Log Pro</h3>
                        <p class="text-gray-600 text-sm mb-2">Professional flight logging system</p>
                        <div class="flex items-center mb-2">
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
                                <svg class="w-4 h-4 fill-current text-gray-300" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                </svg>
                            </div>
                            <span class="text-gray-500 text-sm ml-2">(92 reviews)</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-[rgb(241,97,98)] font-bold">$34.99</span>
                            <button class="px-4 py-2 bg-[rgb(241,97,98)] text-white rounded-lg hover:bg-[rgb(200,60,60)] transition-colors duration-300">
                                Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Aircraft & Microavionics Section -->
        <div class="max-w-6xl mx-auto mb-16">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Aircraft Catalog Card -->
                <div class="bg-white p-8 rounded-lg shadow-lg border border-[rgb(241,97,98,0.2)]">
                    <h3 class="text-2xl font-bold text-[rgb(241,97,98)] mb-4">Aircraft Catalog</h3>
                    <p class="text-gray-600 mb-6">Explore our extensive collection of aircraft, from training planes to advanced models. Each listing includes detailed specifications and availability.</p>
                    <a href="/mad-mr-bert/aircraft-catalog" class="inline-block px-6 py-3 bg-[rgb(241,97,98)] text-white rounded-lg hover:bg-[rgb(200,60,60)] transition-colors duration-300">
                        View Aircraft →
                    </a>
                </div>

                <!-- Microavionics Card -->
                <div class="bg-white p-8 rounded-lg shadow-lg border border-[rgb(241,97,98,0.2)]">
                    <h3 class="text-2xl font-bold text-[rgb(241,97,98)] mb-4">MAD Mr Bert's Microavionics</h3>
                    <p class="text-gray-600 mb-6">Discover our innovative microavionics solutions, designed and tested by MAD Mr Bert himself. Perfect for both training and advanced flight operations.</p>
                    <a href="/mad-mr-bert/microavionics" class="inline-block px-6 py-3 bg-[rgb(241,97,98)] text-white rounded-lg hover:bg-[rgb(200,60,60)] transition-colors duration-300">
                        Explore Microavionics →
                    </a>
                </div>
            </div>
        </div>

        <!-- Reviews Section -->
        <div class="max-w-6xl mx-auto">
            <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Customer Reviews</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Review Card 1 -->
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <div class="flex items-center mb-4">
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
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                            </svg>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-4">"The Advanced Flight Manual is incredibly detailed and well-structured. It has helped me immensely in my training."</p>
                    <div class="flex items-center">
                        <span class="text-gray-900 font-bold">John D.</span>
                        <span class="text-gray-500 text-sm ml-2">Verified Buyer</span>
                    </div>
                </div>

                <!-- Review Card 2 -->
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <div class="flex items-center mb-4">
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
                            <svg class="w-4 h-4 fill-current text-gray-300" viewBox="0 0 20 20">
                                <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                            </svg>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-4">"Premium quality flight jacket, perfect for all weather conditions. The attention to detail is impressive."</p>
                    <div class="flex items-center">
                        <span class="text-gray-900 font-bold">Sarah M.</span>
                        <span class="text-gray-500 text-sm ml-2">Verified Buyer</span>
                    </div>
                </div>

                <!-- Review Card 3 -->
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <div class="flex items-center mb-4">
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
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                            </svg>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-4">"The Navigation Kit has everything a pilot needs. The quality of the tools is exceptional."</p>
                    <div class="flex items-center">
                        <span class="text-gray-900 font-bold">Michael R.</span>
                        <span class="text-gray-500 text-sm ml-2">Verified Buyer</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection