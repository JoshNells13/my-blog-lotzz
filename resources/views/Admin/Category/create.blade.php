@extends('layout.Dashboard')


@section('content')
    <!-- Top Bar -->
    <div class="bg-gray-900 border-b border-gray-800 px-8 py-4 sticky top-0 z-10 flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-white">Tambah Kategori Baru</h1>
            <p class="text-gray-400 text-sm mt-1">Buat dan publikasikan kategori baru Anda</p>
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
            <form action="{{ route('admin.categories.store') }}" method="POST" class="space-y-8">
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
                            <label class="block text-sm font-medium text-white mb-2">Nama Kategori</label>
                            <input name="name" type="text" placeholder="Masukkan nama kategori..."
                                class="w-full bg-gray-800 border border-gray-700 rounded px-4 py-3 text-gray-100 placeholder-gray-500 focus:outline-none focus:border-white transition">
                            {{-- <p class="text-gray-500 text-xs mt-2">Minimal 10 karakter</p> --}}
                        </div>
                    </div>
                </div>





                <!-- Action Buttons -->
                <div class="flex gap-4">
                    <a href="{{ route('admin.categories.index') }}"
                        class="flex-1 px-6 py-3 rounded bg-gray-800 text-white hover:bg-gray-700 transition font-medium text-center">
                        Batal
                    </a>
                    <button type="submit"
                        class="flex-1 px-6 py-3 rounded bg-white text-gray-950 hover:bg-gray-100 transition font-medium">
                        Simpan Kategori
                    </button>
                </div>

            </form>
        </div>
    </div>
@endsection
