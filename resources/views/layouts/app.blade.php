<!doctype html>
<html lang="en" class="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Tailwind CSS Admin Dashboard - Flowbite</title>
    <link rel="shortcut icon" href="{{ asset('assets/img/logo.svg') }}" type="image/x-icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/css/flowbite-admin.css', 'resources/js/app.bundle.js'])

    <script>
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
</head>

<body class="bg-gray-50 dark:bg-gray-800 scrollbar-custom">
    @include('partials.navbar')

    <div class="flex pt-16 overflow-hidden bg-gray-50 dark:bg-gray-900 ">

        @include('partials.sidebar')

        <div class="fixed inset-0 z-10 hidden bg-gray-900/50 dark:bg-gray-900/90" id="sidebarBackdrop"></div>

        <div id="main-content" class="relative w-full h-full overflow-y-auto bg-gray-50 lg:ml-64 dark:bg-gray-900">
            <main>
                <div class="grid grid-cols-1 px-4 pt-6 xl:grid-cols-3 xl:gap-4 bg-gray-50 dark:bg-gray-900">
                    @yield('nav-content')
                </div>
                @yield('content')
            </main>

            <footer
                class="p-4 my-6 mx-4 bg-white rounded-lg shadow md:flex md:items-center md:justify-between md:p-6 xl:p-8 dark:bg-gray-800">
                @include('partials.footer')
            </footer>
            {{-- <p class="my-10 text-sm text-center text-gray-500">
                &copy; 2019-2025 <a href="https://flowbite.com/" class="hover:underline"
                    target="_blank">Flowbite.com</a>. All rights reserved.
            </p> --}}

        </div>

    </div>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>
