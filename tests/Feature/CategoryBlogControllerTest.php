<?php

use App\Models\CategoryBlog;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('admin can browse category blog management pages', function () {
    $categoryBlog = CategoryBlog::create([
        'name' => 'Tutorial',
        'slug' => 'tutorial',
    ]);

    $this->get(route('admin.category_blog.index'))
        ->assertOk()
        ->assertSee('Tutorial');

    $this->get(route('admin.category_blog.create'))
        ->assertOk();

    $this->get(route('admin.category_blog.edit', $categoryBlog))
        ->assertOk()
        ->assertSee('Tutorial');
});

test('admin can create a category blog with a generated slug', function () {
    $this->post(route('admin.category_blog.store'), [
        'name' => 'Tips & Trik',
    ])->assertRedirect(route('admin.category_blog.index'));

    $this->assertDatabaseHas('category_blogs', [
        'name' => 'Tips & Trik',
        'slug' => 'tips-trik',
    ]);
});

test('admin can update and delete a category blog', function () {
    $categoryBlog = CategoryBlog::create([
        'name' => 'Tutorial',
        'slug' => 'tutorial',
    ]);

    $this->put(route('admin.category_blog.update', $categoryBlog), [
        'name' => 'Panduan',
        'slug' => 'panduan',
    ])->assertRedirect(route('admin.category_blog.index'));

    $this->assertDatabaseHas('category_blogs', [
        'id' => $categoryBlog->id,
        'name' => 'Panduan',
        'slug' => 'panduan',
    ]);

    $this->delete(route('admin.category_blog.destroy', $categoryBlog))
        ->assertRedirect(route('admin.category_blog.index'));

    $this->assertDatabaseMissing('category_blogs', ['id' => $categoryBlog->id]);
});

test('category blog name is required', function () {
    $this->from(route('admin.category_blog.create'))
        ->post(route('admin.category_blog.store'), ['name' => ''])
        ->assertSessionHasErrors('name');

    $this->assertDatabaseCount('category_blogs', 0);
});
