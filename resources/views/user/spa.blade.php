<x-app-layout>
    <div class="flex justify-center items-center pt-24">
        <div class="bg-gray-100 rounded-2xl shadow-lg w-full max-w-5xl p-8">
            <form action="{{ route('spa.index') }}" method="GET">
                <div class="flex justify-between items-center mb-6 w-full">
                    <!-- Spa Place Search -->
                    <div class="flex-grow mr-4">
                        <input type="text" name="location" id="location"
                            class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600"
                            placeholder="Search spa by location" value="{{ request('location') }}" />
                    </div>

                    <!-- Search Button -->
                    <div>
                        <button type="submit"
                            class="bg-blue-600 text-white rounded-md py-1.5 px-6 text-sm hover:bg-blue-700 transition duration-300">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                                <span class="text-sm">Search</span>
                            </div>
                        </button>
                    </div>
                </div>

                <div class="flex flex-wrap justify-start items-center w-full gap-4">
                    <!-- Price range filter -->
                    <div class="flex justify-start items-center w-full space-x-4">
                        <label for="min-price" class="text-sm font-medium text-gray-700">Price Range:</label>
                        <input type="number" id="min-price" name="min_price"
                            class="rounded-md border-0 py-1.5 px-3 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600"
                            placeholder="Min" value="{{ request('min_price') }}" />
                        <span class="text-gray-500">-</span>
                        <input type="number" id="max-price" name="max_price"
                            class="rounded-md border-0 py-1.5 px-3 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600"
                            placeholder="Max" value="{{ request('max_price') }}" />
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="flex justify-center items-center">
        <div class="font-sans w-full max-w-5xl">
            @foreach ($spaTotal as $spa)
                <div class="container mx-auto py-6 grid grid-cols-7 gap-6">
                    <div class="col-span-5 bg-white rounded-lg shadow-2xl p-14">
                        <div class="flex">
                            <div class="flex items-center border-b border-gray-500 pb-2">
                                <div class="w-16 h-16 rounded-full bg-gray-200 mr-6 overflow-hidden">
                                    <img src="{{ asset($spa->image) }}" alt="spa"
                                        class="object-cover w-full h-full">
                                </div>
                                <div>
                                    <h2 class="text-2xl font-bold">{{ $spa->nama }}</h2>
                                    <p class="text-gray-500 text-lg">Relaxation</p>
                                    <p class="text-gray-500 text-lg">16 years experience overall</p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-6">
                            <p class="text-gray-500 text-lg">Alamat: {{ $spa->alamat }}</p>
                            <p class="text-gray-500 text-lg">No. HP: {{ $spa->noHP }}</p>
                        </div>
                        <div class="mt-6">
                            <p class="text-gray-500 text-lg">Harga: Rp {{ number_format($spa->harga, 0, ',', '.') }}
                            </p>
                        </div>
                        <div class="mt-6 flex justify-start">
                            <button
                                class="scheduleBtn bg-orange-500 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded">
                                Schedule
                            </button>
                        </div>

                        <!-- Available -->
                        <div class="scheduleInfo mt-10 hidden">
                            <h3 class="text-xl font-bold mb-4">Waktu Buka</h3>
                            <div class="grid grid-cols-3 gap-4">
                                @foreach (['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'] as $hari)
                                    @if(isset($spa->waktuBuka[$hari]) && !empty($spa->waktuBuka[$hari]))
                                        <div class="text-center bg-gray-50 p-3 rounded-lg">
                                            <p class="text-lg font-semibold text-gray-700">{{ $hari }}</p>
                                            <p class="text-md text-gray-500">{{ $spa->waktuBuka[$hari] }}</p>
                                        </div>
                                    @else
                                        <div class="text-center bg-gray-50 p-3 rounded-lg">
                                            <p class="text-lg font-semibold text-gray-700">{{ $hari }}</p>
                                            <p class="text-md text-gray-500">Tutup</p>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-span-2">
                        <h2 class="text-2xl font-bold mb-6">Lokasi Maps</h2>
                        @if($spa->maps)
                            <iframe
                                src="{{ $spa->maps }}"
                                width="100%" height="400" style="border: none" allowFullScreen="" loading="lazy"
                                referrerPolicy="no-referrer-when-downgrade"></iframe>
                        @else
                            <p>Tidak ada peta tersedia untuk lokasi ini.</p>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    @include('layouts.footer')
</x-app-layout>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const scheduleBtns = document.querySelectorAll('.scheduleBtn');

        scheduleBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                const scheduleInfo = this.closest('.col-span-5').querySelector('.scheduleInfo');
                scheduleInfo.classList.toggle('hidden');

                if (scheduleInfo.classList.contains('hidden')) {
                    this.textContent = 'Schedule';
                } else {
                    this.textContent = 'Close Schedule';
                }
            });
        });

        // Cek status pencarian
        const searchStatus = '{{ session('search_status') }}';
        const searchQuery = '{{ session('search_query') }}';

        if (searchStatus === 'success') {
            Swal.fire({
                title: 'Spa Ditemukan!',
                text: `Hasil pencarian untuk ${searchQuery}`,
                icon: 'success',
                confirmButtonText: 'OK'
            });
        } else if (searchStatus === 'not_found') {
            Swal.fire({
                title: 'Spa Tidak Ditemukan',
                text: `Tidak ada hasil untuk pencarian dengan kriteria: ${searchQuery}`,
                icon: 'error',
                confirmButtonText: 'OK'
            });
        }
    });
</script>
