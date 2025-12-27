@extends('layout.Dashboard')

@section('content')
<div class="bg-gray-900 border-b border-gray-800 px-8 py-4 sticky top-0 z-10 flex items-center justify-between">
    <div>
        <h1 class="text-2xl font-bold text-white">Edit Blog</h1>
        <p class="text-gray-400 text-sm mt-1">Perbarui konten blog Anda</p>
    </div>
</div>

<div class="p-8">
    <div class="max-w-4xl">
        <form action="{{ route('admin.blogs.update', $Blog->id) }}" method="POST" class="space-y-8">
            @csrf
            @method('PUT')

            <!-- Informasi Dasar -->
            <div class="bg-gray-900 border border-gray-800 rounded-lg p-6">
                <h2 class="text-lg font-bold text-white mb-6">Informasi Dasar</h2>

                <!-- Judul -->
                <div class="mb-6">
                    <label class="block text-sm text-white mb-2">Judul Blog *</label>
                    <input
                        name="title"
                        type="text"
                        value="{{ old('title', $Blog->title) }}"
                        class="w-full bg-gray-800 border border-gray-700 rounded px-4 py-3 text-white">
                </div>

                <!-- Deskripsi -->
                <div class="mb-6">
                    <label class="block text-sm text-white mb-2">Deskripsi *</label>
                    <input
                        name="description"
                        type="text"
                        value="{{ old('description', $Blog->description) }}"
                        class="w-full bg-gray-800 border border-gray-700 rounded px-4 py-3 text-white">
                </div>
                <div class="mb-6">
                    <label class="block text-sm text-white mb-2">Status *</label>
                    <select name="status"
                        class="w-full bg-gray-800 border border-gray-700 rounded px-4 py-3 text-white">
                        <option value="draft" {{ old('status', $Blog->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                        <option value="published" {{ old('status', $Blog->status) == 'published' ? 'selected' : '' }}>Published</option>
                    </select>
                </div>

                <!-- Kategori -->
                <div>
                    <label class="block text-sm text-white mb-2">Kategori *</label>
                    <select name="category"
                        class="w-full bg-gray-800 border border-gray-700 rounded px-4 py-3 text-white">
                        @foreach ($Categories as $category)
                            <option value="{{ $category->id }}"
                                {{ $Blog->id_category == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Konten -->
            <div class="bg-gray-900 border border-gray-800 rounded-lg p-6">
                <h2 class="text-lg font-bold text-white mb-4">Konten</h2>

                <textarea
                    name="content"
                    rows="15"
                    class="w-full bg-gray-800 border border-gray-700 rounded px-4 py-3 text-white font-mono text-sm">{{ old('content', $Blog->content) }}</textarea>
            </div>

            <!-- Action -->
            <div class="flex gap-4">
                <a href="{{ route('admin.blogs.index') }}"
                    class="flex-1 bg-gray-800 text-white py-3 rounded text-center">
                    Batal
                </a>
                <button type="submit"
                    class="flex-1 bg-white text-gray-900 py-3 rounded font-medium">
                    Update Blog
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
