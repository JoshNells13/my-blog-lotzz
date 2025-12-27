<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {

        $Blogs = Blog::with('category')->get();

        $CountBlogs = Blog::count();

        $CountBlogPublished = Blog::where('status', 'published')->count();

        $CountBlogDraft = Blog::where('status', 'draft')->count();

        return view('Admin.Blog.index', compact('Blogs','CountBlogs','CountBlogPublished','CountBlogDraft'));
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
        ]);

        Blog::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'description' => $request->input('description'),
            'id_category' => $request->input('category'),
            'status' => $request->input('status'),
        ]);

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
        ]);

        $blog = Blog::findOrFail($id);

        $blog->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'description' => $request->input('description'),
            'id_category' => $request->input('category'),
        ]);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog updated successfully');
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();

        return redirect()->route('admin.blogs.index')->with('success', 'Blog deleted successfully');
    }
}
