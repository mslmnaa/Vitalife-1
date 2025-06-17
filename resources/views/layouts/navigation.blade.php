<nav x-data="{ open: false }"
class="bg-gray-800 dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 rounded-bl-lg rounded-br-lg fixed top-0 left-0 right-0 z-50 shadow-lg">
<!-- Primary Navigation Menu -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between h-16">
        <div class="flex">
            <!-- Logo -->
            <div class="shrink-0 flex items-center">
                <a href="{{ route('dashboard') }}" class="transition duration-150 hover:opacity-90">
                    <x-application-logo1 class="block w-full h-full object-contain" />
                </a>
            </div>
            <!-- Navigation Links -->
            <div class="hidden space-x-7 sm:-my-px sm:mx-10 sm:flex sm:ml-80 justify-between">
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"
                    class="text-white hover:text-blue-300 transition duration-150 ease-in-out {{ request()->routeIs('dashboard') ? 'border-b-2 border-blue-500 text-blue-300' : '' }}">
                    {{ __('Dashboard') }}
                </x-nav-link>
                 <x-nav-link :href="route('pharmacies.index')" :active="request()->routeIs('pharmacies.index    ')"
                    class="text-white hover:text-blue-300 transition duration-150 ease-in-out {{ request()->routeIs('user.vouchers.index') ? 'border-b-2 border-blue-500 text-blue-300' : '' }}">
                    {{ __('Pharmacy') }}
                </x-nav-link>
                <x-nav-link :href="route('user.medicines.index')" :active="request()->routeIs('user.medicines.*')"
                    class="text-white hover:text-blue-300 transition duration-150 ease-in-out {{ request()->routeIs('user.medicines.*') ? 'border-b-2 border-blue-500 text-blue-300' : '' }}">
                    {{ __('Medicines') }}
                </x-nav-link>
                <x-nav-link :href="route('spesialis')" :active="request()->routeIs('spesialis')"
                    class="text-white hover:text-blue-300 transition duration-150 ease-in-out {{ request()->routeIs('spesialis') ? 'border-b-2 border-blue-500 text-blue-300' : '' }}">
                    {{ __('Specialists') }}
                </x-nav-link>
                <x-nav-link :href="route('user.vouchers.index')" :active="request()->routeIs('user.vouchers.index')"
                    class="text-white hover:text-blue-300 transition duration-150 ease-in-out {{ request()->routeIs('user.vouchers.index') ? 'border-b-2 border-blue-500 text-blue-300' : '' }}">
                    {{ __('Vouchers') }}
                </x-nav-link>
                
            </div>
        </div>

        <!-- Settings Dropdown -->
        <div class="hidden sm:flex sm:items-center sm:ms-6 space-x-3">
            @auth
           

            <!-- Chat Icon with Notification -->
            <div class="relative">
                <a href="{{ route('chat.index') }}" class="relative flex items-center p-2 text-white hover:text-blue-300 transition duration-150 ease-in-out">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                    </svg>
                    <span id="unread-count" class="bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center absolute -top-1 -right-1 hidden"></span>
                </a>
            </div>

            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button
                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none transition ease-in-out duration-150"
                        type="button">
                        <div>{{ Auth::user()->name }}</div>

                        <div class="ms-1">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <div class="py-1 rounded-md shadow-lg ring-1 ring-black ring-opacity-5 bg-white dark:bg-gray-800">
                        <x-dropdown-link :href="route('profile.edit')" class="text-gray-700 hover:bg-blue-100 dark:text-gray-300 dark:hover:bg-gray-700">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        @if (auth()->user()->role == 'admin')
                        <x-dropdown-link :href="route('admin.dashboard')" class="text-gray-700 hover:bg-blue-100 dark:text-gray-300 dark:hover:bg-gray-700">
                            {{ __('Admin Dashboard') }}
                        </x-dropdown-link>
                        @endif

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button href="{{ route('logout') }}" 
                                onclick="event.preventDefault(); this.closest('form').submit();" 
                                class="block w-full px-4 py-2 text-start text-sm leading-5 
                                text-gray-700 dark:text-gray-300 hover:bg-gray-100 
                                dark:hover:bg-gray-800 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-800 
                                transition duration-150 ease-in-out cursor-pointer">
                                {{ __('Log Out') }}
                            </button>
                        </form>
                    </div>
                </x-slot>
            </x-dropdown>
            @else
            <a href="{{ route('login') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                {{ __('Login') }}
            </a>
            <a href="{{ route('register') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-blue-600 bg-white hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                {{ __('Register') }}
            </a>
            @endauth
        </div>

        <!-- Hamburger -->
        <div class="-me-2 flex items-center sm:hidden">
            <button @click="open = ! open"
                class="inline-flex items-center justify-center p-2 rounded-md text-white hover:text-blue-200 hover:bg-blue-600 focus:outline-none focus:bg-blue-600 focus:text-white transition duration-150 ease-in-out">
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16" />
                    <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>
