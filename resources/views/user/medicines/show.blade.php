<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ $medicine->nama }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="glass-panel p-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Image -->
                    <div>
                        @if($medicine->image)
                            <img src="{{ $medicine->image_url }}" alt="{{ $medicine->nama }}" 
                                 class="w-full h-96 object-cover rounded-lg shadow-lg">
                        @else
                            <div class="w-full h-96 bg-gradient-to-br from-blue-500 to-purple-600 rounded-lg flex items-center justify-center shadow-lg">
                                <i class="fas fa-pills text-8xl text-white"></i>
                            </div>
                        @endif
                    </div>

                    <!-- Details -->
                    <div>
                        <h1 class="text-3xl font-bold text-black mb-4">{{ $medicine->nama }}</h1>
                        
                        <div class="space-y-4 mb-6">
                            <div>
                                <span class="text-black-300">Kategori:</span>
                                <span class="inline-block bg-blue-600 bg-opacity-20 text-blue-400 px-3 py-1 rounded-full text-sm ml-2">
                                    {{ $medicine->kategori }}
                                </span>
                            </div>

                            <div>
                                <span class="text-black-300">Produsen:</span>
                                <span class="inline-block bg-purple-600 bg-opacity-20 text-purple-400 px-3 py-1 rounded-full text-sm ml-2">
                                    {{ $medicine->produsen }}
                                </span>
                            </div>
                            
                            <!-- <div>
                                <span class="text-black-300">Harga:</span>
                                <span class="text-green-400 font-bold text-2xl ml-2">{{ $medicine->formatted_price }}</span>
                            </div> -->
                            
                            <!-- <div>
                                <span class="text-black-300">Stok:</span>
                                <span class="text-black font-semibold ml-2">{{ $medicine->stok }} unit</span>
                                <span class="inline-block px-2 py-1 rounded-full text-xs ml-2
                                    @if($medicine->stock_status_color == 'green') bg-green-600 bg-opacity-20 text-green-400
                                    @elseif($medicine->stock_status_color == 'yellow') bg-yellow-600 bg-opacity-20 text-yellow-400
                                    @else bg-red-600 bg-opacity-20 text-red-400 @endif">
                                    {{ $medicine->stock_status }}
                                </span>
                            </div> -->

                            <!-- <div>
                                <span class="text-black-300">Tanggal Kadaluarsa:</span>
                                <span class="text-black ml-2">{{ $medicine->tanggal_kadaluarsa->format('d M Y') }}</span>
                                <span class="inline-block px-2 py-1 rounded-full text-xs ml-2
                                    @if($medicine->expiry_status_color == 'green') bg-green-600 bg-opacity-20 text-green-400
                                    @elseif($medicine->expiry_status_color == 'red') bg-yellow-600 bg-opacity-20 text-yellow-400
                                    @else bg-red-600 bg-opacity-20 text-red-400 @endif">
                                    {{ $medicine->expiry_status }}
                                </span>
                            </div> -->

                            <!-- @if($medicine->days_until_expiry > 0)
                                <div>
                                    <span class="text-black-300">Sisa Hari:</span>
                                    <span class="text-black ml-2">{{ $medicine->days_until_expiry }} hari lagi</span>
                                </div>
                            @endif
                        </div> -->

                        <div class="mb-6">
                            <h3 class="text-lg font-semibold text-black mb-2">Deskripsi</h3>
                            <p class="text-black-300 leading-relaxed">{{ $medicine->deskripsi }}</p>
                        </div>

                        <div class="flex gap-4">
                            @if($medicine->isAvailable() && !$medicine->isExpired())
                                {{-- <button class="flex-1 bg-green-600 hover:bg-green-700 text-white py-3 rounded-lg transition-colors font-semibold"
                                        onclick="alert('Fitur pembelian akan segera tersedia!')">
                                    {{-- <i class="fas fa-shopping-cart mr-2"></i>Beli Sekarang --}}
                                {{-- </button> --}} 
                            @else
                                <button disabled class="flex-1 bg-black-600 text-black-400 py-3 rounded-lg cursor-not-allowed font-semibold">
                                    <i class="fas fa-times mr-2"></i>
                                    @if($medicine->isExpired()) 
                                        Obat Kadaluarsa
                                    @else 
                                        Stok Habis
                                    @endif
                                </button>
                            @endif
                            <a href="{{ route('user.medicines.index') }}" class="px-6 py-3 bg-black-600 hover:bg-black-700 text-black rounded-lg transition-colors">
                                <i class="fas fa-arrow-left mr-2"></i>Kembali
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
