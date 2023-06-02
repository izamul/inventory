<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        $pegawai = Pegawai::paginate(4);
        $posts = Pegawai::orderBy('idPegawai', 'desc')->paginate(4);
        return view('layouts.pegawai.master', compact('pegawai'))->with('i', (request()->input('page', 1) - 1) * 4);
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
            'idPegawai' => 'required',
            'namaPegawai' => 'required',
            'alamatPegawai' => 'required',
            'email' => 'required',
            'password' => 'required',
            ]);
        $pegawai = new Pegawai;
        $pegawai->idPegawai=$request->get('idPegawai');
        $pegawai->namaPegawai=$request->get('namaPegawai');
        $pegawai->alamatPegawai=$request->get('alamatPegawai');
        $pegawai->telpPegawai=$request->get('telpPegawai');
        $pegawai->email=$request->get('email');
        $pegawai->password=$request->get('password');
        $pegawai->fotoPegawai='tes';
        $pegawai->level=1;
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
    public function update(Request $request,$idPegawai)
    {
        $request->validate([
            'idPegawai' => 'required',
            'namaPegawai' => 'required',
            'alamatPegawai' => 'required',
            'email' => 'required',
            'password' => 'required',
            ]);
        $pegawai = Pegawai::where('idPegawai', $idPegawai)->first();
        $pegawai->idPegawai=$request->get('idPegawai');
        $pegawai->namaPegawai=$request->get('namaPegawai');
        $pegawai->alamatPegawai=$request->get('alamatPegawai');
        $pegawai->telpPegawai=$request->get('telpPegawai');
        $pegawai->email=$request->get('email');
        $pegawai->password=$request->get('password');
        $pegawai->fotoPegawai='tes';
        $pegawai->level=1;
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
        $pegawai = Pegawai::where('idKategori',$idPegawai)->first();

        if ($pegawai != null) {
            $pegawai->delete();
            return redirect()->route('pegawai.index')->with('success', 'Pegawai Berhasil Dihapus');
        }
    
        return redirect()->route('pegawai.index')->with(['message'=> 'ID Salah!!']);
    }
}
