@extends('layout.Dashboard')

@section('content')
    <!-- Top Bar -->
    <div class="bg-gray-900 border-b border-gray-800 px-8 py-4 sticky top-0 z-10">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-white">Blog</h1>
                <p class="text-gray-400 text-sm mt-1">Kelola semua blog Anda di sini</p>
            </div>
            <div class="flex items-center gap-4">
                {{-- <input type="text" placeholder="Search blog..." id="searchInput"
                    class="bg-gray-800 border border-gray-700 rounded px-4 py-2 text-sm text-gray-100 placeholder-gray-500 focus:outline-none focus:border-white transition"> --}}
                <a href="{{ route('admin.blogs.create') }}"
                    class="bg-white text-gray-950 px-4 py-2 rounded font-medium hover:bg-gray-100 transition flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Buat Blog
                </a>
            </div>
        </div>
    </div>

    <div class="p-8">
        <!-- Filter Bar -->


        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
            <div class="bg-gray-900 border border-gray-800 rounded p-4">
                <p class="text-gray-400 text-sm mb-1">Total Blog</p>
                <p class="text-2xl font-bold text-white">{{ $CountBlogs }}</p>
            </div>
            <div class="bg-gray-900 border border-gray-800 rounded p-4">
                <p class="text-gray-400 text-sm mb-1">Total Blog Published</p>
                <p class="text-2xl font-bold text-white">{{ $CountBlogPublished }}</p>
            </div>
            <div class="bg-gray-900 border border-gray-800 rounded p-4">
                <p class="text-gray-400 text-sm mb-1">Total Blog Draft</p>
                <p class="text-2xl font-bold text-white">{{ $CountBlogDraft }}</p>
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
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-300">Judul</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-300">Status</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-300">Kategori</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-300">Tanggal</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-300">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-800" id="blogTable">
                        <!-- Row  -->

                        @if ($Blogs->count() > 0)
                            @foreach ($Blogs as $Blog)
                                <tr class="hover:bg-gray-800/50 transition blog-row">
                                    <td class="px-6 py-4">
                                        <input type="checkbox" class="rounded blog-checkbox">
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="font-medium text-white">{{ $Blog->title }}</div>
                                        <div class="text-gray-500 text-xs">{{ $Blog->slug }}</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        @if ($Blog->status === 'published')
                                            <span
                                                class="px-2 py-1 bg-green-900/30 text-green-400 rounded text-xs font-medium">Published</span>
                                        @else
                                            <span
                                                class="px-2 py-1 bg-yellow-900/30 text-yellow-400 rounded text-xs font-medium">Draft</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-400">{{ $Blog->category->name }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-400">{{ $Blog->created_at->format('d M Y') }}
                                    </td>
                                    <td class="px-6 py-4 text-sm">
                                        <a href="{{ route('admin.blogs.edit', $Blog->id) }}"
                                            class="bg-green-900/30 text-green-400 px-3 py-1 rounded text-xs font-medium">Edit</a>
                                        <form action="{{ route('admin.blogs.destroy', $Blog->id) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Yakin Ingin Menghapus Blog ini?')"
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
            {{ $Blogs->links('vendor.pagination.custom') }}

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
