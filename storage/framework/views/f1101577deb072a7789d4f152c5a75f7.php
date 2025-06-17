<?php $__env->startSection('title', 'Doctor Dashboard'); ?>
<?php $__env->startSection('page-title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-6">
    <!-- Welcome Section -->
    <div class="bg-gradient-to-r from-gray-800 to-gray-900 rounded-xl p-6 text-white shadow-lg">
        <h2 class="text-2xl font-bold mb-2">Welcome, Dr. <?php echo e(Auth::user()->name); ?>!</h2>
        <?php if($specialist): ?>
            <p class="text-gray-200"><?php echo e($specialist->spesialisasi); ?> - <?php echo e($specialist->tempatTugas); ?></p>
        <?php else: ?>
            <p class="text-gray-200">Please complete your specialist profile</p>
            <a href="<?php echo e(route('doctor.profile')); ?>" class="inline-block mt-3 bg-white text-gray-800 px-4 py-2 rounded-lg font-medium hover:bg-gray-100 transition-colors">
                Complete Profile
            </a>
        <?php endif; ?>
    </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow">
            <div class="flex items-center">
                <div class="bg-blue-50 rounded-full p-3 mr-4">
                    <i class="fas fa-users text-blue-600 text-xl"></i>
                </div>
                <div>
                    <p class="text-gray-500 text-sm font-medium">Total Patients</p>
                    <p class="text-2xl font-bold text-gray-900"><?php echo e($totalPatients); ?></p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow">
            <div class="flex items-center">
                <div class="bg-amber-50 rounded-full p-3 mr-4">
                    <i class="fas fa-clock text-amber-600 text-xl"></i>
                </div>
                <div>
                    <p class="text-gray-500 text-sm font-medium">Pending Payments</p>
                    <p class="text-2xl font-bold text-gray-900"><?php echo e($pendingPayments); ?></p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow">
            <div class="flex items-center">
                <div class="bg-emerald-50 rounded-full p-3 mr-4">
                    <i class="fas fa-money-bill-wave text-emerald-600 text-xl"></i>
                </div>
                <div>
                    <p class="text-gray-500 text-sm font-medium">Total Earnings</p>
                    <p class="text-2xl font-bold text-gray-900">Rp <?php echo e(number_format($totalEarnings, 0, ',', '.')); ?></p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow">
            <div class="flex items-center">
                <div class="bg-red-50 rounded-full p-3 mr-4">
                    <i class="fas fa-envelope text-red-600 text-xl"></i>
                </div>
                <div>
                    <p class="text-gray-500 text-sm font-medium">Unread Messages</p>
                    <p class="text-2xl font-bold text-gray-900"><?php echo e($unreadMessages); ?></p>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Recent Patients -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200">
            <div class="p-6 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-gray-900">Recent Patients</h3>
                    <span class="text-sm text-gray-500">Latest consultations</span>
                </div>
            </div>
            <div class="p-6">
                <?php if($recentPatients->count() > 0): ?>
                    <div class="space-y-4">
                        <?php $__currentLoopData = $recentPatients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $patient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center mr-3">
                                        <span class="text-white font-semibold text-sm"><?php echo e(substr($patient->full_name, 0, 1)); ?></span>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-900"><?php echo e($patient->full_name); ?></p>
                                        <p class="text-sm text-gray-600">
                                            <?php echo e($patient->created_at->format('d M Y, H:i')); ?>

                                            <?php if($patient->user): ?>
                                                • <?php echo e($patient->user->name); ?>

                                            <?php endif; ?>
                                        </p>
                                        <p class="text-xs text-gray-500 mt-1">
                                            Status: 
                                            <span class="px-2 py-1 rounded-full text-xs font-medium
                                                <?php if($patient->status == 'confirmed'): ?> bg-emerald-100 text-emerald-800
                                                <?php elseif($patient->status == 'pending'): ?> bg-amber-100 text-amber-800
                                                <?php else: ?> bg-red-100 text-red-800
                                                <?php endif; ?>">
                                                <?php echo e(ucfirst($patient->status)); ?>

                                            </span>
                                        </p>
                                    </div>
                                </div>
                                <a href="<?php echo e(route('doctor.patient.detail', $patient->id)); ?>" 
                                   class="text-gray-400 hover:text-blue-600 transition-colors">
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="mt-6 text-center">
                        <a href="<?php echo e(route('doctor.patients')); ?>" 
                           class="inline-flex items-center text-blue-600 hover:text-blue-700 font-medium text-sm">
                            View All Patients
                            <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                <?php else: ?>
                    <div class="text-center py-12">
                        <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-users text-gray-400 text-2xl"></i>
                        </div>
                        <h4 class="text-gray-900 font-medium mb-2">No patients yet</h4>
                        <p class="text-gray-500 text-sm">
                            <?php if(!$specialist): ?>
                                Complete your profile to start receiving patients
                            <?php else: ?>
                                Patients will appear here once they book consultations
                            <?php endif; ?>
                        </p>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Monthly Statistics Chart -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200">
            <div class="p-6 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-gray-900">Monthly Statistics <?php echo e(date('Y')); ?></h3>
                    <span class="text-sm text-gray-500">Patients & earnings</span>
                </div>
            </div>
            <div class="p-6">
                <?php if($monthlyStats->count() > 0): ?>
                    <div class="space-y-4">
                        <?php $__currentLoopData = $monthlyStats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="flex items-center justify-between p-3 rounded-lg hover:bg-gray-50 transition-colors">
                                <div>
                                    <p class="font-medium text-gray-900">
                                        <?php echo e(DateTime::createFromFormat('!m', $stat->month)->format('F')); ?>

                                    </p>
                                    <p class="text-sm text-gray-600"><?php echo e($stat->total_patients); ?> patients</p>
                                </div>
                                <div class="text-right">
                                    <p class="font-semibold text-emerald-600">
                                        Rp <?php echo e(number_format($stat->total_earnings, 0, ',', '.')); ?>

                                    </p>
                                    <div class="w-24 bg-gray-200 rounded-full h-2 mt-2">
                                        <div class="bg-emerald-500 h-2 rounded-full transition-all duration-300" 
                                             style="width: <?php echo e($stat->total_patients > 0 ? min(($stat->total_patients / $totalPatients) * 100, 100) : 0); ?>%"></div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php else: ?>
                    <div class="text-center py-12">
                        <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-chart-bar text-gray-400 text-2xl"></i>
                        </div>
                        <h4 class="text-gray-900 font-medium mb-2">No statistics yet</h4>
                        <p class="text-gray-500 text-sm">Statistics will appear here once you have patient data</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php if($specialist && $specialist->harga): ?>
        <!-- Quick Info -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-6">Consultation Rate Information</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-lg p-4 border border-blue-200">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-blue-500 rounded-lg flex items-center justify-center mr-4">
                            <i class="fas fa-money-bill-wave text-white text-lg"></i>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-blue-700">Rate Per Consultation</p>
                            <p class="text-xl font-bold text-blue-900">Rp <?php echo e(number_format($specialist->harga, 0, ',', '.')); ?></p>
                        </div>
                    </div>
                </div>
                <div class="bg-gradient-to-br from-emerald-50 to-emerald-100 rounded-lg p-4 border border-emerald-200">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-emerald-500 rounded-lg flex items-center justify-center mr-4">
                            <i class="fas fa-hospital text-white text-lg"></i>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-emerald-700">Practice Location</p>
                            <p class="text-xl font-bold text-emerald-900"><?php echo e($specialist->tempatTugas); ?></p>
                        </div>
                    </div>
                </div>
                <div class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-lg p-4 border border-purple-200">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-purple-500 rounded-lg flex items-center justify-center mr-4">
                            <i class="fas fa-phone text-white text-lg"></i>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-purple-700">Contact</p>
                            <p class="text-xl font-bold text-purple-900"><?php echo e($specialist->noHP); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.doctor', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Coding\Project 4 matklul\Vitalife-1\resources\views/doctor/dashboard.blade.php ENDPATH**/ ?>