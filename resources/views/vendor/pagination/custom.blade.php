@if ($paginator->hasPages())
<nav aria-label="Page navigation" class="flex justify-center mt-20">
    <ul class="flex items-center gap-2">

        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="opacity-50 cursor-not-allowed">
                <span class="flex items-center justify-center w-12 h-12 glass rounded-2xl text-neutral-500">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </span>
            </li>
        @else
            <li>
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="flex items-center justify-center w-12 h-12 glass rounded-2xl text-white hover:bg-white hover:text-black transition-all duration-300">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="w-12 h-12 flex items-center justify-center text-neutral-500">
                    {{ $element }}
                </li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li>
                            <span class="flex items-center justify-center w-12 h-12 bg-white text-black font-bold rounded-2xl shadow-[0_0_20px_rgba(255,255,255,0.2)]">
                                {{ $page }}
                            </span>
                        </li>
                    @else
                        <li>
                            <a href="{{ $url }}" class="flex items-center justify-center w-12 h-12 glass rounded-2xl text-neutral-400 hover:text-white hover:border-white/20 transition-all duration-300">
                                {{ $page }}
                            </a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li>
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="flex items-center justify-center w-12 h-12 glass rounded-2xl text-white hover:bg-white hover:text-black transition-all duration-300">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </li>
        @else
            <li class="opacity-50 cursor-not-allowed">
                <span class="flex items-center justify-center w-12 h-12 glass rounded-2xl text-neutral-500">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </span>
            </li>
        @endif
    </ul>
</nav>
@endif
