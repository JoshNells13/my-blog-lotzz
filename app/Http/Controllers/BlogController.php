<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {

        $Blogs = Blog::with('category')->get();

        return view('Admin.Blog.index', compact('Blogs'));
    }

    public function show($id)
    {
        //
    }

    public function create()
    {
        return view('Admin.Blog.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category' => 'required|exists:categories,id',
            'description' => 'required|string|max:500',
        ]);

        Blog::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'id_category' => $request->input('category'),
        ]);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog created successfully');

    }
    public function edit($id)
    {
        $Blog = Blog::findOrFail($id);

        return view('Admin.Blog.edit', compact('Blog'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category' => 'required|exists:categories,id',
            'description' => 'required|string|max:500',
        ]);

        $blog = Blog::findOrFail($id);
        $blog->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
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
