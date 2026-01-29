@extends('layout.Dashboard')

@section('content')
    <!-- Top Bar -->
    <div class="bg-gray-900 border-b border-gray-800 px-8 py-4 sticky top-0 z-10">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-white">Kategori</h1>
                <p class="text-gray-400 text-sm mt-1">Kelola semua kategori Anda di sini</p>
            </div>
            <div class="flex items-center gap-4">
                {{-- <input type="text" placeholder="Search blog..." id="searchInput"
                    class="bg-gray-800 border border-gray-700 rounded px-4 py-2 text-sm text-gray-100 placeholder-gray-500 focus:outline-none focus:border-white transition"> --}}
                <a href="{{ route('admin.categories.create') }}"
                    class="bg-white text-gray-950 px-4 py-2 rounded font-medium hover:bg-gray-100 transition flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Buat Kategori
                </a>
            </div>
        </div>
    </div>

    <div class="p-8">
        <!-- Filter Bar -->


        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
            <div class="bg-gray-900 border border-gray-800 rounded p-4">
                <p class="text-gray-400 text-sm mb-1">Total Kategori</p>
                <p class="text-2xl font-bold text-white">{{ $CountCategories }}</p>
            </div>
        </div>

        <!-- Blog Table -->
        <div class="bg-gray-900 border border-gray-800 rounded-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-800">
                        <tr>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-300">
                                <input type="checkbox" class="rounded" id="selectAll">
                            </th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-300">Nama Kategori</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-300">Jumlah Blog</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-300">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-800" id="blogTable">
                        <!-- Row  -->

                        @if ($Categories->count() > 0)
                            @foreach ($Categories as $Category)
                                <tr class="hover:bg-gray-800/50 transition blog-row"
                                    data-category="{{ $Category->category }}" data-status="{{ $Category->status }}">
                                    <td class="px-6 py-4">
                                        <input type="checkbox" class="rounded blog-checkbox">
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="font-medium text-white">{{ $Category->name }}</div>
                                        <div class="text-gray-500 text-xs">{{ $Category->slug }}</div>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-400">{{ $Category->count_categories_by_blog }}
                                    </td>
                                    <td class="px-6 py-4 text-sm">
                                        <a href="{{ route('admin.categories.edit', $Category->id) }}"
                                            class="bg-green-900/30 text-green-400 px-3 py-1 rounded text-xs font-medium">Edit</a>
                                        <form action="{{ route('admin.categories.destroy', $Category->id) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Yakin Ingin Menghapus Kategori ini?')"
                                                class="bg-red-900/30 text-red-400 px-3 py-1 rounded text-xs font-medium">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                                    Tidak ada blog yang ditemukan.
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>


        <div class="mt-4">
            {{ $Categories->links('vendor.pagination.custom') }}
        </div>
        {{-- <!-- Pagination -->
        <div class="flex items-center justify-between mt-8">
            <p class="text-gray-400 text-sm">Menampilkan 1-5 dari 24 blog</p>
            <div class="flex gap-2">
                <button class="px-3 py-2 rounded bg-gray-800 text-gray-400 hover:bg-gray-700 transition text-sm">←
                    Sebelumnya</button>
                <button class="px-3 py-2 rounded bg-white text-gray-950 font-medium text-sm">1</button>
                <button class="px-3 py-2 rounded bg-gray-800 text-gray-400 hover:bg-gray-700 transition text-sm">2</button>
                <button class="px-3 py-2 rounded bg-gray-800 text-gray-400 hover:bg-gray-700 transition text-sm">3</button>
                <button
                    class="px-3 py-2 rounded bg-gray-800 text-gray-400 hover:bg-gray-700 transition text-sm">Selanjutnya
                    →</button>
            </div>
        </div> --}}
    </div>
@endsection
