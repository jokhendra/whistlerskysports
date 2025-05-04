@extends('admin.layout.admin')

@push('styles')
<style>
    .dropzone {
        border: 2px dashed #e5e7eb;
        border-radius: 0.5rem;
        padding: 2rem;
        text-align: center;
        transition: all 0.3s ease;
    }
    .dropzone.dragover {
        border-color: #3b82f6;
        background-color: #eff6ff;
    }
    .preview-container {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
        gap: 1rem;
        margin-top: 1rem;
    }
    .preview-item {
        position: relative;
        aspect-ratio: 1;
    }
    .preview-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 0.375rem;
    }
    .preview-remove {
        position: absolute;
        top: 0.25rem;
        right: 0.25rem;
        background: rgba(0, 0, 0, 0.5);
        color: white;
        border-radius: 9999px;
        padding: 0.25rem;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }
    .preview-remove:hover {
        background: rgba(239, 68, 68, 0.8);
    }
</style>
@endpush

@section('content')
<div class="py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="md:flex md:items-center md:justify-between mb-6">
            <div class="flex-1 min-w-0">
                <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                    Upload Images
                </h2>
            </div>
            <div class="mt-4 flex md:mt-0 md:ml-4">
                <a href="{{ route('admin.gallery.index') }}" 
                   class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-lg shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    <svg class="h-5 w-5 mr-2 -ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Back to Gallery
                </a>
            </div>
        </div>

        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <form action="{{ route('admin.gallery.store') }}" 
                  method="POST" 
                  enctype="multipart/form-data"
                  id="upload-form"
                  class="space-y-6 p-6">
                @csrf

                <div class="space-y-6">
                    <!-- Title -->
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700">
                            Title
                        </label>
                        <input type="text" 
                               name="title" 
                               id="title"
                               class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#204fb4] focus:ring focus:ring-[#204fb4]/20 transition-all duration-200"
                               required>
                        @error('title')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700">
                            Description
                        </label>
                        <textarea name="description" 
                                  id="description"
                                  rows="3"
                                  class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"></textarea>
                        @error('description')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Category -->
                    <div>
                        <label for="category_id" class="block text-sm font-medium text-gray-700">
                            Category
                        </label>
                        <select name="category_id" 
                                id="category_id"
                                class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#204fb4] focus:ring focus:ring-[#204fb4]/20 transition-all duration-200">
                            <option value="">Select a category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Image Upload -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">
                            Images
                        </label>
                        <div class="mt-1">
                            <div class="dropzone" id="dropzone">
                                <input type="file" 
                                       name="images[]" 
                                       id="images" 
                                       multiple 
                                       accept="image/*"
                                       class="hidden">
                                <div class="space-y-2">
                                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <div class="text-center">
                                        <p class="text-sm text-gray-600">
                                            Drag and drop your images here, or
                                            <button type="button" 
                                                    class="font-medium text-blue-600 hover:text-blue-500"
                                                    onclick="document.getElementById('images').click()">
                                                browse
                                            </button>
                                        </p>
                                        <p class="text-xs text-gray-500 mt-1">
                                            PNG, JPG, GIF up to 5MB
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="preview-container" id="preview-container"></div>
                            @error('images')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="flex justify-end pt-5">
                    <button type="submit" 
                            class="inline-flex items-center px-4 py-2 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        <svg class="h-5 w-5 mr-2 -ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                        </svg>
                        Upload Images
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const dropzone = document.getElementById('dropzone');
    const input = document.getElementById('images');
    const previewContainer = document.getElementById('preview-container');
    const form = document.getElementById('upload-form');

    // Prevent default drag behaviors
    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        dropzone.addEventListener(eventName, preventDefaults, false);
        document.body.addEventListener(eventName, preventDefaults, false);
    });

    // Highlight dropzone when dragging over it
    ['dragenter', 'dragover'].forEach(eventName => {
        dropzone.addEventListener(eventName, highlight, false);
    });

    ['dragleave', 'drop'].forEach(eventName => {
        dropzone.addEventListener(eventName, unhighlight, false);
    });

    // Handle dropped files
    dropzone.addEventListener('drop', handleDrop, false);
    input.addEventListener('change', handleFiles, false);

    function preventDefaults (e) {
        e.preventDefault();
        e.stopPropagation();
    }

    function highlight(e) {
        dropzone.classList.add('dragover');
    }

    function unhighlight(e) {
        dropzone.classList.remove('dragover');
    }

    function handleDrop(e) {
        const dt = e.dataTransfer;
        const files = dt.files;
        input.files = files;
        handleFiles();
    }

    function handleFiles() {
        const files = input.files;
        previewContainer.innerHTML = '';
        
        [...files].forEach(file => {
            if (file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const div = document.createElement('div');
                    div.className = 'preview-item';
                    div.innerHTML = `
                        <img src="${e.target.result}" alt="Preview">
                        <button type="button" class="preview-remove">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    `;
                    previewContainer.appendChild(div);

                    // Handle remove button click
                    div.querySelector('.preview-remove').addEventListener('click', function() {
                        div.remove();
                        // Create a new FileList without the removed file
                        const dt = new DataTransfer();
                        [...input.files].forEach(f => {
                            if (f !== file) dt.items.add(f);
                        });
                        input.files = dt.files;
                    });
                };
                reader.readAsDataURL(file);
            }
        });
    }

    // Form submission
    form.addEventListener('submit', function(e) {
        if (input.files.length === 0) {
            e.preventDefault();
            alert('Please select at least one image to upload.');
        }
    });
});
</script>
@endpush 