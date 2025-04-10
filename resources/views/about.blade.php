@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="bg-gray-100 py-16 mt-10">
    <div class="container mx-auto px-4">
      <div class="flex flex-col items-center text-center">
        <h1 class="text-5xl font-bold text-primary mb-6">About Whistler Sky Sports</h1>
        <div class="w-24 h-1 bg-accent mb-8"></div>
        <p class="text-xl text-gray-700 max-w-3xl">
          At Whistler Sky Sports (WSS), we're not just about flying—we're about igniting a passion for flight and empowering aviation enthusiasts to take to the skies with confidence.
        </p>
      </div>
    </div>
</section>

<!-- Our Story Section -->
<section class="py-16 bg-amber-50">
  <div class="container mx-auto px-4">
    <div class="flex flex-col md:flex-row items-center gap-12">
      <div class="md:w-1/2">
        <img src="https://images.unsplash.com/photo-1579546929518-9e396f3cc809?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="Whistler Sky Sports Aircraft" class="rounded-lg shadow-lg w-full h-auto object-cover">
      </div>
      <div class="md:w-1/2">
        <h2 class="text-3xl font-bold text-gray-800 mb-6">Our Mission</h2>
        <p class="text-gray-600 mb-4">
          As a premier Flight Training Unit based at Pemberton Airport, British Columbia, WSS specializes in ultralight and advanced ultralight aircraft, delivering top-tier flight training that meets Transport Canada's rigorous standards.
        </p>
        <p class="text-gray-600 mb-4">
          With a focus on the ultralight category—defined as aircraft with a maximum gross weight of 1,232 lbs (560 kg) and a stall speed of 45 mph or less—we offer a thrilling yet accessible entry into the world of aviation.
        </p>
        <p class="text-gray-600">
          Founded by Ishan Tewari, our Chief Flight Instructor, ground instructor, and sole director, WSS embodies a singular vision: exceptional flight training rooted in safety, quality, and hands-on experience.
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
        Safety, transparency, and excellence are the pillars of our company culture.
      </p>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      <!-- Value 1 -->
      <div class="bg-white p-8 rounded-lg shadow-md text-center">
        <div class="bg-amber-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
        </div>
        <h3 class="text-xl font-bold text-gray-800 mb-2">Safety</h3>
        <p class="text-gray-600">
          We prioritize safety in every aspect of our operations, with rigorous maintenance, strict protocols, and a focus on risk management.
        </p>
      </div>
      
      <!-- Value 2 -->
      <div class="bg-white p-8 rounded-lg shadow-md text-center">
        <div class="bg-amber-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
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
      <div class="bg-white p-8 rounded-lg shadow-md text-center">
        <div class="bg-amber-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
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
        With two aircraft in our fleet, we are thrilled to guide you as you take your first steps toward learning how to fly.
      </p>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
      <!-- Aircraft 1 -->
      <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <img src="https://images.unsplash.com/photo-1579546929518-9e396f3cc809?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="Weight-shift Trike" class="w-full h-64 object-cover">
        <div class="p-6">
          <h3 class="text-xl font-bold text-gray-800 mb-2">Weight-shift Trike (Ultralight)</h3>
          <p class="text-gray-600">
            Our weight-shift trike offers an intuitive and responsive flying experience, perfect for beginners and experienced pilots alike.
          </p>
        </div>
      </div>
      
      <!-- Aircraft 2 -->
      <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <img src="https://images.unsplash.com/photo-1579546929518-9e396f3cc809?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="Fixed-wing Aircraft" class="w-full h-64 object-cover">
        <div class="p-6">
          <h3 class="text-xl font-bold text-gray-800 mb-2">Fixed-wing (Advanced Ultralight)</h3>
          <p class="text-gray-600">
            Our fixed-wing aircraft provides a traditional flying experience with advanced capabilities for more complex training scenarios.
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
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
      <!-- Program 1 -->
      <div class="bg-white p-8 rounded-lg shadow-md">
        <h3 class="text-xl font-bold text-gray-800 mb-4">Practical Flight Training</h3>
        <ul class="space-y-3 text-gray-600">
          <li class="flex items-start">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-accent mr-2 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            <span>Takeoff and landing techniques</span>
          </li>
          <li class="flex items-start">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-accent mr-2 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            <span>Navigation and flight planning</span>
          </li>
          <li class="flex items-start">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-accent mr-2 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            <span>Emergency procedures</span>
          </li>
          <li class="flex items-start">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-accent mr-2 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            <span>Mountain flying techniques</span>
          </li>
        </ul>
      </div>
      
      <!-- Program 2 -->
      <div class="bg-white p-8 rounded-lg shadow-md">
        <h3 class="text-xl font-bold text-gray-800 mb-4">Ground School</h3>
        <ul class="space-y-3 text-gray-600">
          <li class="flex items-start">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-accent mr-2 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            <span>Aerodynamics and aircraft systems</span>
          </li>
          <li class="flex items-start">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-accent mr-2 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            <span>Meteorology and weather interpretation</span>
          </li>
          <li class="flex items-start">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-accent mr-2 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            <span>Transport Canada regulations</span>
          </li>
          <li class="flex items-start">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-accent mr-2 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            <span>Navigation and flight planning</span>
          </li>
        </ul>
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
        <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="Pemberton Airport" class="rounded-lg shadow-lg w-full h-auto object-cover">
      </div>
    </div>
  </div>
