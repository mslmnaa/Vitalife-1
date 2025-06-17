

<?php $__env->startSection('title', 'Chat dengan Pasien'); ?>
<?php $__env->startSection('page-title', 'Chat dengan ' . $payment->full_name); ?>

<?php $__env->startSection('content'); ?>
<div class="bg-white rounded-lg shadow h-96">
    <!-- Chat Header -->
    <div class="p-4 border-b border-gray-200 bg-blue-50">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <div class="bg-blue-100 rounded-full p-2 mr-3">
                    <i class="fas fa-user text-blue-600"></i>
                </div>
                <div>
                    <h3 class="font-semibold text-gray-800"><?php echo e($payment->full_name); ?></h3>
                    <p class="text-sm text-gray-600"><?php echo e($payment->gender); ?>, <?php echo e(\Carbon\Carbon::parse($payment->date_of_birth)->age); ?> tahun</p>
                </div>
            </div>
            <a href="<?php echo e(route('doctor.patient.detail', $payment->id)); ?>" 
               class="text-blue-600 hover:text-blue-800">
                <i class="fas fa-info-circle mr-1"></i>Detail Pasien
            </a>
        </div>
    </div>

    <!-- Chat Messages -->
    <div class="flex-1 p-4 overflow-y-auto h-80" id="chatMessages">
        <?php $__empty_1 = true; $__currentLoopData = $chats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="mb-4 <?php echo e($chat->sender_id === Auth::id() ? 'text-right' : 'text-left'); ?>">
                <div class="inline-block max-w-xs lg:max-w-md px-4 py-2 rounded-lg <?php echo e($chat->sender_id === Auth::id() ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-800'); ?>">
                    <p class="text-sm"><?php echo e($chat->message); ?></p>
                    <p class="text-xs mt-1 <?php echo e($chat->sender_id === Auth::id() ? 'text-blue-200' : 'text-gray-500'); ?>">
                        <?php echo e($chat->created_at->format('H:i')); ?>

                    </p>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="text-center text-gray-500 py-8">
                <i class="fas fa-comments text-4xl mb-4 text-gray-300"></i>
                <p>Belum ada percakapan. Mulai chat dengan pasien!</p>
            </div>
        <?php endif; ?>
    </div>

    <!-- Chat Input -->
    <div class="p-4 border-t border-gray-200">
        <form action="<?php echo e(route('doctor.chat.send', $payment->id)); ?>" method="POST" class="flex space-x-2">
            <?php echo csrf_field(); ?>
            <input type="text" 
                   name="message" 
                   placeholder="Ketik pesan Anda..." 
                   class="flex-1 border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                   required>
            <button type="submit" 
                    class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                <i class="fas fa-paper-plane"></i>
            </button>
        </form>
    </div>
</div>

<!-- Patient Info Card -->
<div class="mt-6 bg-white rounded-lg shadow p-6">
    <h4 class="font-semibold text-gray-800 mb-4">Informasi Pasien</h4>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <p class="text-sm text-gray-600">Keluhan Utama:</p>
            <p class="font-medium"><?php echo e($payment->complaints); ?></p>
        </div>
        <div>
            <p class="text-sm text-gray-600">Riwayat Medis:</p>
            <p class="font-medium"><?php echo e($payment->medical_history ?: 'Tidak ada'); ?></p>
        </div>
        <div>
            <p class="text-sm text-gray-600">No. Telepon:</p>
            <p class="font-medium"><?php echo e($payment->phone_number); ?></p>
        </div>
        <div>
            <p class="text-sm text-gray-600">Alamat:</p>
            <p class="font-medium"><?php echo e($payment->address); ?></p>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    // Auto scroll to bottom of chat
    document.addEventListener('DOMContentLoaded', function() {
        const chatMessages = document.getElementById('chatMessages');
        chatMessages.scrollTop = chatMessages.scrollHeight;
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.doctor', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Coding\Project 4 matklul\Vitalife-1\resources\views\Doctor\chat-detail.blade.php ENDPATH**/ ?>