@extends('layouts.app')

@section('content')
<!-- Premium Hero Section with Featured Image Background -->
<div class="relative lg:mt-24 md:mt-24 mt-16">
    @if($blogPost->featured_image)
    <div class="absolute inset-0 z-0 h-[70vh]">
        <div class="absolute inset-0 bg-gradient-to-b from-black/70 to-black/50 z-10"></div>
        <img src="{{ $blogPost->featured_image_url }}" alt="{{ $blogPost->title }}" class="w-full h-full object-cover">
    </div>
    @else
    <div class="absolute inset-0 z-0 h-[70vh] bg-gradient-to-b from-[rgb(241,97,98)] to-[rgb(200,60,60)]"></div>
    @endif
    
    <div class="relative z-20 pt-32 pb-20 px-4 text-white">
        <div class="container mx-auto max-w-4xl">
            <!-- Category & Date with subtle glow -->
            <div class="flex items-center justify-center md:justify-start gap-4 text-white/80 font-medium mb-5 text-sm filter drop-shadow-sm">
                @if($blogPost->category)
                    <a href="{{ route('mad-mr-bert.blog', ['category' => $blogPost->category]) }}" 
                       class="px-3 py-1 bg-white/20 backdrop-blur-sm rounded-full hover:bg-white/30 transition-colors duration-300">
                        {{ $blogPost->category }}
                    </a>
                @endif
                <span class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    {{ $blogPost->published_at->format('F d, Y') }}
                </span>
            </div>
            
            <!-- Title with dramatic shadow -->
            <h1 class="text-4xl md:text-5xl font-bold mb-6 text-center md:text-left drop-shadow-md leading-tight">
                {{ $blogPost->title }}
            </h1>
            
            <!-- Author -->
            <div class="flex items-center mt-8 mb-3">
                <div class="w-12 h-12 bg-[rgb(241,97,98)] rounded-full flex items-center justify-center text-white text-lg font-bold mr-3 shadow-md">
                    {{ substr($blogPost->admin->name ?? 'Admin', 0, 1) }}
                </div>
