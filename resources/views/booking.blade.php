@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-sky-50 to-white pt-16 pb-12 mt-10">
    <div class="container mx-auto px-4">
        <!-- Hero Section -->
        <div class="max-w-4xl mx-auto text-center mb-12">
            <h1 class="text-4xl md:text-5xl font-bold text-[#204fb4] mb-4">Book Your Sky Adventure</h1>
            <p class="text-xl text-gray-600">Experience the freedom of flight in the majestic skies of Whistler</p>
        </div>

        <!-- Main Booking Form -->
        <div class="max-w-5xl mx-auto">
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
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
                <form action="{{ route('booking.preview') }}" method="POST" class="p-8" id="bookingForm">
                    @csrf
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                        <!-- Personal Information -->
                        <div class="space-y-6">
                            <div class="flex items-center space-x-3 mb-6">
                                
                                <h3 class="text-xl font-bold text-gray-800">Personal Details</h3>
                            </div>

                            <div class="space-y-4">
                                <div class="relative">
                                    <label class="text-sm font-medium text-gray-700 mb-1 block">Full Name *</label>
                                    <input type="text" name="name" id="name" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#204fb4] focus:ring focus:ring-[#204fb4]/20 transition-all duration-200">
                                </div>

                                <div class="relative">
                                    <label class="text-sm font-medium text-gray-700 mb-1 block">Email Address *</label>
                                    <input type="email" name="email" id="email" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#204fb4] focus:ring focus:ring-[#204fb4]/20 transition-all duration-200">
                                </div>

                                <div class="relative">
                                    <label class="text-sm font-medium text-gray-700 mb-1 block">Primary Phone *</label>
                                    <input type="tel" name="callback_phone" id="callback_phone" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#204fb4] focus:ring focus:ring-[#204fb4]/20 transition-all duration-200">
                                </div>

                                <div class="relative">
                                    <label class="text-sm font-medium text-gray-700 mb-1 block">Time Zone *</label>
                                    <select name="timezone" id="timezone" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#204fb4] focus:ring focus:ring-[#204fb4]/20 transition-all duration-200">
                                        <option value="">Select your time zone</option>
                                        <optgroup label="North America">
                                            <option value="America/New_York">Eastern Time (ET) - New York, Toronto</option>
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
                                    <label class="text-sm font-medium text-gray-700 mb-1 block">Local Contact (During Stay) *</label>
                                    <input type="tel" name="oahu_phone" id="oahu_phone" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#204fb4] focus:ring focus:ring-[#204fb4]/20 transition-all duration-200">
                                </div>
                            </div>
                        </div>

                        <!-- Flight Details -->
                        <div class="space-y-6">
                            <div class="flex items-center space-x-3 mb-6">
                                
                                <h3 class="text-xl font-bold text-gray-800">Flight Details</h3>
                            </div>

                            <div class="space-y-4">
                                <div class="relative">
                                    <label class="text-sm font-medium text-gray-700 mb-1 block">Select Package *</label>
                                    <select name="package" id="package" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#204fb4] focus:ring focus:ring-[#204fb4]/20 transition-all duration-200">
                                        <option value="">Choose your adventure</option>
                                        <option value="intro">Open Cockpit Weight Shift Trike - CA$229 (30 min)</option>
                                        <option value="basic">Fixed Wing Advanced Ultralight - CA$199 (30 min)</option>
                                    </select>
                                </div>

                                <div class="relative">
                                    <label class="text-sm font-medium text-gray-700 mb-1 block">Participant Details *</label>
                                    <textarea name="flyer_details" id="flyer_details" required rows="3" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#204fb4] focus:ring focus:ring-[#204fb4]/20 transition-all duration-200" placeholder="List each participant's name and weight"></textarea>
                                </div>

                                <div class="relative">
                                    <label class="text-sm font-medium text-gray-700 mb-1 block">Under 18 Participants</label>
                                    <textarea name="underage_flyers" rows="2" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#204fb4] focus:ring focus:ring-[#204fb4]/20 transition-all duration-200" placeholder="List names of participants under 18"></textarea>
                                </div>

                                <div class="relative">
                                    <label class="text-sm font-medium text-gray-700 mb-1 block">Preferred Dates *</label>
                                    <input type="date" name="preferred_dates" id="preferred_dates" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#204fb4] focus:ring focus:ring-[#204fb4]/20 transition-all duration-200">
                                </div>

                                <div class="relative">
                                    <label class="text-sm font-medium text-gray-700 mb-1 block">Sunrise Flight Option *</label>
                                    <select name="sunrise_flight" id="sunrise_flight" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#204fb4] focus:ring focus:ring-[#204fb4]/20 transition-all duration-200">
                                        <option value="">Select preference</option>
                                        <option value="yes">Yes - Sunrise Flight (CA$99)</option>
                                        <option value="no">No - Regular Time</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Memory Packages Section -->
                    <div class="mt-12">
                        <div class="bg-gradient-to-r from-[#204fb4] to-blue-600 rounded-xl p-6 mb-8 relative overflow-hidden">
                            <div class="absolute inset-0 bg-[#fcdb3f]/5"></div>
                            <div class="relative z-10">
                                <h3 class="text-2xl font-bold text-white flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    Capture Your Adventure
                                </h3>
                                <p class="text-blue-100 mt-2">Choose how you want to remember this incredible experience</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <!-- Video Package -->
                            <div class="bg-white rounded-xl border border-gray-100 p-6 hover:border-[#204fb4]/20 transition-all duration-300">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <div class="flex items-center mb-3">
                                            <div class="bg-[#204fb4]/10 p-2 rounded-lg mr-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#204fb4]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                                </svg>
                                            </div>
                                            <h4 class="text-xl font-bold text-gray-800">Video Package</h4>
                                        </div>
                                        <p class="text-gray-600 ml-11 mb-2">Professional flight video with audio</p>
                                        <p class="text-[#204fb4] font-bold text-xl ml-11">CA$90</p>
                                    </div>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" name="video_package" class="sr-only peer" onchange="updateTotalPrice()">
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
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#204fb4]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                                                </svg>
                                            </div>
                                            <h4 class="text-xl font-bold text-gray-800">Deluxe Package</h4>
                                        </div>
                                        <p class="text-gray-600 ml-11 mb-2">Video + WhistlerSkySports Gear</p>
                                        <p class="text-[#204fb4] font-bold text-xl ml-11">CA$120</p>
                                    </div>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" name="deluxe_package" class="sr-only peer" onchange="updateTotalPrice()">
                                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-[#204fb4]/20 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-[#204fb4]"></div>
                                    </label>
                                </div>
                            </div>

                            <!-- Merchandise Package -->
                            <div class="bg-white rounded-xl border border-gray-100 p-6 hover:border-[#204fb4]/20 transition-all duration-300">
                                <div class="flex flex-col">
                                    <div class="flex items-center mb-3">
                                        <div class="bg-[#204fb4]/10 p-2 rounded-lg mr-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#204fb4]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                            </svg>
                                        </div>
                                        <h4 class="text-xl font-bold text-gray-800">Merchandise</h4>
                                    </div>
                                    <p class="text-gray-600 ml-11 mb-2">WhistlerSkySports Gear Pack</p>
                                    <div class="flex justify-between items-center mt-2">
                                        <p class="text-[#204fb4] font-bold text-xl ml-11">CA$40</p>
                                        <div class="flex items-center gap-1">
                                            <button type="button" onclick="updateQuantity('merch_package', -1)" class="w-6 h-6 flex items-center justify-center rounded-md bg-gray-100 hover:bg-gray-200 text-gray-600">
                                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/>
                                                </svg>
                                            </button>
                                            <input type="number" id="merch_package" name="merch_package" class="w-8 text-center text-sm border-gray-200 rounded-md" value="0" min="0" readonly onchange="updateTotalPrice()">
                                            <button type="button" onclick="updateQuantity('merch_package', 1)" class="w-6 h-6 flex items-center justify-center rounded-md bg-[#204fb4]/10 hover:bg-[#204fb4]/20 text-[#204fb4]">
                                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Total Section -->
                        <div class="mt-8 bg-gradient-to-r from-[#204fb4]/5 to-blue-50 p-6 rounded-xl border border-[#204fb4]/10">
                            <div class="flex justify-between items-center">
                                <div class="flex items-center">
                                    <div class="bg-[#204fb4]/10 p-2 rounded-lg mr-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#204fb4]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="text-lg font-bold text-gray-800">Total Package</h4>
                                        <p class="text-sm text-gray-600">Digital delivery within 48 hours</p>
                                    </div>
                                </div>
                                <p class="text-2xl font-bold text-[#204fb4]" id="total_price">CA$0</p>
                            </div>
                        </div>
                    </div>

                    <!-- Additional Information -->
                    <div class="mt-12 space-y-6">
                        <div class="flex items-center space-x-3 mb-6">
                            
                            <h3 class="text-xl font-bold text-gray-800">Additional Details</h3>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="relative">
                                <label class="text-sm font-medium text-gray-700 mb-1 block">Accommodation Details</label>
                                <input type="text" name="accommodation" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#204fb4] focus:ring focus:ring-[#204fb4]/20 transition-all duration-200" placeholder="Hotel name or address">
                            </div>

                            <div class="relative">
                                <label class="text-sm font-medium text-gray-700 mb-1 block">Special Occasion?</label>
                                <input type="text" name="special_event" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#204fb4] focus:ring focus:ring-[#204fb4]/20 transition-all duration-200" placeholder="Tell us if you're celebrating">
                            </div>
                        </div>

                        <div class="relative">
                            <label class="text-sm font-medium text-gray-700 mb-1 block">Additional Notes</label>
                            <textarea name="additional_info" rows="3" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#204fb4] focus:ring focus:ring-[#204fb4]/20 transition-all duration-200" placeholder="Any other details we should know"></textarea>
                        </div>

                        <!-- Terms and Waiver -->
                        <div class="space-y-4">
                            <div class="flex items-start p-4 bg-[#204fb4]/5 rounded-xl">
                                <input type="checkbox" id="waiver_checkbox" name="waiver" class="mt-1 h-4 w-4 text-[#204fb4] focus:ring-[#204fb4]/20 border-gray-300 rounded" disabled>
                                <label class="ml-3 text-sm text-gray-700">
                                    I accept the <span id="waiver_link_container" class="hidden"><a href="#" id="waiver_link" class="text-[#204fb4] hover:text-blue-700 underline" onclick="openWaiverModal(event)">liability waiver</a></span><span id="waiver_link_placeholder" class="text-gray-400 italic">(Complete all required fields to view waiver)</span> and understand the risks involved.
                                </label>
                            </div>

                            <div class="flex items-start p-4 bg-[#204fb4]/5 rounded-xl">
                                <input type="checkbox" name="terms" required class="mt-1 h-4 w-4 text-[#204fb4] focus:ring-[#204fb4]/20 border-gray-300 rounded">
                                <label class="ml-3 text-sm text-gray-700">
                                    I agree to the <a href="{{ route('terms') }}" target="_blank" class="text-[#204fb4] hover:text-blue-700 underline">terms and conditions</a>.
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="mt-12">
                        <button type="submit" class="w-full bg-gradient-to-r from-[#204fb4] to-blue-600 text-[#fcdb3f] font-bold py-4 px-8 rounded-xl shadow-lg hover:shadow-xl transition duration-300 transform hover:scale-[1.02] focus:outline-none focus:ring-2 focus:ring-[#204fb4] focus:ring-offset-2 flex items-center justify-center space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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
<div id="waiverModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center hidden">
    <div class="bg-white rounded-xl shadow-2xl max-w-4xl w-full max-h-[90vh] overflow-hidden flex flex-col">
        <div class="bg-[#204fb4] p-4 flex justify-between items-center">
            <h3 class="text-xl font-bold text-white">Liability Waiver</h3>
            <button id="closeWaiverModal" class="text-white hover:text-gray-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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
                            <span class="border-b border-gray-400 inline-block w-48"></span>
                            <span class="mx-2">, 20</span>
                            <span class="border-b border-gray-400 inline-block w-12"></span>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="flex flex-col">
                            <span class="text-sm text-gray-600">Signature of Adult Participant</span>
                            <span class="border-b border-gray-400 inline-block w-full mt-6"></span>
                        </div>
                        
                        <div class="flex flex-col">
                            <span class="text-sm text-gray-600">Name(s) of Minor Child or Children (if any)</span>
                            <span class="border-b border-gray-400 inline-block w-full mt-6"></span>
                        </div>
                        
                        <div class="flex flex-col">
                            <span class="text-sm text-gray-600">Printed Name of Adult Participant</span>
                            <span class="border-b border-gray-400 inline-block w-full mt-6"></span>
                        </div>
                        
                        <div class="flex flex-col">
                            <span class="text-sm text-gray-600">Signature of Parent or Guardian (if applicable)</span>
                            <span class="border-b border-gray-400 inline-block w-full mt-6"></span>
                        </div>
                        
                        <div class="flex flex-col">
                            <span class="text-sm text-gray-600">Home Address</span>
                            <span class="border-b border-gray-400 inline-block w-full mt-6"></span>
                        </div>
                        
                        <div class="flex flex-col">
                            <span class="text-sm text-gray-600">Phone Number</span>
                            <span class="border-b border-gray-400 inline-block w-full mt-6"></span>
                        </div>
                        
                        <div class="flex flex-col">
                            <span class="text-sm text-gray-600">City, Province, and Postal Code</span>
                            <span class="border-b border-gray-400 inline-block w-full mt-6"></span>
                        </div>
                        
                        <div class="flex flex-col">
                            <span class="text-sm text-gray-600">Email Address</span>
                            <span class="border-b border-gray-400 inline-block w-full mt-6"></span>
                        </div>
                    </div>
                    
                    <div class="mt-10">
                        <h3 class="font-bold text-center mb-4">(OPTIONAL) IN CASE OF AN EMERGENCY, PLEASE NOTIFY:</h3>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div class="flex flex-col">
                                <span class="text-sm text-gray-600">Name</span>
                                <span class="border-b border-gray-400 inline-block w-full mt-6"></span>
                            </div>
                            
                            <div class="flex flex-col">
                                <span class="text-sm text-gray-600">Relationship</span>
                                <span class="border-b border-gray-400 inline-block w-full mt-6"></span>
                            </div>
                            
                            <div class="flex flex-col">
                                <span class="text-sm text-gray-600">Phone Number</span>
                                <span class="border-b border-gray-400 inline-block w-full mt-6"></span>
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
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize phone inputs
        const phoneInputs = document.querySelectorAll("#callback_phone, #oahu_phone");
        
        phoneInputs.forEach(phoneInput => {
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
            
            // Add class for styling
            phoneInput.classList.add('phone-input');
            
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
        });
        
        // Form validation
        const form = document.querySelector('form');
        form.addEventListener('submit', function(e) {
            const phoneInputs = document.querySelectorAll("#callback_phone, #oahu_phone");
            let isValid = true;
            
            phoneInputs.forEach(phoneInput => {
                const iti = window.intlTelInput(phoneInput);
                if (phoneInput.value.trim() && !iti.isValidNumber()) {
                    phoneInput.classList.add('error');
                    isValid = false;
                }
            });
            
            if (!isValid) {
                e.preventDefault();
                alert('Please enter valid phone numbers');
                return false;
            }
            
            // Set the full international number before submitting
            phoneInputs.forEach(phoneInput => {
                const iti = window.intlTelInput(phoneInput);
                if (phoneInput.value.trim()) {
                    phoneInput.value = iti.getNumber();
                }
            });
        });
        
        // Rest of your existing script
        const packageSelect = document.getElementById('package');
        const waiverCheckbox = document.getElementById('waiver_checkbox');
        const waiverLink = document.getElementById('waiver_link');
        const waiverLinkContainer = document.getElementById('waiver_link_container');
        const waiverLinkPlaceholder = document.getElementById('waiver_link_placeholder');
        const waiverModal = document.getElementById('waiverModal');
        const closeWaiverModal = document.getElementById('closeWaiverModal');
        const acceptWaiver = document.getElementById('acceptWaiver');
        const nameInput = document.getElementById('name');
        
        // Function to get initials from name
        function getInitials(name) {
            if (!name) return '';
            return name.split(' ')
                .map(part => part.charAt(0).toUpperCase())
                .join(' ');
        }
        
        // Function to fill initials in waiver
        function fillInitialsInWaiver() {
            const name = nameInput.value.trim();
            const initials = getInitials(name);
            
            // Find all initial fields in the waiver
            const initialFields = document.querySelectorAll('.waiver-initial');
            
            // Fill each initial field
            initialFields.forEach(field => {
                field.textContent = initials;
            });
        }
        
        // Add event listener to name input
        nameInput.addEventListener('input', function() {
            if (waiverModal.classList.contains('hidden') === false) {
                fillInitialsInWaiver();
            }
        });
        
        // Form validation
        form.addEventListener('submit', function(event) {
            const name = document.getElementById('name').value;
            const package = document.getElementById('package').value;
            const terms = document.getElementById('terms').checked;
            const waiver = document.getElementById('waiver_checkbox').checked;
            
            if (!name || !package || !terms || !waiver) {
                event.preventDefault();
                alert('Please fill in all required fields and accept both the terms and conditions and waiver.');
            }
        });
        
        // Check if all mandatory fields are filled
        function checkMandatoryFields() {
            const name = document.getElementById('name').value.trim();
            const email = document.getElementById('email').value.trim();
            const callback_phone = document.getElementById('callback_phone').value.trim();
            const timezone = document.getElementById('timezone').value.trim();
            const oahu_phone = document.getElementById('oahu_phone').value.trim();
            const package = document.getElementById('package').value;
            const flyer_details = document.getElementById('flyer_details').value.trim();
            const preferred_dates = document.getElementById('preferred_dates').value;
            const sunrise_flight = document.getElementById('sunrise_flight').value;
            
            const allFieldsFilled = name && email && callback_phone && timezone && oahu_phone && 
                                   package && flyer_details && preferred_dates && sunrise_flight;
            
            if (allFieldsFilled) {
                waiverLinkContainer.classList.remove('hidden');
                waiverLinkPlaceholder.classList.add('hidden');
            } else {
                waiverLinkContainer.classList.add('hidden');
                waiverLinkPlaceholder.classList.remove('hidden');
            }
            
            return allFieldsFilled;
        }
        
        // Add event listeners to all mandatory fields
        const mandatoryFields = [
            'name', 'email', 'callback_phone', 'timezone', 'oahu_phone', 
            'package', 'flyer_details', 'preferred_dates', 'sunrise_flight'
        ];
        
        mandatoryFields.forEach(fieldId => {
            const field = document.getElementById(fieldId);
            if (field) {
                field.addEventListener('input', checkMandatoryFields);
                field.addEventListener('change', checkMandatoryFields);
            }
        });
        
        // Initial check
        checkMandatoryFields();
        
        // Open waiver modal
        window.openWaiverModal = function(event) {
            event.preventDefault();
            
            if (!checkMandatoryFields()) {
                alert('Please fill all mandatory fields before viewing the waiver.');
                return;
            }
            
            waiverModal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
            
            // Fill initials when modal opens
            fillInitialsInWaiver();
        };
        
        // Close waiver modal
        closeWaiverModal.addEventListener('click', function() {
            waiverModal.classList.add('hidden');
            document.body.style.overflow = '';
        });
        
        // Accept waiver
        acceptWaiver.addEventListener('click', function() {
            waiverCheckbox.disabled = false;
            waiverCheckbox.checked = true;
            waiverModal.classList.add('hidden');
            document.body.style.overflow = '';
        });
        
        // Add tooltip to waiver checkbox
        waiverCheckbox.addEventListener('mouseover', function() {
            if (this.disabled) {
                this.title = 'Please read the waiver first';
            }
        });
    });

    // Package prices
    const prices = {
        video_package: 90,
        deluxe_package: 120,
        merch_package: 40
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
        
        // Add selected package prices
        if (document.querySelector('input[name="video_package"]').checked) total += prices.video_package;
        if (document.querySelector('input[name="deluxe_package"]').checked) total += prices.deluxe_package;
        
        // Add merchandise quantity price
        const merchQuantity = parseInt(document.getElementById('merch_package').value);
        total += merchQuantity * prices.merch_package;
        
        document.getElementById('total_price').textContent = `CA$${total}`;
    }

    // Initialize total price on page load
    document.addEventListener('DOMContentLoaded', function() {
        updateTotalPrice();
    });
</script>
@endsection