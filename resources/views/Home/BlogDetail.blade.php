@extends('layout.Home')

@section('content')


        <!-- Hero Image -->
        <div class="mb-12 rounded-lg overflow-hidden border border-gray-800 h-96 bg-gradient-to-br from-gray-800 to-gray-900 flex items-center justify-center">
            <svg class="w-32 h-32 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
        </div>

        <!-- Article Header -->
        <article class="mb-16">
            <!-- Meta Info -->
            <div class="flex items-center gap-4 mb-6">
                <span class="bg-gray-800 text-gray-300 px-3 py-1 rounded text-sm font-medium">{{ Str::headline(str_replace('-', ' ', $Blog->category->name)) }}</span>
                <span class="text-gray-500 text-sm">{{ $Blog->created_at->format('Y M d') }}</span>
            </div>

            <!-- Title -->
            <h1 class="text-5xl capitalize font-bold text-white mb-4 leading-tight">
                {{ $Blog->title }}
            </h1>

            <!-- Description -->
            <p class="text-xl text-gray-400 mb-8 leading-relaxed">
                {{ $Blog->description }}
            </p>
        </article>

        <!-- Article Content -->
        <div class="prose prose-invert max-w-none mb-16">

            {!! $Blog->content !!}

        </div>
@endsection



