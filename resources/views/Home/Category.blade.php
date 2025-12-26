
 @extends('layout.Home')


 @section('content')
        <!-- Filter Category -->
        <div class="mb-12">
            <div class="flex gap-3 flex-wrap">
                <a href="{{ route('home') }}"
                    class="px-4 py-2 bg-white text-gray-950 rounded text-sm font-medium transition-all hover:bg-gray-100">
                    Semua
                </a>
                @if ($Categories->isNotEmpty())
                    @foreach ($Categories as $category)
                        <a href="{{ route('home.category.show', $category->slug) }}"
                            class="px-4 py-2 bg-gray-800 text-gray-300 rounded text-sm font-medium transition-all hover:bg-gray-700">
                            {{ $category->name }}
                        </a>
                    @endforeach
                @else
                    <button
                        class="px-4 py-2 bg-gray-800 text-gray-300 rounded text-sm font-medium transition-all hover:bg-gray-700">
                        Tidak ada kategori
                    </button>
                @endif
            </div>
        </div>

        <!-- Blog Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            <!-- Card  -->
            @if ($Blogs->isNotEmpty())
                @foreach ($Blogs as $blog)
                    <article
                        class="bg-gray-900 rounded border border-gray-800 overflow-hidden hover:border-gray-700 transition-all hover:shadow-lg hover:shadow-gray-900/50 group">
                        {{-- <div <img src="{{ Storage::url($blog->thumbnail) }}" alt="Blog Image"
                            class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                        </div> --}}
                        <div class="p-6">
                            <span class="text-xs font-medium text-gray-500 uppercase tracking-wider">{{ $blog->category->name }}</span>
                            <h3 class="text-xl font-bold text-white mt-3 mb-3 group-hover:text-gray-100 transition">
                                {{ $blog->title }}
                            </h3>
                            <p class="text-gray-400 text-sm leading-relaxed mb-4">
                                {{ $blog->description }}
                            </p>
                            <div class="flex items-center justify-between pt-4 border-t border-gray-800">
                                <span class="text-xs text-gray-500">{{ $blog->created_at->format('d M Y') }}</span>
                                <a href="{{ route('home.blog.show',$blog->slug) }}" class="text-gray-400 hover:text-white text-sm font-medium transition">
                                    Baca →
                                </a>
                            </div>
                        </div>
                    </article>
                @endforeach
            @else
                <p class="text-gray-400">Tidak ada blog tersedia Sesuai Kategori.</p>
            @endif

        </div>
@endsection


