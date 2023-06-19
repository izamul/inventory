<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kategori;
use App\Models\Pemasok;
use App\Models\Transaksi;
use Kyslik\ColumnSortable\Sortable;

class Barang extends Model
{
    use HasFactory;
    use Sortable;
    protected $table = 'barang';
    public $timestamps = false;
    public $primaryKey = 'idBarang';

    protected $fillable = [
        'namaBarang',
        'satuan',
        'stock',
        'harga',
        'fotoBarang',
        'pemasok_id',
        'kategori_id',
    ];

    public function pemasok()
    {
        return $this->belongsTo(Pemasok::class, 'pemasok_id', 'idPemasok');
    }

    public function kategori() 
    {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'idKategori');
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'barang_id', 'idBarang');
    }
    


    public $sortable = [
        'namaBarang',
    ];
}
