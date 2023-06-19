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
        $transaksi = Transaksi::with('barang')->sortable()->paginate(5);

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
    
        $transaksi = new Transaksi();
        $transaksi->tanggal = $request->get('tanggal');
        $transaksi->status = $request->get('status');
        $transaksi->totalHarga = $request->get('totalHarga');
        $transaksi->jumlah = $request->get('jumlah');
        $transaksi->pencatat = $request->get('pencatat');
    
        $barang = Barang::findOrFail($request->get('namaBarang'));
        $transaksi->barang()->associate($barang);
        $transaksi->save();
    
        // If the status is out, then reduce the stock of the barang by the jumlah
        if ($transaksi->status === 'out') {
            $barang->stock -= $transaksi->jumlah;
            $barang->save();
        }else{
            $barang->stock += $transaksi->jumlah;
            $barang->save();
        }
    
        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil ditambahkan.');
    }
    

    public function show($idTransaksi)
    {
        $transaksi = Transaksi::find($idTransaksi);
        return view('layouts.transaksi.detail', compact('transaksi'));
    }

    public function destroy($idTransaksi)
    {
        $transaksi = Transaksi::findOrFail($idTransaksi);

        if (!$transaksi) {
            return redirect()->back()->with('error', 'Transaksi tidak ditemukan.');
        }

        if ($transaksi->status === 'out') {
            $transaksi->barang->stock += $transaksi->jumlah;
        } else {
            $transaksi->barang->stock -= $transaksi->jumlah;
        }
    
        $transaksi->barang->save();
    
        $transaksi->delete();

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus.');
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

    public function searchTransaksi(Request $request)
    {
        $keyword = $request->searchTransaksi;
        $transaksi = Transaksi::whereHas('barang', function ($query) use ($keyword) {
            $query->where('namaBarang', 'like', '%' . $keyword . '%');
        })->paginate(5);

        return view('layouts.transaksi.master', compact('transaksi'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function searchTransaksiData(Request $request)
{
    $keyword = $request->searchTransaksi;
    $transaksi = Transaksi::whereHas('barang', function ($query) use ($keyword) {
        $query->where('namaBarang', 'like', '%' . $keyword . '%');
    })->paginate(5);

    return view('layouts.transaksi.inout', compact('transaksi'))->with('i', (request()->input('page', 1) - 1) * 5);
}

}
