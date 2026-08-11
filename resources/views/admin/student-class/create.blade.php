@extends('admin.layouts.main')

@section('content')
    <div class="p-4 bg-white dark:bg-gray-800 block sm:flex items-center justify-between border-b border-gray-200 dark:border-gray-700 lg:mt-1.5">
        <div class="mb-1 w-full">
            <div class="mb-4">
                <nav class="flex mb-5" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-2">
                        <li class="inline-flex items-center">
                            <a href="{{ route('admin.dashboard.view') }}" class="text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:text-white inline-flex items-center">
                                <svg class="w-5 h-5 mr-2.5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                                Home
                            </a>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                                <a href="{{ route('admin.student-classes.view') }}" class="text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:text-white ml-1 md:ml-2 text-sm font-medium">Student Classes</a>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                                <span class="text-gray-400 ml-1 md:ml-2 text-sm font-medium" aria-current="page">Add new</span>
                            </div>
                        </li>
                    </ol>
                </nav>
                <h1 class="text-xl sm:text-2xl font-semibold text-gray-900 dark:text-white">Add new class</h1>
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
            <form action="{{ route('admin.student-classes.create') }}" method="POST">
                @csrf
                <input type="hidden" name="level" value="{{ $level }}">
                <div class="grid grid-cols-6 gap-6">
                    @if ($level > 1)
                        <div class="col-span-6 sm:col-span-3">
                            <label for="name" class="text-sm font-medium text-gray-900 dark:text-white block mb-2">Level 1 Class</label>
                            <input type="text" name="name" id="name" value="{{ $name }}" class="shadow-sm bg-gray-100 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:placeholder-gray-400 text-gray-900 dark:text-white sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" readonly>
                        </div>
                    @endif
                    @if ($level > 2)
                        <div class="col-span-6 sm:col-span-3">
                            <label for="level_two" class="text-sm font-medium text-gray-900 dark:text-white block mb-2">Level 2 Class</label>
                            <input type="text" name="level_two" id="level_two" value="{{ $level_two }}" class="shadow-sm bg-gray-100 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:placeholder-gray-400 text-gray-900 dark:text-white sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" readonly>
                        </div>
                    @endif
                    <div class="col-span-6 sm:col-span-3">
                        <label for="{{ $level === 1 ? 'name' : ($level === 2 ? 'level_two' : 'level_three') }}" class="text-sm font-medium text-gray-900 dark:text-white block mb-2">Level {{ $level }} Class</label>
                        <input type="text" name="{{ $level === 1 ? 'name' : ($level === 2 ? 'level_two' : 'level_three') }}" id="{{ $level === 1 ? 'name' : ($level === 2 ? 'level_two' : 'level_three') }}" value="{{ old($level === 1 ? 'name' : ($level === 2 ? 'level_two' : 'level_three')) }}" class="shadow-sm bg-gray-50 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:placeholder-gray-400 text-gray-900 dark:text-white sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="e.g. Class One" required>
                    </div>
                </div>
                <div class="items-center p-6 border-t border-gray-200 dark:border-gray-700 rounded-b mt-6 -mb-6 -mx-6 bg-gray-50 flex justify-end dark:bg-gray-900">
                    <a href="{{ route('admin.student-classes.view', $level > 1 ? ['name' => $name] : []) }}" class="text-gray-900 dark:text-white bg-white dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:ring-cyan-200 border border-gray-200 dark:border-gray-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-3">Cancel</a>
                    <button type="submit" class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Save class</button>
                </div>
            </form>
        </div>
    </div>
@endsection
