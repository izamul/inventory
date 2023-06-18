<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class PegawaiController extends Controller
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
        $pegawai = Pegawai::where('level', '!=', 1)->paginate(5);
        $posts = Pegawai::orderBy('namaPegawai', 'desc')->paginate(5);
        return view('layouts.pegawai.master', compact('pegawai'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.pegawai.create');
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
            'namaPegawai' => 'required',
            'alamatPegawai' => 'required',
            'email' => 'required',
            'password' => 'required',
            'level' => 'required',
            'fotoPegawai' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $image_name = $request->file('fotoPegawai')->store('images', 'public');
        $pegawai = new Pegawai;
        $pegawai->namaPegawai = $request->get('namaPegawai');
        $pegawai->alamatPegawai = $request->get('alamatPegawai');
        $pegawai->telpPegawai = $request->get('telpPegawai');
        $pegawai->email = $request->get('email');
        $pegawai->password = Hash::make($request->get('password'));
        $pegawai->level = $request->get('level');
        $pegawai->fotoPegawai = $image_name;
        $pegawai->save();
        return redirect()->route('pegawai.index')->with('success', 'Pegawai Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function show($idPegawai)
    {
        $pegawai = Pegawai::find($idPegawai);
        return view('layouts.pegawai.detail', compact('pegawai'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function edit($idPegawai)
    {
        $pegawai = Pegawai::find($idPegawai);
        return view('layouts.pegawai.edit', compact('pegawai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idPegawai)
    {
        $request->validate([
            'namaPegawai' => 'required',
            'alamatPegawai' => 'required',
            'email' => 'required',
            'level' => 'required',
            'fotoPegawai' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $pegawai = Pegawai::find($idPegawai);
        $pegawai->namaPegawai = $request->get('namaPegawai');
        $pegawai->alamatPegawai = $request->get('alamatPegawai');
        $pegawai->telpPegawai = $request->get('telpPegawai');
        $pegawai->email = $request->get('email');
        $pegawai->level = $request->get('level');

        if ($request->hasFile('fotoPegawai')) {
            // Menghapus foto lama jika ada
            if ($pegawai->fotoPegawai && file_exists(storage_path('app/public/' . $pegawai->fotoPegawai))) {
                Storage::delete('public/' . $pegawai->fotoPegawai);
            }

            $image_name = $request->file('fotoPegawai')->store('images', 'public');
            $pegawai->fotoPegawai = $image_name;
        } elseif ($pegawai->fotoPegawai) {
            // If no new image is uploaded but an existing image exists, retain the existing image
            $image_name = $pegawai->fotoPegawai;
            $pegawai->fotoPegawai = $image_name;
        }

        $password = $request->get('password');
        if (!empty($password)) {
            $pegawai->password = Hash::make($password);
        }

        $pegawai->save();

        return redirect()->route('pegawai.index')->with('success', 'Pegawai Berhasil Diedit');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy($idPegawai)
    {
        $pegawai = Pegawai::where('idPegawai', $idPegawai)->first();

        if ($pegawai != null) {
            $pegawai->delete();
            return redirect()->route('pegawai.index')->with('success', 'Pegawai Berhasil Dihapus');
        }

        return redirect()->route('pegawai.index')->with(['message' => 'ID Salah!!']);
    }



    public function searchPegawai(Request $request)
    {
        // $keyword = $request->searchKategori;
        // $kategori = Kategori::where('namaKategori', 'like', "%" . $keyword . "%")->paginate(5);
        // return view('layouts.kategori.master', compact('kategori'))->with('i', (request()->input('page', 1) - 1) * 5);

        $keyword = $request->searchPegawai;
        $pegawai = Pegawai::where('namaPegawai', 'like', '%' . $keyword . '%')->paginate(5);
        return view('layouts.pegawai.master', compact('pegawai'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
