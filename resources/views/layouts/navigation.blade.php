<nav x-data="{ open: false }" class="bg-gradient-to-r from-white to-gray-50 dark:from-gray-900 dark:to-gray-800 border-b border-[#aa9166]/20">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-2">
                        <span class="block text-3xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-[#aa9166] to-[#8a735c] hover:from-[#8a735c] hover:to-[#aa9166] transition-all duration-300">MUSTASHARK</span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center px-4 py-2 border-b-2 border-transparent hover:border-[#aa9166] text-sm font-medium leading-5 text-gray-600 dark:text-gray-300 hover:text-[#aa9166] transition duration-300">
                        {{ __('Dashboard') }}
                    </a>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" class="inline-flex items-center px-4 py-2 border border-[#aa9166]/20 text-sm font-medium rounded-lg text-[#aa9166] bg-white/80 dark:bg-gray-800 hover:bg-[#aa9166]/10 dark:hover:bg-[#aa9166]/5 focus:outline-none transition duration-300">
                        <div>{{ Auth::user()->name }}</div>
                        <div class="ms-2">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>

                    <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 rounded-lg shadow-xl bg-white dark:bg-gray-800 ring-1 ring-[#aa9166]/10 divide-y divide-[#aa9166]/10">
                        <a href="{{ route('admin.profile.edit') }}" class="block px-4 py-3 text-sm text-gray-700 dark:text-gray-300 hover:bg-[#aa9166]/10 rounded-t-lg transition duration-300">
                            {{ __('Profile') }}
                        </a>
                        <form method="POST" action="{{ route('admin.logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-3 text-sm text-gray-700 dark:text-gray-300 hover:bg-[#aa9166]/10 rounded-b-lg transition duration-300">
                                {{ __('Log Out') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = !open" class="inline-flex items-center justify-center p-2 rounded-lg text-[#aa9166] hover:bg-[#aa9166]/10 transition duration-300">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': !open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 text-[#aa9166] hover:bg-[#aa9166]/10 transition duration-300">
                {{ __('Dashboard') }}
            </a>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-[#aa9166]/20">
            <div class="px-4 space-y-1">
                <div class="font-medium text-base text-[#aa9166]">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <a href="{{ route('admin.profile.edit') }}" class="block px-4 py-2 text-gray-700 dark:text-gray-300 hover:bg-[#aa9166]/10 transition duration-300">
                    {{ __('Profile') }}
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left px-4 py-2 text-gray-700 dark:text-gray-300 hover:bg-[#aa9166]/10 transition duration-300">
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>