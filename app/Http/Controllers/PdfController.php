<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use Illuminate\Support\Facades\View;
use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Pemasok;
use App\Models\Pegawai;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class PdfController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function cetakPegawai()
    {
        $pegawai = Pegawai::all();

        $pdf = new Dompdf();
        $pdf->loadHtml(View::make('pdf.cetakPegawai',  compact('pegawai')));
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();

        $output = $pdf->output();

        return response($output, 200)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'attachment; filename=Pegawai.pdf');
    }

    public function cetakPemasok()
    {
        $pemasok = Pemasok::all();

        $pdf = new Dompdf();
        $pdf->loadHtml(View::make('pdf.cetakPemasok',  compact('pemasok')));
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();

        $output = $pdf->output();

        return response($output, 200)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'attachment; filename=Pemasok.pdf');
    }

    public function cetakKategori()
    {
        $kategori = Kategori::all();

        $pdf = new Dompdf();
        $pdf->loadHtml(View::make('pdf.cetakKategori',  compact('kategori')));
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();

        $output = $pdf->output();

        return response($output, 200)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'attachment; filename=Kategori.pdf');
    }

    public function cetakBarang()
    {
        $barang = Barang::all();

        $pdf = new Dompdf();
        $pdf->loadHtml(View::make('pdf.cetakBarang',  compact('barang')));
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();

        $output = $pdf->output();

        return response($output, 200)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'attachment; filename=Barang.pdf');
    }

    public function cetakTransaksiMasuk()
    {
        $transaksi = Transaksi::all();

        $pdf = new Dompdf();
        $pdf->loadHtml(View::make('pdf.cetakTransaksi',  compact('transaksi')));
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();

        $output = $pdf->output();

        return response($output, 200)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'attachment; filename=Transaksi-Masuk.pdf');
    }

    public function cetakTransaksiKeluar()
    {
        $transaksi = Transaksi::all();

        $pdf = new Dompdf();
        $pdf->loadHtml(View::make('pdf.cetakTransaksi',  compact('transaksi')));
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();

        $output = $pdf->output();

        return response($output, 200)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'attachment; filename=Transaksi-Keluar.pdf');
    }
}
