<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>You’ve been unsubscribed</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9fafb;
            color: #333;
            padding: 40px;
            text-align: center;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 8px;
            max-width: 500px;
            margin: 0 auto;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }
        a {
            color: #3182ce;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>You've successfully unsubscribed</h2>
        <p>We’re sorry to see you go! You will no longer receive emails from <strong>Vitalife</strong>.</p>

        <p>If this was a mistake, you can <a href="{{ url('/register') }}">resubscribe here</a>.</p>

        <p>Have questions? Contact our team at <a href="mailto:support@vitalife.my.id">support@vitalife.my.id</a>.</p>
    </div>
</body>
</html>
