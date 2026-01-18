@if ($paginator->hasPages())
<nav aria-label="Page navigation">
    <ul class="flex -space-x-px text-sm">

        {{-- Previous --}}
        <li>
            @if ($paginator->onFirstPage())
                <span
                    class="flex items-center justify-center text-body bg-neutral-secondary-medium box-border border border-default-medium rounded-s-base text-sm px-3 h-10 opacity-50 cursor-not-allowed">
                    Previous
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}"
                   class="flex items-center justify-center text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading font-medium rounded-s-base text-sm px-3 h-10">
                    Previous
                </a>
            @endif
        </li>

        {{-- Pages --}}
        @foreach ($elements as $element)

            {{-- Dots --}}
            @if (is_string($element))
                <li>
                    <span
                        class="flex items-center justify-center text-body bg-neutral-secondary-medium box-border border border-default-medium text-sm w-10 h-10">
                        {{ $element }}
                    </span>
                </li>
            @endif

            {{-- Page Numbers --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    <li>
                        @if ($page == $paginator->currentPage())
                            <span
                                aria-current="page"
                                class="flex items-center justify-center text-fg-brand bg-neutral-tertiary-medium box-border border border-default-medium font-medium text-sm w-10 h-10">
                                {{ $page }}
                            </span>
                        @else
                            <a href="{{ $url }}"
                               class="flex items-center justify-center text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading font-medium text-sm w-10 h-10">
                                {{ $page }}
                            </a>
                        @endif
                    </li>
                @endforeach
            @endif

        @endforeach

        {{-- Next --}}
        <li>
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}"
                   class="flex items-center justify-center text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading font-medium rounded-e-base text-sm px-3 h-10">
                    Next
                </a>
            @else
                <span
                    class="flex items-center justify-center text-body bg-neutral-secondary-medium box-border border border-default-medium rounded-e-base text-sm px-3 h-10 opacity-50 cursor-not-allowed">
                    Next
                </span>
            @endif
        </li>

    </ul>
</nav>
@endif
