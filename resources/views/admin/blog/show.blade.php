@extends('admin.layouts.app')
@section('title', 'Detail Blog')
@section('subtitle', 'Informasi artikel blog')

@section('content')
    <dl class="row">
        <dt class="col-sm-3">Kategori</dt>
        <dd class="col-sm-9">{{ $blog->categoryBlog->name }}</dd>

        <dt class="col-sm-3">Judul</dt>
        <dd class="col-sm-9">{{ $blog->name }}</dd>

        <dt class="col-sm-3">Slug</dt>
        <dd class="col-sm-9">{{ $blog->slug }}</dd>

        <dt class="col-sm-3">Deskripsi Singkat</dt>
        <dd class="col-sm-9">{{ $blog->brief_description ?: '-' }}</dd>

        <dt class="col-sm-3">Penulis</dt>
        <dd class="col-sm-9">{{ $blog->author }}</dd>

        @if ($blog->cover_path)
            <dt class="col-sm-3">Cover</dt>
            <dd class="col-sm-9">
                <img src="{{ asset('storage/' . $blog->cover_path) }}" alt="Cover {{ $blog->name }}" width="240">
            </dd>
        @endif

        <dt class="col-sm-3">Konten</dt>
        <dd class="col-sm-9">{!! nl2br(e($blog->content)) !!}</dd>
    </dl>

    <a href="{{ route('admin.blog.edit', $blog) }}" class="btn-custom btn-custom-primary">Edit</a>
    <a href="{{ route('admin.blog.index') }}" class="btn-custom btn-custom-warning">Kembali</a>
@endsection
