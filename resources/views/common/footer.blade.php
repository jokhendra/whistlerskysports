<footer class="bg-gradient-to-br bg-[#0F1B2A] via-[#0f1b2ad8] to-[#162639] text-white" itemscope itemtype="https://schema.org/WPFooter">
  <div class="container mx-auto py-16 px-4">
    <!-- Main Footer Content -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-12 mb-16">
      <!-- Brand Section -->
      <div class="space-y-6" itemscope itemtype="https://schema.org/Organization">
        <div class="flex items-center space-x-3">
          <!-- <div class="w-12 h-12 bg-white/10 rounded-xl flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
            </svg>
          </div> -->
          <h3 class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-white to-blue-100" itemprop="name">{{ $settings['site_name'] ?? 'WhistlerSkySports' }}</h3>
        </div>
        <p class="text-blue-100 text-lg leading-relaxed" itemprop="description">Experience the dream of flight training on our ultralight aircraft at Whistler Sky sports.</p>
        <div class="flex space-x-4">
          <a href="{{ $settings['facebook_url'] ?? '#' }}" target="_blank" class="w-10 h-10 bg-[#1877F2] rounded-lg flex items-center justify-center hover:bg-[#1877F2]/90 transition-all duration-300 transform hover:scale-110 {{ !isset($settings['facebook_url']) || empty($settings['facebook_url']) ? 'hidden' : '' }}" itemprop="sameAs" aria-label="Visit our Facebook page">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="currentColor" viewBox="0 0 24 24">
              <path d="M22.675 0h-21.35c-.732 0-1.325.593-1.325 1.325v21.351c0 .731.593 1.324 1.325 1.324h11.495v-9.294h-3.128v-3.622h3.128v-2.671c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12v9.293h6.116c.73 0 1.323-.593 1.323-1.325v-21.35c0-.732-.593-1.325-1.325-1.325z"/>
            </svg>
          </a>
          <a href="{{ $settings['twitter_url'] ?? '#' }}" target="_blank" class="w-10 h-10 bg-[#1DA1F2] rounded-lg flex items-center justify-center hover:bg-[#1DA1F2]/90 transition-all duration-300 transform hover:scale-110 {{ !isset($settings['twitter_url']) || empty($settings['twitter_url']) ? 'hidden' : '' }}" itemprop="sameAs" aria-label="Visit our Twitter page">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="currentColor" viewBox="0 0 24 24">
              <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
            </svg>
          </a>
          <a href="{{ $settings['instagram_url'] ?? '#' }}" target="_blank" class="w-10 h-10 bg-gradient-to-br from-[#FF0069] via-[#E4405F] to-[#C13584] rounded-lg flex items-center justify-center hover:opacity-90 transition-all duration-300 transform hover:scale-110 {{ !isset($settings['instagram_url']) || empty($settings['instagram_url']) ? 'hidden' : '' }}" itemprop="sameAs" aria-label="Visit our Instagram page">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="currentColor" viewBox="0 0 24 24">
              <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
            </svg>
          </a>
          <a href="{{ $settings['linkedin_url'] ?? '#' }}" target="_blank" class="w-10 h-10 bg-[#0077B5] rounded-lg flex items-center justify-center hover:bg-[#0077B5]/90 transition-all duration-300 transform hover:scale-110 {{ !isset($settings['linkedin_url']) || empty($settings['linkedin_url']) ? 'hidden' : '' }}" itemprop="sameAs" aria-label="Visit our LinkedIn page">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="currentColor" viewBox="0 0 24 24">
              <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
            </svg>
          </a>
          <a href="{{ $settings['youtube_url'] ?? '#' }}" target="_blank" class="w-10 h-10 bg-[#FF0000] rounded-lg flex items-center justify-center hover:bg-[#FF0000]/90 transition-all duration-300 transform hover:scale-110 {{ !isset($settings['youtube_url']) || empty($settings['youtube_url']) ? 'hidden' : '' }}" itemprop="sameAs" aria-label="Visit our YouTube channel">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="currentColor" viewBox="0 0 24 24">
              <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
            </svg>
          </a>
          <a href="{{ $settings['pinterest_url'] ?? '#' }}" target="_blank" class="w-10 h-10 bg-[#E60023] rounded-lg flex items-center justify-center hover:bg-[#E60023]/90 transition-all duration-300 transform hover:scale-110 {{ !isset($settings['pinterest_url']) || empty($settings['pinterest_url']) ? 'hidden' : '' }}" itemprop="sameAs" aria-label="Visit our Pinterest page">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="currentColor" viewBox="0 0 24 24">
              <path d="M12 0c-6.627 0-12 5.373-12 12 0 5.084 3.163 9.426 7.627 11.174-.105-.949-.2-2.405.042-3.441.218-.937 1.407-5.965 1.407-5.965s-.359-.719-.359-1.782c0-1.668.967-2.914 2.171-2.914 1.023 0 1.518.769 1.518 1.69 0 1.029-.655 2.568-.994 3.995-.283 1.194.599 2.169 1.777 2.169 2.133 0 3.772-2.249 3.772-5.495 0-2.873-2.064-4.882-5.012-4.882-3.414 0-5.418 2.561-5.418 5.207 0 1.031.397 2.138.893 2.738.098.119.112.224.083.345l-.333 1.36c-.053.22-.174.267-.402.161-1.499-.698-2.436-2.889-2.436-4.649 0-3.785 2.75-7.262 7.929-7.262 4.163 0 7.398 2.967 7.398 6.931 0 4.136-2.607 7.464-6.227 7.464-1.216 0-2.359-.631-2.75-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146 1.124.347 2.317.535 3.554.535 6.627 0 12-5.373 12-12 0-6.628-5.373-12-12-12z"/>
            </svg>
          </a>
         
        </div>
      </div>

      <!-- Contact Info -->
      <div class="space-y-6">
        <h3 class="text-xl font-bold text-white">Contact Us</h3>
        <div class="space-y-4" itemscope itemtype="https://schema.org/LocalBusiness">
          <div class="flex items-start space-x-4 group">
            <div class="w-12 h-12 bg-white/10 rounded-xl flex items-center justify-center group-hover:bg-white/20 transition-all duration-300">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
              </svg>
            </div>
            <div>
              <h4 class="text-lg font-semibold text-white mb-1">Location</h4>
              <address class="text-blue-100 not-italic" itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">
                <span itemprop="streetAddress">{{ $settings['address'] ?? '123 Street Name' }}</span>, 
                <span itemprop="addressLocality">{{ $settings['city'] ?? 'Whistler' }}</span>, 
                <span itemprop="addressRegion">{{ $settings['province'] ?? 'BC' }}</span>
              </address>
            </div>
          </div>
          <div class="flex items-start space-x-4 group">
            <div class="w-12 h-12 bg-white/10 rounded-xl flex items-center justify-center group-hover:bg-white/20 transition-all duration-300">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
              </svg>
            </div>
            <div>
              <h4 class="text-lg font-semibold text-white mb-1">Phone</h4>
              <p class="text-blue-100"><a href="tel:{{ $settings['phone_number'] ?? '+1 (604) 123-4567' }}" class="hover:text-white transition-colors" itemprop="telephone">{{ $settings['phone_number'] ?? '+1 (604) 123-4567' }}</a></p>
            </div>
          </div>
          <div class="flex items-start space-x-4 group">
            <div class="w-12 h-12 bg-white/10 rounded-xl flex items-center justify-center group-hover:bg-white/20 transition-all duration-300">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
              </svg>
            </div>
            <div>
              <h4 class="text-lg font-semibold text-white mb-1">Email</h4>
              <p class="text-blue-100"><a href="mailto:{{ $settings['contact_email'] ?? 'info@whistlerskysports.ca' }}" class="hover:text-white transition-colors" itemprop="email">{{ $settings['contact_email'] ?? 'info@whistlerskysports.ca' }}</a></p>
            </div>
          </div>
          <meta itemprop="name" content="{{ $settings['site_name'] ?? 'WhistlerSkySports' }}">
          <meta itemprop="url" content="{{ url('/') }}">
          <meta itemprop="image" content="{{ asset('images/logo/Whistler-Sky-Sports_Full-Black.png') }}">
          <meta itemprop="priceRange" content="$$$">
        </div>
      </div>

      <!-- Quick Links -->
      <nav class="space-y-6" aria-label="Footer Navigation" itemscope itemtype="https://schema.org/SiteNavigationElement">
        <h3 class="text-xl font-bold text-white">Quick Links</h3>
        <ul class="space-y-3">
          <li>
            <a href="/about" class="text-blue-100 hover:text-white transition-colors duration-300 flex items-center space-x-2 group" itemprop="url" aria-label="Learn about our company, services and history">
              <span class="w-1 h-1 bg-white rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
              <span itemprop="name">About Us</span>
            </a>
          </li>
          <li>
            <a href="/gallery" class="text-blue-100 hover:text-white transition-colors duration-300 flex items-center space-x-2 group" itemprop="url" aria-label="View our power hang gliding adventure photos">
              <span class="w-1 h-1 bg-white rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
              <span itemprop="name">Gallery</span>
            </a>
          </li>
          <li>
            <a href="/review" class="text-blue-100 hover:text-white transition-colors duration-300 flex items-center space-x-2 group" itemprop="url" aria-label="Read customer testimonials and reviews of our flying experiences">
              <span class="w-1 h-1 bg-white rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
              <span itemprop="name">Reviews</span>
            </a>
          </li>
          <li>
            <a href="/weather" class="text-blue-100 hover:text-white transition-colors duration-300 flex items-center space-x-2 group" itemprop="url" aria-label="Check current flying conditions in Whistler area">
              <span class="w-1 h-1 bg-white rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
              <span itemprop="name">Weather</span>
            </a>
          </li>
          <li>
            <a href="/contact" class="text-blue-100 hover:text-white transition-colors duration-300 flex items-center space-x-2 group" itemprop="url" aria-label="Contact our team for inquiries and booking assistance">
              <span class="w-1 h-1 bg-white rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
              <span itemprop="name">Contact Us</span>
            </a>
          </li>
          <li>
            <a href="/faq" class="text-blue-100 hover:text-white transition-colors duration-300 flex items-center space-x-2 group" itemprop="url" aria-label="Find answers to frequently asked questions about our services">
              <span class="w-1 h-1 bg-white rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
              <span itemprop="name">FAQ</span>
            </a>
          </li>
        </ul>
      </nav>
    </div>

    <!-- Bottom Bar -->
    <div class="pt-8 border-t border-white/10">
      <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
        <p class="text-blue-100">&copy; {{ date('Y') }} <span itemprop="copyrightHolder">WhistlerSkySports</span>. All rights reserved.</p>
        <div class="flex space-x-6">
          <a href="/privacy-policy" class="text-blue-100 hover:text-white transition-colors duration-300" rel="nofollow" aria-label="View our privacy policy">Privacy Policy</a>
          <a href="/terms-of-service" class="text-blue-100 hover:text-white transition-colors duration-300" rel="nofollow" aria-label="View our terms of service">Terms of Service</a>
          <a href="/cookie-policy" class="text-blue-100 hover:text-white transition-colors duration-300" rel="nofollow" aria-label="View our cookie policy">Cookie Policy</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Schema.org structured data for the organization -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "LocalBusiness",
    "name": "{{ $settings['site_name'] ?? 'WhistlerSkySports' }}",
    "description": "Experience the dream of flight training on our ultralight aircraft at Whistler Sky sports.",
    "url": "{{ url('/') }}",
    "logo": "{{ asset('images/logo/Whistler-Sky-Sports_Full-Black.png') }}",
    "image": "{{ asset('images/hero-section.png') }}",
    "telephone": "{{ $settings['phone_number'] ?? '+1 (604) 123-4567' }}",
    "email": "{{ $settings['contact_email'] ?? 'info@whistlerskysports.ca' }}",
    "address": {
      "@type": "PostalAddress",
      "streetAddress": "{{ $settings['address'] ?? '123 Street Name' }}",
      "addressLocality": "{{ $settings['city'] ?? 'Whistler' }}",
      "addressRegion": "{{ $settings['province'] ?? 'BC' }}",
      "addressCountry": "CA",
      "postalCode": "{{ $settings['postal_code'] ?? 'V8E 0A3' }}"
    },
    "geo": {
      "@type": "GeoCoordinates",
      "latitude": "50.1386",
      "longitude": "-122.9494"
    },
    "openingHoursSpecification": [
      {
        "@type": "OpeningHoursSpecification",
        "dayOfWeek": ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"],
        "opens": "08:00",
        "closes": "18:00"
      }
    ],
    "priceRange": "$$$",
    "sameAs": [
      {{ isset($settings['facebook_url']) && !empty($settings['facebook_url']) ? '"'.$settings['facebook_url'].'",' : '' }}
      {{ isset($settings['instagram_url']) && !empty($settings['instagram_url']) ? '"'.$settings['instagram_url'].'",' : '' }}
      {{ isset($settings['twitter_url']) && !empty($settings['twitter_url']) ? '"'.$settings['twitter_url'].'",' : '' }}
      {{ isset($settings['youtube_url']) && !empty($settings['youtube_url']) ? '"'.$settings['youtube_url'].'"' : '' }}
    ]
  }
  </script>
</footer>