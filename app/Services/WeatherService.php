<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Symfony\Component\DomCrawler\Crawler;

class WeatherService
{
    protected $url = 'https://www.accuweather.com/en/ao/canda/634115/current-weather/634115';

    public function getCurrentWeather()
    {
        try {
            $response = Http::get($this->url);
            
            if (!$response->successful()) {
                throw new \Exception('Failed to fetch weather data');
            }

            $html = $response->body();
            $crawler = new Crawler($html);

            // Find the current weather card
            $weatherCard = $crawler->filter('.current-weather-card.card-module.content-module');

            if ($weatherCard->count() === 0) {
                throw new \Exception('Weather card not found');
            }

            // Extract weather data
            $data = [
                'temperature' => $this->extractTemperature($weatherCard),
                'real_feel' => $this->extractRealFeel($weatherCard),
                'humidity' => $this->extractHumidity($weatherCard),
                'wind' => $this->extractWind($weatherCard),
                'pressure' => $this->extractPressure($weatherCard),
                'visibility' => $this->extractVisibility($weatherCard),
                'cloud_cover' => $this->extractCloudCover($weatherCard),
                'dew_point' => $this->extractDewPoint($weatherCard),
                'last_updated' => now()->toDateTimeString(),
            ];

            return $data;
        } catch (\Exception $e) {
            throw new \Exception('Error fetching weather data: ' . $e->getMessage());
        }
    }

    protected function extractTemperature($weatherCard)
    {
        return $weatherCard->filter('.temp')->count() > 0 
            ? $weatherCard->filter('.temp')->text() 
            : null;
    }

    protected function extractRealFeel($weatherCard)
    {
        return $weatherCard->filter('.real-feel')->count() > 0 
            ? $weatherCard->filter('.real-feel')->text() 
            : null;
    }

    protected function extractHumidity($weatherCard)
    {
        return $weatherCard->filter('.humidity')->count() > 0 
            ? $weatherCard->filter('.humidity')->text() 
            : null;
    }

    protected function extractWind($weatherCard)
    {
        return $weatherCard->filter('.wind')->count() > 0 
            ? $weatherCard->filter('.wind')->text() 
            : null;
    }

    protected function extractPressure($weatherCard)
    {
        return $weatherCard->filter('.pressure')->count() > 0 
            ? $weatherCard->filter('.pressure')->text() 
            : null;
    }

    protected function extractVisibility($weatherCard)
    {
        return $weatherCard->filter('.visibility')->count() > 0 
            ? $weatherCard->filter('.visibility')->text() 
            : null;
    }

    protected function extractCloudCover($weatherCard)
    {
        return $weatherCard->filter('.cloud-cover')->count() > 0 
            ? $weatherCard->filter('.cloud-cover')->text() 
            : null;
    }

    protected function extractDewPoint($weatherCard)
    {
        return $weatherCard->filter('.dew-point')->count() > 0 
            ? $weatherCard->filter('.dew-point')->text() 
            : null;
    }
} 