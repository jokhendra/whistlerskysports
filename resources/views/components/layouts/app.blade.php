<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $meta['title'] ?? config('app.name') }}</title>
    <meta name="description" content="{{ $meta['description'] ?? '' }}">
    <meta name="keywords" content="{{ $meta['keywords'] ?? '' }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ $meta['title'] ?? config('app.name') }}">
    <meta property="og:description" content="{{ $meta['description'] ?? '' }}">
    <meta property="og:image" content="{{ asset($meta['og_image'] ?? '/images/og-default.jpg') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="{{ $meta['title'] ?? config('app.name') }}">
    <meta property="twitter:description" content="{{ $meta['description'] ?? '' }}">
    <meta property="twitter:image" content="{{ asset($meta['twitter_image'] ?? '/images/twitter-default.jpg') }}">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Structured Data -->
    @if(isset($structuredData))
    <script type="application/ld+json">
        {!! json_encode($structuredData) !!}
    </script>
    @endif
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        <div class="flex">
            <!-- Sidebar -->
            <div class="w-64 min-h-screen bg-white shadow-lg">
                <div class="p-4">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center">
                        <x-application-logo class="h-8 w-auto fill-current text-gray-800" />
                        <span class="ml-2 text-xl font-semibold">Admin Panel</span>
                    </a>
                </div>
                <nav class="mt-4">
                    <a href="{{ route('admin.dashboard') }}" 
                       class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100 {{ request()->routeIs('admin.dashboard') ? 'bg-gray-100' : '' }}">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                        Dashboard
                    </a>
                    <a href="{{ route('admin.logout') }}" 
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                       class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                        </svg>
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="hidden">
                        @csrf
                    </form>
                </nav>
            </div>

            <!-- Main Content -->
            <div class="flex-1">
                <main class="p-6">
                    {{ $slot }}
                </main>
            </div>
        </div>
        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>

        @include('layouts.footer')
    </div>
</body>
</html> 