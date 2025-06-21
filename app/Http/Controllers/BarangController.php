<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Milon\Barcode\DNS1D as BarcodeDNS1D;
use Illuminate\Support\Facades\Storage;
use Milon\Barcode\Facades\DNS1D;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::all();
        return view('barangs.index', compact('barangs'));
    }

    public function create()
    {
        return view('barangs.create');
    }

public function store(Request $request)
{
    $request->validate([
        'kode_barang' => 'required|unique:barangs,kode_barang',
        'nama_barang' => 'required',
        'stok' => 'required|integer|min:0',
        'harga' => 'required|numeric|min:0',
    ]);

    $kodeBarang = $request->kode_barang;

    // ✅ Generate barcode dengan instance
    $barcode = new BarcodeDNS1D();
    $barcodeImage = $barcode->getBarcodePNG($kodeBarang, 'C128');

    // Simpan barcode ke storage
    $path = 'barcodes/' . $kodeBarang . '.png';
    Storage::disk('public')->put($path, base64_decode($barcodeImage));

    // Simpan data barang
    $barang = new Barang();
    $barang->kode_barang = $kodeBarang;
    $barang->nama_barang = $request->nama_barang;
    $barang->stok = $request->stok;
    $barang->harga = $request->harga;
    $barang->kategori = $request->kategori;
    $barang->deskripsi = $request->deskripsi;
    $barang->barcode_path = $path;
    $barang->save();

    return redirect()->route('barangs.index')->with('success', 'Barang berhasil ditambahkan dengan barcode.');
}


}

