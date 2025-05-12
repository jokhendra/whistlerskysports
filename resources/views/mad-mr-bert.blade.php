@extends('layouts.app')

@section('content')
<!-- Hero Section with Parallax and Animation -->
<div class="relative bg-gradient-to-b from-[rgb(241,97,98)] to-[rgb(200,60,60)] text-white py-12 sm:py-16 md:py-20 lg:mt-24 md:mt-24 mt-16 overflow-hidden">
    <!-- Animated Background Elements -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="cloud cloud-1 absolute top-10 left-[5%] w-16 h-8 bg-white opacity-20 rounded-full"></div>
        <div class="cloud cloud-2 absolute top-20 left-[25%] w-24 h-10 bg-white opacity-10 rounded-full"></div>
        <div class="cloud cloud-3 absolute top-5 right-[15%] w-20 h-8 bg-white opacity-15 rounded-full"></div>
        <div class="plane absolute top-[30%] left-[5%] transform -rotate-12 opacity-20">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-16 h-16 fill-white">
                <path d="M22 16.5H8.3c-.2 0-.3 0-.5-.1l-6.7-3.9c-.3-.2-.5-.5-.5-.9 0-.4.2-.7.5-.9l6.7-3.9c.2-.1.3-.1.5-.1H22c.6 0 1 .4 1 1v8c0 .5-.4.8-1 .8z"/>
            </svg>
        </div>
    </div>
    
    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-3xl mx-auto text-center">
            <h1 class="text-5xl md:text-6xl font-bold mb-6 animate-fade-in-up">MAD Mr Bert's</h1>
            <p class="text-xl text-[rgb(255,200,200)] animate-fade-in-up animation-delay-300">Aviation Expert, Instructor, and Innovator</p>
            
            <!-- Animated Call To Action -->
            <div class="mt-10 animate-fade-in-up animation-delay-600">
                <a href="#services" class="bg-white text-[rgb(241,97,98)] px-6 py-3 rounded-full font-semibold hover:bg-opacity-90 transition-all duration-300 flex items-center justify-center mx-auto w-max group">
                    <span>Discover Services</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 group-hover:translate-y-1 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Main Content Section -->
