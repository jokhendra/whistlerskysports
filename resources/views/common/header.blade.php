<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- SEO Meta Tags -->
    <title>{{ $title ?? 'Whistler Sky Sports - Power Hang Gliding Adventures in British Columbia' }}</title>
    <meta name="description" content="{{ $description ?? 'Experience the thrill of power hang gliding over the stunning Canadian Rockies with Whistler Sky Sports. Book your adventure flight today!' }}">
    <meta name="robots" content="index, follow">
    <meta name="language" content="English">
    <meta name="author" content="Whistler Sky Sports">
    @stack('meta')
    
    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}">
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/apple-touch-icon.png') }}">
    
    <!-- DNS Prefetch & Preconnect -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin>
    
    <!-- CSS and Scripts -->
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <!-- Add fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Montserrat:wght@500;600;700&display=swap" rel="stylesheet">
    
    <style>
        /* body {
            font-family: 'Inter', sans-serif;
            background-image: url("https://npr.brightspotcdn.com/bb/0f/d51269314ac39ea48c89439cd235/jules-marvin-eguilos-xlnl6cwijng-unsplash.jpg");
            height: 100vh;
            background-attachment: fixed; 
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        } */
        
        /* Headings - using Montserrat for strong visual hierarchy */
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Montserrat', sans-serif;
            letter-spacing: -0.02em;
        }
        /* Body text and form elements - using Inter for excellent readability */
        p, label, input, select, textarea {
            font-family: 'Inter', sans-serif;
            font-weight: 400;
        }
        /* Buttons and interactive elements - slightly bolder */
        button, .button {
            font-family: 'Inter', sans-serif;
            font-weight: 500;
        }
        /* Make form labels clear and legible */
        label {
            font-weight: 500;
        }
        /* Main heading style */
        h1 {
            font-weight: 700;
        }
        /* Section headings */
        h2, h3 {
            font-weight: 600;
        }
    </style>
    
    @stack('styles')
</head>