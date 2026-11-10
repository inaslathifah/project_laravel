@extends('admin.layouts.app')
@section('title', 'Manajemen Blog')
@section('subtitle', 'Kelola artikel blog')

@section('content')
    <div class="mb-3" align="right">
        <a href="{{ route('admin.blog.create') }}" class="btn-table-action">
            <i class="bi bi-plus-lg"></i> Tambah Blog
        </a>
    </div>

    <div class="table-responsive">
        <table class="table-custom">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Cover</th>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Judul</th>
                    <th>Slug</th>
                    <th>Deskripsi Singkat</th>
                    <th>Penulis</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($blogs as $blog)
                    <tr>
                        <td><img src="{{ asset('storage/' . $blog->cover_path ?? '') }}" alt=""></td>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $blog->categoryBlog->name ?? '' }}</td>
                        <td>{{ $blog->name ?? '' }}</td>
                        <td>{{ $blog->slug ?? '' }}</td>
                        <td>{{ $blog->author }}</td>
                        <td>
                            <a class="table-btn-action" title="Lihat" href="{{ route('admin.blog.show', $blog) }}">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a class="table-btn-action" title="Edit" href="{{ route('admin.blog.edit', $blog) }}">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('admin.blog.destroy', $blog) }}" method="POST" class="d-inline"
                                onsubmit="return confirm('Yakin ingin menghapus blog ini?')">
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
                        <td colspan="9" class="text-center">Belum ada blog.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
