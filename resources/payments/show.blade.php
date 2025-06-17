<x-app-layout>
    <div class="py-12 mt-16">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-900">Complete Your Payment</h1>
                <p class="text-gray-600 mt-2">Secure and fast payment process with Tripay</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Left Column: Specialist Info & Payment Details -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- Specialist Card -->
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                        <div class="flex items-center space-x-4">
                            <div class="relative">
                                <img src="{{ asset($spesialis->image) }}" alt="specialist"
                                    class="w-20 h-20 rounded-full object-cover border-4 border-blue-100">
                                <div class="absolute -bottom-1 -right-1 bg-green-500 w-6 h-6 rounded-full border-2 border-white flex items-center justify-center">
                                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="flex-1">
                                <h2 class="text-xl font-semibold text-gray-900">{{ $spesialis->nama }}</h2>
                                <p class="text-blue-600 font-medium">{{ $spesialis->spesialisasi }}</p>
                                <div class="flex items-center mt-2">
                                    <div class="flex items-center">
                                        @for($i = 0; $i < 5; $i++)
                                            <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                            </svg>
                                        @endfor
                                    </div>
                                    <span class="ml-2 text-sm text-gray-600">4.9 (127 reviews)</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Summary -->
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Payment Summary</h3>
                        <div class="space-y-3">
                            <div class="flex justify-between items-center py-2">
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span class="text-gray-700">30 minute consultation</span>
                                </div>
                                <span class="font-medium">Rp{{ number_format($spesialis->harga, 0, ',', '.') }}</span>
                            </div>
                            
                            @if(session('applied_voucher'))
                            <div class="flex justify-between items-center py-2 text-green-600">
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                    </svg>
                                    <span>Voucher ({{ session('applied_voucher') }} - {{ session('discount_percentage') }}%)</span>
                                </div>
                                <span class="font-medium">- Rp{{ number_format(session('discount_amount'), 0, ',', '.') }}</span>
                            </div>
                            @endif
                            
                            <div class="border-t pt-3">
                                <div class="flex justify-between items-center">
                                    <span class="text-lg font-semibold text-gray-900">Total Payment</span>
                                    <span class="text-xl font-bold text-blue-600">
                                        @if(session('applied_voucher'))
                                            Rp{{ number_format(session('discounted_price'), 0, ',', '.') }}
                                        @else
                                            Rp{{ number_format($spesialis->harga, 0, ',', '.') }}
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Voucher Section (keep existing voucher code) -->
                    <!-- ... existing voucher section ... -->
                </div>

                <!-- Right Column: Payment Methods -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 sticky top-8">
                        <h3 class="text-lg font-semibold text-gray-900 mb-6">Choose Payment Method</h3>
                        
                        <div id="paymentChannels" class="space-y-4">
                            <!-- Payment channels will be loaded here -->
                            <div class="text-center py-4">
                                <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-blue-600 mx-auto"></div>
                                <p class="text-sm text-gray-500 mt-2">Loading payment methods...</p>
                            </div>
                        </div>

                        <button id="paymentButton" class="w-full mt-6 bg-gradient-to-r from-blue-600 to-blue-700 text-white py-4 px-6 rounded-lg hover:from-blue-700 hover:to-blue-800 transition duration-200 font-semibold text-lg shadow-lg disabled:opacity-50" disabled>
                            Proceed to Payment
                        </button>

                        <!-- Trust Indicators -->
                        <div class="mt-6 pt-6 border-t border-gray-200">
                            <div class="flex items-center justify-center space-x-4 text-xs text-gray-500">
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                    </svg>
                                    <span>Secure Payment</span>
                                </div>
                                <div class="flex items-center">
                                    <img src="https://tripay.co.id/images/tripay.png" alt="Tripay" class="h-4">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Personal Data Modal (keep existing modal) -->
    <!-- ... existing modal code ... -->

    <!-- Payment Result Modal -->
    <div id="paymentResultModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 overflow-y-auto hidden">
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="relative bg-white rounded-2xl shadow-2xl w-full max-w-lg transform transition-all">
                <div class="p-6">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Payment Created Successfully</h3>
                        <p class="text-gray-500 text-sm mb-6">You will be redirected to complete your payment</p>
                        
                        <div class="bg-gray-50 p-4 rounded-lg mb-4">
                            <div class="text-sm text-gray-600 space-y-2">
                                <div class="flex justify-between">
                                    <span>Reference:</span>
                                    <span class="font-mono" id="paymentReference"></span>
                                </div>
                                <div class="flex justify-between">
                                    <span>Amount:</span>
                                    <span class="font-semibold" id="paymentAmount"></span>
                                </div>
                                <div class="flex justify-between">
                                    <span>Expires:</span>
                                    <span id="paymentExpiry"></span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="flex space-x-3">
                            <button id="backToPaymentBtn" class="flex-1 px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 transition-colors">
                                Back
                            </button>
                            <button id="proceedToPaymentBtn" class="flex-1 px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors">
                                Complete Payment
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let selectedPaymentMethod = '';
            let paymentChannels = [];
            let personalData = {};
            let currentPaymentData = null;

            // Load payment channels
            loadPaymentChannels();

            function loadPaymentChannels() {
                fetch('/tripay/channels')
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            paymentChannels = data.data;
                            renderPaymentChannels();
                        } else {
                            showError('Failed to load payment methods');
                        }
                    })
                    .catch(error => {
                        console.error('Error loading payment channels:', error);
                        showError('Failed to load payment methods');
                    });
            }

            function renderPaymentChannels() {
                const container = document.getElementById('paymentChannels');
                
                // Group channels by type
                const groupedChannels = {
                    'Virtual Account': paymentChannels.filter(ch => ch.group === 'Virtual Account'),
                    'E-Wallet': paymentChannels.filter(ch => ch.group === 'E-Wallet'),
                    'Retail': paymentChannels.filter(ch => ch.group === 'Retail'),
                    'QR Code': paymentChannels.filter(ch => ch.group === 'QR Code')
                };

                let html = '';
                
                Object.entries(groupedChannels).forEach(([groupName, channels]) => {
                    if (channels.length > 0) {
                        html += `<div class="mb-4">
                            <h4 class="text-sm font-medium text-gray-700 mb-2">${groupName}</h4>
                            <div class="space-y-2">`;
                        
                        channels.forEach(channel => {
                            if (channel.active) {
                                html += `
                                    <div class="payment-option border-2 border-gray-200 rounded-lg p-3 cursor-pointer hover:border-blue-500 transition-colors" 
                                         data-method="${channel.code}" data-name="${channel.name}">
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center">
                                                <img src="${channel.icon_url}" alt="${channel.name}" class="w-8 h-8 mr-3">
                                                <div>
                                                    <h5 class="font-medium text-gray-900 text-sm">${channel.name}</h5>
                                                    <p class="text-xs text-gray-500">Fee: ${channel.total_fee.flat || 0} + ${channel.total_fee.percent || 0}%</p>
                                                </div>
                                            </div>
                                            <div class="payment-radio hidden">
                                                <div class="w-4 h-4 rounded-full border-2 border-blue-600 bg-blue-600 flex items-center justify-center">
                                                    <div class="w-2 h-2 bg-white rounded-full"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>`;
                            }
                        });
                        
                        html += `</div></div>`;
                    }
                });

                container.innerHTML = html;

                // Add click handlers
                document.querySelectorAll('.payment-option').forEach(option => {
                    option.addEventListener('click', function() {
                        // Remove selected class from all options
                        document.querySelectorAll('.payment-option').forEach(opt => {
                            opt.classList.remove('border-blue-500');
                            opt.querySelector('.payment-radio').classList.add('hidden');
                        });
                        
                        // Add selected class to clicked option
                        this.classList.add('border-blue-500');
                        this.querySelector('.payment-radio').classList.remove('hidden');
                        
                        selectedPaymentMethod = this.getAttribute('data-method');
                        document.getElementById('paymentButton').disabled = false;
                    });
                });
            }

            // Payment button click
            document.getElementById('paymentButton').addEventListener('click', function() {
                if (!selectedPaymentMethod) {
                    alert('Please select a payment method first.');
                    return;
                }
                document.getElementById('personalDataModal').classList.remove('hidden');
            });

            // Personal data form submission
            document.getElementById('personalDataForm').addEventListener('submit', function(e) {
                e.preventDefault();
                
                const formData = new FormData(this);
                personalData = {
                    specialist_id: {{ $spesialis->id_spesialis }},
                    full_name: formData.get('full_name'),
                    gender: formData.get('gender'),
                    date_of_birth: formData.get('date_of_birth'),
                    phone_number: formData.get('phone_number'),
                    address: formData.get('address'),
                    medical_history: formData.get('medical_history'),
                    complaints: formData.get('complaints'),
                    payment_method: selectedPaymentMethod
                };
                
                // Close personal data modal and show loading
                document.getElementById('personalDataModal').classList.add('hidden');
                document.getElementById('loadingModal').classList.remove('hidden');
                
                // Create payment
                createPayment();
            });

            function createPayment() {
                fetch('/payments', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify(personalData)
                })
                .then(response => response.json())
                .then(data => {
                    document.getElementById('loadingModal').classList.add('hidden');
                    
                    if (data.success) {
                        currentPaymentData = data.tripay_data;
                        showPaymentResult(data.tripay_data);
                    } else {
                        showError('Payment creation failed. Please try again.');
                    }
                })
                .catch(error => {
                    document.getElementById('loadingModal').classList.add('hidden');
                    console.error('Error creating payment:', error);
                    showError('An error occurred while creating your payment.');
                });
            }

            function showPaymentResult(tripayData) {
                document.getElementById('paymentReference').textContent = tripayData.reference;
                document.getElementById('paymentAmount').textContent = formatCurrency(tripayData.amount);
                document.getElementById('paymentExpiry').textContent = new Date(tripayData.expired_time * 1000).toLocaleString();
                
                document.getElementById('paymentResultModal').classList.remove('hidden');
            }

            // Payment result modal handlers
            document.getElementById('backToPaymentBtn').addEventListener('click', function() {
                document.getElementById('paymentResultModal').classList.add('hidden');
            });

            document.getElementById('proceedToPaymentBtn').addEventListener('click', function() {
                if (currentPaymentData && currentPaymentData.checkout_url) {
                    window.open(currentPaymentData.checkout_url, '_blank');
                } else {
                    // Show payment instructions
                    alert('Please follow the payment instructions provided.');
                }
            });

            function formatCurrency(amount) {
                return 'Rp' + new Intl.NumberFormat('id-ID').format(amount);
            }

            function showError(message) {
                alert(message); // You can replace this with a better error display
            }

            // Close modal function
            window.closeModal = function(modalId) {
                document.getElementById(modalId).classList.add('hidden');
            };
        });
    </script>
</x-app-layout>
