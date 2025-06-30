<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Vitalife - Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        
        .bg-gradient-custom {
            background: linear-gradient(135deg, #355385 0%, #0E1036 100%);
        }
        
        .glass-effect {
            backdrop-filter: blur(16px);
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .animate-float {
            animation: float 6s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
        }
        
        .animate-pulse-slow {
            animation: pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }
        
        .bg-hero {
            background-image: url('/image/bgspa.jpg');
            background-size: cover;
            background-position: center;
        }
        
        .register-card {
            animation: slideInUp 0.6s ease-out;
        }
        
        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .input-focus {
            transition: all 0.3s ease;
        }
        
        .input-focus:focus {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px -5px rgba(59, 130, 246, 0.25);
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen overflow-hidden">
    <!-- Main Container -->
    <div class="min-h-screen flex">
        
        <!-- Left Column - Hero Section -->
        <div class="hidden lg:flex lg:w-1/2 relative bg-hero bg-cover bg-center">
            <!-- Gradient Overlay -->
            <div class="absolute inset-0 bg-gradient-custom opacity-90"></div>
            
            <!-- Logo -->
            <div class="absolute top-6 left-6 z-20">
                <div class="w-16 h-16 bg-white/20 rounded-2xl flex items-center justify-center glass-effect">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                    </svg>
                </div>
            </div>

            <!-- Floating Elements -->
            <div class="absolute top-20 right-16 w-24 h-24 bg-white/10 rounded-full animate-float"></div>
            <div class="absolute bottom-32 left-16 w-20 h-20 bg-white/10 rounded-full animate-float" style="animation-delay: -2s;"></div>
            <div class="absolute top-1/2 right-8 w-16 h-16 bg-white/10 rounded-full animate-float" style="animation-delay: -4s;"></div>
            
            <!-- Hero Content -->
            <div class="relative z-20 flex flex-col justify-center px-12 text-white">
                <div class="max-w-md">
                    <h1 class="text-4xl font-bold mb-6 leading-tight">
                        Welcome too <span class="text-blue-300">Vitalife!</span>
                    </h1>
                    <p class="text-lg mb-8 opacity-90 leading-relaxed">
                        Join our community of healthy travellers. Create your account and start your wellness journey with us today.
                    </p>
                    
                    <!-- Features -->
                    <div class="space-y-4">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 bg-blue-400/30 rounded-full flex items-center justify-center">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <span class="text-sm opacity-80">Free account creation</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 bg-blue-400/30 rounded-full flex items-center justify-center">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <span class="text-sm opacity-80">Access to wellness community</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 bg-blue-400/30 rounded-full flex items-center justify-center">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <span class="text-sm opacity-80">Personalized health tracking</span>
                        </div>
                    </div>

                    <!-- Already have account button -->
                    <div class="mt-12">
                        <p class="text-sm opacity-80 mb-4">Already have an account?</p>
                        <button class="group inline-flex items-center gap-2 border-2 border-white/30 text-white py-3 px-6 rounded-xl hover:bg-white hover:text-blue-800 transition-all duration-300 font-medium backdrop-blur-sm bg-white/10">
                            <span>SIGN IN</span>
                            <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column - Registration Form -->
        <div class="w-full lg:w-1/2 flex items-center justify-center p-6 lg:p-12 bg-white relative overflow-y-auto">
            <!-- Mobile Header for Logo -->
            <div class="lg:hidden absolute top-6 left-6">
                <div class="w-12 h-12 bg-gradient-custom rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                    </svg>
                </div>
            </div>
            
            <div class="w-full max-w-md register-card">
                <!-- Header -->
                <div class="text-center mb-8">
                    <div class="w-10 h-10 bg-gradient-custom rounded-2xl mx-auto mb-6 flex items-center justify-center shadow-lg">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3M7 5a4 4 0 108 0M7 5V3a2 2 0 012-2h4a2 2 0 012 2v2M7 5H5a2 2 0 00-2 2v2m0 0v8a2 2 0 002 2h14a2 2 0 002-2v-8m0 0V7a2 2 0 00-2-2h-2"/>
                        </svg>
                    </div>
                    <h1 class="text-3xl font-bold text-gray-800 mb-2">Create Account</h1>
                    <p class="text-gray-600">Join our healthy community</p>
                </div>

                <!-- Registration Form -->
               <form id="registerForm" method="POST" action="{{ route('register') }}" class="space-y-6">
    @csrf

                    <!-- Name Field -->
                    <div>
                        <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Full Name</label>
                        <input 
                            type="text" 
                            id="name" 
                            name="name" 
                            required 
                            class="input-focus w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 text-gray-900 placeholder-gray-500"
                            placeholder="Enter your full name"
                        >
                    </div>

                    <!-- Email Field -->
                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Email Address</label>
                        <input 
                            type="email" 
                            id="email" 
                            name="email" 
                            required 
                            class="input-focus w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 text-gray-900 placeholder-gray-500"
                            placeholder="Enter your email"
                        >
                    </div>

                   

                    <!-- Password Fields -->
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                        <div class="relative">
                            <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">Password</label>
                            <input 
                                type="password" 
                                id="password" 
                                name="password" 
                                required 
                                class="input-focus w-full px-4 py-3 pr-12 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 text-gray-900 placeholder-gray-500"
                                placeholder="Enter password"
                            >
                            <button type="button" onclick="togglePassword('password')" class="absolute right-4 top-10 text-gray-500 hover:text-gray-700 transition-colors">
                                <svg id="eyeIcon-password" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                            </button>
                        </div>
                        
                        <div class="relative">
                            <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 mb-2">Confirm Password</label>
                            <input 
                                type="password" 
                                id="password_confirmation" 
                                name="password_confirmation" 
                                required 
                                class="input-focus w-full px-4 py-3 pr-12 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 text-gray-900 placeholder-gray-500"
                                placeholder="Repeat password"
                            >
                            <button type="button" onclick="togglePassword('password_confirmation')" class="absolute right-4 top-10 text-gray-500 hover:text-gray-700 transition-colors">
                                <svg id="eyeIcon-password_confirmation" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Terms and Conditions -->
                    <div class="flex items-center">
                        <input 
                            type="checkbox" 
                            id="terms" 
                            name="terms" 
                            required 
                            class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500 focus:ring-2"
                        >
                        <label for="terms" class="ml-2 text-sm text-gray-600">
                            I agree to the <a href="#" class="text-blue-600 hover:text-blue-800 font-medium hover:underline">Terms & Conditions</a> and <a href="#" class="text-blue-600 hover:text-blue-800 font-medium hover:underline">Privacy Policy</a>
                        </label>
                    </div>

                    <!-- Register Button -->
                    <button 
                        type="submit" 
                        class="w-full bg-gradient-custom text-white py-3 px-4 rounded-xl font-semibold hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-300 transform hover:scale-[1.02] active:scale-[0.98] shadow-lg"
                    >
                        Create Account
                    </button>

                    <!-- Divider -->
                    <div class="relative my-6">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-300"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-4 bg-white text-gray-500">or register with</span>
                        </div>
                    </div>

                    <!-- Social Register -->
                                        <div class="grid grid-cols-2 gap-4">
                        <a href="{{ url('auth/google') }}" class="flex items-center justify-center gap-2 py-3 px-4 border border-gray-300 rounded-xl hover:bg-gray-50 transition-colors group">
                            <svg class="w-5 h-5 text-red-500" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M21.35 11.1h-9.17v2.73h6.51c-.33 3.81-3.5 5.44-6.5 5.44C8.36 19.27 5 16.25 5 12c0-4.1 3.2-7.27 7.2-7.27 3.09 0 4.9 1.97 4.9 1.97L19 4.72S16.56 2 12.1 2C6.42 2 2.03 6.8 2.03 12c0 5.05 4.13 10 10.22 10 5.35 0 9.25-3.67 9.25-9.09 0-1.15-.15-1.81-.15-1.81z"/>
                            </svg>
                            <span class="text-sm font-medium text-gray-700">Google</span>
                        </a>
                        
                        <a href="{{ url('auth/facebook') }}" class="flex items-center justify-center gap-2 py-3 px-4 border border-gray-300 rounded-xl hover:bg-gray-50 transition-colors group">
                            <svg class="w-5 h-5 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20 3H4a1 1 0 0 0-1 1v16a1 1 0 0 0 1 1h8.62v-6.95h-2.35v-2.73h2.35v-2a3.28 3.28 0 0 1 3.52-3.59c.7 0 1.43.04 2 .12v2.32h-1.38c-1.08 0-1.29.52-1.29 1.28v1.87h2.58l-.34 2.73h-2.24V21H20a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1z"/>
                            </svg>
                            <span class="text-sm font-medium text-gray-700">Facebook</span>
                        </a>
                    </div>

                    <!-- Login Link -->
                    <div class="text-center mt-6">
                        <p class="text-sm text-gray-600">
                            Already have an account? 
                            <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-800 font-semibold hover:underline">Sign in here</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function togglePassword(fieldId) {
            const passwordInput = document.getElementById(fieldId);
            const eyeIcon = document.getElementById(eyeIcon-${fieldId});
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L6.5 6.5m3.378 3.378a3 3 0 014.243 4.243M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3l18 18"/>
                `;
            } else {
                passwordInput.type = 'password';
                eyeIcon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                `;
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('registerForm');
            
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Get form data
                const name = form.querySelector('#name').value;
                const email = form.querySelector('#email').value;
                const role = form.querySelector('#role').value;
                const password = form.querySelector('#password').value;
                const passwordConfirmation = form.querySelector('#password_confirmation').value;
                const terms = form.querySelector('#terms').checked;
                
                // Validate form
                if (!name || !email || !password || !passwordConfirmation || !terms) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Please fill in all required fields and agree to the terms & conditions!',
                        confirmButtonColor: '#355385'
                    });
                    return;
                }
                
                if (password !== passwordConfirmation) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Password Mismatch',
                        text: 'Password confirmation does not match the entered password!',
                        confirmButtonColor: '#355385'
                    });
                    return;
                }
                
                if (password.length < 6) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Password Too Short',
                        text: 'Password must be at least 6 characters long!',
                        confirmButtonColor: '#355385'
                    });
                    return;
                }
                
                // Add loading state
                const submitButton = form.querySelector('button[type="submit"]');
                const originalButtonText = submitButton.innerHTML;
                submitButton.disabled = true;
                submitButton.innerHTML = `
                    <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Creating Account...
                `;
                
                // Simulate API call
                setTimeout(() => {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: Welcome ${name}! Your account has been created successfully.,
                        confirmButtonColor: '#355385'
                    }).then(() => {
                        // Reset form or redirect
                        form.reset();
                        submitButton.disabled = false;
                        submitButton.innerHTML = originalButtonText;
                        // window.location.href = '/login';
                    });
                }, 2000);
            });

            // Add focus animations to inputs
            const inputs = document.querySelectorAll('input, select');
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.classList.add('transform', 'scale-[1.02]');
                });
                
                input.addEventListener('blur', function() {
                    this.parentElement.classList.remove('transform', 'scale-[1.02]');
                });
            });
        });
    </script>
</body>
</html>