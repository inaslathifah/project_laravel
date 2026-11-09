@extends('admin.layouts.app')
@section('title', 'Tambah Produk')
@section('subtitle', 'Tambah Produk Baru Untuk Ditampilkan Di PPKD Sticker')

@section('content')
    <form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="">Nama Produk *</label>
            <input type="text" name="name" class="form-control">
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="mb-3">
                    <label for="" class="form-label">Slug (opsional)</label>
                    <input type="text" name="slug" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="" class="form-label">Kategori</label>
                    <select name="category_id" class="form-select">
                        <option value="">--Pilih Kategori--</option>
                        @foreach ($categories as $c)
                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label for="stock" class="form-label">Stok</label>
            <input type="number" name="stock" id="stock" class="form-control" min="0" required>
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Deskripsi Singkat</label>
            <input type="text" name="brief_description" class="form-control">
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Deskripsi</label>
            <textarea type="text" name="description" id="" class="d-none" rows="10" cols="30"></textarea>
            <div id="editor">{!! old('description') !!}</div>
        </div>

        <div class="row">
            <div class="col-sm-4">
                <div class="mb-3">
                    <label for="" class="form-label">Harga</label>
                    <input type="number" name="price" class="form-control">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="mb-3">
                    <label for="" class="form-label">Harga Art Cartoon</label>
                    <input type="number" name="price_art_cartoon" class="form-control">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="mb-3">
                    <label for="" class="form-label">Harga Art Paper</label>
                    <input type="number" name="price_art_paper" class="form-control">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="mb-3">
                    <label for="" class="form-label">Harga HVS</label>
                    <input type="number" name="price_hvs" class="form-control">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4">
                <div class="mb-3">
                    <label for="" class="form-label">Harga Laminating Doff</label>
                    <input type="number" name="price_doff" class="form-control">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="mb-3">
                    <label for="" class="form-label">Harga Laminating Glossy</label>
                    <input type="number" name="price_glossy" class="form-control">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="mb-3">
                    <label for="" class="form-label">Harga Potong (min 5x5 cm)</label>
                    <input type="number" name="cutting_price" class="form-control">
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Gambar</label>
            <input type="file" name="image[]" class="form-control">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn-custom btn-custom-primary">
                Simpan
            </button>
            <a href="{{ url()->previous() }}" class="btn-custom btn-custom-warning">Kembali</a>
        </div>
    </form>
@endsection
