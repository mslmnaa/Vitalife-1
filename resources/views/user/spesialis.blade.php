<x-app-layout>
    {{-- Hero Section with Search --}}
    <div class="bg-gradient-to-br from-blue-50 via-white to-indigo-50 pt-20 pb-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            {{-- Page Title --}}
            <div class="text-center mb-8">
                <h1 class="text-4xl font-bold text-gray-900 mb-4">Find Medical Specialists</h1>
                <p class="text-lg text-gray-600">Search and book appointments with qualified specialists in your area</p>
            </div>

            {{-- Search Form --}}
            <div class="bg-white rounded-3xl shadow-xl p-8 max-w-5xl mx-auto border border-gray-100">
                <form action="{{ route('spesialis') }}" method="GET" class="space-y-6">
                    {{-- Name Search --}}
                    <div class="relative">
                        <label for="nama" class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-user-md mr-2 text-blue-600"></i>Specialist Name
                        </label>
                        <div class="relative">
                            <input type="text" name="nama" id="nama"
                                class="block w-full rounded-xl border-0 py-4 px-4 pr-12 text-gray-900 ring-1 ring-gray-200 placeholder:text-gray-400 focus:ring-2 focus:ring-blue-500 focus:outline-none transition-all duration-200 text-lg"
                                placeholder="Enter specialist name..." value="{{ request('nama') }}" />
                            <div class="absolute inset-y-0 right-0 flex items-center pr-4">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                    {{-- Price Range --}}
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-end">
                        <div>
                            <label for="min_price" class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-money-bill-wave mr-2 text-green-600"></i>Min Price (Rp)
                            </label>
                            <input type="number" id="min_price" name="min_price"
                                class="block w-full rounded-xl border-0 py-4 px-4 text-gray-900 ring-1 ring-gray-200 placeholder:text-gray-400 focus:ring-2 focus:ring-green-500 focus:outline-none transition-all duration-200"
                                placeholder="0" value="{{ request('min_price') }}" />
                        </div>
                        <div>
                            <label for="max_price" class="block text-sm font-semibold text-gray-700 mb-2">Max Price (Rp)</label>
                            <input type="number" id="max_price" name="max_price"
                                class="block w-full rounded-xl border-0 py-4 px-4 text-gray-900 ring-1 ring-gray-200 placeholder:text-gray-400 focus:ring-2 focus:ring-green-500 focus:outline-none transition-all duration-200"
                                placeholder="999999999" value="{{ request('max_price') }}" />
                        </div>
                        <div>
                            <button type="submit" 
                                class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-semibold rounded-xl py-4 px-8 transition-all duration-200 transform hover:scale-105 shadow-lg hover:shadow-xl flex items-center justify-center">
                                <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                </svg>
                                Search Specialists
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Main Content --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
            {{-- Sidebar Filters --}}
            <div class="lg:col-span-1">
                <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden sticky top-24">
                    <div class="bg-gradient-to-r from-blue-600 to-indigo-600 px-6 py-4">
                        <h2 class="font-bold text-lg text-white flex items-center">
                            <i class="fas fa-map-marker-alt mr-2"></i>Filter by Location
                        </h2>
                    </div>
                    
                    <form id="locationForm" action="{{ route('spesialis') }}" method="GET" class="p-6">
                        {{-- Hidden inputs for existing search parameters --}}
                        <input type="hidden" name="nama" value="{{ request('nama') }}">
                        <input type="hidden" name="min_price" value="{{ request('min_price') }}">
                        <input type="hidden" name="max_price" value="{{ request('max_price') }}">

                        <div class="space-y-3">
                            @php
                                $locations = [
                                    'Yogyakarta' => 'fas fa-city',
                                    'Sleman' => 'fas fa-mountain',
                                    'Bantul' => 'fas fa-home',
                                    'Kulon Progo' => 'fas fa-tree',
                                    'Gunung Kidul' => 'fas fa-mountain'
                                ];
                            @endphp

                            @foreach($locations as $location => $icon)
                            <label class="flex items-center p-3 rounded-xl hover:bg-gray-50 cursor-pointer transition-all duration-200 group">
                                <input type="radio" name="location" value="{{ $location }}" 
                                    class="sr-only" onchange="this.form.submit()"
                                    {{ request('location') == $location ? 'checked' : '' }}>
                                <div class="flex items-center w-full">
                                    <i class="{{ $icon }} mr-3 text-blue-600 group-hover:text-indigo-600 transition-colors duration-200"></i>
                                    <span class="text-gray-700 font-medium group-hover:text-gray-900 flex-grow">{{ $location }}</span>
                                    <div class="w-4 h-4 border-2 border-gray-300 rounded-full flex items-center justify-center group-hover:border-blue-500 transition-colors duration-200">
                                        @if(request('location') == $location)
                                        <div class="w-2 h-2 bg-blue-600 rounded-full"></div>
                                        @endif
                                    </div>
                                </div>
                            </label>
                            @endforeach
                        </div>
                    </form>
                </div>
            </div>

            {{-- Specialists List --}}
            <div class="lg:col-span-3">
                {{-- Results Header --}}
                <div class="flex items-center justify-between mb-8">
                    <div>
                        <h2 class="text-3xl font-bold text-gray-900">Available Specialists</h2>
                        <p class="text-gray-600 mt-1">{{ count($spesLihat) }} specialists found</p>
                    </div>
                </div>

                {{-- Specialists Cards --}}
                <div class="space-y-6">
                    @forelse ($spesLihat as $spesialis)
                    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                        <div class="p-8">
                            <div class="flex flex-col lg:flex-row items-start space-y-6 lg:space-y-0 lg:space-x-8">
                                {{-- Profile Image --}}
                                <div class="flex-shrink-0">
                                    <div class="w-32 h-32 rounded-2xl bg-gradient-to-br from-blue-100 to-indigo-100 overflow-hidden ring-4 ring-white shadow-lg">
                                        <img src="{{ asset($spesialis->image) }}" alt="{{ $spesialis->nama }}" 
                                            class="w-full h-full object-cover">
                                    </div>
                                </div>

                                {{-- Specialist Info --}}
                                <div class="flex-grow min-w-0">
                                    <div class="mb-4">
                                        <h3 class="text-2xl font-bold text-gray-900 mb-2">{{ $spesialis->nama }}</h3>
                                        <div class="flex flex-wrap gap-2 mb-3">
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                                                <i class="fas fa-stethoscope mr-1"></i>{{ $spesialis->Anatomy }}
                                            </span>
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-indigo-100 text-indigo-800">
                                                <i class="fas fa-user-md mr-1"></i>{{ $spesialis->spesialisasi }}
                                            </span>
                                        </div>
                                    </div>
                                    
                                    <div class="space-y-2 text-gray-600">
                                        <div class="flex items-center">
                                            <i class="fas fa-hospital-alt w-5 text-gray-400 mr-3"></i>
                                            <span class="font-medium">{{ $spesialis->tempatTugas }}</span>
                                        </div>
                                        <div class="flex items-center">
                                            <i class="fas fa-map-marker-alt w-5 text-gray-400 mr-3"></i>
                                            <span>{{ $spesialis->alamat }}</span>
                                        </div>
                                    </div>
                                </div>

                                {{-- Price and Action --}}
                                <div class="flex-shrink-0 text-center lg:text-right">
                                    <div class="mb-6">
                                        <div class="text-3xl font-bold text-gray-900 mb-1">
                                            Rp {{ number_format($spesialis->harga, 0, ',', '.') }}
                                        </div>
                                        <div class="text-sm text-gray-500">per consultation</div>
                                    </div>
                                    
                                    @if(auth()->check())
                                        <a href="{{ route('spesialis.bayar', ['id_spesialis' => $spesialis->id_spesialis]) }}"
                                            class="inline-flex items-center justify-center w-full lg:w-auto px-8 py-4 bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 text-white font-semibold rounded-xl transition-all duration-200 transform hover:scale-105 shadow-lg hover:shadow-xl">
                                            <i class="fas fa-credit-card mr-2"></i>
                                            Book & Pay Now
                                        </a>
                                    @else
                                        <a href="{{ route('login') }}"
                                            class="inline-flex items-center justify-center w-full lg:w-auto px-8 py-4 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-semibold rounded-xl transition-all duration-200 transform hover:scale-105 shadow-lg hover:shadow-xl">
                                            <i class="fas fa-sign-in-alt mr-2"></i>
                                            Login to Book
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="text-center py-16">
                        <div class="w-24 h-24 mx-auto mb-6 bg-gray-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-search text-3xl text-gray-400"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">No specialists found</h3>
                        <p class="text-gray-600">Try adjusting your search criteria or filters</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footer')

    {{-- Add Font Awesome for icons --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</x-app-layout>