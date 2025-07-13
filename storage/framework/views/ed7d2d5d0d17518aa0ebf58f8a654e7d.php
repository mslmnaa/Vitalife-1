<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>



   
<div class="relative min-h-screen bg-gradient-to-br from-gray-50 via-white to-gray-100 overflow-hidden">
    
    <div class="absolute inset-0">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width=" 60" height="60" viewBox="0 0 60 60"
            xmlns="http://www.w3.org/2000/svg" %3E%3Cg fill="none" fill-rule="evenodd" %3E%3Cg fill="%23000000"
            fill-opacity="0.03" %3E%3Cpath
            d="M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z"
            /%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] animate-pulse"></div>
    </div>

    
    <div
        class="absolute top-0 -left-4 w-96 h-96 bg-gradient-to-br from-blue-100 to-indigo-200 rounded-full mix-blend-multiply filter blur-2xl opacity-30 animate-blob">
    </div>
    <div
        class="absolute top-0 -right-4 w-96 h-96 bg-gradient-to-br from-purple-100 to-pink-200 rounded-full mix-blend-multiply filter blur-2xl opacity-30 animate-blob animation-delay-2000">
    </div>
    <div
        class="absolute -bottom-8 left-20 w-96 h-96 bg-gradient-to-br from-green-100 to-cyan-200 rounded-full mix-blend-multiply filter blur-2xl opacity-30 animate-blob animation-delay-4000">
    </div>

    
    <div class="absolute inset-0 opacity-5">
        <div class="absolute top-20 left-20 w-6 h-6 text-gray-400">
            <svg fill="currentColor" viewBox="0 0 24 24">
                <path
                    d="M12 2C13.1 2 14 2.9 14 4V10H20C21.1 10 22 10.9 22 12S21.1 14 20 14H14V20C14 21.1 13.1 22 12 22S10 21.1 10 20V14H4C2.9 14 2 13.1 2 12S2.9 10 4 10H10V4C10 2.9 10.9 2 12 2Z" />
            </svg>
        </div>
        <div class="absolute top-40 right-32 w-4 h-4 text-gray-400 animate-pulse">
            <svg fill="currentColor" viewBox="0 0 24 24">
                <path
                    d="M12 2C13.1 2 14 2.9 14 4V10H20C21.1 10 22 10.9 22 12S21.1 14 20 14H14V20C14 21.1 13.1 22 12 22S10 21.1 10 20V14H4C2.9 14 2 13.1 2 12S2.9 10 4 10H10V4C10 2.9 10.9 2 12 2Z" />
            </svg>
        </div>
        <div class="absolute bottom-32 left-1/3 w-5 h-5 text-gray-400 animate-pulse animation-delay-1000">
            <svg fill="currentColor" viewBox="0 0 24 24">
                <path
                    d="M12 2C13.1 2 14 2.9 14 4V10H20C21.1 10 22 10.9 22 12S21.1 14 20 14H14V20C14 21.1 13.1 22 12 22S10 21.1 10 20V14H4C2.9 14 2 13.1 2 12S2.9 10 4 10H10V4C10 2.9 10.9 2 12 2Z" />
            </svg>
        </div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center min-h-screen">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center w-full py-20">
            
            <div class="space-y-10 text-center lg:text-left">
                
                <div
                    class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-emerald-50 to-green-50 backdrop-blur-sm rounded-full border border-emerald-200 shadow-sm animate-fade-in-up">
                    <div class="w-3 h-3 bg-emerald-500 rounded-full animate-pulse mr-3"></div>
                    <p class="text-sm font-semibold text-emerald-700">
                        🏥 Health Tourism • Yogyakarta Readyy
                    </p>
                </div>

                
                <div class="space-y-6 animate-fade-in-up animation-delay-200">
                    <h1 class="text-6xl lg:text-8xl font-black leading-tight tracking-tight">
                        <span class="text-gray-900 drop-shadow-sm">Vitalife</span>
                        <br>
                    </h1>

                    <div class="h-24 lg:h-28 flex items-center">
                        <div class="text-2xl lg:text-3xl text-gray-600 font-light">
                            <span class="inline-block">✨</span>
                            <span id="typed-text" class="font-medium text-gray-800 ml-2"></span>
                            <span class="typed-cursor animate-pulse text-blue-500 text-4xl">|</span>
                        </div>
                    </div>
                </div>

                
                <div class="space-y-4 animate-fade-in-up animation-delay-400">
                    <p class="text-xl text-gray-600 max-w-2xl mx-auto lg:mx-0 leading-relaxed font-light">
                        Experience world-class healthcare in Yogyakarta. Connect with specialist doctors, find
                        trusted pharmacies, and get AI-powered health assistance - all in one platform designed for
                        health tourists.
                    </p>

                    
                    <div class="flex flex-wrap gap-4 justify-center lg:justify-start text-sm">
                        <div
                            class="flex items-center gap-2 px-4 py-2 bg-gray-100 rounded-full border border-gray-200 shadow-sm">
                            <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="text-gray-700 font-medium">Specialist Doctors</span>
                        </div>
                        <div
                            class="flex items-center gap-2 px-4 py-2 bg-gray-100 rounded-full border border-gray-200 shadow-sm">
                            <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="text-gray-700 font-medium">Real-time Chat</span>
                        </div>
                        <div
                            class="flex items-center gap-2 px-4 py-2 bg-gray-100 rounded-full border border-gray-200 shadow-sm">
                            <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="text-gray-700 font-medium">AI Health Assistant</span>
                        </div>
                    </div>
                </div>

                
                <div
                    class="flex flex-col sm:flex-row gap-6 justify-center lg:justify-start animate-fade-in-up animation-delay-600">
                    <a href="<?php echo e(route('spesialis')); ?>"
                        class="group relative px-10 py-5 bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:from-blue-600 hover:via-blue-700 hover:to-blue-800 text-white font-bold rounded-2xl shadow-xl transform transition-all duration-500 hover:scale-110 hover:shadow-blue-500/30 overflow-hidden block text-center">

                        <div
                            class="absolute inset-0 bg-gradient-to-r from-white/0 via-white/20 to-white/0 -skew-x-12 -translate-x-full group-hover:translate-x-full transition-transform duration-1000">
                        </div>

                        <div class="relative flex items-center justify-center gap-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                            </svg>
                            <span class="text-lg">Consult Specialist Now</span>
                            <svg class="w-6 h-6 transform transition-transform group-hover:translate-x-2"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </div>
                    </a>

                    <a href="<?php echo e(route('pharmacies.index')); ?>"
                        class="group px-10 py-5 bg-white hover:bg-gray-50 text-gray-800 font-bold rounded-2xl border-2 border-gray-300 hover:border-gray-400 shadow-lg transition-all duration-500 transform hover:scale-105 flex items-center justify-center gap-4">

                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span class="text-lg">Find Pharmacies</span>
                    </a>

                </div>
            </div>

            
            <div class="relative lg:pl-8 animate-fade-in-right animation-delay-400">
                
                <div class="grid grid-cols-2 gap-6">

                    <a href="<?php echo e(route('spesialis')); ?>">
                        
                        <div
                            class="group relative bg-white backdrop-blur-sm rounded-3xl p-6 border border-gray-200 hover:border-blue-300 shadow-lg hover:shadow-xl transition-all duration-500 hover:scale-105">
                            <div
                                class="absolute inset-0 bg-gradient-to-br from-blue-50 to-indigo-50 rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                            </div>
                            <div class="relative">
                                <div
                                    class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mb-4 shadow-lg">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                                <h3 class="text-xl font-bold text-gray-800 mb-2">Specialist Doctors</h3>
                                <p class="text-gray-600 text-sm leading-relaxed">Chat with certified specialists</p>
                            </div>
                        </div>
                    </a>

                    
                    <div
                        class="group relative bg-white backdrop-blur-sm rounded-3xl p-6 border border-gray-200 hover:border-purple-300 shadow-lg hover:shadow-xl transition-all duration-500 hover:scale-105">
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-purple-50 to-pink-50 rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                        </div>
                        <div class="relative">
                            <div
                                class="w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-500 rounded-2xl flex items-center justify-center mb-4 shadow-lg">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 mb-2">AI Health Assistant</h3>
                            <p class="text-gray-600 text-sm leading-relaxed">Get instant health guidance powered by
                                AI</p>
                        </div>
                    </div>

                    <a href="<?php echo e(route('pharmacies.index')); ?>">
                        
                        <div
                            class="group relative bg-white backdrop-blur-sm rounded-3xl p-6 border border-gray-200 hover:border-green-300 shadow-lg hover:shadow-xl transition-all duration-500 hover:scale-105">
                            <div
                                class="absolute inset-0 bg-gradient-to-br from-green-50 to-emerald-50 rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                            </div>
                            <div class="relative">
                                <div
                                    class="w-16 h-16 bg-gradient-to-br from-green-500 to-emerald-500 rounded-2xl flex items-center justify-center mb-4 shadow-lg">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </div>
                                <h3 class="text-xl font-bold text-gray-800 mb-2">Nearby Pharmacies</h3>
                                <p class="text-gray-600 text-sm leading-relaxed">Find partner pharmacies around
                                    Yogyakarta</p>
                            </div>
                        </div>
                    </a>

                    
                    <div
                        class="group relative bg-white backdrop-blur-sm rounded-3xl p-6 border border-gray-200 hover:border-yellow-300 shadow-lg hover:shadow-xl transition-all duration-500 hover:scale-105">
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-yellow-50 to-orange-50 rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                        </div>
                        <div class="relative">
                            <div
                                class="w-16 h-16 bg-gradient-to-br from-yellow-500 to-orange-500 rounded-2xl flex items-center justify-center mb-4 shadow-lg">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192L5.636 18.364M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 mb-2">24/7 Support</h3>
                            <p class="text-gray-600 text-sm leading-relaxed">Round-the-clock customer service
                                support</p>
                        </div>
                    </div>
                </div>

                
                <div class="mt-8 text-center">
                    <div
                        class="inline-flex items-center gap-3 px-6 py-3 bg-gradient-to-r from-emerald-50 to-green-50 backdrop-blur-sm rounded-full border border-emerald-200 shadow-sm">
                        <svg class="w-6 h-6 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                        <span class="text-emerald-700 font-semibold">Trusted Healthcare Partner in Yogyakarta</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    

    <div id="services" class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12 animate-fade-in">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900">Medicines & Pharmacy Services</h2>
                <p class="mt-4 text-xl text-gray-600 max-w-3xl mx-auto">Find quality medicines and trusted pharmacies
                    for your healthcare needs</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Medicines Section -->
                <div
                    class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-500 border border-blue-200 transform hover:-translate-y-3 hover:scale-105 animate-fade-in-up animation-delay-100">
                    <div
                        class="bg-blue-500 w-20 h-20 rounded-full flex items-center justify-center mb-6 mx-auto animate-pulse shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                        </svg>
                    </div>

                    <div class="text-center">
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Browse Medicines</h3>
                        <p class="text-gray-700 mb-6 leading-relaxed">Discover a comprehensive collection of
                            prescription and over-the-counter medicines. Find detailed information, prices, and
                            availability.</p>

                        <div class="flex flex-wrap justify-center gap-2 mb-6">
                            <span
                                class="bg-blue-200 text-blue-800 px-3 py-1 rounded-full text-sm font-medium">Prescription</span>
                            <span
                                class="bg-blue-200 text-blue-800 px-3 py-1 rounded-full text-sm font-medium">Over-the-Counter</span>
                            <span
                                class="bg-blue-200 text-blue-800 px-3 py-1 rounded-full text-sm font-medium">Supplements</span>
                        </div>

                        <a href="<?php echo e(route('user.medicines.index')); ?>"
                            class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white font-semibold px-8 py-3 rounded-full transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl group">
                            <span>Explore Medicines</span>
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5 ml-2 transform transition-transform group-hover:translate-x-2"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Pharmacy Section -->
                <div
                    class="bg-gradient-to-br from-emerald-50 to-emerald-100 rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-500 border border-emerald-200 transform hover:-translate-y-3 hover:scale-105 animate-fade-in-up animation-delay-200">
                    <div
                        class="bg-emerald-500 w-20 h-20 rounded-full flex items-center justify-center mb-6 mx-auto animate-pulse shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-4m-5 0H3m0 0h2M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>

                    <div class="text-center">
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Find Pharmacies</h3>
                        <p class="text-gray-700 mb-6 leading-relaxed">Locate trusted pharmacies near you. Check medicine
                            availability, contact information, and get directions to the nearest pharmacy.</p>

                        <div class="flex flex-wrap justify-center gap-2 mb-6">
                            <span
                                class="bg-emerald-200 text-emerald-800 px-3 py-1 rounded-full text-sm font-medium">Nearby</span>
                            <span
                                class="bg-emerald-200 text-emerald-800 px-3 py-1 rounded-full text-sm font-medium">24/7
                                Service</span>
                            <span
                                class="bg-emerald-200 text-emerald-800 px-3 py-1 rounded-full text-sm font-medium">Medicine
                                Check</span>
                        </div>

                        <a href="<?php echo e(route('pharmacies.index')); ?>"
                            class="inline-flex items-center bg-emerald-600 hover:bg-emerald-700 text-white font-semibold px-8 py-3 rounded-full transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl group">
                            <span>Find Pharmacies</span>
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5 ml-2 transform transition-transform group-hover:translate-x-2"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Quick Features -->
            <div class="mt-12 grid grid-cols-1 md:grid-cols-3 gap-6 animate-fade-in-up animation-delay-300">
                <div class="text-center p-6 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors duration-300">
                    <div class="bg-purple-100 w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <h4 class="font-semibold text-gray-900 mb-2">Medicine Search</h4>
                    <p class="text-sm text-gray-600">Quickly find any medicine with our advanced search feature</p>
                </div>

                <div class="text-center p-6 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors duration-300">
                    <div class="bg-orange-100 w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-orange-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <h4 class="font-semibold text-gray-900 mb-2">Location Finder</h4>
                    <p class="text-sm text-gray-600">Find the nearest pharmacy with real-time location services</p>
                </div>

                <div class="text-center p-6 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors duration-300">
                    <div class="bg-teal-100 w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-teal-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                        </svg>
                    </div>
                    <h4 class="font-semibold text-gray-900 mb-2">Direct Contact</h4>
                    <p class="text-sm text-gray-600">Contact pharmacies directly via WhatsApp for inquiries</p>
                </div>
            </div>
        </div>
    </div>

    <div id="spesialis" class="py-16 bg-gray-50 ">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12 animate-fade-in">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900">Specialization</h2>
                <p class="mt-4 text-xl text-gray-600 max-w-3xl mx-auto">Consult your health issues with the best
                    specialists in their fields</p>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-6">
                <?php
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
                ?>

                <?php $__currentLoopData = $specializations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $spec): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route('spesialisFilter')); ?>?spesialisasi=<?php echo e($spec['name']); ?>"
                        class="group bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 animate-fade-in-up"
                        style="animation-delay: <?php echo e($index * 100); ?>ms">
                        <div class="p-6 flex flex-col items-center text-center">
                            <div
                                class="bg-<?php echo e($spec['color']); ?>-100 w-16 h-16 rounded-full flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300 animate-pulse">
                                <img src="<?php echo e($spec['image']); ?>" alt="<?php echo e($spec['name']); ?>" class="h-8 w-8" />
                            </div>
                            <h3 class="font-bold text-gray-900"><?php echo e($spec['name']); ?></h3>
                        </div>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>

    
    <section id="voucher" class="py-16 bg-white ">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12 animate-fade-in">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900">Special Promotions</h2>
                <p class="mt-4 text-xl text-gray-600 max-w-3xl mx-auto">Get exclusive offers and discounts for your
                    healthcare services</p>
            </div>

            <div class="relative" x-data="imageSlider()">
                <div class="absolute inset-y-0 left-0 z-10 flex items-center">
                    <button @click="prevSlide()"
                        class="bg-white rounded-full p-2 shadow-lg hover:bg-gray-100 focus:outline-none transform transition-all duration-300 hover:scale-110">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                </div>

                <div id="imageSlider" class="overflow-hidden">
                    <div class="flex transition-transform duration-500 ease-in-out"
                        x-bind:style="{ transform: `translateX(-${currentIndex * (100/3)}%)` }">
                        <?php $__currentLoopData = $vouchers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $voucher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="w-1/3 flex-shrink-0 px-3 animate-fade-in"
                                style="animation-delay: <?php echo e($loop->index * 100); ?>ms">
                                <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 cursor-pointer transform hover:-translate-y-1 hover:rotate-1"
                                    onclick="openPopup('<?php echo e(asset($voucher->image)); ?>', '<?php echo e($voucher->description); ?>', '<?php echo e($voucher->code); ?>')">
                                    <img class="w-full h-48 object-cover" src="<?php echo e(asset($voucher->image)); ?>"
                                        alt="<?php echo e($voucher->description); ?>" />
                                    <div class="p-4">
                                        <div
                                            class="inline-block px-2 py-1 bg-blue-100 rounded-full text-xs text-blue-700 font-medium mb-2">
                                            VOUCHER</div>
                                        <h3 class="font-bold text-gray-900 mb-1 truncate"><?php echo e($voucher->code); ?></h3>
                                        <p class="text-gray-600 text-sm line-clamp-2"><?php echo e($voucher->description); ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>

                <div class="absolute inset-y-0 right-0 z-10 flex items-center">
                    <button @click="nextSlide()"
                        class="bg-white rounded-full p-2 shadow-lg hover:bg-gray-100 focus:outline-none transform transition-all duration-300 hover:scale-110">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>

                
            </div>
        </div>
    </section>

    <!-- Popup - Enhanced with Animations -->
    <div id="popup"
        class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm hidden flex items-center justify-center z-50">
        <div
            class="bg-white p-8 rounded-2xl max-w-lg w-full mx-4 max-h-[90vh] overflow-y-auto relative shadow-2xl animate-scale-up">
            <button onclick="closePopup()"
                class="absolute top-4 right-4 text-gray-500 hover:text-gray-800 bg-white rounded-full p-1 shadow-md transition-transform hover:scale-110">
                <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd"
                        d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm7.707-3.707a1 1 0 0 0-1.414 1.414L10.586 12l-2.293 2.293a1 1 0 1 0 1.414 1.414L12 13.414l2.293 2.293a1 1 0 0 0 1.414-1.414L13.414 12l2.293-2.293a1 1 0 0 0-1.414-1.414L12 10.586 9.707 8.293Z"
                        clip-rule="evenodd" />
                </svg>
            </button>

            <div class="flex flex-col items-center">
                <div
                    class="inline-block px-3 py-1 bg-blue-100 rounded-full text-sm text-blue-700 font-medium mb-4 animate-bounce-subtle">
                    SPECIAL VOUCHER</div>
                <img id="popupImage" src="/placeholder.svg" alt=""
                    class="w-full rounded-xl mb-6 shadow-md animate-fade-in">

                <div class="w-full">
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Voucher Details</h3>
                    <p id="popupDescription" class="text-gray-700 mb-6"></p>

                    <div class="border-2 border-dashed border-blue-300 rounded-lg p-4 bg-blue-50 mb-6 animate-pulse">
                        <div class="flex flex-col items-center">
                            <p class="text-sm text-gray-600 mb-1">Voucher Code</p>
                            <p id="voucherCode" class="font-bold text-xl text-blue-700"></p>
                        </div>
                    </div>

                    <button id="copyVoucherBtn"
                        class="w-full py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg shadow transition duration-300 flex items-center justify-center gap-2 transform hover:scale-105">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M8 2a1 1 0 000 2h2a1 1 0 100-2H8z" />
                            <path
                                d="M3 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v6h-4.586l1.293-1.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L10.414 13H15v3a2 2 0 01-2 2H5a2 2 0 01-2-2V5zM15 11h2a1 1 0 110 2h-2v-2z" />
                        </svg>
                        <span>Copy Code</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    
    <section class="py-16 bg-gradient-to-b from-blue-50 to-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row justify-between items-start gap-12">
                <div class="lg:w-1/2 animate-fade-in-left">
                    <div
                        class="inline-block px-4 py-1.5 bg-blue-100 rounded-full text-sm text-blue-700 font-medium mb-4">
                        ABOUT US
                    </div>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">Keeping You and Your Family Healthy
                    </h2>
                    <p class="text-gray-600 text-lg mb-8">
                        We work with you to develop a tailored care plan, including chronic disease management. If we
                        cannot help, we can provide referrals or advice on the type of practitioner you need. We treat
                        all inquiries with sensitivity and strict confidentiality.
                    </p>
                    <a href="#"
                        class="inline-flex items-center gap-2 px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg shadow transition duration-300 transform hover:scale-105 group">
                        <span>Learn More</span>
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5 transform transition-transform group-hover:translate-x-1" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>

                <div class="lg:w-1/2 grid grid-cols-2 gap-6 animate-fade-in-right">
                    <div
                        class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 hover:rotate-1">
                        <div
                            class="bg-red-100 w-14 h-14 rounded-full flex items-center justify-center mb-4 animate-pulse">
                            <svg class="w-7 h-7 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                                </path>
                            </svg>
                        </div>
                        <h3 id="counter1" class="text-4xl font-bold text-gray-900 mb-2" data-target="15000">0</h3>
                        <p class="text-gray-600">Satisfied Patients</p>
                    </div>

                    <div
                        class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 hover:rotate-1 mt-8">
                        <div
                            class="bg-blue-100 w-14 h-14 rounded-full flex items-center justify-center mb-4 animate-pulse">
                            <svg class="w-7 h-7 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                </path>
                            </svg>
                        </div>
                        <h3 id="counter2" class="text-4xl font-bold text-gray-900 mb-2" data-target="120">0</h3>
                        <p class="text-gray-600">Hospitals</p>
                    </div>

                    <div
                        class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 hover:rotate-1">
                        <div
                            class="bg-yellow-100 w-14 h-14 rounded-full flex items-center justify-center mb-4 animate-pulse">
                            <svg class="w-7 h-7 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21l-7-5-7 5V5a2 2 0 012-2h10a2 2 0 012 2z"></path>
                            </svg>
                        </div>
                        <h3 id="counter3" class="text-4xl font-bold text-gray-900 mb-2" data-target="85">0</h3>
                        <p class="text-gray-600">Laboratories</p>
                    </div>

                    <div
                        class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 hover:rotate-1 mt-8">
                        <div
                            class="bg-green-100 w-14 h-14 rounded-full flex items-center justify-center mb-4 animate-pulse">
                            <svg class="w-7 h-7 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <h3 id="counter4" class="text-4xl font-bold text-gray-900 mb-2" data-target="320">0</h3>
                        <p class="text-gray-600">Expert Doctors</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

  

    
    <style>
        @keyframes blob {
            0% {
                transform: translate(0px, 0px) scale(1);
            }

            33% {
                transform: translate(30px, -50px) scale(1.1);
            }

            66% {
                transform: translate(-20px, 20px) scale(0.9);
            }

            100% {
                transform: translate(0px, 0px) scale(1);
            }
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        @keyframes gradient-x {

            0%,
            100% {
                background-size: 200% 200%;
                background-position: left center;
            }

            50% {
                background-size: 200% 200%;
                background-position: right center;
            }
        }

        @keyframes fade-in-up {
            from {
                opacity: 0;
                transform: translateY(50px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fade-in-right {
            from {
                opacity: 0;
                transform: translateX(50px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .animate-blob {
            animation: blob 7s infinite;
        }

        .animate-float {
            animation: float 6s ease-in-out infinite;
        }

        .animate-gradient-x {
            animation: gradient-x 3s ease infinite;
        }

        .animate-fade-in-up {
            animation: fade-in-up 1s ease-out forwards;
        }

        .animate-fade-in-right {
            animation: fade-in-right 1s ease-out forwards;
        }

        .animation-delay-200 {
            animation-delay: 0.2s;
        }

        .animation-delay-400 {
            animation-delay: 0.4s;
        }

        .animation-delay-600 {
            animation-delay: 0.6s;
        }

        .animation-delay-800 {
            animation-delay: 0.8s;
        }

        .animation-delay-1000 {
            animation-delay: 1s;
        }

        .animation-delay-2000 {
            animation-delay: 2s;
        }

        .animation-delay-4000 {
            animation-delay: 4s;
        }

        /* Typewriter Effect */
        .typed-cursor {
            animation: blink 1s infinite;
        }

        @keyframes blink {

            0%,
            50% {
                opacity: 1;
            }

            51%,
            100% {
                opacity: 0;
            }
        }




        /* Fade in animation */
        .animate-fade-in {
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
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
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }

            100% {
                transform: translateY(0px);
            }
        }

        /* Blob animation */
        .animate-blob {
            animation: blob 7s infinite;
        }

        @keyframes blob {
            0% {
                transform: scale(1);
            }

            33% {
                transform: scale(1.1);
            }

            66% {
                transform: scale(0.9);
            }

            100% {
                transform: scale(1);
            }
        }

        /* Subtle bounce animation */
        .animate-bounce-subtle {
            animation: bounceSlight 2s infinite;
        }

        @keyframes bounceSlight {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-5px);
            }
        }

        /* Scale up animation */
        .animate-scale-up {
            animation: scaleUp 0.3s ease-in-out;
        }

        @keyframes scaleUp {
            from {
                transform: scale(0.8);
                opacity: 0;
            }

            to {
                transform: scale(1);
                opacity: 1;
            }
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
            to {
                background-position: 200% center;
            }
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
        document.addEventListener('DOMContentLoaded', function () {
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

            consultNowBtn.addEventListener('click', function (e) {
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
        document.addEventListener('DOMContentLoaded', function () {
            const copyVoucherBtn = document.getElementById('copyVoucherBtn');
            if (copyVoucherBtn) {
                copyVoucherBtn.addEventListener('click', function () {
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
        document.addEventListener('click', function (e) {
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
        document.addEventListener('DOMContentLoaded', function () {
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
    <?php echo $__env->make('layouts.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>


 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH D:\Coding\Project 4 matklul\Vitalife-1\resources\views/dashboard.blade.php ENDPATH**/ ?>