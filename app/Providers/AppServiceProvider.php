<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Setting;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Force HTTPS in production but use HTTP for local development
        if (env('APP_ENV') === 'local' || str_contains(request()->getHost(), 'localhost') || str_contains(request()->getHost(), '127.0.0.1')) {
            URL::forceScheme('http');
        } else {
            URL::forceScheme('https');
        }

        // Set application URL for asset generation in CLI commands
        if (php_sapi_name() === 'cli' && env('APP_ENV') === 'production') {
            config(['app.url' => 'https://whistlerskysports.ca']);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Force HTTPS in production
        // if($this->app->environment('production')) {
        //     \Illuminate\Support\Facades\URL::forceScheme('https');
        // }
        
        // Share settings with all views
        try {
            $settings = Setting::all()->pluck('value', 'key')->toArray();
            View::share('settings', $settings);
        } catch (\Exception $e) {
            // Handle case where database connection is not available
            // or table does not exist (e.g. during migrations)
            View::share('settings', []);
        }
    }
}
