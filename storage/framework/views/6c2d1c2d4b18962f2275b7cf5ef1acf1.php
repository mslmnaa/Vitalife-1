<?php $__env->startSection('title', 'Doctor Profile'); ?>
<?php $__env->startSection('page-title', 'My Profile'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-5xl mx-auto space-y-8">
    <!-- Profile Header -->
    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
        <div class="bg-gradient-to-r from-blue-600 to-blue-700 px-8 py-6">
            <div class="flex items-center space-x-6">
                <div class="flex-shrink-0">
                    <?php if($specialist && $specialist->image && $specialist->image !== 'default-doctor.png'): ?>
                        <img src="<?php echo e(asset('storage/' . $specialist->image)); ?>" 
                             alt="Profile Photo" 
                             class="w-28 h-28 rounded-full object-cover border-4 border-white shadow-lg">
                    <?php else: ?>
                        <div class="w-28 h-28 rounded-full bg-white/20 backdrop-blur-sm flex items-center justify-center border-4 border-white shadow-lg">
                            <i class="fas fa-user-md text-white text-4xl"></i>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="flex-1 text-white">
                    <h1 class="text-3xl font-bold mb-2">
                        <?php echo e($specialist->nama ?? Auth::user()->name); ?>

                    </h1>
                    <p class="text-blue-100 font-semibold text-lg mb-2">
                        <?php echo e($specialist->spesialisasi ?? 'General Practitioner'); ?>

                    </p>
                    <div class="flex flex-wrap items-center gap-4 text-sm text-blue-100">
                        <span class="flex items-center">
                            <i class="fas fa-hospital mr-2"></i>
                            <?php echo e($specialist->tempatTugas ?? 'Not set'); ?>

                        </span>
                        <span class="flex items-center">
                            <i class="fas fa-phone mr-2"></i>
                            <?php echo e($specialist->noHP ?? 'Not set'); ?>

                        </span>
                        <?php if($specialist && $specialist->harga): ?>
                            <span class="bg-white/20 backdrop-blur-sm px-3 py-1 rounded-full font-semibold">
                                <i class="fas fa-money-bill-wave mr-1"></i>
                                Rp <?php echo e(number_format($specialist->harga, 0, ',', '.')); ?>

                            </span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Profile Form -->
    <div class="bg-white rounded-2xl shadow-lg border border-gray-100">
        <div class="px-8 py-6 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <h2 class="text-2xl font-bold text-gray-800 flex items-center">
                    <i class="fas fa-edit mr-3 text-blue-600"></i>
                    Edit Profile
                </h2>
                <div class="flex items-center px-4 py-2 bg-blue-50 rounded-lg">
                    <i class="fas fa-info-circle mr-2 text-blue-600"></i>
                    <span class="text-sm text-blue-800">Complete your profile to increase patient trust</span>
                </div>
            </div>
        </div>

        <form action="<?php echo e(route('doctor.profile.update')); ?>" method="POST" enctype="multipart/form-data" class="p-8 space-y-8">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <!-- Upload Photo Section -->
            <div class="bg-gray-50 rounded-xl p-6">
                <label class="block text-sm font-semibold text-gray-700 mb-4">
                    <i class="fas fa-camera mr-2 text-blue-600"></i>
                    Profile Photo
                </label>
                <div class="flex items-center space-x-6">
                    <div class="flex-shrink-0">
                        <?php if($specialist && $specialist->image && $specialist->image !== 'default-doctor.png'): ?>
                            <img id="preview-image" 
                                 src="<?php echo e(asset('storage/' . $specialist->image)); ?>" 
                                 alt="Preview" 
                                 class="w-20 h-20 rounded-full object-cover border-4 border-white shadow-lg">
                        <?php else: ?>
                            <div id="preview-placeholder" class="w-20 h-20 rounded-full bg-gray-200 flex items-center justify-center border-4 border-white shadow-lg">
                                <i class="fas fa-user text-gray-400 text-xl"></i>
                            </div>
                            <img id="preview-image" 
                                 src="#" 
                                 alt="Preview" 
                                 class="w-20 h-20 rounded-full object-cover border-4 border-white shadow-lg hidden">
                        <?php endif; ?>
                    </div>
                    <div class="flex-1">
                        <input type="file" 
                               name="image" 
                               id="image" 
                               accept="image/*"
                               class="block w-full text-sm text-gray-600 file:mr-4 file:py-3 file:px-6 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-600 file:text-white hover:file:bg-blue-700 transition-colors">
                        <p class="text-xs text-gray-500 mt-2">JPG, PNG max 2MB</p>
                    </div>
                </div>
                <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-red-500 text-sm mt-2 flex items-center">
                        <i class="fas fa-exclamation-circle mr-1"></i>
                        <?php echo e($message); ?>

                    </p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <!-- Form Fields Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Full Name -->
                <div class="space-y-2">
                    <label for="nama" class="block text-sm font-semibold text-gray-700">
                        <i class="fas fa-user mr-2 text-blue-600"></i>
                        Full Name
                        <span class="text-red-500 ml-1">*</span>
                    </label>
                    <input type="text" 
                           name="nama" 
                           id="nama" 
                           value="<?php echo e(old('nama', $specialist->nama ?? Auth::user()->name)); ?>"
                           required
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                    <?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-red-500 text-sm flex items-center">
                            <i class="fas fa-exclamation-circle mr-1"></i>
                            <?php echo e($message); ?>

                        </p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <!-- Specialization -->
                <div class="space-y-2">
                    <label for="spesialisasi" class="block text-sm font-semibold text-gray-700">
                        <i class="fas fa-stethoscope mr-2 text-blue-600"></i>
                        Specialization
                        <span class="text-red-500 ml-1">*</span>
                    </label>
                    <input type="text" 
                           name="spesialisasi" 
                           id="spesialisasi" 
                           value="<?php echo e(old('spesialisasi', $specialist->spesialisasi ?? '')); ?>"
                           required
                           placeholder="e.g., General Practitioner, Pediatrician, etc."
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                    <?php $__errorArgs = ['spesialisasi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-red-500 text-sm flex items-center">
                            <i class="fas fa-exclamation-circle mr-1"></i>
                            <?php echo e($message); ?>

                        </p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <!-- Workplace -->
                <div class="space-y-2">
                    <label for="tempatTugas" class="block text-sm font-semibold text-gray-700">
                        <i class="fas fa-hospital mr-2 text-blue-600"></i>
                        Workplace
                        <span class="text-red-500 ml-1">*</span>
                    </label>
                    <input type="text" 
                           name="tempatTugas" 
                           id="tempatTugas" 
                           value="<?php echo e(old('tempatTugas', $specialist->tempatTugas ?? '')); ?>"
                           required
                           placeholder="e.g., Dr. Sardjito Hospital, Primary Clinic, etc."
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                    <?php $__errorArgs = ['tempatTugas'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-red-500 text-sm flex items-center">
                            <i class="fas fa-exclamation-circle mr-1"></i>
                            <?php echo e($message); ?>

                        </p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <!-- Phone Number -->
                <div class="space-y-2">
                    <label for="noHP" class="block text-sm font-semibold text-gray-700">
                        <i class="fas fa-phone mr-2 text-blue-600"></i>
                        Phone Number
                        <span class="text-red-500 ml-1">*</span>
                    </label>
                    <input type="text" 
                           name="noHP" 
                           id="noHP" 
                           value="<?php echo e(old('noHP', $specialist->noHP ?? '')); ?>"
                           required
                           placeholder="e.g., 08123456789"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                    <?php $__errorArgs = ['noHP'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-red-500 text-sm flex items-center">
                            <i class="fas fa-exclamation-circle mr-1"></i>
                            <?php echo e($message); ?>

                        </p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <!-- Consultation Fee -->
                <div class="space-y-2">
                    <label for="harga" class="block text-sm font-semibold text-gray-700">
                        <i class="fas fa-money-bill-wave mr-2 text-blue-600"></i>
                        Consultation Fee (Rp)
                        <span class="text-red-500 ml-1">*</span>
                    </label>
                    <input type="number" 
                           name="harga" 
                           id="harga" 
                           value="<?php echo e(old('harga', $specialist->harga ?? '')); ?>"
                           required
                           min="0"
                           placeholder="e.g., 150000"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                    <?php $__errorArgs = ['harga'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-red-500 text-sm flex items-center">
                            <i class="fas fa-exclamation-circle mr-1"></i>
                            <?php echo e($message); ?>

                        </p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>

            <!-- Address -->
            <div class="space-y-2">
                <label for="alamat" class="block text-sm font-semibold text-gray-700">
                    <i class="fas fa-map-marker-alt mr-2 text-blue-600"></i>
                    Complete Address
                    <span class="text-red-500 ml-1">*</span>
                </label>
                <textarea name="alamat" 
                          id="alamat" 
                          rows="4" 
                          required
                          placeholder="Enter the complete address of your practice location"
                          class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors resize-none"><?php echo e(old('alamat', $specialist->alamat ?? '')); ?></textarea>
                <?php $__errorArgs = ['alamat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-red-500 text-sm flex items-center">
                        <i class="fas fa-exclamation-circle mr-1"></i>
                        <?php echo e($message); ?>

                    </p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <!-- Submit Buttons -->
            <div class="flex items-center justify-between pt-6 border-t border-gray-200">
                <p class="text-sm text-gray-500 flex items-center">
                    <span class="text-red-500 mr-1">*</span>
                    Required fields
                </p>
                <div class="flex space-x-4">
                    <button type="button" 
                            onclick="window.location.reload()"
                            class="px-6 py-3 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors flex items-center space-x-2">
                        <i class="fas fa-undo"></i>
                        <span>Reset</span>
                    </button>
                    <button type="submit" 
                            class="px-8 py-3 bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-lg hover:from-blue-700 hover:to-blue-800 transition-all shadow-lg hover:shadow-xl flex items-center space-x-2">
                        <i class="fas fa-save"></i>
                        <span>Save Changes</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php $__env->startPush('scripts'); ?>
<script>
// Image preview functionality
document.getElementById('image').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const previewImage = document.getElementById('preview-image');
            const previewPlaceholder = document.getElementById('preview-placeholder');
            
            previewImage.src = e.target.result;
            previewImage.classList.remove('hidden');
            if (previewPlaceholder) {
                previewPlaceholder.classList.add('hidden');
            }
        }
        reader.readAsDataURL(file);
    }
});

// Format currency input - only allow numbers
document.getElementById('harga').addEventListener('input', function(e) {
    let value = e.target.value.replace(/[^\d]/g, '');
    e.target.value = value;
});

// Phone number formatting - only allow numbers
document.getElementById('noHP').addEventListener('input', function(e) {
    let value = e.target.value.replace(/[^\d]/g, '');
    e.target.value = value;
});

// Add loading state to submit button
document.querySelector('form').addEventListener('submit', function(e) {
    const submitButton = document.querySelector('button[type="submit"]');
    submitButton.disabled = true;
    submitButton.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Saving...';
});
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.doctor', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Coding\Project 4 matklul\Vitalife-1\resources\views/doctor/profile.blade.php ENDPATH**/ ?>