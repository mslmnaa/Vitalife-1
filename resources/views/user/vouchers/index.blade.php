```blade
<!-- resources/views/fitur/voucher.blade.php -->
<x-app-layout>
    <div class="py-12 mt-16">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-3xl font-bold mb-6">Available Vouchers</h1>
                    
                    @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                    @endif

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @forelse($vouchers as $voucher)
                            <div class="bg-gray-50 rounded-lg shadow overflow-hidden">
                                <img src="{{ asset($voucher->image) }}" alt="{{ $voucher->code }}" class="w-full h-40 object-cover">
                                <div class="p-4">
                                    <div class="flex justify-between items-center mb-2">
                                        <h3 class="text-xl font-bold text-indigo-600">{{ $voucher->code }}</h3>
                                        <span class="bg-indigo-100 text-indigo-800 text-xs px-2 py-1 rounded-full">{{ $voucher->discount_percentage }}% OFF</span>
                                    </div>
                                    <p class="text-gray-700 mb-4">{{ $voucher->description }}</p>
                                    <div class="text-sm text-gray-500">
                                        @if($voucher->expired_at)
                                            <p>Expires: {{ date('d M Y', strtotime($voucher->expired_at)) }}</p>
                                        @else
                                            <p>No expiration date</p>
                                        @endif
                                    </div>
                                    <div class="mt-4 flex justify-between items-center">
                                        <button class="copy-code px-3 py-1 bg-indigo-600 text-white rounded hover:bg-indigo-700 text-sm" 
                                                data-code="{{ $voucher->code }}">
                                            Copy Code
                                        </button>
                                        <span class="text-sm text-gray-500">
                                            Used {{ $voucher->usage_count }} 
                                            @if($voucher->usage_limit)
                                                / {{ $voucher->usage_limit }}
                                            @endif
                                            times
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-span-3 text-center py-10">
                                <p class="text-gray-500">No vouchers available at the moment</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footer')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const copyButtons = document.querySelectorAll('.copy-code');
            
            copyButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const code = this.getAttribute('data-code');
                    navigator.clipboard.writeText(code).then(() => {
                        // Change button text temporarily
                        const originalText = this.textContent;
                        this.textContent = 'Copied!';
                        this.classList.remove('bg-indigo-600');
                        this.classList.add('bg-green-600');
                        
                        // Reset button after 2 seconds
                        setTimeout(() => {
                            this.textContent = originalText;
                            this.classList.remove('bg-green-600');
                            this.classList.add('bg-indigo-600');
                        }, 2000);
                    }).catch(err => {
                        console.error('Could not copy text: ', err);
                    });
                });
            });
        });
    </script>
</x-app-layout>
```