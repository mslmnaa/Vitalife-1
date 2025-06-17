<?php $__env->startSection('judul-halaman', 'Add Specialist'); ?>

<?php $__env->startSection('content'); ?>
<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="bg-white shadow rounded-lg p-6">
        <h2 class="text-2xl font-bold mb-4">Add New Specialist</h2>

        <?php if($errors->any()): ?>
            <div class="mb-4 text-red-600">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>- <?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="<?php echo e(route('admin.spesialisis.store')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="grid grid-cols-1 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="nama" value="<?php echo e(old('nama')); ?>" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Doctor Email</label>
                    <input type="email" name="email" value="<?php echo e(old('email')); ?>" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    <p class="text-sm text-gray-500 mt-1">This email will be used to log in as a doctor</p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Consultation Fee</label>
                    <input type="number" name="harga" value="<?php echo e(old('harga')); ?>" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" min="0" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Specialization</label>
                    <select name="spesialisasi" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                        <option value="">Select Specialization</option>
                        <option value="Anatomy" <?php echo e(old('spesialisasi') == 'Anatomy' ? 'selected' : ''); ?>>Anatomy</option>
                        <option value="Primary Care" <?php echo e(old('spesialisasi') == 'Primary Care' ? 'selected' : ''); ?>>Primary Care</option>
                        <option value="Cardiology" <?php echo e(old('spesialisasi') == 'Cardiology' ? 'selected' : ''); ?>>Cardiology</option>
                        <option value="Skin & Genitals" <?php echo e(old('spesialisasi') == 'Skin & Genitals' ? 'selected' : ''); ?>>Skin & Genitals</option>
                        <option value="Human Senses" <?php echo e(old('spesialisasi') == 'Human Senses' ? 'selected' : ''); ?>>Human Senses</option>
                        <option value="Piscologist" <?php echo e(old('spesialisasi') == 'Piscologist' ? 'selected' : ''); ?>>Piscologist</option>
                        <option value="Fisioterapy" <?php echo e(old('spesialisasi') == 'Fisioterapy' ? 'selected' : ''); ?>>Fisioterapy</option>
                        <option value="Pregnancy" <?php echo e(old('spesialisasi') == 'Pregnancy' ? 'selected' : ''); ?>>Pregnancy</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Workplace</label>
                    <input type="text" name="tempatTugas" value="<?php echo e(old('tempatTugas')); ?>" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Phone Number</label>
                    <input type="text" name="noHP" value="<?php echo e(old('noHP')); ?>" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Address</label>
                    <input type="text" name="alamat" value="<?php echo e(old('alamat')); ?>" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Specialist Photo</label>
                    <input type="file" name="image" accept="image/*" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                </div>

                <div class="bg-blue-50 p-4 rounded-md">
                    <h3 class="text-sm font-medium text-blue-800 mb-2">Doctor Account Information</h3>
                    <p class="text-sm text-blue-600">
                        • Doctor account will be created automatically with the entered email<br>
                        • Default password: 123<br>
                        • The doctor can log in using the provided email and password
                    </p>
                </div>
            </div>

            <div class="mt-6">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Save
                </button>
                <a href="<?php echo e(route('admin.spesialisis.index')); ?>" class="ml-3 text-gray-600 hover:text-gray-900">Back</a>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Coding\Project 4 matklul\Vitalife-1\resources\views/admin/spesialisis/create.blade.php ENDPATH**/ ?>