<?php

namespace App\Console\Commands;

use App\Services\SeoService;
use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

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

        $sitemap = Sitemap::create();
        $urls = $this->seoService->generateSitemap();

        foreach ($urls as $url => $priority) {
            $sitemap->add(
                Url::create($url)
                    ->setPriority($priority)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
            );
        }

        $sitemap->writeToFile(public_path('sitemap.xml'));
        $this->info('Sitemap generated successfully!');
    }
} 