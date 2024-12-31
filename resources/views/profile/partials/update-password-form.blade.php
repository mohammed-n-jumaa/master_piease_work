<section class="max-w-2xl mx-auto bg-white dark:bg-gray-800 rounded-lg shadow-lg p-8 border border-[#aa9166]/20">
    <header class="border-b border-[#aa9166]/20 pb-6">
        <h2 class="text-2xl font-semibold text-[#aa9166] dark:text-[#aa9166]">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-8 space-y-8">
        @csrf
        @method('put')

        <div class="space-y-2">
            <label for="update_password_current_password" 
                   class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                {{ __('Current Password') }}
            </label>
            <input id="update_password_current_password" 
                   name="current_password" 
                   type="password" 
                   class="mt-1 block w-full px-4 py-3 bg-gray-50 dark:bg-gray-900 border border-[#aa9166]/20 rounded-lg focus:ring-2 focus:ring-[#aa9166]/20 focus:border-[#aa9166] transition duration-300"
                   autocomplete="current-password" />
            @error('current_password')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="space-y-2">
            <label for="update_password_password" 
                   class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                {{ __('New Password') }}
            </label>
            <input id="update_password_password" 
                   name="password" 
                   type="password" 
                   class="mt-1 block w-full px-4 py-3 bg-gray-50 dark:bg-gray-900 border border-[#aa9166]/20 rounded-lg focus:ring-2 focus:ring-[#aa9166]/20 focus:border-[#aa9166] transition duration-300"
                   autocomplete="new-password" />
            @error('password')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="space-y-2">
            <label for="update_password_password_confirmation" 
                   class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                {{ __('Confirm Password') }}
            </label>
            <input id="update_password_password_confirmation" 
                   name="password_confirmation" 
                   type="password" 
                   class="mt-1 block w-full px-4 py-3 bg-gray-50 dark:bg-gray-900 border border-[#aa9166]/20 rounded-lg focus:ring-2 focus:ring-[#aa9166]/20 focus:border-[#aa9166] transition duration-300"
                   autocomplete="new-password" />
            @error('password_confirmation')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center gap-4 pt-4 border-t border-[#aa9166]/20">
            <button type="submit" 
                    class="px-6 py-3 bg-[#aa9166] hover:bg-[#8a735c] text-white rounded-lg font-medium transition duration-300 focus:outline-none focus:ring-2 focus:ring-[#aa9166]/50">
                {{ __('Save') }}
            </button>

            @if (session('status') === 'password-updated')
                <p x-data="{ show: true }"
                   x-show="show"
                   x-transition
                   x-init="setTimeout(() => show = false, 2000)"
                   class="text-sm text-[#aa9166]">
                    {{ __('Saved.') }}
                </p>
            @endif
        </div>
    </form>
</section>