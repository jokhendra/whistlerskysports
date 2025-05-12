<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Booking Cancellation</title>
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
            background-color: #8a2929;
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
            color: #8a2929;
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
            color: #8a2929;
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
            <h1>Your Booking Has Been Cancelled</h1>
        </div>
        
        <div class="content">
            <p>Dear {{ $booking->name }},</p>
            
            <p>We are writing to inform you that your booking with Whistler Sky Sports has been <span class="highlight">cancelled</span>.</p>
            
            @if($booking->cancellation_reason)
            <div class="info-box">
                <div class="info-title">Cancellation Reason:</div>
                <p>{{ $booking->cancellation_reason }}</p>
            </div>
            @endif
            
            <div class="info-box">
                <div class="info-title">Booking Details:</div>
                <p><strong>Booking ID:</strong> #{{ $booking->id }}</p>
                <p><strong>Package:</strong> {{ ucfirst($booking->package) }}</p>
                <p><strong>Flight Type:</strong> {{ $booking->sunrise_flight ? 'Sunrise Flight' : 'Regular Flight' }}</p>
                <p><strong>Original Flight Date:</strong> {{ $booking->preferred_dates->format('F d, Y') }}</p>
                <p><strong>Total Amount:</strong> ${{ number_format($booking->total_amount, 2) }}</p>
            </div>
            
            <div class="info-box">
                <div class="info-title">Next Steps:</div>
                <p>If you have already made a payment for this booking, we will process a refund according to our cancellation policy. The refund process typically takes 5-7 business days, depending on your bank or credit card provider.</p>
                <p>If you would like to reschedule your flight for a future date, please feel free to make a new booking on our website or contact our customer service team.</p>
            </div>
            
            <p>If you have any questions or need further assistance, please don't hesitate to contact us at <a href="mailto:info@whistlerskysports.com">info@whistlerskysports.com</a> or call us at (604) 555-0123.</p>
            
            <p>We hope to have the opportunity to serve you in the future.</p>
            
            <div class="divider"></div>
            
            <p>Regards,</p>
            <p>The Whistler Sky Sports Team</p>
            
            <div class="info-box">
                <div class="info-title">Book Again:</div>
                <p>Ready to reschedule? Book a new flight on our website:</p>
                <p><a href="https://www.whistlerskysports.com/booking" class="button">Book Now</a></p>
            </div>
        </div>
        
        <div class="footer">
            <p>&copy; {{ date('Y') }} Whistler Sky Sports. All rights reserved.</p>
            <p>123 Mountain View Road, Whistler, BC V0N 1B2, Canada</p>
        </div>
    </div>
</body>
</html> 