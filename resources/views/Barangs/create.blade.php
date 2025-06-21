@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <!-- Page Header -->
        <div
            class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 border-bottom pb-3">
            <div>
                <h1 class="h3 fw-bold text-primary d-flex align-items-center">
                    <i class="bi bi-plus-circle fs-2 me-3 text-primary"></i> Tambah Barang
                </h1>
                <p class="text-muted mb-0">Tambahkan barang baru ke dalam inventori</p>
            </div>
        </div>

        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb shadow-sm bg-white px-4 py-2 rounded-3">
                <li class="breadcrumb-item">
                    <a href="{{ route('barangs.index') }}" class="text-decoration-none text-primary fw-semibold">
                        <i class="bi bi-house me-1"></i>Daftar Barang
                    </a>
                </li>
                <li class="breadcrumb-item active fw-semibold" aria-current="page">Tambah Barang</li>
            </ol>
        </nav>

        <!-- Form Card -->
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-gradient-primary text-white">
                        <h5 class="mb-0">
                            <i class="bi bi-file-earmark-plus me-2"></i> Form Tambah Barang
                        </h5>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('barangs.store') }}" method="POST" id="barangForm">
                            @csrf

                            <!-- Kode Barang -->
                            <div class="mb-3">
                                <label for="kode_barang" class="form-label">Kode Barang <span
                                        class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-upc-scan"></i></span>
                                    <input type="text" name="kode_barang" id="kode_barang"
                                        class="form-control @error('kode_barang') is-invalid @enderror"
                                        value="{{ old('kode_barang') }}" required>
                                    <button type="button" class="btn btn-outline-secondary" onclick="generateKode()">
                                        <i class="bi bi-arrow-clockwise"></i>
                                    </button>
                                    @error('kode_barang')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Nama Barang -->
                            <div class="mb-3">
                                <label for="nama_barang" class="form-label">Nama Barang <span
                                        class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-box"></i></span>
                                    <input type="text" name="nama_barang" id="nama_barang"
                                        class="form-control @error('nama_barang') is-invalid @enderror"
                                        value="{{ old('nama_barang') }}" required>
                                    @error('nama_barang')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Stok dan Harga -->
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="stok" class="form-label">Stok <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-stack"></i></span>
                                        <input type="number" name="stok" id="stok"
                                            class="form-control @error('stok') is-invalid @enderror"
                                            value="{{ old('stok') }}" min="0" required>
                                        <span class="input-group-text">pcs</span>
                                    </div>
                                    @error('stok')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="harga" class="form-label">Harga <span
                                            class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text">Rp</span>
                                        <input type="number" name="harga" id="harga"
                                            class="form-control @error('harga') is-invalid @enderror"
                                            value="{{ old('harga') }}" min="0" step="0.01" required>
                                    </div>
                                    @error('harga')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Kategori -->
                            <div class="mb-3">
                                <label for="kategori" class="form-label">Kategori</label>
                                <select name="kategori" id="kategori" class="form-select">
                                    <option value="">Pilih Kategori (Opsional)</option>
                                    <option value="elektronik">Elektronik</option>
                                    <option value="fashion">Fashion</option>
                                    <option value="makanan">Makanan & Minuman</option>
                                    <option value="kesehatan">Kesehatan & Kecantikan</option>
                                    <option value="rumah">Rumah & Taman</option>
                                    <option value="olahraga">Olahraga</option>
                                    <option value="lainnya">Lainnya</option>
                                </select>
                            </div>

                            <!-- Deskripsi -->
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3" maxlength="255">{{ old('deskripsi') }}</textarea>
                                <div class="form-text">Maksimal 255 karakter</div>
                            </div>

                            <!-- Barcode Preview -->
                            <div class="mb-3 text-center" id="barcodePreview" style="display: none;">
                                <h6 class="text-muted">Preview Barcode</h6>
                                <img id="barcodeImage" src="" alt="Barcode" style="max-height: 80px;">
                            </div>


                            <!-- Preview -->
                            <div class="card border-dashed mb-4" id="previewCard" style="display: none;">
                                <div class="card-body d-flex align-items-center">
                                    <div class="bg-primary text-white rounded-circle d-flex justify-content-center align-items-center me-3"
                                        style="width: 60px; height: 60px;">
                                        <i class="bi bi-box fs-4"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1" id="previewNama">-</h6>
                                        <div class="mb-1">
                                            <span class="badge bg-primary" id="previewKode">-</span>
                                            <span class="badge bg-success ms-2" id="previewStok">Stok: -</span>
                                        </div>
                                        <strong class="text-success" id="previewHarga">Rp -</strong>
                                    </div>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('barangs.index') }}" class="btn btn-outline-secondary">
                                    <i class="bi bi-arrow-left me-1"></i> Kembali
                                </a>
                                <div>
                                    <button type="reset" class="btn btn-outline-warning me-2" onclick="resetForm()">
                                        <i class="bi bi-arrow-clockwise me-1"></i> Reset
                                    </button>
                                    <button type="submit" class="btn btn-success" id="submitBtn">
                                        <i class="bi bi-check-circle me-1"></i> Simpan Barang
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Tips -->
                <div class="card mt-4">
                    <div class="card-body">
                        <h6 class="text-primary mb-3"><i class="bi bi-lightbulb me-2"></i>Tips Pengisian Form</h6>
                        <ul class="mb-0 ps-3">
                            <li>Gunakan kode barang yang unik</li>
                            <li>Nama barang harus deskriptif</li>
                            <li>Pastikan stok & harga sesuai realita</li>
                            <li>Gunakan kategori untuk pengelompokan</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Style -->
    <style>
        .bg-gradient-primary {
            background: linear-gradient(135deg, #667eea, #764ba2);
        }

        .border-dashed {
            border: 2px dashed #dee2e6 !important;
        }
    </style>

    <!-- Script -->
    <script>
        function generateKode() {
            const prefix = 'BRG';
            const timestamp = Date.now().toString().slice(-6);
            const kode = prefix + timestamp;
            document.getElementById('kode_barang').value = kode;
            updatePreview();
            generateBarcode(kode);
        }

        function generateBarcode(kode) {
            if (!kode) {
                document.getElementById('barcodePreview').style.display = 'none';
                return;
            }

            const src = `https://barcode.tec-it.com/barcode.ashx?data=${kode}&code=Code128&dpi=96`;
            document.getElementById('barcodeImage').src = src;
            document.getElementById('barcodePreview').style.display = 'block';
        }

        function updatePreview() {
            const nama = document.getElementById('nama_barang').value || '-';
            const kode = document.getElementById('kode_barang').value || '-';
            const stok = document.getElementById('stok').value || '0';
            const harga = document.getElementById('harga').value || '0';

            document.getElementById('previewNama').textContent = nama;
            document.getElementById('previewKode').textContent = kode;
            document.getElementById('previewStok').textContent = `Stok: ${stok}`;
            document.getElementById('previewHarga').textContent = `Rp ${parseInt(harga).toLocaleString('id-ID')}`;

            document.getElementById('previewCard').style.display = (nama !== '-' || kode !== '-') ? 'block' : 'none';

            // Update barcode on kode change
            generateBarcode(kode);
        }

        document.addEventListener('DOMContentLoaded', function() {
            ['nama_barang', 'kode_barang', 'stok', 'harga'].forEach(id => {
                document.getElementById(id).addEventListener('input', updatePreview);
            });

            updatePreview();
        });
    </script>
@endsection
