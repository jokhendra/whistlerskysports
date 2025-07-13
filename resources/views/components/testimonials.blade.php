<div class="bg-gradient-to-b from-sky-50 to-white py-24">
  <div class="container mx-auto px-4">
    <!-- Testimonials Header -->
    <div class="flex flex-col items-center justify-center mb-16 text-center">
      <h1 class="text-4xl md:text-5xl font-bold text-sky-800 mb-4">What Our Flyers Say</h1>
      <div class="w-24 h-1 bg-amber-500 mb-6"></div>
      <p class="text-lg text-gray-600 max-w-2xl">
        Hear from our community of passionate Flyers who have experienced the thrill and freedom on our ultralight aircraft.
      </p>
    </div>

    @php
    // Fetch only approved reviews from the database
    $approvedReviews = App\Models\Review::where('status', 'approved')->get();
    
    // Transform reviews into testimonial format
    $testimonials = $approvedReviews->map(function($review, $index) {
        // Calculate years of experience based on flight date if available
        $yearsFlying = $review->flight_date ? now()->diffInYears($review->flight_date) : 1;
        $yearsFlying = max($yearsFlying, 1); // At least 1 year
        
        // Extract profession type from aircraft type if available
        $professionType = 'Flying Enthusiast';
        if ($review->aircraft_type && is_array($review->aircraft_type)) {
            if (in_array('XP-2000', $review->aircraft_type) || in_array('Hang Glider', $review->aircraft_type)) {
                $professionType = 'Adventure Seeker';
            } elseif (in_array('SkyRider Pro', $review->aircraft_type) || in_array('Professional', $review->aircraft_type)) {
                $professionType = 'Professional Pilot';
            } elseif (in_array('AeroLite', $review->aircraft_type) || in_array('Beginner', $review->aircraft_type)) {
                $professionType = 'Weekend Enthusiast';
            }
        }
        
        // Calculate overall rating if rating field is not available
        $rating = $review->rating ?? 0;
        if ($rating == 0 && $review->instructor_rating && $review->fun_rating && $review->safety_rating) {
            $rating = round(($review->instructor_rating + $review->fun_rating + $review->safety_rating) / 3);
        }
        if ($rating == 0) {
            $rating = 5; // Default if no ratings available
        }
        
        // Create a proper testimonial object from the review
        return [
            'id' => $review->id,
            'name' => $review->name,
            'profession' => $professionType . ' | ' . $yearsFlying . ' ' . ($yearsFlying == 1 ? 'year' : 'years') . ' flying',
            'image' => $review->image_url ?? 'https://ui-avatars.com/api/?name=' . urlencode($review->name) . '&background=random',
            'coverImage' => 'https://images.unsplash.com/photo-' . (1500000000 + $review->id * 7331) . '?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
            'rating' => $rating,
            'review' => $review->feedback,
            'product' => is_array($review->aircraft_type) ? implode(', ', $review->aircraft_type) : 'Ultralight Aircraft',
            'location' => ['lat' => 50.1163, 'lng' => -122.9574],
            'address' => 'Whistler, BC, Canada',
            'media_upload' => $review->media_url ?? null
        ];
    })->all();
    @endphp

    <!-- Modern Testimonials Carousel -->
    <div 
      x-data="{ 
        activeTestimonial: null,
        testimonials: {{ json_encode($testimonials) }},
        currentSlide: 0,
        totalSlides: {{ count($testimonials) }},
        slidesToShow: 3,
        autoplayInterval: null,
        
        init() {
          this.updateSlidesToShow();
          this.startAutoplay();
          window.addEventListener('resize', () => this.updateSlidesToShow());
        },
        
        updateSlidesToShow() {
          if (window.innerWidth < 640) {
            this.slidesToShow = 1;
          } else if (window.innerWidth < 1024) {
            this.slidesToShow = 2;
          } else {
            this.slidesToShow = 3;
          }
        },
        
        startAutoplay() {
          if (this.testimonials.length > this.slidesToShow) {
            this.autoplayInterval = setInterval(() => {
              this.nextSlide();
            }, 5000);
          }
        },
        
        stopAutoplay() {
          if (this.autoplayInterval) {
            clearInterval(this.autoplayInterval);
          }
        },
        
        nextSlide() {
          if (this.testimonials.length <= this.slidesToShow) return;
          
          this.currentSlide = (this.currentSlide + 1) % (this.testimonials.length - this.slidesToShow + 1);
        },
        
        prevSlide() {
          if (this.testimonials.length <= this.slidesToShow) return;
          
          this.currentSlide = this.currentSlide === 0 
            ? this.testimonials.length - this.slidesToShow 
            : this.currentSlide - 1;
        },
        
        isVisible(index) {
          return index >= this.currentSlide && index < this.currentSlide + this.slidesToShow;
        }
      }" 
      @mouseover="stopAutoplay()"
      @mouseleave="startAutoplay()"
      class="relative w-full max-w-7xl mx-auto"
    >
      @if(count($testimonials) > 0)
        <!-- Testimonial Carousel -->
        <div class="relative overflow-hidden">
          <div class="relative">
            <!-- Cards Container with transform transition -->
            <div 
              class="flex transition-transform duration-500 ease-in-out"
              :style="`transform: translateX(-${currentSlide * (100 / slidesToShow)}%)`"
            >
              <template x-for="(testimonial, index) in testimonials" :key="testimonial.id">
                <div 
                  class="w-full sm:w-1/2 lg:w-1/3 flex-shrink-0 px-4 transition-opacity duration-500" 
                  :class="{ 'opacity-100': isVisible(index), 'opacity-0': !isVisible(index) }"
                >
                  <!-- Testimonial Card -->
                  <div 
                    @click="activeTestimonial = testimonial"
                    class="group cursor-pointer bg-white rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 overflow-hidden h-full"
                  >
                    <!-- Top Decoration Bar - Color based on index -->
                    <div 
                      :class="{
                        'bg-sky-500': index % 3 === 0,
                        'bg-amber-500': index % 3 === 1,
                        'bg-red-400': index % 3 === 2
                      }"
                      class="h-2 w-full"
                    ></div>
                    
                    <div class="p-8">
                      <!-- Quote Icon -->
                      <div :class="{
                          'text-sky-300': index % 3 === 0,
                          'text-amber-300': index % 3 === 1,
                          'text-red-300': index % 3 === 2
                        }"
                        class="mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="currentColor" viewBox="0 0 24 24">
                          <path d="M9.983 3v7.391c0 5.704-3.731 9.57-8.983 10.609l-.995-2.151c2.432-.917 3.995-3.638 3.995-5.849h-4v-10h9.983zm14.017 0v7.391c0 5.704-3.748 9.571-9 10.609l-.996-2.151c2.433-.917 3.996-3.638 3.996-5.849h-3.983v-10h9.983z"/>
                        </svg>
                      </div>

                      <!-- Rating Stars -->
                      <div class="flex mb-4">
                        <template x-for="i in 5" :key="i">
                          <svg 
                            xmlns="http://www.w3.org/2000/svg" 
                            class="h-5 w-5" 
                            :class="i <= testimonial.rating ? 'text-amber-400' : 'text-gray-200'"
                            viewBox="0 0 20 20" 
                            fill="currentColor"
                          >
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                          </svg>
                        </template>
                      </div>
                      
                      <!-- Review Text with Truncation -->
                      <p class="text-gray-600 mb-6 line-clamp-3" x-text="testimonial.review"></p>
                      
                      <div class="mt-auto flex items-center pt-4 border-t border-gray-100">
                        <img :src="testimonial.image" :alt="testimonial.name" class="w-12 h-12 rounded-full border-2 border-white shadow object-contain">
                        <div class="ml-4">
                          <h4 class="font-semibold text-gray-800" x-text="testimonial.name"></h4>
                          <p class="text-xs text-gray-500" x-text="testimonial.profession"></p>
                        </div>
                      </div>
                      
                      <!-- Read More Button -->
                      <div class="mt-4 text-center">
                        <span 
                          :class="{
                            'text-sky-600 hover:text-sky-700': index % 3 === 0,
                            'text-amber-600 hover:text-amber-700': index % 3 === 1,
                            'text-red-600 hover:text-red-700': index % 3 === 2
                          }" 
                          class="inline-block text-sm font-semibold"
                        >
                          Read Full Review
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </template>
            </div>
          </div>
          
          <!-- Navigation Controls -->
          <div class="flex justify-center items-center mt-10 space-x-4">
            <template x-if="testimonials.length > slidesToShow">
              <!-- Prev Button -->
              <button 
                @click.prevent="prevSlide()" 
                class="p-2 rounded-full bg-sky-100 text-sky-700 hover:bg-sky-200 focus:outline-none focus:ring-2 focus:ring-sky-500 transition-all duration-200"
                :disabled="currentSlide === 0"
                :class="{ 'opacity-50 cursor-not-allowed': currentSlide === 0 }"
              >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
              </button>
              
              <!-- Slide Indicators -->
              <div class="flex space-x-2">
                <template x-for="(_, index) in Array.from({ length: testimonials.length - slidesToShow + 1 })" :key="index">
                  <button 
                    @click="currentSlide = index" 
                    class="w-3 h-3 rounded-full transition-all duration-200"
                    :class="currentSlide === index ? 'bg-sky-600' : 'bg-gray-300 hover:bg-gray-400'"
                  ></button>
                </template>
              </div>
              
              <!-- Next Button -->
              <button 
                @click.prevent="nextSlide()" 
                class="p-2 rounded-full bg-sky-100 text-sky-700 hover:bg-sky-200 focus:outline-none focus:ring-2 focus:ring-sky-500 transition-all duration-200"
                :disabled="currentSlide >= testimonials.length - slidesToShow"
                :class="{ 'opacity-50 cursor-not-allowed': currentSlide >= testimonials.length - slidesToShow }"
              >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
              </button>
            </template>
          </div>
        </div>
      @else
        <!-- Empty State Message - Show when no approved reviews -->
        <div class="bg-white rounded-xl shadow-lg p-10 text-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-sky-300 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
          <h3 class="text-xl text-gray-700 font-semibold mb-2">No reviews available yet</h3>
          <p class="text-gray-500 mb-6">Be the first to share your amazing flying experience!</p>
          <a href="{{ route('reviews.index') }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-sky-600 hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500 transition-colors duration-200">
            Submit a Review
            <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
            </svg>
          </a>
        </div>
      @endif

      <!-- Enhanced Testimonial Detail Modal -->
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
          class="fixed inset-0 bg-black/60 backdrop-blur-sm" 
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
            class="relative bg-white rounded-3xl shadow-2xl max-w-2xl w-full mx-auto overflow-hidden"
            x-transition:enter="transition ease-out duration-300 transform"
            x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-300 transform"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95"
            @click.away="activeTestimonial = null"
          >
            <!-- Modal Header with Background Image -->
            <div class="h-32 bg-gradient-to-r from-sky-500 to-indigo-600 relative">
              <div class="absolute inset-0 opacity-20" :style="`background-image: url('${activeTestimonial?.coverImage}'); background-size: cover; background-position: center;`"></div>
              <button 
                @click="activeTestimonial = null"
                class="absolute top-4 right-4 text-white bg-black/20 hover:bg-black/30 p-2 rounded-full focus:outline-none transition-all duration-200"
              >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
              </button>
            </div>

            <!-- User Profile Image (Overlapping Header) -->
            <div class="relative z-20 flex justify-center -mt-16">
              <img :src="activeTestimonial?.image" :alt="activeTestimonial?.name" class="w-28 h-28 rounded-full border-4 border-white shadow-xl object-contain">
            </div>

            <!-- Modal Body -->
            <div class="p-8 pt-4">
              <!-- User Info -->
              <div class="text-center mb-6">
                <h3 class="text-2xl font-bold text-gray-800" x-text="activeTestimonial?.name"></h3>
                <p class="text-sm text-gray-600" x-text="activeTestimonial?.profession"></p>
              </div>

              <!-- Rating Stars -->
              <div class="flex justify-center mb-6">
                <template x-for="i in 5" :key="i">
                  <svg 
                    xmlns="http://www.w3.org/2000/svg" 
                    class="h-6 w-6" 
                    :class="i <= activeTestimonial?.rating ? 'text-amber-400' : 'text-gray-300'"
                    viewBox="0 0 20 20" 
                    fill="currentColor"
                  >
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>
                </template>
              </div>

              <!-- Quote Icon -->
              <div class="text-sky-300 mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mx-auto" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M9.983 3v7.391c0 5.704-3.731 9.57-8.983 10.609l-.995-2.151c2.432-.917 3.995-3.638 3.995-5.849h-4v-10h9.983zm14.017 0v7.391c0 5.704-3.748 9.571-9 10.609l-.996-2.151c2.433-.917 3.996-3.638 3.996-5.849h-3.983v-10h9.983z"/>
                </svg>
              </div>

              <!-- Review Text -->
              <p class="text-gray-600 text-lg leading-relaxed mb-8 italic text-center px-4" x-text="activeTestimonial?.review"></p>

              <!-- Product Info -->
              <div class="text-sm text-sky-700 font-semibold text-center mb-6">
                Flying the <span x-text="activeTestimonial?.product"></span>
              </div>

              <!-- Location -->
              <div class="flex items-center justify-center text-sm text-gray-500 mb-8">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <span x-text="activeTestimonial?.address"></span>
              </div>

              <!-- Media Upload (if available) -->
              <template x-if="activeTestimonial?.media_upload">
                <div class="mt-6">
                  <div class="relative rounded-xl overflow-hidden shadow-md">
                    <img 
                      :src="activeTestimonial?.media_upload" 
                      class="w-full h-64 object-cover"
                      alt="User shared media"
                      x-on:error="$event.target.style.display = 'none'"
                    />
                    <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent p-4">
                      <span class="text-white text-sm font-medium">Shared by <span x-text="activeTestimonial?.name"></span></span>
                    </div>
                  </div>
                </div>
              </template>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>