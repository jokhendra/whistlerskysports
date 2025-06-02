@push('styles')
<style>
  @import url('https://fonts.googleapis.com/css2?family=Rock+Salt&display=swap');
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');

/* Mountain Background */
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

/* Cloud Animation */
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
    0% { background-position: 0% 0%; }
    100% { background-position: 100% 100%; }
}

/* Text Effects */
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

/* Tagline Styles */
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

/* Text Highlight Effects */
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

/* Additional Text Styles */
.accent-text {
    color: #FED600;
    font-style: italic;
    font-weight: 500;
}

.sub-text {
    color: #e2e8f0;
    font-size: 0.95rem;
}

/* Tagline Decoration */
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

/* Animations */
@keyframes rotate {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}

@keyframes ice-shine {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

/* Button Animation */
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

/* Feature Section Animations */
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

/* Feature Section Styles */
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

/* Welcome Section Styles */
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

.company-name {
    display: inline-block;
    background: linear-gradient(135deg, #FED600 0%, #FFB800 100%);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
    position: relative;
    animation: companyNameShine 3s infinite, floatEffect 3s ease-in-out infinite;
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

/* Welcome Animations */
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
    0%, 100% { filter: brightness(1); }
    50% { filter: brightness(1.2); }
}

@keyframes floatEffect {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-5px); }
}

@keyframes underlineExpand {
    0% { width: 0; }
    100% { width: 80%; }
}

/* Responsive Styles */
@media (max-width: 640px) {
    .welcome-text { font-size: 2rem; }
    .tagline-content { font-size: 0.9rem; }
    .feature-image, .feature-content { min-height: 250px; }
    .modern-tagline { padding: 1rem; }
}

@media (max-width: 768px) {
    .feature-section { margin-bottom: 1.5rem; }
    .feature-image, .feature-content {
        height: auto !important;
        min-height: 300px;
    }
    .welcome-text { font-size: 2.5rem; }
    .tagline-content { font-size: 1rem; }
}

@media (min-width: 1024px) {
    .welcome-text { font-size: 4.5rem; }
    .tagline-content { font-size: 1.1rem; }
    .feature-image, .feature-content { height: 400px; }
}
</style>
@endpush

<!-- Page-specific SEO Meta Tags -->
@push('meta')
<meta name="description" content="Experience the thrill of power hang gliding in Whistler with certified pilots. Soar over the stunning Canadian Rockies and book your adventure with Whistler Sky Sports today.">
<meta name="keywords" content="whistler sky sports, power hang gliding whistler, flight adventure whistler, canadian rockies flying, ultralight aircraft, whistler aviation">
<!-- Open Graph Tags -->
<meta property="og:title" content="Whistler Sky Sports - Experience the Freedom of Flight in the Canadian Rockies">
<meta property="og:description" content="Book your power hang gliding adventure with Whistler Sky Sports. Certified pilots, top-notch equipment, and breathtaking views of the Canadian Rockies.">
<meta property="og:type" content="website">
<meta property="og:image" content="{{ asset('images/hero-section.png') }}">
<!-- Twitter Card Tags -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="Whistler Sky Sports - Power Hang Gliding Adventures">
<meta name="twitter:description" content="Soar over pristine lakes, majestic mountains, and lush forests with Whistler Sky Sports power hang gliding adventures.">
<meta name="twitter:image" content="{{ asset('images/hero-section.png') }}">
@endpush

<main class="w-full" itemscope itemtype="https://schema.org/LocalBusiness">
<header class="w-[99.8vw] h-screen header-logo-bg overflow-x-hidden mt-16 flex items-center justify-center">
    <div class="container mx-auto px-4 relative z-10">
        <img src="{{ asset('images/logo/Whistler-Sky-Sports_Full-Black.png') }}" 
             alt="Whistler Sky Sports Logo - Power Hang Gliding Adventures in British Columbia" 
             class="w-3/4 max-w-4xl mx-auto object-contain animate-fadeIn"
             itemprop="logo">
        <div class="text-center mt-8">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-black drop-shadow-lg" itemprop="name">
                Experience the Freedom of Flight
            </h1>
            <p class="text-xl md:text-2xl text-black mt-4 max-w-3xl mx-auto" itemprop="description">
                The premier destination for aviation adventures in Whistler
            </p>
        </div>
    </div>
