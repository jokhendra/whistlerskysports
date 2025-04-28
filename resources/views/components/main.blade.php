<div class="mt-[-15px] w-full">
  <div class="w-full">
    <!-- Hero Section -->
    <div class="py-8 sm:py-12 relative overflow-hidden w-full">
      <div class="mountain-bg"></div>
      <div class="clouds"></div>
      <div class="relative z-10 w-full">
        <div class="welcome-container w-full">
          <h1 class="welcome-text text-3xl sm:text-4xl md:text-5xl lg:text-6xl">Welcome to <span class="company-name">WhistlerSkySports</span></h1>
          <div class="welcome-underline"></div>
        </div>
        <div class="w-full max-w-7xl mx-auto mt-6 sm:mt-10">
          <div class="modern-tagline">
            <div class="tagline-content text-sm sm:text-base md:text-lg">
              <span class="highlight-text">For a person who has never flown in a microlight</span>, it may seem like an extreme sport. The excitement can be comparable, but some may have reservations: maybe it's too dangerous. We say <span class="highlight-text">Reach for the Sky</span>! <span class="sub-text">Wait, did Toy Story copyright that?</span>
            </div>
            <div class="tagline-decoration"></div>
          </div>
        </div>
      </div>
    </div>

    <!-- Features Section -->
    <div class="py-8 sm:py-12 w-full">
      <h2 class="text-2xl sm:text-3xl font-bold text-center text-amber-400 mb-8 sm:mb-12">Why Choose WhistlerSkySports?</h2>
      
      <!-- First Feature -->
      <div class="feature-section flex flex-col md:flex-row items-center mb-8 sm:mb-12 w-full">
        <div class="w-full md:w-1/2 feature-image">
          <img src="{{ asset('images/image000000 2.JPG') }}"
               alt="Experienced Pilots" 
               class="w-full h-[300px] sm:h-[400px] object-cover"/>
        </div>
        <div class="w-full md:w-1/2 h-auto sm:h-[400px] px-4 sm:px-8 flex items-center p-4 sm:p-6 feature-content bg-[#f8f8f8]">
          <div>
            <h3 class="text-xl sm:text-2xl font-bold mb-3 sm:mb-4">Experienced Pilots</h3>
            <p class="text-base sm:text-lg text-gray-700 leading-relaxed">Our certified pilots have thousands of flight hours and know the Canadian Rockies like the back of their hand. With years of experience in power hang gliding, they ensure your safety while providing an unforgettable adventure.</p>
          </div>
        </div>
      </div>

      <!-- Second Feature -->
      <div class="feature-section flex flex-col-reverse md:flex-row items-center mb-8 sm:mb-12 w-full">
        <div class="w-full md:w-1/2 h-auto sm:h-[400px] px-4 sm:px-8 flex items-center p-4 sm:p-6 feature-content bg-[#f8f8f8]">
          <div>
            <h3 class="text-xl sm:text-2xl font-bold mb-3 sm:mb-4">Top-Notch Equipment</h3>
            <p class="text-base sm:text-lg text-gray-700 leading-relaxed">We use only the latest power hang gliders with rigorous safety inspections before every flight. Our equipment is maintained to the highest standards, ensuring your safety and comfort throughout your journey.</p>
          </div>
        </div>
        <div class="w-full md:w-1/2 feature-image">
          <img src="{{ asset('images/ecupment.jpg') }}" 
               alt="Top-Notch Equipment" 
               class="w-full h-[300px] sm:h-[400px] object-cover"/>
        </div>
      </div>

      <!-- Third Feature -->
      <div class="feature-section flex flex-col md:flex-row items-center mb-8 sm:mb-12 w-full">
        <div class="w-full md:w-1/2 feature-image">
          <img src="{{ asset('images/Airport.jpg') }}" 
               alt="Breathtaking Views" 
               class="w-full h-[300px] sm:h-[400px] object-cover"/>
        </div>
        <div class="w-full md:w-1/2 h-auto sm:h-[400px] px-4 sm:px-8 flex items-center p-4 sm:p-6 feature-content bg-[#f8f8f8]">
          <div>
            <h3 class="text-xl sm:text-2xl font-bold mb-3 sm:mb-4">Breathtaking Views</h3>
            <p class="text-base sm:text-lg text-gray-700 leading-relaxed">Soar over pristine lakes, majestic mountains, and lush forests that only Canada can offer. Experience the stunning beauty of the Canadian Rockies from a unique perspective that few get to witness.</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Call to Action Section -->
    <div class="relative h-64 sm:h-80 md:h-96 overflow-hidden mb-8 sm:mb-12 w-full">
      <img src="{{ asset('images/hero-section.png') }}" alt="Hang gliding over mountains" class="w-full h-full object-cover">
      <div class="absolute inset-0 bg-gradient-to-r from-blue-900/70 to-transparent flex items-center">
        <div class="text-white p-4 sm:p-8 max-w-7xl mx-auto w-full">
          <h2 class="text-2xl sm:text-3xl font-bold mb-3 sm:mb-4">Soar Above the Rockies</h2>
          <p class="text-lg sm:text-xl mb-4 sm:mb-6">Book your adventure today and experience WhistlerSkySports from a whole new perspective</p>
          <a href="/booking" class="bg-yellow-500 hover:bg-yellow-600 text-blue-900 font-bold py-2 sm:py-3 px-4 sm:px-6 rounded-lg transition duration-300 relative group inline-block text-sm sm:text-base">
            <span class="animate-text-on-hover">Book Your Million Dollar Smile</span>
            <svg class="absolute inset-0 w-full h-full">
              <rect class="border-animation" x="0" y="0" width="100%" height="100%" fill="none" stroke="#1e40af" stroke-width="2"/>
            </svg>
          </a>
        </div>
      </div>
    </div>
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
    width: 100%;
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
  width: 100%;
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

/* Responsive Styles */
@media (max-width: 640px) {
  .welcome-text {
    font-size: 2rem;
  }
  
  .tagline-content {
    font-size: 0.9rem;
  }
  
  .feature-image, .feature-content {
    min-height: 250px;
  }
  
  .modern-tagline {
    padding: 1rem;
  }
}

@media (max-width: 768px) {
  .feature-section {
    margin-bottom: 1.5rem;
  }
  
  .feature-image, .feature-content {
    height: auto !important;
    min-height: 300px;
  }
  
  .welcome-text {
    font-size: 2.5rem;
  }
  
  .tagline-content {
    font-size: 1rem;
  }
}

@media (min-width: 1024px) {
  .welcome-text {
    font-size: 4.5rem;
  }
  
  .tagline-content {
    font-size: 1.1rem;
  }
  
  .feature-image, .feature-content {
    height: 400px;
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