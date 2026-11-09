@extends('admin.layouts.app')
@section('title', 'Edit Blog')
@section('subtitle', 'Perbarui artikel blog')

@section('content')
    <form action="{{ route('admin.blog.update', $blog) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('admin.blog._form')

        <div class="mb-3">
            <button type="submit" class="btn-custom btn-custom-primary">Simpan Perubahan</button>
            <a href="{{ route('admin.blog.index') }}" class="btn-custom btn-custom-warning">Kembali</a>
        </div>
    </form>
@endsection
