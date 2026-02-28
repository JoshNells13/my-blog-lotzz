@extends('layout.Home')

@section('content')



    <!-- Main Content Layout -->
    <div id="articles" class="max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-12 gap-12 mb-20">

        <!-- Blog Grid (75%) -->
        <div class="lg:col-span-8">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6 mb-12">
                <div class="flex gap-2 p-1 glass rounded-2xl overflow-x-auto no-scrollbar max-w-full">
                    <a href="{{ route('home') }}"
                        class="px-5 py-2.5 rounded-xl text-sm font-medium transition-all duration-300 {{ !request('category') ? 'bg-white text-black shadow-lg shadow-white/10' : 'text-neutral-400 hover:text-white' }}">
                        Semua
                    </a>
                    @if ($Categories->isNotEmpty())
                        @foreach ($Categories as $cat)
                            <a href="{{ route('home.category.show', $cat->slug) }}"
                                class="px-5 py-2.5 rounded-xl text-sm font-medium transition-all duration-300 whitespace-nowrap text-neutral-400 hover:text-white">
                                {{ $cat->name }}
                            </a>
                        @endforeach
                    @endif
                </div>

                <div class="relative w-full md:w-64 group">
                    <form action="{{ route('home.search') }}" method="GET">
                        <input type="text" name="query" placeholder="Cari..."
                            class="w-full pl-10 pr-4 py-2 bg-white/5 border border-white/10 rounded-xl text-sm focus:outline-none focus:border-white/20 transition-all focus:bg-white/10" />
                        <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-neutral-500 group-focus-within:text-white transition-colors"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </form>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @if ($Blog->isNotEmpty())
                    @foreach ($Blog as $blog)
                        <article
                            class="group relative flex flex-col h-full bg-white/[0.02] rounded-[2rem] border border-white/5 overflow-hidden transition-all duration-500 hover:bg-white/[0.04] hover:border-white/20 hover:-translate-y-2">
                            <div class="relative aspect-[16/10] overflow-hidden m-2 rounded-[1.5rem]">
                                <img src="{{ $blog->thumbnail_url }}" alt="{{ $blog->title }}"
                                    class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                                <div class="absolute top-4 left-4">
                                    <span
                                        class="px-4 py-1.5 glass text-[10px] font-bold uppercase tracking-widest text-white rounded-full">
                                        {{ $blog->category->name }}
                                    </span>
                                </div>
                            </div>
                            <div class="p-8 flex flex-col flex-grow">
                                <span
                                    class="text-xs font-semibold text-neutral-500 mb-4 block uppercase tracking-tighter">{{ $blog->created_at->format('M d, Y') }}</span>
                                <h3
                                    class="text-2xl font-bold text-white mb-4 leading-tight group-hover:text-transparent group-hover:bg-clip-text group-hover:bg-gradient-to-r group-hover:from-white group-hover:to-neutral-400 transition-all">
                                    <a href="{{ route('home.blog.show', $blog->slug) }}">{{ $blog->title }}</a>
                                </h3>
                                <p class="text-neutral-500 text-sm leading-relaxed mb-8 line-clamp-3">
                                    {{ $blog->description }}
                                </p>
                                <div class="mt-auto pt-6 border-t border-white/5 flex items-center justify-between">
                                    <a href="{{ route('home.blog.show', $blog->slug) }}"
                                        class="flex items-center gap-2 text-white font-bold text-sm group/btn">
                                        Baca Lanjut
                                        <svg class="w-4 h-4 transition-transform group-hover/btn:translate-x-1" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </article>
                    @endforeach
                @endif
            </div>

            @if ($Blog->hasPages())
                <div class="mt-16">
                    {{ $Blog->links('vendor.pagination.custom') }}
                </div>
            @endif
        </div>

        <!-- Sidebar (25%) -->
        <aside class="lg:col-span-4 space-y-12">
            <!-- About Me Card -->
            <div class="glass rounded-[2rem] p-8 relative overflow-hidden group">
                <div
                    class="absolute -top-12 -right-12 w-32 h-32 bg-white/5 rounded-full blur-2xl group-hover:bg-white/10 transition-colors">
                </div>
                <h3 class="text-xl font-bold text-white mb-6 flex items-center gap-3">
                    <span
                        class="w-6 h-6 rounded-full border border-white/20 flex items-center justify-center text-[10px]">i</span>
                    About Me
                </h3>
                <div class="flex items-center gap-4 mb-6">
                    <div
                        class="w-16 h-16 rounded-2xl bg-gradient-to-br from-white to-gray-400 flex items-center justify-center font-bold text-black text-2xl shadow-xl">
                        J</div>
                    <div>
                        <p class="text-white font-bold">Joshua</p>
                        <p class="text-xs text-neutral-500">Fullstack Developer</p>
                    </div>
                </div>
                <p class="text-neutral-500 text-sm leading-relaxed mb-8">
                    Menelusuri batas antara desain dan pengembangan. Berfokus pada pembangunan produk digital yang estetik
                    dan fungsional.
                </p>
            </div>

            <!-- Categories Card -->
            <div class="glass rounded-[2rem] p-8">
                <h3 class="text-xl font-bold text-white mb-8 border-b border-white/5 pb-4">Kategori</h3>
                <div class="flex flex-wrap gap-2">
                    @foreach($Categories as $category)
                        <a href="{{ route('home.category.show', $category->slug) }}"
                            class="px-5 py-2.5 bg-white/5 rounded-xl text-xs font-bold text-neutral-400 hover:text-white border border-white/5 hover:border-white/20 transition-all">
                            {{ $category->name }}
                        </a>
                    @endforeach
                </div>
            </div>

            <!-- Newsletter Card -->

        </aside>
    </div>
@endsection