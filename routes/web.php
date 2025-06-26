<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ChatBotController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\ProductImageController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\LocationController;

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

Route::get('/gallery', [App\Http\Controllers\GalleryController::class, 'index'])->name('gallery');

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
Route::get('/contact', [ContactController::class, 'index'])->name('contact');

Route::post('/contact', [ContactController::class, 'contact'])->name('contact.store');

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
| MAD Mr Bert Routes
|--------------------------------------------------------------------------
*/
Route::get('/mad-mr-bert', function() {
    return view('mad-mr-bert');
});

Route::get('/mad-mr-bert/aircraft-catalog', function () {
    return view('mad-mr-bert.aircraft-catalog');
});

Route::get('/mad-mr-bert/tanarg-neo', function () {
    return view('mad-mr-bert.tanarg-neo');
});

Route::get('/mad-mr-bert/skypper-evo', function () {
    return view('mad-mr-bert.skypper-evo');
});

Route::get('/mad-mr-bert/skypper-bushan', function () {
    return view('mad-mr-bert.skypper-bushan');
})->name('mad-mr-bert.skypper-bushan');

Route::get('/mad-mr-bert/pixel-ultralight', function () {
    return view('mad-mr-bert.pixel-ultralight');
})->name('mad-mr-bert.pixel-ultralight');

Route::get('/mad-mr-bert/magazine', function () {
    return view('mad-mr-bert.magazine');
});

// Blog routes
Route::get('/mad-mr-bert/blog', [App\Http\Controllers\BlogController::class, 'index'])->name('mad-mr-bert.blog');
Route::get('/mad-mr-bert/blog/{slug}/preview', [App\Http\Controllers\BlogController::class, 'preview'])->name('mad-mr-bert.blog.preview');
Route::get('/mad-mr-bert/blog/{slug}', [App\Http\Controllers\BlogController::class, 'show'])->name('mad-mr-bert.blog.show')->middleware('auth');

Route::get('/mad-mr-bert/podcast', function () {
    return view('mad-mr-bert.podcast');
});

Route::get('/mad-mr-bert/thaichi', function () {
    return view('mad-mr-bert.thaichi');
});

Route::get('/mad-mr-bert/merchandise', function () {
    return view('mad-mr-bert.merchandise');
});

Route::get('/mad-mr-bert/microavionics', function () {
    return view('mad-mr-bert.microavionics');
});

