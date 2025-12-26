<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $Blog= Blog::all();

        $Categories= Category::all();


        return view('Home.index',compact('Blog','Categories'));
    }




    public function showBlog($Slug)
    {
        $Blog = Blog::where('slug', $Slug)->first();

        $Categories= Category::all();

        return view('Home.BlogDetail', compact('Blog','Categories'));
    }

    public function showCategory($Slug)
    {
        $Category = Category::where('slug', $Slug)->firstOrFail();

        $Blogs = $Category->blogs;
        $Categories= Category::all();

        return view('Home.Category', compact('Blogs','Categories','Category'));
    }
}
