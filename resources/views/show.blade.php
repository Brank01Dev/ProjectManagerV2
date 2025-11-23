@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <div class="bg-gray-50 px-8 py-6 border-b border-gray-100 flex justify-between items-center">
                <div>
                    <h2 class="text-2xl font-bold text-gray-900">Project Details</h2>
                    <p class="text-gray-500 mt-1">View complete project information</p>
                </div>
                <div class="flex gap-3">
                    <a href="{{ route('Project.edit', $Project->id) }}"
                        class="inline-flex items-center justify-center px-4 py-2 bg-blue-600 border border-transparent rounded-lg text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        Edit Project
                    </a>
                    <a href="{{ route('Project.index') }}"
                        class="inline-flex items-center justify-center px-4 py-2 bg-white border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-400" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Back
                    </a>
                </div>
            </div>

            <div class="p-8">
                <div class="grid grid-cols-1 gap-y-8 sm:grid-cols-2">
                    <div class="sm:col-span-2">
                        <h3 class="text-3xl font-bold text-gray-900">{{ $Project->name }}</h3>
                        <div class="mt-4 flex items-center">
                            <span
                                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $Project->status === 'active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ ucfirst($Project->status) }}
                            </span>
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <dt class="text-sm font-medium text-gray-500">Description</dt>
                        <dd
                            class="mt-2 text-base text-gray-900 {{ $Project->status !== 'active' ? 'line-through opacity-60' : '' }}">
                            {{ $Project->description }}
                        </dd>
                    </div>

                    <div>
                        <dt class="text-sm font-medium text-gray-500">Project Creator</dt>
                        <dd class="mt-1 flex items-center text-base text-gray-900">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-400" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            {{ $Project->project_creator }}
                        </dd>
                    </div>

                    <div>
                        <dt class="text-sm font-medium text-gray-500">Timeline</dt>
                        <dd class="mt-1 text-base text-gray-900">
                            <div class="flex flex-col gap-1">
                                <div class="flex items-center">
                                    <span class="w-16 text-xs text-gray-500 uppercase tracking-wider">Start:</span>
                                    <span class="font-medium">{{ $Project->date_of_start }}</span>
                                </div>
                                <div class="flex items-center">
                                    <span class="w-16 text-xs text-gray-500 uppercase tracking-wider">End:</span>
                                    <span class="font-medium">{{ $Project->date_of_end }}</span>
                                </div>
                            </div>
                        </dd>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection