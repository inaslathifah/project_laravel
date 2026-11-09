@extends('admin.layouts.app')
@section('title', 'Tambah Blog')
@section('subtitle', 'Buat artikel blog baru')

@section('content')
    <form action="{{ route('admin.blog.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('admin.blog._form')

        <div class="mb-3">
            <button type="submit" class="btn-custom btn-custom-primary">Simpan</button>
            <a href="{{ route('admin.blog.index') }}" class="btn-custom btn-custom-warning">Kembali</a>
        </div>
    </form>
@endsection
