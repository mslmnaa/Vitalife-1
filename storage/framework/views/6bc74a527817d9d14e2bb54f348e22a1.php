<!-- resources/views/admin/voucher/show.blade.php -->


<?php $__env->startSection('content'); ?>
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Voucher Details: <?php echo e($voucher->code); ?></h1>
        <div class="flex space-x-2">
            <a href="<?php echo e(route('admin.vouchers.edit', $voucher)); ?>" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                Edit
            </a>
            <a href="<?php echo e(route('admin.vouchers.index')); ?>" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">
                Back to Vouchers
            </a>
        </div>
    </div>

    <?php if(session('success')): ?>
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
        <span class="block sm:inline"><?php echo e(session('success')); ?></span>
    </div>
    <?php endif; ?>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <div class="mb-4">
                        <h3 class="text-lg font-medium text-gray-900">Voucher Image</h3>
                        <img src="<?php echo e(asset($voucher->image)); ?>" alt="Voucher Image" class="mt-2 w-full h-48 object-cover rounded">
                    </div>
                    
                    <div class="mb-4">
                        <h3 class="text-lg font-medium text-gray-900">Voucher Code</h3>
                        <p class="mt-1 text-xl font-bold"><?php echo e($voucher->code); ?></p>
                    </div>
                    
                    <div class="mb-4">
                        <h3 class="text-lg font-medium text-gray-900">Discount</h3>
                        <p class="mt-1 text-xl font-bold"><?php echo e($voucher->discount_percentage); ?>%</p>
                    </div>
                </div>
                
                <div>
                    <div class="mb-4">
                        <h3 class="text-lg font-medium text-gray-900">Description</h3>
                        <p class="mt-1 text-gray-600"><?php echo e($voucher->description); ?></p>
                    </div>
                    
                    <div class="mb-4">
                        <h3 class="text-lg font-medium text-gray-900">Usage</h3>
                        <p class="mt-1">
                            <?php echo e($voucher->usage_count); ?> times used 
                            <?php if($voucher->usage_limit): ?>
                                (Limit: <?php echo e($voucher->usage_limit); ?>)
                            <?php else: ?>
                                (No usage limit)
                            <?php endif; ?>
                        </p>
                    </div>
                    
                    <div class="mb-4">
                        <h3 class="text-lg font-medium text-gray-900">Status</h3>
                        <p class="mt-1">
                            <?php if($voucher->is_used): ?>
                                <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                    Used
                                </span>
                            <?php elseif($voucher->expired_at && now() > $voucher->expired_at): ?>
                                <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                    Expired
                                </span>
                            <?php else: ?>
                                <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    Active
                                </span>
                            <?php endif; ?>
                        </p>
                    </div>
                    
                    <div class="mb-4">
                        <h3 class="text-lg font-medium text-gray-900">Expiration</h3>
                        <p class="mt-1">
                            <?php if($voucher->expired_at): ?>
                                <?php echo e(date('d F Y', strtotime($voucher->expired_at))); ?>

                                
                                <?php if(now() > $voucher->expired_at): ?>
                                    <span class="text-red-600">(Expired)</span>
                                <?php else: ?>
                                    <span class="text-gray-500">(<?php echo e(now()->diffInDays($voucher->expired_at)); ?> days remaining)</span>
                                <?php endif; ?>
                            <?php else: ?>
                                No expiration date
                            <?php endif; ?>
                        </p>
                    </div>
                    
                    <div class="mb-4">
                        <h3 class="text-lg font-medium text-gray-900">Created</h3>
                        <p class="mt-1 text-gray-600"><?php echo e($voucher->created_at->format('d M Y, H:i')); ?></p>
                    </div>
                    
                    <div>
                        <h3 class="text-lg font-medium text-gray-900">Last Updated</h3>
                        <p class="mt-1 text-gray-600"><?php echo e($voucher->updated_at->format('d M Y, H:i')); ?></p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="bg-gray-50 px-6 py-3 flex justify-end">
            <form action="<?php echo e(route('admin.vouchers.destroy', $voucher)); ?>" method="POST" class="inline">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button type="submit" class="text-red-600 hover:text-red-900 font-medium" onclick="return confirm('Are you sure you want to delete this voucher?')">
                    Delete Voucher
                </button>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Coding\Project 4 matklul\Vitalife-1\resources\views/admin/voucher/show.blade.php ENDPATH**/ ?>