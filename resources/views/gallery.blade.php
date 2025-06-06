@extends('layouts.app')

@section('meta')
  <meta name="description" content="Explore breathtaking aerial photography and videos of Whistler Sky Sports' ultralight aircraft adventures. View our gallery showcasing open cockpit trikes, fixed-wing aircraft, and stunning mountain aerial views.">
  <meta property="og:title" content="Whistler Sky Sports - Photo and Video Gallery">
  <meta property="og:description" content="Experience the beauty of flight through our gallery of ultralight aircraft and aerial mountain views around Whistler and Pemberton.">
  <meta property="og:type" content="website">
  <meta property="og:image" content="{{ asset('images/aerial_views/aerial_view1.png') }}">
  <meta name="twitter:card" content="summary_large_image">
@endsection

@push('styles')
  <style>
    /* Animation keyframes */
    @keyframes slide-up {
      0% { opacity: 0; transform: translateY(50px) scale(0.95); }
      100% { opacity: 1; transform: translateY(0) scale(1); }
    }
    @keyframes slide-left {
      0% { opacity: 0; transform: translateX(50px) scale(0.95); }
      100% { opacity: 1; transform: translateX(0) scale(1); }
    }
    @keyframes slide-down {
      0% { opacity: 0; transform: translateY(-50px) scale(0.95); }
      100% { opacity: 1; transform: translateY(0) scale(1); }
    }
    @keyframes float-bottom-top {
      0% { transform: translateY(100%); opacity: 0; }
      10% { opacity: 1; }
      90% { opacity: 1; }
      100% { transform: translateY(-100%); opacity: 0; }
    }
    @keyframes float-right-left {
      0% { transform: translateX(100%); opacity: 0; }
      10% { opacity: 1; }
      90% { opacity: 1; }
      100% { transform: translateX(-100%); opacity: 0; }
    }
    @keyframes float-top-bottom {
      0% { transform: translateY(-100%); opacity: 0; }
      10% { opacity: 1; }
      90% { opacity: 1; }
      100% { transform: translateY(100%); opacity: 0; }
    }
    @keyframes subtle-zoom {
      0%, 100% { transform: scale(1); }
      50% { transform: scale(1.05); }
    }
    @keyframes slide-diagonal {
      0% { 
        opacity: 0; 
        transform: translate(-50px, 50px) rotate(-5deg) scale(0.95); 
      }
      100% { 
        opacity: 1; 
        transform: translate(0, 0) rotate(0) scale(1); 
      }
    }

    /* Carousel styles */
    .carousel-container { overflow: hidden; }
    .carousel-slides { position: relative; }
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

    /* Carousel dots */
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

    /* Text effects */
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

    /* Container animations */
    .animate-slide-up { animation: slide-up 1s cubic-bezier(0.4, 0, 0.2, 1) forwards; }
    .animate-slide-left { animation: slide-left 1s cubic-bezier(0.4, 0, 0.2, 1) forwards; }
    .animate-slide-down { animation: slide-down 1s cubic-bezier(0.4, 0, 0.2, 1) forwards; }
    .animate-slide-diagonal { animation: slide-diagonal 1.2s cubic-bezier(0.34, 1.56, 0.64, 1) forwards; }
  </style>
@endpush



