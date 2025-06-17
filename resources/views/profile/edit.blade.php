<x-app-layout>
    <div class="py-12">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-6">
                <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100">
                    {{ __('Account Settings') }}
                </h1>
                <p class="text-gray-600 dark:text-gray-400">
                    {{ __('Manage your account settings and preferences.') }}
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
                <!-- Profile Image (Larger on Desktop) -->
                <div class="lg:col-span-8 bg-white white:bg-gray-800 shadow rounded-lg p-6">
                    @include('profile.partials.update-profile-image')
                </div>

                <!-- Other Settings (Stacked on Mobile, Side by Side on Desktop) -->
                <div class="lg:col-span-8 space-y-6">
                    <div class="bg-white white:bg-gray-800 shadow rounded-lg p-6">
                        @include('profile.partials.update-profile-information-form')
                    </div>

                    <div class="bg-white white:bg-gray-800 shadow rounded-lg p-6">
                        @include('profile.partials.update-email-form')
                    </div>

                    <div class="bg-white white:bg-gray-800 shadow rounded-lg p-6">
                        @include('profile.partials.update-password-form')
                    </div>

                    <div class="bg-white white:bg-gray-800 shadow rounded-lg p-6">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>