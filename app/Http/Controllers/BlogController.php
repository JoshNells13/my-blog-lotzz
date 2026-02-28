<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {

        $Blogs = Blog::with('category')->latest()->paginate(10);

        $CountBlogs = Blog::count();

        $CountBlogPublished = Blog::where('status', 'published')->count();

        $CountBlogDraft = Blog::where('status', 'draft')->count();

        return view('Admin.Blog.index', compact('Blogs', 'CountBlogs', 'CountBlogPublished', 'CountBlogDraft'));
    }

    public function show($id)
    {
        //
    }

    public function create()
    {

        $Categories = Category::all();

        return view('Admin.Blog.create', compact('Categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category' => 'required|exists:categories,id',
            'description' => 'required|string|max:500',
            'status' => 'required|in:draft,published',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $thumbnailPath = null;
        try {
            if ($request->hasFile('thumbnail')) {
                $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
            }

            Blog::create([
                'title' => $request->input('title'),
                'content' => $request->input('content'),
                'description' => $request->input('description'),
                'id_category' => $request->input('category'),
                'status' => $request->input('status'),
                'thumbnail' => $thumbnailPath,
            ]);
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Blog creation failed: ' . $e->getMessage());
            return back()->withInput()->withErrors(['error' => 'Gagal menyimpan blog. Silakan coba lagi.']);
        }

        return redirect()->route('admin.blogs.index')->with('success', 'Blog created successfully');

    }
    public function edit($id)
    {
        $Blog = Blog::findOrFail($id);

        $Categories = Category::all();

        return view('Admin.Blog.edit', compact('Blog', 'Categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category' => 'required|exists:categories,id',
            'description' => 'required|string|max:500',
            'status' => 'required|in:draft,published',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $blog = Blog::findOrFail($id);

        $data = [
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'description' => $request->input('description'),
            'id_category' => $request->input('category'),
            'status' => $request->input('status'),
        ];

        try {
            if ($request->hasFile('thumbnail')) {
                // Delete old thumbnail if it exists locally
                if ($blog->thumbnail && !\Illuminate\Support\Str::startsWith($blog->thumbnail, ['http://', 'https://'])) {
                    \Illuminate\Support\Facades\Storage::disk('public')->delete($blog->thumbnail);
                }
                $data['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
            }

            $blog->update($data);
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Blog update failed: ' . $e->getMessage());
            return back()->withInput()->withErrors(['error' => 'Gagal memperbarui blog. Silakan coba lagi.']);
        }

        return redirect()->route('admin.blogs.index')->with('success', 'Blog updated successfully');
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();

        return redirect()->route('admin.blogs.index')->with('success', 'Blog deleted successfully');
    }
}
