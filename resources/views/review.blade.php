@extends('layouts.app')
@section('content')
<div class="min-h-screen bg-gradient-to-b from-gray-100 to-white py-8 sm:py-12">
    <div class="container mx-auto px-4">
        <!-- Header Section with Fade Effect -->
        

        <!-- Review Form with Blue Background -->
        <div class="max-w-2xl mx-auto rounded-3xl p-4 sm:p-8">
            <div class="bg-blue-50 rounded-2xl p-4 sm:p-8">
                <form action="{{ route('reviews.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4 sm:space-y-6">
                    @csrf
                    
                    <!-- Star Rating Section -->
                    <div class="text-center mb-6 sm:mb-8">
                        <h3 class="text-xl sm:text-2xl font-semibold text-gray-700 mb-4 sm:mb-6">How would you rate your experience? <span class="text-red-500">*</span></h3>
                        <div class="rating-container p-4 sm:p-6 mb-4">
                            <div class="flex justify-center space-x-2 sm:space-x-6 mb-4">
                                <div class="rating-star" data-rating="1">
                                    <div class="star-wrapper">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 sm:h-12 sm:w-12 text-gray-300 cursor-pointer transition-all duration-300" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="rating-star" data-rating="2">
                                    <div class="star-wrapper">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 sm:h-12 sm:w-12 text-gray-300 cursor-pointer transition-all duration-300" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="rating-star" data-rating="3">
                                    <div class="star-wrapper">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 sm:h-12 sm:w-12 text-gray-300 cursor-pointer transition-all duration-300" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="rating-star" data-rating="4">
                                    <div class="star-wrapper">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 sm:h-12 sm:w-12 text-gray-300 cursor-pointer transition-all duration-300" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="rating-star" data-rating="5">
                                    <div class="star-wrapper">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 sm:h-12 sm:w-12 text-gray-300 cursor-pointer transition-all duration-300" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="rating-feedback text-gray-500 text-xs sm:text-sm text-center"></div>
                            <div class="selected-rating text-amber-500 font-medium text-base sm:text-lg mt-2 text-center"></div>
                        </div>
                        <input type="hidden" name="rating" id="rating" required>
                    </div>

                    <!-- Name Field -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Your Name <span class="text-red-500">*</span></label>
                        <input type="text" 
                               id="name" 
                               name="name" 
                               required 
                               class="w-full bg-white px-3 sm:px-4 py-2 sm:py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200"
                               placeholder="Enter your name">
                    </div>

                    <!-- Profile Picture Field -->
                    <div>
                        <label for="profile_picture" class="block text-sm font-medium text-gray-700 mb-2">Picture</label>
                        <div class="flex items-center space-x-2 sm:space-x-4">
                            <div class="relative">
                                <input type="file" 
                                       id="profile_picture" 
                                       name="profile_picture" 
                                       accept="image/*"
                                       class="hidden"
                                       onchange="previewImage(this)">
                                <label for="profile_picture" 
                                       class="cursor-pointer bg-gray-100 hover:bg-gray-200 text-gray-600 px-3 sm:px-4 py-2 rounded-lg transition-colors duration-200 text-sm">
                                    Choose File
                                </label>
                            </div>
                            <div id="image-preview" class="hidden">
                                <img src="" alt="Preview" class="w-10 h-10 sm:w-12 sm:h-12 rounded-full object-cover">
                            </div>
                        </div>
                    </div>

                    <!-- Email Field -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address <span class="text-red-500">*</span></label>
                        <input type="email" 
                               id="email" 
                               name="email" 
                               required 
                               class="w-full bg-white px-3 sm:px-4 py-2 sm:py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200"
                               placeholder="Enter your email">
                    </div>

                    <!-- Feedback Field -->
                    <div>
                        <label for="feedback" class="block text-sm font-medium text-gray-700 mb-2">Your Experience <span class="text-red-500">*</span></label>
                        <textarea id="feedback" 
                                  name="feedback" 
                                  required 
                                  rows="4" 
                                  class="w-full px-3 sm:px-4 py-2 sm:py-3 rounded-lg border bg-white border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200"
                                  placeholder="Share your experience with us..."></textarea>
                    </div>

                    <!-- Submit Button -->
                    <div class="text-center">
                        <button type="submit" 
                                class="bg-[#F05052] hover:bg-[#f05060] hover:cursor-pointer text-white font-semibold px-6 sm:px-8 py-2 sm:py-3 rounded-lg transition-colors duration-200 transform hover:scale-105 text-sm sm:text-base">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@include('components.testimonials')

