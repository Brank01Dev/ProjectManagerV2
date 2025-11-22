@extends('layouts.app')

@section('content')
    <div class="mb-8">
        <h2 class="text-2xl font-bold text-gray-900">Profile Settings</h2>
        <p class="text-gray-500 mt-1">Update your account information and security settings</p>
    </div>

    <div class="space-y-8 max-w-4xl">
        <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
            <div class="p-6 border-b border-gray-100 bg-gray-50">
                <h3 class="text-lg font-medium text-gray-900">Profile Information</h3>
                <p class="text-sm text-gray-500 mt-1">Update your account's profile information and email address.</p>
            </div>
            <div class="p-6">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
            <div class="p-6 border-b border-gray-100 bg-gray-50">
                <h3 class="text-lg font-medium text-gray-900">Update Password</h3>
                <p class="text-sm text-gray-500 mt-1">Ensure your account is using a long, random password to stay secure.
                </p>
            </div>
            <div class="p-6">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <div class="bg-white rounded-xl border border-red-100 shadow-sm overflow-hidden">
            <div class="p-6 border-b border-red-50 bg-red-50">
                <h3 class="text-lg font-medium text-red-800">Delete Account</h3>
                <p class="text-sm text-red-600 mt-1">Permanently delete your account and all of its resources and data.</p>
            </div>
            <div class="p-6">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
@endsection