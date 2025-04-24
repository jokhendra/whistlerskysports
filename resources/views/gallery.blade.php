@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
@include('common.header')
<body>
  @include('common.nav')
  
  <!-- Gallery Hero Section -->
  <div class="bg-gradient-to-b from-blue-900 to-blue-700 text-white py-16">
    <div class="container mx-auto px-4 text-center">
      <h1 class="text-4xl md:text-5xl font-bold mb-4">Gallery</h1>
      <p class="text-lg text-blue-100 max-w-3xl mx-auto">Welcome to Whistler Sky Sports! Our media gallery brings the thrill of flight to life with a collection of stunning photos and dynamic videos. From breathtaking aerial views over Pemberton's rugged landscapes to glimpses of our ultralight aircraft in action, dive into the adventure and see why the skies are calling you!</p>
    </div>
  </div>
 
  
  <!-- Gallery Section -->
  <div class="py-8 bg-gradient-to-b from-white to-gray-50">
    <div class="container mx-auto px-4">
      <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <!-- Aerial Views Container -->
        <div class="relative overflow-hidden rounded-xl shadow-xl bg-white h-[500px] opacity-0 animate-slide-up" onclick="openImagePreview('aerial')">
          <div class="absolute inset-0 bg-blue-600/10 backdrop-blur-sm z-0"></div>
          <div class="relative z-10 p-4 h-full">
            <div class="carousel-container relative h-full">
              <div class="carousel-slides h-full">
                @foreach(['aerial_view1.png', 'aerial_view2.png', 'aerial_view3.png', 'aerial_view4.png', 'aerial_view5.png', 'aerial_view6.png', 'aerial_view7.png', 'Whistler 1.jpg', 'Whistler 2.jpg', 'Whistler Skydive 3.jpg'] as $index => $image)
                <div class="carousel-slide absolute inset-0" data-index="{{ $index }}">
                  <img src="{{ asset('images/aerial_views/' . $image) }}" 
                       alt="Aerial View" 
                       class="w-full h-full object-cover rounded-lg transition-transform duration-1000 hover:scale-110">
                </div>
                @endforeach
              </div>
              <div class="absolute inset-0 flex items-center justify-center pointer-events-none z-20">
                <h3 class="text-4xl font-bold text-white animate-float-bottom-top">Aerial Views</h3>
              </div>
              <div class="absolute bottom-4 left-0 right-0 flex justify-center space-x-2 z-20">
                <div class="carousel-dots flex space-x-2"></div>
              </div>
            </div>
          </div>
        </div>

        <!-- Open Cockpit Trikes Container -->
        <div class="relative overflow-hidden rounded-xl shadow-xl bg-white h-[500px] opacity-0 animate-slide-left" onclick="openImagePreview('microlite')">
          <div class="absolute inset-0 bg-red-600/10 backdrop-blur-sm z-0"></div>
          <div class="relative z-10 p-4 h-full">
            <div class="carousel-container relative h-full">
              <div class="carousel-slides h-full">
                @foreach(['Single_Ultraligh1.jpeg', 'Solo_2.jpeg', 'Hangar.jpeg', 'Skypper 2.jpeg', 'Landscape.jpg', 'Landsacpe2.jpg', 'Copy of image000001.JPG'] as $index => $image)
                <div class="carousel-slide absolute inset-0" data-index="{{ $index }}">
                  <img src="{{ asset('images/microlite/' . $image) }}" 
                       alt="Microlite" 
                       class="w-full h-full object-cover rounded-lg">
                </div>
                @endforeach
              </div>
              <div class="absolute inset-0 flex items-center justify-center pointer-events-none z-20">
                <h3 class="text-4xl font-bold text-white animate-float-right-left">Open Cockpit Trikes</h3>
              </div>
              <div class="absolute bottom-4 left-0 right-0 flex justify-center space-x-2 z-20">
                <div class="carousel-dots flex space-x-2"></div>
              </div>
            </div>
          </div>
        </div>

        <!-- Fixed Wing Aircraft Container -->
        <div class="relative overflow-hidden rounded-xl shadow-xl bg-white h-[500px] opacity-0 animate-slide-down" onclick="openImagePreview('fixed_wings')">
          <div class="absolute inset-0 bg-yellow-600/10 backdrop-blur-sm z-0"></div>
          <div class="relative z-10 p-4 h-full">
            <div class="carousel-container relative h-full">
              <div class="carousel-slides h-full">
                @foreach(['AnyConv.com__IMG_7013.jpg', 'AnyConv.com__IMG_7016 2.jpg', 'AnyConv.com__IMG_7017 2.jpg', 'AnyConv.com__IMG_7021.jpg', 'AnyConv.com__IMG_7022.jpg'] as $index => $image)
                <div class="carousel-slide absolute inset-0" data-index="{{ $index }}">
                  <img src="{{ asset('images/fixed_wings/' . $image) }}" 
                       alt="Fixed Wing" 
                       class="w-full h-full object-cover rounded-lg">
                </div>
                @endforeach
              </div>
              <div class="absolute inset-0 flex items-center justify-center pointer-events-none z-20">
                <h3 class="text-4xl font-bold text-white animate-float-top-bottom">Fixed Wing Aircraft</h3>
              </div>
              <div class="absolute bottom-4 left-0 right-0 flex justify-center space-x-2 z-20">
                <div class="carousel-dots flex space-x-2"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Lightbox Modal -->
  <div id="lightbox" class="fixed inset-0 bg-black/90 z-50 hidden items-center justify-center p-4">
    <button id="close-lightbox" class="absolute top-4 right-4 text-white text-4xl hover:text-gray-300">&times;</button>
    <button id="prev-image" class="absolute left-4 text-white text-4xl hover:text-gray-300">&lt;</button>
    <button id="next-image" class="absolute right-4 text-white text-4xl hover:text-gray-300">&gt;</button>
    <img id="lightbox-image" src="" alt="Lightbox image" class="max-h-[80vh] max-w-[90vw] object-contain">
    <div id="lightbox-caption" class="absolute bottom-10 left-0 right-0 text-center text-white">
      <h3 id="lightbox-title" class="text-xl font-bold"></h3>
      <p id="lightbox-description" class="text-sm"></p>
    </div>
  </div>
  
  <!-- Video Section -->
  <div class="bg-gray-900 py-16">
    <div class="container mx-auto px-4">
      <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-white">Experience the Thrill</h2>
        <p class="text-lg text-gray-300 mt-4 max-w-3xl mx-auto">Get a taste of the exhilarating experience!!</p>
      </div>
      
      <div class="max-w-5xl mx-auto">
        <div class="relative rounded-2xl overflow-hidden shadow-2xl transform transition-all duration-500 hover:scale-[1.02] bg-black">
          <!-- Video Container -->
          <div class="relative aspect-w-16 aspect-h-9">
            <!-- Thumbnail Image -->
            <img 
              src="https://img.youtube.com/vi/VIDEO_ID/maxresdefault.jpg" 
              alt="Video thumbnail"
              class="absolute inset-0 w-full h-full object-cover"
            >
            
            <!-- Play Button Overlay -->
            <div class="absolute inset-0 flex items-center justify-center bg-black/30 hover:bg-black/40 transition-colors duration-300 cursor-pointer">
              <div class="w-20 h-20 rounded-full bg-white/90 flex items-center justify-center transform transition-transform duration-300 hover:scale-110">
                <svg class="w-10 h-10 text-gray-900" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"/>
                </svg>
              </div>
            </div>

            <!-- YouTube iframe (hidden by default) -->
            <iframe 
              id="youtube-player"
              src="https://www.youtube.com/embed/VIDEO_ID?autoplay=1&rel=0&modestbranding=1&playsinline=1" 
              title="Aerial Adventure Experience"
              frameborder="0" 
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
              allowfullscreen 
              class="absolute inset-0 w-full h-full opacity-0 pointer-events-none"
            ></iframe>
          </div>

          <!-- Video Info Overlay -->
          <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent opacity-0 hover:opacity-100 transition-opacity duration-300">
            <div class="absolute bottom-0 left-0 right-0 p-6">
              <h3 class="text-2xl font-bold text-white mb-2">Aerial Adventure Experience</h3>
              <p class="text-gray-200">Experience the thrill of flying through breathtaking landscapes</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Image Preview Modal -->
  <div id="imagePreviewModal" class="fixed inset-0 bg-black bg-opacity-90 hidden z-50">
      <div class="relative w-full h-full flex items-center justify-center">
          <!-- Close button -->
          <button onclick="closeImagePreview()" class="absolute top-4 right-4 text-white hover:text-gray-300 z-50">
              <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
              </svg>
          </button>

          <!-- Previous button -->
          <button onclick="prevPreviewImage()" class="absolute left-4 top-1/2 -translate-y-1/2 text-white hover:text-gray-300 z-50">
              <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
              </svg>
          </button>

          <!-- Next button -->
          <button onclick="nextPreviewImage()" class="absolute right-4 top-1/2 -translate-y-1/2 text-white hover:text-gray-300 z-50">
              <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
              </svg>
          </button>

          <!-- Main image -->
          <div class="w-full max-w-7xl mx-auto px-4">
              <img id="previewImage" src="" alt="Preview Image" class="max-h-[85vh] mx-auto object-contain">
              <div class="absolute bottom-4 left-0 right-0 text-center">
                  <p id="imageCount" class="text-white text-lg"></p>
              </div>
          </div>
      </div>
  </div>

  <style>
    .carousel-container {
      overflow: hidden;
    }

    .carousel-slides {
      position: relative;
    }

    .carousel-slide {
      opacity: 0;
      transform: scale(1.1);
      transition: all 1s ease-in-out;
      pointer-events: none;
    }

    .carousel-slide.active {
      opacity: 1;
      transform: scale(1);
      pointer-events: auto;
    }

    .carousel-slide.active img {
      animation: subtle-zoom 10s ease-in-out infinite;
    }

    @keyframes subtle-zoom {
      0%, 100% {
        transform: scale(1);
      }
      50% {
        transform: scale(1.05);
      }
    }

    .carousel-dot {
      width: 12px;
      height: 12px;
      border-radius: 50%;
      background-color: rgba(255, 255, 255, 0.3);
      transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
      cursor: pointer;
      border: 2px solid transparent;
      position: relative;
    }

    .carousel-dot::after {
      content: '';
      position: absolute;
      inset: -4px;
      border-radius: 50%;
      background: transparent;
      border: 2px solid transparent;
      transition: all 0.3s ease;
    }

    .carousel-dot:hover {
      background-color: rgba(255, 255, 255, 0.8);
      transform: scale(1.1);
    }

    .carousel-dot.active {
      background-color: white;
      transform: scale(1.2);
    }

    .carousel-dot.active::after {
      border-color: rgba(255, 255, 255, 0.3);
    }

    /* Animation keyframes */
    @keyframes slide-up {
      0% {
        opacity: 0;
        transform: translateY(50px) scale(0.95);
      }
      100% {
        opacity: 1;
        transform: translateY(0) scale(1);
      }
    }

    @keyframes slide-left {
      0% {
        opacity: 0;
        transform: translateX(50px) scale(0.95);
      }
      100% {
        opacity: 1;
        transform: translateX(0) scale(1);
      }
    }

    @keyframes slide-down {
      0% {
        opacity: 0;
        transform: translateY(-50px) scale(0.95);
      }
      100% {
        opacity: 1;
        transform: translateY(0) scale(1);
      }
    }

    /* Bottom to Top Animation */
    @keyframes float-bottom-top {
      0% {
        transform: translateY(100%);
        opacity: 0;
      }
      10% {
        opacity: 1;
      }
      90% {
        opacity: 1;
      }
      100% {
        transform: translateY(-100%);
        opacity: 0;
      }
    }

    /* Right to Left Animation */
    @keyframes float-right-left {
      0% {
        transform: translateX(100%);
        opacity: 0;
      }
      10% {
        opacity: 1;
      }
      90% {
        opacity: 1;
      }
      100% {
        transform: translateX(-100%);
        opacity: 0;
      }
    }

    /* Top to Bottom Animation */
    @keyframes float-top-bottom {
      0% {
        transform: translateY(-100%);
        opacity: 0;
      }
      10% {
        opacity: 1;
      }
      90% {
        opacity: 1;
      }
      100% {
        transform: translateY(100%);
        opacity: 0;
      }
    }

    /* Shining text effect */
    .shine-text {
      position: relative;
      background: linear-gradient(to right, transparent, rgba(0, 0, 0, 0.6), transparent);
      padding: 0.5rem 2rem;
      border-radius: 4px;
      text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);
    }

    .shine-text::before {
      content: '';
      position: absolute;
      top: -50%;
      left: -50%;
      width: 200%;
      height: 200%;
      background: linear-gradient(
        to right,
        transparent,
        transparent,
        rgba(255, 255, 255, 0.1),
        transparent,
        transparent
      );
      transform: rotate(45deg);
      animation: shine 4s linear infinite;
    }

    @keyframes shine {
      0% {
        transform: translateX(-100%) rotate(45deg);
      }
      100% {
        transform: translateX(100%) rotate(45deg);
      }
    }

    /* Container animations */
    .animate-slide-up {
      animation: slide-up 1s cubic-bezier(0.4, 0, 0.2, 1) forwards;
    }

    .animate-slide-left {
      animation: slide-left 1s cubic-bezier(0.4, 0, 0.2, 1) forwards;
    }

    .animate-slide-down {
      animation: slide-down 1s cubic-bezier(0.4, 0, 0.2, 1) forwards;
    }

    .animate-slide-up-text {
      animation: slide-up-text 0.6s ease-out forwards;
      animation-delay: 0.2s; /* Text animates before container */
    }

    .animate-float-bottom-top {
      animation: float-bottom-top 8s linear infinite;
      text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);
      background: linear-gradient(to right, transparent, rgba(0, 0, 0, 0.5), transparent);
      padding: 0.5rem 2rem;
      border-radius: 4px;
    }

    .animate-float-right-left {
      animation: float-right-left 8s linear infinite;
      text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);
      background: linear-gradient(to right, transparent, rgba(0, 0, 0, 0.5), transparent);
      padding: 0.5rem 2rem;
      border-radius: 4px;
    }

    .animate-float-top-bottom {
      animation: float-top-bottom 8s linear infinite;
      text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);
      background: linear-gradient(to right, transparent, rgba(0, 0, 0, 0.5), transparent);
      padding: 0.5rem 2rem;
      border-radius: 4px;
    }
  </style>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Lazy loading functionality
      const lazyImages = document.querySelectorAll('.lazy-image');
      const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            const img = entry.target;
            img.src = img.dataset.src;
            img.classList.add('loaded');
            observer.unobserve(img);
          }
        });
      }, {
        rootMargin: '50px 0px',
        threshold: 0.1
      });

      lazyImages.forEach(img => imageObserver.observe(img));

      // Animate gallery items on scroll
      const galleryItems = document.querySelectorAll('.gallery-item');
      const itemObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.classList.add('opacity-100', 'translate-y-0');
            itemObserver.unobserve(entry.target);
          }
        });
      }, {
        threshold: 0.1,
        rootMargin: '50px 0px'
      });

      galleryItems.forEach(item => itemObserver.observe(item));

      // Filter functionality
      const filterBoxes = document.querySelectorAll('.filter-box');
      
      filterBoxes.forEach(box => {
        box.addEventListener('click', function() {
          // Remove active class from all boxes
          filterBoxes.forEach(b => {
            b.classList.remove('ring-4', 'ring-blue-500');
            b.querySelector('.border-2').classList.remove('border-blue-500');
          });
          
          // Add active class to clicked box
          this.classList.add('ring-4', 'ring-blue-500');
          this.querySelector('.border-2').classList.add('border-blue-500');
          
          const filter = this.getAttribute('data-filter');
          
          galleryItems.forEach(item => {
            if (item.getAttribute('data-category') === filter) {
              item.style.display = 'block';
              // Reset animation classes for filtered items
              item.classList.remove('opacity-100', 'translate-y-0');
              item.classList.add('opacity-0', 'translate-y-8');
              // Re-observe for animation
              itemObserver.observe(item);
            } else {
              item.style.display = 'none';
            }
          });
        });
      });

      // Show all images by default
      galleryItems.forEach(item => {
        item.style.display = 'block';
      });
      
      // Lightbox functionality
      const lightbox = document.getElementById('lightbox');
      const lightboxImage = document.getElementById('lightbox-image');
      const lightboxTitle = document.getElementById('lightbox-title');
      const lightboxDescription = document.getElementById('lightbox-description');
      const closeLightbox = document.getElementById('close-lightbox');
      const prevImage = document.getElementById('prev-image');
      const nextImage = document.getElementById('next-image');
      
      let currentIndex = 0;
      const galleryImages = document.querySelectorAll('.gallery-item .relative');
      
      galleryImages.forEach((item, index) => {
        item.addEventListener('click', function() {
          currentIndex = index;
          openLightbox(this);
        });
      });
      
      function openLightbox(item) {
        const img = item.querySelector('img');
        const title = item.querySelector('h3').textContent;
        const description = item.querySelector('p').textContent;
        
        lightboxImage.src = img.src;
        lightboxTitle.textContent = title;
        lightboxDescription.textContent = description;
        
        lightbox.classList.remove('hidden');
        lightbox.classList.add('flex');
        document.body.style.overflow = 'hidden';
      }
      
      closeLightbox.addEventListener('click', function() {
        lightbox.classList.add('hidden');
        lightbox.classList.remove('flex');
        document.body.style.overflow = 'auto';
      });
      
      prevImage.addEventListener('click', function() {
        currentIndex = (currentIndex - 1 + galleryImages.length) % galleryImages.length;
        openLightbox(galleryImages[currentIndex]);
      });
      
      nextImage.addEventListener('click', function() {
        currentIndex = (currentIndex + 1) % galleryImages.length;
        openLightbox(galleryImages[currentIndex]);
      });
      
      // Close lightbox with escape key
      document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && !lightbox.classList.contains('hidden')) {
          closeLightbox.click();
        }
      });

      const videoContainer = document.querySelector('.aspect-w-16');
      const playButton = videoContainer.querySelector('.flex');
      const iframe = document.getElementById('youtube-player');
      
      playButton.addEventListener('click', function() {
        // Show and enable the iframe
        iframe.classList.remove('opacity-0', 'pointer-events-none');
        // Hide the play button and thumbnail
        playButton.style.display = 'none';
      });

      const carousels = document.querySelectorAll('.carousel-container');

      carousels.forEach(carousel => {
        const slides = carousel.querySelectorAll('.carousel-slide');
        const dotsContainer = carousel.querySelector('.carousel-dots');
        let currentSlide = 0;
        let interval;

        // Create dots with enhanced hover effect
        slides.forEach((_, index) => {
          const dot = document.createElement('button');
          dot.classList.add('carousel-dot');
          dot.addEventListener('click', () => goToSlide(index));
          dotsContainer.appendChild(dot);
        });

        const dots = dotsContainer.querySelectorAll('.carousel-dot');

        function updateSlide() {
          slides.forEach((slide, index) => {
            slide.classList.remove('active');
            dots[index].classList.remove('active');
            
            // Add direction class based on transition
            if (index === currentSlide) {
              slide.classList.add('active');
              dots[index].classList.add('active');
            }
          });
        }

        function goToSlide(index) {
          currentSlide = (index + slides.length) % slides.length;
          updateSlide();
          resetInterval();
        }

        function resetInterval() {
          clearInterval(interval);
          interval = setInterval(() => goToSlide(currentSlide + 1), 5000);
        }

        // Initialize first slide
        updateSlide();
        resetInterval();

        // Pause on hover
        carousel.addEventListener('mouseenter', () => clearInterval(interval));
        carousel.addEventListener('mouseleave', resetInterval);
      });

      // Add intersection observer for animations
      const animatedElements = document.querySelectorAll('.animate-slide-up, .animate-slide-left, .animate-slide-down, .animate-slide-up-text');
      
      const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.style.animationPlayState = 'running';
            observer.unobserve(entry.target);
          }
        });
      }, {
        threshold: 0.1
      });

      animatedElements.forEach(element => {
        element.style.animationPlayState = 'paused';
        observer.observe(element);
      });

      // Image Preview Variables
      let currentPreviewIndex = 0;
      let previewImages = [];
      let currentCategory = '';

      // Image Preview Functions
      window.openImagePreview = function(category) {
          currentCategory = category;
          const modal = document.getElementById('imagePreviewModal');
          
          // Set up images array based on category
          if (category === 'aerial') {
              previewImages = [
                  'aerial_view1.png',
                  'aerial_view2.png',
                  'aerial_view3.png',
                  'aerial_view4.png',
                  'aerial_view5.png',
                  'aerial_view6.png',
                  'aerial_view7.png',
                  'Whistler 1.jpg',
                  'Whistler 2.jpg',
                  'Whistler Skydive 3.jpg'
              ];
          } else if (category === 'microlite') {
              previewImages = [
                  'Single_Ultraligh1.jpeg',
                  'Solo_2.jpeg',
                  'Hangar.jpeg',
                  'Skypper 2.jpeg',
                  'Landscape.jpg',
                  'Landsacpe2.jpg',
                  'Copy of image000001.JPG'
              ];
          } else if (category === 'fixed_wings') {
              previewImages = [
                  'AnyConv.com__IMG_7013.jpg',
                  'AnyConv.com__IMG_7016 2.jpg',
                  'AnyConv.com__IMG_7017 2.jpg',
                  'AnyConv.com__IMG_7021.jpg',
                  'AnyConv.com__IMG_7022.jpg'
              ];
          }
          
          currentPreviewIndex = 0;
          updatePreviewImage();
          modal.classList.remove('hidden');
          document.body.style.overflow = 'hidden';
      }

      window.closeImagePreview = function() {
          const modal = document.getElementById('imagePreviewModal');
          modal.classList.add('hidden');
          document.body.style.overflow = 'auto';
      }

      window.prevPreviewImage = function() {
          currentPreviewIndex = (currentPreviewIndex - 1 + previewImages.length) % previewImages.length;
          updatePreviewImage();
      }

      window.nextPreviewImage = function() {
          currentPreviewIndex = (currentPreviewIndex + 1) % previewImages.length;
          updatePreviewImage();
      }

      function updatePreviewImage() {
          const img = document.getElementById('previewImage');
          const count = document.getElementById('imageCount');
          
          // Use the correct folder based on category
          const folder = currentCategory === 'fixed_wings' ? 'fixed_wings' : 
                        currentCategory === 'microlite' ? 'microlite' : 
                        'aerial_views';
          
          img.src = "{{ asset('images') }}/" + folder + "/" + previewImages[currentPreviewIndex];
          count.textContent = `${currentPreviewIndex + 1} / ${previewImages.length}`;
      }

      // Keyboard navigation
      document.addEventListener('keydown', function(e) {
          const modal = document.getElementById('imagePreviewModal');
          if (modal.classList.contains('hidden')) return;

          if (e.key === 'Escape') {
              closeImagePreview();
          } else if (e.key === 'ArrowLeft') {
              prevPreviewImage();
          } else if (e.key === 'ArrowRight') {
              nextPreviewImage();
          }
      });
    });
  </script>
</body>
</html>
@endsection