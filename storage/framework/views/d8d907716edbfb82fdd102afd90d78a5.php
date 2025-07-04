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
    <section class="ezy__service24 light py-14 md:py-24 bg-white dark:bg-[#0b1727] text-zinc-900 dark:text-white">
        <div class="container px-4 mx-auto">
            <div class="flex justify-center">
                <div class="max-w-2xl">
                    <h2 class="text-3xl md:text-4xl font-bold text-center leading-relaxed mb-6">
                        The Best Stories Are Told In The Desert <br />
                        What Noman Knows For...
                    </h2>
                </div>
            </div>
            <div class="grid grid-cols-4 gap-6">
                <div class="col-span-4 md:col-span-2 lg:col-span-1">
                    <div class="xl:p-6">
                        <div
                            class="w-[75px] h-[75px] rounded-full text-[32px] inline-flex justify-center items-center shadow-xl text-red-500 mb-12">
                            <i class="fas fa-cannabis"></i>
                        </div>
                        <h4 class="text-2xl font-medium mb-6">Product Design</h4>
                        <p class="opacity-80 tracking-wider">
                            Assumenda non repellendus distinctio nihil dicta sapiente, quibusdam maiores, illum at,
                            blanditiis
                            eligendi qui.
                        </p>
                    </div>
                </div>
                <div class="col-span-4 md:col-span-2 lg:col-span-1">
                    <div class="xl:p-6">
                        <div
                            class="w-[75px] h-[75px] rounded-full text-[32px] inline-flex justify-center items-center shadow-xl text-blue-500 mb-12">
                            <i class="fas fa-random"></i>
                        </div>
                        <h4 class="text-2xl font-medium mb-6">Content Marketing</h4>
                        <p class="opacity-80 tracking-wider">
                            Assumenda non repellendus distinctio nihil dicta sapiente, quibusdam maiores, illum at,
                            blanditiis
                            eligendi qui.
                        </p>
                    </div>
                </div>
                <div class="col-span-4 md:col-span-2 lg:col-span-1">
                    <div class="xl:p-6">
                        <div
                            class="w-[75px] h-[75px] rounded-full text-[32px] inline-flex justify-center items-center shadow-xl text-yellow-500 mb-12">
                            <i class="fas fa-camera"></i>
                        </div>
                        <h4 class="text-2xl font-medium mb-6">Digital Strategy</h4>
                        <p class="opacity-80 tracking-wider">
                            Assumenda non repellendus distinctio nihil dicta sapiente, quibusdam maiores, illum at,
                            blanditiis
                            eligendi qui.
                        </p>
                    </div>
                </div>
                <div class="col-span-4 md:col-span-2 lg:col-span-1">
                    <div class="xl:p-6">
                        <div
                            class="w-[75px] h-[75px] rounded-full text-[32px] inline-flex justify-center items-center shadow-xl text-blue-500 mb-12">
                            <i class="fas fa-random"></i>
                        </div>
                        <h4 class="text-2xl font-medium mb-6">Content Marketing</h4>
                        <p class="opacity-80 tracking-wider">
                            Assumenda non repellendus distinctio nihil dicta sapiente, quibusdam maiores, illum at,
                            blanditiis
                            eligendi qui.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
<?php /**PATH D:\Coding\Project 4 matklul\Vitalife-1\resources\views\user\service.blade.php ENDPATH**/ ?>