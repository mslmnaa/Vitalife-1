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
    <div class="py-8 mt-16">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-xl font-semibold mb-4">My Chats</h2>
                    
                    <?php if($payments->isEmpty()): ?>
                        <div class="text-center py-8">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                            </svg>
                            <p class="mt-4 text-gray-500">No active chats yet.</p>
                        </div>
                    <?php else: ?>
                        <div class="space-y-4">
                            <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="border rounded-lg p-4 hover:bg-gray-50 transition">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center">
                                            <?php if($payment->specialist->image): ?>
                                                <img 
                                                    src="<?php echo e(asset($payment->specialist->image)); ?>" 
                                                    alt="<?php echo e($payment->specialist->nama); ?>" 
                                                    class="w-12 h-12 rounded-full object-cover mr-4"
                                                >
                                            <?php else: ?>
                                                <div class="w-12 h-12 rounded-full bg-gray-300 mr-4 flex items-center justify-center">
                                                    <span class="text-gray-600 font-semibold"><?php echo e(substr($payment->specialist->nama, 0, 1)); ?></span>
                                                </div>
                                            <?php endif; ?>
                                            
                                            <div>
                                                <h3 class="font-semibold">
                                                    <?php if(auth()->user()->role === 'admin' || auth()->user()->role === 'dokter'): ?>
                                                        <?php echo e($payment->full_name); ?>

                                                    <?php else: ?>
                                                        <?php echo e($payment->specialist->nama); ?>

                                                    <?php endif; ?>
                                                </h3>
                                                <p class="text-sm text-gray-600">
                                                    <?php if(auth()->user()->role === 'admin' || auth()->user()->role === 'dokter'): ?>
                                                        Patient
                                                    <?php else: ?>
                                                        <?php echo e($payment->specialist->spesialisasi); ?>

                                                    <?php endif; ?>
                                                </p>
                                                <p class="text-xs text-gray-500">Payment ID: <?php echo e($payment->id); ?></p>
                                            </div>
                                        </div>
                                        
                                        <div class="text-right">
                                            <a 
                                                href="<?php echo e(route('chat.show', $payment->id)); ?>" 
                                                class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded transition"
                                            >
                                                Open Chat
                                            </a>
                                            <p class="text-xs text-gray-500 mt-1"><?php echo e($payment->created_at->format('M d, Y')); ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>
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
<?php endif; ?>
<?php /**PATH D:\Coding\Project 4 matklul\Vitalife-1\resources\views/user/chat/index.blade.php ENDPATH**/ ?>