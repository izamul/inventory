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
                'namaPegawai' => 'Muhammad Dzaka Murran Rusid',
                'alamatPegawai' => 'Dinoyo, Malang',
                'telpPegawai' => '085234001234',
                'fotoPegawai' => 'tes',
                'level' => 2,
                'Email' => 'dzaka@gmail.com',
                'password' => Hash::make('dzaka123')
            ],
        ];
        User::insert($data);
    }
}