@section('content')

  
  <!-- Gallery Hero Section -->
  <div class="bg-gradient-to-b from-blue-900 to-blue-700 text-white py-8 sm:py-12 md:py-16 lg:mt-24 md:mt-24 mt-16">
    <div class="container mx-auto px-4 text-center">
      <h1 class="text-4xl md:text-5xl font-bold mb-4">Whistler Sky Sports - Photo and Video Gallery</h1>
      <p class="text-lg text-blue-100 max-w-3xl mx-auto">Experience the thrill of ultralight flying with our stunning collection of aerial photographs and videos captured above the breathtaking landscapes of Whistler and Pemberton, BC.</p>
    </div>
  </div>
  
  <!-- Gallery Section -->
  <div class="py-8 bg-gradient-to-b from-white to-gray-50">
    <div class="container mx-auto px-4">
      <h2 class="text-3xl font-bold text-center mb-8">Flight Experience Photo Collections</h2>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <!-- Gallery Items - Dynamic from Database -->
        @php
          // Default animation mapping for categories
          $animationMap = [
            'aerial_views' => [
              'animation' => 'slide-up',
              'text_animation' => 'float-bottom-top',
              'bg_color' => 'blue',
            ],
            'microlite' => [
              'animation' => 'slide-diagonal',
              'text_animation' => 'float-bottom-top',
              'bg_color' => 'red',
            ],
            'fixed_wings' => [
              'animation' => 'slide-down',
              'text_animation' => 'float-top-bottom',
              'bg_color' => 'yellow',
            ]
          ];

          // Fallback animations
          $defaultAnimations = [
            ['animation' => 'slide-up', 'text_animation' => 'float-bottom-top', 'bg_color' => 'blue'],
            ['animation' => 'slide-diagonal', 'text_animation' => 'float-right-left', 'bg_color' => 'red'],
            ['animation' => 'slide-down', 'text_animation' => 'float-top-bottom', 'bg_color' => 'green'],
            ['animation' => 'slide-left', 'text_animation' => 'float-right-left', 'bg_color' => 'purple'],
          ];
        @endphp
        
        @if(isset($categoriesWithImages) && $categoriesWithImages->count() > 0)
          @foreach($categoriesWithImages as $index => $category)
            @php
              // Get animation properties based on slug or use fallback
              $animationProps = $animationMap[$category->slug] ?? $defaultAnimations[$index % count($defaultAnimations)];
              
              // Make sure category has images
              if($category->activeImages->isEmpty()) continue;
            @endphp
            
            <div class="relative overflow-hidden rounded-xl shadow-xl bg-white h-[500px] opacity-0 animate-{{ $animationProps['animation'] }}" 
                 onclick="openImagePreview('{{ $category->slug }}', {{ json_encode($category->activeImages->pluck('id')) }})"
                 aria-label="Open {{ $category->name }} image gallery">
              <div class="absolute inset-0 bg-{{ $animationProps['bg_color'] }}-600/10 backdrop-blur-sm z-0"></div>
              <div class="relative z-10 p-4 h-full">
                <div class="carousel-container relative h-full">
                  <div class="carousel-slides h-full">
                    @foreach($category->activeImages as $index => $image)
                    <div class="carousel-slide absolute inset-0" data-index="{{ $index }}">
                      <img src="{{ $image->image_url }}" 
                           alt="{{ $image->title }} - Whistler Sky Sports {{ $category->name }} in British Columbia" 
                           class="w-full h-full object-cover rounded-lg transition-transform duration-1000 hover:scale-110"
                           loading="lazy">
                    </div>
                    @endforeach
                  </div>
                  <div class="absolute inset-0 flex items-center justify-center pointer-events-none z-20">
                    <h3 class="text-4xl font-bold text-white animate-{{ $animationProps['text_animation'] }}">{{ $category->name }}</h3>
                  </div>
                  <div class="absolute bottom-4 left-0 right-0 flex justify-center space-x-2 z-20">
                    <div class="carousel-dots flex space-x-2" role="tablist" aria-label="{{ $category->name }} image navigation"></div>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        @else
          <!-- Fallback to hardcoded gallery items if no database images -->
        @foreach([
          [
            'category' => 'aerial_views',
            'title' => 'Aerial Views',
            'images' => ['aerial_view1.png', 'aerial_view3.png', 'aerial_view4.png', 'aerial_view5.png', 'aerial_view6.png', 'aerial_view7.png', 'Whistler 1.jpg'],
            'animation' => 'slide-up',
            'text_animation' => 'float-bottom-top',
            'bg_color' => 'blue',
          ],
          [
            'category' => 'microlite',
            'title' => 'Open Cockpit Trikes',
            'images' => ['IMG_7634.jpg','Single_Ultraligh1.jpeg', 'Solo_2.jpeg', 'Hangar.jpeg', 'Skypper 2.jpeg', 'Landscape.jpg', 'Landsacpe2.jpg', 'Copy of image000001.JPG'],
            'animation' => 'slide-diagonal',
            'text_animation' => 'float-bottom-top',
            'bg_color' => 'red',
          ],
          [
            'category' => 'fixed_wings',
            'title' => 'Fixed Wing Aircraft',
            'images' => ['IMG_7849.JPG','IMG_7850.JPG','IMG_7848.JPG','IMG_7847.JPG','IMG_7846.JPG','AnyConv.com__IMG_7013.jpg', 'AnyConv.com__IMG_7016 2.jpg', 'AnyConv.com__IMG_7017 2.jpg', 'AnyConv.com__IMG_7021.jpg', 'AnyConv.com__IMG_7022.jpg'],
            'animation' => 'slide-down',
            'text_animation' => 'float-top-bottom',
            'bg_color' => 'yellow',
          ],
        ] as $galleryItem)
        <div class="relative overflow-hidden rounded-xl shadow-xl bg-white h-[500px] opacity-0 animate-{{ $galleryItem['animation'] }}" 
             onclick="openImagePreview('{{ $galleryItem['category'] }}')"
             aria-label="Open {{ $galleryItem['title'] }} image gallery">
          <div class="absolute inset-0 bg-{{ $galleryItem['bg_color'] }}-600/10 backdrop-blur-sm z-0"></div>
          <div class="relative z-10 p-4 h-full">
            <div class="carousel-container relative h-full">
              <div class="carousel-slides h-full">
                @foreach($galleryItem['images'] as $index => $image)
                <div class="carousel-slide absolute inset-0" data-index="{{ $index }}">
                  <img src="{{ asset('images/' . $galleryItem['category'] . '/' . $image) }}" 
                       alt="Whistler Sky Sports {{ $galleryItem['title'] }} - {{ substr($image, 0, strrpos($image, '.')) }} in Whistler, BC" 
                       class="w-full h-full object-cover rounded-lg transition-transform duration-1000 hover:scale-110"
                       loading="lazy">
                </div>
                @endforeach
              </div>
              <div class="absolute inset-0 flex items-center justify-center pointer-events-none z-20">
                <h3 class="text-4xl font-bold text-white animate-{{ $galleryItem['text_animation'] }}">{{ $galleryItem['title'] }}</h3>
              </div>
              <div class="absolute bottom-4 left-0 right-0 flex justify-center space-x-2 z-20">
                <div class="carousel-dots flex space-x-2" role="tablist" aria-label="{{ $galleryItem['title'] }} image navigation"></div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
        @endif
      </div>
    </div>
  </div>
  
  <!-- Video Section -->
  <div class="bg-gray-900 py-16">
    <div class="container mx-auto px-4">
      <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-white">Experience the Thrill of Flight in Whistler</h2>
        <p class="text-lg text-gray-300 mt-4 max-w-3xl mx-auto">Watch our breathtaking aerial footage showcasing the exhilarating experience of ultralight flying with Whistler Sky Sports!</p>
      </div>
      
      <div class="max-w-5xl mx-auto">
        <div class="relative rounded-2xl overflow-hidden shadow-2xl transform transition-all duration-500 hover:scale-[1.02] bg-black">
          <!-- Video Container -->
          <div class="relative aspect-w-16 aspect-h-9">
            <!-- Thumbnail Image -->
            <img 
              src="{{ asset('images/video-thumbnail.jpg') }}"
              alt="Whistler Sky Sports Flight Experience Video - Aerial views of Whistler and Pemberton mountains" 
              class="absolute inset-0 w-full h-full object-cover"
              loading="lazy"
            >
            
            <!-- Play Button Overlay -->
            <div class="absolute inset-0 flex items-center justify-center bg-black/30 hover:bg-black/40 transition-colors duration-300 cursor-pointer"
                 aria-label="Play video">
              <div class="w-20 h-20 rounded-full bg-white/90 flex items-center justify-center transform transition-transform duration-300 hover:scale-110">
                <svg class="w-10 h-10 text-gray-900" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                  <path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"/>
                </svg>
              </div>
            </div>

            <!-- YouTube iframe (hidden by default) -->
            <iframe 
              id="youtube-player"
              src="https://www.youtube.com/embed/J2MGdI4Zq9U?autoplay=1&rel=0&modestbranding=1&playsinline=1" 
              title="Whistler Sky Sports Aerial Adventure Experience"
              frameborder="0" 
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
              allowfullscreen 
              class="absolute inset-0 w-full h-full opacity-0 pointer-events-none"
            ></iframe>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Image Preview Modal -->
  <div id="imagePreviewModal" class="fixed inset-0 bg-black bg-opacity-90 hidden z-50" role="dialog" aria-modal="true" aria-labelledby="imagePreviewTitle">
    <div class="relative w-full h-full flex items-center justify-center">
      <!-- Hidden accessible title -->
      <h2 id="imagePreviewTitle" class="sr-only">Image Preview</h2>
      
      <!-- Close button -->
      <button onclick="closeImagePreview()" class="absolute top-4 right-4 text-white hover:text-gray-300 z-50" aria-label="Close image preview">
        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
        </svg>
      </button>

      <!-- Navigation buttons -->
      <button onclick="prevPreviewImage()" class="absolute left-4 top-1/2 -translate-y-1/2 text-white hover:text-gray-300 z-50" aria-label="Previous image">
        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
        </svg>
      </button>

      <button onclick="nextPreviewImage()" class="absolute right-4 top-1/2 -translate-y-1/2 text-white hover:text-gray-300 z-50" aria-label="Next image">
        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
        </svg>
      </button>

      <!-- Main image -->
      <div class="w-full max-w-7xl mx-auto px-4">
        <img id="previewImage" src="" alt="Whistler Sky Sports Gallery Preview" class="max-h-[85vh] mx-auto object-contain">
        <div class="absolute bottom-4 left-0 right-0 text-center">
          <p id="imageCount" class="text-white text-lg"></p>
        </div>
      </div>
    </div>
  </div>

  <!-- Schema.org structured data for image gallery -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "ImageGallery",
    "name": "Whistler Sky Sports Photo Gallery",
    "description": "View stunning aerial images of ultralight aircraft and breathtaking views from above Whistler and Pemberton, British Columbia.",
    "about": {
      "@type": "Thing",
      "name": "Ultralight Aircraft Flying in Whistler"
    },
    "image": [
      "{{ asset('images/aerial_views/aerial_view1.png') }}",
      "{{ asset('images/microlite/Skypper 2.jpeg') }}",
      "{{ asset('images/fixed_wings/IMG_7849.JPG') }}"
    ],
    "publisher": {
      "@type": "Organization",
      "name": "Whistler Sky Sports",
      "logo": {
        "@type": "ImageObject",
        "url": "{{ asset('images/logo/Whistler-Sky-Sports_Full-Black.png') }}"
      }
    }
  }
  </script>

