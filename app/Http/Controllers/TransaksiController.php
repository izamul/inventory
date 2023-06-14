<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Pemasok;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $transaksi = Transaksi::with('barang')
            ->orderBy('idTransaksi', 'asc')
            ->paginate(5);

        return view('layouts.transaksi.master', compact('transaksi'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create($type = null)
    {
        $barang = Barang::all();
        $status = ($type === 'data-keluar') ? 'out' : 'in';
        return view('layouts.transaksi.create', compact('barang', 'status'));
    }
    
    

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required',
            'status' => 'required',
            'namaBarang' => 'required',
            'jumlah' => 'required|numeric',
            'totalHarga' => 'required|numeric',
            'pencatat' => 'required',
        ]);

        $barang = Barang::find($request->namaBarang);

        if (!$barang) {
            return redirect()->back()->with('error', 'Barang tidak ditemukan.');
        }

        if ($request->jumlah > $barang->jumlah) {
            return redirect()->back()->with('error', 'Jumlah melebihi stok barang yang tersedia.');
        }

        $transaksi = new Transaksi([
            'tanggal' => $request->tanggal,
            'status' => $request->status,
            'totalHarga' => $request->totalHarga,
            'jumlah' => $request->jumlah,
            'pencatat' => $request->pencatat,
        ]);

        $barang->jumlah -= $request->jumlah;
        $barang->save();

        $transaksi->barang()->associate($barang);
        $transaksi->save();

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil ditambahkan.');
    }

    public function show($idTransaksi)
    {
        $transaksi = Transaksi::find($idTransaksi);
        return view('layouts.transaksi.detail', compact('transaksi'));
    }

    public function destroy($idTransaksi)
    {
        $transaksi = Transaksi::find($idTransaksi);

        if (!$transaksi) {
            return redirect()->back()->with('error', 'Transaksi tidak ditemukan.');
        }

        $barang = $transaksi->barang;
        $barang->jumlah += $transaksi->jumlah;
        $barang->save();

        $transaksi->delete();

        return redirect()->route('layouts.transaksi.master')->with('success', 'Transaksi berhasil dihapus.');
    }

    public function dataMasuk()
    {
        $transaksiMasuk = Transaksi::where('status', 'in')->paginate(5);

        return view('layouts.transaksi.inout', ['transaksi' => $transaksiMasuk]);
    }

    public function dataKeluar()
    {
        $transaksiKeluar = Transaksi::where('status', 'out')->paginate(5);

        return view('layouts.transaksi.inout', ['transaksi' => $transaksiKeluar]);
    }
}
