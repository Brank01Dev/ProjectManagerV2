<!DOCTYPE html>
<html>
<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Login Project Manager') }}</title>
</head>

<body class="overflow-x-hidden bg-gray-50 min-h-screen font-sans flex flex-col">

    <div class="flex flex-col flex-1 items-center">
    
        <header class="flex flex-col md:flex-row items-center justify-center gap-6 md:gap-8 p-6 md:mt-40">
            <img 
                src="{{ asset('images/ProjectManagerFinalLogo.svg') }}" 
                alt="ProjectManagerV2 Logo" 
                class="h-20 w-20 md:h-28 md:w-28 transition-transform duration-300 ease-out hover:scale-110"
            >
            <h1 class="text-3xl md:text-6xl font-bold text-gray-900">
                PROJECT MANAGER
            </h1>
        </header>

    <x-auth-session-status class="mt-4" :status="session('status')" />

    <h2 class="text-2xl md:text-4xl font-bold text-gray-800 mt-12">
        SIGN IN
    </h2>


    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="flex justify-center gap-6 mt-6 md:mt-10 bg-gray-200 ">
            <x-text-input class="!bg-white" id="email"
            type="email"
            name="email"
            placeholder="Email"
             :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>


        <div class="flex justify-center gap-6 mt-6 md:mt-10">
            <x-text-input class="!bg-white" id="password"
                            type="password"
                            name="password"
                            placeholder="Password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>



            <div class="flex justify-center gap-6 mt-6 md:mt-10">
                <x-primary-button>{{ __('Log in') }}</x-primary-button>
            </div>

        <div>

            <div class="flex flex-col items-center gap-3 mt-6">

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="text-gray-600 hover:text-gray-800 text-sm">
                        No account yet? Register now.
                    </a>
                @endif

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-gray-600 hover:text-gray-800 text-sm">
                        Forgot your password?
                    </a>
                @endif
            </div>

        </div>
    </form>
    </div>
        <footer class="mt-auto p-6 text-center text-gray-400 text-sm">
            &copy; {{ date('Y') }} ProjectManagerV2
        </footer>
</body>
</html>
