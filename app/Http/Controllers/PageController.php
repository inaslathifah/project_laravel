<?php

namespace App\Http\Controllers;

use App\Models\Setting;

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
        return view('blog.index');
    }

    public function showBlog(string $id)
    {
        return view('blog.show', compact('id'));
    }
}
