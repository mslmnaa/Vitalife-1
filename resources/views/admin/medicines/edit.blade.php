@extends('layouts.admin')

@section('page-title', 'Edit Medicine')

@section('content')
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="max-w-2xl mx-auto">
            <div class="flex items-center mb-6">
                <a href="{{ route('admin.medicines.index') }}" class="text-gray-600 hover:text-gray-800 mr-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </a>
                <h1 class="text-2xl font-bold">Edit Medicine: {{ $medicine->nama }}</h1>
            </div>

            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                    <strong class="font-bold">Whoops!</strong>
                    <span class="block sm:inline">There were some problems with your input.</span>
                    <ul class="mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="bg-white shadow-md rounded-lg p-6">
                <form action="{{ route('admin.medicines.update', $medicine->id_medicine) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Nama Obat -->
                        <div class="md:col-span-2">
                            <label for="nama" class="block text-sm font-medium text-gray-700 mb-2">Medicine Name *</label>
                            <input type="text" name="nama" id="nama" value="{{ old('nama', $medicine->nama) }}" 
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                   placeholder="Enter medicine name" required>
                        </div>

                        <!-- Harga -->
                        <div>
                            <label for="harga" class="block text-sm font-medium text-gray-700 mb-2">Price (Rp) *</label>
                            <input type="number" name="harga" id="harga" value="{{ old('harga', $medicine->harga) }}" 
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                   placeholder="0" min="0" required>
                        </div>

                        <!-- Stok -->
                        <div>
                            <label for="stok" class="block text-sm font-medium text-gray-700 mb-2">Stock *</label>
                            <input type="number" name="stok" id="stok" value="{{ old('stok', $medicine->stok) }}" 
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                   placeholder="0" min="0" required>
                        </div>

                        <!-- Kategori -->
                        <div>
                            <label for="kategori" class="block text-sm font-medium text-gray-700 mb-2">Category *</label>
                            <select name="kategori" id="kategori" 
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                                <option value="">Select Category</option>
                                <option value="Antibiotik" {{ old('kategori', $medicine->kategori) == 'Antibiotik' ? 'selected' : '' }}>Antibiotik</option>
                                <option value="Vitamin" {{ old('kategori', $medicine->kategori) == 'Vitamin' ? 'selected' : '' }}>Vitamin</option>
                                <option value="Analgesik" {{ old('kategori', $medicine->kategori) == 'Analgesik' ? 'selected' : '' }}>Analgesik</option>
                                <option value="Antasida" {{ old('kategori', $medicine->kategori) == 'Antasida' ? 'selected' : '' }}>Antasida</option>
                                <option value="Antihistamin" {{ old('kategori', $medicine->kategori) == 'Antihistamin' ? 'selected' : '' }}>Antihistamin</option>
                                <option value="Obat Batuk" {{ old('kategori', $medicine->kategori) == 'Obat Batuk' ? 'selected' : '' }}>Obat Batuk</option>
                                <option value="Obat Demam" {{ old('kategori', $medicine->kategori) == 'Obat Demam' ? 'selected' : '' }}>Obat Demam</option>
                                <option value="Lainnya" {{ old('kategori', $medicine->kategori) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                            </select>
                        </div>

                        <!-- Tanggal Kadaluarsa -->
                        <div>
                            <label for="tanggal_kadaluarsa" class="block text-sm font-medium text-gray-700 mb-2">Expiry Date *</label>
                            <input type="date" name="tanggal_kadaluarsa" id="tanggal_kadaluarsa" 
                                   value="{{ old('tanggal_kadaluarsa', $medicine->tanggal_kadaluarsa->format('Y-m-d')) }}" 
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                   min="{{ date('Y-m-d', strtotime('+1 day')) }}" required>
                        </div>

                        <!-- Produsen -->
                        <div class="md:col-span-2">
                            <label for="produsen" class="block text-sm font-medium text-gray-700 mb-2">Manufacturer *</label>
                            <input type="text" name="produsen" id="produsen" value="{{ old('produsen', $medicine->produsen) }}" 
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                   placeholder="Enter manufacturer name" required>
                        </div>

                        <!-- Deskripsi -->
                        <div class="md:col-span-2">
                            <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-2">Description *</label>
                            <textarea name="deskripsi" id="deskripsi" rows="4" 
                                      class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                      placeholder="Enter medicine description, usage, dosage, etc." required>{{ old('deskripsi', $medicine->deskripsi) }}</textarea>
                        </div>

                        <!-- Current Image -->
                        @if($medicine->image)
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Current Image</label>
                            <div class="flex items-center space-x-4">
                                <img src="{{ asset($medicine->image) }}" alt="{{ $medicine->nama }}" class="h-20 w-20 object-cover rounded-lg">
                                <span class="text-sm text-gray-600">{{ basename($medicine->image) }}</span>
                            </div>
                        </div>
                        @endif

                        <!-- New Image -->
                        <div class="md:col-span-2">
                            <label for="image" class="block text-sm font-medium text-gray-700 mb-2">
                                {{ $medicine->image ? 'Change Image (Optional)' : 'Medicine Image *' }}
                            </label>
                            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                <div class="space-y-1 text-center">
                                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <div class="flex text-sm text-gray-600">
                                        <label for="image" class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                                            <span>Upload a file</span>
                                            <input id="image" name="image" type="file" class="sr-only" accept="image/*" {{ !$medicine->image ? 'required' : '' }}>
                                        </label>
                                        <p class="pl-1">or drag and drop</p>
                                    </div>
                                    <p class="text-xs text-gray-500">PNG, JPG, GIF up to 2MB</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end space-x-3 mt-6">
                        <a href="{{ route('admin.medicines.index') }}" 
                           class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            Cancel
                        </a>
                        <button type="submit" 
                                class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            Update Medicine
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
