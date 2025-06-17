<?php $__env->startSection('judul-halaman', 'Daftar Event'); ?>

<?php $__env->startSection('content'); ?>
<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-semibold">Daftar Event</h2>
        <a href="<?php echo e(route('admin.event.create')); ?>"
            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
            + Tambah Event
        </a>
    </div>

    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="py-2 px-4 border-b text-left">Event Name</th>
                        <th class="py-2 px-4 border-b text-left">Description</th>
                        <th class="py-2 px-4 border-b text-left">Address</th>
                        <th class="py-2 px-4 border-b text-left">Date</th>
                        <th class="py-2 px-4 border-b text-left">Price</th>
                        <th class="py-2 px-4 border-b text-left">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php $__empty_1 = true; $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td class="py-2 px-4 border-b"><?php echo e($event->nama); ?></td>
                            <td class="py-2 px-4 border-b"><?php echo e(Str::limit($event->deskripsi, 50)); ?></td>
                            <td class="py-2 px-4 border-b"><?php echo e($event->alamat); ?></td>
                            <td class="px-4 py-4 text-sm text-gray-700">
                                <?php echo e(\Carbon\Carbon::parse($event->tanggal)->format('d M Y')); ?>

                            </td>
                            <td class="px-4 py-4 text-sm text-gray-700">
                                Rp <?php echo e(number_format($event->harga, 0, ',', '.')); ?>

                            </td>
                            <td class="px-4 py-4 text-sm font-medium">
                                <a href="<?php echo e(route('admin.event.edit', ['id_event' => $event->id_event])); ?>"
                                    class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</a>
                                <form action="<?php echo e(route('admin.event.destroy', ['id_event' => $event->id_event])); ?>"
                                    method="POST" class="inline-block">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit"
                                        class="text-red-600 hover:text-red-900"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus event ini?')">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="6" class="py-4 px-4 text-center text-gray-500">Tidak ada data event.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Coding\Project 4 matklul\Vitalife-1\resources\views\admin\event\index.blade.php ENDPATH**/ ?>