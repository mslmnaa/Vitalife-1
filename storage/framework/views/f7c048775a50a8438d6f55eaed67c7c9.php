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
    <div class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-purple-50">
        <div class="grid lg:grid-cols-2 min-h-screen">
            <!-- Left Column - Welcome Section -->
            <div class="relative flex flex-col justify-center items-center px-6 lg:px-12 text-white min-h-screen bg-gradient-to-br from-blue-600 via-purple-600 to-pink-500 order-2 lg:order-1">
                <!-- Background Pattern -->
                <div class="absolute inset-0 opacity-10">
                    <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.4"%3E%3Cpath d="M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
                </div>
                
                <!-- Logo -->
                <div class="absolute top-6 left-6 lg:top-8 lg:left-8 z-20">
                    <img src="../image/LOGO_1.png" alt="Logo" class="w-20 h-auto lg:w-28">
                </div>
                
                <!-- Welcome Content -->
                <div class="relative z-20 text-center lg:text-left max-w-md">
                    <div class="mb-8">
                        <h2 class="text-3xl lg:text-4xl font-bold mb-4 leading-tight">Welcome Back!</h2>
                        <p class="text-lg opacity-90 leading-relaxed">Already have an account? Sign in to continue your journey with us</p>
                    </div>
                    
                    <a href="<?php echo e(route('login')); ?>"
                        class="inline-flex items-center justify-center px-8 py-3 border-2 border-white text-white rounded-full hover:bg-white hover:text-purple-600 transition-all duration-300 font-semibold text-lg shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                        <i class="fas fa-sign-in-alt mr-2"></i>
                        SIGN IN
                    </a>
                </div>
                
                <!-- Decorative Elements -->
                <div class="absolute bottom-8 right-8 opacity-20">
                    <div class="w-32 h-32 border border-white rounded-full"></div>
                    <div class="w-20 h-20 bg-white bg-opacity-20 rounded-full -mt-20 ml-12"></div>
                </div>
            </div>

            <!-- Right Column - Registration Form -->
            <div class="flex flex-col justify-center items-center p-6 lg:p-12 bg-white order-1 lg:order-2">
                <div class="w-full max-w-md">
                    <!-- Header -->
                    <div class="text-center mb-8">
                        <h2 class="text-3xl lg:text-4xl font-bold mb-3 bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">Create Account</h2>
                        <p class="text-gray-600">Join us today and start your journey</p>
                    </div>

                    <!-- Social Media Login -->
                    <div class="flex justify-center space-x-4 mb-8">
                        <a href="<?php echo e(url('auth/google')); ?>" 
                           class="flex items-center justify-center w-12 h-12 bg-red-50 hover:bg-red-100 text-red-500 rounded-full transition-all duration-200 hover:shadow-lg hover:-translate-y-1"
                           title="Continue with Google">
                            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12.24 10.285V14.4h6.806c-.275 1.765-2.056 5.174-6.806 5.174-4.095 0-7.439-3.389-7.439-7.574s3.345-7.574 7.439-7.574c2.33 0 3.891.989 4.785 1.849l3.254-3.138C18.189 1.186 15.479 0 12.24 0c-6.635 0-12 5.365-12 12s5.365 12 12 12c6.926 0 11.52-4.869 11.52-11.726 0-.788-.085-1.39-.189-1.989H12.24z" />
                            </svg>
                        </a>
                        
                        <a href="<?php echo e(url('auth/facebook')); ?>" 
                           class="flex items-center justify-center w-12 h-12 bg-blue-50 hover:bg-blue-100 text-blue-600 rounded-full transition-all duration-200 hover:shadow-lg hover:-translate-y-1"
                           title="Continue with Facebook">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                            </svg>
                        </a>
                    </div>

                    <!-- Divider -->
                    <div class="relative mb-8">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-200"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-4 bg-white text-gray-500">or register with email</span>
                        </div>
                    </div>

                    <!-- Registration Form -->
                    <form method="POST" action="<?php echo e(route('register')); ?>" class="space-y-6">
                        <?php echo csrf_field(); ?>

                        <!-- Name -->
                        <div class="space-y-2">
                            <label for="name" class="block text-sm font-semibold text-gray-700">Full Name</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-user text-gray-400"></i>
                                </div>
                                <input id="name" 
                                       type="text" 
                                       name="name" 
                                       value="<?php echo e(old('name')); ?>" 
                                       required 
                                       autofocus 
                                       autocomplete="name"
                                       class="block w-full pl-10 pr-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-200 bg-gray-50 focus:bg-white"
                                       placeholder="Enter your full name">
                            </div>
                            <?php if($errors->get('name')): ?>
                                <p class="text-red-500 text-sm"><?php echo e(implode(', ', $errors->get('name'))); ?></p>
                            <?php endif; ?>
                        </div>

                        <!-- Email Address -->
                        <div class="space-y-2">
                            <label for="email" class="block text-sm font-semibold text-gray-700">Email Address</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-envelope text-gray-400"></i>
                                </div>
                                <input id="email" 
                                       type="email" 
                                       name="email" 
                                       value="<?php echo e(old('email')); ?>" 
                                       required 
                                       autocomplete="username"
                                       class="block w-full pl-10 pr-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-200 bg-gray-50 focus:bg-white"
                                       placeholder="Enter your email">
                            </div>
                            <?php if($errors->get('email')): ?>
                                <p class="text-red-500 text-sm"><?php echo e(implode(', ', $errors->get('email'))); ?></p>
                            <?php endif; ?>
                        </div>

                        <!-- Password -->
                        <div class="space-y-2">
                            <label for="password" class="block text-sm font-semibold text-gray-700">Password</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-lock text-gray-400"></i>
                                </div>
                                <input id="password" 
                                       type="password" 
                                       name="password" 
                                       required 
                                       autocomplete="new-password"
                                       class="block w-full pl-10 pr-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-200 bg-gray-50 focus:bg-white"
                                       placeholder="Create a password">
                            </div>
                            <?php if($errors->get('password')): ?>
                                <p class="text-red-500 text-sm"><?php echo e(implode(', ', $errors->get('password'))); ?></p>
                            <?php endif; ?>
                        </div>

                        <!-- Confirm Password -->
                        <div class="space-y-2">
                            <label for="password_confirmation" class="block text-sm font-semibold text-gray-700">Confirm Password</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-lock text-gray-400"></i>
                                </div>
                                <input id="password_confirmation" 
                                       type="password" 
                                       name="password_confirmation" 
                                       required 
                                       autocomplete="new-password"
                                       class="block w-full pl-10 pr-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-200 bg-gray-50 focus:bg-white"
                                       placeholder="Confirm your password">
                            </div>
                            <?php if($errors->get('password_confirmation')): ?>
                                <p class="text-red-500 text-sm"><?php echo e(implode(', ', $errors->get('password_confirmation'))); ?></p>
                            <?php endif; ?>
                        </div>

                        <!-- Hidden Role Field -->
                        <input type="hidden" name="role" value="user">

                        <!-- Submit Button -->
                        <div class="pt-4">
                            <button type="submit"
                                    class="w-full bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white py-4 px-6 rounded-xl font-semibold text-lg transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-1 focus:outline-none focus:ring-4 focus:ring-purple-300">
                                <i class="fas fa-user-plus mr-2"></i>
                                Create Account
                            </button>
                        </div>

                        <!-- Sign In Link -->
                        <div class="text-center pt-4">
                            <p class="text-gray-600">
                                Already have an account? 
                                <a href="<?php echo e(route('login')); ?>" class="text-purple-600 hover:text-purple-700 font-semibold hover:underline transition-colors duration-200">
                                    Sign in here
                                </a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form[action="<?php echo e(route('register')); ?>"]');
            
            if (form) {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    console.log('Form submission intercepted');
                    
                    // Add a loading state
                    const submitButton = form.querySelector('button[type="submit"]');
                    const originalButtonText = submitButton.innerHTML;
                    submitButton.disabled = true;
                    submitButton.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Creating Account...';
                    
                    const formData = new FormData(form);
                    
                    // Debug what data we're sending
                    for (let pair of formData.entries()) {
                        console.log(pair[0] + ': ' + pair[1]);
                    }
                    
                    fetch('<?php echo e(route('register')); ?>', {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'Accept': 'application/json',
                        },
                        credentials: 'same-origin'
                    })
                    .then(response => {
                        console.log('Response status:', response.status);
                        return response.json().catch(error => {
                            console.error('JSON parse error:', error);
                            throw new Error('Invalid response format from server');
                        });
                    })
                    .then(data => {
                        console.log('Response data:', data);
                        
                        if (data.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil!',
                                text: data.message || 'Registration successful!',
                                showConfirmButton: false,
                                timer: 2000
                            }).then(() => {
                                window.location.href = data.redirect || '<?php echo e(route('dashboard')); ?>';
                            });
                        } else {
                            // Handle validation errors
                            let errorMessage = 'Registration failed.';
                            if (data.errors) {
                                const errorsList = [];
                                for (const key in data.errors) {
                                    errorsList.push(...data.errors[key]);
                                }
                                errorMessage = errorsList.join('\n');
                            } else if (data.message) {
                                errorMessage = data.message;
                            }
                            
                            Swal.fire({
                                icon: 'error',
                                title: 'Registration Failed',
                                text: errorMessage,
                            });
                            
                            // Reset button
                            submitButton.disabled = false;
                            submitButton.innerHTML = originalButtonText;
                        }
                    })
                    .catch(error => {
                        console.error('Fetch error:', error);
                        
                        Swal.fire({
                            icon: 'error',
                            title: 'Connection Error',
                            text: 'A connection error occurred. Please try again later.',
                        });
                        
                        // Reset button
                        submitButton.disabled = false;
                        submitButton.innerHTML = originalButtonText;
                    });
                });
            } else {
                console.error('Registration form not found.');
            }
        
            // Handle existing session messages
            <?php if(session('status')): ?>
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: "<?php echo e(session('status')); ?>",
                    showConfirmButton: false,
                    timer: 2000
                });
            <?php endif; ?>
        
            <?php if($errors->any()): ?>
                Swal.fire({
                    icon: 'error',
                    title: 'Registration Failed',
                    text: "<?php echo implode('\n', $errors->all()); ?>",
                });
            <?php endif; ?>
        });
    </script>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal69dc84650370d1d4dc1b42d016d7226b)): ?>
<?php $attributes = $__attributesOriginal69dc84650370d1d4dc1b42d016d7226b; ?>
<?php unset($__attributesOriginal69dc84650370d1d4dc1b42d016d7226b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal69dc84650370d1d4dc1b42d016d7226b)): ?>
<?php $component = $__componentOriginal69dc84650370d1d4dc1b42d016d7226b; ?>
<?php unset($__componentOriginal69dc84650370d1d4dc1b42d016d7226b); ?>
<?php endif; ?><?php /**PATH D:\Coding\Project 4 matklul\Vitalife-1\resources\views/auth/register.blade.php ENDPATH**/ ?>