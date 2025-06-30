@dd('VIEW INI TERBACA!')
@extends('layouts.doctor')

@section('title', 'Chat dengan Pasien')
@section('page-title', 'Chat dengan ' . $payment->full_name)

@section('content')
<div class="flex flex-col lg:flex-row gap-6">
    <!-- Main Chat Container -->
    <div class="flex-1">
        <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100">
            <!-- Enhanced Chat Header -->
            <div class="p-6 bg-gradient-to-r from-blue-600 to-blue-700 text-white">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="relative">
                            <div class="bg-white/20 backdrop-blur-sm rounded-full p-3 mr-4">
                                <i class="fas fa-user text-white text-lg"></i>
                            </div>
                            <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-green-400 rounded-full border-2 border-white"></div>
                        </div>
                        <div>
                            <h3 class="font-bold text-xl">{{ $payment->full_name }}</h3>
                            <p class="text-blue-100 text-sm">{{ $payment->gender }}, {{ \Carbon\Carbon::parse($payment->date_of_birth)->age }} tahun</p>
                        </div>
                    </div>
                    <a href="{{ route('doctor.patient.detail', $payment->id) }}" 
                       class="bg-white/20 hover:bg-white/30 backdrop-blur-sm px-4 py-2 rounded-lg transition-all duration-200 flex items-center">
                        <i class="fas fa-info-circle mr-2"></i>
                        <span class="hidden sm:inline">Detail Pasien</span>
                    </a>
                </div>
            </div>

            <!-- Enhanced Chat Messages -->
            <div class="flex-1 p-6 overflow-y-auto bg-gray-50" style="height: 400px;" id="chatMessages">
                @forelse($chats as $chat)
                    <div class="mb-6 flex {{ $chat->sender_id === Auth::id() ? 'justify-end' : 'justify-start' }}">
                        <div class="flex items-end max-w-xs lg:max-w-md {{ $chat->sender_id === Auth::id() ? 'flex-row-reverse' : 'flex-row' }}">
                            <!-- Avatar -->
                            <div class="flex-shrink-0 {{ $chat->sender_id === Auth::id() ? 'ml-2' : 'mr-2' }}">
                                <div class="w-8 h-8 rounded-full flex items-center justify-center {{ $chat->sender_id === Auth::id() ? 'bg-blue-500' : 'bg-gray-400' }}">
                                    <i class="fas {{ $chat->sender_id === Auth::id() ? 'fa-user-md' : 'fa-user' }} text-white text-xs"></i>
                                </div>
                            </div>
                            
                            <!-- Message Bubble -->
                            <div class="relative px-4 py-3 rounded-2xl {{ $chat->sender_id === Auth::id() ? 'bg-blue-600 text-white rounded-br-md' : 'bg-white text-gray-800 rounded-bl-md shadow-sm border border-gray-200' }}">
                                <p class="text-sm leading-relaxed">{{ $chat->message }}</p>
                                <p class="text-xs mt-2 {{ $chat->sender_id === Auth::id() ? 'text-blue-200' : 'text-gray-500' }}">
                                    {{ $chat->created_at->format('H:i') }}
                                </p>
                                
                                <!-- Message Tail -->
                                <div class="absolute bottom-0 {{ $chat->sender_id === Auth::id() ? '-right-2' : '-left-2' }} w-0 h-0 border-l-8 border-r-8 border-t-8 {{ $chat->sender_id === Auth::id() ? 'border-l-transparent border-r-blue-600 border-t-blue-600' : 'border-r-transparent border-l-white border-t-white' }}"></div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-16">
                        <div class="bg-blue-50 rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-comments text-3xl text-blue-400"></i>
                        </div>
                        <p class="text-gray-500 text-lg font-medium">Belum ada percakapan</p>
                        <p class="text-gray-400 text-sm mt-1">Mulai chat dengan pasien!</p>
                    </div>
                @endforelse
            </div>

            <!-- Enhanced Chat Input -->
            <div class="p-6 bg-white border-t border-gray-200">
                <form action="{{ route('doctor.chat.send', $payment->id) }}" method="POST" class="flex items-end space-x-3">
                    @csrf
                    <div class="flex-1 relative">
                        <input type="text" 
                               name="message" 
                               placeholder="Ketik pesan Anda..." 
                               class="w-full border-2 border-gray-200 rounded-2xl px-4 py-3 pr-12 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 resize-none"
                               required>
                        <div class="absolute right-3 top-1/2 transform -translate-y-1/2">
                            <i class="fas fa-smile text-gray-400 cursor-pointer hover:text-gray-600 transition-colors"></i>
                        </div>
                    </div>
                    <button type="submit" 
                            class="bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white p-3 rounded-2xl transition-all duration-200 transform hover:scale-105 shadow-lg hover:shadow-xl">
                        <i class="fas fa-paper-plane text-lg"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Enhanced Patient Info Sidebar -->
    <div class="w-full lg:w-80">
        <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
            <div class="p-6 bg-gradient-to-r from-gray-50 to-gray-100 border-b border-gray-200">
                <h4 class="font-bold text-lg text-gray-800 flex items-center">
                    <i class="fas fa-user-injured mr-3 text-blue-600"></i>
                    Informasi Pasien
                </h4>
            </div>
            
            <div class="p-6 space-y-6">
                <div class="bg-red-50 rounded-lg p-4 border-l-4 border-red-400">
                    <p class="text-sm font-medium text-red-800 mb-2 flex items-center">
                        <i class="fas fa-exclamation-triangle mr-2"></i>
                        Keluhan Utama
                    </p>
                    <p class="text-red-700 font-medium">{{ $payment->complaints }}</p>
                </div>
                
                <div class="bg-blue-50 rounded-lg p-4 border-l-4 border-blue-400">
                    <p class="text-sm font-medium text-blue-800 mb-2 flex items-center">
                        <i class="fas fa-notes-medical mr-2"></i>
                        Riwayat Medis
                    </p>
                    <p class="text-blue-700 font-medium">{{ $payment->medical_history ?: 'Tidak ada' }}</p>
                </div>
                
                <div class="space-y-4">
                    <div class="flex items-start space-x-3">
                        <div class="bg-green-100 rounded-full p-2 flex-shrink-0">
                            <i class="fas fa-phone text-green-600 text-sm"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-medium text-gray-600">No. Telepon</p>
                            <p class="text-gray-800 font-medium">{{ $payment->phone_number }}</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-3">
                        <div class="bg-purple-100 rounded-full p-2 flex-shrink-0">
                            <i class="fas fa-map-marker-alt text-purple-600 text-sm"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-medium text-gray-600">Alamat</p>
                            <p class="text-gray-800 font-medium">{{ $payment->address }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Quick Actions -->
        <div class="mt-6 bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
            <div class="p-4 bg-gradient-to-r from-gray-50 to-gray-100 border-b border-gray-200">
                <h4 class="font-bold text-lg text-gray-800 flex items-center">
                    <i class="fas fa-bolt mr-3 text-yellow-600"></i>
                    Aksi Cepat
                </h4>
            </div>
            <div class="p-4 space-y-3">
                <button class="w-full bg-blue-50 hover:bg-blue-100 text-blue-700 font-medium py-3 px-4 rounded-lg transition-colors duration-200 flex items-center justify-center">
                    <i class="fas fa-prescription-bottle-alt mr-2"></i>
                    Resep Obat
                </button>
                <button class="w-full bg-green-50 hover:bg-green-100 text-green-700 font-medium py-3 px-4 rounded-lg transition-colors duration-200 flex items-center justify-center">
                    <i class="fas fa-calendar-check mr-2"></i>
                    Jadwal Kontrol
                </button>
                <button class="w-full bg-purple-50 hover:bg-purple-100 text-purple-700 font-medium py-3 px-4 rounded-lg transition-colors duration-200 flex items-center justify-center">
                    <i class="fas fa-file-medical mr-2"></i>
                    Catatan Mediss
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Enhanced auto scroll functionality
    document.addEventListener('DOMContentLoaded', function() {
        const chatMessages = document.getElementById('chatMessages');
        
        // Scroll to bottom initially
        function scrollToBottom() {
            chatMessages.scrollTop = chatMessages.scrollHeight;
        }
        
        scrollToBottom();
        
        // Smooth scroll animation
        chatMessages.style.scrollBehavior = 'smooth';
        
        // Auto-resize input and maintain scroll position
        const messageInput = document.querySelector('input[name="message"]');
        
        messageInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                this.closest('form').submit();
            }
        });
        
        // Add typing indicator (visual feedback)
        messageInput.addEventListener('input', function() {
            if (this.value.length > 0) {
                this.style.borderColor = '#3B82F6';
                this.style.boxShadow = '0 0 0 3px rgba(59, 130, 246, 0.1)';
            } else {
                this.style.borderColor = '#D1D5DB';
                this.style.boxShadow = 'none';
            }
        });
        
        // Focus input on page load
        messageInput.focus();
    });
</script>
@endpush