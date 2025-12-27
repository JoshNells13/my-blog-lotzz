<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Blog | LotzzBlog</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-black text-gray-100">
    <!-- Header -->
    <header class="sticky top-0 bg-black border-b border-gray-800">
        <div class="max-w-4xl mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <a href="/" class="text-white font-bold text-4xl italic">LotzzBlog</a>
                <div class="flex items-center gap-4">
                    <a href="/" class="px-4 py-2 text-gray-400 hover:text-white transition font-medium">Home</a>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="min-h-screen max-w-6xl mx-auto px-6 py-12">
        @yield('content')

        {{-- <!-- Pagination -->
        <div class="flex justify-center items-center gap-2 mt-16">
            <button class="px-3 py-2 rounded bg-gray-800 text-gray-400 hover:bg-gray-700 transition text-sm">
                ← Sebelumnya
            </button>
            <button class="px-3 py-2 rounded bg-white text-gray-950 font-medium text-sm">
                1
            </button>
            <button class="px-3 py-2 rounded bg-gray-800 text-gray-400 hover:bg-gray-700 transition text-sm">
                2
            </button>
            <button class="px-3 py-2 rounded bg-gray-800 text-gray-400 hover:bg-gray-700 transition text-sm">
                3
            </button>
            <button class="px-3 py-2 rounded bg-gray-800 text-gray-400 hover:bg-gray-700 transition text-sm">
                Selanjutnya →
            </button>
        </div> --}}
    </main>

    <!-- Footer -->
    <footer class="border-t border-gray-800 mt-20 py-8">
        <div class="max-w-6xl mx-auto px-6 text-center text-gray-500 text-sm">
            <p>© 2025 My Blog. Semua hak cipta dilindungi.</p>
        </div>
    </footer>
</body>

</html>
