<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Barang;
use App\Models\Pegawai;
use Kyslik\ColumnSortable\Sortable;


class Transaksi extends Model
{
    use HasFactory;
    use Sortable;
    protected $table = 'transaksi';
    protected $primaryKey = 'idTransaksi'; // Memanggil isi DB Dengan primarykey
    public $timestamps = false;
    protected $fillable = [
        'tanggal',
        'status',
        'totalHarga',
        'jumlah',
        'barang_id',
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }

    public $sortable = [
        'tanggal',
    ];
}
