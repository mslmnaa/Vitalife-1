<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Vitalife</title>
</head>

<body style="font-family: Arial, sans-serif; background-color: #f9f9f9; padding: 20px; color: #333;">
    <div style="max-width: 600px; margin: 0 auto; background-color: #ffffff; border-radius: 8px; box-shadow: 0 2px 6px rgba(0,0,0,0.05); padding: 30px;">
        <h2 style="color: #2d3748;">Welcome, {{ $user->name }}!</h2>

        <p>Thank you for registering with <strong>Vitalife</strong>. We're excited to have you as part of our community!</p>

        <p>To get started, simply click the button below to access your dashboard:</p>

        <div style="text-align: center; margin: 30px 0;">
            <a href="{{ url('/dashboard') }}"
               style="display: inline-block; background-color: #3182ce; color: #fff; padding: 12px 24px; text-decoration: none; border-radius: 5px; font-weight: bold;">
                Get Started
            </a>
        </div>

        <p>If you have any questions or need assistance, feel free to contact our support team at any time. We're here to help!</p>

        <p>Best regards,<br>
        The Vitalife Team</p>

        <hr style="margin: 30px 0; border: none; border-top: 1px solid #e2e8f0;">
        <p style="font-size: 12px; color: #718096;">
            You are receiving this email because you registered an account at Vitalife. If this wasn't you, please ignore this message.
        </p>
    </div>
</body>

</html>
