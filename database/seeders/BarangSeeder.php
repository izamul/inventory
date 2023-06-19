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
                'namaBarang' => 'Urea',
                'satuan' => 'kg',
                'stock' => 100,
                'harga' => 5000,
                'fotoBarang' => 'urea.jpg',
                'pemasok_id' => rand(1, 5),
                'kategori_id' => 1,
            ],
            [
                'namaBarang' => 'NPK (Nitrogen, Phosphorus, Potassium)',
                'satuan' => 'kg',
                'stock' => 50,
                'harga' => 10000,
                'fotoBarang' => 'npk.jpg',
                'pemasok_id' => rand(1, 5),
                'kategori_id' => 1,
            ],
            [
                'namaBarang' => 'Kompos',
                'satuan' => 'kg',
                'stock' => 200,
                'harga' => 8000,
                'fotoBarang' => 'kompos.jpg',
                'pemasok_id' => rand(1, 5),
                'kategori_id' => 1,
            ],
            [
                'namaBarang' => 'Bibit Padi',
                'satuan' => 'pcs',
                'stock' => 100,
                'harga' => 5000,
                'fotoBarang' => 'bibit_padi.jpg',
                'pemasok_id' => rand(1, 5),
                'kategori_id' => 2,
            ],
            [
                'namaBarang' => 'Bibit Jagung',
                'satuan' => 'pcs',
                'stock' => 50,
                'harga' => 10000,
                'fotoBarang' => 'bibit_jagung.jpg',
                'pemasok_id' => rand(1, 5),
                'kategori_id' => 2,
            ],
            [
                'namaBarang' => 'Bibit Tomat',
                'satuan' => 'pcs',
                'stock' => 200,
                'harga' => 8000,
                'fotoBarang' => 'bibit_tomat.jpg',
                'pemasok_id' => rand(1, 5),
                'kategori_id' => 2,
            ],
            [
                'namaBarang' => 'Cabai Merah',
                'satuan' => 'kg',
                'stock' => 100,
                'harga' => 5000,
                'fotoBarang' => 'cabai_merah.jpg',
                'pemasok_id' => rand(1, 5),
                'kategori_id' => 4,
            ],
            [
                'namaBarang' => 'Cabai Rawit',
                'satuan' => 'kg',
                'stock' => 50,
                'harga' => 10000,
                'fotoBarang' => 'cabai_rawit.jpg',
                'pemasok_id' => rand(1, 5),
                'kategori_id' => 4,
            ],
            [
                'namaBarang' => 'Cabai Hijau',
                'satuan' => 'kg',
                'stock' => 200,
                'harga' => 8000,
                'fotoBarang' => 'cabai_hijau.jpg',
                'pemasok_id' => rand(1, 5),
                'kategori_id' => 4,
            ],
            [
                'namaBarang' => 'Bawang Merah',
                'satuan' => 'kg',
                'stock' => 100,
                'harga' => 5000,
                'fotoBarang' => 'bawang_merah.jpg',
                'pemasok_id' => rand(1, 5),
                'kategori_id' => 5,
            ],
            [
                'namaBarang' => 'Bawang Putih',
                'satuan' => 'kg',
                'stock' => 50,
                'harga' => 10000,
                'fotoBarang' => 'bawang_putih.jpg',
                'pemasok_id' => rand(1, 5),
                'kategori_id' => 5,
            ],
            [
                'namaBarang' => 'Bawang Bombay',
                'satuan' => 'kg',
                'stock' => 200,
                'harga' => 8000,
                'fotoBarang' => 'bawang_bombay.jpg',
                'pemasok_id' => rand(1, 5),
                'kategori_id' => 5,
            ],
            [
                'namaBarang' => 'Pestisida Organik',
                'satuan' => 'botol',
                'stock' => 100,
                'harga' => 5000,
                'fotoBarang' => 'pestisida_organik.jpg',
                'pemasok_id' => rand(1, 5),
                'kategori_id' => 6,
            ],
            [
                'namaBarang' => 'Pestisida Sintetis',
                'satuan' => 'botol',
                'stock' => 50,
                'harga' => 10000,
                'fotoBarang' => 'pestisida_sintetis.jpg',
                'pemasok_id' => rand(1, 5),
                'kategori_id' => 6,
            ],
            [
                'namaBarang' => 'Pestisida Insektisida',
                'satuan' => 'botol',
                'stock' => 200,
                'harga' => 8000,
                'fotoBarang' => 'pestisida_insektisida.jpg',
                'pemasok_id' => rand(1, 5),
                'kategori_id' => 6,
            ],
            [
                'namaBarang' => 'Apel',
                'satuan' => 'kg',
                'stock' => 100,
                'harga' => 5000,
                'fotoBarang' => 'apel.jpg',
                'pemasok_id' => rand(1, 5),
                'kategori_id' => 7,
            ],
            [
                'namaBarang' => 'Jeruk',
                'satuan' => 'kg',
                'stock' => 50,
                'harga' => 10000,
                'fotoBarang' => 'jeruk.jpg',
                'pemasok_id' => rand(1, 5),
                'kategori_id' => 7,
            ],
            [
                'namaBarang' => 'Mangga',
                'satuan' => 'kg',
                'stock' => 200,
                'harga' => 8000,
                'fotoBarang' => 'mangga.jpg',
                'pemasok_id' => rand(1, 5),
                'kategori_id' => 7,
            ],
            [
                'namaBarang' => 'Beras Super',
                'satuan' => 'kg',
                'stock' => 20,
                'harga' => 11000,
                'fotoBarang' => 'beras_super.jpg',
                'pemasok_id' => rand(1, 5),
                'kategori_id' => 3,
            ],
            [
                'namaBarang' => 'Jagung Super',
                'satuan' => 'kg',
                'stock' => 20,
                'harga' => 11000,
                'fotoBarang' => 'jagung_super.jpg',
                'pemasok_id' => rand(1, 5),
                'kategori_id' => 3,
            ],
        ];
        Barang::insert($barang);
    }
}
