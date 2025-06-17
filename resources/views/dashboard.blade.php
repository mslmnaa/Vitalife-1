<x-app-layout>
   
        
    {{-- Hero Section - Enhanced with Animations --}}
       <div class="bg-gradient-to-r from-blue-50 to-blue-100 py-12 md:py-20 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 animate-fade-in-up">
            <div class="flex flex-col md:flex-row items-center justify-between gap-8 md:gap-12">
                <div class="w-full md:w-1/2 space-y-6">
                    <div class="inline-block px-4 py-1.5 bg-blue-100 rounded-full border border-blue-200 animate-pulse">
                        <p class="text-sm md:text-base font-medium text-blue-700">
                            Skip the Travel! Consult Onlinee
                        </p>
                    </div>
                    
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-900 leading-tight animate-fade-in">
                        Welcome to <span class="text-blue-500 animate-text-gradient">Vitalife</span>
                    </h1>
                    
                    <div class="h-16 md:h-20">
                        <p class="text-xl md:text-2xl text-gray-700">
                            <span id="typed-text"></span>
                            <span class="typed-cursor animate-blink">|</span>
                        </p>
                    </div>
                    
                    <div class="flex flex-wrap gap-4">
                        <button id="consultNowBtn" class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg shadow-lg transform transition duration-300 hover:scale-105 flex items-center gap-2 group animate-bounce-subtle">
                            <span>Consult Now</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transform transition-transform group-hover:translate-x-1" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        
                        <a href="#features" class="px-6 py-3 bg-white hover:bg-gray-50 text-blue-600 font-medium rounded-lg shadow border border-blue-100 transition duration-300 hover:shadow-md">
                            Learn More
                        </a>
                    </div>
                </div>
                
                <div class="w-full md:w-1/2 relative ">
                    <div class="absolute -top-10 -right-10 w-40 h-40 bg-yellow-200 rounded-full opacity-30 filter blur-xl animate-blob"></div>
                    <div class="absolute -bottom-10 -left-10 w-40 h-40 bg-blue-300 rounded-full opacity-30 filter blur-xl animate-blob animation-delay-2000"></div>
                    
                    <img class="w-[500px] h-[300px] object-contain transform transition-all duration-500 hover:scale-105" src="../image/dokterawal.png" alt="Vitalife Healthcare" />
                </div>
            </div>
        </div>
    </div>

    <div id="medicines" class="py-16 bg-white reveal">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12 animate-fade-in">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900">Medicines & Healthcare</h2>
                <p class="mt-4 text-xl text-gray-600 max-w-3xl mx-auto">Quality medicines and healthcare products for your health and well-being</p>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-red-50 rounded-xl p-6 shadow-md hover:shadow-xl transition-all duration-300 border border-red-100 transform hover:-translate-y-2 hover:bg-red-100/50 animate-fade-in-up animation-delay-100">
                    <div class="bg-red-100 w-16 h-16 rounded-full flex items-center justify-center mb-6 animate-pulse">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Prescription Medicines</h3>
                    <p class="text-gray-600 mb-6">Get your prescribed medications with proper consultation and guidance.</p>
                    <a href="/prescription" class="text-red-600 font-medium flex items-center group">
                        <span>Browse Medicines</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 transform transition-transform group-hover:translate-x-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
                
                <div class="bg-blue-50 rounded-xl p-6 shadow-md hover:shadow-xl transition-all duration-300 border border-blue-100 transform hover:-translate-y-2 hover:bg-blue-100/50 animate-fade-in-up animation-delay-200">
                    <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mb-6 animate-pulse">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Health Supplements</h3>
                    <p class="text-gray-600 mb-6">Boost your health with quality vitamins and nutritional supplements.</p>
                    <a href="/supplements" class="text-blue-600 font-medium flex items-center group">
                        <span>View Supplements</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 transform transition-transform group-hover:translate-x-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
                
                <div class="bg-emerald-50 rounded-xl p-6 shadow-md hover:shadow-xl transition-all duration-300 border border-emerald-100 transform hover:-translate-y-2 hover:bg-emerald-100/50 animate-fade-in-up animation-delay-300">
                    <div class="bg-emerald-100 w-16 h-16 rounded-full flex items-center justify-center mb-6 animate-pulse">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">First Aid & Care</h3>
                    <p class="text-gray-600 mb-6">Essential first aid supplies and healthcare products for everyday needs.</p>
                    <a href="/firstaid" class="text-emerald-600 font-medium flex items-center group">
                        <span>Shop Now</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 transform transition-transform group-hover:translate-x-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div id="spesialis" class="py-16 bg-gray-50 reveal">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12 animate-fade-in">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900">Specialization</h2>
                <p class="mt-4 text-xl text-gray-600 max-w-3xl mx-auto">Consult your health issues with the best specialists in their fields</p>
            </div>
            
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-6">
                @php
                    $specializations = [
                        ['id' => 'anatomy', 'name' => 'Anatomy', 'image' => '../image/anatomy.png', 'color' => 'blue'],
                        ['id' => 'primaryCare', 'name' => 'Primary Care', 'image' => '../image/care.png', 'color' => 'green'],
                        ['id' => 'cardiology', 'name' => 'Cardiology', 'image' => '../image/cardiology.png', 'color' => 'red'],
                        ['id' => 'skinGenitals', 'name' => 'Skin & Genitals', 'image' => '../image/skin.png', 'color' => 'yellow'],
                        ['id' => 'humanSenses', 'name' => 'Human Senses', 'image' => '../image/human.png', 'color' => 'purple'],
                        ['id' => 'piscologist', 'name' => 'Psychology', 'image' => '../image/psico.png', 'color' => 'indigo'],
                        ['id' => 'fisioterapy', 'name' => 'Physiotherapy', 'image' => '../image/fisio.png', 'color' => 'pink'],
                        ['id' => 'pregnancy', 'name' => 'Pregnancy', 'image' => '../image/preg.png', 'color' => 'teal']
                    ];
                @endphp
                
                @foreach($specializations as $index => $spec)
                    <a href="{{ route('spesialisFilter') }}?spesialisasi={{ $spec['name'] }}" 
                       class="group bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 animate-fade-in-up" 
                       style="animation-delay: {{ $index * 100 }}ms">
                        <div class="p-6 flex flex-col items-center text-center">
                            <div class="bg-{{ $spec['color'] }}-100 w-16 h-16 rounded-full flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300 animate-pulse">
                                <img src="{{ $spec['image'] }}" alt="{{ $spec['name'] }}" class="h-8 w-8" />
                            </div>
                            <h3 class="font-bold text-gray-900">{{ $spec['name'] }}</h3>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Voucher Section - Enhanced Carousel with 3D Effects --}}
    <section id="voucher" class="py-16 bg-white reveal">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12 animate-fade-in">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900">Special Promotions</h2>
                <p class="mt-4 text-xl text-gray-600 max-w-3xl mx-auto">Get exclusive offers and discounts for your healthcare services</p>
            </div>
            
            <div class="relative" x-data="imageSlider()">
                <div class="absolute inset-y-0 left-0 z-10 flex items-center">
                    <button @click="prevSlide()" class="bg-white rounded-full p-2 shadow-lg hover:bg-gray-100 focus:outline-none transform transition-all duration-300 hover:scale-110">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                </div>
                
                <div id="imageSlider" class="overflow-hidden">
                    <div class="flex transition-transform duration-500 ease-in-out" x-bind:style="{ transform: `translateX(-${currentIndex * (100/3)}%)` }">
                        @foreach ($vouchers as $voucher)
                            <div class="w-1/3 flex-shrink-0 px-3 animate-fade-in" style="animation-delay: {{ $loop->index * 100 }}ms">
                                <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 cursor-pointer transform hover:-translate-y-1 hover:rotate-1"
                                     onclick="openPopup('{{ asset($voucher->image) }}', '{{ $voucher->description }}', '{{ $voucher->code }}')">
                                    <img class="w-full h-48 object-cover" src="{{ asset($voucher->image) }}" alt="{{ $voucher->description }}" />
                                    <div class="p-4">
                                        <div class="inline-block px-2 py-1 bg-blue-100 rounded-full text-xs text-blue-700 font-medium mb-2">VOUCHER</div>
                                        <h3 class="font-bold text-gray-900 mb-1 truncate">{{ $voucher->code }}</h3>
                                        <p class="text-gray-600 text-sm line-clamp-2">{{ $voucher->description }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                
                <div class="absolute inset-y-0 right-0 z-10 flex items-center">
                    <button @click="nextSlide()" class="bg-white rounded-full p-2 shadow-lg hover:bg-gray-100 focus:outline-none transform transition-all duration-300 hover:scale-110">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>
                
                <div class="flex justify-center mt-6 space-x-2">
                    <template x-for="(slide, index) in [...Array(totalSlides).keys()]" :key="index">
                        <button 
                            @click="currentIndex = index" 
                            :class="{'bg-blue-600': currentIndex === index, 'bg-blue-200': currentIndex !== index}"
                            class="w-3 h-3 rounded-full transition-colors duration-300">
                        </button>
                    </template>
                </div>
            </div>
        </div>
    </section>

    <!-- Popup - Enhanced with Animations -->
    <div id="popup" class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm hidden flex items-center justify-center z-50">
        <div class="bg-white p-8 rounded-2xl max-w-lg w-full mx-4 max-h-[90vh] overflow-y-auto relative shadow-2xl animate-scale-up">
            <button onclick="closePopup()" class="absolute top-4 right-4 text-gray-500 hover:text-gray-800 bg-white rounded-full p-1 shadow-md transition-transform hover:scale-110">
                <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm7.707-3.707a1 1 0 0 0-1.414 1.414L10.586 12l-2.293 2.293a1 1 0 1 0 1.414 1.414L12 13.414l2.293 2.293a1 1 0 0 0 1.414-1.414L13.414 12l2.293-2.293a1 1 0 0 0-1.414-1.414L12 10.586 9.707 8.293Z" clip-rule="evenodd" />
                </svg>
            </button>
            
            <div class="flex flex-col items-center">
                <div class="inline-block px-3 py-1 bg-blue-100 rounded-full text-sm text-blue-700 font-medium mb-4 animate-bounce-subtle">SPECIAL VOUCHER</div>
                <img id="popupImage" src="/placeholder.svg" alt="" class="w-full rounded-xl mb-6 shadow-md animate-fade-in">
                
                <div class="w-full">
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Voucher Details</h3>
                    <p id="popupDescription" class="text-gray-700 mb-6"></p>
                    
                    <div class="border-2 border-dashed border-blue-300 rounded-lg p-4 bg-blue-50 mb-6 animate-pulse">
                        <div class="flex flex-col items-center">
                            <p class="text-sm text-gray-600 mb-1">Voucher Code</p>
                            <p id="voucherCode" class="font-bold text-xl text-blue-700"></p>
                        </div>
                    </div>
                    
                    <button id="copyVoucherBtn" class="w-full py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg shadow transition duration-300 flex items-center justify-center gap-2 transform hover:scale-105">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M8 2a1 1 0 000 2h2a1 1 0 100-2H8z" />
                            <path d="M3 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v6h-4.586l1.293-1.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L10.414 13H15v3a2 2 0 01-2 2H5a2 2 0 01-2-2V5zM15 11h2a1 1 0 110 2h-2v-2z" />
                        </svg>
                        <span>Copy Code</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- Statistics Section - Enhanced with Animated Counters --}}
    <section class="py-16 bg-gradient-to-b from-blue-50 to-white reveal">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row justify-between items-start gap-12">
                <div class="lg:w-1/2 animate-fade-in-left">
                    <div class="inline-block px-4 py-1.5 bg-blue-100 rounded-full text-sm text-blue-700 font-medium mb-4">
                        ABOUT US
                    </div>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">Keeping You and Your Family Healthy</h2>
                    <p class="text-gray-600 text-lg mb-8">
                        We work with you to develop a tailored care plan, including chronic disease management. If we cannot help, we can provide referrals or advice on the type of practitioner you need. We treat all inquiries with sensitivity and strict confidentiality.
                    </p>
                    <a href="#" class="inline-flex items-center gap-2 px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg shadow transition duration-300 transform hover:scale-105 group">
                        <span>Learn More</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transform transition-transform group-hover:translate-x-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
                
                <div class="lg:w-1/2 grid grid-cols-2 gap-6 animate-fade-in-right">
                    <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 hover:rotate-1">
                        <div class="bg-red-100 w-14 h-14 rounded-full flex items-center justify-center mb-4 animate-pulse">
                            <svg class="w-7 h-7 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                        </div>
                        <h3 id="counter1" class="text-4xl font-bold text-gray-900 mb-2" data-target="15000">0</h3>
                        <p class="text-gray-600">Satisfied Patients</p>
                    </div>
                    
                    <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 hover:rotate-1 mt-8">
                        <div class="bg-blue-100 w-14 h-14 rounded-full flex items-center justify-center mb-4 animate-pulse">
                            <svg class="w-7 h-7 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        </div>
                        <h3 id="counter2" class="text-4xl font-bold text-gray-900 mb-2" data-target="120">0</h3>
                        <p class="text-gray-600">Hospitals</p>
                    </div>
                    
                    <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 hover:rotate-1">
                        <div class="bg-yellow-100 w-14 h-14 rounded-full flex items-center justify-center mb-4 animate-pulse">
                            <svg class="w-7 h-7 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21l-7-5-7 5V5a2 2 0 012-2h10a2 2 0 012 2z"></path>
                            </svg>
                        </div>
                        <h3 id="counter3" class="text-4xl font-bold text-gray-900 mb-2" data-target="85">0</h3>
                        <p class="text-gray-600">Laboratories</p>
                    </div>
                    
                    <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 hover:rotate-1 mt-8">
                        <div class="bg-green-100 w-14 h-14 rounded-full flex items-center justify-center mb-4 animate-pulse">
                            <svg class="w-7 h-7 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <h3 id="counter4" class="text-4xl font-bold text-gray-900 mb-2" data-target="320">0</h3>
                        <p class="text-gray-600">Expert Doctors</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- {{-- Testimonial Section - Enhanced with Animations --}}
    <section class="py-16 bg-white reveal">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12 animate-fade-in">
                <div class="inline-block px-4 py-1.5 bg-blue-100 rounded-full text-sm text-blue-700 font-medium mb-4">
                    TESTIMONIALS
                </div>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900">What They Say?</h2>
                <p class="mt-4 text-xl text-gray-600 max-w-3xl mx-auto">Experiences from patients who have used Vitalife services</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-gray-50 p-6 rounded-xl shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 animate-fade-in-up animation-delay-100">
                    <div class="flex items-center mb-4">
                        <div class="flex text-yellow-400">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118l-2.8-2.034c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118l-2.8-2.034c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118l-2.8-2.034c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118l-2.8-2.034c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118l-2.8-2.034c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-6">"Online consultation with doctors at Vitalife has been very helpful for me with my busy schedule. The doctors are professional and the solutions provided are right on target."</p>
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mr-4 animate-pulse">
                            <span class="text-blue-600 font-bold">AS</span>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900">Andy Smith</h4>
                            <p class="text-gray-600 text-sm">Jakarta</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-gray-50 p-6 rounded-xl shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 animate-fade-in-up animation-delay-200">
                    <div class="flex items-center mb-4">
                        <div class="flex text-yellow-400">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118l-2.8-2.034c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118l-2.8-2.034c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118l-2.8-2.034c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118l-2.8-2.034c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118l-2.8-2.034c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-6">"I regularly attend online yoga sessions from Vitalife. The instructors are very experienced and I feel the benefits for my physical and mental health."</p>
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mr-4 animate-pulse">
                            <span class="text-green-600 font-bold">DP</span>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900">Diana Parker</h4>
                            <p class="text-gray-600 text-sm">Bandung</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-gray-50 p-6 rounded-xl shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 animate-fade-in-up animation-delay-300">
                    <div class="flex items-center mb-4">
                        <div class="flex text-yellow-400">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118l-2.8-2.034c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118l-2.8-2.034c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118l-2.8-2.034c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118l-2.8-2.034c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118l-2.8-2.034c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-6">"Physiotherapy services from Vitalife have been very helpful in recovering from my knee injury. The therapists are very professional and provide exercise programs tailored to my condition."</p>
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center mr-4 animate-pulse">
                            <span class="text-purple-600 font-bold">BP</span>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900">Brian Peterson</h4>
                            <p class="text-gray-600 text-sm">Surabaya</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    {{-- CTA Section - Enhanced with Gradient and Animation --}}
    <section class="py-16 bg-gradient-to-r from-blue-600 to-blue-700 reveal">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row items-center justify-between gap-8">
                <div class="md:w-2/3 animate-fade-in-left">
                    <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Start Your Health Journey Now</h2>
                    <p class="text-blue-100 text-lg">Consult your health issues with the best specialists anytime, anywhere.</p>
                </div>
                <div class="md:w-1/3 flex justify-center md:justify-end animate-fade-in-right">
                    <a href="#spesialis" class="px-8 py-4 bg-white hover:bg-gray-100 text-blue-600 font-medium rounded-lg shadow-lg transform transition duration-300 hover:scale-105 text-center animate-pulse">
                        Find a Specialist
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- Add CSS for custom animations --}}
    <style>
        /* Fade in animation */
        .animate-fade-in {
            animation: fadeIn 1s ease-in-out;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        /* Fade in up animation */
        .animate-fade-in-up {
            animation: fadeInUp 1s ease-in-out;
        }
        
        @keyframes fadeInUp {
            from { 
                opacity: 0;
                transform: translateY(20px);
            }
            to { 
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        /* Fade in left animation */
        .animate-fade-in-left {
            animation: fadeInLeft 1s ease-in-out;
        }
        
        @keyframes fadeInLeft {
            from { 
                opacity: 0;
                transform: translateX(-20px);
            }
            to { 
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        /* Fade in right animation */
        .animate-fade-in-right {
            animation: fadeInRight 1s ease-in-out;
        }
        
        @keyframes fadeInRight {
            from { 
                opacity: 0;
                transform: translateX(20px);
            }
            to { 
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        /* Float animation */
        .animate-float {
            animation: float 6s ease-in-out infinite;
        }
        
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }
        
        /* Blob animation */
        .animate-blob {
            animation: blob 7s infinite;
        }
        
        @keyframes blob {
            0% { transform: scale(1); }
            33% { transform: scale(1.1); }
            66% { transform: scale(0.9); }
            100% { transform: scale(1); }
        }
        
        /* Subtle bounce animation */
        .animate-bounce-subtle {
            animation: bounceSlight 2s infinite;
        }
        
        @keyframes bounceSlight {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-5px); }
        }
        
        /* Scale up animation */
        .animate-scale-up {
            animation: scaleUp 0.3s ease-in-out;
        }
        
        @keyframes scaleUp {
            from { transform: scale(0.8); opacity: 0; }
            to { transform: scale(1); opacity: 1; }
        }
        
        /* Text gradient animation */
        .animate-text-gradient {
            background: linear-gradient(90deg, #3b82f6, #60a5fa, #3b82f6);
            background-size: 200% auto;
            color: transparent;
            -webkit-background-clip: text;
            background-clip: text;
            animation: textGradient 3s linear infinite;
        }
        
        @keyframes textGradient {
            to { background-position: 200% center; }
        }
        
        /* Animation delays */
        .animation-delay-100 {
            animation-delay: 100ms;
        }
        
        .animation-delay-200 {
            animation-delay: 200ms;
        }
        
        .animation-delay-300 {
            animation-delay: 300ms;
        }
        
        .animation-delay-2000 {
            animation-delay: 2s;
        }
        
        /* Reveal animation for sections */
        .reveal {
            opacity: 0;
            transform: translateY(30px);
            transition: all 1s ease;
        }
        
        .reveal.active {
            opacity: 1;
            transform: translateY(0);
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Typed text animation
            const typedTextElement = document.getElementById('typed-text');
            const texts = [
                "Your health is our priority",
                "Expert healthcare at your fingertips",
                "Consult with specialists online",
                "Wellness for the whole family"
            ];
            let textIndex = 0;
            let charIndex = 0;
            let isDeleting = false;
            let typingSpeed = 100;

            function typeText() {
                const currentText = texts[textIndex];
                
                if (isDeleting) {
                    typedTextElement.textContent = currentText.substring(0, charIndex - 1);
                    charIndex--;
                    typingSpeed = 50;
                } else {
                    typedTextElement.textContent = currentText.substring(0, charIndex + 1);
                    charIndex++;
                    typingSpeed = 100;
                }
                
                if (!isDeleting && charIndex === currentText.length) {
                    isDeleting = true;
                    typingSpeed = 1500; // Pause at end
                } else if (isDeleting && charIndex === 0) {
                    isDeleting = false;
                    textIndex = (textIndex + 1) % texts.length;
                    typingSpeed = 500; // Pause before typing next
                }
                
                setTimeout(typeText, typingSpeed);
            }
            
            typeText();
            
            // Scroll to specialists section
            const consultNowBtn = document.getElementById('consultNowBtn');
            const spesialisSection = document.getElementById('spesialis');

            consultNowBtn.addEventListener('click', function(e) {
                e.preventDefault();
                spesialisSection.scrollIntoView({
                    behavior: 'smooth'
                });
            });
            
            // Reveal animations on scroll
            function revealOnScroll() {
                const reveals = document.querySelectorAll('.reveal');
                
                reveals.forEach(element => {
                    const windowHeight = window.innerHeight;
                    const elementTop = element.getBoundingClientRect().top;
                    const elementVisible = 150;
                    
                    if (elementTop < windowHeight - elementVisible) {
                        element.classList.add('active');
                    }
                });
            }
            
            window.addEventListener('scroll', revealOnScroll);
            revealOnScroll(); // Initial check
            
            // Counter animation
            function animateCounters() {
                const counters = document.querySelectorAll('[id^="counter"]');
                const speed = 200;
                
                counters.forEach(counter => {
                    const target = parseInt(counter.getAttribute('data-target'));
                    const increment = Math.ceil(target / speed);
                    let count = 0;
                    
                    const updateCount = () => {
                        if (count < target) {
                            count += increment;
                            if (count > target) count = target;
                            counter.innerText = count.toLocaleString();
                            setTimeout(updateCount, 30);
                        }
                    };
                    
                    // Start counter when element is in view
                    const observer = new IntersectionObserver((entries) => {
                        entries.forEach(entry => {
                            if (entry.isIntersecting) {
                                updateCount();
                                observer.unobserve(entry.target);
                            }
                        });
                    }, { threshold: 0.5 });
                    
                    observer.observe(counter);
                });
            }
            
            animateCounters();
        });

        // Popup functions
        function openPopup(imageSrc, description, voucherCode) {
            const popup = document.getElementById('popup');
            const popupImage = document.getElementById('popupImage');
            const popupDescription = document.getElementById('popupDescription');
            const voucherCodeElement = document.getElementById('voucherCode');

            popupImage.src = imageSrc;
            popupDescription.textContent = description;
            voucherCodeElement.textContent = voucherCode;
            popup.classList.remove('hidden');
        }

        function closePopup() {
            const popup = document.getElementById('popup');
            popup.classList.add('hidden');
        }

        // Copy voucher code
        document.addEventListener('DOMContentLoaded', function() {
            const copyVoucherBtn = document.getElementById('copyVoucherBtn');
            if (copyVoucherBtn) {
                copyVoucherBtn.addEventListener('click', function() {
                    const voucherCode = document.getElementById('voucherCode').textContent;
                    navigator.clipboard.writeText(voucherCode).then(() => {
                        const originalText = copyVoucherBtn.innerHTML;
                        copyVoucherBtn.innerHTML = '<span>Copied!</span>';
                        setTimeout(() => {
                            copyVoucherBtn.innerHTML = originalText;
                        }, 2000);
                    });
                });
            }
        });

        // Image slider function
        function imageSlider() {
            return {
                currentIndex: 0,
                totalSlides: 3,
                nextSlide() {
                    if (this.currentIndex === this.totalSlides - 1) {
                        this.currentIndex = 0;
                    } else {
                        this.currentIndex++;
                    }
                },
                prevSlide() {
                    if (this.currentIndex === 0) {
                        this.currentIndex = this.totalSlides - 1;
                    } else {
                        this.currentIndex--;
                    }
                },
                startSlider() {
                    this.interval = setInterval(() => this.nextSlide(), 5000);
                },
                init() {
                    this.startSlider();
                }
            }
        }
        
        // Smooth page transitions
        document.addEventListener('click', function(e) {
            const target = e.target.closest('a');
            if (target &&
                !target.getAttribute('download') &&
                target.href &&
                !target.href.startsWith('#') &&
                !e.ctrlKey &&
                !e.metaKey &&
                target.hostname === window.location.hostname) {

                e.preventDefault();
                setTimeout(() => {
                    window.location = target.href;
                }, 300);
            }
        });

        // Handle URL parameters for scrolling
        document.addEventListener('DOMContentLoaded', function() {
            const urlParams = new URLSearchParams(window.location.search);
            const scroll = urlParams.get('scroll');
            if (scroll === 'voucher') {
                const voucherSection = document.getElementById('voucher');
                if (voucherSection) {
                    voucherSection.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            }
        });
    </script>
    @include('layouts.footer')


</x-app-layout>
