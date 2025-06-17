<!-- Doctor Sidebar -->
<div id="sidenav"
     :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" 
     class="fixed inset-y-0 left-0 z-30 w-64 bg-white shadow-lg sidebar-transition md:translate-x-0 md:static md:inset-0">
    
    <!-- Sidebar Header -->
    <div class="flex items-center justify-center h-16 px-6 bg-white border-b border-gray-200">
        <div class="flex items-center space-x-3">
            <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-purple-600 rounded-lg flex items-center justify-center">
                <i class="fas fa-user-md text-white"></i>
            </div>
            <div>
                <h2 class="text-lg font-bold text-gray-800">VitaLife</h2>
                <p class="text-xs text-gray-500">Doctor Portal</p>
            </div>
        </div>
    </div>

    <!-- Navigation Menu -->
    <nav class="px-4 py-6 space-y-2">
        <a href="<?php echo e(route('doctor.dashboard')); ?>" 
           class="flex items-center px-3 py-2 text-sm font-medium rounded-lg transition-colors <?php echo e(request()->routeIs('doctor.dashboard') ? 'bg-blue-50 text-blue-700 border-r-4 border-blue-700' : 'text-gray-700 hover:bg-gray-50 hover:text-gray-900'); ?>">
            <i class="fas fa-tachometer-alt w-5 h-5 mr-3 <?php echo e(request()->routeIs('doctor.dashboard') ? 'text-blue-700' : 'text-gray-400'); ?>"></i>
            Dashboard
        </a>

        <a href="<?php echo e(route('doctor.patients')); ?>" 
           class="flex items-center px-3 py-2 text-sm font-medium rounded-lg transition-colors <?php echo e(request()->routeIs('doctor.patients*') ? 'bg-blue-50 text-blue-700 border-r-4 border-blue-700' : 'text-gray-700 hover:bg-gray-50 hover:text-gray-900'); ?>">
            <i class="fas fa-users w-5 h-5 mr-3 <?php echo e(request()->routeIs('doctor.patients*') ? 'text-blue-700' : 'text-gray-400'); ?>"></i>
            My Patients
        </a>

        

        <a href="<?php echo e(route('doctor.chats')); ?>" 
           class="flex items-center px-3 py-2 text-sm font-medium rounded-lg transition-colors <?php echo e(request()->routeIs('doctor.chats*') ? 'bg-blue-50 text-blue-700 border-r-4 border-blue-700' : 'text-gray-700 hover:bg-gray-50 hover:text-gray-900'); ?>">
            <i class="fas fa-comments w-5 h-5 mr-3 <?php echo e(request()->routeIs('doctor.chats*') ? 'text-blue-700' : 'text-gray-400'); ?>"></i>
            Patient Chat
            <?php if(isset($unreadCount) && $unreadCount > 0): ?>
                <span class="bg-red-500 text-white text-xs rounded-full px-2 py-1 ml-auto"><?php echo e($unreadCount); ?></span>
            <?php endif; ?>
        </a>

        <a href="<?php echo e(route('doctor.profile')); ?>" 
           class="flex items-center px-3 py-2 text-sm font-medium rounded-lg transition-colors <?php echo e(request()->routeIs('doctor.profile*') ? 'bg-blue-50 text-blue-700 border-r-4 border-blue-700' : 'text-gray-700 hover:bg-gray-50 hover:text-gray-900'); ?>">
            <i class="fas fa-user-cog w-5 h-5 mr-3 <?php echo e(request()->routeIs('doctor.profile*') ? 'text-blue-700' : 'text-gray-400'); ?>"></i>
            My Profile
        </a>
    </nav>

    <!-- User Profile Section (moved to bottom) -->
    <div class="absolute bottom-16 left-0 right-0 px-4 py-4 border-t border-gray-200">
        <div class="flex items-center space-x-3 px-3 py-2">
            <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center">
                <span class="text-white font-semibold text-sm"><?php echo e(substr(Auth::user()->name, 0, 1)); ?></span>
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm font-medium text-gray-900 truncate"><?php echo e(Auth::user()->name); ?></p>
                <p class="text-xs text-gray-500 truncate">
                    <?php echo e(Auth::user()->spesialis->spesialisasi ?? 'General Doctor'); ?>

                </p>
            </div>
        </div>
    </div>

    <!-- Logout Button -->
    <div class="absolute bottom-0 left-0 right-0 p-4 border-t border-gray-200">
        <form method="POST" action="<?php echo e(route('logout')); ?>">
            <?php echo csrf_field(); ?>
            <button type="submit" class="w-full flex items-center px-3 py-2 text-sm font-medium text-red-600 hover:bg-red-50 hover:text-red-700 rounded-lg transition-colors">
                <i class="fas fa-sign-out-alt w-5 h-5 mr-3"></i>
                Logout
            </button>
        </form>
    </div>
</div><?php /**PATH D:\Coding\Project 4 matklul\Vitalife-1\resources\views\layouts\doctor-sidenav.blade.php ENDPATH**/ ?>