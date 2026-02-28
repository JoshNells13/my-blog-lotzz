<!DOCTYPE html>
<html lang="id" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lotzz| Personal Blog</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        [x-cloak] { display: none !important; }
        .glass {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        .text-gradient {
            background: linear-gradient(to right, #ffffff, #a1a1aa, #ffffff);
            background-size: 200% auto;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: gradient-x 5s linear infinite;
        }
        @keyframes gradient-x {
            0% { background-position: 0% center; }
            100% { background-position: 200% center; }
        }
        .noise {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 9999;
            pointer-events: none;
            opacity: 0.03;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noiseFilter'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.65' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noiseFilter)'/%3E%3C/svg%3E");
        }
        .nav-link-active::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 100%;
            height: 2px;
            background: linear-gradient(to right, #ffffff, transparent);
            animation: slide-in 0.3s ease-out;
        }
        @keyframes slide-in {
            from { width: 0; opacity: 0; }
            to { width: 100%; opacity: 1; }
        }
    </style>
</head>

<body class="bg-[#0f0f0f] text-gray-300 font-sans selection:bg-white/10 selection:text-white overflow-x-hidden">
    <div class="noise"></div>

    <!-- Navbar -->
    <nav class="fixed top-0 left-0 right-0 z-50 glass border-b border-white/5" x-data="{ atTop: true }" @scroll.window="atTop = (window.pageYOffset > 10 ? false : true)">
        <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">
            <a href="/" class="group flex items-center gap-3">
                <div class="w-10 h-10 bg-gradient-to-br from-white to-gray-400 rounded-xl flex items-center justify-center group-hover:rotate-6 transition-transform duration-500 shadow-[0_0_20px_rgba(255,255,255,0.1)]">
                    <span class="text-black font-bold text-xl">L</span>
                </div>
                <div class="flex flex-col">
                    <span class="text-white font-bold text-lg leading-none tracking-tight">Joshua</span>
                    <span class="text-[10px] text-neutral-500 font-medium uppercase tracking-[0.2em]">Lotzz Blog</span>
                </div>
            </a>

            <div class="hidden md:flex items-center gap-10">
                <div class="flex items-center gap-8">
                    @php 
                        $navItems = [
                            ['name' => 'Beranda', 'url' => route('home'), 'active' => request()->routeIs('home')],
                        ]; 
                    @endphp
                    @foreach($navItems as $item)
                        <a href="{{ $item['url'] }}" class="relative group py-2 text-sm font-medium {{ $item['active'] ? 'text-white nav-link-active' : 'text-neutral-500 hover:text-white' }} transition-colors duration-300">
                            {{ $item['name'] }}
                            @if(!$item['active'])
                                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-gradient-to-r from-white to-transparent transition-all duration-300 group-hover:w-full"></span>
                            @endif
                        </a>
                    @endforeach
                </div>
                
                <div class="h-6 w-px bg-white/10 mx-2"></div>

                <button class="px-6 py-2.5 bg-white text-black text-sm font-bold rounded-full hover:bg-neutral-200 hover:shadow-[0_0_25px_rgba(255,255,255,0.2)] transition-all duration-300 scale-100 hover:scale-105 active:scale-95">
                    Hubungi Saya
                </button>
            </div>

            <!-- Mobile Menu Toggle -->
            <button class="md:hidden text-white w-10 h-10 flex items-center justify-center glass rounded-xl">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="pt-32 pb-20 min-h-screen relative z-10">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="relative z-10 border-t border-white/5 bg-black/40 backdrop-blur-sm pt-20 pb-12">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex flex-col md:flex-row justify-between items-start gap-12 mb-16">
                <div class="max-w-sm">
                    <a href="/" class="flex items-center gap-3 mb-6">
                        <div class="w-8 h-8 bg-white rounded-lg flex items-center justify-center">
                            <span class="text-black font-bold text-sm">J</span>
                        </div>
                        <span class="text-white font-bold text-xl tracking-tight">Joshua<span class="text-neutral-500">.blog</span></span>
                    </a>
                    <p class="text-neutral-500 leading-relaxed mb-8">
                        Berbagi pemikiran seputar pengembangan web modern, desain antarmuka, dan efisiensi teknologi.
                    </p>
                    <div class="flex gap-3">
                        @foreach(['Twitter', 'GitHub', 'LinkedIn'] as $social)
                            <a href="#" class="px-4 py-2 bg-white/5 hover:bg-white/10 border border-white/10 rounded-xl text-xs font-semibold text-neutral-400 hover:text-white transition-all duration-300">
                                {{ $social }}
                            </a>
                        @endforeach
                    </div>
                </div>
                
                <div class="grid grid-cols-2 gap-16">
                    <div>
                        <h4 class="text-white font-bold text-sm uppercase tracking-widest mb-6 border-l-2 border-white pl-4">Menu</h4>
                        <ul class="space-y-4">
                            @foreach(['Home', 'Blog Archive', 'Projects', 'Uses'] as $link)
                                <li><a href="#" class="text-neutral-500 hover:text-white transition-colors duration-300 text-sm font-medium">{{ $link }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div>
                        <h4 class="text-white font-bold text-sm uppercase tracking-widest mb-6 border-l-2 border-white/20 pl-4">Legal</h4>
                        <ul class="space-y-4">
                            @foreach(['Privacy', 'Terms', 'License'] as $link)
                                <li><a href="#" class="text-neutral-500 hover:text-white transition-colors duration-300 text-sm font-medium">{{ $link }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <div class="pt-12 border-t border-white/5 flex flex-col md:flex-row justify-between items-center gap-6">
                <p class="text-neutral-600 text-xs font-medium">
                    © {{ date('Y') }} Joshua. Built with Laravel & Tailwind.
                </p>
                <div class="flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></span>
                    <span class="text-neutral-600 text-[10px] uppercase font-bold tracking-widest">Available for projects</span>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>
