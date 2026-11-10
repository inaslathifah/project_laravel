@extends('admin.dashboard.index')
@section('title', 'Pengaturan Website')
@section('subtitle', 'Konfigurasi identitas website, logo, kontak dan informasi profil')

@section('content')
    <form action="{{ route('admin.settings.update') }}" method="post" enctype="multipart/form-data">
        @csrf

        <ul class="nav nav-tabs mb-3" id="defaultTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active text-dark" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane"
                    type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">
                    <i class="bi bi-house-door me-1"></i> Pengaturan Umum
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link text-dark" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane"
                    type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false" tabindex="-1">
                    <i class="bi bi-telephone me-1"></i> Kontak & Lokasi
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link text-dark" id="messages-tab" data-bs-toggle="tab"
                    data-bs-target="#messages-tab-pane" type="button" role="tab" aria-controls="messages-tab-pane"
                    aria-selected="false" tabindex="-1">
                    <i class="bi bi-link me-1"></i> Media Sosial
                </button>
            </li>
        </ul>

        <div class="tab-content text-muted-green small" id="defaultTabsContent">
            <div class="tab-pane fade active show mt-4" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab"
                tabindex="0">
                <h5 class="fw-bold text-main mb-3">Pengaturan Umum</h5>
                <div class="mb-3">
                    <label for="" class="form-label">Nama Lembaga/Website</label>
                    <input type="text" class="form-control" name="site_name"
                        value="{{ old('site_name', optional($setting->get('site_name'))->value) }}">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Tagline Website</label>
                    <input type="text" class="form-control" name="site_tagline"
                        value="{{ old('site_tagline', optional($setting->get('site_tagline'))->value) }}">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Deskripsi Singkat Website</label>
                    <textarea name="sire_description" id="" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Logo Utama Website</label>
                    <input type="file" name="site_logo">
                </div>
                @if (optional($setting->get('site_logo'))->value)
                    <div>
                        <img width="100" src="{{ asset('storage/' . $setting->get('site_logo')->value) }}"
                            alt="Site Logo">
                    </div>
                @endif
            </div>
            <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                <h5 class="fw-bold text-main mb-3">Kontak & Lokasi</h5>
                <div class="mb-3">
                    <label for="" class="form-label">Nomer Telpon Utama</label>
                    <input type="text" class="form-control" name="phone"
                        value="{{ old('phone', optional($setting->get('phone'))->value) }}">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Email Upload</label>
                    <input type="text" class="form-control" name="email_upload"
                        value="{{ old('email_upload', optional($setting->get('email_upload'))->value) }}">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Email Order</label>
                    <input type="text" class="form-control" name="email_order"
                        value="{{ old('email_order', optional($setting->get('email_order'))->value) }}">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Alamat</label>
                    <textarea name="address" id="" cols="30" rows="10" class="form-control"></textarea>
                </div>
            </div>

            <div class="tab-pane fade" id="messages-tab-pane" role="tabpanel" aria-labelledby="messages-tab"
                tabindex="0">
                <h5 class="fw-bold text-main mb-3">Sosial Media</h5>
                <div class="mb-3">
                    <label for="" class="form-label">Url Shopee</label>
                    <input type="text" class="form-control" name="url_shopee"
                        value="{{ old('url_shopeee', optional($setting->get('url_shopee'))->value) }}">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Url Facebook</label>
                    <input type="text" class="form-control" name="url_facebook"
                        value="{{ old('url_facebook', optional($setting->get('url_facebook'))->value) }}">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Url Instagram</label>
                    <input type="text" class="form-control" name="url_instagram"
                        value="{{ old('url_instagram', optional($setting->get('url_instagram'))->value) }}">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Url Youtube</label>
                    <input type="text" class="form-control" name="url_youtube"
                        value="{{ old('url_youtube', optional($setting->get('url_youtube'))->value) }}">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Url Tiktok</label>
                    <input type="text" class="form-control" name="url_tiktok"
                        value="{{ old('url_tiktok', optional($setting->get('url_tiktok'))->value) }}">
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button class="btn-custom btn-custom-primary" type="submit">Save</button>
        </div>
    </form>

@endsection
