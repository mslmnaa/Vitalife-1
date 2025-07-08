<?php $__env->startSection('judul-halaman', 'Medicine Management'); ?>

<?php $__env->startSection('content'); ?>
<div class="min-h-screen bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <!-- Header Section -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 mb-6">
            <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-6">
                <!-- Logo and Title -->
                <div class="flex items-center">
                    <div class="bg-blue-600 rounded-lg p-3 mr-4">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2L2 7v10c0 5.55 3.84 9.74 9 11 5.16-1.26 9-5.45 9-11V7l-10-5zM12 11h4v2h-4v4h-2v-4H6v-2h4V7h2v4z"/>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-2xl sm:text-3xl font-bold text-gray-900">MedicineManager</h1>
                        <p class="text-sm text-gray-600">Medicine Inventory System</p>
                    </div>
                </div>
                
                <!-- Stats Cards -->
                <div class="grid grid-cols-3 gap-3 sm:gap-4 w-full lg:w-auto">
                    <div class="bg-green-50 border border-green-200 rounded-lg p-3 text-center">
                        <div class="text-lg sm:text-2xl font-bold text-green-700"><?php echo e($medicines->count()); ?></div>
                        <div class="text-xs sm:text-sm text-green-600">Total</div>
                    </div>
                    <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-3 text-center">
                        <div class="text-lg sm:text-2xl font-bold text-yellow-700"><?php echo e($medicines->where('stok', '<=', 10)->count()); ?></div>
                        <div class="text-xs sm:text-sm text-yellow-600">Low Stock</div>
                    </div>
                    <div class="bg-red-50 border border-red-200 rounded-lg p-3 text-center">
                        <div class="text-lg sm:text-2xl font-bold text-red-700"><?php echo e($medicines->filter(function($m) { return $m->tanggal_kadaluarsa->isPast(); })->count()); ?></div>
                        <div class="text-xs sm:text-sm text-red-600">Expired</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Bar -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-4 sm:p-6 mb-6">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                <div class="flex items-center gap-3">
                    <h2 class="text-lg sm:text-xl font-semibold text-gray-900">Medicine Inventory</h2>
                    <button class="flex items-center gap-2 px-3 py-2 text-sm bg-gray-100 hover:bg-gray-200 rounded-lg transition-colors" 
                            onclick="toggleDropdown('filterDropdown')">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 2v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                        </svg>
                        <span class="hidden sm:inline">Filter</span>
                    </button>
                </div>

                <div class="flex items-center gap-3 w-full sm:w-auto">
                    <!-- Search Bar -->
                    <div class="relative flex-1 sm:flex-initial">
                        <input type="text" placeholder="Search medicines..." 
                            class="w-full sm:w-64 pl-10 pr-4 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <svg class="absolute left-3 top-2.5 w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>

                    <!-- Add Button -->
                    <a href="<?php echo e(route('admin.medicines.create')); ?>"
                       class="flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-medium px-4 py-2 rounded-lg transition-colors whitespace-nowrap">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        <span class="hidden sm:inline">Add Medicine</span>
                        <span class="sm:hidden">Add</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Success Message -->
        <?php if(session('success')): ?>
            <div class="bg-green-50 border border-green-200 rounded-lg p-4 mb-6">
                <div class="flex items-center">
                    <svg class="w-5 h-5 text-green-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="text-green-800 font-medium"><?php echo e(session('success')); ?></span>
                </div>
            </div>
        <?php endif; ?>

        <!-- Table Section -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
            <!-- Mobile Cards View (hidden on desktop) -->
            <div class="lg:hidden">
                <?php $__empty_1 = true; $__currentLoopData = $medicines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $medicine): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="border-b border-gray-200 p-4">
                        <div class="flex items-start justify-between mb-3">
                            <div class="flex items-center">
                                <?php if($medicine->image): ?>
                                    <img class="h-12 w-12 rounded-lg object-cover" 
                                         src="<?php echo e(asset($medicine->image)); ?>" 
                                         alt="<?php echo e($medicine->nama); ?>"
                                         onclick="showImageModal('<?php echo e(asset($medicine->image)); ?>', '<?php echo e($medicine->nama); ?>')">
                                <?php else: ?>
                                    <div class="h-12 w-12 rounded-lg bg-gray-200 flex items-center justify-center">
                                        <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                <?php endif; ?>
                                <div class="ml-3">
                                    <div class="font-medium text-gray-900"><?php echo e($medicine->nama); ?></div>
                                    <div class="text-sm text-gray-500"><?php echo e($medicine->formatted_price); ?></div>
                                </div>
                            </div>
                            <div class="flex gap-2">
                                <a href="<?php echo e(route('admin.medicines.show', $medicine->id_medicine)); ?>"
                                   class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                </a>
                                <a href="<?php echo e(route('admin.medicines.edit', $medicine->id_medicine)); ?>"
                                   class="p-2 text-green-600 hover:bg-green-50 rounded-lg">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                </a>
                                <button onclick="showDeleteModal('<?php echo e($medicine->id_medicine); ?>', '<?php echo e(addslashes($medicine->nama)); ?>')"
                                        class="p-2 text-red-600 hover:bg-red-50 rounded-lg">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-2 gap-3 text-sm">
                            <div>
                                <span class="text-gray-500">Category:</span>
                                <span class="ml-1 px-2 py-1 text-xs rounded-full 
                                    <?php echo e($medicine->kategori == 'Antibiotik' ? 'bg-red-100 text-red-800' : 
                                    ($medicine->kategori == 'Vitamin' ? 'bg-green-100 text-green-800' : 
                                    ($medicine->kategori == 'Analgesik' ? 'bg-purple-100 text-purple-800' : 'bg-blue-100 text-blue-800'))); ?>">
                                    <?php echo e($medicine->kategori); ?>

                                </span>
                            </div>
                            <div>
                                <span class="text-gray-500">Stock:</span>
                                <span class="ml-1 font-medium"><?php echo e($medicine->stok); ?></span>
                            </div>
                            <div>
                                <span class="text-gray-500">Expiry:</span>
                                <span class="ml-1"><?php echo e($medicine->tanggal_kadaluarsa->format('d/m/Y')); ?></span>
                            </div>
                            <div>
                                <span class="text-gray-500">Producer:</span>
                                <span class="ml-1"><?php echo e($medicine->produsen); ?></span>
                            </div>
                        </div>
                        
                        <div class="flex gap-2 mt-3">
                            <span class="px-2 py-1 text-xs rounded-full 
                                <?php if($medicine->stock_status == 'Habis'): ?> bg-red-100 text-red-800
                                <?php elseif($medicine->stock_status == 'Stok Menipis'): ?> bg-yellow-100 text-yellow-800
                                <?php else: ?> bg-green-100 text-green-800 <?php endif; ?>">
                                <?php if($medicine->stock_status == 'Habis'): ?> Out of Stock
                                <?php elseif($medicine->stock_status == 'Stok Menipis'): ?> Low Stock
                                <?php else: ?> Available <?php endif; ?>
                            </span>
                            <span class="px-2 py-1 text-xs rounded-full 
                                <?php if($medicine->expiry_status == 'Kadaluarsa'): ?> bg-red-100 text-red-800
                                <?php elseif($medicine->expiry_status == 'Akan Kadaluarsa'): ?> bg-yellow-100 text-yellow-800
                                <?php else: ?> bg-green-100 text-green-800 <?php endif; ?>">
                                <?php if($medicine->expiry_status == 'Kadaluarsa'): ?> Expired
                                <?php elseif($medicine->expiry_status == 'Akan Kadaluarsa'): ?> Expiring Soon
                                <?php else: ?> Valid <?php endif; ?>
                            </span>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="p-8 text-center">
                        <div class="bg-gray-100 rounded-full p-6 w-20 h-20 mx-auto mb-4">
                            <svg class="w-8 h-8 text-gray-400 mx-auto mt-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">No medicines found</h3>
                        <p class="text-gray-500 mb-4">Get started by adding your first medicine.</p>
                        <a href="<?php echo e(route('admin.medicines.create')); ?>" 
                           class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition-colors">
                            Add Medicine
                        </a>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Desktop Table View (hidden on mobile) -->
            <div class="hidden lg:block overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Medicine</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Stock</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Expiry</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Producer</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <?php $__empty_1 = true; $__currentLoopData = $medicines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $medicine): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <?php if($medicine->image): ?>
                                            <img class="h-10 w-10 rounded-lg object-cover cursor-pointer" 
                                                 src="<?php echo e(asset($medicine->image)); ?>" 
                                                 alt="<?php echo e($medicine->nama); ?>"
                                                 onclick="showImageModal('<?php echo e(asset($medicine->image)); ?>', '<?php echo e($medicine->nama); ?>')">
                                        <?php else: ?>
                                            <div class="h-10 w-10 rounded-lg bg-gray-200 flex items-center justify-center">
                                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                </svg>
                                            </div>
                                        <?php endif; ?>
                                        <div class="ml-3">
                                            <div class="text-sm font-medium text-gray-900"><?php echo e($medicine->nama); ?></div>
                                            <div class="text-sm text-gray-500">ID: <?php echo e($medicine->id_medicine); ?></div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm font-medium text-green-600"><?php echo e($medicine->formatted_price); ?></td>
                                <td class="px-6 py-4">
                                    <span class="px-2 py-1 text-xs font-medium rounded-full 
                                        <?php echo e($medicine->kategori == 'Antibiotik' ? 'bg-red-100 text-red-800' : 
                                        ($medicine->kategori == 'Vitamin' ? 'bg-green-100 text-green-800' : 
                                        ($medicine->kategori == 'Analgesik' ? 'bg-purple-100 text-purple-800' : 'bg-blue-100 text-blue-800'))); ?>">
                                        <?php echo e($medicine->kategori); ?>

                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900"><?php echo e($medicine->stok); ?> units</div>
                                    <span class="px-2 py-1 text-xs font-medium rounded-full 
                                        <?php if($medicine->stock_status == 'Habis'): ?> bg-red-100 text-red-800
                                        <?php elseif($medicine->stock_status == 'Stok Menipis'): ?> bg-yellow-100 text-yellow-800
                                        <?php else: ?> bg-green-100 text-green-800 <?php endif; ?>">
                                        <?php if($medicine->stock_status == 'Habis'): ?> Out of Stock
                                        <?php elseif($medicine->stock_status == 'Stok Menipis'): ?> Low Stock
                                        <?php else: ?> Available <?php endif; ?>
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900"><?php echo e($medicine->tanggal_kadaluarsa->format('d/m/Y')); ?></div>
                                    <span class="px-2 py-1 text-xs font-medium rounded-full 
                                        <?php if($medicine->expiry_status == 'Kadaluarsa'): ?> bg-red-100 text-red-800
                                        <?php elseif($medicine->expiry_status == 'Akan Kadaluarsa'): ?> bg-yellow-100 text-yellow-800
                                        <?php else: ?> bg-green-100 text-green-800 <?php endif; ?>">
                                        <?php if($medicine->expiry_status == 'Kadaluarsa'): ?> Expired
                                        <?php elseif($medicine->expiry_status == 'Akan Kadaluarsa'): ?> Expiring Soon
                                        <?php else: ?> Valid <?php endif; ?>
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-900"><?php echo e($medicine->produsen); ?></td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-2">
                                        <a href="<?php echo e(route('admin.medicines.show', $medicine->id_medicine)); ?>"
                                           class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors" title="View">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                            </svg>
                                        </a>
                                        <a href="<?php echo e(route('admin.medicines.edit', $medicine->id_medicine)); ?>"
                                           class="p-2 text-green-600 hover:bg-green-50 rounded-lg transition-colors" title="Edit">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                            </svg>
                                        </a>
                                        <button onclick="showDeleteModal('<?php echo e($medicine->id_medicine); ?>', '<?php echo e(addslashes($medicine->nama)); ?>')"
                                                class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition-colors" title="Delete">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="7" class="px-6 py-12 text-center">
                                    <div class="bg-gray-100 rounded-full p-6 w-20 h-20 mx-auto mb-4">
                                        <svg class="w-8 h-8 text-gray-400 mx-auto mt-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                                        </svg>
                                    </div>
                                    <h3 class="text-lg font-medium text-gray-900 mb-2">No medicines found</h3>
                                    <p class="text-gray-500 mb-4">Get started by adding your first medicine to the inventory.</p>
                                    <a href="<?php echo e(route('admin.medicines.create')); ?>" 
                                       class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition-colors">
                                        Add Your First Medicine
                                    </a>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden p-4">
    <div class="bg-white rounded-lg shadow-xl max-w-md w-full">
        <div class="p-6">
            <div class="flex items-center justify-center w-12 h-12 mx-auto bg-red-100 rounded-full mb-4">
                <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                </svg>
            </div>
            <h3 class="text-lg font-medium text-gray-900 text-center mb-2">Delete Medicine</h3>
            <p class="text-gray-600 text-center mb-6">Are you sure you want to delete <span id="medicineName" class="font-medium"></span>? This action cannot be undone.</p>
            
            <div class="flex gap-3">
                <button onclick="hideDeleteModal()" 
                        class="flex-1 px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors">
                    Cancel
                </button>
                <form id="deleteForm" method="POST" class="flex-1">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" 
                            class="w-full px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Image Modal -->
