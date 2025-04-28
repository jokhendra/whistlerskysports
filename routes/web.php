<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ChatBotController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Static Page Routes
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/about', function () {
    return view('about');
});

Route::get('/gallery', function () {
    return view('gallery');
});

Route::get('/terms', function () {
    return view('terms');
})->name('terms');

Route::get('/pricing', function () {
    return view('pricing');
})->name('pricing');

Route::get('/faq', function () {
    return view('faq');
})->name('faq');

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

/*
|--------------------------------------------------------------------------
| Contact Routes
|--------------------------------------------------------------------------
*/
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::post('/contact', [App\Http\Controllers\ContactController::class, 'contact'])->name('contact.store');

/*
|--------------------------------------------------------------------------
| Booking Routes
|--------------------------------------------------------------------------
*/
Route::prefix('booking')->group(function () {
    Route::get('/', function () {
    return view('booking');
})->name('booking');

    Route::post('/create', [BookingController::class, 'createBooking'])->name('booking.create');
    Route::post('/capture-payment', [BookingController::class, 'capturePayment'])->name('booking.capture-payment');
    Route::get('/preview', function() {
        return redirect()->route('booking')
            ->with('error', 'Please complete the booking form to access this page.');
    })->name('booking.preview.redirect');
    Route::post('/preview', [BookingController::class, 'preview'])->name('booking.preview');
    Route::get('/success', [BookingController::class, 'success'])
        ->name('booking.success')
        ->middleware(['web', \App\Http\Middleware\EnsureBookingSuccess::class]);
    Route::get('/cancel', function () {
    return view('booking.cancel');
})->name('booking.cancel');
    Route::post('/log-payment-failure', [BookingController::class, 'logPaymentFailure'])->name('booking.log-payment-failure');
});

/*
|--------------------------------------------------------------------------
| Training Routes
|--------------------------------------------------------------------------
*/
Route::prefix('training')->group(function() {
    Route::get('/beginner', function() {
        return view('beginner_training');
    });
    Route::get('/advanced', function() {
        return view('advanced_training');
    });
    Route::get('/certification', function() {
        return view('certification_training');
    });
});

/*
|--------------------------------------------------------------------------
| Product Routes
|--------------------------------------------------------------------------
*/
Route::prefix('product')->group(function(){
    Route::get('/hang-glider',function(){
        return view("product_hang_glider");
    });
});

