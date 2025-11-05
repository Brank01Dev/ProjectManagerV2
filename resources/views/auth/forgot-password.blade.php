<!DOCTYPE html>
<html>
<head>
    <title>ProjectManager password reset</title>
    @vite(['resources/scss/loginpage.scss'])
</head>
<div class="segment">

<body>
    <div style="margin-top: 250px">
    <div style="max-width: 500px; display: flex; align-items: center; margin: auto">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <x-auth-session-status style="margin-top: 1em; color:darkslategray;" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div>
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
    </div>
    </body>
</div>