@extends('layouts.doctor')

@section('title', 'Doctor Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<div class="space-y-6">
    <!-- Welcome Section -->
    <div class="bg-gradient-to-r from-gray-800 to-gray-900 rounded-xl p-6 text-white shadow-lg">
        <h2 class="text-2xl font-bold mb-2">Welcome, Dr. {{ Auth::user()->name }}!</h2>
        @if($specialist)
            <p class="text-gray-200">{{ $specialist->spesialisasi }} - {{ $specialist->tempatTugas }}</p>
        @else
            <p class="text-gray-200">Please complete your specialist profile</p>
            <a href="{{ route('doctor.profile') }}" class="inline-block mt-3 bg-white text-gray-800 px-4 py-2 rounded-lg font-medium hover:bg-gray-100 transition-colors">
                Complete Profile
            </a>
        @endif
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
                    <p class="text-2xl font-bold text-gray-900">{{ $totalPatients }}</p>
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
                    <p class="text-2xl font-bold text-gray-900">{{ $pendingPayments }}</p>
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
                    <p class="text-2xl font-bold text-gray-900">Rp {{ number_format($totalEarnings, 0, ',', '.') }}</p>
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
                    <p class="text-2xl font-bold text-gray-900">{{ $unreadMessages }}</p>
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
                @if($recentPatients->count() > 0)
                    <div class="space-y-4">
                        @foreach($recentPatients as $patient)
                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center mr-3">
                                        <span class="text-white font-semibold text-sm">{{ substr($patient->full_name, 0, 1) }}</span>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-900">{{ $patient->full_name }}</p>
                                        <p class="text-sm text-gray-600">
                                            {{ $patient->created_at->format('d M Y, H:i') }}
                                            @if($patient->user)
                                                • {{ $patient->user->name }}
                                            @endif
                                        </p>
                                        <p class="text-xs text-gray-500 mt-1">
                                            Status: 
                                            <span class="px-2 py-1 rounded-full text-xs font-medium
                                                @if($patient->status == 'confirmed') bg-emerald-100 text-emerald-800
                                                @elseif($patient->status == 'pending') bg-amber-100 text-amber-800
                                                @else bg-red-100 text-red-800
                                                @endif">
                                                {{ ucfirst($patient->status) }}
                                            </span>
                                        </p>
                                    </div>
                                </div>
                                <a href="{{ route('doctor.patient.detail', $patient->id) }}" 
                                   class="text-gray-400 hover:text-blue-600 transition-colors">
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <div class="mt-6 text-center">
                        <a href="{{ route('doctor.patients') }}" 
                           class="inline-flex items-center text-blue-600 hover:text-blue-700 font-medium text-sm">
                            View All Patients
                            <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                @else
                    <div class="text-center py-12">
                        <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-users text-gray-400 text-2xl"></i>
                        </div>
                        <h4 class="text-gray-900 font-medium mb-2">No patients yet</h4>
                        <p class="text-gray-500 text-sm">
                            @if(!$specialist)
                                Complete your profile to start receiving patients
                            @else
                                Patients will appear here once they book consultations
                            @endif
                        </p>
                    </div>
                @endif
            </div>
        </div>

        <!-- Monthly Statistics Chart -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200">
            <div class="p-6 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-gray-900">Monthly Statistics {{ date('Y') }}</h3>
                    <span class="text-sm text-gray-500">Patients & earnings</span>
                </div>
            </div>
            <div class="p-6">
                @if($monthlyStats->count() > 0)
                    <div class="space-y-4">
                        @foreach($monthlyStats as $stat)
                            <div class="flex items-center justify-between p-3 rounded-lg hover:bg-gray-50 transition-colors">
                                <div>
                                    <p class="font-medium text-gray-900">
                                        {{ DateTime::createFromFormat('!m', $stat->month)->format('F') }}
                                    </p>
                                    <p class="text-sm text-gray-600">{{ $stat->total_patients }} patients</p>
                                </div>
                                <div class="text-right">
                                    <p class="font-semibold text-emerald-600">
                                        Rp {{ number_format($stat->total_earnings, 0, ',', '.') }}
                                    </p>
                                    <div class="w-24 bg-gray-200 rounded-full h-2 mt-2">
                                        <div class="bg-emerald-500 h-2 rounded-full transition-all duration-300" 
                                             style="width: {{ $stat->total_patients > 0 ? min(($stat->total_patients / $totalPatients) * 100, 100) : 0 }}%"></div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-12">
                        <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-chart-bar text-gray-400 text-2xl"></i>
                        </div>
                        <h4 class="text-gray-900 font-medium mb-2">No statistics yet</h4>
                        <p class="text-gray-500 text-sm">Statistics will appear here once you have patient data</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    @if($specialist && $specialist->harga)
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
                            <p class="text-xl font-bold text-blue-900">Rp {{ number_format($specialist->harga, 0, ',', '.') }}</p>
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
                            <p class="text-xl font-bold text-emerald-900">{{ $specialist->tempatTugas }}</p>
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
                            <p class="text-xl font-bold text-purple-900">{{ $specialist->noHP }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
