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
    <div class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-green-50 py-12 mt-16">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="text-center mb-12">
                <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-r from-blue-500 to-green-500 rounded-full mb-6 shadow-lg">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                    </svg>
                </div>
                <h1 class="text-5xl font-bold bg-gradient-to-r from-blue-600 to-green-600 bg-clip-text text-transparent mb-4">
                    Available Vouchers
                </h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
Get great discounts on the best healthcare services. Save more with our exclusive vouchers!                </p>
            </div>
            
            <?php if(session('success')): ?>
            <div class="max-w-4xl mx-auto mb-8">
                <div class="bg-gradient-to-r from-green-400 to-green-500 text-white px-6 py-4 rounded-xl shadow-lg border-l-4 border-green-600" role="alert">
                    <div class="flex items-center">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="font-medium"><?php echo e(session('success')); ?></span>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <!-- Vouchers Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php $__empty_1 = true; $__currentLoopData = $vouchers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $voucher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden border border-gray-100 hover:border-blue-200 transform hover:-translate-y-2">
                        <!-- Voucher Image -->
                        <div class="relative overflow-hidden">
                            <img src="<?php echo e(asset($voucher->image)); ?>" alt="<?php echo e($voucher->code); ?>" 
                                 class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-300">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            
                            <!-- Discount Badge -->
                            <div class="absolute top-4 right-4">
                                <div class="bg-gradient-to-r from-red-500 to-pink-500 text-white px-4 py-2 rounded-full font-bold text-sm shadow-lg transform rotate-3">
                                    <?php echo e($voucher->discount_percentage); ?>% OFF
                                </div>
                            </div>
                        </div>
                        
                        <!-- Voucher Content -->
                        <div class="p-6">
                            <!-- Voucher Code -->
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                                    <?php echo e($voucher->code); ?>

                                </h3>
                                <div class="flex items-center space-x-1">
                                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                    <span class="text-sm text-gray-500 font-medium">Premium</span>
                                </div>
                            </div>
                            
                            <!-- Description -->
                            <p class="text-gray-700 mb-6 leading-relaxed"><?php echo e($voucher->description); ?></p>
                            
                            <!-- Voucher Details -->
                            <div class="space-y-3 mb-6">
                                <!-- Expiry Date -->
                                <div class="flex items-center text-sm">
                                    <svg class="w-4 h-4 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    <?php if($voucher->expired_at): ?>
                                        <span class="text-gray-600">Berlaku hingga: <span class="font-semibold text-red-600"><?php echo e(date('d M Y', strtotime($voucher->expired_at))); ?></span></span>
                                    <?php else: ?>
                                        <span class="text-green-600 font-semibold">Tidak ada batas waktu</span>
                                    <?php endif; ?>
                                </div>
                                
                                <!-- Usage Count -->
                                <div class="flex items-center text-sm">
                                    <svg class="w-4 h-4 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                    <span class="text-gray-600">
                                        Digunakan <span class="font-semibold text-blue-600"><?php echo e($voucher->usage_count); ?></span>
                                        <?php if($voucher->usage_limit): ?>
                                            / <?php echo e($voucher->usage_limit); ?>

                                        <?php endif; ?>
                                        kali
                                    </span>
                                </div>
                            </div>
                            
                            <!-- Action Button -->
                            <button class="copy-code w-full bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 text-white font-semibold py-3 px-6 rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl flex items-center justify-center space-x-2" 
                                    data-code="<?php echo e($voucher->code); ?>">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                </svg>
                                <span>Salin Kode Voucher</span>
                            </button>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="col-span-3">
                        <div class="text-center py-20">
                            <div class="inline-flex items-center justify-center w-24 h-24 bg-gray-100 rounded-full mb-6">
                                <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                </svg>
                            </div>
                            <h3 class="text-2xl font-semibold text-gray-700 mb-2">Belum Ada Voucher</h3>
                            <p class="text-gray-500 text-lg">Voucher akan segera tersedia. Pantau terus halaman ini!</p>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            
            <!-- Call to Action Section -->
            <!-- <div class="mt-16 text-center">
                <div class="bg-gradient-to-r from-blue-500 to-purple-600 rounded-2xl p-8 shadow-2xl">
                    <h2 class="text-3xl font-bold text-white mb-4">Dapatkan Notifikasi Voucher Terbaru</h2>
                    <p class="text-blue-100 text-lg mb-6">Jangan lewatkan promo dan voucher eksklusif dari kami</p>
                    <button class="bg-white text-blue-600 font-semibold py-3 px-8 rounded-xl hover:bg-gray-100 transition-colors duration-300 shadow-lg">
                        Berlangganan Notifikasi
                    </button>
                </div>
            </div> -->
        </div>
    </div>

    <?php echo $__env->make('layouts.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <style>
        @keyframes pulse-soft {
            0%, 100% {
                opacity: 1;
            }
            50% {
                opacity: 0.8;
            }
        }
        
        .animate-pulse-soft {
            animation: pulse-soft 2s ease-in-out infinite;
        }
        
        @keyframes bounce-subtle {
            0%, 100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-5px);
            }
        }
        
        .animate-bounce-subtle {
            animation: bounce-subtle 2s ease-in-out infinite;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const copyButtons = document.querySelectorAll('.copy-code');
            
            copyButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const code = this.getAttribute('data-code');
                    navigator.clipboard.writeText(code).then(() => {
                        // Show success feedback
                        const originalHTML = this.innerHTML;
                        this.innerHTML = `
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Berhasil Disalin!</span>
                        `;
                        
                        // Change styling
                        this.classList.remove('from-blue-500', 'to-purple-600', 'hover:from-blue-600', 'hover:to-purple-700');
                        this.classList.add('from-green-500', 'to-green-600', 'animate-pulse-soft');
                        
                        // Reset button after 3 seconds
                        setTimeout(() => {
                            this.innerHTML = originalHTML;
                            this.classList.remove('from-green-500', 'to-green-600', 'animate-pulse-soft');
                            this.classList.add('from-blue-500', 'to-purple-600', 'hover:from-blue-600', 'hover:to-purple-700');
                        }, 3000);
                    }).catch(err => {
                        console.error('Could not copy text: ', err);
                        // Show error feedback
                        const originalHTML = this.innerHTML;
                        this.innerHTML = `
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span>Gagal Menyalin</span>
                        `;
                        
                        this.classList.remove('from-blue-500', 'to-purple-600');
                        this.classList.add('from-red-500', 'to-red-600');
                        
                        setTimeout(() => {
                            this.innerHTML = originalHTML;
                            this.classList.remove('from-red-500', 'to-red-600');
                            this.classList.add('from-blue-500', 'to-purple-600');
                        }, 3000);
                    });
                });
            });
            
            // Add scroll animations
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-bounce-subtle');
                    }
                });
            }, observerOptions);
            
            document.querySelectorAll('.group').forEach(card => {
                observer.observe(card);
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
<?php endif; ?><?php /**PATH D:\Coding\Project 4 matklul\Vitalife-1\resources\views/user/vouchers/index.blade.php ENDPATH**/ ?>