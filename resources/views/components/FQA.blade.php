@extends('layouts.app')

@section('content')
<div class="bg-gray-50 py-16">
    <div class="container mx-auto px-4">
      <div class="text-center mb-12">
        <h1 class="text-3xl font-bold text-blue-900">Frequently Asked Questions</h1>
        <p class="text-lg text-gray-600 mt-4">Find answers to common questions about our power hang gliders at Whistler Sky Sports</p>
      </div>
      
      <div class="max-w-3xl mx-auto">
        <!-- FAQ Schema.org markup for search engines -->
        <div class="space-y-6" itemscope itemtype="https://schema.org/FAQPage">
          <!-- FAQ Item 1 -->
          <div class="bg-white rounded-lg shadow-md overflow-hidden" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
            <button class="flex justify-between items-center w-full px-6 py-4 text-lg font-medium text-left text-blue-800 focus:outline-none" itemprop="name">
              <span>How do I schedule a test flight?</span>
              <svg class="h-5 w-5 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </button>
            <div class="px-6 py-4 text-gray-600" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
              <div itemprop="text">
                <p>To schedule a test flight, please fill out our contact form with your preferred dates and times. Our team will get back to you within 24 hours to confirm your appointment. Test flights are available for qualified pilots with proper certification.</p>
              </div>
            </div>
          </div>
          
          <!-- FAQ Item 2 -->
          <div class="bg-white rounded-lg shadow-md overflow-hidden" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
            <button class="flex justify-between items-center w-full px-6 py-4 text-lg font-medium text-left text-blue-800 focus:outline-none" itemprop="name">
              <span>What training is required to fly a power hang glider?</span>
              <svg class="h-5 w-5 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </button>
            <div class="px-6 py-4 text-gray-600" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
              <div itemprop="text">
                <p>Power hang gliding requires proper training and certification. We offer comprehensive training programs for beginners through advanced pilots. Our basic training course includes ground school and a minimum of 10 flight hours with a certified instructor.</p>
              </div>
            </div>
          </div>
          
          <!-- FAQ Item 3 -->
          <div class="bg-white rounded-lg shadow-md overflow-hidden" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
            <button class="flex justify-between items-center w-full px-6 py-4 text-lg font-medium text-left text-blue-800 focus:outline-none" itemprop="name">
              <span>Do you offer financing options for your gliders?</span>
              <svg class="h-5 w-5 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </button>
            <div class="px-6 py-4 text-gray-600" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
              <div itemprop="text">
                <p>Yes, we offer several financing options to help make your dream of flying a reality. We partner with trusted financial institutions to provide competitive rates and flexible payment plans. Contact our sales team for more information about current financing promotions.</p>
              </div>
            </div>
          </div>
          
          <!-- FAQ Item 4 -->
          <div class="bg-white rounded-lg shadow-md overflow-hidden" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
            <button class="flex justify-between items-center w-full px-6 py-4 text-lg font-medium text-left text-blue-800 focus:outline-none" itemprop="name">
              <span>What maintenance is required for power hang gliders?</span>
              <svg class="h-5 w-5 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </button>
            <div class="px-6 py-4 text-gray-600" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
              <div itemprop="text">
                <p>Regular maintenance is essential for safe flying. Our power hang gliders require engine maintenance every 50-100 hours of flight time, and sail inspections annually. We provide comprehensive maintenance manuals and offer service packages to keep your aircraft in optimal condition.</p>
              </div>
            </div>
          </div>

          <!-- FAQ Item 5 -->
          <div class="bg-white rounded-lg shadow-md overflow-hidden" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
            <button class="flex justify-between items-center w-full px-6 py-4 text-lg font-medium text-left text-blue-800 focus:outline-none" itemprop="name">
              <span>Is it OK if I have a beer/joint to help me relax before the jump?</span>
              <svg class="h-5 w-5 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </button>
            <div class="px-6 py-4 text-gray-600" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
              <div itemprop="text">
                <p>Absolutely NOT. You cannot have any alcohol, cannabis or illegal substances in your system when you jump. Please do not consume any of these the day of your jump or you will not be allowed to board the plane.

  Whistler Skydiving reserves the right to refuse service to any passenger that may compromise safety. The use of drugs or alcohol prior to a skydive is not permitted and will result in cancellation no refund will be given.</p>
              </div>
            </div>
          </div>
          
          <!-- FAQ Item 6 -->
          <div class="bg-white rounded-lg shadow-md overflow-hidden" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
            <button class="flex justify-between items-center w-full px-6 py-4 text-lg font-medium text-left text-blue-800 focus:outline-none" itemprop="name">
              <span>Can I use my own camera on the jump?</span>
              <svg class="h-5 w-5 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </button>
            <div class="px-6 py-4 text-gray-600" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
              <div itemprop="text">
                <p>For your safety and for those below, cameras are only permitted to be carried in flight by licensed/experienced jumpers. We offer options where we can take pictures/video for you during your skydive.</p>
              </div>
            </div>
          </div>

          <!-- FAQ Item 7 -->
          <div class="bg-white rounded-lg shadow-md overflow-hidden" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
            <button class="flex justify-between items-center w-full px-6 py-4 text-lg font-medium text-left text-blue-800 focus:outline-none" itemprop="name">
              <span>What time should I arrive?</span>
              <svg class="h-5 w-5 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </button>
            <div class="px-6 py-4 text-gray-600" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
              <div itemprop="text">
                <p>The time listed on your booking is your Check In Time. Please arrive at that time.</p>
              </div>
            </div>
          </div>

          <!-- FAQ Item 8 -->
          <div class="bg-white rounded-lg shadow-md overflow-hidden" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
            <button class="flex justify-between items-center w-full px-6 py-4 text-lg font-medium text-left text-blue-800 focus:outline-none" itemprop="name">
              <span>Do I need to book ahead of time?</span>
              <svg class="h-5 w-5 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </button>
            <div class="px-6 py-4 text-gray-600" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
              <div itemprop="text">
                <p>Bookings are strongly recommended, we have a limited number of spaces each day. Up to date availability is displayed on our website.</p>
              </div>
            </div>
          </div>

          <!-- FAQ Item 9 -->
          <div class="bg-white rounded-lg shadow-md overflow-hidden" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
            <button class="flex justify-between items-center w-full px-6 py-4 text-lg font-medium text-left text-blue-800 focus:outline-none" itemprop="name">
              <span>What kind of facilities do you have?</span>
              <svg class="h-5 w-5 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </button>
            <div class="px-6 py-4 text-gray-600" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
              <div itemprop="text">
                <p>We are located in a small town at a small airport, space is limited but we have a comfortable seating/viewing area to enjoy the day from. If you are coming with a large entourage, there is a beautiful park located next to our hangar for additional shaded space and picnic tables.</p>
              </div>
            </div>
          </div>

          <!-- FAQ Item 10 -->
          <div class="bg-white rounded-lg shadow-md overflow-hidden" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
            <button class="flex justify-between items-center w-full px-6 py-4 text-lg font-medium text-left text-blue-800 focus:outline-none" itemprop="name">
              <span>Is food available on site?</span>
              <svg class="h-5 w-5 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </button>
            <div class="px-6 py-4 text-gray-600" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
              <div itemprop="text">
                <p>There are no restaurants at the airport but there are some nearby. Feel free to bring snacks or stop by the Sunstone Golf Course afterwards for a tasty lunch. Ask the crew for local recommendations to some of the area's best food hotspots.</p>
              </div>
            </div>
          </div>

          <!-- FAQ Item 11 -->
          <div class="bg-white rounded-lg shadow-md overflow-hidden" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
            <button class="flex justify-between items-center w-full px-6 py-4 text-lg font-medium text-left text-blue-800 focus:outline-none" itemprop="name">
              <span>What is your cancellation policy?</span>
              <svg class="h-5 w-5 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </button>
            <div class="px-6 py-4 text-gray-600" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
              <div itemprop="text">
                <p>Cancellations are acceptable and will be refunded if made with a minimum of 48 hours notice prior to <strong>jump day</strong> . 
