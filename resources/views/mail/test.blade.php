<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Email - PLO Group</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333; max-width: 600px; margin: 0 auto; padding: 20px;">
    <div style="background-color: #f8f9fa; padding: 20px; border-radius: 8px; margin-bottom: 20px;">
        <h2 style="color: #2c3e50; margin-top: 0;">Test Email từ PLO Group</h2>
        <p>Đây là email test để kiểm tra cấu hình SMTP.</p>
    </div>
    
    <div style="background-color: #ffffff; padding: 20px; border: 1px solid #e0e0e0; border-radius: 8px;">
        <p><strong>Thời gian:</strong> {{ $timestamp }}</p>
        <p><strong>Mailer được sử dụng:</strong> {{ $mailer }}</p>
        <p><strong>SMTP Host:</strong> {{ config('mail.mailers.' . $mailer . '.host') }}</p>
        <p><strong>SMTP Port:</strong> {{ config('mail.mailers.' . $mailer . '.port') }}</p>
        <p><strong>SMTP Encryption:</strong> {{ config('mail.mailers.' . $mailer . '.encryption') }}</p>
        <p><strong>SMTP Username:</strong> {{ config('mail.mailers.' . $mailer . '.username') }}</p>
    </div>
    
    <hr style="border: none; border-top: 1px solid #e0e0e0; margin: 20px 0;">
    
    <p style="color: #666; font-size: 12px; margin-top: 20px;">
        Nếu bạn nhận được email này, nghĩa là cấu hình SMTP đã hoạt động đúng.
    </p>
</body>
</html>
