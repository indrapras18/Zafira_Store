@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="row mb-4">
            <div class="col">
                <h2 class="fw-bold"><i class="bi bi-cash-register me-2"></i>Kasir Penjualan</h2>
                <p class="text-muted">Lakukan transaksi penjualan barang dengan cepat dan efisien.</p>
            </div>
        </div>

        {{-- Search & Select Product --}}
        <div class="card mb-4 shadow-sm">
            <div class="card-body">
                <div class="row align-items-end">
                    <div class="col-md-6 position-relative">
                        <label for="search" class="form-label">Cari Barang</label>
                        <input type="text" class="form-control" id="search"
                            placeholder="Masukkan nama atau kode barang..." autocomplete="off">
                        <ul id="suggestions" class="list-group position-absolute w-100" style="z-index: 1000;"></ul>
                    </div>
                    <div class="col-md-3">
                        <label for="quantity" class="form-label">Jumlah</label>
                        <input type="number" class="form-control" id="quantity" min="1" value="1">
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-primary w-100" onclick="addToCart()">
                            <i class="bi bi-cart-plus me-1"></i>Tambah ke Keranjang
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- Cart Items --}}
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-light">
                <h5 class="mb-0"><i class="bi bi-cart me-2"></i>Keranjang Belanja</h5>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table mb-0" id="cartTable">
                        <thead class="table-light">
                            <tr>
                                <th>Barang</th>
                                <th>Harga Satuan</th>
                                <th>Jumlah</th>
                                <th>Subtotal</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="cartBody">
                            <tr>
                                <td colspan="5" class="text-center py-4 text-muted">Keranjang kosong</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- Payment --}}
        <div class="card shadow-sm">
            <div
                class="card-body d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center">
                <div class="mb-3 mb-md-0">
                    <h5 class="mb-2">Total:</h5>
                    <h3 class="text-success fw-bold" id="totalDisplay">Rp 0</h3>
                </div>
                <div>
                    <button class="btn btn-outline-danger me-2" onclick="clearCart()">
                        <i class="bi bi-trash3 me-1"></i> Kosongkan
                    </button>
                    <button class="btn btn-success" onclick="checkout()">
                        <i class="bi bi-check-circle me-1"></i> Bayar & Cetak Struk
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        let cart = [];
        let selectedBarang = null;

        function formatRupiah(angka) {
            return new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR'
            }).format(angka);
        }

        function addToCart() {
            const qty = parseInt(document.getElementById('quantity').value) || 1;
            if (!selectedBarang) return alert('Pilih barang dari daftar saran.');

            const existing = cart.find(item => item.id === selectedBarang.id);
            if (existing) {
                existing.qty += qty;
            } else {
                cart.push({
                    id: selectedBarang.id,
                    name: selectedBarang.nama_barang,
                    price: selectedBarang.harga,
                    qty: qty
                });
            }

            updateCart();
            clearInputs();
        }

        function updateCart() {
            const tbody = document.getElementById('cartBody');
            tbody.innerHTML = '';

            if (cart.length === 0) {
                tbody.innerHTML = `<tr><td colspan="5" class="text-center py-4 text-muted">Keranjang kosong</td></tr>`;
            } else {
                cart.forEach((item, index) => {
                    const subtotal = item.price * item.qty;
                    tbody.innerHTML += `
                    <tr>
                        <td>${item.name}</td>
                        <td>${formatRupiah(item.price)}</td>
                        <td>${item.qty}</td>
                        <td>${formatRupiah(subtotal)}</td>
                        <td><button class="btn btn-sm btn-danger" onclick="removeFromCart(${index})"><i class="bi bi-x"></i></button></td>
                    </tr>
                `;
                });
            }

            const total = cart.reduce((sum, item) => sum + item.price * item.qty, 0);
            document.getElementById('totalDisplay').innerText = formatRupiah(total);
        }

        function removeFromCart(index) {
            cart.splice(index, 1);
            updateCart();
        }

        function clearCart() {
            if (confirm("Kosongkan keranjang?")) {
                cart = [];
                updateCart();
            }
        }

        function checkout() {
            if (cart.length === 0) return alert("Keranjang masih kosong!");

            fetch('{{ route('sales.store') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: JSON.stringify({
                        cart
                    }),
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        alert(data.message);
                        cart = [];
                        updateCart();
                    } else {
                        alert("Gagal: " + data.message);
                    }
                })
                .catch(err => {
                    console.error(err);
                    alert("Terjadi kesalahan saat menyimpan transaksi.");
                });
        }


        function clearInputs() {
            document.getElementById('search').value = '';
            document.getElementById('quantity').value = 1;
            document.getElementById('suggestions').innerHTML = '';
            selectedBarang = null;
        }

        // Autocomplete
        document.getElementById('search').addEventListener('input', function() {
            const keyword = this.value;
            if (keyword.length < 2) {
                document.getElementById('suggestions').innerHTML = '';
                return;
            }

            fetch(`/sales/barangs?q=${keyword}`)
                .then(res => res.json())
                .then(data => {
                    const suggestions = document.getElementById('suggestions');
                    suggestions.innerHTML = '';
                    data.forEach(item => {
                        const li = document.createElement('li');
                        li.className = 'list-group-item list-group-item-action';
                        li.innerText =
                            `${item.nama_barang} (${item.kode_barang}) - ${formatRupiah(item.harga)}`;
                        li.onclick = () => {
                            document.getElementById('search').value = item.nama_barang;
                            selectedBarang = item;
                            suggestions.innerHTML = '';
                        };
                        suggestions.appendChild(li);
                    });
                });
        });
    </script>
@endsection
