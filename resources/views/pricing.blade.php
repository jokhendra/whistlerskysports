@extends('layouts.app')

@section('content')
<div class="relative bg-gradient-to-b from-sky-100/90 mt-10 to-white/80 py-16">
    <!-- Hero Section with Background Image -->
    <!-- <div class="absolute inset-0 z-0">
        <img src="{{ asset('images/pwg1.jpg') }}" alt="Hang Gliding Experience" class="w-full h-full object-cover opacity-20">
    </div> -->

    <div class="relative z-10 container mx-auto px-4">
        <!-- Main Title Section -->
        <div class="text-center mb-16 bg-white/30 rounded-xl p-8">
            <h1 class="text-4xl md:text-5xl font-bold text-purple-800 mb-6 relative z-20 text-shadow-lg">
                <span class="bg-gradient-to-r from-purple-800 to-purple-900 bg-clip-text text-transparent relative">
                    Your Introduction to the most "Bird Like" flying experience in aviation!
                </span>
            </h1>
            <p class="text-lg text-gray-700 max-w-3xl mx-auto font-medium">
                Flying a trike is a completely different type of flying experience. Where else can you feel the wind in your hair and your knees in the breeze as you enjoy a personal one-on-one flying experience? During your flight we will shoot professional quality photos and video of your flight.... perfect for bragging rights back home.
            </p>
        </div>

        <!-- Lesson Packages Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-7xl mx-auto mb-20">
            <!-- 30 Minute Lesson Package -->
            <div class="bg-white/40 rounded-2xl shadow-xl overflow-hidden">
                <div class="p-8 text-center">
                    <h2 class="text-3xl font-bold mb-2">30 Minute Lesson</h2>
                    <div class="text-4xl font-bold text-purple-600 mb-2">CA$199</div>
                    <p class="text-gray-600 mb-4">per person</p>
                    <p class="text-xl text-gray-700 mb-6">Introductory flight lesson</p>
                    <p class="text-lg text-gray-600 mb-8">Spread your wings and reach out to the sky!</p>
                    <a href="{{ route('booking') }}" class="inline-block bg-purple-600 text-white font-bold py-3 px-8 rounded-full hover:bg-purple-700 transition duration-300 transform hover:scale-105">
                        RESERVE
                    </a>
                </div>
            </div>

            <!-- Mountain Flying Course Package -->
            <div class="bg-white/40 rounded-2xl shadow-xl overflow-hidden">
                <div class="p-8 text-center">
                    <h2 class="text-3xl font-bold mb-2">Mountain Flying Course</h2>
                    <div class="text-4xl font-bold text-purple-600 mb-2">CA$3000</div>
                    <p class="text-gray-600 mb-4">3-4 day intensive course</p>
                    <p class="text-xl text-gray-700 mb-6">15 Hours of Training</p>
                    <p class="text-lg text-gray-600 mb-8">Master the art of mountain flying with our comprehensive course!</p>
                    <a href="{{ route('booking') }}" class="inline-block bg-purple-600 text-white font-bold py-3 px-8 rounded-full hover:bg-purple-700 transition duration-300 transform hover:scale-105">
                        ENROLL NOW
                    </a>
                </div>
            </div>
        </div>

        <!-- Memories Section -->
        <div class="mb-12 text-center">
            <h2 class="text-4xl font-bold text-purple-800 mb-8">Memories</h2>
        </div>

        <!-- Memory Packages Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 max-w-7xl mx-auto">
            <!-- Video Package -->
            <div class="bg-white/30 rounded-xl shadow-lg overflow-hidden transition-transform duration-300 hover:scale-105">
                <div class="p-6 text-center">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Video</h3>
                    <p class="text-gray-600 text-sm mb-6">
                        High definition video of your entire flight with cockpit audio capturing all the excitement and information during your flight.
                    </p>
                    <div class="text-2xl font-bold text-purple-600">CA$90</div>
                </div>
            </div>

            <!-- Deluxe Package -->
            <div class="bg-white/30 rounded-xl shadow-lg overflow-hidden transition-transform duration-300 hover:scale-105">
                <div class="p-6 text-center">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Deluxe</h3>
                    <p class="text-gray-600 text-sm mb-6">
                        Photos, Video and a WhistlerSkySports Cap or shirt and Keyring
                    </p>
                    <div class="text-2xl font-bold text-purple-600">CA$120</div>
                </div>
            </div>

            <!-- Merchandise Package -->
            <div class="bg-white/30 rounded-xl shadow-lg overflow-hidden transition-transform duration-300 hover:scale-105">
                <div class="p-6 text-center">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Merchandise</h3>
                    <p class="text-gray-600 text-sm mb-6">
                        WhistlerSkySports Cap or shirt and Keyring
                    </p>
                    <div class="text-2xl font-bold text-purple-600">CA$40</div>
                </div>
            </div>
        </div>
    </div>
</div>


<style>
/* Add smooth hover transitions */
.hover\:scale-105 {
    transition: transform 0.3s ease-in-out;
}

/* Add shadow transitions */
.shadow-lg {
    transition: box-shadow 0.3s ease-in-out;
}

/* Add gradient animation */
@keyframes gradientFlow {
    0% {
        background-position: 0% 50%;
    }
    50% {
        background-position: 100% 50%;
    }
    100% {
        background-position: 0% 50%;
    }
}

.bg-gradient-animate {
    background-size: 200% 200%;
    animation: gradientFlow 15s ease infinite;
}

/* Add text shadow for better visibility */
.text-shadow-lg {
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

/* Add glass morphism effect */
.backdrop-blur-sm {
    backdrop-filter: blur(8px);
    -webkit-backdrop-filter: blur(8px);
}
</style>
@endsection
