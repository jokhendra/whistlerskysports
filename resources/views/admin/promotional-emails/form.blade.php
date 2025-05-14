@extends('admin.layout.admin')

@push('styles')
<style>
    .form-input-group {
        position: relative;
        transition: all 0.3s ease;
    }
    .form-input-group:focus-within label {
        color: #2563eb;
        transform: translateY(-1.5rem) scale(0.85);
    }
    .form-input-group label {
        position: absolute;
        left: 0.875rem;
        top: 0.875rem;
        pointer-events: none;
        transition: all 0.2s ease-out;
        background: white;
        padding: 0 0.25rem;
    }
    .form-input-group input:not(:placeholder-shown) + label,
    .form-input-group select:not(:placeholder-shown) + label {
        transform: translateY(-1.5rem) scale(0.85);
    }
    .form-input {
        @apply block w-full rounded-lg border-gray-300 shadow-sm transition duration-150 ease-in-out;
    }
    .form-input:focus {
        @apply border-blue-500 ring-2 ring-blue-200 outline-none;
    }
    .form-select {
        @apply block w-full rounded-lg border-gray-300 shadow-sm transition duration-150 ease-in-out pr-10;
    }
    .form-select:focus {
        @apply border-blue-500 ring-2 ring-blue-200 outline-none;
    }
</style>
@endpush

@section('content')
<div class="py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="md:flex md:items-center md:justify-between mb-6">
            <div class="flex-1 min-w-0">
                <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                    {{ isset($promotionalEmail) ? 'Edit Promotional Email' : 'Create Promotional Email' }}
                </h2>
            </div>
            <div class="mt-4 flex md:mt-0 md:ml-4">
                <a href="{{ route('admin.promotional-emails.index') }}" 
                   class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-lg shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                    <svg class="h-5 w-5 mr-2 -ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Back to List
                </a>
            </div>
        </div>

        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <form action="{{ isset($promotionalEmail) ? route('admin.promotional-emails.update', $promotionalEmail) : route('admin.promotional-emails.store') }}" 
                  method="POST" 
                  id="promotionalEmailForm"
                  class="space-y-8">
                @csrf
                @if(isset($promotionalEmail))
                    @method('PUT')
                @endif

                <div class="p-8 space-y-8">
                    <!-- Subject -->
                    <div class="form-input-group">
                        <input type="text" 
                               name="subject" 
                               id="subject"
                               value="{{ old('subject', $promotionalEmail->subject ?? '') }}"
                               class="form-input h-12 pl-4"
                               placeholder=" "
                               required>
                        <label for="subject" class="text-sm font-medium text-gray-700">
                            Subject
                        </label>
                        @error('subject')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Content -->
                    <div class="space-y-2">
                        <label for="editor" class="block text-sm font-medium text-gray-700">
                            Content
                        </label>
                        <div class="mt-1">
                            <div id="editor" class="block w-full rounded-lg border border-gray-300 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 min-h-[300px]">
                                {!! old('content', $promotionalEmail->content ?? '') !!}
                            </div>
                            <input type="hidden" name="content" id="content" value="{{ old('content', $promotionalEmail->content ?? '') }}">
                        </div>
                        @error('content')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Recipient Group -->
                    <div class="form-input-group">
                        <select name="recipient_group" 
                                id="recipient_group"
                                class="form-select h-12 pl-4"
                                required>
                            <option value="">Select a group</option>
                            <option value="all" {{ old('recipient_group', $promotionalEmail->recipient_group ?? '') === 'all' ? 'selected' : '' }}>
                                All Users
                            </option>
                            <option value="subscribers" {{ old('recipient_group', $promotionalEmail->recipient_group ?? '') === 'subscribers' ? 'selected' : '' }}>
                                Subscribers Only
                            </option>
                            <option value="customers" {{ old('recipient_group', $promotionalEmail->recipient_group ?? '') === 'customers' ? 'selected' : '' }}>
                                Customers Only
                            </option>
                        </select>
                        <label for="recipient_group" class="text-sm font-medium text-gray-700">
                            Recipient Group
                        </label>
                        @error('recipient_group')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Schedule -->
                    <div class="form-input-group">
                        <input type="datetime-local" 
                               name="scheduled_at" 
                               id="scheduled_at"
                               value="{{ old('scheduled_at', isset($promotionalEmail) ? $promotionalEmail->scheduled_at->format('Y-m-d\TH:i') : '') }}"
                               class="form-input h-12 pl-4"
                               placeholder=" "
                               required>
                        <label for="scheduled_at" class="text-sm font-medium text-gray-700">
                            Schedule Date and Time
                        </label>
                        @error('scheduled_at')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Status -->
                    <div class="form-input-group">
                        <select name="status" 
                                id="status"
                                class="form-select h-12 pl-4"
                                required>
                            <option value="draft" {{ old('status', $promotionalEmail->status ?? '') === 'draft' ? 'selected' : '' }}>
                                Save as Draft
                            </option>
                            <option value="scheduled" {{ old('status', $promotionalEmail->status ?? '') === 'scheduled' ? 'selected' : '' }}>
                                Schedule for Sending
                            </option>
                        </select>
                        <label for="status" class="text-sm font-medium text-gray-700">
                            Status
                        </label>
                        @error('status')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="px-8 py-4 bg-gray-50 border-t border-gray-200">
                    <div class="flex justify-end">
                        <button type="submit" 
                                id="submitButton"
                                class="inline-flex items-center px-6 py-3 border border-transparent rounded-lg shadow-sm text-base font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                            <svg class="h-5 w-5 mr-2 -ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            {{ isset($promotionalEmail) ? 'Update Email' : 'Create Email' }}
                        </button>
                    </div>
                </div>
            </form>
        </div>

        @if(isset($promotionalEmail) && $promotionalEmail->status !== 'sent')
            <!-- Test Email Form -->
            <div class="mt-8 bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="px-8 py-5 border-b border-gray-200">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Send Test Email
                    </h3>
                </div>
                <form action="{{ route('admin.promotional-emails.send-test', $promotionalEmail) }}" 
                      method="POST" 
                      class="p-8">
                    @csrf
                    <div class="space-y-6">
                        <div class="form-input-group">
                            <input type="email" 
                                   name="test_email" 
                                   id="test_email"
                                   class="form-input h-12 pl-4"
                                   placeholder=" "
                                   required>
                            <label for="test_email" class="text-sm font-medium text-gray-700">
                                Test Email Address
                            </label>
                            @error('test_email')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex justify-end">
                            <button type="submit" 
                                    class="inline-flex items-center px-6 py-3 border border-transparent rounded-lg shadow-sm text-base font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition duration-150 ease-in-out">
                                <svg class="h-5 w-5 mr-2 -ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                Send Test Email
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        @endif
    </div>
