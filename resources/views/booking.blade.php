@extends('layouts.app')

@section('meta_tags')
<meta name="description" content="Book your power hang gliding adventure with Whistler Sky Sports. Fill out our easy booking form to reserve your flight experience over the stunning Canadian Rockies.">
<meta name="keywords" content="power hang gliding, flight booking, Whistler Sky Sports, aviation adventure, Canadian Rockies, ultralight aircraft, flight experience, Whistler activities">
<link rel="canonical" href="{{ url()->current() }}">
<!-- Open Graph Tags -->
<meta property="og:title" content="Book Your Sky Adventure | Whistler Sky Sports">
<meta property="og:description" content="Reserve your unforgettable power hang gliding experience over the majestic landscapes of Whistler, British Columbia.">
<meta property="og:type" content="website">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:image" content="{{ asset('images/hero-section.png') }}">
<!-- Twitter Card Tags -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="Book Your Power Hang Gliding Adventure | Whistler Sky Sports">
<meta name="twitter:description" content="Soar above pristine lakes, majestic mountains, and lush forests with Whistler Sky Sports power hang gliding adventures.">
@endsection

@section('title', 'Book Your Sky Adventure | Whistler Sky Sports')

@push('styles')
    <!-- Add required CSS libraries -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css">
    
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

        .phone-input {
            height: 3rem;
            border-color: #D1D5DB;
            transition: all 0.2s;
            width: 100%;
            text-indent: 0;
        }

        .phone-input:focus {
            border-color: #204fb4;
            box-shadow: 0 0 0 3px rgba(32, 79, 180, 0.25);
            outline: none;
        }

        .phone-input.error {
            border-color: #EF4444;
        }

        /* Signature Pad Styles */
        .signature-pad {
            border: 2px solid #D1D5DB;
            border-radius: 0.5rem;
            background-color: white;
            margin: 1rem 0;
            position: relative;
            width: 100%;
            height: 250px;
            touch-action: none;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .signature-pad canvas {
            width: 100% !important;
            height: 100% !important;
            border-radius: 0.5rem;
            touch-action: none;
            cursor: crosshair;
            background-color: white;
        }

        .signature-actions {
            display: flex;
            justify-content: flex-end;
            margin-top: 1rem;
            padding: 0;
        }

        .signature-actions button {
            padding: 0.75rem 1.5rem;
            border-radius: 0.375rem;
            font-size: 0.875rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .clear-signature {
            background-color: #F3F4F6;
            color: #374151;
            border: 1px solid #D1D5DB;
        }

        .clear-signature:hover {
            background-color: #E5E7EB;
            transform: translateY(-1px);
        }

        .signature-error {
            color: #EF4444;
            font-size: 0.875rem;
            margin-top: 0.5rem;
            display: none;
            text-align: center;
        }

        .signature-guide {
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 1px;
            background-color: #E5E7EB;
            pointer-events: none;
        }

        .signature-container {
            width: 100%;
            margin: 0;
            padding: 0;
        }

        #waiverModal .bg-white {
            padding: 0;
        }

        #waiverModal .p-6 {
            padding: 1.5rem;
        }
    </style>
@endpush

