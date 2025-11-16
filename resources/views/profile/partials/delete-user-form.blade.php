<section class="w-full max-w-lg bg-white shadow-md rounded-xl p-6 md:p-8 mt-16 space-y-8">

    <header class="space-y-2">
        <h2 class="text-2xl font-semibold text-gray-900">
            {{ __('Delete Account') }}
        </h2>

        <p class="text-gray-500 text-base leading-relaxed">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download anything you wish to retain.') }}
        </p>
    </header>

    <x-danger-button 
        class="px-6 py-3 bg-red-600 text-white rounded-md font-semibold 
               shadow-md hover:bg-red-700 transition hover:scale-[1.03]"
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >
        {{ __('Delete Account') }}
    </x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6 space-y-6">
            @csrf
            @method('delete')

            <h2 class="text-xl font-semibold text-gray-900">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p class="text-gray-600 leading-relaxed">
                {{ __('Once deleted, all of your data will be permanently removed. Enter your password to confirm.') }}
            </p>

            <div class="flex flex-col space-y-2">
                <label for="password" class="sr-only">{{ __('Password') }}</label>

                <input 
                    id="password"
                    name="password"
                    type="password"
                    placeholder="{{ __('Password') }}"
                    class="w-full p-3 rounded-md border border-gray-300 bg-gray-50 
                           focus:outline-none focus:border-red-500 focus:ring-2 focus:ring-red-200">
                <x-input-error :messages="$errors->userDeletion->get('password')" class="text-red-500 text-sm" />
            </div>

            <div class="flex items-center justify-end gap-4 pt-4">
                <button type="button"
                        x-on:click="$dispatch('close')"
                        class="px-5 py-3 rounded-md border border-gray-300 text-gray-700 
                               hover:bg-gray-100 transition">
                    {{ __('Cancel') }}
                </button>

                <button type="submit"
                        class="px-6 py-3 bg-red-600 text-white rounded-md font-semibold 
                               hover:bg-red-700 shadow-md transition hover:scale-[1.03]">
                    {{ __('Delete Account') }}
                </button>
            </div>

        </form>
    </x-modal>
</section>