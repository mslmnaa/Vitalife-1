@extends('layouts.admin')

@section('judul-halaman', 'Voucher Management')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-purple-50 to-pink-100">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <!-- Header Section with Logo -->
            <div class="bg-white rounded-2xl shadow-xl p-6 mb-8">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <div class="flex items-center mb-4 md:mb-0">
                        <!-- Voucher Logo -->
                        <div class="bg-gradient-to-br from-purple-500 to-pink-600 rounded-xl p-3 mr-4">
                            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M4 4c-1.11 0-2 .89-2 2v3c1.11 0 2 .89 2 2s-.89 2-2 2v3c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2v-3c-1.11 0-2-.89-2-2s.89-2 2-2V6c0-1.11-.89-2-2-2H4zm8 2.5c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zM7.5 12c-.83 0-1.5.67-1.5 1.5S6.67 15 7.5 15s1.5-.67 1.5-1.5S8.33 12 7.5 12zm9 0c-.83 0-1.5.67-1.5 1.5s.67 1.5 1.5 1.5 1.5-.67 1.5-1.5-.67-1.5-1.5-1.5z"/>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-3xl font-bold bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent">
                                VoucherManager
                            </h1>
                            <p class="text-gray-600">Discount & Promotion System</p>
                        </div>
                    </div>
                    
                    <!-- Stats Cards -->
                    <div class="flex flex-wrap gap-4">
                        <div class="bg-gradient-to-r from-green-400 to-green-600 rounded-lg p-4 text-white min-w-24">
                            <div class="text-2xl font-bold">{{ $vouchers->count() }}</div>
                            <div class="text-sm opacity-90">Total Vouchers</div>
                        </div>
                        <div class="bg-gradient-to-r from-blue-400 to-blue-600 rounded-lg p-4 text-white min-w-24">
                            <div class="text-2xl font-bold">{{ $vouchers->where('is_used', false)->where('expired_at', '>', now())->count() }}</div>
                            <div class="text-sm opacity-90">Active</div>
                        </div>
                        <div class="bg-gradient-to-r from-red-400 to-red-600 rounded-lg p-4 text-white min-w-24">
                            <div class="text-2xl font-bold">{{ $vouchers->where('expired_at', '<', now())->count() }}</div>
                            <div class="text-sm opacity-90">Expired</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Bar -->
            <div class="bg-white rounded-2xl shadow-lg p-6 mb-8">
                <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                    <div class="flex items-center space-x-4">
                        <h2 class="text-xl font-semibold text-gray-800">Voucher Collection</h2>
                        <!-- Filter Dropdown -->
                        <div class="relative group">
                            <button class="flex items-center space-x-2 px-4 py-2 bg-gray-100 hover:bg-gray-200 rounded-lg transition-colors duration-200" 
                                    onclick="toggleDropdown('filterDropdown')">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 2v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                                </svg>
                                <span>Filter</span>
                            </button>
                            <!-- Tooltip -->
                            <div class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 px-2 py-1 bg-gray-800 text-white text-xs rounded opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none">
                                Filter vouchers by status
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center space-x-3">
                        <!-- Search Bar -->
                        <div class="relative">
                            <input type="text" placeholder="Search vouchers..." 
                                class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                            <svg class="absolute left-3 top-2.5 w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>

                        <!-- Create Voucher Button -->
                        <a href="{{ route('admin.vouchers.create') }}"
                        class="group relative bg-gradient-to-r from-purple-500 to-pink-600 hover:from-purple-600 hover:to-pink-700 text-white font-semibold py-2 px-6 rounded-lg transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                            <div class="flex items-center space-x-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                <span>Create Voucher</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            @if (session('success'))
                <div class="bg-green-50 border-l-4 border-green-400 p-4 mb-6 rounded-r-lg animate-pulse">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-green-400 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-green-700 font-medium">{{ session('success') }}</span>
                    </div>
                </div>
            @endif

            <!-- Enhanced Table -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead class="bg-gradient-to-r from-gray-50 to-gray-100">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Voucher</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Discount</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Usage</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Expires</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @forelse ($vouchers as $voucher)
                                <tr class="hover:bg-gray-50 transition-colors duration-200">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <div class="relative group">
                                                @if($voucher->image)
                                                    <img class="h-12 w-20 rounded-xl object-cover shadow-md cursor-pointer" 
                                                        src="{{ asset($voucher->image) }}" 
                                                        alt="{{ $voucher->code }}"
                                                        onclick="showImageModal('{{ asset($voucher->image) }}', '{{ $voucher->code }}')">
                                                @else
                                                    <div class="h-12 w-20 rounded-xl bg-gradient-to-br from-purple-200 to-pink-300 flex items-center justify-center">
                                                        <svg class="w-6 h-6 text-purple-500" fill="currentColor" viewBox="0 0 24 24">
                                                            <path d="M4 4c-1.11 0-2 .89-2 2v3c1.11 0 2 .89 2 2s-.89 2-2 2v3c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2v-3c-1.11 0-2-.89-2-2s.89-2 2-2V6c0-1.11-.89-2-2-2H4z"/>
                                                        </svg>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-semibold text-gray-900">{{ $voucher->code }}</div>
                                                <div class="text-xs text-gray-500">Voucher Code</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <div class="bg-gradient-to-r from-orange-100 to-red-100 rounded-full p-2 mr-2">
                                                <svg class="w-4 h-4 text-orange-600" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                                </svg>
                                            </div>
                                            <div>
                                                <div class="text-lg font-bold text-orange-600">{{ $voucher->discount_percentage }}%</div>
                                                <div class="text-xs text-gray-500">Discount</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex flex-col">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $voucher->usage_count }} / {{ $voucher->usage_limit ? $voucher->usage_limit : '∞' }}
                                            </div>
                                            <div class="w-full bg-gray-200 rounded-full h-2 mt-1">
                                                @php
                                                    $percentage = $voucher->usage_limit ? ($voucher->usage_count / $voucher->usage_limit) * 100 : 0;
                                                @endphp
                                                <div class="bg-gradient-to-r from-blue-400 to-blue-600 h-2 rounded-full" 
                                                     style="width: {{ min($percentage, 100) }}%"></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex flex-col">
                                            <span class="text-sm text-gray-900">
                                                {{ $voucher->expired_at ? \Carbon\Carbon::parse($voucher->expired_at)->format('d/m/Y') : 'Never' }}
                                            </span>
                                            @if($voucher->expired_at)
                                                <span class="text-xs text-gray-500">
                                                    {{ \Carbon\Carbon::parse($voucher->expired_at)->diffForHumans() }}
                                                </span>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        @if($voucher->is_used)
                                            <span class="px-3 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">
                                                Used
                                            </span>
                                        @elseif($voucher->expired_at && now() > $voucher->expired_at)
                                            <span class="px-3 py-1 text-xs font-semibold rounded-full bg-gray-100 text-gray-800">
                                                Expired
                                            </span>
                                        @else
                                            <span class="px-3 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                                Active
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center space-x-2">
                                            <!-- View Button -->
                                            <a href="{{ route('admin.vouchers.show', $voucher) }}"
                                            class="inline-flex items-center px-3 py-2 bg-indigo-100 hover:bg-indigo-200 text-indigo-700 rounded-lg transition-colors duration-200 group"
                                            title="View details">
                                                <svg class="w-4 h-4 group-hover:scale-110 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                                </svg>
                                            </a>

                                            <!-- Edit Button -->
                                            <a href="{{ route('admin.vouchers.edit', $voucher) }}"
                                            class="inline-flex items-center px-3 py-2 bg-blue-100 hover:bg-blue-200 text-blue-700 rounded-lg transition-colors duration-200 group"
                                            title="Edit voucher">
                                                <svg class="w-4 h-4 group-hover:scale-110 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                                </svg>
                                            </a>

                                            <!-- Delete Button -->
                                            <button type="button"
                                                    onclick="showDeleteModal('{{ $voucher->id }}', '{{ addslashes($voucher->code) }}')"
                                                    class="inline-flex items-center px-3 py-2 bg-red-100 hover:bg-red-200 text-red-700 rounded-lg transition-colors duration-200 group"
                                                    title="Delete voucher">
                                                <svg class="w-4 h-4 group-hover:scale-110 transition-transform duration-200" fill="currentColor" viewBox="0 0 24 24">
                                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-12 text-center">
                                        <div class="flex flex-col items-center">
                                            <div class="bg-gradient-to-br from-purple-100 to-pink-200 rounded-full p-6 mb-4">
                                                <svg class="w-16 h-16 text-purple-400" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M4 4c-1.11 0-2 .89-2 2v3c1.11 0 2 .89 2 2s-.89 2-2 2v3c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2v-3c-1.11 0-2-.89-2-2s.89-2 2-2V6c0-1.11-.89-2-2-2H4z"/>
                                                </svg>
                                            </div>
                                            <h3 class="text-xl font-semibold text-gray-900 mb-2">No vouchers found</h3>
                                            <p class="text-gray-500 mb-6">Get started by creating your first promotional voucher.</p>
                                            <a href="{{ route('admin.vouchers.create') }}" 
                                            class="bg-gradient-to-r from-purple-500 to-pink-600 hover:from-purple-600 hover:to-pink-700 text-white font-semibold py-3 px-6 rounded-lg transition-all duration-300 transform hover:scale-105">
                                                Create Your First Voucher
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full mx-4 transform transition-all duration-300">
            <div class="p-6">
                <div class="flex items-center justify-center w-12 h-12 mx-auto bg-red-100 rounded-full mb-4">
                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 text-center mb-2">Delete Voucher</h3>
                <p class="text-gray-600 text-center mb-6">Are you sure you want to delete voucher <span id="voucherCode" class="font-semibold"></span>? This action cannot be undone.</p>
                
                <div class="flex space-x-3">
                    <button onclick="hideDeleteModal()" 
                            class="flex-1 px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors duration-200">
                        Cancel
                    </button>
                    <form id="deleteForm" method="POST" class="flex-1">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="w-full px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors duration-200">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Image Modal -->
    <div id="imageModal" class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-50 hidden">
        <div class="max-w-4xl max-h-full p-4">
            <div class="relative">
                <button onclick="hideImageModal()" 
                        class="absolute -top-10 right-0 text-white hover:text-gray-300 transition-colors duration-200">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
                <img id="modalImage" src="" alt="" class="max-w-full max-h-full rounded-lg">
                <div class="text-center mt-4">
                    <h3 id="modalImageTitle" class="text-white text-lg font-semibold"></h3>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showDeleteModal(id, code) {
            document.getElementById('voucherCode').textContent = code;
            document.getElementById('deleteForm').action = `/admin/vouchers/${id}`;
            document.getElementById('deleteModal').classList.remove('hidden');
        }

        function hideDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
        }

        function showImageModal(src, title) {
            document.getElementById('modalImage').src = src;
            document.getElementById('modalImageTitle').textContent = title;
            document.getElementById('imageModal').classList.remove('hidden');
        }

        function hideImageModal() {
            document.getElementById('imageModal').classList.add('hidden');
        }

        function toggleDropdown(id) {
            // Add your dropdown logic here
            console.log('Toggle dropdown:', id);
        }

        // Close modals when clicking outside
        document.addEventListener('click', function(event) {
            const deleteModal = document.getElementById('deleteModal');
            const imageModal = document.getElementById('imageModal');
            
            if (event.target === deleteModal) {
                hideDeleteModal();
            }
            if (event.target === imageModal) {
                hideImageModal();
            }
        });
    </script>
@endsection