<!-- JavaScript for Rating and Image Preview -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Rating functionality
    const ratingStars = document.querySelectorAll('.rating-star');
    const ratingInput = document.getElementById('rating');
    const ratingFeedback = document.querySelector('.rating-feedback');
    const selectedRating = document.querySelector('.selected-rating');
    const ratingContainer = document.querySelector('.rating-container');

    const ratingLabels = {
        1: "Poor",
        2: "Fair",
        3: "Good",
        4: "Very Good",
        5: "Excellent"
    };

    const feedbackMessages = {
        1: "We're sorry to hear that. We'll work hard to improve!",
        2: "Thank you for your feedback. We'll take it into consideration.",
        3: "Glad you had a good experience!",
        4: "We're happy you enjoyed your time with us!",
        5: "Thank you for the excellent rating! We're thrilled!"
    };

    ratingStars.forEach(star => {
        star.addEventListener('click', function() {
            const rating = this.getAttribute('data-rating');
            ratingInput.value = rating;
            
            // Remove active class from all stars
            ratingStars.forEach(s => {
                s.classList.remove('active');
                s.querySelector('.star-wrapper').style.transform = 'scale(1)';
                s.querySelector('svg').classList.remove('text-amber-400');
                s.querySelector('svg').classList.add('text-gray-300');
            });
            
            // Add active class to selected star and all stars before it
            for (let i = 0; i < rating; i++) {
                ratingStars[i].classList.add('active');
                ratingStars[i].querySelector('.star-wrapper').style.transform = 'scale(1.2)';
                ratingStars[i].querySelector('svg').classList.remove('text-gray-300');
                ratingStars[i].querySelector('svg').classList.add('text-amber-400');
            }
            
            // Show selected rating text
            selectedRating.textContent = ratingLabels[rating];
            selectedRating.style.opacity = '1';
            
            // Show feedback message
            ratingFeedback.textContent = feedbackMessages[rating];
            ratingFeedback.style.opacity = '1';
            
            // Add pulse animation to container
            ratingContainer.classList.add('pulse');
            setTimeout(() => {
                ratingContainer.classList.remove('pulse');
            }, 500);
        });

        // Hover effect
        star.addEventListener('mouseenter', function() {
            if (!this.classList.contains('active')) {
                this.querySelector('.star-wrapper').style.transform = 'scale(1.1)';
            }
        });

        star.addEventListener('mouseleave', function() {
            if (!this.classList.contains('active')) {
                this.querySelector('.star-wrapper').style.transform = 'scale(1)';
            }
        });
    });
});

// Image preview functionality
function previewImage(input) {
    const preview = document.getElementById('image-preview');
    const previewImg = preview.querySelector('img');
    
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            previewImg.src = e.target.result;
            preview.classList.remove('hidden');
        }
        
        reader.readAsDataURL(input.files[0]);
    }
}
</script>

<style>
.rating-star {
    position: relative;
    transition: all 0.3s ease;
}

.star-wrapper {
    display: flex;
    flex-direction: column;
    align-items: center;
    transition: transform 0.3s ease;
}

.rating-label {
    font-size: 0.75rem;
    color: #6B7280;
    margin-top: 0.25rem;
    opacity: 0;
    transform: translateY(10px);
    transition: all 0.3s ease;
}

@media (min-width: 640px) {
    .rating-label {
        font-size: 0.875rem;
        margin-top: 0.5rem;
    }
}

.rating-star:hover .rating-label,
.rating-star.active .rating-label {
    opacity: 1;
    transform: translateY(0);
}

.rating-star.active svg {
    filter: drop-shadow(0 0 8px rgba(245, 158, 11, 0.5));
}

.rating-feedback {
    transition: opacity 0.3s ease;
    opacity: 0;
}

@keyframes pulse {
    0% {
        transform: scale(1);
    }
    50% {
        transform: scale(1.02);
    }
    100% {
        transform: scale(1);
    }
}

.pulse {
    animation: pulse 0.5s ease-in-out;
}

.rating-container {
    transition: all 0.3s ease;
    border: 2px solid transparent;
}

.rating-star.active + .rating-container {
    border-color: #F59E0B;
}
</style>
@endsection 