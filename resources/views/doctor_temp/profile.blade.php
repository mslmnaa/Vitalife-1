@extends('layouts.doctor')

@section('title', 'Profil Dokter')
@section('page-title', 'Profil Saya')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Profile Header -->
    <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
        <div class="flex items-start space-x-6">
            <div class="flex-shrink-0">
                @if($specialist && $specialist->image && $specialist->image !== 'default-doctor.png')
                    <img src="{{ asset('storage/' . $specialist->image) }}" 
                         alt="Foto Profil" 
                         class="w-24 h-24 rounded-full object-cover border-4 border-blue-100">
                @else
                    <div class="w-24 h-24 rounded-full bg-blue-100 flex items-center justify-center border-4 border-blue-200">
                        <i class="fas fa-user-md text-blue-600 text-3xl"></i>
                    </div>
                @endif
            </div>
            <div class="flex-1">
                <h2 class="text-2xl font-bold text-gray-800 mb-2">
                    {{ $specialist->nama ?? Auth::user()->name }}
                </h2>
                <p class="text-blue-600 font-semibold mb-1">
                    {{ $specialist->spesialisasi ?? 'Dokter Umum' }}
                </p>
                <p class="text-gray-600 mb-3">
                    <i class="fas fa-hospital mr-2"></i>
                    {{ $specialist->tempatTugas ?? 'Belum diatur' }}
                </p>
                <div class="flex items-center space-x-4 text-sm text-gray-600">
                    <span>
                        <i class="fas fa-phone mr-1"></i>
                        {{ $specialist->noHP ?? 'Belum diatur' }}
                    </span>
                    @if($specialist && $specialist->harga)
                        <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full font-semibold">
                            <i class="fas fa-money-bill-wave mr-1"></i>
                            Rp {{ number_format($specialist->harga, 0, ',', '.') }}
                        </span>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Profile Form -->
    <div class="bg-white rounded-lg shadow-sm p-6">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-xl font-bold text-gray-800">Edit Profil</h3>
            <div class="text-sm text-gray-500">
                <i class="fas fa-info-circle mr-1"></i>
                Lengkapi profil Anda untuk meningkatkan kepercayaan pasien
            </div>
        </div>

        <form action="{{ route('doctor.profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Upload Photo -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="fas fa-camera mr-1"></i>
                    Foto Profil
                </label>
                <div class="flex items-center space-x-4">
                    <div class="flex-shrink-0">
                        @if($specialist && $specialist->image && $specialist->image !== 'default-doctor.png')
                            <img id="preview-image" 
                                 src="{{ asset('storage/' . $specialist->image) }}" 
                                 alt="Preview" 
                                 class="w-16 h-16 rounded-full object-cover border-2 border-gray-200">
                        @else
                            <div id="preview-placeholder" class="w-16 h-16 rounded-full bg-gray-100 flex items-center justify-center border-2 border-gray-200">
                                <i class="fas fa-user text-gray-400"></i>
                            </div>
                            <img id="preview-image" 
                                 src="#" 
                                 alt="Preview" 
                                 class="w-16 h-16 rounded-full object-cover border-2 border-gray-200 hidden">
                        @endif
                    </div>
                    <div class="flex-1">
                        <input type="file" 
                               name="image" 
                               id="image" 
                               accept="image/*"
                               class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                        <p class="text-xs text-gray-500 mt-1">JPG, PNG max 2MB</p>
                    </div>
                </div>
                @error('image')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Nama -->
                <div>
                    <label for="nama" class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-user mr-1"></i>
                        Nama Lengkap *
                    </label>
                    <input type="text" 
                           name="nama" 
                           id="nama" 
                           value="{{ old('nama', $specialist->nama ?? Auth::user()->name) }}"
                           required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    @error('nama')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Spesialisasi -->
                <div>
                    <label for="spesialisasi" class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-stethoscope mr-1"></i>
                        Spesialisasi *
                    </label>
                    <input type="text" 
                           name="spesialisasi" 
                           id="spesialisasi" 
                           value="{{ old('spesialisasi', $specialist->spesialisasi ?? '') }}"
                           required
                           placeholder="contoh: Dokter Umum, Spesialis Anak, dll"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    @error('spesialisasi')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tempat Tugas -->
                <div>
                    <label for="tempatTugas" class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-hospital mr-1"></i>
                        Tempat Tugas *
                    </label>
                    <input type="text" 
                           name="tempatTugas" 
                           id="tempatTugas" 
                           value="{{ old('tempatTugas', $specialist->tempatTugas ?? '') }}"
                           required
                           placeholder="contoh: RS Dr. Sardjito, Klinik Pratama, dll"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    @error('tempatTugas')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- No HP -->
                <div>
                    <label for="noHP" class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-phone mr-1"></i>
                        Nomor HP *
                    </label>
                    <input type="text" 
                           name="noHP" 
                           id="noHP" 
                           value="{{ old('noHP', $specialist->noHP ?? '') }}"
                           required
                           placeholder="contoh: 08123456789"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    @error('noHP')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Harga -->
                <div>
                    <label for="harga" class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-money-bill-wave mr-1"></i>
                        Tarif Konsultasi (Rp) *
                    </label>
                    <input type="number" 
                           name="harga" 
                           id="harga" 
                           value="{{ old('harga', $specialist->harga ?? '') }}"
                           required
                           min="0"
                           placeholder="contoh: 150000"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    @error('harga')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Alamat -->
            <div>
                <label for="alamat" class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="fas fa-map-marker-alt mr-1"></i>
                    Alamat Lengkap *
                </label>
                <textarea name="alamat" 
                          id="alamat" 
                          rows="3" 
                          required
                          placeholder="Masukkan alamat lengkap tempat praktik"
                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ old('alamat', $specialist->alamat ?? '') }}</textarea>
                @error('alamat')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="flex items-center justify-between pt-6 border-t border-gray-200">
                <p class="text-sm text-gray-500">
                    <span class="text-red-500">*</span> Wajib diisi
                </p>
                <div class="flex space-x-3">
                    <button type="button" 
                            onclick="window.location.reload()"
                            class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                        <i class="fas fa-undo mr-2"></i>
                        Reset
                    </button>
                    <button type="submit" 
                            class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                        <i class="fas fa-save mr-2"></i>
                        Simpan Perubahan
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
document.getElementById('image').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const previewImage = document.getElementById('preview-image');
            const previewPlaceholder = document.getElementById('preview-placeholder');
            
            previewImage.src = e.target.result;
            previewImage.classList.remove('hidden');
            if (previewPlaceholder) {
                previewPlaceholder.classList.add('hidden');
            }
        }
        reader.readAsDataURL(file);
    }
});

// Format currency input
document.getElementById('harga').addEventListener('input', function(e) {
    let value = e.target.value.replace(/[^\d]/g, '');
    e.target.value = value;
});

// Phone number formatting
document.getElementById('noHP').addEventListener('input', function(e) {
    let value = e.target.value.replace(/[^\d]/g, '');
    e.target.value = value;
});
</script>
@endpush
@endsection