@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8 mt-16">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="bg-gradient-to-r from-sky-800 via-blue-700 to-indigo-800 p-8">
                <h1 class="text-3xl font-bold text-white">Liability Waiver</h1>
                <p class="text-sky-100 mt-2">Last updated: {{ date('F d, Y') }}</p>
            </div>
            
            <div class="p-8">
                <div class="space-y-6 text-gray-700">
                    <p>In consideration for the renting, purchasing or leasing of Weight Shift Control Special Light Sport Aircraft (hereinafter collectively called "WSC Aircraft") from WhistlerSkySports and or utilizing the facilities, ground school, instruction, premises, and equipment of WhistlerSkySports in engaging in WSC Aircraft ground instruction, flight instruction and related activities, I hereby understand and agree to this Release of Liability, Waiver of Legal Rights, Assumption of Risk and Declaration of Fitness and to the terms hereof as follows:</p>
                    
                    <section>
                        <h2 class="text-xl font-semibold text-gray-900 mb-3">1. Understanding of Document</h2>
                        <p>I understand that this is a long and important legal document that can affect my legal rights and that I must read and understand every word of it before participating in Aviation activities.</p>
                    </section>
                    
                    <section>
                        <h2 class="text-xl font-semibold text-gray-900 mb-3">2. Acknowledgment of Risks</h2>
                        <p>I acknowledge that Aviation is an action sport and recreational activity involving travel in three dimensions and such activity is subject to mishap and even injury to participants. I understand I may suffer a broken limb, paralysis, or fatal injury while participating in Aviation activities.</p>
                    </section>
                    
                    <section>
                        <h2 class="text-xl font-semibold text-gray-900 mb-3">3. Equipment Warranty</h2>
                        <p>I further acknowledge that there are no warranties applicable to my purchasing, renting or leasing of WSC Aircraft and that all warranties, whether expressed or implied are excluded. THERE IS NO WARRANTY OF MERCHANTABILITY OR THAT THE SAID WSC AIRCRAFT IS FIT FOR ANY PURPOSE and that I am accepting the said WSC AIRCRAFT as is and I hereby acknowledge that I will personally examine the said WSC AIRCRAFT prior to my using the same.</p>
                    </section>
                    
                    <section>
                        <h2 class="text-xl font-semibold text-gray-900 mb-3">4. Assumption of Risk</h2>
                        <p>I understand and acknowledge that Aviation activities involve inherent risks and dangers of serious bodily injury, including permanent disability, paralysis, and death. I voluntarily assume all risks and dangers associated with participating in Aviation activities.</p>
                    </section>
                    
                    <section>
                        <h2 class="text-xl font-semibold text-gray-900 mb-3">5. Release of Liability</h2>
                        <p>I hereby release, discharge, and agree not to sue WhistlerSkySports, its officers, directors, employees, agents, and contractors from any and all liability, claims, demands, or causes of action that I may hereafter have for injuries and damages arising out of my participation in Aviation activities.</p>
                    </section>
                    
                    <section>
                        <h2 class="text-xl font-semibold text-gray-900 mb-3">6. Medical Declaration</h2>
                        <p>I declare that I am physically fit and have no medical conditions that would prevent me from participating in Aviation activities. I understand that I should consult with a physician before participating in any physical activity.</p>
                    </section>
                </div>

                <div class="mt-8 flex justify-center space-x-4">
                    <a href="{{ url()->previous() }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg transition duration-300">
                        Back to Booking
                    </a>
                    <button onclick="markAsRead()" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-6 rounded-lg transition duration-300">
                        I Have Read the Waiver
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

    // Function to mark waiver as read
    function markAsRead() {
        if (hasReadContent()) {
            window.opener.postMessage('waiver-read', '*');
            alert('Thank you for reading the waiver. You can now return to the booking form and check the waiver checkbox.');
        } else {
            alert('Please scroll through and read the entire waiver before marking as read.');
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