<?php

namespace App\Http\Controllers;

use App\Models\CategoryBlog;
use App\Models\Setting;
use App\Models\Blog;

class PageController extends Controller
{
    public function faq()
    {
        return view('faq.index');
    }

    public function contact()
    {
        $settings = Setting::get();

        return view('contact.index', compact('settings'));
    }

    public function blog()
    {
        $categories = CategoryBlog::withCount('blogs')->get();
        $totalBlogsCount = Blog::count();
        $blogs = Blog::with('categoryBlog')->latest()->get();
        return view('blog.index', compact('categories', 'blogs', 'totalBlogsCount'));
    }

    public function showBlog(string $slug)
    {
        $blog = Blog::where('slug', $slug)->with('categoryBlog')->first();
        return view('blog.show', compact('blog'));
    }
}
