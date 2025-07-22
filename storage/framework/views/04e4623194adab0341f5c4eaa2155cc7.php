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
    <!-- Hero Section -->
    <section class="bg-gradient-to-br from-blue-50 to-teal-50 py-16 md:py-24">
        <div class="container mx-auto px-4 max-w-7xl">
            <div class="bg-white/80 backdrop-blur-sm rounded-3xl shadow-xl p-8 md:p-12">
                <!-- Logo Section -->
                <div class="flex justify-center mb-8">
                    <div class="relative w-48 h-48 md:w-64 md:h-64 rounded-full overflow-hidden shadow-2xl">
                        <img src="../image/logovitalife.png" alt="Vitalife Logo" 
                             class="w-full h-full object-cover">
                    </div>
                </div>
                
                <!-- Title -->
                <h1 class="text-4xl md:text-6xl font-bold text-center mb-8 bg-gradient-to-r from-blue-600 to-teal-600 bg-clip-text text-transparent">
                    What is Vitalife?
                </h1>

                <!-- Description -->
                <div class="max-w-4xl mx-auto text-center">
                    <p class="text-lg md:text-xl text-gray-700 leading-relaxed mb-8">
                        Vitalife is an innovative health consultation application focused on connecting users with specialist doctors. 
                        This platform offers consultation recommendations and pharmacy locations throughout the Yogyakarta area. 
                        Vitalife bridges the gap between users and healthcare specialists for comprehensive health consultations, 
                        both before and after travel activities, ensuring user safety and physical readiness. 
                        Features include easy and transparent online reservations, complete facility information, 
                        and an interactive AI-powered chatbot for enhanced user experience.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- App Preview Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4 max-w-7xl">
            <div class="relative rounded-2xl overflow-hidden shadow-2xl">
                <img src="../image/webvitalife.png" alt="Vitalife Application Preview" 
                     class="w-full h-auto object-cover">
            </div>
        </div>
    </section>

    <!-- Color Palette Section -->
    <section class="py-16 bg-gradient-to-br from-gray-50 to-blue-50">
        <div class="container mx-auto px-4 max-w-7xl">
            <h2 class="text-4xl font-bold text-center mb-12 text-gray-800">Brand Color Palette</h2>
            
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 max-w-5xl mx-auto">
                <div class="bg-white rounded-2xl shadow-lg p-6 text-center hover:shadow-xl transition-shadow duration-300">
                    <div class="w-full h-24 rounded-xl mb-4 overflow-hidden">
                        <img src="../image/custom1.png" alt="Color 1" class="w-full h-full object-cover">
                    </div>
                    <p class="font-mono text-sm font-semibold text-gray-700">#DCF0ED</p>
                    <p class="text-xs text-gray-500 mt-1">Light Mint</p>
                </div>
                
                <div class="bg-white rounded-2xl shadow-lg p-6 text-center hover:shadow-xl transition-shadow duration-300">
                    <div class="w-full h-24 rounded-xl mb-4 overflow-hidden">
                        <img src="../image/custom2.png" alt="Color 2" class="w-full h-full object-cover">
                    </div>
                    <p class="font-mono text-sm font-semibold text-gray-700">#80C8DC</p>
                    <p class="text-xs text-gray-500 mt-1">Sky Blue</p>
                </div>
                
                <div class="bg-white rounded-2xl shadow-lg p-6 text-center hover:shadow-xl transition-shadow duration-300">
                    <div class="w-full h-24 rounded-xl mb-4 overflow-hidden">
                        <img src="../image/custom3.png" alt="Color 3" class="w-full h-full object-cover">
                    </div>
                    <p class="font-mono text-sm font-semibold text-gray-700">#355385</p>
                    <p class="text-xs text-gray-500 mt-1">Navy Blue</p>
                </div>
                
                <div class="bg-white rounded-2xl shadow-lg p-6 text-center hover:shadow-xl transition-shadow duration-300">
                    <div class="w-full h-24 rounded-xl mb-4 overflow-hidden">
                        <img src="../image/custom4.png" alt="Color 4" class="w-full h-full object-cover">
                    </div>
                    <p class="font-mono text-sm font-semibold text-gray-700">#0E1036</p>
                    <p class="text-xs text-gray-500 mt-1">Deep Navy</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Philosophy Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4 max-w-7xl">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-4xl font-bold text-center mb-12 text-gray-800">Our Philosophy</h2>
                
                <div class="bg-gradient-to-r from-blue-50 to-teal-50 rounded-3xl p-8 md:p-12">
                    <p class="text-lg md:text-xl text-gray-700 leading-relaxed mb-8">
                        <span class="font-bold text-blue-600">Vitalife</span> embodies the perfect harmony between fitness, wellness, and enriching travel experiences. 
                        Our platform combines essential elements to create an active and balanced lifestyle:
                    </p>

                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="space-y-4">
                            <div class="flex items-start space-x-3">
                                <div class="w-8 h-8 rounded-full bg-blue-600 flex items-center justify-center text-white font-bold text-sm">1</div>
                                <p class="text-gray-700">Vitality as the foundation of holistic health</p>
                            </div>
                            <div class="flex items-start space-x-3">
                                <div class="w-8 h-8 rounded-full bg-blue-600 flex items-center justify-center text-white font-bold text-sm">2</div>
                                <p class="text-gray-700">Mindful wellness to balance work and relaxation</p>
                            </div>
                            <div class="flex items-start space-x-3">
                                <div class="w-8 h-8 rounded-full bg-blue-600 flex items-center justify-center text-white font-bold text-sm">3</div>
                                <p class="text-gray-700">Healthcare tourism that inspires and broadens horizons</p>
                            </div>
                            <div class="flex items-start space-x-3">
                                <div class="w-8 h-8 rounded-full bg-blue-600 flex items-center justify-center text-white font-bold text-sm">4</div>
                                <p class="text-gray-700">Activities that foster physical and mental growth</p>
                            </div>
                        </div>
                        
                        <div class="space-y-4">
                            <div class="flex items-start space-x-3">
                                <div class="w-8 h-8 rounded-full bg-teal-600 flex items-center justify-center text-white font-bold text-sm">5</div>
                                <p class="text-gray-700">Lifestyle supporting long-term well-being</p>
                            </div>
                            <div class="flex items-start space-x-3">
                                <div class="w-8 h-8 rounded-full bg-teal-600 flex items-center justify-center text-white font-bold text-sm">6</div>
                                <p class="text-gray-700">Invigoration to renew spirit and energy</p>
                            </div>
                            <div class="flex items-start space-x-3">
                                <div class="w-8 h-8 rounded-full bg-teal-600 flex items-center justify-center text-white font-bold text-sm">7</div>
                                <p class="text-gray-700">Fitness as the key to better quality of life</p>
                            </div>
                            <div class="flex items-start space-x-3">
                                <div class="w-8 h-8 rounded-full bg-teal-600 flex items-center justify-center text-white font-bold text-sm">8</div>
                                <p class="text-gray-700">Community events for shared wellness interests</p>
                            </div>
                        </div>
                    </div>

                    <p class="text-lg text-gray-700 mt-8 text-center">
                        This philosophy reflects <span class="font-bold text-blue-600">Vitalife</span>'s commitment to integrating health, 
                        wellness, and adventure into a comprehensive platform, supporting each individual's journey toward a healthier 
                        and more fulfilling life.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Color Meaning Section -->
    <section class="py-16 bg-gradient-to-br from-gray-900 to-blue-900 text-white">
        <div class="container mx-auto px-4 max-w-7xl">
            <h2 class="text-4xl font-bold text-center mb-12">Color Psychology</h2>
            
            <div class="grid gap-8 max-w-5xl mx-auto">
                <!-- Dark Blue -->
                <div class="bg-gradient-to-r from-blue-900 to-blue-800 rounded-2xl p-8 shadow-xl">
                    <h3 class="text-2xl font-bold mb-6 text-blue-200">Dark Blue (#355385, #0E1036)</h3>
                    <div class="grid md:grid-cols-3 gap-4">
                        <div class="flex items-center space-x-3">
                            <div class="w-2 h-2 bg-blue-300 rounded-full"></div>
                            <p>Symbolizes trust, professionalism, and stability</p>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div class="w-2 h-2 bg-blue-300 rounded-full"></div>
                            <p>Represents deep healthcare expertise and knowledge</p>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div class="w-2 h-2 bg-blue-300 rounded-full"></div>
                            <p>Reflects security and reliability of our services</p>
                        </div>
                    </div>
                </div>

                <!-- Light Blue -->
                <div class="bg-gradient-to-r from-teal-500 to-blue-500 rounded-2xl p-8 shadow-xl">
                    <h3 class="text-2xl font-bold mb-6 text-blue-100">Light Blue (#80C8DC, #DCF0ED)</h3>
                    <div class="grid md:grid-cols-3 gap-4">
                        <div class="flex items-center space-x-3">
                            <div class="w-2 h-2 bg-blue-100 rounded-full"></div>
                            <p>Symbolizes freshness, vitality, and positive energy</p>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div class="w-2 h-2 bg-blue-100 rounded-full"></div>
                            <p>Represents clarity of mind and tranquility</p>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div class="w-2 h-2 bg-blue-100 rounded-full"></div>
                            <p>Illustrates innovation and modern healthcare approach</p>
                        </div>
                    </div>
                </div>

                <!-- Combination -->
                <div class="bg-gradient-to-r from-blue-100 to-teal-100 text-gray-800 rounded-2xl p-8 shadow-xl">
                    <p class="text-lg leading-relaxed">
                        The combination of these colors in the Vitalife brand creates a harmonious impression between 
                        professional healthcare services and refreshing wellness experiences. The gradient from dark blue 
                        to light blue represents the transformative journey our users experience — from seeking health 
                        stability to achieving optimal vitality and wellness.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Logo Elements Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4 max-w-7xl">
            <h2 class="text-4xl font-bold text-center mb-12 text-gray-800">Logo Elements & Meaning</h2>
            
            <div class="space-y-12 max-w-4xl mx-auto">
                <!-- Circle Element -->
                <div class="flex flex-col md:flex-row items-center space-y-6 md:space-y-0 md:space-x-8 bg-gradient-to-r from-blue-50 to-teal-50 rounded-2xl p-8">
                    <div class="flex-shrink-0">
                        <div class="w-32 h-32 rounded-full bg-gradient-to-br from-blue-400 to-teal-400 flex items-center justify-center shadow-xl">
                            <img src="../image/log1.png" alt="Circle Logo Element" class="w-24 h-24 object-contain">
                        </div>
                    </div>
                    <div class="text-center md:text-left">
                        <h3 class="text-2xl font-bold mb-4 text-gray-800">Circle</h3>
                        <ul class="space-y-2 text-gray-700">
                            <li class="flex items-start space-x-2">
                                <span class="w-2 h-2 bg-blue-500 rounded-full mt-2 flex-shrink-0"></span>
                                <span>Symbolizes wholeness, balance, and the continuous cycle of life</span>
                            </li>
                            <li class="flex items-start space-x-2">
                                <span class="w-2 h-2 bg-blue-500 rounded-full mt-2 flex-shrink-0"></span>
                                <span>Represents Vitalife's holistic approach to health and well-being</span>
                            </li>
                            <li class="flex items-start space-x-2">
                                <span class="w-2 h-2 bg-blue-500 rounded-full mt-2 flex-shrink-0"></span>
                                <span>Illustrates community and inclusivity in healthcare tourism</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Human Figures -->
                <div class="flex flex-col md:flex-row items-center space-y-6 md:space-y-0 md:space-x-8 bg-gradient-to-r from-teal-50 to-blue-50 rounded-2xl p-8">
                    <div class="flex-shrink-0">
                        <div class="w-32 h-32 rounded-full bg-gradient-to-br from-teal-400 to-blue-400 flex items-center justify-center shadow-xl">
                            <img src="../image/log2.png" alt="Human Figures Logo Element" class="w-24 h-24 object-contain">
                        </div>
                    </div>
                    <div class="text-center md:text-left">
                        <h3 class="text-2xl font-bold mb-4 text-gray-800">Human Figures</h3>
                        <ul class="space-y-2 text-gray-700">
                            <li class="flex items-start space-x-2">
                                <span class="w-2 h-2 bg-teal-500 rounded-full mt-2 flex-shrink-0"></span>
                                <span>Two dynamic figures with raised arms symbolizing celebration</span>
                            </li>
                            <li class="flex items-start space-x-2">
                                <span class="w-2 h-2 bg-teal-500 rounded-full mt-2 flex-shrink-0"></span>
                                <span>Represents joy and freedom gained from a healthy lifestyle</span>
                            </li>
                            <li class="flex items-start space-x-2">
                                <span class="w-2 h-2 bg-teal-500 rounded-full mt-2 flex-shrink-0"></span>
                                <span>Embodies the human connection in healthcare and wellness</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Leaf Element -->
                <div class="flex flex-col md:flex-row items-center space-y-6 md:space-y-0 md:space-x-8 bg-gradient-to-r from-green-50 to-teal-50 rounded-2xl p-8">
                    <div class="flex-shrink-0">
                        <div class="w-32 h-32 rounded-full bg-gradient-to-br from-green-400 to-teal-400 flex items-center justify-center shadow-xl">
                            <img src="../image/log3.png" alt="Leaf Logo Element" class="w-24 h-24 object-contain">
                        </div>
                    </div>
                    <div class="text-center md:text-left">
                        <h3 class="text-2xl font-bold mb-4 text-gray-800">Leaf Element</h3>
                        <p class="text-gray-700 text-lg">
                            The leaf represents growth, renewal, and sustainability throughout the health journey. 
                            It symbolizes natural healing, environmental consciousness, and the organic progression 
                            toward better health and wellness.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

 <!-- Team Section -->
<section class="py-16 bg-gradient-to-br from-blue-50 to-teal-50">
    <div class="container mx-auto px-4 max-w-7xl">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold mb-4 text-gray-800">Our Expert Team</h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                Meet the talented professionals who contributed to building this innovative healthcare platform
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-8">
            <!-- Team Member 1 - Project Manager -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition-shadow duration-300 group">
                <div class="relative">
                    <img src="../image/team/yunan.jpg" class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                </div>
                <div class="p-6">
                    <h4 class="text-xl font-bold text-gray-800 mb-2">Yunan Singgih</h4>
                    <h6 class="text-blue-600 font-semibold mb-3">Project Manager</h6>
                    <p class="text-gray-600 text-sm mb-4 leading-relaxed justify-center">
                        Leads project planning and execution, coordinates team activities, manages timelines and resources, 
                        and ensures successful delivery of the healthcare platform within scope and budget.
                    </p>
                    <div class="flex justify-center space-x-3">
                        <a href="https://www.instagram.com/oneself_independent?igsh=MXZjdnI5bHlvYXowMg==" target="_blank" 
                           class="p-2 bg-pink-100 hover:bg-pink-200 rounded-full transition-colors">
                            <svg class="w-5 h-5 text-pink-600" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                            </svg>
                        </a>
                        <a href="https://www.linkedin.com/in/yunan-singgih-2416b733b/overlay/about-this-profile/" target="_blank" 
                           class="p-2 bg-blue-100 hover:bg-blue-200 rounded-full transition-colors">
                            <svg class="w-5 h-5 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Team Member 2 - Frontend Developer -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition-shadow duration-300 group">
                <div class="relative">
                    <img src="../image/team/samsul.jpg" class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                </div>
                <div class="p-6">
                    <h4 class="text-xl font-bold text-gray-800 mb-2">Syamsul Amilien</h4>
                    <h6 class="text-blue-600 font-semibold mb-3">Frontend Developer</h6>
                    <p class="text-gray-600 text-sm mb-4 leading-relaxed">
                        Develops user-facing features, creates responsive and interactive interfaces, implements design mockups, 
                        and ensures optimal user experience across different devices and browsers.
                    </p>
                    <div class="flex justify-center space-x-3">
                        <a href="https://www.instagram.com/m.slmnaa" target="_blank" 
                           class="p-2 bg-pink-100 hover:bg-pink-200 rounded-full transition-colors">
                            <svg class="w-5 h-5 text-pink-600" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                            </svg>
                        </a>
                        <a href="https://www.linkedin.com/in/muhammad-salman-alfarisi-466584300/" target="_blank"
                            class="p-2 bg-blue-100 hover:bg-blue-200 rounded-full transition-colors">
                            <svg class="w-5 h-5 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Team Member 3 - Backend Developer -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition-shadow duration-300 group">
                <div class="relative">
                    <img src="../image/team/salman.jpg" alt="salman" class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                </div>
                <div class="p-6">
                    <h4 class="text-xl font-bold text-gray-800 mb-2">Salman Alfarisi</h4>
                    <h6 class="text-blue-600 font-semibold mb-3">Backend Developer</h6>
                    <p class="text-gray-600 text-sm mb-4 leading-relaxed">
                        Builds server-side logic, manages databases, develops APIs, handles data processing, 
                        and ensures secure and efficient backend operations for the healthcare platform.
                    </p>
                    <div class="flex justify-center space-x-3">
                        <a href="https://www.instagram.com/syceliii?igsh=dzRhbWp1ZDI3ZHZ6&utm_source=qr" target="_blank"
                            class="p-2 bg-pink-100 hover:bg-pink-200 rounded-full transition-colors">
                            <svg class="w-5 h-5 text-pink-600" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                            </svg>
                        </a>
                        <a href="http://www.linkedin.com/in/syamsul-amilien-0b132a373" target="_blank"
                            class="p-2 bg-blue-100 hover:bg-blue-200 rounded-full transition-colors">
                            <svg class="w-5 h-5 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Team Member 4 - Quality Assurance -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition-shadow duration-300 group">
                <div class="relative">
                    <img src="../image/team/dayat.jpg" alt="Muh Hidayat" class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                </div>
                <div class="p-6">
                    <h4 class="text-xl font-bold text-gray-800 mb-2">Muh Hidayat</h4>
                    <h6 class="text-blue-600 font-semibold mb-3">Quality Assurance</h6>
                    <p class="text-gray-600 text-sm mb-4 leading-relaxed">
                        Conducts thorough testing of applications, identifies bugs and issues, ensures software quality standards, 
                        and validates that all features work correctly before deployment.
                    </p>
                    <div class="flex justify-center space-x-3">
                        <a href="https://www.instagram.com/dayataa_/" target="_blank"
                            class="p-2 bg-pink-100 hover:bg-pink-200 rounded-full transition-colors">
                            <svg class="w-5 h-5 text-pink-600" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                            </svg>
                        </a>
                        <a href="https://www.linkedin.com/in/muhammad-hidayat-686422373/" target="_blank"
                            class="p-2 bg-blue-100 hover:bg-blue-200 rounded-full transition-colors">
                            <svg class="w-5 h-5 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Team Member 5 - System Analyst -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition-shadow duration-300 group">
                <div class="relative">
                    <img src="../image/team/anin.jpg" alt="Asinin Ahmad" class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                </div>
                <div class="p-6">
                    <h4 class="text-xl font-bold text-gray-800 mb-2">Asinin Ahmad</h4>
                    <h6 class="text-blue-600 font-semibold mb-3">System Analyst</h6>
                    <p class="text-gray-600 text-sm mb-4 leading-relaxed">
                        Analyzes business requirements, designs system architecture, creates technical specifications, 
                        and bridges the gap between business needs and technical implementation.
                    </p>
                    <div class="flex justify-center space-x-3">
                        <a href="https://www.instagram.com/seea_inn?igsh=c2kydXp3NmcxYjJw" target="_blank"
                            class="p-2 bg-pink-100 hover:bg-pink-200 rounded-full transition-colors">
                            <svg class="w-5 h-5 text-pink-600" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.40s-.644-1.44-1.439-1.44z"/>
                            </svg>
                        </a>
                       
                            <a href="http://www.linkedin.com/in/asinin-ahmad-206136302" target="_blank"
                                class="p-2 bg-blue-100 hover:bg-blue-200 rounded-full transition-colors">
                                <svg class="w-5 h-5 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

       <?php echo $__env->make('layouts.footer2', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>

<script>
    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Add scroll animation for team cards
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);

    // Observe team cards for animation
    document.querySelectorAll('.group').forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(card);
    });

    // Add loading animation for images
    document.querySelectorAll('img').forEach(img => {
        img.addEventListener('load', function() {
            this.style.opacity = '1';
        });
        img.style.opacity = '0';
        img.style.transition = 'opacity 0.3s ease';
    });
</script>
<?php /**PATH D:\Coding\Project 4 matklul\Vitalife-1\resources\views/user/aboutUs.blade.php ENDPATH**/ ?>