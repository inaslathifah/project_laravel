@extends('admin.layouts.app')
@section('title', 'Add User')
@section('subtitle', 'Buat Akun Baru Dengan Akses Ke Panel Admin')

@section('content')
    <form action="{{ route('admin.user.update', $user) }}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="" class="form-label-custom">Nama Lengkap *</label>
            <input type="text" class="form-control" name="name" required value="{{ old('name', $user->name) }}">
            {{-- old : biar data yang terakhir di input, datanya akan tetap ada --}}
            @error('name')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label-custom">Email *</label>
            <input type="email" class="form-control" name="email" required value="{{ old('email', $user->email) }}">
            {{-- biar ada validasi --}}
            @error('email')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label-custom">Password *</label>
            <input type="text" class="form-control" name="password">
            <div class="form-text">
                <small>Kosongkan jika ingin mengubah password dan Silakan isi jika ingin menggunakan password baru.</small>
            </div>
            @error('password')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <button type="submit" class="btn-custom btn-custom-primary">Save</button>
        </div>
    </form>
@endsection
