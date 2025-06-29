@extends('layouts.doctor')

@section('title', 'Chat dengan Pasien')
@section('page-title', 'Chat dengan ' . $payment->full_name)

@section('content')
<div class="max-w-7xl mx-auto space-y-6">
    <!-- Chat Container -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <!-- Chat Header -->
        <div class="px-6 py-4 bg-gradient-to-r from-blue-50 to-indigo-50 border-b border-gray-100">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-full flex items-center justify-center shadow-sm">
                            <i class="fas fa-user text-white text-lg"></i>
                        </div>
                        <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-green-400 border-2 border-white rounded-full"></div>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-900 text-lg">{{ $payment->full_name }}</h3>
                        <p class="text-sm text-gray-600 flex items-center space-x-2">
                            <span>{{ $payment->gender }}</span>
                            <span class="w-1 h-1 bg-gray-400 rounded-full"></span>
                            <span>{{ \Carbon\Carbon::parse($payment->date_of_birth)->age }} tahun</span>
                        </p>
                    </div>
                </div>
                <a href="{{ route('doctor.patient.detail', $payment->id) }}" 
                   class="inline-flex items-center px-4 py-2 text-sm font-medium text-blue-700 bg-blue-100 hover:bg-blue-200 rounded-lg transition-colors duration-200">
                    <i class="fas fa-info-circle mr-2"></i>
                    Detail Pasien
                </a>
            </div>
        </div>

        <!-- Chat Messages -->
        <div class="h-96 p-6 overflow-y-auto bg-gray-50" id="chatMessages">
            @forelse($chats as $chat)
                <div class="mb-6 flex {{ $chat->sender_id === Auth::id() ? 'justify-end' : 'justify-start' }}">
                    <div class="flex items-end space-x-2 max-w-xs lg:max-w-md">
                        @if($chat->sender_id !== Auth::id())
                            <div class="w-8 h-8 bg-gray-300 rounded-full flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-user text-gray-600 text-sm"></i>
                            </div>
                        @endif
                        
                        <div class="group">
                            <div class="px-4 py-3 rounded-2xl shadow-sm {{ $chat->sender_id === Auth::id() 
                                ? 'bg-blue-600 text-white rounded-br-sm' 
                                : 'bg-white text-gray-800 rounded-bl-sm border border-gray-200' }}">
                                <p class="text-sm leading-relaxed">{{ $chat->message }}</p>
                            </div>
                            <p class="text-xs text-gray-500 mt-1 px-2 {{ $chat->sender_id === Auth::id() ? 'text-right' : 'text-left' }}">
                                {{ $chat->created_at->format('H:i') }}
                            </p>
                        </div>
                        
                        @if($chat->sender_id === Auth::id())
                            <div class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-user-md text-white text-sm"></i>
                            </div>
                        @endif
                    </div>
                </div>
            @empty
                <div class="flex flex-col items-center justify-center h-full text-center py-12">
                    <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-comments text-gray-400 text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">Belum ada percakapan</h3>
                    <p class="text-gray-500">Mulai chat dengan pasien untuk membantu konsultasi</p>
                </div>
            @endforelse
        </div>

        <!-- Chat Input -->
        <div class="px-6 py-4 bg-white border-t border-gray-100">
            <form action="{{ route('doctor.chat.send', $payment->id) }}" method="POST" class="flex items-end space-x-3">
                @csrf
                <div class="flex-1">
                    <textarea name="message" 
                             rows="1"
                             placeholder="Ketik pesan Anda..." 
                             class="w-full resize-none border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent placeholder-gray-500 text-sm"
                             required
                             onkeydown="if(event.key==='Enter' && !event.shiftKey){event.preventDefault(); this.form.submit();}"></textarea>
                </div>
                <button type="submit" 
                        class="flex-shrink-0 w-12 h-12 bg-blue-600 hover:bg-blue-700 text-white rounded-xl transition-colors duration-200 flex items-center justify-center shadow-sm hover:shadow-md">
                    <i class="fas fa-paper-plane text-sm"></i>
                </button>
            </form>
        </div>
    </div>

    <!-- Patient Info Card -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="px-6 py-4 bg-gray-50 border-b border-gray-100">
            <h4 class="font-semibold text-gray-900 flex items-center">
                <i class="fas fa-user-circle mr-2 text-blue-600"></i>
                Informasi Pasien
            </h4>
        </div>
        <div class="p-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div class="space-y-1">
                    <p class="text-sm font-medium text-gray-500 uppercase tracking-wide">Keluhan Utama</p>
                    <p class="text-gray-900 leading-relaxed">{{ $payment->complaints }}</p>
                </div>
                <div class="space-y-1">
                    <p class="text-sm font-medium text-gray-500 uppercase tracking-wide">Riwayat Medis</p>
                    <p class="text-gray-900 leading-relaxed">{{ $payment->medical_history ?: 'Tidak ada riwayat medis' }}</p>
                </div>
                <div class="space-y-1">
                    <p class="text-sm font-medium text-gray-500 uppercase tracking-wide">No. Telepon</p>
                    <p class="text-gray-900 flex items-center">
                        <i class="fas fa-phone mr-2 text-green-600"></i>
                        {{ $payment->phone_number }}
                    </p>
                </div>
                <div class="space-y-1">
                    <p class="text-sm font-medium text-gray-500 uppercase tracking-wide">Alamat</p>
                    <p class="text-gray-900 flex items-start">
                        <i class="fas fa-map-marker-alt mr-2 text-red-500 mt-1 flex-shrink-0"></i>
                        <span class="leading-relaxed">{{ $payment->address }}</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Auto scroll to bottom of chat
    document.addEventListener('DOMContentLoaded', function() {
        const chatMessages = document.getElementById('chatMessages');
        chatMessages.scrollTop = chatMessages.scrollHeight;
        
        // Auto resize textarea
        const textarea = document.querySelector('textarea[name="message"]');
        textarea.addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = Math.min(this.scrollHeight, 120) + 'px';
        });
    });
    
    // Scroll to bottom when new message is sent
    const form = document.querySelector('form');
    form.addEventListener('submit', function() {
        setTimeout(() => {
            const chatMessages = document.getElementById('chatMessages');
            chatMessages.scrollTop = chatMessages.scrollHeight;
        }, 100);
    });
</script>
@endpush