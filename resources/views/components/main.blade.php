<div class="mt-[-15px]">
  <div class="container mx-auto">
    <!-- Hero Section -->
    <div class="py-12 relative overflow-hidden">
      <div class="mountain-bg"></div>
      <div class="clouds"></div>
      <div class="relative z-10">
        <div class="welcome-container">
          <h1 class="welcome-text">Welcome to <span class="company-name">WhistlerSkySports</span></h1>
          <div class="welcome-underline"></div>
        </div>
        <div class="max-w-3xl mx-auto mt-10">
          <div class="modern-tagline">
            <div class="tagline-content">
              <span class="highlight-text">A person who has never flown in a microlight</span> may think of it as an extreme sport, like Skydiving. 
              <span class="accent-text">That's a good thing</span>, however they may have reservations, think it's dangerous so it takes a bit of bravado, 
              maybe imagination and a lot of wanting to show off to friends that they did this thing. 
              <span class="highlight-text">Hence Reach for the Sky</span>. 
              <span class="sub-text">Not sure if Toy Story ever tried to copyright that!</span>
            </div>
            <div class="tagline-decoration"></div>
          </div>
        </div>
      </div>
      
    </div>

    
    
    <!-- Features Section -->
    <div class="">
      <h2 class="text-3xl font-bold text-center text-amber-400">Why Choose WhistlerSkySports?</h2>
      <!-- First Feature -->
      <div class="feature-section flex flex-col md:flex-row items-center">
        <div class="md:w-1/2 feature-image">
          <img src="{{ asset('images/image000000 2.JPG') }}"
               alt="Experienced Pilots" 
               class="w-full h-[400px] object-cover"/>
        </div>
        <div class="md:w-1/2 h-[400px] px-30 flex items-center p-6 feature-content bg-[#f8f8f8]">
          <div>
            <h3 class="text-2xl font-bold mb-4">Experienced Pilots</h3>
            <p class="text-gray-700 text-lg leading-relaxed">Our certified pilots have thousands of flight hours and know the Canadian Rockies like the back of their hand. With years of experience in power hang gliding, they ensure your safety while providing an unforgettable adventure.</p>
          </div>
        </div>
      </div>

      <!-- Second Feature -->
      <div class="feature-section flex flex-col-reverse  md:flex-row items-center">
        <div class="md:w-1/2 h-[400px] px-30 flex items-center p-6 feature-content bg-[#f8f8f8]">
          <div>
            <h3 class="text-2xl font-bold mb-4">Top-Notch Equipment</h3>
            <p class="text-gray-700 text-lg leading-relaxed">We use only the latest power hang gliders with rigorous safety inspections before every flight. Our equipment is maintained to the highest standards, ensuring your safety and comfort throughout your journey.</p>
          </div>
        </div>
        <div class="md:w-1/2 feature-image">
          <img src="{{ asset('images/ecupment.jpg') }}" 
               alt="Top-Notch Equipment" 
               class="w-full h-[400px] object-cover"/>
        </div>
      </div>

      <!-- Third Feature -->
      <div class="feature-section flex flex-col md:flex-row items-center">
        <div class="md:w-1/2 feature-image">
          <img src="{{ asset('images/Airport.jpg') }}" 
               alt="Breathtaking Views" 
               class="w-full h-[400px] object-cover"/>
        </div>
        <div class="md:w-1/2 h-[400px] px-30 flex items-center p-6 feature-content bg-[#f8f8f8]">
          <div>
            <h3 class="text-2xl font-bold mb-4">Breathtaking Views</h3>
            <p class="text-gray-700 text-lg leading-relaxed">Soar over pristine lakes, majestic mountains, and lush forests that only Canada can offer. Experience the stunning beauty of the Canadian Rockies from a unique perspective that few get to witness.</p>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Pricing Section -->
    <div id="pricing" class="pricing-section bg-gradient-to-b from-blue-900/70 via-blue-800/65 to-blue-900/70 backdrop-blur-md py-16 mt-5">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:flex-col sm:align-center">
          <h2 class="text-3xl font-extrabold text-white/95 sm:text-center">Introductory Pricing</h2>
          <p class="mt-5 text-xl text-blue-200/90 sm:text-center">Experience the thrill of power hang gliding with our special promotional offers!</p>
          
          <!-- Promotional Timer -->
          <div class="mt-6 bg-blue-800/40 backdrop-blur-sm rounded-lg p-4 sm:w-fit sm:mx-auto border border-white/20">
            <p class="text-blue-200/90 text-sm">Limited Time Offer Ends In:</p>
            <div class="flex space-x-4 mt-2">
              <div class="flex-1 text-center">
                <span class="text-2xl font-bold text-white/95" id="days">05</span>
                <p class="text-blue-300/90 text-xs">Days</p>
              </div>
              <div class="flex-1 text-center">
                <span class="text-2xl font-bold text-white/95" id="hours">23</span>
                <p class="text-blue-300/90 text-xs">Hours</p>
              </div>
              <div class="flex-1 text-center">
                <span class="text-2xl font-bold text-white/95" id="minutes">59</span>
                <p class="text-blue-300/90 text-xs">Minutes</p>
              </div>
              <div class="flex-1 text-center">
                <span class="text-2xl font-bold text-white/95" id="seconds">59</span>
                <p class="text-blue-300/90 text-xs">Seconds</p>
              </div>
            </div>
          </div>
        </div>

        <div class="mt-12 space-y-4 sm:mt-16 sm:space-y-0 sm:grid sm:grid-cols-2 sm:gap-6 lg:max-w-4xl lg:mx-auto xl:max-w-none xl:mx-0 xl:grid-cols-3">
          <!-- Basic Package -->
          <div class="bg-white/75 backdrop-blur-md border border-white/30 rounded-lg shadow-xl transform hover:scale-105 transition-all duration-300">
            <div class="p-6">
              <h3 class="text-2xl font-semibold text-blue-900">Basic Experience</h3>
              <p class="mt-4 text-gray-500">Perfect for first-time flyers</p>
              <p class="mt-8">
                <span class="text-4xl font-extrabold text-blue-600">$199</span>
                <span class="text-base font-medium text-gray-500">/person</span>
              </p>
              <p class="mt-2 text-sm text-red-600 font-semibold">Save $50 - Limited Time!</p>
              <ul class="mt-6 space-y-4">
                <li class="flex space-x-3">
                  <svg class="flex-shrink-0 h-5 w-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                  </svg>
                  <span class="text-gray-600">30-minute scenic flight</span>
                </li>
                <li class="flex space-x-3">
                  <svg class="flex-shrink-0 h-5 w-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                  </svg>
                  <span class="text-gray-600">Professional instructor</span>
                </li>
                <li class="flex space-x-3">
                  <svg class="flex-shrink-0 h-5 w-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                  </svg>
                  <span class="text-gray-600">Basic maneuvers training</span>
                </li>
              </ul>
              <a href="/booking" class="mt-8 block w-full bg-blue-600 text-white text-center px-6 py-3 rounded-md text-base font-medium hover:bg-blue-700 transition-colors duration-300">
                Book Now
              </a>
            </div>
          </div>

          <!-- Premium Package -->
          <div class="bg-gradient-to-b from-blue-600/75 to-blue-800/75 backdrop-blur-md border border-blue-300/30 rounded-lg shadow-xl transform hover:scale-105 transition-all duration-300">
            <div class="p-6">
              <h3 class="text-2xl font-semibold text-white">Mountain Explorer</h3>
              <p class="mt-4 text-blue-200">Most Popular Choice</p>
              <p class="mt-8">
                <span class="text-4xl font-extrabold text-white">$349</span>
                <span class="text-base font-medium text-blue-200">/person</span>
              </p>
              <p class="mt-2 text-sm text-yellow-300 font-semibold">Save $100 - Best Value!</p>
              <ul class="mt-6 space-y-4">
                <li class="flex space-x-3">
                  <svg class="flex-shrink-0 h-5 w-5 text-blue-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                  </svg>
                  <span class="text-white">1-hour mountain adventure</span>
                </li>
                <li class="flex space-x-3">
                  <svg class="flex-shrink-0 h-5 w-5 text-blue-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                  </svg>
                  <span class="text-white">4K Video & Photos included</span>
                </li>
                <li class="flex space-x-3">
                  <svg class="flex-shrink-0 h-5 w-5 text-blue-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                  </svg>
                  <span class="text-white">Valley & peak exploration</span>
                </li>
                <li class="flex space-x-3">
                  <svg class="flex-shrink-0 h-5 w-5 text-blue-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                  </svg>
                  <span class="text-white">Souvenir package</span>
                </li>
              </ul>
              <a href="/booking" class="mt-8 block w-full bg-white text-blue-600 text-center px-6 py-3 rounded-md text-base font-medium hover:bg-blue-50 transition-colors duration-300">
                Book Now
              </a>
            </div>
          </div>

          <!-- Ultimate Package -->
          <div class="bg-white/75 backdrop-blur-md border border-white/30 rounded-lg shadow-xl transform hover:scale-105 transition-all duration-300">
            <div class="p-6">
              <h3 class="text-2xl font-semibold text-blue-900">Ultimate Experience</h3>
              <p class="mt-4 text-gray-500">For the adventure seekers</p>
              <p class="mt-8">
                <span class="text-4xl font-extrabold text-blue-600">$599</span>
                <span class="text-base font-medium text-gray-500">/person</span>
              </p>
              <p class="mt-2 text-sm text-red-600 font-semibold">Save $150 - Limited Time!</p>
              <ul class="mt-6 space-y-4">
                <li class="flex space-x-3">
                  <svg class="flex-shrink-0 h-5 w-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                  </svg>
                  <span class="text-gray-600">2-hour premium flight</span>
                </li>
                <li class="flex space-x-3">
                  <svg class="flex-shrink-0 h-5 w-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                  </svg>
                  <span class="text-gray-600">4K Video, Photos & Drone footage</span>
                </li>
                <li class="flex space-x-3">
                  <svg class="flex-shrink-0 h-5 w-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                  </svg>
                  <span class="text-gray-600">Advanced maneuvers</span>
                </li>
                <li class="flex space-x-3">
                  <svg class="flex-shrink-0 h-5 w-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                  </svg>
                  <span class="text-gray-600">Luxury souvenir package</span>
                </li>
                <li class="flex space-x-3">
                  <svg class="flex-shrink-0 h-5 w-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                  </svg>
                  <span class="text-gray-600">Priority booking</span>
                </li>
              </ul>
              <a href="/booking" class="mt-8 block w-full bg-blue-600 text-white text-center px-6 py-3 rounded-md text-base font-medium hover:bg-blue-700 transition-colors duration-300">
                Book Now
              </a>
            </div>
          </div>
        </div>

        <!-- Additional Information -->
        <div class="mt-10 text-center">
          <p class="text-blue-200/95 max-w-2xl mx-auto bg-blue-900/30 backdrop-blur-sm p-4 rounded-lg border border-white/10">
            All packages include essential safety equipment and training. Group discounts available for bookings of 4 or more people.
          </p>
          <div class="mt-6">
            <a href="/contact" class="text-blue-200/95 hover:text-white transition-colors duration-300">
              Contact us for group bookings →
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- Add countdown timer JavaScript -->
    <script>
      // Set the date we're counting down to (7 days from now)
      const countDownDate = new Date(Date.now() + 7 * 24 * 60 * 60 * 1000).getTime();

      // Update the countdown every 1 second
      const x = setInterval(function() {
        const now = new Date().getTime();
        const distance = countDownDate - now;

        // Calculate days, hours, minutes and seconds
        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Display the result
        document.getElementById("days").innerHTML = days.toString().padStart(2, '0');
        document.getElementById("hours").innerHTML = hours.toString().padStart(2, '0');
        document.getElementById("minutes").innerHTML = minutes.toString().padStart(2, '0');
        document.getElementById("seconds").innerHTML = seconds.toString().padStart(2, '0');

        // If the countdown is finished, display expired message
        if (distance < 0) {
          clearInterval(x);
          document.getElementById("countdown").innerHTML = "OFFER EXPIRED";
        }
      }, 1000);
    </script>

    <div class="relative h-96 overflow-hidden mb-5 mt-5">
        <img src="{{ asset('images/hero-section.png') }}" alt="Hang gliding over mountains" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-r from-blue-900/70 to-transparent flex items-center">
          <div class="text-white p-8">
            <h2 class="text-3xl font-bold mb-4">Soar Above the Rockies</h2>
            <p class="text-xl mb-6">Book your adventure today and experience WhistlerSkySports from a whole new perspective</p>
            <a href="/booking" class="bg-yellow-500 hover:bg-yellow-600 text-blue-900 font-bold py-3 px-6 rounded-lg transition duration-300 relative group">
                <span class="animate-text-on-hover">Book Your Million Dollar Smile</span>
                <svg class="absolute inset-0 w-full h-full">
                    <rect class="border-animation" x="0" y="0" width="100%" height="100%" fill="none" stroke="#1e40af" stroke-width="2"/>
                </svg>
            </a>
          </div>
        </div>
      </div>
    
    <!-- Power Hang Gliding Technology -->
    <!-- <div class="py-12">
      <h2 class="text-3xl font-bold text-center mb-12">Our Power Hang Gliding Technology</h2>
      
      <div class="grid md:grid-cols-2 gap-12">
        <div>
          <img src="https://images.unsplash.com/photo-1534481016308-0fca71578ae5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=600&h=400&q=80" 
               alt="Power Hang Glider Engine" 
               class="w-full h-64 object-cover rounded-lg shadow-lg mb-6">
          <h3 class="text-2xl font-bold mb-3">Advanced Propulsion Systems</h3>
          <p class="text-gray-700">Our power hang gliders feature state-of-the-art engines specifically designed for the Canadian climate. These lightweight yet powerful motors provide reliable thrust even at high altitudes in the Rockies, with fuel efficiency that allows for extended flight times.</p>
          <ul class="mt-4 space-y-2 text-gray-700">
            <li class="flex items-center">
              <svg class="h-5 w-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
              </svg>
              Rotax 582 UL DCDI engines with 65 HP
            </li>
            <li class="flex items-center">
              <svg class="h-5 w-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
              </svg>
              Cold-weather optimized for Canadian conditions
            </li>
            <li class="flex items-center">
              <svg class="h-5 w-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
              </svg>
              Noise reduction technology for peaceful flights
            </li>
          </ul>
        </div>
        
        <div>
          <img src="https://images.unsplash.com/photo-1452421822248-d4c2b47f0c81?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=600&h=400&q=80" 
               alt="Power Hang Glider Wing" 
               class="w-full h-64 object-cover rounded-lg shadow-lg mb-6">
          <h3 class="text-2xl font-bold mb-3">Cutting-Edge Wing Design</h3>
          <p class="text-gray-700">Our wings are engineered for maximum stability and control in the variable mountain air currents of the Canadian Rockies. The advanced aerodynamic profiles provide exceptional lift and glide ratios, allowing for both thrilling maneuvers and gentle cruising.</p>
          <ul class="mt-4 space-y-2 text-gray-700">
            <li class="flex items-center">
              <svg class="h-5 w-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
              </svg>
              Composite carbon fiber frame for strength and flexibility
            </li>
            <li class="flex items-center">
              <svg class="h-5 w-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
              </svg>
              Specialized sail material resistant to UV and moisture
            </li>
            <li class="flex items-center">
              <svg class="h-5 w-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
              </svg>
              Quick-fold technology for easy transport to remote locations
            </li>
          </ul>
        </div>
      </div>
      
      <div class="mt-12 bg-blue-100 p-6 rounded-lg">
        <h3 class="text-xl font-bold mb-3">Safety Features</h3>
        <p class="text-gray-700 mb-4">At Alpine Air Adventures, safety is our top priority. Our power hang gliders are equipped with multiple redundant safety systems designed specifically for the challenging conditions of the Canadian Rockies:</p>
        <div class="grid md:grid-cols-3 gap-4">
          <div class="bg-white p-4 rounded-lg shadow">
            <h4 class="font-bold mb-2">Emergency Parachute Systems</h4>
            <p class="text-sm text-gray-600">Whole-aircraft rescue systems that can safely lower both glider and passengers to the ground in case of emergency.</p>
          </div>
          <div class="bg-white p-4 rounded-lg shadow">
            <h4 class="font-bold mb-2">GPS Navigation</h4>
            <p class="text-sm text-gray-600">Advanced GPS systems with Canadian topographical maps to ensure pilots always know their exact location.</p>
          </div>
          <div class="bg-white p-4 rounded-lg shadow">
            <h4 class="font-bold mb-2">Weather Monitoring</h4>
            <p class="text-sm text-gray-600">Real-time weather data systems to track changing conditions in the mountains.</p>
          </div>
        </div>
      </div>
    </div> -->
    
    <!-- Call to Action -->
    <!-- <div id="book-now" class="py-12 bg-blue-900 text-white rounded-xl p-8 my-12">
      <div class="text-center">
        <h2 class="text-3xl font-bold mb-4">Ready for Your Canadian Adventure?</h2>
        <p class="text-xl mb-8">Book your power hang gliding experience today and create memories that will last a lifetime.</p>
        <div class="flex flex-col md:flex-row justify-center gap-4">
          <a href="/contact" class="bg-yellow-500 hover:bg-yellow-600 text-blue-900 font-bold py-3 px-6 rounded-lg transition duration-300">
            Book Now
          </a>
          <a href="/gallery" class="bg-transparent border-2 border-white hover:bg-white hover:text-blue-900 text-white font-bold py-3 px-6 rounded-lg transition duration-300">
            View Gallery
          </a>
        </div>
      </div>
    </div> -->
    
    <!-- Canadian Weather Notice -->
    <!-- <div class="bg-blue-50 p-6 rounded-lg mb-12">
      <h3 class="text-xl font-bold mb-2">Canadian Weather Advisory</h3>
      <p class="text-gray-700">Please note that all flights are weather-dependent. The Canadian Rockies can experience rapid weather changes, especially during spring and fall. We prioritize your safety and will reschedule if conditions are not optimal.</p>
      <p class="text-gray-700 mt-2">All prices are in Canadian Dollars (CAD) and include applicable taxes.</p>
    </div> -->
  </div>
