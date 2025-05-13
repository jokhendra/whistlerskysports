<nav id="main-nav" class="fixed top-0 left-0 right-0 z-50 w-full transition-all duration-300 bg-white h-16 sm:h-20 md:h-24 shadow-md">
    <div class="flex items-center justify-between px-4 sm:px-6 md:px-8 w-full h-full">
        <!-- Logo -->
        <div class="flex-shrink-0 flex items-center">
            <a href="/" class="flex items-center">
                <img src="{{ asset('images/logo/logo.png') }}" 
                     class="h-6 sm:h-8 md:h-10 transition-all duration-300 hover:scale-105" 
                     alt="WhistlerSkySports Logo" />
            </a>
        </div>
        
        <!-- Mobile Menu Button -->
        <button id="mobile-menu-btn" type="button" 
                class="md:hidden p-2 rounded-md text-gray-700 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 transition-all" 
                aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>
        
        <!-- Navigation Menu -->
        <div id="navbar-default" class="hidden md:flex md:items-center md:space-x-2 lg:space-x-4 xl:space-x-6">
            <ul class="flex flex-col md:flex-row space-y-2 md:space-y-0">
                @php
                    $navItems = [
                        ['url' => '/', 'text' => 'Home'],
                        ['url' => '/about', 'text' => 'About Us'],
                        ['url' => '/gallery', 'text' => 'Gallery'],
                        ['url' => '/review', 'text' => 'Reviews'],
                        ['url' => '/weather', 'text' => 'Weather'],
                        ['url' => '/faq', 'text' => 'FAQ'],
                        ['url' => '/contact', 'text' => 'Contact Us'],
                        ['url' => '/pricing', 'text' => 'Pricing']
                    ];
                @endphp

                @foreach($navItems as $item)
                    <li>
                        <a href="{{ $item['url'] }}" class="block px-3 py-2 text-gray-900 font-medium rounded hover:text-blue-600 transition-colors duration-200 whitespace-nowrap relative group">
                            {{ $item['text'] }}
                            <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-600 transition-all duration-300 group-hover:w-full"></span>
                        </a>
                    </li>
                @endforeach
                
                <!-- Learn To Fly Dropdown -->
                <li class="relative group">
                    <button type="button" 
                            class="flex items-center px-3 py-2 ml-2 text-base md:text-lg font-medium text-[#0F1B2A] bg-[#FED600] rounded-full hover:bg-[#b78b4d] hover:text-gray-200 transform hover:scale-102 transition-all duration-300 shadow-md hover:shadow-xl relative overflow-hidden group whitespace-nowrap"
                            aria-haspopup="true" aria-expanded="false">
                        <span class="relative z-10">Learn To Fly</span>
                        <svg class="w-4 h-4 ml-1 relative z-10" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg>
                        <div class="absolute inset-0 bg-[#c05300] transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></div>
                    </button>
                    <div class="hidden group-hover:block absolute right-0 w-56 lg:w-64 xl:w-72 bg-white rounded-lg shadow-lg border border-gray-200 mt-1 overflow-hidden transition-opacity duration-200">
                        <ul class="py-1">
                            <li>
                                <a href="/booking?type=microlight" class="flex items-center px-4 py-3 text-base text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors duration-200">
                                    <img src="{{ asset('images/logo/open-cockpit.ico') }}" class="w-5 h-5 mr-3" alt="Open Cockpit">
                                    <div>
                                        <div class="font-medium">Open Cockpit Weight Shift Trike</div>
                                        <div class="text-sm text-gray-500">Experience the freedom of flight</div>
                                    </div>
                                    <svg class="w-4 h-4 ml-auto text-blue-500 opacity-0 group-hover:opacity-100 transition-opacity duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="/booking?type=gyrocopter" class="flex items-center px-4 py-3 text-base text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors duration-200">
                                    <img src="{{ asset('images/logo/fixed_wings.ico') }}" class="w-5 h-5 mr-3" alt="Fixed Wing">
                                    <div>
                                        <div class="font-medium">Fixed Wing Advanced Ultralight</div>
                                        <div class="text-sm text-gray-500">Master the art of aviation</div>
                                    </div>
                                    <svg class="w-4 h-4 ml-auto text-blue-500 opacity-0 group-hover:opacity-100 transition-opacity duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- MAD Mr Bert -->
                <li>
                    <a href="/mad-mr-bert" class="block px-3 py-2 text-[rgb(241,97,98,1)] font-bold italic tracking-wider rounded hover:text-[rgb(241,97,98,0.8)] transition-colors duration-200 whitespace-nowrap relative group">
                        MAD Mr Bert's
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-[rgb(241,97,98,1)] transition-all duration-300 group-hover:w-full"></span>
                    </a>
                </li>
                
                @php
                    $cartItemCount = 0;
                    if (session()->has('cart_id')) {
                        $cart = \App\Models\Cart::find(session('cart_id'));
                        if ($cart) {
                            $cartItemCount = $cart->items->sum('quantity');
                        }
                    } elseif (auth()->check()) {
                        $cart = \App\Models\Cart::where('user_id', auth()->id())
                            ->where('status', 'active')
                            ->first();
                        if ($cart) {
                            $cartItemCount = $cart->items->sum('quantity');
                        }
                    }
                @endphp
                
                @if(auth()->check())
                <!-- User Profile Dropdown -->
                <li class="relative group ml-2">
                    <button type="button" 
                            class="flex items-center px-3 py-2 text-white font-medium bg-[#204fb4] hover:bg-gray-800 rounded-full transition-colors duration-200"
                            aria-haspopup="true" aria-expanded="false">
                        <span class="mr-1 font-medium">{{ auth()->user()->name }}</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                        <span class="cart-count absolute -top-1 -right-1 bg-[rgb(241,97,98)] text-white text-xs font-bold px-1.5 py-0.5 rounded-full {{ $cartItemCount == 0 ? 'hidden' : '' }}">
                            {{ $cartItemCount }}
                        </span>
                    </button>
                    <div class="hidden group-hover:block absolute right-0 w-48 bg-white rounded-lg shadow-lg border border-gray-200 mt-1 z-50">
                        <ul class="py-1">
                            <li class="px-4 py-3 border-b border-gray-100">
                                <div class="font-medium text-gray-900">{{ auth()->user()->name }}</div>
                                <div class="text-sm text-gray-500">{{ auth()->user()->email }}</div>
                            </li>
                            <li>
                                <a href="{{ route('mad-mr-bert.cart') }}" class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                    </svg>
                                    My Cart
                                    <span class="ml-auto bg-[rgb(241,97,98)] text-white text-xs font-bold px-1.5 py-0.5 rounded-full cart-count {{ $cartItemCount == 0 ? 'hidden' : '' }}">
                                        {{ $cartItemCount }}
                                    </span>
                                </a>
                            </li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="flex w-full items-center px-4 py-2 text-gray-700 hover:bg-gray-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                        </svg>
                                        Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </li>
                @else
                <!-- Login Link for Guests (No Cart Icon, No Register) -->
                <li>
                    <a href="{{ route('login') }}" class="flex items-center px-3 py-2 font-medium text-gray-800">
                        Login
                    </a>
                </li>
                @endif
            </ul>
        </div>
    </div>
    
    <!-- Mobile Menu (Hidden by default) -->
    <div id="mobile-menu" class="hidden md:hidden bg-white shadow-xl">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            @foreach($navItems as $item)
                <a href="{{ $item['url'] }}" class="block px-3 py-2 text-base font-medium text-gray-900 hover:bg-gray-100 rounded-md">
                    {{ $item['text'] }}
                </a>
            @endforeach
            
            <!-- Mobile Dropdown -->
            <div class="pt-2">
                <button type="button" id="mobile-dropdown-btn" 
                        class="w-full flex justify-between items-center px-3 py-2 text-base font-medium text-gray-900 hover:bg-gray-100 rounded-md"
                        aria-expanded="false">
                    Learn To Fly
                    <svg class="w-5 h-5 text-gray-500 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div id="mobile-dropdown" class="hidden pl-4 mt-1 space-y-1">
                    <a href="/booking?type=microlight" class="block px-3 py-2 text-sm font-medium text-gray-600 hover:bg-gray-100 rounded-md">
                        Open Cockpit Weight Shift Trike
                    </a>
                    <a href="/booking?type=gyrocopter" class="block px-3 py-2 text-sm font-medium text-gray-600 hover:bg-gray-100 rounded-md">
                        Fixed Wing Advanced Ultralight
                    </a>
                </div>
            </div>
            
            <!-- MAD Mr Bert's Link (Mobile) -->
            <a href="/mad-mr-bert" class="block px-3 py-2 text-base font-medium text-[rgb(241,97,98,1)] italic hover:bg-gray-100 rounded-md mt-2">
                MAD Mr Bert's
            </a>
            
            @if(auth()->check())
            <!-- User Info (Mobile) -->
            <div class="px-3 py-2 mt-2 border-t border-gray-200">
                <div class="flex items-center py-2 px-3 bg-[#12161c] text-white rounded-md">
                    <div class="flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <div class="text-base font-medium text-white">{{ auth()->user()->name }}</div>
                        <div class="text-sm font-medium text-blue-100">{{ auth()->user()->email }}</div>
                    </div>
                </div>
            </div>
            
            <!-- Shopping Cart Link (Mobile) for Logged In Users -->
            <a href="{{ route('mad-mr-bert.cart') }}" class="flex items-center justify-between px-3 py-2 text-base font-medium text-gray-900 hover:bg-gray-100 rounded-md">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                    My Cart
                </div>
                <span class="cart-count-mobile bg-[rgb(241,97,98)] text-white text-xs font-bold px-2 py-1 rounded-full {{ $cartItemCount == 0 ? 'hidden' : '' }}">
                    {{ $cartItemCount }}
                </span>
            </a>
            
            <!-- Logout Link (Mobile) -->
            <form method="POST" action="{{ route('logout') }}" class="mt-2">
                @csrf
                <button type="submit" class="flex w-full items-center px-3 py-2 text-base font-medium text-gray-900 hover:bg-gray-100 rounded-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    Logout
                </button>
            </form>
            @else
            <!-- Login Link (Mobile) for Guests (No Cart Icon, No Register) -->
            <a href="{{ route('login') }}" class="block px-3 py-2 text-white font-medium bg-[#204fb4] hover:bg-gray-800 rounded-full mx-2 my-2 text-center">
                Login
            </a>
            @endif
        </div>
    </div>
