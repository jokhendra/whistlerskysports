<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Power Hang Glider</title>
    <style>
        [x-cloak] { 
            display: none !important; 
        }
    </style>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @stack('styles')
</head>
<body>
    @include('common.nav')
    
    @yield('content')
    
    @include('common.footer')
    
    <x-chat-bot />
    
    <script src="{{ asset('js/smooth-scroll.js') }}"></script>
    @stack('scripts')
</body>
</html> 