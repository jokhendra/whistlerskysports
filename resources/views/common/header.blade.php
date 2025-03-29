<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="{{ secure_asset('assets/mdi/css/materialdesignicons.min.css') }}" media="all" rel="stylesheet" type="text/css" /> -->
    <title>Document</title>
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
     <!-- Add fonts -->
     <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Montserrat:wght@500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-image: url("https://npr.brightspotcdn.com/bb/0f/d51269314ac39ea48c89439cd235/jules-marvin-eguilos-xlnl6cwijng-unsplash.jpg");
            height: 100vh; /* Full-screen height */
            background-attachment: fixed; /* Keeps background static */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        
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
</head>