<?php

namespace App\Http\Controllers;

use App\Models\CategoryBlog;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class CategoryBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $title = 'Management Kategori Blog || PPKD Sticker';
        $categories = CategoryBlog::orderBy('name')->get();

        return view('admin.category_blog.index', compact('title', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $title = 'Tambah Kategori Blog || PPKD Sticker';

        return view('admin.category_blog.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'brief_description' => ['nullable', 'string'],
            'content' => ['required', 'string'],
            'author' => ['nullable', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:category_blogs,slug'],
        ]);

        $validated['slug'] = Str::slug($validated['slug'] ?? $validated['name']);
        CategoryBlog::create($validated);

        return redirect()->route('admin.category_blog.index')->with('success', 'Kategori blog berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CategoryBlog $categoryBlog): View
    {
        $title = 'Edit Kategori Blog || PPKD Sticker';

        return view('admin.category_blog.edit', compact('title', 'categoryBlog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CategoryBlog $categoryBlog): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'brief_description' => ['nullable', 'string'],
            'content' => ['required', 'string'],
            'author' => ['nullable', 'string', 'max:255'],
            'slug' => [
                'nullable',
                'string',
                'max:255',
                Rule::unique('category_blogs', 'slug')->ignore($categoryBlog->id),
            ],
        ]);

        $validated['slug'] = Str::slug($validated['slug'] ?? $validated['name']);
        $categoryBlog->update($validated);

        return redirect()->route('admin.category_blog.index')->with('success', 'Kategori blog berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CategoryBlog $categoryBlog): RedirectResponse
    {
        $categoryBlog->delete();

        return redirect()->route('admin.category_blog.index')->with('success', 'Kategori blog berhasil dihapus.');
    }
}
