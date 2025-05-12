@extends('layouts.app')

@push('styles')
<style>
.review-container {
    background-color: #004080;
}

/* Star rating custom styles */
.rating-stars input[type="radio"] {
    display: none;
}

.rating-stars label {
    cursor: pointer;
    font-size: 24px;
    color: #ccc;
}

.rating-stars label:hover,
.rating-stars label:hover ~ label,
.rating-stars input[type="radio"]:checked ~ label {
    color: #FFD700;
}

/* Custom radio buttons and checkboxes */
.custom-radio-checkbox input[type="radio"],
.custom-radio-checkbox input[type="checkbox"] {
    display: none;
}

.custom-radio-checkbox label {
    position: relative;
    padding-left: 25px;
    cursor: pointer;
    display: block;
    margin-bottom: 8px;
}

.custom-radio-checkbox label:before {
    content: "";
    position: absolute;
    left: 0;
    top: 2px;
    width: 16px;
    height: 16px;
    border: 1px solid #ccc;
    background-color: #fff;
}

.custom-radio-checkbox input[type="radio"] + label:before {
    border-radius: 50%;
}

.custom-radio-checkbox input[type="checkbox"] + label:before {
    border-radius: 3px;
}

.custom-radio-checkbox input[type="radio"]:checked + label:before,
.custom-radio-checkbox input[type="checkbox"]:checked + label:before {
    background-color: #004080;
    border-color: #004080;
}

.custom-radio-checkbox input[type="radio"]:checked + label:after {
    content: "";
    position: absolute;
    left: 5px;
    top: 7px;
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background-color: white;
}

.custom-radio-checkbox input[type="checkbox"]:checked + label:after {
    content: "✓";
    position: absolute;
    left: 3px;
    top: 0;
    font-size: 14px;
    color: white;
}
</style>
@endpush

