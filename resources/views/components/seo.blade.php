@props(['meta' => [], 'structuredData' => null])

@php
// Ensure required meta properties have defaults
$meta = array_merge([
    'title' => $settings['site_name'] ?? 'WhistlerSkySports',
    'description' => $settings['meta_description'] ?? 'Experience the thrill of power hang gliding in Whistler, BC. Professional pilots, stunning views, and unforgettable adventures in the Canadian Rockies.',
    'keywords' => $settings['meta_keywords'] ?? 'power hang gliding, whistler, bc, canadian rockies, adventure sports, flying, aerial tours',
    'og_image' => asset('/images/og-default.jpg'),
    'twitter_image' => asset('/images/twitter-default.jpg'),
    'canonical' => url()->current(),
], $meta);

// Generate page title with site name if not already included
if (!str_contains($meta['title'], $settings['site_name'] ?? 'WhistlerSkySports')) {
    $meta['title'] .= ' - ' . ($settings['site_name'] ?? 'WhistlerSkySports');
}
@endphp

{{-- Basic Meta Tags --}}
<meta name="robots" content="{{ $meta['robots'] ?? 'index,follow' }}">
<meta name="author" content="{{ $settings['site_name'] ?? 'WhistlerSkySports' }}">
<title>{{ $meta['title'] }}</title>
<meta name="description" content="{{ $meta['description'] }}">
<meta name="keywords" content="{{ $meta['keywords'] }}">
<link rel="canonical" href="{{ $meta['canonical'] }}">

{{-- Open Graph Tags for Social Media --}}
<meta property="og:title" content="{{ $meta['title'] }}">
<meta property="og:description" content="{{ $meta['description'] }}">
<meta property="og:url" content="{{ $meta['canonical'] }}">
<meta property="og:type" content="website">
<meta property="og:image" content="{{ $meta['og_image'] }}">
<meta property="og:site_name" content="{{ $settings['site_name'] ?? 'WhistlerSkySports' }}">

{{-- Twitter Card Tags --}}
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $meta['title'] }}">
<meta name="twitter:description" content="{{ $meta['description'] }}">
<meta name="twitter:image" content="{{ $meta['twitter_image'] }}">

{{-- Structured Data (JSON-LD) --}}
@if($structuredData)
<script type="application/ld+json">
{!! json_encode($structuredData, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>
@endif

{{-- BreadcrumbList structured data to boost SEO --}}
@if(url()->current() !== url('/'))
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "BreadcrumbList",
            "itemListElement": [
                {
                    "@type": "ListItem",
                    "position": 1,
                    "name": "Home",
                    "item": "{{ url('/') }}"
                },
                {
                    "@type": "ListItem",
                    "position": 2,
                    "name": "{{ $meta['title'] }}",
                    "item": "{{ $meta['canonical'] }}"
                }
            ]
        }
    </script>
@endif 