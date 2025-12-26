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
                <input type="text" placeholder="Search blog..." id="searchInput"
                    class="bg-gray-800 border border-gray-700 rounded px-4 py-2 text-sm text-gray-100 placeholder-gray-500 focus:outline-none focus:border-white transition">
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
        <div class="flex items-center gap-4 mb-8">
            <select id="filterCategory"
                class="bg-gray-900 border border-gray-800 rounded px-4 py-2 text-sm text-gray-100 focus:outline-none focus:border-white transition cursor-pointer">
                <option value="">Semua Kategori</option>
                <option value="technology">Technology</option>
                <option value="design">Design</option>
                <option value="tutorial">Tutorial</option>
                <option value="lifestyle">Lifestyle</option>
            </select>

            <select id="filterStatus"
                class="bg-gray-900 border border-gray-800 rounded px-4 py-2 text-sm text-gray-100 focus:outline-none focus:border-white transition cursor-pointer">
                <option value="">Semua Status</option>
                <option value="publish">Publish</option>
                <option value="draft">Draft</option>
            </select>

            <select id="sortBy"
                class="bg-gray-900 border border-gray-800 rounded px-4 py-2 text-sm text-gray-100 focus:outline-none focus:border-white transition cursor-pointer ml-auto">
                <option value="latest">Terbaru</option>
                <option value="oldest">Terlama</option>
                <option value="title-asc">Judul (A-Z)</option>
                <option value="title-desc">Judul (Z-A)</option>
            </select>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
            <div class="bg-gray-900 border border-gray-800 rounded p-4">
                <p class="text-gray-400 text-sm mb-1">Total Blog</p>
                <p class="text-2xl font-bold text-white">24</p>
            </div>
            <div class="bg-gray-900 border border-gray-800 rounded p-4">
                <p class="text-gray-400 text-sm mb-1">Publish</p>
                <p class="text-2xl font-bold text-green-400">18</p>
            </div>
            <div class="bg-gray-900 border border-gray-800 rounded p-4">
                <p class="text-gray-400 text-sm mb-1">Draft</p>
                <p class="text-2xl font-bold text-yellow-400">6</p>
            </div>
            <div class="bg-gray-900 border border-gray-800 rounded p-4">
                <p class="text-gray-400 text-sm mb-1">Bulan Ini</p>
                <p class="text-2xl font-bold text-blue-400">8</p>
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
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-300">Kategori</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-300">Tanggal</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-300">Status</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-300">Views</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-300">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-800" id="blogTable">
                        <!-- Row 1 -->
                        <tr class="hover:bg-gray-800/50 transition blog-row" data-category="technology"
                            data-status="publish">
                            <td class="px-6 py-4">
                                <input type="checkbox" class="rounded blog-checkbox">
                            </td>
                            <td class="px-6 py-4">
                                <div class="font-medium text-white">Panduan Lengkap React Hooks</div>
                                <div class="text-gray-500 text-xs">react-hooks-guide</div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-400">Technology</td>
                            <td class="px-6 py-4 text-sm text-gray-400">12 Jan 2025</td>
                            <td class="px-6 py-4 text-sm">
                                <span
                                    class="bg-green-900/30 text-green-400 px-3 py-1 rounded text-xs font-medium">Publish</span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-400">1,234</td>
                            <td class="px-6 py-4 text-sm">
                                <div class="flex items-center gap-3">
                                    <a href="#" class="text-gray-400 hover:text-white transition p-1" title="View">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </a>
                                    <a href="/admin/blog/edit/1" class="text-gray-400 hover:text-white transition p-1"
                                        title="Edit">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>
                                    <button class="text-red-400 hover:text-red-300 transition p-1 delete-btn"
                                        title="Delete">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <!-- Row 2 -->
                        <tr class="hover:bg-gray-800/50 transition blog-row" data-category="design"
                            data-status="publish">
                            <td class="px-6 py-4">
                                <input type="checkbox" class="rounded blog-checkbox">
                            </td>
                            <td class="px-6 py-4">
                                <div class="font-medium text-white">Prinsip Design yang Efektif</div>
                                <div class="text-gray-500 text-xs">design-principles</div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-400">Design</td>
                            <td class="px-6 py-4 text-sm text-gray-400">10 Jan 2025</td>
                            <td class="px-6 py-4 text-sm">
                                <span
                                    class="bg-green-900/30 text-green-400 px-3 py-1 rounded text-xs font-medium">Publish</span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-400">856</td>
                            <td class="px-6 py-4 text-sm">
                                <div class="flex items-center gap-3">
                                    <a href="#" class="text-gray-400 hover:text-white transition p-1"
                                        title="View">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </a>
                                    <a href="/admin/blog/edit/2" class="text-gray-400 hover:text-white transition p-1"
                                        title="Edit">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>
                                    <button class="text-red-400 hover:text-red-300 transition p-1 delete-btn"
                                        title="Delete">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <!-- Row 3 -->
                        <tr class="hover:bg-gray-800/50 transition blog-row" data-category="tutorial"
                            data-status="draft">
                            <td class="px-6 py-4">
                                <input type="checkbox" class="rounded blog-checkbox">
                            </td>
                            <td class="px-6 py-4">
                                <div class="font-medium text-white">Setup Tailwind CSS di Project</div>
                                <div class="text-gray-500 text-xs">tailwind-setup</div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-400">Tutorial</td>
                            <td class="px-6 py-4 text-sm text-gray-400">8 Jan 2025</td>
                            <td class="px-6 py-4 text-sm">
                                <span
                                    class="bg-yellow-900/30 text-yellow-400 px-3 py-1 rounded text-xs font-medium">Draft</span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-400">0</td>
                            <td class="px-6 py-4 text-sm">
                                <div class="flex items-center gap-3">
                                    <a href="#"
                                        class="text-gray-400 hover:text-white transition p-1 opacity-50 cursor-not-allowed"
                                        title="View" disabled>
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </a>
                                    <a href="/admin/blog/edit/3" class="text-gray-400 hover:text-white transition p-1"
                                        title="Edit">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>
                                    <button class="text-red-400 hover:text-red-300 transition p-1 delete-btn"
                                        title="Delete">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <!-- Row 4 -->
                        <tr class="hover:bg-gray-800/50 transition blog-row" data-category="lifestyle"
                            data-status="publish">
                            <td class="px-6 py-4">
                                <input type="checkbox" class="rounded blog-checkbox">
                            </td>
                            <td class="px-6 py-4">
                                <div class="font-medium text-white">Work-Life Balance untuk Developer</div>
                                <div class="text-gray-500 text-xs">work-life-balance</div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-400">Lifestyle</td>
                            <td class="px-6 py-4 text-sm text-gray-400">5 Jan 2025</td>
                            <td class="px-6 py-4 text-sm">
                                <span
                                    class="bg-green-900/30 text-green-400 px-3 py-1 rounded text-xs font-medium">Publish</span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-400">2,145</td>
                            <td class="px-6 py-4 text-sm">
                                <div class="flex items-center gap-3">
                                    <a href="#" class="text-gray-400 hover:text-white transition p-1"
                                        title="View">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </a>
                                    <a href="/admin/blog/edit/4" class="text-gray-400 hover:text-white transition p-1"
                                        title="Edit">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>
                                    <button class="text-red-400 hover:text-red-300 transition p-1 delete-btn"
                                        title="Delete">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <!-- Row 5 -->
                        <tr class="hover:bg-gray-800/50 transition blog-row" data-category="technology"
                            data-status="publish">
                            <td class="px-6 py-4">
                                <input type="checkbox" class="rounded blog-checkbox">
                            </td>
                            <td class="px-6 py-4">
                                <div class="font-medium text-white">Database Optimization Tips</div>
                                <div class="text-gray-500 text-xs">db-optimization</div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-400">Technology</td>
                            <td class="px-6 py-4 text-sm text-gray-400">2 Jan 2025</td>
                            <td class="px-6 py-4 text-sm">
                                <span
                                    class="bg-green-900/30 text-green-400 px-3 py-1 rounded text-xs font-medium">Publish</span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-400">567</td>
                            <td class="px-6 py-4 text-sm">
                                <div class="flex items-center gap-3">
                                    <a href="#" class="text-gray-400 hover:text-white transition p-1"
                                        title="View">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </a>
                                    <a href="/admin/blog/edit/5" class="text-gray-400 hover:text-white transition p-1"
                                        title="Edit">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>
                                    <button class="text-red-400 hover:text-red-300 transition p-1 delete-btn"
                                        title="Delete">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pagination -->
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
        </div>
    </div>
@endsection
