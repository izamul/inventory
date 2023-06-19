<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Pemasok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // orderBy('namaBarang')
        $barang = Barang::sortable()->paginate(5);
        return view('layouts.barang.master', compact('barang'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    

    public function create()
    {
        $pemasok = Pemasok::all();
        $kategori = Kategori::all();
        return view('layouts.barang.create', compact('pemasok', 'kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'namaBarang' => 'required',
            'satuan' => 'required',
            'harga' => 'required',
            'stock' => 'required',
            'pemasok_id' => 'required',
            'kategori_id' => 'required',
            'fotoBarang' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $image_name = $request->file('fotoBarang')->store('images', 'public');
        $barang = new Barang();
        $barang->namaBarang = $request->get('namaBarang');
        $barang->satuan = $request->get('satuan');
        $barang->harga = $request->get('harga');
        $barang->stock = $request->get('stock');
        $barang->fotoBarang = $image_name;

        $kategori = Kategori::findOrFail($request->get('kategori_id'));
        $barang->kategori()->associate($kategori);

        $pemasok = Pemasok::findOrFail($request->get('pemasok_id'));
        $barang->pemasok()->associate($pemasok);

        $barang->save();

        return redirect()->route('barang.index')->with('success', 'Barang Berhasil Ditambahkan');
    }

    public function edit($idBarang)
    {
        $barang = Barang::findOrFail($idBarang);
        $pemasok = Pemasok::all();
        $kategori = Kategori::all();
        return view('layouts.barang.edit', compact('barang', 'pemasok', 'kategori'));
    }

    public function update(Request $request, $idBarang)
    {
        $request->validate([
            'namaBarang' => 'required',
            'satuan' => 'required',
            'harga' => 'required',
            'stock' => 'required',
            'pemasok_id' => 'required',
            'kategori_id' => 'required',
            'fotoBarang' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $barang = Barang::findOrFail($idBarang);
        if ($request->hasFile('fotoBarang')) {
            if ($barang->fotoBarang && file_exists(storage_path('app/public/' . $barang->fotoBarang))) {
                Storage::delete('public/' . $barang->fotoBarang);
            }
            $image_name = $request->file('fotoBarang')->store('images', 'public');
        } else {
            $image_name = $barang->fotoBarang;
        }


        $barang->namaBarang = $request->get('namaBarang');
        $barang->satuan = $request->get('satuan');
        $barang->harga = $request->get('harga');
        $barang->stock = $request->get('stock');
        $barang->fotoBarang = $image_name;

        $kategori = Kategori::findOrFail($request->get('kategori_id'));
        $barang->kategori()->associate($kategori);

        $pemasok = Pemasok::findOrFail($request->get('pemasok_id'));
        $barang->pemasok()->associate($pemasok);

        $barang->save();

        return redirect()->route('barang.index')->with('success', 'Barang Berhasil Diupdate');
    }

    public function show($idBarang)
    {
        $barang = Barang::findOrFail($idBarang);
        return view('layouts.barang.detail', compact('barang'));
    }

    public function destroy($idBarang)
    {
        $barang = Barang::findOrFail($idBarang);
        $barang->delete();
        return redirect()->route('barang.index')->with('success', 'Barang Berhasil Dihapus');
    }

    public function searchBarang(Request $request)
    {
        $keyword = $request->searchBarang;
        $barang = Barang::where('namaBarang', 'like', '%' . $keyword . '%')->paginate(5);

        return view('layouts.barang.master', compact('barang'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
