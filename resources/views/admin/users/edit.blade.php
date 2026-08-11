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
                                <a href="{{ route('admin.users.view') }}" class="text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:text-white ml-1 md:ml-2 text-sm font-medium">Users</a>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                                <span class="text-gray-400 ml-1 md:ml-2 text-sm font-medium" aria-current="page">Edit</span>
                            </div>
                        </li>
                    </ol>
                </nav>
                <h1 class="text-xl sm:text-2xl font-semibold text-gray-900 dark:text-white">Edit user</h1>
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
            <form action="{{ route('admin.users.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $user->id }}">
                <div class="flex items-center mb-6">
                    <img class="h-16 w-16 rounded-full object-cover" src="{{ show_image($user->images) }}" alt="{{ $user->name }} avatar">
                    <div class="ml-4">
                        <p class="text-lg font-semibold text-gray-900 dark:text-white">{{ $user->name }}</p>
                        <p class="text-sm text-gray-500 dark:text-gray-400">{{ $user->email }}</p>
                    </div>
                </div>
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-3">
                        <label for="name" class="text-sm font-medium text-gray-900 dark:text-white block mb-2">Full Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="shadow-sm bg-gray-50 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:placeholder-gray-400 text-gray-900 dark:text-white sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="John Doe" required>
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="email" class="text-sm font-medium text-gray-900 dark:text-white block mb-2">Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" class="shadow-sm bg-gray-50 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:placeholder-gray-400 text-gray-900 dark:text-white sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="name@company.com" required>
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="username" class="text-sm font-medium text-gray-900 dark:text-white block mb-2">Username</label>
                        <input type="text" name="username" id="username" value="{{ old('username', $user->username) }}" class="shadow-sm bg-gray-50 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:placeholder-gray-400 text-gray-900 dark:text-white sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="john_doe" required>
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="phone" class="text-sm font-medium text-gray-900 dark:text-white block mb-2">Phone Number</label>
                        <input type="text" name="phone" id="phone" value="{{ old('phone', $user->phone) }}" class="shadow-sm bg-gray-50 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:placeholder-gray-400 text-gray-900 dark:text-white sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="+8801234567890">
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="password" class="text-sm font-medium text-gray-900 dark:text-white block mb-2">New Password</label>
                        <input type="password" name="password" id="password" class="shadow-sm bg-gray-50 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:placeholder-gray-400 text-gray-900 dark:text-white sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="Leave blank to keep current password">
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="password_confirmation" class="text-sm font-medium text-gray-900 dark:text-white block mb-2">Confirm Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="shadow-sm bg-gray-50 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:placeholder-gray-400 text-gray-900 dark:text-white sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="••••••••">
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="role_id" class="text-sm font-medium text-gray-900 dark:text-white block mb-2">Role</label>
                        <select name="role_id" id="role_id" class="bg-gray-50 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:placeholder-gray-400 text-gray-900 dark:text-white sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" required>
                            <option value="">Select role</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}" @selected(old('role_id', $user->role_id) == $role->id)>{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="status" class="text-sm font-medium text-gray-900 dark:text-white block mb-2">Status</label>
                        <select name="status" id="status" class="bg-gray-50 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:placeholder-gray-400 text-gray-900 dark:text-white sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" required>
                            <option value="Active" @selected(old('status', $user->status) === 'Active')>Active</option>
                            <option value="Inactive" @selected(old('status', $user->status) === 'Inactive')>Inactive</option>
                            <option value="Banned" @selected(old('status', $user->status) === 'Banned')>Banned</option>
                        </select>
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="date_of_birth" class="text-sm font-medium text-gray-900 dark:text-white block mb-2">Date of Birth</label>
                        <input type="date" name="date_of_birth" id="date_of_birth" value="{{ old('date_of_birth', $user->date_of_birth ? \Illuminate\Support\Carbon::parse($user->date_of_birth)->format('Y-m-d') : '') }}" class="shadow-sm bg-gray-50 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:placeholder-gray-400 text-gray-900 dark:text-white sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5">
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="gender" class="text-sm font-medium text-gray-900 dark:text-white block mb-2">Gender</label>
                        <select name="gender" id="gender" class="bg-gray-50 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:placeholder-gray-400 text-gray-900 dark:text-white sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5">
                            <option value="">Select gender</option>
                            <option value="Male" @selected(old('gender', $user->gender) === 'Male')>Male</option>
                            <option value="Female" @selected(old('gender', $user->gender) === 'Female')>Female</option>
                            <option value="Third Gender" @selected(old('gender', $user->gender) === 'Third Gender')>Third Gender</option>
                        </select>
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="country" class="text-sm font-medium text-gray-900 dark:text-white block mb-2">Country</label>
                        <input type="text" name="country" id="country" value="{{ old('country', $user->country) }}" class="shadow-sm bg-gray-50 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:placeholder-gray-400 text-gray-900 dark:text-white sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="Bangladesh">
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="city" class="text-sm font-medium text-gray-900 dark:text-white block mb-2">City</label>
                        <input type="text" name="city" id="city" value="{{ old('city', $user->city) }}" class="shadow-sm bg-gray-50 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:placeholder-gray-400 text-gray-900 dark:text-white sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="Dhaka">
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="zip" class="text-sm font-medium text-gray-900 dark:text-white block mb-2">Zip / Postal Code</label>
                        <input type="text" name="zip" id="zip" value="{{ old('zip', $user->zip) }}" class="shadow-sm bg-gray-50 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:placeholder-gray-400 text-gray-900 dark:text-white sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="1212">
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="address" class="text-sm font-medium text-gray-900 dark:text-white block mb-2">Address</label>
                        <input type="text" name="address" id="address" value="{{ old('address', $user->address) }}" class="shadow-sm bg-gray-50 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:placeholder-gray-400 text-gray-900 dark:text-white sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="Street, area">
                    </div>
                    <div class="col-span-6">
                        <label for="avatar" class="text-sm font-medium text-gray-900 dark:text-white block mb-2">Avatar</label>
                        <input type="file" name="avatar" id="avatar" class="shadow-sm bg-gray-50 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:placeholder-gray-400 text-gray-900 dark:text-white sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5">
                    </div>
                </div>
                <div class="items-center p-6 border-t border-gray-200 dark:border-gray-700 rounded-b mt-6 -mb-6 -mx-6 bg-gray-50 flex justify-end dark:bg-gray-900">
                    <a href="{{ route('admin.users.view') }}" class="text-gray-900 dark:text-white bg-white dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:ring-cyan-200 border border-gray-200 dark:border-gray-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-3">Cancel</a>
                    <button type="submit" class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Update user</button>
                </div>
            </form>
        </div>
    </div>
@endsection
