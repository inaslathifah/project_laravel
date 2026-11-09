@extends('layouts.app')
@section('content')
    <div class="flex flex-col w-full">
        <!-- Breadcrumb Navigation -->
        <div class="bg-light border-bottom py-2">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 py-1" style="font-size: 0.85rem;">
                        <li class="breadcrumb-item">
                            <a class="text-decoration-none text-muted d-inline-flex align-items-center gap-1"
                                href="index.html">
                                <i class="bi bi-house-door"></i> Beranda
                            </a>
                        </li>
                        <li aria-current="page" class="breadcrumb-item active text-primary fw-semibold">Hubungi Kami</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- BEGIN: KontakHero -->
        <section class="py-4 py-lg-5 bg-white border-bottom">
            <div class="container">
                <div class="row align-items-center g-4">
                    <div class="col-lg-8">
                        <div class="d-inline-flex align-items-center gap-2 px-3 py-1 rounded-pill bg-light text-primary fw-semibold mb-3 border"
                            style="font-size: 0.8rem;">
                            <i class="bi bi-chat-dots-fill text-danger"></i> Hubungi Kami
                        </div>
                        <h1 class="display-6 fw-bold text-dark mb-3 lh-sm">Ada pertanyaan soal cetakan Anda?</h1>
                        <p class="text-muted fs-6 mb-0 pe-lg-4 lh-base">
                            Chat CS PrimaGraphia lewat WhatsApp, kirim email, atau datang langsung ke outlet terdekat. Tim
                            kami siap membantu dari konsultasi bahan hingga penawaran harga.
                        </p>
                    </div>
                    <div class="col-lg-4">
                        <div class="p-4 bg-light rounded-4 border">
                            <div class="d-flex align-items-center gap-2 mb-3">
                                <i class="bi bi-clock-fill text-primary"></i>
                                <h2 class="h6 fw-bold mb-0">Jam Operasional</h2>
                            </div>
                            <dl class="row small mb-0 gy-1">
                                <dt class="col-7 fw-normal text-muted">Senin – Jum’at</dt>
                                <dd class="col-5 text-end fw-semibold text-dark mb-0">09.00 – 18.00</dd>
                                <dt class="col-7 fw-normal text-muted">Sabtu</dt>
                                <dd class="col-5 text-end fw-semibold text-dark mb-0">08.00 – 18.00</dd>
                                <dt class="col-7 fw-normal text-muted">Minggu &amp; Tanggal Merah</dt>
                                <dd class="col-5 text-end fw-semibold text-danger mb-0">Libur</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END: KontakHero -->
        <!-- BEGIN: ContactChannels -->
        <section class="py-5 bg-light">
            <div class="container">
                <div class="row row-cols-1 row-cols-md-3 g-4 mb-5">
                    <div class="col">
                        <div class="card h-100 border-0 shadow-sm rounded-4 kontak-channel">
                            <div class="card-body p-4 d-flex flex-column">
                                <div class="rounded-circle bg-success bg-opacity-10 text-success d-flex align-items-center justify-content-center mb-3"
                                    style="width: 52px; height: 52px;">
                                    <i class="bi bi-whatsapp fs-4"></i>
                                </div>
                                <h2 class="h6 fw-bold text-dark mb-1">WhatsApp CS</h2>
                                <p class="small text-muted mb-3">CS, chat only</p>
                                <a class="fw-bold text-dark text-break mb-3"
                                    href="https://wa.me/{{ $settings['phone'] ?? '' }}" rel="noopener noreferrer"
                                    target="_blank">+{{ $settings['phone'] ?? '' }}</a>
                                <a class="btn btn-sm btn-outline-success rounded-pill px-3 mt-auto align-self-start fw-semibold"
                                    href="https://wa.me/{{ $settings['phone'] ?? '' }}" rel="noopener noreferrer"
                                    target="_blank">Chat
                                    sekarang <i class="bi bi-arrow-right ms-1"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100 border-0 shadow-sm rounded-4 kontak-channel">
                            <div class="card-body p-4 d-flex flex-column">
                                <div class="rounded-circle bg-primary bg-opacity-10 text-primary d-flex align-items-center justify-content-center mb-3"
                                    style="width: 52px; height: 52px;">
                                    <i class="bi bi-cloud-arrow-up fs-4"></i>
                                </div>
                                <h2 class="h6 fw-bold text-dark mb-1">Upload file</h2>
                                <p class="small text-muted mb-3">Kirim file siap cetak (WeTransfer, Dropbox, Google Drive
                                    hingga 2 GB)</p>
                                <a class="fw-bold text-dark text-break mb-3"
                                    href="mailto:upload@primagraphia.co.id">upload@primagraphia.co.id</a>
                                <a class="btn btn-sm btn-outline-primary rounded-pill px-3 mt-auto align-self-start fw-semibold"
                                    href="mailto:upload@primagraphia.co.id">Kirim email <i
                                        class="bi bi-arrow-right ms-1"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100 border-0 shadow-sm rounded-4 kontak-channel">
                            <div class="card-body p-4 d-flex flex-column">
                                <div class="rounded-circle bg-danger bg-opacity-10 text-danger d-flex align-items-center justify-content-center mb-3"
                                    style="width: 52px; height: 52px;">
                                    <i class="bi bi-box-seam fs-4"></i>
                                </div>
                                <h2 class="h6 fw-bold text-dark mb-1">Order custom</h2>
                                <p class="small text-muted mb-3">Produk custom atau yang belum tersedia di website</p>
                                <a class="fw-bold text-dark text-break mb-3"
                                    href="mailto:custom@primagraphia.co.id">custom@primagraphia.co.id</a>
                                <a class="btn btn-sm btn-outline-danger rounded-pill px-3 mt-auto align-self-start fw-semibold"
                                    href="mailto:custom@primagraphia.co.id">Kirim email <i
                                        class="bi bi-arrow-right ms-1"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-4 g-xl-5">
                    <!-- WhatsApp order form -->
                    <div class="col-lg-7">
                        <div class="card border-0 shadow-sm rounded-4 h-100">
                            <div class="card-body p-4 p-lg-5">
                                <h2 class="h5 fw-bold text-dark mb-1">Kirim kebutuhan cetak Anda</h2>
                                <p class="small text-muted mb-4">Isi formulir di bawah, lalu pesan akan dibuka di WhatsApp
                                    CS kami dalam format yang sudah rapi.</p>
                                <form class="needs-validation" id="kontakForm" novalidate>
                                    <h3 class="small text-uppercase fw-bold text-muted mb-3" style="letter-spacing: .05em;">
                                        Kebutuhan cetak</h3>
                                    <div class="row g-3 mb-4">
                                        <div class="col-12">
                                            <label class="form-label small fw-semibold" for="produk">Produk <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" id="produk" name="produk"
                                                placeholder="Mis. Kartu nama, stiker vinyl, banner" type="text"
                                                required />
                                            <div class="invalid-feedback">Isi produk yang ingin dicetak.</div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label small fw-semibold" for="ukuran">Ukuran</label>
                                            <input class="form-control" id="ukuran" name="ukuran"
                                                placeholder="Mis. 9 x 5,5 cm" type="text" />

                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label small fw-semibold" for="quantity">Quantity</label>
                                            <input class="form-control" id="quantity" name="quantity"
                                                placeholder="Mis. 2 box / 500 pcs" type="text" />

                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label small fw-semibold" for="bahan">Bahan</label>
                                            <input class="form-control" id="bahan" name="bahan"
                                                placeholder="Mis. Art carton 310 gsm" type="text" />

                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label small fw-semibold" for="finishing">Finishing</label>
                                            <input class="form-control" id="finishing" name="finishing"
                                                placeholder="Mis. Laminasi doff, spot UV" type="text" />

                                        </div>
                                    </div>
                                    <h3 class="small text-uppercase fw-bold text-muted mb-3"
                                        style="letter-spacing: .05em;">Data Anda</h3>
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="form-label small fw-semibold" for="nama">Nama <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" id="nama" name="nama"
                                                placeholder="Nama lengkap" type="text" required autocomplete="name" />
                                            <div class="invalid-feedback">Isi nama Anda.</div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label small fw-semibold" for="noId">No ID</label>
                                            <input class="form-control" id="noId" name="noId"
                                                placeholder="Opsional" type="text" />
                                            <div class="form-text">Jika sudah pernah transaksi.</div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label small fw-semibold" for="whatsapp">No. WhatsApp <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" id="whatsapp" name="whatsapp"
                                                placeholder="08xxxxxxxxxx" type="tel" required autocomplete="tel"
                                                inputmode="tel" pattern="^(\+62|62|0)8[0-9]{7,12}$" />
                                            <div class="invalid-feedback">Isi nomor WhatsApp yang valid.</div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label small fw-semibold" for="alamat">Alamat</label>
                                            <textarea class="form-control" id="alamat" name="alamat" placeholder="Alamat pengiriman" rows="1"
                                                autocomplete="street-address"></textarea>
                                        </div>
                                    </div>
                                    <div
                                        class="d-flex flex-column flex-sm-row align-items-sm-center justify-content-between gap-3 mt-4 pt-3 border-top">
                                        <p class="small text-muted mb-0"><i
                                                class="bi bi-shield-check text-success me-1"></i>Data hanya dikirim ke
                                            WhatsApp CS PrimaGraphia.</p>
                                        <button
                                            class="btn btn-pg-primary rounded-pill px-4 py-2 fw-semibold d-inline-flex align-items-center justify-content-center gap-2 shadow-sm"
                                            type="submit">
                                            <i class="bi bi-whatsapp"></i> Kirim via WhatsApp
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Office info & map -->
                    <div class="col-lg-5">
                        <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100">
                            <div class="ratio ratio-4x3 bg-secondary-subtle">
                                <iframe allowfullscreen="" class="border-0" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"
                                    src="https://maps.google.com/maps?q=PrimaGraphia%20Kepu%20Selatan%20No.66%20Jakarta&amp;z=16&amp;output=embed"
                                    title="Peta lokasi kantor PrimaGraphia"></iframe>
                            </div>
                            <div class="card-body p-4">
                                <span class="badge bg-danger rounded-pill px-3 py-2 mb-3"><i
                                        class="bi bi-star-fill me-1"></i>Kantor Pusat</span>
                                <h2 class="h6 fw-bold text-dark mb-2">PT PrimaGraphia Teknologi</h2>
                                <p class="small text-muted d-flex gap-2 mb-3"><i
                                        class="bi bi-geo-alt-fill text-primary"></i><span>Jl. Kepu Selatan No.66,
                                        RT.6/RW.1, Bungur, Kec. Senen, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta
                                        10460</span></p>
                                <div class="d-flex flex-wrap gap-2 mb-4">
                                    <a class="btn btn-sm btn-pg-primary rounded-pill px-3 fw-semibold"
                                        href="https://maps.google.com/?q=PrimaGraphia+Kepu+Selatan+Jakarta"
                                        rel="noopener noreferrer" target="_blank"><i
                                            class="bi bi-sign-turn-right me-1"></i>Petunjuk arah</a>
                                    <a class="btn btn-sm btn-outline-secondary rounded-pill px-3 fw-semibold"
                                        href="outlet.html"><i class="bi bi-shop me-1"></i>Semua outlet</a>
                                </div>
                                <div class="border-top pt-3">
                                    <div class="small fw-semibold text-dark mb-2">Ikuti PrimaGraphia</div>
                                    <div class="d-flex flex-wrap gap-2">
                                        <a aria-label="PrimaGraphia di Shopee"
                                            class="btn btn-light border rounded-circle kontak-social"
                                            href="https://shopee.co.id/primagraphiaprint" rel="noopener noreferrer"
                                            target="_blank"><i class="bi bi-bag"></i></a>
                                        <a aria-label="PrimaGraphia di Facebook"
                                            class="btn btn-light border rounded-circle kontak-social"
                                            href="https://facebook.com/PrimaGraphiaPrint" rel="noopener noreferrer"
                                            target="_blank"><i class="bi bi-facebook"></i></a>
                                        <a aria-label="PrimaGraphia di Instagram"
                                            class="btn btn-light border rounded-circle kontak-social"
                                            href="https://instagram.com/primagraphiaofficial" rel="noopener noreferrer"
                                            target="_blank"><i class="bi bi-instagram"></i></a>
                                        <a aria-label="PrimaGraphia di YouTube"
                                            class="btn btn-light border rounded-circle kontak-social"
                                            href="https://www.youtube.com/channel/UCJyn5bVloUjSUgy8jf33gGQ"
                                            rel="noopener noreferrer" target="_blank"><i class="bi bi-youtube"></i></a>
                                        <a aria-label="PrimaGraphia di TikTok"
                                            class="btn btn-light border rounded-circle kontak-social"
                                            href="https://www.tiktok.com/@primagraphiaofficial" rel="noopener noreferrer"
                                            target="_blank"><i class="bi bi-tiktok"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END: ContactChannels -->
        <!-- BEGIN: Assurances -->
        <section class="py-4 bg-white border-top">
            <div class="container">
                <div class="row g-3">
                    <div class="col-6 col-lg-3">
                        <div class="usp-item d-flex align-items-center gap-3 h-100 p-3 bg-white border rounded-4">
                            <div class="rounded-circle bg-primary bg-opacity-10 text-primary d-flex align-items-center justify-content-center flex-shrink-0"
                                style="width: 44px; height: 44px;"><i class="bi bi-tags fs-5"></i></div>
                            <div>
                                <div class="fw-bold text-dark small">Harga kompetitif</div>
                                <div class="text-muted" style="font-size: 0.75rem;">Harga terjangkau</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3">
                        <div class="usp-item d-flex align-items-center gap-3 h-100 p-3 bg-white border rounded-4">
                            <div class="rounded-circle bg-primary bg-opacity-10 text-primary d-flex align-items-center justify-content-center flex-shrink-0"
                                style="width: 44px; height: 44px;"><i class="bi bi-patch-check fs-5"></i></div>
                            <div>
                                <div class="fw-bold text-dark small">Garansi</div>
                                <div class="text-muted" style="font-size: 0.75rem;">Hasil berkualitas</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3">
                        <div class="usp-item d-flex align-items-center gap-3 h-100 p-3 bg-white border rounded-4">
                            <div class="rounded-circle bg-primary bg-opacity-10 text-primary d-flex align-items-center justify-content-center flex-shrink-0"
                                style="width: 44px; height: 44px;"><i class="bi bi-truck fs-5"></i></div>
                            <div>
                                <div class="fw-bold text-dark small">Pengiriman cepat</div>
                                <div class="text-muted" style="font-size: 0.75rem;">Diantar ke alamat Anda</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3">
                        <div class="usp-item d-flex align-items-center gap-3 h-100 p-3 bg-white border rounded-4">
                            <div class="rounded-circle bg-primary bg-opacity-10 text-primary d-flex align-items-center justify-content-center flex-shrink-0"
                                style="width: 44px; height: 44px;"><i class="bi bi-shield-lock fs-5"></i></div>
                            <div>
                                <div class="fw-bold text-dark small">Pembayaran aman</div>
                                <div class="text-muted" style="font-size: 0.75rem;">Bersertifikat SSL</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END: Assurances -->
        <!-- BEGIN: KontakFaqCTA -->
        <section class="pb-5 bg-white">
            <div class="container">
                <div class="cta-wa-banner p-4 p-md-5">
                    <div class="row align-items-center justify-content-between g-3">
                        <div class="col-lg-8">
                            <h2 class="h4 fw-bold text-dark mb-2">Cari jawaban cepat?</h2>
                            <p class="text-muted mb-0">Cek Pusat Bantuan untuk ketentuan file, cara pemesanan, pembayaran,
                                dan refund.</p>
                        </div>
                        <div class="col-lg-4 text-lg-end">
                            <a class="btn btn-outline-primary rounded-pill px-4 py-2 fw-semibold d-inline-flex align-items-center gap-2"
                                href="faq.html">
                                <i class="bi bi-question-circle"></i> Lihat FAQ
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END: KontakFaqCTA -->
    </div>
@endsection
