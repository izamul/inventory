<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PegawaiController;
use App\Models\Pegawai;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\PemasokController;
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

// Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
// Route::post('/login', 'Auth\LoginController@login');


Route::get('/home',[HomeController::class,"index"])->name('home');
Route::get('/login',[LoginController::class, "showLoginForm"])->name('login');

Route::resource('pegawai', PegawaiController::class);


// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/', function () {
//     return view('layouts.master');
// });

Route::resource('kategori', KategoriController::class);
Route::get('/searchKategori',[KategoriController::class, 'searchKategori'])->name('searchKategori');

Route::resource('pemasok', PemasokController::class);
Route::get('/search',[PemasokController::class, 'search'])->name('search');

