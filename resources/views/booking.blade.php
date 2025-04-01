@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
@include("common.header")
<body class="bg-gradient-to-b from-sky-50 to-blue-100 min-h-screen pt-15">
  @include("common.nav")
  <div class="container mx-auto px-4 py-8">
    <div class="max-w-5xl mx-auto">
      <h1 class="text-3xl md:text-5xl font-bold text-center mb-2 text-blue-900">Experience the Thrill at WhistlerSkySports</h1>
      <p class="text-center text-gray-700 mb-8 text-lg">Join us for an unforgettable aerial adventure in the majestic skies of Whistler</p>
      
      <div id="booking-form" class="bg-white rounded-sm overflow-hidden transform transition-all duration-300 hover:shadow-blue-200 border border-blue-50">
        <!-- Booking Form Header -->
        <div class="bg-gradient-to-r from-sky-800 via-blue-700 to-indigo-800 p-8 relative overflow-hidden">
          <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full -mr-32 -mt-32 blur-2xl"></div>
          <div class="absolute bottom-0 left-0 w-40 h-40 bg-sky-400/20 rounded-full -ml-20 -mb-20 blur-xl"></div>
          <h2 class="text-3xl font-bold text-white relative z-10">Reservation Details</h2>
          <p class="text-sky-100 text-lg relative z-10">Please fill out the form below to book your power hang gliding session</p>
        </div>
        
        <!-- Booking Form -->
        <form action="{{ route('booking.preview') }}" method="POST" class="p-8" id="bookingForm">
          @csrf
          <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Personal Information -->
            <div class="space-y-6">
              <h3 class="text-xl font-semibold text-gray-800 border-b border-blue-100 pb-2 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                Contact Details
              </h3>
              
              <div class="space-y-2">
                <label for="name" class="block text-sm font-medium text-gray-700">Lead Adventurer's Full Name *</label>
                <input type="text" id="name" name="name" required class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200">
              </div>
              
              <div class="space-y-2">
                <label for="email" class="block text-sm font-medium text-gray-700">Contact Email *</label>
                <input type="email" id="email" name="email" required class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200">
              </div>
              
              <div class="space-y-2">
                <label for="callback_phone" class="block text-sm font-medium text-gray-700">Primary Contact Number *</label>
                <input type="tel" id="callback_phone" name="callback_phone" required class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200">
              </div>

              <div class="space-y-2">
                <label for="timezone" class="block text-sm font-medium text-gray-700">Your Current Time Zone *</label>
                <input type="text" id="timezone" name="timezone" required class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200">
              </div>

              <div class="space-y-2">
                <label for="oahu_phone" class="block text-sm font-medium text-gray-700">Local Contact Number (During Stay) *</label>
                <input type="tel" id="oahu_phone" name="oahu_phone" required class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200">
              </div>
            </div>
            
            <!-- Flight Details -->
            <div class="space-y-6">
              <h3 class="text-xl font-semibold text-gray-800 border-b border-blue-100 pb-2 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                Adventure Details
              </h3>

              <!-- <div class="space-y-2">
                <label for="package" class="block text-sm font-medium text-gray-700">Select Package *</label>
                <select id="package" name="package" required class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200">
                  <option value="">Choose a package</option>
                  <option value="intro" data-price="150">Introductory Flight - $150</option>
                  <option value="basic" data-price="299">Basic Training - $299</option>
                  <option value="advanced" data-price="599">Advanced Training - $599</option>
                  <option value="certification" data-price="1499">Certification Course - $1,499</option>
                </select>
              </div> -->

              <div class="space-y-2">
                <label for="flyer_details" class="block text-sm font-medium text-gray-700">Participant Details (Name & Weight) *</label>
                <textarea id="flyer_details" name="flyer_details" required rows="3" class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200" placeholder="Please list each participant's name and weight for safety requirements"></textarea>
              </div>

              <div class="space-y-2">
                <label for="underage_flyers" class="block text-sm font-medium text-gray-700">Junior Adventurers (Under 18) *</label>
                <textarea id="underage_flyers" name="underage_flyers" rows="2" class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200" placeholder="List names of any participants under 18 years old"></textarea>
              </div>

              <div class="space-y-2">
                <label for="preferred_dates" class="block text-sm font-medium text-gray-700">Preferred Flight Dates *</label>
                <input type="text" id="preferred_dates" name="preferred_dates" required class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200" placeholder="List your preferred adventure dates">
              </div>

              <div class="space-y-2">
                <label for="sunrise_flight" class="block text-sm font-medium text-gray-700">Early Bird Experience? *</label>
                <select id="sunrise_flight" name="sunrise_flight" required class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200">
                  <option value="">Select your preference</option>
                  <option value="yes">Yes - I'd love a sunrise flight</option>
                  <option value="no">No - I prefer later in the day</option>
                </select>
              </div>
            </div>
          </div>
          
          <!-- Memories Section -->
          <div class="mt-8 space-y-6">
            <h3 class="text-xl font-semibold text-gray-800 border-b border-blue-100 pb-2 flex items-center">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
              </svg>
              Add Memories
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <!-- Photo Package -->
              <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200 hover:shadow-md transition-shadow duration-300">
                <div class="flex justify-between items-start mb-4">
                  <div>
                    <h4 class="text-lg font-semibold text-gray-800">Photo Package</h4>
                    <p class="text-gray-600 text-sm">High-quality digital photos of your adventure</p>
                    <p class="text-blue-600 font-semibold mt-1">$99</p>
                  </div>
                  <div class="flex items-center space-x-3">
                    <button type="button" onclick="updateQuantity('photo_package', -1)" class="w-8 h-8 flex items-center justify-center rounded-full bg-gray-100 hover:bg-gray-200 transition-colors duration-200">
                      <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/>
                      </svg>
                    </button>
                    <input type="number" name="photo_package" id="photo_package" class="w-16 text-center border-gray-300 rounded-md" value="0" min="0" readonly>
                    <button type="button" onclick="updateQuantity('photo_package', 1)" class="w-8 h-8 flex items-center justify-center rounded-full bg-blue-100 hover:bg-blue-200 transition-colors duration-200">
                      <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                      </svg>
                    </button>
                  </div>
                </div>
              </div>

              <!-- Video Package -->
              <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200 hover:shadow-md transition-shadow duration-300">
                <div class="flex justify-between items-start mb-4">
                  <div>
                    <h4 class="text-lg font-semibold text-gray-800">Video Package</h4>
                    <p class="text-gray-600 text-sm">Professional video coverage of your flight</p>
                    <p class="text-blue-600 font-semibold mt-1">$149</p>
                  </div>
                  <div class="flex items-center space-x-3">
                    <button type="button" onclick="updateQuantity('video_package', -1)" class="w-8 h-8 flex items-center justify-center rounded-full bg-gray-100 hover:bg-gray-200 transition-colors duration-200">
                      <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/>
                      </svg>
                    </button>
                    <input type="number" name="video_package" id="video_package" class="w-16 text-center border-gray-300 rounded-md" value="0" min="0" readonly>
                    <button type="button" onclick="updateQuantity('video_package', 1)" class="w-8 h-8 flex items-center justify-center rounded-full bg-blue-100 hover:bg-blue-200 transition-colors duration-200">
                      <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                      </svg>
                    </button>
                  </div>
                </div>
              </div>

              <!-- Deluxe Package -->
              <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200 hover:shadow-md transition-shadow duration-300">
                <div class="flex justify-between items-start mb-4">
                  <div>
                    <h4 class="text-lg font-semibold text-gray-800">Deluxe Package</h4>
                    <p class="text-gray-600 text-sm">Photos + Video with premium editing</p>
                    <p class="text-blue-600 font-semibold mt-1">$229</p>
                  </div>
                  <div class="flex items-center space-x-3">
                    <button type="button" onclick="updateQuantity('deluxe_package', -1)" class="w-8 h-8 flex items-center justify-center rounded-full bg-gray-100 hover:bg-gray-200 transition-colors duration-200">
                      <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/>
                      </svg>
                    </button>
                    <input type="number" name="deluxe_package" id="deluxe_package" class="w-16 text-center border-gray-300 rounded-md" value="0" min="0" readonly>
                    <button type="button" onclick="updateQuantity('deluxe_package', 1)" class="w-8 h-8 flex items-center justify-center rounded-full bg-blue-100 hover:bg-blue-200 transition-colors duration-200">
                      <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                      </svg>
                    </button>
                  </div>
                </div>
              </div>

              <!-- Merchandise -->
              <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200 hover:shadow-md transition-shadow duration-300">
                <div class="flex justify-between items-start mb-4">
                  <div>
                    <h4 class="text-lg font-semibold text-gray-800">Merchandise Package</h4>
                    <p class="text-gray-600 text-sm">T-shirt, cap, and souvenir photos</p>
                    <p class="text-blue-600 font-semibold mt-1">$79</p>
                  </div>
                  <div class="flex items-center space-x-3">
                    <button type="button" onclick="updateQuantity('merch_package', -1)" class="w-8 h-8 flex items-center justify-center rounded-full bg-gray-100 hover:bg-gray-200 transition-colors duration-200">
                      <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/>
                      </svg>
                    </button>
                    <input type="number" name="merch_package" id="merch_package" class="w-16 text-center border-gray-300 rounded-md" value="0" min="0" readonly>
                    <button type="button" onclick="updateQuantity('merch_package', 1)" class="w-8 h-8 flex items-center justify-center rounded-full bg-blue-100 hover:bg-blue-200 transition-colors duration-200">
                      <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                      </svg>
                    </button>
                  </div>
                </div>
              </div>
            </div>

            <!-- Total Section -->
            <div class="bg-blue-50 p-6 rounded-lg border border-blue-100">
              <div class="flex justify-between items-center">
                <h4 class="text-lg font-semibold text-gray-800">Total Memories Package:</h4>
                <p class="text-xl font-bold text-blue-600" id="total_price">$0</p>
              </div>
              <p class="text-sm text-gray-600 mt-2">* All packages include digital delivery within 48 hours</p>
            </div>
          </div>
          
          <!-- Additional Information -->
          <div class="mt-8 space-y-6">
            <h3 class="text-xl font-semibold text-gray-800 border-b border-blue-100 pb-2 flex items-center">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              Additional Details
            </h3>

            <div class="space-y-2">
              <label for="accommodation" class="block text-sm font-medium text-gray-700">Whistler Accommodation Details *</label>
              <input type="text" id="accommodation" name="accommodation" required class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200" placeholder="Hotel name or address of your stay">
            </div>

            <div class="space-y-2">
              <label for="special_event" class="block text-sm font-medium text-gray-700">Special Occasion or Surprise? *</label>
              <textarea id="special_event" name="special_event" required rows="2" class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200" placeholder="Tell us if you're celebrating something special"></textarea>
            </div>
            
            <div class="space-y-2">
              <label for="additional_info" class="block text-sm font-medium text-gray-700">Additional Notes for Our Team *</label>
              <textarea id="additional_info" name="additional_info" required rows="3" class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200" placeholder="Any other details we should know to make your experience perfect"></textarea>
            </div>

            <div class="flex items-start p-4 bg-blue-50 rounded-lg border border-blue-100">
              <div class="flex items-center h-5">
                <input id="waiver" name="waiver" type="checkbox" required class="h-5 w-5 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
              </div>
              <div class="ml-3 text-sm">
                <label for="waiver" class="font-medium text-gray-700">
                    I accept the <a href="{{ route('waiver') }}" target="_blank" class="text-blue-600 hover:text-blue-800 underline">liability waiver</a> and understand the risks involved in power hang gliding.
                </label>
              </div>
            </div>

            <div class="flex items-start p-4 bg-blue-50 rounded-lg border border-blue-100">
              <div class="flex items-center h-5">
                <input id="terms" name="terms" type="checkbox" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" required>
              </div>
              <div class="ml-3 text-sm">
                <label for="terms" class="font-medium text-gray-900">
                    I have read and agree to the <a href="{{ route('terms') }}" target="_blank" class="text-blue-600 hover:text-blue-800">terms and conditions</a>
                </label>
              </div>
            </div>
          </div>
          
          <!-- Submit Button -->
          <div class="mt-8">
            <button type="submit" class="w-full bg-gradient-to-r from-emerald-500 to-teal-600 hover:from-emerald-600 hover:to-teal-700 text-white font-bold py-4 px-6 rounded-lg shadow-lg transition duration-300 transform hover:scale-[1.02] focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-opacity-50">
              <span class="flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                Submit Booking Request
              </span>
            </button>
          </div>
        </form>
      </div>
      
      <!-- Package Comparison -->
      <!-- <div class="mt-16">
        <h2 class="text-3xl font-bold text-center text-blue-900 mb-8">Choose Your Perfect Experience</h2>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
          <div class="bg-white rounded-xl shadow-lg overflow-hidden transform transition-all duration-300 hover:shadow-blue-200 hover:scale-105 border border-blue-50">
            <div class="bg-gradient-to-br from-blue-600 to-blue-800 p-6 text-center">
              <h3 class="text-xl font-bold text-white">Introductory Flight</h3>
              <p class="text-blue-100 text-sm">Perfect for first-timers</p>
              <p class="text-3xl font-bold text-white mt-2">$150</p>
            </div>
            <div class="p-6">
              <ul class="space-y-3">
                <li class="flex items-start">
                  <svg class="h-5 w-5 text-blue-500 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                  </svg>
                  30 minute flight
                </li>
                <li class="flex items-start">
                  <svg class="h-5 w-5 text-blue-500 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                  </svg>
                  Basic instruction
                </li>
                <li class="flex items-start">
                  <svg class="h-5 w-5 text-blue-500 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                  </svg>
                  Photo package
                </li>
              </ul>
              <button onclick="selectPackage('intro')" class="w-full mt-4 bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition duration-300">
                Select Package
              </button>
            </div>
          </div>
          
          <div class="bg-white rounded-xl shadow-lg overflow-hidden transform transition-all duration-300 hover:shadow-blue-200 hover:scale-105 border border-blue-50">
            <div class="bg-gradient-to-br from-indigo-600 to-indigo-800 p-6 text-center">
              <h3 class="text-xl font-bold text-white">Basic Training</h3>
              <p class="text-indigo-100 text-sm">Learn the fundamentals</p>
              <p class="text-3xl font-bold text-white mt-2">$299</p>
            </div>
            <div class="p-6">
              <ul class="space-y-3">
                <li class="flex items-start">
                  <svg class="h-5 w-5 text-indigo-500 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                  </svg>
                  2 hour session
                </li>
                <li class="flex items-start">
                  <svg class="h-5 w-5 text-indigo-500 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                  </svg>
                  Ground training
                </li>
                <li class="flex items-start">
                  <svg class="h-5 w-5 text-indigo-500 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                  </svg>
                  Hands-on flying
                </li>
              </ul>
              <button onclick="selectPackage('basic')" class="w-full mt-4 bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-4 rounded-lg transition duration-300">
                Select Package
              </button>
            </div>
          </div>
          
          <div class="bg-white rounded-xl shadow-lg overflow-hidden transform transition-all duration-300 hover:shadow-blue-200 hover:scale-105 border border-blue-50 ring-2 ring-amber-400">
            <div class="bg-gradient-to-br from-purple-600 to-purple-800 p-6 text-center relative">
              <div class="absolute top-0 right-0 bg-amber-400 text-purple-900 text-xs font-bold px-2 py-1 rounded-bl-lg">POPULAR</div>
              <h3 class="text-xl font-bold text-white">Advanced Training</h3>
              <p class="text-purple-100 text-sm">Full day experience</p>
              <p class="text-3xl font-bold text-white mt-2">$599</p>
            </div>
            <div class="p-6">
              <ul class="space-y-3">
                <li class="flex items-start">
                  <svg class="h-5 w-5 text-purple-500 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                  </svg>
                  Full day training
                </li>
                <li class="flex items-start">
                  <svg class="h-5 w-5 text-purple-500 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                  </svg>
                  Advanced techniques
                </li>
                <li class="flex items-start">
                  <svg class="h-5 w-5 text-purple-500 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                  </svg>
                  Lunch included
                </li>
              </ul>
              <button onclick="selectPackage('advanced')" class="w-full mt-4 bg-purple-600 hover:bg-purple-700 text-white font-medium py-2 px-4 rounded-lg transition duration-300">
                Select Package
              </button>
            </div>
          </div>
          
          <div class="bg-white rounded-xl shadow-lg overflow-hidden transform transition-all duration-300 hover:shadow-blue-200 hover:scale-105 border border-blue-50">
            <div class="bg-gradient-to-br from-teal-600 to-teal-800 p-6 text-center">
              <h3 class="text-xl font-bold text-white">Certification Course</h3>
              <p class="text-teal-100 text-sm">Become a certified pilot</p>
              <p class="text-3xl font-bold text-white mt-2">$1,499</p>
            </div>
            <div class="p-6">
              <ul class="space-y-3">
                <li class="flex items-start">
                  <svg class="h-5 w-5 text-teal-500 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                  </svg>
                  3-day program
                </li>
                <li class="flex items-start">
                  <svg class="h-5 w-5 text-teal-500 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                  </svg>
                  Official certification
                </li>
                <li class="flex items-start">
                  <svg class="h-5 w-5 text-teal-500 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                  </svg>
                  All meals included
                </li>
              </ul>
              <button onclick="selectPackage('certification')" class="w-full mt-4 bg-teal-600 hover:bg-teal-700 text-white font-medium py-2 px-4 rounded-lg transition duration-300">
                Select Package
              </button>
            </div>
          </div>
        </div>
      </div> -->
      
      <!-- <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-16">
        <div class="bg-white rounded-xl shadow-lg overflow-hidden transform transition-all duration-300 hover:shadow-blue-200 hover:-translate-y-1 border border-blue-50">
          <div class="bg-gradient-to-r from-blue-700 to-blue-900 p-6 flex items-center">
            <div class="bg-white/20 p-3 rounded-full mr-3">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
              </svg>
            </div>
            <h3 class="text-xl font-bold text-white">What to Bring</h3>
          </div>
          <div class="p-6">
            <ul class="space-y-3 text-gray-700">
              <li class="flex items-start">
                <svg class="h-5 w-5 text-blue-500 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                Comfortable clothing appropriate for weather
              </li>
              <li class="flex items-start">
                <svg class="h-5 w-5 text-blue-500 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                Sunglasses and sunscreen
              </li>
              <li class="flex items-start">
                <svg class="h-5 w-5 text-blue-500 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                Closed-toe shoes
              </li>
              <li class="flex items-start">
                <svg class="h-5 w-5 text-blue-500 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                Water bottle
              </li>
              <li class="flex items-start">
                <svg class="h-5 w-5 text-blue-500 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                Camera (optional)
              </li>
            </ul>
          </div>
        </div>
        
        <div class="bg-white rounded-xl shadow-lg overflow-hidden transform transition-all duration-300 hover:shadow-blue-200 hover:-translate-y-1 border border-blue-50">
          <div class="bg-gradient-to-r from-indigo-700 to-indigo-900 p-6 flex items-center">
            <div class="bg-white/20 p-3 rounded-full mr-3">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z" />
              </svg>
            </div>
            <h3 class="text-xl font-bold text-white">Weather Policy</h3>
          </div>
          <div class="p-6">
            <p class="text-gray-700 mb-4">Flights are weather dependent. If conditions are unsuitable, we will reschedule your booking at no additional cost.</p>
            <p class="text-gray-700">Our team will contact you 24 hours before your scheduled flight to confirm weather conditions.</p>
            <div class="mt-4 p-3 bg-blue-50 rounded-lg border border-blue-100 flex items-center">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              <p class="text-sm text-blue-800">Safety is our top priority</p>
            </div>
          </div>
        </div>
        
        <div class="bg-white rounded-xl shadow-lg overflow-hidden transform transition-all duration-300 hover:shadow-blue-200 hover:-translate-y-1 border border-blue-50">
          <div class="bg-gradient-to-r from-purple-700 to-purple-900 p-6 flex items-center">
            <div class="bg-white/20 p-3 rounded-full mr-3">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </div>
            <h3 class="text-xl font-bold text-white">Cancellation Policy</h3>
          </div>
          <div class="p-6">
            <ul class="space-y-2 text-gray-700">
              <li class="flex items-start">
                <svg class="h-5 w-5 text-blue-500 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                Free rescheduling up to 48 hours before
              </li>
              <li class="flex items-start">
                <svg class="h-5 w-5 text-blue-500 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                50% fee for cancellations within 48 hours
              </li>
              <li class="flex items-start">
                <svg class="h-5 w-5 text-blue-500 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                Gift certificates available for rescheduling
              </li>
            </ul>
          </div>
        </div>
      </div> -->
      
      <!-- FAQ Section -->
      <!-- <div class="mt-12 bg-white rounded-lg shadow-lg overflow-hidden">
        <div class="bg-gradient-to-r from-sky-800 via-blue-700 to-indigo-800 p-6">
          <h2 class="text-2xl font-semibold text-white">Frequently Asked Questions</h2>
        </div>
        <div class="p-6 space-y-4">
          <div class="border-b pb-4">
            <h3 class="text-lg font-medium text-gray-900">Do I need prior experience to fly a power hang glider?</h3>
            <p class="mt-2 text-gray-600">No prior experience is necessary for our introductory flights. Our certified instructors will guide you through every step of the process.</p>
          </div>
          <div class="border-b pb-4">
            <h3 class="text-lg font-medium text-gray-900">Is there a weight limit for flying?</h3>
            <p class="mt-2 text-gray-600">Yes, for safety reasons we have a weight limit of 250 pounds (113 kg) per person. This ensures optimal performance of the aircraft.</p>
          </div>
          <div class="border-b pb-4">
            <h3 class="text-lg font-medium text-gray-900">How long does a typical session last?</h3>
            <p class="mt-2 text-gray-600">Our introductory flights last approximately 30 minutes in the air, with an additional 30 minutes for ground instruction. Full training sessions vary from 2 hours to multiple days.</p>
          </div>
          <div>
            <h3 class="text-lg font-medium text-gray-900">Can I bring a friend or family member to watch?</h3>
            <p class="mt-2 text-gray-600">Absolutely! Spectators are welcome at our facility. We have a designated viewing area where they can watch and take photos of your adventure.</p>
          </div>
        </div>
      </div> -->
    </div>
  </div>
  @include("common.footer")
  
  <script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.querySelector('form');
        const packageSelect = document.getElementById('package');
        
        // Form validation
        form.addEventListener('submit', function(event) {
            const name = document.getElementById('name').value;
            const package = document.getElementById('package').value;
            const terms = document.getElementById('terms').checked;
            const waiver = document.getElementById('waiver').checked;
            
            if (!name || !package || !terms || !waiver) {
                event.preventDefault();
                alert('Please fill in all required fields and accept both the terms and conditions and waiver.');
            }
        });
    });

    // Package prices
    const prices = {
      photo_package: 99,
      video_package: 149,
      deluxe_package: 229,
      merch_package: 79
    };

    // Function to update quantity
    function updateQuantity(packageId, change) {
      const input = document.getElementById(packageId);
      const currentValue = parseInt(input.value);
      const newValue = Math.max(0, currentValue + change);
      input.value = newValue;
      updateTotalPrice();
    }

    // Function to update total price
    function updateTotalPrice() {
      let total = 0;
      for (const [packageId, price] of Object.entries(prices)) {
        const quantity = parseInt(document.getElementById(packageId).value);
        total += quantity * price;
      }
      document.getElementById('total_price').textContent = `$${total}`;
    }

    // Initialize total price
    document.addEventListener('DOMContentLoaded', function() {
      updateTotalPrice();
    });
  </script>
</body>
</html>
@endsection