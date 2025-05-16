<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Thank you for contacting us</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333; max-width: 600px; margin: 0 auto; padding: 20px;">
    <div style="background-color: #f8f8f8; padding: 20px; border-radius: 5px; border-top: 4px solid #F05052;">
        <h1 style="color: #F05052;">Thank You for Contacting Us</h1>
        
        <p>Dear {{ $formData['name'] }},</p>
        
        <p>Thank you for reaching out to Whistler Sky Sports. We have received your message and our team will get back to you as soon as possible.</p>
        
        <div style="background-color: #fff; padding: 15px; border-left: 3px solid #F05052; margin: 20px 0;">
            <p><strong>Your message details:</strong></p>
            <p><strong>Subject:</strong> {{ $formData['subject'] }}</p>
            <p><strong>Message:</strong> {{ $formData['message'] }}</p>
        </div>
        
        <p>If you have any urgent questions, please contact us directly by phone.</p>
        
        <p>Best regards,<br>Whistler Sky Sports Team</p>
    </div>
    
    <div style="text-align: center; margin-top: 20px; font-size: 12px; color: #777;">
        <p>&copy; {{ date('Y') }} Whistler Sky Sports. All rights reserved.</p>
    </div>
</body>
</html> 