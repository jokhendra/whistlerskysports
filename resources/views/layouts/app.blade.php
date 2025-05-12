<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>WhistlerSkySports</title>
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