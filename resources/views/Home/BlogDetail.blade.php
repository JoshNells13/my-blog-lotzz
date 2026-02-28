@extends('layout.Home')

@section('content')
    <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-12 gap-12 mb-20" x-data="{ loaded: false }"
        x-init="setTimeout(() => loaded = true, 100)">

        <!-- Article Content (75%) -->
        <article class="lg:col-span-8" x-show="loaded" x-transition:enter="transition ease-out duration-1000"
            x-transition:enter-start="opacity-0 translate-y-10" x-transition:enter-end="opacity-100 translate-y-0">
            <!-- Breadcrumbs -->
            <nav class="flex items-center gap-2 text-xs font-semibold uppercase tracking-widest text-neutral-500 mb-8">
                <a href="/" class="hover:text-white transition-colors">Home</a>
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M9 5l7 7-7 7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <a href="{{ route('home.category.show', $Blog->category->slug) }}"
                    class="hover:text-white transition-colors">{{ $Blog->category->name }}</a>
            </nav>

            <!-- Title & Meta -->
            <header class="mb-12">
                <h1 class="text-4xl md:text-6xl font-extrabold text-white mb-10 leading-[1.1] tracking-tight">
                    {{ $Blog->title }}
                </h1>

                <div class="flex flex-wrap items-center gap-6 pb-10 border-b border-white/5">
                    <div class="flex items-center gap-4">
                        <div
                            class="w-12 h-12 rounded-2xl bg-gradient-to-br from-white to-gray-400 flex items-center justify-center font-bold text-black text-xl shadow-xl">
                            J</div>
                        <div>
                            <p class="text-sm font-bold text-white">Joshua</p>
                            <p class="text-[10px] text-neutral-500 uppercase tracking-widest">Author</p>
                        </div>
                    </div>
                    <div class="h-10 w-px bg-white/5 hidden sm:block"></div>
                    <div>
                        <p class="text-neutral-500 mb-1 uppercase tracking-widest text-[10px] font-bold">Published</p>
                        <p class="text-neutral-300 text-sm font-medium">{{ $Blog->created_at->format('M d, Y') }}</p>
                    </div>
                </div>
            </header>

            <!-- Hero Image -->
            <div
                class="relative aspect-[21/9] mb-16 rounded-[2.5rem] overflow-hidden border border-white/10 shadow-2xl group">
                <img src="{{ $Blog->thumbnail_url }}" alt="{{ $Blog->title }}"
                    class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-40"></div>
            </div>

            <!-- Content -->
            <div class="prose prose-invert prose-lg max-w-none 
                                prose-headings:font-bold prose-headings:tracking-tight prose-headings:text-white
                                prose-p:text-neutral-400 prose-p:leading-relaxed prose-p:mb-8
                                prose-strong:text-white prose-strong:font-bold
                                prose-a:text-white prose-a:underline prose-a:underline-offset-4 prose-a:decoration-white/20 hover:prose-a:decoration-white transition-all
                                prose-blockquote:border-l-4 prose-blockquote:border-white prose-blockquote:bg-white/5 prose-blockquote:py-2 prose-blockquote:px-8 prose-blockquote:rounded-r-2xl prose-blockquote:italic prose-blockquote:text-white/80
                                prose-img:rounded-3xl prose-img:border prose-img:border-white/10 prose-img:shadow-2xl
                                mb-24">
                {!! $Blog->content !!}
            </div>
        </article>

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
                    @foreach($Categories as $cat)
                        <a href="{{ route('home.category.show', $cat->slug) }}"
                            class="px-5 py-2.5 bg-white/5 rounded-xl text-xs font-bold text-neutral-400 hover:text-white border border-white/5 hover:border-white/20 transition-all">
                            {{ $cat->name }}
                        </a>
                    @endforeach
                </div>
            </div>

        </aside>
    </div>
@endsection