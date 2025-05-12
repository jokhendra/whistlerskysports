<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Contact;
use App\Models\User;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Services\WeatherService;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    protected $weatherService;

    public function __construct(WeatherService $weatherService)
    {
        $this->weatherService = $weatherService;
    }

    public function dashboard()
    {
        $stats = [
            'total_bookings' => Booking::count(),
            'total_contacts' => Contact::count(),
            'total_users' => User::count(),
            'recent_bookings' => Booking::latest()->take(5)->get(),
            'recent_contacts' => Contact::latest()->take(5)->get(),
            'monthly_revenue' => Booking::whereMonth('created_at', now()->month)
                ->sum('total_amount'),
            'yearly_revenue' => Booking::whereYear('created_at', now()->year)
                ->sum('total_amount'),
        ];

        // Get weather data for Whistler (latitude: 50.1163, longitude: -122.9574)
        try {
            $weatherData = $this->weatherService->getCurrentWeather();
            
            $weather = [
                'current_temp' => $weatherData['temperature'] ?? null,
                'conditions' => $weatherData['conditions'] ?? null,
                'wind_speed' => $weatherData['wind_speed'] ?? null,
                'humidity' => $weatherData['humidity'] ?? null,
                'visibility' => $weatherData['visibility'] ?? null,
                'alerts' => [],
                'forecast' => $weatherData['forecast'] ?? []
            ];
        } catch (\Exception $e) {
            Log::error('Weather data fetch failed: ' . $e->getMessage());
            $weather = [
                'current_temp' => null,
                'conditions' => 'Weather data unavailable',
                'wind_speed' => null,
                'humidity' => null,
                'visibility' => null,
                'alerts' => [],
                'forecast' => []
            ];
        }

        return view('admin.dashboard', compact('stats', 'weather'));
    }

    public function users()
    {
        $users = User::latest()->paginate(10);
        return view('admin.users.index', compact('users'));
    }


    public function promotionalEmails()
    {
        return view('admin.promotional-emails.index');
    }

    public function settings()
    {
        return view('admin.settings.index');
    }

    public function beginnerTraining()
    {
        return view('admin.training.beginner');
    }

    public function advancedTraining()
    {
        return view('admin.training.advanced');
    }

    public function certificationTraining()
    {
        return view('admin.training.certification');
    }

    public function hangGliderProducts()
    {
        return view('admin.products.hang-glider');
    }

    public function merchandiseProducts(Request $request)
    {
        $query = \App\Models\Product::query();
        
        // Always filter for merchandise categories
        $query->whereIn('category', ['clothing', 'accessories', 'equipment', 'books']);
        
        // Filter by search term
        if($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('category', 'like', "%{$search}%");
            });
        }
        
        // Filter by category
        if($request->filled('category')) {
            $query->where('category', $request->category);
        }
        
        // Filter by stock status
        if($request->stock === 'in_stock') {
            $query->where('stock', '>', 0);
        } elseif($request->stock === 'low_stock') {
            $query->where('stock', '>', 0)->where('stock', '<', 5);
        } elseif($request->stock === 'out_of_stock') {
            $query->where('stock', 0);
        }
        
        $products = $query->orderBy('created_at', 'desc')->paginate(10)->withQueryString();
        
        return view('admin.products.merchandise', compact('products'));
    }
} 