Cancellations made with less time than the notice period will be subject to penalty(50% of booking).
<strong>No refunds will be given for cancellations made in flight.</strong>
Alcohol and drugs are not permitted on site, any consumption on the day of the jump prior to departure will result in a refusal to board and treated as a cancellation. <strong>No refund will be given.</strong>
Refunds will be made in the same method of payment and at the same location of payment.</p>
              </div>
            </div>
          </div>

          <!-- FAQ Item 12 -->
          <div class="bg-white rounded-lg shadow-md overflow-hidden" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
            <button class="flex justify-between items-center w-full px-6 py-4 text-lg font-medium text-left text-blue-800 focus:outline-none" itemprop="name">
              <span>What kind of facilities do you have?</span>
              <svg class="h-5 w-5 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </button>
            <div class="px-6 py-4 text-gray-600" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
              <div itemprop="text">
                <p>We are located in a small town at a small airport, space is limited but we have a comfortable seating/viewing area to enjoy the day from. If you are coming with a large entourage, there is a beautiful park located next to our hangar for additional shaded space and picnic tables.</p>
              </div>
            </div>
          </div>

          <!-- FAQ Item 13 -->
          <div class="bg-white rounded-lg shadow-md overflow-hidden" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
            <button class="flex justify-between items-center w-full px-6 py-4 text-lg font-medium text-left text-blue-800 focus:outline-none" itemprop="name">
              <span>Things to Carry</span>
              <svg class="h-5 w-5 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </button>
            <div class="px-6 py-4 text-gray-600" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
              <div itemprop="text">
                <p>Sunscreen & Sunglasses</p>
                <p>Snacks</p>
                <p>Camera</p>
                <p>Valid ID (Passport, Driver's License, etc.)</p>
                <p>VA Voucher</p>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>


  <!-- Simple JavaScript for FAQ accordion -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const faqButtons = document.querySelectorAll('.bg-white.rounded-lg.shadow-md.overflow-hidden button');
      
      faqButtons.forEach(button => {
        button.addEventListener('click', function() {
          const content = this.nextElementSibling;
          const isVisible = content.style.display !== 'none';
          
          // Hide all FAQ answers
          document.querySelectorAll('.bg-white.rounded-lg.shadow-md.overflow-hidden div.px-6.py-4').forEach(div => {
            div.style.display = 'none';
          });
          
          // Reset all icons
          document.querySelectorAll('.bg-white.rounded-lg.shadow-md.overflow-hidden svg').forEach(svg => {
            svg.classList.remove('transform', 'rotate-180');
          });
          
          // If the clicked item wasn't visible, show it
          if (!isVisible) {
            content.style.display = 'block';
            this.querySelector('svg').classList.add('transform', 'rotate-180');
          }
        });
      });
      
      // Hide all FAQ answers initially
      document.querySelectorAll('.bg-white.rounded-lg.shadow-md.overflow-hidden div.px-6.py-4').forEach(div => {
        div.style.display = 'none';
      });
    });
  </script>

  @endsection