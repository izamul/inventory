<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'namaKategori' => 'Pupuk',
            ],
            [
                'namaKategori' => 'Bibit',
            ]
        ];
        Kategori::insert($data);
    }
}
