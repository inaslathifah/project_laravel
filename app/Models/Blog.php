<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Blog extends Model
{
    protected $fillable = [
        'blog_category_blog_id',
        'name',
        'slug',
        'brief_description',
        'content',
        'cover_path',
        'author',
    ];

    public function categoryBlog(): BelongsTo
    {
        return $this->belongsTo(CategoryBlog::class, 'blog_category_blog_id');
    }
}
