@extends('layouts.app')

@section('title', 'Detail Pembayaran')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <div class="flex items-center mb-6">
            <a href="{{ route('payment-history.index') }}" 
               class="text-blue-600 hover:text-blue-800 mr-4">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </a>
            <h1 class="text-3xl font-bold text-gray-900">Detail Pembayaran</h1>
        </div>

        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="px-6 py-4 bg-gray-50 border-b">
                <div class="flex justify-between items-center">
                    <h2 class="text-xl font-semibold text-gray-900">
                        Payment ID: #{{ $payment->id }}
                    </h2>
                    <span class="inline-flex px-3 py-1 text-sm font-semibold rounded-full {{ $payment->status_badge }}">
                        {{ $payment->status_text }}
                    </span>
                </div>
            </div>

            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Informasi Dokter -->
                    <div class="space-y-4">
                        <h3 class="text-lg font-semibold text-gray-900 border-b pb-2">Informasi Dokter</h3>
                        <div class="flex items-center space-x-4">
                            <img class="h-16 w-16 rounded-full object-cover" 
                                 src="{{ asset('storage/' . $payment->specialist->image) }}" 
                                 alt="{{ $payment->specialist->nama }}">
                            <div>
                                <h4 class="text-lg font-medium text-gray-900">{{ $payment->specialist->nama }}</h4>
                                <p class="text-gray-600">{{ $payment->specialist->spesialisasi }}</p>
                                <p class="text-sm text-gray-500">{{ $payment->specialist->tempatTugas }}</p>
                            </div>
                        </div>
                        <div class="space-y-2 text-sm">
                            <p><span class="font-medium">Alamat:</span> {{ $payment->specialist->alamat }}</p>
                            <p><span class="font-medium">No. HP:</span> {{ $payment->specialist->noHP }}</p>
                        </div>
                    </div>

                    <!-- Informasi Pasien -->
                    <div class="space-y-4">
                        <h3 class="text-lg font-semibold text-gray-900 border-b pb-2">Informasi Pasien</h3>
                        <div class="space-y-2 text-sm">
                            <p><span class="font-medium">Nama Lengkap:</span> {{ $payment->full_name }}</p>
                            <p><span class="font-medium">Jenis Kelamin:</span> {{ $payment->gender }}</p>
                            <p><span class="font-medium">Tanggal Lahir:</span> {{ $payment->date_of_birth->format('d M Y') }}</p>
                            <p><span class="font-medium">No. HP:</span> {{ $payment->phone_number }}</p>
                            <p><span class="font-medium">Alamat:</span> {{ $payment->address }}</p>
                        </div>
                    </div>
                </div>

                <!-- Keluhan dan Riwayat Medis -->
                <div class="mt-6 space-y-4">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 border-b pb-2">Keluhan</h3>
                        <p class="mt-2 text-gray-700">{{ $payment->complaints }}</p>
                    </div>
                    
                    @if($payment->medical_history)
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 border-b pb-2">Riwayat Medis</h3>
                        <p class="mt-2 text-gray-700">{{ $payment->medical_history }}</p>
                    </div>
                    @endif
                </div>

                <!-- Informasi Pembayaran -->
                <div class="mt-6 bg-gray-50 rounded-lg p-4">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Rincian Pembayaran</h3>
                    <div class="space-y-2">
                        <div class="flex justify-between">
                            <span>Biaya Konsultasi:</span>
                            <span>Rp {{ number_format($payment->amount, 0, ',', '.') }}</span>
                        </div>
                        @if($payment->discount_amount > 0)
                        <div class="flex justify-between text-green-600">
                            <span>Diskon @if($payment->voucher_code)({{ $payment->voucher_code }})@endif:</span>
                            <span>-Rp {{ number_format($payment->discount_amount, 0, ',', '.') }}</span>
                        </div>
                        @endif
                        <hr>
                        <div class="flex justify-between font-semibold text-lg">
                            <span>Total Pembayaran:</span>
                            <span>Rp {{ number_format($payment->total_amount, 0, ',', '.') }}</span>
                        </div>
                    </div>
                    
                    @if($payment->bank_name)
                    <div class="mt-4 pt-4 border-t">
                        <p class="text-sm text-gray-600">
                            <span class="font-medium">Bank:</span> {{ $payment->bank_name }}
                        </p>
                        @if($payment->payment_code)
                        <p class="text-sm text-gray-600">
                            <span class="font-medium">Kode Pembayaran:</span> {{ $payment->payment_code }}
                        </p>
                        @endif
                    </div>
                    @endif
                    
                    @if($payment->payment_date)
                    <div class="mt-2">
                        <p class="text-sm text-gray-600">
                            <span class="font-medium">Tanggal Pembayaran:</span> 
                            {{ $payment->payment_date->format('d M Y, H:i') }}
                        </p>
                    </div>
                    @endif
                </div>

                <!-- Tombol Aksi -->
                @if($payment->status === 'confirmed')
                <div class="mt-6 flex justify-end">
                    <a href="{{ route('chat.doctor', $payment->specialist->id_spesialis) }}" 
                       class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg transition duration-200">
                        Mulai Chat dengan Dokter
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
