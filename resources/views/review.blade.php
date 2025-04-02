@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-gray-50 to-white py-12">
    <div class="container mx-auto px-4">
        <!-- Header Section -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-800 mb-4">Share Your Experience</h1>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">Your feedback helps us improve and provide better experiences for our community</p>
        </div>

        <!-- Review Form -->
        <div class="max-w-2xl mx-auto bg-white rounded-2xl p-8">
            <form action="{{ route('reviews.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                
                <!-- Star Rating Section -->
                <div class="text-center mb-8">
                    <h3 class="text-2xl font-semibold text-gray-700 mb-6">How would you rate your experience?</h3>
                    <div class="rating-container p-6 mb-4">
                        <div class="flex justify-center space-x-6 mb-4">
                            <div class="rating-emoji" data-rating="1">
                                <div class="emoji-wrapper">
                                    <span class="text-5xl cursor-pointer transition-all duration-300">😞</span>
                                    <div class="rating-label">Poor</div>
                                </div>
                            </div>
                            <div class="rating-emoji" data-rating="2">
                                <div class="emoji-wrapper">
                                    <span class="text-5xl cursor-pointer transition-all duration-300">😐</span>
                                    <div class="rating-label">Fair</div>
                                </div>
                            </div>
                            <div class="rating-emoji" data-rating="3">
                                <div class="emoji-wrapper">
                                    <span class="text-5xl cursor-pointer transition-all duration-300">🙂</span>
                                    <div class="rating-label">Good</div>
                                </div>
                            </div>
                            <div class="rating-emoji" data-rating="4">
                                <div class="emoji-wrapper">
                                    <span class="text-5xl cursor-pointer transition-all duration-300">😊</span>
                                    <div class="rating-label">Very Good</div>
                                </div>
                            </div>
                            <div class="rating-emoji" data-rating="5">
                                <div class="emoji-wrapper">
                                    <span class="text-5xl cursor-pointer transition-all duration-300">😄</span>
                                    <div class="rating-label">Excellent</div>
                                </div>
                            </div>
                        </div>
                        <div class="rating-feedback text-gray-500 text-sm"></div>
                    </div>
                    <input type="hidden" name="rating" id="rating" required>
                </div>

                <!-- Name Field -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Your Name</label>
                    <input type="text" 
                           id="name" 
                           name="name" 
                           required 
                           class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200"
                           placeholder="Enter your name">
                </div>

                <!-- Profile Picture Field -->
                <div>
                    <label for="profile_picture" class="block text-sm font-medium text-gray-700 mb-2">Profile Picture (Optional)</label>
                    <div class="flex items-center space-x-4">
                        <div class="relative">
                            <input type="file" 
                                   id="profile_picture" 
                                   name="profile_picture" 
                                   accept="image/*"
                                   class="hidden"
                                   onchange="previewImage(this)">
                            <label for="profile_picture" 
                                   class="cursor-pointer bg-gray-100 hover:bg-gray-200 text-gray-600 px-4 py-2 rounded-lg transition-colors duration-200">
                                Choose File
                            </label>
                        </div>
                        <div id="image-preview" class="hidden">
                            <img src="" alt="Preview" class="w-12 h-12 rounded-full object-cover">
                        </div>
                    </div>
                </div>

                <!-- Email Field -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                    <input type="email" 
                           id="email" 
                           name="email" 
                           required 
                           class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200"
                           placeholder="Enter your email">
                </div>

                <!-- Feedback Field -->
                <div>
                    <label for="feedback" class="block text-sm font-medium text-gray-700 mb-2">Your Feedback</label>
                    <textarea id="feedback" 
                              name="feedback" 
                              required 
                              rows="4" 
                              class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200"
                              placeholder="Share your experience with us..."></textarea>
                </div>

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit" 
                            class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-8 py-3 rounded-lg transition-colors duration-200 transform hover:scale-105">
                        Submit Review
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@include('components.testimonials')
@include('common.footer')

<!-- JavaScript for Rating and Image Preview -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Rating functionality
    const ratingEmojis = document.querySelectorAll('.rating-emoji');
    const ratingInput = document.getElementById('rating');
    const ratingFeedback = document.querySelector('.rating-feedback');
    const ratingContainer = document.querySelector('.rating-container');

    const feedbackMessages = {
        1: "We're sorry to hear that. We'll work hard to improve!",
        2: "Thank you for your feedback. We'll take it into consideration.",
        3: "Glad you had a good experience!",
        4: "We're happy you enjoyed your time with us!",
        5: "Thank you for the excellent rating! We're thrilled!"
    };

    ratingEmojis.forEach(emoji => {
        emoji.addEventListener('click', function() {
            const rating = this.getAttribute('data-rating');
            ratingInput.value = rating;
            
            // Remove active class from all emojis
            ratingEmojis.forEach(e => {
                e.classList.remove('active');
                e.querySelector('.emoji-wrapper').style.transform = 'scale(1)';
            });
            
            // Add active class to selected emoji
            this.classList.add('active');
            this.querySelector('.emoji-wrapper').style.transform = 'scale(1.2)';
            
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
        emoji.addEventListener('mouseenter', function() {
            if (!this.classList.contains('active')) {
                this.querySelector('.emoji-wrapper').style.transform = 'scale(1.1)';
            }
        });

        emoji.addEventListener('mouseleave', function() {
            if (!this.classList.contains('active')) {
                this.querySelector('.emoji-wrapper').style.transform = 'scale(1)';
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
.rating-emoji {
    position: relative;
    transition: all 0.3s ease;
}

.emoji-wrapper {
    display: flex;
    flex-direction: column;
    align-items: center;
    transition: transform 0.3s ease;
}

.rating-label {
    font-size: 0.875rem;
    color: #6B7280;
    margin-top: 0.5rem;
    opacity: 0;
    transform: translateY(10px);
    transition: all 0.3s ease;
}

.rating-emoji:hover .rating-label,
.rating-emoji.active .rating-label {
    opacity: 1;
    transform: translateY(0);
}

.rating-emoji.active span {
    filter: drop-shadow(0 0 8px rgba(59, 130, 246, 0.5));
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

.rating-emoji.active + .rating-container {
    border-color: #3B82F6;
}
</style>
@endsection 