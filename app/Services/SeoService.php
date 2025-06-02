<?php

namespace App\Services;

use App\Models\BlogPost;
use App\Models\Product;
use App\Models\Settings;
use Illuminate\Support\Facades\Cache;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class SeoService
{
    protected $defaultMeta = [
        'title' => 'WhistlerSkySports - Power Hang Gliding Adventures in Whistler',
        'description' => 'Experience the thrill of power hang gliding in Whistler, BC. Professional pilots, stunning views, and unforgettable adventures in the Canadian Rockies.',
        'keywords' => 'power hang gliding, whistler, bc, canadian rockies, adventure sports, flying, aerial tours',
        'og_image' => '/images/og-default.jpg',
        'twitter_image' => '/images/twitter-default.jpg',
        'canonical' => null,
    ];

    /**
     * Get meta tags for a specific page or content item
     *
     * @param string $page
     * @param array $data
     * @return array
     */
    public function getMetaTags($page = 'home', $data = [])
    {
        $meta = $this->defaultMeta;

        // Get site settings for default SEO values
        $settings = $this->getSiteSettings();
        if ($settings && isset($settings['meta_description'])) {
            $meta['description'] = $settings['meta_description'];
        }
        if ($settings && isset($settings['meta_keywords'])) {
            $meta['keywords'] = $settings['meta_keywords'];
        }
        if ($settings && isset($settings['site_name'])) {
            $meta['title'] = $settings['site_name'];
        }

        switch ($page) {
            case 'booking':
                $meta['title'] = 'Book Your Power Hang Gliding Adventure - WhistlerSkySports';
                $meta['description'] = 'Book your power hang gliding experience in Whistler. Choose from various packages and enjoy breathtaking views of the Canadian Rockies.';
                $meta['keywords'] = 'book power hang gliding, whistler booking, aerial adventure booking, power hang gliding packages';
                break;

            case 'about':
                $meta['title'] = 'About WhistlerSkySports - Your Trusted Power Hang Gliding Partner';
                $meta['description'] = 'Learn about WhistlerSkySports, our experienced pilots, safety standards, and commitment to providing unforgettable power hang gliding experiences.';
                $meta['keywords'] = 'whistler power hang gliding company, experienced pilots, safety standards, power hang gliding history';
                break;

            case 'contact':
                $meta['title'] = 'Contact WhistlerSkySports - Get in Touch';
                $meta['description'] = 'Contact WhistlerSkySports for questions about power hang gliding experiences, bookings, or general inquiries. We\'re here to help!';
                $meta['keywords'] = 'contact whistler power hang gliding, booking inquiries, power hang gliding questions';
                break;

            case 'gallery':
                $meta['title'] = 'Power Hang Gliding Gallery - WhistlerSkySports';
                $meta['description'] = 'View our collection of stunning power hang gliding photos and videos from Whistler, BC. Experience the beauty of flying through our gallery.';
                $meta['keywords'] = 'power hang gliding photos, whistler aerial views, flying gallery, power hang gliding videos';
                break;
                
            case 'blog':
                $meta['title'] = 'Power Hang Gliding Blog - WhistlerSkySports';
                $meta['description'] = 'Stay updated with the latest news, tips, and stories about power hang gliding in Whistler and beyond.';
                $meta['keywords'] = 'power hang gliding blog, flying tips, whistler adventures, aerial sports stories';
                break;
                
            case 'blog.show':
                if (isset($data['blog']) && $data['blog'] instanceof BlogPost) {
                    $blog = $data['blog'];
                    $meta['title'] = $blog->title . ' - WhistlerSkySports Blog';
                    $meta['description'] = $blog->meta_description ? $blog->meta_description : $this->generateDescription($blog->content);
                    $meta['keywords'] = $blog->meta_keywords ?? $meta['keywords'];
                    $meta['og_image'] = $blog->featured_image ? asset($blog->featured_image) : $meta['og_image'];
                    $meta['twitter_image'] = $blog->featured_image ? asset($blog->featured_image) : $meta['twitter_image'];
                    $meta['canonical'] = route('blog.show', $blog->slug);
                }
                break;
                
            case 'product':
                if (isset($data['product']) && $data['product'] instanceof Product) {
                    $product = $data['product'];
                    $meta['title'] = $product->name . ' - WhistlerSkySports';
                    $meta['description'] = $product->meta_description ? $product->meta_description : $this->generateDescription($product->description);
                    $meta['keywords'] = $product->meta_keywords ?? $meta['keywords'];
                    $meta['og_image'] = $product->primary_image ? asset($product->primary_image) : $meta['og_image'];
                    $meta['twitter_image'] = $product->primary_image ? asset($product->primary_image) : $meta['twitter_image'];
                    $meta['canonical'] = route('products.show', $product->slug);
                }
                break;
        }

        // Set canonical URL if not already set
        if (!$meta['canonical']) {
            $meta['canonical'] = url()->current();
        }

        // Override with any provided data
        $meta = array_merge($meta, array_filter($data));

        return $meta;
    }

    /**
     * Generate structured data for SEO
     *
     * @param string $page
     * @param array $data
     * @return array
     */
    public function generateStructuredData($page = 'home', $data = [])
    {
        $structuredData = [];

        switch ($page) {
            case 'home':
                $structuredData = [
                    '@context' => 'https://schema.org',
                    '@type' => ['TouristAttraction','LocalBusiness'],
                    'name' => 'WhistlerSkySports',
                    'description' => 'Power hang gliding adventures in Whistler, BC',
                    'address' => [
                        '@type' => 'PostalAddress',
                        'addressLocality' => 'Whistler',
                        'addressRegion' => 'BC',
                        'addressCountry' => 'CA',
                    ],
                    'geo' => [
                        '@type' => 'GeoCoordinates',
                        'latitude' => '50.1163',
                        'longitude' => '-122.9574',
                    ],
                    'url' => url('/'),
                    'telephone' => '+1-604-555-0123',
                    'openingHoursSpecification' => [
                        [
                            '@type' => 'OpeningHoursSpecification',
                            'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
                            'opens' => '09:00',
                            'closes' => '17:00',
                        ],
                    ],
                ];
                break;

            case 'booking':
                $structuredData = [
                    '@context' => 'https://schema.org',
                    '@type' => 'TouristTrip',
                    'name' => 'Power Hang Gliding Experience',
                    'description' => 'Book your power hang gliding adventure in Whistler',
                    'tourBookingPage' => url('/booking'),
                    'offers' => [
                        [
                            '@type' => 'Offer',
                            'name' => 'Introductory Flight',
                            'price' => '150.00',
                            'priceCurrency' => 'CAD',
                        ],
                        [
                            '@type' => 'Offer',
                            'name' => 'Basic Training',
                            'price' => '299.00',
                            'priceCurrency' => 'CAD',
                        ],
                    ],
                ];
                break;
                
            case 'blog.show':
                if (isset($data['blog']) && $data['blog'] instanceof BlogPost) {
                    $blog = $data['blog'];
                    $structuredData = [
                        '@context' => 'https://schema.org',
                        '@type' => 'BlogPosting',
                        'headline' => $blog->title,
                        'description' => $blog->meta_description ? $blog->meta_description : $this->generateDescription($blog->content),
                        'image' => $blog->featured_image ? asset($blog->featured_image) : asset('images/og-default.jpg'),
                        'datePublished' => $blog->published_at->toIso8601String(),
                        'dateModified' => $blog->updated_at->toIso8601String(),
                        'author' => [
                            '@type' => 'Person',
                            'name' => $blog->author_name ?? 'WhistlerSkySports Team',
                        ],
                        'publisher' => [
                            '@type' => 'Organization',
                            'name' => 'WhistlerSkySports',
                            'logo' => [
                                '@type' => 'ImageObject',
                                'url' => asset('images/logo/Whistler-Sky-Sports_Full-White.png'),
                            ],
                        ],
                        'mainEntityOfPage' => [
                            '@type' => 'WebPage',
                            '@id' => route('blog.show', $blog->slug),
                        ],
                    ];
                }
                break;
                
            case 'product':
                if (isset($data['product']) && $data['product'] instanceof Product) {
                    $product = $data['product'];
                    $structuredData = [
                        '@context' => 'https://schema.org',
                        '@type' => 'Product',
                        'name' => $product->name,
                        'description' => $product->description,
                        'image' => $product->primary_image ? asset($product->primary_image) : asset('images/og-default.jpg'),
                        'sku' => $product->sku ?? '',
                        'brand' => [
                            '@type' => 'Brand',
                            'name' => 'WhistlerSkySports',
                        ],
                        'offers' => [
                            '@type' => 'Offer',
                            'price' => $product->price,
                            'priceCurrency' => 'CAD',
                            'availability' => $product->in_stock ? 'https://schema.org/InStock' : 'https://schema.org/OutOfStock',
                            'url' => route('products.show', $product->slug),
                        ],
                    ];
                }
                break;
        }

        return $structuredData;
    }

    /**
     * Generate sitemap URLs for the application
     *
     * @return array
     */
    public function generateSitemap()
    {
        $sitemap = [
            url('/') => '1.0',
            url('/booking') => '0.9',
            url('/about') => '0.8',
            url('/contact') => '0.8',
            url('/gallery') => '0.7',
            url('/faq') => '0.7',
            url('/pricing') => '0.8',
            url('/terms') => '0.6',
            url('/review') => '0.7',
            url('/weather') => '0.7',
        ];
        
        // Add blog posts
        try {
            $blogPosts = BlogPost::where('is_published', true)->get();
            foreach ($blogPosts as $post) {
                $sitemap[url("/blog/{$post->slug}")] = '0.7';
            }
        } catch (\Exception $e) {
            // Table might not exist yet
        }
        
        // Add products
        try {
            $products = Product::where('is_active', true)->get();
            foreach ($products as $product) {
                $sitemap[url("/product/{$product->slug}")] = '0.8';
            }
        } catch (\Exception $e) {
            // Table might not exist yet
        }

        return $sitemap;
    }
    
    /**
     * Generate full sitemap with additional data (images, lastmod)
     *
     * @return \Spatie\Sitemap\Sitemap
     */
    public function generateFullSitemap()
    {
        $sitemap = Sitemap::create();
        $urls = $this->generateSitemap();
        
        foreach ($urls as $url => $priority) {
            $sitemapUrl = Url::create($url)
                ->setPriority($priority)
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY);
                
            $sitemap->add($sitemapUrl);
        }
        
        // Add blog posts with their images
        try {
            $blogPosts = BlogPost::where('is_published', true)->get();
            foreach ($blogPosts as $post) {
                $url = url("/blog/{$post->slug}");
                $sitemapUrl = Url::create($url)
                    ->setPriority(0.7)
                    ->setLastModificationDate($post->updated_at)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY);
                
                if ($post->featured_image) {
                    $sitemapUrl->addImage(asset($post->featured_image), $post->title);
                }
                
                $sitemap->add($sitemapUrl);
            }
        } catch (\Exception $e) {
            // Table might not exist yet
        }
        
        // Add products with their images
        try {
            $products = Product::where('is_active', true)->get();
            foreach ($products as $product) {
                $url = url("/product/{$product->slug}");
                $sitemapUrl = Url::create($url)
                    ->setPriority(0.8)
                    ->setLastModificationDate($product->updated_at)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY);
                
                if ($product->primary_image) {
                    $sitemapUrl->addImage(asset($product->primary_image), $product->name);
                }
                
                $sitemap->add($sitemapUrl);
            }
        } catch (\Exception $e) {
            // Table might not exist yet
        }
        
        return $sitemap;
    }
    
    /**
     * Generate a description from content
     *
     * @param string $content
     * @param int $length
     * @return string
     */
    protected function generateDescription($content, $length = 160)
    {
        $plainText = strip_tags($content);
        $plainText = preg_replace('/\s+/', ' ', $plainText);
        
        if (strlen($plainText) <= $length) {
            return $plainText;
        }
        
        return substr($plainText, 0, $length - 3) . '...';
    }
    
    /**
     * Get site settings
     *
     * @return array|null
     */
    protected function getSiteSettings()
    {
        return Cache::remember('site_settings', 60 * 24, function () {
            try {
                return Settings::pluck('value', 'key')->toArray();
            } catch (\Exception $e) {
                return null;
            }
        });
    }
} 