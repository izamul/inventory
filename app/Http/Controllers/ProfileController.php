<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show($idPegawai)
    {
        $pegawai = Pegawai::find($idPegawai);
        return view('layouts.profile.content', compact('pegawai'));
    }

    public function gantiFoto($idPegawai, Request $request)
    {
        $pegawai = Pegawai::find($idPegawai);
        $request->validate([
            'fotoPegawai' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

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
        $pegawai->save();
        return redirect()->route('profile', ['id' => $pegawai->idPegawai]);
    }

    public function updateData($idPegawai, Request $request)
    {
        $request->validate([
            'namaPegawai' => 'required',
            'alamatPegawai' => 'required',
            'email' => 'required',
            'telpPegawai' => 'required',
            'password' => 'required',
        ]);

        $pegawai = Pegawai::find($idPegawai);
        $pegawai->namaPegawai = $request->get('namaPegawai');
        $pegawai->alamatPegawai = $request->get('alamatPegawai');
        $pegawai->telpPegawai = $request->get('telpPegawai');
        $pegawai->email = $request->get('email');

        $password = $request->get('password');
        if (!empty($password)) {
            $pegawai->password = Hash::make($password);
        }

        $pegawai->save();

        return redirect()->route('profile', ['id' => $pegawai->idPegawai]);
    }
}
