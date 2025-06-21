<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function index()
    {
        return view('sales.index');
    }

    public function getBarangs(Request $request)
    {
        $query = $request->get('q');
        $barangs = Barang::where('nama_barang', 'like', '%' . $query . '%')
            ->orWhere('kode_barang', 'like', '%' . $query . '%')
            ->get(['id', 'kode_barang', 'nama_barang', 'harga', 'stok']);

        return response()->json($barangs);
    }
}