</nav>

<!-- Add padding to account for the navbar height -->
<div class=""></div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const menuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        const dropdownBtn = document.querySelector('.group > button[aria-haspopup="true"]');
        const dropdownMenu = dropdownBtn ? dropdownBtn.nextElementSibling : null;
        const mobileDropdownBtn = document.getElementById('mobile-dropdown-btn');
        const mobileDropdown = document.getElementById('mobile-dropdown');
        const nav = document.getElementById('main-nav');

        // Toggle mobile menu
        if (menuBtn && mobileMenu) {
            menuBtn.addEventListener('click', function() {
                const isExpanded = this.getAttribute('aria-expanded') === 'true';
                this.setAttribute('aria-expanded', !isExpanded);
                mobileMenu.classList.toggle('hidden');
                document.body.classList.toggle('overflow-hidden', !isExpanded);
                
                // Close dropdown if open
                if (!mobileDropdown.classList.contains('hidden')) {
                    mobileDropdown.classList.add('hidden');
                    mobileDropdownBtn.setAttribute('aria-expanded', 'false');
                }
            });
        }

        // Desktop dropdown functionality
        if (dropdownBtn && dropdownMenu) {
            // Show on hover/focus
            dropdownBtn.addEventListener('mouseenter', () => {
                dropdownMenu.classList.remove('hidden');
                dropdownBtn.setAttribute('aria-expanded', 'true');
            });
            
            dropdownBtn.addEventListener('focus', () => {
                dropdownMenu.classList.remove('hidden');
                dropdownBtn.setAttribute('aria-expanded', 'true');
            });
            
            // Hide when leaving
            const hideDropdown = () => {
                dropdownMenu.classList.add('hidden');
                dropdownBtn.setAttribute('aria-expanded', 'false');
            };
            
            dropdownBtn.addEventListener('mouseleave', hideDropdown);
            dropdownBtn.addEventListener('blur', hideDropdown);
            
            // Keep dropdown open when hovering over it
            dropdownMenu.addEventListener('mouseenter', () => {
                dropdownMenu.classList.remove('hidden');
            });
            
            dropdownMenu.addEventListener('mouseleave', hideDropdown);
        }

        // Mobile dropdown functionality
        if (mobileDropdownBtn && mobileDropdown) {
            mobileDropdownBtn.addEventListener('click', function() {
                const isExpanded = this.getAttribute('aria-expanded') === 'true';
                this.setAttribute('aria-expanded', !isExpanded);
                mobileDropdown.classList.toggle('hidden');
                
                // Rotate arrow icon
                const icon = this.querySelector('svg');
                icon.classList.toggle('transform');
                icon.classList.toggle('rotate-180');
            });
        }

        // Close mobile menu when clicking outside
        document.addEventListener('click', function(event) {
            if (mobileMenu && !mobileMenu.contains(event.target) && 
                menuBtn && !menuBtn.contains(event.target) &&
                !mobileMenu.classList.contains('hidden')) {
                mobileMenu.classList.add('hidden');
                menuBtn.setAttribute('aria-expanded', 'false');
                document.body.classList.remove('overflow-hidden');
            }
        });

        // Add shadow on scroll
        if (nav) {
            let lastScroll = 0;
            window.addEventListener('scroll', function() {
                const currentScroll = window.scrollY;
                
                // Only add/remove shadow if crossing the threshold
                if (currentScroll > 50 && lastScroll <= 50) {
                    nav.classList.add('shadow-lg');
                } else if (currentScroll <= 50 && lastScroll > 50) {
                    nav.classList.remove('shadow-lg');
                }
                
                lastScroll = currentScroll;
            });
        }

        // Handle window resize
        function handleResize() {
            if (window.innerWidth >= 768) {
                if (mobileMenu && !mobileMenu.classList.contains('hidden')) {
                    mobileMenu.classList.add('hidden');
                    document.body.classList.remove('overflow-hidden');
                    if (menuBtn) menuBtn.setAttribute('aria-expanded', 'false');
                }
            }
        }
        
        window.addEventListener('resize', handleResize);
    });
</script>