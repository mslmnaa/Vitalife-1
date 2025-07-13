<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Welcome to Vitalife</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f7;
            margin: 0;
            padding: 0;
        }

        .container {
            background-color: #ffffff;
            max-width: 600px;
            margin: 30px auto;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
        }

        .button {
            background-color: #4299e1;
            color: #ffffff;
            padding: 12px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            display: inline-block;
            margin-top: 20px;
        }

        p {
            font-size: 16px;
            line-height: 1.6;
            color: #333;
        }

        h1 {
            color: #2d3748;
        }

        .footer {
            font-size: 12px;
            color: #888;
            margin-top: 30px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Welcome, {{ $user->name }}!</h1>
        <p>Thank you for joining Vitalife. We're excited to have you on board.</p>
        <p>To get started, click the button below:</p>
        <a href="{{ url('/dashboard') }}" class="button">Get Started</a>
        <p>If you have any questions, feel free to reach out to our support team.</p>
        <div class="footer">
            &copy; {{ date('Y') }} Vitalife. All rights reserved.
        </div>
    </div>
</body>

</html>
