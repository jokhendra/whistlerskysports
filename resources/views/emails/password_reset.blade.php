<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reset your password</title>
  </head>
  <body style="font-family: system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif; color:#111827;">
    <div style="max-width:600px;margin:0 auto;padding:24px;">
      <h2 style="font-size:20px;margin-bottom:8px;">Hi {{ $userName }},</h2>
      <p style="color:#6b7280;">We received a request to reset your password. Click the button below to set a new password.</p>

      <div style="margin:24px 0; text-align:center;">
        <a href="{{ $resetUrl }}" style="background:#2563eb;color:white;padding:10px 18px;border-radius:6px;text-decoration:none;display:inline-block;">Reset Password</a>
      </div>

      <p style="color:#6b7280;font-size:13px;">If the button doesn't work, copy and paste the following URL into your browser:</p>
      <p style="word-break:break-all;color:#6b7280;font-size:13px;">{{ $resetUrl }}</p>

      <p style="color:#6b7280;font-size:13px;">If you did not request a password reset, you can safely ignore this email.</p>

      <p style="color:#6b7280;font-size:13px;">Thanks,<br/>Whistler Sky Sports</p>
    </div>
  </body>
</html>
