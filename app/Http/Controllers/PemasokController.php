<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemasok;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Storage;

class PemasokController extends Controller
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
        $pemasok = Pemasok::sortable()->paginate(5);
        return view('layouts.pemasok.master', compact('pemasok'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.pemasok.create');
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
            'namaPemasok' => 'required',
            'alamatPemasok' => 'required',
            'telpPemasok' => 'required',
            'fotoPemasok' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $image_name = $request->file('fotoPemasok')->store('images', 'public');
        $pemasok = new Pemasok();
        $pemasok->namaPemasok = $request->get('namaPemasok');
        $pemasok->alamatPemasok = $request->get('alamatPemasok');
        $pemasok->telpPemasok = $request->get('telpPemasok');
        $pemasok->fotoPemasok = $image_name;
        // $image_name;
        $pemasok->save();
        return redirect()
            ->route('pemasok.index')
            ->with('success', 'Pemasok Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pemasok  $pemasok
     * @return \Illuminate\Http\Response
     */
    public function show($idPemasok)
    {
        $pemasok = Pemasok::find($idPemasok);
        return view('layouts.pemasok.detail', compact('pemasok'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pemasok  $pemasok
     * @return \Illuminate\Http\Response
     */
    public function edit($idPemasok)
    {
        $pemasok = Pemasok::find($idPemasok);
        return view('layouts.pemasok.edit', ['pemasok' => $pemasok]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pemasok  $pemasok
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idPemasok)
    {
        $request->validate([
            'namaPemasok' => 'required',
            'alamatPemasok' => 'required',
            'telpPemasok' => 'required',
            'fotoPemasok' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $pemasok = Pemasok::findOrFail($idPemasok);
        if ($request->hasFile('fotoPemasok')) {
            if ($pemasok->fotoPemasok && file_exists(storage_path('app/public/' . $pemasok->fotoPemasok))) {
                Storage::delete('public/' . $pemasok->fotoPemasok);
            }
            $image_name = $request->file('fotoPemasok')->store('images', 'public');
        } else {
            $image_name = $pemasok->fotoPemasok;
        }

        $pemasok = Pemasok::where('idPemasok', $idPemasok)->first();
        $pemasok->namaPemasok = $request->get('namaPemasok');
        $pemasok->alamatPemasok = $request->get('alamatPemasok');
        $pemasok->telpPemasok = $request->get('telpPemasok');
        $pemasok->fotoPemasok = $image_name;
        $pemasok->save();

        return redirect()
            ->route('pemasok.index')
            ->with('success', 'Pemasok Berhasil Di Update');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pemasok  $pemasok
     * @return \Illuminate\Http\Response
     */
    public function destroy($idPemasok)
    {
        $pemasok = Pemasok::find($idPemasok);
    
        if ($pemasok != null) {
            // Periksa apakah terdapat data barang yang terkait dengan pemasok
            if ($pemasok->barang()->count() > 0) {
                return response()->view('deletefail', [], 403);
            }
    
            // Hapus pemasok jika tidak terdapat data barang terkait
            $pemasok->delete();
    
            return redirect()
                ->route('pemasok.index')
                ->with('success', 'Pemasok Berhasil Dihapus');
        }
    
        return redirect()
            ->route('pemasok.index')
            ->with(['message' => 'ID Salah!!']);
    }
    
    
    

    public function searchPemasok(Request $request)
    {
        $keyword = $request->searchPemasok;
        $pemasok = Pemasok::where('namaPemasok', 'like', '%' . $keyword . '%')->paginate(5);

        return view('layouts.pemasok.master', compact('pemasok'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
}