@section('content')
<div class="min-h-screen bg-gradient-to-b from-sky-50 to-white pt-16 pb-12 mt-10">
    <div class="container mx-auto px-4">
        <!-- Hero Section -->
        <div class="max-w-4xl mx-auto text-center mb-12">
            <h1 class="text-4xl md:text-5xl font-bold text-[#204fb4] mb-4">Book Your Sky Adventure</h1>
            <p class="text-xl text-gray-600">Experience the freedom of flight in the majestic skies of Whistler</p>
        </div>

        <!-- Booking Instructions -->
        <div class="max-w-5xl mx-auto mb-12 px-4">
                <p class="text-gray-700 mb-3 text-center">
                    To request a reservation, please fill out this request form and we will contact you to confirm your reservation.
                </p>
                <p class="text-gray-600 text-center">
                    If you have any issues completing the request form, please call Whistler Sky Sports at 
                </p>
                <p class="text-center"><a href="tel:+12162881303" class="text-[#204fb4] hover:text-blue-700 font-medium">+1 216-288-1303</a>.
            </p>
        </div>
        <!-- Main Booking Form -->
        <div class="max-w-5xl mx-auto" itemscope itemtype="https://schema.org/ReservationPackage">
            <div class="bg-white rounded-2xl shadow-sm overflow-hidden">
                <!-- Form Header -->
                <div class="bg-[#204fb4] p-8 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-96 h-96 bg-blue-400/10 rounded-full -mr-48 -mt-48 blur-3xl"></div>
                    <div class="absolute bottom-0 left-0 w-96 h-96 bg-[#fcdb3f]/10 rounded-full -ml-48 -mb-48 blur-3xl"></div>
                    <div class="relative z-10">
                        <h2 class="text-3xl font-bold text-white mb-2">Ready for Takeoff?</h2>
                        <p class="text-blue-100 text-lg">Fill in your details below and prepare for an unforgettable experience</p>
                    </div>
                </div>

                <!-- Booking Form -->
                <form action="{{ route('booking.preview') }}" method="POST" class="p-8" id="bookingForm" itemscope itemtype="https://schema.org/ReservationForm" aria-label="Flight booking request form">
                    @csrf
                    
                    @if ($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert" aria-live="assertive">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            @if($errors->has('debug_info'))
                                <div class="mt-2 p-2 bg-red-200 rounded text-xs font-mono overflow-x-auto">
                                    <p class="font-bold">Debug Information:</p>
                                    <p>{{ $errors->first('debug_info') }}</p>
                                </div>
                            @endif
                        </div>
                    @endif

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                        <!-- Personal Information -->
                        <section class="space-y-6" aria-labelledby="personal-details-heading">
                            <div class="flex items-center space-x-3 mb-6">
                                <h3 id="personal-details-heading" class="text-xl font-bold text-gray-800">Personal Details</h3>
                            </div>

                            <div class="space-y-4">
                                <div class="relative">
                                    <label for="name" class="text-sm font-medium text-gray-700 mb-1 block">Full Name *</label>
                                    <input type="text" name="name" id="name" value="" placeholder=" John Smith" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#204fb4] focus:ring focus:ring-[#204fb4]/20 transition-all duration-200" itemprop="requiredFeature">
                                </div>

                                <div class="relative">
                                    <label for="email" class="text-sm font-medium text-gray-700 mb-1 block">Email Address *</label>
                                    <input type="email" name="email" id="email" value="" placeholder="john.smith@example.com" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#204fb4] focus:ring focus:ring-[#204fb4]/20 transition-all duration-200" itemprop="email">
                                </div>

                                <div class="relative">
                                    <label for="primary_phone" class="text-sm font-medium text-gray-700 mb-1 block">Primary Phone *</label>
                                    <input type="tel" name="primary_phone" id="primary_phone" value="" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#204fb4] focus:ring focus:ring-[#204fb4]/20 transition-all duration-200" itemprop="telephone">
                                </div>

                                <div class="relative">
                                    <label for="date_of_birth" class="text-sm font-medium text-gray-700 mb-1 block">Date of Birth *</label>
                                    <input type="date" name="date_of_birth" id="date_of_birth" value="" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#204fb4] focus:ring focus:ring-[#204fb4]/20 transition-all duration-200">
                                </div>

                                <div class="relative">
                                    <label for="weight" class="text-sm font-medium text-gray-700 mb-1 block">Weight (lbs) *</label>
                                    <input type="number" name="weight" id="weight" value="" required min="0" max="245" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#204fb4] focus:ring focus:ring-[#204fb4]/20 transition-all duration-200" placeholder="Enter your weight in pounds">
                                    <p class="text-xs text-gray-500 mt-1">Maximum weight limit: 245 lbs</p>
                                </div>

                                <div class="relative">
                                    <label for="timezone" class="text-sm font-medium text-gray-700 mb-1 block">Time Zone *</label>
                                    <select name="timezone" id="timezone" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#204fb4] focus:ring focus:ring-[#204fb4]/20 transition-all duration-200">
                                        <option value="">Select your time zone</option>
                                        <optgroup label="North America">
                                            <option value="America/New_York" selected>Eastern Time (ET) - New York, Toronto</option>
                                            <option value="America/Chicago">Central Time (CT) - Chicago, Winnipeg</option>
                                            <option value="America/Denver">Mountain Time (MT) - Denver, Calgary</option>
                                            <option value="America/Los_Angeles">Pacific Time (PT) - Los Angeles, Vancouver</option>
                                            <option value="America/Anchorage">Alaska Time (AKT) - Anchorage</option>
                                            <option value="Pacific/Honolulu">Hawaii Time (HT) - Honolulu</option>
                                        </optgroup>
                                        <optgroup label="Europe">
                                            <option value="Europe/London">Greenwich Mean Time (GMT) - London, Dublin</option>
                                            <option value="Europe/Paris">Central European Time (CET) - Paris, Berlin</option>
                                            <option value="Europe/Helsinki">Eastern European Time (EET) - Helsinki, Athens</option>
                                        </optgroup>
                                        <optgroup label="Asia">
                                            <option value="Asia/Dubai">Gulf Standard Time (GST) - Dubai, Abu Dhabi</option>
                                            <option value="Asia/Singapore">Singapore Time (SGT) - Singapore, Kuala Lumpur</option>
                                            <option value="Asia/Tokyo">Japan Time (JST) - Tokyo, Seoul</option>
                                            <option value="Asia/Shanghai">China Time (CST) - Beijing, Shanghai</option>
                                        </optgroup>
                                        <optgroup label="Australia & Pacific">
                                            <option value="Australia/Sydney">Australian Eastern Time (AET) - Sydney, Melbourne</option>
                                            <option value="Australia/Perth">Australian Western Time (AWT) - Perth</option>
                                            <option value="Pacific/Auckland">New Zealand Time (NZST) - Auckland</option>
                                        </optgroup>
                                    </select>
                                </div>

                                <div class="relative">
                                    <label for="local_phone" class="text-sm font-medium text-gray-700 mb-1 block">Local Contact (During Stay) *</label>
                                    <input type="tel" name="local_phone" id="local_phone" value="" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#204fb4] focus:ring focus:ring-[#204fb4]/20 transition-all duration-200">
                                </div>
                            </div>
                        </section>

                        <!-- Flight Details -->
                        <section class="space-y-6" aria-labelledby="flight-details-heading" itemprop="reservationFor" itemscope itemtype="https://schema.org/Flight">
                            <div class="flex items-center space-x-3 mb-6">
                                <h3 id="flight-details-heading" class="text-xl font-bold text-gray-800">Flight Details</h3>
                            </div>

                            <div class="space-y-4">
                                <div class="relative">
                                    <label for="package" class="text-sm font-medium text-gray-700 mb-1 block">Select Package *</label>
                                    <select name="package" id="package" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#204fb4] focus:ring focus:ring-[#204fb4]/20 transition-all duration-200" itemprop="identifier">
                                        <option value="">Choose your adventure</option>
                                        <option value="intro">Open Cockpit Weight Shift Trike - CAD $140 (15 min)</option>
                                        <option value="basic">Fixed Wing Advanced Ultralight - CAD $120 (15 min)</option>
                                    </select>
                                </div>

                                <div class="relative">
                                    <label for="flyer_details" class="text-sm font-medium text-gray-700 mb-1 block">Participant Details *</label>
                                    <textarea name="flyer_details" id="flyer_details" required rows="3" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#204fb4] focus:ring focus:ring-[#204fb4]/20 transition-all duration-200" placeholder="List each participant's name and weight"></textarea>
                                </div>

                                <div class="relative">
                                    <label for="underage_flyers" class="text-sm font-medium text-gray-700 mb-1 block">Under 18 Participants</label>
                                    <textarea name="underage_flyers" id="underage_flyers" rows="2" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#204fb4] focus:ring focus:ring-[#204fb4]/20 transition-all duration-200" placeholder="List names of participants under 18"></textarea>
                                </div>

                                <div class="relative">
                                    <label for="preferred_dates" class="text-sm font-medium text-gray-700 mb-1 block">Preferred Dates *</label>
                                    <input type="date" 
                                           name="preferred_dates" 
                                           id="preferred_dates" 
                                           required 
                                           class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#204fb4] focus:ring focus:ring-[#204fb4]/20 transition-all duration-200"
                                           itemprop="startTime">
                                </div>

                                <div class="relative">
                                    <label for="sunrise_flight" class="text-sm font-medium text-gray-700 mb-1 block">Sunrise Flight Option *</label>
                                    <select name="sunrise_flight" id="sunrise_flight" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#204fb4] focus:ring focus:ring-[#204fb4]/20 transition-all duration-200">
                                        <option value="">Select preference</option>
                                        <option value="yes">Yes - Sunrise Flight (CAD $99)</option>
                                        <option value="no">No - Regular Time</option>
                                    </select>
                                </div>
                            </div>
                        </section>
                    </div>

                    <!-- Memory Packages Section -->
                    <section class="mt-12" aria-labelledby="memory-packages-heading">
                        <div class="bg-gradient-to-r from-[#204fb4] to-blue-600 rounded-xl p-6 mb-8 relative overflow-hidden">
                            <div class="absolute inset-0 bg-[#fcdb3f]/5"></div>
                            <div class="relative z-10">
                                <h3 id="memory-packages-heading" class="text-2xl font-bold text-white flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    Capture Your Adventure
                                </h3>
                                <p class="text-blue-100 mt-2">Choose how you want to remember this incredible experience</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6" itemprop="offers" itemscope itemtype="https://schema.org/Offer">
                            <!-- Video Package -->
                            <div class="bg-white rounded-xl border border-gray-100 p-6 hover:border-[#204fb4]/20 transition-all duration-300">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <div class="flex items-center mb-3">
                                            <div class="bg-[#204fb4]/10 p-2 rounded-lg mr-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#204fb4]" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                                </svg>
                                            </div>
                                            <h4 class="text-xl font-bold text-gray-800">Video Package</h4>
                                        </div>
                                        <p class="text-gray-600 ml-11 mb-2">Professional flight video with audio</p>
                                        <p class="text-[#204fb4] font-bold text-xl ml-11" itemprop="price">CAD $99</p>
                                        <meta itemprop="priceCurrency" content="CAD">
                                    </div>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" name="video_package" id="video_package" class="sr-only peer" onchange="updateTotalPrice()">
                                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-[#204fb4]/20 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-[#204fb4]"></div>
                                    </label>
                                </div>
                            </div>

                            <!-- Deluxe Package -->
                            <div class="bg-white rounded-xl border border-gray-100 p-6 hover:border-[#204fb4]/20 transition-all duration-300">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <div class="flex items-center mb-3">
                                            <div class="bg-[#204fb4]/10 p-2 rounded-lg mr-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#204fb4]" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                                                </svg>
                                            </div>
                                            <h4 class="text-xl font-bold text-gray-800">Deluxe Package</h4>
                                        </div>
                                        <p class="text-gray-600 ml-11 mb-2">Video + WhistlerSkySports Gear</p>
                                        <p class="text-[#204fb4] font-bold text-xl ml-11" itemprop="price">CAD $159</p>
                                        <meta itemprop="priceCurrency" content="CAD">
                                    </div>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" name="deluxe_package" id="deluxe_package" class="sr-only peer" onchange="updateTotalPrice()">
                                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-[#204fb4]/20 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-[#204fb4]"></div>
                                    </label>
                                </div>
                            </div>

                            <!-- Merchandise Package -->
                            <div class="bg-white rounded-xl border border-gray-100 p-6 hover:border-[#204fb4]/20 transition-all duration-300">
                                <div class="flex flex-col">
                                    <div class="flex items-center mb-3">
                                        <div class="bg-[#204fb4]/10 p-2 rounded-lg mr-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#204fb4]" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                            </svg>
                                        </div>
                                        <h4 class="text-xl font-bold text-gray-800">Merchandise</h4>
                                    </div>
                                    <p class="text-gray-600 ml-11 mb-2">WhistlerSkySports Gear Pack</p>
                                    <div class="flex justify-between items-center mt-2">
                                        <p class="text-[#204fb4] font-bold text-xl ml-11" itemprop="price">CAD $99</p>
                                        <meta itemprop="priceCurrency" content="CAD">
                                        <div class="flex items-center gap-1">
                                            <button type="button" onclick="updateQuantity('merch_package', -1)" class="w-6 h-6 flex items-center justify-center rounded-md bg-gray-100 hover:bg-gray-200 text-gray-600" aria-label="Decrease merchandise quantity">
                                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/>
                                                </svg>
                                            </button>
                                            <input type="number" id="merch_package" name="merch_package" class="w-8 text-center text-sm border-gray-200 rounded-md" value="0" min="0" readonly onchange="updateTotalPrice()" aria-label="Merchandise quantity">
                                            <button type="button" onclick="updateQuantity('merch_package', 1)" class="w-6 h-6 flex items-center justify-center rounded-md bg-[#204fb4]/10 hover:bg-[#204fb4]/20 text-[#204fb4]" aria-label="Increase merchandise quantity">
                                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Total Section -->
                        <div class="mt-8 bg-gradient-to-r from-[#204fb4]/5 to-blue-50 p-6 rounded-xl border border-[#204fb4]/10" itemprop="totalPrice">
                            <div class="flex justify-between items-center">
                                <div class="flex items-center">
                                    <div class="bg-[#204fb4]/10 p-2 rounded-lg mr-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#204fb4]" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="text-lg font-bold text-gray-800">Total Package</h4>
                                        <p class="text-sm text-gray-600">Digital delivery within 48 hours</p>
                                    </div>
                                </div>
                                <p class="text-2xl font-bold text-[#204fb4]" id="total_price">CAD $0</p>
                            </div>
                        </div>
                    </section>

                    <!-- Additional Information -->
                    <section class="mt-12 space-y-6" aria-labelledby="additional-details-heading">
                        <div class="flex items-center space-x-3 mb-6">
                            <h3 id="additional-details-heading" class="text-xl font-bold text-gray-800">Additional Details</h3>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="relative">
                                <label for="accommodation" class="text-sm font-medium text-gray-700 mb-1 block">Accommodation Details</label>
                                <input type="text" name="accommodation" id="accommodation" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#204fb4] focus:ring focus:ring-[#204fb4]/20 transition-all duration-200" placeholder="Hotel name or address">
                            </div>

                            <div class="relative">
                                <label for="special_event" class="text-sm font-medium text-gray-700 mb-1 block">Special Occasion?</label>
                                <input type="text" name="special_event" id="special_event" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#204fb4] focus:ring focus:ring-[#204fb4]/20 transition-all duration-200" placeholder="Tell us if you're celebrating">
                            </div>
                        </div>

                        <div class="relative">
                            <label for="additional_info" class="text-sm font-medium text-gray-700 mb-1 block">Additional Notes</label>
                            <textarea name="additional_info" id="additional_info" rows="3" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#204fb4] focus:ring focus:ring-[#204fb4]/20 transition-all duration-200" placeholder="Any other details we should know"></textarea>
                        </div>

                        <!-- Terms and Waiver -->
                        <div class="space-y-4">
                            <div class="flex items-start p-4 bg-[#204fb4]/5 rounded-xl">
                                <input type="checkbox" id="waiver_checkbox" name="waiver" class="mt-1 h-4 w-4 text-[#204fb4] focus:ring-[#204fb4]/20 border-gray-300 rounded" disabled>
                                <label for="waiver_checkbox" class="ml-3 text-sm text-gray-700">
                                    I accept the <span id="waiver_link_container" class="hidden"><a href="#" id="waiver_link" class="text-[#204fb4] hover:text-blue-700 underline" onclick="openWaiverModal(event)">liability waiver</a></span><span id="waiver_link_placeholder" class="text-gray-400 italic">(Complete all required fields to view waiver)</span> and understand the risks involved.
                                </label>
                            </div>

                            <div class="flex items-start p-4 bg-[#204fb4]/5 rounded-xl">
                                <input type="checkbox" name="terms" id="terms" required class="mt-1 h-4 w-4 text-[#204fb4] focus:ring-[#204fb4]/20 border-gray-300 rounded" checked>
                                <label for="terms" class="ml-3 text-sm text-gray-700">
                                    I agree to the <a href="{{ route('terms') }}" target="_blank" class="text-[#204fb4] hover:text-blue-700 underline">terms and conditions</a>.
                                </label>
                            </div>
                        </div>
                    </section>

                    <!-- Submit Button -->
                    <div class="mt-12">
                        <button type="submit" class="w-full bg-gradient-to-r from-[#204fb4] to-blue-600 text-[#fcdb3f] font-bold py-4 px-8 rounded-xl shadow-lg hover:shadow-xl transition duration-300 transform hover:scale-[1.02] focus:outline-none focus:ring-2 focus:ring-[#204fb4] focus:ring-offset-2 flex items-center justify-center space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Submit Booking Request</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Waiver Modal -->
<div id="waiverModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center hidden" role="dialog" aria-labelledby="waiver-title" aria-modal="true">
    <div class="bg-white rounded-xl shadow-2xl max-w-4xl w-full max-h-[90vh] overflow-hidden flex flex-col">
        <div class="bg-[#204fb4] p-4 flex justify-between items-center">
            <h3 id="waiver-title" class="text-xl font-bold text-white">Liability Waiver</h3>
            <button id="closeWaiverModal" class="text-white hover:text-gray-200" aria-label="Close waiver dialog">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <div class="p-6 overflow-y-auto flex-grow">
            <div class="prose max-w-none">
                <h4 class="text-lg font-bold mb-4 text-center">WHISTLER SKY SPORTS<br>
                AVIATION RELEASE OF LIABILITY, WAIVER OF LEGAL RIGHTS,<br>
                ASSUMPTION OF RISK AND DECLARATION OF FITNESS</h4>
                
                <p class="mb-4">In consideration for the renting, purchasing or leasing of ultralight and advanced ultralight aircraft (hereinafter collectively called "Aircraft") from WHISTLER SKY SPORTS and/or utilizing the facilities, ground school, instruction, premises, and equipment of WHISTLER SKY SPORTS in engaging in Aircraft ground instruction, flight instruction and related activities, I hereby understand and agree to this Release of Liability, Waiver of Legal Rights, Assumption of Risk and Declaration of Fitness and to the terms hereof as follows:</p>
                
                <ol class="list-decimal pl-5 space-y-4 mb-4">
                    <li class="flex flex-col">
                        <div class="flex items-start">
                            <span class="font-semibold mr-2">1.</span>
                            <span>I understand that this is a long and important legal document that affects my rights and I must read and understand it before participating in any aviation activity.</span>
                        </div>
                        <div class="mt-1 ml-6">
                            <span class="text-sm text-gray-600">Initial here</span>
                            <span class="border-b border-gray-400 inline-block w-32 ml-2 waiver-initial"></span>
                        </div>
                    </li>
                    
                    <li class="flex flex-col">
                        <div class="flex items-start">
                            <span class="font-semibold mr-2">2.</span>
                            <span>I acknowledge that aviation involves risk, including serious injury or death.</span>
                        </div>
                        <div class="mt-1 ml-6">
                            <span class="text-sm text-gray-600">Initial here</span>
                            <span class="border-b border-gray-400 inline-block w-32 ml-2 waiver-initial"></span>
                        </div>
                    </li>
                    
                    <li class="flex flex-col">
                        <div class="flex items-start">
                            <span class="font-semibold mr-2">3.</span>
                            <span>I acknowledge that there are no warranties on the Aircraft; I accept it as-is and will inspect it before use.</span>
                        </div>
                        <div class="mt-1 ml-6">
                            <span class="text-sm text-gray-600">Initial here</span>
                            <span class="border-b border-gray-400 inline-block w-32 ml-2 waiver-initial"></span>
                        </div>
                    </li>
                    
                    <li class="flex flex-col">
                        <div class="flex items-start">
                            <span class="font-semibold mr-2">4.</span>
                            <span>I will raise any concerns about the Aircraft with Whistler Sky Sports before flying.</span>
                        </div>
                        <div class="mt-1 ml-6">
                            <span class="text-sm text-gray-600">Initial here</span>
                            <span class="border-b border-gray-400 inline-block w-32 ml-2 waiver-initial"></span>
                        </div>
                    </li>
                    
                    <li class="flex flex-col">
                        <div class="flex items-start">
                            <span class="font-semibold mr-2">5.</span>
                            <span>I hereby RELEASE AND DISCHARGE WHISTLER SKY SPORTS and associated parties from any liability for injuries or damages arising from aviation activities, including those caused by negligence.</span>
                        </div>
                        <div class="mt-1 ml-6">
                            <span class="text-sm text-gray-600">Initial here</span>
                            <span class="border-b border-gray-400 inline-block w-32 ml-2 waiver-initial"></span>
                        </div>
                    </li>
                    
                    <li class="flex flex-col">
                        <div class="flex items-start">
                            <span class="font-semibold mr-2">6.</span>
                            <span>I understand that Whistler Sky Sports may use independent flight instructors, who are responsible for their aircraft maintenance and licensing.</span>
                        </div>
                        <div class="mt-1 ml-6">
                            <span class="text-sm text-gray-600">Initial here</span>
                            <span class="border-b border-gray-400 inline-block w-32 ml-2 waiver-initial"></span>
                        </div>
                    </li>
                    
                    <li class="flex flex-col">
                        <div class="flex items-start">
                            <span class="font-semibold mr-2">7.</span>
                            <span>I acknowledge the inherent dangers of aviation and EXPRESSLY AND VOLUNTARILY ASSUME ALL RISK.</span>
                        </div>
                        <div class="mt-1 ml-6">
                            <span class="text-sm text-gray-600">Initial here</span>
                            <span class="border-b border-gray-400 inline-block w-32 ml-2 waiver-initial"></span>
                        </div>
                    </li>
                    
                    <li class="flex flex-col">
                        <div class="flex items-start">
                            <span class="font-semibold mr-2">8.</span>
                            <span>I WILL NOT SUE OR MAKE A CLAIM against the Released Parties for any losses or damages.</span>
                        </div>
                        <div class="mt-1 ml-6">
                            <span class="text-sm text-gray-600">Initial here</span>
                            <span class="border-b border-gray-400 inline-block w-32 ml-2 waiver-initial"></span>
                        </div>
                    </li>
                    
                    <li class="flex flex-col">
                        <div class="flex items-start">
                            <span class="font-semibold mr-2">9.</span>
                            <span>I agree to INDEMNIFY AND HOLD HARMLESS the Released Parties from any claims or legal actions.</span>
                        </div>
                        <div class="mt-1 ml-6">
                            <span class="text-sm text-gray-600">Initial here</span>
                            <span class="border-b border-gray-400 inline-block w-32 ml-2 waiver-initial"></span>
                        </div>
                    </li>
                    
                    <li class="flex flex-col">
                        <div class="flex items-start">
                            <span class="font-semibold mr-2">10.</span>
                            <span>I take full responsibility for injuries or damage I may cause or suffer during aviation activities.</span>
                        </div>
                        <div class="mt-1 ml-6">
                            <span class="text-sm text-gray-600">Initial here</span>
                            <span class="border-b border-gray-400 inline-block w-32 ml-2 waiver-initial"></span>
                        </div>
                    </li>
                    
                    <li class="flex flex-col">
                        <div class="flex items-start">
                            <span class="font-semibold mr-2">11.</span>
                            <span>I agree to operate any Aircraft safely and responsibly.</span>
                        </div>
                        <div class="mt-1 ml-6">
                            <span class="text-sm text-gray-600">Initial here</span>
                            <span class="border-b border-gray-400 inline-block w-32 ml-2 waiver-initial"></span>
                        </div>
                    </li>
                    
                    <li class="flex flex-col">
                        <div class="flex items-start">
                            <span class="font-semibold mr-2">12.</span>
                            <span>I hereby state that my fully clothed weight is 245 lbs or less.</span>
                        </div>
                        <div class="mt-1 ml-6">
                            <span class="text-sm text-gray-600">Initial here</span>
                            <span class="border-b border-gray-400 inline-block w-32 ml-2 waiver-initial"></span>
                        </div>
                    </li>
                    
                    <li class="flex flex-col">
                        <div class="flex items-start">
                            <span class="font-semibold mr-2">13.</span>
                            <span>I have not been SCUBA diving in the past 24 hours or have waited the appropriate time to fly safely.</span>
                        </div>
                        <div class="mt-1 ml-6">
                            <span class="text-sm text-gray-600">Initial here</span>
                            <span class="border-b border-gray-400 inline-block w-32 ml-2 waiver-initial"></span>
                        </div>
                    </li>
                    
                    <li class="flex flex-col">
                        <div class="flex items-start">
                            <span class="font-semibold mr-2">14.</span>
                            <span>I understand this is a FLIGHT LESSON, not a scenic ride, and I must actively participate.</span>
                        </div>
                        <div class="mt-1 ml-6">
                            <span class="text-sm text-gray-600">Initial here</span>
                            <span class="border-b border-gray-400 inline-block w-32 ml-2 waiver-initial"></span>
                        </div>
                    </li>
                    
                    <li class="flex flex-col">
                        <div class="flex items-start">
                            <span class="font-semibold mr-2">15.</span>
                            <span>I acknowledge that the Aircraft may not comply with commercial category safety regulations.</span>
                        </div>
                        <div class="mt-1 ml-6">
                            <span class="text-sm text-gray-600">Initial here</span>
                            <span class="border-b border-gray-400 inline-block w-32 ml-2 waiver-initial"></span>
                        </div>
                    </li>
                    
                    <li class="flex flex-col">
                        <div class="flex items-start">
                            <span class="font-semibold mr-2">16.</span>
                            <span>I understand that media taken of me is for personal use only and may not be sold without consent.</span>
                        </div>
                        <div class="mt-1 ml-6">
                            <span class="text-sm text-gray-600">Initial here</span>
                            <span class="border-b border-gray-400 inline-block w-32 ml-2 waiver-initial"></span>
                        </div>
                    </li>
                    
                    <li class="flex flex-col">
                        <div class="flex items-start">
                            <span class="font-semibold mr-2">17.</span>
                            <span>I allow Whistler Sky Sports to use media of me for promotional purposes unless I opt out in writing.</span>
                        </div>
                        <div class="mt-1 ml-6">
                            <span class="text-sm text-gray-600">Initial here</span>
                            <span class="border-b border-gray-400 inline-block w-32 ml-2 waiver-initial"></span>
                        </div>
                    </li>
                    
                    <li class="flex flex-col">
                        <div class="flex items-start">
                            <span class="font-semibold mr-2">18.</span>
                            <span>I declare I am physically fit and free from medical conditions that could affect my safety.</span>
                        </div>
                        <div class="mt-1 ml-6">
                            <span class="text-sm text-gray-600">Initial here</span>
                            <span class="border-b border-gray-400 inline-block w-32 ml-2 waiver-initial"></span>
                        </div>
                    </li>
                    
                    <li class="flex flex-col">
                        <div class="flex items-start">
                            <span class="font-semibold mr-2">19.</span>
                            <span>I declare I am not participating against medical advice.</span>
                        </div>
                        <div class="mt-1 ml-6">
                            <span class="text-sm text-gray-600">Initial here</span>
                            <span class="border-b border-gray-400 inline-block w-32 ml-2 waiver-initial"></span>
                        </div>
                    </li>
                    
                    <li class="flex flex-col">
                        <div class="flex items-start">
                            <span class="font-semibold mr-2">20.</span>
                            <span>I agree to notify the instructor immediately if I feel unwell or sustain an injury during activities.</span>
                        </div>
                        <div class="mt-1 ml-6">
                            <span class="text-sm text-gray-600">Initial here</span>
                            <span class="border-b border-gray-400 inline-block w-32 ml-2 waiver-initial"></span>
                        </div>
                    </li>
                    
                    <li class="flex flex-col">
                        <div class="flex items-start">
                            <span class="font-semibold mr-2">21.</span>
                            <span>This agreement remains in effect for all future activities with Whistler Sky Sports.</span>
                        </div>
                        <div class="mt-1 ml-6">
                            <span class="text-sm text-gray-600">Initial here</span>
                            <span class="border-b border-gray-400 inline-block w-32 ml-2 waiver-initial"></span>
                        </div>
                    </li>
                    
                    <li class="flex flex-col">
                        <div class="flex items-start">
                            <span class="font-semibold mr-2">22.</span>
                            <span>I am at least 18 years old or the legal guardian signing on behalf of a minor participant.</span>
                        </div>
                        <div class="mt-1 ml-6">
                            <span class="text-sm text-gray-600">Initial here</span>
                            <span class="border-b border-gray-400 inline-block w-32 ml-2 waiver-initial"></span>
                        </div>
                    </li>
                    
                    <li class="flex flex-col">
                        <div class="flex items-start">
                            <span class="font-semibold mr-2">23.</span>
                            <span>This agreement is a legally binding waiver and assumption of risk.</span>
                        </div>
                        <div class="mt-1 ml-6">
                            <span class="text-sm text-gray-600">Initial here</span>
                            <span class="border-b border-gray-400 inline-block w-32 ml-2 waiver-initial"></span>
                        </div>
                    </li>
                    
                    <li class="flex flex-col">
                        <div class="flex items-start">
                            <span class="font-semibold mr-2">24.</span>
                            <span>I have read and understood all the above clauses and agree to be bound by them.</span>
                        </div>
                        <div class="mt-1 ml-6">
                            <span class="text-sm text-gray-600">Initial here</span>
                            <span class="border-b border-gray-400 inline-block w-32 ml-2 waiver-initial"></span>
                        </div>
                    </li>
                    
                    <li class="flex flex-col">
                        <div class="flex items-start">
                            <span class="font-semibold mr-2">25.</span>
                            <span>I am wide awake and still wish to participate despite the legal warnings provided above.</span>
                        </div>
                        <div class="mt-1 ml-6">
                            <span class="text-sm text-gray-600">Initial here</span>
                            <span class="border-b border-gray-400 inline-block w-32 ml-2 waiver-initial"></span>
                        </div>
                    </li>
                </ol>
                
                <div class="text-center font-bold mt-6 mb-4">
                    <p>I HAVE READ THIS RELEASE OF LIABILITY, WAIVER OF LEGAL RIGHTS, ASSUMPTION OF RISK AND DECLARATION OF FITNESS AND FULLY UNDERSTAND ITS CONTENTS.</p>
                    <p class="mt-2">I SIGN IT OF MY OWN FREE WILL AND AGREE TO BE BOUND BY IT.</p>
                </div>
                
                <div class="mt-10 space-y-6">
                    <div class="flex flex-col">
                        <span class="text-sm text-gray-600">Read and signed on TODAY'S DATE</span>
                        <div class="flex items-center mt-1">
                            <span class="border-b border-gray-400 inline-block w-48" id="today_date"></span>
                            <span class="mx-2">, 20</span>
                            <span class="border-b border-gray-400 inline-block w-12" id="today_year"></span>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="flex flex-col">
                            <span class="text-sm text-gray-600">Signature of Adult Participant</span>
                            <div class="signature-pad">
                                <canvas id="signature-pad"></canvas>
                                <div class="signature-actions">
                                    <button type="button" class="clear-signature">Clear Signature</button>
                                </div>
                                <div class="signature-error">Please provide your signature</div>
                            </div>
                        </div>
                        
                        <div class="flex flex-col">
                            <span class="text-sm text-gray-600">Name(s) of Minor Child or Children (if any)</span>
                            <span class="border-b border-gray-400 inline-block w-full mt-6" id="minor_children"></span>
                        </div>
                        
                        <div class="flex flex-col">
                            <span class="text-sm text-gray-600">Printed Name of Adult Participant</span>
                            <span class="border-b border-gray-400 inline-block w-full mt-6" id="printed_name"></span>
                        </div>
                        
                        <div class="flex flex-col">
                            <span class="text-sm text-gray-600">Signature of Parent or Guardian (if applicable)</span>
                            <span class="border-b border-gray-400 inline-block w-full mt-6" id="guardian_signature"></span>
                        </div>
                        
                        <div class="flex flex-col">
                            <span class="text-sm text-gray-600">Home Address</span>
                            <span class="border-b border-gray-400 inline-block w-full mt-6" id="home_address"></span>
                        </div>
                        
                        <div class="flex flex-col">
                            <span class="text-sm text-gray-600">Phone Number</span>
                            <span class="border-b border-gray-400 inline-block w-full mt-6" id="phone_number"></span>
                        </div>
                        
                        <div class="flex flex-col">
                            <span class="text-sm text-gray-600">City, Province, and Postal Code</span>
                            <span class="border-b border-gray-400 inline-block w-full mt-6" id="city_province"></span>
                        </div>
                        
                        <div class="flex flex-col">
                            <span class="text-sm text-gray-600">Email Address</span>
                            <span class="border-b border-gray-400 inline-block w-full mt-6" id="email_address"></span>
                        </div>
                    </div>
                    
                    <div class="mt-10">
                        <h3 class="font-bold text-center mb-4">EMERGENCY CONTACT DETAILS (REQUIRED)</h3>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div class="flex flex-col">
                                <span class="text-sm text-gray-600">Name *</span>
                                <input type="text" id="emergency_name" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:border-[#204fb4] focus:ring focus:ring-[#204fb4]/20 transition-all duration-200" placeholder="Emergency contact name" required>
                                <p class="text-xs text-red-500 mt-1 emergency-error hidden">Emergency contact name is required</p>
                            </div>
                            
                            <div class="flex flex-col">
                                <span class="text-sm text-gray-600">Relationship *</span>
                                <input type="text" id="emergency_relationship" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:border-[#204fb4] focus:ring focus:ring-[#204fb4]/20 transition-all duration-200" placeholder="Relationship to you" required>
                                <p class="text-xs text-red-500 mt-1 emergency-error hidden">Relationship is required</p>
                            </div>
                            
                            <div class="flex flex-col">
                                <span class="text-sm text-gray-600">Phone Number *</span>
                                <input type="tel" id="emergency_phone" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:border-[#204fb4] focus:ring focus:ring-[#204fb4]/20 transition-all duration-200" placeholder="Emergency contact phone" required>
                                <p class="text-xs text-red-500 mt-1 emergency-error hidden">Emergency phone is required</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="p-4 bg-gray-50 border-t border-gray-200 flex justify-end">
            <button id="acceptWaiver" class="bg-[#204fb4] text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                I Have Read and Accept the Waiver
            </button>
        </div>
    </div>
</div>

<!-- JSON-LD Structured Data -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Service",
  "name": "Whistler Sky Sports Flight Booking",
  "description": "Book your power hang gliding adventure with Whistler Sky Sports and experience the thrill of flying over the stunning Canadian Rockies in British Columbia.",
  "provider": {
    "@type": "LocalBusiness",
    "name": "Whistler Sky Sports",
    "image": "{{ asset('images/logo/Whistler-Sky-Sports_Full-Black.png') }}",
    "telephone": "+12162881303",
    "address": {
      "@type": "PostalAddress",
      "addressLocality": "Whistler",
      "addressRegion": "BC",
      "addressCountry": "CA"
    }
  },
  "areaServed": {
    "@type": "Place",
    "name": "Whistler, British Columbia",
    "geo": {
      "@type": "GeoCoordinates",
      "latitude": "50.1163",
      "longitude": "-122.9574"
    }
  },
  "offers": {
    "@type": "AggregateOffer",
    "highPrice": "259",
    "lowPrice": "120",
    "priceCurrency": "CAD",
    "offerCount": "4",
    "offers": [
      {
        "@type": "Offer",
        "name": "Open Cockpit Weight Shift Trike",
        "price": "140",
        "priceCurrency": "CAD",
        "description": "15 minute power hang gliding experience in an open cockpit trike"
      },
      {
        "@type": "Offer",
        "name": "Fixed Wing Advanced Ultralight",
        "price": "120",
        "priceCurrency": "CAD",
        "description": "15 minute flying experience in a fixed wing advanced ultralight aircraft"
      }
    ]
  }
}
</script>
@endsection

@push('scripts')
    <!-- Add required JavaScript libraries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

    <script>
        // Global form reference
        let mainForm;

        /**
         * Initialize all components when DOM is loaded
         */
        document.addEventListener('DOMContentLoaded', function() {
            mainForm = document.getElementById('bookingForm');
            
            // Initialize all required components
            initializePhoneInputs();
            initializeWaiver();
            initializePackagePricing();
            initializeDateDefaults();
            initializeEmergencyFields();
            
            // Add form submission handler
            mainForm.addEventListener('submit', handleFormSubmission);
        });

        /**
         * Initialize phone input fields with international format
         */
        function initializePhoneInputs() {
            const phoneInputs = document.querySelectorAll("#primary_phone, #local_phone");
            const phoneInstances = {};
            
            phoneInputs.forEach(phoneInput => {
                const iti = window.intlTelInput(phoneInput, {
                    separateDialCode: true,
                    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
                    initialCountry: "CA",
                    onlyCountries: [], // Show all countries
                    formatOnDisplay: true,
                    autoPlaceholder: "aggressive"
                });
                
                phoneInstances[phoneInput.id] = iti;
                phoneInput.classList.add('phone-input');
                
                if (phoneInput.value) {
                    iti.setNumber(phoneInput.value);
                }
                
                setupPhoneInputHandlers(phoneInput, iti);
            });

            return phoneInstances;
        }

        /**
         * Handle form submission and validation
         */
        function handleFormSubmission(e) {
                console.log('Form submission started');
                
            // Validate required fields
            const requiredFields = {
                name: document.getElementById('name').value.trim(),
                email: document.getElementById('email').value.trim(),
                package: document.getElementById('package').value,
                terms: document.querySelector('input[name="terms"]').checked,
                waiver: document.getElementById('waiver_checkbox').checked,
                date_of_birth: document.getElementById('date_of_birth').value,
                weight: document.getElementById('weight').value
            };

            if (Object.values(requiredFields).includes('') || !requiredFields.terms || !requiredFields.waiver) {
                e.preventDefault();
                alert('Please fill in all required fields and accept both the terms and conditions and waiver.');
                    return false;
                }

            // Validate DOB
            const dob = new Date(requiredFields.date_of_birth);
            const today = new Date();
            const minAge = 18;
            const minDate = new Date(today.getFullYear() - minAge, today.getMonth(), today.getDate());
            
            if (dob > minDate) {
                e.preventDefault();
                alert(`You must be at least ${minAge} years old to book a flight.`);
                return false;
            }

            // Validate weight
            const weight = parseInt(requiredFields.weight);
            if (isNaN(weight) || weight <= 0 || weight > 245) {
                e.preventDefault();
                alert('Please enter a valid weight between 1 and 245 lbs.');
                return false;
            }
                
            // Validate phone numbers
            if (!validatePhoneNumbers()) {
                e.preventDefault();
                return false;
            }

            console.log('Form validation passed');
                return true;
        }

        /**
         * Setup phone input validation handlers
         */
        function setupPhoneInputHandlers(phoneInput, iti) {
            // Allow only numbers
            phoneInput.addEventListener('keypress', e => {
                if (!/[0-9]/.test(String.fromCharCode(e.which))) {
                    e.preventDefault();
                }
            });

            // Clean input on paste
            phoneInput.addEventListener('paste', e => {
                if (!/^\d+$/.test((e.clipboardData || window.clipboardData).getData('text'))) {
                    e.preventDefault();
                }
            });

            // Validate on input
            phoneInput.addEventListener('input', function() {
                this.value = this.value.replace(/[^\d]/g, '');
                if (iti.isValidNumber()) {
                    this.classList.remove('error');
                }
            });

            // Validate on blur
            phoneInput.addEventListener('blur', function() {
                if (this.value.trim() && !iti.isValidNumber()) {
                    this.classList.add('error');
                    } else {
                    this.classList.remove('error');
                }
            });
        }

        /**
         * Initialize waiver functionality
         */
        function initializeWaiver() {
            const waiverElements = {
                checkbox: document.getElementById('waiver_checkbox'),
                link: document.getElementById('waiver_link'),
                linkContainer: document.getElementById('waiver_link_container'),
                linkPlaceholder: document.getElementById('waiver_link_placeholder'),
                modal: document.getElementById('waiverModal'),
                closeButton: document.getElementById('closeWaiverModal'),
                acceptButton: document.getElementById('acceptWaiver'),
                nameInput: document.getElementById('name')
            };

            // Add name input listener for real-time initial updates
            waiverElements.nameInput.addEventListener('input', () => {
                if (!waiverElements.modal.classList.contains('hidden')) {
                    fillWaiverForm();
                }
            });
            
            // Check mandatory fields before showing waiver
            function checkMandatoryFields() {
                const mandatoryFields = [
                    'name', 'email', 'primary_phone', 'timezone', 'local_phone', 
                    'package', 'flyer_details', 'preferred_dates', 'sunrise_flight'
                ];
                
                const allFieldsFilled = mandatoryFields.every(fieldId => {
                    const field = document.getElementById(fieldId);
                    return field && field.value.trim();
                });
                
                console.log('Mandatory fields check:', allFieldsFilled);
                
                waiverElements.linkContainer.classList.toggle('hidden', !allFieldsFilled);
                waiverElements.linkPlaceholder.classList.toggle('hidden', allFieldsFilled);
                
                return allFieldsFilled;
            }
            
            // Add event listeners to mandatory fields
            const mandatoryFields = [
                'name', 'email', 'primary_phone', 'timezone', 'local_phone', 
                'package', 'flyer_details', 'preferred_dates', 'sunrise_flight'
            ];
            
            mandatoryFields.forEach(fieldId => {
                const field = document.getElementById(fieldId);
                if (field) {
                    ['input', 'change'].forEach(event => {
                        field.addEventListener(event, checkMandatoryFields);
                    });
                }
            });
            
            // Initial check for mandatory fields
            checkMandatoryFields();
            
            // Handle opening waiver modal
            window.openWaiverModal = function(event) {
                event.preventDefault();
                
                if (!checkMandatoryFields()) {
                    alert('Please fill all mandatory fields before viewing the waiver.');
                    return;
                }
                
                waiverElements.modal.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
                fillWaiverForm();
                initializeSignaturePad();
                setupEmergencyFieldValidation();
            };
            
            // Handle waiver modal closing
            waiverElements.closeButton.addEventListener('click', () => {
                waiverElements.modal.classList.add('hidden');
                document.body.style.overflow = '';
            });
            
            // Handle waiver acceptance
            waiverElements.acceptButton.addEventListener('click', () => {
                const signaturePad = document.querySelector('#signature-pad').__signaturePad;
                const emergencyName = document.getElementById('emergency_name').value.trim();
                const emergencyRelationship = document.getElementById('emergency_relationship').value.trim();
                const emergencyPhone = document.getElementById('emergency_phone').value.trim();
                
                // Reset all error messages
                document.querySelector('.signature-error').style.display = 'none';
                document.querySelectorAll('.emergency-error').forEach(el => el.classList.add('hidden'));
                
                // Flag to track validation status
                let isValid = true;
                
                // Validate signature
                if (signaturePad.isEmpty()) {
                    document.querySelector('.signature-error').style.display = 'block';
                    isValid = false;
                }
                
                // Validate emergency contact details
                if (!emergencyName) {
                    document.getElementById('emergency_name').nextElementSibling.classList.remove('hidden');
                    isValid = false;
                }
                
                if (!emergencyRelationship) {
                    document.getElementById('emergency_relationship').nextElementSibling.classList.remove('hidden');
                    isValid = false;
                }
                
                if (!emergencyPhone) {
                    document.getElementById('emergency_phone').nextElementSibling.classList.remove('hidden');
                    isValid = false;
                }
                
                if (!isValid) {
                    return;
                }

                try {
                const signatureData = signaturePad.toDataURL();
                let signatureInput = document.getElementById('signature_data');
                if (!signatureInput) {
                    signatureInput = document.createElement('input');
                    signatureInput.type = 'hidden';
                    signatureInput.id = 'signature_data';
                    signatureInput.name = 'signature_data';
                    mainForm.appendChild(signatureInput);
                }
                signatureInput.value = signatureData;
                    
                    // Create hidden inputs for emergency contact fields
                    const emergencyFields = [
                        { id: 'emergency_name', value: emergencyName },
                        { id: 'emergency_relationship', value: emergencyRelationship },
                        { id: 'emergency_phone', value: emergencyPhone }
                    ];
                    
                    emergencyFields.forEach(field => {
                        let hiddenInput = document.getElementById(`main_form_${field.id}`);
                        if (!hiddenInput) {
                            hiddenInput = document.createElement('input');
                            hiddenInput.type = 'hidden';
                            hiddenInput.id = `main_form_${field.id}`;
                            hiddenInput.name = field.id;
                            mainForm.appendChild(hiddenInput);
                        }
                        hiddenInput.value = field.value;
                    });

                    waiverElements.checkbox.disabled = false;
                    waiverElements.checkbox.checked = true;
                    waiverElements.modal.classList.add('hidden');
                document.body.style.overflow = '';
                } catch (error) {
                    console.error('Error processing signature:', error);
                    alert('There was an error processing your signature. Please try again.');
                }
            });
            
            // Setup real-time validation for emergency fields
            function setupEmergencyFieldValidation() {
                const emergencyFields = ['emergency_name', 'emergency_relationship', 'emergency_phone'];
                
                emergencyFields.forEach(fieldId => {
                    const field = document.getElementById(fieldId);
                    if (field) {
                        // Clear error on input
                        field.addEventListener('input', function() {
                            if (this.value.trim()) {
                                this.nextElementSibling.classList.add('hidden');
                            }
                        });
                        
                        // Validate on blur
                        field.addEventListener('blur', function() {
                            if (!this.value.trim()) {
                                this.nextElementSibling.classList.remove('hidden');
                            } else {
                                this.nextElementSibling.classList.add('hidden');
                            }
                        });
                    }
                });
            }
        }

        /**
         * Fill waiver form with user information
         */
        function fillWaiverForm() {
            try {
                // Set current date
                const today = new Date();
                document.getElementById('today_date').textContent = today.toLocaleDateString('en-US', { 
                    month: 'long', 
                    day: 'numeric' 
                });
                document.getElementById('today_year').textContent = today.getFullYear().toString().slice(-2);

                // Get name and fill initials
                const nameField = document.getElementById('name');
                if (nameField) {
                    const initials = nameField.value.trim()
                        .split(' ')
                        .map(part => part.charAt(0).toUpperCase())
                        .join(' ');
                    
                    // Fill all initial fields
                    document.querySelectorAll('.waiver-initial').forEach(field => {
                        field.textContent = initials;
                    });
                }

                // Map form fields to waiver fields
                const fieldMappings = {
                    'name': ['printed_name'],
                    'primary_phone': ['phone_number'],
                    'email': ['email_address'],
                    'underage_flyers': ['minor_children'],
                    'accommodation': ['home_address']
                };

                // Fill in mapped fields
                Object.entries(fieldMappings).forEach(([formField, waiverFields]) => {
                    const value = document.getElementById(formField)?.value || 'Not provided';
                    waiverFields.forEach(waiverField => {
                        const element = document.getElementById(waiverField);
                        if (element) element.textContent = value;
                    });
                });

                // Set location
                document.getElementById('city_province').textContent = 'Whistler, BC';

                // Reset all error messages
                document.querySelectorAll('.emergency-error').forEach(el => el.classList.add('hidden'));
                document.querySelector('.signature-error').style.display = 'none';
                
            } catch (error) {
                console.error('Error filling waiver form:', error);
            }
        }

        /**
         * Handle emergency contact information
         */
        function initializeEmergencyFields() {
            // Define the emergency fields mapping
            const emergencyFieldsMap = ['emergency_name','emergency_relationship','emergency_phone'];

            // Add input listeners to emergency fields
            emergencyFieldsMap.forEach((fieldName) => {
                document.getElementById(fieldName).addEventListener('input', function() {
                    let hiddenInput = document.getElementById(`main_form_${fieldName}`);
                    if(!hiddenInput){
                        hiddenInput = document.createElement('input');
                        hiddenInput.type = 'hidden';
                        hiddenInput.id = `main_form_${fieldName}`;
                        hiddenInput.name = fieldName;
                    }
                    hiddenInput.value = this.value;
                    mainForm.appendChild(hiddenInput);
                });
            });
        }

        /**
         * Initialize signature pad
         */
        function initializeSignaturePad() {
            const canvas = document.getElementById('signature-pad');
            const signaturePad = new SignaturePad(canvas, {
                backgroundColor: 'rgba(255, 255, 255, 1)',
                penColor: 'rgb(0, 0, 0)',
                minWidth: 2,
                maxWidth: 3
            });

            // Store reference for later use
            canvas.__signaturePad = signaturePad;

            function resizeCanvas() {
                const ratio = Math.max(window.devicePixelRatio || 1, 1);
                canvas.width = canvas.offsetWidth * ratio;
                canvas.height = canvas.offsetHeight * ratio;
                canvas.getContext("2d").scale(ratio, ratio);
                signaturePad.clear();
            }

            window.addEventListener('resize', resizeCanvas);
            resizeCanvas();

            // Clear signature button
            document.querySelector('.clear-signature').addEventListener('click', () => {
                signaturePad.clear();
                document.querySelector('.signature-error').style.display = 'none';
            });

            return signaturePad;
        }

        /**
         * Initialize date defaults and validation
         */
        function initializeDateDefaults() {
            const today = new Date().toISOString().split('T')[0];
            const preferredDatesInput = document.getElementById('preferred_dates');
            preferredDatesInput.min = today;
            preferredDatesInput.value = today;

            // Set max date for DOB to today
            const dobInput = document.getElementById('date_of_birth');
            if (dobInput) {
                dobInput.max = today;
            }

            // Add weight validation on input
            const weightInput = document.getElementById('weight');
            if (weightInput) {
                weightInput.addEventListener('input', function() {
                    const value = parseInt(this.value);
                    if (value > 245) {
                        this.value = 245;
                    } else if (value < 0) {
                        this.value = 0;
                    }
                });
            }
        }

        /**
         * Initialize package pricing
         */
        function initializePackagePricing() {
            // Fixed prices that cannot be modified
            const prices = Object.freeze({
                video_package: 99,
                deluxe_package: 159,
                merch_package: 99,
                sunrise_flight: 99,
                packages: {
                    'intro': 140,
                    'basic': 120
                }
            });

            window.updateQuantity = function(packageId, change) {
                const input = document.getElementById(packageId);
                if (!input) return;
                
                // Ensure quantity is between 0 and 10
                const currentValue = parseInt(input.value) || 0;
                const newValue = Math.max(0, Math.min(currentValue + change, 10));
                
                if (currentValue !== newValue) {
                input.value = newValue;
                updateTotalPrice();
                }
            }

            window.updateTotalPrice = function() {
                try {
                let total = 0;
                
                    // Add base package price
                    const selectedPackage = document.getElementById('package').value;
                    if (!prices.packages[selectedPackage]) {
                        console.error('Invalid package selected');
                        return;
                    }
                    total += prices.packages[selectedPackage];

                    // Add video package if selected
                    if (document.getElementById('video_package').checked) {
                        total += prices.video_package;
                    }

                    // Add deluxe package if selected
                    if (document.getElementById('deluxe_package').checked) {
                        total += prices.deluxe_package;
                    }

                    // Add sunrise flight if selected
                    if (document.getElementById('sunrise_flight').value === 'yes') {
                        total += prices.sunrise_flight;
                    }

                    // Add merchandise with validation
                    const merchQty = Math.max(0, Math.min(parseInt(document.getElementById('merch_package').value) || 0, 10));
                    total += merchQty * prices.merch_package;
                
                    // Update display with proper formatting
                    const totalElement = document.getElementById('total_price');
                    if (totalElement) {
                        totalElement.textContent = `CAD $${total.toFixed(2)}`;
        }

                    // Store calculated total in hidden input for server validation
                    let totalInput = document.getElementById('calculated_total');
                    if (!totalInput) {
                        totalInput = document.createElement('input');
                        totalInput.type = 'hidden';
                        totalInput.id = 'calculated_total';
                        totalInput.name = 'calculated_total';
                        document.getElementById('bookingForm').appendChild(totalInput);
                    }
                    totalInput.value = total.toFixed(2);

                    // Store price components for server validation
                    let priceComponents = document.getElementById('price_components');
                    if (!priceComponents) {
                        priceComponents = document.createElement('input');
                        priceComponents.type = 'hidden';
                        priceComponents.id = 'price_components';
                        priceComponents.name = 'price_components';
                        document.getElementById('bookingForm').appendChild(priceComponents);
                    }
                    priceComponents.value = JSON.stringify({
                        package: selectedPackage,
                        video_package: document.getElementById('video_package').checked,
                        deluxe_package: document.getElementById('deluxe_package').checked,
                        merch_package: merchQty,
                        sunrise_flight: document.getElementById('sunrise_flight').value === 'yes'
                    });

                    return total;
                } catch (error) {
                    console.error('Error calculating total:', error);
                    return 0;
                }
            }

            // Add event listeners for price updates
            const priceElements = ['video_package', 'deluxe_package', 'package', 'sunrise_flight', 'merch_package'];
            priceElements.forEach(id => {
                const element = document.getElementById(id);
                if (element) {
                    element.addEventListener('change', updateTotalPrice);
                }
            });

            // Calculate initial price
            updateTotalPrice();
        }
    </script>
@endpush