<div id="imageModal" class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-50 hidden p-4">
    <div class="relative max-w-4xl max-h-full">
        <button onclick="hideImageModal()" 
                class="absolute -top-10 right-0 text-white hover:text-gray-300 transition-colors">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
        <img id="modalImage" src="" alt="" class="max-w-full max-h-full rounded-lg">
        <div class="text-center mt-4">
            <h3 id="modalImageTitle" class="text-white text-lg font-medium"></h3>
        </div>
    </div>
</div>

<script>
    function showDeleteModal(id, name) {
        document.getElementById('medicineName').textContent = name;
        document.getElementById('deleteForm').action = `/admin/medicines/${id}`;
        document.getElementById('deleteModal').classList.remove('hidden');
    }

    function hideDeleteModal() {
        document.getElementById('deleteModal').classList.add('hidden');
    }

    function showImageModal(src, title) {
        document.getElementById('modalImage').src = src;
        document.getElementById('modalImageTitle').textContent = title;
        document.getElementById('imageModal').classList.remove('hidden');
    }

    function hideImageModal() {
        document.getElementById('imageModal').classList.add('hidden');
    }

    function toggleDropdown(id) {
        console.log('Toggle dropdown:', id);
    }

    // Close modals when clicking outside
    document.addEventListener('click', function(event) {
        const deleteModal = document.getElementById('deleteModal');
        const imageModal = document.getElementById('imageModal');
        
        if (event.target === deleteModal) {
            hideDeleteModal();
        }
        if (event.target === imageModal) {
            hideImageModal();
        }
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Coding\Project 4 matklul\Vitalife-1\resources\views/admin/medicines/index.blade.php ENDPATH**/ ?>