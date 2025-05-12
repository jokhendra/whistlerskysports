@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<div class="relative bg-gradient-to-b from-[rgb(241,97,98)] to-[rgb(200,60,60)] text-white py-6 sm:py-8 md:py-10 lg:mt-24 md:mt-24 mt-16">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto text-center">
            <h1 class="text-3xl md:text-4xl font-bold mb-2">{{ $blogPost->title }}</h1>
            <div class="flex items-center justify-center gap-3 text-[rgb(255,200,200)]">
                <span>{{ $blogPost->published_at->format('F d, Y') }}</span>
                @if($blogPost->category)
                    <span>•</span>
                    <a href="{{ route('mad-mr-bert.blog', ['category' => $blogPost->category]) }}" class="hover:text-white transition-colors duration-300">
                        {{ $blogPost->category }}
                    </a>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Blog Post Content -->
<div class="py-12 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <!-- Featured Image -->
            @if($blogPost->featured_image)
                <div class="mb-10 rounded-lg overflow-hidden shadow-lg">
                    <img src="{{ $blogPost->featured_image_url }}" alt="{{ $blogPost->title }}" class="w-full">
                </div>
            @endif
            
            <!-- Excerpt if available -->
            @if($blogPost->excerpt)
                <div class="mb-8 text-xl text-gray-600 italic border-l-4 border-[rgb(241,97,98)] pl-4 py-2">
                    {{ $blogPost->excerpt }}
                </div>
            @endif
            
            <!-- Preview Content (first 300 characters) -->
            <div class="prose prose-lg max-w-none mb-8">
                {!! Str::limit(strip_tags($blogPost->content), 300) !!}...
            </div>
            
            <!-- Login Required Message -->
            <div class="bg-[rgb(241,97,98,0.05)] border border-[rgb(241,97,98,0.2)] rounded-lg p-8 my-10 text-center">
                <div class="mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-[rgb(241,97,98)] mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">Login Required</h3>
                    <p class="text-gray-600 mb-6">
                        You need to be logged in to read the full article. Please log in or create an account to continue reading.
                    </p>
                </div>
                
                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    @auth
                        <a href="{{ route('mad-mr-bert.blog.show', $blogPost->slug) }}" class="px-6 py-3 bg-[rgb(241,97,98)] text-white rounded-lg hover:bg-[rgb(200,60,60)] transition-colors duration-300 text-center">
                            Read Full Article
                        </a>
                    @else
                        <a href="{{ route('login') }}?redirect={{ urlencode('/mad-mr-bert/blog/'.$blogPost->slug) }}" class="px-6 py-3 bg-[rgb(241,97,98)] text-white rounded-lg hover:bg-[rgb(200,60,60)] transition-colors duration-300 text-center">
                            Login to Continue Reading
                        </a>
                        <a href="{{ route('register') }}?redirect={{ urlencode('/mad-mr-bert/blog/'.$blogPost->slug) }}" class="px-6 py-3 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors duration-300 text-center">
                            Create an Account
                        </a>
                    @endauth
                </div>
            </div>
            
            <!-- Tags -->
            @if(!empty($blogPost->tags))
                <div class="mt-10 pt-6 border-t border-gray-200">
                    <h4 class="text-lg font-semibold text-gray-900 mb-3">Tags</h4>
                    <div class="flex flex-wrap gap-2">
                        @foreach($blogPost->tags as $tag)
                            <a href="{{ route('mad-mr-bert.blog', ['tag' => $tag]) }}" class="px-3 py-1 bg-gray-100 text-gray-700 rounded-full hover:bg-[rgb(241,97,98)] hover:text-white transition-colors duration-300">
                                #{{ $tag }}
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif
            
            <!-- Back to Blog Link -->
            <div class="mt-12 text-center">
                <a href="{{ route('mad-mr-bert.blog') }}" class="inline-flex items-center text-[rgb(241,97,98)] hover:text-[rgb(200,60,60)] transition-colors duration-300 group">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 transform group-hover:-translate-x-1 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Back to All Blog Posts
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Related Posts (if available) -->
@php
    $relatedPosts = \App\Models\BlogPost::published()
        ->where('id', '!=', $blogPost->id)
        ->where(function($query) use ($blogPost) {
            if ($blogPost->category) {
                $query->where('category', $blogPost->category);
            }
            if (!empty($blogPost->tags)) {
                foreach ($blogPost->tags as $tag) {
                    $query->orWhereJsonContains('tags', $tag);
                }
            }
        })
        ->orderBy('published_at', 'desc')
        ->limit(3)
        ->get();
