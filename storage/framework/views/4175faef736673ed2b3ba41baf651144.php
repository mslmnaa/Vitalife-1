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
    <div class="flex justify-center items-center pt-24">
        <div class="bg-gray-100 rounded-2xl shadow-lg w-full max-w-4xl p-8">
            <!-- Search form -->
            <form action="<?php echo e(route('spesialis')); ?>" method="GET" class="space-y-6">
                <!-- Location input (change to name search) -->
                <div class="flex justify-start items-center w-full">
                    <div class="flex-grow mr-4">
                        <input type="text" name="nama" id="nama"
                            class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600"
                            placeholder="Enter specialist name" value="<?php echo e(request('nama')); ?>" />
                    </div>
                    <button type="submit" class="bg-blue-600 text-white rounded-md py-2 px-6 text-sm flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                        <span>Search</span>
                    </button>
                </div>

                <!-- Price range filter -->
                <div class="flex justify-start items-center w-full space-x-4">
                    <label for="min_price" class="text-sm font-medium text-gray-700">Price Range:</label>
                    <input type="number" id="min_price" name="min_price"
                        class="rounded-md border-0 py-1.5 px-3 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600"
                        placeholder="Min" value="<?php echo e(request('min_price')); ?>" />
                    <span class="text-gray-500">-</span>
                    <input type="number" id="max_price" name="max_price"
                        class="rounded-md border-0 py-1.5 px-3 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600"
                        placeholder="Max" value="<?php echo e(request('max_price')); ?>" />
                </div>
            </form>
        </div>
    </div>
    <div class="flex items-center pl-48 pt-8">
        <h3 class="text-3xl font-bold text-gray-800">Spesialist</h3>
    </div>

    <div class="flex justify-center items-start mt-8 mx-auto px-48 mb-10">
        <div class="bg-white border rounded-lg p-8 mr-8 w-64">
            <h2 class="font-bold mb-4 text-lg">Location</h2>
            <hr class="w-full border-gray-300 mb-4" />
            <div class="space-y-2 text-sm">
                <div class="flex items-center">
                    <input type="radio" id="yogyakarta" name="location" value="Yogyakarta" class="mr-2" />
                    <label for="yogyakarta">Yogyakarta</label>
                </div>
                <div class="flex items-center">
                    <input type="radio" id="sleman" name="location" value="Sleman" class="mr-2" />
                    <label for="sleman">Sleman</label>
                </div>
                <div class="flex items-center">
                    <input type="radio" id="bantul" name="location" value="Bantul" class="mr-2" />
                    <label for="bantul">Bantul</label>
                </div>
                <div class="flex items-center">
                    <input type="radio" id="kulon-progo" name="location" value="Kulon Progo" class="mr-2" />
                    <label for="kulon-progo">Kulon Progo</label>
                </div>
                <div class="flex items-center">
                    <input type="radio" id="Gunung Kidul" name="location" value="Gunung Kidul" class="mr-2" />
                    <label for="Gunung Kidul">Gunung Kidul</label>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-lg shadow-2xl p-8 w-full max-w-5xl mx-auto">
            <?php $__currentLoopData = $spesFilter; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $spesialis): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="flex flex-col md:flex-row items-center md:items-start border rounded-lg p-6 mb-6">
                <div
                    class="w-24 h-24 md:w-32 md:h-32 rounded-full bg-gray-200 mb-4 md:mb-0 md:mr-8 overflow-hidden flex-shrink-0">
                    <img src="<?php echo e(asset($spesialis->image)); ?>" alt="Profile Picture" class="w-full h-full object-cover">
                </div>
                <div class="flex-grow text-center md:text-left">
                    <h2 class="text-2xl font-bold mb-2"><?php echo e($spesialis->nama); ?></h2>
                    <p class="text-gray-600 text-xl mb-1"><?php echo e($spesialis->Anatomy); ?></p>
                    <p class="text-gray-600 text-lg font-semibold mb-1"><?php echo e($spesialis->spesialisasi); ?></p>
                    <p class="text-gray-600 text-sm"><?php echo e($spesialis->tempatTugas); ?></p>
                    <p class="text-gray-600 text-sm"><?php echo e($spesialis->alamat); ?></p>
                </div>
                <div class="mt-4 md:mt-0 md:ml-8 text-center md:text-right">
                    <p class="text-gray-800 text-xl font-semibold mb-3">
                        Rp.<?php echo e(number_format($spesialis->harga, 0, ',', '.')); ?>

                    </p>
                    <a href="<?php echo e(route('spesialis.bayar', ['id_spesialis' => $spesialis->id_spesialis])); ?>"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded text-base inline-block">
                        Bayar
                    </a>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        

    </div>
    <hr class="w-full border-gray-300 mb-6" />
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
<?php endif; ?><?php /**PATH D:\Coding\Project 4 matklul\Vitalife-1\resources\views\user\spesialisFilter.blade.php ENDPATH**/ ?>