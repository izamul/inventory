<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemasok;

class PemasokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pemasok = Pemasok::paginate(5);
        $posts = Pemasok::orderBy('idPemasok', 'desc')->paginate(5);
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
            'idPemasok' => 'required',
            'namaPemasok' => 'required',
            'alamatPemasok' => 'required',
            'telpPemasok' => 'required',
        ]);
        $pemasok = new Pemasok();
        $pemasok->idPemasok = $request->get('idPemasok');
        $pemasok->namaPemasok = $request->get('namaPemasok');
        $pemasok->alamatPemasok = $request->get('alamatPemasok');
        $pemasok->telpPemasok = $request->get('telpPemasok');
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
    public function show(Pemasok $idPemasok)
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
    public function edit(Pemasok $idPemasok)
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
            'idSupplier' => 'required',
            'namaSupplier' => 'required',
            'alamatPemasok' => 'required',
            'telpPemasok' => 'required',
        ]);
        $pemasok = Pemasok::where('idPemasok', $idPemasok)->first();
        $pemasok->idPemasok = $request->get('idSupplier');
        $pemasok->namaPemasok = $request->get('namaSupplier');
        $pemasok->alamatPemasok = $request->get('alamatPemasok');
        $pemasok->telpPemasok = $request->get('alamatPemasok');
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
        $pemasok = Pemasok::where('idPemasok', $idPemasok)->first();

        if ($pemasok != null) {
            $pemasok->delete();
            return redirect()
                ->route('pemasok.index')
                ->with('success', 'Pemasok Berhasil Dihapus');
        }

        return redirect()
            ->route('pemasok.index')
            ->with(['message' => 'ID Salah!!']);
    }

    public function search(Request $request)
    {
        $keyword = $request->search;
        $pemasok = Pemasok::where('namaPemasok', 'alamatPemasok', '%' . $keyword . '%')->paginate(1);
        return view('layouts.pemasok.master', compact('pemasok'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