/*
|--------------------------------------------------------------------------
| Weather Routes
|--------------------------------------------------------------------------
*/
Route::get('/weather', function() {
    // Dummy data for weather display
    $data = [
        'currentTemp' => 22,
        'weatherDescription' => 'Partly Cloudy',
        'feelsLike' => 24,
        'windSpeed' => 15,
        'windDirection' => 'NW',
        'windGusts' => 22,
        'visibility' => 12,
        'humidity' => 65,
        'flightSafety' => 'Moderate',
        'windSafetyColor' => 'yellow',
        'windSafetyPercent' => 65,
        'visibilitySafetyColor' => 'green',
        'visibilitySafetyPercent' => 90,
        'thermalSafetyColor' => 'yellow',
        'thermalSafetyPercent' => 70,
        'hasWarning' => true,
        'warningClass' => 'bg-yellow-100 text-yellow-800',
        'warningMessage' => 'Moderate wind gusts expected in the afternoon. Exercise caution.',
        'hourlyForecast' => [
            ['time' => '10:00', 'temp' => 20, 'wind' => 12, 'gusts' => 18, 'safety' => 'Good'],
            ['time' => '11:00', 'temp' => 21, 'wind' => 14, 'gusts' => 20, 'safety' => 'Good'],
            ['time' => '12:00', 'temp' => 22, 'wind' => 15, 'gusts' => 22, 'safety' => 'Moderate'],
            ['time' => '13:00', 'temp' => 23, 'wind' => 17, 'gusts' => 25, 'safety' => 'Moderate'],
            ['time' => '14:00', 'temp' => 24, 'wind' => 18, 'gusts' => 28, 'safety' => 'Moderate'],
            ['time' => '15:00', 'temp' => 24, 'wind' => 20, 'gusts' => 32, 'safety' => 'Poor'],
        ],
        'launchSites' => [
            ['name' => 'Eagle Peak', 'wind' => 14, 'gusts' => 20, 'direction' => 'NW', 'status' => 'Good'],
            ['name' => 'Mountain Ridge', 'wind' => 18, 'gusts' => 26, 'direction' => 'N', 'status' => 'Moderate'],
            ['name' => 'Coastal Cliffs', 'wind' => 22, 'gusts' => 32, 'direction' => 'NE', 'status' => 'Poor'],
            ['name' => 'Valley View', 'wind' => 12, 'gusts' => 18, 'direction' => 'W', 'status' => 'Good'],
        ],
        'dailyForecast' => [
            [
                'day' => 'Today',
                'date' => date('M d'),
                'icon' => 'partly-cloudy',
                'highTemp' => 24,
                'lowTemp' => 18,
                'windSpeed' => 15,
                'windGusts' => 22,
                'precipitation' => 10,
                'description' => 'Partly cloudy with moderate winds',
                'safety' => 'Moderate'
            ],
            [
                'day' => 'Tomorrow',
                'date' => date('M d', strtotime('+1 day')),
                'icon' => 'sunny',
                'highTemp' => 26,
                'lowTemp' => 19,
                'windSpeed' => 12,
                'windGusts' => 18,
                'precipitation' => 0,
                'description' => 'Clear skies with light winds',
                'safety' => 'Good'
            ],
            [
                'day' => date('D', strtotime('+2 day')),
                'date' => date('M d', strtotime('+2 day')),
                'icon' => 'sunny',
                'highTemp' => 27,
                'lowTemp' => 20,
                'windSpeed' => 10,
                'windGusts' => 15,
                'precipitation' => 0,
                'description' => 'Sunny and calm',
                'safety' => 'Good'
            ],
            [
                'day' => date('D', strtotime('+3 day')),
                'date' => date('M d', strtotime('+3 day')),
                'icon' => 'cloudy',
                'highTemp' => 25,
                'lowTemp' => 19,
                'windSpeed' => 18,
                'windGusts' => 25,
                'precipitation' => 20,
                'description' => 'Increasing clouds with stronger winds',
                'safety' => 'Moderate'
            ],
            [
                'day' => date('D', strtotime('+4 day')),
                'date' => date('M d', strtotime('+4 day')),
                'icon' => 'rainy',
                'highTemp' => 22,
                'lowTemp' => 17,
                'windSpeed' => 22,
                'windGusts' => 35,
                'precipitation' => 60,
                'description' => 'Rain with strong gusts',
                'safety' => 'Poor'
            ],
            [
                'day' => date('D', strtotime('+5 day')),
                'date' => date('M d', strtotime('+5 day')),
                'icon' => 'partly-cloudy',
                'highTemp' => 23,
                'lowTemp' => 16,
                'windSpeed' => 16,
                'windGusts' => 24,
                'precipitation' => 30,
                'description' => 'Clearing with moderate winds',
                'safety' => 'Moderate'
            ],
            [
                'day' => date('D', strtotime('+6 day')),
                'date' => date('M d', strtotime('+6 day')),
                'icon' => 'sunny',
                'highTemp' => 25,
                'lowTemp' => 18,
                'windSpeed' => 12,
                'windGusts' => 18,
                'precipitation' => 10,
                'description' => 'Mostly sunny with light winds',
                'safety' => 'Good'
            ],
        ]
    ];
    
    return view('weather', $data);
});

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/
// PayPal payment routes
Route::prefix('api')->group(function () {    
    // Chat Bot Routes
    Route::prefix('chat')->group(function () {
        Route::post('/start', [ChatBotController::class, 'startChat']);
        Route::post('/message', [ChatBotController::class, 'sendMessage']);
        Route::get('/history/{sessionId}', [ChatBotController::class, 'getChatHistory']);
    });
});

/*
|--------------------------------------------------------------------------
| Review Routes
|--------------------------------------------------------------------------
*/
Route::get('/review', [ReviewController::class, 'index'])->name('reviews.index');
Route::post('/review', [ReviewController::class, 'store'])->name('reviews.store');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {
    // Guest routes
    Route::middleware('guest')->group(function () {
        Route::get('login', [App\Http\Controllers\Admin\AuthController::class, 'showLoginForm'])->name('login');
        Route::post('login', [App\Http\Controllers\Admin\AuthController::class, 'login']);
    });

    // Protected admin routes
    Route::middleware(['auth', 'admin'])->group(function () {
        Route::post('logout', [App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('logout');
        Route::get('dashboard', [App\Http\Controllers\Admin\AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('bookings', [App\Http\Controllers\Admin\AdminController::class, 'bookings'])->name('bookings');
        Route::get('contacts', [App\Http\Controllers\Admin\AdminController::class, 'contacts'])->name('contacts');
        Route::get('users', [App\Http\Controllers\Admin\AdminController::class, 'users'])->name('users');
        Route::get('promotional-emails', [App\Http\Controllers\Admin\AdminController::class, 'promotionalEmails'])->name('promotional-emails');
        Route::get('settings', [App\Http\Controllers\Admin\AdminController::class, 'settings'])->name('settings');
    });
});