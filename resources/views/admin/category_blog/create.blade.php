@extends('admin.layouts.app')
@section('title', 'Tambah Kategori Blog')
@section('subtitle', 'Buat kategori blog baru')

@section('content')
    <form action="{{ route('admin.category_blog.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label-custom">Nama Kategori *</label>
            <input id="name" type="text" class="form-control" name="name" required value="{{ old('name') }}">
            @error('name')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label-custom">Slug (opsional)</label>
            <input id="slug" type="text" class="form-control" name="slug"
                value="{{ old('slug', $categoryBlog->slug ?? '') }}">
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
