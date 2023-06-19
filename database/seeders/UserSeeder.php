<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pegawai;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
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
                'namaPegawai' => 'Mohammad Izamul Fikri Fahmi',
                'alamatPegawai' => 'Jatimulyo, Lowokwaru, Malang',
                'telpPegawai' => '+628980418610',
                'fotoPegawai' => 'tes',
                'level' => 1,
                'email' => 'izamul@gmail.com',
                'password' => Hash::make('izamul123'),
            ],
            [
                'namaPegawai' => 'Muhammad Endar Darmawan',
                'alamatPegawai' => 'Dinoyo, Lowokwaru, Malang',
                'telpPegawai' => '+6289516824205',
                'fotoPegawai' => 'tes',
                'level' => 2,
                'email' => 'endar@gmail.com',
                'password' => Hash::make('endar123'),
            ],
            [
                'namaPegawai' => 'Hakan Alif Pramudya',
                'alamatPegawai' => 'Ijen, Klojen, Malang',
                'telpPegawai' => '+628983586416',
                'fotoPegawai' => 'tes',
                'level' => 2,
                'email' => 'hakan@gmail.com',
                'password' => Hash::make('hakan123'),
            ],
            [
                'namaPegawai' => 'Naresh Pratista',
                'alamatPegawai' => 'Jatimulyo, Lowokwaru, Malang',
                'telpPegawai' => '+6287873083096',
                'fotoPegawai' => 'tes',
                'level' => 2,
                'email' => 'naresh@gmail.com',
                'password' => Hash::make('naresh123'),
            ],
            [
                'namaPegawai' => 'Dimitri Abdullah',
                'alamatPegawai' => 'Sudimoro, Lowokwaru, Malang',
                'telpPegawai' => '+628888090576',
                'fotoPegawai' => 'tes',
                'level' => 2,
                'email' => 'dimit@gmail.com',
                'password' => Hash::make('dimit123'),
            ],
            [
                'namaPegawai' => 'Jamal Valentine',
                'alamatPegawai' => 'Dau, Malang',
                'telpPegawai' => '+628521234422',
                'fotoPegawai' => 'tes',
                'level' => 2,
                'email' => 'jamal@gmail.com',
                'password' => Hash::make('jamal123'),
            ],
        ];
        Pegawai::insert($data);
    }
}