@section('content')
<div class="container mx-auto bg-white px-4 py-8 mt-16">
    <div class="max-w-4xl mx-auto">
        <!-- Header -->
        <div class="bg-[#004080] text-white p-4 review-container">
            <h1 class="text-xl font-bold mb-0">Whistler Sky Sports Customer Feedback</h1>
        </div>
        
        <!-- Form Content -->
        <div class="bg-white border border-[#004080] border-t-0 p-5">
            <p class="mb-6 text-sm">
                Thank you for being a valued customer at Whistler Sky Sports! This survey helps us gain 
                deeper insights into your preferences and experiences. We welcome all feedback—positive, 
                constructive, or otherwise—as it drives our commitment to improving and serving you better. 
                Please share your thoughts on how we can enhance your experience and empower you 
                further. Suggestions are always appreciated, and we'll strive to incorporate them wherever 
                possible.
            </p>
            
            <form action="{{ route('reviews.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <!-- Email Address -->
                <div class="mb-6">
                    <label for="email" class="block mb-2 font-medium">
                        What's your email address?<span class="text-red-500">*</span>
                    </label>
                    <input type="email" 
                           id="email" 
                           name="email" 
                           class="w-full p-2 border border-gray-300 rounded"
                           required>
                </div>
                
                <!-- Date Selection -->
                <div class="mb-6">
                    <label for="flight_date" class="block mb-2 font-medium">
                        When did you fly with us?<span class="text-red-500">*</span>
                    </label>
                    <input type="date" 
                           id="flight_date" 
                           name="flight_date" 
                           class="w-full md:w-60 p-2 border border-gray-300 rounded"
                           required>
                </div>
                
                <div class="border-t border-dashed border-gray-300 my-6"></div>
                
                <!-- Aircraft Type -->
                <div class="mb-6">
                    <label class="block mb-2 font-medium">
                        "Which type of aircraft did you fly?"<span class="text-red-500">*</span>
                    </label>
                    <div class="flex gap-5">
                        <div class="border border-gray-300 p-4 min-w-[120px] text-center custom-radio-checkbox">
                            <input type="checkbox" id="open_cockpit" name="aircraft_type[]" value="Open-cockpit trike">
                            <label for="open_cockpit">Open-cockpit trike</label>
                        </div>
                        <div class="border border-gray-300 p-4 min-w-[120px] text-center custom-radio-checkbox">
                            <input type="checkbox" id="fixed_wing" name="aircraft_type[]" value="Fixed-wing, closed-cockpit aircraft">
                            <label for="fixed_wing">Fixed-wing, closed-cockpit aircraft</label>
                        </div>
                    </div>
                </div>
                
                <div class="border-t border-dashed border-gray-300 my-6"></div>
                
                <!-- Instructor Rating -->
                <div class="mb-6">
                    <label class="block mb-2 font-medium">
                        How clear and helpful was your instructor during your ultralight flight lesson?<span class="text-red-500">*</span>
                    </label>
                    <div class="rating-stars flex gap-1" id="instructor_rating_stars">
                        <input type="radio" id="instructor_rating_1" name="instructor_rating" value="1">
                        <label for="instructor_rating_1">★</label>
                        <input type="radio" id="instructor_rating_2" name="instructor_rating" value="2">
                        <label for="instructor_rating_2">★</label>
                        <input type="radio" id="instructor_rating_3" name="instructor_rating" value="3">
                        <label for="instructor_rating_3">★</label>
                        <input type="radio" id="instructor_rating_4" name="instructor_rating" value="4">
                        <label for="instructor_rating_4">★</label>
                        <input type="radio" id="instructor_rating_5" name="instructor_rating" value="5">
                        <label for="instructor_rating_5">★</label>
                    </div>
                </div>
                
                <!-- Fun Experience Rating -->
                <div class="mb-6">
                    <label class="block mb-2 font-medium">
                        How fun was your ultralight flying experience with us?<span class="text-red-500">*</span>
                    </label>
                    <div class="rating-stars flex gap-1" id="fun_rating_stars">
                        <input type="radio" id="fun_rating_1" name="fun_rating" value="1">
                        <label for="fun_rating_1">★</label>
                        <input type="radio" id="fun_rating_2" name="fun_rating" value="2">
                        <label for="fun_rating_2">★</label>
                        <input type="radio" id="fun_rating_3" name="fun_rating" value="3">
                        <label for="fun_rating_3">★</label>
                        <input type="radio" id="fun_rating_4" name="fun_rating" value="4">
                        <label for="fun_rating_4">★</label>
                        <input type="radio" id="fun_rating_5" name="fun_rating" value="5">
                        <label for="fun_rating_5">★</label>
                    </div>
                </div>
                
                <!-- Safety Rating -->
                <div class="mb-6">
                    <label class="block mb-2 font-medium">
                        How safe did you feel training in your ultralight aircraft?<span class="text-red-500">*</span>
                    </label>
                    <div class="rating-stars flex gap-1" id="safety_rating_stars">
                        <input type="radio" id="safety_rating_1" name="safety_rating" value="1">
                        <label for="safety_rating_1">★</label>
                        <input type="radio" id="safety_rating_2" name="safety_rating" value="2">
                        <label for="safety_rating_2">★</label>
                        <input type="radio" id="safety_rating_3" name="safety_rating" value="3">
                        <label for="safety_rating_3">★</label>
                        <input type="radio" id="safety_rating_4" name="safety_rating" value="4">
                        <label for="safety_rating_4">★</label>
                        <input type="radio" id="safety_rating_5" name="safety_rating" value="5">
                        <label for="safety_rating_5">★</label>
                    </div>
                </div>
                
                <!-- Likelihood Scale -->
                <div class="mb-6">
                    <label class="block mb-2 font-medium">
                        How likely are you to fly with us again?<span class="text-red-500">*</span>
                    </label>
                    <div>
                        <input type="range" 
                               id="likelihood" 
                               name="likelihood" 
                               min="1" 
                               max="5" 
                               class="w-full"
                               required>
                        <div class="flex justify-between w-full mt-1 text-xs">
                            <div class="text-center max-w-[80px]">I am not coming</div>
                            <div class="text-center max-w-[80px]">My spouse needs to convince</div>
                            <div class="text-center max-w-[80px]">Maybe</div>
                            <div class="text-center max-w-[80px]">I am coming</div>
                            <div class="text-center max-w-[80px]">Gosh! Yess!!</div>
                        </div>
                    </div>
                </div>
                
                <div class="border-t border-dashed border-gray-300 my-6"></div>
                
                <!-- Photo Upload -->
                <div class="mb-6">
                    <label class="block mb-2 font-medium">
                        Feel free to upload a photo or a short 5-second clip of your best moments with us!
                    </label>
                    <div class="border border-dashed border-gray-300 p-4 text-center mt-2 relative">
                        <div id="drop-area" class="cursor-pointer">
                            <p>Drop image here or select image</p>
                            <input type="file" 
                                   id="media_upload" 
                                   name="media_upload" 
                                   class="hidden"
                                   accept="image/*,video/*">
                        </div>
                    </div>
                </div>
                
                <!-- Social Media -->
                <div class="mb-6">
                    <label class="block mb-2 font-medium">
                        Do you currently maintain an account on a social media site?
                    </label>
                    <div class="custom-radio-checkbox">
                        <input type="radio" id="social_yes" name="has_social_media" value="yes">
                        <label for="social_yes">Yes - then why don't you follow us and show some love!</label>
                    </div>
                    
                    <div class="custom-radio-checkbox">
                        <input type="radio" id="social_no" name="has_social_media" value="no">
                        <label for="social_no">Nay that's not for me</label>
                    </div>
                </div>
                
                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit" 
                           class="bg-[#004080] text-white font-semibold px-8 py-2 rounded hover:bg-[#003366] transition-colors">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Include Testimonials Section -->
