@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<div class="relative bg-gradient-to-b from-[rgb(241,97,98)] to-[rgb(200,60,60)] text-white py-8 sm:py-12 md:py-16 lg:mt-24 md:mt-24 mt-16">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-6">MAD Mr Bert's Podcast</h1>
            <p class="text-xl text-[rgb(255,200,200)]">Aviation Stories & Expert Conversations</p>
        </div>
    </div>
</div>

<!-- Coming Soon Section -->
<div class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
            <!-- Coming Soon Message -->
            <div class="bg-white p-8 rounded-lg shadow-lg border border-[rgb(241,97,98,0.2)] mb-12">
                <div class="mb-8">
                    <svg class="w-24 h-24 mx-auto text-[rgb(241,97,98)] mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z"></path>
                    </svg>
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">Coming Soon!</h2>
                    <p class="text-xl text-gray-600 mb-6">Get ready for engaging aviation conversations.</p>
                    <p class="text-gray-600">The podcast will feature:</p>
                    <ul class="mt-4 space-y-3 max-w-lg mx-auto">
                        <li class="flex items-center justify-center">
                            <span class="w-2 h-2 bg-[rgb(241,97,98)] rounded-full mr-2"></span>
                            <span class="text-gray-600">Interviews with Aviation Experts</span>
                        </li>
                        <li class="flex items-center justify-center">
                            <span class="w-2 h-2 bg-[rgb(241,97,98)] rounded-full mr-2"></span>
                            <span class="text-gray-600">Flight Training Tips & Stories</span>
                        </li>
                        <li class="flex items-center justify-center">
                            <span class="w-2 h-2 bg-[rgb(241,97,98)] rounded-full mr-2"></span>
                            <span class="text-gray-600">Industry News & Discussions</span>
                        </li>
                        <li class="flex items-center justify-center">
                            <span class="w-2 h-2 bg-[rgb(241,97,98)] rounded-full mr-2"></span>
                            <span class="text-gray-600">Student Pilot Success Stories</span>
                        </li>
                    </ul>
                </div>
                
                <!-- Podcast Platforms -->
                <div class="mb-12">
                    <h3 class="text-xl font-bold text-[rgb(241,97,98)] mb-6">Coming to Your Favorite Platforms</h3>
                    <div class="flex justify-center space-x-8">
                        <div class="text-center">
                            <svg class="w-12 h-12 mx-auto text-gray-400 mb-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm-2 16H8v-6h2v6zm3 0h-2V7h2v9zm3 0h-2v-4h2v4z"/>
                            </svg>
                            <span class="text-sm text-gray-600">Spotify</span>
                        </div>
                        <div class="text-center">
                            <svg class="w-12 h-12 mx-auto text-gray-400 mb-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm0 19.5c-4.136 0-7.5-3.364-7.5-7.5S7.864 4.5 12 4.5s7.5 3.364 7.5 7.5-3.364 7.5-7.5 7.5z"/>
                            </svg>
                            <span class="text-sm text-gray-600">Apple Podcasts</span>
                        </div>
                        <div class="text-center">
                            <svg class="w-12 h-12 mx-auto text-gray-400 mb-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm0 4.5c4.136 0 7.5 3.364 7.5 7.5s-3.364 7.5-7.5 7.5S4.5 16.136 4.5 12 7.864 4.5 12 4.5z"/>
                            </svg>
                            <span class="text-sm text-gray-600">Google Podcasts</span>
                        </div>
                    </div>
                </div>

                <!-- Newsletter Signup -->
                <div class="max-w-md mx-auto">
                    <h3 class="text-xl font-bold text-[rgb(241,97,98)] mb-4">Get Notified When We Launch!</h3>
                    <div class="flex gap-2">
                        <input type="email" placeholder="Enter your email" class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-[rgb(241,97,98)]">
                        <button class="px-6 py-2 bg-[rgb(241,97,98)] text-white rounded-lg hover:bg-[rgb(200,60,60)] transition-colors duration-300">
                            Notify Me
                        </button>
                    </div>
                </div>
            </div>

            <!-- Social Media Links -->
            <div class="text-center">
                <h3 class="text-xl font-bold text-gray-900 mb-4">Follow Us for Updates</h3>
                <div class="flex justify-center space-x-6">
                    <a href="#" class="text-[rgb(241,97,98)] hover:text-[rgb(200,60,60)] transition-colors duration-300">
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                        </svg>
                    </a>
                    <a href="#" class="text-[rgb(241,97,98)] hover:text-[rgb(200,60,60)] transition-colors duration-300">
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                        </svg>
                    </a>
                    <a href="#" class="text-[rgb(241,97,98)] hover:text-[rgb(200,60,60)] transition-colors duration-300">
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.897 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.897-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 