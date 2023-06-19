<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Transaksi;
use Illuminate\Support\Facades\DB;


class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pencatatList = ['Naresh Pratista', 'Hakan Alif Pramudya', 'Muhammad Endar Darmawan', 'Dimitri Abdullah'];

        $tanggalStart = strtotime('2023-06-15');
        $tanggalEnd = strtotime('2023-06-20');

        for ($i = 1; $i <= 50; $i++) {
            $barangId = rand(1, 20);
            $pencatat = $pencatatList[rand(0, 3)];
            $tanggal = date('Y-m-d', rand($tanggalStart, $tanggalEnd));
            $status = ($i % 2 == 0) ? 'in' : 'out';
            $totalHarga = rand(10000, 150000);
            $jumlah = rand(1, 10);

            DB::table('transaksi')->insert([
                'tanggal' => $tanggal,
                'status' => $status,
                'totalHarga' => $totalHarga,
                'jumlah' => $jumlah,
                'pencatat' => $pencatat,
                'barang_id' => $barangId,
            ]);

    }
}
}
