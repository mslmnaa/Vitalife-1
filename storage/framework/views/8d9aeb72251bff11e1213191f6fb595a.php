<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password</title>
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
        
        label {
            display: block;
            margin-bottom: 5px;
            color: #0E1036;
            font-weight: 600;
        }
        
        input[type="email"] {
            width: 100%;
            padding: 10px;
            border: 2px solid #355385;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
        }
        
        input[type="email"]:focus {
            outline: none;
            border-color: #0E1036;
            box-shadow: 0 0 5px rgba(53, 83, 133, 0.5);
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
        }
        
        button:hover {
            background-color: #0E1036;
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
        <h1>Forgot Password</h1>
        <p>Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</p>
        
        <form method="POST" action="<?php echo e(route('password.email')); ?>">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="<?php echo e(old('email')); ?>" required autofocus>
                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span style="color: red; font-size: 12px; margin-top: 5px; display: block;"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            
            <button type="submit">Email Password Reset Link</button>
        </form>
        
        <a href="<?php echo e(route('login')); ?>" class="back-link">Back to Login</a>
    </div>
    
    <div class="footer">
        &copy; <?php echo e(date('Y')); ?> <?php echo e(config('app.name', 'Vitalife')); ?>. All rights reserved.
    </div>
</body>
</html><?php /**PATH D:\Coding\Project 4 matklul\Vitalife-1\resources\views/auth/forgot-password.blade.php ENDPATH**/ ?>