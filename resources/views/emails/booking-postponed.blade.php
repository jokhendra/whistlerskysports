<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Booking Rescheduled</title>
    <style>
        body {
            font-family: Arial, sans-serif;
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
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .content {
            padding: 20px;
            background-color: #f9f9f9;
        }
        .details {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            margin: 20px 0;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
        }
        .details h3 {
            margin-top: 0;
            color: #204fb4;
            border-bottom: 1px solid #eee;
            padding-bottom: 10px;
        }
        .details p {
            margin: 5px 0;
        }
        .details .label {
            font-weight: bold;
            display: inline-block;
            width: 150px;
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
            padding: 12px 25px;
            border-radius: 4px;
            margin: 20px 0;
            font-weight: bold;
        }
        .highlighted {
            background-color: #ffffcc;
            padding: 10px;
            border-left: 3px solid #ffcc00;
            margin: 15px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Your Flight Has Been Rescheduled</h1>
        </div>
        
        <div class="content">
            <p>Dear {{ $booking->name }},</p>
            
            <p>We hope this email finds you well. We are writing to inform you that your upcoming flight with Whistler Sky Sports has been rescheduled.</p>
            
            <div class="highlighted">
                <p><strong>Original Flight Date:</strong> {{ $originalDate }}</p>
                <p><strong>New Flight Date:</strong> {{ \Carbon\Carbon::parse($booking->flying_time)->format('F d, Y g:i A') }}</p>
                
                @if($postponementReason)
                <p><strong>Reason for Rescheduling:</strong> {{ $postponementReason }}</p>
                @endif
            </div>
            
            <p>We apologize for any inconvenience this change may cause and appreciate your understanding. If this new date works for you, no further action is needed.</p>
            
            <p>If you need to discuss this further or if the new date doesn't work for you, please contact us at <a href="mailto:support@whistlerskysports.com">support@whistlerskysports.com</a> or call (555) 123-4567 as soon as possible.</p>
            
            <div class="details">
                <h3>Booking Details</h3>
                <p><span class="label">Booking ID:</span> #{{ $booking->id }}</p>
                <p><span class="label">Package:</span> {{ ucfirst($booking->package) }}</p>
                <p><span class="label">Type:</span> {{ $booking->sunrise_flight ? 'Sunrise Flight' : 'Regular Flight' }}</p>
                
                @if($booking->video_package || $booking->deluxe_package || $booking->merch_package)
                <h4>Add-ons:</h4>
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
                @endif
            </div>
            
            <p>Thank you for choosing Whistler Sky Sports. We look forward to providing you with an unforgettable flying experience!</p>
            
            <p>Best regards,<br>
            The Whistler Sky Sports Team</p>
        </div>
        
        <div class="footer">
            <p>Whistler Sky Sports<br>
            123 Mountain Drive, Whistler, BC V0N 1B0<br>
            (555) 123-4567 | <a href="https://www.whistlerskysports.com">www.whistlerskysports.com</a></p>
            
            <p>&copy; {{ date('Y') }} Whistler Sky Sports. All rights reserved.</p>
        </div>
    </div>
</body>
</html> 