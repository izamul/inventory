<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $table = "Kategori"; // Eloquent akan membuat model Kategori menyimpan record di tabel Kategori
    protected $primaryKey = 'idKategori'; // Memanggil isi DB Dengan primarykey

    protected $fillable = [
        'idKategori',
        'namaKategori'
    ];
}
