<div class="bg-sky-50 py-16">
  <div class="container mx-auto px-4">
    <!-- Testimonials Header -->
    <div class="flex flex-col items-center justify-center mb-12 text-center">
      <h1 class="text-4xl font-bold text-sky-800 mb-4">What Our Flyers Say</h1>
      <div class="w-24 h-1 bg-amber-500 mb-6"></div>
      <p class="text-lg text-gray-600 max-w-2xl">
        Hear from our community of passionate Flyers who have experienced the thrill and freedom on our ultralight aircraft.
      </p>
    </div>

    <!-- Testimonials Grid -->
    <div x-data="{ 
      activeTestimonial: null,
      currentPage: 0,
      autoplayInterval: null,
      autoplayDelay: 5000,
      testimonials: [
        {
          id: 1,
          name: 'Monmohan PV',
          profession: 'Adventure Seeker | 3 years flying',
          image: 'https://i.pravatar.cc/150?img=1',
          coverImage: 'https://images.unsplash.com/photo-1507608616759-54f48f0af0ee?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
          rating: 5,
          review: 'The power hang glider I purchased has completely transformed my flying experience. The engine is reliable, the controls are responsive, and the feeling of soaring through the clouds is indescribable. Best investment I\'ve ever made!',
          product: 'XP-2000 Power Glider',
          location: { lat: 50.1163, lng: -122.9574 },
          address: 'Whistler, BC, Canada'
        },
        {
          id: 2,
          name: 'Ajith PV',
          profession: 'Professional Pilot | 7 years flying',
          image: 'https://i.pravatar.cc/150?img=2',
          coverImage: 'https://images.unsplash.com/photo-1503220317375-aaad61436b1b?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
          rating: 5,
          review: 'As a professional pilot, I\'m extremely particular about my equipment. The SkyRider Pro exceeded all my expectations. The fuel efficiency is remarkable, and I\'ve been able to explore areas I never thought possible. The customer service team was also incredibly helpful with my questions.',
          product: 'SkyRider Pro',
          location: { lat: 99.1163, lng: -122.9574 },
          address: 'Whistler, BC, Canada'
        },
        {
          id: 3,
          name: 'Sarbjit',
          profession: 'Weekend Enthusiast | 1 year flying',
          image: 'https://i.pravatar.cc/150?img=3',
          coverImage: 'https://images.unsplash.com/photo-1534786568720-8a8fce34e7e6?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
          rating: 4.5,
          review: 'As a beginner, I was nervous about investing in a power hang glider, but the AeroLite has been perfect for learning. It\'s stable, forgiving, and the training program that came with it was invaluable. I\'m now confidently flying every weekend and exploring new territories!',
          product: 'AeroLite Beginner Model',
          location: { lat: 50.1163, lng: -122.9574 },
          address: 'Whistler, BC, Canada'
        },
        {
          id: 4,
          name: 'Tabor',
          profession: 'Photography Enthusiast | 2 years flying',
          image: 'https://i.pravatar.cc/150?img=4',
          coverImage: 'https://images.unsplash.com/photo-1506012787146-f92b2d7d6d96?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
          rating: 5,
          review: 'As an aerial photographer, I needed something stable and reliable. The camera mount options and smooth flight characteristics make this the perfect platform for my aerial photography work. The views from up here are absolutely breathtaking!',
          product: 'SkyRider Pro Photography Edition',
          location: { lat: 50.1163, lng: -122.9574 },
          address: 'Whistler, BC, Canada'
        },
        {
          id: 5,
          name: 'Denise Sanders',
          profession: 'Mountain Guide | 5 years flying',
          image: 'https://i.pravatar.cc/150?img=5',
          coverImage: 'https://images.unsplash.com/photo-1519181245277-cffeb31da2e3?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
          rating: 5,
          review: 'Using the power hang glider for mountain tours has revolutionized our guide service. The reliability in high altitudes and the safety features give both me and my clients complete confidence. The training support from the team was exceptional.',
          product: 'XP-2000 Mountain Explorer',
          location: { lat: 50.1163, lng: -122.9574 },
          address: 'Whistler, BC, Canada'
        },
        {
          id: 6,
          name: 'Denny Redd',
          profession: 'Competition Pilot | 4 years flying',
          image: 'https://i.pravatar.cc/150?img=6',
          coverImage: 'https://images.unsplash.com/photo-1502236876560-243b31dc5377?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
          rating: 4.5,
          review: 'The performance capabilities of this glider are outstanding. I\'ve won several competitions thanks to its precise handling and excellent speed range. The build quality is superb, and it handles challenging conditions with ease.',
          product: 'SkyRider Pro Competition',
          location: { lat: 50.1163, lng: -122.9574 },
          address: 'Whistler, BC, Canada'
        },
        {
          id: 7,
          name: 'Abid',
          profession: 'Adventure Tourism | 6 years flying',
          image: 'https://i.pravatar.cc/150?img=7',
          coverImage: 'https://images.unsplash.com/photo-1533577116850-9cc66cad8a9b?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
          rating: 5,
          review: 'Running adventure tours requires equipment that\'s both exciting and safe. This power hang glider delivers on both fronts. Our customers consistently rate their flying experience as the highlight of their trip. The durability is impressive too - it handles daily use beautifully.',
          product: 'XP-2000 Tourism Plus',
          location: { lat: 50.1163, lng: -122.9574 },
          address: 'Whistler, BC, Canada'
        },
        {
          id: 8,
          name: 'Kevin',
          profession: 'Flight Instructor | 8 years flying',
          image: 'https://i.pravatar.cc/150?img=8',
          coverImage: 'https://images.unsplash.com/photo-1517358888878-e5b99422f909?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
          rating: 5,
          review: 'Teaching new pilots requires a forgiving yet capable aircraft. The dual control system is perfectly designed for instruction, and the safety features give my students confidence. The comprehensive manual and support materials make my job much easier.',
          product: 'AeroLite Instructor Edition',
          location: { lat: 50.1163, lng: -122.9574 },
          address: 'Whistler, BC, Canada'
        },
        {
          id: 9,
          name: 'Taru',
          profession: 'Nature Photographer | 3 years flying',
          image: 'https://i.pravatar.cc/150?img=9',
          coverImage: 'https://images.unsplash.com/photo-1526285849717-482456cd7436?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
          rating: 4.5,
          review: 'The stability and maneuverability make this perfect for wildlife photography. I can quietly observe without disturbing the animals, and the range lets me access remote locations. The storage compartments are perfectly designed for camera gear.',
          product: 'SkyRider Pro Wildlife Edition',
          location: { lat: 50.1163, lng: -122.9574 },
          address: 'Whistler, BC, Canada'
        },
        {
          id: 10,
          name: 'Antory vella',
          profession: 'Adventure Seeker | 2 years flying',
          image: 'https://i.pravatar.cc/150?img=10',
          coverImage: 'https://images.unsplash.com/photo-1507608616759-54f48f0af0ee?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
          rating: 5,
          review: 'The power hang glider has opened up new possibilities for adventure. The reliability and performance are exceptional, making every flight an unforgettable experience. The customer support team is always ready to help with any questions.',
          product: 'XP-2000 Power Glider',
          location: { lat: 50.1163, lng: -122.9574 },
          address: 'Whistler, BC, Canada'
        },
        {
          id: 11,
          name: 'C lint Chales',
          profession: 'Professional Pilot | 5 years flying',
          image: 'https://i.pravatar.cc/150?img=11',
          coverImage: 'https://images.unsplash.com/photo-1503220317375-aaad61436b1b?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
          rating: 5,
          review: 'As a professional pilot, I demand the best equipment. The SkyRider Pro delivers exceptional performance and reliability. The advanced features and safety systems give me complete confidence in every flight.',
          product: 'SkyRider Pro',
          location: { lat: 50.1163, lng: -122.9574 },
          address: 'Whistler, BC, Canada'
        },
        {
          id: 12,
          name: 'Gurpreet Dhindsa',
          profession: 'Weekend Enthusiast | 1 year flying',
          image: 'https://i.pravatar.cc/150?img=12',
          coverImage: 'https://images.unsplash.com/photo-1534786568720-8a8fce34e7e6?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
          rating: 4.5,
          review: 'The AeroLite is perfect for beginners like me. The stability and ease of control make learning to fly a joy. The comprehensive training program and support materials have been invaluable in my journey.',
          product: 'AeroLite Beginner Model',
          location: { lat: 50.1163, lng: -122.9574 },
          address: 'Whistler, BC, Canada'
        },
        {
          id: 13,
          name: 'Flytemple Pilots',
          profession: 'Flight School | 10 years flying',
          image: 'https://i.pravatar.cc/150?img=13',
          coverImage: 'https://images.unsplash.com/photo-1506012787146-f92b2d7d6d96?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
          rating: 5,
          review: 'As a flight school, we need reliable equipment for training. The dual control system and safety features make this perfect for instruction. Our students consistently praise the stability and responsiveness.',
          product: 'AeroLite Instructor Edition',
          location: { lat: 50.1163, lng: -122.9574 },
          address: 'Whistler, BC, Canada'
        },
        {
          id: 14,
          name: 'Varun Suhag',
          profession: 'Adventure Tourism | 4 years flying',
          image: 'https://i.pravatar.cc/150?img=14',
          coverImage: 'https://images.unsplash.com/photo-1519181245277-cffeb31da2e3?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
          rating: 5,
          review: 'Running adventure tours requires equipment that\'s both exciting and safe. This power hang glider delivers on both fronts. Our customers consistently rate their flying experience as the highlight of their trip.',
          product: 'XP-2000 Tourism Plus',
          location: { lat: 50.1163, lng: -122.9574 },
          address: 'Whistler, BC, Canada'
        },
        {
          id: 15,
          name: 'Larry Mednick',
          profession: 'Professional Pilot | 6 years flying',
          image: 'https://i.pravatar.cc/150?img=15',
          coverImage: 'https://images.unsplash.com/photo-1502236876560-243b31dc5377?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
          rating: 5,
          review: 'The performance and reliability of this glider are outstanding. I\'ve used it for both recreational flying and professional purposes. The build quality and safety features give me complete confidence in every flight.',
          product: 'SkyRider Pro Competition',
          location: { lat: 50.1163, lng: -122.9574 },
          address: 'Whistler, BC, Canada'
        },
        {
          id: 16,
          name: 'Paul Hamilton',
          profession: 'Nature Photographer | 3 years flying',
          image: 'https://i.pravatar.cc/150?img=16',
          coverImage: 'https://images.unsplash.com/photo-1533577116850-9cc66cad8a9b?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
          rating: 4.5,
          review: 'The stability and maneuverability make this perfect for wildlife photography. I can quietly observe without disturbing the animals, and the range lets me access remote locations.',
          product: 'SkyRider Pro Wildlife Edition',
          location: { lat: 50.1163, lng: -122.9574 },
          address: 'Whistler, BC, Canada'
        },
        {
          id: 17,
          name: 'Rob Albright',
          profession: 'Adventure Seeker | 2 years flying',
          image: 'https://i.pravatar.cc/150?img=17',
          coverImage: 'https://images.unsplash.com/photo-1517358888878-e5b99422f909?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
          rating: 5,
          review: 'The power hang glider has transformed my flying experience. The engine is reliable, the controls are responsive, and the feeling of soaring through the clouds is indescribable.',
          product: 'XP-2000 Power Glider',
          location: { lat: 50.1163, lng: -122.9574 },
          address: 'Whistler, BC, Canada'
        },
        {
          id: 18,
          name: 'Airflo',
          profession: 'Flight School | 8 years flying',
          image: 'https://i.pravatar.cc/150?img=18',
          coverImage: 'https://images.unsplash.com/photo-1526285849717-482456cd7436?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
          rating: 5,
          review: 'As a flight school, we need reliable equipment for training. The dual control system and safety features make this perfect for instruction. Our students consistently praise the stability and responsiveness.',
          product: 'AeroLite Instructor Edition',
          location: { lat: 50.1163, lng: -122.9574 },
          address: 'Whistler, BC, Canada'
        }
      ],
      init() {
        this.startAutoplay();
        this.loadGoogleMaps();
      },
      startAutoplay() {
        this.autoplayInterval = setInterval(() => {
          this.nextPage();
        }, this.autoplayDelay);
      },
      stopAutoplay() {
        clearInterval(this.autoplayInterval);
      },
      nextPage() {
        this.currentPage = (this.currentPage + 1) % Math.ceil(this.testimonials.length / 3);
      },
      prevPage() {
        this.currentPage = (this.currentPage - 1 + Math.ceil(this.testimonials.length / 3)) % Math.ceil(this.testimonials.length / 3);
      },
      get visibleTestimonials() {
        const start = this.currentPage * 3;
        return this.testimonials.slice(start, start + 3);
      },
      loadGoogleMaps() {
        if (typeof google === 'undefined') {
          const script = document.createElement('script');
          script.src = `https://maps.googleapis.com/maps/api/js?key=AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg`;
          script.async = true;
          script.defer = true;
          document.head.appendChild(script);
        }
      }
    }" 
    @mouseover="stopAutoplay" 
    @mouseleave="startAutoplay"
    class="relative max-w-5xl mx-auto"
    >
      <!-- Navigation Buttons -->
      <button 
        @click="prevPage"
        class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-6 bg-white p-3 rounded-full shadow-lg hover:bg-gray-50 focus:outline-none z-10 transition duration-300 hover:scale-110"
      >
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
      </button>

      <button 
        @click="nextPage"
        class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-6 bg-white p-3 rounded-full shadow-lg hover:bg-gray-50 focus:outline-none z-10 transition duration-300 hover:scale-110"
      >
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
      </button>

      <!-- Testimonials Grid with Transition -->
      <div 
        class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 overflow-hidden"
        x-transition:enter="transition ease-out duration-500"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
      >
        <template x-for="testimonial in visibleTestimonials" :key="testimonial.id">
          <div 
            @click="activeTestimonial = testimonial; stopAutoplay();"
            class="bg-white rounded-xl shadow-lg overflow-hidden cursor-pointer transform transition duration-300 hover:scale-105 hover:shadow-xl p-4"
          >
            <div class="flex flex-col items-center text-center">
              <img :src="testimonial.image" :alt="testimonial.name" class="w-20 h-20 rounded-full border-4 border-white shadow-lg mb-3">
              <div>
                <h3 class="font-bold text-gray-800 text-base mb-1" x-text="testimonial.name"></h3>
                <p class="text-sm text-gray-600" x-text="testimonial.profession"></p>
              </div>
            </div>
          </div>
        </template>
      </div>

      <!-- Page Indicators -->
      <div class="flex justify-center mt-8 space-x-2">
        <template x-for="(_, index) in Array.from({ length: Math.ceil(testimonials.length / 3) })" :key="index">
          <button 
            @click="currentPage = index"
            :class="{'bg-amber-500': currentPage === index, 'bg-gray-300': currentPage !== index}"
            class="w-3 h-3 rounded-full transition-all duration-300 hover:bg-amber-400"
          ></button>
        </template>
      </div>

      <!-- Testimonial Modal -->
      <div
        x-show="activeTestimonial !== null"
        x-cloak
        class="fixed inset-0 z-50 overflow-y-auto"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        style="display: none;"
      >
        <!-- Modal Backdrop -->
        <div 
          class="fixed inset-0 bg-black/50 backdrop-blur-sm" 
          @click="activeTestimonial = null"
          x-transition:enter="transition ease-out duration-300"
          x-transition:enter-start="opacity-0"
          x-transition:enter-end="opacity-100"
          x-transition:leave="transition ease-in duration-300"
          x-transition:leave-start="opacity-100"
          x-transition:leave-end="opacity-0"
        ></div>

        <!-- Modal Content -->
        <div class="relative min-h-screen flex items-center justify-center p-4">
          <div
            class="relative bg-white rounded-3xl shadow-2xl max-w-lg w-full mx-auto"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            @click.away="activeTestimonial = null"
          >
            <!-- Speech Bubble Pointer -->
            <div class="absolute -bottom-4 left-1/2 -translate-x-1/2 w-8 h-8 bg-white transform rotate-45"></div>

            <!-- Modal Body -->
            <div class="p-8 relative">
              <!-- Close Button -->
              <button 
                @click="activeTestimonial = null"
                class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 focus:outline-none"
              >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
              </button>

              <!-- User Info -->
              <div class="flex items-center space-x-4 mb-6">
                <img :src="activeTestimonial?.image" :alt="activeTestimonial?.name" class="w-16 h-16 rounded-full border-4 border-white shadow-lg">
                <div>
                  <h3 class="text-xl font-bold text-gray-800" x-text="activeTestimonial?.name"></h3>
                  <p class="text-sm text-gray-600" x-text="activeTestimonial?.profession"></p>
                </div>
              </div>

              <!-- Rating Stars -->
              <div class="flex mb-4">
                <template x-for="i in 5" :key="i">
                  <svg 
                    xmlns="http://www.w3.org/2000/svg" 
                    class="h-5 w-5" 
                    :class="i <= activeTestimonial?.rating ? 'text-amber-400' : 'text-gray-300'"
                    viewBox="0 0 20 20" 
                    fill="currentColor"
                  >
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>
                </template>
              </div>

              <!-- Review Text -->
              <p class="text-gray-600 text-base leading-relaxed mb-6" x-text="activeTestimonial?.review"></p>

              <!-- Product Info -->
              <div class="text-sm text-sky-700 font-semibold mb-6">
                Flying the <span x-text="activeTestimonial?.product"></span>
              </div>

              <!-- Location Map -->
              <div class="mt-6">
                <h4 class="text-lg font-semibold text-gray-800 mb-3">Location</h4>
                <div 
                  x-show="activeTestimonial?.location"
                  class="relative h-48 rounded-lg overflow-hidden group"
                >
                  <iframe
                    x-show="activeTestimonial?.location"
                    :src="'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3168.639290621064!2d' + activeTestimonial?.location?.lng + '!3d' + activeTestimonial?.location?.lat + '!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808fba02425dad8f%3A0x29cdf01a44fc687f!2s' + encodeURIComponent(activeTestimonial?.address) + '!5e0!3m2!1sen!2sus!4v1649285324079!5m2!1sen!2sus'"
                    width="100%"
                    height="100%"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    class="rounded-lg"
                  ></iframe>
                </div>
                <div class="flex items-center space-x-2 mt-2">
                  <p class="text-sm text-gray-600" x-text="activeTestimonial?.address"></p>
                  <span class="text-xl">🇨🇦</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Call to Action -->
    <div class="mt-16 text-center">
      <a href="{{ route('booking') }}" class="inline-block px-8 py-4 bg-[#FF0000] text-white font-bold rounded-lg shadow-lg hover:bg-[#CC0000] transition duration-300 transform hover:scale-105 relative overflow-hidden group">
        <!-- Cloud animations -->
        <div class="cloud-animation">
          <div class="cloud cloud-1"></div>
          <div class="cloud cloud-2"></div>
          <div class="cloud cloud-3"></div>
        </div>
        
        <!-- Flying animation elements -->
        <span class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></span>
        <span class="absolute inset-0 bg-gradient-to-r from-transparent via-white/10 to-transparent translate-x-full group-hover:-translate-x-full transition-transform duration-1000 delay-200"></span>
        <span class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000 delay-400"></span>
        
        <!-- Text with relative positioning to stay above animations -->
        <span class="relative z-10 flex items-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 animate-bounce" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z" />
          </svg>
          Conquer the Skies Above Whistler
        </span>
      </a>
    </div>
  </div>
</div>

