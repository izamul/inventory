<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Barang;
use Kyslik\ColumnSortable\Sortable;

class Kategori extends Model
{
    use HasFactory;
    use Sortable;
    protected $table = "Kategori"; // Eloquent akan membuat model Kategori menyimpan record di tabel Kategori
    protected $primaryKey = 'idKategori'; // Memanggil isi DB Dengan primarykey
    public $timestamps = false;

    protected $fillable = [
        'namaKategori'
    ];

    public function barang(){
        return $this->hasMany(Barang::class, 'kategori_id', 'idKategori');
    }

    public $sortable = [
        'namaKategori',
    ];
}
