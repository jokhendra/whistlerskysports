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
                                    <input type="text" name="name" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#204fb4] focus:ring focus:ring-[#204fb4]/20 transition-all duration-200">
                                </div>

                                <div class="relative">
                                    <label class="text-sm font-medium text-gray-700 mb-1 block">Email Address *</label>
                                    <input type="email" name="email" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#204fb4] focus:ring focus:ring-[#204fb4]/20 transition-all duration-200">
                                </div>

                                <div class="relative">
                                    <label class="text-sm font-medium text-gray-700 mb-1 block">Primary Phone *</label>
                                    <input type="tel" name="callback_phone" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#204fb4] focus:ring focus:ring-[#204fb4]/20 transition-all duration-200">
                                </div>

                                <div class="relative">
                                    <label class="text-sm font-medium text-gray-700 mb-1 block">Time Zone *</label>
                                    <input type="text" name="timezone" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#204fb4] focus:ring focus:ring-[#204fb4]/20 transition-all duration-200">
                                </div>

                                <div class="relative">
                                    <label class="text-sm font-medium text-gray-700 mb-1 block">Local Contact (During Stay) *</label>
                                    <input type="tel" name="oahu_phone" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#204fb4] focus:ring focus:ring-[#204fb4]/20 transition-all duration-200">
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
                                    <select name="package" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#204fb4] focus:ring focus:ring-[#204fb4]/20 transition-all duration-200">
                                        <option value="">Choose your adventure</option>
                                        <option value="intro">Open Cockpit Weight Shift Trike - CA$229 (30 min)</option>
                                        <option value="basic">Fixed Wing Advanced Ultralight - CA$199 (30 min)</option>
                                    </select>
                                </div>

                                <div class="relative">
                                    <label class="text-sm font-medium text-gray-700 mb-1 block">Participant Details *</label>
                                    <textarea name="flyer_details" required rows="3" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#204fb4] focus:ring focus:ring-[#204fb4]/20 transition-all duration-200" placeholder="List each participant's name and weight"></textarea>
                                </div>

                                <div class="relative">
                                    <label class="text-sm font-medium text-gray-700 mb-1 block">Under 18 Participants</label>
                                    <textarea name="underage_flyers" rows="2" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#204fb4] focus:ring focus:ring-[#204fb4]/20 transition-all duration-200" placeholder="List names of participants under 18"></textarea>
                                </div>

                                <div class="relative">
                                    <label class="text-sm font-medium text-gray-700 mb-1 block">Preferred Dates *</label>
                                    <input type="text" name="preferred_dates" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#204fb4] focus:ring focus:ring-[#204fb4]/20 transition-all duration-200">
                                </div>

                                <div class="relative">
                                    <label class="text-sm font-medium text-gray-700 mb-1 block">Sunrise Flight Option *</label>
                                    <select name="sunrise_flight" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#204fb4] focus:ring focus:ring-[#204fb4]/20 transition-all duration-200">
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
                                <input type="checkbox" name="waiver" class="mt-1 h-4 w-4 text-[#204fb4] focus:ring-[#204fb4]/20 border-gray-300 rounded">
                                <label class="ml-3 text-sm text-gray-700">
                                    I accept the <a href="{{ route('waiver') }}" target="_blank" class="text-[#204fb4] hover:text-blue-700 underline">liability waiver</a> and understand the risks involved.
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