</header>
  <div class="w-full">
    <!-- Hero Section -->
    <section class="py-8 sm:py-12 relative overflow-hidden w-full" aria-labelledby="welcome-heading">
      <div class="mountain-bg"></div>
      <div class="clouds"></div>
      <div class="relative z-10 w-full">
        <div class="welcome-container w-full">
          <h2 id="welcome-heading" class="welcome-text text-3xl sm:text-4xl md:text-5xl lg:text-6xl">Welcome to <span class="company-name" itemprop="brand">WhistlerSkySports</span></h2>
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
    </section>

    <!-- Features Section -->
    <section class="py-8 sm:py-12 w-full" aria-labelledby="features-heading">
      <h2 id="features-heading" class="text-2xl sm:text-3xl font-bold text-center text-amber-400 mb-8 sm:mb-12">Why Choose WhistlerSkySports?</h2>
      
      <!-- First Feature -->
      <div class="feature-section flex flex-col md:flex-row items-center mb-8 sm:mb-12 w-full">
        <div class="w-full md:w-1/2 feature-image">
          <img src="{{ asset('images/image000000 2.JPG') }}"
               alt="Experienced Power Hang Glider Pilots at Whistler Sky Sports with safety briefing" 
               class="w-full h-[300px] sm:h-[400px] object-cover"
               loading="lazy"/>
        </div>
        <article class="w-full md:w-1/2 h-auto sm:h-[400px] px-4 sm:px-8 flex items-center p-4 sm:p-6 feature-content bg-[#f8f8f8]">
          <div>
            <h3 class="text-xl sm:text-2xl font-bold mb-3 sm:mb-4">Experienced Pilots</h3>
            <p class="text-base sm:text-lg text-gray-700 leading-relaxed">Our certified pilots have thousands of flight hours and know the Canadian Rockies like the back of their hand. With years of experience in power hang gliding, they ensure your safety while providing an unforgettable adventure.</p>
          </div>
        </article>
      </div>

      <!-- Second Feature -->
      <div class="feature-section flex flex-col-reverse md:flex-row items-center mb-8 sm:mb-12 w-full">
        <article class="w-full md:w-1/2 h-auto sm:h-[400px] px-4 sm:px-8 flex items-center p-4 sm:p-6 feature-content bg-[#f8f8f8]">
          <div>
            <h3 class="text-xl sm:text-2xl font-bold mb-3 sm:mb-4">Top-Notch Equipment</h3>
            <p class="text-base sm:text-lg text-gray-700 leading-relaxed">We use only the latest power hang gliders with rigorous safety inspections before every flight. Our equipment is maintained to the highest standards, ensuring your safety and comfort throughout your journey.</p>
          </div>
        </article>
        <div class="w-full md:w-1/2 feature-image">
          <img src="{{ asset('images/ecupment.jpg') }}" 
               alt="Ultra-modern Power Hang Glider Equipment at Whistler Sky Sports facility" 
               class="w-full h-[300px] sm:h-[400px] object-cover"
               loading="lazy"/>
        </div>
      </div>

      <!-- Third Feature -->
      <div class="feature-section flex flex-col md:flex-row items-center w-full">
        <div class="w-full md:w-1/2 feature-image">
          <img src="{{ asset('images/Airport.jpg') }}" 
               alt="Scenic Whistler Airport view with mountain backdrop for Power Hang Gliding flights" 
               class="w-full h-[300px] sm:h-[400px] object-cover"
               loading="lazy"/>
        </div>
        <article class="w-full md:w-1/2 h-auto sm:h-[400px] px-4 sm:px-8 flex items-center p-4 sm:p-6 feature-content bg-[#f8f8f8]">
          <div>
            <h3 class="text-xl sm:text-2xl font-bold mb-3 sm:mb-4">Breathtaking Views</h3>
            <p class="text-base sm:text-lg text-gray-700 leading-relaxed">Soar over pristine lakes, majestic mountains, and lush forests that only Canada can offer. Experience the stunning beauty of the Canadian Rockies from a unique perspective that few get to witness.</p>
          </div>
        </article>
      </div>
    </section>

  @include('components.showcase')


    <!-- Call to Action Section -->
    <section class="relative h-64 sm:h-80 md:h-96 overflow-hidden mb-8 sm:mb-12 w-full mt-12" aria-labelledby="cta-heading">
      <img src="{{ asset('images/hero-section.png') }}" 
           alt="Hang gliding adventure over stunning Rocky Mountains near Whistler, Canada" 
           class="w-full h-full object-cover"
           loading="lazy">
      <div class="absolute inset-0 bg-gradient-to-r from-blue-900/70 to-transparent flex items-center">
        <div class="text-white p-4 sm:p-8 max-w-7xl mx-auto w-full">
          <h2 id="cta-heading" class="text-2xl sm:text-3xl font-bold mb-3 sm:mb-4">Soar Above the Rockies</h2>
          <p class="text-lg sm:text-xl mb-4 sm:mb-6">Book your adventure today and experience WhistlerSkySports from a whole new perspective</p>
          <a href="/booking" 
             class="bg-yellow-500 hover:bg-yellow-600 text-blue-900 font-bold py-2 sm:py-3 px-4 sm:px-6 rounded-lg transition duration-300 relative group inline-block text-sm sm:text-base"
             aria-label="Book your flight adventure now"
             itemprop="makesOffer">
            <span class="animate-text-on-hover">Book Your Million Dollar Smile</span>
            <svg class="absolute inset-0 w-full h-full" aria-hidden="true">
              <rect class="border-animation" x="0" y="0" width="100%" height="100%" fill="none" stroke="#1e40af" stroke-width="2"/>
            </svg>
          </a>
        </div>
      </div>
    </section>
  </div>
