<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\CategoryBlog;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $title = 'Manajemen Blog || PPKD Sticker';
        $blogs = Blog::with('categoryBlog')->latest()->get();

        return view('admin.blog.index', compact('title', 'blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $title = 'Tambah Blog || PPKD Sticker';
        $categories = CategoryBlog::orderBy('name')->get();

        return view('admin.blog.create', compact('title', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $this->normalizeSlug($request);

        $validated = $request->validate([
            'blog_category_blog_id' => ['required', 'exists:category_blogs,id'],
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:blogs,slug'],
            'brief_description' => ['nullable', 'string'],
            'content' => ['required', 'string'],
            'cover_path' => ['nullable', 'image', 'mimes:png,jpg,jpeg,gif', 'max:2048'],
            'author' => ['nullable', 'string', 'max:255'],
        ]);

        $validated['author'] = $validated['author'] ?? 'Team Sticker PPKD';

        if ($request->hasFile('cover_path')) {
            $validated['cover_path'] = $request->file('cover_path')->store('blogs', 'public');
        }

        Blog::create($validated);

        return redirect()->route('admin.blog.index')->with('success', 'Blog berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog): View
    {
        $title = 'Detail Blog || PPKD Sticker';
        $blog->load('categoryBlog');

        return view('admin.blog.show', compact('title', 'blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog): View
    {
        $title = 'Edit Blog || PPKD Sticker';
        $categories = CategoryBlog::orderBy('name')->get();

        return view('admin.blog.edit', compact('title', 'blog', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog): RedirectResponse
    {
        $this->normalizeSlug($request);

        $validated = $request->validate([
            'blog_category_blog_id' => ['required', 'exists:category_blogs,id'],
            'name' => ['required', 'string', 'max:255'],
            'slug' => [
                'required',
                'string',
                'max:255',
                Rule::unique('blogs', 'slug')->ignore($blog->id),
            ],
            'brief_description' => ['nullable', 'string'],
            'content' => ['required', 'string'],
            'cover_path' => ['nullable', 'image', 'mimes:png,jpg,jpeg,gif', 'max:2048'],
            'author' => ['nullable', 'string', 'max:255'],
        ]);

        $validated['author'] = $validated['author'] ?? 'Team Sticker PPKD';

        if ($request->hasFile('cover_path')) {
            $newCoverPath = $request->file('cover_path')->store('blogs', 'public');
            $oldCoverPath = $blog->cover_path;
            $validated['cover_path'] = $newCoverPath;
        }

        $blog->update($validated);

        if (isset($newCoverPath) && $oldCoverPath) {
            Storage::disk('public')->delete($oldCoverPath);
        }

        return redirect()->route('admin.blog.index')->with('success', 'Blog berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog): RedirectResponse
    {
        $coverPath = $blog->cover_path;
        $blog->delete();

        if ($coverPath) {
            Storage::disk('public')->delete($coverPath);
        }

        return redirect()->route('admin.blog.index')->with('success', 'Blog berhasil dihapus.');
    }

    private function normalizeSlug(Request $request): void
    {
        $slug = $request->input('slug');

        if ($slug !== null && ! is_string($slug)) {
            return;
        }

        $name = $request->input('name');
        $slugSource = is_string($slug) && $slug !== '' ? $slug : (is_string($name) ? $name : '');

        $request->merge(['slug' => Str::slug($slugSource)]);
    }
}
