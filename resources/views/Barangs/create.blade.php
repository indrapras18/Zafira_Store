@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Page Header -->
    <div class="page-header">
        <h1 class="page-title">
            <i class="bi bi-plus-circle me-3"></i>Tambah Barang
        </h1>
        <p class="page-subtitle">Tambahkan barang baru ke dalam inventori</p>
    </div>

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('barangs.index') }}" class="text-decoration-none">
                    <i class="bi bi-house me-1"></i>Daftar Barang
                </a>
            </li>
            <li class="breadcrumb-item active">Tambah Barang</li>
        </ol>
    </nav>

    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <!-- Form Card -->
            <div class="card shadow-lg">
                <div class="card-header" style="background: var(--primary-gradient); color: white;">
                    <h5 class="mb-0">
                        <i class="bi bi-file-earmark-plus me-2"></i>Form Tambah Barang
                    </h5>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('barangs.store') }}" method="POST" id="barangForm">
                        @csrf
                        
                        <!-- Kode Barang -->
                        <div class="mb-4">
                            <label for="kode_barang" class="form-label">
                                <i class="bi bi-upc-scan me-2"></i>Kode Barang
                                <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-hash"></i>
                                </span>
                                <input type="text" 
                                       name="kode_barang" 
                                       id="kode_barang"
                                       class="form-control @error('kode_barang') is-invalid @enderror" 
                                       value="{{ old('kode_barang') }}"
                                       placeholder="Contoh: BRG001"
                                       required>
                                <button type="button" class="btn btn-outline-secondary" onclick="generateKode()">
                                    <i class="bi bi-arrow-clockwise"></i>
                                </button>
                            </div>
                            @error('kode_barang')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted">Kode unik untuk identifikasi barang</small>
                        </div>

                        <!-- Nama Barang -->
                        <div class="mb-4">
                            <label for="nama_barang" class="form-label">
                                <i class="bi bi-box me-2"></i>Nama Barang
                                <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-tag"></i>
                                </span>
                                <input type="text" 
                                       name="nama_barang" 
                                       id="nama_barang"
                                       class="form-control @error('nama_barang') is-invalid @enderror" 
                                       value="{{ old('nama_barang') }}"
                                       placeholder="Masukkan nama barang"
                                       required>
                            </div>
                            @error('nama_barang')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Row untuk Stok dan Harga -->
                        <div class="row">
                            <!-- Stok -->
                            <div class="col-md-6 mb-4">
                                <label for="stok" class="form-label">
                                    <i class="bi bi-stack me-2"></i>Stok
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-boxes"></i>
                                    </span>
                                    <input type="number" 
                                           name="stok" 
                                           id="stok"
                                           class="form-control @error('stok') is-invalid @enderror" 
                                           value="{{ old('stok') }}"
                                           min="0"
                                           placeholder="0"
                                           required>
                                    <span class="input-group-text">pcs</span>
                                </div>
                                @error('stok')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Harga -->
                            <div class="col-md-6 mb-4">
                                <label for="harga" class="form-label">
                                    <i class="bi bi-currency-dollar me-2"></i>Harga
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text">Rp</span>
                                    <input type="number" 
                                           name="harga" 
                                           id="harga"
                                           class="form-control @error('harga') is-invalid @enderror" 
                                           value="{{ old('harga') }}"
                                           step="0.01"
                                           min="0"
                                           placeholder="0.00"
                                           required>
                                </div>
                                @error('harga')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="text-muted">Harga dalam Rupiah</small>
                            </div>
                        </div>

                        <!-- Kategori (Opsional - jika ada di database) -->
                        <div class="mb-4">
                            <label for="kategori" class="form-label">
                                <i class="bi bi-grid me-2"></i>Kategori
                            </label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-folder"></i>
                                </span>
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
                        </div>

                        <!-- Deskripsi (Opsional) -->
                        <div class="mb-4">
                            <label for="deskripsi" class="form-label">
                                <i class="bi bi-text-paragraph me-2"></i>Deskripsi
                            </label>
                            <textarea name="deskripsi" 
                                      id="deskripsi" 
                                      class="form-control" 
                                      rows="3" 
                                      placeholder="Deskripsi singkat tentang barang (opsional)">{{ old('deskripsi') }}</textarea>
                            <small class="text-muted">Maksimal 255 karakter</small>
                        </div>

                        <!-- Preview Card -->
                        <div class="card border-dashed mb-4" id="previewCard" style="display: none;">
                            <div class="card-header bg-light">
                                <h6 class="mb-0">
                                    <i class="bi bi-eye me-2"></i>Preview Barang
                                </h6>
                            </div>
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-md-2">
                                        <div class="avatar-lg" style="width: 60px; height: 60px; background: var(--primary-gradient); border-radius: 15px; display: flex; align-items: center; justify-content: center;">
                                            <i class="bi bi-box text-white fs-3"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                        <h6 class="mb-1" id="previewNama">-</h6>
                                        <p class="mb-1">
                                            <span class="badge bg-primary" id="previewKode">-</span>
                                            <span class="badge bg-success ms-2" id="previewStok">Stok: -</span>
                                        </p>
                                        <p class="mb-0 fw-bold text-success" id="previewHarga">Rp -</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('barangs.index') }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-left me-1"></i>Kembali
                            </a>
                            <div>
                                <button type="reset" class="btn btn-outline-warning me-2" onclick="resetForm()">
                                    <i class="bi bi-arrow-clockwise me-1"></i>Reset
                                </button>
                                <button type="submit" class="btn btn-success" id="submitBtn">
                                    <i class="bi bi-check-circle me-1"></i>Simpan Barang
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Tips Card -->
            <div class="card mt-4">
                <div class="card-body">
                    <h6 class="text-primary mb-3">
                        <i class="bi bi-lightbulb me-2"></i>Tips Pengisian Form
                    </h6>
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2">
                            <i class="bi bi-check-circle text-success me-2"></i>
                            Gunakan kode barang yang unik dan mudah diingat
                        </li>
                        <li class="mb-2">
                            <i class="bi bi-check-circle text-success me-2"></i>
                            Nama barang sebaiknya jelas dan deskriptif
                        </li>
                        <li class="mb-2">
                            <i class="bi bi-check-circle text-success me-2"></i>
                            Pastikan stok dan harga sesuai dengan kondisi aktual
                        </li>
                        <li class="mb-0">
                            <i class="bi bi-check-circle text-success me-2"></i>
                            Gunakan kategori untuk memudahkan pencarian
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Generate kode barang otomatis
function generateKode() {
    const prefix = 'BRG';
    const timestamp = Date.now().toString().slice(-6);
    const kode = prefix + timestamp;
    document.getElementById('kode_barang').value = kode;
    updatePreview();
}

