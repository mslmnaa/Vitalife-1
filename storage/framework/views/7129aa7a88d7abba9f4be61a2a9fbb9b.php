<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Your Email</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(to right, #0E1036, #355385);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        .container {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            width: 90%;
            max-width: 400px;
            padding: 30px;
        }
        
        h1 {
            color: #0E1036;
            margin-top: 0;
            text-align: center;
            font-size: 24px;
            border-bottom: 2px solid #355385;
            padding-bottom: 10px;
        }
        
        p {
            color: #555;
            font-size: 14px;
            text-align: center;
            margin-bottom: 20px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .success-message {
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            color: #155724;
            padding: 12px;
            border-radius: 4px;
            margin-bottom: 20px;
            font-size: 14px;
            text-align: center;
        }
        
        button {
            background-color: #355385;
            color: white;
            border: none;
            padding: 12px 20px;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            font-weight: 600;
            transition: background-color 0.3s;
            margin-bottom: 10px;
        }
        
        button:hover {
            background-color: #0E1036;
        }
        
        .btn-secondary {
            background-color: transparent;
            color: #355385;
            border: 2px solid #355385;
        }
        
        .btn-secondary:hover {
            background-color: #355385;
            color: white;
        }
        
        .back-link {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #355385;
            text-decoration: none;
            font-size: 14px;
        }
        
        .back-link:hover {
            color: #0E1036;
            text-decoration: underline;
        }
        
        .footer {
            text-align: center;
            color: white;
            font-size: 12px;
            margin-top: 20px;
            position: fixed;
            bottom: 20px;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Verify Your Email</h1>
        <p>Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.</p>
        
        <!-- Success Message (shown when verification link is sent) -->
        <div class="success-message" style="display: none;" id="successMessage">
            A new verification link has been sent to the email address you provided during registration.
        </div>
        
        <form method="POST" action="<?php echo e(route('verification.send')); ?>">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <button type="submit" onclick="showSuccessMessage()">Resend Verification Email</button>
            </div>
        </form>
        
        <form method="POST" action="<?php echo e(route('logout')); ?>">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <button type="submit" class="btn-secondary">Log Out</button>
            </div>
        </form>
        
        <div style="text-align: center; margin-top: 20px; padding-top: 15px; border-top: 1px solid #ddd;">
            <p style="color: #666; font-size: 12px; margin-bottom: 5px;">Having trouble?</p>
            <p style="color: #888; font-size: 12px; margin: 0;">Check your spam folder or contact support if you need help</p>
        </div>
    </div>
    
    <div class="footer">
        &copy; <?php echo e(date('Y')); ?> <?php echo e(config('app.name', 'Vitalife')); ?>. All rights reserved.
    </div>

    <script>
        function showSuccessMessage() {
            document.getElementById('successMessage').style.display = 'block';
        }
        
        // Show success message if session status exists (Laravel)
        <?php if(session('status') == 'verification-link-sent'): ?>
            document.getElementById('successMessage').style.display = 'block';
        <?php endif; ?>
    </script>
</body>
</html><?php /**PATH D:\Coding\Project 4 matklul\Vitalife-1\resources\views/auth/verify-email.blade.php ENDPATH**/ ?>