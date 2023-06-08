<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Pemasok;
use Illuminate\Http\Request;



class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $barang = Barang::paginate(5); // Mengambil semua isi tabel
        $posts = Barang::orderBy('idBarang', 'desc')->paginate(5);
        return view('layouts.barang.master', compact('barang'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pemasok = Pemasok::all();
        $kategori = Kategori::all();
        return view('layouts.barang.create', ['kategori' => $kategori],['pemasok' => $pemasok]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'namaBarang' => 'required',
            'satuan' => 'required',
            'harga' => 'required',
            'stock' => 'required',
            // 'fotoBarang' => 'required',
            'pemasok_id' => 'required',
            'kategori_id' => 'required',
        ]);
        $barang = new Barang();
        $barang->namaBarang = $request->get('namaBarang');
        $barang->satuan = $request->get('satuan');
        $barang->harga = $request->get('harga');
        $barang->stock = $request->get('stock');
        $barang->fotoBarang = 'tes';

        $kategori = Kategori::findOrFail($request->get('kategori_id'));
        $barang->kategori()->associate($kategori);
        
        $pemasok = Pemasok::findOrFail($request->get('pemasok_id'));
        $barang->pemasok()->associate($pemasok);
        

        $barang->save();
        return redirect()->route('barang.index')->with('success', 'Barang Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang $barang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang)
    {
        //
    }
}
