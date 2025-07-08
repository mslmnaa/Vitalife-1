@extends('layouts.doctor')

@section('title', 'Daftar Pasien')
@section('page-title', 'Pasien Saya')

@section('content')
<div class="bg-white rounded-lg shadow">
    <div class="p-6 border-b border-gray-200">
        <h3 class="text-lg font-semibold text-gray-800">Daftar Pasien</h3>
        <p class="text-gray-600 text-sm mt-1">Pasien yang telah melakukan pembayaran dan terkonfirmasi</p>
    </div>
    
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Pasien
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Keluhan
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Tanggal Konsultasi
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Status
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($patients as $patient)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="bg-blue-100 rounded-full p-2 mr-3">
                                    <i class="fas fa-user text-blue-600"></i>
                                </div>
                                <div>
                                    <div class="text-sm font-medium text-gray-900">{{ $patient->full_name }}</div>
                                    <div class="text-sm text-gray-500">{{ $patient->gender }}, {{ \Carbon\Carbon::parse($patient->date_of_birth)->age }} tahun</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900">{{ Str::limit($patient->complaints, 50) }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $patient->created_at->format('d M Y, H:i') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @php
    $status = $patient->status;
    $badgeColor = match($status) {
        'pending' => ['bg' => 'bg-yellow-100', 'text' => 'text-yellow-800'],
        'confirmed' => ['bg' => 'bg-green-100', 'text' => 'text-green-800'],
        'cancelled' => ['bg' => 'bg-red-100', 'text' => 'text-red-800'],
        default => ['bg' => 'bg-gray-100', 'text' => 'text-gray-800'],
    };
@endphp
<span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full {{ $badgeColor['bg'] }} {{ $badgeColor['text'] }}">
    {{ ucfirst($status) }}
</span>

                        </td>
                       <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
    @if($patient->status === 'confirmed')
        <a href="{{ route('doctor.patient.detail', $patient->id) }}" 
           class="text-blue-600 hover:text-blue-900">
            <i class="fas fa-eye mr-1"></i>Detaill
        </a>
        <a href="{{ route('doctor.chat.detail', $patient->id) }}" 
           class="text-green-600 hover:text-green-900">
            <i class="fas fa-comments mr-1"></i>Chat
        </a>
    @else
        <span class="text-gray-400 cursor-not-allowed" title="Menunggu konfirmasi">
            <i class="fas fa-eye mr-1"></i>Detail
        </span>
        <span class="text-gray-400 cursor-not-allowed" title="Menunggu konfirmasi">
            <i class="fas fa-comments mr-1"></i>Chat
        </span>
    @endif
</td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-gray-500">
                            <i class="fas fa-users text-4xl mb-4 text-gray-300"></i>
                            <p>Belum ada pasien yang terdaftar</p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    @if($patients->hasPages())
        <div class="px-6 py-4 border-t border-gray-200">
            {{ $patients->links() }}
        </div>
    @endif
</div>
@endsection