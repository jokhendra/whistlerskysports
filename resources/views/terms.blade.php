@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8 mt-16">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="bg-gradient-to-r from-sky-800 via-blue-700 to-indigo-800 p-8">
                <h1 class="text-3xl font-bold text-white">Terms and Conditions</h1>
                <p class="text-sky-100 mt-2">Last updated: {{ date('F d, Y') }}</p>
            </div>
            
            <div class="p-8">
                <div class="space-y-6 text-gray-700">
                    <p>By booking a session with WhistlerSkySports, you agree to the following terms and conditions:</p>
                    
                    <section>
                        <h2 class="text-xl font-semibold text-gray-900 mb-3">1. Booking and Payment</h2>
                        <ul class="list-disc pl-6 space-y-2">
                            <li>All bookings require a deposit to secure your spot</li>
                            <li>Full payment is required 24 hours before your scheduled session</li>
                            <li>Prices are subject to change without notice</li>
                        </ul>
                    </section>
                    
                    <section>
                        <h2 class="text-xl font-semibold text-gray-900 mb-3">2. Cancellation Policy</h2>
                        <ul class="list-disc pl-6 space-y-2">
                            <li>Cancellations made 48 hours or more before the scheduled session will receive a full refund</li>
                            <li>Cancellations made within 48 hours of the scheduled session will be charged 50% of the total fee</li>
                            <li>No-shows will be charged the full amount</li>
                        </ul>
                    </section>
                    
                    <section>
                        <h2 class="text-xl font-semibold text-gray-900 mb-3">3. Weather Conditions</h2>
                        <ul class="list-disc pl-6 space-y-2">
                            <li>Sessions are weather-dependent</li>
                            <li>We reserve the right to cancel or reschedule sessions due to unsafe weather conditions</li>
                            <li>In case of weather-related cancellation, you will be offered a rescheduled session or full refund</li>
                        </ul>
                    </section>
                    
                    <section>
                        <h2 class="text-xl font-semibold text-gray-900 mb-3">4. Safety Requirements</h2>
                        <ul class="list-disc pl-6 space-y-2">
                            <li>All participants must be at least 18 years old</li>
                            <li>Participants must be in good physical condition</li>
                            <li>Weight restrictions apply (maximum 245 lbs)</li>
                            <li>No alcohol consumption 24 hours before the session</li>
                        </ul>
                    </section>
                    
                    <section>
                        <h2 class="text-xl font-semibold text-gray-900 mb-3">5. Equipment and Training</h2>
                        <ul class="list-disc pl-6 space-y-2">
                            <li>All equipment is provided by WhistlerSkySports</li>
                            <li>Participants must follow all safety instructions and guidelines</li>
                            <li>Training sessions are required for all first-time participants</li>
                        </ul>
                    </section>
                    
                    <section>
                        <h2 class="text-xl font-semibold text-gray-900 mb-3">6. Liability and Insurance</h2>
                        <ul class="list-disc pl-6 space-y-2">
                            <li>All participants must sign a liability waiver</li>
                            <li>Personal insurance is recommended but not required</li>
                            <li>WhistlerSkySports is not responsible for personal injury or property damage</li>
                        </ul>
                    </section>
                    
                    <section>
                        <h2 class="text-xl font-semibold text-gray-900 mb-3">7. Photography and Media</h2>
                        <ul class="list-disc pl-6 space-y-2">
                            <li>We may take photos and videos during sessions</li>
                            <li>By participating, you consent to the use of these materials for marketing purposes</li>
                            <li>Personal photography is allowed but must not interfere with the session</li>
                        </ul>
                    </section>
                </div>

                <div class="mt-8 flex justify-center space-x-4">
                    <a href="{{ url()->previous() }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg transition duration-300">
                        Back to Booking
                    </a>
                    <button onclick="markAsRead()" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-6 rounded-lg transition duration-300">
                        I Have Read the Terms
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Function to detect if user has scrolled to bottom
    function hasReadContent() {
        const scrollPosition = window.scrollY + window.innerHeight;
        const documentHeight = document.documentElement.scrollHeight;
        return scrollPosition >= documentHeight - 100; // Within 100px of bottom
    }

    // Function to mark terms as read
    function markAsRead() {
        if (hasReadContent()) {
            window.opener.postMessage('terms-read', '*');
            alert('Thank you for reading the terms. You can now return to the booking form and check the terms checkbox.');
        } else {
            alert('Please scroll through and read the entire terms and conditions before marking as read.');
        }
    }

    // Optional: Auto-detect when user has scrolled to bottom
    window.addEventListener('scroll', function() {
        if (hasReadContent()) {
            // You could show a message or enable the "I Have Read" button here
        }
    });
</script>
@endsection 