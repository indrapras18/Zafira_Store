@extends('layouts.app')

@section('content')
    <div class="container-fluid py-4">
        <!-- Page Header -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="page-header-card">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center">
                        <div class="header-content">
                            <div class="d-flex align-items-center mb-2">
                                <div class="header-icon">
                                    <i class="bi bi-plus-circle"></i>
                                </div>
                                <div>
                                    <h1 class="page-title mb-0">Tambah Barang</h1>
                                    <p class="page-subtitle mb-0">Tambahkan barang baru ke dalam inventori</p>
                                </div>
                            </div>
                        </div>
                        <div class="header-actions">
                            <a href="{{ route('barangs.index') }}" class="btn btn-outline-primary">
                                <i class="bi bi-arrow-left me-2"></i>Kembali ke Daftar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Breadcrumb -->
        <div class="row mb-4">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb-modern">
                        <li class="breadcrumb-item">
                            <a href="{{ route('barangs.index') }}">
                                <i class="bi bi-house me-1"></i>Daftar Barang
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Barang</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <!-- Main Form -->
            <div class="col-lg-8">
                <div class="form-card">
                    <div class="form-card-header">
                        <h5 class="form-card-title">
                            <i class="bi bi-file-earmark-plus me-2"></i>Informasi Barang
                        </h5>
                    </div>
                    <div class="form-card-body">
                        <form action="{{ route('barangs.store') }}" method="POST" id="barangForm">
                            @csrf

                            <!-- Basic Information Section -->
                            <div class="form-section">
                                <h6 class="section-title">Informasi Dasar</h6>
                                
                                <div class="row">
                                    <!-- Kode Barang -->
                                    <div class="col-md-6 mb-3">
                                        <label for="kode_barang" class="form-label">
                                            Kode Barang <span class="required">*</span>
                                        </label>
                                        <div class="input-group input-group-modern">
                                            <span class="input-group-text">
                                                <i class="bi bi-upc-scan text-primary"></i>
                                            </span>
                                            <input type="text" name="kode_barang" id="kode_barang"
                                                class="form-control @error('kode_barang') is-invalid @enderror"
                                                value="{{ old('kode_barang') }}" required placeholder="Masukkan kode barang">
                                            <button type="button" class="btn btn-outline-primary" onclick="generateKode()" title="Generate Kode">
                                                <i class="bi bi-arrow-clockwise"></i>
                                            </button>
                                            @error('kode_barang')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Nama Barang -->
                                    <div class="col-md-6 mb-3">
                                        <label for="nama_barang" class="form-label">
                                            Nama Barang <span class="required">*</span>
                                        </label>
                                        <div class="input-group input-group-modern">
                                            <span class="input-group-text">
                                                <i class="bi bi-box text-primary"></i>
                                            </span>
                                            <input type="text" name="nama_barang" id="nama_barang"
                                                class="form-control @error('nama_barang') is-invalid @enderror"
                                                value="{{ old('nama_barang') }}" required placeholder="Masukkan nama barang">
                                            @error('nama_barang')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Kategori -->
                                <div class="mb-3">
                                    <label for="kategori" class="form-label">Kategori</label>
                                    <select name="kategori" id="kategori" class="form-select form-select-modern">
                                        <option value="">Pilih Kategori (Opsional)</option>
                                        <option value="elektronik">📱 Elektronik</option>
                                        <option value="fashion">👕 Fashion</option>
                                        <option value="makanan">🍕 Makanan & Minuman</option>
                                        <option value="kesehatan">💊 Kesehatan & Kecantikan</option>
                                        <option value="rumah">🏠 Rumah & Taman</option>
                                        <option value="olahraga">⚽ Olahraga</option>
                                        <option value="lainnya">📦 Lainnya</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Stock & Price Section -->
                            <div class="form-section">
                                <h6 class="section-title">Stok & Harga</h6>
                                
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="stok" class="form-label">
                                            Stok <span class="required">*</span>
                                        </label>
                                        <div class="input-group input-group-modern">
                                            <span class="input-group-text">
                                                <i class="bi bi-stack text-success"></i>
                                            </span>
                                            <input type="number" name="stok" id="stok"
                                                class="form-control @error('stok') is-invalid @enderror"
                                                value="{{ old('stok') }}" min="0" required placeholder="0">
                                            <span class="input-group-text">pcs</span>
                                        </div>
                                        @error('stok')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="harga" class="form-label">
                                            Harga <span class="required">*</span>
                                        </label>
                                        <div class="input-group input-group-modern">
                                            <span class="input-group-text text-success fw-bold">Rp</span>
                                            <input type="number" name="harga" id="harga"
                                                class="form-control @error('harga') is-invalid @enderror"
                                                value="{{ old('harga') }}" min="0" step="0.01" required placeholder="0">
                                        </div>
                                        @error('harga')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Description Section -->
                            <div class="form-section">
                                <h6 class="section-title">Deskripsi</h6>
                                <div class="mb-3">
                                    <label for="deskripsi" class="form-label">Deskripsi Produk</label>
                                    <textarea name="deskripsi" id="deskripsi" class="form-control form-control-modern" 
                                        rows="4" maxlength="255" placeholder="Tambahkan deskripsi produk (opsional)">{{ old('deskripsi') }}</textarea>
                                    <div class="form-text">
                                        <span id="charCount">0</span>/255 karakter
                                    </div>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="form-actions">
                                <div class="d-flex justify-content-between flex-wrap gap-2">
                                    <a href="{{ route('barangs.index') }}" class="btn btn-outline-secondary">
                                        <i class="bi bi-arrow-left me-1"></i> Kembali
                                    </a>
                                    <div class="d-flex gap-2">
                                        <button type="reset" class="btn btn-outline-warning" onclick="resetForm()">
                                            <i class="bi bi-arrow-clockwise me-1"></i> Reset
                                        </button>
                                        <button type="submit" class="btn btn-success btn-lg" id="submitBtn">
                                            <i class="bi bi-check-circle me-1"></i> Simpan Barang
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <!-- Preview Card -->
                <div class="sidebar-card" id="previewCard" style="display: none;">
                    <div class="sidebar-card-header">
                        <h6 class="sidebar-card-title">
                            <i class="bi bi-eye me-2"></i>Preview Barang
                        </h6>
                    </div>
                    <div class="sidebar-card-body">
                        <div class="product-preview">
                            <div class="product-icon">
                                <i class="bi bi-box-seam"></i>
                            </div>
                            <div class="product-info">
                                <h6 class="product-name" id="previewNama">Nama Barang</h6>
                                <div class="product-badges mb-2">
                                    <span class="badge badge-primary" id="previewKode">Kode</span>
                                    <span class="badge badge-success" id="previewStok">Stok: 0</span>
                                </div>
                                <div class="product-price">
                                    <span class="price-label">Harga:</span>
                                    <span class="price-value" id="previewHarga">Rp 0</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Barcode Preview -->
                <div class="sidebar-card" id="barcodeCard" style="display: none;">
                    <div class="sidebar-card-header">
                        <h6 class="sidebar-card-title">
                            <i class="bi bi-upc-scan me-2"></i>Barcode Preview
                        </h6>
                    </div>
                    <div class="sidebar-card-body text-center">
                        <img id="barcodeImage" src="" alt="Barcode" class="barcode-image">
                        <p class="barcode-text mt-2" id="barcodeText">-</p>
                    </div>
                </div>

                <!-- Tips Card -->
                <div class="sidebar-card">
                    <div class="sidebar-card-header">
                        <h6 class="sidebar-card-title">
                            <i class="bi bi-lightbulb me-2"></i>Tips Pengisian
                        </h6>
                    </div>
                    <div class="sidebar-card-body">
                        <div class="tips-list">
                            <div class="tip-item">
                                <i class="bi bi-check-circle text-success me-2"></i>
                                <span>Gunakan kode barang yang unik dan mudah diingat</span>
                            </div>
                            <div class="tip-item">
                                <i class="bi bi-check-circle text-success me-2"></i>
                                <span>Nama barang harus jelas dan deskriptif</span>
                            </div>
                            <div class="tip-item">
                                <i class="bi bi-check-circle text-success me-2"></i>
                                <span>Pastikan stok dan harga sesuai dengan kondisi real</span>
                            </div>
                            <div class="tip-item">
                                <i class="bi bi-check-circle text-success me-2"></i>
                                <span>Pilih kategori untuk memudahkan pencarian</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        :root {
            --primary-color: #4f46e5;
            --primary-light: #eef2ff;
            --success-color: #10b981;
            --warning-color: #f59e0b;
            --danger-color: #ef4444;
            --gray-50: #f9fafb;
            --gray-100: #f3f4f6;
            --gray-200: #e5e7eb;
            --gray-300: #d1d5db;
            --gray-500: #6b7280;
            --gray-600: #4b5563;
            --gray-700: #374151;
            --gray-900: #111827;
            --border-radius: 12px;
            --box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--gray-50);
            color: var(--gray-700);
        }

        /* Page Header */
        .page-header-card {
            background: white;
            border-radius: var(--border-radius);
            padding: 2rem;
            box-shadow: var(--box-shadow);
            border: 1px solid var(--gray-200);
        }

        .header-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, var(--primary-color), #6366f1);
            border-radius: var(--border-radius);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
        }

        .header-icon i {
            font-size: 1.5rem;
            color: white;
        }

        .page-title {
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--gray-900);
        }

        .page-subtitle {
            color: var(--gray-500);
            font-size: 1rem;
        }

        /* Breadcrumb */
        .breadcrumb-modern {
            background: white;
            border-radius: var(--border-radius);
            padding: 1rem 1.5rem;
            box-shadow: var(--box-shadow);
            border: 1px solid var(--gray-200);
            margin-bottom: 0;
        }

        .breadcrumb-modern .breadcrumb-item a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
        }

        .breadcrumb-modern .breadcrumb-item.active {
            color: var(--gray-600);
            font-weight: 500;
        }

        /* Form Cards */
        .form-card {
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            border: 1px solid var(--gray-200);
            overflow: hidden;
        }

        .form-card-header {
            background: linear-gradient(135deg, var(--primary-color), #6366f1);
            color: white;
            padding: 1.5rem;
        }

        .form-card-title {
            margin: 0;
            font-weight: 600;
            font-size: 1.125rem;
        }

        .form-card-body {
            padding: 2rem;
        }

        /* Form Sections */
        .form-section {
            margin-bottom: 2.5rem;
            padding-bottom: 2rem;
            border-bottom: 1px solid var(--gray-200);
        }

        .form-section:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .section-title {
            color: var(--gray-900);
            font-weight: 600;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            font-size: 1.1rem;
        }

        .section-title::before {
            content: '';
            width: 4px;
            height: 20px;
            background: var(--primary-color);
            border-radius: 2px;
            margin-right: 0.75rem;
        }

        /* Form Controls */
        .form-label {
            font-weight: 500;
            color: var(--gray-700);
            margin-bottom: 0.5rem;
        }

        .required {
            color: var(--danger-color);
        }

        .form-control, .form-select {
            border: 2px solid var(--gray-200);
            border-radius: 8px;
            padding: 0.75rem 1rem;
            font-size: 0.95rem;
            transition: all 0.2s ease;
            background-color: var(--gray-50);
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
            background-color: white;
        }

        .form-control-modern {
            background-color: white;
        }

        .input-group-modern .input-group-text {
            background-color: var(--gray-50);
            border: 2px solid var(--gray-200);
            border-right: none;
        }

        .input-group-modern .form-control {
            border-left: none;
        }

        .input-group-modern .form-control:focus {
            border-left: 2px solid var(--primary-color);
        }

        .input-group-modern .input-group-text:has(+ .form-control:focus) {
            border-color: var(--primary-color);
        }

        /* Sidebar Cards */
        .sidebar-card {
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            border: 1px solid var(--gray-200);
            margin-bottom: 1.5rem;
        }

        .sidebar-card-header {
            padding: 1rem 1.5rem;
            border-bottom: 1px solid var(--gray-200);
            background-color: var(--gray-50);
        }

        .sidebar-card-title {
            margin: 0;
            font-weight: 600;
            color: var(--gray-700);
            font-size: 0.95rem;
        }

        .sidebar-card-body {
            padding: 1.5rem;
        }

        /* Product Preview */
        .product-preview {
            display: flex;
            align-items: flex-start;
            gap: 1rem;
        }

        .product-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, var(--primary-color), #6366f1);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .product-icon i {
            color: white;
            font-size: 1.25rem;
        }

        .product-info {
            flex: 1;
        }

        .product-name {
            font-weight: 600;
            color: var(--gray-900);
            margin-bottom: 0.5rem;
            font-size: 1rem;
        }

        .product-badges {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
        }

        .badge {
            font-size: 0.75rem;
            font-weight: 500;
            padding: 0.25rem 0.75rem;
            border-radius: 6px;
        }

        .badge-primary {
            background-color: var(--primary-light);
            color: var(--primary-color);
        }

        .badge-success {
            background-color: #ecfdf5;
            color: var(--success-color);
        }

        .product-price {
            margin-top: 0.75rem;
        }

        .price-label {
            color: var(--gray-500);
            font-size: 0.875rem;
        }

        .price-value {
            font-weight: 700;
            color: var(--success-color);
            font-size: 1.125rem;
            margin-left: 0.5rem;
        }

        /* Barcode */
        .barcode-image {
            max-width: 100%;
            height: auto;
            border: 1px solid var(--gray-200);
            border-radius: 6px;
            padding: 0.5rem;
        }

        .barcode-text {
            font-family: 'Courier New', monospace;
            font-size: 0.875rem;
            color: var(--gray-600);
            margin: 0;
        }

        /* Tips */
        .tips-list {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
        }

        .tip-item {
            display: flex;
            align-items: flex-start;
            font-size: 0.875rem;
            color: var(--gray-600);
            line-height: 1.5;
        }

        /* Form Actions */
        .form-actions {
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 1px solid var(--gray-200);
        }

        /* Buttons */
        .btn {
            border-radius: 8px;
            font-weight: 500;
            padding: 0.625rem 1.25rem;
            transition: all 0.2s ease;
        }

        .btn-lg {
            padding: 0.875rem 2rem;
            font-size: 1rem;
        }

        .btn-success {
            background: linear-gradient(135deg, var(--success-color), #059669);
            border: none;
            box-shadow: 0 2px 4px rgba(16, 185, 129, 0.2);
        }

        .btn-success:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(16, 185, 129, 0.3);
        }

        .btn-outline-primary {
            border: 2px solid var(--primary-color);
            color: var(--primary-color);
        }

        .btn-outline-primary:hover {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        /* Character Counter */
        #charCount {
            font-weight: 600;
            color: var(--primary-color);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .page-header-card {
                padding: 1.5rem;
            }
            
            .form-card-body {
                padding: 1.5rem;
            }
            
            .header-content .d-flex {
                flex-direction: column;
                align-items: flex-start !important;
            }
            
            .header-icon {
                margin-right: 0;
                margin-bottom: 1rem;
            }
        }

        /* Animation */
        .sidebar-card, .form-card {
            animation: fadeInUp 0.5s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>

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
                document.getElementById('barcodeCard').style.display = 'none';
                return;
            }

            const src = `https://barcode.tec-it.com/barcode.ashx?data=${kode}&code=Code128&dpi=96&translate-esc=true`;
            document.getElementById('barcodeImage').src = src;
            document.getElementById('barcodeText').textContent = kode;
            document.getElementById('barcodeCard').style.display = 'block';
        }

        function updatePreview() {
            const nama = document.getElementById('nama_barang').value || 'Nama Barang';
            const kode = document.getElementById('kode_barang').value || 'Kode';
            const stok = document.getElementById('stok').value || '0';
            const harga = document.getElementById('harga').value || '0';

            document.getElementById('previewNama').textContent = nama;
            document.getElementById('previewKode').textContent = kode;
            document.getElementById('previewStok').textContent = `Stok: ${stok} pcs`;
            
            const formattedPrice = new Intl.NumberFormat('id-ID').format(parseInt(harga) || 0);
            document.getElementById('previewHarga').textContent = `Rp ${formattedPrice}`;

            const showPreview = document.getElementById('nama_barang').value || 
                               document.getElementById('kode_barang').value ||
                               document.getElementById('stok').value ||
                               document.getElementById('harga').value;
            
            document.getElementById('previewCard').style.display = showPreview ? 'block' : 'none';

            // Update barcode
            if (document.getElementById('kode_barang').value) {
                generateBarcode(document.getElementById('kode_barang').value);
            }
        }

        function resetForm() {
            document.getElementById('barangForm').reset();
            document.getElementById('previewCard').style.display = 'none';
            document.getElementById('barcodeCard').style.display = 'none';
            updateCharCount();
        }

        function updateCharCount() {
            const textarea = document.getElementById('deskripsi');
            const charCount = document.getElementById('charCount');
            charCount.textContent = textarea.value.length;
        }

        document.addEventListener('DOMContentLoaded', function() {
            // Add event listeners for preview updates
            ['nama_barang', 'kode_barang', 'stok', 'harga'].forEach(id => {
                document.getElementById(id).addEventListener('input', updatePreview);
            });

            // Character counter
            document.getElementById('deskripsi').addEventListener('input', updateCharCount);

            // Initial updates
            updatePreview();
            updateCharCount();

            // Form validation
            document.getElementById('barangForm').addEventListener('submit', function(e) {
                const submitBtn = document.getElementById('submitBtn');
                submitBtn.innerHTML = '<i class="bi bi-hourglass-split me-1"></i> Menyimpan...';
                submitBtn.disabled = true;
            });
        });
    </script>
@endsection