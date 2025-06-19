<?php $__env->startSection('page-title', 'Edit Pharmacy'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="max-w-6xl mx-auto">
            <div class="flex items-center mb-6">
                <a href="<?php echo e(route('admin.pharmacies.index')); ?>" class="text-gray-600 hover:text-gray-800 mr-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </a>
                <h1 class="text-2xl font-bold">Edit Pharmacy: <?php echo e($pharmacy->name); ?></h1>
            </div>

            <?php if($errors->any()): ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                    <strong class="font-bold">Whoops!</strong>
                    <span class="block sm:inline">There were some problems with your input.</span>
                    <ul class="mt-2">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>

            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <form action="<?php echo e(route('admin.pharmacies.update', $pharmacy)); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    
                    <div class="p-6">
                        <!-- Basic Information & Location Settings -->
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
                            <!-- Basic Information -->
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-4">Informasi Dasar</h3>
                                
                                <div class="space-y-4">
                                    <!-- Nama Pharmacy -->
                                    <div>
                                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nama Pharmacy <span class="text-red-500">*</span></label>
                                        <input type="text" name="name" id="name" value="<?php echo e(old('name', $pharmacy->name)); ?>" 
                                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                               placeholder="Enter pharmacy name" required>
                                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>

                                    <!-- Alamat -->
                                    <div>
                                        <label for="address" class="block text-sm font-medium text-gray-700 mb-2">Alamat <span class="text-red-500">*</span></label>
                                        <textarea name="address" id="address" rows="3" 
                                                  class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                  placeholder="Enter pharmacy address" required><?php echo e(old('address', $pharmacy->address)); ?></textarea>
                                        <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>

                                    <!-- Phone & WhatsApp -->
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div>
                                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Telepon <span class="text-red-500">*</span></label>
                                            <input type="text" name="phone" id="phone" value="<?php echo e(old('phone', $pharmacy->phone)); ?>" 
                                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                   placeholder="Phone number" required>
                                            <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                        <div>
                                            <label for="whatsapp" class="block text-sm font-medium text-gray-700 mb-2">WhatsApp <span class="text-red-500">*</span></label>
                                            <input type="text" name="whatsapp" id="whatsapp" value="<?php echo e(old('whatsapp', $pharmacy->whatsapp)); ?>" 
                                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent <?php $__errorArgs = ['whatsapp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                   placeholder="WhatsApp number" required>
                                            <?php $__errorArgs = ['whatsapp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>

                                    <!-- Deskripsi -->
                                    <div>
                                        <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Deskripsi</label>
                                        <textarea name="description" id="description" rows="3" 
                                                  class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                  placeholder="Enter pharmacy description"><?php echo e(old('description', $pharmacy->description)); ?></textarea>
                                        <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>

                                    <!-- Current Image -->
                                    <?php if($pharmacy->image): ?>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Current Image</label>
                                        <div class="flex items-center space-x-4">
                                            <img src="<?php echo e($pharmacy->image_url); ?>" alt="<?php echo e($pharmacy->name); ?>" class="h-20 w-20 object-cover rounded-lg">
                                            <span class="text-sm text-gray-600">Current pharmacy image</span>
                                        </div>
                                    </div>
                                    <?php endif; ?>

                                    <!-- New Image -->
                                    <div>
                                        <label for="image" class="block text-sm font-medium text-gray-700 mb-2">
                                            <?php echo e($pharmacy->image ? 'Change Image (Optional)' : 'Pharmacy Image'); ?>

                                        </label>
                                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                            <div class="space-y-1 text-center">
                                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                                <div class="flex text-sm text-gray-600">
                                                    <label for="image" class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                                                        <span>Upload a file</span>
                                                        <input id="image" name="image" type="file" class="sr-only" accept="image/*">
                                                    </label>
                                                    <p class="pl-1">or drag and drop</p>
                                                </div>
                                                <p class="text-xs text-gray-500">PNG, JPG, GIF up to 2MB</p>
                                            </div>
                                        </div>
                                        <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                            </div>

                            <!-- Location & Settings -->
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-4">Lokasi & Pengaturan</h3>
                                
                                <div class="space-y-4">
                                    <!-- Latitude & Longitude -->
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div>
                                            <label for="latitude" class="block text-sm font-medium text-gray-700 mb-2">Latitude</label>
                                            <input type="number" step="any" name="latitude" id="latitude" value="<?php echo e(old('latitude', $pharmacy->latitude)); ?>" 
                                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent <?php $__errorArgs = ['latitude'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                   placeholder="Latitude">
                                            <?php $__errorArgs = ['latitude'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                        <div>
                                            <label for="longitude" class="block text-sm font-medium text-gray-700 mb-2">Longitude</label>
                                            <input type="number" step="any" name="longitude" id="longitude" value="<?php echo e(old('longitude', $pharmacy->longitude)); ?>" 
                                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent <?php $__errorArgs = ['longitude'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                   placeholder="Longitude">
                                            <?php $__errorArgs = ['longitude'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>

                                    <!-- Fasilitas -->
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-3">Fasilitas</label>
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                                            <?php $__currentLoopData = $facilities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="flex items-center">
                                                <input type="checkbox" name="facilities[]" value="<?php echo e($key); ?>" id="facility_<?php echo e($key); ?>"
                                                       class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
                                                       <?php echo e(in_array($key, old('facilities', $pharmacy->facilities ?? [])) ? 'checked' : ''); ?>>
                                                <label for="facility_<?php echo e($key); ?>" class="ml-2 text-sm text-gray-700"><?php echo e($label); ?></label>
                                            </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>

                                    <!-- Status Aktif -->
                                    <div>
                                        <div class="flex items-center">
                                            <input type="checkbox" name="is_active" value="1" id="is_active"
                                                   class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
                                                   <?php echo e(old('is_active', $pharmacy->is_active) ? 'checked' : ''); ?>>
                                            <label for="is_active" class="ml-2 text-sm text-gray-700">Aktif</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Operating Hours -->
                        <div class="mb-8">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Jam Operasional</h3>
                            <div class="overflow-x-auto">
                                <table class="min-w-full bg-white border border-gray-300 rounded-lg">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-700 border-b">Hari</th>
                                            <th class="px-4 py-3 text-center text-sm font-medium text-gray-700 border-b w-20">Buka</th>
                                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-700 border-b w-32">Jam Buka</th>
                                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-700 border-b w-32">Jam Tutup</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200">
                                        <?php
                                            $days = [
                                                'monday' => 'Senin',
                                                'tuesday' => 'Selasa', 
                                                'wednesday' => 'Rabu',
                                                'thursday' => 'Kamis',
                                                'friday' => 'Jumat',
                                                'saturday' => 'Sabtu',
                                                'sunday' => 'Minggu'
                                            ];
                                        ?>
                                        <?php $__currentLoopData = $days; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $dayData = $pharmacy->operating_hours[$key] ?? ['is_open' => false, 'open' => '08:00', 'close' => '22:00'];
                                        ?>
                                        <tr>
                                            <td class="px-4 py-3 text-sm text-gray-900"><?php echo e($day); ?></td>
                                            <td class="px-4 py-3 text-center">
                                                <input type="checkbox" name="operating_hours[<?php echo e($key); ?>][is_open]" value="1"
                                                       id="day_<?php echo e($key); ?>" data-day="<?php echo e($key); ?>"
                                                       class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded day-toggle"
                                                       <?php echo e(old("operating_hours.{$key}.is_open", $dayData['is_open']) ? 'checked' : ''); ?>>
                                            </td>
                                            <td class="px-4 py-3">
                                                <input type="time" name="operating_hours[<?php echo e($key); ?>][open]" 
                                                       id="open_<?php echo e($key); ?>" value="<?php echo e(old("operating_hours.{$key}.open", $dayData['open'])); ?>"
                                                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent time-input">
                                            </td>
                                            <td class="px-4 py-3">
                                                <input type="time" name="operating_hours[<?php echo e($key); ?>][close]" 
                                                       id="close_<?php echo e($key); ?>" value="<?php echo e(old("operating_hours.{$key}.close", $dayData['close'])); ?>"
                                                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent time-input">
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Medicines -->
                        <div class="mb-8">
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="text-lg font-semibold text-gray-900">Obat-obatan</h3>
                                <button type="button" id="add-medicine" 
                                        class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 text-sm">
                                    <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                    Tambah Obat
                                </button>
                            </div>
                            <div id="medicines-container" class="space-y-4">
                                <?php $__currentLoopData = $pharmacy->medicines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $medicine): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="medicine-row bg-gray-50 border border-gray-200 rounded-lg p-4">
                                    <div class="grid grid-cols-1 md:grid-cols-6 gap-4 items-end">
                                        <div class="md:col-span-2">
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Obat</label>
                                            <select name="medicines[<?php echo e($index); ?>][medicine_id]" 
                                                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent medicine-select">
                                                <option value="">Pilih Obat</option>
                                                <?php $__currentLoopData = $medicines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $med): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($med->id_medicine); ?>" 
                                                        <?php echo e($med->id_medicine == $medicine->id_medicine ? 'selected' : ''); ?>>
                                                    <?php echo e($med->nama); ?> - <?php echo e($med->kategori); ?>

                                                </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Stok</label>
                                            <input type="number" name="medicines[<?php echo e($index); ?>][stock]" min="0" 
                                                   value="<?php echo e($medicine->pivot->stock); ?>"
                                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Harga</label>
                                            <input type="number" name="medicines[<?php echo e($index); ?>][price]" min="0" 
                                                   value="<?php echo e($medicine->pivot->price); ?>"
                                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Catatan</label>
                                            <input type="text" name="medicines[<?php echo e($index); ?>][notes]" 
                                                   value="<?php echo e($medicine->pivot->notes); ?>"
                                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                        </div>
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center">
                                                <input type="checkbox" name="medicines[<?php echo e($index); ?>][is_available]" value="1"
                                                       class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
                                                       <?php echo e($medicine->pivot->is_available ? 'checked' : ''); ?>>
                                                <label class="ml-2 text-sm text-gray-700">Tersedia</label>
                                            </div>
                                            <button type="button" class="remove-medicine text-red-600 hover:text-red-800 p-1">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-50 px-6 py-4 flex justify-end space-x-3">
                        <a href="<?php echo e(route('admin.pharmacies.index')); ?>" 
                           class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            Cancel
                        </a>
                        <button type="submit" 
                                class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            Update Pharmacy
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Medicine Row Template -->
    <template id="medicine-row-template">
        <div class="medicine-row bg-gray-50 border border-gray-200 rounded-lg p-4">
            <div class="grid grid-cols-1 md:grid-cols-6 gap-4 items-end">
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Obat</label>
                    <select name="medicines[INDEX][medicine_id]" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent medicine-select">
                        <option value="">Pilih Obat</option>
                        <?php $__currentLoopData = $medicines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $medicine): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($medicine->id_medicine); ?>"><?php echo e($medicine->nama); ?> - <?php echo e($medicine->kategori); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Stok</label>
                    <input type="number" name="medicines[INDEX][stock]" min="0" value="0"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Harga</label>
                    <input type="number" name="medicines[INDEX][price]" min="0"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Catatan</label>
                    <input type="text" name="medicines[INDEX][notes]"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input type="checkbox" name="medicines[INDEX][is_available]" value="1" checked
                               class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                        <label class="ml-2 text-sm text-gray-700">Tersedia</label>
                    </div>
                    <button type="button" class="remove-medicine text-red-600 hover:text-red-800 p-1">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </template>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    let medicineIndex = <?php echo e($pharmacy->medicines->count()); ?>;

    // Toggle operating hours inputs
    const dayToggles = document.querySelectorAll('.day-toggle');
    dayToggles.forEach(toggle => {
        toggle.addEventListener('change', function() {
            const day = this.getAttribute('data-day');
            const isChecked = this.checked;
            
            const openInput = document.getElementById(`open_${day}`);
            const closeInput = document.getElementById(`close_${day}`);
            
            openInput.disabled = !isChecked;
            closeInput.disabled = !isChecked;
            
            if (!isChecked) {
                openInput.value = '';
                closeInput.value = '';
            }
        });
    });

    // Initialize operating hours
    dayToggles.forEach(toggle => toggle.dispatchEvent(new Event('change')));

    // Add medicine row
    document.getElementById('add-medicine').addEventListener('click', function() {
        const template = document.getElementById('medicine-row-template').innerHTML;
        const newRow = template.replace(/INDEX/g, medicineIndex);
        document.getElementById('medicines-container').insertAdjacentHTML('beforeend', newRow);
        medicineIndex++;
    });

    // Remove medicine row
    document.addEventListener('click', function(e) {
        if (e.target.closest('.remove-medicine')) {
            e.target.closest('.medicine-row').remove();
        }
    });
});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Coding\Project 4 matklul\Vitalife-1\resources\views/admin/pharmacies/edit.blade.php ENDPATH**/ ?>