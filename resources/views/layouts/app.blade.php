<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $settings['site_name'] ?? 'WhistlerSkySports' }}</title>
    <!-- SEO Meta Tags -->
    <meta name="description" content="{{ $settings['meta_description'] ?? 'Whistler Sky Sports - Experience the thrill of flight with our ultralight aircraft training and tours in Whistler, BC.' }}">
    <meta name="keywords" content="{{ $settings['meta_keywords'] ?? 'ultralight aircraft, flight training, Whistler, aviation, sky sports, flying lessons, aircraft tours' }}">
    <!-- Preload background image -->
    <link rel="preload" href="{{ asset('images/Background/Whistler-Sky-Sports_Sky-Background.png') }}" as="image" media="(min-width: 768px)" fetchpriority="high" importance="high">
    <!-- Google Fonts - Roboto Slab -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        [x-cloak] { 
            display: none !important; 
        }
        
        /* Apply Roboto Slab to headings */
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Roboto Slab', serif;
        }
    </style>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @stack('styles')
    
    <!-- Image preloading script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Preload background image
            const bgImagePreloader = new Image();
            bgImagePreloader.src = "{{ asset('images/Background/Whistler-Sky-Sports_Sky-Background.png') }}";
            bgImagePreloader.onload = function() {
                document.querySelector('.nav-bg-image').classList.add('bg-loaded');
            };
        });
    </script>
</head>
<body>
    @include('common.nav')
    
    @yield('content')
    
    @include('common.footer')
    
    <x-chat-bot />
    
    <script src="{{ asset('js/smooth-scroll.js') }}"></script>
    
    <!-- Cart Update Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Make this function global so it can be called from other scripts
            window.updateCartCountDisplay = function(count) {
                console.log('Updating cart count display to:', count);
                
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
            };
            
            // Fetch current cart count - works for both guests and logged-in users
            fetch('{{ route("mad-mr-bert.cart-count") }}', {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.updateCartCountDisplay(data.cart_count);
                }
            })
            .catch(error => {
                console.error('Error fetching cart count:', error);
            });
        });
    </script>
    
    @stack('scripts')
</body>
</html> 