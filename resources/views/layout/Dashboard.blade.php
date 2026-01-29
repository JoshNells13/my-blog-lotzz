<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin Blog</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-950 text-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar Navigation -->
        <aside class="w-64 bg-gray-900 border-r border-gray-800 fixed h-screen overflow-y-auto">
            <div class="p-6 border-b border-gray-800">
                <h2 class="text-xl font-bold text-white italic">LotzzBlog</h2>
            </div>
            <nav class="p-4 space-y-2">
                <a href="{{ route('dashboard') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded  font-medium transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-3m0 0l7-4 7 4M5 9v10a1 1 0 001 1h12a1 1 0 001-1V9" />
                    </svg>
                    Dashboard
                </a>
                <a href="{{ route('admin.blogs.index') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded text-gray-400 hover:text-white hover:bg-gray-800 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6.253v13m0-13C6.248 6.248 2 10.248 2 15s4.248 8.75 10 8.75c5.378 0 9.337-3.582 9.927-8.75" />
                    </svg>
                    Blog
                </a>
                <a href="{{ route('admin.categories.index') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded text-gray-400 hover:text-white hover:bg-gray-800 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a6 6 0 016 6v10a2 2 0 01-2 2h-4.5" />
                    </svg>
                    Kategori
                </a>
                <a href="{{ route('logout') }}" onclick="return confirm('Yakin Ingin Keluar')"
                    class="flex items-center gap-3 px-4 py-3 rounded text-gray-400 hover:text-white hover:bg-gray-800 transition mt-8">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    Logout
                </a>
            </nav>
        </aside>


        <!-- Main Content -->
        <main class="ml-64 flex-1 overflow-auto">

            @if (session()->has('success'))
                <div
                    class="flash-message mb-4 flex items-center justify-between rounded-lg bg-green-500/10 border border-green-500/20 px-4 py-3 text-green-400">
                    <span>{{ session('success') }}</span>
                    <button class="flash-close text-green-400 hover:text-green-300">✕</button>
                </div>
            @endif
            @if (session()->has('error'))
                <div
                    class="flash-message mb-4 flex items-center justify-between rounded-lg bg-red-500/10 border border-red-500/20 px-4 py-3 text-red-400">
                    <span>{{ session('error') }}</span>
                    <button class="flash-close text-red-400 hover:text-red-300">✕</button>
                </div>
            @endif
            @if (session()->has('info'))
                <div
                    class="flash-message mb-4 flex items-center justify-between rounded-lg bg-blue-500/10 border border-blue-500/20 px-4 py-3 text-blue-400">
                    <span>{{ session('info') }}</span>
                    <button class="flash-close text-blue-400 hover:text-blue-300">✕</button>
                </div>
            @endif
            @if (session()->has('warning'))
                <div
                    class="flash-message mb-4 flex items-center justify-between rounded-lg bg-yellow-500/10 border border-yellow-500/20 px-4 py-3 text-yellow-400">
                    <span>{{ session('warning') }}</span>
                    <button class="flash-close text-yellow-400 hover:text-yellow-300">✕</button>
                </div>
            @endif





            @yield('content')
        </main>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const closeButtons = document.querySelectorAll('.flash-close');

            closeButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    const flash = this.closest('.flash-message');
                    if (flash) {
                        flash.remove();
                    }
                });
            });
        });
    </script>


</body>

</html>