// Update preview real-time
function updatePreview() {
    const nama = document.getElementById('nama_barang').value || '-';
    const kode = document.getElementById('kode_barang').value || '-';
    const stok = document.getElementById('stok').value || '0';
    const harga = document.getElementById('harga').value || '0';
    
    document.getElementById('previewNama').textContent = nama;
    document.getElementById('previewKode').textContent = kode;
    document.getElementById('previewStok').textContent = `Stok: ${stok}`;
    document.getElementById('previewHarga').textContent = `Rp ${formatNumber(harga)}`;
    
    // Show/hide preview card
    const previewCard = document.getElementById('previewCard');
    if (nama !== '-' || kode !== '-') {
        previewCard.style.display = 'block';
    } else {
        previewCard.style.display = 'none';
    }
}

// Format number dengan pemisah ribuan
function formatNumber(num) {
    return parseInt(num).toLocaleString('id-ID');
}

// Reset form
function resetForm() {
    document.getElementById('barangForm').reset();
    document.getElementById('previewCard').style.display = 'none';
}

// Event listeners
document.addEventListener('DOMContentLoaded', function() {
    // Real-time preview
    const inputs = ['nama_barang', 'kode_barang', 'stok', 'harga'];
    inputs.forEach(id => {
        document.getElementById(id).addEventListener('input', updatePreview);
    });
    
    // Form validation
    const form = document.getElementById('barangForm');
    form.addEventListener('submit', function(e) {
        const submitBtn = document.getElementById('submitBtn');
        submitBtn.innerHTML = '<span class="loading me-2"></span>Menyimpan...';
        submitBtn.disabled = true;
    });
    
    // Auto-focus first input
    document.getElementById('kode_barang').focus();
    
    // Format harga input
    document.getElementById('harga').addEventListener('input', function() {
        this.value = this.value.replace(/[^0-9.]/g, '');
    });
    
    // Limit deskripsi characters
    document.getElementById('deskripsi').addEventListener('input', function() {
        const maxLength = 255;
        if (this.value.length > maxLength) {
            this.value = this.value.substring(0, maxLength);
        }
    });
});

// Keyboard shortcuts
document.addEventListener('keydown', function(e) {
    // Ctrl + S untuk save
    if (e.ctrlKey && e.key === 's') {
        e.preventDefault();
        document.getElementById('barangForm').submit();
    }
    
    // Escape untuk kembali
    if (e.key === 'Escape') {
        window.location.href = "{{ route('barangs.index') }}";
    }
});
</script>

<style>
.border-dashed {
    border: 2px dashed #dee2e6 !important;
}

.avatar-lg {
    flex-shrink: 0;
}

.breadcrumb {
    background: rgba(255, 255, 255, 0.8);
    backdrop-filter: blur(10px);
    border-radius: 15px;
    padding: 1rem 1.5rem;
}

.breadcrumb-item + .breadcrumb-item::before {
    content: "›";
    color: var(--bs-breadcrumb-divider-color);
}

.input-group-text {
    background: rgba(102, 126, 234, 0.1);
    border-color: #e9ecef;
    color: #667eea;
}

.form-control:focus + .input-group-text,
.form-control:focus ~ .input-group-text {
    border-color: #667eea;
    background: rgba(102, 126, 234, 0.2);
}

.card {
    transition: all 0.3s ease;
}

.card:hover {
    transform: translateY(-2px);
}

@media (max-width: 768px) {
    .page-title {
        font-size: 2rem;
    }
    
    .card-body {
        padding: 1.5rem !important;
    }
}

/* Loading animation */
.loading {
    display: inline-block;
    width: 16px;
    height: 16px;
    border: 2px solid rgba(255, 255, 255, 0.3);
    border-radius: 50%;
    border-top-color: #fff;
    animation: spin 1s ease-in-out infinite;
}

@keyframes spin {
    to { transform: rotate(360deg); }
}
</style>
@endsection