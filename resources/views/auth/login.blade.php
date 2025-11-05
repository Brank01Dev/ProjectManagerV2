<!DOCTYPE html>
<html>
<head>
    <title>My Laravel App</title>
    @vite(['resources/scss/loginpage.scss'])
</head>
<body>

    <div class="segment">
    <h1 class="segment">Welcome to Project Manager</h1>
    <h3 style="color: rgba(6, 6, 6, 0.356)"> Please login </h3>


    <x-auth-session-status class="mt-4" :status="session('status')" />
    
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div style="margin-bottom: 2em;">
            <x-text-input id="email"
            type="email"
            name="email"
            placeholder="Email"
             :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>


        <div style="margin-botttom: 2em">
            <x-text-input id="password"
                            type="password"
                            name="password"
                            placeholder="Password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>


            <div class="buttons">
                <x-primary-button>{{ __('Log in') }}</x-primary-button>
            </div>

        <div>

            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="text-link">
                    {{ __('No account yet? Register now.') }}
            </a>
            @endif

                @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="button-link subtle">
                    {{ __('Forgot your password?') }}
                </a>
                @endif

        </div>
    </form>
    </div>
</body>
</html>
