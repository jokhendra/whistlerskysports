    <nav id="main-nav" class="fixed top-0 left-0 right-0 z-50 w-full transition-all duration-300 bg-[#ffffff] h-16 sm:h-20 md:h-24 lg:h-28 xl:h-32">
        <div class="flex flex-wrap items-center justify-between p-1.5 sm:p-2 md:p-3 lg:p-4 w-full h-full">
            <!-- Logo -->
            <div class="w-[25%] sm:w-[20%] md:w-[18%] lg:w-[15%] xl:w-[12%] flex items-center">
                <a href="/" class="flex items-center pl-1 sm:pl-2 md:pl-3 lg:pl-4 xl:pl-6">
                    <img src="{{ asset('images/logo/logo.png') }}" class="h-5 sm:h-6 md:h-8 lg:h-10 xl:h-12 mr-1 sm:mr-2 md:mr-3" alt="WhistlerSkySports Logo" />
                </a>
            </div>
            
            <!-- Navigation Menu -->
            <div class="w-[75%] sm:w-[80%] md:w-[82%] lg:w-[85%] xl:w-[88%] flex justify-end items-center pr-1 sm:pr-2 md:pr-3 lg:pr-4 xl:pr-6">
                <!-- Mobile Menu Button -->
                <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-1.5 sm:p-2 w-7 h-7 sm:w-8 sm:h-8 justify-center text-sm text-gray-700 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200" aria-controls="navbar-default" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-4 h-4 sm:w-5 sm:h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                    </svg>
                </button>
                
                <!-- Navigation Links -->
                <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                    <ul class="font-medium flex flex-col p-2 sm:p-3 md:p-0 mt-2 sm:mt-3 rounded-lg md:flex-row md:space-x-1 lg:space-x-2 xl:space-x-4 2xl:space-x-6 md:mt-0 md:border-0 absolute md:relative left-0 right-0 top-[50px] sm:top-[60px] md:top-0 md:shadow-none shadow-lg z-40 md:items-center bg-white md:bg-transparent">
                        <!-- Main Navigation Items -->
                        @php
                            $navItems = [
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
                                <a href="{{ $item['url'] }}" class="flex items-center py-1.5 sm:py-2 pl-2 sm:pl-3 pr-2 sm:pr-4 text-[#0F1B2A] text-xs sm:text-sm md:text-base font-bold rounded hover:text-[#12161c] transition-all duration-300 whitespace-nowrap">
                                    <span class="relative inline-block group">
                                        {{ $item['text'] }}
                                        <span class="absolute bottom-[-3px] sm:bottom-[-4px] left-0 w-0 h-[1px] sm:h-[2px] bg-yellow-500 transition-all duration-300 group-hover:w-full"></span>
                                    </span>
                                </a>
                            </li>
                        @endforeach
                        
                        <!-- Learn To Fly Dropdown -->
                        <li class="md:ml-1 lg:ml-2 xl:ml-4 relative group">
                            <a href="#" class="flex items-center py-1.5 sm:py-2 pl-2 sm:pl-3 pr-2 sm:pr-4 text-[#0F1B2A] text-xs sm:text-sm md:text-base font-bold rounded-full bg-[#FED600] hover:bg-[#b78b4d] hover:text-gray-200 transform hover:scale-102 transition-all duration-300 shadow-md hover:shadow-xl relative overflow-hidden group whitespace-nowrap">
                                <span class="relative z-10">Learn To Fly</span>
                                <svg class="w-2.5 h-2.5 sm:w-3 sm:h-3 md:w-4 md:h-4 ml-1 sm:ml-2 relative z-10" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                </svg>
                                <div class="absolute inset-0 bg-[#c05300] transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></div>
                            </a>
                            <div class="hidden group-hover:block absolute right-0 w-40 sm:w-48 md:w-56 lg:w-64 xl:w-72 bg-gradient-to-br from-white to-gray-50 rounded-xl shadow-2xl border border-gray-100 transform transition-all duration-300 mt-1 overflow-hidden">
                                <div class="absolute -top-2 left-0 right-0 h-2 bg-transparent"></div>
                                <div class="absolute inset-0 bg-gradient-to-br from-blue-50/30 via-transparent to-yellow-50/30 opacity-50"></div>
                                <ul class="py-1 sm:py-2 relative z-10">
                                    <li class="group/item">
                                        <a href="/booking?type=microlight" class="flex items-center px-3 sm:px-4 md:px-5 lg:px-6 py-1.5 sm:py-2 md:py-3 text-xs sm:text-sm md:text-base text-gray-700 hover:bg-gradient-to-r hover:from-blue-50 hover:to-transparent group-hover/item:text-blue-600 transition-all duration-300">
                                            <span class="relative overflow-hidden">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 sm:w-4 sm:h-4 md:w-5 md:h-5 mr-1.5 sm:mr-2 md:mr-3 inline-block transform transition-transform group-hover/item:scale-110" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                                                </svg>
                                                <span class="font-bold text-xs sm:text-sm md:text-base">Open Cockpit Weight Shift Trike</span>
                                                <span class="block text-[10px] sm:text-xs md:text-sm text-gray-500 font-normal">Experience the freedom of flight</span>
                                            </span>
                                            <span class="ml-auto opacity-0 group-hover/item:opacity-100 transform translate-x-2 group-hover/item:translate-x-0 transition-all duration-300">→</span>
                                        </a>
                                    </li>
                                    <li class="group/item">
                                        <a href="/booking?type=gyrocopter" class="flex items-center px-3 sm:px-4 md:px-5 lg:px-6 py-1.5 sm:py-2 md:py-3 text-xs sm:text-sm md:text-base text-gray-700 hover:bg-gradient-to-r hover:from-blue-50 hover:to-transparent group-hover/item:text-blue-600 transition-all duration-300">
                                            <span class="relative overflow-hidden">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 sm:w-4 sm:h-4 md:w-5 md:h-5 mr-1.5 sm:mr-2 md:mr-3 inline-block transform transition-transform group-hover/item:scale-110" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.636 18.364a9 9 0 010-12.728m12.728 0a9 9 0 010 12.728m-9.9-2.829a5 5 0 010-7.07m7.072 0a5 5 0 010 7.07M13 12a1 1 0 11-2 0 1 1 0 012 0z"/>
                                                </svg>
                                                <span class="font-bold text-xs sm:text-sm md:text-base">Fixed Wing Advanced Ultralight</span>
                                                <span class="block text-[10px] sm:text-xs md:text-sm text-gray-500 font-normal">Master the art of aviation</span>
                                            </span>
                                            <span class="ml-auto opacity-0 group-hover/item:opacity-100 transform translate-x-2 group-hover/item:translate-x-0 transition-all duration-300">→</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    
    <!-- Add padding to account for the navbar height -->
    <div class="pt-16 sm:pt-20 md:pt-24 lg:pt-28 xl:pt-32"></div>

    <script>
        // Toggle mobile menu
        document.addEventListener('DOMContentLoaded', function() {
            const button = document.querySelector('[data-collapse-toggle="navbar-default"]');
            const menu = document.getElementById('navbar-default');
            const body = document.body;
            
            if (button && menu) {
                button.addEventListener('click', function() {
                    menu.classList.toggle('hidden');
                    body.classList.toggle('overflow-hidden');
                });
            }
            
            // Mobile dropdown functionality
            if (window.innerWidth < 768) {
                const dropdownParents = document.querySelectorAll('.group');
                
                dropdownParents.forEach(parent => {
                    const link = parent.querySelector('a');
                    const dropdown = parent.querySelector('div');
                    
                    if (link && dropdown) {
                        link.addEventListener('click', function(e) {
                            e.preventDefault();
                            e.stopPropagation();
                            dropdown.classList.toggle('hidden');
                        });
                    }
                });
                
                // Close dropdowns when clicking outside
                document.addEventListener('click', function(event) {
                    const dropdowns = document.querySelectorAll('.group div');
                    dropdowns.forEach(dropdown => {
                        if (!dropdown.parentElement.contains(event.target)) {
                            dropdown.classList.add('hidden');
                        }
                    });
                });
            }

            // Handle window resize
            let resizeTimer;
            window.addEventListener('resize', function() {
                clearTimeout(resizeTimer);
                resizeTimer = setTimeout(function() {
                    if (window.innerWidth >= 768) {
                        menu.classList.add('hidden');
                        body.classList.remove('overflow-hidden');
                    }
                }, 250);
            });
        });

        // Add shadow to navbar on scroll
        document.addEventListener('DOMContentLoaded', function() {
            const nav = document.getElementById('main-nav');
            
            if (nav) {
                window.addEventListener('scroll', function() {
                    if (window.scrollY > 50) {
                        nav.classList.add('shadow-md');
                    } else {
                        nav.classList.remove('shadow-md');
                    }
                });
            }
        });
    </script>
