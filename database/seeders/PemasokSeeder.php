<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pemasok;

class PemasokSeeder extends Seeder
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
                'namaPemasok' => 'PT Petrokimia Gresik',
                'alamatPemasok' => 'Kota Gresik',
                'telpPemasok' => '0133 4465 789'
            ],
            [
                'namaPemasok' => 'PT JTI Bertanam',
                'alamatPemasok' => 'Kota Malang',
                'telpPemasok' => '0333 1978 992'
            ]
        ];
        Pemasok::insert($data);
    }
}