@endsection

@push('scripts')
  <script>
    // Image Preview Functionality
    const imagePreview = {
      currentIndex: 0,
      images: [],
      imageIds: [],
      category: '',
      modal: document.getElementById('imagePreviewModal'),
      imageElement: document.getElementById('previewImage'),
      countElement: document.getElementById('imageCount'),
      
      open: function(category, imageIds = []) {
        this.category = category;
        
        if (imageIds && imageIds.length > 0) {
          // Using DB images
          this.useDbImages(imageIds);
        } else {
          // Fallback to hardcoded images
          this.useHardcodedImages();
        }
        
        this.currentIndex = 0;
        this.update();
        this.modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
        
        // Set focus on modal for keyboard accessibility
        this.modal.focus();
      },
      
      close: function() {
        this.modal.classList.add('hidden');
        document.body.style.overflow = 'auto';
      },
      
      prev: function() {
        this.currentIndex = (this.currentIndex - 1 + this.images.length) % this.images.length;
        this.update();
      },
      
      next: function() {
        this.currentIndex = (this.currentIndex + 1) % this.images.length;
        this.update();
      },
      
      update: function() {
        if (this.imageIds && this.imageIds.length > 0) {
          // If using DB images
          this.imageElement.src = this.images[this.currentIndex];
          
          // Update the alt text with more descriptive content for SEO
          const galleryImages = this.getGalleryImages();
          const currentImage = galleryImages.find(img => img.id === this.imageIds[this.currentIndex]);
          if (currentImage) {
            this.imageElement.alt = `Whistler Sky Sports - ${currentImage.title} in British Columbia`;
          }
        } else {
          // Fallback to hardcoded paths
          const folder = this.category === 'fixed_wings' ? 'fixed_wings' : 
                        this.category === 'microlite' ? 'microlite' : 'aerial_views';
          
          this.imageElement.src = `{{ asset('images/${folder}') }}/${this.images[this.currentIndex]}`;
          
          // Set more descriptive alt text based on category and filename
          const categoryName = this.category === 'fixed_wings' ? 'Fixed Wing Aircraft' : 
                              this.category === 'microlite' ? 'Open Cockpit Trikes' : 'Aerial Views';
          
          const filename = this.images[this.currentIndex];
          const filenameWithoutExt = filename.substring(0, filename.lastIndexOf('.'));
          this.imageElement.alt = `Whistler Sky Sports ${categoryName} - ${filenameWithoutExt} in Whistler, BC`;
        }
        
        this.countElement.textContent = `${this.currentIndex + 1} / ${this.images.length}`;
      },
      
      useDbImages: function(imageIds) {
        this.imageIds = imageIds;
        this.images = [];
        
        // For each image ID, fetch the image URL
        const galleryImages = this.getGalleryImages();
        
        // Fill images array with actual URLs
        imageIds.forEach(id => {
          const image = galleryImages.find(img => img.id === id);
          if (image) {
            this.images.push(image.url);
          }
        });
      },
      
      getGalleryImages: function() {
        // This retrieves image data from the script we inject in the template
        return window.galleryImages || [];
      },
      
      useHardcodedImages: function() {
        this.imageIds = [];
        
        if (this.category === 'aerial_views') {
          this.images = [
            'aerial_view1.png', 'aerial_view3.png', 'aerial_view4.png', 
            'aerial_view5.png', 'aerial_view6.png', 'aerial_view7.png', 
            'Whistler 1.jpg'
          ];
        } else if (this.category === 'microlite') {
          this.images = [
            'IMG_7634.jpg', 'Single_Ultraligh1.jpeg', 'Solo_2.jpeg', 
            'Hangar.jpeg', 'Skypper 2.jpeg', 'Landscape.jpg', 
            'Landsacpe2.jpg', 'Copy of image000001.JPG'
          ];
        } else if (this.category === 'fixed_wings') {
          this.images = [
            'IMG_7849.JPG', 'IMG_7850.JPG', 'IMG_7848.JPG', 
            'IMG_7847.JPG', 'IMG_7846.JPG', 'AnyConv.com__IMG_7013.jpg', 
            'AnyConv.com__IMG_7016 2.jpg', 'AnyConv.com__IMG_7017 2.jpg', 
            'AnyConv.com__IMG_7021.jpg', 'AnyConv.com__IMG_7022.jpg'
          ];
        }
      }
    };

    // Carousel Functionality
    class Carousel {
      constructor(container) {
        this.container = container;
        this.slides = container.querySelectorAll('.carousel-slide');
        this.dotsContainer = container.querySelector('.carousel-dots');
        this.currentIndex = 0;
        this.interval = null;
        this.init();
      }
      
      init() {
        this.createDots();
        this.update();
        this.startInterval();
        this.addEventListeners();
      }
      
      createDots() {
        this.slides.forEach((_, index) => {
          const dot = document.createElement('button');
          dot.classList.add('carousel-dot');
          dot.setAttribute('role', 'tab');
          dot.setAttribute('aria-selected', index === 0 ? 'true' : 'false');
          dot.setAttribute('aria-label', `Image ${index + 1}`);
          dot.addEventListener('click', () => this.goTo(index));
          this.dotsContainer.appendChild(dot);
        });
        this.dots = this.dotsContainer.querySelectorAll('.carousel-dot');
      }
      
      update() {
        this.slides.forEach((slide, index) => {
          slide.classList.toggle('active', index === this.currentIndex);
          if (this.dots) {
            this.dots[index].classList.toggle('active', index === this.currentIndex);
            this.dots[index].setAttribute('aria-selected', index === this.currentIndex ? 'true' : 'false');
          }
        });
      }
      
      goTo(index) {
        this.currentIndex = (index + this.slides.length) % this.slides.length;
        this.update();
        this.resetInterval();
      }
      
      next() {
        this.goTo(this.currentIndex + 1);
      }
      
      startInterval() {
        this.interval = setInterval(() => this.next(), 5000);
      }
      
      resetInterval() {
        clearInterval(this.interval);
        this.startInterval();
      }
      
      addEventListeners() {
        this.container.addEventListener('mouseenter', () => clearInterval(this.interval));
        this.container.addEventListener('mouseleave', () => this.resetInterval());
      }
    }

    // Initialize on DOM Load
    document.addEventListener('DOMContentLoaded', function() {
      // Store gallery images data
      window.galleryImages = {!! json_encode(isset($categoriesWithImages) ? $categoriesWithImages->flatMap(function($category) {
        return $category->activeImages->map(function($image) {
          return [
            'id' => $image->id,
            'url' => $image->image_url,
            'title' => $image->title
          ];
        });
      })->all() : []) !!};
      
      // Initialize carousels
      document.querySelectorAll('.carousel-container').forEach(container => {
        new Carousel(container);
      });
      
      // Initialize video player
      const videoContainer = document.querySelector('.aspect-w-16');
      const playButton = videoContainer.querySelector('.flex');
      const iframe = document.getElementById('youtube-player');
      
      if (playButton) {
        playButton.addEventListener('click', function() {
          iframe.classList.remove('opacity-0', 'pointer-events-none');
          playButton.style.display = 'none';
        });
      }
      
      // Initialize intersection observers for animations
      const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.style.animationPlayState = 'running';
            observer.unobserve(entry.target);
          }
        });
      }, { threshold: 0.1 });
      
      document.querySelectorAll('[class*="animate-"]').forEach(el => {
        el.style.animationPlayState = 'paused';
        observer.observe(el);
      });
      
      // Keyboard navigation for image preview
      document.addEventListener('keydown', function(e) {
        if (!imagePreview.modal.classList.contains('hidden')) {
          if (e.key === 'Escape') imagePreview.close();
          if (e.key === 'ArrowLeft') imagePreview.prev();
          if (e.key === 'ArrowRight') imagePreview.next();
        }
      });
    });

    // Global functions for HTML onclick handlers
    window.openImagePreview = (category, imageIds) => imagePreview.open(category, imageIds);
    window.closeImagePreview = () => imagePreview.close();
    window.prevPreviewImage = () => imagePreview.prev();
    window.nextPreviewImage = () => imagePreview.next();
  </script>
@endpush