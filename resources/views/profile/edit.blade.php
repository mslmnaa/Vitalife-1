<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="mb-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 border-b border-gray-200">
                        <h1 class="text-3xl font-bold text-gray-900">
                            {{ __('Account Settings') }}
                        </h1>
                        <p class="mt-2 text-sm text-gray-600">
                            {{ __('Manage your account settings and preferences.') }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Main Content Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Left Column - Main Settings -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- Profile Information -->
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 border-b border-gray-200">
                            <h2 class="text-lg font-semibold text-gray-900">
                                {{ __('Profile Information') }}
                            </h2>
                            <p class="mt-1 text-sm text-gray-600">
                                {{ __('Update your account profile information and email address.') }}
                            </p>
                        </div>
                        <div class="p-6">
                            @include('profile.partials.update-profile-information-form')
                        </div>
                    </div>

                    <!-- Email Settings -->
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 border-b border-gray-200">
                            <h2 class="text-lg font-semibold text-gray-900">
                                {{ __('Email Settings') }}
                            </h2>
                            <p class="mt-1 text-sm text-gray-600">
                                {{ __('Update your email address and notification preferences.') }}
                            </p>
                        </div>
                        <div class="p-6">
                            @include('profile.partials.update-email-form')
                        </div>
                    </div>

                    <!-- Password Security -->
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 border-b border-gray-200">
                            <h2 class="text-lg font-semibold text-gray-900">
                                {{ __('Password & Security') }}
                            </h2>
                            <p class="mt-1 text-sm text-gray-600">
                                {{ __('Ensure your account is using a long, random password to stay secure.') }}
                            </p>
                        </div>
                        <div class="p-6">
                            @include('profile.partials.update-password-form')
                        </div>
                    </div>

                    <!-- Danger Zone -->
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border-red-200">
                        <div class="p-6 border-b border-red-200 bg-red-50">
                            <h2 class="text-lg font-semibold text-red-900">
                                {{ __('Danger Zone') }}
                            </h2>
                            <p class="mt-1 text-sm text-red-600">
                                {{ __('Permanently delete your account and all associated data.') }}
                            </p>
                        </div>
                        <div class="p-6">
                            @include('profile.partials.delete-user-form')
                        </div>
                    </div>
                </div>

                <!-- Right Column - Profile Image & Quick Actions -->
                <div class="lg:col-span-1 space-y-6">
                    <!-- Profile Image -->
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 border-b border-gray-200">
                            <h2 class="text-lg font-semibold text-gray-900">
                                {{ __('Profile Picture') }}
                            </h2>
                            <p class="mt-1 text-sm text-gray-600">
                                {{ __('Update your profile picture.') }}
                            </p>
                        </div>
                        <div class="p-6">
                            @include('profile.partials.update-profile-image')
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 border-b border-gray-200">
                            <h2 class="text-lg font-semibold text-gray-900">
                                {{ __('Quick Actions') }}
                            </h2>
                        </div>
                        <div class="p-6 space-y-4">
                            <button class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition duration-200">
                                {{ __('Download My Data') }}
                            </button>
                            <button class="w-full bg-gray-600 hover:bg-gray-700 text-white font-medium py-2 px-4 rounded-lg transition duration-200">
                                {{ __('Privacy Settings') }}
                            </button>
                            <button class="w-full bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-4 rounded-lg transition duration-200">
                                {{ __('Export Settings') }}
                            </button>
                        </div>
                    </div>

                    <!-- Account Summary -->
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 border-b border-gray-200">
                            <h2 class="text-lg font-semibold text-gray-900">
                                {{ __('Account Summary') }}
                            </h2>
                        </div>
                        <div class="p-6">
                            <div class="space-y-3">
                                <div class="flex justify-between items-center">
                                    <span class="text-sm text-gray-600">{{ __('Member since') }}</span>
                                    <span class="text-sm font-medium text-gray-900">
                                        {{ Auth::user()->created_at->format('M Y') }}
                                    </span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-sm text-gray-600">{{ __('Last login') }}</span>
                                    <span class="text-sm font-medium text-gray-900">
                                        {{ __('Today') }}
                                    </span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-sm text-gray-600">{{ __('Account status') }}</span>
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        {{ __('Active') }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>