@endphp

@if($relatedPosts->count() > 0)
    <div class="mt-16">
        <h3 class="text-2xl font-bold text-gray-900 mb-6">You May Also Like</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($relatedPosts as $relatedPost)
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-all duration-300 border border-gray-100">
                    <!-- Featured Image -->
                    <div class="aspect-video overflow-hidden">
                        @if($relatedPost->featured_image)
                            <img src="{{ $relatedPost->featured_image_url }}" alt="{{ $relatedPost->title }}" class="w-full h-full object-cover transition-transform duration-500 hover:scale-105">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-[rgb(241,97,98,0.1)] to-[rgb(241,97,98,0.3)] flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-[rgb(241,97,98,0.5)]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                                </svg>
                            </div>
                        @endif
                    </div>
                    
                    <!-- Content -->
                    <div class="p-4">
                        <h4 class="text-lg font-bold text-gray-900 mb-2 hover:text-[rgb(241,97,98)] transition-colors duration-300">
                            <a href="{{ route('mad-mr-bert.blog.preview', $relatedPost->slug) }}">{{ $relatedPost->title }}</a>
                        </h4>
                        <p class="text-gray-600 text-sm mb-3 line-clamp-2">
                            {{ $relatedPost->excerpt ?? Str::limit(strip_tags($relatedPost->content), 100) }}
                        </p>
                        @auth
                            <a href="{{ route('mad-mr-bert.blog.show', $relatedPost->slug) }}" class="text-sm text-[rgb(241,97,98)] hover:text-[rgb(200,60,60)] transition-colors duration-300 inline-flex items-center">
                                Read More
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </a>
                        @else
                            <a href="{{ route('mad-mr-bert.blog.preview', $relatedPost->slug) }}" class="text-sm text-[rgb(241,97,98)] hover:text-[rgb(200,60,60)] transition-colors duration-300 inline-flex items-center">
                                Read More
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </a>
                        @endauth
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endif

<!-- Popular Posts -->
@php
    $popularPosts = \App\Models\BlogPost::published()
        ->where('id', '!=', $blogPost->id)
        ->orderBy('view_count', 'desc')
        ->limit(5)
        ->get();
@endphp

@if($popularPosts->isNotEmpty())
    <div class="mt-10 pt-6 border-t border-gray-200">
        <h3 class="text-xl font-bold text-gray-900 mb-4">Popular Posts</h3>
        <div class="space-y-4">
            @foreach($popularPosts as $popular)
                <div class="flex items-center gap-3">
                    <div class="flex-shrink-0 w-16 h-16 bg-gray-100 rounded overflow-hidden">
                        @if($popular->featured_image)
                            <img src="{{ $popular->featured_image_url }}" alt="{{ $popular->title }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-gray-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                        @endif
                    </div>
                    <div>
                        <h4 class="text-sm font-medium mb-1">
                            @auth
                                <a href="{{ route('mad-mr-bert.blog.show', $popular->slug) }}" class="hover:text-[rgb(241,97,98)]">
                                    {{ $popular->title }}
                                </a>
                            @else
                                <a href="{{ route('mad-mr-bert.blog.preview', $popular->slug) }}" class="hover:text-[rgb(241,97,98)]">
                                    {{ $popular->title }}
                                </a>
                            @endauth
                        </h4>
                        <span class="text-xs text-gray-500">{{ $popular->published_at->format('M d, Y') }}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endif
@endsection

@push('styles')
<style>
    /* Basic styles for blog content */
    .prose {
        max-width: 65ch;
        margin: 0 auto;
    }
    
    .prose h2 {
        font-size: 1.75rem;
        margin-top: 2rem;
        margin-bottom: 1rem;
        font-weight: 700;
        color: #333;
    }
    
    .prose h3 {
        font-size: 1.5rem;
        margin-top: 1.75rem;
        margin-bottom: 0.75rem;
        font-weight: 600;
        color: #333;
    }
    
    .prose p {
        margin-top: 1.25rem;
        margin-bottom: 1.25rem;
        line-height: 1.7;
    }
    
    .prose a {
        color: rgb(241,97,98);
        text-decoration: underline;
    }
    
    .prose a:hover {
        color: rgb(200,60,60);
    }
</style>
@endpush 