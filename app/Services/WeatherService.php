<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class WeatherService
{
    protected $latitude;
    protected $longitude;
    protected $cacheMinutes = 30; // Cache weather data for 30 minutes

    public function __construct()
    {
        // Whistler coordinates
        $this->latitude = 50.1163;
        $this->longitude = -122.9574;
    }

    /**
     * Get current weather data
     *
     * @return array
     */
    public function getCurrentWeather()
    {
        return Cache::remember('current_weather', $this->cacheMinutes, function () {
            try {
                $forecast = $this->getForecast();
                
                return [
                    'temperature' => $forecast['current']['temp'] ?? null,
                    'conditions' => $forecast['current']['weather'][0]['description'] ?? 'Unknown',
                    'wind_speed' => $forecast['current']['wind_speed'] ?? null,
                    'humidity' => $forecast['current']['humidity'] ?? null,
                    'visibility' => ($forecast['current']['visibility'] ?? 0) / 1000, // Convert to km
                    'forecast' => $this->formatForecast($forecast['daily'] ?? [])
                ];
            } catch (\Exception $e) {
                Log::error('Failed to fetch weather data: ' . $e->getMessage());
                throw $e;
            }
        });
    }

    /**
     * Get weather forecast from OpenWeatherMap API
     *
     * @return array
     */
    protected function getForecast()
    {
        $response = Http::get('https://api.openweathermap.org/data/3.0/onecall', [
            'lat' => $this->latitude,
            'lon' => $this->longitude,
            'appid' => config('services.openweather.key'),
            'units' => 'metric',
            'exclude' => 'minutely,hourly,alerts'
        ]);

        if (!$response->successful()) {
            Log::error('Weather API error: ' . $response->body());
            throw new \Exception('Failed to fetch weather data from API');
        }

        return $response->json();
    }

    /**
     * Format the forecast data for the next 3 days
     *
     * @param array $dailyForecast
     * @return array
     */
    protected function formatForecast($dailyForecast)
    {
        $forecast = [];
        
        // Get next 3 days
        for ($i = 1; $i <= 3; $i++) {
            if (isset($dailyForecast[$i])) {
                $day = $dailyForecast[$i];
                $forecast[] = [
                    'date' => date('D, M j', $day['dt']),
                    'high' => round($day['temp']['max']),
                    'low' => round($day['temp']['min']),
                    'conditions' => $day['weather'][0]['description'] ?? 'Unknown'
                ];
            }
        }

        return $forecast;
    }
} 