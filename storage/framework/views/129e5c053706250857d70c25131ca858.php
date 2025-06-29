<?php $__env->startSection('page-title', 'Medicine Detail'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="max-w-4xl mx-auto">
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center">
                    <a href="<?php echo e(route('admin.medicines.index')); ?>" class="text-gray-600 hover:text-gray-800 mr-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                    </a>
                    <h1 class="text-2xl font-bold">Medicine Detail</h1>
                </div>
                <div class="flex space-x-2">
                    <a href="<?php echo e(route('admin.medicines.edit', $medicine->id_medicine)); ?>" 
                       class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        Edit Medicine
                    </a>
                    <form action="<?php echo e(route('admin.medicines.destroy', $medicine->id_medicine)); ?>" method="POST" class="inline" 
                          onsubmit="return confirm('Are you sure you want to delete this medicine?');">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" 
                                class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500">
                            Delete Medicine
                        </button>
                    </form>
                </div>
            </div>

            <?php if(session('success')): ?>
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline"><?php echo e(session('success')); ?></span>
                </div>
            <?php endif; ?>

            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="md:flex">
                    <!-- Image Section -->
                    <div class="md:w-1/3">
                        <?php if($medicine->image): ?>
                            <img src="<?php echo e(asset($medicine->image)); ?>" alt="<?php echo e($medicine->nama); ?>" 
                                 class="w-full h-64 md:h-full object-cover">
                        <?php else: ?>
                            <div class="w-full h-64 md:h-full bg-gray-200 flex items-center justify-center">
                                <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Content Section -->
                    <div class="md:w-2/3 p-6">
                        <div class="mb-4">
                            <h2 class="text-3xl font-bold text-gray-900 mb-2"><?php echo e($medicine->nama); ?></h2>
                            <div class="flex items-center space-x-4">
                                <span class="px-3 py-1 text-sm font-semibold rounded-full bg-blue-100 text-blue-800">
                                    <?php echo e($medicine->kategori); ?>

                                </span>
                                <span class="px-3 py-1 text-sm font-semibold rounded-full 
                                    <?php if($medicine->stock_status == 'Habis'): ?> bg-red-100 text-red-800
                                    <?php elseif($medicine->stock_status == 'Stok Menipis'): ?> bg-yellow-100 text-yellow-800
                                    <?php else: ?> bg-green-100 text-green-800 <?php endif; ?>">
                                    <?php echo e($medicine->stock_status); ?>

                                </span>
                                <span class="px-3 py-1 text-sm font-semibold rounded-full 
                                    <?php if($medicine->expiry_status == 'Kadaluarsa'): ?> bg-red-100 text-red-800
                                    <?php elseif($medicine->expiry_status == 'Akan Kadaluarsa'): ?> bg-yellow-100 text-yellow-800
                                    <?php else: ?> bg-green-100 text-green-800 <?php endif; ?>">
                                    <?php echo e($medicine->expiry_status); ?>

                                </span>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-3">Basic Information</h3>
                                <dl class="space-y-2">
                                    <div>
                                        <dt class="text-sm font-medium text-gray-500">Price</dt>
                                        <dd class="text-lg font-bold text-green-600"><?php echo e($medicine->formatted_price); ?></dd>
                                    </div>
                                    <div>
                                        <dt class="text-sm font-medium text-gray-500">Stock</dt>
                                        <dd class="text-sm text-gray-900"><?php echo e($medicine->stok); ?> units</dd>
                                    </div>
                                    <div>
                                        <dt class="text-sm font-medium text-gray-500">Manufacturer</dt>
                                        <dd class="text-sm text-gray-900"><?php echo e($medicine->produsen); ?></dd>
                                    </div>
                                </dl>
                            </div>

                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-3">Expiry Information</h3>
                                <dl class="space-y-2">
                                    <div>
                                        <dt class="text-sm font-medium text-gray-500">Expiry Date</dt>
                                        <dd class="text-sm text-gray-900"><?php echo e($medicine->tanggal_kadaluarsa->format('d F Y')); ?></dd>
                                    </div>
                                    <div>
                                        <dt class="text-sm font-medium text-gray-500">Days Until Expiry</dt>
                                        <dd class="text-sm text-gray-900">
                                            <?php
                                                $daysUntilExpiry = now()->diffInDays($medicine->tanggal_kadaluarsa, false);
                                            ?>
                                            <?php if($daysUntilExpiry < 0): ?>
                                                <span class="text-red-600 font-semibold">Expired <?php echo e(abs($daysUntilExpiry)); ?> days ago</span>
                                            <?php elseif($daysUntilExpiry == 0): ?>
                                                <span class="text-red-600 font-semibold">Expires today</span>
                                            <?php else: ?>
                                                <span class="<?php echo e($daysUntilExpiry <= 30 ? 'text-yellow-600' : 'text-green-600'); ?> font-semibold">
                                                    <?php echo e($daysUntilExpiry); ?> days remaining
                                                </span>
                                            <?php endif; ?>
                                        </dd>
                                    </div>
                                    <div>
                                        <dt class="text-sm font-medium text-gray-500">Added Date</dt>
                                            <?php echo e(optional($medicine->created_at)->format('d F Y, H:i') ?? 'Belum ada'); ?>

                                    </div>
                                </dl>
                            </div>
                        </div>

                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-3">Description</h3>
                            <div class="prose max-w-none">
                                <p class="text-gray-700 leading-relaxed"><?php echo e($medicine->deskripsi); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Additional Actions -->
            <div class="mt-6 bg-gray-50 rounded-lg p-4">
                <h3 class="text-lg font-semibold text-gray-900 mb-3">Quick Actions</h3>
                <div class="flex flex-wrap gap-3">
                    <?php if($medicine->stok <= 10): ?>
                        <button class="px-4 py-2 bg-yellow-600 text-white rounded-md hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-yellow-500">
                            Restock Alert
                        </button>
                    <?php endif; ?>
                    
                    <?php if($medicine->expiry_status == 'Akan Kadaluarsa'): ?>
                        <button class="px-4 py-2 bg-orange-600 text-white rounded-md hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-orange-500">
                            Expiry Warning
                        </button>
                    <?php endif; ?>
                    
                    <button class="px-4 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500">
                        Print Label
                    </button>
                    
                    <button class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        Generate Report
                    </button>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Coding\Project 4 matklul\Vitalife-1\resources\views/admin/medicines/show.blade.php ENDPATH**/ ?>