<div class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <!-- About Section -->
        <div class="max-w-4xl mx-auto mb-16 animate-on-scroll">
            <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center relative after:content-[''] after:absolute after:w-24 after:h-1 after:bg-[rgb(241,97,98)] after:bottom-[-10px] after:left-1/2 after:transform after:-translate-x-1/2">Who is "MAD Mr Bert's"?</h2>
            <div class="bg-white p-8 rounded-lg shadow-lg border border-[rgb(241,97,98,0.2)] hover:shadow-xl transition-all duration-300">
                <p class="text-gray-600 mb-6 leading-relaxed">
                    MAD Mr Bert's is a renowned aviation expert with decades of experience in flight training and aircraft innovation. His unique approach to aviation education and passion for flying has made him a respected figure in the industry.
                </p>
            </div>
        </div>

        <!-- Services Hub Section with ID for navigation -->
        <div id="services" class="max-w-5xl mx-auto mb-24 px-4 scroll-mt-24 animate-on-scroll">
            <h2 class="text-3xl font-bold text-gray-900 mb-12 text-center relative after:content-[''] after:absolute after:w-24 after:h-1 after:bg-[rgb(241,97,98)] after:bottom-[-10px] after:left-1/2 after:transform after:-translate-x-1/2">Our Services</h2>
            
            <!-- Hub and Spokes Container -->
            <div class="relative flex flex-col md:flex-row md:justify-center items-center gap-8 md:gap-12">
                <!-- Center Hub -->
                <div class="relative z-20 mb-8 md:mb-0 md:order-2">
                    <div class="w-28 h-28 md:w-36 md:h-36 rounded-full overflow-hidden border-4 border-[rgb(241,97,98)] shadow-xl flex items-center justify-center bg-white hover:shadow-2xl transition-all duration-300 animate-pulse-slow relative">
                        <img src="{{ asset('images/logo/logo.png') }}" alt="MAD Mr Bert" class="w-full h-full object-cover" onerror="this.src='https://via.placeholder.com/150?text=MAD+Mr+Bert';this.onerror='';">
                        
                        <!-- Ripple Effect -->
                        <div class="absolute inset-0 w-full h-full rounded-full ripple-effect"></div>
                    </div>
                </div>
                
                <!-- Left Services Column -->
                <div class="flex flex-col gap-6 w-full md:w-1/3 md:order-1">
                    <!-- Blog Card -->
                    <div class="service-card p-5 bg-white rounded-lg shadow-md border-l-4 border-[rgb(241,97,98)] hover:shadow-lg transition-all duration-300 transform hover:translate-x-1 hover:scale-105 group animate-slide-in-left animation-delay-300">
                        <div class="flex items-start">
                            <div class="shrink-0 w-10 h-10 bg-[rgb(241,97,98,0.1)] rounded-full flex items-center justify-center mr-4 group-hover:bg-[rgb(241,97,98,0.2)] transition-colors duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[rgb(241,97,98)]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-gray-800 mb-1 group-hover:text-[rgb(241,97,98)] transition-colors duration-300">Blog</h3>
                                <p class="text-gray-600 text-sm mb-2">Discover insights and stories from the world of aviation.</p>
                                <a href="/mad-mr-bert/blog" class="text-[rgb(241,97,98)] text-sm font-medium inline-flex items-center">
                                    Visit Blog
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1 transform group-hover:translate-x-1 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <!-- Connecting line (visible on desktop) -->
                        <div class="hidden md:block absolute top-1/2 right-0 h-px w-12 bg-gradient-to-r from-[rgb(241,97,98,0.7)] to-transparent transform translate-x-full"></div>
                    </div>
                    
                    <!-- Magazine Card -->
                    <div class="service-card p-5 bg-white rounded-lg shadow-md border-l-4 border-[rgb(241,97,98)] hover:shadow-lg transition-all duration-300 transform hover:translate-x-1 hover:scale-105 group animate-slide-in-left animation-delay-600">
                        <div class="flex items-start">
                            <div class="shrink-0 w-10 h-10 bg-[rgb(241,97,98,0.1)] rounded-full flex items-center justify-center mr-4 group-hover:bg-[rgb(241,97,98,0.2)] transition-colors duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[rgb(241,97,98)]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-gray-800 mb-1 group-hover:text-[rgb(241,97,98)] transition-colors duration-300">Magazine</h3>
                                <p class="text-gray-600 text-sm mb-2">Stay updated with our aviation magazine.</p>
                                <a href="/mad-mr-bert/magazine" class="text-[rgb(241,97,98)] text-sm font-medium inline-flex items-center">
                                    Read Magazine
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1 transform group-hover:translate-x-1 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <!-- Connecting line (visible on desktop) -->
                        <div class="hidden md:block absolute top-1/2 right-0 h-px w-12 bg-gradient-to-r from-[rgb(241,97,98,0.7)] to-transparent transform translate-x-full"></div>
                    </div>
                </div>
                
                <!-- Right Services Column -->
                <div class="flex flex-col gap-6 w-full md:w-1/3 md:order-3">
                    <!-- Podcast Card -->
                    <div class="service-card p-5 bg-white rounded-lg shadow-md border-r-4 border-[rgb(241,97,98)] hover:shadow-lg transition-all duration-300 transform hover:-translate-x-1 hover:scale-105 group animate-slide-in-right animation-delay-300">
                        <div class="flex items-start">
                            <div class="shrink-0 w-10 h-10 bg-[rgb(241,97,98,0.1)] rounded-full flex items-center justify-center mr-4 group-hover:bg-[rgb(241,97,98,0.2)] transition-colors duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[rgb(241,97,98)]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-gray-800 mb-1 group-hover:text-[rgb(241,97,98)] transition-colors duration-300">Podcast</h3>
                                <p class="text-gray-600 text-sm mb-2">Listen to expert conversations about aviation.</p>
                                <a href="/mad-mr-bert/podcast" class="text-[rgb(241,97,98)] text-sm font-medium inline-flex items-center">
                                    Listen Now
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1 transform group-hover:translate-x-1 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <!-- Connecting line (visible on desktop) -->
                        <div class="hidden md:block absolute top-1/2 left-0 h-px w-12 bg-gradient-to-l from-[rgb(241,97,98,0.7)] to-transparent transform -translate-x-full"></div>
                    </div>
                    
                    <!-- Shop Card -->
                    <div class="service-card p-5 bg-white rounded-lg shadow-md border-r-4 border-[rgb(241,97,98)] hover:shadow-lg transition-all duration-300 transform hover:-translate-x-1 hover:scale-105 group animate-slide-in-right animation-delay-600">
                        <div class="flex items-start">
                            <div class="shrink-0 w-10 h-10 bg-[rgb(241,97,98,0.1)] rounded-full flex items-center justify-center mr-4 group-hover:bg-[rgb(241,97,98,0.2)] transition-colors duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[rgb(241,97,98)]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-gray-800 mb-1 group-hover:text-[rgb(241,97,98)] transition-colors duration-300">Shop</h3>
                                <p class="text-gray-600 text-sm mb-2">Browse our collection of aviation gear and merchandise.</p>
                                <a href="/mad-mr-bert/merchandise" class="text-[rgb(241,97,98)] text-sm font-medium inline-flex items-center">
                                    Visit Shop
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1 transform group-hover:translate-x-1 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <!-- Connecting line (visible on desktop) -->
                        <div class="hidden md:block absolute top-1/2 left-0 h-px w-12 bg-gradient-to-l from-[rgb(241,97,98,0.7)] to-transparent transform -translate-x-full"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Thaichi Section -->
        <div class="max-w-4xl mx-auto animate-on-scroll">
            <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center relative after:content-[''] after:absolute after:w-24 after:h-1 after:bg-[rgb(241,97,98)] after:bottom-[-10px] after:left-1/2 after:transform after:-translate-x-1/2">MAD Mr Bert's Thaichi</h2>
            <div class="bg-white p-8 rounded-lg shadow-lg border border-[rgb(241,97,98,0.2)] hover:shadow-xl transition-all duration-300">
                <div class="mb-8">
                    <h3 class="text-xl font-bold text-[rgb(241,97,98)] mb-4">What is Thaichi?</h3>
                    <p class="text-gray-600 mb-4 leading-relaxed">
                        Thaichi is a unique blend of traditional martial arts and modern movement techniques, designed to improve balance, coordination, and mental focus - essential skills for pilots.
                    </p>
                    <div class="text-center">
                        <a href="/mad-mr-bert/thaichi" class="inline-flex items-center bg-[rgb(241,97,98)] text-white px-6 py-2 rounded-lg hover:bg-[rgb(220,80,80)] transition-colors duration-300 group">
                            <span>Learn More About Thaichi</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 group-hover:translate-x-1 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Animation Scripts -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Add animation styles
        const style = document.createElement('style');
        style.textContent = `
            /* Animation Keyframes */
            @keyframes fadeInUp {
                from { opacity: 0; transform: translateY(20px); }
                to { opacity: 1; transform: translateY(0); }
            }
            
            @keyframes slideInLeft {
                from { opacity: 0; transform: translateX(-30px); }
                to { opacity: 1; transform: translateX(0); }
            }
            
            @keyframes slideInRight {
                from { opacity: 0; transform: translateX(30px); }
                to { opacity: 1; transform: translateX(0); }
            }
            
            @keyframes pulseSlow {
                0% { transform: scale(1); }
                50% { transform: scale(1.05); }
                100% { transform: scale(1); }
            }
            
            @keyframes flyPlane {
                0% { transform: translateX(0) translateY(0) rotate(-12deg); }
                100% { transform: translateX(calc(100vw + 100px)) translateY(-50px) rotate(-12deg); }
            }
            
            @keyframes floatCloud {
                0% { transform: translateX(0); }
                100% { transform: translateX(calc(100vw + 50px)); }
            }
            
            @keyframes ripple {
                0% { box-shadow: 0 0 0 0 rgba(241, 97, 98, 0.3); }
                70% { box-shadow: 0 0 0 20px rgba(241, 97, 98, 0); }
                100% { box-shadow: 0 0 0 0 rgba(241, 97, 98, 0); }
            }
            
            /* Animation Classes */
            .animate-fade-in-up {
                opacity: 0;
                animation: fadeInUp 0.8s ease-out forwards;
            }
            
            .animate-slide-in-left {
                opacity: 0;
                animation: slideInLeft 0.8s ease-out forwards;
            }
            
            .animate-slide-in-right {
                opacity: 0;
                animation: slideInRight 0.8s ease-out forwards;
            }
            
            .animate-pulse-slow {
                animation: pulseSlow 3s infinite ease-in-out;
            }
            
            .ripple-effect {
                animation: ripple 3s infinite;
            }
            
            .animation-delay-300 {
                animation-delay: 0.3s;
            }
            
            .animation-delay-600 {
                animation-delay: 0.6s;
            }
            
            /* Background animations */
            .plane {
                animation: flyPlane 20s linear infinite;
            }
            
            .cloud-1 {
                animation: floatCloud 30s linear infinite;
            }
            
            .cloud-2 {
                animation: floatCloud 35s linear infinite;
                animation-delay: 5s;
            }
            
            .cloud-3 {
                animation: floatCloud 25s linear infinite;
                animation-delay: 10s;
            }
        `;
        document.head.appendChild(style);
        
        // Scroll animation for elements
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-fade-in-up');
                }
            });
        }, { threshold: 0.1 });
        
        document.querySelectorAll('.animate-on-scroll').forEach(item => {
            observer.observe(item);
        });
        
        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                
                const targetId = this.getAttribute('href');
                document.querySelector(targetId).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    });
</script>
@endsection 