</div>

@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/decoupled-document/ckeditor.js"></script>
<script>
    let editor;
    let editorInitialized = false;
    
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
            placeholder: 'Type your email content here...',
            link: {
                decorators: {
                    addTargetToExternalLinks: true,
                    defaultProtocol: 'https://'
                }
            }
        })
        .then(newEditor => {
            editor = newEditor;
            editorInitialized = true;
            
            // Populate editor with initial content if available
            const initialContent = document.querySelector('#content').value;
            if (initialContent) {
                editor.setData(initialContent);
            }
            
            // Append the toolbar to the dedicated container
            const toolbarContainer = document.createElement('div');
            toolbarContainer.classList.add('ck-toolbar-container');
            document.querySelector('#editor').parentNode.insertBefore(toolbarContainer, document.querySelector('#editor'));
            toolbarContainer.appendChild(editor.ui.view.toolbar.element);

            // Add custom styles to match your form theme
            editor.editing.view.change(writer => {
                const viewRoot = editor.editing.view.document.getRoot();
                writer.setStyle('min-height', '400px', viewRoot);
                writer.setStyle('border-radius', '0.5rem', viewRoot);
                writer.setStyle('padding', '1rem', viewRoot);
            });
            
            // Sync editor content on change
            editor.model.document.on('change:data', () => {
                document.querySelector('#content').value = editor.getData();
            });
        })
        .catch(error => {
            console.error(error);
        });
        
    // Handle form submission
    document.getElementById('promotionalEmailForm').addEventListener('submit', function(event) {
        if (editorInitialized) {
            // Make sure to update the hidden input with the editor content
            document.querySelector('#content').value = editor.getData();
            
            // If content is empty, prevent form submission
            if (!document.querySelector('#content').value.trim()) {
                event.preventDefault();
                alert('Please enter some content for the email.');
                return false;
            }
        }
    });
    
    // Backup method to ensure content is set
    document.getElementById('submitButton').addEventListener('click', function() {
        if (editorInitialized) {
            document.querySelector('#content').value = editor.getData();
        }
    });
</script>

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

@if(session('success'))
    <div x-data="{ show: true }"
         x-show="show"
         x-init="setTimeout(() => show = false, 3000)"
         class="fixed bottom-4 right-4 bg-green-50 p-4 rounded-lg shadow-lg border border-green-200">
        <div class="flex items-center">
            <div class="flex-shrink-0">
                <svg class="h-5 w-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <div class="ml-3">
                <p class="text-sm font-medium text-green-800">
                    {{ session('success') }}
                </p>
            </div>
        </div>
    </div>
@endif
@endsection 