<?php $__env->startSection('title', 'Pharmacy Details'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <!-- Header -->
        <div class="bg-gradient-to-r from-blue-600 to-blue-700 px-6 py-4">
            <div class="flex justify-between items-center">
                <h1 class="text-2xl font-bold text-white">
                    Pharmacy Details: <?php echo e($pharmacy->name); ?>

                </h1>
                <div class="flex space-x-3">
                    <a href="<?php echo e(route('admin.pharmacies.edit', $pharmacy)); ?>" 
                       class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg font-medium transition duration-200 flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                        Edit
                    </a>
                    <a href="<?php echo e(route('admin.pharmacies.index')); ?>" 
                       class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg font-medium transition duration-200 flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Back
                    </a>
                </div>
            </div>
        </div>
        
        <div class="p-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Basic Information -->
                <div>
                    <h2 class="text-xl font-semibold text-gray-800 mb-4 border-b border-gray-200 pb-2">
                        Basic Information
                    </h2>
                    
                    <?php if($pharmacy->image): ?>
                    <div class="mb-6 text-center">
                        <img src="<?php echo e($pharmacy->image_url); ?>" alt="<?php echo e($pharmacy->name); ?>" 
                             class="mx-auto rounded-lg shadow-md max-h-72 object-cover">
                    </div>
                    <?php endif; ?>

                    <div class="bg-gray-50 rounded-lg overflow-hidden">
                        <table class="min-w-full">
                            <tbody class="divide-y divide-gray-200">
                                <tr>
                                    <td class="px-4 py-3 text-sm font-medium text-gray-700 bg-gray-100 w-1/3">Name</td>
                                    <td class="px-4 py-3 text-sm text-gray-900"><?php echo e($pharmacy->name); ?></td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-3 text-sm font-medium text-gray-700 bg-gray-100">Address</td>
                                    <td class="px-4 py-3 text-sm text-gray-900"><?php echo e($pharmacy->address); ?></td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-3 text-sm font-medium text-gray-700 bg-gray-100">Phone</td>
                                    <td class="px-4 py-3 text-sm text-gray-900"><?php echo e($pharmacy->phone); ?></td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-3 text-sm font-medium text-gray-700 bg-gray-100">WhatsApp</td>
                                    <td class="px-4 py-3 text-sm text-gray-900">
                                        <div class="flex items-center">
                                            <span class="mr-3"><?php echo e($pharmacy->whatsapp); ?></span>
                                            <a href="<?php echo e($pharmacy->whatsapp_link); ?>" target="_blank" 
                                               class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded-lg text-xs font-medium transition duration-200 flex items-center">
                                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488"/>
                                                </svg>
                                                Chat
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-3 text-sm font-medium text-gray-700 bg-gray-100">Description</td>
                                    <td class="px-4 py-3 text-sm text-gray-900"><?php echo e($pharmacy->description ?: '-'); ?></td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-3 text-sm font-medium text-gray-700 bg-gray-100">Status</td>
                                    <td class="px-4 py-3 text-sm">
                                        <div class="flex items-center space-x-2">
                                            <?php if($pharmacy->is_active): ?>
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                    Active
                                                </span>
                                            <?php else: ?>
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                                    Inactive
                                                </span>
                                            <?php endif; ?>
                                            
                                            <?php if($pharmacy->is_open_now === true): ?>
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                    Open Now
                                                </span>
                                            <?php elseif($pharmacy->is_open_now === false): ?>
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                                    Closed Now
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-3 text-sm font-medium text-gray-700 bg-gray-100">Coordinates</td>
                                    <td class="px-4 py-3 text-sm text-gray-900">
                                        <?php if($pharmacy->latitude && $pharmacy->longitude): ?>
                                            <div class="flex items-center">
                                                <span class="mr-3"><?php echo e($pharmacy->latitude); ?>, <?php echo e($pharmacy->longitude); ?></span>
                                                <a href="https://maps.google.com/?q=<?php echo e($pharmacy->latitude); ?>,<?php echo e($pharmacy->longitude); ?>" 
                                                   target="_blank" 
                                                   class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded-lg text-xs font-medium transition duration-200 flex items-center">
                                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    </svg>
                                                    View on Maps
                                                </a>
                                            </div>
                                        <?php else: ?>
                                            -
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-3 text-sm font-medium text-gray-700 bg-gray-100">Created</td>
                                    <td class="px-4 py-3 text-sm text-gray-900"><?php echo e($pharmacy->created_at->format('d/m/Y H:i')); ?></td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-3 text-sm font-medium text-gray-700 bg-gray-100">Updated</td>
                                    <td class="px-4 py-3 text-sm text-gray-900"><?php echo e($pharmacy->updated_at->format('d/m/Y H:i')); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Facilities & Operating Hours -->
                <div>
                    <h2 class="text-xl font-semibold text-gray-800 mb-4 border-b border-gray-200 pb-2">
                        Facilities
                    </h2>
                    <?php if($pharmacy->facilities && count($pharmacy->facilities) > 0): ?>
                        <div class="mb-6">
                            <div class="flex flex-wrap gap-2">
                                <?php $__currentLoopData = $pharmacy->facilities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $facility): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                                        <?php echo e($pharmacy::getFacilitiesOptions()[$facility] ?? $facility); ?>

                                    </span>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    <?php else: ?>
                        <p class="text-gray-500 mb-6">No facilities recorded.</p>
                    <?php endif; ?>

                    <h2 class="text-xl font-semibold text-gray-800 mb-4 border-b border-gray-200 pb-2">
                        Operating Hours
                    </h2>
                    <div class="bg-gray-50 rounded-lg overflow-hidden">
                        <table class="min-w-full">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Day</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Hours</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                <?php
                                    $days = [
                                        'monday' => 'Monday',
                                        'tuesday' => 'Tuesday', 
                                        'wednesday' => 'Wednesday',
                                        'thursday' => 'Thursday',
                                        'friday' => 'Friday',
                                        'saturday' => 'Saturday',
                                        'sunday' => 'Sunday'
                                    ];
                                ?>
                                <?php $__currentLoopData = $days; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $dayData = $pharmacy->operating_hours[$key] ?? null;
                                ?>
                                <tr>
                                    <td class="px-4 py-3 text-sm font-medium text-gray-900"><?php echo e($day); ?></td>
                                    <td class="px-4 py-3 text-sm text-gray-700">
                                        <?php if($dayData && $dayData['is_open']): ?>
                                            <span class="text-green-600 font-medium"><?php echo e($dayData['open']); ?> - <?php echo e($dayData['close']); ?></span>
                                        <?php else: ?>
                                            <span class="text-gray-400">Closed</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Medicines -->
            <div class="mt-8">
                <h2 class="text-xl font-semibold text-gray-800 mb-4 border-b border-gray-200 pb-2">
                    Medicines (<?php echo e($pharmacy->medicines->count()); ?> medicines)
                </h2>
                
                <?php if($medicinesByCategory->count() > 0): ?>
                    <?php $__currentLoopData = $medicinesByCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category => $medicines): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="mb-6">
                        <h3 class="text-lg font-medium text-blue-600 mb-3"><?php echo e($category); ?></h3>
                        <div class="bg-white shadow overflow-hidden rounded-lg">
                            <table class="min-w-full">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Medicine Name</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Stock</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Notes</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <?php $__currentLoopData = $medicines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $medicine): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div>
                                                <div class="text-sm font-medium text-gray-900"><?php echo e($medicine->nama); ?></div>
                                                <div class="text-sm text-gray-500"><?php echo e($medicine->produsen); ?></div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium <?php echo e($medicine->pivot->stock > 0 ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'); ?>">
                                                <?php echo e($medicine->pivot->stock); ?>

                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            <?php if($medicine->pivot->price): ?>
                                                <span class="font-medium">Rp <?php echo e(number_format($medicine->pivot->price, 0, ',', '.')); ?></span>
                                            <?php else: ?>
                                                <span class="text-gray-400">-</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <?php if($medicine->pivot->is_available): ?>
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                    Available
                                                </span>
                                            <?php else: ?>
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                                    Unavailable
                                                </span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-900"><?php echo e($medicine->pivot->notes ?: '-'); ?></td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <div class="bg-blue-50 border-l-4 border-blue-400 p-4">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-blue-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-blue-700">
                                    No medicines are registered at this pharmacy yet.
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Coding\Project 4 matklul\Vitalife-1\resources\views/admin/pharmacies/show.blade.php ENDPATH**/ ?>