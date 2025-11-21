<!DOCTYPE html>
<html>
<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Password Reset – Project Manager</title>
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

        <h2 class="text-2xl md:text-4xl font-bold text-gray-800 mt-12">
            RESET PASSWORD
        </h2>

        <p class="text-gray-600 text-center max-w-lg mt-6 px-4">
            Forgot your password? Enter your email below and we will send you a reset link.
        </p>

        <x-auth-session-status class="mt-4 text-center" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}" class="w-full max-w-md mt-8">
            @csrf

            <div class="flex justify-center">
                <x-text-input 
                    id="email"
                    type="email"
                    name="email"
                    placeholder="Email"
                    :value="old('email')"
                    class="!bg-white w-full"
                    required autofocus
                />
            </div>

            <x-input-error :messages="$errors->get('email')" class="mt-2 text-center" />

            <div class="flex justify-center mt-10">
                <x-primary-button>
                    Send Password Reset Link
                </x-primary-button>
            </div>

            <div class="flex justify-center mt-6">
                <a href="{{ route('login') }}" class="text-gray-600 hover:text-gray-800 text-sm">
                    Back to Login
                </a>
            </div>
        </form>

    </div>

    <footer class="mt-auto p-6 text-center text-gray-400 text-sm">
        &copy; {{ date('Y') }} ProjectManagerV2
    </footer>

</body>
</html>