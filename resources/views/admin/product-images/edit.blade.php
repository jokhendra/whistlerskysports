@extends('admin.layout.admin')

@section('content')
<div class="py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-lg shadow-sm overflow-hidden">
            <div class="p-6 border-b border-gray-200">
                <div class="flex justify-between items-center">
                    <h2 class="text-xl font-semibold text-gray-800">Edit Image for {{ $product->name }}</h2>
                    <a href="{{ route('admin.products.images.index', $product->id) }}" class="inline-flex items-center px-3 py-2 border border-gray-300 shadow-sm text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        <svg class="-ml-0.5 mr-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Back to Images
                    </a>
                </div>
            </div>
            <div class="p-6">
                @if ($errors->any())
                    <div class="mb-4 bg-red-100 border-l-4 border-red-500 p-4 rounded">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-sm leading-5 font-medium text-red-800">There were errors with your submission</h3>
                                <ul class="mt-1 text-sm text-red-700">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif

                <form action="{{ route('admin.products.images.update', [$product->id, $image->id]) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Current Image</label>
                            <div class="border border-gray-200 rounded-lg p-4 bg-gray-50">
                                <div class="flex justify-center">
                                    <img id="current-image" src="{{ $image->image_url }}" alt="{{ $image->alt_text ?? $product->name }}" class="h-64 w-auto object-contain">
                                </div>
                                <p class="mt-2 text-xs text-center text-gray-500">Current image will be replaced if you upload a new one</p>
                            </div>
                        </div>
                        
                        <div>
                            <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Replace Image</label>
                            
                            <div class="relative border-2 border-dashed border-gray-300 rounded-lg p-6 transition-all duration-200 ease-in-out bg-gray-50 hover:bg-gray-100" id="dropzone">
                                <!-- Hidden file input -->
                                <input id="image" name="image" type="file" class="absolute inset-0 w-full h-full opacity-0 z-50 cursor-pointer" accept="image/*">
                                
                                <!-- Content shown when no file is selected -->
                                <div id="upload-prompt" class="text-center">
                                    <svg class="mx-auto h-12 w-12 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <p class="mt-1 text-sm text-gray-600">
                                        <span class="font-medium text-blue-600 hover:text-blue-500">Click to upload</span> or drag and drop
                                    </p>
                                    <p class="text-xs text-gray-500">PNG, JPG, GIF up to 2MB</p>
                                </div>
                                
                                <!-- Preview container (hidden initially) -->
                                <div id="preview-container" class="mt-2 hidden" style="display: none; flex-direction: column; align-items: center;">
                                    <img id="preview-image" class="max-h-48 max-w-full rounded border border-gray-200 object-contain shadow-sm" alt="New image preview" src="">
                                    <p id="file-name" class="mt-2 text-sm font-medium text-gray-900"></p>
                                    <button type="button" id="remove-image" class="mt-1 inline-flex items-center px-2.5 py-1.5 border border-gray-300 shadow-sm text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                        <svg class="-ml-0.5 mr-1 h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                        Remove
                                    </button>
                                </div>
                            </div>
                            <p class="mt-1 text-sm text-gray-500">Recommended size: 800x800 pixels, Max: 2MB</p>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-4">
                        <div>
                            <label for="alt_text" class="block text-sm font-medium text-gray-700">Alt Text</label>
                            <input type="text" name="alt_text" id="alt_text" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Description of the image for SEO and accessibility" value="{{ old('alt_text', $image->alt_text) }}">
                            <p class="mt-1 text-sm text-gray-500">Describe the image for search engines and screen readers</p>
                        </div>
                        
                        <div>
                            <label for="sort_order" class="block text-sm font-medium text-gray-700">Sort Order</label>
                            <input type="number" name="sort_order" id="sort_order" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('sort_order', $image->sort_order) }}" min="0">
                            <p class="mt-1 text-sm text-gray-500">Images are displayed in ascending order (0 comes first)</p>
                        </div>
                    </div>
                    
                    <div class="relative flex items-start">
                        <div class="flex items-center h-5">
                            <input id="is_primary" name="is_primary" type="checkbox" value="1" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" {{ old('is_primary', $image->is_primary) ? 'checked' : '' }}>
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="is_primary" class="font-medium text-gray-700">Set as primary image</label>
                            <p class="text-gray-500">If checked, this will become the main image shown for the product</p>
                        </div>
                    </div>
                    
                    <div>
                        <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0l-4 4m4-4v12" />
                            </svg>
                            Update Image
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const fileInput = document.getElementById('image');
        const uploadPrompt = document.getElementById('upload-prompt');
        const previewContainer = document.getElementById('preview-container');
        const previewImage = document.getElementById('preview-image');
        const fileName = document.getElementById('file-name');
        const removeButton = document.getElementById('remove-image');
        const dropzone = document.getElementById('dropzone');
        
        console.log('Elements found:', {
            fileInput: !!fileInput,
            uploadPrompt: !!uploadPrompt,
            previewContainer: !!previewContainer,
            previewImage: !!previewImage,
            fileName: !!fileName,
            removeButton: !!removeButton,
            dropzone: !!dropzone
        });
        
        // Function to handle file selection
        function handleFileSelect(file) {
            console.log('File selected:', file ? file.name : 'No file');
            
            if (file) {
                // Show file preview
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    console.log('File loaded, setting preview');
                    
                    // Set the preview image source
                    previewImage.src = e.target.result;
                    
                    // Set the file name text
                    fileName.textContent = file.name;
                    
                    // Make sure the upload prompt is hidden and preview is shown
                    uploadPrompt.classList.add('hidden');
                    previewContainer.classList.remove('hidden');
                    
                    // Ensure preview container is displayed with correct styles
                    previewContainer.style.display = 'flex';
                    
                    // Add a selected state to dropzone
                    dropzone.classList.add('border-blue-500', 'bg-blue-50');
                    dropzone.classList.remove('border-gray-300', 'bg-gray-50', 'hover:bg-gray-100');
                    
                    console.log('Preview should be visible now');
                };
                
                reader.onerror = function(e) {
                    console.error('Error reading file:', e);
                };
                
                try {
                    reader.readAsDataURL(file);
                } catch (error) {
                    console.error('Error reading file:', error);
                }
            }
        }
        
        // Handle file input change
        fileInput.addEventListener('change', function(e) {
            console.log('File input changed');
            const file = this.files[0];
            if (file) {
                handleFileSelect(file);
            }
        });
        
        // Prevent default drag behaviors
        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            dropzone.addEventListener(eventName, function(e) {
                e.preventDefault();
                e.stopPropagation();
            }, false);
        });
        
        // Highlight drop area when item is dragged over it
        ['dragenter', 'dragover'].forEach(eventName => {
            dropzone.addEventListener(eventName, function() {
                dropzone.classList.add('border-blue-500', 'bg-blue-50');
                dropzone.classList.remove('border-gray-300', 'bg-gray-50');
            }, false);
        });
        
        // Remove highlight when item is dragged out or dropped
        ['dragleave', 'drop'].forEach(eventName => {
            dropzone.addEventListener(eventName, function() {
                if (previewContainer.classList.contains('hidden')) {
                    dropzone.classList.remove('border-blue-500', 'bg-blue-50');
                    dropzone.classList.add('border-gray-300', 'bg-gray-50');
                }
            }, false);
        });
        
        // Handle drops
        dropzone.addEventListener('drop', function(e) {
            console.log('File dropped');
            const droppedFiles = e.dataTransfer.files;
            if (droppedFiles.length) {
                fileInput.files = droppedFiles;
                handleFileSelect(droppedFiles[0]);
            }
        }, false);
        
        // Handle remove button click
        removeButton.addEventListener('click', function() {
            fileInput.value = '';
            previewImage.src = '';
            fileName.textContent = '';
            previewContainer.classList.add('hidden');
            previewContainer.style.display = 'none';
            uploadPrompt.classList.remove('hidden');
            
            // Reset dropzone styling
            dropzone.classList.remove('border-blue-500', 'bg-blue-50');
            dropzone.classList.add('border-gray-300', 'bg-gray-50', 'hover:bg-gray-100');
        });

        console.log('Image upload script initialized');
    });
</script>
@endsection 