<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@stack('title', 'Page') - {{ $settingItems['site_name']->value ?? 'Site Name' }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    @stack('styles')
</head>

<body class="min-h-screen flex flex-col bg-slate-50 text-slate-800">

    <!-- Navbar -->
    <nav class="bg-gradient-to-r from-indigo-600 via-indigo-500 to-indigo-600 text-white sticky top-0 z-50 shadow">
        <div class="max-w-7xl mx-auto px-4 h-16 flex items-center justify-between">

            <!-- Logo -->
            <a href="/" class="text-xl font-extrabold tracking-tight">
                {{ $settingItems['site_name']->value ?? 'IndigoNews' }}
            </a>

            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center gap-8 text-sm font-medium">
                <a href="/" class="hover:text-indigo-200 transition">Home</a>
                <a href="/kategori" class="hover:text-indigo-200 transition">Kategori</a>
                <a href="/trending" class="hover:text-indigo-200 transition">Trending</a>
                <a href="/login" class="px-4 py-2 rounded-full bg-white text-indigo-700 font-semibold hover:bg-indigo-100 transition">
                    Login
                </a>
            </div>

            <!-- Mobile Button -->
            <button id="menuBtn" class="md:hidden p-2 rounded-full hover:bg-white/10">
                <svg id="iconOpen" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>

                <svg id="iconClose" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div id="mobileMenu" class="hidden md:hidden bg-gradient-to-b from-indigo-600 to-indigo-700 px-4 py-6 space-y-4 text-sm font-medium">
            <a href="/" class="block hover:text-indigo-200">Home</a>
            <a href="/kategori" class="block hover:text-indigo-200">Kategori</a>
            <a href="/trending" class="block hover:text-indigo-200">Trending</a>
            <a href="/login" class="block text-center px-4 py-2 rounded-full bg-white text-indigo-700 font-semibold">
                Login
            </a>
        </div>
    </nav>

    <!-- Body -->
    <main class="flex-1 max-w-7xl mx-auto px-8 py-10">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gradient-to-r from-indigo-700 to-indigo-800 text-indigo-100">
        <div class="max-w-7xl mx-auto px-4 py-10 grid gap-8 md:grid-cols-3 text-sm">
            <div>
                <h4 class="font-semibold text-white mb-2">
                    {{ $settingItems['site_name']->value ?? 'IndigoNews' }}
                </h4>
                <p>Portal berita modern, cepat, dan terpercaya.</p>
            </div>

            <div>
                <h4 class="font-semibold text-white mb-2">Navigasi</h4>
                <ul class="space-y-1">
                    <li><a href="/" class="hover:text-white">Home</a></li>
                    <li><a href="/kategori" class="hover:text-white">Kategori</a></li>
                    <li><a href="/trending" class="hover:text-white">Trending</a></li>
                </ul>
            </div>

            <div class="md:text-right">
                © {{ date('Y') }} All rights reserved
            </div>
        </div>
    </footer>

    <!-- Script -->
    <script>
        const btn = document.getElementById('menuBtn');
        const menu = document.getElementById('mobileMenu');
        const openIcon = document.getElementById('iconOpen');
        const closeIcon = document.getElementById('iconClose');

        btn.onclick = () => {
            menu.classList.toggle('hidden');
            openIcon.classList.toggle('hidden');
            closeIcon.classList.toggle('hidden');
        };
    </script>

</body>


</html>
