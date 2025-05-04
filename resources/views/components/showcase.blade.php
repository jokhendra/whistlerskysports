
@push('styles')
<style>
/* Base styles with better performance */
.perspective-text {
  perspective: 1200px;
  transform-style: preserve-3d;
  width: 100%;
  max-width: 100%;
  margin: 0;
  overflow: visible;
  position: relative;
  z-index: 20;
}

/* Optimized text gradients with better mobile support */
.we-text {
  background: linear-gradient(135deg, #FFD700, #FFA500, #FF8C00);
  -webkit-background-clip: text;
  background-clip: text;
  color: transparent;
  text-shadow: 
    2px 2px 4px rgba(0, 0, 0, 0.3),
    0 0 15px rgba(255, 215, 0, 0.2),
    0 0 30px rgba(255, 165, 0, 0.1);
  animation: floatText 3s ease-in-out infinite;
  display: inline-block;
  position: relative;
  font-size: clamp(3rem, 8vw, 24rem);
  line-height: 0.9;
  will-change: transform;
  white-space: nowrap;
  letter-spacing: -0.01em;
  font-weight: 900;
  font-family: 'Arial Black', -apple-system, BlinkMacSystemFont, sans-serif;
}

.we-text::after {
  content: 'Reach To The';
  position: absolute;
  left: 0;
  top: 0;
  background: linear-gradient(135deg, rgba(255, 215, 0, 0.3), rgba(255, 140, 0, 0.2));
  -webkit-background-clip: text;
  background-clip: text;
  color: transparent;
  transform: translateZ(-10px);
  filter: blur(8px);
  animation: shadowMove 3s ease-in-out infinite;
  z-index: -1;
}

.fly-text {
  background: linear-gradient(135deg, #FFFFFF, #F8F8F8, #E8E8E8);
  -webkit-background-clip: text;
  background-clip: text;
  color: transparent;
  position: relative;
  display: inline-block;
  margin-left: clamp(0.2rem, 0.5vw, 1rem);
  text-shadow: 
    0 0 15px rgba(255, 255, 255, 0.8),
    0 0 30px rgba(255, 255, 255, 0.4),
    0 0 45px rgba(255, 255, 255, 0.2);
  animation: glowText 3s ease-in-out infinite;
  font-size: clamp(3rem, 8vw, 24rem);
  line-height: 0.9;
  will-change: transform, filter;
  white-space: nowrap;
  letter-spacing: -0.01em;
  font-weight: 900;
  font-family: 'Arial Black', -apple-system, BlinkMacSystemFont, sans-serif;
}

.fly-text .text-orange-700 {
  background: linear-gradient(135deg, #FF4500, #FF6347);
  -webkit-background-clip: text;
  background-clip: text;
  color: transparent;
  text-shadow: 
    2px 2px 4px rgba(255, 69, 0, 0.3),
    0 0 20px rgba(255, 69, 0, 0.2);
}

/* Optimized animations with reduced repaints */
@keyframes floatText {
  0%, 100% {
    transform: translateY(0) rotateX(0);
    filter: brightness(1) contrast(1);
  }
  50% {
    transform: translateY(clamp(-8px, -1.5vw, -15px)) rotateX(3deg);
    filter: brightness(1.1) contrast(1.1);
  }
}

@keyframes shadowMove {
  0%, 100% {
    transform: translateZ(-10px) translateY(0);
    opacity: 0.3;
    filter: blur(8px);
  }
  50% {
    transform: translateZ(-10px) translateY(clamp(5px, 1vw, 10px));
    opacity: 0.5;
    filter: blur(12px);
  }
}

@keyframes glowText {
  0%, 100% {
    filter: brightness(1) blur(0) contrast(1);
    transform: scale(1);
  }
  50% {
    filter: brightness(1.2) blur(0) contrast(1.05);
    transform: scale(1.01);
  }
}

/* Optimized shimmer effect */
.we-text::before,
.fly-text::before {
  content: '';
  position: absolute;
  top: 0;
  left: -100%;
  width: 50%;
  height: 100%;
  background: linear-gradient(
    90deg,
    transparent,
    rgba(255, 255, 255, 0.4),
    transparent
  );
  transform: skewX(-25deg);
  animation: shimmer 3s infinite;
  will-change: transform;
}

@keyframes shimmer {
  0% {
    transform: translateX(-100%) skewX(-25deg);
  }
  100% {
    transform: translateX(200%) skewX(-25deg);
  }
}

/* Optimized 3D rotation with reduced repaints */
@media (hover: hover) {
.perspective-text:hover .we-text {
  animation: rotate3D 1.5s ease-in-out;
}

.perspective-text:hover .fly-text {
  animation: rotate3D 1.5s ease-in-out 0.2s;
  }
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

/* Responsive adjustments */
@media screen and (max-width: 768px) {
  .perspective-text {
    perspective: 1000px;
    transform: translateX(2%) scale(0.9);
  }
  
  .we-text,
  .fly-text {
    font-size: clamp(3rem, 6vw, 7rem);
    text-shadow: 
      1px 1px 3px rgba(0, 0, 0, 0.2),
      0 0 10px rgba(255, 255, 255, 0.3);
    letter-spacing: -0.02em;
  }
}

@media screen and (min-width: 769px) and (max-width: 1024px) {
  .perspective-text {
    transform: translateX(4%) scale(0.95);
  }
  
  .we-text,
  .fly-text {
    font-size: clamp(7rem, 8vw, 10rem);
    letter-spacing: -0.01em;
  }
}

@media screen and (min-width: 1025px) and (max-width: 1280px) {
  .we-text,
  .fly-text {
    font-size: clamp(10rem, 10vw, 15rem);
  }
}

/* Reduced motion preferences */
@media (prefers-reduced-motion: reduce) {
  .we-text,
  .fly-text,
  .we-text::after,
  .fly-text::before,
  .we-text::before {
    animation: none;
    transform: none;
  }
}

/* Add smooth transition for scroll movement */
[x-cloak] { display: none !important; }

.perspective-text, .we-text, .fly-text {
  transition: transform 0.1s ease-out;
}

/* Add continuous marquee animation */
@keyframes marquee {
  from {
    transform: translateX(100%);
  }
  to {
    transform: translateX(-200%);
  }
}

.animate-marquee {
  animation: marquee 15s linear infinite;
}

/* Pause animation on hover */
@media (hover: hover) {
  .animate-marquee:hover {
    animation-play-state: paused;
  }
}

/* Adjust animation for reduced motion preference */
@media (prefers-reduced-motion: reduce) {
  .animate-marquee {
    animation: none;
  }
}

/* Add smooth scroll behavior to html */
html {
  scroll-behavior: smooth;
}

/* Optimize transitions */
.transition-all {
  transition-property: all;
  will-change: transform;
  backface-visibility: hidden;
  transform: translateZ(0);
  -webkit-font-smoothing: antialiased;
}

/* Swiper custom styles */
.swiper-container {
  width: 100%;
  height: 100%;
}

.swiper-slide {
  background-position: center;
  background-size: cover;
}

.swiper-pagination-bullet {
  background: white !important;
  opacity: 0.7;
}

.swiper-pagination-bullet-active {
  opacity: 1;
  transform: scale(1.2);
}

/* Tile animation styles */
.tile-overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 10;
  pointer-events: none;
}

.tile {
  position: absolute;
  background: rgba(0, 0, 0, 0.8);
  opacity: 1;
  transform: scale(1) rotate(0deg);
}

/* Custom animation for active effect label */
.effect-label {
  animation: fadeInUp 0.3s ease-out;
}

@keyframes fadeInUp {
  from {
    opacity: 0;
    transform: translateY(10px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

/* Enhance swiper navigation */
.swiper-button-next,
.swiper-button-prev {
  background-color: rgba(0, 0, 0, 0.3);
  width: 40px !important;
  height: 40px !important;
  border-radius: 50%;
  color: white !important;
  text-shadow: 0 0 3px rgba(0, 0, 0, 0.5);
  transition: all 0.3s ease;
}

.swiper-button-next:after,
.swiper-button-prev:after {
  font-size: 20px !important;
}

.swiper-button-next:hover,
.swiper-button-prev:hover {
  background-color: rgba(0, 0, 0, 0.5);
  transform: scale(1.1);
}
</style>
@endpush

<!-- Add Swiper CSS and JS in the head section -->
@push('styles')
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
@endpush

@push('scripts')
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
@endpush

<!-- Floating WE FLY Text -->
<div 
  x-data="{ 
    scrollPosition: 0,
    translateX: 20,
    lastUpdate: 0,
    init() {
      this.updatePosition();
      window.addEventListener('scroll', () => {
        // Use requestAnimationFrame for smooth updates
        if (!this.lastUpdate || (Date.now() - this.lastUpdate) > 16) {
          window.requestAnimationFrame(() => {
            this.updatePosition();
            this.lastUpdate = Date.now();
          });
        }
      }, { passive: true });
    },
    updatePosition() {
        this.scrollPosition = window.scrollY;
      const viewportHeight = window.innerHeight;
      const scrollPercent = Math.min(this.scrollPosition / viewportHeight, 1);
      // Move from 20% (visible) to -100% left based on first 100vh scroll
      this.translateX = 20 - (scrollPercent * 120);
    }
  }"
  class="absolute top-1/2 -translate-y-1/2 right-0 z-10 pointer-events-none overflow-visible w-full md:w-[120%] lg:w-[150%]"
>
  <div 
    class="transition-all duration-[800ms] ease-[cubic-bezier(0.22,1,0.36,1)]"
    :style="'transform: translateX(' + translateX + '%)'"
  >
    <div class="relative flex justify-end perspective-text">
      <h1 class="text-[5rem] sm:text-[7rem] md:text-[10rem] lg:text-[15rem] xl:text-[20rem] 2xl:text-[24rem] font-black tracking-wider md:tracking-widest hidden md:block mr-[-2rem] sm:mr-[-3rem] md:mr-[-4rem] lg:mr-[-6rem] xl:mr-[-8rem]">
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
    <div class="flex flex-col items-center justify-center h-full">    
      <div 
        x-data="{ 
          activeEffect: 'fade',
          effects: ['fade', 'cube', 'coverflow', 'flip', 'tiles'],
          swiper: null,
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
          init() {
            this.$nextTick(() => {
              this.initSwiper();
            });
            setInterval(() => {
              const currentIndex = this.effects.indexOf(this.activeEffect);
              const nextIndex = (currentIndex + 1) % this.effects.length;
              this.activeEffect = this.effects[nextIndex];
              this.initSwiper();
            }, 10000);
          },
          initSwiper() {
            const options = {
              effect: this.activeEffect === 'tiles' ? 'fade' : this.activeEffect,
              grabCursor: true,
              centeredSlides: true,
              slidesPerView: 'auto',
              autoplay: {
                delay: 5000,
                disableOnInteraction: false
              },
              speed: this.activeEffect === 'tiles' ? 0 : 1000,
              loop: true,
              fadeEffect: { crossFade: true },
              cubeEffect: {
                shadow: true,
                slideShadows: true,
                shadowOffset: 20,
                shadowScale: 0.94
              },
              coverflowEffect: {
                rotate: 50,
                stretch: 0,
                depth: 100,
                modifier: 1,
                slideShadows: true
              },
              flipEffect: {
                slideShadows: true,
                limitRotation: true
              },
              pagination: {
                el: '.swiper-pagination',
                clickable: true
              },
              on: {
                slideChange: () => {
                  if (this.activeEffect === 'tiles') {
                    this.animateTiles();
                  }
                }
              }
            };

            if (this.swiper) {
              this.swiper.destroy();
            }

            this.swiper = new Swiper('.swiper-container', options);
          },
          animateTiles() {
            const slide = document.querySelector('.swiper-slide-active');
            if (!slide) return;

            const existingTiles = slide.querySelectorAll('.tile-overlay');
            existingTiles.forEach(tile => tile.remove());

            const tileOverlay = document.createElement('div');
            tileOverlay.className = 'tile-overlay';
            slide.appendChild(tileOverlay);

            const rows = 4;
            const cols = 6;
            const tiles = [];
            
            for (let i = 0; i < rows * cols; i++) {
              const tile = document.createElement('div');
              tile.className = 'tile';
              const row = Math.floor(i / cols);
              const col = i % cols;
              
              tile.style.cssText = `
                width: ${100 / cols}%;
                height: ${100 / rows}%;
                left: ${(col * 100) / cols}%;
                top: ${(row * 100) / rows}%;
                transition: transform 0.6s ease-in-out, opacity 0.6s ease-in-out;
                transition-delay: ${(row + col) * 100}ms;
              `;
              
              tiles.push(tile);
              tileOverlay.appendChild(tile);
            }

            requestAnimationFrame(() => {
              tiles.forEach(tile => {
                tile.style.opacity = '0';
                tile.style.transform = 'scale(0.8) rotate(10deg)';
              });
            });
          }
        }"
        class="relative w-full mx-auto overflow-hidden h-full"
      >
        <div class="swiper-container h-full">
          <div class="swiper-wrapper">
          <template x-for="(slide, index) in slides" :key="index">
              <div class="swiper-slide">
                <img 
                  :src="slide.src" 
                  :alt="slide.alt" 
                  class="object-cover w-full h-full"
                  loading="lazy"
                  onerror="this.onerror=null; this.src='{{ asset('images/pwg1.jpg') }}'; this.alt='Power Hang Glider placeholder';"
                >
        </div>
            </template>
          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>
    </div>
  </div>
</div>
