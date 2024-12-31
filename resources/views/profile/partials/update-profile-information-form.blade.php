<section class="space-y-6">
    <header class="relative">
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 rounded-full bg-[#aa9166] flex items-center justify-center">
                <i class="fas fa-user-edit text-2xl text-white"></i>
            </div>
            <div>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100">
                    {{ __('Profile Information') }}
                </h2>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    {{ __("Update your account's profile information and email address.") }}
                </p>
            </div>
        </div>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('admin.profile.update') }}" class="mt-8 space-y-8">
        @csrf
        @method('patch')

        <div class="grid gap-6 sm:grid-cols-2">
            <div class="group relative">
                <x-input-label for="name" :value="__('Name')" class="inline-block mb-2" />
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500">
                        <i class="fas fa-user"></i>
                    </span>
                    <x-text-input 
                        id="name" 
                        name="name" 
                        type="text" 
                        class="pl-10 w-full border-gray-300 dark:border-gray-700 focus:border-[#aa9166] focus:ring-[#aa9166] rounded-lg shadow-sm transition-all" 
                        :value="old('name', $user->name)" 
                        required 
                        autofocus 
                        autocomplete="name" 
                    />
                </div>
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>

            <div class="group relative">
                <x-input-label for="email" :value="__('Email')" class="inline-block mb-2" />
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500">
                        <i class="fas fa-envelope"></i>
                    </span>
                    <x-text-input 
                        id="email" 
                        name="email" 
                        type="email" 
                        class="pl-10 w-full border-gray-300 dark:border-gray-700 focus:border-[#aa9166] focus:ring-[#aa9166] rounded-lg shadow-sm transition-all" 
                        :value="old('email', $user->email)" 
                        required 
                        autocomplete="username" 
                    />
                </div>
                <x-input-error class="mt-2" :messages="$errors->get('email')" />
            </div>
        </div>

        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
            <div class="bg-yellow-50 dark:bg-yellow-900/20 rounded-lg p-4">
                <div class="flex items-center gap-3">
                    <i class="fas fa-exclamation-triangle text-yellow-600 dark:text-yellow-500"></i>
                    <p class="text-sm text-yellow-700 dark:text-yellow-400">
                        {{ __('Your email address is unverified.') }}
                        
                        <button form="send-verification" class="underline hover:text-yellow-900 dark:hover:text-yellow-300 transition-colors">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>
                </div>

                @if (session('status') === 'verification-link-sent')
                    <p class="mt-2 text-sm font-medium text-green-600 dark:text-green-400">
                        {{ __('A new verification link has been sent to your email address.') }}
                    </p>
                @endif
            </div>
        @endif

        <div class="flex items-center gap-4">
            <x-primary-button class="bg-[#aa9166] hover:bg-[#8b765c] transform hover:scale-105 transition-all duration-300">
                <i class="fas fa-save mr-2"></i>
                {{ __('Save Changes') }}
            </x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 transform translate-x-4"
                    x-transition:enter-end="opacity-100 transform translate-x-0"
                    x-transition:leave="transition ease-in duration-300"
                    x-transition:leave-start="opacity-100 transform translate-x-0"
                    x-transition:leave-end="opacity-0 transform translate-x-4"
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-green-600 dark:text-green-400 flex items-center gap-2"
                >
                    <i class="fas fa-check-circle"></i>
                    {{ __('Saved successfully.') }}
                </p>
            @endif
        </div>
    </form>
</section>