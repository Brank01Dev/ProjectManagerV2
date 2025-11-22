@extends('layouts.app')

@section('content')
    <div class="mb-8 flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold text-gray-900">Add Project</h2>
            <p class="text-gray-500 mt-1">Create a new project to start tracking progress</p>
        </div>
        <a href="{{ route('Project.index') }}"
            class="inline-flex items-center justify-center px-4 py-2 bg-white border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors font-medium shadow-sm">
            Back to Dashboard
        </a>
    </div>

    @if ($errors->any())
        <div class="mb-6 p-4 rounded-lg bg-red-50 border border-red-200">
            <div class="flex items-center gap-2 text-red-800 font-medium mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                        clip-rule="evenodd" />
                </svg>
                Please fix the following errors:
            </div>
            <ul class="list-disc list-inside text-sm text-red-700 ml-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden max-w-3xl">
        <form action="{{ route('Project.store') }}" method="POST" class="p-6 md:p-8 space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="col-span-1 md:col-span-2">
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Project Name</label>
                    <input type="text" name="name" id="name"
                        class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-colors"
                        placeholder="Enter project name" value="{{ old('name') }}">
                </div>

                <div class="col-span-1 md:col-span-2">
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                    <textarea name="description" id="description" rows="4"
                        class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-colors"
                        placeholder="Describe the project goals and requirements">{{ old('description') }}</textarea>
                </div>

                <div class="col-span-1 md:col-span-2">
                    <label for="project_creator" class="block text-sm font-medium text-gray-700 mb-1">Project
                        Creator</label>
                    <input type="text" name="project_creator" id="project_creator"
                        class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-colors"
                        placeholder="Enter the name of project manager or creator" value="{{ old('project_creator') }}">
                </div>

                <div>
                    <label for="date_of_start" class="block text-sm font-medium text-gray-700 mb-1">Start Date</label>
                    <input type="date" name="date_of_start" id="date_of_start"
                        class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-colors"
                        value="{{ old('date_of_start') }}">
                </div>

                <div>
                    <label for="date_of_end" class="block text-sm font-medium text-gray-700 mb-1">End Date</label>
                    <input type="date" name="date_of_end" id="date_of_end"
                        class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-colors"
                        value="{{ old('date_of_end') }}">
                </div>
            </div>

            <div class="pt-4 flex items-center justify-end gap-4 border-t border-gray-100 mt-6">
                <a href="{{ route('Project.index') }}"
                    class="px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 font-medium transition-colors">
                    Cancel
                </a>
                <button type="submit"
                    class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 font-medium shadow-sm hover:shadow-md transition-all">
                    Create Project
                </button>
            </div>
        </form>
    </div>
@endsection