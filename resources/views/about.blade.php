@extends('layouts.app')

@push('styles')
<style>
/* Hero Section Animations */
.animate-pulse {
    animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
}

@keyframes pulse {
    0%, 100% {
        opacity: 1;
    }
    50% {
        opacity: .8;
    }
}

/* Value Card Hover Effects */
.value-card {
    transition: all 0.3s ease;
}

.value-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
}

.value-icon {
    transition: all 0.3s ease;
}

.value-card:hover .value-icon {
    transform: scale(1.1);
}

/* Training Program Card Effects */
.program-card {
    transition: all 0.3s ease;
}

.program-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
}

.program-button {
    transition: all 0.3s ease;
}

.program-button:hover {
    transform: scale(1.05);
}

/* Commitment Section Image Effects */
.team-image {
    transition: all 0.3s ease;
}

.team-image:hover {
    transform: scale(1.05);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
}
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="bg-gradient-to-b from-blue-900 to-blue-700 py-16 lg:mt-24 md:mt-24 mt-16">
    <div class="container mx-auto px-4">
      <div class="flex flex-col items-center text-center">
        <h1 class="text-5xl font-bold text-white mb-6">About Whistler Sky Sports</h1>
        <div class="w-24 h-1 bg-[#fcdb3f] mb-8"></div>
        <div class="max-w-3xl mx-auto bg-white/10 backdrop-blur-sm rounded-xl p-8 shadow-lg border border-white/20">
            <div class="relative">
                <h2 class="text-3xl md:text-4xl font-bold text-[#fcdb3f] mb-6 animate-pulse">Live the DREAM!</h2>
                <div class="text-xl text-blue-100 space-y-6">
                    <p class="italic">
                        "Once you have tasted flight, you will forever walk the earth with your eyes turned skyward."
                    </p>
                    <p class="text-sm text-blue-200">- Leonardo da Vinci</p>
                    <p class="mt-6">
                        At Whistler Sky Sports, we teach you how to trespass mankind's most ancestral fear - which is the fear of falling. The oldest dream of mankind is to fly and we help you achieve your dream!
                    </p>
                    <p class="mt-4">
                        This fear dates back to our existence as monkeys, who were afraid of predators below the trees and therefore unwilling to take the leap of faith. Taking that first leap requires immense courage. Today, flying represents humanity's triumph over that biggest fear. When we dare to overcome our fears and take bold steps forward, we unlock extraordinary possibilities.
                    </p>
                    <p class="mt-4">
                        Here at Whistler Sky Sports, we are here to hold your hand and make you fall in love with the skies in the most affordable way. Not to forget; you are amidst the most beautiful landscape views in the entire world.
                    </p>
                </div>
                <!-- Decorative elements -->
                <div class="absolute -top-4 -left-4 w-8 h-8 border-t-2 border-l-2 border-[#fcdb3f] opacity-60"></div>
                <div class="absolute -bottom-4 -right-4 w-8 h-8 border-b-2 border-r-2 border-[#fcdb3f] opacity-60"></div>
            </div>
        </div>
      </div>
    </div>
</section>

<!-- Our Story Section -->
<section class="py-16 bg-amber-50">
  <div class="container mx-auto px-4">
    <div class="flex flex-col md:flex-row items-center gap-12">
      <div class="md:w-1/2">
        <img src="{{ asset('images/fixed_wings/IMG_7849.JPG') }}" alt="Open Cockpit Ultralight Aircraft" class="rounded-lg shadow-lg w-full h-[400px] object-cover team-image">
      </div>
      <div class="md:w-1/2">
        <h2 class="text-3xl font-bold text-gray-800 mb-6">Our Mission</h2>
        <p class="text-gray-600 mb-4">
          We don't take our fellow aviators on joy rides – we teach them how to dance confidently in those skies and give them a taste and then the skills. If you're the adrenaline seeker, we'll share an unforgettable experience in an open cockpit weight shift trike. If you'd rather take things slow, we have a closed cockpit plane but with very sensitive controls.
        </p>
        <p class="text-gray-600 mb-4">
          Getting your private pilot's license could be very expensive these days. You open your doors towards the most affordable flying with Whistler Sky Sports. With your "Quick Learner's" package, an aspiring pilot can complete their Ultralight permit in as low as 10 hours and Instructor ratings in around 22 hours. In as low as 2-3 months you can learn how to spread your wings and master the art of flying; weather permitting.
        </p>
        <p class="text-gray-600">
          Our greatest eternal desire as mankind is to have wings and fly like a bird. You would love the adrenaline rush you will get by learning these challenging skills in the Whistler's challenging terrains surrounded by one of the most beautiful and peaceful bird's eyeview of the Canadian rockies. We promise your comfort and an experience you will remember for the rest of your life.
        </p>
      </div>
    </div>
  </div>