<div>
                    <p class="font-semibold text-white">{{ $blogPost->admin->name ?? 'Admin' }}</p>
                    <p class="text-sm text-white/70">Aviation Expert</p>
                </div>
                
                <!-- Reading Time Estimate -->
                <div class="ml-auto flex items-center text-sm text-white/80">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    {{ ceil(str_word_count(strip_tags($blogPost->content)) / 200) }} min read
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Content Card Floated Above Hero Section -->
<div class="relative z-30 -mt-16">
    <div class="container mx-auto px-4">
        <div class="bg-white rounded-xl shadow-xl max-w-4xl mx-auto overflow-hidden">
            <div class="p-8 md:p-12">
                <!-- Excerpt if available -->
                @if($blogPost->excerpt)
                    <div class="mb-8 text-xl text-gray-600 border-l-4 border-[rgb(241,97,98)] pl-4 py-2 bg-[rgb(241,97,98,0.03)] rounded-r-lg">
                        {{ $blogPost->excerpt }}
                    </div>
                @endif
                
                <!-- Main Content -->
                <div class="prose prose-lg max-w-none">
                    {!! $blogPost->content !!}
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

                <!-- Post Navigation & Sharing -->
                <div class="flex flex-wrap md:flex-nowrap gap-6 items-center mt-10 pt-6 border-t border-gray-200">
                    <!-- Social Sharing Icons -->
                    <div class="w-full md:w-auto">
                        <p class="text-gray-500 text-sm mb-3 font-medium">SHARE THIS POST</p>
                        <div class="flex gap-3">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" 
                               target="_blank" 
                               class="w-10 h-10 rounded-full bg-gray-100 hover:bg-blue-100 text-gray-600 hover:text-blue-600 flex items-center justify-center transition-all duration-300">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                </svg>
                            </a>
                            <a href="https://twitter.com/intent/tweet?text={{ $blogPost->title }}&url={{ url()->current() }}" 
                               target="_blank" 
                               class="w-10 h-10 rounded-full bg-gray-100 hover:bg-blue-100 text-gray-600 hover:text-blue-500 flex items-center justify-center transition-all duration-300">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                                </svg>
                            </a>
                            <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ url()->current() }}" 
                               target="_blank" 
                               class="w-10 h-10 rounded-full bg-gray-100 hover:bg-blue-100 text-gray-600 hover:text-blue-700 flex items-center justify-center transition-all duration-300">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                                </svg>
                            </a>
                            <a href="mailto:?subject={{ $blogPost->title }}&body=Check out this article: {{ url()->current() }}" 
                               class="w-10 h-10 rounded-full bg-gray-100 hover:bg-green-100 text-gray-600 hover:text-green-600 flex items-center justify-center transition-all duration-300">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                    
                    <!-- Post Navigation -->
                    <div class="flex flex-1 flex-col sm:flex-row justify-between items-stretch gap-4">
                        @if($prevPost)
                            <a href="{{ route('mad-mr-bert.blog.show', $prevPost->slug) }}" class="flex-1 p-3 border border-gray-100 rounded-lg hover:border-[rgb(241,97,98)] hover:bg-[rgb(241,97,98,0.02)] group transition-all duration-300">
                                <div class="text-xs text-gray-500 mb-1 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1 transform group-hover:-translate-x-1 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                    </svg>
                                    Previous Post
                                </div>
                                <h5 class="text-sm font-medium text-gray-800 group-hover:text-[rgb(241,97,98)] transition-colors duration-300 line-clamp-1">{{ $prevPost->title }}</h5>
                            </a>
                        @else
                            <div class="flex-1"></div>
                        @endif
                        
                        @if($nextPost)
                            <a href="{{ route('mad-mr-bert.blog.show', $nextPost->slug) }}" class="flex-1 p-3 border border-gray-100 rounded-lg hover:border-[rgb(241,97,98)] hover:bg-[rgb(241,97,98,0.02)] group transition-all duration-300 text-right">
                                <div class="text-xs text-gray-500 mb-1 flex items-center justify-end">
                                    Next Post
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 ml-1 transform group-hover:translate-x-1 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </div>
                                <h5 class="text-sm font-medium text-gray-800 group-hover:text-[rgb(241,97,98)] transition-colors duration-300 line-clamp-1">{{ $nextPost->title }}</h5>
                            </a>
                        @else
                            <div class="flex-1"></div>
                        @endif
                    </div>
                </div>
                
                <!-- Author Information Card -->
                <div class="mt-12 pt-6 border-t border-gray-200">
                    <div class="bg-gray-50 rounded-xl p-6 border border-gray-100 flex flex-col md:flex-row gap-5 items-center md:items-start">
                        <div class="w-20 h-20 bg-[rgb(241,97,98)] rounded-full flex items-center justify-center text-white text-2xl font-bold shrink-0">
                            {{ substr($blogPost->admin->name ?? 'Admin', 0, 1) }}
                        </div>
                        <div class="text-center md:text-left">
                            <h4 class="text-xl font-bold text-gray-900">{{ $blogPost->admin->name ?? 'Admin' }}</h4>
                            <p class="text-gray-600 mb-3">Aviation Expert at MAD Mr Bert's</p>
                            <p class="text-gray-600 text-sm leading-relaxed">
                                A passionate aviation enthusiast with extensive experience in paragliding, skydiving, and flight instruction. 
                                Dedicated to sharing knowledge and inspiring others to discover the joy of flight.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Blog Post Content -->
