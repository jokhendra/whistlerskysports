<?php

return [
    'mode' => env('PAYPAL_MODE', 'sandbox'),
    'sandbox' => [
        'client_id' => env('PAYPAL_SANDBOX_CLIENT_ID', 'AVaT3yevGlRue2NdJbdnPQnzxz3Ncc37DCl8DPV7DGr7zbaawluG6XISYmlN_nGe3Zt46mBePA90G1AV'),
        'client_secret' => env('PAYPAL_SANDBOX_CLIENT_SECRET', 'ENUDDE9qP1AHTJhfIk4nxNEwvbGU5ige-F4i34eysQ9JzJx5lL_HAXhG3zrOns-6xaGtJCkXO_ZSZ9bs'),
        'app_id' => 'APP-80W284485P519543T',
    ],
    'live' => [
        'client_id' => env('PAYPAL_LIVE_CLIENT_ID', 'AUaASqHn0ru2esjtgbWdDI6WKMWJ3TN5jXWqr64BBIVi58Ya4GGIHhOn-6qn4JOUdsVQjEzySFIlEkEA'),
        'client_secret' => env('PAYPAL_LIVE_CLIENT_SECRET', 'EF3kwfGlTK6PIlbkVJMr28aYWe26Z7XlijLcXAHYwLl1ia3-QRqPJySAgpkk9MutcRnVYRv46iMSvMOp'),
        // 'app_id' => env('PAYPAL_LIVE_APP_ID', 'APP-80W284485P519543T'),
    ],
    'payment_action' => env('PAYPAL_PAYMENT_ACTION', 'Sale'),
    'currency' => env('PAYPAL_CURRENCY', 'CAD'),
    'notify_url' => env('PAYPAL_NOTIFY_URL', ''),
    'locale' => env('PAYPAL_LOCALE', 'en_US'),
    'validate_ssl' => env('PAYPAL_VALIDATE_SSL', true),
]; 