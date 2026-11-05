@extends('admin.layouts.app')
@section('title', 'Edit Produk')
@section('subtitle', 'Perbarui Informasi Produk')

@section('content')
    <form action="{{ route('admin.product.update', $product) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nama Produk *</label>
            <input type="text" name="name" id="name" class="form-control"
                value="{{ old('name', $product->name) }}" required>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="mb-3">
                    <label for="slug" class="form-label">Slug (opsional)</label>
                    <input type="text" name="slug" id="slug" class="form-control"
                        value="{{ old('slug', $product->slug) }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="category_id" class="form-label">Kategori</label>
                    <select name="category_id" id="category_id" class="form-select" required>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @selected(old('category_id', $product->category_id) == $category->id)>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label for="stock" class="form-label">Stok *</label>
            <input type="number" name="stock" id="stock" class="form-control" min="0"
                value="{{ old('stock', $product->stock) }}" required>
        </div>

        <div class="mb-3">
            <label for="brief_description" class="form-label">Deskripsi Singkat</label>
            <input type="text" name="brief_description" id="brief_description" class="form-control"
                value="{{ old('brief_description', $product->brief_description) }}">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea name="description" id="description" class="form-control" rows="10">{{ old('description', $product->description) }}</textarea>
        </div>

        <div class="row">
            @foreach ([
                'price' => 'Harga',
                'price_art_cartoon' => 'Harga Art Cartoon',
                'price_art_paper' => 'Harga Art Paper',
                'price_hvs' => 'Harga HVS',
                'price_doff' => 'Harga Laminating Doff',
                'price_glossy' => 'Harga Laminating Glossy',
                'cutting_price' => 'Harga Potong',
            ] as $field => $label)
                <div class="col-sm-4">
                    <div class="mb-3">
                        <label for="{{ $field }}" class="form-label">{{ $label }}</label>
                        <input type="number" name="{{ $field }}" id="{{ $field }}" class="form-control"
                            value="{{ old($field, $product->{$field}) }}" @required($field === 'price')>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Gambar Baru (opsional)</label>
            <input type="file" name="image" id="image" class="form-control" accept=".png,.jpg,.jpeg,.gif">
            @if ($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="120"
                    class="mt-2">
            @endif
        </div>

        <div class="mb-3">
            <button type="submit" class="btn-custom btn-custom-primary">Simpan Perubahan</button>
            <a href="{{ route('admin.product.index') }}" class="btn-custom btn-custom-warning">Kembali</a>
        </div>
    </form>
@endsection
