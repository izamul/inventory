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
                'namaPemasok' => 'PT Agro Tani Indonesia',
                'alamatPemasok' => 'Jl. Raya Pertanian No. 123, Jakarta Selatan',
                'telpPemasok' => '08123456789',
                'fotoPemasok' => '-',
            ],
            [
                'namaPemasok' => 'CV Pangan Makmur',
                'alamatPemasok' => 'Jl. Pemuda No. 45, Surabaya, Jawa Timur',
                'telpPemasok' => '0876543210',
                'fotoPemasok' => '-',
            ],
            [
                'namaPemasok' => 'UD Sentosa Farm',
                'alamatPemasok' => 'Jl. Raya Kebun Sawit No. 67, Medan, Sumatera Utara',
                'telpPemasok' => '081111222333',
                'fotoPemasok' => '-',
            ],
            [
                'namaPemasok' => 'PT Mitra Tani Abadi',
                'alamatPemasok' => 'Jl. Raya Tanaman Pangan No. 789, Bandung, Jawa Barat',
                'telpPemasok' => '08987654321',
                'fotoPemasok' => '-',
            ],
            [
                'namaPemasok' => 'CV Agri Sejahtera',
                'alamatPemasok' => 'Jl. Merdeka No. 10, Malang, Jawa Timur',
                'telpPemasok' => '08234567890',
                'fotoPemasok' => '-',
            ],
        ];
        Pemasok::insert($data);
    }
}
