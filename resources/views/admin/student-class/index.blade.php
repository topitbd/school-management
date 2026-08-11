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
                                <span class="text-gray-400 ml-1 md:ml-2 text-sm font-medium" aria-current="page">List</span>
                            </div>
                        </li>
                    </ol>
                </nav>
                <h1 class="text-xl sm:text-2xl font-semibold text-gray-900 dark:text-white">All user roles</h1>
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
                <div class="hidden sm:flex items-center sm:divide-x sm:divide-gray-100 dark:divide-gray-600 mb-3 sm:mb-0">
                    <form class="lg:pr-3" action="{{ route('admin.users-roles.view') }}" method="GET">
                        <label for="roles-search" class="sr-only">Search</label>
                        <div class="mt-1 relative lg:w-64 xl:w-96">
                            <input type="text" name="search" id="roles-search" value="{{ request('search') }}"
                                class="bg-gray-50 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:placeholder-gray-400 text-gray-900 dark:text-white sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                placeholder="Search for roles">
                        </div>
                    </form>
                    <div class="flex space-x-1 pl-0 sm:pl-2 mt-3 sm:mt-0">
                        <select name="status" onchange="this.form.submit()" form="roles-status-form"
                            class="bg-gray-50 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:placeholder-gray-400 text-gray-900 dark:text-white sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5">
                            <option value="">All statuses</option>
                            <option value="Active" @selected(request('status') === 'Active')>Active</option>
                            <option value="Inactive" @selected(request('status') === 'Inactive')>Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="flex items-center space-x-2 sm:space-x-3 ml-auto">
                    <a href="{{ route('admin.users-roles.createPage') }}"
                        class="w-1/2 text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium inline-flex items-center justify-center rounded-lg text-sm px-3 py-2 text-center sm:w-auto">
                        <i data-lucide="plus" class="-ml-1 mr-2 h-6 w-6"></i>
                        Add role
                    </a>
                </div>
            </div>
            <form id="roles-status-form" action="{{ route('admin.users-roles.view') }}" method="GET" class="hidden"></form>
        </div>
    </div>

    <div class="flex flex-col">
        <div class="overflow-x-auto">
            <div class="align-middle inline-block min-w-full">
                <div class="shadow overflow-hidden">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-100 dark:bg-gray-700">
                            <tr>
                                <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">Name</th>
                                <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">Description</th>
                                <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">Status</th>
                                <th scope="col" class="p-4"></th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            @forelse ($classes as $role)
                                <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900 dark:text-white">{{ $role->name }}</td>
                                    <td class="p-4 text-sm font-normal text-gray-500 dark:text-gray-400">{{ $role->description ?? '-' }}</td>
                                    <td class="p-4 whitespace-nowrap text-base font-normal text-gray-900 dark:text-white">
                                        <div class="flex items-center">
                                            <div class="h-2.5 w-2.5 rounded-full mr-2 @if ($role->status === 'Active') bg-green-400 @else bg-red-500 @endif"></div>
                                            {{ $role->status ?? 'Inactive' }}
                                        </div>
                                    </td>
                                    <td class="p-4 whitespace-nowrap space-x-2">
                                        <a href="{{ route('admin.users-roles.edit', $role->id) }}"
                                            class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center">
                                            <i data-lucide="pencil" class="mr-2 h-5 w-5"></i>
                                            Edit
                                        </a>
                                        <button type="button" data-role-id="{{ $role->id }}" data-role-name="{{ $role->name }}" onclick="openDeleteModal(this)"
                                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center">
                                            <i data-lucide="trash-2" class="mr-2 h-5 w-5"></i>
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="p-4 text-center text-sm text-gray-500 dark:text-gray-400">No roles found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Role Modal -->
    <div class="hidden overflow-x-hidden overflow-y-auto fixed top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center h-modal sm:h-full" id="delete-role-modal">
        <div class="relative w-full max-w-md px-4 h-full md:h-auto">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow relative">
                <div class="flex justify-end p-2">
                    <button type="button" onclick="closeDeleteModal()" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 dark:text-white rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                        <i data-lucide="x" class="w-5 h-5"></i>
                    </button>
                </div>
                <div class="p-6 pt-0 text-center">
                    <i data-lucide="alert-octagon" class="w-20 h-20 text-red-600 mx-auto"></i>
                    <h3 class="text-xl font-normal text-gray-500 dark:text-gray-400 mt-5 mb-6">Are you sure you want to delete <span id="delete-role-name" class="font-semibold text-gray-900 dark:text-white"></span>?</h3>
                    <form action="{{ route('admin.users-roles.delete') }}" method="POST" class="inline">
                        @csrf
                        <input type="hidden" name="id" id="delete-role-id" value="">
                        <button type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-base inline-flex items-center px-3 py-2.5 text-center mr-2">
                            Yes, I'm sure
                        </button>
                    </form>
                    <button type="button" onclick="closeDeleteModal()"
                        class="text-gray-900 dark:text-white bg-white dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:ring-cyan-200 border border-gray-200 dark:border-gray-700 font-medium inline-flex items-center rounded-lg text-base px-3 py-2.5 text-center">
                        No, cancel
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function openDeleteModal(btn) {
            document.getElementById('delete-role-id').value = btn.dataset.roleId;
            document.getElementById('delete-role-name').textContent = btn.dataset.roleName;
            document.getElementById('delete-role-modal').classList.remove('hidden');
            document.getElementById('delete-role-modal').classList.add('flex');
        }

        function closeDeleteModal() {
            document.getElementById('delete-role-modal').classList.add('hidden');
            document.getElementById('delete-role-modal').classList.remove('flex');
        }
    </script>
@endsection
