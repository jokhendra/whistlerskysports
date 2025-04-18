<!DOCTYPE html>
<html lang="en">
@include('common.header')
<body>
    <nav id="main-nav" class="fixed top-0 left-0 right-0 z-50 transition-all duration-300 bg-gradient-to-br from-blue-900 via-[#005CBB] to-blue-800 text-white h-32">
        <div class="flex flex-wrap items-center justify-between p-4 w-full h-full">
            <div class="sm:w-[20%] md:w-[25%] lg:w-[15%] flex items-center">
                <a href="/" class="flex items-center pl-[15px] sm:pl-[25px] md:pl-[50px] lg:pl-[75px]">
                    <img src="{{ asset('images/logo/Alpine.logo.webp') }}" class="h-8 sm:h-10 md:h-12 mr-3 rounded-4xl" alt="Alpine Air Adventures Logo" />
                    <!-- <span class="self-center text-2xl font-bold whitespace-nowrap text-white dark:text-white">
                        <span class="text-sky-200">Alpine</span> Air <span class="text-emerald-300">Adventures</span>
                    </span> -->
                </a>
            </div>
            
            <div class="sm:w-[60%] md:w-[75%] lg:w-[75%] flex justify-end items-center pr-[15px] sm:pr-[25px] md:pr-[50px] lg:pr-[75px]">
                <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-300 rounded-lg md:hidden hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-700" aria-controls="navbar-default" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                    </svg>
                </button>
                <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                    <ul class="font-medium flex flex-col p-4 md:p-0 mt-3 rounded-lg md:flex-row md:space-x-4 lg:space-x-8 md:mt-0 md:border-0 absolute md:relative left-0 right-0 top-[60px] md:top-0 md:shadow-none shadow-lg z-40 md:items-center">
                        <li>
                            <a href="/" class="flex items-center py-2 pl-3 pr-4 text-gray-300 font-bold rounded hover:text-white transition-all duration-300" aria-current="page">
                                <span class="relative inline-block group">
                                    Welcome
                                    <span class="absolute bottom-[-4px] left-0 w-0 h-[2px] bg-yellow-500 transition-all duration-300 group-hover:w-full"></span>
                                </span>
                            </a>
                        </li>
                        <!-- <li class="relative group">
                            <a href="#" class="flex items-center w-full py-2 pl-3 pr-4 text-white rounded hover:bg-blue-700 md:hover:bg-transparent md:border-0 md:hover:text-emerald-300 md:p-0 md:w-auto dark:text-white md:dark:hover:text-blue-500 dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                </svg>
                                Products <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                </svg>
                            </a>
                            <div class="z-10 hidden group-hover:block md:group-hover:block absolute font-normal bg-white divide-y divide-gray-100 rounded-lg shadow-lg w-48 dark:bg-gray-700 dark:divide-gray-600 border border-blue-200 transition-all duration-300">
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-400">
                                    <li>
                                        <a href="/products/gliders" class="block px-4 py-2 hover:bg-blue-50 hover:text-blue-700 dark:hover:bg-gray-600 dark:hover:text-white">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z" />
                                            </svg>
                                            Hang Gliders
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/products/motors" class="block px-4 py-2 hover:bg-blue-50 hover:text-blue-700 dark:hover:bg-gray-600 dark:hover:text-white">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                            Motors
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/products/accessories" class="block px-4 py-2 hover:bg-blue-50 hover:text-blue-700 dark:hover:bg-gray-600 dark:hover:text-white">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                                            </svg>
                                            Accessories
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/products/parts" class="block px-4 py-2 hover:bg-blue-50 hover:text-blue-700 dark:hover:bg-gray-600 dark:hover:text-white">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                                            </svg>
                                            Spare Parts
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li> -->
                        <!-- <li class="relative group">
                            <a href="#" class="flex items-center py-2 pl-3 pr-4 text-gray-300 font-bold rounded hover:text-white transition-all duration-300">
                                <span class="relative inline-block group flex items-center">
                                    Training
                                    <svg class="w-4 h-4 ml-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                    </svg>
                                    <span class="absolute bottom-0 left-0 w-0 h-[1px] bg-white transition-all duration-300 group-hover:w-full"></span>
                                </span>
                            </a>
                            <div class="z-10 hidden group-hover:block md:group-hover:block absolute font-normal bg-black divide-y divide-gray-800 rounded-lg shadow-lg w-48 border border-gray-700 transition-all duration-300">
                                <ul class="py-2 text-sm text-gray-300">
                                    <li>
                                        <a href="/training/beginner" class="flex items-center px-4 py-2 font-bold hover:bg-gray-800 hover:text-white transition-all duration-300">
                                            <span class="relative inline-block group">
                                                Beginner Courses
                                                <span class="absolute bottom-0 left-0 w-0 h-[1px] bg-white transition-all duration-300 group-hover:w-full"></span>
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/training/advanced" class="flex items-center px-4 py-2 font-bold hover:bg-gray-800 hover:text-white transition-all duration-300">
                                            <span class="relative inline-block group">
                                                Advanced Training
                                                <span class="absolute bottom-0 left-0 w-0 h-[1px] bg-white transition-all duration-300 group-hover:w-full"></span>
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/training/certification" class="flex items-center px-4 py-2 font-bold hover:bg-gray-800 hover:text-white transition-all duration-300">
                                            <span class="relative inline-block group">
                                                Certification
                                                <span class="absolute bottom-0 left-0 w-0 h-[1px] bg-white transition-all duration-300 group-hover:w-full"></span>
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li> -->
                        <li>
                            <a href="/gallery" class="flex items-center py-2 pl-3 pr-4 text-gray-300 font-bold rounded hover:text-white transition-all duration-300">
                                <span class="relative inline-block group">
                                    Gallery
                                    <span class="absolute bottom-[-4px] left-0 w-0 h-[2px] bg-yellow-500 transition-all duration-300 group-hover:w-full"></span>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="/contact" class="flex items-center py-2 pl-3 pr-4 text-gray-300 font-bold rounded hover:text-white transition-all duration-300">
                                <span class="relative inline-block group">
                                    Contact Us
                                    <span class="absolute bottom-[-4px] left-0 w-0 h-[2px] bg-yellow-500 transition-all duration-300 group-hover:w-full"></span>
                                </span>
                            </a>
                        </li>
                        <!-- <li>
                            <a href="/about" class="block py-2 pl-3 pr-4 text-white rounded hover:bg-blue-700 md:hover:bg-transparent md:border-0 md:hover:text-emerald-300 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                About
                            </a>
                        </li> -->
                        <li>
                            <a href="/weather" class="flex items-center py-2 pl-3 pr-4 text-gray-300 font-bold rounded hover:text-white transition-all duration-300">
                                <span class="relative inline-block group">
                                    Weather
                                    <span class="absolute bottom-[-4px] left-0 w-0 h-[2px] bg-yellow-500 transition-all duration-300 group-hover:w-full"></span>
                                </span>
                            </a>
                        </li>
                        <li class="md:ml-4">
                            <a href="/booking" class="flex items-center py-3 pl-5 pr-4 text-[#005CBB] font-bold rounded-full bg-[#FED600] hover:bg-[#b78b4d] hover:text-gray-200 transform hover:scale-102 transition-all duration-300 shadow-md hover:shadow-xl relative overflow-hidden group">
                                <span class="relative z-10">Book Now</span>
                                <div class="absolute inset-0 bg-[#c05300] transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    
    <!-- Add padding to account for the increased navbar height -->
    <div class="pt-10"></div>

    <script>
        // Toggle mobile menu
        document.addEventListener('DOMContentLoaded', function() {
            const button = document.querySelector('[data-collapse-toggle="navbar-default"]');
            const menu = document.getElementById('navbar-default');
            
            button.addEventListener('click', function() {
                menu.classList.toggle('hidden');
            });
            
            // Mobile dropdown functionality (touch devices)
            if (window.innerWidth < 768) {
                const dropdownParents = document.querySelectorAll('.group');
                
                dropdownParents.forEach(parent => {
                    const link = parent.querySelector('a');
                    const dropdown = parent.querySelector('div');
                    
                    link.addEventListener('click', function(e) {
                        e.preventDefault();
                        e.stopPropagation();
                        dropdown.classList.toggle('hidden');
                    });
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
        });

        document.addEventListener('DOMContentLoaded', function() {
            const nav = document.getElementById('main-nav');
            
            window.addEventListener('scroll', function() {
                if (window.scrollY > 100) {
                    // When scrolled down, add shadow
                    nav.classList.add('shadow-md');
                } else {
                    // When at top, remove shadow
                    nav.classList.remove('shadow-md');
                }
            });
        });
    </script>

    <style>
    /* Remove all cloud animation styles */
    </style>
</body>
</html>