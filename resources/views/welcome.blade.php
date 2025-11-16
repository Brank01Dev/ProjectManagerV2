<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Project Manager') }}</title>
</head>

<body class="overflow-x-hidden bg-gray-50 min-h-screen font-sans flex flex-col">

    <div class="flex flex-col flex-1 items-center">
    
        <header class="flex flex-col md:flex-row items-center justify-center gap-6 md:gap-8 p-6 md:mt-40">
            <img 
                src="{{ asset('images/ProjectManagerFinalLogo.svg') }}" 
                alt="ProjectManagerV2 Logo" 
                class="h-20 w-20 md:h-28 md:w-28"
            >
            <h1 class="text-3xl md:text-6xl font-bold text-gray-900">
                PROJECT MANAGER
            </h1>
        </header>
    
        <p class="mx-4 md:mx-0 max-w-xl text-center text-gray-600 mt-12 md:mt-20 text-base md:text-lg leading-relaxed
              transition-transform duration-300 ease-out hover:scale-105">
            The Project Manager is an all-in-one platform designed to efficiently manage your current and upcoming projects.
        </p>
        
        <p class="text-gray-500 mt-8 md:mt-12 text-center">
            Log in or register to use Project Manager.
        </p>
    
        @if (Route::has('login'))
        <nav class="flex justify-center gap-6 mt-6 md:mt-10">
            <a href="{{ route('login') }}" class="link-soft hover:text-blue-300">
                Log in
            </a>
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="link-soft hover:text-blue-300">
                    Register
                </a>
            @endif
        </nav>
        @endif
        <footer class="mt-auto p-6 text-center text-gray-400 text-sm">
            &copy; {{ date('Y') }} ProjectManagerV2
        </footer>
    </div>
    
    </body>
</html>
        
 
    