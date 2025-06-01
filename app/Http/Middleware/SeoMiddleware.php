<?php

namespace App\Http\Middleware;

use App\Services\SeoService;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class SeoMiddleware
{
    protected $seoService;
    
    public function __construct(SeoService $seoService)
    {
        $this->seoService = $seoService;
    }
    
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Default page type is 'home'
        $page = 'home';
        $data = [];
        
        // Determine the current page based on the route
        $routeName = $request->route()->getName();
        
        switch ($routeName) {
            case 'home':
                $page = 'home';
                break;
            case 'contact':
                $page = 'contact';
                break;
            case 'about':
                $page = 'about';
                break;
            case 'gallery':
                $page = 'gallery';
                break;
            case 'booking':
                $page = 'booking';
                break;
            case 'blog.index':
                $page = 'blog';
                break;
            case 'blog.show':
                $page = 'blog.show';
                $data['blog'] = $request->route('blog');
                break;
            case 'products.show':
                $page = 'product';
                $data['product'] = $request->route('product');
                break;
        }
        
        // Generate meta tags and structured data
        $meta = $this->seoService->getMetaTags($page, $data);
        $structuredData = $this->seoService->generateStructuredData($page, $data);
        
        // Share the meta tags and structured data with all views
        View::share('meta', $meta);
        View::share('structuredData', $structuredData);
        
        return $next($request);
    }
} 