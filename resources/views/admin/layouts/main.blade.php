<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard - Admin</title>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        @vite('resources/css/app.css')
    @endif
    <script>
        (function() {
            const stored = localStorage.getItem('theme');
            if (stored === 'dark' || (!stored && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark');
            }
        })();
    </script>
</head>

<body class="bg-gray-50 antialiased dark:bg-gray-900">

    <!-- Navbar -->
    @include('admin.layouts.navbar')

    <div class="flex overflow-hidden bg-white pt-16 dark:bg-gray-800">
        <!-- Sidebar -->
        @include('admin.layouts.sidebar')

        <!-- Main content -->
        <div id="main-content" class="h-full w-full bg-gray-50 relative overflow-y-auto lg:ml-64 dark:bg-gray-900">
            <main>
                @yield('content')
            </main>
        </div>

    </div>

    <!-- jQuery cdn -->
    <script src="https://code.jquery.com/jquery-4.0.0.slim.min.js" integrity="sha256-8DGpv13HIm+5iDNWw1XqxgFB4mj+yOKFNb+tHBZOowc=" crossorigin="anonymous"></script>
    <!-- Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script>
        lucide.createIcons();
    </script>
</body>

</html>
