@extends('admin.layouts.app')
@section('title', 'Manajemen Kategori Blog')
@section('subtitle', 'Pengelompokan kategori blog')

@section('content')
    <div class="mb-3" align="right">
        <a href="{{ route('admin.category_blog.create') }}" class="btn-table-action">
            <i class="bi bi-plus-lg"></i> Tambah Kategori Blog
        </a>
    </div>

    <div class="table-responsive">
        <table class="table-custom">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Slug URL</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $category)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->slug }}</td>
                        <td>
                            <a class="table-btn-action" title="Edit"
                                href="{{ route('admin.category_blog.edit', $category) }}">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('admin.category_blog.destroy', $category) }}" method="POST"
                                class="d-inline"
                                onsubmit="return confirm('Yakin ingin menghapus kategori blog ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="table-btn-action delete" title="Hapus" type="submit">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Belum ada kategori blog.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
