<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'image',
        'name',
        'slug',
        'stock',
        'price',
        'price_art_cartoon',
        'price_art_paper',
        'price_hvs',
        'price_doff',
        'price_glossy',
        'cutting_price',
        'brief_description',
        'description',
    ];

    // many to one
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
}
