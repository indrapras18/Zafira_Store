<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Sale;
use App\Models\SaleItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function store(Request $request)
    {
        $request->validate([
            'cart' => 'required|array',
            'cart.*.id' => 'required|exists:barangs,id',
            'cart.*.qty' => 'required|integer|min:1',
            'cart.*.price' => 'required|numeric',
        ]);

        DB::beginTransaction();
        try {
            $total = collect($request->cart)->sum(fn($item) => $item['qty'] * $item['price']);

            $sale = Sale::create(['total' => $total]);

            foreach ($request->cart as $item) {
                SaleItem    ::create([
                    'sale_id' => $sale->id,
                    'barang_id' => $item['id'],
                    'qty' => $item['qty'],
                    'price' => $item['price'],
                    'subtotal' => $item['qty'] * $item['price'],
                ]);

                // Kurangi stok
                Barang::where('id', $item['id'])->decrement('stok', $item['qty']);
            }

            DB::commit();
            return response()->json(['success' => true, 'message' => 'Transaksi berhasil disimpan!']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
}
