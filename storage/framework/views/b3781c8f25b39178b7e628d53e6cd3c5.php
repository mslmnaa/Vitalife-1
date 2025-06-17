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
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-white leading-tight">
            <?php echo e($medicine->nama); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="glass-panel p-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Image -->
                    <div>
                        <?php if($medicine->image): ?>
                            <img src="<?php echo e($medicine->image_url); ?>" alt="<?php echo e($medicine->nama); ?>" 
                                 class="w-full h-96 object-cover rounded-lg shadow-lg">
                        <?php else: ?>
                            <div class="w-full h-96 bg-gradient-to-br from-blue-500 to-purple-600 rounded-lg flex items-center justify-center shadow-lg">
                                <i class="fas fa-pills text-8xl text-white"></i>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Details -->
                    <div>
                        <h1 class="text-3xl font-bold text-black mb-4"><?php echo e($medicine->nama); ?></h1>
                        
                        <div class="space-y-4 mb-6">
                            <div>
                                <span class="text-black-300">Kategori:</span>
                                <span class="inline-block bg-blue-600 bg-opacity-20 text-blue-400 px-3 py-1 rounded-full text-sm ml-2">
                                    <?php echo e($medicine->kategori); ?>

                                </span>
                            </div>

                            <div>
                                <span class="text-black-300">Produsen:</span>
                                <span class="inline-block bg-purple-600 bg-opacity-20 text-purple-400 px-3 py-1 rounded-full text-sm ml-2">
                                    <?php echo e($medicine->produsen); ?>

                                </span>
                            </div>
                            
                            <!-- <div>
                                <span class="text-black-300">Harga:</span>
                                <span class="text-green-400 font-bold text-2xl ml-2"><?php echo e($medicine->formatted_price); ?></span>
                            </div> -->
                            
                            <!-- <div>
                                <span class="text-black-300">Stok:</span>
                                <span class="text-black font-semibold ml-2"><?php echo e($medicine->stok); ?> unit</span>
                                <span class="inline-block px-2 py-1 rounded-full text-xs ml-2
                                    <?php if($medicine->stock_status_color == 'green'): ?> bg-green-600 bg-opacity-20 text-green-400
                                    <?php elseif($medicine->stock_status_color == 'yellow'): ?> bg-yellow-600 bg-opacity-20 text-yellow-400
                                    <?php else: ?> bg-red-600 bg-opacity-20 text-red-400 <?php endif; ?>">
                                    <?php echo e($medicine->stock_status); ?>

                                </span>
                            </div> -->

                            <!-- <div>
                                <span class="text-black-300">Tanggal Kadaluarsa:</span>
                                <span class="text-black ml-2"><?php echo e($medicine->tanggal_kadaluarsa->format('d M Y')); ?></span>
                                <span class="inline-block px-2 py-1 rounded-full text-xs ml-2
                                    <?php if($medicine->expiry_status_color == 'green'): ?> bg-green-600 bg-opacity-20 text-green-400
                                    <?php elseif($medicine->expiry_status_color == 'red'): ?> bg-yellow-600 bg-opacity-20 text-yellow-400
                                    <?php else: ?> bg-red-600 bg-opacity-20 text-red-400 <?php endif; ?>">
                                    <?php echo e($medicine->expiry_status); ?>

                                </span>
                            </div> -->

                            <!-- <?php if($medicine->days_until_expiry > 0): ?>
                                <div>
                                    <span class="text-black-300">Sisa Hari:</span>
                                    <span class="text-black ml-2"><?php echo e($medicine->days_until_expiry); ?> hari lagi</span>
                                </div>
                            <?php endif; ?>
                        </div> -->

                        <div class="mb-6">
                            <h3 class="text-lg font-semibold text-black mb-2">Deskripsi</h3>
                            <p class="text-black-300 leading-relaxed"><?php echo e($medicine->deskripsi); ?></p>
                        </div>

                        <div class="flex gap-4">
                            <?php if($medicine->isAvailable() && !$medicine->isExpired()): ?>
                                <button class="flex-1 bg-green-600 hover:bg-green-700 text-white py-3 rounded-lg transition-colors font-semibold"
                                        onclick="alert('Fitur pembelian akan segera tersedia!')">
                                    <i class="fas fa-shopping-cart mr-2"></i>Beli Sekarang
                                </button>
                            <?php else: ?>
                                <button disabled class="flex-1 bg-black-600 text-black-400 py-3 rounded-lg cursor-not-allowed font-semibold">
                                    <i class="fas fa-times mr-2"></i>
                                    <?php if($medicine->isExpired()): ?> 
                                        Obat Kadaluarsa
                                    <?php else: ?> 
                                        Stok Habis
                                    <?php endif; ?>
                                </button>
                            <?php endif; ?>
                            <a href="<?php echo e(route('user.medicines.index')); ?>" class="px-6 py-3 bg-black-600 hover:bg-black-700 text-black rounded-lg transition-colors">
                                <i class="fas fa-arrow-left mr-2"></i>Kembali
                            </a>
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
<?php endif; ?>
<?php /**PATH D:\Coding\Project 4 matklul\Vitalife-1\resources\views\user\medicines\show.blade.php ENDPATH**/ ?>