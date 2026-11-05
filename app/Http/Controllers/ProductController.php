<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Management Produk || PPKD Sticker';
        $products = Product::with('category')->orderBy('id', 'DESC')->get();

        return view('admin.product.index', compact('title', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah Produk || PPKD Sticker';
        $categories = Category::all();

        return view('admin.product.create', compact('title', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,gif|max:2048',
            'name' => 'required|string|max:60',
            'slug' => 'nullable|string|max:60|unique:products,slug',
            'brief_description' => 'nullable|string',
            'description' => 'nullable|string',
            'stock' => 'required|integer',
            'price' => 'required|integer',
            'price_art_cartoon' => 'nullable|integer',
            'price_art_paper' => 'nullable|integer',
            'price_hvs' => 'nullable|integer',
            'price_doff' => 'nullable|integer',
            'price_glossy' => 'nullable|integer',
            'cutting_price' => 'nullable|integer',

            // validation for product images
            'product_images' => 'nullable|array',
            'product_images.*' => 'required|image|mimes:png,jpg,jpeg,gif|max:2048',
            'alt' => 'nullable|array',
            'alt.*' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
        ]);

        DB::transaction(function () use ($validated, $request) {
            $product = Product::create([
                'category_id' => $validated['category_id'],
                'image' => $validated['image'] ?? null,
                'name' => $validated['name'],
                'slug' => $validated['slug'] ?? null,
                'brief_description' => $validated['brief_description'] ?? null,
                'description' => $validated['description'] ?? null,
                'stock' => $validated['stock'],
                'price' => $validated['price'],
                'price_art_cartoon' => $validated['price_art_cartoon'] ?? null,
                'price_art_paper' => $validated['price_art_paper'] ?? null,
                'price_hvs' => $validated['price_hvs'] ?? null,
                'price_doff' => $validated['price_doff'] ?? null,
                'price_glossy' => $validated['price_glossy'] ?? null,
                'cutting_price' => $validated['cutting_price'] ?? null,
            ]);

            // Handle product images
            if ($request->hasFile('product_images')) {
                $imageData = [];
                foreach ($request->file('product_images') as $index => $image) {
                    $path = $image->store('product_images', 'public');

                    $imageData[] = [
                        'path' => $path,
                        'alt' => $request->input('alt.{$index}') ?? $product->name,
                        'sort_order' => $index + 1,
                    ];
                }
                $product->images()->createMany($imageData);
            }
        });

        return redirect()->route('admin.product.index')
            ->with('success', 'Produk berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        $title = 'Edit Produk || PPKD Sticker';

        return view('admin.product.edit', compact('title', 'product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,gif|max:2048',
            'name' => 'required|string|max:60',
            'slug' => 'nullable|string|max:60|unique:products,slug,'.$product->id,
            'brief_description' => 'nullable|string',
            'description' => 'nullable|string',
            'stock' => 'required|integer|min:0',
            'price' => 'required|integer|min:0',
            'price_art_cartoon' => 'nullable|integer|min:0',
            'price_art_paper' => 'nullable|integer|min:0',
            'price_hvs' => 'nullable|integer|min:0',
            'price_doff' => 'nullable|integer|min:0',
            'price_glossy' => 'nullable|integer|min:0',
            'cutting_price' => 'nullable|integer|min:0',
        ]);

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }

            $validated['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($validated);

        return redirect()->route('admin.product.index')
            ->with('success', 'Produk berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        if ($product->image) {
            \Storage::disk('public')->delete($product->image);
        }
        $product->delete();

        return redirect()->route('admin.product.index')
            ->with('success', 'Produk berhasil dihapus');
    }
}