<div class="py-12 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Sidebar -->
                <div class="lg:w-1/3 mt-8 lg:mt-0">
                    <!-- Popular Posts -->
                    @if(isset($popularPosts) && $popularPosts->isNotEmpty())
                    <div class="bg-white rounded-lg shadow-md p-6 border border-gray-100 mb-6">
                        <h3 class="text-lg font-bold text-gray-900 mb-4">Popular Posts</h3>
                        <div class="space-y-4">
                            @foreach($popularPosts as $post)
                            <div class="flex gap-3">
                                <div class="flex-shrink-0 w-16 h-16 bg-gray-100 rounded overflow-hidden">
                                    @if($post->featured_image)
                                        <img src="{{ $post->featured_image_url }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center bg-gray-200">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                    @endif
                                </div>
                                <div class="flex-1">
                                    <h4 class="text-sm font-medium line-clamp-2 mb-1">
                                        <a href="{{ route('mad-mr-bert.blog.preview', $post->slug) }}" class="hover:text-[rgb(241,97,98)]">
                                            {{ $post->title }}
                                        </a>
                                    </h4>
                                    <div class="text-xs text-gray-500">
                                        {{ $post->published_at->format('M d, Y') }} • {{ $post->view_count }} {{ Str::plural('view', $post->view_count) }}
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <!-- Categories -->
                    <div class="bg-white rounded-xl shadow-md p-6 border border-gray-100 mb-6">
                        <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center">
                            <span class="w-4 h-4 bg-[rgb(241,97,98)] rounded-full mr-2"></span>
                            Categories
                        </h3>
                        <div class="flex flex-wrap gap-2">
                            @php
                                $categories = \App\Models\BlogPost::published()
                                    ->select('category')
                                    ->distinct()
                                    ->whereNotNull('category')
                                    ->pluck('category');
                            @endphp
                            @forelse($categories as $category)
                                <a href="{{ route('mad-mr-bert.blog', ['category' => $category]) }}" 
                                   class="inline-block px-3 py-1 text-sm rounded-full transition-all duration-300 
                                          {{ $blogPost->category == $category ? 
                                            'bg-[rgb(241,97,98)] text-white border-[rgb(241,97,98)]' : 
                                            'border bg-white text-gray-700 border-gray-200 hover:bg-[rgb(241,97,98,0.05)] hover:text-[rgb(241,97,98)] hover:border-[rgb(241,97,98,0.3)]' }}">
                                    {{ $category }}
                                </a>
                            @empty
                                <span class="text-sm text-gray-500">No categories yet</span>
                            @endforelse
                        </div>
                    </div>

                    <!-- Tags Cloud -->
                    <div class="bg-white rounded-xl shadow-md p-6 border border-gray-100 mb-6">
                        <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center">
                            <span class="w-4 h-4 bg-[rgb(241,97,98)] rounded-full mr-2"></span>
                            Popular Tags
                        </h3>
                        <div class="flex flex-wrap gap-2">
                            @php
                                $tags = \App\Models\BlogPost::published()
                                    ->whereNotNull('tags')
                                    ->get()
                                    ->pluck('tags')
                                    ->flatten()
                                    ->countBy()
                                    ->sortDesc()
                                    ->take(15)
                                    ->keys();
                            @endphp
                            @forelse($tags as $tag)
                                <a href="{{ route('mad-mr-bert.blog', ['tag' => $tag]) }}" 
                                   class="inline-block text-sm text-gray-600 hover:text-[rgb(241,97,98)] hover:underline transition-all duration-300 
                                          {{ in_array($tag, $blogPost->tags ?? []) ? 'text-[rgb(241,97,98)] font-medium' : '' }}">
                                    #{{ $tag }}
                                </a>
                            @empty
                                <span class="text-sm text-gray-500">No tags yet</span>
                            @endforelse
                        </div>
                    </div>

                    <!-- Newsletter Signup -->
                    <div class="bg-gradient-to-br from-[rgb(241,97,98,0.05)] to-[rgb(241,97,98,0.15)] rounded-xl p-6 border border-[rgb(241,97,98,0.1)]">
                        <h3 class="text-lg font-bold text-gray-900 mb-2 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-[rgb(241,97,98)]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            Get Aviation Updates
                        </h3>
                        <p class="text-sm text-gray-600 mb-4">Subscribe to our newsletter for the latest aviation tips, adventures and special offers.</p>
                        <form action="#" method="POST" class="space-y-3">
                            <div class="relative">
                                <input type="email" name="email" placeholder="Your email address" required 
                                       class="w-full px-4 py-2 border border-[rgb(241,97,98,0.3)] rounded-lg focus:outline-none focus:border-[rgb(241,97,98)] pr-10 bg-white">
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-[rgb(241,97,98)]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                    </svg>
                                </div>
                            </div>
                            <button type="submit" class="w-full py-2 bg-[rgb(241,97,98)] text-white rounded-lg hover:bg-[rgb(200,60,60)] transition-all duration-300 flex items-center justify-center gap-2">
                                <span>Subscribe Now</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            
            <!-- Related Posts -->
            @if($relatedPosts->count() > 0)
                <div class="mt-16">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6">Related Posts</h3>
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
                                    <a href="{{ route('mad-mr-bert.blog.preview', $relatedPost->slug) }}" class="text-sm text-[rgb(241,97,98)] hover:text-[rgb(200,60,60)] transition-colors duration-300 inline-flex items-center">
                                        Read More
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
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
@endsection

