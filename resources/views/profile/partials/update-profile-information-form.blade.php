<!DOCTYPE html>
<html lang="en">
<head>
    <title>Project Manager Profile</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body class="bg-gray-50 min-h-screen font-sans text-gray-800 flex flex-col items-center px-6 py-10">


    <p class="text-gray-500 text-base md:text-lg leading-relaxed max-w-2xl text-center mb-10">
        Update your account information and keep your profile details up to date.
    </p>


    <div class="w-full max-w-lg bg-white shadow-md rounded-xl p-6 md:p-8 space-y-8">

        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
            @csrf
        </form>

        <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
            @csrf
            @method('patch')

            <div class="flex flex-col space-y-2">
                <label for="name" class="text-gray-700 font-medium">Name</label>
                <input id="name" name="name" type="text"
                       value="{{ old('name', $user->name) }}"
                       required autofocus autocomplete="name"
                       class="w-full p-3 rounded-md border border-gray-300 bg-gray-50 
                              focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200">
                <x-input-error :messages="$errors->get('name')" class="text-red-500 text-sm" />
            </div>

            <div class="flex flex-col space-y-2">
                <label for="email" class="text-gray-700 font-medium">Email</label>
                <input id="email" name="email" type="email"
                       value="{{ old('email', $user->email) }}"
                       required autocomplete="username"
                       class="w-full p-3 rounded-md border border-gray-300 bg-gray-50 
                              focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200">

                <x-input-error :messages="$errors->get('email')" class="text-red-500 text-sm" />

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                    <div class="text-sm text-gray-600 space-y-2 bg-yellow-50 p-4 rounded-lg border border-yellow-200">

                        <p>Your email address is unverified.</p>

                        <button form="send-verification" 
                                class="text-blue-600 hover:underline font-medium">
                            Click here to re-send verification email.
                        </button>

                        @if (session('status') === 'verification-link-sent')
                            <p class="text-green-600">
                                A new verification link has been sent to your email.
                            </p>
                        @endif
                    </div>
                @endif
            </div>

            <div class="flex items-center justify-between mt-6">
                
                <button type="submit"
                        class="px-6 py-3 bg-blue-600 text-white rounded-md font-semibold 
                               shadow-md hover:bg-blue-700 transition hover:scale-[1.03]">
                    Save
                </button>

                @if (session('status') === 'profile-updated')
                    <p x-data="{ show: true }" 
                       x-show="show" x-transition 
                       x-init="setTimeout(() => show = false, 2000)"
                       class="text-green-600 text-sm ml-4">
                        Saved.
                    </p>
                @endif
            </div>

        </form>

    </div>

</body>
</html>