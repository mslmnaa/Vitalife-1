<?php $__env->startSection('judul-halaman', 'Edit Event'); ?>

<?php $__env->startSection('content'); ?>
<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg overflow-hidden">
        <div class="px-6 py-4 bg-gray-100 border-b border-gray-200">
            <h1 class="text-2xl font-semibold text-gray-900">Edit Event</h1>
        </div>

        <form action="<?php echo e(route('admin.event.update', ['id_event' => $event->id_event])); ?>" method="POST" enctype="multipart/form-data" class="p-6">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            
            <div class="space-y-6 px-8">
                <div>
                    <label for="nama" class="block text-sm font-medium text-gray-700">Event Name</label>
                    <input type="text" name="nama" id="nama" value="<?php echo e(old('nama', $event->nama)); ?>"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>

                <div>
                    <label for="deskripsi" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="deskripsi" id="deskripsi" rows="3"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"><?php echo e(old('deskripsi', $event->deskripsi)); ?></textarea>
                </div>

                <div>
                    <label for="tanggal" class="block text-sm font-medium text-gray-700">Date</label>
                    <input type="date" name="tanggal" id="tanggal" value="<?php echo e(old('tanggal', $event->tanggal->format('Y-m-d'))); ?>"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>

                <div>
                    <label for="alamat" class="block text-sm font-medium text-gray-700">Address</label>
                    <input type="text" name="alamat" id="alamat" value="<?php echo e(old('alamat', $event->alamat)); ?>"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>

                <div>
                    <label for="harga" class="block text-sm font-medium text-gray-700">Price</label>
                    <input type="number" name="harga" id="harga" value="<?php echo e(old('harga', $event->harga)); ?>"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>

                <div>
                    <label for="noHP" class="block text-sm font-medium text-gray-700">Contact Number</label>
                    <input type="text" name="noHP" id="noHP" value="<?php echo e(old('noHP', $event->noHP)); ?>"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>

                <div>
                    <label for="image" class="block text-sm font-medium text-gray-700">Event Image</label>
                    <input type="file" name="image" id="image"
                        class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                    <?php if($event->image): ?>
                        <img src="<?php echo e(asset($event->image)); ?>" alt="Current Event Image" class="mt-2 w-32 h-32 object-cover rounded-md">
                    <?php endif; ?>
                </div>
            </div>

            <div class="mt-6 flex items-center justify-center px-8">
                <button type="submit"
                    class="w-full sm:w-auto justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-8 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    Update Event
                </button>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Coding\Project 4 matklul\Vitalife-1\resources\views\admin\event\edit.blade.php ENDPATH**/ ?>