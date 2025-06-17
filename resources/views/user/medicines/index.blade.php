<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-3xl text-gray-800 leading-tight flex items-center">
                <div class="bg-gradient-to-r from-blue-500 to-purple-600 p-3 rounded-xl mr-4 shadow-lg">
                    <i class="fas fa-pills text-white text-xl"></i>
                </div>
                {{ __('Katalog Obat & Kesehatan') }}
            </h2>
            <div class="flex items-center space-x-4">
                <div class="text-sm text-gray-600 bg-white px-4 py-2 rounded-lg shadow-sm">
                    <i class="fas fa-info-circle mr-2 text-blue-500"></i>
                    Total: <span class="font-semibold text-gray-800">{{ $medicines->total() ?? 0 }}</span> obat
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-8 min-h-screen bg-gradient-to-br from-blue-50 via-white to-purple-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Search and Filter Section -->
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-8 mb-8 backdrop-blur-sm">
                <div class="flex items-center mb-6">
                    <div class="bg-gradient-to-r from-blue-500 to-purple-600 p-3 rounded-xl mr-4">
                        <i class="fas fa-search text-white text-lg"></i>
                    </div>
                    <h3 class="text-gray-800 font-bold text-xl">Search & Filter Medicine</h3>
                </div>
                
                <form method="GET" action="{{ route('user.medicines.index') }}" class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        <!-- Search Input -->
                        <div class="lg:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Search</label>
                            <div class="relative">
                                <input type="text" name="search" value="{{ request('search') }}" 
                                       placeholder="Search for drug name, category, or manufacturer..." 
                                       class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 bg-gray-50 hover:bg-white">
                                <i class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                            </div>
                        </div>
                        
                        <!-- Category Filter -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Categories</label>
                            <div class="relative">
                                <select name="kategori" class="w-full pl-4 pr-10 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 appearance-none bg-gray-50 hover:bg-white transition-all duration-300">
                                    <option value="">All Categories</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category }}" {{ request('kategori') == $category ? 'selected' : '' }}>
                                            {{ $category }}
                                        </option>
                                    @endforeach
                                </select>
                                <i class="fas fa-chevron-down absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 pointer-events-none"></i>
                            </div>
                        </div>
                        
                        <!-- Producer Filter -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Manufacturers</label>
                            <div class="relative">
                                <select name="produsen" class="w-full pl-4 pr-10 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 appearance-none bg-gray-50 hover:bg-white transition-all duration-300">
                                    <option value="">All Manufacturers</option>
                                    @foreach($manufacturers as $manufacturer)
                                        <option value="{{ $manufacturer }}" {{ request('produsen') == $manufacturer ? 'selected' : '' }}>
                                            {{ $manufacturer }}
                                        </option>
                                    @endforeach
                                </select>
                                <i class="fas fa-chevron-down absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 pointer-events-none"></i>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="flex flex-wrap gap-4 pt-4">
                        <button type="submit" class="px-8 py-3 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white rounded-xl font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                            <i class="fas fa-search mr-2"></i>Search for Medicine
                        @if(request('search') || request('kategori') || request('produsen'))
                            <a href="{{ route('user.medicines.index') }}" class="px-8 py-3 bg-gradient-to-r from-gray-500 to-gray-600 hover:from-gray-600 hover:to-gray-700 text-white rounded-xl font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                                <i class="fas fa-times mr-2"></i>Reset Filter
                            </a>
                        @endif
                    </div>
                </form>
            </div>

            <!-- Medicines Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                @forelse($medicines as $medicine)
                    <div class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100 overflow-hidden group">
                        <!-- Image Section -->
                        <div class="relative overflow-hidden">
                            @if($medicine->image)
                                <img src="{{ $medicine->image_url }}" alt="{{ $medicine->nama }}" 
                                     class="w-full h-56 object-cover transition-transform duration-500 group-hover:scale-110">
                            @else
                                <div class="w-full h-56 bg-gradient-to-br from-blue-400 via-purple-500 to-pink-500 flex items-center justify-center relative">
                                    <div class="absolute inset-0 bg-gradient-to-br from-transparent via-white/10 to-transparent"></div>
                                    <i class="fas fa-pills text-6xl text-white relative z-10 drop-shadow-lg"></i>
                                </div>
                            @endif
                            
                            <!-- Status Badges -->
                            <!-- <div class="absolute top-4 right-4 flex flex-col gap-2">
                                <span class="px-3 py-1 rounded-full text-xs font-semibold backdrop-blur-sm shadow-lg
                                    @if($medicine->stock_status_color == 'green') bg-green-500 text-white
                                    @elseif($medicine->stock_status_color == 'yellow') bg-yellow-500 text-white
                                    @else bg-red-500 text-white @endif">
                                    {{ $medicine->stock_status }}
                                </span>
                            </div> -->

                            <!-- Hover Overlay -->
                            <div class="absolute inset-0 bg-black bg-opacity-40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                <div class="text-white text-center">
                                    <i class="fas fa-eye text-2xl mb-2"></i>
                                    <p class="text-sm font-medium">Lihat Detail</p>
                                </div>
                            </div>
                        </div>

                        <!-- Content Section -->
                        <div class="p-6 space-y-4">
                            <div>
                                <h3 class="text-xl font-bold text-gray-800 mb-2 line-clamp-2 group-hover:text-blue-600 transition-colors">
                                    {{ $medicine->nama }}
                                </h3>
                                
                                <p class="text-gray-600 text-sm line-clamp-3 leading-relaxed">
                                    {{ $medicine->short_description }}
                                </p>
                            </div>
                            
                            <!-- Tags -->
                            <div class="flex flex-wrap gap-2">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-700 border border-blue-200">
                                    <i class="fas fa-tag mr-1"></i>{{ $medicine->kategori }}
                                </span>
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-purple-100 text-purple-700 border border-purple-200">
                                    <i class="fas fa-building mr-1"></i>{{ $medicine->produsen }}
                                </span>
                            </div>
                            
                            <!-- Price and Stock -->
                            <div class="flex justify-between items-center py-3 border-t border-gray-100">
                                <div>
                                    <span class="text-green-600 font-bold text-2xl">{{ $medicine->formatted_price }}</span>
                                </div>
                                <div class="text-right">
                                    <div class="text-sm text-gray-600">
                                        <!-- Stok: <span class="font-semibold text-gray-800">{{ $medicine->stok }}</span> -->
                                    </div>
                                </div>
                            </div>

                            <!-- Expiry Info -->
                            <!-- <div class="flex items-center justify-between text-sm py-2 border-t border-gray-100">
                                <span class="px-3 py-1 rounded-full text-xs font-medium
                                    @if($medicine->expiry_status_color == 'green') bg-green-100 text-green-700
                                    @elseif($medicine->expiry_status_color == 'yellow') bg-yellow-100 text-yellow-700
                                    @else bg-red-100 text-red-700 @endif">
                                    {{ $medicine->expiry_status }}
                                </span>
                                <span class="text-gray-500 flex items-center">
                                    <i class="fas fa-calendar-alt mr-1"></i>
                                    {{ $medicine->tanggal_kadaluarsa->format('d/m/Y') }}
                                </span>
                            </div> -->

                            <!-- Action Buttons -->
                            <div class="flex gap-3 pt-4">
                                <a href="{{ route('user.medicines.show', $medicine->id_medicine) }}" 
                                   class="flex-1 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white text-center py-3 rounded-xl transition-all duration-300 font-semibold shadow-lg hover:shadow-xl transform hover:scale-105">
                                    <i class="fas fa-eye mr-2"></i>Detail
                                </a>
                                @if($medicine->isAvailable() && !$medicine->isExpired())
                                    <!-- <button class="flex-1 bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white py-3 rounded-xl transition-all duration-300 font-semibold shadow-lg hover:shadow-xl transform hover:scale-105" 
                                            onclick="showPurchaseAlert()">
                                        <i class="fas fa-shopping-cart mr-2"></i>Beli
                                    </button> -->
                                @else
                                    <button disabled class="flex-1 bg-gray-300 text-gray-500 py-3 rounded-xl cursor-not-allowed font-semibold">
                                        <i class="fas fa-times mr-2"></i>
                                        @if($medicine->isExpired()) Kadaluarsa @else Habis @endif
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <!-- Empty State -->
                    <div class="col-span-full">
                        <div class="bg-white rounded-2xl shadow-lg p-16 text-center border border-gray-100">
                            <div class="mb-8">
                                <div class="bg-gradient-to-r from-blue-500 to-purple-600 w-24 h-24 rounded-full flex items-center justify-center mx-auto mb-6">
                                    <i class="fas fa-pills text-4xl text-white"></i>
                                </div>
                                <h3 class="text-2xl font-bold text-gray-800 mb-3">Tidak Ada Obat Ditemukan</h3>
                                <p class="text-gray-600 max-w-md mx-auto">
                                    Maaf, tidak ada obat yang sesuai dengan pencarian Anda. Coba ubah kata kunci atau filter yang digunakan.
                                </p>
                            </div>
                            @if(request('search') || request('kategori') || request('produsen'))
                                <a href="{{ route('user.medicines.index') }}" class="inline-flex items-center px-8 py-3 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white rounded-xl font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg">
                                    <i class="fas fa-list mr-2"></i>Lihat Semua Obat
                                </a>
                            @endif
                        </div>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if($medicines->hasPages())
                <div class="mt-12">
                    <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100">
                        <div class="flex justify-center">
                            <div class="pagination-wrapper">
                                {{ $medicines->appends(request()->query())->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <style>
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        
        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        
        .pagination-wrapper .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 0.5rem;
        }
        
        .pagination-wrapper .pagination a,
        .pagination-wrapper .pagination span {
            padding: 0.75rem 1rem;
            border-radius: 0.75rem;
            font-weight: 500;
            transition: all 0.3s ease;
            min-width: 2.5rem;
            text-align: center;
        }
        
        .pagination-wrapper .pagination a {
            background: #f8fafc;
            color: #64748b;
            text-decoration: none;
            border: 1px solid #e2e8f0;
        }
        
        .pagination-wrapper .pagination a:hover {
            background: linear-gradient(to right, #3b82f6, #1d4ed8);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(59, 130, 246, 0.3);
        }
        
        .pagination-wrapper .pagination .active span {
            background: linear-gradient(to right, #3b82f6, #1d4ed8);
            color: white;
            box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3);
        }
        
        .pagination-wrapper .pagination .disabled span {
            background: #f1f5f9;
            color: #cbd5e1;
            cursor: not-allowed;
        }
    </style>

    <script>
        function showPurchaseAlert() {
            Swal.fire({
                title: 'Fitur Pembelian',
                text: 'Fitur pembelian akan segera tersedia! Kami sedang mengembangkan sistem pembayaran yang aman untuk Anda.',
                icon: 'info',
                confirmButtonText: 'Mengerti',
                confirmButtonColor: '#3b82f6',
                background: '#ffffff',
                color: '#374151',
                backdrop: 'rgba(0, 0, 0, 0.4)',
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                }
            });
        }

        // Add scroll animations
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.grid > div');
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach((entry, index) => {
                    if (entry.isIntersecting) {
                        setTimeout(() => {
                            entry.target.style.opacity = '1';
                            entry.target.style.transform = 'translateY(0)';
                        }, index * 100);
                    }
                });
            }, { threshold: 0.1 });

            cards.forEach(card => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(30px)';
                card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
                observer.observe(card);
            });
        });
    </script>
</x-app-layout>