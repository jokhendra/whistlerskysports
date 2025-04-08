@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
@include('common.header')
<body>
  @include('common.nav')
  
  <!-- Gallery Hero Section -->
  <!-- <div class="bg-gradient-to-b from-blue-900 to-blue-700 text-white py-16">
    <div class="container mx-auto px-4 text-center">
      <h1 class="text-4xl md:text-5xl font-bold mb-4">Gallery</h1>
      <p class="text-lg text-blue-100 max-w-3xl mx-auto">Explore our collection of stunning images showcasing the beauty and excitement of power hang gliding. From breathtaking aerial views to close-up shots of our gliders, these images capture the essence of the sport and the passion of our community.</p>
    </div>
  </div> -->
  
  <!-- Gallery Filter Section -->
  <div class="bg-gradient-to-b from-gray-50 to-white py-16">
    <div class="container mx-auto px-4">
      <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-gray-800 mb-4">Select Your Experience</h2>
        <p class="text-gray-600 max-w-2xl mx-auto">Choose a category to explore our collection of stunning aerial adventures</p>
      </div>
      
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
        <!-- Aerial View Box -->
        <div class="filter-box cursor-pointer transform transition-all duration-300 hover:scale-105" data-filter="aerial">
          <div class="bg-white rounded-2xl shadow-xl overflow-hidden h-64 relative group border-2 border-transparent hover:border-blue-500">
            <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black/60 z-10"></div>
            <img src="{{ asset('images/aerial_views/aerial_view1.png') }}" 
                 alt="Aerial View" 
                 class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
            <div class="absolute inset-0 flex flex-col justify-end p-8 z-20">
              <div class="transform transition-all duration-300 group-hover:translate-y-0 translate-y-4">
                <h3 class="text-3xl font-bold text-white mb-3">Aerial View</h3>
                <p class="text-white/90 text-lg">Experience breathtaking views from above</p>
                <div class="mt-4 flex items-center text-white/80">
                  <span class="text-sm">Click to explore</span>
                  <svg class="w-5 h-5 ml-2 transform transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                  </svg>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Microlite Box -->
        <div class="filter-box cursor-pointer transform transition-all duration-300 hover:scale-105" data-filter="microlite">
          <div class="bg-white rounded-2xl shadow-xl overflow-hidden h-64 relative group border-2 border-transparent hover:border-blue-500">
            <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black/60 z-10"></div>
            <img src="{{ asset('images/microlite/Single_Ultraligh1.jpeg') }}" 
                 alt="Microlite" 
                 class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
            <div class="absolute inset-0 flex flex-col justify-end p-8 z-20">
              <div class="transform transition-all duration-300 group-hover:translate-y-0 translate-y-4">
                <h3 class="text-3xl font-bold text-white mb-3">Microlite</h3>
                <p class="text-white/90 text-lg">Lightweight and agile flying experience</p>
                <div class="mt-4 flex items-center text-white/80">
                  <span class="text-sm">Click to explore</span>
                  <svg class="w-5 h-5 ml-2 transform transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                  </svg>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Gyrocopter Box -->
        <div class="filter-box cursor-pointer transform transition-all duration-300 hover:scale-105" data-filter="gyrocopter">
          <div class="bg-white rounded-2xl shadow-xl overflow-hidden h-64 relative group border-2 border-transparent hover:border-blue-500">
            <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black/60 z-10"></div>
            <img src="{{ asset('images/AnyConv.com__IMG_7013.jpg') }}" 
                 alt="Gyrocopter" 
                 class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
            <div class="absolute inset-0 flex flex-col justify-end p-8 z-20">
              <div class="transform transition-all duration-300 group-hover:translate-y-0 translate-y-4">
                <h3 class="text-3xl font-bold text-white mb-3">Fixed Wings</h3>
                <!-- <p class="text-white/90 text-lg">Unique rotary-wing aircraft experience</p> -->
                <div class="mt-4 flex items-center text-white/80">
                  <span class="text-sm">Click to explore</span>
                  <svg class="w-5 h-5 ml-2 transform transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                  </svg>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Gallery Grid -->
  <div class="py-16 bg-gradient-to-b from-white to-gray-50">
    <div class="container mx-auto px-4">
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        <!-- Aerial Views -->
        <div class="gallery-item aerial opacity-0 translate-y-8 transition-all duration-700" data-category="aerial">
          <div class="relative overflow-hidden rounded-2xl shadow-xl group cursor-pointer h-80 transform transition-all duration-500 hover:shadow-2xl hover:-translate-y-2">
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 z-10"></div>
            <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" 
                 data-src="{{ asset('images/aerial_views/aerial_view1.png') }}" 
                 alt="Whistler Aerial View" 
                 class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 lazy-image">
            <div class="absolute inset-0 flex flex-col justify-end p-6 z-20 transform translate-y-6 group-hover:translate-y-0 transition-transform duration-500">
              <div class="space-y-2">
                <h3 class="text-2xl font-bold text-white">Whistler Aerial View</h3>
                <p class="text-white/90 text-sm">Breathtaking views of Whistler from above</p>
                <div class="flex items-center space-x-2 text-white/80">
                  <span class="text-sm">View Details</span>
                  <svg class="w-4 h-4 transform transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                  </svg>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="gallery-item aerial opacity-0 translate-y-8 transition-all duration-700" data-category="aerial">
          <div class="relative overflow-hidden rounded-2xl shadow-xl group cursor-pointer h-80 transform transition-all duration-500 hover:shadow-2xl hover:-translate-y-2">
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 z-10"></div>
            <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" 
                 data-src="{{ asset('images/aerial_views/aerial_view2.png') }}" 
                 alt="Whistler Mountain Aerial" 
                 class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 lazy-image">
            <div class="absolute inset-0 flex flex-col justify-end p-6 z-20 transform translate-y-6 group-hover:translate-y-0 transition-transform duration-500">
              <div class="space-y-2">
                <h3 class="text-2xl font-bold text-white">Whistler Mountain Aerial</h3>
                <p class="text-white/90 text-sm">Stunning views of Whistler Mountain</p>
                <div class="flex items-center space-x-2 text-white/80">
                  <span class="text-sm">View Details</span>
                  <svg class="w-4 h-4 transform transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                  </svg>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="gallery-item aerial opacity-0 translate-y-8 transition-all duration-700" data-category="aerial">
          <div class="relative overflow-hidden rounded-2xl shadow-xl group cursor-pointer h-80 transform transition-all duration-500 hover:shadow-2xl hover:-translate-y-2">
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 z-10"></div>
            <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" 
                 data-src="{{ asset('images/aerial_views/aerial_view3.png') }}" 
                 alt="Whistler Skydive Aerial" 
                 class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 lazy-image">
            <div class="absolute inset-0 flex flex-col justify-end p-6 z-20 transform translate-y-6 group-hover:translate-y-0 transition-transform duration-500">
              <div class="space-y-2">
                <h3 class="text-2xl font-bold text-white">Whistler Skydive Aerial</h3>
                <p class="text-white/90 text-sm">Aerial view from skydiving experience</p>
                <div class="flex items-center space-x-2 text-white/80">
                  <span class="text-sm">View Details</span>
                  <svg class="w-4 h-4 transform transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                  </svg>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="gallery-item aerial opacity-0 translate-y-8 transition-all duration-700" data-category="aerial">
          <div class="relative overflow-hidden rounded-2xl shadow-xl group cursor-pointer h-80 transform transition-all duration-500 hover:shadow-2xl hover:-translate-y-2">
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 z-10"></div>
            <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" 
                 data-src="{{ asset('images/aerial_views/aerial_view4.png') }}" 
                 alt="Whistler Valley Aerial" 
                 class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 lazy-image">
            <div class="absolute inset-0 flex flex-col justify-end p-6 z-20 transform translate-y-6 group-hover:translate-y-0 transition-transform duration-500">
              <div class="space-y-2">
                <h3 class="text-2xl font-bold text-white">Whistler Valley Aerial</h3>
                <p class="text-white/90 text-sm">Panoramic view of Whistler Valley</p>
                <div class="flex items-center space-x-2 text-white/80">
                  <span class="text-sm">View Details</span>
                  <svg class="w-4 h-4 transform transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                  </svg>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="gallery-item aerial opacity-0 translate-y-8 transition-all duration-700" data-category="aerial">
          <div class="relative overflow-hidden rounded-2xl shadow-xl group cursor-pointer h-80 transform transition-all duration-500 hover:shadow-2xl hover:-translate-y-2">
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 z-10"></div>
            <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" 
                 data-src="{{ asset('images/aerial_views/aerial_view5.png') }}" 
                 alt="Whistler Lake Aerial" 
                 class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 lazy-image">
            <div class="absolute inset-0 flex flex-col justify-end p-6 z-20 transform translate-y-6 group-hover:translate-y-0 transition-transform duration-500">
              <div class="space-y-2">
                <h3 class="text-2xl font-bold text-white">Whistler Lake Aerial</h3>
                <p class="text-white/90 text-sm">Aerial view of Whistler's lakes</p>
                <div class="flex items-center space-x-2 text-white/80">
                  <span class="text-sm">View Details</span>
                  <svg class="w-4 h-4 transform transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                  </svg>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="gallery-item aerial opacity-0 translate-y-8 transition-all duration-700" data-category="aerial">
          <div class="relative overflow-hidden rounded-2xl shadow-xl group cursor-pointer h-80 transform transition-all duration-500 hover:shadow-2xl hover:-translate-y-2">
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 z-10"></div>
            <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" 
                 data-src="{{ asset('images/aerial_views/aerial_view6.png') }}" 
                 alt="Whistler Forest Aerial" 
                 class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 lazy-image">
            <div class="absolute inset-0 flex flex-col justify-end p-6 z-20 transform translate-y-6 group-hover:translate-y-0 transition-transform duration-500">
              <div class="space-y-2">
                <h3 class="text-2xl font-bold text-white">Whistler Forest Aerial</h3>
                <p class="text-white/90 text-sm">Aerial view of Whistler's forests</p>
                <div class="flex items-center space-x-2 text-white/80">
                  <span class="text-sm">View Details</span>
                  <svg class="w-4 h-4 transform transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                  </svg>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="gallery-item aerial opacity-0 translate-y-8 transition-all duration-700" data-category="aerial">
          <div class="relative overflow-hidden rounded-2xl shadow-xl group cursor-pointer h-80 transform transition-all duration-500 hover:shadow-2xl hover:-translate-y-2">
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 z-10"></div>
            <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" 
                 data-src="{{ asset('images/aerial_views/aerial_view7.png') }}" 
                 alt="Whistler Sunset Aerial" 
                 class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 lazy-image">
            <div class="absolute inset-0 flex flex-col justify-end p-6 z-20 transform translate-y-6 group-hover:translate-y-0 transition-transform duration-500">
              <div class="space-y-2">
                <h3 class="text-2xl font-bold text-white">Whistler Sunset Aerial</h3>
                <p class="text-white/90 text-sm">Beautiful sunset view from above</p>
                <div class="flex items-center space-x-2 text-white/80">
                  <span class="text-sm">View Details</span>
                  <svg class="w-4 h-4 transform transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                  </svg>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="gallery-item aerial opacity-0 translate-y-8 transition-all duration-700" data-category="aerial">
          <div class="relative overflow-hidden rounded-2xl shadow-xl group cursor-pointer h-80 transform transition-all duration-500 hover:shadow-2xl hover:-translate-y-2">
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 z-10"></div>
            <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" 
                 data-src="{{ asset('images/aerial_views/Whistler 1.jpg') }}" 
                 alt="Whistler Mountain Range" 
                 class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 lazy-image">
            <div class="absolute inset-0 flex flex-col justify-end p-6 z-20 transform translate-y-6 group-hover:translate-y-0 transition-transform duration-500">
              <div class="space-y-2">
                <h3 class="text-2xl font-bold text-white">Whistler Mountain Range</h3>
                <p class="text-white/90 text-sm">Panoramic view of the mountain range</p>
                <div class="flex items-center space-x-2 text-white/80">
                  <span class="text-sm">View Details</span>
                  <svg class="w-4 h-4 transform transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                  </svg>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="gallery-item aerial opacity-0 translate-y-8 transition-all duration-700" data-category="aerial">
          <div class="relative overflow-hidden rounded-2xl shadow-xl group cursor-pointer h-80 transform transition-all duration-500 hover:shadow-2xl hover:-translate-y-2">
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 z-10"></div>
            <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" 
                 data-src="{{ asset('images/aerial_views/Whistler 2.jpg') }}" 
                 alt="Whistler Village Aerial" 
                 class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 lazy-image">
            <div class="absolute inset-0 flex flex-col justify-end p-6 z-20 transform translate-y-6 group-hover:translate-y-0 transition-transform duration-500">
              <div class="space-y-2">
                <h3 class="text-2xl font-bold text-white">Whistler Village Aerial</h3>
                <p class="text-white/90 text-sm">Aerial view of Whistler Village</p>
                <div class="flex items-center space-x-2 text-white/80">
                  <span class="text-sm">View Details</span>
                  <svg class="w-4 h-4 transform transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                  </svg>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="gallery-item aerial opacity-0 translate-y-8 transition-all duration-700" data-category="aerial">
          <div class="relative overflow-hidden rounded-2xl shadow-xl group cursor-pointer h-80 transform transition-all duration-500 hover:shadow-2xl hover:-translate-y-2">
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 z-10"></div>
            <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" 
                 data-src="{{ asset('images/aerial_views/Whistler Skydive 3.jpg') }}" 
                 alt="Whistler Panorama" 
                 class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 lazy-image">
            <div class="absolute inset-0 flex flex-col justify-end p-6 z-20 transform translate-y-6 group-hover:translate-y-0 transition-transform duration-500">
              <div class="space-y-2">
                <h3 class="text-2xl font-bold text-white">Whistler Panorama</h3>
                <p class="text-white/90 text-sm">360° panoramic view of Whistler</p>
                <div class="flex items-center space-x-2 text-white/80">
                  <span class="text-sm">View Details</span>
                  <svg class="w-4 h-4 transform transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                  </svg>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Microlite -->
        <div class="gallery-item microlite opacity-0 translate-y-8 transition-all duration-700" data-category="microlite">
          <div class="relative overflow-hidden rounded-2xl shadow-xl group cursor-pointer h-80 transform transition-all duration-500 hover:shadow-2xl hover:-translate-y-2">
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 z-10"></div>
            <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" 
                 data-src="{{ asset('images/microlite/Single_Ultraligh1.jpeg') }}" 
                 alt="Single Ultralight" 
                 class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 lazy-image">
            <div class="absolute inset-0 flex flex-col justify-end p-6 z-20 transform translate-y-6 group-hover:translate-y-0 transition-transform duration-500">
              <div class="space-y-2">
                <h3 class="text-2xl font-bold text-white">Single Ultralight</h3>
                <p class="text-white/90 text-sm">Lightweight and agile flying machine</p>
                <div class="flex items-center space-x-2 text-white/80">
                  <span class="text-sm">View Details</span>
                  <svg class="w-4 h-4 transform transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                  </svg>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="gallery-item microlite opacity-0 translate-y-8 transition-all duration-700" data-category="microlite">
          <div class="relative overflow-hidden rounded-2xl shadow-xl group cursor-pointer h-80 transform transition-all duration-500 hover:shadow-2xl hover:-translate-y-2">
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 z-10"></div>
            <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" 
                 data-src="{{ asset('images/microlite/Solo_2.jpeg') }}" 
                 alt="Solo Ultralight" 
                 class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 lazy-image">
            <div class="absolute inset-0 flex flex-col justify-end p-6 z-20 transform translate-y-6 group-hover:translate-y-0 transition-transform duration-500">
              <div class="space-y-2">
                <h3 class="text-2xl font-bold text-white">Solo Ultralight</h3>
                <p class="text-white/90 text-sm">Experience the thrill of solo flying</p>
                <div class="flex items-center space-x-2 text-white/80">
                  <span class="text-sm">View Details</span>
                  <svg class="w-4 h-4 transform transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                  </svg>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="gallery-item microlite opacity-0 translate-y-8 transition-all duration-700" data-category="microlite">
          <div class="relative overflow-hidden rounded-2xl shadow-xl group cursor-pointer h-80 transform transition-all duration-500 hover:shadow-2xl hover:-translate-y-2">
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 z-10"></div>
            <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" 
                 data-src="{{ asset('images/microlite/Hangar.jpeg') }}" 
                 alt="Microlite Hangar" 
                 class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 lazy-image">
            <div class="absolute inset-0 flex flex-col justify-end p-6 z-20 transform translate-y-6 group-hover:translate-y-0 transition-transform duration-500">
              <div class="space-y-2">
                <h3 class="text-2xl font-bold text-white">Microlite Hangar</h3>
                <p class="text-white/90 text-sm">Our fleet of microlite aircraft</p>
                <div class="flex items-center space-x-2 text-white/80">
                  <span class="text-sm">View Details</span>
                  <svg class="w-4 h-4 transform transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                  </svg>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="gallery-item microlite opacity-0 translate-y-8 transition-all duration-700" data-category="microlite">
          <div class="relative overflow-hidden rounded-2xl shadow-xl group cursor-pointer h-80 transform transition-all duration-500 hover:shadow-2xl hover:-translate-y-2">
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 z-10"></div>
            <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" 
                 data-src="{{ asset('images/microlite/Skypper 2.jpeg') }}" 
                 alt="Skypper Microlite" 
                 class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 lazy-image">
            <div class="absolute inset-0 flex flex-col justify-end p-6 z-20 transform translate-y-6 group-hover:translate-y-0 transition-transform duration-500">
              <div class="space-y-2">
                <h3 class="text-2xl font-bold text-white">Skypper Microlite</h3>
                <p class="text-white/90 text-sm">Our flagship microlite aircraft</p>
                <div class="flex items-center space-x-2 text-white/80">
                  <span class="text-sm">View Details</span>
                  <svg class="w-4 h-4 transform transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                  </svg>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="gallery-item microlite opacity-0 translate-y-8 transition-all duration-700" data-category="microlite">
          <div class="relative overflow-hidden rounded-2xl shadow-xl group cursor-pointer h-80 transform transition-all duration-500 hover:shadow-2xl hover:-translate-y-2">
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 z-10"></div>
            <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" 
                 data-src="{{ asset('images/microlite/Landscape.jpg') }}" 
                 alt="Microlite Landscape" 
                 class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 lazy-image">
            <div class="absolute inset-0 flex flex-col justify-end p-6 z-20 transform translate-y-6 group-hover:translate-y-0 transition-transform duration-500">
              <div class="space-y-2">
                <h3 class="text-2xl font-bold text-white">Microlite Landscape</h3>
                <p class="text-white/90 text-sm">Breathtaking views from above</p>
                <div class="flex items-center space-x-2 text-white/80">
                  <span class="text-sm">View Details</span>
                  <svg class="w-4 h-4 transform transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                  </svg>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="gallery-item microlite opacity-0 translate-y-8 transition-all duration-700" data-category="microlite">
          <div class="relative overflow-hidden rounded-2xl shadow-xl group cursor-pointer h-80 transform transition-all duration-500 hover:shadow-2xl hover:-translate-y-2">
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 z-10"></div>
            <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" 
                 data-src="{{ asset('images/microlite/Landsacpe2.jpg') }}" 
                 alt="Microlite Landscape 2" 
                 class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 lazy-image">
            <div class="absolute inset-0 flex flex-col justify-end p-6 z-20 transform translate-y-6 group-hover:translate-y-0 transition-transform duration-500">
              <div class="space-y-2">
                <h3 class="text-2xl font-bold text-white">Microlite Landscape 2</h3>
                <p class="text-white/90 text-sm">Stunning aerial perspectives</p>
                <div class="flex items-center space-x-2 text-white/80">
                  <span class="text-sm">View Details</span>
                  <svg class="w-4 h-4 transform transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                  </svg>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="gallery-item microlite opacity-0 translate-y-8 transition-all duration-700" data-category="microlite">
          <div class="relative overflow-hidden rounded-2xl shadow-xl group cursor-pointer h-80 transform transition-all duration-500 hover:shadow-2xl hover:-translate-y-2">
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 z-10"></div>
            <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" 
                 data-src="{{ asset('images/microlite/Copy of image000001.JPG') }}" 
                 alt="Microlite Adventure" 
                 class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 lazy-image">
            <div class="absolute inset-0 flex flex-col justify-end p-6 z-20 transform translate-y-6 group-hover:translate-y-0 transition-transform duration-500">
              <div class="space-y-2">
                <h3 class="text-2xl font-bold text-white">Microlite Adventure</h3>
                <p class="text-white/90 text-sm">Experience the freedom of flight</p>
                <div class="flex items-center space-x-2 text-white/80">
                  <span class="text-sm">View Details</span>
                  <svg class="w-4 h-4 transform transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                  </svg>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Gyrocopter -->
        <div class="gallery-item gyrocopter opacity-0 translate-y-8 transition-all duration-700" data-category="gyrocopter">
          <div class="relative overflow-hidden rounded-2xl shadow-xl group cursor-pointer h-80 transform transition-all duration-500 hover:shadow-2xl hover:-translate-y-2">
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 z-10"></div>
            <img src="{{ asset('images/fixed_wings/AnyConv.com__IMG_7013.jpg') }}"
                 data-src="{{ asset('images/fixed_wings/AnyConv.com__IMG_7013.jpg') }}" 
                 alt="Gyrocopter" 
                 class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 lazy-image">
            <div class="absolute inset-0 flex flex-col justify-end p-6 z-20 transform translate-y-6 group-hover:translate-y-0 transition-transform duration-500">
              <div class="space-y-2">
                <h3 class="text-2xl font-bold text-white">Fixed Wings</h3>
                <p class="text-white/90 text-sm">Unique rotary-wing aircraft</p>
                <div class="flex items-center space-x-2 text-white/80">
                  <span class="text-sm">View Details</span>
                  <svg class="w-4 h-4 transform transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                  </svg>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="gallery-item gyrocopter opacity-0 translate-y-8 transition-all duration-700" data-category="gyrocopter">
          <div class="relative overflow-hidden rounded-2xl shadow-xl group cursor-pointer h-80 transform transition-all duration-500 hover:shadow-2xl hover:-translate-y-2">
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 z-10"></div>
            <img src="{{ asset('images/fixed_wings/AnyConv.com__IMG_7016 2.jpg') }}"
                 data-src="{{ asset('images/fixed_wings/AnyConv.com__IMG_7016 2.jpg') }}"
                 alt="Gyrocopter in flight" 
                 class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 lazy-image">
            <div class="absolute inset-0 flex flex-col justify-end p-6 z-20 transform translate-y-6 group-hover:translate-y-0 transition-transform duration-500">
              <div class="space-y-2">
                <h3 class="text-2xl font-bold text-white">Fixed Wings Adventure</h3>
                <p class="text-white/90 text-sm">Experience the unique gyrocopter flight</p>
                <div class="flex items-center space-x-2 text-white/80">
                  <span class="text-sm">View Details</span>
                  <svg class="w-4 h-4 transform transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                  </svg>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="gallery-item gyrocopter opacity-0 translate-y-8 transition-all duration-700" data-category="gyrocopter">
          <div class="relative overflow-hidden rounded-2xl shadow-xl group cursor-pointer h-80 transform transition-all duration-500 hover:shadow-2xl hover:-translate-y-2">
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 z-10"></div>
            <img src="{{ asset('images/fixed_wings/AnyConv.com__IMG_7017 2.jpg') }}"
                 data-src="{{ asset('images/fixed_wings/AnyConv.com__IMG_7017 2.jpg') }}"
                 alt="Gyrocopter in flight" 
                 class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 lazy-image">
            <div class="absolute inset-0 flex flex-col justify-end p-6 z-20 transform translate-y-6 group-hover:translate-y-0 transition-transform duration-500">
              <div class="space-y-2">
                <h3 class="text-2xl font-bold text-white">Fixed Wings Adventure</h3>
                <p class="text-white/90 text-sm">Experience the unique gyrocopter flight</p>
                <div class="flex items-center space-x-2 text-white/80">
                  <span class="text-sm">View Details</span>
                  <svg class="w-4 h-4 transform transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                  </svg>
                </div>
              </div>
            </div>
          </div>
        </div>


        <div class="gallery-item gyrocopter opacity-0 translate-y-8 transition-all duration-700" data-category="gyrocopter">
          <div class="relative overflow-hidden rounded-2xl shadow-xl group cursor-pointer h-80 transform transition-all duration-500 hover:shadow-2xl hover:-translate-y-2">
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 z-10"></div>
            <img src="{{ asset('images/fixed_wings/AnyConv.com__IMG_7021.jpg') }}"
                 data-src="{{ asset('images/fixed_wings/AnyConv.com__IMG_7021.jpg') }}"
                 alt="Gyrocopter in flight" 
                 class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 lazy-image">
            <div class="absolute inset-0 flex flex-col justify-end p-6 z-20 transform translate-y-6 group-hover:translate-y-0 transition-transform duration-500">
              <div class="space-y-2">
                <h3 class="text-2xl font-bold text-white">Fixed Wings Adventure</h3>
                <p class="text-white/90 text-sm">Experience the unique gyrocopter flight</p>
                <div class="flex items-center space-x-2 text-white/80">
                  <span class="text-sm">View Details</span>
                  <svg class="w-4 h-4 transform transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                  </svg>
                </div>
              </div>
            </div>
          </div>
        </div>


        <div class="gallery-item gyrocopter opacity-0 translate-y-8 transition-all duration-700" data-category="gyrocopter">
          <div class="relative overflow-hidden rounded-2xl shadow-xl group cursor-pointer h-80 transform transition-all duration-500 hover:shadow-2xl hover:-translate-y-2">
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 z-10"></div>
            <img src="{{ asset('images/fixed_wings/AnyConv.com__IMG_7022.jpg') }}"
                 data-src="{{ asset('images/fixed_wings/AnyConv.com__IMG_7022.jpg') }}"
                 alt="Gyrocopter in flight" 
                 class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 lazy-image">
            <div class="absolute inset-0 flex flex-col justify-end p-6 z-20 transform translate-y-6 group-hover:translate-y-0 transition-transform duration-500">
              <div class="space-y-2">
                <h3 class="text-2xl font-bold text-white">Fixed Wings Adventure</h3>
                <p class="text-white/90 text-sm">Experience the unique gyrocopter flight</p>
                <div class="flex items-center space-x-2 text-white/80">
                  <span class="text-sm">View Details</span>
                  <svg class="w-4 h-4 transform transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                  </svg>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  
  <!-- Lightbox Modal -->
  <div id="lightbox" class="fixed inset-0 bg-black/90 z-50 hidden items-center justify-center p-4">
    <button id="close-lightbox" class="absolute top-4 right-4 text-white text-4xl hover:text-gray-300">&times;</button>
    <button id="prev-image" class="absolute left-4 text-white text-4xl hover:text-gray-300">&lt;</button>
    <button id="next-image" class="absolute right-4 text-white text-4xl hover:text-gray-300">&gt;</button>
    <img id="lightbox-image" src="" alt="Lightbox image" class="max-h-[80vh] max-w-[90vw] object-contain">
    <div id="lightbox-caption" class="absolute bottom-10 left-0 right-0 text-center text-white">
      <h3 id="lightbox-title" class="text-xl font-bold"></h3>
      <p id="lightbox-description" class="text-sm"></p>
    </div>
  </div>
  
  <!-- Video Section -->
  <div class="bg-gray-900 py-16">
    <div class="container mx-auto px-4">
      <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-white">Experience the Thrill</h2>
        <p class="text-lg text-gray-300 mt-4 max-w-3xl mx-auto">Get a taste of the exhilarating experience!!</p>
      </div>
      
      <div class="max-w-5xl mx-auto">
        <div class="relative rounded-2xl overflow-hidden shadow-2xl transform transition-all duration-500 hover:scale-[1.02] bg-black">
          <!-- Video Container -->
          <div class="relative aspect-w-16 aspect-h-9">
            <!-- Thumbnail Image -->
            <img 
              src="https://img.youtube.com/vi/VIDEO_ID/maxresdefault.jpg" 
              alt="Video thumbnail"
              class="absolute inset-0 w-full h-full object-cover"
            >
            
            <!-- Play Button Overlay -->
            <div class="absolute inset-0 flex items-center justify-center bg-black/30 hover:bg-black/40 transition-colors duration-300 cursor-pointer">
              <div class="w-20 h-20 rounded-full bg-white/90 flex items-center justify-center transform transition-transform duration-300 hover:scale-110">
                <svg class="w-10 h-10 text-gray-900" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"/>
                </svg>
              </div>
            </div>

            <!-- YouTube iframe (hidden by default) -->
            <iframe 
              id="youtube-player"
              src="https://www.youtube.com/embed/VIDEO_ID?autoplay=1&rel=0&modestbranding=1&playsinline=1" 
              title="Aerial Adventure Experience"
              frameborder="0" 
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
              allowfullscreen 
              class="absolute inset-0 w-full h-full opacity-0 pointer-events-none"
            ></iframe>
          </div>

          <!-- Video Info Overlay -->
          <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent opacity-0 hover:opacity-100 transition-opacity duration-300">
            <div class="absolute bottom-0 left-0 right-0 p-6">
              <h3 class="text-2xl font-bold text-white mb-2">Aerial Adventure Experience</h3>
              <p class="text-gray-200">Experience the thrill of flying through breathtaking landscapes</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Call to Action -->
  
  
  @include('common.footer')
  
  <!-- Gallery JavaScript -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Lazy loading functionality
      const lazyImages = document.querySelectorAll('.lazy-image');
      const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            const img = entry.target;
            img.src = img.dataset.src;
            img.classList.add('loaded');
            observer.unobserve(img);
          }
        });
      }, {
        rootMargin: '50px 0px',
        threshold: 0.1
      });

      lazyImages.forEach(img => imageObserver.observe(img));

      // Animate gallery items on scroll
      const galleryItems = document.querySelectorAll('.gallery-item');
      const itemObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.classList.add('opacity-100', 'translate-y-0');
            itemObserver.unobserve(entry.target);
          }
        });
      }, {
        threshold: 0.1,
        rootMargin: '50px 0px'
      });

      galleryItems.forEach(item => itemObserver.observe(item));

      // Filter functionality
      const filterBoxes = document.querySelectorAll('.filter-box');
      
      filterBoxes.forEach(box => {
        box.addEventListener('click', function() {
          // Remove active class from all boxes
          filterBoxes.forEach(b => {
            b.classList.remove('ring-4', 'ring-blue-500');
            b.querySelector('.border-2').classList.remove('border-blue-500');
          });
          
          // Add active class to clicked box
          this.classList.add('ring-4', 'ring-blue-500');
          this.querySelector('.border-2').classList.add('border-blue-500');
          
          const filter = this.getAttribute('data-filter');
          
          galleryItems.forEach(item => {
            if (item.getAttribute('data-category') === filter) {
              item.style.display = 'block';
              // Reset animation classes for filtered items
              item.classList.remove('opacity-100', 'translate-y-0');
              item.classList.add('opacity-0', 'translate-y-8');
              // Re-observe for animation
              itemObserver.observe(item);
            } else {
              item.style.display = 'none';
            }
          });
        });
      });

      // Show all images by default
      galleryItems.forEach(item => {
        item.style.display = 'block';
      });
      
      // Lightbox functionality
      const lightbox = document.getElementById('lightbox');
      const lightboxImage = document.getElementById('lightbox-image');
      const lightboxTitle = document.getElementById('lightbox-title');
      const lightboxDescription = document.getElementById('lightbox-description');
      const closeLightbox = document.getElementById('close-lightbox');
      const prevImage = document.getElementById('prev-image');
      const nextImage = document.getElementById('next-image');
      
      let currentIndex = 0;
      const galleryImages = document.querySelectorAll('.gallery-item .relative');
      
      galleryImages.forEach((item, index) => {
        item.addEventListener('click', function() {
          currentIndex = index;
          openLightbox(this);
        });
      });
      
      function openLightbox(item) {
        const img = item.querySelector('img');
        const title = item.querySelector('h3').textContent;
        const description = item.querySelector('p').textContent;
        
        lightboxImage.src = img.src;
        lightboxTitle.textContent = title;
        lightboxDescription.textContent = description;
        
        lightbox.classList.remove('hidden');
        lightbox.classList.add('flex');
        document.body.style.overflow = 'hidden';
      }
      
      closeLightbox.addEventListener('click', function() {
        lightbox.classList.add('hidden');
        lightbox.classList.remove('flex');
        document.body.style.overflow = 'auto';
      });
      
      prevImage.addEventListener('click', function() {
        currentIndex = (currentIndex - 1 + galleryImages.length) % galleryImages.length;
        openLightbox(galleryImages[currentIndex]);
      });
      
      nextImage.addEventListener('click', function() {
        currentIndex = (currentIndex + 1) % galleryImages.length;
        openLightbox(galleryImages[currentIndex]);
      });
      
      // Close lightbox with escape key
      document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && !lightbox.classList.contains('hidden')) {
          closeLightbox.click();
        }
      });

      const videoContainer = document.querySelector('.aspect-w-16');
      const playButton = videoContainer.querySelector('.flex');
      const iframe = document.getElementById('youtube-player');
      
      playButton.addEventListener('click', function() {
        // Show and enable the iframe
        iframe.classList.remove('opacity-0', 'pointer-events-none');
        // Hide the play button and thumbnail
        playButton.style.display = 'none';
      });
    });
  </script>
</body>
</html>
@endsection