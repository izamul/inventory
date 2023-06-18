<?php

use App\Http\Controllers\PdfController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PegawaiController;
use App\Models\Pegawai;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\PemasokController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::get('/', function () {
    return view('welcome');
})->name('welcome');


Route::get('/home',[HomeController::class,"index"])->name('home');
Route::get('/login',[LoginController::class, "showLoginForm"])->name('login');



Route::group(['middleware' => 'level:1'], function () {
    Route::resource('pegawai', PegawaiController::class);
    Route::get('/searchPegawai',[PegawaiController::class, 'searchPegawai'])->name('searchPegawai');
});


Route::resource('kategori', KategoriController::class);
Route::get('/searchKategori',[KategoriController::class, 'searchKategori'])->name('searchKategori');

Route::resource('pemasok', PemasokController::class);
Route::get('/searchPemasok',[PemasokController::class, 'searchPemasok'])->name('searchPemasok');

Route::resource('barang', BarangController::class);
Route::get('/searchBarang',[BarangController::class, 'searchBarang'])->name('searchBarang');

Route::resource('transaksi', TransaksiController::class);
Route::get('/transaksi/create/{type?}', [TransaksiController::class, 'create'])->name('transaksi.create');
Route::get('/searchTransaksi',[TransaksiController::class, 'searchTransaksi'])->name('searchTransaksi');
Route::get('/searchTransaksiData',[TransaksiController::class, 'searchTransaksiData'])->name('searchTransaksiData');


Route::get('/data-masuk', [TransaksiController::class, 'dataMasuk'])->name('dataMasuk');
Route::get('/data-keluar', [TransaksiController::class, 'dataKeluar'])->name('dataKeluar');

Route::get('/cetak-pdf-pegawai', [PdfController::class, 'cetakPegawai'])->name('cetakPegawai');
Route::get('/cetak-pdf-pemasok', [PdfController::class, 'cetakPemasok'])->name('cetakPemasok');
Route::get('/cetak-pdf-barang', [PdfController::class, 'cetakBarang'])->name('cetakBarang');
Route::get('/cetak-pdf-kategori', [PdfController::class, 'cetakKategori'])->name('cetakKategori');
Route::get('/cetak-pdf-TransaksiMasuk', [PdfController::class, 'cetakTransaksiMasuk'])->name('cetakTransaksiMasuk');
Route::get('/cetak-pdf-TransaksiKeluar', [PdfController::class, 'cetakTransaksiKeluar'])->name('cetakTransaksiKeluar');


Route::get('/profile/{id}', [ProfileController::class, 'show'])->name('profile');
Route::post('/ganti-foto/{id}',[ProfileController::class, 'gantiFoto'])->name('gantiFoto');
Route::put('/update-data/{id}',[ProfileController::class, 'updateData'])->name('updateData');
