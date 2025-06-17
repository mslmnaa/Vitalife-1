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
        <div class="bg-gray-100 rounded-2xl shadow-lg w-full max-w-5xl p-8">
            <form action="<?php echo e(route('spa.index')); ?>" method="GET">
                <div class="flex justify-between items-center mb-6 w-full">
                    <!-- Spa Place Search -->
                    <div class="flex-grow mr-4">
                        <input type="text" name="location" id="location"
                            class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600"
                            placeholder="Search spa by location" value="<?php echo e(request('location')); ?>" />
                    </div>

                    <!-- Search Button -->
                    <div>
                        <button type="submit"
                            class="bg-blue-600 text-white rounded-md py-1.5 px-6 text-sm hover:bg-blue-700 transition duration-300">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                                <span class="text-sm">Search</span>
                            </div>
                        </button>
                    </div>
                </div>

                <div class="flex flex-wrap justify-start items-center w-full gap-4">
                    <!-- Price range filter -->
                    <div class="flex justify-start items-center w-full space-x-4">
                        <label for="min-price" class="text-sm font-medium text-gray-700">Price Range:</label>
                        <input type="number" id="min-price" name="min_price"
                            class="rounded-md border-0 py-1.5 px-3 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600"
                            placeholder="Min" value="<?php echo e(request('min_price')); ?>" />
                        <span class="text-gray-500">-</span>
                        <input type="number" id="max-price" name="max_price"
                            class="rounded-md border-0 py-1.5 px-3 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600"
                            placeholder="Max" value="<?php echo e(request('max_price')); ?>" />
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="flex justify-center items-center">
        <div class="font-sans w-full max-w-5xl">
            <?php $__currentLoopData = $spaTotal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $spa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="container mx-auto py-6 grid grid-cols-7 gap-6">
                    <div class="col-span-5 bg-white rounded-lg shadow-2xl p-14">
                        <div class="flex">
                            <div class="flex items-center border-b border-gray-500 pb-2">
                                <div class="w-16 h-16 rounded-full bg-gray-200 mr-6 overflow-hidden">
                                    <img src="<?php echo e(asset($spa->image)); ?>" alt="spa"
                                        class="object-cover w-full h-full">
                                </div>
                                <div>
                                    <h2 class="text-2xl font-bold"><?php echo e($spa->nama); ?></h2>
                                    <p class="text-gray-500 text-lg">Relaxation</p>
                                    <p class="text-gray-500 text-lg">16 years experience overall</p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-6">
                            <p class="text-gray-500 text-lg">Alamat: <?php echo e($spa->alamat); ?></p>
                            <p class="text-gray-500 text-lg">No. HP: <?php echo e($spa->noHP); ?></p>
                        </div>
                        <div class="mt-6">
                            <p class="text-gray-500 text-lg">Harga: Rp <?php echo e(number_format($spa->harga, 0, ',', '.')); ?>

                            </p>
                        </div>
                        <div class="mt-6 flex justify-start">
                            <button
                                class="scheduleBtn bg-orange-500 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded">
                                Schedule
                            </button>
                        </div>

                        <!-- Available -->
                        <div class="scheduleInfo mt-10 hidden">
                            <h3 class="text-xl font-bold mb-4">Waktu Buka</h3>
                            <div class="grid grid-cols-3 gap-4">
                                <?php $__currentLoopData = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hari): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(isset($spa->waktuBuka[$hari]) && !empty($spa->waktuBuka[$hari])): ?>
                                        <div class="text-center bg-gray-50 p-3 rounded-lg">
                                            <p class="text-lg font-semibold text-gray-700"><?php echo e($hari); ?></p>
                                            <p class="text-md text-gray-500"><?php echo e($spa->waktuBuka[$hari]); ?></p>
                                        </div>
                                    <?php else: ?>
                                        <div class="text-center bg-gray-50 p-3 rounded-lg">
                                            <p class="text-lg font-semibold text-gray-700"><?php echo e($hari); ?></p>
                                            <p class="text-md text-gray-500">Tutup</p>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-2">
                        <h2 class="text-2xl font-bold mb-6">Lokasi Maps</h2>
                        <?php if($spa->maps): ?>
                            <iframe
                                src="<?php echo e($spa->maps); ?>"
                                width="100%" height="400" style="border: none" allowFullScreen="" loading="lazy"
                                referrerPolicy="no-referrer-when-downgrade"></iframe>
                        <?php else: ?>
                            <p>Tidak ada peta tersedia untuk lokasi ini.</p>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const scheduleBtns = document.querySelectorAll('.scheduleBtn');

        scheduleBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                const scheduleInfo = this.closest('.col-span-5').querySelector('.scheduleInfo');
                scheduleInfo.classList.toggle('hidden');

                if (scheduleInfo.classList.contains('hidden')) {
                    this.textContent = 'Schedule';
                } else {
                    this.textContent = 'Close Schedule';
                }
            });
        });

        // Cek status pencarian
        const searchStatus = '<?php echo e(session('search_status')); ?>';
        const searchQuery = '<?php echo e(session('search_query')); ?>';

        if (searchStatus === 'success') {
            Swal.fire({
                title: 'Spa Ditemukan!',
                text: `Hasil pencarian untuk ${searchQuery}`,
                icon: 'success',
                confirmButtonText: 'OK'
            });
        } else if (searchStatus === 'not_found') {
            Swal.fire({
                title: 'Spa Tidak Ditemukan',
                text: `Tidak ada hasil untuk pencarian dengan kriteria: ${searchQuery}`,
                icon: 'error',
                confirmButtonText: 'OK'
            });
        }
    });
</script>
<?php /**PATH D:\Coding\Project 4 matklul\Vitalife-1\resources\views\user\spa.blade.php ENDPATH**/ ?>