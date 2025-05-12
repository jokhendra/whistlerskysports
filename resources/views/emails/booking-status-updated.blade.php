<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Booking Confirmation</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background-color: #204fb4;
            color: white;
            padding: 20px;
            text-align: center;
        }
        .content {
            padding: 20px;
            background-color: #f9f9f9;
        }
        .info-box {
            background-color: white;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 20px;
            box-shadow: 0 2px 3px rgba(0,0,0,0.1);
        }
        .info-title {
            font-weight: bold;
            margin-bottom: 5px;
            color: #204fb4;
        }
        .footer {
            text-align: center;
            padding: 20px;
            font-size: 12px;
            color: #666;
        }
        .button {
            display: inline-block;
            background-color: #204fb4;
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            margin-top: 20px;
        }
        .highlight {
            font-weight: bold;
            color: #204fb4;
        }
        .divider {
            border-top: 1px solid #ddd;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Your Booking is Confirmed!</h1>
        </div>
        
        <div class="content">
            <p>Dear {{ $booking->name }},</p>
            
            <p>Great news! Your booking with Whistler Sky Sports has been <span class="highlight">confirmed</span>. We're excited to have you join us for an unforgettable flying experience.</p>
            
            <div class="info-box">
                <div class="info-title">Booking Details:</div>
                <p><strong>Booking ID:</strong> #{{ $booking->id }}</p>
                <p><strong>Package:</strong> {{ ucfirst($booking->package) }}</p>
                <p><strong>Flight Type:</strong> {{ $booking->sunrise_flight ? 'Sunrise Flight' : 'Regular Flight' }}</p>
                <p><strong>Flight Date and Time:</strong> {{ \Carbon\Carbon::parse($booking->flying_time)->format('F d, Y \a\t h:i A') }}</p>
                <p><strong>Total Amount:</strong> ${{ number_format($booking->total_amount, 2) }}</p>
            </div>
            
            <div class="info-box">
                <div class="info-title">Add-ons:</div>
                <ul>
                    @if($booking->video_package)
                    <li>Video Package</li>
                    @endif
                    @if($booking->deluxe_package)
                    <li>Deluxe Package</li>
                    @endif
                    @if($booking->merch_package)
                    <li>Merchandise Package</li>
                    @endif
                </ul>
            </div>
            
            <div class="info-box">
                <div class="info-title">What to Bring:</div>
                <ul>
                    <li>Comfortable clothing appropriate for the weather</li>
                    <li>Sunglasses and sunscreen</li>
                    <li>Camera (if not included in your package)</li>
                    <li>A copy of this confirmation (digital is fine)</li>
                    <li>A sense of adventure!</li>
                </ul>
            </div>
            
            <div class="info-box">
                <div class="info-title">Meeting Location:</div>
                <p>Please arrive at our Whistler Sky Sports facility at least 30 minutes before your scheduled flight time:</p>
                <p>123 Mountain View Road<br>Whistler, BC V0N 1B2<br>Canada</p>
            </div>
            
            <p>If you have any questions or need to make any changes to your booking, please don't hesitate to contact us at <a href="mailto:info@whistlerskysports.com">info@whistlerskysports.com</a> or call us at (604) 555-0123.</p>
            
            <p>We're looking forward to providing you with an amazing experience in the skies!</p>
            
            <div class="divider"></div>
            
            <p>Warm regards,</p>
            <p>The Whistler Sky Sports Team</p>
        </div>
        
        <div class="footer">
            <p>&copy; {{ date('Y') }} Whistler Sky Sports. All rights reserved.</p>
            <p>123 Mountain View Road, Whistler, BC V0N 1B2, Canada</p>
        </div>
    </div>
</body>
</html> 