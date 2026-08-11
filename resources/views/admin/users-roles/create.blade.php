@extends('admin.layouts.main')

@section('content')
    <div class="p-4 bg-white dark:bg-gray-800 block sm:flex items-center justify-between border-b border-gray-200 dark:border-gray-700 lg:mt-1.5">
        <div class="mb-1 w-full">
            <div class="mb-4">
                <nav class="flex mb-5" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-2">
                        <li class="inline-flex items-center">
                            <a href="{{ route('admin.dashboard.view') }}" class="text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:text-white inline-flex items-center">
                                <i data-lucide="home" class="w-5 h-5 mr-2.5"></i>
                                Home
                            </a>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <i data-lucide="chevron-right" class="w-6 h-6 text-gray-400"></i>
                                <a href="{{ route('admin.users-roles.view') }}" class="text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:text-white ml-1 md:ml-2 text-sm font-medium">User Roles</a>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <i data-lucide="chevron-right" class="w-6 h-6 text-gray-400"></i>
                                <span class="text-gray-400 ml-1 md:ml-2 text-sm font-medium" aria-current="page">Add new</span>
                            </div>
                        </li>
                    </ol>
                </nav>
                <h1 class="text-xl sm:text-2xl font-semibold text-gray-900 dark:text-white">Add new role</h1>
            </div>

            @if ($errors->any())
                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                    <ul class="list-disc pl-5 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>

    <div class="p-4">
        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-4 sm:p-6 xl:p-8">
            <form action="{{ route('admin.users-roles.create') }}" method="POST">
                @csrf
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-3">
                        <label for="name" class="text-sm font-medium text-gray-900 dark:text-white block mb-2">Role Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" class="shadow-sm bg-gray-50 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:placeholder-gray-400 text-gray-900 dark:text-white sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="e.g. Manager" required>
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="description" class="text-sm font-medium text-gray-900 dark:text-white block mb-2">Description</label>
                        <input type="text" name="description" id="description" value="{{ old('description') }}" class="shadow-sm bg-gray-50 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:placeholder-gray-400 text-gray-900 dark:text-white sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="Short description">
                    </div>
                </div>
                <div class="items-center p-6 border-t border-gray-200 dark:border-gray-700 rounded-b mt-6 -mb-6 -mx-6 bg-gray-50 flex justify-end dark:bg-gray-900">
                    <a href="{{ route('admin.users-roles.view') }}" class="text-gray-900 dark:text-white bg-white dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:ring-cyan-200 border border-gray-200 dark:border-gray-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-3">Cancel</a>
                    <button type="submit" class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Save role</button>
                </div>
            </form>
        </div>
    </div>
@endsection
