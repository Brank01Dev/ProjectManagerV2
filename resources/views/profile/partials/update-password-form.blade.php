<section class="w-full max-w-lg bg-white shadow-md rounded-xl p-6 md:p-8 mt-16 space-y-8">

    <header class="space-y-2">
        <h2 class="text-2xl font-semibold text-gray-900">
            {{ __('Update Password') }}
        </h2>

        <p class="text-gray-500 text-base leading-relaxed">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="space-y-6">
        @csrf
        @method('put')

        <div class="flex flex-col space-y-2">
            <label class="text-gray-700 font-medium" for="update_password_current_password">
                {{ __('Current Password') }}
            </label>
            <input 
                id="update_password_current_password" 
                name="current_password" 
                type="password"
                autocomplete="current-password"
                class="w-full p-3 rounded-md border border-gray-300 bg-gray-50 
                       focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200">
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="text-red-500 text-sm" />
        </div>

        <div class="flex flex-col space-y-2">
            <label class="text-gray-700 font-medium" for="update_password_password">
                {{ __('New Password') }}
            </label>
            <input 
                id="update_password_password" 
                name="password"
                type="password"
                autocomplete="new-password"
                class="w-full p-3 rounded-md border border-gray-300 bg-gray-50 
                       focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200">
            <x-input-error :messages="$errors->updatePassword->get('password')" class="text-red-500 text-sm" />
        </div>

        <div class="flex flex-col space-y-2">
            <label class="text-gray-700 font-medium" for="update_password_password_confirmation">
                {{ __('Confirm Password') }}
            </label>
            <input 
                id="update_password_password_confirmation" 
                name="password_confirmation"
                type="password"
                autocomplete="new-password"
                class="w-full p-3 rounded-md border border-gray-300 bg-gray-50 
                       focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200">
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="text-red-500 text-sm" />
        </div>

        <div class="flex items-center justify-between mt-6">
            <button type="submit"
                    class="px-6 py-3 bg-blue-600 text-white rounded-md font-semibold 
                           shadow-md hover:bg-blue-700 transition hover:scale-[1.03]">
                Save
            </button>

            @if (session('status') === 'password-updated')
                <p x-data="{ show: true }"
                   x-show="show" x-transition
                   x-init="setTimeout(() => show = false, 2000)"
                   class="text-green-600 text-sm">
                    Saved.
                </p>
            @endif
        </div>

    </form>
</section>
