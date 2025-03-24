<div>
  <div class="container mx-auto px-4 mt-5">
    <!-- Hero Section -->
    <div class="py-12 relative overflow-hidden rounded-xl">
      <div class="mountain-bg"></div>
      <div class="clouds"></div>
      <div class="relative z-10">
        <h1 class="text-4xl md:text-5xl font-bold text-center mb-4 rocky-ice-text">Welcome to WhistlerSkySports</h1>
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
    <div class="py-12">
      <h2 class="text-3xl font-bold text-center mb-12">Why Choose WhistlerSkySports?</h2>
      
      <div class="grid md:grid-cols-3 gap-8">
        <div class="bg-white p-6 rounded-lg shadow-md">
          <img src="{{ asset('images/image000000 2.JPG') }}"
               alt="Experienced Pilots" 
               class="w-full h-48 object-cover rounded-md mb-4">
          <h3 class="text-xl font-bold mb-2">Experienced Pilots</h3>
          <p class="text-gray-700">Our certified pilots have thousands of flight hours and know the Canadian Rockies like the back of their hand.</p>
        </div>
        
        <div class="bg-white p-6 rounded-lg shadow-md">
          <img src="{{ asset('images/ecupment.jpg') }}" 
               alt="Top-Notch Equipment" 
               class="w-full h-48 object-cover rounded-md mb-4">
          <h3 class="text-xl font-bold mb-2">Top-Notch Equipment</h3>
          <p class="text-gray-700">We use only the latest power hang gliders with rigorous safety inspections before every flight.</p>
        </div>
        
        <div class="bg-white p-6 rounded-lg shadow-md">
          <img src="{{ asset('images/Airport.jpg') }}" 
               alt="Breathtaking Views" 
               class="w-full h-48 object-cover rounded-md mb-4">
          <h3 class="text-xl font-bold mb-2">Breathtaking Views</h3>
          <p class="text-gray-700">Soar over pristine lakes, majestic mountains, and lush forests that only Canada can offer.</p>
        </div>
      </div>
    </div>
    
    <!-- Tour Packages -->
    <div class="py-12 rounded-xl p-8">
      <h2 class="text-3xl font-bold text-center mb-12">Our Adventure Packages</h2>
      
      <div class="grid md:grid-cols-3 gap-8">
        <div class="bg-white rounded-lg overflow-hidden shadow-lg transition-transform duration-300 hover:scale-105">
          <img src="https://images.unsplash.com/photo-1519681393784-d120267933ba?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=400&h=250&q=80" 
               alt="Beginner's Flight" 
               class="w-full h-48 object-cover">
          <div class="p-6">
            <h3 class="text-xl font-bold mb-2">Beginner's Flight</h3>
            <p class="text-gray-600 mb-4">Perfect for first-timers. A 30-minute flight with basic maneuvers.</p>
            <div class="flex justify-between items-center">
              <span class="text-2xl font-bold text-blue-900">$199 CAD</span>
              <a href="#book-now" class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded">Book Now</a>
            </div>
          </div>
        </div>
        
        <div class="bg-white rounded-lg overflow-hidden shadow-lg transition-transform duration-300 hover:scale-105">
          <img src="https://images.unsplash.com/photo-1454496522488-7a8e488e8606?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=400&h=250&q=80" 
               alt="Mountain Explorer" 
               class="w-full h-48 object-cover">
          <div class="p-6">
            <h3 class="text-xl font-bold mb-2">Mountain Explorer</h3>
            <p class="text-gray-600 mb-4">A 1-hour adventure flying through valleys and over peaks.</p>
            <div class="flex justify-between items-center">
              <span class="text-2xl font-bold text-blue-900">$349 CAD</span>
              <a href="#book-now" class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded">Book Now</a>
            </div>
          </div>
        </div>
        
        <div class="bg-white rounded-lg overflow-hidden shadow-lg transition-transform duration-300 hover:scale-105">
          <img src="https://images.unsplash.com/photo-1483728642387-6c3bdd6c93e5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=400&h=250&q=80" 
               alt="Ultimate Experience" 
               class="w-full h-48 object-cover">
          <div class="p-6">
            <h3 class="text-xl font-bold mb-2">Ultimate Experience</h3>
            <p class="text-gray-600 mb-4">A 2-hour premium flight with photography and advanced maneuvers.</p>
            <div class="flex justify-between items-center">
              <span class="text-2xl font-bold text-blue-900">$599 CAD</span>
              <a href="#book-now" class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded">Book Now</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="relative h-96 rounded-xl overflow-hidden shadow-xl mb-12 mt-5">
        <img src="{{ asset('images/hero-section.png') }}" alt="Hang gliding over mountains" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-r from-blue-900/70 to-transparent flex items-center">
          <div class="text-white p-8">
            <h2 class="text-3xl font-bold mb-4">Soar Above the Rockies</h2>
            <p class="text-xl mb-6">Book your adventure today and experience Canada from a whole new perspective</p>
            <a href="{{ route('booking') }}" class="bg-yellow-500 hover:bg-yellow-600 text-blue-900 font-bold py-3 px-6 rounded-lg transition duration-300">
            Book Your Million Dollar Smile
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
    background: linear-gradient(180deg, #1a365d 0%, #2c5282 50%, #2b6cb0 100%);
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
        linear-gradient(to right, #2d3748 0%, #2d3748 20%, transparent 20%),
        linear-gradient(to right, #2d3748 40%, #2d3748 60%, transparent 60%),
        linear-gradient(to right, #2d3748 80%, #2d3748 100%, transparent 100%);
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
    color: #90cdf4;
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
    background: linear-gradient(90deg, #90cdf4, transparent);
    transform: scaleX(0);
    transform-origin: left;
    transition: transform 0.3s ease;
}

.highlight-text:hover::after {
    transform: scaleX(1);
}

.accent-text {
    color: #bee3f8;
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
    background: linear-gradient(135deg, rgba(144, 205, 244, 0.1), rgba(190, 227, 248, 0.1));
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
</style>