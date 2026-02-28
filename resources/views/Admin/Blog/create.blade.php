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
            <form action="{{ route('admin.blogs.store') }}" method="POST" class="space-y-8">
                @csrf
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
                            <input name="title" type="text" placeholder="Masukkan judul blog yang menarik..."
                                class="w-full bg-gray-800 border border-gray-700 rounded px-4 py-3 text-gray-100 placeholder-gray-500 focus:outline-none focus:border-white transition">
                            <p class="text-gray-500 text-xs mt-2">Minimal 10 karakter</p>
                        </div>

                        <!-- Deskripsi -->
                        <div>
                            <label class="block text-sm font-medium text-white mb-2">Deskripsi *</label>
                            <input name="description" type="text" placeholder="Deskripsi singkat tentang blog Anda..."
                                class="w-full bg-gray-800 border border-gray-700 rounded px-4 py-3 text-gray-100 placeholder-gray-500 focus:outline-none focus:border-white transition">
                        </div>

                        <div class="mb-6">
                            <label class="block text-sm text-white mb-2">Status *</label>
                            <select name="status"
                                class="w-full bg-gray-800 border border-gray-700 rounded px-4 py-3 text-white">
                                <option value="draft">Draft</option>

                                <option value="published">Published</option>
                            </select>
                        </div>


                        <div class="grid grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-white mb-2">Kategori *</label>
                                @if ($Categories->count() > 0)
                                    <select name="category"
                                        class="w-full bg-gray-800 border border-gray-700 rounded px-4 py-3 text-gray-100 focus:outline-none focus:border-white transition">
                                        <option value="">Pilih kategori</option>
                                        @foreach ($Categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                @else
                                    <select name="category"
                                        class="w-full bg-gray-800 border border-gray-700 rounded px-4 py-3 text-gray-100 focus:outline-none focus:border-white transition">
                                        <option value="">Pilih kategori</option>
                                        <option>Tidak ada kategori</option>
                                    </select>
                                @endif
                            </div>
                        </div>
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
                        <!-- <div class="bg-gray-800 border border-gray-700 rounded-t flex items-center flex-wrap gap-1 p-2">
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
                            </div> -->

                        <!-- Editor Area -->
                        <textarea name="content"
                            placeholder="Tulis konten blog Anda di sini. Anda bisa menggunakan markdown atau HTML..."
                            rows="15"
                            class="w-full bg-gray-800 border border-gray-700 border-t-0 rounded-b px-4 py-3 text-gray-100 placeholder-gray-500 focus:outline-none focus:border-white transition resize-none font-mono text-sm"></textarea>
                        <p class="text-gray-500 text-xs mt-2">Mendukung Markdown dan HTML</p>
                    </div>
                </div>




                <!-- Action Buttons -->
                <div class="flex gap-4">
                    <a href="{{ route('admin.blogs.index') }}"
                        class="flex-1 px-6 py-3 rounded bg-gray-800 text-white hover:bg-gray-700 transition font-medium text-center">
                        Batal
                    </a>
                    <button type="submit"
                        class="flex-1 px-6 py-3 rounded bg-white text-gray-950 hover:bg-gray-100 transition font-medium">
                        Publish Blog
                    </button>
                </div>

            </form>
        </div>
    </div>
@endsection