@include('components.testimonials')

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // File upload handling
    const dropArea = document.getElementById('drop-area');
    const fileInput = document.getElementById('media_upload');
    
    dropArea.addEventListener('click', function() {
        fileInput.click();
    });
    
    dropArea.addEventListener('dragover', function(e) {
        e.preventDefault();
        dropArea.classList.add('border-blue-500');
    });
    
    dropArea.addEventListener('dragleave', function() {
        dropArea.classList.remove('border-blue-500');
    });
    
    dropArea.addEventListener('drop', function(e) {
        e.preventDefault();
        dropArea.classList.remove('border-blue-500');
        
        if (e.dataTransfer.files.length) {
            fileInput.files = e.dataTransfer.files;
            updateFilePreview(e.dataTransfer.files[0]);
        }
    });
    
    fileInput.addEventListener('change', function() {
        if (fileInput.files.length) {
            updateFilePreview(fileInput.files[0]);
        }
    });
    
    function updateFilePreview(file) {
        const fileType = file.type.split('/')[0];
        
        // Clear previous preview
        while (dropArea.firstChild) {
            dropArea.removeChild(dropArea.firstChild);
        }
        
        if (fileType === 'image') {
            const img = document.createElement('img');
            img.src = URL.createObjectURL(file);
            img.style.maxHeight = '100px';
            img.style.margin = '0 auto';
            dropArea.appendChild(img);
        } else if (fileType === 'video') {
            const video = document.createElement('video');
            video.src = URL.createObjectURL(file);
            video.style.maxHeight = '100px';
            video.style.margin = '0 auto';
            video.controls = true;
            dropArea.appendChild(video);
        }
        
        const fileName = document.createElement('p');
        fileName.textContent = file.name;
        fileName.className = 'mt-2 text-sm text-gray-600';
        dropArea.appendChild(fileName);
    }
    
    // Add star rating functionality
    const ratingContainers = [
        document.getElementById('instructor_rating_stars'),
        document.getElementById('fun_rating_stars'),
        document.getElementById('safety_rating_stars')
    ];
    
    ratingContainers.forEach(container => {
        const stars = container.querySelectorAll('label');
        stars.forEach(star => {
            star.addEventListener('mouseover', function() {
                const ratingValue = this.getAttribute('for').split('_').pop();
                highlightStars(container, ratingValue);
            });
            
            star.addEventListener('mouseout', function() {
                resetStars(container);
                const selectedRating = container.querySelector('input:checked');
                if (selectedRating) {
                    const ratingValue = selectedRating.value;
                    highlightStars(container, ratingValue);
                }
            });
        });
    });
    
    function highlightStars(container, rating) {
        const stars = container.querySelectorAll('label');
        for (let i = 0; i < stars.length; i++) {
            if (i < rating) {
                stars[i].style.color = '#FFD700';
            } else {
                stars[i].style.color = '#ccc';
            }
        }
    }
    
    function resetStars(container) {
        const stars = container.querySelectorAll('label');
        stars.forEach(star => {
            star.style.color = '#ccc';
        });
    }
});
</script>
@endpush