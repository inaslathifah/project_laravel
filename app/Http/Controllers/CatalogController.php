<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class CatalogController extends Controller
{
    public function category(string $slug)
    {
        $category = Category::with('products')->where('slug', $slug)->first();
        $products = $category->products()->paginate(10);

        return view('category.index', compact('products', 'category'));
    }

    public function product(string $slug)
    {
        $product = Product::where('slug', $slug)->first();

        return view('products.index', compact('product'));
    }
}
