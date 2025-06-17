<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo $__env->yieldContent('title', 'Doctor Dashboard'); ?> - <?php echo e(config('app.name', 'VitaLife')); ?></title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <style>
        .sidebar-transition {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .content-shift {
            margin-left: 16rem;
        }
        
        .content-shift.sidebar-collapsed {
            margin-left: 0;
        }
        
        @media (max-width: 768px) {
            .content-shift {
                margin-left: 0;
            }
        }
        
        .notification-badge {
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }
        
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        ::-webkit-scrollbar-thumb {
            background: #6b7280;
            border-radius: 3px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #4b5563;
        }
    </style>
    
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body class="bg-gray-50 font-sans antialiased">
    <div class="min-h-screen flex" x-data="{ sidebarOpen: true, isMobile: window.innerWidth < 768 }" 
         x-init="
            $watch('sidebarOpen', value => {
                if (isMobile) {
                    document.body.style.overflow = value ? 'hidden' : 'auto';
                }
            });
            window.addEventListener('resize', () => {
                isMobile = window.innerWidth < 768;
                if (!isMobile) {
                    document.body.style.overflow = 'auto';
                }
            });
         ">
        
        <!-- Sidebar -->
        <div x-show="sidebarOpen" 
             x-transition:enter="transition-transform ease-in-out duration-300"
             x-transition:enter-start="-translate-x-full"
             x-transition:enter-end="translate-x-0"
             x-transition:leave="transition-transform ease-in-out duration-300"
             x-transition:leave-start="translate-x-0"
             x-transition:leave-end="-translate-x-full"
             class="fixed inset-y-0 left-0 z-30 w-64 bg-white shadow-lg border-r border-gray-200 md:static md:translate-x-0 sidebar-transition">
            
            <div class="flex flex-col h-full">
                <!-- Logo Section -->
                <div class="flex items-center px-6 py-4 border-b border-gray-200">
                    <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-purple-600 rounded-lg flex items-center justify-center mr-3">
                        <i class="fas fa-user-md text-white text-lg"></i>
                    </div>
                    <div>
                        <h2 class="font-bold text-lg text-gray-900">VitaLife</h2>
                        <p class="text-gray-500 text-sm">Doctor Dashboard</p>
                    </div>
                </div>

                <!-- User Info -->
                <div class="px-6 py-4 border-b border-gray-200">
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-gradient-to-br from-green-500 to-blue-600 rounded-full flex items-center justify-center mr-3">
                            <span class="text-white font-semibold text-sm"><?php echo e(substr(Auth::user()->name, 0, 1)); ?></span>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-900"><?php echo e(Auth::user()->name); ?></p>
                            <p class="text-gray-500 text-sm">
                                <?php echo e(Auth::user()->spesialis->spesialisasi ?? 'Doctor'); ?>

                            </p>
                        </div>
                    </div>
                </div>

                <!-- Navigation -->
                <nav class="flex-1 px-4 py-4 space-y-1">
                    <a href="<?php echo e(route('doctor.dashboard')); ?>" 
                       class="flex items-center px-4 py-3 text-sm font-medium rounded-lg transition-colors <?php echo e(request()->routeIs('doctor.dashboard') ? 'bg-blue-50 text-blue-700 border-r-2 border-blue-700' : 'text-gray-700 hover:bg-gray-100'); ?>">
                        <i class="fas fa-tachometer-alt mr-3 w-5"></i>
                        Dashboard
                    </a>
                    
                    <a href="<?php echo e(route('doctor.patients')); ?>" 
                       class="flex items-center px-4 py-3 text-sm font-medium rounded-lg transition-colors <?php echo e(request()->routeIs('doctor.patients*') ? 'bg-blue-50 text-blue-700 border-r-2 border-blue-700' : 'text-gray-700 hover:bg-gray-100'); ?>">
                        <i class="fas fa-users mr-3 w-5"></i>
                        My Patients
                    </a>
                    
                   
                    
                    <a href="<?php echo e(route('doctor.profile')); ?>" 
                       class="flex items-center px-4 py-3 text-sm font-medium rounded-lg transition-colors <?php echo e(request()->routeIs('doctor.profile*') ? 'bg-blue-50 text-blue-700 border-r-2 border-blue-700' : 'text-gray-700 hover:bg-gray-100'); ?>">
                        <i class="fas fa-user-cog mr-3 w-5"></i>
                        My Profile
                    </a>
                </nav>

                <!-- Logout -->
                <div class="px-4 py-4 border-t border-gray-200">
                    <form method="POST" action="<?php echo e(route('logout')); ?>">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="w-full flex items-center px-4 py-3 text-sm font-medium text-red-600 rounded-lg hover:bg-red-50 transition-colors">
                            <i class="fas fa-sign-out-alt mr-3 w-5"></i>
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Mobile Overlay -->
        <div x-show="sidebarOpen && isMobile" 
             x-transition:enter="transition-opacity ease-linear duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition-opacity ease-linear duration-300"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             @click="sidebarOpen = false"
             class="fixed inset-0 bg-gray-600 bg-opacity-75 z-20 md:hidden"></div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col min-w-0 md:ml-0" :class="{ 'md:ml-0': !sidebarOpen || isMobile }">
            <!-- Header -->
            <header class="bg-white shadow-sm border-b border-gray-200 sticky top-0 z-10">
                <div class="flex items-center justify-between px-4 py-3 sm:px-6">
                    <div class="flex items-center space-x-4">
                        <button @click="sidebarOpen = !sidebarOpen" 
                                class="p-2 rounded-md text-gray-600 hover:text-gray-900 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </button>
                        <div class="hidden sm:block">
                            <h1 class="text-xl font-semibold text-gray-900"><?php echo $__env->yieldContent('page-title', 'Dashboard'); ?></h1>
                            <p class="text-sm text-gray-500 mt-1">Welcome back, manage your patients</p>
                        </div>
                    </div>

                    <div class="flex items-center space-x-4">
                        <!-- Notifications -->
                        <div class="relative" x-data="{ open: false }">
                            <button @click="open = !open" 
                                    class="relative p-2 text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500 transition-colors">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M15 17h5l-5 5v-5zM12 3a9 9 0 11-9 9 9 9 0 019-9zm0 0v6l4-4-4-4z"></path>
                                </svg>
                                <?php if(isset($unreadCount) && $unreadCount > 0): ?>
                                    <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs font-bold rounded-full h-5 w-5 flex items-center justify-center notification-badge"><?php echo e($unreadCount); ?></span>
                                <?php endif; ?>
                            </button>
                            
                            <div x-show="open" 
                                 @click.away="open = false"
                                 x-transition:enter="transition ease-out duration-200"
                                 x-transition:enter-start="opacity-0 scale-95"
                                 x-transition:enter-end="opacity-100 scale-100"
                                 x-transition:leave="transition ease-in duration-75"
                                 x-transition:leave-start="opacity-100 scale-100"
                                 x-transition:leave-end="opacity-0 scale-95"
                                 class="absolute right-0 mt-2 w-80 bg-white rounded-lg shadow-lg border border-gray-200 z-50">
                                <div class="p-4 border-b border-gray-200">
                                    <h3 class="text-lg font-semibold text-gray-900">Notifications</h3>
                                </div>
                                <div class="max-h-64 overflow-y-auto">
                                    <div class="p-4 text-center text-gray-500">
                                        <i class="fas fa-bell-slash text-2xl mb-2"></i>
                                        <p>No new notifications</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Date Display -->
                        <div class="hidden sm:block text-sm text-gray-600">
                            <?php echo e(now()->format('l, d F Y')); ?>

                        </div>

                        <!-- User Menu -->
                        <div class="relative" x-data="{ open: false }">
                            <button @click="open = !open" 
                                    class="flex items-center space-x-3 p-2 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-colors">
                                <div class="w-8 h-8 bg-gradient-to-br from-green-500 to-blue-600 rounded-full flex items-center justify-center">
                                    <span class="text-white font-semibold text-sm"><?php echo e(substr(Auth::user()->name, 0, 1)); ?></span>
                                </div>
                                <div class="hidden sm:block text-left">
                                    <p class="text-sm font-medium text-gray-900"><?php echo e(Auth::user()->name); ?></p>
                                    <p class="text-xs text-gray-500">Doctor</p>
                                </div>
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>

                            <div x-show="open" 
                                 @click.away="open = false"
                                 x-transition:enter="transition ease-out duration-200"
                                 x-transition:enter-start="opacity-0 scale-95"
                                 x-transition:enter-end="opacity-100 scale-100"
                                 x-transition:leave="transition ease-in duration-75"
                                 x-transition:leave-start="opacity-100 scale-100"
                                 x-transition:leave-end="opacity-0 scale-95"
                                 class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-200 z-50">
                                <div class="py-1">
                                    <a href="<?php echo e(route('doctor.profile')); ?>" 
                                       class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition-colors">
                                        <i class="fas fa-user-edit w-4 h-4 mr-3"></i>
                                        Edit Profile
                                    </a>
                                    <div class="border-t border-gray-100"></div>
                                    <form method="POST" action="<?php echo e(route('logout')); ?>">
                                        <?php echo csrf_field(); ?>
                                        <button type="submit" 
                                                class="flex items-center w-full px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition-colors">
                                            <i class="fas fa-sign-out-alt w-4 h-4 mr-3"></i>
                                            Logout
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Content -->
            <main class="flex-1 overflow-auto">
                <div class="p-4 sm:p-6">
                    <?php if(session('success')): ?>
                        <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg mb-4 flex items-center">
                            <i class="fas fa-check-circle mr-2"></i>
                            <?php echo e(session('success')); ?>

                        </div>
                    <?php endif; ?>

                    <?php if(session('error')): ?>
                        <div class="bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-lg mb-4 flex items-center">
                            <i class="fas fa-exclamation-circle mr-2"></i>
                            <?php echo e(session('error')); ?>

                        </div>
                    <?php endif; ?>

                    <?php echo $__env->yieldContent('content'); ?>
                </div>
            </main>
        </div>
    </div>

    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH D:\Coding\Project 4 matklul\Vitalife-1\resources\views\layouts\doctor.blade.php ENDPATH**/ ?>