</section>

<!-- Our Values Section -->
<section class="bg-gray-100 py-16">
  <div class="container mx-auto px-4">
    <div class="text-center mb-12">
      <h2 class="text-3xl font-bold text-gray-800 mb-4">Our Core Values</h2>
      <p class="text-gray-600 max-w-2xl mx-auto">
        Our Core Values of safety, transparency, and excellence define our company culture, rooted in unwavering integrity and authenticity.
      </p>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      <!-- Value 1 -->
      <div class="bg-white p-8 rounded-lg shadow-md text-center value-card">
        <div class="bg-amber-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4 value-icon">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
        </div>
        <h3 class="text-xl font-bold text-gray-800 mb-2">Safety</h3>
        <p class="text-gray-600">
          We prioritize rigorous pre-flight inspections and maintenance, never cutting corners, and cancel flights if weather, aircraft, or health conditions aren't perfect.
        </p>
      </div>
      
      <!-- Value 2 -->
      <div class="bg-white p-8 rounded-lg shadow-md text-center value-card">
        <div class="bg-amber-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4 value-icon">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
          </svg>
        </div>
        <h3 class="text-xl font-bold text-gray-800 mb-2">Transparency</h3>
        <p class="text-gray-600">
          We maintain 100% transparency, honesty, and integrity in everything we do, ensuring you'll never have regrets.
        </p>
      </div>
      
      <!-- Value 3 -->
      <div class="bg-white p-8 rounded-lg shadow-md text-center value-card">
        <div class="bg-amber-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4 value-icon">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
          </svg>
        </div>
        <h3 class="text-xl font-bold text-gray-800 mb-2">Excellence</h3>
        <p class="text-gray-600">
          We strive for excellence in every aspect of our training, from pre-flight inspections to comprehensive student preparation.
        </p>
      </div>
    </div>
  </div>
</section>

<!-- Our Fleet Section -->
<section class="py-16 bg-amber-50">
  <div class="container mx-auto px-4">
    <div class="text-center mb-12">
      <h2 class="text-3xl font-bold text-gray-800 mb-4">Our Fleet</h2>
      <p class="text-gray-600 max-w-2xl mx-auto">
        Experience the thrill of flight with our carefully selected aircraft, designed for both performance and safety.
      </p>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
      <!-- Aircraft 1 -->
      <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <img src="{{ asset('images/microlite/Skypper 2.jpeg') }}" alt="DTA Combo Trike" class="w-full h-64 object-cover">
        <div class="p-6">
          <h3 class="text-xl font-bold text-gray-800 mb-2">DTA Combo Trike</h3>
          <p class="text-gray-600 mb-4">
            Experience the thrill of open-cockpit flight with the DTA Combo trike, a top choice for aviation enthusiasts. Designed by Jean-Michel Dizier, DTA trikes blend high-performance wings with exceptional low-speed handling, making them suitable for pilots of all skill levels.
          </p>
          <p class="text-gray-600 mb-4">
            Dizier's innovative designs have stood the test of time, with the iconic "Voyageur" model earning global acclaim. Notable adventures include:
          </p>
          <ul class="list-disc list-inside text-gray-600 space-y-2">
            <li><a href="http://www.trikeexpeditions.com" target="_blank" class="text-blue-600 hover:text-blue-800 underline">Olivier Aubert's worldwide expeditions</a></li>
            <li><a href="http://odile-rablat.com" target="_blank" class="text-blue-600 hover:text-blue-800 underline">Odile Rablat's dual crossings of Canada</a></li>
            <li><a href="http://trike-globetrotter.com" target="_blank" class="text-blue-600 hover:text-blue-800 underline">Andreas Zmuda and Doreen Kroeber's global circumnavigation</a></li>
          </ul>
        </div>
      </div>
      
      <!-- Aircraft 2 -->
      <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <img src="{{ asset('images/fixed_wings/IMG_7850.JPG') }}" alt="RANS S6 Coyote II" class="w-full h-64 object-cover">
        <div class="p-6">
          <h3 class="text-xl font-bold text-gray-800 mb-2">RANS S6 Coyote II</h3>
          <p class="text-gray-600">
            Take to the skies in the RANS S6 Coyote II, a closed-cockpit ultralight fixed-wing aircraft masterfully crafted by Rans Inc. Designed by Randy Schlitter, this cutting-edge aircraft offers unmatched reliability and performance, making it the perfect companion for exploring the vast Canadian wilderness from above.
          </p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Training Programs Section -->
