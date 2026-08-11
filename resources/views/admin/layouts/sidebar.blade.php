<aside id="sidebar" class="fixed hidden z-20 h-full top-0 left-0 pt-16 flex lg:flex flex-shrink-0 flex-col w-64 transition-width duration-75" aria-label="Sidebar">
    <div class="relative flex-1 flex flex-col min-h-0 border-r border-gray-200 bg-white pt-0 dark:bg-gray-800 dark:border-gray-700">
        <div class="flex-1 flex flex-col pt-5 pb-4 overflow-y-auto">
            <div class="flex-1 px-3 bg-white divide-y space-y-1 dark:bg-gray-800">
                <ul class="space-y-2 pb-2">
                    <li>
                        <form action="#" method="GET" class="lg:hidden">
                            <label for="mobile-search" class="sr-only">Search</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i data-lucide="search" class="w-5 h-5 text-gray-500"></i>
                                </div>
                                <input type="text" name="email" id="mobile-search" class="bg-gray-50 border border-gray-300 text-gray-900 dark:text-gray-200 text-sm rounded-lg focus:ring-cyan-600 focus:ring-cyan-600 block w-full pl-10 p-2.5" placeholder="Search">
                            </div>
                        </form>
                    </li>
                    <li>
                        <a href="{{ route('admin.dashboard.view') }}" class="text-base text-gray-900 dark:text-gray-200 font-normal rounded-lg flex items-center p-2 hover:bg-gray-100 dark:hover:bg-gray-700 group {{ request()->routeIs('admin.dashboard.view') ? 'bg-gray-100 dark:bg-gray-700' : '' }}">
                            <i data-lucide="layout-dashboard" class="w-6 h-6 text-gray-500 group-hover:text-gray-900 dark:text-gray-200 transition duration-75"></i>
                            <span class="ml-3">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <button type="button" id="userManagementToggle" class="w-full text-base text-gray-900 dark:text-gray-200 font-normal rounded-lg flex items-center p-2 hover:bg-gray-100 dark:hover:bg-gray-700 group {{ request()->routeIs('admin.users.*', 'admin.users-roles.*') ? 'bg-gray-100 dark:bg-gray-700' : '' }}">
                            <i data-lucide="users" class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 dark:text-gray-200 transition duration-75"></i>
                            <span class="ml-3 flex-1 text-left whitespace-nowrap">User Management</span>
                            <i data-lucide="chevron-down" id="userManagementChevron" class="w-4 h-4 text-gray-500 transition-transform duration-200 {{ request()->routeIs('admin.users.*', 'admin.users-roles.*') ? 'rotate-180' : '' }}"></i>
                        </button>
                        <ul id="userManagementMenu" class="space-y-1 mt-1 pl-4 {{ request()->routeIs('admin.users.*', 'admin.users-roles.*') ? '' : 'hidden' }}">
                            <li>
                                <a href="{{ route('admin.users.view') }}" class="text-base text-gray-900 dark:text-gray-200 font-normal rounded-lg flex items-center p-2 hover:bg-gray-100 dark:hover:bg-gray-700 group {{ request()->routeIs('admin.users.*') ? 'bg-gray-100 dark:bg-gray-700' : '' }}">
                                    <i data-lucide="user" class="w-5 h-5 text-gray-500 flex-shrink-0 group-hover:text-gray-900 dark:text-gray-200 transition duration-75"></i>
                                    <span class="ml-3 flex-1 whitespace-nowrap">Users</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.users-roles.view') }}" class="text-base text-gray-900 dark:text-gray-200 font-normal rounded-lg flex items-center p-2 hover:bg-gray-100 dark:hover:bg-gray-700 group {{ request()->routeIs('admin.users-roles.*') ? 'bg-gray-100 dark:bg-gray-700' : '' }}">
                                    <i data-lucide="user-cog" class="w-5 h-5 text-gray-500 flex-shrink-0 group-hover:text-gray-900 dark:text-gray-200 transition duration-75"></i>
                                    <span class="ml-3 flex-1 whitespace-nowrap">User Roles</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="text-base text-gray-900 dark:text-gray-200 font-normal rounded-lg flex items-center p-2 group">
                            <i data-lucide="package" class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 dark:text-gray-200 transition duration-75"></i>
                            <span class="ml-3 flex-1 whitespace-nowrap">Products</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.login.index') }}" class="text-base text-gray-900 dark:text-gray-200 font-normal rounded-lg flex items-center p-2 group">
                            <i data-lucide="log-in" class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 dark:text-gray-200 transition duration-75"></i>
                            <span class="ml-3 flex-1 whitespace-nowrap">Sign In</span>
                        </a>
                    </li>
                </ul>
                <div class="space-y-2 pt-2">
                    <a href="https://flowbite.com/docs/getting-started/introduction/" target="_blank" class="text-base text-gray-900 dark:text-gray-200 font-normal rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 group transition duration-75 flex items-center p-2">
                        <i data-lucide="book-open" class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 dark:text-gray-200 transition duration-75"></i>
                        <span class="ml-3">Documentation</span>
                    </a>
                    <a href="https://flowbite.com/docs/components/alerts/" target="_blank" class="text-base text-gray-900 dark:text-gray-200 font-normal rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 group transition duration-75 flex items-center p-2">
                        <i data-lucide="puzzle" class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 dark:text-gray-200 transition duration-75"></i>
                        <span class="ml-3">Components</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</aside>

<div class="bg-gray-900 opacity-50 hidden fixed inset-0 z-10" id="sidebarBackdrop"></div>

<script>
    const userManagementToggle = document.getElementById('userManagementToggle');
    const userManagementMenu = document.getElementById('userManagementMenu');
    const userManagementChevron = document.getElementById('userManagementChevron');
    if (userManagementToggle && userManagementMenu) {
        userManagementToggle.addEventListener('click', () => {
            userManagementMenu.classList.toggle('hidden');
            userManagementChevron.classList.toggle('rotate-180');
        });
    }
</script>