</section>

<!-- Meet Our Friends Section -->
<section class="py-16 bg-amber-50">
  <div class="container mx-auto px-4">
    <div class="text-center mb-12">
      <h2 class="text-3xl font-bold text-gray-800 mb-4">Meet Our Friends</h2>
      <p class="text-gray-600 max-w-2xl mx-auto">
        Our team of experienced pilots and engineers is dedicated to delivering the best flying experiences.
      </p>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
      <!-- Team Member 1 -->
      <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Team Member" class="w-full h-64 object-cover">
        <div class="p-6">
          <h3 class="text-xl font-bold text-gray-800 mb-1">John Doe</h3>
          <p class="text-amber-600 mb-3">CEO & Founder</p>
          <p class="text-gray-600 text-sm">
            With over 15 years of industry experience, John leads our company with vision and passion.
          </p>
          <div class="mt-4 flex space-x-3">
            <a href="#" class="text-gray-400 hover:text-blue-500">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
              </svg>
            </a>
            <a href="#" class="text-gray-400 hover:text-blue-400">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
              </svg>
            </a>
          </div>
        </div>
      </div>
      
      <!-- Team Member 2 -->
      <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Team Member" class="w-full h-64 object-cover">
        <div class="p-6">
          <h3 class="text-xl font-bold text-gray-800 mb-1">Jane Smith</h3>
          <p class="text-amber-600 mb-3">CTO</p>
          <p class="text-gray-600 text-sm">
            Jane oversees our technical strategy and ensures we stay at the cutting edge of innovation.
          </p>
          <div class="mt-4 flex space-x-3">
            <a href="#" class="text-gray-400 hover:text-blue-500">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
              </svg>
            </a>
            <a href="#" class="text-gray-400 hover:text-blue-400">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
              </svg>
            </a>
          </div>
        </div>
      </div>
      
      <!-- Team Member 3 -->
      <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <img src="https://randomuser.me/api/portraits/men/67.jpg" alt="Team Member" class="w-full h-64 object-cover">
        <div class="p-6">
          <h3 class="text-xl font-bold text-gray-800 mb-1">Michael Johnson</h3>
          <p class="text-amber-600 mb-3">Design Director</p>
          <p class="text-gray-600 text-sm">
            Michael brings creativity and user-centered design principles to all our products.
          </p>
          <div class="mt-4 flex space-x-3">
            <a href="#" class="text-gray-400 hover:text-blue-500">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
              </svg>
            </a>
            <a href="#" class="text-gray-400 hover:text-blue-400">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
              </svg>
            </a>
          </div>
        </div>
      </div>
      
      <!-- Team Member 4 -->
      <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <img src="https://randomuser.me/api/portraits/women/63.jpg" alt="Team Member" class="w-full h-64 object-cover">
        <div class="p-6">
          <h3 class="text-xl font-bold text-gray-800 mb-1">Sarah Williams</h3>
          <p class="text-amber-600 mb-3">Marketing Director</p>
          <p class="text-gray-600 text-sm">
            Sarah develops our marketing strategies and helps us connect with our customers.
          </p>
          <div class="mt-4 flex space-x-3">
            <a href="#" class="text-gray-400 hover:text-blue-500">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
              </svg>
            </a>
            <a href="#" class="text-gray-400 hover:text-blue-400">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
              </svg>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Stats Section -->
<section class="bg-amber-600 py-16 text-white">
  <div class="container mx-auto px-4">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 text-center">
      <!-- Stat 1 -->
      <div>
        <div class="text-4xl font-bold mb-2">1000+</div>
        <div class="text-xl">Hours of Experience</div>
      </div>
      
      <!-- Stat 2 -->
      <div>
        <div class="text-4xl font-bold mb-2">50+</div>
        <div class="text-xl">Students Trained</div>
      </div>
      
      <!-- Stat 3 -->
      <div>
        <div class="text-4xl font-bold mb-2">10+</div>
        <div class="text-xl">Partners</div>
      </div>
      
      <!-- Stat 4 -->
      <div>
        <div class="text-4xl font-bold mb-2">1200+</div>
        <div class="text-xl">Happy Clients</div>
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
          <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Ishan Tewari" class="rounded-full w-48 h-48 object-cover mx-auto shadow-lg">
          <h3 class="text-xl font-bold text-gray-800 text-center mt-4">Ishan Tewari</h3>
          <p class="text-accent text-center">Chief Flight Instructor</p>
        </div>
        <div class="md:w-2/3">
          <p class="text-gray-600 mb-4">
            Even when life gets busy, we never cut corners with pre-flight inspections or maintenance. If something isn't right—whether it's the weather, the aircraft, or your health—we cancel the flight. Situational awareness is your best friend.
          </p>
          <p class="text-gray-600 mb-4">
            Sometimes things happen—perhaps a mistake or an event beyond your control—but an inquiry into any incident will always reveal the truth. At WSS, we stand ready to put our hands on our hearts and speak that truth with confidence.
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
    <a href="/booking" class="inline-block bg-primary hover:bg-primary-light text-white font-bold py-3 px-8 rounded-full transition-all duration-300 shadow-md hover:shadow-lg">
      Book Your Flight
    </a>
  </div>
</section>
@endsection