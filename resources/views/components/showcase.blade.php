<div class="mb-[-12px]">
  <div class="flex flex-col items-center justify-center">    
    <!-- Carousel Component -->
    <div 
      x-data="{ 
        activeSlide: 0,
        slides: [
          { type: 'image', src: '{{ asset('images/AnyConv.com__IMG_7021.jpg') }}', alt: 'Power Hang Glider Flight' },
          { type: 'image', src: '{{ asset('images/AnyConv.com__IMG_7017 2.jpg') }}', alt: 'Power Hang Glider Adventure' },
          { type: 'image', src: '{{ asset('images/AnyConv.com__IMG_7016 2.jpg') }}', alt: 'Power Hang Glider Experience' },
          { type: 'image', src: '{{ asset('images/AnyConv.com__IMG_7013.jpg') }}', alt: 'Power Hang Glider Scenery' },
          { type: 'image', src: '{{ asset('images/AnyConv.com__IMG_7010.jpg') }}', alt: 'Power Hang Glider Action' },
          { type: 'image', src: '{{ asset('images/AnyConv.com__IMG_7009.jpg') }}', alt: 'Power Hang Glider Adventure' },
          { type: 'image', src: '{{ asset('images/AnyConv.com__IMG_7007.jpg') }}', alt: 'Power Hang Glider Experience' },
          { type: 'image', src: '{{ asset('images/image000001.JPG') }}', alt: 'Power Hang Glider View' },
          { type: 'image', src: '{{ asset('images/image000000.JPG') }}', alt: 'Power Hang Glider Scenery' }
        ],
        autoplay: true,
        autoplaySpeed: 5000,
        init() {
          if (this.autoplay) {
            this.autoplayInterval = setInterval(() => {
              this.next();
            }, this.autoplaySpeed);
          }
          // Preload images
          this.slides.forEach(slide => {
            if (slide.type === 'image') {
              const img = new Image();
              img.src = slide.src;
            }
          });
        },
        next() {
          this.activeSlide = (this.activeSlide + 1) % this.slides.length;
        },
        prev() {
          this.activeSlide = (this.activeSlide - 1 + this.slides.length) % this.slides.length;
        },
        goToSlide(index) {
          this.activeSlide = index;
        }
      }"
      x-init="init()"
      @keydown.right.window="next()"
      @keydown.left.window="prev()"
      class="relative w-full mx-auto overflow-hidden shadow-lg"
      style="height: 750px;"
    >
      <!-- Slides Container -->
      <div class="relative h-full">
        <template x-for="(slide, index) in slides" :key="index">
          <div 
            x-show="activeSlide === index" 
            x-transition:enter="transition ease-out duration-500"
            x-transition:enter-start="opacity-0 transform scale-95"
            x-transition:enter-end="opacity-100 transform scale-100"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 transform scale-100"
            x-transition:leave-end="opacity-0 transform scale-95"
            class="absolute inset-0 w-full h-full"
          >
            <!-- Image Slide -->
            <template x-if="slide.type === 'image'">
              <img 
                :src="slide.src" 
                :alt="slide.alt" 
                class="object-cover w-full h-full"
                loading="lazy"
                onerror="this.onerror=null; this.src='{{ asset('images/pwg1.jpg') }}'; this.alt='Power Hang Glider placeholder'"
              >
            </template>
            
            <!-- Video Slide -->
            <template x-if="slide.type === 'video'">
              <video 
                :id="'carousel-video-' + index"
                :poster="slide.poster"
                class="object-cover w-full h-full"
                controls
                autoplay
                muted
                loop
                onerror="this.onerror=null; this.poster='https://placehold.co/1200x600/3b82f6/ffffff?text=Power+Hang+Glider+Video'"
              >
                <source :src="slide.src" type="video/mp4">
                Your browser does not support the video tag.
              </video>
            </template>
          </div>
        </template>
      </div>
      
      <!-- Navigation Arrows -->
      <div class="absolute inset-0 flex items-center justify-between p-4">
        <button 
          @click="prev()"
          class="p-2 text-white bg-black bg-opacity-50 rounded-full hover:bg-opacity-75 focus:outline-none"
        >
          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
          </svg>
        </button>
        <button 
          @click="next()"
          class="p-2 text-white bg-black bg-opacity-50 rounded-full hover:bg-opacity-75 focus:outline-none"
        >
          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
          </svg>
        </button>
      </div>
      
      <!-- Indicators -->
      <div class="absolute bottom-4 left-0 right-0">
        <div class="flex items-center justify-center space-x-2">
          <template x-for="(slide, index) in slides" :key="index">
            <button 
              @click="goToSlide(index)" 
              :class="{'bg-white': activeSlide === index, 'bg-white/50': activeSlide !== index}"
              class="w-3 h-3 rounded-full transition-all duration-300 focus:outline-none"
            ></button>
          </template>
        </div>
      </div>
    </div>
    
    <!-- Caption -->
    <div class="mt-4 text-center">
      <template x-for="(slide, index) in slides" :key="index">
        <div x-show="activeSlide === index" class="text-lg font-medium">
          <span x-text="slide.type === 'image' ? slide.alt : 'Power Hang Glider Flight Video'"></span>
        </div>
      </template>
    </div>
  </div>
</div>
