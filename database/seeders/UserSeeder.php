<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
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
                'alamatPegawai' => 'Lowokwaru, Malang',
                'telpPegawai' => '085234001234',
                'fotoPegawai' => 'tes',
                'level' => 1,
                'Email' => 'izam@gmail.com',
                'password' => Hash::make('izamul123')
            ],
            [
                'namaPegawai' => 'Muhammad Endar Darmawan',
                'alamatPegawai' => 'Dinoyo, Malang',
                'telpPegawai' => '089516824205',
                'fotoPegawai' => 'tes',
                'level' => 1,
                'Email' => 'endar@gmail.com',
                'password' => Hash::make('endar123')
            ],
            [
                'namaPegawai' => 'Naresh Pratista',
                'alamatPegawai' => 'Lowokwaru, Malang',
                'telpPegawai' => '087873083096',
                'fotoPegawai' => 'tes',
                'level' => 1,
                'Email' => 'naresh@gmail.com',
                'password' => Hash::make('naresh123')
            ],
            [
                'namaPegawai' => 'Hakan Alif Pramudya',
                'alamatPegawai' => 'Klojen, Malang',
                'telpPegawai' => '08983586416',
                'fotoPegawai' => 'tes',
                'level' => 1,
                'Email' => 'hakan@gmail.com',
                'password' => Hash::make('alif123')
            ],
            [
                'namaPegawai' => 'Dimitri Abdullah',
                'alamatPegawai' => 'Lowokwaru, Malang',
                'telpPegawai' => '08888090576',
                'fotoPegawai' => 'tes',
                'level' => 1,
                'Email' => 'dimit@gmail.com',
                'password' => Hash::make('dimit123')
            ]
        ];
        User::insert($data);
    }
}
