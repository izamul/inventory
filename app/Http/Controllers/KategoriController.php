<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
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
        $kategori = Kategori::paginate(5); // Mengambil semua isi tabel
        $posts = Kategori::orderBy('idKategori', 'desc')->paginate(5);
        return view('layouts.kategori.master', compact('kategori'))->with('i', (request()->input('page', 1) - 1) * 5); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('layouts.kategori.create');
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
            'idKategori' => 'required',
            'namaKategori' => 'required',
            ]);
        $kategori = new Kategori;
        $kategori->idKategori=$request->get('idKategori');
        $kategori->namaKategori=$request->get('namaKategori');
        $kategori->save();
        return redirect()->route('kategori.index')->with('success', 'Kategori Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idKategori)
    {
        $kategori = Kategori::find($idKategori);
            return view('layouts.kategori.detail', compact('kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idKategori)
    {
        $kategori = Kategori::find($idKategori);
            return view('layouts.kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idKategori)
    {
        $request->validate([
            'idKategori' => 'required',
            'namaKategori' => 'required',
            ]);
        $kategori = Kategori::where('idKategori', $idKategori)->first();
        $kategori->idKategori=$request->get('idKategori');
        $kategori->namaKategori=$request->get('namaKategori');
        $kategori->save();
        return redirect()->route('kategori.index')->with('success', 'Kategori Berhasil DiUpdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idKategori)
    {
        $kategori = Kategori::find($idKategori);

        if ($kategori != null) {
            // Periksa apakah terdapat data barang yang terkait dengan kategori
            if ($kategori->barang()->count() > 0) {
                return response()->view('deletefail', [], 403);
            }

            // Hapus kategori jika tidak terdapat data barang terkait
            $kategori->delete();

            return redirect()->route('kategori.index')->with('success', 'Kategori Berhasil Dihapus');
        }

        return redirect()->route('kategori.index')->with(['message' => 'ID Salah!!']);
    }

    //Untuk Search Bar
    public function searchKategori(Request $request)
    {
        $keyword = $request->searchKategori;
        $kategori = Kategori::where('namaKategori', 'like', "%" . $keyword . "%")->paginate(5);
        return view('layouts.kategori.master', compact('kategori'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
}