@extends('admin.layout.admin')

@push('styles')
<style>
    /* Custom CKEditor Styles */
    .ck-editor__editable {
        min-height: 400px !important;
        max-height: 800px !important;
    }
    
    .ck-toolbar-container .ck.ck-toolbar {
        border-radius: 0.5rem 0.5rem 0 0 !important;
        border-bottom: 1px solid #e5e7eb !important;
        background-color: #f9fafb !important;
    }
    
    .ck-content {
        background-color: #ffffff !important;
        border-radius: 0 0 0.5rem 0.5rem !important;
        border: 1px solid #e5e7eb !important;
        border-top: none !important;
    }
    
    .ck-content:focus {
        border-color: #3b82f6 !important;
        box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.1) !important;
    }
    
    .ck.ck-toolbar .ck-toolbar__items {
        flex-wrap: wrap !important;
    }
    
    .ck.ck-button {
        border-radius: 0.375rem !important;
        padding: 0.375rem !important;
        margin: 0.125rem !important;
        color: #374151 !important;
    }
    
    .ck.ck-button:hover {
        background-color: #e5e7eb !important;
    }
    
    .ck.ck-button.ck-on {
        background-color: #dbeafe !important;
        color: #2563eb !important;
    }
</style>
@endpush

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="bg-white shadow-sm rounded-lg p-6">
        <!-- Header -->
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Create New Blog Post</h2>
            <p class="text-gray-600 mt-1">Fill in the form below to create a new blog post.</p>
        </div>

        <!-- Form -->
        <form action="{{ route('admin.blog-posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-1 gap-6">
                <!-- Title -->
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Title <span class="text-red-600">*</span></label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}" required
                           class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('title') border-red-500 @enderror">
                    @error('title')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Excerpt -->
                <div>
                    <label for="excerpt" class="block text-sm font-medium text-gray-700 mb-1">Excerpt</label>
                    <textarea name="excerpt" id="excerpt" rows="3"
                              class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('excerpt') border-red-500 @enderror">{{ old('excerpt') }}</textarea>
                    <p class="text-xs text-gray-500 mt-1">A short summary of the post (optional). If omitted, it will be generated from the content.</p>
                    @error('excerpt')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Content -->
                <div>
                    <label for="editor" class="block text-sm font-medium text-gray-700 mb-1">Content <span class="text-red-600">*</span></label>
                    <div class="mt-1">
                        <div id="editor" class="block w-full rounded-lg border border-gray-300 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 min-h-[300px]">
                            {!! old('content') !!}
                        </div>
                        <input type="hidden" name="content" id="content" value="{{ old('content') }}">
                        @error('content')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Category and Tags (Row) -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Category -->
                    <div>
                        <label for="category" class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                        <div class="flex">
                            <input type="text" name="category" id="category" value="{{ old('category') }}" 
                                   list="category-suggestions"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('category') border-red-500 @enderror">
                            <datalist id="category-suggestions">
                                @php
                                    $categories = \App\Models\BlogPost::select('category')
                                        ->distinct()
                                        ->whereNotNull('category')
                                        ->pluck('category');
                                @endphp
                                @foreach($categories as $category)
                                    <option value="{{ $category }}">
                                @endforeach
                            </datalist>
                        </div>
                        @error('category')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Tags -->
                    <div>
                        <label for="tags" class="block text-sm font-medium text-gray-700 mb-1">Tags</label>
                        <input type="text" name="tags" id="tags" value="{{ old('tags') }}" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('tags') border-red-500 @enderror">
                        <p class="text-xs text-gray-500 mt-1">Separate tags with commas (e.g. aviation, paragliding, tips)</p>
                        @error('tags')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Featured Image -->
                <div class="mb-6 relative">
                    <label for="featured_image" class="block text-sm font-medium text-gray-700 mb-1">Featured Image</label>
                    <div class="mt-1 flex items-center">
                        <div class="relative h-64 w-full border-2 border-gray-300 border-dashed rounded-lg flex justify-center items-center overflow-hidden bg-gray-50">
                            <div class="text-center p-6" id="upload-text">
                                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <p class="mt-1 text-sm text-gray-600">Drag and drop image here or click to browse</p>
                            </div>
                            <img src="" alt="" class="hidden h-full w-full object-cover" id="image-preview">
                            <input type="file" name="featured_image" id="featured_image" class="absolute inset-0 opacity-0 w-full h-full cursor-pointer"
                                accept="image/*" onchange="previewImage(this)">
                            <div class="absolute bottom-2 right-2 bg-gray-900 bg-opacity-75 text-white py-1 px-3 rounded text-sm">
                                <label for="featured_image">Choose Image</label>
                            </div>
                        </div>
                    </div>
                    @error('featured_image')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Published Status -->
                <div class="flex items-start">
                    <div class="flex items-center h-5">
                        <input type="checkbox" name="published" id="published" value="1" {{ old('published') ? 'checked' : '' }}
                               class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                    </div>
                    <div class="ml-3 text-sm">
                        <label for="published" class="font-medium text-gray-700">Publish immediately</label>
                        <p class="text-gray-500">If unchecked, the post will be saved as a draft</p>
                    </div>
                </div>

                <!-- Submit Buttons -->
                <div class="flex justify-end space-x-3 pt-5 border-t border-gray-200">
                    <a href="{{ route('admin.blog-posts.index') }}" class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none">
                        Cancel
                    </a>
                    <button type="submit" class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none">
                        Create Post
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/decoupled-document/ckeditor.js"></script>
<script>
    function previewImage(input) {
        const preview = document.getElementById('image-preview');
        
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
            }
            
            reader.readAsDataURL(input.files[0]);
        } else {
            preview.classList.add('hidden');
        }
    }

    // Initialize CKEditor
    DecoupledEditor
        .create(document.querySelector('#editor'), {
            toolbar: {
                items: [
                    'heading',
                    '|',
                    'bold',
                    'italic',
                    'strikethrough',
                    'underline',
                    'subscript',
                    'superscript',
                    '|',
                    'bulletedList',
                    'numberedList',
                    '|',
                    'outdent',
                    'indent',
                    '|',
                    'link',
                    'blockQuote',
                    'insertTable',
                    'mediaEmbed',
                    '|',
                    'fontSize',
                    'fontFamily',
                    'fontColor',
                    'fontBackgroundColor',
                    '|',
                    'alignment',
                    '|',
                    'specialCharacters',
                    'horizontalLine',
                    '|',
                    'undo',
                    'redo'
                ],
                shouldNotGroupWhenFull: true
            },
            fontSize: {
                options: [
                    9,
                    11,
                    13,
                    'default',
                    17,
                    19,
                    21,
                    27,
                    35
                ],
                supportAllValues: true
            },
            fontFamily: {
                options: [
                    'default',
                    'Arial, Helvetica, sans-serif',
                    'Courier New, Courier, monospace',
                    'Georgia, serif',
                    'Lucida Sans Unicode, Lucida Grande, sans-serif',
                    'Tahoma, Geneva, sans-serif',
                    'Times New Roman, Times, serif',
                    'Trebuchet MS, Helvetica, sans-serif',
                    'Verdana, Geneva, sans-serif'
                ]
            },
            table: {
                contentToolbar: [
                    'tableColumn',
                    'tableRow',
                    'mergeTableCells',
                    'tableCellProperties',
                    'tableProperties'
                ]
            },
            heading: {
                options: [
                    { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                    { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                    { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                    { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                    { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' }
                ]
            },
            placeholder: 'Type your blog post content here...',
            link: {
                decorators: {
                    addTargetToExternalLinks: true,
                    defaultProtocol: 'https://'
                }
            }
        })
        .then(editor => {
            // Append the toolbar to the dedicated container
            const toolbarContainer = document.createElement('div');
            toolbarContainer.classList.add('ck-toolbar-container');
            document.querySelector('#editor').parentNode.insertBefore(toolbarContainer, document.querySelector('#editor'));
            toolbarContainer.appendChild(editor.ui.view.toolbar.element);

            // Update hidden input whenever content changes
            editor.model.document.on('change:data', () => {
                document.querySelector('#content').value = editor.getData();
            });

            // Update hidden input before form submission
            const form = document.querySelector('form');
            form.addEventListener('submit', function(e) {
                document.querySelector('#content').value = editor.getData();
                // Prevent submission if empty content
                if (!document.querySelector('#content').value.trim()) {
                    e.preventDefault();
                    alert('Content is required. Please add some content to your post.');
                }
            });

            // Initialize the hidden field with the current content
            document.querySelector('#content').value = editor.getData();

            // Add custom styles to match your form theme
            editor.editing.view.change(writer => {
                const viewRoot = editor.editing.view.document.getRoot();
                writer.setStyle('min-height', '400px', viewRoot);
                writer.setStyle('border-radius', '0.5rem', viewRoot);
                writer.setStyle('padding', '1rem', viewRoot);
            });
        })
        .catch(error => {
            console.error(error);
        });
</script>
@endpush
@endsection
