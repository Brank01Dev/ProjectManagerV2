<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center max-w-4xl mx-auto px-6">
            <div class="flex items-center gap-4">
                <img 
                    src="{{ asset('images/ProjectManagerFinalLogo.svg') }}" 
                    alt="ProjectManagerV2 Logo" 
                    class="h-16 w-16 md:h-20 md:w-20"
                >
                <h2 class="font-semibold text-3xl text-gray-800 leading-tight tracking-tight">
                    Profile Settings
                </h2>
            </div>

            <a 
                href="{{ route('Project.index') }}" 
                class="inline-block px-6 py-2 rounded-[12px] bg-white shadow hover:shadow-md transition 
                       text-gray-700 font-medium border border-gray-200"
            >
                Back
            </a>
        </div>
    </x-slot>

    <div class="pt-8 bg-[#EBECF0] min-h-screen">
        <div class="max-w-4xl mx-auto px-4 space-y-12">

            <div class="bg-white shadow-md rounded-xl p-8">
                @include('profile.partials.update-profile-information-form')
            </div>

            <div class="bg-white shadow-md rounded-xl p-8">
                @include('profile.partials.update-password-form')
            </div>

            <div class="bg-white shadow-md rounded-xl p-8 border border-red-100">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</x-app-layout>