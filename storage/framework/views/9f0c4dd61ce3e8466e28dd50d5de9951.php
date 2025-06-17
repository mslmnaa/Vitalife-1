```blade
<!-- resources/views/fitur/voucher.blade.php -->
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
    <div class="py-12 mt-16">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-3xl font-bold mb-6">Available Vouchers</h1>
                    
                    <?php if(session('success')): ?>
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <span class="block sm:inline"><?php echo e(session('success')); ?></span>
                    </div>
                    <?php endif; ?>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <?php $__empty_1 = true; $__currentLoopData = $vouchers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $voucher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="bg-gray-50 rounded-lg shadow overflow-hidden">
                                <img src="<?php echo e(asset($voucher->image)); ?>" alt="<?php echo e($voucher->code); ?>" class="w-full h-40 object-cover">
                                <div class="p-4">
                                    <div class="flex justify-between items-center mb-2">
                                        <h3 class="text-xl font-bold text-indigo-600"><?php echo e($voucher->code); ?></h3>
                                        <span class="bg-indigo-100 text-indigo-800 text-xs px-2 py-1 rounded-full"><?php echo e($voucher->discount_percentage); ?>% OFF</span>
                                    </div>
                                    <p class="text-gray-700 mb-4"><?php echo e($voucher->description); ?></p>
                                    <div class="text-sm text-gray-500">
                                        <?php if($voucher->expired_at): ?>
                                            <p>Expires: <?php echo e(date('d M Y', strtotime($voucher->expired_at))); ?></p>
                                        <?php else: ?>
                                            <p>No expiration date</p>
                                        <?php endif; ?>
                                    </div>
                                    <div class="mt-4 flex justify-between items-center">
                                        <button class="copy-code px-3 py-1 bg-indigo-600 text-white rounded hover:bg-indigo-700 text-sm" 
                                                data-code="<?php echo e($voucher->code); ?>">
                                            Copy Code
                                        </button>
                                        <span class="text-sm text-gray-500">
                                            Used <?php echo e($voucher->usage_count); ?> 
                                            <?php if($voucher->usage_limit): ?>
                                                / <?php echo e($voucher->usage_limit); ?>

                                            <?php endif; ?>
                                            times
                                        </span>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div class="col-span-3 text-center py-10">
                                <p class="text-gray-500">No vouchers available at the moment</p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php echo $__env->make('layouts.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const copyButtons = document.querySelectorAll('.copy-code');
            
            copyButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const code = this.getAttribute('data-code');
                    navigator.clipboard.writeText(code).then(() => {
                        // Change button text temporarily
                        const originalText = this.textContent;
                        this.textContent = 'Copied!';
                        this.classList.remove('bg-indigo-600');
                        this.classList.add('bg-green-600');
                        
                        // Reset button after 2 seconds
                        setTimeout(() => {
                            this.textContent = originalText;
                            this.classList.remove('bg-green-600');
                            this.classList.add('bg-indigo-600');
                        }, 2000);
                    }).catch(err => {
                        console.error('Could not copy text: ', err);
                    });
                });
            });
        });
    </script>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
```<?php /**PATH D:\Coding\Project 4 matklul\Vitalife-1\resources\views/user/vouchers/index.blade.php ENDPATH**/ ?>