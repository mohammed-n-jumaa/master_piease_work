<section class="space-y-6">
    <header class="relative">
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 rounded-full bg-[#aa9166] flex items-center justify-center">
                <i class="fas fa-exclamation-triangle text-2xl text-white"></i>
            </div>
            <div>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100">
                    {{ __('Delete Account') }}
                </h2>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
                </p>
            </div>
        </div>
    </header>

    <div class="flex items-center gap-4">
        <x-danger-button
            x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
            class="bg-red-500 hover:bg-red-600 text-white"
        >
            {{ __('Delete Account') }}
        </x-danger-button>
    </div>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('admin.profile.destroy', ['id' => $user->id]) }}" class="p-6 bg-white dark:bg-gray-800 shadow-xl rounded-2xl">
            @csrf
            @method('delete')

            <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4 border-gray-300 dark:border-gray-700 focus:border-[#aa9166] focus:ring-[#aa9166] rounded-lg shadow-sm transition-all"
                    placeholder="{{ __('Password') }}"
                    required
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end gap-3">
                <x-secondary-button x-on:click="$dispatch('close')" class="bg-gray-300 dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="bg-red-500 hover:bg-red-600 text-white">
                    {{ __('Delete Account') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
