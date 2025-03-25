<!-- Floating WE FLY Text -->
<div 
  x-data="{ 
    scrollPosition: 0,
    lastScrollPosition: 0,
    isMovingRight: false,
    showFly: true,
    init() {
      window.addEventListener('scroll', () => {
        this.lastScrollPosition = this.scrollPosition;
        this.scrollPosition = window.scrollY;
        this.isMovingRight = this.scrollPosition > this.lastScrollPosition;
      });
    }
  }"
  class="absolute top-1/2 -translate-y-1/2 right-0 z-10 pointer-events-none overflow-hidden w-[150%]"
>
  <div 
    :class="{'translate-x-[-10%]': isMovingRight, 'translate-x-[10%]': !isMovingRight}"
    class="transition-transform duration-[3000ms] ease-out"
  >
    <div class="relative flex justify-end">
      <h1 class="text-[16rem] font-black text-transparent text-right tracking-widest [-webkit-text-stroke:2px_yellow]">
        WE <span x-show="showFly" x-transition:enter="transition ease-out duration-[3000ms]" x-transition:enter-start="opacity-0 translate-x-32" x-transition:enter-end="opacity-100 translate-x-0">FLY</span>
      </h1>
    </div>
  </div>
</div>

<div class="relative h-[750px]">
  <!-- Gradient Overlay Layer -->
  <div class="absolute inset-0 h-[735px] bg-gradient-to-b from-black/10 via-black/30 to-black/80 z-[5]"></div>

  <div class="overflow-hidden h-full">
    <div class="flex flex-col items-center justify-center h-full mb-[-30px]">    
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
        class="relative w-full mx-auto overflow-hidden h-full"
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
</div>
