<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ $medicine->nama }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Back Button -->
            <div class="mb-6">
                <a href="{{ route('user.medicines.index') }}" 
                   class="inline-flex items-center px-4 py-2 bg-white bg-opacity-10 backdrop-blur-sm hover:bg-opacity-20 text-gray-800 rounded-lg transition-all duration-200 border border-white border-opacity-20">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Back to Medicine List
                </a>
            </div>

            <!-- Main Content Card -->
            <div class="bg-white bg-opacity-10 backdrop-blur-lg rounded-2xl shadow-2xl border border-white border-opacity-20 overflow-hidden">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-0">
                    <!-- Image Section -->
                    <div class="relative h-96 lg:h-full">
                        @if($medicine->image)
                            <img src="{{ $medicine->image_url }}" alt="{{ $medicine->nama }}" 
                                 class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-blue-500 via-purple-600 to-pink-500 flex items-center justify-center">
                                <div class="text-center">
                                    <i class="fas fa-pills text-8xl text-white mb-4 opacity-80"></i>
                                    <p class="text-white text-lg font-medium opacity-70">{{ $medicine->nama }}</p>
                                </div>
                            </div>
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-t from-black from-0% via-transparent to-transparent opacity-20"></div>
                    </div>

                    <!-- Details Section -->
                    <div class="p-8 lg:p-10">
                        <!-- Title -->
                        <div class="mb-8">
                            <h1 class="text-4xl font-bold text-gray-800 mb-2">{{ $medicine->nama }}</h1>
                            <div class="w-20 h-1 bg-gradient-to-r from-blue-400 to-purple-400 rounded-full"></div>
                        </div>
                        
                        <!-- Medicine Info -->
                        <div class="space-y-6 mb-8">
                            <div class="flex items-center justify-between p-4 bg-white bg-opacity-5 rounded-xl border border-white border-opacity-10">
                                <span class="text-gray-800 font-medium">Category</span>
                                <span class="inline-flex items-center px-4 py-2 bg-blue-500 bg-opacity-20 text-blue-800 rounded-full text-sm font-semibold border border-blue-500 border-opacity-30">
                                    <i class="fas fa-tag mr-2 text-xs"></i>
                                    {{ $medicine->kategori }}
                                </span>
                            </div>

                            <div class="flex items-center justify-between p-4 bg-white bg-opacity-5 rounded-xl border border-white border-opacity-10">
                                <span class="text-gray-800 font-medium">Manufacturer</span>
                                <span class="inline-flex items-center px-4 py-2 bg-purple-500 bg-opacity-20 text-purple-800 rounded-full text-sm font-semibold border border-purple-500 border-opacity-30">
                                    <i class="fas fa-industry mr-2 text-xs"></i>
                                    {{ $medicine->produsen }}
                                </span>
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="mb-8">
                            <h3 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">
                                <i class="fas fa-info-circle mr-3 text-blue-400"></i>
                                Description
                            </h3>
                            <div class="p-4 bg-white bg-opacity-5 rounded-xl border border-white border-opacity-10">
                                <p class="text-gray-700 leading-relaxed">{{ $medicine->deskripsi }}</p>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex flex-col sm:flex-row gap-4">
                            <button class="flex-1 px-6 py-4 bg-white bg-opacity-10 hover:bg-opacity-20 text-gray-800 rounded-xl transition-all duration-200 font-semibold border border-white border-opacity-20 backdrop-blur-sm">
                                <i class="fas fa-bookmark mr-2"></i>
                                Save Medicine
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Additional Info Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
                <div class="bg-white bg-opacity-10 backdrop-blur-lg rounded-xl p-6 border border-white border-opacity-20">
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 bg-blue-500 bg-opacity-20 rounded-lg flex items-center justify-center mr-3">
                            <i class="fas fa-pills text-blue-400"></i>
                        </div>
                        <h4 class="text-gray-800 font-semibold">Composition</h4>
                    </div>
                    <p class="text-gray-700 text-sm">Detailed information about active ingredients and medicine composition.</p>
                </div>

                <div class="bg-white bg-opacity-10 backdrop-blur-lg rounded-xl p-6 border border-white border-opacity-20">
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 bg-green-500 bg-opacity-20 rounded-lg flex items-center justify-center mr-3">
                            <i class="fas fa-clipboard-list text-green-400"></i>
                        </div>
                        <h4 class="text-gray-800 font-semibold">Indications</h4>
                    </div>
                    <p class="text-gray-700 text-sm">Uses and medical indications for taking this medicine, as advised by a doctor.</p>
                </div>

                <div class="bg-white bg-opacity-10 backdrop-blur-lg rounded-xl p-6 border border-white border-opacity-20">
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 bg-red-500 bg-opacity-20 rounded-lg flex items-center justify-center mr-3">
                            <i class="fas fa-exclamation-triangle text-red-400"></i>
                        </div>
                        <h4 class="text-gray-800 font-semibold">Side Effects</h4>
                    </div>
                    <p class="text-gray-700 text-sm">Possible side effects and important warnings for using this medication.</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
