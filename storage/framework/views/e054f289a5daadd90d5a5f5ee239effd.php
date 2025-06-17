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
            <form action="<?php echo e(route('search.events')); ?>" method="GET">
                <div class="flex justify-between items-center mb-6 w-full">
                    <!-- Pencarian Event Wisata Kesehatan -->
                    <div class="flex-grow mr-4">
                        <input type="text" name="nama_event" id="nama_event"
                            class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600"
                            placeholder="Cari event wisata kesehatan" />
                    </div>

                    <!-- Tombol Cari -->
                    <div>
                        <button type="submit"
                            class="bg-blue-600 text-white rounded-md py-1.5 px-6 text-sm hover:bg-blue-700 transition duration-300">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                                <span class="text-sm">Cari</span>
                            </div>
                        </button>
                    </div>
                </div>

                <div class="flex flex-wrap justify-start items-center w-full gap-4">
                    <!-- Filter Lokasi -->
                    <div class="w-64">
                        <select name="lokasi" id="lokasi"
                            class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-blue-600">
                            <option value="">Pilih Lokasi</option>
                            <option value="sleman">Sleman</option>
                            <option value="kota_yogyakarta">Kota Yogyakarta</option>
                            <option value="bantul">Bantul</option>
                            <option value="kulon_progo">Kulon Progo</option>
                            <option value="gunung_kidul">Gunung Kidul</option>
                        </select>
                    </div>

                    <!-- Filter Tanggal -->
                    <div class="flex space-x-2">
                        <div class="w-36">
                            <input type="date" name="tanggal_mulai" id="tanggal_mulai"
                                class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-blue-600"
                                placeholder="Tanggal Mulai" />
                        </div>
                        <div class="w-36">
                            <input type="date" name="tanggal_akhir" id="tanggal_akhir"
                                class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-blue-600"
                                placeholder="Tanggal Akhir" />
                        </div>
                    </div>

                    <!-- Filter Jenis Event Kesehatan -->
                    <div class="w-64">
                        <select name="jenis_event" id="jenis_event"
                            class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-blue-600">
                            <option value="">Jenis Event Kesehatan</option>
                            <option value="retret_yoga">Retret Yoga</option>
                            <option value="workshop_meditasi">Workshop Meditasi</option>
                            <option value="hari_spa">Hari Spa</option>
                            <option value="bootcamp_kebugaran">Bootcamp Kebugaran</option>
                            <option value="seminar_nutrisi">Seminar Nutrisi</option>
                            <option value="sesi_penyembuhan_holistik">Sesi Penyembuhan Holistik</option>
                            <option value="festival_kesehatan">Festival Kesehatan</option>
                        </select>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="flex items-center pt-8 pl-36">
        <h3 class="text-3xl font-bold text-gray-800">Event</h3>
    </div>

    <div class="flex flex-col items-center mt-8 mx-auto px-4 sm:px-6 lg:px-8 pb-4">
        <?php if($eventTotal->isEmpty()): ?>
            <p class="text-gray-600">Tidak ada event yang ditemukan.</p>
        <?php else: ?>
            <?php $__currentLoopData = $eventTotal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="bg-white border rounded-lg p-4 mb-4 w-full max-w-5xl">
                    <div class="flex flex-row items-start space-x-4">
                        <img src="<?php echo e(asset($event->image)); ?>" alt="<?php echo e($event->nama); ?>"
                            class="w-40 h-28 object-cover rounded-md flex-shrink-0" />
                        <div class="flex-1">
                            <h3 class="text-xl font-bold text-gray-900"><?php echo e($event->nama); ?></h3>
                            <p class="text-gray-600"><?php echo e($event->deskripsi); ?></p>
                            <p class="text-gray-600"><?php echo e($event->tanggal); ?></p>
                            <p class="text-gray-600"><?php echo e($event->alamat); ?></p>
                            <p class="text-gray-600"><?php echo e(number_format($event->harga, 0, ',', '.')); ?> IDR</p>
                            <div class="flex items-center space-x-2 mt-2">
                                <span class="text-green-500 font-bold"><?php echo e($event->noHP); ?></span>
                            </div>
                            <div class="mt-4 text-right">
                                
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
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
<!-- Check -->

<?php /**PATH D:\Coding\Project 4 matklul\Vitalife-1\resources\views\user\event.blade.php ENDPATH**/ ?>