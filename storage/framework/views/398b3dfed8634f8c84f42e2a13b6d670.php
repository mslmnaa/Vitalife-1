<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        /* Sembunyikan scrollbar untuk Chrome, Safari dan Opera */
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }

        /* Sembunyikan scrollbar untuk IE, Edge dan Firefox */
        .scrollbar-hide {
            -ms-overflow-style: none;
            /* IE dan Edge */
            scrollbar-width: none;
            /* Firefox */
        }
        
        .nav-link {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
        }
        
        .nav-link:hover {
            transform: translateX(4px);
        }
        
        .nav-link.active {
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
        
        .nav-link.active::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 4px;
            height: 60%;
            background: linear-gradient(to bottom, #3b82f6, #1d4ed8);
            border-radius: 0 4px 4px 0;
        }
        
        .sidebar-icon {
            transition: all 0.3s ease;
        }
        
        .nav-link:hover .sidebar-icon {
            transform: scale(1.1);
        }
        
        .logout-btn:hover {
            background: linear-gradient(135deg, #dc2626 0%, #991b1b 100%);
        }
        
        .logo-glow {
            filter: drop-shadow(0 0 10px rgba(59, 130, 246, 0.3));
        }
    </style>

    <!-- Scripts -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>

<body>
    <aside id="sidenav" class="aside bg-gradient-to-b from-gray-900 via-gray-800 to-gray-900 w-64 min-w-64 max-w-full px-4 fixed h-full flex flex-col shadow-2xl border-r border-gray-700">
        <!-- Fixed logo section -->
        <div class="py-6 sticky top-0 bg-gradient-to-r from-gray-900 to-gray-800 z-10 border-b border-gray-700">
            <div class="flex justify-center">
                <div class="relative">
                    <img src="../image/LOGO_1.png" alt="Logo" class="h-10 w-auto logo-glow">
                    <div class="absolute -inset-2 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full opacity-20 blur-md"></div>
                </div>
            </div>
            
            <!-- Welcome text -->
            <div class="mt-4 text-center">
                <p class="text-gray-300 text-sm font-medium">Admin Dashboard</p>
                <div class="w-16 h-0.5 bg-gradient-to-r from-blue-500 to-purple-500 mx-auto mt-2 rounded-full"></div>
            </div>
        </div>

        <!-- Scrollable content -->
        <div class="flex-grow overflow-y-auto py-4 scrollbar-hide">
            <nav class="space-y-2">
                <!-- Dashboard -->
                <a href="<?php echo e(route('admin.dashboard')); ?>"
                    class="nav-link p-4 rounded-xl flex items-center <?php echo e(Request::routeIs('admin.dashboard') ? 'active text-gray-800' : 'text-gray-300 hover:text-white hover:bg-gray-700/50'); ?> group">
                    <div class="sidebar-icon w-10 h-10 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center mr-4 shadow-lg">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                            </path>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <span class="font-semibold text-base">Dashboard</span>
                        <p class="text-xs <?php echo e(Request::routeIs('admin.dashboard') ? 'text-gray-500' : 'text-gray-400'); ?> mt-0.5">Overview & Analytics</p>
                    </div>
                    <div class="opacity-0 group-hover:opacity-100 transition-opacity">
                        <i class="fa-solid fa-chevron-right text-gray-400 text-sm"></i>
                    </div>
                </a>

                <!-- Medicine -->
                <a href="<?php echo e(route('medicines.index')); ?>"
                    class="nav-link p-4 rounded-xl flex items-center <?php echo e(Request::routeIs('medicines.index*') ? 'active text-gray-800' : 'text-gray-300 hover:text-white hover:bg-gray-700/50'); ?> group">
                    <div class="sidebar-icon w-10 h-10 bg-gradient-to-br from-green-500 to-emerald-600 rounded-lg flex items-center justify-center mr-4 shadow-lg">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z">
                            </path>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <span class="font-semibold text-base">Medicine</span>
                        <p class="text-xs <?php echo e(Request::routeIs('medicines.index*') ? 'text-gray-500' : 'text-gray-400'); ?> mt-0.5">Manage medications</p>
                    </div>
                    <div class="opacity-0 group-hover:opacity-100 transition-opacity">
                        <i class="fa-solid fa-chevron-right text-gray-400 text-sm"></i>
                    </div>
                </a>

                <!-- Pharmacy -->
                <a href="<?php echo e(route('admin.pharmacies.index')); ?>"
                    class="nav-link p-4 rounded-xl flex items-center <?php echo e(Request::routeIs('admin.pharmacies.*') ? 'active text-gray-800' : 'text-gray-300 hover:text-white hover:bg-gray-700/50'); ?> group">
                    <div class="sidebar-icon w-10 h-10 bg-gradient-to-br from-cyan-500 to-teal-600 rounded-lg flex items-center justify-center mr-4 shadow-lg">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                            </path>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <span class="font-semibold text-base">Pharmacy</span>
                        <p class="text-xs <?php echo e(Request::routeIs('admin.pharmacies.*') ? 'text-gray-500' : 'text-gray-400'); ?> mt-0.5">Manage pharmacies</p>
                    </div>
                    <div class="opacity-0 group-hover:opacity-100 transition-opacity">
                        <i class="fa-solid fa-chevron-right text-gray-400 text-sm"></i>
                    </div>
                </a>

                <!-- Specialist -->
                <a href="<?php echo e(route('admin.spesialisis.index')); ?>"
                    class="nav-link p-4 rounded-xl flex items-center <?php echo e(Request::routeIs('admin.spesialisis.index') ? 'active text-gray-800' : 'text-gray-300 hover:text-white hover:bg-gray-700/50'); ?> group">
                    <div class="sidebar-icon w-10 h-10 bg-gradient-to-br from-purple-500 to-purple-600 rounded-lg flex items-center justify-center mr-4 shadow-lg">
                        <i class="fa-solid fa-user-doctor text-white"></i>
                    </div>
                    <div class="flex-1">
                        <span class="font-semibold text-base">Specialist</span>
                        <p class="text-xs <?php echo e(Request::routeIs('admin.spesialisis.index') ? 'text-gray-500' : 'text-gray-400'); ?> mt-0.5">Medical specialists</p>
                    </div>
                    <div class="opacity-0 group-hover:opacity-100 transition-opacity">
                        <i class="fa-solid fa-chevron-right text-gray-400 text-sm"></i>
                    </div>
                </a>

                <!-- Account User -->
                <a href="<?php echo e(route('admin.accountuser')); ?>"
                    class="nav-link p-4 rounded-xl flex items-center <?php echo e(Request::routeIs('admin.accountuser') ? 'active text-gray-800' : 'text-gray-300 hover:text-white hover:bg-gray-700/50'); ?> group">
                    <div class="sidebar-icon w-10 h-10 bg-gradient-to-br from-orange-500 to-red-600 rounded-lg flex items-center justify-center mr-4 shadow-lg">
                        <svg class="w-5 h-5 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm-1.5 8a4 4 0 0 0-4 4 2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-3Zm6.82-3.096a5.51 5.51 0 0 0-2.797-6.293 3.5 3.5 0 1 1 2.796 6.292ZM19.5 18h.5a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-1.1a5.503 5.503 0 0 1-.471.762A5.998 5.998 0 0 1 19.5 18ZM4 7.5a3.5 3.5 0 0 1 5.477-2.889 5.5 5.5 0 0 0-2.796 6.293A3.501 3.501 0 0 1 4 7.5ZM7.1 12H6a4 4 0 0 0-4 4 2 2 0 0 0 2 2h.5a5.998 5.998 0 0 1 3.071-5.238A5.505 5.505 0 0 1 7.1 12Z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="flex-1">
                        <span class="font-semibold text-base">Account User</span>
                        <p class="text-xs <?php echo e(Request::routeIs('admin.accountuser') ? 'text-gray-500' : 'text-gray-400'); ?> mt-0.5">User management</p>
                    </div>
                    <div class="opacity-0 group-hover:opacity-100 transition-opacity">
                        <i class="fa-solid fa-chevron-right text-gray-400 text-sm"></i>
                    </div>
                </a>

                <!-- Vouchers -->
                <a href="<?php echo e(route('admin.vouchers.index')); ?>"
                    class="nav-link p-4 rounded-xl flex items-center <?php echo e(Request::routeIs('admin.vouchers.index') ? 'active text-gray-800' : 'text-gray-300 hover:text-white hover:bg-gray-700/50'); ?> group">
                    <div class="sidebar-icon w-10 h-10 bg-gradient-to-br from-pink-500 to-rose-600 rounded-lg flex items-center justify-center mr-4 shadow-lg">
                        <i class="fa-duotone fa-solid fa-ticket text-white"></i>
                    </div>
                    <div class="flex-1">
                        <span class="font-semibold text-base">Vouchers</span>
                        <p class="text-xs <?php echo e(Request::routeIs('admin.vouchers.index') ? 'text-gray-500' : 'text-gray-400'); ?> mt-0.5">Discount management</p>
                    </div>
                    <div class="opacity-0 group-hover:opacity-100 transition-opacity">
                        <i class="fa-solid fa-chevron-right text-gray-400 text-sm"></i>
                    </div>
                </a>

            </nav>
        </div>

        <!-- Logout button (fixed at bottom) -->
        <div class="py-4 sticky bottom-0 bg-gradient-to-t from-gray-900 via-gray-800 to-transparent border-t border-gray-700">
            <form method="POST" action="<?php echo e(route('logout')); ?>">
                <?php echo csrf_field(); ?>
                <button type="submit"
                    class="logout-btn w-full p-4 rounded-xl flex items-center text-gray-300 hover:text-white bg-gray-800/50 hover:bg-red-600 transition-all duration-300 group border border-gray-600 hover:border-red-500"
                    onclick="event.preventDefault(); this.closest('form').submit();">
                    <div class="w-10 h-10 bg-gradient-to-br from-red-500 to-red-600 rounded-lg flex items-center justify-center mr-4 shadow-lg group-hover:shadow-red-500/25">
                        <svg class="w-5 h-5 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20 12H8m12 0-4 4m4-4-4-4M9 4H7a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h2" />
                        </svg>
                    </div>
                    <div class="flex-1 text-left">
                        <span class="font-semibold text-base">Logout</span>
                        <p class="text-xs text-gray-400 group-hover:text-red-200 mt-0.5">Sign out safely</p>
                    </div>
                    <div class="opacity-0 group-hover:opacity-100 transition-opacity">
                        <i class="fa-solid fa-sign-out-alt text-white text-sm"></i>
                    </div>
                </button>
            </form>
        </div>
    </aside>
</body>

</html><?php /**PATH D:\Coding\Project 4 matklul\Vitalife-1\resources\views/layouts/sidenav.blade.php ENDPATH**/ ?>