<section class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden">
    <!-- Header with gradient background -->
    <div class="bg-gradient-to-r from-blue-600 to-purple-600 px-6 py-4">
        <div class="flex items-center space-x-3">
            <div class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
            </div>
            <div>
                <h2 class="text-xl font-semibold text-white">
                    {{ __('Profile Information') }}
                </h2>
                <p class="text-blue-100 text-sm mt-1">
                    {{ __('Update your account\'s profile information.') }}
                </p>
            </div>
        </div>
    </div>

    <!-- Form content -->
    <div class="p-6">
        <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
            @csrf

            <!-- Name field with enhanced styling -->
            <div class="space-y-2">
                <x-input-label for="name" :value="__('Name')" class="text-sm font-medium text-gray-700" />
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <x-text-input id="name" name="name" type="text" 
                        class="pl-10 block w-full rounded-lg border-gray-300 bg-gray-50 text-gray-900 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200" 
                        :value="old('name', $user->name ?? '')" 
                        required autofocus autocomplete="name" />
                </div>
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>

            <!-- Action buttons with improved styling -->
            <div class="flex items-center justify-between pt-6 border-t border-gray-200">
                <div class="flex items-center space-x-4">
                    <button type="submit" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white font-medium rounded-lg shadow-md hover:shadow-lg transform hover:scale-105 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        {{ __('Save Changes') }}
                    </button>
                </div>

                <!-- Success message with enhanced styling -->
                @if (session('status') === 'profile-updated')
                <div x-data="{ show: true }" x-show="show" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform scale-90" x-init="setTimeout(() => show = false, 3000)" class="flex items-center space-x-2 bg-green-50 text-green-700 px-4 py-2 rounded-lg border border-green-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span class="text-sm font-medium">{{ __('Profile updated successfully!') }}</span>
                </div>
                @endif
            </div>
        </form>
    </div>
</section>