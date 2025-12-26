@extends('layout.Dashboard')


@section('content')
    <!-- Top Bar -->
    <div class="bg-gray-900 border-b border-gray-800 px-8 py-4 sticky top-0 z-10 flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-white">Tambah Blog Baru</h1>
            <p class="text-gray-400 text-sm mt-1">Buat dan publikasikan blog baru Anda</p>
        </div>
        <div class="w-10 h-10 rounded-full bg-gray-800 border border-gray-700 flex items-center justify-center">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
            </svg>
        </div>
    </div>

    <div class="p-8">
        <div class="max-w-4xl">
            <!-- Form Container -->
            <form class="space-y-8">

                <!-- Basic Info Section -->
                <div class="bg-gray-900 border border-gray-800 rounded-lg p-6">
                    <h2 class="text-lg font-bold text-white mb-6 flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Informasi Dasar
                    </h2>

                    <div class="space-y-6">
                        <!-- Judul -->
                        <div>
                            <label class="block text-sm font-medium text-white mb-2">Judul Blog *</label>
                            <input type="text" placeholder="Masukkan judul blog yang menarik..."
                                class="w-full bg-gray-800 border border-gray-700 rounded px-4 py-3 text-gray-100 placeholder-gray-500 focus:outline-none focus:border-white transition">
                            <p class="text-gray-500 text-xs mt-2">Minimal 10 karakter</p>
                        </div>

                        <!-- Slug -->
                        <div>
                            <label class="block text-sm font-medium text-white mb-2">Slug *</label>
                            <input type="text" placeholder="judul-blog-yang-menarik"
                                class="w-full bg-gray-800 border border-gray-700 rounded px-4 py-3 text-gray-100 placeholder-gray-500 focus:outline-none focus:border-white transition">
                            <p class="text-gray-500 text-xs mt-2">URL friendly, auto-generate dari judul</p>
                        </div>

                        <!-- Kategori & Status -->
                        <div class="grid grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-white mb-2">Kategori *</label>
                                <select
                                    class="w-full bg-gray-800 border border-gray-700 rounded px-4 py-3 text-gray-100 focus:outline-none focus:border-white transition">
                                    <option value="">Pilih kategori</option>
                                    <option value="technology">Technology</option>
                                    <option value="design">Design</option>
                                    <option value="tutorial">Tutorial</option>
                                    <option value="lifestyle">Lifestyle</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-white mb-2">Status *</label>
                                <select
                                    class="w-full bg-gray-800 border border-gray-700 rounded px-4 py-3 text-gray-100 focus:outline-none focus:border-white transition">
                                    <option value="">Pilih status</option>
                                    <option value="draft">Draft</option>
                                    <option value="publish">Publish</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Media Section -->
                <div class="bg-gray-900 border border-gray-800 rounded-lg p-6">
                    <h2 class="text-lg font-bold text-white mb-6 flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        Media
                    </h2>

                    <div>
                        <label class="block text-sm font-medium text-white mb-3">Gambar Utama *</label>
                        <div
                            class="border-2 border-dashed border-gray-700 rounded-lg p-8 text-center hover:border-gray-600 transition cursor-pointer">
                            <svg class="w-12 h-12 text-gray-500 mx-auto mb-3" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            <p class="text-gray-400 font-medium mb-1">Drag and drop gambar di sini</p>
                            <p class="text-gray-500 text-sm">atau klik untuk memilih file</p>
                            <p class="text-gray-600 text-xs mt-3">Format: JPG, PNG. Max 5MB</p>
                        </div>
                    </div>
                </div>

                <!-- Description Section -->
                <div class="bg-gray-900 border border-gray-800 rounded-lg p-6">
                    <h2 class="text-lg font-bold text-white mb-6 flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        Deskripsi
                    </h2>

                    <div>
                        <label class="block text-sm font-medium text-white mb-2">Ringkasan (Meta Description) *</label>
                        <textarea placeholder="Tulis ringkasan singkat tentang blog ini..." rows="3"
                            class="w-full bg-gray-800 border border-gray-700 rounded px-4 py-3 text-gray-100 placeholder-gray-500 focus:outline-none focus:border-white transition resize-none"></textarea>
                        <p class="text-gray-500 text-xs mt-2">Maksimal 160 karakter untuk SEO</p>
                    </div>
                </div>

                <!-- Content Section -->
                <div class="bg-gray-900 border border-gray-800 rounded-lg p-6">
                    <h2 class="text-lg font-bold text-white mb-6 flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                        </svg>
                        Konten
                    </h2>

                    <div>
                        <label class="block text-sm font-medium text-white mb-3">Isi Blog *</label>

                        <!-- Editor Toolbar -->
                        <div class="bg-gray-800 border border-gray-700 rounded-t flex items-center flex-wrap gap-1 p-2">
                            <button type="button" class="p-2 rounded hover:bg-gray-700 transition" title="Bold">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M6 3a1 1 0 011 1v10a1 1 0 11-2 0V4a1 1 0 011-1h7a1 1 0 011 1v3a1 1 0 11-2 0V4H6z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                            <button type="button" class="p-2 rounded hover:bg-gray-700 transition" title="Italic">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M6 4a1 1 0 011 1v10a1 1 0 11-2 0V5a1 1 0 011-1h8a1 1 0 011 1v3a1 1 0 11-2 0V4H6z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                            <div class="border-l border-gray-700 mx-1"></div>
                            <button type="button" class="p-2 rounded hover:bg-gray-700 transition" title="Heading">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 11-2 0V5H5v10h2a1 1 0 110 2H4a1 1 0 01-1-1V4z" />
                                </svg>
                            </button>
                            <button type="button" class="p-2 rounded hover:bg-gray-700 transition" title="Bullet List">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                            <button type="button" class="p-2 rounded hover:bg-gray-700 transition" title="Link">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M12.586 4.586a2 2 0 112.828 2.828l-.793.793-2.828-2.829.793-.792zM9.172 9.172a2 2 0 112.828 2.828l-.793.793 2.828 2.829-.793.792a2 2 0 11-2.828-2.828l.793-.793-2.828-2.829.793-.792z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                            <button type="button" class="p-2 rounded hover:bg-gray-700 transition" title="Code">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M12.316 3.051a1 1 0 01.633 1.265l-4 12a1 1 0 11-1.898-.632l4-12a1 1 0 011.265-.633zM5.707 6.293a1 1 0 010 1.414L3.414 10l2.293 2.293a1 1 0 11-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0zm8.586 0a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 11-1.414-1.414L16.586 10l-2.293-2.293a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>

                        <!-- Editor Area -->
                        <textarea placeholder="Tulis konten blog Anda di sini. Anda bisa menggunakan markdown atau HTML..." rows="15"
                            class="w-full bg-gray-800 border border-gray-700 border-t-0 rounded-b px-4 py-3 text-gray-100 placeholder-gray-500 focus:outline-none focus:border-white transition resize-none font-mono text-sm"></textarea>
                        <p class="text-gray-500 text-xs mt-2">Mendukung Markdown dan HTML</p>
                    </div>
                </div>

                <!-- SEO Section -->
                <div class="bg-gray-900 border border-gray-800 rounded-lg p-6">
                    <h2 class="text-lg font-bold text-white mb-6 flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5.36-5.36l-.707.707M9 12a3 3 0 106 0 3 3 0 00-6 0z" />
                        </svg>
                        SEO
                    </h2>

                    <div class="space-y-6">
                        <!-- Meta Title -->
                        <div>
                            <label class="block text-sm font-medium text-white mb-2">Meta Title</label>
                            <input type="text" placeholder="Judul untuk search engine (50-60 karakter)..."
                                class="w-full bg-gray-800 border border-gray-700 rounded px-4 py-3 text-gray-100 placeholder-gray-500 focus:outline-none focus:border-white transition">
                        </div>

                        <!-- Tags -->
                        <div>
                            <label class="block text-sm font-medium text-white mb-2">Tags</label>
                            <div class="flex items-center gap-2 mb-3 flex-wrap">
                                <span class="bg-gray-800 px-3 py-1 rounded text-sm flex items-center gap-2">
                                    React
                                    <button type="button" class="hover:text-red-400">×</button>
                                </span>
                                <span class="bg-gray-800 px-3 py-1 rounded text-sm flex items-center gap-2">
                                    Hooks
                                    <button type="button" class="hover:text-red-400">×</button>
                                </span>
                            </div>
                            <input type="text" placeholder="Tambah tag dan tekan Enter..."
                                class="w-full bg-gray-800 border border-gray-700 rounded px-4 py-3 text-gray-100 placeholder-gray-500 focus:outline-none focus:border-white transition">
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex gap-4">
                    <a href="/admin/blog"
                        class="flex-1 px-6 py-3 rounded bg-gray-800 text-white hover:bg-gray-700 transition font-medium text-center">
                        Batal
                    </a>
                    <button type="button"
                        class="px-6 py-3 rounded bg-gray-800 text-white hover:bg-gray-700 transition font-medium">
                        Simpan Sebagai Draft
                    </button>
                    <button type="submit"
                        class="flex-1 px-6 py-3 rounded bg-white text-gray-950 hover:bg-gray-100 transition font-medium">
                        Publish Blog
                    </button>
                </div>

            </form>
        </div>
    </div>
@endsection
