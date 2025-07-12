<?php if (isset($component)) { $__componentOriginal69dc84650370d1d4dc1b42d016d7226b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal69dc84650370d1d4dc1b42d016d7226b = $attributes; } ?>
<?php $component = App\View\Components\GuestLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('guest-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\GuestLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(to right, #0E1036, #355385);
            min-height: 100vh;
        }
        
        .container {
            width: 100%;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 20px;
            box-sizing: border-box;
        }
        
        .content-wrapper {
            width: 90%;
            
            max-width: 500px;
        }
        
        .header {
            background: linear-gradient(to right, #0E1036, #355385);
            padding: 30px;
            text-align: center;
            border-radius: 8px;
            margin-bottom: 30px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }
        
        .header-icon {
            width: 64px;
            height: 64px;
            background-color: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
        }
        
        .header h1 {
            color: white;
            margin: 0 0 10px 0;
            font-size: 24px;
            font-weight: 600;
        }
        
        .header p {
            color: rgba(255, 255, 255, 0.8);
            margin: 0;
            font-size: 14px;
        }
        
        .content {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            padding: 30px;
        }
        
        .message-section {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .message-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, rgba(14, 16, 54, 0.1), rgba(53, 83, 133, 0.1));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
        }
        
        .message-text {
            color: #555;
            font-size: 14px;
            line-height: 1.6;
            margin: 0;
        }
        
        .success-message {
            background-color: #f0f9ff;
            border: 2px solid #355385;
            border-radius: 4px;
            padding: 15px;
            margin-bottom: 25px;
            display: flex;
            align-items: flex-start;
        }
        
        .success-message p {
            color: #0E1036;
            font-size: 14px;
            margin: 0;
            margin-left: 12px;
            font-weight: 500;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .btn-primary {
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
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .btn-primary:hover {
            background-color: #0E1036;
        }
        
        .btn-secondary {
            background-color: #f8f9fa;
            color: #0E1036;
            border: 2px solid #355385;
            padding: 12px 20px;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            font-weight: 600;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .btn-secondary:hover {
            background-color: #355385;
            color: white;
        }
        
        .btn-icon {
            margin-right: 8px;
            width: 20px;
            height: 20px;
        }
        
        .help-section {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 2px solid #355385;
            text-align: center;
        }
        
        .help-text {
            color: #555;
            font-size: 14px;
            margin-bottom: 10px;
        }
        
        .help-info {
            color: #888;
            font-size: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .help-icon {
            width: 16px;
            height: 16px;
            margin-right: 5px;
        }
        
        .footer {
            text-align: center;
            color: white;
            font-size: 12px;
            margin-top: 30px;
        }
    </style>
    
    <div class="container">
        <div class="content-wrapper">
            <!-- Header with gradient background -->
            <div class="header">
                <div class="header-icon">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h1><?php echo e(__('Verify Your Email')); ?></h1>
                <p><?php echo e(__('We\'re almost there!')); ?></p>
            </div>

            <!-- Content -->
            <div class="content">
                <!-- Main Message -->
                <div class="message-section">
                    <div class="message-icon">
                        <svg class="w-10 h-10" style="color: #355385;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                        </svg>
                    </div>
                    <p class="message-text">
                        <?php echo e(__('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.')); ?>

                    </p>
                </div>

                <!-- Success Message -->
                <?php if(session('status') == 'verification-link-sent'): ?>
                    <div class="success-message">
                        <svg class="w-5 h-5" style="color: #355385; margin-top: 2px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <p><?php echo e(__('A new verification link has been sent to the email address you provided during registration.')); ?></p>
                    </div>
                <?php endif; ?>

                <!-- Action Buttons -->
                <div class="form-group">
                    <!-- Resend Button -->
                    <form method="POST" action="<?php echo e(route('verification.send')); ?>">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="btn-primary">
                            <svg class="btn-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                            </svg>
                            <?php echo e(__('Resend Verification Email')); ?>

                        </button>
                    </form>
                </div>

                <div class="form-group">
                    <!-- Logout Button -->
                    <form method="POST" action="<?php echo e(route('logout')); ?>">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="btn-secondary">
                            <svg class="btn-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                            </svg>
                            <?php echo e(__('Log Out')); ?>

                        </button>
                    </form>
                </div>

                <!-- Help Section -->
                <div class="help-section">
                    <p class="help-text"><?php echo e(__('Having trouble?')); ?></p>
                    <div class="help-info">
                        <svg class="help-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span><?php echo e(__('Check your spam folder or contact support if you need help')); ?></span>
                    </div>
                </div>
            </div>
            
            <div class="footer">
                &copy; <?php echo e(date('Y')); ?> <?php echo e(config('app.name', 'Vitalife')); ?>. All rights reserved.
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal69dc84650370d1d4dc1b42d016d7226b)): ?>
<?php $attributes = $__attributesOriginal69dc84650370d1d4dc1b42d016d7226b; ?>
<?php unset($__attributesOriginal69dc84650370d1d4dc1b42d016d7226b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal69dc84650370d1d4dc1b42d016d7226b)): ?>
<?php $component = $__componentOriginal69dc84650370d1d4dc1b42d016d7226b; ?>
<?php unset($__componentOriginal69dc84650370d1d4dc1b42d016d7226b); ?>
<?php endif; ?><?php /**PATH D:\Coding\Project 4 matklul\Vitalife-1\resources\views/auth/verify-email.blade.php ENDPATH**/ ?>