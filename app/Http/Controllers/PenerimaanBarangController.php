<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PenerimaanBarang;
use Illuminate\Support\Facades\Auth;

class PenerimaanBarangController extends Controller
{
    public function index()
    {
        return view('penerimaan-barang.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'distributor' => 'required',
            'nomor_faktur' => 'required',
            'produk' => 'required',
        ], [
            'distributor.required' => 'Distributor harus diisi',
            'nomor_faktur.required' => 'Nomor Faktur harus diisi',
            'produk.required' => 'Produk harus diisi',
        ]);

        PenerimaanBarang::create([
            'nomor_penerimaan' => PenerimaanBarang::nomorPenerimaan(),
            'distributor' => $request->distributor,
            'nomor_faktur' => $request->nomor_faktur,
            'petugas_penerima' => Auth::user()->name,
        ]);
    }
}
