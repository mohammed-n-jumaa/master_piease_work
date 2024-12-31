<x-app-layout>
    <x-slot name="header">
        <div class="relative overflow-hidden bg-gradient-to-r from-[#aa9166] to-[#8b765c] shadow-lg rounded-b-2xl">
            <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
                <div class="relative z-10">
                    <h2 class="text-3xl font-bold text-white leading-tight flex items-center gap-3">
                        <i class="fas fa-user-circle text-white/90"></i>
                        {{ __('Profile Settings') }}
                    </h2>
                    <p class="mt-2 text-white/80">{{ __('Manage your account settings and preferences') }}</p>
                </div>
                <div class="absolute inset-0 bg-white/5 backdrop-blur-sm"></div>
                <div class="absolute -bottom-8 right-0 w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50 dark:bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            <!-- Profile Navigation -->
            <nav class="flex gap-4 px-4 sm:px-0 overflow-x-auto pb-4">
                <a href="#profile-info" 
                   class="flex items-center gap-2 px-4 py-2 bg-[#aa9166] text-white rounded-lg shadow-lg hover:bg-[#8b765c] transition-all">
                    <i class="fas fa-user"></i>
                    <span>{{ __('Profile Info') }}</span>
                </a>
                <a href="#security" 
                   class="flex items-center gap-2 px-4 py-2 bg-white dark:bg-gray-800 rounded-lg shadow-lg hover:bg-[#aa9166] hover:text-white transition-all">
                    <i class="fas fa-lock"></i>
                    <span>{{ __('Security') }}</span>
                </a>
                <a href="#danger-zone" 
                   class="flex items-center gap-2 px-4 py-2 bg-white dark:bg-gray-800 rounded-lg shadow-lg hover:bg-red-500 hover:text-white transition-all">
                    <i class="fas fa-exclamation-triangle"></i>
                    <span>{{ __('Danger Zone') }}</span>
                </a>
            </nav>

            <!-- Content Sections -->
            <div class="grid gap-8">
                <div id="profile-info" class="transform transition-all duration-500 hover:scale-[1.01]">
                    <div class="bg-white dark:bg-gray-800 shadow-xl rounded-2xl overflow-hidden">
                        <div class="border-b border-gray-200 dark:border-gray-700 bg-[#aa9166]/10">
                            <div class="p-4 sm:p-6">
                                @include('profile.partials.update-profile-information-form')
                            </div>
                        </div>
                    </div>
                </div>

                <div id="security" class="transform transition-all duration-500 hover:scale-[1.01]">
                    <div class="bg-white dark:bg-gray-800 shadow-xl rounded-2xl overflow-hidden">
                        <div class="border-b border-gray-200 dark:border-gray-700 bg-[#aa9166]/10">
                            <div class="p-4 sm:p-6">
                                @include('profile.partials.update-password-form')
                            </div>
                        </div>
                    </div>
                </div>

                <div id="danger-zone" class="transform transition-all duration-500 hover:scale-[1.01]">
                    <div class="bg-white dark:bg-gray-800 shadow-xl rounded-2xl overflow-hidden">
                        <div class="border-b border-gray-200 dark:border-gray-700 bg-red-500/10">
                            <div class="p-4 sm:p-6">
                                @include('profile.partials.delete-user-form')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</x-app-layout>