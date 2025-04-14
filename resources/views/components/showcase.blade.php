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
  class="absolute top-1/2 -translate-y-1/2 right-0 z-10 pointer-events-none overflow-hidden w-full md:w-[120%] lg:w-[150%]"
>
  <div 
    :class="{'translate-x-[-10%]': isMovingRight, 'translate-x-[10%]': !isMovingRight}"
    class="transition-transform duration-[3000ms] ease-out"
  >
    <div class="relative flex justify-end perspective-text">
    <h1 class="text-[4rem] sm:text-[4rem] md:text-[5rem] lg:text-[9rem] xl:text-[11rem] font-black tracking-widest hidden md:block">
        <span class="we-text">Reach To The</span>
        <span class="fly-text"><span class="text-orange-700">S</span>KY</span>
      </h1>
    </div>
  </div>
</div>

<div class="relative h-[50vh] sm:h-[60vh] md:h-[70vh] lg:h-[750px]">
  <!-- Gradient Overlay Layer -->
  <div class="absolute inset-0 bg-gradient-to-b from-black/10 via-black/30 to-black/80 z-[5]"></div>

  <div class="overflow-hidden h-full">
    <div class="flex flex-col items-center justify-center h-full mb-[-15px] sm:mb-[-20px] md:mb-[-25px] lg:mb-[-30px]">    
      <!-- Carousel Component -->
      <div 
        x-data="{ 
          activeSlide: 0,
          slides: [
            { type: 'image', src: '{{ asset('images/Aircreation_Skypper15.jpeg') }}', alt: 'Power Hang Glider Flight' },
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
        <div class="absolute bottom-2 sm:bottom-3 md:bottom-4 left-0 right-0">
          <div class="flex items-center justify-center space-x-1.5 sm:space-x-2">
            <template x-for="(slide, index) in slides" :key="index">
              <button 
                @click="goToSlide(index)" 
                :class="{'bg-white': activeSlide === index, 'bg-white/50': activeSlide !== index}"
                class="w-2 h-2 sm:w-2.5 sm:h-2.5 md:w-3 md:h-3 rounded-full transition-all duration-300 focus:outline-none"
              ></button>
            </template>
          </div>
        </div>
      </div>
      
      <!-- Caption -->
      <div class="mt-2 sm:mt-3 md:mt-4 text-center">
        <template x-for="(slide, index) in slides" :key="index">
          <div x-show="activeSlide === index" class="text-sm sm:text-base md:text-lg font-medium text-white">
            <span x-text="slide.type === 'image' ? slide.alt : 'Power Hang Glider Flight Video'"></span>
          </div>
        </template>
      </div>
    </div>
  </div>
</div>

<style>
.perspective-text {
  perspective: 1000px;
  transform-style: preserve-3d;
}

.we-text {
  background: linear-gradient(135deg, #FED600, #FFB800);
  -webkit-background-clip: text;
  background-clip: text;
  color: transparent;
  text-shadow: 
    2px 2px 4px rgba(0, 0, 0, 0.2),
    -2px -2px 4px rgba(255, 255, 255, 0.1);
  animation: floatText 3s ease-in-out infinite;
  display: inline-block;
  position: relative;
}

.we-text::after {
  content: 'WE';
  position: absolute;
  left: 0;
  top: 0;
  color: rgba(254, 214, 0, 0.3);
  transform: translateZ(-10px);
  filter: blur(8px);
  animation: shadowMove 3s ease-in-out infinite;
}

.fly-text {
  background: linear-gradient(135deg, #ffffff, #e0e0e0);
  -webkit-background-clip: text;
  background-clip: text;
  color: transparent;
  position: relative;
  display: inline-block;
  margin-left: 2rem;
  text-shadow: 
    0 0 10px rgba(255, 255, 255, 0.8),
    0 0 20px rgba(255, 255, 255, 0.4);
  animation: glowText 3s ease-in-out infinite;
}

.fly-text::before {
  content: '';
  position: absolute;
  top: 50%;
  left: -2rem;
  width: 1.5rem;
  height: 2px;
  background: linear-gradient(90deg, transparent, #FED600, transparent);
  transform-origin: left;
  animation: lineExpand 3s ease-in-out infinite;
}

@keyframes floatText {
  0%, 100% {
    transform: translateY(0) rotateX(0);
  }
  50% {
    transform: translateY(-10px) rotateX(5deg);
  }
}

@keyframes shadowMove {
  0%, 100% {
    transform: translateZ(-10px) translateY(0);
  }
  50% {
    transform: translateZ(-10px) translateY(10px);
  }
}

@keyframes glowText {
  0%, 100% {
    filter: brightness(1);
    transform: scale(1);
  }
  50% {
    filter: brightness(1.2);
    transform: scale(1.05);
  }
}

@keyframes lineExpand {
  0%, 100% {
    transform: scaleX(0.5);
    opacity: 0.5;
  }
  50% {
    transform: scaleX(1.5);
    opacity: 1;
  }
}

/* Add shimmer effect */
.we-text, .fly-text {
  position: relative;
  overflow: hidden;
}

.we-text::before, .fly-text::before {
  content: '';
  position: absolute;
  top: 0;
  left: -100%;
  width: 50%;
  height: 100%;
  background: linear-gradient(
    90deg,
    transparent,
    rgba(255, 255, 255, 0.2),
    transparent
  );
  transform: skewX(-25deg);
  animation: shimmer 3s infinite;
}

@keyframes shimmer {
  0% {
    left: -100%;
  }
  100% {
    left: 200%;
  }
}

/* Add 3D rotation on hover */
.perspective-text:hover .we-text {
  animation: rotate3D 1.5s ease-in-out;
}

.perspective-text:hover .fly-text {
  animation: rotate3D 1.5s ease-in-out 0.2s;
}

@keyframes rotate3D {
  0% {
    transform: perspective(1000px) rotateY(0);
  }
  50% {
    transform: perspective(1000px) rotateY(180deg);
  }
  100% {
    transform: perspective(1000px) rotateY(360deg);
  }
}
</style>
