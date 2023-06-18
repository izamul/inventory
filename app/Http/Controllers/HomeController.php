<?php

namespace App\Http\Controllers;
use App\Models\Barang;
use App\Models\Transaksi;
use App\Models\Pegawai;
use App\Models\Pemasok;

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
    
        return view('layouts.master', compact('jumlahStokBarang', 'jumlahTransaksi', 'jumlahPegawai', 'jumlahPemasok'));
    }
}
