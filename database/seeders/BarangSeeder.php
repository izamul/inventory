<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Barang;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $barang = [
            [
                'idBarang' => 1,
                'namaBarang' => 'Pupuk Jagung Madura Joss',
                'satuan' => 'botol',
                'stock' => 20,
                'harga' => 50000,
                'fotoBarang' => 'tes',
                'pemasok_id' => 1,
                'kategori_id' => 1,
            ],


            [
                'idBarang' => 2,
                'namaBarang' => 'Urea Premium',
                'satuan' => 'karung',
                'stock' => 15,
                'harga' => 100000,
                'fotoBarang' => 'tes',
                'pemasok_id' => 1,
                'kategori_id' => 2,
            ],

        ];
        Barang::insert($barang);
    }
}