Route::prefix('mad-mr-bert')->group(function() {
    // Merchandise page
    Route::get('/merchandise', function() {
        return view('mad-mr-bert.merchandise');
    })->name('mad-mr-bert.merchandise');
    
    // Cart Routes
    Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('mad-mr-bert.add-to-cart');
    Route::get('/cart', [CartController::class, 'viewCart'])->name('mad-mr-bert.cart');
    Route::post('/update-cart', [CartController::class, 'updateCart'])->name('mad-mr-bert.update-cart');
    Route::delete('/remove-item', [CartController::class, 'removeItem'])->name('mad-mr-bert.remove-item');
    
    // Checkout Routes
    Route::get('/checkout', [CartController::class, 'checkout'])->name('mad-mr-bert.checkout');
    Route::post('/process-order', [CartController::class, 'processOrder'])->name('mad-mr-bert.process-order');
    Route::get('/order-confirmation', [CartController::class, 'orderConfirmation'])->name('mad-mr-bert.order-confirmation');
    
    // Cart API Routes for AJAX
    Route::middleware('web')->prefix('api')->group(function () {
        Route::get('/cart-count', [CartController::class, 'getCartCount'])->name('mad-mr-bert.cart-count');
    });

    // PayPal routes
    Route::get('/paypal/success', [CartController::class, 'paypalSuccess'])->name('mad-mr-bert.paypal.success');
    Route::get('/paypal/cancel', [CartController::class, 'paypalCancel'])->name('mad-mr-bert.paypal.cancel');
});

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

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
Route::prefix(env('ADMIN_PATH', 'dashboard-93jf8K2o'))->name('admin.')->middleware('web')->group(function () {
    // Guest routes (no auth required)
    Route::middleware('guest')->group(function () {
        Route::get('login', [App\Http\Controllers\Admin\AuthController::class, 'showLoginForm'])->name('login');
        Route::post('login', [App\Http\Controllers\Admin\AuthController::class, 'login'])
            ->middleware('throttle:5,1');
    });
    
    // Protected admin routes
    Route::middleware('auth:admin')->group(function () {
        Route::post('logout', [App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('logout');
        Route::get('dashboard', [App\Http\Controllers\Admin\AdminController::class, 'dashboard'])->name('dashboard');
        
        // Bookings routes
        Route::prefix('bookings')->name('bookings.')->group(function () {
            Route::get('/', [App\Http\Controllers\Admin\AdminBookingController::class, 'index'])->name('index');
            Route::get('/export', [App\Http\Controllers\Admin\AdminBookingController::class, 'export'])->name('export');
            Route::get('/filter/{filter?}', [App\Http\Controllers\Admin\AdminBookingController::class, 'index'])->name('filter');
            Route::get('/{id}', [App\Http\Controllers\Admin\AdminBookingController::class, 'show'])->name('show')->where('id', '[0-9]+');
            Route::patch('/{booking}/status', [App\Http\Controllers\Admin\AdminBookingController::class, 'updateStatus'])->name('update-status');
            Route::patch('/{booking}/postpone', [App\Http\Controllers\Admin\AdminBookingController::class, 'postponeBooking'])->name('postpone');
            Route::delete('/{id}', [App\Http\Controllers\Admin\AdminBookingController::class, 'destroy'])->name('destroy');
        });
        
        // Settings routes
        Route::prefix('settings')->name('settings.')->group(function () {
            Route::get('/', [App\Http\Controllers\Admin\SettingsController::class, 'index'])->name('index');
            Route::post('/', [App\Http\Controllers\Admin\SettingsController::class, 'update'])->name('update');
        });

        // Gallery Management Routes
        Route::prefix('gallery')->name('gallery.')->group(function () {
            Route::get('/', [GalleryController::class, 'index'])->name('index');
            Route::get('/create', [GalleryController::class, 'create'])->name('create');
            Route::post('/', [GalleryController::class, 'store'])->name('store');
            Route::get('/{image}/edit', [GalleryController::class, 'edit'])->name('edit');
            Route::put('/{image}', [GalleryController::class, 'update'])->name('update');
            Route::delete('/{image}', [GalleryController::class, 'destroy'])->name('destroy');
            Route::post('/update-order', [GalleryController::class, 'updateOrder'])->name('update-order');
            
            // Category Routes
            Route::get('/categories', [GalleryController::class, 'categories'])->name('categories');
            Route::post('/categories', [GalleryController::class, 'storeCategory'])->name('categories.store');
            Route::put('/categories/{category}', [GalleryController::class, 'updateCategory'])->name('categories.update');
            Route::delete('/categories/{category}', [GalleryController::class, 'destroyCategory'])->name('categories.destroy');
        });
        
        // Product Image Management Routes
        Route::prefix('products')->name('products.')->group(function () {
            // Main product CRUD routes
            Route::get('/', [App\Http\Controllers\Admin\ProductController::class, 'index'])->name('index');
            Route::get('/create', [App\Http\Controllers\Admin\ProductController::class, 'create'])->name('create');
            Route::post('/', [App\Http\Controllers\Admin\ProductController::class, 'store'])->name('store');
            
            // Special product type routes - must be before /{id} routes
            Route::get('/hang-glider', [App\Http\Controllers\Admin\AdminController::class, 'hangGliderProducts'])->name('hang-glider');
            Route::get('/merchandise', [App\Http\Controllers\Admin\AdminController::class, 'merchandiseProducts'])->name('merchandise');
            
            Route::get('/{id}', [App\Http\Controllers\Admin\ProductController::class, 'show'])->name('show');
            Route::get('/{id}/edit', [App\Http\Controllers\Admin\ProductController::class, 'edit'])->name('edit');
            Route::put('/{id}', [App\Http\Controllers\Admin\ProductController::class, 'update'])->name('update');
            Route::delete('/{id}', [App\Http\Controllers\Admin\ProductController::class, 'destroy'])->name('destroy');
            Route::patch('/{id}/stock', [App\Http\Controllers\Admin\ProductController::class, 'updateStock'])->name('update-stock');
            Route::patch('/{id}/toggle-featured', [App\Http\Controllers\Admin\ProductController::class, 'toggleFeatured'])->name('toggle-featured');

            // Product image routes
            Route::get('/{productId}/images', [ProductImageController::class, 'index'])->name('images.index');
            Route::get('/{productId}/images/create', [ProductImageController::class, 'create'])->name('images.create');
            Route::post('/{productId}/images', [ProductImageController::class, 'store'])->name('images.store');
            Route::get('/{productId}/images/{imageId}/edit', [ProductImageController::class, 'edit'])->name('images.edit');
            Route::put('/{productId}/images/{imageId}', [ProductImageController::class, 'update'])->name('images.update');
            Route::delete('/{productId}/images/{imageId}', [ProductImageController::class, 'destroy'])->name('images.destroy');
            Route::post('/{productId}/images/{imageId}/primary', [ProductImageController::class, 'setPrimary'])->name('images.set-primary');
            Route::post('/{productId}/images/reorder', [ProductImageController::class, 'reorder'])->name('images.reorder');
        });
        
        // Contact Management Routes
        Route::prefix('contacts')->name('contacts.')->group(function () {
            Route::get('/', [App\Http\Controllers\Admin\AdminContactController::class, 'index'])->name('index');
            Route::get('/{contact}', [App\Http\Controllers\Admin\AdminContactController::class, 'show'])->name('show');
            Route::put('/{contact}/status', [App\Http\Controllers\Admin\AdminContactController::class, 'updateStatus'])->name('update-status');
            Route::delete('/{contact}', [App\Http\Controllers\Admin\AdminContactController::class, 'destroy'])->name('destroy');
            Route::get('/export/csv', [App\Http\Controllers\Admin\AdminContactController::class, 'export'])->name('export');
        });
        
        // Promotional Emails Routes
        Route::prefix('promotional-emails')->name('promotional-emails.')->group(function () {
            Route::get('/', [App\Http\Controllers\Admin\AdminPromotionalEmailController::class, 'index'])->name('index');
            Route::get('/create', [App\Http\Controllers\Admin\AdminPromotionalEmailController::class, 'create'])->name('create');
            Route::post('/', [App\Http\Controllers\Admin\AdminPromotionalEmailController::class, 'store'])->name('store');
            Route::get('/{promotionalEmail}', [App\Http\Controllers\Admin\AdminPromotionalEmailController::class, 'show'])->name('show');
            Route::get('/{promotionalEmail}/edit', [App\Http\Controllers\Admin\AdminPromotionalEmailController::class, 'edit'])->name('edit');
            Route::put('/{promotionalEmail}', [App\Http\Controllers\Admin\AdminPromotionalEmailController::class, 'update'])->name('update');
            Route::delete('/{promotionalEmail}', [App\Http\Controllers\Admin\AdminPromotionalEmailController::class, 'destroy'])->name('destroy');
            Route::post('/{promotionalEmail}/send-test', [App\Http\Controllers\Admin\AdminPromotionalEmailController::class, 'sendTest'])->name('send-test');
            Route::post('/{promotionalEmail}/send', [App\Http\Controllers\Admin\AdminPromotionalEmailController::class, 'send'])->name('send');
        });
        
        // Reviews Management Routes
        Route::prefix('reviews')->name('reviews.')->group(function () {
            Route::get('/', [App\Http\Controllers\Admin\AdminReviewController::class, 'index'])->name('index');
            Route::get('/{review}', [App\Http\Controllers\Admin\AdminReviewController::class, 'show'])->name('show');
            Route::put('/{review}/status', [App\Http\Controllers\Admin\AdminReviewController::class, 'updateStatus'])->name('update-status');
            Route::delete('/{review}', [App\Http\Controllers\Admin\AdminReviewController::class, 'destroy'])->name('destroy');
            Route::get('/export/csv', [App\Http\Controllers\Admin\AdminReviewController::class, 'export'])->name('export');
        });
        
        // Order Management Routes
        Route::prefix('orders')->name('orders.')->group(function () {
            Route::get('/', [App\Http\Controllers\Admin\OrderController::class, 'index'])->name('index');
            Route::get('/{order}', [App\Http\Controllers\Admin\OrderController::class, 'show'])->name('show');
            Route::put('/{order}', [App\Http\Controllers\Admin\OrderController::class, 'update'])->name('update');
            Route::get('/export/csv', [App\Http\Controllers\Admin\OrderController::class, 'export'])->name('export');
        });
        
        // Training Management Routes
        Route::prefix('training')->name('training.')->group(function () {
            Route::get('/beginner', [App\Http\Controllers\Admin\AdminController::class, 'beginnerTraining'])->name('beginner');
            Route::get('/advanced', [App\Http\Controllers\Admin\AdminController::class, 'advancedTraining'])->name('advanced');
            Route::get('/certification', [App\Http\Controllers\Admin\AdminController::class, 'certificationTraining'])->name('certification');
        });

        // Blog Post Management Routes
        Route::prefix('blog-posts')->name('blog-posts.')->group(function () {
            Route::get('/', [App\Http\Controllers\Admin\BlogPostController::class, 'index'])->name('index');
            Route::get('/create', [App\Http\Controllers\Admin\BlogPostController::class, 'create'])->name('create');
            Route::post('/', [App\Http\Controllers\Admin\BlogPostController::class, 'store'])->name('store');
            Route::get('/{blogPost}', [App\Http\Controllers\Admin\BlogPostController::class, 'show'])->name('show');
            Route::get('/{blogPost}/edit', [App\Http\Controllers\Admin\BlogPostController::class, 'edit'])->name('edit');
            Route::put('/{blogPost}', [App\Http\Controllers\Admin\BlogPostController::class, 'update'])->name('update');
            Route::delete('/{blogPost}', [App\Http\Controllers\Admin\BlogPostController::class, 'destroy'])->name('destroy');
            Route::patch('/{blogPost}/toggle-published', [App\Http\Controllers\Admin\BlogPostController::class, 'togglePublished'])->name('toggle-published');
        });
    });
});

/*
|--------------------------------------------------------------------------
| Location API Routes
|--------------------------------------------------------------------------
*/
Route::prefix('api/location')->group(function () {
    Route::get('/countries', [LocationController::class, 'getCountries'])->name('api.location.countries');
    Route::get('/states', [LocationController::class, 'getStates'])->name('api.location.states');
    Route::get('/cities', [LocationController::class, 'getCities'])->name('api.location.cities');
});