@push('styles')
<style>
    /* Enhanced styles for blog content */
    .prose {
        max-width: 100%;
        color: #333;
    }
    
    .prose h2 {
        font-size: 1.75rem;
        margin-top: 2.5rem;
        margin-bottom: 1.25rem;
        font-weight: 700;
        color: #222;
        position: relative;
        padding-bottom: 0.75rem;
    }
    
    .prose h2:after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 3rem;
        height: 3px;
        background-color: rgb(241,97,98);
        border-radius: 3px;
    }
    
    .prose h3 {
        font-size: 1.5rem;
        margin-top: 2rem;
        margin-bottom: 1rem;
        font-weight: 600;
        color: #333;
    }
    
    .prose p {
        margin-top: 1.25rem;
        margin-bottom: 1.25rem;
        line-height: 1.8;
        font-size: 1.05rem;
    }
    
    .prose a {
        color: rgb(241,97,98);
        text-decoration: underline;
        text-underline-offset: 2px;
        font-weight: 500;
        transition: all 0.2s ease;
    }
    
    .prose a:hover {
        color: rgb(200,60,60);
    }
    
    .prose ul, .prose ol {
        margin-top: 1.25rem;
        margin-bottom: 1.25rem;
        padding-left: 1.5rem;
    }
    
    .prose li {
        margin-top: 0.5rem;
        margin-bottom: 0.5rem;
        line-height: 1.7;
    }
    
    .prose blockquote {
        border-left: 4px solid rgb(241,97,98);
        padding: 1rem 1.5rem;
        font-style: italic;
        color: #555;
        margin: 1.5rem 0;
        background-color: rgb(241,97,98,0.05);
        border-radius: 0 0.5rem 0.5rem 0;
    }
    
    .prose img {
        margin: 2rem auto;
        border-radius: 0.5rem;
        max-width: 100%;
        height: auto;
        box-shadow: 0 4px 20px rgba(0,0,0,0.08);
    }
    
    .prose pre {
        background-color: #f3f4f6;
        border-radius: 0.5rem;
        padding: 1rem;
        overflow-x: auto;
        margin: 1.5rem 0;
        border: 1px solid #e5e7eb;
    }
    
    .prose code {
        background-color: #f3f4f6;
        padding: 0.2rem 0.4rem;
        border-radius: 0.25rem;
        font-size: 0.875rem;
        border: 1px solid #e5e7eb;
    }
    
    .prose table {
        width: 100%;
        border-collapse: collapse;
        margin: 1.5rem 0;
        overflow: hidden;
        border-radius: 0.5rem;
        border: 1px solid #e5e7eb;
    }
    
    .prose th {
        background-color: #f9fafb;
        padding: 0.75rem 1rem;
        text-align: left;
        font-weight: 600;
        border-bottom: 1px solid #e5e7eb;
    }
    
    .prose td {
        padding: 0.75rem 1rem;
        border-bottom: 1px solid #e5e7eb;
    }
    
    .prose tr:last-child td {
        border-bottom: none;
    }
</style>
@endpush
