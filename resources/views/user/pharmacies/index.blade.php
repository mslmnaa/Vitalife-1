<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-3xl text-gray-800 leading-tight flex items-center">
                <div class="bg-gradient-to-r from-green-500 to-blue-600 p-3 rounded-xl mr-4 shadow-lg">
                    <i class="fas fa-clinic-medical text-white text-xl"></i>
                </div>
                {{ __('Find Pharmacy Near You') }}
            </h2>
            <div class="flex items-center space-x-4">
                <div class="text-sm text-gray-600 bg-white px-4 py-2 rounded-lg shadow-sm">
                    <i class="fas fa-map-marker-alt mr-2 text-green-500"></i>
                    Total: <span class="font-semibold text-gray-800">{{ $pharmacies->total() ?? 0 }}</span> pharmacies
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-8 min-h-screen bg-gradient-to-br from-green-50 via-white to-blue-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Search and Filter Section -->
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-8 mb-8 backdrop-blur-sm">
                <div class="flex items-center mb-6">
                    <div class="bg-gradient-to-r from-green-500 to-blue-600 p-3 rounded-xl mr-4">
                        <i class="fas fa-search text-white text-lg"></i>
                    </div>
                    <h3 class="text-gray-800 font-bold text-xl">Search & Filter Pharmacies</h3>
                </div>
                
                <form method="GET" action="{{ route('pharmacies.index') }}" class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        <!-- Search Input -->
                        <div class="lg:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Search</label>
                            <div class="relative">
                                <input type="text" name="search" value="{{ request('search') }}" 
                                       placeholder="Search pharmacy name, address..." 
                                       class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-300 bg-gray-50 hover:bg-white">
                                <i class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                            </div>
                        </div>
                        
                        {{-- <!-- Medicine Filter -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Find Medicine</label>
                            <div class="relative">
                                <select name="medicine_id" class="w-full pl-4 pr-10 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500 appearance-none bg-gray-50 hover:bg-white transition-all duration-300">
                                    <option value="">All Medicines</option>
                                    @foreach($medicines as $medicine)
                                        <option value="{{ $medicine->id_medicine }}" {{ request('medicine_id') == $medicine->id_medicine ? 'selected' : '' }}>
                                            {{ $medicine->nama }}
                                        </option>
                                    @endforeach
                                </select>
                                <i class="fas fa-chevron-down absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 pointer-events-none"></i>
                            </div>
                        </div> --}}
                        
                        <!-- Facility Filter -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Facilities</label>
                            <div class="relative">
                                <select name="facility" class="w-full pl-4 pr-10 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500 appearance-none bg-gray-50 hover:bg-white transition-all duration-300">
                                    <option value="">All Facilities</option>
                                    @foreach($facilities as $key => $facility)
                                        <option value="{{ $key }}" {{ request('facility') == $key ? 'selected' : '' }}>
                                            {{ $facility }}
                                        </option>
                                    @endforeach
                                </select>
                                <i class="fas fa-chevron-down absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 pointer-events-none"></i>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Location Search -->
                    <div class="border-t border-gray-200 pt-6">
                        <div class="flex items-center mb-4">
                            <i class="fas fa-map-marker-alt text-green-500 mr-2"></i>
                            <h4 class="font-semibold text-gray-800">Find Nearby Pharmacies</h4>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <input type="hidden" name="latitude" id="latitude" value="{{ request('latitude') }}">
                                <input type="hidden" name="longitude" id="longitude" value="{{ request('longitude') }}">
                                <button type="button" id="findNearby" class="w-full px-4 py-3 bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white rounded-xl font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg">
                                    <i class="fas fa-location-arrow mr-2"></i>Use My Location
                                </button>
                            </div>
                            <div>
                                <select name="radius" class="w-full pl-4 pr-10 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500 appearance-none bg-gray-50 hover:bg-white">
                                    <option value="5" {{ request('radius') == '5' ? 'selected' : '' }}>Within 5 km</option>
                                    <option value="10" {{ request('radius', '10') == '10' ? 'selected' : '' }}>Within 10 km</option>
                                    <option value="20" {{ request('radius') == '20' ? 'selected' : '' }}>Within 20 km</option>
                                    <option value="50" {{ request('radius') == '50' ? 'selected' : '' }}>Within 50 km</option>
                                </select>
                            </div>
                            <div>
                                <button type="submit" class="w-full px-4 py-3 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white rounded-xl font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg">
                                    <i class="fas fa-search mr-2"></i>Search
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="flex flex-wrap gap-4 pt-4 border-t border-gray-200">
                        @if(request('search') || request('medicine_id') || request('facility') || request('latitude'))
                            <a href="{{ route('pharmacies.index') }}" class="px-8 py-3 bg-gradient-to-r from-gray-500 to-gray-600 hover:from-gray-600 hover:to-gray-700 text-white rounded-xl font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                                <i class="fas fa-times mr-2"></i>Reset Filters
                            </a>
                        @endif
                        {{-- <a href="{{ route('pharmacies.medicine-checker') }}" class="px-8 py-3 bg-gradient-to-r from-purple-500 to-purple-600 hover:from-purple-600 hover:to-purple-700 text-white rounded-xl font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                            <i class="fas fa-pills mr-2"></i>Medicine Checker
                        </a> --}}
                    </div>
                </form>
            </div>

            <!-- Pharmacies Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($pharmacies as $pharmacy)
                    <div class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100 overflow-hidden group">
                        <!-- Image Section -->
                        <div class="relative overflow-hidden">
                            @if($pharmacy->image)
                                <img src="{{ asset($pharmacy->image) }}" alt="{{ $pharmacy->name }}" 
                                     class="w-full h-48 object-cover transition-transform duration-500 group-hover:scale-110">
                            @else
                                <div class="w-full h-48 bg-gradient-to-br from-green-400 via-blue-500 to-purple-500 flex items-center justify-center relative">
                                    <div class="absolute inset-0 bg-gradient-to-br from-transparent via-white/10 to-transparent"></div>
                                    <i class="fas fa-clinic-medical text-6xl text-white relative z-10 drop-shadow-lg"></i>
                                </div>
                            @endif
                            
                            <!-- Status Badge -->
                            <div class="absolute top-4 right-4">
                                @if($pharmacy->is_open_now === true)
                                    <span class="px-3 py-1 rounded-full text-xs font-semibold bg-green-500 text-white backdrop-blur-sm shadow-lg">
                                        <i class="fas fa-clock mr-1"></i>Open Now
                                    </span>
                                @elseif($pharmacy->is_open_now === false)
                                    <span class="px-3 py-1 rounded-full text-xs font-semibold bg-red-500 text-white backdrop-blur-sm shadow-lg">
                                        <i class="fas fa-clock mr-1"></i>Closed
                                    </span>
                                @endif
                            </div>

                            <!-- Distance Badge (if location search) -->
                            @if(isset($pharmacy->distance))
                                <div class="absolute top-4 left-4">
                                    <span class="px-3 py-1 rounded-full text-xs font-semibold bg-blue-500 text-white backdrop-blur-sm shadow-lg">
                                        <i class="fas fa-map-marker-alt mr-1"></i>{{ round($pharmacy->distance, 1) }} km
                                    </span>
                                </div>
                            @endif

                            <!-- Hover Overlay -->
                            <div class="absolute inset-0 bg-black bg-opacity-40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                <div class="text-white text-center">
                                    <i class="fas fa-eye text-2xl mb-2"></i>
                                    <p class="text-sm font-medium">View Details</p>
                                </div>
                            </div>
                        </div>

                        <!-- Content Section -->
                        <div class="p-6 space-y-4">
                            <div>
                                <h3 class="text-xl font-bold text-gray-800 mb-2 group-hover:text-green-600 transition-colors">
                                    {{ $pharmacy->name }}
                                </h3>
                                
                                <div class="flex items-start text-gray-600 text-sm mb-2">
                                    <i class="fas fa-map-marker-alt mr-2 mt-1 text-green-500 flex-shrink-0"></i>
                                    <span class="line-clamp-2">{{ $pharmacy->address }}</span>
                                </div>

                                @if($pharmacy->description)
                                    <p class="text-gray-600 text-sm line-clamp-2 leading-relaxed">
                                        {{ $pharmacy->description }}
                                    </p>
                                @endif
                            </div>
                            
                            <!-- Contact Info -->
                            <div class="space-y-2 py-3 border-t border-gray-100">
                                <div class="flex items-center text-sm text-gray-600">
                                    <i class="fas fa-phone mr-3 text-blue-500 w-4"></i>
                                    <a href="tel:{{ $pharmacy->phone }}" class="hover:text-blue-600 transition-colors">
                                        {{ $pharmacy->phone }}
                                    </a>
                                </div>
                                <div class="flex items-center text-sm text-gray-600">
                                    <i class="fab fa-whatsapp mr-3 text-green-500 w-4"></i>
                                    <span>{{ $pharmacy->whatsapp }}</span>
                                </div>
                            </div>

                            <!-- Facilities -->
                            @if($pharmacy->facilities && count($pharmacy->facilities) > 0)
                                <div class="py-3 border-t border-gray-100">
                                    <div class="flex flex-wrap gap-2">
                                        @foreach(array_slice($pharmacy->facilities, 0, 3) as $facility)
                                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-700 border border-blue-200">
                                                @switch($facility)
                                                    @case('parking')
                                                        <i class="fas fa-parking mr-1"></i>Parking
                                                        @break
                                                    @case('24_hour')
                                                        <i class="fas fa-clock mr-1"></i>24h
                                                        @break
                                                    @case('consultation')
                                                        <i class="fas fa-user-md mr-1"></i>Consultation
                                                        @break
                                                    @case('wheelchair_accessible')
                                                        <i class="fas fa-wheelchair mr-1"></i>Accessible
                                                        @break
                                                    @case('delivery')
                                                        <i class="fas fa-truck mr-1"></i>Delivery
                                                        @break
                                                    @case('credit_card')
                                                        <i class="fas fa-credit-card mr-1"></i>Card
                                                        @break
                                                    @default
                                                        {{ ucfirst(str_replace('_', ' ', $facility)) }}
                                                @endswitch
                                            </span>
                                        @endforeach
                                        @if(count($pharmacy->facilities) > 3)
                                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-600">
                                                +{{ count($pharmacy->facilities) - 3 }} more
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            @endif

                            <!-- Medicine Count -->
                            <div class="py-3 border-t border-gray-100">
                                <div class="flex items-center justify-between">
                                    <span class="text-sm text-gray-600">
                                        <i class="fas fa-pills mr-2 text-green-500"></i>
                                        {{ $pharmacy->medicines->count() }} medicines available
                                    </span>
                                    @if($pharmacy->medicines->count() > 0)
                                        <span class="text-xs text-green-600 font-medium">In Stock</span>
                                    @endif
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="pt-4 space-y-3">
                                <a href="{{ route('pharmacies.show', $pharmacy->id_pharmacy) }}" 
                                   class="w-full inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white rounded-xl font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                                    <i class="fas fa-store mr-2"></i>Visit Pharmacy
                                </a>
                                
                                <div class="grid grid-cols-2 gap-3">
                                    <a href="tel:{{ $pharmacy->phone }}" 
                                       class="inline-flex items-center justify-center px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white text-sm rounded-lg font-medium transition-all duration-300">
                                        <i class="fas fa-phone mr-1"></i>Call
                                    </a>
                                    <a href="#" onclick="openWhatsApp('{{ $pharmacy->id_pharmacy }}', '{{ $pharmacy->name }}')" 
                                       class="inline-flex items-center justify-center px-4 py-2 bg-green-500 hover:bg-green-600 text-white text-sm rounded-lg font-medium transition-all duration-300">
                                        <i class="fab fa-whatsapp mr-1"></i>WhatsApp
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full">
                        <div class="bg-white rounded-2xl shadow-lg p-12 text-center border border-gray-100">
                            <div class="bg-gray-100 w-24 h-24 rounded-full flex items-center justify-center mx-auto mb-6">
                                <i class="fas fa-search text-gray-400 text-3xl"></i>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-3">No Pharmacies Found</h3>
                            <p class="text-gray-600 mb-6 max-w-md mx-auto">
                                We couldn't find any pharmacies matching your search criteria. Try adjusting your filters or search terms.
                            </p>
                            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                                <a href="{{ route('pharmacies.index') }}" 
                                   class="px-6 py-3 bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white rounded-xl font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg">
                                    <i class="fas fa-refresh mr-2"></i>Show All Pharmacies
                                </a>
                                <button onclick="document.getElementById('findNearby').click()" 
                                        class="px-6 py-3 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white rounded-xl font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg">
                                    <i class="fas fa-location-arrow mr-2"></i>Find Nearby
                                </button>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if($pharmacies->hasPages())
                <div class="mt-12">
                    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6">
                        {{ $pharmacies->links() }}
                    </div>
                </div>
            @endif
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
                <p class="text-gray-600 mb-4">Send a message to <span id="pharmacyName" class="font-semibold text-gray-800"></span>:</p>
                <textarea id="whatsappMessage" rows="4" 
                          class="w-full p-4 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500 resize-none"
                          placeholder="Type your message here...">Hello, I would like to inquire about medicine availability.</textarea>
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
        let currentPharmacyId = null;
        let currentPharmacyWhatsApp = null;

        // Find nearby pharmacies using geolocation
        document.getElementById('findNearby').addEventListener('click', function() {
            if (!navigator.geolocation) {
                alert('Geolocation is not supported by this browser.');
                return;
            }

            const button = this;
            const originalText = button.innerHTML;
            button.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Getting Location...';
            button.disabled = true;

            navigator.geolocation.getCurrentPosition(
                function(position) {
                    document.getElementById('latitude').value = position.coords.latitude;
                    document.getElementById('longitude').value = position.coords.longitude;
                    
                    // Auto-submit the form
                    button.closest('form').submit();
                },
                function(error) {
                    button.innerHTML = originalText;
                    button.disabled = false;
                    
                    let message = 'Unable to retrieve your location. ';
                    switch(error.code) {
                        case error.PERMISSION_DENIED:
                            message += 'Please allow location access and try again.';
                            break;
                        case error.POSITION_UNAVAILABLE:
                            message += 'Location information is unavailable.';
                            break;
                        case error.TIMEOUT:
                            message += 'Location request timed out.';
                            break;
                        default:
                            message += 'An unknown error occurred.';
                            break;
                    }
                    alert(message);
                },
                {
                    enableHighAccuracy: true,
                    timeout: 10000,
                    maximumAge: 300000
                }
            );
        });

        // WhatsApp functions
        function openWhatsApp(pharmacyId, pharmacyName) {
            currentPharmacyId = pharmacyId;
            document.getElementById('pharmacyName').textContent = pharmacyName;
            
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
                currentPharmacyId = null;
                currentPharmacyWhatsApp = null;
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
      @include('layouts.footer')
</x-app-layout>