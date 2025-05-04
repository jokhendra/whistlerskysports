@extends('admin.layout.admin')

@push('styles')
<style>
    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 1.5rem;
    }
    .gallery-item {
        position: relative;
        aspect-ratio: 1;
        overflow: hidden;
    }
    .gallery-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }
    .gallery-item:hover img {
        transform: scale(1.05);
    }
    .gallery-overlay {
        position: absolute;
        inset: 0;
        background: rgba(0, 0, 0, 0.5);
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        padding: 1rem;
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    .gallery-item:hover .gallery-overlay {
        opacity: 1;
    }
</style>
@endpush

@section('content')
<div class="py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="md:flex md:items-center md:justify-between mb-6">
            <div class="flex-1 min-w-0">
                <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                    Gallery Management
                </h2>
            </div>
            <div class="mt-4 flex md:mt-0 md:ml-4 space-x-3">
                <a href="{{ route('admin.gallery.categories') }}" 
                   class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-lg shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    <svg class="h-5 w-5 mr-2 -ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                    Manage Categories
                </a>
                <a href="{{ route('admin.gallery.create') }}" 
                   class="inline-flex items-center px-4 py-2 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    <svg class="h-5 w-5 mr-2 -ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Upload Images
                </a>
            </div>
        </div>

        <!-- Category Filter -->
        <div class="mb-6">
            <form action="{{ route('admin.gallery.index') }}" method="GET" class="flex items-center space-x-4">
                <div class="flex-grow max-w-xs">
                    <select name="category" 
                            onchange="this.form.submit()"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#204fb4] focus:ring focus:ring-[#204fb4]/20 transition-all duration-200">
                        <option value="">All Categories</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" 
                                    {{ request('category') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }} ({{ $category->images_count }})
                            </option>
                        @endforeach
                    </select>
                </div>
                @if(request()->has('category'))
                    <a href="{{ route('admin.gallery.index') }}" 
                       class="inline-flex items-center px-3 py-2 border border-gray-300 rounded-lg shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        <svg class="h-4 w-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        Clear Filter
                    </a>
                @endif
            </form>
        </div>

        @if($images->isEmpty())
            <div class="text-center py-12">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-900">No images</h3>
                <p class="mt-1 text-sm text-gray-500">Get started by uploading some images.</p>
                <div class="mt-6">
                    <a href="{{ route('admin.gallery.create') }}" 
                       class="inline-flex items-center px-4 py-2 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        <svg class="h-5 w-5 mr-2 -ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Upload Images
                    </a>
                </div>
            </div>
        @else
            <div class="gallery-grid" id="sortable-gallery">
                @foreach($images as $image)
                    <div class="gallery-item rounded-lg shadow-md overflow-hidden" data-id="{{ $image->id }}">
                        <img src="{{ $image->image_url }}" alt="{{ $image->title }}" class="gallery-image">
                        <div class="gallery-overlay">
                            <div class="text-white">
                                <h3 class="text-lg font-semibold">{{ $image->title }}</h3>
                                @if($image->category)
                                    <p class="text-sm text-gray-300">{{ $image->category->name }}</p>
                                @endif
                            </div>
                            <div class="flex items-center justify-end space-x-2 mt-2">
                                <a href="{{ route('admin.gallery.edit', $image) }}" 
                                   class="p-2 text-white hover:text-blue-400 transition-colors">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </a>
                                <form action="{{ route('admin.gallery.destroy', $image) }}" 
                                      method="POST" 
                                      class="inline-block"
                                      onsubmit="return confirm('Are you sure you want to delete this image?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 text-white hover:text-red-400 transition-colors">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-6">
                {{ $images->links() }}
            </div>
        @endif
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const gallery = document.getElementById('sortable-gallery');
    if (gallery) {
        new Sortable(gallery, {
            animation: 150,
            onEnd: function(evt) {
                const items = Array.from(gallery.children).map((item, index) => ({
                    id: item.dataset.id,
                    order: index
                }));

                fetch('{{ route("admin.gallery.update-order") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({ images: items })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.message) {
                        // Optional: Show success message
                    }
                })
                .catch(error => {
                    console.error('Error updating order:', error);
                });
            }
        });
    }
});
</script>
@endpush 