</main>

<!-- Schema.org structured data -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "LocalBusiness",
  "name": "Whistler Sky Sports",
  "description": "The premier destination for power hang gliding adventures in Whistler, British Columbia. Experience the freedom of flight with our certified pilots and top-notch equipment while enjoying breathtaking views of the Canadian Rockies.",
  "image": "{{ asset('images/logo/Whistler-Sky-Sports_Full-Black.png') }}",
  "url": "{{ url('/') }}",
  "telephone": "+1234567890",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "Whistler Municipal Airport",
    "addressLocality": "Whistler",
    "addressRegion": "BC",
    "postalCode": "V8E 0A3",
    "addressCountry": "CA"
  },
  "geo": {
    "@type": "GeoCoordinates",
    "latitude": "50.1386",
    "longitude": "-122.9494"
  },
  "openingHoursSpecification": {
    "@type": "OpeningHoursSpecification",
    "dayOfWeek": [
      "Monday",
      "Tuesday",
      "Wednesday",
      "Thursday",
      "Friday",
      "Saturday",
      "Sunday"
    ],
    "opens": "08:00",
    "closes": "18:00"
  },
  "sameAs": [
    "https://www.facebook.com/whistlerskysports",
    "https://www.instagram.com/whistlerskysports",
    "https://twitter.com/whistlersky"
  ],
  "priceRange": "$$$",
  "offers": {
    "@type": "Offer",
    "name": "Power Hang Glider Flight Experience",
    "description": "Soar above the majestic Canadian Rockies with our certified pilots",
    "priceCurrency": "CAD",
    "availability": "https://schema.org/InStock"
  }
}
</script>

@push('scripts')
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
@endpush