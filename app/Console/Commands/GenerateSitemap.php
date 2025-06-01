<?php

namespace App\Console\Commands;

use App\Services\SeoService;
use Illuminate\Console\Command;

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';
    protected $description = 'Generate the sitemap.';

    protected $seoService;

    public function __construct(SeoService $seoService)
    {
        parent::__construct();
        $this->seoService = $seoService;
    }

    public function handle()
    {
        $this->info('Generating sitemap...');

        // Force production URL for sitemap - store and restore App URL
        $originalUrl = config('app.url');
        
        // Generate the base URLs with proper domain manually
        $sitemapUrls = [
            '/' => '1.0',
            '/booking' => '0.9',
            '/about' => '0.8',
            '/contact' => '0.8',
            '/gallery' => '0.7',
            '/faq' => '0.7',
            '/pricing' => '0.8',
            '/terms' => '0.6',
            '/review' => '0.7',
            '/weather' => '0.7',
        ];
        
        $sitemap = \Spatie\Sitemap\Sitemap::create();
        $baseUrl = "https://whistlerskysports.ca";
        
        // Add all URLs with proper domain
        foreach ($sitemapUrls as $path => $priority) {
            $url = \Spatie\Sitemap\Tags\Url::create($baseUrl . $path)
                ->setPriority($priority)
                ->setChangeFrequency(\Spatie\Sitemap\Tags\Url::CHANGE_FREQUENCY_WEEKLY);
            $sitemap->add($url);
        }
        
        // Write the sitemap to the public directory
        $sitemap->writeToFile(public_path('sitemap.xml'));
        
        $this->info('Sitemap generated successfully!');
        $this->info('Sitemap location: ' . public_path('sitemap.xml'));
    }
} 