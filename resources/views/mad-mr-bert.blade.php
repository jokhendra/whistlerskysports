@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<div class="relative bg-gradient-to-b from-[rgb(241,97,98)] to-[rgb(200,60,60)] text-white py-8 sm:py-12 md:py-16 lg:mt-24 md:mt-24 mt-16">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-6">MAD Mr Bert</h1>
            <p class="text-xl text-[rgb(255,200,200)]">Aviation Expert, Instructor, and Innovator</p>
        </div>
    </div>
</div>

<!-- Main Content Section -->
<div class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <!-- About Section -->
        <div class="max-w-4xl mx-auto mb-16">
            <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Who is "MAD Mr Bert"?</h2>
            <div class="bg-white p-8 rounded-lg shadow-lg border border-[rgb(241,97,98,0.2)]">
                <p class="text-gray-600 mb-6">
                    MAD Mr Bert is a renowned aviation expert with decades of experience in flight training and aircraft innovation. His unique approach to aviation education and passion for flying has made him a respected figure in the industry.
                </p>
            </div>
        </div>

        <!-- Services Grid -->
        <div class="max-w-4xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-8 mb-16">
            <!-- Blog Card -->
            <div class="bg-white p-6 rounded-lg shadow-lg border border-[rgb(241,97,98,0.2)]">
                <h3 class="text-xl font-bold text-[rgb(241,97,98)] mb-4">Blog</h3>
                <p class="text-gray-600 mb-4">Discover insights and stories from the world of aviation.</p>
                <a href="/mad-mr-bert/blog" class="text-[rgb(241,97,98)] font-bold hover:underline">Visit Blog →</a>
            </div>

            <!-- Podcast Card -->
            <div class="bg-white p-6 rounded-lg shadow-lg border border-[rgb(241,97,98,0.2)]">
                <h3 class="text-xl font-bold text-[rgb(241,97,98)] mb-4">Podcast</h3>
                <p class="text-gray-600 mb-4">Listen to expert conversations about aviation.</p>
                <a href="/mad-mr-bert/podcast" class="text-[rgb(241,97,98)] font-bold hover:underline">Listen Now →</a>
            </div>

            <!-- Magazine Card -->
            <div class="bg-white p-6 rounded-lg shadow-lg border border-[rgb(241,97,98,0.2)]">
                <h3 class="text-xl font-bold text-[rgb(241,97,98)] mb-4">Magazine</h3>
                <p class="text-gray-600 mb-4">Stay updated with our aviation magazine.</p>
                <a href="/mad-mr-bert/magazine" class="text-[rgb(241,97,98)] font-bold hover:underline">Read Magazine →</a>
            </div>

            <!-- Shop Card -->
            <div class="bg-white p-6 rounded-lg shadow-lg border border-[rgb(241,97,98,0.2)]">
                <h3 class="text-xl font-bold text-[rgb(241,97,98)] mb-4">Shop</h3>
                <p class="text-gray-600 mb-4">Browse our collection of aviation gear and merchandise.</p>
                <a href="/mad-mr-bert/merchandise" class="text-[rgb(241,97,98)] font-bold hover:underline">Visit Shop →</a>
            </div>
        </div>

        <!-- Thaichi Section -->
        <div class="max-w-4xl mx-auto">
            <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">MAD Mr Bert's Thaichi</h2>
            <div class="bg-white p-8 rounded-lg shadow-lg border border-[rgb(241,97,98,0.2)]">
                <div class="mb-8">
                    <h3 class="text-xl font-bold text-[rgb(241,97,98)] mb-4">What is Thaichi?</h3>
                    <p class="text-gray-600 mb-4">
                        Thaichi is a unique blend of traditional martial arts and modern movement techniques, designed to improve balance, coordination, and mental focus - essential skills for pilots.
                    </p>
                    <div class="text-center">
                        <a href="/mad-mr-bert/thaichi" class="text-[rgb(241,97,98)] font-bold hover:underline">Learn More About Thaichi →</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 