<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Transaksi;
use App\Models\Pegawai;
use App\Models\Pemasok;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $jumlahStokBarang = Barang::count();
        $jumlahTransaksi = Transaksi::count();
        $jumlahPegawai = Pegawai::where('level', '!=', 1)->count();
        $jumlahPemasok = Pemasok::count();

        $topBarangCepatHabis = Transaksi::select('barang_id', DB::raw('SUM(jumlah) as totalTerjual'))
            ->where('status', 'out')
            ->groupBy('barang_id')
            ->orderByDesc('totalTerjual')
            ->limit(5)
            ->get();

        $topBarangMasuk = Transaksi::select('barang_id', DB::raw('SUM(jumlah) as totalMasuk'))
            ->where('status', 'in')
            ->groupBy('barang_id')
            ->orderByDesc('totalMasuk')
            ->limit(5)
            ->get();


        return view('layouts.master', compact('jumlahStokBarang', 'jumlahTransaksi', 'jumlahPegawai', 'jumlahPemasok', 'topBarangCepatHabis', 'topBarangMasuk'));
    }
}
