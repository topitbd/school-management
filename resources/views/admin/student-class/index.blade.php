@extends('admin.layouts.main')

@section('content')
    @php
        $displayField = $level === 1 ? 'name' : ($level === 2 ? 'level_two' : 'level_three');
        $pageTitle = $level === 1 ? 'All classes' : ($level === 2 ? 'Classes in ' . $name : 'Classes in ' . $name . ' / ' . $level_two);
    @endphp

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
                        @if ($level >= 2)
                            <li>
                                <div class="flex items-center">
                                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                                    <a href="{{ route('admin.student-classes.view', ['name' => $name]) }}" class="text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:text-white ml-1 md:ml-2 text-sm font-medium">{{ $name }}</a>
                                </div>
                            </li>
                        @endif
                        @if ($level >= 3)
                            <li>
                                <div class="flex items-center">
                                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                                    <a href="{{ route('admin.student-classes.view', ['name' => $name, 'level_two' => $level_two]) }}" class="text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:text-white ml-1 md:ml-2 text-sm font-medium">{{ $level_two }}</a>
                                </div>
                            </li>
                        @endif
                        <li>
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                                <span class="text-gray-400 ml-1 md:ml-2 text-sm font-medium" aria-current="page">List</span>
                            </div>
                        </li>
                    </ol>
                </nav>
                <h1 class="text-xl sm:text-2xl font-semibold text-gray-900 dark:text-white">{{ $pageTitle }}</h1>
            </div>

            @if (session('success'))
                <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('warning'))
                <div class="p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50" role="alert">
                    {{ session('warning') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                    {{ $errors->first() }}
                </div>
            @endif

            <div class="sm:flex">
                <div class="flex items-center space-x-2 sm:space-x-3 ml-auto">
                    @if ($level > 1)
                        <a href="{{ $level === 2 ? route('admin.student-classes.view') : route('admin.student-classes.view', ['name' => $name]) }}" class="w-1/2 text-gray-900 dark:text-white bg-white dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:ring-cyan-200 border border-gray-200 dark:border-gray-700 font-medium inline-flex items-center justify-center rounded-lg text-sm px-3 py-2 text-center sm:w-auto">
                            <svg class="-ml-1 mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd"></path></svg>
                            Back
                        </a>
                    @endif
                    <a href="{{ route('admin.student-classes.createPage', $level === 1 ? [] : ($level === 2 ? ['name' => $name] : ['name' => $name, 'level_two' => $level_two])) }}" class="w-1/2 text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium inline-flex items-center justify-center rounded-lg text-sm px-3 py-2 text-center sm:w-auto">
                        <svg class="-ml-1 mr-2 h-6 w-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                        Add class
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="flex flex-col">
        <div class="overflow-x-auto">
            <div class="align-middle inline-block min-w-full">
                <div class="shadow overflow-hidden">
                    <table class="table-fixed min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-100 dark:bg-gray-700">
                            <tr>
                                <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">Level {{ $level }} Class</th>
                                @if ($level < 3)
                                    <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">Next Level</th>
                                @endif
                                <th scope="col" class="p-4"></th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            @forelse ($classes as $class)
                                <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900 dark:text-white">{{ $class->{$displayField} }}</td>
                                    @if ($level < 3)
                                        <td class="p-4 whitespace-nowrap space-x-2">
                                            <a href="{{ $level === 1 ? route('admin.student-classes.view', ['name' => $class->name]) : route('admin.student-classes.view', ['name' => $class->name, 'level_two' => $class->level_two]) }}" class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center">
                                                <svg class="mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                View
                                            </a>
                                        </td>
                                    @endif
                                    <td class="p-4 whitespace-nowrap space-x-2">
                                        <a href="{{ route('admin.student-classes.edit', $class->id) }}" class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center">
                                            <svg class="mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path><path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path></svg>
                                            Edit
                                        </a>
                                        <button type="button" data-class-id="{{ $class->id }}" data-class-name="{{ $class->{$displayField} }}" onclick="openDeleteModal(this)" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center">
                                            <svg class="mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="{{ $level < 3 ? 3 : 2 }}" class="p-4 text-center text-sm text-gray-500 dark:text-gray-400">No classes found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Class Modal -->
    <div class="hidden overflow-x-hidden overflow-y-auto fixed top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center h-modal sm:h-full" id="delete-class-modal">
        <div class="relative w-full max-w-md px-4 h-full md:h-auto">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow relative">
                <div class="flex justify-end p-2">
                    <button type="button" onclick="closeDeleteModal()" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 dark:text-white rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                </div>
                <div class="p-6 pt-0 text-center">
                    <svg class="w-20 h-20 text-red-600 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <h3 class="text-xl font-normal text-gray-500 dark:text-gray-400 mt-5 mb-6">Are you sure you want to delete <span id="delete-class-name" class="font-semibold text-gray-900 dark:text-white"></span>?</h3>
                    <form action="{{ route('admin.student-classes.delete') }}" method="POST" class="inline">
                        @csrf
                        <input type="hidden" name="id" id="delete-class-id" value="">
                        <button type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-base inline-flex items-center px-3 py-2.5 text-center mr-2">
                            Yes, I'm sure
                        </button>
                    </form>
                    <button type="button" onclick="closeDeleteModal()" class="text-gray-900 dark:text-white bg-white dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:ring-cyan-200 border border-gray-200 dark:border-gray-700 font-medium inline-flex items-center rounded-lg text-base px-3 py-2.5 text-center">
                        No, cancel
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function openDeleteModal(btn) {
            document.getElementById('delete-class-id').value = btn.dataset.classId;
            document.getElementById('delete-class-name').textContent = btn.dataset.className;
            document.getElementById('delete-class-modal').classList.remove('hidden');
            document.getElementById('delete-class-modal').classList.add('flex');
        }

        function closeDeleteModal() {
            document.getElementById('delete-class-modal').classList.add('hidden');
            document.getElementById('delete-class-modal').classList.remove('flex');
        }
    </script>
@endsection
