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
    <?php echo $__env->make('layouts.pencarian', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    
    <div class="flex justify-center items-center">
        <div class="font-sans">
            <div class="container mx-auto py-4 grid grid-cols-2 gap-5">
                <div class="bg-white rounded-lg shadow-2xl p-12">
                    <!-- spa1 -->
                    <?php $__currentLoopData = $spaTotal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $spa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="flex">
                            <div class="flex items-center border-b border-gray-500 pb-2">
                                <div class="w-16 h-16 rounded-full bg-gray-200 mr-6"></div>
                                <div>
                                    <h2 class="text-2xl font-bold"><?php echo e($spa->nama); ?></h2>
                                    <p class="text-gray-500 text-lg">Relaxation</p>
                                    <p class="text-gray-500 text-lg">16 years experience overall</p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-6 bg-green-100 px-6 py-3 rounded-md inline-flex items-center">
                            <svg class="w-5 h-5 mr-2 text-green-500" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fillRule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clipRule="evenodd" />
                            </svg>
                            <span class="text-green-500 font-medium text-lg">99% 93 Patient Stories</span>
                        </div>
                        <div class="mt-6">
                            <p class="text-gray-500 text-lg"><?php echo e($spa->alamat); ?></p>
                            <p class="text-gray-500 text-lg">The most famous relaxation spa</p>
                            <a href="#" class="text-blue-500 hover:text-blue-700 text-lg">more</a>
                        </div>
                        <div class="mt-6">
                            <p class="text-gray-500 text-lg">Rp.<?php echo e(number_format($spa->harga, 0, ',', '.')); ?></p>
                        </div>
                        <div class="mt-6">
                            <p class="text-gray-500 text-lg"><?php echo e($spa->noHP); ?></p>
                        </div>
                        <div class="mt-6 flex justify-end">
                            <button
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded text-lg mr-4">Book
                                FREE Spa Visit</button>
                            <button
                                class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-3 px-6 rounded text-lg">Schedule</button>
                        </div>

                        <!-- Available -->
                        <div class="mt-10">
                            <h3 class="text-xl font-bold">Available Today</h3>
                            <div class="grid grid-cols-3 gap-6 mt-6">
                                <div>
                                    <p class="text-m text-gray-500 text-lg"><?php echo e($spa->waktuBuka); ?></p>
                                </div>
                                
                            </div>
                        </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <div>
                    <h2 class="text-2xl font-bold mb-6">Maps Location</h2>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15813.61369824441!2d110.33927410840992!3d-7.746962888130327!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a58f2f0a9180d%3A0x65615dadf02a4713!2sAnjani%20Spa!5e0!3m2!1sen!2sid!4v1717088008917!5m2!1sen!2sid"
                        width="100%" height="400" style="border: none" allowFullScreen="" loading="lazy"
                        referrerPolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>

    <?php echo $__env->make('layouts.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
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
<?php /**PATH D:\Coding\Project 4 matklul\Vitalife-1\resources\views\user\spaFilter.blade.php ENDPATH**/ ?>