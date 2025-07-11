<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="mb-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 border-b border-gray-200">
                        <h1 class="text-3xl font-bold text-gray-900">
                            <?php echo e(__('Account Settings')); ?>

                        </h1>
                        <p class="mt-2 text-sm text-gray-600">
                            <?php echo e(__('Manage your account settings and preferences.')); ?>

                        </p>
                    </div>
                </div>
            </div>

            <!-- Main Content Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Left Column - Main Settings -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- Profile Information -->
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 border-b border-gray-200">
                            <h2 class="text-lg font-semibold text-gray-900">
                                <?php echo e(__('Profile Information')); ?>

                            </h2>
                            <p class="mt-1 text-sm text-gray-600">
                                <?php echo e(__('Update your account profile information and email address.')); ?>

                            </p>
                        </div>
                        <div class="p-6">
                            <?php echo $__env->make('profile.partials.update-profile-information-form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                        </div>
                    </div>

                    <!-- Email Settings -->
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 border-b border-gray-200">
                            <h2 class="text-lg font-semibold text-gray-900">
                                <?php echo e(__('Email Settings')); ?>

                            </h2>
                            <p class="mt-1 text-sm text-gray-600">
                                <?php echo e(__('Update your email address and notification preferences.')); ?>

                            </p>
                        </div>
                        <div class="p-6">
                            <?php echo $__env->make('profile.partials.update-email-form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                        </div>
                    </div>

                    <!-- Password Security -->
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 border-b border-gray-200">
                            <h2 class="text-lg font-semibold text-gray-900">
                                <?php echo e(__('Password & Security')); ?>

                            </h2>
                            <p class="mt-1 text-sm text-gray-600">
                                <?php echo e(__('Ensure your account is using a long, random password to stay secure.')); ?>

                            </p>
                        </div>
                        <div class="p-6">
                            <?php echo $__env->make('profile.partials.update-password-form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                        </div>
                    </div>

                    <!-- Danger Zone -->
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border-red-200">
                        <div class="p-6 border-b border-red-200 bg-red-50">
                            <h2 class="text-lg font-semibold text-red-900">
                                <?php echo e(__('Danger Zone')); ?>

                            </h2>
                            <p class="mt-1 text-sm text-red-600">
                                <?php echo e(__('Permanently delete your account and all associated data.')); ?>

                            </p>
                        </div>
                        <div class="p-6">
                            <?php echo $__env->make('profile.partials.delete-user-form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                        </div>
                    </div>
                </div>

                <!-- Right Column - Profile Image & Quick Actions -->
                <div class="lg:col-span-1 space-y-6">
                    <!-- Profile Image -->
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 border-b border-gray-200">
                            <h2 class="text-lg font-semibold text-gray-900">
                                <?php echo e(__('Profile Picture')); ?>

                            </h2>
                            <p class="mt-1 text-sm text-gray-600">
                                <?php echo e(__('Update your profile picture.')); ?>

                            </p>
                        </div>
                        <div class="p-6">
                            <?php echo $__env->make('profile.partials.update-profile-image', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 border-b border-gray-200">
                            <h2 class="text-lg font-semibold text-gray-900">
                                <?php echo e(__('Quick Actions')); ?>

                            </h2>
                        </div>
                        <div class="p-6 space-y-4">
                            <button class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition duration-200">
                                <?php echo e(__('Download My Data')); ?>

                            </button>
                            <button class="w-full bg-gray-600 hover:bg-gray-700 text-white font-medium py-2 px-4 rounded-lg transition duration-200">
                                <?php echo e(__('Privacy Settings')); ?>

                            </button>
                            <button class="w-full bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-4 rounded-lg transition duration-200">
                                <?php echo e(__('Export Settings')); ?>

                            </button>
                        </div>
                    </div>

                    <!-- Account Summary -->
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 border-b border-gray-200">
                            <h2 class="text-lg font-semibold text-gray-900">
                                <?php echo e(__('Account Summary')); ?>

                            </h2>
                        </div>
                        <div class="p-6">
                            <div class="space-y-3">
                                <div class="flex justify-between items-center">
                                    <span class="text-sm text-gray-600"><?php echo e(__('Member since')); ?></span>
                                    <span class="text-sm font-medium text-gray-900">
                                        <?php echo e(Auth::user()->created_at->format('M Y')); ?>

                                    </span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-sm text-gray-600"><?php echo e(__('Last login')); ?></span>
                                    <span class="text-sm font-medium text-gray-900">
                                        <?php echo e(__('Today')); ?>

                                    </span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-sm text-gray-600"><?php echo e(__('Account status')); ?></span>
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        <?php echo e(__('Active')); ?>

                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH D:\Coding\Project 4 matklul\Vitalife-1\resources\views/profile/edit.blade.php ENDPATH**/ ?>