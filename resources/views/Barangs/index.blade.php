@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Page Header -->
        <div
            class="d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between border-bottom pb-3 mb-4">
            <div>
                <h1 class="h3 fw-bold text-primary d-flex align-items-center">
                    <i class="bi bi-box-seam fs-2 me-3 text-primary"></i> Data Barang
                </h1>
                <p class="text-muted mb-0">Kelola dan pantau inventori barang Anda</p>
            </div>
        </div>


        <!-- Statistics Cards -->
        <div class="row mb-4">
            <!-- Total Barang -->
            <div class="col-md-3 col-sm-6 mb-3">
                <div class="card shadow-sm border-0 rounded-4 text-white"
                    style="background: linear-gradient(135deg, #4e73df, #1cc88a);">
                    <div class="card-body d-flex flex-column align-items-center justify-content-center text-center">
                        <div class="display-5 fw-bold">{{ $barangs->count() }}</div>
                        <div class="mt-2">
                            <i class="bi bi-boxes me-1"></i> Total Barang
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Stok -->
            <div class="col-md-3 col-sm-6 mb-3">
                <div class="card shadow-sm border-0 rounded-4 text-white"
                    style="background: linear-gradient(135deg, #1cc88a, #20c997);">
                    <div class="card-body d-flex flex-column align-items-center justify-content-center text-center">
                        <div class="display-5 fw-bold">{{ $barangs->sum('stok') }}</div>
                        <div class="mt-2">
                            <i class="bi bi-stack me-1"></i> Total Stok
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stok Rendah -->
            <div class="col-md-3 col-sm-6 mb-3">
                <div class="card shadow-sm border-0 rounded-4 text-white"
                    style="background: linear-gradient(135deg, #f6c23e, #f4b400);">
                    <div class="card-body d-flex flex-column align-items-center justify-content-center text-center">
                        <div class="display-5 fw-bold">{{ $barangs->where('stok', '<', 10)->count() }}</div>
                        <div class="mt-2">
                            <i class="bi bi-exclamation-triangle me-1"></i> Stok Rendah
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Nilai -->
            <div class="col-md-3 col-sm-6 mb-3">
                <div class="card shadow-sm border-0 rounded-4 text-white"
                    style="background: linear-gradient(135deg, #e74a3b, #f1948a);">
                    <div class="card-body d-flex flex-column align-items-center justify-content-center text-center">
                        <div class="display-6 fw-bold">Rp {{ number_format($barangs->sum('harga'), 0, ',', '.') }}</div>
                        <div class="mt-2">
                            <i class="bi bi-currency-dollar me-1"></i> Total Nilai
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Action Bar -->
        <div class="card mb-4">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-search"></i>
                            </span>
                            <input type="text" class="form-control" id="searchInput" placeholder="Cari barang...">
                        </div>
                    </div>
                    <div class="col-md-6 text-end mt-3 mt-md-0">
                        <a href="{{ route('barangs.create') }}" class="btn btn-success me-2">
                            <i class="bi bi-plus-circle me-1"></i>Tambah Barang
                        </a>
                        <button class="btn btn-primary" onclick="exportData()">
                            <i class="bi bi-download me-1"></i>Export
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Data Table -->
        <div class="card">
            <div class="card-header" style="background: var(--primary-gradient); color: white;">
                <h5 class="mb-0">
                    <i class="bi bi-table me-2"></i>Daftar Barang
                </h5>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0" id="barangTable">
                        <thead style="background: var(--primary-gradient); color: white;">
                            <tr>
                                <th style="width: 5%">#</th>
                                <th style="width: 15%">
                                    <i class="bi bi-upc-scan me-1"></i>Kode
                                </th>
                                <th style="width: 35%">
                                    <i class="bi bi-box me-1"></i>Nama Barang
                                </th>
                                <th style="width: 15%">
                                    <i class="bi bi-stack me-1"></i>Stok
                                </th>
                                <th style="width: 20%">
                                    <i class="bi bi-currency-dollar me-1"></i>Harga
                                </th>
                                <th style="width: 15%">
                                    <i class="bi bi-upc-scan"></i> Barcode
                                </th>
                                <th style="width: 10%">
                                    <i class="bi bi-gear me-1"></i>Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($barangs as $index => $barang)
                                <tr class="fade-in-up" style="animation-delay: {{ $index * 0.1 }}s">
                                    <td class="fw-bold text-muted">{{ $index + 1 }}</td>
                                    <td>
                                        <span class="badge bg-primary">{{ $barang->kode_barang }}</span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm me-3"
                                                style="width: 40px; height: 40px; background: var(--primary-gradient); border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                                                <i class="bi bi-box text-white"></i>
                                            </div>
                                            <div>
                                                <div class="fw-bold">{{ $barang->nama_barang }}</div>
                                                <small class="text-muted">{{ $barang->kode_barang }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        @if ($barang->stok < 10)
                                            <span class="badge bg-danger">
                                                <i class="bi bi-exclamation-triangle me-1"></i>{{ $barang->stok }}
                                            </span>
                                        @elseif($barang->stok < 50)
                                            <span class="badge bg-warning">
                                                <i class="bi bi-dash-circle me-1"></i>{{ $barang->stok }}
                                            </span>
                                        @else
                                            <span class="badge bg-success">
                                                <i class="bi bi-check-circle me-1"></i>{{ $barang->stok }}
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="fw-bold text-success">
                                            Rp {{ number_format($barang->harga, 0, ',', '.') }}
                                        </span>
                                    </td>
                                    <td>
                                        @if ($barang->barcode_path)
                                            <img src="{{ asset('storage/' . $barang->barcode_path) }}" alt="Barcode"
                                                style="height: 45px; width: 150px;">
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            {{-- <a href="{{ route('barangs.show', $barang->id) }}" 
                                           class="btn btn-sm btn-outline-info" 
                                           title="Lihat Detail">
                                            <i class="bi bi-eye"></i>
                                        </a> --}}
                                            {{-- <a href="{{ route('barangs.edit', $barang->id) }}" 
                                           class="btn btn-sm btn-outline-warning" 
                                           title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </a> --}}
                                            <button type="button" class="btn btn-sm btn-outline-danger" title="Hapus"
                                                onclick="confirmDelete('{{ $barang->id }}', '{{ $barang->nama_barang }}')">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-5">
                                        <div class="empty-state">
                                            <i class="bi bi-inbox display-1 text-muted mb-3"></i>
                                            <h5 class="text-muted">Belum Ada Data Barang</h5>
                                            <p class="text-muted">Mulai dengan menambahkan barang pertama Anda</p>
                                            <a href="{{ route('barangs.create') }}" class="btn btn-success">
                                                <i class="bi bi-plus-circle me-1"></i>Tambah Barang Pertama
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            @if ($barangs->count() > 0)
                <div class="card-footer bg-light">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <small class="text-muted">
                                Menampilkan {{ $barangs->count() }} dari {{ $barangs->count() }} barang
                            </small>
                        </div>
                        <div class="col-md-6 text-end">
                            <!-- Pagination jika diperlukan -->
                            {{-- {{ $barangs->links() }} --}}
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title">
                        <i class="bi bi-exclamation-triangle me-2"></i>Konfirmasi Hapus
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus barang <strong id="itemName"></strong>?</p>
                    <p class="text-muted">Tindakan ini tidak dapat dibatalkan.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <form id="deleteForm" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="bi bi-trash me-1"></i>Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Search functionality
        document.getElementById('searchInput').addEventListener('keyup', function() {
            const searchTerm = this.value.toLowerCase();
            const tableRows = document.querySelectorAll('#barangTable tbody tr');

            tableRows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(searchTerm) ? '' : 'none';
            });
        });

        // Delete confirmation
        function confirmDelete(id, name) {
            document.getElementById('itemName').textContent = name;
            document.getElementById('deleteForm').action = `/barangs/${id}`;
            new bootstrap.Modal(document.getElementById('deleteModal')).show();
        }

        // Export functionality (placeholder)
        function exportData() {
            alert('Fitur export akan segera tersedia!');
        }

        // Add animation to rows
        document.addEventListener('DOMContentLoaded', function() {
            const rows = document.querySelectorAll('#barangTable tbody tr');
            rows.forEach((row, index) => {
                row.style.opacity = '0';
                row.style.transform = 'translateY(20px)';

                setTimeout(() => {
                    row.style.transition = 'all 0.5s ease';
                    row.style.opacity = '1';
                    row.style.transform = 'translateY(0)';
                }, index * 100);
            });
        });
    </script>

    <style>
        .empty-state {
            padding: 3rem 1rem;
        }

        .avatar-sm {
            flex-shrink: 0;
        }

        .badge {
            font-size: 0.85em;
        }

        .btn-group .btn {
            border-radius: 0;
        }

        .btn-group .btn:first-child {
            border-top-left-radius: 0.375rem;
            border-bottom-left-radius: 0.375rem;
        }

        .btn-group .btn:last-child {
            border-top-right-radius: 0.375rem;
            border-bottom-right-radius: 0.375rem;
        }

        .table tbody tr {
            border-left: 4px solid transparent;
            transition: all 0.3s ease;
        }

        .table tbody tr:hover {
            border-left-color: var(--primary-gradient);
            background: rgba(102, 126, 234, 0.05);
        }

        @media (max-width: 768px) {
            .stats-card {
                margin-bottom: 1rem;
            }

            .btn-group {
                flex-direction: column;
            }

            .btn-group .btn {
                border-radius: 0.375rem !important;
                margin-bottom: 2px;
            }
        }
    </style>
@endsection