</div>

<style>
@import url('https://fonts.googleapis.com/css2?family=Rock+Salt&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');

.mountain-bg {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(180deg, #005CBB 0%, #004a96 50%, #003b7a 100%);
    z-index: 0;
}

.mountain-bg::before {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 100%;
    background-image: 
        linear-gradient(to right, #004a96 0%, #004a96 20%, transparent 20%),
        linear-gradient(to right, #004a96 40%, #004a96 60%, transparent 60%),
        linear-gradient(to right, #004a96 80%, #004a96 100%, transparent 100%);
    background-size: 100% 100%;
    background-position: 0 0;
    clip-path: polygon(0 100%, 100% 100%, 100% 50%, 75% 30%, 50% 50%, 25% 30%, 0 50%);
    opacity: 0.3;
}

.clouds {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-image: 
        radial-gradient(circle at 20% 20%, rgba(255,255,255,0.1) 0%, transparent 50%),
        radial-gradient(circle at 80% 80%, rgba(255,255,255,0.1) 0%, transparent 50%),
        radial-gradient(circle at 50% 50%, rgba(255,255,255,0.1) 0%, transparent 50%);
    animation: cloud-drift 30s linear infinite;
}

@keyframes cloud-drift {
    0% {
        background-position: 0% 0%;
    }
    100% {
        background-position: 100% 100%;
    }
}

.rocky-ice-text {
    font-family: 'Rock Salt', cursive;
    background: linear-gradient(135deg, #ffffff 0%, #e0e0e0 50%, #ffffff 100%);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
    text-shadow: 
        0 0 10px rgba(255, 255, 255, 0.8),
        0 0 20px rgba(255, 255, 255, 0.8),
        0 0 30px rgba(255, 255, 255, 0.8),
        0 0 40px rgba(255, 255, 255, 0.8);
    animation: ice-shine 3s infinite;
    letter-spacing: 2px;
    position: relative;
}

.modern-tagline {
    position: relative;
    padding: 2rem;
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    border-radius: 1rem;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
    border: 1px solid rgba(255, 255, 255, 0.2);
    overflow: hidden;
}

.tagline-content {
    font-family: 'Poppins', sans-serif;
    font-size: 1.1rem;
    line-height: 1.8;
    color: #ffffff;
    position: relative;
    z-index: 1;
}

.highlight-text {
    color: #FED600;
    font-weight: 600;
    position: relative;
    display: inline-block;
}

.highlight-text::after {
    content: '';
    position: absolute;
    bottom: -2px;
    left: 0;
    width: 100%;
    height: 2px;
    background: linear-gradient(90deg, #FED600, transparent);
    transform: scaleX(0);
    transform-origin: left;
    transition: transform 0.3s ease;
}

.highlight-text:hover::after {
    transform: scaleX(1);
}

.accent-text {
    color: #FED600;
    font-style: italic;
    font-weight: 500;
}

.sub-text {
    color: #e2e8f0;
    font-size: 0.95rem;
}

.tagline-decoration {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(254, 214, 0, 0.1), rgba(0, 92, 187, 0.1));
    z-index: 0;
}

.tagline-decoration::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
    animation: rotate 20s linear infinite;
}

@keyframes rotate {
    from {
        transform: rotate(0deg);
    }
    to {
        transform: rotate(360deg);
    }
}

@keyframes ice-shine {
    0% {
        background-position: 0% 50%;
    }
    50% {
        background-position: 100% 50%;
    }
    100% {
        background-position: 0% 50%;
    }
}

.animate-text-on-hover {
    position: relative;
    z-index: 1;
}

.border-animation {
    stroke-dasharray: 150 480;
    stroke-dashoffset: 150;
    transition: 1s ease-in-out;
}

.group:hover .border-animation {
    stroke-dashoffset: -480;
}

/* Animation Classes */
.animate-fade-in-left {
  animation: fadeInLeft 1s ease-out forwards;
}

.animate-fade-in-right {
  animation: fadeInRight 1s ease-out forwards;
}

@keyframes fadeInLeft {
  from {
    opacity: 0;
    transform: translateX(-50px);
  }
  to {
    opacity: 1;
    transform: translateX(0);
  }
}

@keyframes fadeInRight {
  from {
    opacity: 0;
    transform: translateX(50px);
  }
  to {
    opacity: 1;
    transform: translateX(0);
  }
}

/* Feature Animation Styles */
.feature-section {
  opacity: 0;
  transform: translateY(30px);
  transition: all 0.8s ease-out;
}

.feature-section.visible {
  opacity: 1;
  transform: translateY(0);
}

.feature-image {
  opacity: 0;
  transform: translateX(-50px);
  transition: all 0.8s ease-out 0.3s;
}

.feature-content {
  opacity: 0;
  transform: translateX(50px);
  transition: all 0.8s ease-out 0.3s;
}

.feature-section.visible .feature-image,
.feature-section.visible .feature-content {
  opacity: 1;
  transform: translateX(0);
}

/* Reverse animation for even sections */
.feature-section:nth-child(even) .feature-image {
  transform: translateX(50px);
}

.feature-section:nth-child(even) .feature-content {
  transform: translateX(-50px);
}

.feature-section:nth-child(even).visible .feature-image,
.feature-section:nth-child(even).visible .feature-content {
  transform: translateX(0);
}

/* Update button styles */
.bg-yellow-500 {
    background-color: #FED600 !important;
}

.hover\:bg-yellow-600:hover {
    background-color: #e6c000 !important;
}

.text-blue-900 {
    color: #005CBB !important;
}

/* Update gradient overlay */
.bg-gradient-to-r {
    background: linear-gradient(to right, rgba(0, 92, 187, 0.9), transparent) !important;
}

/* Update border animation color */
.border-animation {
    stroke: #005CBB !important;
}

/* Update feature section headings */
.feature-content h3 {
    color: #005CBB;
}

/* Update text colors */
.text-gray-700 {
    color: #2d3748;
}

/* Add hover effects */
.feature-section:hover .feature-image {
    transform: scale(1.02);
    transition: transform 0.3s ease;
}

.feature-section:hover .feature-content h3 {
    color: #FED600;
    transition: color 0.3s ease;
}

/* Update animation colors */
.feature-section.visible .feature-image::after {
    content: '';
    position: absolute;
    inset: 0;
    /* border: 2px solid #FED600; */
    /* border-radius: 0.5rem; */
    opacity: 0;
    transition: opacity 0.3s ease;
}

.feature-section:hover .feature-image::after {
    opacity: 1;
}

/* Enhanced Pricing Section Styles */
.pricing-section {
    position: relative;
    overflow: hidden;
}

.pricing-section::before {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(45deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0.05));
    pointer-events: none;
}

.pricing-section > * {
    position: relative;
    z-index: 1;
}

/* Enhanced glass effect for pricing cards */
.pricing-section [class*="bg-white"],
.pricing-section [class*="bg-gradient"] {
    box-shadow: 
        0 8px 32px rgba(0, 0, 0, 0.1),
        inset 0 0 0 1px rgba(255, 255, 255, 0.1);
}

.pricing-section [class*="bg-white"]:hover,
.pricing-section [class*="bg-gradient"]:hover {
    box-shadow: 
        0 12px 48px rgba(0, 0, 0, 0.2),
        inset 0 0 0 2px rgba(255, 255, 255, 0.2);
    transform: translateY(-5px) scale(1.02);
}

/* Enhanced timer styles */
.pricing-section .bg-blue-800\/40 {
    box-shadow: 
        0 4px 16px rgba(0, 0, 0, 0.1),
        inset 0 0 0 1px rgba(255, 255, 255, 0.05);
}

/* Smooth transitions */
.pricing-section * {
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

.welcome-container {
  text-align: center;
  padding: 2rem 1rem;
  position: relative;
  overflow: hidden;
}

.welcome-text {
  font-size: 2.5rem;
  line-height: 1.2;
  font-weight: 800;
  letter-spacing: 0.05em;
  background: linear-gradient(
    135deg,
    rgba(255, 255, 255, 1) 0%,
    rgba(255, 255, 255, 0.9) 50%,
    rgba(255, 255, 255, 0.8) 100%
  );
  -webkit-background-clip: text;
  background-clip: text;
  color: transparent;
  text-shadow: 
    0 2px 4px rgba(0, 0, 0, 0.1),
    0 4px 8px rgba(0, 0, 0, 0.1);
  animation: welcomeFadeIn 1.5s ease-out forwards;
  opacity: 0;
  transform: translateY(20px);
}

@media (min-width: 640px) {
  .welcome-text {
    font-size: 3.5rem;
  }
}

@media (min-width: 768px) {
  .welcome-text {
    font-size: 4rem;
  }
}

@media (min-width: 1024px) {
  .welcome-text {
    font-size: 4.5rem;
  }
}

.company-name {
  display: inline-block;
  background: linear-gradient(135deg, #FED600 0%, #FFB800 100%);
  -webkit-background-clip: text;
  background-clip: text;
  color: transparent;
  position: relative;
  animation: companyNameShine 3s infinite;
}

.company-name::after {
  content: '';
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  background: linear-gradient(
    45deg,
    transparent 0%,
    rgba(255, 255, 255, 0.4) 50%,
    transparent 100%
  );
  transform: translateX(-100%);
  animation: shimmerEffect 3s infinite;
}

.welcome-underline {
  width: 0;
  height: 3px;
  background: linear-gradient(90deg, #FED600, #FFB800);
  margin: 1rem auto;
  animation: underlineExpand 1.5s ease-out 0.5s forwards;
  box-shadow: 0 2px 4px rgba(254, 214, 0, 0.3);
  border-radius: 2px;
}

@keyframes welcomeFadeIn {
  0% {
    opacity: 0;
    transform: translateY(20px);
  }
  100% {
    opacity: 1;
    transform: translateY(0);
  }
}

@keyframes companyNameShine {
  0%, 100% {
    filter: brightness(1);
  }
  50% {
    filter: brightness(1.2);
  }
}

@keyframes shimmerEffect {
  0% {
    transform: translateX(-100%);
  }
  100% {
    transform: translateX(100%);
  }
}

@keyframes underlineExpand {
  0% {
    width: 0;
  }
  100% {
    width: 80%;
  }
}

/* Add hover effect */
.welcome-container:hover .welcome-text {
  transform: scale(1.02);
  transition: transform 0.3s ease;
}

.welcome-container:hover .welcome-underline {
  filter: brightness(1.2);
  transition: filter 0.3s ease;
}

/* Add floating effect to the company name */
.company-name {
  animation: floatEffect 3s ease-in-out infinite;
}

@keyframes floatEffect {
  0%, 100% {
    transform: translateY(0);
  }
  50% {
    transform: translateY(-5px);
  }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('visible');
      }
    });
  }, {
    threshold: 0.2,
    rootMargin: '0px'
  });

  // Observe all feature sections
  document.querySelectorAll('.feature-section').forEach((section) => {
    observer.observe(section);
  });
});
</script>