<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard - Admin</title>
    @vite(['resources/css/app.css'])
</head>

<body class="bg-gray-50 antialiased">

    <!-- Navbar -->
    <nav class="bg-white border-b border-gray-200 fixed z-30 w-full">
        <div class="px-3 py-3 lg:px-5 lg:pl-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center justify-start">
                    <button id="toggleSidebarMobile" aria-expanded="true" aria-controls="sidebar" class="lg:hidden mr-2 text-gray-600 hover:text-gray-900 cursor-pointer p-2 hover:bg-gray-100 focus:bg-gray-100 focus:ring-2 focus:ring-gray-100 rounded">
                        <svg id="toggleSidebarMobileHamburger" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                        <svg id="toggleSidebarMobileClose" class="w-6 h-6 hidden" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                    <a href="/" class="text-xl font-bold flex items-center lg:ml-2.5">
                        <img src="/images/logo.svg" class="h-6 mr-2" alt="Windster Logo">
                        <span class="self-center whitespace-nowrap">Windster</span>
                    </a>
                    <form action="#" method="GET" class="hidden lg:block lg:pl-32">
                        <label for="topbar-search" class="sr-only">Search</label>
                        <div class="mt-1 relative lg:w-64">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                            </div>
                            <input type="text" name="email" id="topbar-search" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full pl-10 p-2.5" placeholder="Search">
                        </div>
                    </form>
                </div>
                <div class="flex items-center">
                    <button id="toggleSidebarMobileSearch" type="button" class="lg:hidden text-gray-500 hover:text-gray-900 hover:bg-gray-100 p-2 rounded-lg">
                        <span class="sr-only">Search</span>
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                    </button>
                    <div class="hidden lg:flex items-center">
                        <span class="text-base font-normal text-gray-500 mr-5">Open source ❤️</span>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="flex overflow-hidden bg-white pt-16">

        <!-- Sidebar -->
        <aside id="sidebar" class="fixed hidden z-20 h-full top-0 left-0 pt-16 flex lg:flex flex-shrink-0 flex-col w-64 transition-width duration-75" aria-label="Sidebar">
            <div class="relative flex-1 flex flex-col min-h-0 border-r border-gray-200 bg-white pt-0">
                <div class="flex-1 flex flex-col pt-5 pb-4 overflow-y-auto">
                    <div class="flex-1 px-3 bg-white divide-y space-y-1">
                        <ul class="space-y-2 pb-2">
                            <li>
                                <form action="#" method="GET" class="lg:hidden">
                                    <label for="mobile-search" class="sr-only">Search</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                                        </div>
                                        <input type="text" name="email" id="mobile-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-cyan-600 focus:ring-cyan-600 block w-full pl-10 p-2.5" placeholder="Search">
                                    </div>
                                </form>
                            </li>
                            <li>
                                <a href="/" class="text-base text-gray-900 font-normal rounded-lg flex items-center p-2 hover:bg-gray-100 group">
                                    <svg class="w-6 h-6 text-gray-500 group-hover:text-gray-900 transition duration-75" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path><path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path></svg>
                                    <span class="ml-3">Dashboard</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-base text-gray-900 font-normal rounded-lg flex items-center p-2 group">
                                    <svg class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                                    <span class="ml-3 flex-1 whitespace-nowrap">Users</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-base text-gray-900 font-normal rounded-lg flex items-center p-2 group">
                                    <svg class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"></path></svg>
                                    <span class="ml-3 flex-1 whitespace-nowrap">Products</span>
                                </a>
                            </li>
                            <li>
                                <a href="/admin/login" class="text-base text-gray-900 font-normal rounded-lg flex items-center p-2 group">
                                    <svg class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd"></path></svg>
                                    <span class="ml-3 flex-1 whitespace-nowrap">Sign In</span>
                                </a>
                            </li>
                        </ul>
                        <div class="space-y-2 pt-2">
                            <a href="https://flowbite.com/docs/getting-started/introduction/" target="_blank" class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 group transition duration-75 flex items-center p-2">
                                <svg class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path><path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"></path></svg>
                                <span class="ml-3">Documentation</span>
                            </a>
                            <a href="https://flowbite.com/docs/components/alerts/" target="_blank" class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 group transition duration-75 flex items-center p-2">
                                <svg class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z"></path></svg>
                                <span class="ml-3">Components</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </aside>

        <div class="bg-gray-900 opacity-50 hidden fixed inset-0 z-10" id="sidebarBackdrop"></div>

        <!-- Main content -->
        <div id="main-content" class="h-full w-full bg-gray-50 relative overflow-y-auto lg:ml-64">
            <main>
                <div class="pt-6 px-4">
                    <div class="w-full grid grid-cols-1 xl:grid-cols-2 2xl:grid-cols-3 gap-4">
                        <!-- Sales this week Card -->
                        <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 2xl:col-span-2">
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex-shrink-0">
                                    <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">$45,385</span>
                                    <h3 class="text-base font-normal text-gray-500">Sales this week</h3>
                                </div>
                                <div class="flex items-center justify-end flex-1 text-green-500 text-base font-bold">
                                    12.5%
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            </div>
                            <div id="main-chart"></div>
                        </div>

                        <!-- Latest Transactions Card -->
                        <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8">
                            <div class="mb-4 flex items-center justify-between">
                                <div>
                                    <h3 class="text-xl font-bold text-gray-900 mb-2">Latest Transactions</h3>
                                    <span class="text-base font-normal text-gray-500">This is a list of latest transactions</span>
                                </div>
                                <div class="flex-shrink-0">
                                    <a href="#" class="text-sm font-medium text-cyan-600 hover:bg-gray-100 rounded-lg p-2">View all</a>
                                </div>
                            </div>
                            <div class="flex flex-col mt-8">
                                <div class="overflow-x-auto rounded-lg">
                                    <div class="align-middle inline-block min-w-full">
                                        <div class="shadow overflow-hidden sm:rounded-lg">
                                            <table class="min-w-full divide-y divide-gray-200">
                                                <thead class="bg-gray-50">
                                                    <tr>
                                                        <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Transaction</th>
                                                        <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date & Time</th>
                                                        <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Amount</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="bg-white">
                                                    <tr>
                                                        <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900">Payment from <span class="font-semibold">Bonnie Green</span></td>
                                                        <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500">Apr 23 ,2021</td>
                                                        <td class="p-4 whitespace-nowrap text-sm font-semibold text-gray-900">$2300</td>
                                                    </tr>
                                                    <tr class="bg-gray-50">
                                                        <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900 rounded-lg rounded-left">Payment refund to <span class="font-semibold">#00910</span></td>
                                                        <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500">Apr 23 ,2021</td>
                                                        <td class="p-4 whitespace-nowrap text-sm font-semibold text-gray-900">-$670</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900">Payment failed from <span class="font-semibold">#087651</span></td>
                                                        <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500">Apr 18 ,2021</td>
                                                        <td class="p-4 whitespace-nowrap text-sm font-semibold text-gray-900">$234</td>
                                                    </tr>
                                                    <tr class="bg-gray-50">
                                                        <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900 rounded-lg rounded-left">Payment from <span class="font-semibold">Lana Byrd</span></td>
                                                        <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500">Apr 15 ,2021</td>
                                                        <td class="p-4 whitespace-nowrap text-sm font-semibold text-gray-900">$5000</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900">Payment from <span class="font-semibold">Jese Leos</span></td>
                                                        <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500">Apr 15 ,2021</td>
                                                        <td class="p-4 whitespace-nowrap text-sm font-semibold text-gray-900">$2300</td>
                                                    </tr>
                                                    <tr class="bg-gray-50">
                                                        <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900 rounded-lg rounded-left">Payment from <span class="font-semibold">THEMESBERG LLC</span></td>
                                                        <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500">Apr 11 ,2021</td>
                                                        <td class="p-4 whitespace-nowrap text-sm font-semibold text-gray-900">$560</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900">Payment from <span class="font-semibold">Lana Lysle</span></td>
                                                        <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500">Apr 6 ,2021</td>
                                                        <td class="p-4 whitespace-nowrap text-sm font-semibold text-gray-900">$1437</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Stats Cards -->
                    <div class="mt-4 w-full grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
                        <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">2,340</span>
                                    <h3 class="text-base font-normal text-gray-500">New products this week</h3>
                                </div>
                                <div class="ml-5 w-0 flex items-center justify-end flex-1 text-green-500 text-base font-bold">
                                    14.6%
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">5,355</span>
                                    <h3 class="text-base font-normal text-gray-500">Visitors this week</h3>
                                </div>
                                <div class="ml-5 w-0 flex items-center justify-end flex-1 text-green-500 text-base font-bold">
                                    32.9%
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">385</span>
                                    <h3 class="text-base font-normal text-gray-500">User signups this week</h3>
                                </div>
                                <div class="ml-5 w-0 flex items-center justify-end flex-1 text-red-500 text-base font-bold">
                                    -2.7%
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M14.707 12.293a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 14.586V3a1 1 0 012 0v11.586l2.293-2.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Latest Customers & Acquisition -->
                    <div class="grid grid-cols-1 2xl:grid-cols-2 xl:gap-4 my-4">
                        <div class="bg-white shadow rounded-lg mb-4 p-4 sm:p-6 h-full">
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="text-xl font-bold leading-none text-gray-900">Latest Customers</h3>
                                <a href="#" class="text-sm font-medium text-cyan-600 hover:bg-gray-100 rounded-lg inline-flex items-center p-2">View all</a>
                            </div>
                            <div class="flow-root">
                                <ul role="list" class="divide-y divide-gray-200">
                                    <li class="py-3 sm:py-4">
                                        <div class="flex items-center space-x-4">
                                            <div class="flex-shrink-0">
                                                <img class="h-8 w-8 rounded-full" src="/images/users/neil-sims.png" alt="Neil image">
                                            </div>
                                            <div class="flex-1 min-w-0">
                                                <p class="text-sm font-medium text-gray-900 truncate">Neil Sims</p>
                                                <p class="text-sm text-gray-500 truncate">email@windster.com</p>
                                            </div>
                                            <div class="inline-flex items-center text-base font-semibold text-gray-900">$320</div>
                                        </div>
                                    </li>
                                    <li class="py-3 sm:py-4">
                                        <div class="flex items-center space-x-4">
                                            <div class="flex-shrink-0">
                                                <img class="h-8 w-8 rounded-full" src="/images/users/bonnie-green.png" alt="Neil image">
                                            </div>
                                            <div class="flex-1 min-w-0">
                                                <p class="text-sm font-medium text-gray-900 truncate">Bonnie Green</p>
                                                <p class="text-sm text-gray-500 truncate">email@windster.com</p>
                                            </div>
                                            <div class="inline-flex items-center text-base font-semibold text-gray-900">$3467</div>
                                        </div>
                                    </li>
                                    <li class="py-3 sm:py-4">
                                        <div class="flex items-center space-x-4">
                                            <div class="flex-shrink-0">
                                                <img class="h-8 w-8 rounded-full" src="/images/users/michael-gough.png" alt="Neil image">
                                            </div>
                                            <div class="flex-1 min-w-0">
                                                <p class="text-sm font-medium text-gray-900 truncate">Michael Gough</p>
                                                <p class="text-sm text-gray-500 truncate">email@windster.com</p>
                                            </div>
                                            <div class="inline-flex items-center text-base font-semibold text-gray-900">$67</div>
                                        </div>
                                    </li>
                                    <li class="py-3 sm:py-4">
                                        <div class="flex items-center space-x-4">
                                            <div class="flex-shrink-0">
                                                <img class="h-8 w-8 rounded-full" src="/images/users/thomas-lean.png" alt="Neil image">
                                            </div>
                                            <div class="flex-1 min-w-0">
                                                <p class="text-sm font-medium text-gray-900 truncate">Thomes Lean</p>
                                                <p class="text-sm text-gray-500 truncate">email@windster.com</p>
                                            </div>
                                            <div class="inline-flex items-center text-base font-semibold text-gray-900">$2367</div>
                                        </div>
                                    </li>
                                    <li class="pt-3 sm:pt-4 pb-0">
                                        <div class="flex items-center space-x-4">
                                            <div class="flex-shrink-0">
                                                <img class="h-8 w-8 rounded-full" src="/images/users/lana-byrd.png" alt="Neil image">
                                            </div>
                                            <div class="flex-1 min-w-0">
                                                <p class="text-sm font-medium text-gray-900 truncate">Lana Byrd</p>
                                                <p class="text-sm text-gray-500 truncate">email@windster.com</p>
                                            </div>
                                            <div class="inline-flex items-center text-base font-semibold text-gray-900">$367</div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Acquisition Overview Card -->
                        <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 mb-4">
                            <h3 class="text-xl leading-none font-bold text-gray-900 mb-10">Acquisition Overview</h3>
                            <div class="block w-full overflow-x-auto">
                                <table class="items-center w-full bg-transparent border-collapse">
                                    <thead>
                                        <tr>
                                            <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Top Channels</th>
                                            <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Users</th>
                                            <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px"></th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-100">
                                        <tr class="text-gray-500">
                                            <th class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">Organic Search</th>
                                            <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">5,649</td>
                                            <td class="border-t-0 px-4 align-middle text-xs whitespace-nowrap p-4">
                                                <div class="flex items-center">
                                                    <span class="mr-2 text-xs font-medium">30%</span>
                                                    <div class="relative w-full">
                                                        <div class="w-full bg-gray-200 rounded-sm h-2">
                                                            <div class="bg-cyan-600 h-2 rounded-sm" style="width: 30%"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="text-gray-500">
                                            <th class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">Referral</th>
                                            <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">4,025</td>
                                            <td class="border-t-0 px-4 align-middle text-xs whitespace-nowrap p-4">
                                                <div class="flex items-center">
                                                    <span class="mr-2 text-xs font-medium">24%</span>
                                                    <div class="relative w-full">
                                                        <div class="w-full bg-gray-200 rounded-sm h-2">
                                                            <div class="bg-orange-300 h-2 rounded-sm" style="width: 24%"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="text-gray-500">
                                            <th class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">Direct</th>
                                            <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">3,105</td>
                                            <td class="border-t-0 px-4 align-middle text-xs whitespace-nowrap p-4">
                                                <div class="flex items-center">
                                                    <span class="mr-2 text-xs font-medium">18%</span>
                                                    <div class="relative w-full">
                                                        <div class="w-full bg-gray-200 rounded-sm h-2">
                                                            <div class="bg-teal-400 h-2 rounded-sm" style="width: 18%"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="text-gray-500">
                                            <th class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">Social</th>
                                            <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">1251</td>
                                            <td class="border-t-0 px-4 align-middle text-xs whitespace-nowrap p-4">
                                                <div class="flex items-center">
                                                    <span class="mr-2 text-xs font-medium">12%</span>
                                                    <div class="relative w-full">
                                                        <div class="w-full bg-gray-200 rounded-sm h-2">
                                                            <div class="bg-pink-600 h-2 rounded-sm" style="width: 12%"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="text-gray-500">
                                            <th class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">Other</th>
                                            <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">734</td>
                                            <td class="border-t-0 px-4 align-middle text-xs whitespace-nowrap p-4">
                                                <div class="flex items-center">
                                                    <span class="mr-2 text-xs font-medium">9%</span>
                                                    <div class="relative w-full">
                                                        <div class="w-full bg-gray-200 rounded-sm h-2">
                                                            <div class="bg-indigo-600 h-2 rounded-sm" style="width: 9%"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="text-gray-500">
                                            <th class="border-t-0 align-middle text-sm font-normal whitespace-nowrap p-4 pb-0 text-left">Email</th>
                                            <td class="border-t-0 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4 pb-0">456</td>
                                            <td class="border-t-0 align-middle text-xs whitespace-nowrap p-4 pb-0">
                                                <div class="flex items-center">
                                                    <span class="mr-2 text-xs font-medium">7%</span>
                                                    <div class="relative w-full">
                                                        <div class="w-full bg-gray-200 rounded-sm h-2">
                                                            <div class="bg-purple-500 h-2 rounded-sm" style="width: 7%"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>

    </div>

    <script>
        const sidebar = document.getElementById('sidebar');
        const toggleSidebarMobile = (sidebar, sidebarBackdrop, toggleSidebarMobileHamburger, toggleSidebarMobileClose) => {
            sidebar.classList.toggle('hidden');
            sidebarBackdrop.classList.toggle('hidden');
            toggleSidebarMobileHamburger.classList.toggle('hidden');
            toggleSidebarMobileClose.classList.toggle('hidden');
        };
        const toggleSidebarMobileEl = document.getElementById('toggleSidebarMobile');
        const sidebarBackdrop = document.getElementById('sidebarBackdrop');
        const toggleSidebarMobileHamburger = document.getElementById('toggleSidebarMobileHamburger');
        const toggleSidebarMobileClose = document.getElementById('toggleSidebarMobileClose');
        const toggleSidebarMobileSearch = document.getElementById('toggleSidebarMobileSearch');
        toggleSidebarMobileSearch.addEventListener('click', () => {
            toggleSidebarMobile(sidebar, sidebarBackdrop, toggleSidebarMobileHamburger, toggleSidebarMobileClose);
        });
        toggleSidebarMobileEl.addEventListener('click', () => {
            toggleSidebarMobile(sidebar, sidebarBackdrop, toggleSidebarMobileHamburger, toggleSidebarMobileClose);
        });
        sidebarBackdrop.addEventListener('click', () => {
            toggleSidebarMobile(sidebar, sidebarBackdrop, toggleSidebarMobileHamburger, toggleSidebarMobileClose);
        });
    </script>
</body>

</html>
