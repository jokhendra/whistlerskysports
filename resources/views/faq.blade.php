@extends('layouts.app')

@push('styles')
<style>
    /* FAQ Item Transitions */
    .faq-answer {
        transition: all 0.3s ease-in-out;
        overflow: hidden;
        max-height: 0;
        opacity: 0;
    }

    .faq-answer.active {
        max-height: 1000px;
        opacity: 1;
        padding: 1.5rem;
    }

    .faq-icon {
        transition: transform 0.3s ease;
    }

    .faq-icon.rotate {
        transform: rotate(180deg);
    }

    /* Hover Effects */
    .faq-button:hover {
        background-color: #f8fafc;
    }

    .faq-button:focus {
        outline: 2px solid #3b82f6;
        outline-offset: -2px;
    }

    /* List Styling */
    .faq-list {
        list-style-type: disc;
        margin-left: 1.25rem;
    }

    .faq-list li {
        margin-bottom: 0.5rem;
    }
</style>
@endpush

@section('content')
<div class="bg-gray-50 py-16 mt-16">
    <div class="container mx-auto px-4">
      <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-blue-900">Frequently Asked Questions</h2>
        <p class="text-lg text-gray-600 mt-4">Find answers to common questions about our power hang gliders</p>
      </div>
      
      <div class="max-w-3xl mx-auto">
        <div class="space-y-6">
          <!-- FAQ Item 1 -->
          <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <button class="faq-button flex justify-between items-center w-full px-6 py-4 text-lg font-medium text-left text-blue-800 focus:outline-none">
              <span>How do I schedule a test flight?</span>
              <svg class="faq-icon h-5 w-5 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </button>
            <div class="faq-answer px-6 text-gray-600">
              <p>To schedule an introductory flight lesson, please fill out our contact form and our team will get back to you within 24 hours to confirm your appointment.</p>
            </div>
          </div>
          
          <!-- FAQ Item 2 -->
          <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <button class="faq-button flex justify-between items-center w-full px-6 py-4 text-lg font-medium text-left text-blue-800 focus:outline-none">
              <span>What training is required to fly an ultralight?</span>
              <svg class="faq-icon h-5 w-5 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </button>
            <div class="faq-answer px-6 text-gray-600">
              <p>An ultralight has two categories of aircraft; Basic and Advanced ultralight. You need proper training and certification to fly an ultralight in Canada. In particular, one needs a minimum of 20 hours of ground school and a minimum of 10 hours of flying experience with at least two hours being solo and 5 hours with a Transport Canada certified flight instructor. You need a Category 4 medical, self declaration to start the process.</p>
            </div>
          </div>
          
          <!-- FAQ Item 4 -->
          <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <button class="faq-button flex justify-between items-center w-full px-6 py-4 text-lg font-medium text-left text-blue-800 focus:outline-none">
              <span>What maintenance is required on an Ultralight aircraft?</span>
              <svg class="faq-icon h-5 w-5 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </button>
              <div class="faq-answer px-6 text-gray-600">
                <p>Regular maintenance is essential for safe flying. Our Ultralight aircraft require engine maintenance every 25/50/100 hours of flight time, and preflight and post flight checks are required to be undertaken. At Wss, we believe in planned preventive maintenance rather than breakdown maintenance. Speak to our instructor to know more about how to take care of your ultralight.</p>
            </div>
          </div>

          <!-- FAQ Item 5 -->
          <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <button class="faq-button flex justify-between items-center w-full px-6 py-4 text-lg font-medium text-left text-blue-800 focus:outline-none">
              <span>Is it OK if I have a beer/joint before introductory flight lesson?</span>
              <svg class="faq-icon h-5 w-5 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </button>
            <div class="faq-answer px-6 text-gray-600">
              <p>Absolutely NOT. You cannot have any alcohol, cannabis or illegal substances in your system at least 12 hours prior to your flight lessons. It dangerously impairs your ability to maneuver or learn to fly and we strictly do not allow any such use.  Please do not consume any of these the day of your flight or you will not be allowed to board the plane. Whistler Sky Sports reserves the right to refuse service to any passenger that may compromise safety. The use of drugs or alcohol prior to a flight is not permitted and will result in cancellation and no refund will be given.</p>
            </div>
          </div>
          
          <!-- FAQ Item 6 -->
          
          <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <button class="faq-button flex justify-between items-center w-full px-6 py-4 text-lg font-medium text-left text-blue-800 focus:outline-none">
              <span>Can I use my own camera on the flight?</span>
              <svg class="faq-icon h-5 w-5 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </button>
            <div class="faq-answer px-6 text-gray-600">
              <p>For your safety and for those below, cameras are only permitted to be carried in flight by the certified flight instructor. We offer options where we can take pictures/video for you during your flight. You must not carry any loose items in your pocket or unsecured foot wear. Mobile phones and cameras are strictly prohibited by students especially as it distracts the student from the flight lesson itself.</p>
            </div>
          </div>

          <!-- FAQ Item 7 -->
          <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <button class="faq-button flex justify-between items-center w-full px-6 py-4 text-lg font-medium text-left text-blue-800 focus:outline-none">
              <span>What time should I arrive?</span>
              <svg class="faq-icon h-5 w-5 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </button>
            <div class="faq-answer px-6 text-gray-600">
              <p>The time listed on your booking is your Check In Time. Please arrive at that time.</p>
            </div>
          </div>

          <!-- FAQ Item 8 -->
          <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <button class="faq-button flex justify-between items-center w-full px-6 py-4 text-lg font-medium text-left text-blue-800 focus:outline-none">
              <span>Do I need to book ahead of time?</span>
              <svg class="faq-icon h-5 w-5 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </button>
            <div class="faq-answer px-6 text-gray-600">
              <p>Bookings are strongly recommended, we have a limited number of spaces each day depending upon weather.</p>
            </div>
          </div>

          <!-- FAQ Item 9 -->
          <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <button class="faq-button flex justify-between items-center w-full px-6 py-4 text-lg font-medium text-left text-blue-800 focus:outline-none">
              <span>What kind of facilities do you have?</span>
              <svg class="faq-icon h-5 w-5 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </button>
            <div class="faq-answer px-6 text-gray-600">
              <p>We are located in a small town at a small airport, space is limited but we have a comfortable seating/viewing area to enjoy the day from. If you are coming with a large entourage, there is a beautiful park located next to our hangar for additional shaded space and picnic tables.</p>
            </div>
          </div>

          <!-- FAQ Item 10 -->
          <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <button class="faq-button flex justify-between items-center w-full px-6 py-4 text-lg font-medium text-left text-blue-800 focus:outline-none">
              <span>Is food available on site?</span>
              <svg class="faq-icon h-5 w-5 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </button>
            <div class="faq-answer px-6 text-gray-600">
              <p>There are no restaurants at the airport but there are some nearby. Feel free to bring snacks or stop by the Sunstone Golf Course afterwards for a tasty lunch. Ask the crew for local recommendations to some of the area's best food hotspots.</p>
            </div>
          </div>

          <!-- FAQ Item 11 -->

          <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <button class="faq-button flex justify-between items-center w-full px-6 py-4 text-lg font-medium text-left text-blue-800 focus:outline-none">
              <span>What is your cancellation policy?</span>
              <svg class="faq-icon h-5 w-5 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </button>
            <div class="faq-answer px-6 text-gray-600">
              <p>Cancellations are acceptable and will be refunded if made with a minimum of 48 hours notice prior to Flight lesson. Cancellations made with less time than the notice period will be subject to penalty (50% of booking). <strong>No refunds will be given for cancellations made in flight.</strong> Alcohol and drugs are not permitted on site; any consumption on the day of the flight prior to departure will result in a refusal to board and be treated as a cancellation. <strong>No refund will be given.</strong> Refunds will be made in the same method of payment and at the same location of payment.</p>
            </div>
          </div>

          <!-- FAQ Item 12 -->
          <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <button class="faq-button flex justify-between items-center w-full px-6 py-4 text-lg font-medium text-left text-blue-800 focus:outline-none">
              <span>What kind of facilities do you have?</span>
              <svg class="faq-icon h-5 w-5 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </button>
            <div class="faq-answer px-6 text-gray-600">
              <p>We are located in a small town at a small airport, space is limited but we have a comfortable seating/viewing area to enjoy the day from. If you are coming with a large entourage, there is a beautiful park located next to our hangar for additional shaded space and picnic tables.</p>
            </div>
          </div>

          <!-- FAQ Item 13 -->
          <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <button class="faq-button flex justify-between items-center w-full px-6 py-4 text-lg font-medium text-left text-blue-800 focus:outline-none">
              <span>Thing to Carry</span>
              <svg class="faq-icon h-5 w-5 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </button>
            <div class="faq-answer px-6 text-gray-600">
              <p>Sunscreen & Sunglasses</p>
              <p>Snacks</p>
              <p>Valid ID (Passport, Driver's License, etc.)</p>
              <p>Booking Email Confirmation</p>
            </div>
          </div>

          <!-- FAQ Item 14 -->
          <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <button class="faq-button flex justify-between items-center w-full px-6 py-4 text-lg font-medium text-left text-blue-800 focus:outline-none">
              <span>What is Empty Weight, AUW, MAUW & Useful Load?</span>
              <svg class="faq-icon h-5 w-5 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </button>
            <div class="faq-answer px-6 text-gray-600">
              <p><strong>Empty Weight:</strong> This is the weight of the aeroplane alone, with no pilot, passenger, fuel, or cargo. It includes the airframe, engine, and fixed equipment. For instance, an ultra-light with an empty weight of 300 kg needs to stay under 544 kg when loaded with people and fuel.</p>
              <p><strong>AUW (All-Up Weight):</strong> This is the total weight of the aeroplane at any given moment, including the empty weight, pilot, passenger (if allowed), fuel, and any cargo. It's what the plane weighs when ready to fly, and it must not exceed the maximum allowed weight for safety.</p>
              <p><strong>Gross Weight / MAUW (Maximum All-Up Weight):</strong> This is the highest weight an aeroplane is certified to take off with, as set by the manufacturer and approved by Transport Canada. For ultra-lights, it's typically 544 kg (1,200 pounds) for both basic (BULA) and advanced (AULA) categories. It's the upper limit of AUW to ensure safe operation.</p>
              <p><strong>Useful Load:</strong> This is the weight available for the pilot, passenger, fuel, and any baggage after accounting for the empty weight. For example, if an advanced ultra-light has an empty weight of 300 kg, its useful load is 244 kg (544 kg MAUW minus 300 kg). Advanced ultra-lights (AULAs) must also meet a minimum useful load formula: 175 + (P/2) pounds, where P is engine horsepower.</p>
            </div>
          </div>

          <!-- FAQ Item 15 -->
          <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <button class="faq-button flex justify-between items-center w-full px-6 py-4 text-lg font-medium text-left text-blue-800 focus:outline-none">
              <span>What is an UL & AUL?</span>
              <svg class="faq-icon h-5 w-5 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </button>
            <div class="faq-answer px-6 text-gray-600">
              <p>In Canada, an ultralight aeroplane is a lightweight aircraft regulated by Transport Canada under the Canadian Aviation Regulations (CARs), categorized into basic ultra-light aeroplanes (BULA) and advanced ultra-light aeroplanes (AULA).</p>
              <p>A BULA is defined as an aeroplane with no more than two seats, a maximum take-off weight of 544 kg (1,200 pounds), and a stall speed in landing configuration of 39 knots (45 mph) or less.</p>
              <p>An Advanced Ultra-light Aeroplane (AULA), as defined by Transport Canada, is an aeroplane with a maximum of two seats, a maximum take-off weight of 544 kg (1,200 pounds), and a stall speed in landing configuration not exceeding 39 knots (45 mph). It must comply with the Design Standards for Advanced Ultra-light Aeroplanes (DS10141) and meet a minimum useful load requirement of 175 + (P/2) pounds, where P is the engine power in horsepower. Unlike basic ultra-lights, AULAs are approved for carrying passengers with the appropriate pilot endorsement. For more details reach out to Transport Canada's website.</p>
            </div>
          </div>

          <!-- FAQ Item 16 -->
          <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <button class="faq-button flex justify-between items-center w-full px-6 py-4 text-lg font-medium text-left text-blue-800 focus:outline-none">
              <span>What Aircraft is covered and what is not covered?</span>
              <svg class="faq-icon h-5 w-5 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </button>
            <div class="faq-answer px-6 text-gray-600">
              <p>Types of ultralight aircraft include fixed-wing aeroplanes, open cockpit weight-shift control trikes and powered paragliders and parachutes, but rotary-wing aircraft like gyroplanes are explicitly excluded from the AULA category. Gyroplanes are not considered ultralights in Canada and require a separate pilot permit and cannot be registered as ultralights.</p>
            </div>
          </div>

          <!-- FAQ Item 17 -->
          <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <button class="faq-button flex justify-between items-center w-full px-6 py-4 text-lg font-medium text-left text-blue-800 focus:outline-none">
              <span>Do I need a new pilot permit to fly a BULA or AULA if I already have a Private Pilot Licence (PPL) or higher?</span>
              <svg class="faq-icon h-5 w-5 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </button>
            <div class="faq-answer px-6 text-gray-600">
              <p>If you hold a valid Private Pilot Licence (PPL), Recreational Pilot Permit (RPP), or higher aeroplane licence issued by Transport Canada, you can fly both BULA and AULA without needing an additional Ultra-light Pilot Permit. However, a thorough checkout with an instructor familiar with ultra-lights is strongly recommended due to their unique handling characteristics. For AULA, you can carry a passenger without further endorsement, but for BULA, passenger carrying is restricted unless the passenger is another pilot or a student under training.</p>
            </div>
          </div>

          <!-- FAQ Item 18 -->
          <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <button class="faq-button flex justify-between items-center w-full px-6 py-4 text-lg font-medium text-left text-blue-800 focus:outline-none">
              <span>What training is recommended for transitioning to ultra-lights from heavier aircraft?</span>
              <svg class="faq-icon h-5 w-5 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </button>
            <div class="faq-answer px-6 text-gray-600">
              <p>Even with a PPL or higher, transitioning pilots should seek transition training with an instructor experienced in ultra-lights. Ultra-lights have lighter weight, slower speeds, and different handling (e.g., more rudder use, less yaw stability). Training should cover:</p>
              <ul class="faq-list">
                <li>Familiarization with the specific ultra-light model (e.g., stick and rudder techniques).</li>
                <li>Low-speed flight and stall characteristics.</li>
                <li>Emergency procedures, as ultra-lights lose energy faster than heavier aircraft.</li>
                <li>For AULA, understanding passenger-carrying responsibilities.</li>
              </ul>
              <p class="mt-2">Transport Canada suggests practicing landings with and without power and reviewing the manufacturer's instructions, if available.</p>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const faqButtons = document.querySelectorAll('.faq-button');
        
        faqButtons.forEach(button => {
            button.addEventListener('click', function() {
                const answer = this.nextElementSibling;
                const icon = this.querySelector('.faq-icon');
                const isActive = answer.classList.contains('active');
                
                // Close all other answers
                document.querySelectorAll('.faq-answer').forEach(div => {
                    div.classList.remove('active');
                });
                
                // Reset all icons
                document.querySelectorAll('.faq-icon').forEach(svg => {
                    svg.classList.remove('rotate');
                });
                
                // Toggle current answer if it wasn't active
                if (!isActive) {
                    answer.classList.add('active');
                    icon.classList.add('rotate');
                }
            });
        });
    });
</script>
@endpush 