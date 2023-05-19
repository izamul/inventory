<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemasok extends Model
{
    use HasFactory;
    protected $table = "Pemasok"; // Eloquent akan membuat model Pemasok menyimpan record di tabel Pemasok
    protected $primaryKey = 'idPemasok'; // Memanggil isi DB Dengan primarykey

    protected $fillable = [
        'idPemasok',
        'namaPemasok',
        'alamatPemasok',
        'telpPemasok'
    ];

}
    