<section class="bg-gray-100 py-16">
  <div class="container mx-auto px-4">
    <div class="text-center mb-12">
      <h2 class="text-3xl font-bold text-gray-800 mb-4">Our Training Programs</h2>
      <p class="text-gray-600 max-w-2xl mx-auto">
        Our training programs are designed to inspire and equip students, whether you're an aviation enthusiast, a recreational pilot, or someone seeking an affordable way to earn your wings.
      </p>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-7xl mx-auto mb-20">
            <!-- 30 Minute Lesson Package -->
            <div class="bg-white/40 rounded-2xl overflow-hidden program-card">
                <div class="p-8 text-center">
                    <h2 class="text-3xl font-bold mb-2">Open Cockpit Weight Shift Trike - Learn to Fly like a Bird</h2>
                    <div class="text-4xl font-bold text-[#204fb4] mb-2">CAD$140</div>
                    <p class="text-gray-600 mb-4">per person</p>
                    <p class="text-xl text-gray-700 mb-6">15 Minute Lesson</p>
                    <p class="text-lg text-gray-600 mb-8">Spread your wings and reach out to the sky!</p>
                    <a href="{{ route('booking') }}" class="inline-block bg-[#204fb4] text-[#fcdb3f] font-bold py-3 px-8 rounded-full hover:bg-[#204fb4] program-button">
                        RESERVE
                    </a>
                </div>
            </div>

            <!-- Mountain Flying Course Package -->
            <div class="bg-white/40 rounded-2xl overflow-hidden program-card">
                <div class="p-8 text-center">
                    <h2 class="text-3xl font-bold mb-2">Fixed Wing Advanced Ultralight - Lesson for the Nuanced </h2>
                    <div class="text-4xl font-bold text-[#204fb4] mb-2">CAD$120</div>
                    <p class="text-gray-600 mb-4">per person</p>
                    <p class="text-xl text-gray-700 mb-6">15 Minute Lesson</p>
                    <p class="text-lg text-gray-600 mb-8">Master the art of mountain flying with our comprehensive course!</p>
                    <a href="{{ route('booking') }}" class="inline-block bg-[#204fb4] text-[#fcdb3f] font-bold py-3 px-8 rounded-full hover:bg-[#204fb4] program-button">
                        RESERVE
                    </a>
                </div>
            </div>
            
            <!-- Comprehensive Flight Training Programs -->
            <div class="bg-white/40 rounded-2xl overflow-hidden program-card">
                <div class="p-8 text-center">
                    <h2 class="text-3xl font-bold mb-2">Comprehensive Flight Training Programs</h2>
                    <!-- <div class="text-4xl font-bold text-purple-600 mb-2">From CA$3,995</div> -->
                    <p class="text-gray-600 mb-4">complete program</p>
                    <p class="text-xl text-gray-700 mb-6">Transport Canada Approved</p>
                    <p class="text-lg text-gray-600 mb-8">From Basic Ultralight to Recreational Pilot Permit - structured programs designed to take you from beginner to certified pilot.</p>
                    <a href="{{ route('pricing') }}#comprehensive-programs" class="inline-block bg-[#204fb4] text-[#fcdb3f] font-bold py-3 px-8 rounded-full hover:bg-[#204fb4] program-button smooth-scroll">
                        LEARN MORE
                    </a>
                </div>
            </div>
        </div>
  </div>
