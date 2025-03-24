<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\WeatherService;

class WeatherController extends Controller
{
    protected $weatherService;

    public function __construct(WeatherService $weatherService)
    {
        $this->weatherService = $weatherService;
    }

    public function getCurrentWeather()
    {
        try {
            $weatherData = $this->weatherService->getCurrentWeather();
            return response()->json($weatherData);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
} 