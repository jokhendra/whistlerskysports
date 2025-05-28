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

    <!-- Testimonials Grid -->
    <div 
      x-data="{ 
        activeTestimonial: null,
        testimonials: {{ json_encode($testimonials) }},
        positionedTestimonials: {
          adventure: [],
          professional: [],
          photography: []
        },
        init() {
          this.loadGoogleMaps();
          this.positionTestimonials();
        },
        loadGoogleMaps() {
          if (typeof google === 'undefined') {
            const script = document.createElement('script');
            script.src = `https://maps.googleapis.com/maps/api/js?key={{ config('services.google.maps_key', '') }}`;
            script.async = true;
            script.defer = true;
            document.head.appendChild(script);
          }
        },
        positionTestimonials() {
          // Split testimonials into three even groups based on index
          const total = this.testimonials.length;
          const allTestimonials = [...this.testimonials];
          
          // Shuffle the array to randomize distribution
          for (let i = allTestimonials.length - 1; i > 0; i--) {
            const j = Math.floor(Math.random() * (i + 1));
            [allTestimonials[i], allTestimonials[j]] = [allTestimonials[j], allTestimonials[i]];
          }
          
          // Calculate the size for each container, ensuring at least some items in each
          const third = Math.max(1, Math.floor(total / 3));
          
          // Position adventure testimonials (first third)
          this.positionedTestimonials.adventure = this.positionItems(
            allTestimonials.slice(0, third),
            500, 500, 80, 80, 40
          );
          
          // Position professional testimonials (second third)
          this.positionedTestimonials.professional = this.positionItems(
            allTestimonials.slice(third, third * 2),
            500, 500, 80, 80, 40
          );
          
          // Position photography testimonials (final third + any remainder)
          this.positionedTestimonials.photography = this.positionItems(
            allTestimonials.slice(third * 2),
            500, 500, 80, 80, 40
          );
        },
        positionItems(items, containerWidth, containerHeight, itemWidth, itemHeight, padding = 20) {
          const positioned = [];
          const maxAttempts = 100;
          const paddedWidth = containerWidth - padding * 2;
          const paddedHeight = containerHeight - padding * 2;
          
          for (const item of items) {
            let attempts = 0;
            let positionFound = false;
            let x, y;
            
            while (attempts < maxAttempts && !positionFound) {
              attempts++;
              
              x = padding + Math.random() * (paddedWidth - itemWidth);
              y = padding + Math.random() * (paddedHeight - itemHeight);
              
              let collision = false;
              for (const existing of positioned) {
                if (
                  x < existing.x + itemWidth &&
                  x + itemWidth > existing.x &&
                  y < existing.y + itemHeight &&
                  y + itemHeight > existing.y
                ) {
                  collision = true;
                  break;
                }
              }
              
              if (!collision) {
                positionFound = true;
              }
            }
            
            if (positionFound) {
              positioned.push({
                ...item,
                x,
                y
              });
            } else {
              positioned.push({
                ...item,
                x: padding + Math.random() * (paddedWidth - itemWidth),
                y: padding + Math.random() * (paddedHeight - itemHeight)
              });
            }
          }
          
          return positioned;
        }
      }" 
      class="relative w-full"
    >
      @if(count($testimonials) > 0)
        <!-- Testimonials Row with Color Blur Effects -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 w-full">
          <!-- Blue Blur Column -->
          <div class="relative w-full">
            <div class="absolute inset-0 bg-blue-100 rounded-2xl blur-xl opacity-70"></div>
            <div class="relative rounded-2xl p-6 h-[600px] overflow-hidden">
              <div class="relative h-[500px] w-full">
                <template x-for="testimonial in positionedTestimonials.adventure" :key="testimonial.id">
                  <div 
                    @click="activeTestimonial = testimonial"
                    class="cursor-pointer transform transition-all duration-500 hover:scale-110 absolute group"
                    :style="'left: ' + testimonial.x + 'px; top: ' + testimonial.y + 'px; z-index: ' + Math.floor(Math.random() * 10) + ';'"
                  >
                    <div class="relative">
                      <div class="flex items-center justify-center w-10 h-10 bg-blue-100 rounded-full border-2 border-white shadow-md group-hover:shadow-xl group-hover:border-blue-300 transition-all duration-300">
                        <span class="text-xl">📍</span>
                      </div>
                      <div class="absolute -bottom-8 left-1/2 transform -translate-x-1/2 bg-white text-gray-800 rounded-lg px-2 py-1 text-xs font-semibold shadow-md opacity-0 group-hover:opacity-100 transition-all duration-300 whitespace-nowrap">
                        <span x-text="testimonial.name"></span>
                      </div>
                    </div>
                  </div>
                </template>
              </div>
            </div>
          </div>

          <!-- Red Blur Column -->
          <div class="relative w-full">
            <div class="absolute inset-0 bg-red-100 rounded-2xl blur-xl opacity-70"></div>
            <div class="relative rounded-2xl p-6 h-[600px] overflow-hidden">
              <div class="relative h-[500px] w-full">
                <template x-for="testimonial in positionedTestimonials.professional" :key="testimonial.id">
                  <div 
                    @click="activeTestimonial = testimonial"
                    class="cursor-pointer transform transition-all duration-500 hover:scale-110 absolute group"
                    :style="'left: ' + testimonial.x + 'px; top: ' + testimonial.y + 'px; z-index: ' + Math.floor(Math.random() * 10) + ';'"
                  >
                    <div class="relative">
                      <div class="flex items-center justify-center w-10 h-10 bg-red-100 rounded-full border-2 border-white shadow-md group-hover:shadow-xl group-hover:border-red-300 transition-all duration-300">
                        <span class="text-xl">📍</span>
                      </div>
                      <div class="absolute -bottom-8 left-1/2 transform -translate-x-1/2 bg-white text-gray-800 rounded-lg px-2 py-1 text-xs font-semibold shadow-md opacity-0 group-hover:opacity-100 transition-all duration-300 whitespace-nowrap">
                        <span x-text="testimonial.name"></span>
                      </div>
                    </div>
                  </div>
                </template>
              </div>
            </div>
          </div>

          <!-- Yellow Blur Column -->
          <div class="relative w-full">
            <div class="absolute inset-0 bg-amber-100 rounded-2xl blur-xl opacity-70"></div>
            <div class="relative rounded-2xl p-6 h-[600px] overflow-hidden">
              <div class="relative h-[500px] w-full">
                <template x-for="testimonial in positionedTestimonials.photography" :key="testimonial.id">
                  <div 
                    @click="activeTestimonial = testimonial"
                    class="cursor-pointer transform transition-all duration-500 hover:scale-110 absolute group"
                    :style="'left: ' + testimonial.x + 'px; top: ' + testimonial.y + 'px; z-index: ' + Math.floor(Math.random() * 10) + ';'"
                  >
                    <div class="relative">
                      <div class="flex items-center justify-center w-10 h-10 bg-amber-100 rounded-full border-2 border-white shadow-md group-hover:shadow-xl group-hover:border-amber-300 transition-all duration-300">
                        <span class="text-xl">📍</span>
                      </div>
                      <div class="absolute -bottom-8 left-1/2 transform -translate-x-1/2 bg-white text-gray-800 rounded-lg px-2 py-1 text-xs font-semibold shadow-md opacity-0 group-hover:opacity-100 transition-all duration-300 whitespace-nowrap">
                        <span x-text="testimonial.name"></span>
                      </div>
                    </div>
                  </div>
                </template>
              </div>
            </div>
          </div>
        </div>
      @else
        <!-- Empty State Message - Show when no approved reviews -->
        <div class="text-center py-10">
          <h3 class="text-xl text-gray-600">No reviews available yet.</h3>
          <p class="mt-2">Be the first to share your flying experience!</p>
          <a href="{{ route('reviews.index') }}" class="mt-4 inline-block bg-sky-600 text-white px-6 py-2 rounded hover:bg-sky-700 transition">Submit a Review</a>
        </div>
      @endif

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
                <img :src="activeTestimonial?.image" :alt="activeTestimonial?.name" class="w-16 h-16 rounded-full border-4 border-white shadow-lg object-cover">
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

              <!-- Media Upload (if available) -->
              <div class="mt-6">
                <template x-if="activeTestimonial?.media_upload">
                  <div>
                    <h4 class="text-lg font-semibold text-gray-800 mb-3">Media Shared</h4>
                    <div class="relative h-64 rounded-lg overflow-hidden">
                      <img 
                        :src="activeTestimonial?.media_upload" 
                        class="w-full h-full object-cover rounded-lg"
                        alt="User uploaded media"
                        x-on:error="$event.target.style.display = 'none'"
                      />
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
</div>