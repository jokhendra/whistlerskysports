<?php

namespace App\Services;

class SeoService
{
    protected $defaultMeta = [
        'title' => 'WhistlerSkySports - Power Hang Gliding Adventures in Whistler',
        'description' => 'Experience the thrill of power hang gliding in Whistler, BC. Professional pilots, stunning views, and unforgettable adventures in the Canadian Rockies.',
        'keywords' => 'power hang gliding, whistler, bc, canadian rockies, adventure sports, flying, aerial tours',
        'og_image' => '/images/og-default.jpg',
        'twitter_image' => '/images/twitter-default.jpg',
    ];

    public function getMetaTags($page = 'home', $data = [])
    {
        $meta = $this->defaultMeta;

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
        }

        // Override with any provided data
        $meta = array_merge($meta, $data);

        return $meta;
    }

    public function generateStructuredData($page = 'home', $data = [])
    {
        $structuredData = [];

        switch ($page) {
            case 'home':
                $structuredData = [
                    '@context' => 'https://schema.org',
                    '@type' => 'TouristAttraction',
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
        }

        return $structuredData;
    }

    public function generateSitemap()
    {
        $sitemap = [
            url('/') => '1.0',
            url('/booking') => '0.9',
            url('/about') => '0.8',
            url('/contact') => '0.8',
            url('/gallery') => '0.7',
        ];

        return $sitemap;
    }
} 