@extends('admin.layouts.app')
@section('title', 'Edit Kategori Blog')
@section('subtitle', 'Perbarui kategori blog')

@section('content')
    <form action="{{ route('admin.category_blog.update', $categoryBlog) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label-custom">Nama Kategori *</label>
            <input id="name" type="text" class="form-control" name="name" required
                value="{{ old('name', $categoryBlog->name) }}">
            @error('name')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label-custom">Slug (opsional)</label>
            <input id="slug" type="text" class="form-control" name="slug"
                value="{{ old('slug', $categoryBlog->slug) }}">
            @error('slug')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <button type="submit" class="btn-custom btn-custom-primary">Simpan</button>
            <a href="{{ route('admin.category_blog.index') }}" class="btn-custom btn-custom-warning">Kembali</a>
        </div>
    </form>
@endsection
