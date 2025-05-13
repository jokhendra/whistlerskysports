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
                           value="{{ old('email','nothing@gmail.com') }}"
                           required>
                </div>
                
                <!-- Name -->
                <div class="mb-6">
                    <label for="name" class="block mb-2 font-medium">
                        What's your name?<span class="text-red-500">*</span>
                    </label>
                    <input type="text" 
                           id="name" 
                           name="name" 
                           class="w-full p-2 border border-gray-300 rounded"
                           value="{{ old('name','John Doe') }}"
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
                           value="{{ old('flight_date', '2025-01-01') }}"
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
                               value="{{ old('likelihood', '3') }}"
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
                
                <!-- Feedback -->
                <div class="mb-6">
                    <label for="feedback" class="block mb-2 font-medium">
                        Your feedback on the experience
                    </label>
                    <textarea 
                           id="feedback" 
                           name="feedback" 
                           rows="4"
                           class="w-full p-2 border border-gray-300 rounded"
                           value="{{ old('feedback', 'This is a test feedback') }}"
                           minlength="10"></textarea>
                </div>
                
                <!-- Photo Upload -->
                <div class="mb-6">
                    <label class="block mb-2 font-medium">
                        Feel free to upload a photo or a short 5-second clip of your best moments with us!
                    </label>
                    <div class="border border-dashed border-gray-300 p-4 text-center mt-2 relative">
                        <div id="drop-area" class="cursor-pointer min-h-[120px] flex flex-col items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <p class="text-gray-600">Drop image/video here or click to select</p>
                            <p class="text-xs text-gray-500 mt-1">Supported: JPG, PNG, GIF, MP4, MOV (max 10MB)</p>
                            <input type="file" 
                                   id="media_upload" 
                                   name="media_upload" 
                                   class="opacity-0 absolute inset-0 w-full h-full cursor-pointer"
                                   accept="image/*,video/*">
                        </div>
                        <div id="file-preview" class="hidden flex flex-col items-center justify-center mt-4"></div>
                    </div>
                    <!-- Debug info for file upload -->
                    <div id="upload-debug" class="mt-2 text-xs text-gray-500"></div>
                </div>
                
                <!-- Social Media -->
                <div class="mb-6">
                    <label class="block mb-2 font-medium">
                        Do you currently maintain an account on a social media site?
                    </label>
                    <div class="custom-radio-checkbox">
                        <input type="radio" id="social_yes" name="has_social_media" value="yes" {{ old('has_social_media', 'yes') == 'yes' ? 'checked' : '' }}>
                        <label for="social_yes">Yes - then why don't you follow us and show some love!</label>
                    </div>
                    
                    <div class="custom-radio-checkbox">
                        <input type="radio" id="social_no" name="has_social_media" value="no" {{ old('has_social_media', 'no') == 'no' ? 'checked' : '' }}>
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
    const filePreview = document.getElementById('file-preview');
    const uploadDebug = document.getElementById('upload-debug');
    
    // Update debug info 
    function updateDebugInfo(message) {
        uploadDebug.textContent = message;
    }
    
    updateDebugInfo('File upload ready. No file selected.');
    
    // Direct file input change event
    fileInput.addEventListener('change', function(e) {
        if (fileInput.files.length) {
            const file = fileInput.files[0];
            updateDebugInfo('File selected via input: ' + file.name + ' (' + formatFileSize(file.size) + ')');
            handleFileSelection(file);
        } else {
            updateDebugInfo('No file selected from input.');
        }
    });
    
    // Click on drop area
    dropArea.addEventListener('click', function(e) {
        // Don't trigger another click if we're already clicking the input
        if (e.target !== fileInput) {
            fileInput.click();
        }
    });
    
    // Drag events
    dropArea.addEventListener('dragover', function(e) {
        e.preventDefault();
        dropArea.classList.add('border-blue-500');
        dropArea.classList.add('bg-blue-50');
        updateDebugInfo('Drop file here...');
    });
    
    dropArea.addEventListener('dragleave', function() {
        dropArea.classList.remove('border-blue-500');
        dropArea.classList.remove('bg-blue-50');
        if (!fileInput.files.length) {
            updateDebugInfo('File upload ready. No file selected.');
        }
    });
    
    dropArea.addEventListener('drop', function(e) {
        e.preventDefault();
        dropArea.classList.remove('border-blue-500');
        dropArea.classList.remove('bg-blue-50');
        
        if (e.dataTransfer.files.length) {
            const file = e.dataTransfer.files[0];
            updateDebugInfo('File dropped: ' + file.name + ' (' + formatFileSize(file.size) + ')');
            
            // Manually set the file input value for the form
            const dataTransfer = new DataTransfer();
            dataTransfer.items.add(file);
            fileInput.files = dataTransfer.files;
            
            handleFileSelection(file);
        }
    });
    
    function handleFileSelection(file) {
        // Check file size (10MB max)
        const maxSize = 10 * 1024 * 1024; // 10MB in bytes
        if (file.size > maxSize) {
            alert('File is too large. Maximum size is 10MB.');
            updateDebugInfo('Error: File too large (' + formatFileSize(file.size) + '). Maximum is 10MB.');
            return;
        }
        
        // Clear previous preview
        filePreview.innerHTML = '';
        filePreview.classList.remove('hidden');
        
        // Show appropriate preview based on file type
        const fileType = file.type.split('/')[0];
        
        if (fileType === 'image') {
            createImagePreview(file);
            updateDebugInfo('Image selected: ' + file.name + ' (' + formatFileSize(file.size) + ')');
        } else if (fileType === 'video') {
            createVideoPreview(file);
            updateDebugInfo('Video selected: ' + file.name + ' (' + formatFileSize(file.size) + ')');
        } else {
            alert('Unsupported file type. Please upload an image or video.');
            updateDebugInfo('Error: Unsupported file type (' + file.type + ')');
            return;
        }
        
        // Add file info
        const fileInfo = document.createElement('div');
        fileInfo.className = 'mt-2 text-sm text-gray-600 flex items-center justify-between w-full';
        fileInfo.innerHTML = `
            <span class="truncate max-w-[200px]">${file.name}</span>
            <span class="ml-2">(${formatFileSize(file.size)})</span>
        `;
        filePreview.appendChild(fileInfo);
        
        // Add remove button
        const removeButton = document.createElement('button');
        removeButton.type = 'button';
        removeButton.className = 'mt-2 text-red-500 text-sm hover:text-red-700';
        removeButton.textContent = 'Remove file';
        removeButton.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            resetFileUpload();
        });
        filePreview.appendChild(removeButton);
        
        // Hide the original drop area content
        dropArea.classList.add('hidden');
    }
    
    function createImagePreview(file) {
        const img = document.createElement('img');
        img.src = URL.createObjectURL(file);
        img.className = 'max-h-[200px] rounded-lg shadow-md';
        filePreview.appendChild(img);
    }
    
    function createVideoPreview(file) {
        const video = document.createElement('video');
        video.src = URL.createObjectURL(file);
        video.className = 'max-h-[200px] rounded-lg shadow-md';
        video.controls = true;
        video.muted = true;
        filePreview.appendChild(video);
    }
    
    function resetFileUpload() {
        // Clear the file input
        fileInput.value = '';
        
        // Hide preview
        filePreview.innerHTML = '';
        filePreview.classList.add('hidden');
        
        // Show the original drop area content
        dropArea.classList.remove('hidden');
        
        updateDebugInfo('File removed. No file selected.');
    }
    
    function formatFileSize(bytes) {
        if (bytes < 1024) return bytes + ' bytes';
        else if (bytes < 1048576) return (bytes / 1024).toFixed(1) + ' KB';
        else return (bytes / 1048576).toFixed(1) + ' MB';
    }
    
    // Add form submit event listener to verify file is included
    const form = document.querySelector('form');
    form.addEventListener('submit', function(e) {
        if (fileInput.files.length) {
            updateDebugInfo('Submitting form with file: ' + fileInput.files[0].name);
        } else {
            updateDebugInfo('Submitting form without a file.');
        }
    });
    
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