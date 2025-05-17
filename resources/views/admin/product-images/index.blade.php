@extends('admin.layout.admin')

@section('content')
<div class="py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-lg shadow-sm overflow-hidden">
            <div class="p-6 border-b border-gray-200">
                <div class="flex justify-between items-center">
                    <h2 class="text-xl font-semibold text-gray-800">Product Images: {{ $product->name }}</h2>
                    <a href="{{ route('admin.products.images.create', $product->id) }}" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Add New Image
                    </a>
                </div>
            </div>
            
            <div class="p-6">
                @if(session('success'))
                    <div class="mb-4 bg-green-100 border-l-4 border-green-500 p-4 rounded">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm leading-5 text-green-700">{{ session('success') }}</p>
                            </div>
                        </div>
                    </div>
                @endif

                @if(session('error'))
                    <div class="mb-4 bg-red-100 border-l-4 border-red-500 p-4 rounded">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm leading-5 text-red-700">{{ session('error') }}</p>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="mb-6 bg-gray-50 p-4 rounded-lg">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-medium text-gray-900">Product Information</h3>
                        <a href="{{ url()->previous() }}" class="inline-flex items-center px-3 py-2 border border-gray-300 shadow-sm text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            <svg class="-ml-0.5 mr-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                            Back
                        </a>
                    </div>
                    <div class="overflow-hidden rounded-lg border border-gray-200">
                        <table class="min-w-full divide-y divide-gray-200">
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <th scope="row" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                    <td class="px-6 py-3 whitespace-nowrap text-sm text-gray-900">{{ $product->id }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                    <td class="px-6 py-3 whitespace-nowrap text-sm text-gray-900">{{ $product->name }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                                    <td class="px-6 py-3 whitespace-nowrap text-sm text-gray-900">CAD ${{ number_format($product->price, 2) }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Stock</th>
                                    <td class="px-6 py-3 whitespace-nowrap text-sm text-gray-900">{{ $product->stock }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Default Image</th>
                                    <td class="px-6 py-3 whitespace-nowrap text-sm text-gray-900">
                                        <img src="{{ $product->image }}" alt="{{ $product->name }}" class="h-20 w-auto object-cover">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <h3 class="text-lg font-medium text-gray-900 mb-4">Product Images</h3>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 images-container" id="sortable-images">
                    @forelse($product->images as $image)
                        <div class="relative group" data-id="{{ $image->id }}">
                            <div class="bg-white rounded-lg shadow overflow-hidden {{ $image->is_primary ? 'ring-2 ring-blue-500' : '' }}">
                                <div class="relative aspect-w-4 aspect-h-3">
                                    <img src="{{ $image->image_url }}" class="w-full h-full object-cover" alt="{{ $image->alt_text ?? $product->name }}">
                                    @if($image->is_primary)
                                        <span class="absolute top-2 right-2 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                            Primary
                                        </span>
                                    @endif
                                </div>
                                <div class="p-4">
                                    <p class="text-sm text-gray-500 truncate">{{ $image->alt_text ?? 'No alt text' }}</p>
                                    <div class="mt-2 flex justify-between">
                                        <a href="{{ route('admin.products.images.edit', [$product->id, $image->id]) }}" 
                                           class="inline-flex items-center px-2.5 py-1.5 border border-gray-300 shadow-sm text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                           <svg class="-ml-0.5 mr-1 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                            Edit
                                        </a>
                                        @if(!$image->is_primary)
                                            <form action="{{ route('admin.products.images.set-primary', [$product->id, $image->id]) }}" method="POST">
                                                @csrf
                                                <button type="submit" 
                                                        class="inline-flex items-center px-2.5 py-1.5 border border-transparent shadow-sm text-xs font-medium rounded text-blue-700 bg-blue-100 hover:bg-blue-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                                    <svg class="-ml-0.5 mr-1 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                                    </svg>
                                                    Primary
                                                </button>
                                            </form>
                                        @endif
                                        <form action="{{ route('admin.products.images.destroy', [$product->id, $image->id]) }}" method="POST" class="delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="inline-flex items-center px-2.5 py-1.5 border border-transparent shadow-sm text-xs font-medium rounded text-red-700 bg-red-100 hover:bg-red-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                                <svg class="-ml-0.5 mr-1 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full">
                            <div class="bg-blue-50 border-l-4 border-blue-400 p-4 rounded">
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <svg class="h-5 w-5 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm leading-5 text-blue-700">
                                            No additional images have been added for this product. 
                                            <a href="{{ route('admin.products.images.create', $product->id) }}" class="font-medium underline text-blue-700 hover:text-blue-600">
                                                Add some now
                                            </a>.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Delete confirmation
        document.querySelectorAll('.delete-form').forEach(form => {
            form.addEventListener('submit', function(e) {
                if (!confirm('Are you sure you want to delete this image?')) {
                    e.preventDefault();
                }
            });
        });
        
        // Initialize jQuery UI sortable (if jQuery is available)
        if (typeof $ !== 'undefined' && $.fn.sortable) {
            $('#sortable-images').sortable({
                update: function(event, ui) {
                    let order = [];
                    $('.images-container > div').each(function() {
                        order.push($(this).data('id'));
                    });
                    
                    // Save the new order via AJAX
                    $.ajax({
                        url: '{{ route("admin.products.images.reorder", $product->id) }}',
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            images: order
                        },
                        success: function(response) {
                            if (response.success) {
                                // Display success notification
                                const alertHtml = `
                                    <div class="mb-4 bg-green-100 border-l-4 border-green-500 p-4 rounded alert-success">
                                        <div class="flex">
                                            <div class="flex-shrink-0">
                                                <svg class="h-5 w-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                            <div class="ml-3">
                                                <p class="text-sm leading-5 text-green-700">Image order updated successfully!</p>
                                            </div>
                                        </div>
                                    </div>
                                `;
                                
                                // Add notification to the page
                                const alertElement = $(alertHtml);
                                $('.p-6').prepend(alertElement);
                                
                                // Auto remove after 3 seconds
                                setTimeout(function() {
                                    alertElement.fadeOut('slow', function() {
                                        $(this).remove();
                                    });
                                }, 3000);
                            }
                        },
                        error: function() {
                            alert('An error occurred while updating image order. Please try again.');
                        }
                    });
                }
            });
        }
    });
</script>
@endsection 