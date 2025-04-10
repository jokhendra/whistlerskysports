@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
@include('common.header')
<body>
  @include('common.nav')
  <!-- Hero Section with Google Maps -->
  <div class="relative h-[500px] bg-blue-700 overflow-hidden mt-10">
    <div class="absolute inset-0 z-0">
      <iframe 
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3168.639290621064!2d-122.08401492392031!3d37.4219998326378!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808fba02425dad8f%3A0x29cdf01a44fc687f!2sGoogle%20Building%2040!5e0!3m2!1sen!2sus!4v1649285324079!5m2!1sen!2sus" 
        width="100%" 
        height="100%" 
        style="border:0;" 
        allowfullscreen="" 
        loading="lazy" 
        referrerpolicy="no-referrer-when-downgrade">
      </iframe>
    </div>
    <div class="relative z-10 container mx-auto px-4 h-full flex items-center">
      <div class="max-w-2xl">
       
        <!-- <div class="mt-6">
          <a href="https://maps.google.com" target="_blank" class="inline-flex items-center px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-300 shadow-lg hover:shadow-xl">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            Get Directions
          </a>
        </div> -->
      </div>
    </div>
  </div>
  
  <!-- How To Reach Section -->
  <div class="bg-white py-1">
    <div class="container mx-auto px-4">
      <div class="w-full">
        <!-- <h2 class="text-4xl font-bold text-gray-800 mb-12 text-center">How To Reach</h2> -->
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
          <!-- By Air -->
          <div class="perspective h-[450px] rounded-lg overflow-hidden">
            <div class="relative w-full h-full transition-transform duration-500 transform-style-3d hover:rotate-y-180 cursor-pointer">
              <!-- Front of card -->
              <div class="absolute w-full h-full backface-hidden bg-blue-50 rounded-lg p-8 shadow-lg">
                <div class="absolute inset-0 bg-cover bg-center opacity-30" style="background-image: url('https://images.pexels.com/photos/62623/wing-plane-flying-airplane-62623.jpeg?cs=srgb&dl=pexels-pixabay-62623.jpg&fm=jpg');"></div>
                <div class="relative z-10 h-full flex flex-col items-center justify-center">
                  <h3 class="text-4xl font-bold text-blue-700 font-['Poppins']">Air</h3>
                </div>
              </div>
              
              <!-- Back of card -->
              <div class="absolute w-full h-full backface-hidden bg-blue-50 rounded-lg p-8 shadow-lg rotate-y-180">
                <div class="absolute inset-0 bg-cover bg-center opacity-30" style="background-image: url('https://images.pexels.com/photos/62623/wing-plane-flying-airplane-62623.jpeg?cs=srgb&dl=pexels-pixabay-62623.jpg&fm=jpg');"></div>
                <div class="relative z-10 h-full flex flex-col justify-center">
                  <p class="text-blue-800 text-lg leading-relaxed font-['Inter']">Reaching Pemberton Regional Airport (CYPS) in British Columbia, Canada, by air starts with flying into Vancouver International Airport (YVR), about 166 km southwest. From there, since CYPS serves only general aviation, you'd need to charter a flight—such as with Blackcomb Helicopters—or fly privately, taking roughly 30–40 minutes.</p>
                </div>
              </div>
            </div>
          </div>

          <!-- By Road -->
          <div class="perspective h-[450px] rounded-lg overflow-hidden">
            <div class="relative w-full h-full transition-transform duration-500 transform-style-3d hover:rotate-y-180 cursor-pointer">
              <!-- Front of card -->
              <div class="absolute w-full h-full backface-hidden bg-red-50 rounded-lg p-8 shadow-lg">
                <div class="absolute inset-0 bg-cover bg-center opacity-30" style="background-image: url('https://dm0qx8t0i9gc9.cloudfront.net/thumbnails/video/kx2d2Jf/videoblocks-car-passing-very-fastly-cu_rb3lnmfsw_thumbnail-1080_05.png');"></div>
                <div class="relative z-10 h-full flex flex-col items-center justify-center">
                  <h3 class="text-4xl font-bold text-red-700 font-['Poppins']">Road</h3>
                </div>
              </div>
              
              <!-- Back of card -->
              <div class="absolute w-full h-full backface-hidden bg-red-50 rounded-lg p-8 shadow-lg rotate-y-180">
                <div class="absolute inset-0 bg-cover bg-center opacity-30" style="background-image: url('https://dm0qx8t0i9gc9.cloudfront.net/thumbnails/video/kx2d2Jf/videoblocks-car-passing-very-fastly-cu_rb3lnmfsw_thumbnail-1080_05.png');"></div>
                <div class="relative z-10 h-full flex flex-col justify-center">
                  <p class="text-red-800 text-lg leading-relaxed font-['Inter']">Driving to Pemberton Airport is straightforward via BC Highway 99 North (Sea to Sky Highway) from Vancouver, a scenic 2.5–3-hour trip covering 166 km. From Pemberton village, it's just 9 km south on Airport Road, a quick 10–15-minute drive. Public transit is limited—BC Transit connects Pemberton to Whistler, but you'd need a taxi or car for the final stretch to CYPS.</p>
                </div>
              </div>
            </div>
          </div>

          <!-- By Train -->
          <div class="perspective h-[450px] rounded-lg overflow-hidden">
            <div class="relative w-full h-full transition-transform duration-500 transform-style-3d hover:rotate-y-180 cursor-pointer">
              <!-- Front of card -->
              <div class="absolute w-full h-full backface-hidden bg-yellow-100 rounded-lg p-8 shadow-lg">
                <div class="absolute inset-0 bg-cover bg-center opacity-30" style="background-image: url('https://www.adventureworld.com/media/dyiami5o/canada-via-rail-winter.jpg?center=0.4486666755911942%2C0.19423558897243107&format=webp&mode=crop&width=1200&height=1200&quality=80');"></div>
                <div class="relative z-10 h-full flex flex-col items-center justify-center">
                  <h3 class="text-4xl font-bold text-yellow-700 font-['Poppins']">Train</h3>
                </div>
              </div>
              
              <!-- Back of card -->
              <div class="absolute w-full h-full backface-hidden bg-yellow-100 rounded-lg p-8 shadow-lg rotate-y-180">
                <div class="absolute inset-0 bg-cover bg-center opacity-30" style="background-image: url('https://www.adventureworld.com/media/dyiami5o/canada-via-rail-winter.jpg?center=0.4486666755911942%2C0.19423558897243107&format=webp&mode=crop&width=1200&height=1200&quality=80');"></div>
                <div class="relative z-10 h-full flex flex-col justify-center">
                  <p class="text-yellow-800 text-lg leading-relaxed font-['Inter']">Train travel to Pemberton Airport isn't practical, as no direct passenger rail serves the area. The Rocky Mountaineer offers a seasonal Vancouver-to-Whistler route (3–4 hours), but stops 32 km short of Pemberton. From Whistler, you'd rely on a bus or taxi to reach Pemberton, then drive the last 9 km, making this the least efficient option.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Contact Section -->
  <div class="py-16">
    <div class="container mx-auto px-4">
      
      
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
        <!-- Contact Information and Map -->
        <div>
          <div class="p-8 mb-8 transform transition duration-300">
            <h2 class="text-2xl font-bold text-blue-800 mb-6 flex items-center">
              <span class="inline-block mr-3 p-2 bg-blue-100 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
              </span>
              Contact Information
            </h2>
            
            <div class="space-y-6">
              <div class="flex items-start group">
                <div class="flex-shrink-0 h-12 w-12 flex items-center justify-center rounded-full bg-blue-100 text-blue-600 group-hover:bg-blue-600 group-hover:text-white transition duration-300">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                  </svg>
                </div>
                <div class="ml-4">
                  <h3 class="text-lg font-medium text-gray-900">Phone</h3>
                  <p class="mt-1 text-gray-600">+1 216-288-1303</p>
                  <!-- <p class="mt-1 text-gray-600">+1 (604) 987-6543</p> -->
                  <a href="tel:+16041234567" class="inline-block mt-2 text-blue-600 hover:text-blue-800 font-medium text-sm">Call Us Now →</a>
                </div>
              </div>
              
              <div class="flex items-start group">
                <div class="flex-shrink-0 h-12 w-12 flex items-center justify-center rounded-full bg-blue-100 text-blue-600 group-hover:bg-blue-600 group-hover:text-white transition duration-300">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                  </svg>
                </div>
                <div class="ml-4">
                  <h3 class="text-lg font-medium text-gray-900">Email</h3>
                  <p class="mt-1 text-gray-600">info@whistlerskysports.ca</p>
                  <!-- <p class="mt-1 text-gray-600">support@powerhanggliders.com</p> -->
                  <a href="mailto:info@powerhanggliders.com" class="inline-block mt-2 text-blue-600 hover:text-blue-800 font-medium text-sm">Email Us →</a>
                </div>
              </div>
              
              <div class="flex items-start group">
                <div class="flex-shrink-0 h-12 w-12 flex items-center justify-center rounded-full bg-blue-100 text-blue-600 group-hover:bg-blue-600 group-hover:text-white transition duration-300">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                  </svg>
                </div>
                <div class="ml-4">
                  <h3 class="text-lg font-medium text-gray-900">Our Location</h3>
                  <p class="mt-1 text-gray-600">123 Skyway Drive, Mountain View, CA 94043, USA</p>
                  <a href="https://maps.google.com" target="_blank" class="inline-block mt-2 text-blue-600 hover:text-blue-800 font-medium text-sm">Get Directions →</a>
                </div>
              </div>
            </div>
            
            <!-- Social Media Links -->
            <div class="mt-8 pt-6 border-t border-gray-200">
              <h3 class="text-lg font-medium text-gray-900 mb-4">Connect With Us</h3>
              <div class="flex space-x-4">
                <a href="#" class="h-10 w-10 flex items-center justify-center rounded-full bg-blue-600 text-white hover:bg-blue-700 transition duration-300">
                  <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                  </svg>
                </a>
                <a href="#" class="h-10 w-10 flex items-center justify-center rounded-full bg-blue-400 text-white hover:bg-blue-500 transition duration-300">
                  <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                  </svg>
                </a>
                <a href="https://www.instagram.com/whistlerskysports/" target="_blank" class="h-10 w-10 flex items-center justify-center rounded-full bg-red-600 text-white hover:bg-red-700 transition duration-300">
                  <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" />
                  </svg>
                </a>
                <a href="#" class="h-10 w-10 flex items-center justify-center rounded-full bg-blue-800 text-white hover:bg-blue-900 transition duration-300">
                  <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path fill-rule="evenodd" d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" clip-rule="evenodd" />
                  </svg>
                </a>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Contact Form -->
        <div class="h-[800px] p-8 transform transition duration-300">
          <h2 class="text-2xl font-bold text-blue-800 mb-6 flex items-center">
            <span class="inline-block mr-3 p-2 bg-blue-100 rounded-full">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
              </svg>
            </span>
            Send Us a Message
          </h2>
          
          @if(session('success'))
          <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6 animate__animated animate__fadeIn" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
              <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <title>Close</title>
                <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/>
              </svg>
            </span>
          </div>
          @endif
          
          @if(session('error'))
          <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6 animate__animated animate__fadeIn" role="alert">
            <strong class="font-bold">Error!</strong>
            <span class="block sm:inline">{{ session('error') }}</span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
              <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <title>Close</title>
                <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/>
              </svg>
            </span>
          </div>
          @endif
          
          @if($errors->any())
          <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6" role="alert">
            <strong class="font-bold">Oops!</strong>
            <span class="block sm:inline">Please correct the errors below and try again.</span>
            <ul class="mt-2 list-disc list-inside">
              @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif
          
          <form class="space-y-6" action="/contact" method="POST">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <div class="relative">
                <label for="name" class="block text-gray-700 font-medium mb-2">Your Name</label>
                <input type="text" id="name" placeholder="Enter your name" name="name" class="w-full px-4 py-3 border bg-white border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200" required>
                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-blue-600 opacity-0 transition-opacity duration-200 input-icon">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                  </svg>
                </div>
              </div>
              
              <div class="relative">
                <label for="email" class="block text-gray-700 font-medium mb-2">Email Address</label>
                <input type="email" id="email" placeholder="Enter your email" name="email" class="w-full px-4 bg-white py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200" required>
                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-blue-600 opacity-0 transition-opacity duration-200 input-icon">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                  </svg>
                </div>
              </div>
            </div>
            
            <div class="relative">
              <label for="phone" class="block text-gray-700 font-medium mb-2">Phone Number</label>
              <input type="tel" id="phone" placeholder="Enter your phone number" name="phone" class="w-full ps-10 px-4 bg-white py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200" required>
              <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-blue-600 opacity-0 transition-opacity duration-200 input-icon">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
              </div>
            </div>
            
            <div>
              <label for="subject" class="block text-gray-700 font-medium mb-2">Subject</label>
              <div class="relative">
                <select id="subject" name="subject" class="appearance-none w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 bg-white" required>
                  <option value="">Select a subject</option>
                  <option value="product_inquiry">Product Inquiry</option>
                  <option value="training">Training Programs</option>
                  <option value="maintenance">Maintenance & Repairs</option>
                  <option value="parts">Spare Parts</option>
                  <option value="other">Other</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gray-700">
                  <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                  </svg>
                </div>
              </div>
            </div>
            
            <div>
              <label for="message" class="block text-gray-700 font-medium mb-2">Your Message</label>
              <textarea id="message" name="message" placeholder="Enter your message..."  rows="5" class="w-full bg-white px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200" required></textarea>
            </div>
            
            <div class="flex items-center">
              <input type="checkbox" id="consent" name="consent" class="h-5 w-5 text-blue-600 focus:ring-blue-500 border-gray-300 rounded transition duration-200" required>
              <label for="consent" class="ml-3 block text-sm text-gray-700">
                I consent to having this website store my submitted information so they can respond to my inquiry.
              </label>
            </div>
            
            <div>
              <button type="submit" class="w-full bg-[#F05052] hover:bg-[#F05052] text-white font-bold py-3 px-6 rounded-lg transition duration-300 ease-in-out transform hover:scale-[1.02] focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 shadow-lg hover:shadow-xl flex items-center justify-center group cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 transition-transform duration-300 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                </svg>
                <span class="relative inline-block overflow-hidden">
                  <span class="block transition-transform duration-300 group-hover:-translate-y-full">Submit</span>
                  <span class="absolute top-0 left-0 transition-transform duration-300 translate-y-full group-hover:translate-y-0">Submit</span>
                </span>
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  

  
  
  <!-- Add intl-tel-input CSS and JS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
  
  <style>
    .iti {
      width: 100%;
    }

    .iti__country-list {
      max-height: 300px;
      width: 200px;
      overflow-y: scroll;
      overflow-x: hidden;
    }

    .iti__selected-flag {
      padding: 0 8px 0 8px;
      background-color: #F3F4F6 !important;
      width: auto;
    }

    .iti--separate-dial-code .iti__selected-flag {
      background-color: #F3F4F6;
      border-radius: 0.5rem 0 0 0.5rem;
      border: 1px solid #D1D5DB;
      border-right: none;
      min-width: 95px;
    }

    .iti--separate-dial-code input {
      border-radius: 0 0.5rem 0.5rem 0;
      padding-left: 100px !important;
      padding-right: 15px;
      width: 100%;
    }

    .iti--separate-dial-code .iti__selected-dial-code {
      padding-left: 10px;
    }

    .iti__country {
      padding: 8px 10px;
      display: flex;
      align-items: center;
    }

    .iti__country-name {
      margin-left: 8px;
      font-size: 14px;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }

    .iti__dial-code {
      color: #6B7280;
      font-size: 13px;
    }

    #phone {
      height: 3rem;
      border-color: #D1D5DB;
      transition: all 0.2s;
      width: 100%;
      text-indent: 0;
    }

    #phone:focus {
      border-color: #3B82F6;
      box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.25);
      outline: none;
    }

    #phone.error {
      border-color: #EF4444;
    }
    
    /* Card Flip Styles */
    .perspective {
      perspective: 1000px;
    }
    
    .transform-style-3d {
      transform-style: preserve-3d;
    }
    
    .backface-hidden {
      backface-visibility: hidden;
      -webkit-backface-visibility: hidden;
    }
    
    .rotate-y-180 {
      transform: rotateY(180deg);
    }
  </style>
  
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const phoneInput = document.querySelector("#phone");
      const iti = window.intlTelInput(phoneInput, {
        separateDialCode: true,
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
        initialCountry: "ca",
        onlyCountries: [], // This will show all countries
        localizedCountries: {}, // Use default country names
        formatOnDisplay: true,
        autoPlaceholder: "aggressive",
        customPlaceholder: function(selectedCountryPlaceholder, selectedCountryData) {
          return "e.g. " + selectedCountryPlaceholder;
        }
      });

      // Allow only numbers and prevent non-numeric input
      phoneInput.addEventListener('keypress', function(e) {
        const char = String.fromCharCode(e.which);
        if (!/[0-9]/.test(char)) {
          e.preventDefault();
        }
      });

      // Prevent paste of non-numeric characters
      phoneInput.addEventListener('paste', function(e) {
        const pastedText = (e.clipboardData || window.clipboardData).getData('text');
        if (!/^\d+$/.test(pastedText)) {
          e.preventDefault();
        }
      });

      // Clean any non-numeric characters on input
      phoneInput.addEventListener('input', function() {
        this.value = this.value.replace(/[^\d]/g, '');
        if (iti.isValidNumber()) {
          this.classList.remove('error');
        }
      });

      // Validate on blur
      phoneInput.addEventListener('blur', function() {
        if (phoneInput.value.trim()) {
          if (!iti.isValidNumber()) {
            phoneInput.classList.add('error');
          } else {
            phoneInput.classList.remove('error');
          }
        }
      });

      // Form validation
      const form = document.querySelector('form');
      form.addEventListener('submit', function(e) {
        if (!iti.isValidNumber()) {
          e.preventDefault();
          phoneInput.classList.add('error');
          alert('Please enter a valid phone number');
          phoneInput.focus();
          return false;
        }
        phoneInput.value = iti.getNumber();
      });

      // Alert dismissal
      const closeButtons = document.querySelectorAll('.bg-green-100 svg, .bg-red-100 svg');
      closeButtons.forEach(button => {
        button.addEventListener('click', function() {
          const alert = this.closest('[role="alert"]');
          alert.classList.add('opacity-0');
          setTimeout(() => {
            alert.style.display = 'none';
          }, 300);
        });
      });
    });
  </script>
</body>
</html>
@endsection