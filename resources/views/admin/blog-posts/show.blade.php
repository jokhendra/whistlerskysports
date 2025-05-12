@extends('admin.layout.admin')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="bg-white shadow-sm rounded-lg overflow-hidden">
        <!-- Header -->
        <div class="px-6 py-4 bg-gray-50 border-b border-gray-200 flex flex-col md:flex-row md:items-center md:justify-between">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">{{ $blogPost->title }}</h2>
                <p class="text-gray-600 mt-1">
                    @if($blogPost->published)
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                            Published on {{ $blogPost->published_at ? $blogPost->published_at->format('M d, Y') : 'Unknown date' }}
                        </span>
                    @else
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                            Draft
                        </span>
                    @endif
                    @if($blogPost->category)
                        <span class="ml-2 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                            {{ $blogPost->category }}
                        </span>
                    @endif
                </p>
            </div>
            <div class="mt-4 md:mt-0 flex flex-shrink-0 space-x-2">
                <a href="{{ route('mad-mr-bert.blog.show', $blogPost->slug) }}" target="_blank" 
                   class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none">
                    <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                    View on Site
                </a>
                <a href="{{ route('admin.blog-posts.edit', $blogPost) }}" 
                   class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none">
                    <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                    Edit
                </a>
            </div>
        </div>

        <!-- Featured Image (if available) -->
        @if($blogPost->featured_image)
            <div class="w-full h-64 md:h-80 bg-gray-100 overflow-hidden">
                <img src="{{ $blogPost->featured_image_url }}" alt="{{ $blogPost->title }}" class="w-full h-full object-cover">
            </div>
        @endif

        <!-- Blog Post Metadata -->
        <div class="px-6 py-4 grid grid-cols-1 md:grid-cols-3 gap-4 border-b border-gray-200 bg-gray-50 text-sm">
            <div>
                <span class="font-medium text-gray-500">Created:</span>
                <span class="text-gray-800">{{ $blogPost->created_at->format('F d, Y \a\t g:i A') }}</span>
            </div>
            <div>
                <span class="font-medium text-gray-500">Last Updated:</span>
                <span class="text-gray-800">{{ $blogPost->updated_at->format('F d, Y \a\t g:i A') }}</span>
            </div>
            <div>
                <span class="font-medium text-gray-500">Views:</span>
                <span class="text-gray-800">{{ $blogPost->view_count ?? 0 }}</span>
            </div>
        </div>

        <!-- Tags -->
        @if(!empty($blogPost->tags))
            <div class="px-6 py-3 bg-gray-50 border-b border-gray-200">
                <h3 class="text-sm font-medium text-gray-500">Tags:</h3>
                <div class="mt-1 flex flex-wrap gap-2">
                    @foreach($blogPost->tags as $tag)
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                            {{ $tag }}
                        </span>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- Excerpt -->
        @if($blogPost->excerpt)
            <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
                <h3 class="text-sm font-medium text-gray-500 mb-2">Excerpt:</h3>
                <div class="text-gray-800 italic">{{ $blogPost->excerpt }}</div>
            </div>
        @endif

        <!-- Content -->
        <div class="px-6 py-6">
            <h3 class="text-lg font-medium text-gray-800 mb-4">Content:</h3>
            <div class="prose max-w-none">
                {!! $blogPost->content !!}
            </div>
        </div>

        <!-- Actions -->
        <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex justify-between">
            <div>
                <a href="{{ route('admin.blog-posts.index') }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                    &larr; Back to Blog Posts
                </a>
            </div>
            <div class="flex space-x-2">
                <form action="{{ route('admin.blog-posts.toggle-published', $blogPost) }}" method="POST" class="inline">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md shadow-sm 
                        {{ $blogPost->published ? 'text-yellow-700 bg-yellow-100 hover:bg-yellow-200' : 'text-green-700 bg-green-100 hover:bg-green-200' }}">
                        {{ $blogPost->published ? 'Unpublish' : 'Publish' }}
                    </button>
                </form>
                <form action="{{ route('admin.blog-posts.destroy', $blogPost) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this post?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md shadow-sm text-red-700 bg-red-100 hover:bg-red-200">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
