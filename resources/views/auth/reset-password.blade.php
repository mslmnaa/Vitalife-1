<x-guest-layout>
    <style>
        html, body {
            height: 100%;
            width: 100%;
            margin: 0;
            padding: 0;
            background: linear-gradient(to right, #0E1036, #355385);
            overflow-x: hidden;
        }
        
        .main-wrapper {
            min-height: 100vh;
            width: 100vw;
            background: linear-gradient(to right, #0E1036, #355385);
            position: fixed;
            top: 0;
            left: 0;
            z-index: -1;
        }
    </style>
    
    <div class="main-wrapper"></div>
    
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full">
            <div class="bg-white rounded-lg shadow-lg border-0 overflow-hidden" style="box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);">
                <!-- Header -->
                <div class="px-8 py-6">
                    <h2 class="text-2xl font-semibold text-center mb-2" style="color: #0E1036; border-bottom: 2px solid #355385; padding-bottom: 10px;">
                        {{ __('Reset Password') }}
                    </h2>
                    <p class="text-center text-sm mt-4" style="color: #555;">
                        {{ __('Enter your new password below to reset your account password.') }}
                    </p>
                </div>

                <!-- Form content -->
                <div class="px-8 pb-8">
                    <form method="POST" action="{{ route('password.store') }}" class="space-y-5">
                        @csrf

                        <!-- Password Reset Token -->
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                        <!-- Email Address -->
                        <div>
                            <label for="email" class="block mb-2 font-semibold" style="color: #0E1036;">
                                {{ __('Email') }}
                            </label>
                            <x-text-input id="email" 
                                class="w-full px-3 py-2 border-2 rounded focus:outline-none transition-all duration-200" 
                                style="border-color: #355385; font-size: 16px; box-sizing: border-box;"
                                type="email" 
                                name="email" 
                                :value="old('email', $request->email)" 
                                required 
                                autofocus 
                                autocomplete="username" 
                                placeholder="{{ __('Enter your email address') }}" 
                                onfocus="this.style.borderColor='#0E1036'; this.style.boxShadow='0 0 5px rgba(53, 83, 133, 0.5)'"
                                onblur="this.style.borderColor='#355385'; this.style.boxShadow='none'" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" style="color: red; font-size: 12px;" />
                        </div>

                        <!-- Password -->
                        <div>
                            <label for="password" class="block mb-2 font-semibold" style="color: #0E1036;">
                                {{ __('New Password') }}
                            </label>
                            <x-text-input id="password" 
                                class="w-full px-3 py-2 border-2 rounded focus:outline-none transition-all duration-200" 
                                style="border-color: #355385; font-size: 16px; box-sizing: border-box;"
                                type="password" 
                                name="password" 
                                required 
                                autocomplete="new-password" 
                                placeholder="{{ __('Enter your new password') }}" 
                                onfocus="this.style.borderColor='#0E1036'; this.style.boxShadow='0 0 5px rgba(53, 83, 133, 0.5)'"
                                onblur="this.style.borderColor='#355385'; this.style.boxShadow='none'" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" style="color: red; font-size: 12px;" />
                        </div>

                        <!-- Confirm Password -->
                        <div>
                            <label for="password_confirmation" class="block mb-2 font-semibold" style="color: #0E1036;">
                                {{ __('Confirm Password') }}
                            </label>
                            <x-text-input id="password_confirmation" 
                                class="w-full px-3 py-2 border-2 rounded focus:outline-none transition-all duration-200"
                                style="border-color: #355385; font-size: 16px; box-sizing: border-box;"
                                type="password"
                                name="password_confirmation" 
                                required 
                                autocomplete="new-password" 
                                placeholder="{{ __('Confirm your new password') }}" 
                                onfocus="this.style.borderColor='#0E1036'; this.style.boxShadow='0 0 5px rgba(53, 83, 133, 0.5)'"
                                onblur="this.style.borderColor='#355385'; this.style.boxShadow='none'" />
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" style="color: red; font-size: 12px;" />
                        </div>

                        <!-- Submit Button -->
                        <div class="pt-4">
                            <button type="submit" 
                                class="w-full px-5 py-3 text-white font-semibold rounded cursor-pointer border-0 transition-all duration-300"
                                style="background-color: #355385; font-size: 16px;"
                                onmouseover="this.style.backgroundColor='#0E1036'"
                                onmouseout="this.style.backgroundColor='#355385'">
                                {{ __('Reset Password') }}
                            </button>
                        </div>

                        <!-- Additional info -->
                        <div class="text-center pt-4 mt-4" style="border-top: 1px solid #e5e7eb;">
                            <p class="text-sm" style="color: #555;">
                                {{ __('Make sure to use a strong password to keep your account secure.') }}
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="fixed bottom-5 w-full text-center text-white text-xs">
        &copy; {{ date('Y') }} {{ config('app.name', 'Vitalife') }}. All rights reserved.
    </div>
</x-guest-layout>