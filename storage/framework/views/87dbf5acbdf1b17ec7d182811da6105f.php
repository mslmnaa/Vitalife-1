<?php $__env->startSection('judul-halaman', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
<div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 p-4 md:p-6 lg:p-8">
    <div class="max-w-7xl mx-auto space-y-6 md:space-y-8">
        
        <!-- Welcome Section -->
        <div class="relative overflow-hidden bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 rounded-2xl p-6 md:p-8 text-white shadow-2xl">
            <div class="absolute inset-0 bg-black/10"></div>
            <div class="absolute -top-10 -right-10 w-40 h-40 bg-white/10 rounded-full"></div>
            <div class="absolute -bottom-10 -left-10 w-32 h-32 bg-white/5 rounded-full"></div>
            
            <div x-data="{ weather: null }" x-init="fetchWeather()">
                <div class="relative flex flex-col md:flex-row items-start md:items-center justify-between gap-6">
                    <div class="flex-1 space-y-4">
                        <div>
                            <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold mb-2">
                                Welcome back, <?php echo e(Auth::user()->name); ?>! 👋
                            </h2>
                            <p class="text-blue-100 text-base md:text-lg opacity-90">
                                Here's what's happening with your platform today
                            </p>
                        </div>
                        
                        <div class="bg-white/10 backdrop-blur-sm rounded-xl p-4 border border-white/20">
                            <div class="flex items-center space-x-3 mb-2">
                                <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center">
                                    <i class="fa-solid fa-cloud-sun text-white text-sm"></i>
                                </div>
                                <p class="text-white font-medium">Today's Weather</p>
                            </div>
                            <div class="text-white/90">
                                <div x-show="weather" class="space-y-1">
                                    <p class="text-lg font-semibold" x-text="weather ? `${weather.temperature}°C` : ''"></p>
                                    <p class="text-sm opacity-80" x-text="weather ? weather.description : ''"></p>
                                </div>
                                <div x-show="!weather" class="flex items-center space-x-2">
                                    <div class="w-4 h-4 border-2 border-white/30 border-t-white rounded-full animate-spin"></div>
                                    <span class="text-sm">Loading weather...</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="relative">
                        <div class="w-20 h-20 md:w-24 md:h-24 lg:w-28 lg:h-28 rounded-2xl overflow-hidden shadow-xl border-4 border-white/30">
                            <img src="<?php echo e(asset('image/boy.png')); ?>" alt="User Avatar" 
                                 class="w-full h-full object-cover">
                        </div>
                        <div class="absolute -bottom-2 -right-2 w-6 h-6 bg-green-400 rounded-full border-3 border-white shadow-lg"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8">
            <!-- Total Events Card -->
            <a href="<?php echo e(route('admin.event.index')); ?>" 
               class="group relative bg-white rounded-2xl p-6 md:p-8 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 border border-gray-100">
                <div class="absolute inset-0 bg-gradient-to-r from-green-50 to-emerald-50 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                
                <div class="relative flex justify-between items-start">
                    <div class="space-y-4">
                        <div>
                            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-800 group-hover:text-green-600 transition-colors">
                                <?php echo e($eventcount); ?>

                            </h2>
                            <p class="text-base md:text-lg text-gray-600 font-medium mt-2">Total Events</p>
                        </div>
                        
                        <div class="space-y-2">
                            <div class="flex items-center justify-between text-sm text-gray-500">
                                <span>Progress</span>
                                <span>65%</span>
                            </div>
                            <div class="bg-gray-100 rounded-full h-3 overflow-hidden">
                                <div class="bg-gradient-to-r from-green-400 to-emerald-500 h-full rounded-full transition-all duration-700 group-hover:from-green-500 group-hover:to-emerald-600" 
                                     style="width: 65%"></div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-gradient-to-br from-green-100 to-emerald-100 p-4 rounded-2xl group-hover:from-green-200 group-hover:to-emerald-200 transition-all duration-300 shadow-md">
                        <i class="fa-solid fa-person-running text-green-600 text-2xl md:text-3xl"></i>
                    </div>
                </div>
                
                <div class="absolute bottom-4 right-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <i class="fa-solid fa-arrow-right text-green-600 text-lg"></i>
                </div>
            </a>

            <!-- Total Specialists Card -->
            <a href="<?php echo e(route('admin.spesialisis.index')); ?>" 
               class="group relative bg-white rounded-2xl p-6 md:p-8 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 border border-gray-100">
                <div class="absolute inset-0 bg-gradient-to-r from-red-50 to-rose-50 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                
                <div class="relative flex justify-between items-start">
                    <div class="space-y-4">
                        <div>
                            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-800 group-hover:text-red-600 transition-colors">
                                <?php echo e($spescount); ?>

                            </h2>
                            <p class="text-base md:text-lg text-gray-600 font-medium mt-2">Total Specialists</p>
                        </div>
                        
                        <div class="space-y-2">
                            <div class="flex items-center justify-between text-sm text-gray-500">
                                <span>Progress</span>
                                <span>35%</span>
                            </div>
                            <div class="bg-gray-100 rounded-full h-3 overflow-hidden">
                                <div class="bg-gradient-to-r from-red-400 to-rose-500 h-full rounded-full transition-all duration-700 group-hover:from-red-500 group-hover:to-rose-600" 
                                     style="width: 35%"></div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-gradient-to-br from-red-100 to-rose-100 p-4 rounded-2xl group-hover:from-red-200 group-hover:to-rose-200 transition-all duration-300 shadow-md">
                        <svg class="w-6 h-6 md:w-8 md:h-8 text-red-600" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                </div>
                
                <div class="absolute bottom-4 right-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <i class="fa-solid fa-arrow-right text-red-600 text-lg"></i>
                </div>
            </a>
        </div>

        <!-- Website Usage Chart -->
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
            <div class="p-6 md:p-8">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
                    <div class="space-y-2">
                        <h3 class="text-xl md:text-2xl lg:text-3xl font-bold text-gray-800">Website Analytics</h3>
                        <p class="text-gray-600">Track your platform's performance over time</p>
                    </div>
                    
                    <div class="flex flex-wrap gap-2 bg-gray-50 p-1 rounded-xl border">
                        <button class="px-4 py-2 bg-gray-800 text-white rounded-lg text-sm font-medium transition-all hover:bg-gray-900 shadow-sm">
                            Monthly
                        </button>
                        <button class="px-4 py-2 text-gray-600 hover:bg-white hover:text-gray-800 rounded-lg text-sm font-medium transition-all">
                            Weekly
                        </button>
                        <button class="px-4 py-2 text-gray-600 hover:bg-white hover:text-gray-800 rounded-lg text-sm font-medium transition-all">
                            Daily
                        </button>
                    </div>
                </div>

                <div class="relative bg-gradient-to-t from-blue-50/50 to-transparent rounded-xl p-4 mb-6">
                    <div class="relative h-64 md:h-80 lg:h-96">
                        <canvas id="websiteUsageChart" class="w-full h-full"></canvas>
                    </div>
                </div>

                <div class="flex justify-between text-sm text-gray-500 mb-6 px-4">
                    <span class="font-medium">Jul</span>
                    <span class="font-medium">Aug</span>
                    <span class="font-medium">Sept</span>
                    <span class="font-medium">Oct</span>
                    <span class="font-medium">Nov</span>
                </div>

                <div class="flex items-center justify-between bg-gradient-to-r from-blue-50 to-blue-100 rounded-xl p-4">
                    <div class="flex items-center space-x-3">
                        <div class="w-4 h-4 bg-blue-500 rounded-full shadow-sm"></div>
                        <span class="text-gray-700 font-medium">Total Visits Growth</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <span id="visitsPercentage" class="text-2xl font-bold text-blue-600">0</span>
                        <span class="text-blue-600 font-medium">%</span>
                        <div class="w-6 h-6 bg-green-100 rounded-full flex items-center justify-center">
                            <i class="fa-solid fa-arrow-up text-green-600 text-xs"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Payment History -->
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
            <div class="p-6 md:p-8">
                <div class="flex items-center justify-between mb-8">
                    <div class="space-y-2">
                        <h3 class="text-xl md:text-2xl lg:text-3xl font-bold text-gray-800">Payment History</h3>
                        <p class="text-gray-600">Manage and track all payment transactions</p>
                    </div>
                    <div class="bg-gradient-to-r from-blue-50 to-blue-100 p-3 rounded-xl">
                        <i class="fa-solid fa-credit-card text-blue-600 text-xl"></i>
                    </div>
                </div>
                
                <!-- Mobile View -->
                <div class="md:hidden space-y-4">
                    <?php $__empty_1 = true; $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="bg-gradient-to-r from-gray-50 to-white border border-gray-200 rounded-xl p-5 space-y-4 hover:shadow-lg transition-all duration-200 hover:border-blue-200">
                        <div class="flex justify-between items-start">
                            <div class="space-y-1">
                                <h4 class="font-bold text-gray-800 text-lg"><?php echo e($payment->full_name); ?></h4>
                                <p class="text-sm text-gray-600 bg-gray-100 px-2 py-1 rounded-md inline-block">
                                    <?php echo e($payment->bank_name); ?>

                                </p>
                            </div>
                            <span class="px-3 py-2 rounded-xl text-xs font-bold shadow-sm
                                <?php if($payment->status == 'confirmed'): ?> bg-green-100 text-green-800 border border-green-200
                                <?php elseif($payment->status == 'cancelled'): ?> bg-red-100 text-red-800 border border-red-200
                                <?php else: ?> bg-yellow-100 text-yellow-800 border border-yellow-200 <?php endif; ?>">
                                <?php echo e(ucfirst($payment->status)); ?>

                            </span>
                        </div>
                        
                        <div class="grid grid-cols-2 gap-4">
                            <div class="space-y-1">
                                <span class="text-xs text-gray-500 font-medium uppercase tracking-wide">Date</span>
                                <p class="font-semibold text-gray-800"><?php echo e($payment->created_at->format('d M Y')); ?></p>
                            </div>
                            <div class="space-y-1">
                                <span class="text-xs text-gray-500 font-medium uppercase tracking-wide">Amount</span>
                                <p class="font-bold text-green-600 text-lg">Rp <?php echo e(number_format($payment->total_amount, 0, ',', '.')); ?></p>
                            </div>
                        </div>
                        
                        <div class="space-y-2">
                            <span class="text-xs text-gray-500 font-medium uppercase tracking-wide">Payment Code</span>
                            <div class="bg-gray-100 rounded-lg p-3 border-l-4 border-blue-500">
                                <span class="font-mono text-sm text-gray-800"><?php echo e($payment->payment_code); ?></span>
                            </div>
                        </div>
                        
                        <form action="<?php echo e(route('payments.update.status', $payment->id)); ?>" method="POST" class="pt-2">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <select name="status" onchange="this.form.submit()" 
                                    class="w-full text-sm border-2 border-gray-200 rounded-xl p-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all bg-white shadow-sm">
                                <option value="pending" <?php echo e($payment->status == 'pending' ? 'selected' : ''); ?>>⏳ Pending</option>
                                <option value="confirmed" <?php echo e($payment->status == 'confirmed' ? 'selected' : ''); ?>>✅ Confirmed</option>
                                <option value="cancelled" <?php echo e($payment->status == 'cancelled' ? 'selected' : ''); ?>>❌ Cancelled</option>
                            </select>
                        </form>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="text-center py-16">
                        <div class="w-20 h-20 mx-auto mb-6 bg-gradient-to-br from-gray-100 to-gray-200 rounded-2xl flex items-center justify-center shadow-lg">
                            <i class="fa-solid fa-credit-card text-3xl text-gray-400"></i>
                        </div>
                        <h4 class="text-xl font-semibold text-gray-600 mb-2">No Payment Records</h4>
                        <p class="text-gray-500">Payment transactions will appear here once customers make purchases</p>
                    </div>
                    <?php endif; ?>
                </div>

                <!-- Desktop View -->
                <div class="hidden md:block overflow-hidden rounded-xl border border-gray-200">
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gradient-to-r from-gray-50 to-gray-100">
                                <tr>
                                    <th class="text-left p-4 font-bold text-gray-700 text-sm uppercase tracking-wide">No.</th>
                                    <th class="text-left p-4 font-bold text-gray-700 text-sm uppercase tracking-wide">Date</th>
                                    <th class="text-left p-4 font-bold text-gray-700 text-sm uppercase tracking-wide">Customer</th>
                                    <th class="text-left p-4 font-bold text-gray-700 text-sm uppercase tracking-wide">Bank</th>
                                    <th class="text-left p-4 font-bold text-gray-700 text-sm uppercase tracking-wide">Amount</th>
                                    <th class="text-left p-4 font-bold text-gray-700 text-sm uppercase tracking-wide">Payment Code</th>
                                    <th class="text-left p-4 font-bold text-gray-700 text-sm uppercase tracking-wide">Status</th>
                                    <th class="text-left p-4 font-bold text-gray-700 text-sm uppercase tracking-wide">Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                <?php $__empty_1 = true; $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr class="hover:bg-gradient-to-r hover:from-blue-25 hover:to-blue-50 transition-all duration-200 group">
                                    <td class="p-4 text-gray-600 font-medium"><?php echo e($index + 1); ?></td>
                                    <td class="p-4 text-gray-600 font-medium"><?php echo e($payment->created_at->format('d M Y')); ?></td>
                                    <td class="p-4">
                                        <div class="font-semibold text-gray-800 group-hover:text-blue-800 transition-colors">
                                            <?php echo e($payment->full_name); ?>

                                        </div>
                                    </td>
                                    <td class="p-4">
                                        <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-lg text-sm font-medium">
                                            <?php echo e($payment->bank_name); ?>

                                        </span>
                                    </td>
                                    <td class="p-4 font-bold text-green-600 text-lg">Rp <?php echo e(number_format($payment->total_amount, 0, ',', '.')); ?></td>
                                    <td class="p-4">
                                        <div class="bg-gray-50 rounded-lg p-2 border-l-4 border-blue-500">
                                            <span class="font-mono text-sm text-gray-700"><?php echo e($payment->payment_code); ?></span>
                                        </div>
                                    </td>
                                    <td class="p-4">
                                        <span class="px-4 py-2 rounded-xl text-xs font-bold shadow-sm
                                            <?php if($payment->status == 'confirmed'): ?> bg-green-100 text-green-800 border border-green-200
                                            <?php elseif($payment->status == 'cancelled'): ?> bg-red-100 text-red-800 border border-red-200
                                            <?php else: ?> bg-yellow-100 text-yellow-800 border border-yellow-200 <?php endif; ?>">
                                            <?php echo e(ucfirst($payment->status)); ?>

                                        </span>
                                    </td>
                                    <td class="p-4">
                                        <form action="<?php echo e(route('payments.update.status', $payment->id)); ?>" method="POST" class="inline">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('PUT'); ?>
                                            <select name="status" onchange="this.form.submit()" 
                                                    class="text-sm border-2 border-gray-200 rounded-lg p-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all bg-white shadow-sm min-w-[120px]">
                                                <option value="pending" <?php echo e($payment->status == 'pending' ? 'selected' : ''); ?>>⏳ Pending</option>
                                                <option value="confirmed" <?php echo e($payment->status == 'confirmed' ? 'selected' : ''); ?>>✅ Confirmed</option>
                                                <option value="cancelled" <?php echo e($payment->status == 'cancelled' ? 'selected' : ''); ?>>❌ Cancelled</option>
                                            </select>
                                        </form>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="8" class="p-16 text-center">
                                        <div class="flex flex-col items-center">
                                            <div class="w-20 h-20 mb-6 bg-gradient-to-br from-gray-100 to-gray-200 rounded-2xl flex items-center justify-center shadow-lg">
                                                <i class="fa-solid fa-credit-card text-3xl text-gray-400"></i>
                                            </div>
                                            <h4 class="text-xl font-semibold text-gray-600 mb-2">No Payment Records</h4>
                                            <p class="text-gray-500">Payment transactions will appear here once customers make purchases</p>
                                        </div>
                                    </td>
                                </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    function fetchWeather() {
        fetch('/api/weather')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                this.weather = data;
            })
            .catch(error => {
                console.error('Error fetching weather:', error);
                this.weather = {
                    temperature: 'N/A',
                    description: 'Unable to fetch weather data'
                };
            });
    }

    document.addEventListener('DOMContentLoaded', function() {
        fetch('/website-usage-data')
            .then(response => response.json())
            .then(data => {
                const ctx = document.getElementById('websiteUsageChart').getContext('2d');
                new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: data.map(item => item.date),
                        datasets: [{
                            label: 'Website Visits',
                            data: data.map(item => item.visits),
                            borderColor: 'rgb(59, 130, 246)',
                            backgroundColor: 'rgba(59, 130, 246, 0.1)',
                            borderWidth: 3,
                            tension: 0.4,
                            fill: true,
                            pointBackgroundColor: 'rgb(59, 130, 246)',
                            pointBorderColor: '#ffffff',
                            pointBorderWidth: 3,
                            pointRadius: 6,
                            pointHoverRadius: 8
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: { 
                                    display: false,
                                    color: '#6B7280'
                                },
                                grid: { 
                                    display: true,
                                    color: 'rgba(0,0,0,0.05)'
                                },
                                border: {
                                    display: false
                                }
                            },
                            x: {
                                ticks: { 
                                    display: false,
                                    color: '#6B7280'
                                },
                                grid: { 
                                    display: false
                                },
                                border: {
                                    display: false
                                }
                            }
                        },
                        plugins: {
                            legend: { display: false },
                            tooltip: {
                                backgroundColor: 'rgba(0, 0, 0, 0.8)',
                                titleColor: '#ffffff',
                                bodyColor: '#ffffff',
                                borderColor: 'rgb(59, 130, 246)',
                                borderWidth: 2,
                                cornerRadius: 8,
                                displayColors: false
                            }
                        },
                        interaction: {
                            intersect: false,
                            mode: 'index'
                        }
                    }
                });

                if (data.length > 1) {
                    const firstValue = data[0].visits;
                    const lastValue = data[data.length - 1].visits;
                    const percentageIncrease = ((lastValue - firstValue) / firstValue * 100).toFixed(1);
                    document.getElementById('visitsPercentage').textContent = percentageIncrease;
                }
            })
            .catch(error => {
                console.error('Error fetching chart data:', error);
            });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Coding\Project 4 matklul\Vitalife-1\resources\views\admin\dashboard.blade.php ENDPATH**/ ?>