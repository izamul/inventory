<?php
namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show($idPegawai)
    {
        $pegawai = Pegawai::find($idPegawai);
        return view('layouts.profile', compact('pegawai'));
    }
}
