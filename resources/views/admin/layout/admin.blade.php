<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} Admin</title>
    <link rel="icon" href="{{ asset('images/logo/Whistler-Sky-Sports_Lettermark-White.png') }}" type="image/png">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Alpine.js -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles Stack -->
    @stack('styles')
</head>
<body class="font-sans antialiased h-full">
    <div class="min-h-screen bg-gray-100" x-data="{ sidebarOpen: false, sidebarCollapsed: localStorage.getItem('sidebarCollapsed') === 'true' }" 
         @resize.window="window.innerWidth < 1024 ? sidebarCollapsed = false : ''"
         x-init="$watch('sidebarCollapsed', value => localStorage.setItem('sidebarCollapsed', value))">
        <!-- Sidebar -->
        <div class="fixed inset-y-0 left-0 z-50 bg-white shadow-lg transform transition-all duration-300 ease-in-out flex flex-col"
             :class="{
                'w-64': !sidebarCollapsed,
                'w-16': sidebarCollapsed,
                'translate-x-0': sidebarOpen || window.innerWidth >= 1024,
                '-translate-x-full': !sidebarOpen && window.innerWidth < 1024
             }">
                        <!-- Logo -->
            <div class="flex items-center justify-between h-16 border-b border-gray-200">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center" :class="{'justify-center': sidebarCollapsed, 'ml-4': !sidebarCollapsed}">
                    <span class="text-xl font-bold text-gray-800" x-show="!sidebarCollapsed">Whistler Sky Sports</span>
                    <span class="text-xl font-bold text-gray-800" x-show="sidebarCollapsed">WSS</span>
                </a>
                <!-- Toggle Button (visible on desktop) -->
                <button @click="sidebarCollapsed = !sidebarCollapsed" 
                        class="hidden lg:flex items-center justify-center h-16 w-16 border-l border-gray-200 hover:bg-gray-100">
                    <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path x-show="!sidebarCollapsed" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7m8 14l-7-7 7-7" />
                        <path x-show="sidebarCollapsed" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7" />
                    </svg>
                </button>
                        </div>

                        <!-- Navigation Links - Added overflow-y-auto to make scrollable -->
            <nav class="mt-6 flex-1 overflow-y-auto" :class="{'px-3': !sidebarCollapsed, 'px-2': sidebarCollapsed}">
                <!-- Dashboard -->
                            <a href="{{ route('admin.dashboard') }}" 
                   class="flex items-center mb-2 text-gray-700 rounded-lg hover:bg-gray-100 {{ request()->routeIs('admin.dashboard') ? 'bg-blue-50 text-blue-700' : '' }}"
                   :class="{'px-4 py-3': !sidebarCollapsed, 'px-2 py-3 justify-center': sidebarCollapsed}">
                    <svg class="w-5 h-5" :class="{'mr-3': !sidebarCollapsed}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    <span x-show="!sidebarCollapsed">Dashboard</span>
                </a>

                <!-- Bookings Section -->
                <div x-data="{ open: {{ request()->routeIs('admin.bookings.*') ? 'true' : 'false' }} }" class="mb-2">
                    <button @click="open = !open" 
                            class="w-full flex items-center text-gray-700 rounded-lg hover:bg-gray-100 {{ request()->routeIs('admin.bookings.*') ? 'bg-blue-50 text-blue-700' : '' }}"
                            :class="{'px-4 py-3': !sidebarCollapsed, 'px-2 py-3 justify-center': sidebarCollapsed}">
                        <svg class="w-5 h-5" :class="{'mr-3': !sidebarCollapsed}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <span x-show="!sidebarCollapsed" class="flex-1 text-left">Bookings</span>
                        <svg x-show="!sidebarCollapsed" class="w-4 h-4 ml-2" :class="{'transform rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="open" x-collapse class="pl-4 mt-2" x-show="!sidebarCollapsed">
                        <a href="{{ route('admin.bookings.filter', 'today') }}" 
                           class="flex items-center py-2 text-sm {{ request()->fullUrl() == route('admin.bookings.filter', 'today') ? 'text-blue-700' : 'text-gray-600' }} hover:text-gray-900">
                            <span class="w-2 h-2 mr-3 rounded-full bg-blue-500"></span>
                            Today's Bookings
                        </a>
                        <a href="{{ route('admin.bookings.filter', 'confirmed') }}" 
                           class="flex items-center py-2 text-sm {{ request()->fullUrl() == route('admin.bookings.filter', 'confirmed') ? 'text-blue-700' : 'text-gray-600' }} hover:text-gray-900">
                            <span class="w-2 h-2 mr-3 rounded-full bg-green-500"></span>
                            Confirmed Bookings
                            </a>
                        <a href="{{ route('admin.bookings.filter', 'pending') }}" 
                           class="flex items-center py-2 text-sm {{ request()->fullUrl() == route('admin.bookings.filter', 'pending') ? 'text-blue-700' : 'text-gray-600' }} hover:text-gray-900">
                            <span class="w-2 h-2 mr-3 rounded-full bg-yellow-500"></span>
                            Pending Bookings
                            </a>
                        <a href="{{ route('admin.bookings.filter', 'canceled') }}" 
                           class="flex items-center py-2 text-sm {{ request()->fullUrl() == route('admin.bookings.filter', 'canceled') ? 'text-blue-700' : 'text-gray-600' }} hover:text-gray-900">
                            <span class="w-2 h-2 mr-3 rounded-full bg-red-500"></span>
                            Canceled Bookings
                        </a>
                        <a href="{{ route('admin.bookings.index') }}" 
                           class="flex items-center py-2 text-sm {{ request()->routeIs('admin.bookings.index') && !request()->route('filter') ? 'text-blue-700' : 'text-gray-600' }} hover:text-gray-900">
                            <span class="w-2 h-2 mr-3 rounded-full bg-gray-500"></span>
                            All Bookings
                            </a>
                        </div>
                    </div>

                <!-- Training Section -->
                <div x-data="{ open: {{ request()->routeIs('admin.training.*') ? 'true' : 'false' }} }" class="mb-2">
                    <button @click="open = !open" 
                            class="w-full flex items-center text-gray-700 rounded-lg hover:bg-gray-100 {{ request()->routeIs('admin.training.*') ? 'bg-blue-50 text-blue-700' : '' }}"
                            :class="{'px-4 py-3': !sidebarCollapsed, 'px-2 py-3 justify-center': sidebarCollapsed}">
                        <svg class="w-5 h-5" :class="{'mr-3': !sidebarCollapsed}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                        <span x-show="!sidebarCollapsed" class="flex-1 text-left">Training</span>
                        <svg x-show="!sidebarCollapsed" class="w-4 h-4 ml-2" :class="{'transform rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="open" x-collapse class="pl-4 mt-2" x-show="!sidebarCollapsed">
                        <a href="{{ route('admin.training.beginner') }}" 
                           class="flex items-center py-2 text-sm {{ request()->routeIs('admin.training.beginner') ? 'text-blue-700' : 'text-gray-600' }} hover:text-gray-900">
                            Beginner Training
                        </a>
                        <a href="{{ route('admin.training.advanced') }}" 
                           class="flex items-center py-2 text-sm {{ request()->routeIs('admin.training.advanced') ? 'text-blue-700' : 'text-gray-600' }} hover:text-gray-900">
                            Advanced Training
                        </a>
                        <a href="{{ route('admin.training.certification') }}" 
                           class="flex items-center py-2 text-sm {{ request()->routeIs('admin.training.certification') ? 'text-blue-700' : 'text-gray-600' }} hover:text-gray-900">
                            Certification Programs
                        </a>
                    </div>
                </div>

                <!-- Products Section -->
                <div x-data="{ open: {{ request()->routeIs('admin.products.*') ? 'true' : 'false' }} }" class="mb-2">
                    <button @click="open = !open" 
                            class="w-full flex items-center text-gray-700 rounded-lg hover:bg-gray-100 {{ request()->routeIs('admin.products.*') ? 'bg-blue-50 text-blue-700' : '' }}"
                            :class="{'px-4 py-3': !sidebarCollapsed, 'px-2 py-3 justify-center': sidebarCollapsed}">
                        <svg class="w-5 h-5" :class="{'mr-3': !sidebarCollapsed}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>
                        <span x-show="!sidebarCollapsed" class="flex-1 text-left">Products</span>
                        <svg x-show="!sidebarCollapsed" class="w-4 h-4 ml-2" :class="{'transform rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="open" x-collapse class="pl-4 mt-2" x-show="!sidebarCollapsed">
                        <!-- Hang Gliders Section -->
                        <a href="{{ route('admin.products.hang-glider') }}" 
                           class="flex items-center py-2 text-sm {{ request()->routeIs('admin.products.hang-glider') ? 'text-blue-700' : 'text-gray-600' }} hover:text-gray-900">
                            Hang Gliders
                        </a>
                        
                        <!-- Merchandise Management Section -->
                        <div class="py-1">
                            <span class="text-xs font-medium uppercase text-gray-500 py-2 block">Merchandise</span>
                            <a href="{{ route('admin.products.index') }}" 
                               class="flex items-center py-2 text-sm {{ request()->routeIs('admin.products.index') ? 'text-blue-700' : 'text-gray-600' }} hover:text-gray-900">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                                </svg>
                                All Products
                            </a>
                            <a href="{{ route('admin.products.merchandise') }}" 
                               class="flex items-center py-2 text-sm {{ request()->routeIs('admin.products.merchandise') ? 'text-blue-700' : 'text-gray-600' }} hover:text-gray-900">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                                </svg>
                                Merchandise
                            </a>
                            <a href="{{ route('admin.products.create') }}" 
                               class="flex items-center py-2 text-sm {{ request()->routeIs('admin.products.create') ? 'text-blue-700' : 'text-gray-600' }} hover:text-gray-900">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                </svg>
                                Add New Product
                            </a>
                            @if(request()->routeIs('admin.products.images.*') && isset($product))
                            <a href="{{ route('admin.products.images.index', $product->id) }}" 
                               class="flex items-center py-2 text-sm text-blue-700 hover:text-gray-900">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                Manage Images ({{ $product->name }})
                            </a>
                            @endif
                            <a href="/mad-mr-bert/merchandise" 
                               class="flex items-center py-2 text-sm text-gray-600 hover:text-gray-900" target="_blank">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                </svg>
                                View Shop Page
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Gallery Management -->
                <div x-data="{ open: {{ request()->routeIs('admin.gallery.*') ? 'true' : 'false' }} }" class="mb-2">
                    <button @click="open = !open" 
                            class="w-full flex items-center text-gray-700 rounded-lg hover:bg-gray-100 {{ request()->routeIs('admin.gallery.*') ? 'bg-blue-50 text-blue-700' : '' }}"
                            :class="{'px-4 py-3': !sidebarCollapsed, 'px-2 py-3 justify-center': sidebarCollapsed}">
                        <svg class="w-5 h-5" :class="{'mr-3': !sidebarCollapsed}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <span x-show="!sidebarCollapsed" class="flex-1 text-left">Gallery</span>
                        <svg x-show="!sidebarCollapsed" class="w-4 h-4 ml-2" :class="{'transform rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="open" x-collapse class="pl-4 mt-2" x-show="!sidebarCollapsed">
                        <a href="{{ route('admin.gallery.index') }}" 
                           class="flex items-center py-2 text-sm {{ request()->routeIs('admin.gallery.index') ? 'text-blue-700' : 'text-gray-600' }} hover:text-gray-900">
                            All Images
                        </a>
                        <a href="{{ route('admin.gallery.create') }}" 
                           class="flex items-center py-2 text-sm {{ request()->routeIs('admin.gallery.create') ? 'text-blue-700' : 'text-gray-600' }} hover:text-gray-900">
                            Upload Images
                        </a>
                        <a href="{{ route('admin.gallery.categories') }}" 
                           class="flex items-center py-2 text-sm {{ request()->routeIs('admin.gallery.categories') ? 'text-blue-700' : 'text-gray-600' }} hover:text-gray-900">
                            Categories
                        </a>
                    </div>
                </div>

                <!-- Blog Management -->
                <div x-data="{ open: {{ request()->routeIs('admin.blog-posts.*') ? 'true' : 'false' }} }" class="mb-2">
                    <button @click="open = !open" 
                            class="w-full flex items-center text-gray-700 rounded-lg hover:bg-gray-100 {{ request()->routeIs('admin.blog-posts.*') ? 'bg-blue-50 text-blue-700' : '' }}"
                            :class="{'px-4 py-3': !sidebarCollapsed, 'px-2 py-3 justify-center': sidebarCollapsed}">
                        <svg class="w-5 h-5" :class="{'mr-3': !sidebarCollapsed}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                        </svg>
                        <span x-show="!sidebarCollapsed" class="flex-1 text-left">Blog</span>
                        <svg x-show="!sidebarCollapsed" class="w-4 h-4 ml-2" :class="{'transform rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="open" x-collapse class="pl-4 mt-2" x-show="!sidebarCollapsed">
                        <a href="{{ route('admin.blog-posts.index') }}" 
                           class="flex items-center py-2 text-sm {{ request()->routeIs('admin.blog-posts.index') ? 'text-blue-700' : 'text-gray-600' }} hover:text-gray-900">
                            All Posts
                        </a>
                        <a href="{{ route('admin.blog-posts.create') }}" 
                           class="flex items-center py-2 text-sm {{ request()->routeIs('admin.blog-posts.create') ? 'text-blue-700' : 'text-gray-600' }} hover:text-gray-900">
                            Create New Post
                        </a>
                        <a href="{{ route('mad-mr-bert.blog') }}" 
                           class="flex items-center py-2 text-sm text-gray-600 hover:text-gray-900" target="_blank">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                            </svg>
                            View Blog
                        </a>
                    </div>
                </div>

                <!-- Other Navigation Items -->
                <a href="{{ route('admin.contacts.index') }}"
                   class="flex items-center mb-2 text-gray-700 rounded-lg hover:bg-gray-100 {{ request()->routeIs('admin.contacts.*') ? 'bg-blue-50 text-blue-700' : '' }}"
                   :class="{'px-4 py-3': !sidebarCollapsed, 'px-2 py-3 justify-center': sidebarCollapsed}">
                    <svg class="w-5 h-5" :class="{'mr-3': !sidebarCollapsed}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                    <span x-show="!sidebarCollapsed">Contacts</span>
                </a>

                <a href="{{ route('admin.reviews.index') }}"
                   class="flex items-center mb-2 text-gray-700 rounded-lg hover:bg-gray-100 {{ request()->routeIs('admin.reviews.*') ? 'bg-blue-50 text-blue-700' : '' }}"
                   :class="{'px-4 py-3': !sidebarCollapsed, 'px-2 py-3 justify-center': sidebarCollapsed}">
                    <svg class="w-5 h-5" :class="{'mr-3': !sidebarCollapsed}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                    </svg>
                    <span x-show="!sidebarCollapsed">Reviews</span>
                </a>

                <a href="{{ route('admin.promotional-emails.index') }}"
                   class="flex items-center mb-2 text-gray-700 rounded-lg hover:bg-gray-100 {{ request()->routeIs('admin.promotional-emails.*') ? 'bg-blue-50 text-blue-700' : '' }}"
                   :class="{'px-4 py-3': !sidebarCollapsed, 'px-2 py-3 justify-center': sidebarCollapsed}">
                    <svg class="w-5 h-5" :class="{'mr-3': !sidebarCollapsed}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                    </svg>
                    <span x-show="!sidebarCollapsed">Promotional Emails</span>
                </a>

                <!-- Orders Management -->
                <div x-data="{ open: {{ request()->routeIs('admin.orders.*') ? 'true' : 'false' }} }" class="mb-2">
                    <button @click="open = !open" 
                            class="w-full flex items-center text-gray-700 rounded-lg hover:bg-gray-100 {{ request()->routeIs('admin.orders.*') ? 'bg-blue-50 text-blue-700' : '' }}"
                            :class="{'px-4 py-3': !sidebarCollapsed, 'px-2 py-3 justify-center': sidebarCollapsed}">
                        <svg class="w-5 h-5" :class="{'mr-3': !sidebarCollapsed}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>
                        <span x-show="!sidebarCollapsed" class="flex-1 text-left">Orders</span>
                        <svg x-show="!sidebarCollapsed" class="w-4 h-4 ml-2" :class="{'transform rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="open" x-collapse class="pl-4 mt-2" x-show="!sidebarCollapsed">
                        <a href="{{ route('admin.orders.index') }}" 
                           class="flex items-center py-2 text-sm {{ request()->routeIs('admin.orders.index') && !request()->filled('status') ? 'text-blue-700' : 'text-gray-600' }} hover:text-gray-900">
                            <span class="w-2 h-2 mr-3 rounded-full bg-gray-500"></span>
                            All Orders
                        </a>
                        <a href="{{ route('admin.orders.index', ['status' => 'pending']) }}" 
                           class="flex items-center py-2 text-sm {{ request()->fullUrl() == route('admin.orders.index', ['status' => 'pending']) ? 'text-blue-700' : 'text-gray-600' }} hover:text-gray-900">
                            <span class="w-2 h-2 mr-3 rounded-full bg-yellow-500"></span>
                            Pending
                        </a>
                        <a href="{{ route('admin.orders.index', ['status' => 'processing']) }}" 
                           class="flex items-center py-2 text-sm {{ request()->fullUrl() == route('admin.orders.index', ['status' => 'processing']) ? 'text-blue-700' : 'text-gray-600' }} hover:text-gray-900">
                            <span class="w-2 h-2 mr-3 rounded-full bg-blue-500"></span>
                            Processing
                        </a>
                        <a href="{{ route('admin.orders.index', ['status' => 'shipped']) }}" 
                           class="flex items-center py-2 text-sm {{ request()->fullUrl() == route('admin.orders.index', ['status' => 'shipped']) ? 'text-blue-700' : 'text-gray-600' }} hover:text-gray-900">
                            <span class="w-2 h-2 mr-3 rounded-full bg-purple-500"></span>
                            Shipped
                        </a>
                        <a href="{{ route('admin.orders.index', ['status' => 'completed']) }}" 
                           class="flex items-center py-2 text-sm {{ request()->fullUrl() == route('admin.orders.index', ['status' => 'completed']) ? 'text-blue-700' : 'text-gray-600' }} hover:text-gray-900">
                            <span class="w-2 h-2 mr-3 rounded-full bg-green-500"></span>
                            Completed
                        </a>
                        <a href="{{ route('admin.orders.index', ['status' => 'cancelled']) }}" 
                           class="flex items-center py-2 text-sm {{ request()->fullUrl() == route('admin.orders.index', ['status' => 'cancelled']) ? 'text-blue-700' : 'text-gray-600' }} hover:text-gray-900">
                            <span class="w-2 h-2 mr-3 rounded-full bg-red-500"></span>
                            Cancelled
                        </a>
                        <a href="{{ route('admin.orders.export') }}" 
                           class="flex items-center py-2 text-sm text-gray-600 hover:text-gray-900">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            Export Orders
                        </a>
                    </div>
                </div>

                <!-- Settings -->
                <a href="{{ route('admin.settings.index') }}"
                   class="flex items-center mb-2 text-gray-700 rounded-lg hover:bg-gray-100 {{ request()->routeIs('admin.settings.*') ? 'bg-blue-50 text-blue-700' : '' }}"
                   :class="{'px-4 py-3': !sidebarCollapsed, 'px-2 py-3 justify-center': sidebarCollapsed}">
                    <svg class="w-5 h-5" :class="{'mr-3': !sidebarCollapsed}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    <span x-show="!sidebarCollapsed">Settings</span>
                </a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="transition-all duration-300 ease-in-out" :class="{'lg:pl-64': !sidebarCollapsed, 'lg:pl-16': sidebarCollapsed}">
            <!-- Top Navigation -->
            <nav class="bg-white shadow-sm">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <!-- Left side with mobile menu button -->
                        <div class="flex items-center lg:hidden">
                            <button @click="sidebarOpen = !sidebarOpen" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                </svg>
                            </button>
                        </div>

                        <!-- Center - Page Title -->
                        <div class="flex-1 flex items-center justify-center lg:justify-start">
                            <h1 class="text-xl font-semibold text-gray-800">
                                @if(request()->routeIs('admin.dashboard'))
                                    Dashboard
                                @elseif(request()->routeIs('admin.bookings.*'))
                                    Bookings
                                @elseif(request()->routeIs('admin.contacts.*'))
                                    Contacts
                                @elseif(request()->routeIs('admin.users'))
                                    Users
                                @elseif(request()->routeIs('admin.reviews.*'))
                                    Reviews
                                @elseif(request()->routeIs('admin.promotional-emails.*'))
                                    Promotional Emails
                                @elseif(request()->routeIs('admin.training.*'))
                                    Training
                                @elseif(request()->routeIs('admin.products.*'))
                                    Products
                                @elseif(request()->routeIs('admin.gallery.*'))
                                    Gallery
                                @elseif(request()->routeIs('admin.blog-posts.*'))
                                    Blog Posts
                                @elseif(request()->routeIs('admin.settings.*'))
                                    Settings
                                @elseif(request()->routeIs('admin.orders.*'))
                                    Orders
                                @endif
                            </h1>
                        </div>

                        <!-- Right side - Admin User -->
                        <div class="flex items-center">
                            <div class="relative" x-data="{ open: false }">
                                <button @click="open = !open" class="flex items-center space-x-3 px-3 py-2 text-sm leading-4 font-medium text-gray-500 hover:text-gray-700 focus:outline-none transition duration-150 ease-in-out">
                                    <!-- Admin Avatar -->
                                    <div class="h-8 w-8 rounded-full bg-blue-500 flex items-center justify-center">
                                        <span class="text-white font-medium text-sm">
                                            {{ substr(Auth::guard('admin')->user()->name, 0, 1) }}
                                        </span>
                                    </div>
                                    <!-- Admin Name -->
                                    <div class="flex items-center">
                                        <span class="mr-2">{{ Auth::guard('admin')->user()->name }}</span>
                                        <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>

                                <!-- Dropdown Menu -->
                            <div x-show="open"
                                     @click.away="open = false"
                                     class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-100"
                                     role="menu" 
                                     aria-orientation="vertical" 
                                     aria-labelledby="user-menu">
                                    <div class="py-1" role="none">
                                        <a href="{{ route('admin.settings.index') }}" 
                                           class="group flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 {{ request()->routeIs('admin.settings.*') ? 'bg-gray-100' : '' }}" 
                                           role="menuitem">
                                            <svg class="mr-3 h-5 w-5 text-gray-400 group-hover:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            </svg>
                                            Settings
                                        </a>
                                    </div>
                                    <div class="py-1" role="none">
                                    <form method="POST" action="{{ route('admin.logout') }}">
                                        @csrf
                                            <button type="submit" class="group flex w-full items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">
                                                <svg class="mr-3 h-5 w-5 text-gray-400 group-hover:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                                </svg>
                                            Log Out
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
            <main class="py-6">
            @if (session('success'))
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-6">
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                </div>
            @endif

            @if (session('error'))
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-6">
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <span class="block sm:inline">{{ session('error') }}</span>
                    </div>
                </div>
            @endif

            @yield('content')
        </main>
        </div>
    </div>

    @stack('modals')
    @stack('scripts')
</body>
</html> 