</section>

<!-- Our Location Section -->
<section class="py-16 bg-amber-50">
  <div class="container mx-auto px-4">
    <div class="flex flex-col md:flex-row items-center gap-12">
      <div class="md:w-1/2">
        <h2 class="text-3xl font-bold text-gray-800 mb-6">Our Location</h2>
        <p class="text-gray-600 mb-4">
          Pemberton's stunning terrain and favorable weather provide the perfect backdrop for mastering the art of flight. Mountain flying at Pemberton may seem like a perfect scenic experience, but be mindful that it is not merely a joyride—it's a flight lesson.
        </p>
        <p class="text-gray-600 mb-4">
          You are welcome to take these skills with you anywhere in the world, as we teach you to fly in some of the most demanding conditions. That said, we fly only when the weather is ideal for safe operations.
        </p>
        <div class="mt-6">
          <a href="/contact" class="inline-block bg-accent hover:bg-accent-hover text-primary font-bold py-3 px-6 rounded-full transition-all duration-300 shadow-md hover:shadow-lg">
            Contact Us
          </a>
        </div>
      </div>
      <div class="md:w-1/2">
        <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="Pemberton Airport" class="rounded-lg shadow-lg w-full h-auto object-cover team-image">
      </div>
    </div>
  </div>
</section>

<!-- Our Commitment Section -->
<section class="bg-gray-100 py-16">
  <div class="container mx-auto px-4">
    <div class="text-center mb-12">
      <h2 class="text-3xl font-bold text-gray-800 mb-4">Our Commitment</h2>
      <p class="text-gray-600 max-w-3xl mx-auto">
        I am proud of Whistler Sky Sports because I believe in maintaining 100% transparency, honesty, and integrity in everything we do. This approach ensures you'll never have regrets.
      </p>
    </div>
    
    <div class="bg-white p-8 rounded-lg shadow-md max-w-4xl mx-auto">
      <div class="flex flex-col md:flex-row items-center gap-8">
        <div class="md:w-1/3">
          <img src="{{ asset('images/logo/ishan-tiwari.jpeg') }}" alt="Ishan Tewari" class="rounded-full w-48 h-48 object-cover mx-auto shadow-lg team-image">
          <h3 class="text-xl font-bold text-gray-800 text-center mt-4">Ishan Tewari</h3>
          <p class="text-accent text-center">Meet our Chief flight instructor</p>
        </div>
        <div class="md:w-2/3">
          <p class="text-gray-600 mb-4">
            With one thousand hours of experience flying various ultralight aircraft, you will find immense joy in learning and mastering the Whistler skies. My passion for sharing knowledge and skills was inspired by a mentor 15 years ago, who instilled the values of humility and kindness.
          </p>
          <p class="text-gray-600 mb-4">
            Even when life gets busy, we never cut corners with pre-flight inspections or maintenance. If something isn't right—whether it's the weather, the aircraft, or your health—we cancel the flight. Situational awareness is your best friend.
          </p>
          <p class="text-gray-600">
            At WSS, we're more than a flight school—we're a community of dreamers and doers united by a love for aviation. Join us as we take flight, blending adventure with excellence, and discover why the skies are calling your name.
          </p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- CTA Section -->
<section class="py-16 bg-accent">
  <div class="container mx-auto px-4 text-center">
    <h2 class="text-3xl font-bold text-primary mb-6">Ready to Take Flight?</h2>
    <p class="text-primary text-xl mb-8 max-w-2xl mx-auto">
      Join us at Whistler Sky Sports and discover the thrill of flying in one of the most beautiful regions in the world.
    </p>
    <a href="/booking" class="inline-block bg-[#F05052] hover:bg-[#f05060] hover:cursor-pointer text-white font-bold py-3 px-8 rounded-full program-button">
      Book Your Flight
    </a>
  </div>
</section>
@endsection