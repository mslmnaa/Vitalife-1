<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <a href="{{ route('pharmacies.index') }}" class="mr-4 p-2 rounded-lg hover:bg-gray-100 transition-colors">
                    <i class="fas fa-arrow-left text-gray-600"></i>
                </a>
                <h2 class="font-bold text-3xl text-gray-800 leading-tight flex items-center">
                    <div class="bg-gradient-to-r from-green-500 to-blue-600 p-3 rounded-xl mr-4 shadow-lg">
                        <i class="fas fa-clinic-medical text-white text-xl"></i>
                    </div>
                    {{ $pharmacy->name }}
                </h2>
            </div>
            <div class="flex items-center space-x-4">
                <!-- Status Badge -->
                @if($pharmacy->is_open_now === true)
                    <div class="bg-green-100 text-green-800 px-4 py-2 rounded-lg shadow-sm flex items-center">
                        <i class="fas fa-clock mr-2 text-green-600"></i>
                        <span class="font-semibold">Open Now</span>
                    </div>
                @elseif($pharmacy->is_open_now === false)
                    <div class="bg-red-100 text-red-800 px-4 py-2 rounded-lg shadow-sm flex items-center">
                        <i class="fas fa-clock mr-2 text-red-600"></i>
                        <span class="font-semibold">Closed</span>
                    </div>
                @else
                    <div class="bg-gray-100 text-gray-800 px-4 py-2 rounded-lg shadow-sm flex items-center">
                        <i class="fas fa-clock mr-2 text-gray-600"></i>
                        <span class="font-semibold">Hours Unknown</span>
                    </div>
                @endif
            </div>
        </div>
    </x-slot>

    <div class="py-8 min-h-screen bg-gradient-to-br from-green-50 via-white to-blue-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Main Content -->
                <div class="lg:col-span-2 space-y-8">
                    <!-- Pharmacy Image -->
                    <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
                        @if($pharmacy->image_url)
                            <img src="{{ $pharmacy->image_url }}" alt="{{ $pharmacy->name }}" 
                                 class="w-full h-64 object-cover">
                        @else
                            <div class="w-full h-64 bg-gradient-to-br from-green-400 via-blue-500 to-purple-500 flex items-center justify-center relative">
                                <div class="absolute inset-0 bg-gradient-to-br from-transparent via-white/10 to-transparent"></div>
                                <i class="fas fa-clinic-medical text-8xl text-white relative z-10 drop-shadow-lg"></i>
                            </div>
                        @endif
                    </div>

                    <!-- Pharmacy Information -->
                    <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-8">
                        <div class="flex items-center mb-6">
                            <div class="bg-gradient-to-r from-green-500 to-blue-600 p-3 rounded-xl mr-4">
                                <i class="fas fa-info-circle text-white text-lg"></i>
                            </div>
                            <h3 class="text-gray-800 font-bold text-2xl">Pharmacy Information</h3>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Address -->
                            <div class="space-y-2">
                                <div class="flex items-center text-gray-700">
                                    <i class="fas fa-map-marker-alt mr-3 text-green-500 w-5"></i>
                                    <span class="font-semibold">Address</span>
                                </div>
                                <p class="text-gray-600 ml-8">{{ $pharmacy->address }}</p>
                            </div>

                            <!-- Phone -->
                            <div class="space-y-2">
                                <div class="flex items-center text-gray-700">
                                    <i class="fas fa-phone mr-3 text-blue-500 w-5"></i>
                                    <span class="font-semibold">Phone</span>
                                </div>
                                <p class="text-gray-600 ml-8">
                                    <a href="tel:{{ $pharmacy->phone }}" class="hover:text-blue-600 transition-colors">
                                        {{ $pharmacy->phone }}
                                    </a>
                                </p>
                            </div>

                            <!-- WhatsApp -->
                            <div class="space-y-2">
                                <div class="flex items-center text-gray-700">
                                    <i class="fab fa-whatsapp mr-3 text-green-500 w-5"></i>
                                    <span class="font-semibold">WhatsApp</span>
                                </div>
                                <p class="text-gray-600 ml-8">{{ $pharmacy->whatsapp }}</p>
                            </div>

                            <!-- Operating Hours -->
                            <div class="space-y-2">
                                <div class="flex items-center text-gray-700">
                                    <i class="fas fa-clock mr-3 text-purple-500 w-5"></i>
                                    <span class="font-semibold">Operating Hours</span>
                                </div>
                                <div class="text-gray-600 ml-8">
                                    {!! $pharmacy->formatted_operating_hours !!}
                                </div>
                            </div>
                        </div>

                        <!-- Description -->
                        @if($pharmacy->description)
                            <div class="mt-6 pt-6 border-t border-gray-200">
                                <div class="flex items-center mb-3">
                                    <i class="fas fa-file-alt mr-3 text-indigo-500"></i>
                                    <span class="font-semibold text-gray-700">Description</span>
                                </div>
                                <p class="text-gray-600 leading-relaxed ml-6">{{ $pharmacy->description }}</p>
                            </div>
                        @endif

                        <!-- Facilities -->
                        @if($pharmacy->facilities && count($pharmacy->facilities) > 0)
                            <div class="mt-6 pt-6 border-t border-gray-200">
                                <div class="flex items-center mb-4">
                                    <i class="fas fa-star mr-3 text-yellow-500"></i>
                                    <span class="font-semibold text-gray-700">Facilities & Services</span>
                                </div>
                                <div class="grid grid-cols-2 md:grid-cols-3 gap-3 ml-6">
                                    @foreach($pharmacy->facilities as $facility)
                                        <div class="flex items-center p-3 bg-blue-50 rounded-lg border border-blue-100">
                                            @switch($facility)
                                                @case('parking')
                                                    <i class="fas fa-parking text-blue-500 mr-2"></i>
                                                    <span class="text-sm font-medium text-blue-700">Parking Available</span>
                                                    @break
                                                @case('24_hour')
                                                    <i class="fas fa-clock text-blue-500 mr-2"></i>
                                                    <span class="text-sm font-medium text-blue-700">24 Hour Service</span>
                                                    @break
                                                @case('consultation')
                                                    <i class="fas fa-user-md text-blue-500 mr-2"></i>
                                                    <span class="text-sm font-medium text-blue-700">Consultation</span>
                                                    @break
                                                @case('delivery')
                                                    <i class="fas fa-truck text-blue-500 mr-2"></i>
                                                    <span class="text-sm font-medium text-blue-700">Delivery Service</span>
                                                    @break
                                                @case('wheelchair_accessible')
                                                    <i class="fas fa-wheelchair text-blue-500 mr-2"></i>
                                                    <span class="text-sm font-medium text-blue-700">Wheelchair Accessible</span>
                                                    @break
                                                @case('air_conditioning')
                                                    <i class="fas fa-snowflake text-blue-500 mr-2"></i>
                                                    <span class="text-sm font-medium text-blue-700">Air Conditioning</span>
                                                    @break
                                                @case('credit_card')
                                                    <i class="fas fa-credit-card text-blue-500 mr-2"></i>
                                                    <span class="text-sm font-medium text-blue-700">Credit Card</span>
                                                    @break
                                                @case('online_payment')
                                                    <i class="fas fa-mobile-alt text-blue-500 mr-2"></i>
                                                    <span class="text-sm font-medium text-blue-700">Online Payment</span>
                                                    @break
                                                @default
                                                    <i class="fas fa-check text-blue-500 mr-2"></i>
                                                    <span class="text-sm font-medium text-blue-700">{{ ucfirst(str_replace('_', ' ', $facility)) }}</span>
                                            @endswitch
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>

                    <!-- Available Medicines -->
                    <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-8">
                        <div class="flex items-center justify-between mb-6">
                            <div class="flex items-center">
                                <div class="bg-gradient-to-r from-green-500 to-blue-600 p-3 rounded-xl mr-4">
                                    <i class="fas fa-pills text-white text-lg"></i>
                                </div>
                                <h3 class="text-gray-800 font-bold text-2xl">Available Medicines</h3>
                            </div>
                            <div class="text-sm text-gray-600 bg-gray-100 px-4 py-2 rounded-lg">
                                <i class="fas fa-capsules mr-2 text-green-500"></i>
                                {{ $pharmacy->medicines->count() }} medicines in stock
                            </div>
                        </div>

                        @if($medicinesByCategory->count() > 0)
                            <div class="space-y-6">
                                @foreach($medicinesByCategory as $category => $medicines)
                                    <div class="border border-gray-200 rounded-xl overflow-hidden">
                                        <div class="bg-gradient-to-r from-gray-50 to-gray-100 px-6 py-4 border-b border-gray-200">
                                            <h4 class="font-semibold text-gray-800 text-lg flex items-center">
                                                <i class="fas fa-tag mr-3 text-green-500"></i>
                                                {{ ucfirst($category) }}
                                                <span class="ml-2 text-sm bg-green-100 text-green-700 px-2 py-1 rounded-full">
                                                    {{ $medicines->count() }} items
                                                </span>
                                            </h4>
                                        </div>
                                        <div class="divide-y divide-gray-100">
                                            @foreach($medicines as $medicine)
                                                <div class="p-6 hover:bg-gray-50 transition-colors">
                                                    <div class="flex items-center justify-between">
                                                        <div class="flex-1">
                                                            <div class="flex items-center mb-2">
                                                                <h5 class="font-semibold text-gray-800 text-lg mr-3">{{ $medicine->nama }}</h5>
                                                                @if($medicine->pivot->is_available && $medicine->pivot->stock > 0)
                                                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700 border border-green-200">
                                                                        <i class="fas fa-check-circle mr-1"></i>Available
                                                                    </span>
                                                                @else
                                                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-red-100 text-red-700 border border-red-200">
                                                                        <i class="fas fa-times-circle mr-1"></i>Out of Stock
                                                                    </span>
                                                                @endif
                                                            </div>
                                                            
                                                            @if($medicine->deskripsi)
                                                                <p class="text-gray-600 text-sm mb-3 line-clamp-2">{{ $medicine->deskripsi }}</p>
                                                            @endif
                                                            
                                                            <div class="flex items-center text-sm text-gray-600 space-x-4">
                                                                <div class="flex items-center">
                                                                    <i class="fas fa-industry mr-2 text-blue-500"></i>
                                                                    <span>{{ $medicine->produsen }}</span>
                                                                </div>
                                                                <div class="flex items-center">
                                                                    <i class="fas fa-boxes mr-2 text-green-500"></i>
                                                                    <span>Stock: {{ $medicine->pivot->stock }}</span>
                                                                </div>
                                                                @if($medicine->pivot->price)
                                                                    <div class="flex items-center">
                                                                        <i class="fas fa-money-bill-wave mr-2 text-yellow-500"></i>
                                                                        <span>Rp {{ number_format($medicine->pivot->price, 0, ',', '.') }}</span>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                            
                                                            @if($medicine->pivot->notes)
                                                                <div class="mt-3 p-3 bg-blue-50 rounded-lg border-l-4 border-blue-400">
                                                                    <div class="flex items-center">
                                                                        <i class="fas fa-info-circle text-blue-500 mr-2"></i>
                                                                        <span class="text-sm text-blue-700 font-medium">Note:</span>
                                                                    </div>
                                                                    <p class="text-sm text-blue-600 mt-1">{{ $medicine->pivot->notes }}</p>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-12">
                                <div class="bg-gray-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <i class="fas fa-pills text-gray-400 text-2xl"></i>
                                </div>
                                <h4 class="text-lg font-semibold text-gray-800 mb-2">No Medicines Available</h4>
                                <p class="text-gray-600">This pharmacy currently has no medicines in stock.</p>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="lg:col-span-1 space-y-6">
                    <!-- Quick Actions -->
                    <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-6 mt-6">
    <h3 class="font-bold text-lg text-gray-800 mb-6 flex items-center">
        <i class="fas fa-phone mr-3 text-green-500"></i>
        Quick Actions
    </h3>
                        
                        <div class="space-y-4">
                            <a href="tel:{{ $pharmacy->phone }}" 
                               class="w-full inline-flex items-center justify-center px-6 py-4 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white rounded-xl font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg">
                                <i class="fas fa-phone mr-3"></i>Call Pharmacy
                            </a>
                            
                            <button onclick="openWhatsApp('{{ $pharmacy->id_pharmacy }}', '{{ $pharmacy->name }}')" 
                                    class="w-full inline-flex items-center justify-center px-6 py-4 bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white rounded-xl font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg">
                                <i class="fab fa-whatsapp mr-3"></i>WhatsApp
                            </button>
                            
                            @if($pharmacy->latitude && $pharmacy->longitude)
                                <a href="https://www.google.com/maps/dir/?api=1&destination={{ $pharmacy->latitude }},{{ $pharmacy->longitude }}" 
                                   target="_blank"
                                   class="w-full inline-flex items-center justify-center px-6 py-4 bg-gradient-to-r from-purple-500 to-purple-600 hover:from-purple-600 hover:to-purple-700 text-white rounded-xl font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg">
                                    <i class="fas fa-directions mr-3"></i>Get Directions
                                </a>
                            @endif
                        </div>
                    </div>

                    <!-- Pharmacy Stats -->
                    <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-6">
                        <h3 class="font-bold text-lg text-gray-800 mb-6 flex items-center">
                            <i class="fas fa-chart-bar mr-3 text-green-500"></i>
                            Pharmacy Stats
                        </h3>
                        
                        <div class="space-y-4">
                            <div class="flex items-center justify-between p-4 bg-green-50 rounded-xl border border-green-100">
                                <div class="flex items-center">
                                    <i class="fas fa-pills text-green-500 mr-3"></i>
                                    <span class="text-gray-700 font-medium">Total Medicines</span>
                                </div>
                                <span class="text-2xl font-bold text-green-600">{{ $pharmacy->medicines->count() }}</span>
                            </div>
                            
                            <div class="flex items-center justify-between p-4 bg-blue-50 rounded-xl border border-blue-100">
                                <div class="flex items-center">
                                    <i class="fas fa-check-circle text-blue-500 mr-3"></i>
                                    <span class="text-gray-700 font-medium">Available</span>
                                </div>
                                <span class="text-2xl font-bold text-blue-600">{{ $pharmacy->medicines->where('pivot.is_available', true)->where('pivot.stock', '>', 0)->count() }}</span>
                            </div>
                            
                            <div class="flex items-center justify-between p-4 bg-purple-50 rounded-xl border border-purple-100">
                                <div class="flex items-center">
                                    <i class="fas fa-tags text-purple-500 mr-3"></i>
                                    <span class="text-gray-700 font-medium">Categories</span>
                                </div>
                                <span class="text-2xl font-bold text-purple-600">{{ $medicinesByCategory->count() }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Opening Hours -->
                    @if($pharmacy->operating_hours)
                        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-6">
                            <h3 class="font-bold text-lg text-gray-800 mb-6 flex items-center">
                                <i class="fas fa-clock mr-3 text-green-500"></i>
                                Opening Hours
                            </h3>
                            
                            <div class="space-y-3">
                                @php
                                    $days = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];
                                    $dayNames = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
                                    $today = strtolower(now()->format('l'));
                                @endphp
                                
                                @foreach($days as $index => $day)
                                    @if(isset($pharmacy->operating_hours[$day]))
                                        <div class="flex items-center justify-between p-3 rounded-lg {{ $day === $today ? 'bg-green-50 border border-green-200' : 'bg-gray-50' }}">
                                            <span class="font-medium {{ $day === $today ? 'text-green-800' : 'text-gray-700' }}">
                                                {{ $dayNames[$index] }}
                                                @if($day === $today)
                                                    <span class="text-xs bg-green-100 text-green-700 px-2 py-1 rounded-full ml-2">Today</span>
                                                @endif
                                            </span>
                                            <span class="text-sm {{ $day === $today ? 'text-green-700 font-semibold' : 'text-gray-600' }}">
                                                @if($pharmacy->operating_hours[$day]['is_open'])
                                                    {{ $pharmacy->operating_hours[$day]['open'] }} - {{ $pharmacy->operating_hours[$day]['close'] }}
                                                @else
                                                    Closed
                                                @endif
                                            </span>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- WhatsApp Modal -->
    <div id="whatsappModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full p-6 transform transition-all duration-300 scale-95 opacity-0" id="whatsappModalContent">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-xl font-bold text-gray-800 flex items-center">
                    <i class="fab fa-whatsapp text-green-500 mr-3 text-2xl"></i>
                    Contact Pharmacy
                </h3>
                <button onclick="closeWhatsApp()" class="text-gray-400 hover:text-gray-600 transition-colors">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>
            
            <div class="mb-6">
                <p class="text-gray-600 mb-4">Send a message to <span id="pharmacyName" class="font-semibold text-gray-800">{{ $pharmacy->name }}</span>:</p>
                <textarea id="whatsappMessage" rows="4" 
                          class="w-full p-4 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500 resize-none"
                          placeholder="Type your message here...">Hello, I would like to inquire about medicine availability at {{ $pharmacy->name }}.</textarea>
            </div>
            
            <div class="flex space-x-3">
                <button onclick="closeWhatsApp()" 
                        class="flex-1 px-4 py-3 border border-gray-300 text-gray-700 rounded-xl font-semibold hover:bg-gray-50 transition-all duration-300">
                    Cancel
                </button>
                <button onclick="sendWhatsApp()" 
                        class="flex-1 px-4 py-3 bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white rounded-xl font-semibold transition-all duration-300 transform hover:scale-105">
                    <i class="fab fa-whatsapp mr-2"></i>Send Message
                </button>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        let currentPharmacyId = '{{ $pharmacy->id_pharmacy }}';

        // WhatsApp functions
        function openWhatsApp(pharmacyId, pharmacyName) {
            currentPharmacyId = pharmacyId;
            
            const modal = document.getElementById('whatsappModal');
            const content = document.getElementById('whatsappModalContent');
            
            modal.classList.remove('hidden');
            
            // Animate modal
            setTimeout(() => {
                content.classList.remove('scale-95', 'opacity-0');
                content.classList.add('scale-100', 'opacity-100');
            }, 10);
        }

        function closeWhatsApp() {
            const modal = document.getElementById('whatsappModal');
            const content = document.getElementById('whatsappModalContent');
            
            content.classList.remove('scale-100', 'opacity-100');
            content.classList.add('scale-95', 'opacity-0');
            
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300);
        }

        function sendWhatsApp() {
            if (!currentPharmacyId) return;
            
            const message = document.getElementById('whatsappMessage').value.trim();
            if (!message) {
                alert('Please enter a message.');
                return;
            }

            // Get WhatsApp link from server
            fetch(`/pharmacies/${currentPharmacyId}/whatsapp`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ message: message })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.open(data.whatsapp_link, '_blank');
                    closeWhatsApp();
                } else {
                    alert('Failed to generate WhatsApp link. Please try again.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred. Please try again.');
            });
        }

        // Close modal when clicking outside
        document.getElementById('whatsappModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeWhatsApp();
            }
        });

        // Close modal on ESC key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && !document.getElementById('whatsappModal').classList.contains('hidden')) {
                closeWhatsApp();
            }
        });
    </script>
    @endpush
</x-app-layout>