</div>

<!-- Responsive Navigation Menu -->
<div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
    <div class="pt-2 pb-3 space-y-1">
        <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
            {{ __('Dashboard') }}
        </x-responsive-nav-link>
        
        <!-- User Medicines Link -->
        <x-responsive-nav-link :href="route('user.medicines.index')" :active="request()->routeIs('user.medicines.*')">
            {{ __('Medicines') }}
        </x-responsive-nav-link>
        
        <x-responsive-nav-link :href="route('spesialis')" :active="request()->routeIs('spesialis')">
            {{ __('Specialists') }}
        </x-responsive-nav-link>

        <x-responsive-nav-link :href="route('user.vouchers.index')" :active="request()->routeIs('user.vouchers.index')">
            {{ __('Vouchers') }}
        </x-responsive-nav-link>
    </div>

    <!-- Responsive Settings Options -->
    @auth
    <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
        <div class="px-4">
            <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
            <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
        </div>

        <div class="mt-3 space-y-1">
            <!-- Cart Link for Mobile -->
           

            <x-responsive-nav-link :href="route('chat.index')">
                {{ __('Messages') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('profile.edit')">
                {{ __('Profile') }}
            </x-responsive-nav-link>

            @if (auth()->user()->role == 'admin')
            <x-responsive-nav-link :href="route('admin.dashboard')">
                {{ __('Admin Dashboard') }}
            </x-responsive-nav-link>
            @endif

            <!-- Authentication -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="block w-full px-4 py-2 text-start text-sm leading-5 
                text-gray-700 dark:text-gray-300 hover:bg-gray-100 
                dark:hover:bg-gray-800 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-800 
                transition duration-150 ease-in-out cursor-pointer">
                    {{ __('Log Out') }}
                </button>
            </form>
        </div>
    </div>
    @else
    <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
        <div class="mt-3 space-y-1">
            <x-responsive-nav-link :href="route('login')">
                {{ __('Login') }}
            </x-responsive-nav-link>
            
            <x-responsive-nav-link :href="route('register')">
                {{ __('Register') }}
            </x-responsive-nav-link>
        </div>
    </div>
    @endauth
</div>

<!-- Add this JavaScript at the end of the file -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        @auth
        // Fetch unread message count every minute
        function fetchUnreadCount() {
            fetch('{{ route("chat.unread") }}')
                .then(response => response.json())
                .then(data => {
                    const unreadCountElement = document.getElementById('unread-count');
                    if (data.unread_count > 0) {
                        unreadCountElement.textContent = data.unread_count;
                        unreadCountElement.classList.remove('hidden');
                    } else {
                        unreadCountElement.classList.add('hidden');
                    }
                })
                .catch(error => {
                    console.log('Error fetching unread count:', error);
                });
        }

        // Initial fetch
        fetchUnreadCount();

        // Set interval to fetch every minute
        setInterval(fetchUnreadCount, 60000);

        // Listen for new messages if Echo is available
        if (window.Echo) {
            window.Echo.private('user.{{ auth()->id() }}')
                .listen('NewChatMessage', (e) => {
                    fetchUnreadCount();
                });
        }
        @endauth
    });
</script>
</nav>