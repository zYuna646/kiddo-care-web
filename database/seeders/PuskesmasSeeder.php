<?php

namespace Database\Seeders;

use App\Models\Masyarakat;
use App\Models\Petugas;
use App\Models\Puskesmas;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PuskesmasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sejahtera = Puskesmas::create([
            'provinsi' => 'Gorontalo',
            'kabupaten' => 'Gorontalo Utara',
            'kecamatan' => 'Tomolito',
            'name' => 'Sejahtera',
        ]);

        $petugas = User::create([
            'email' => 'petugas@gmail.com',
            'phone' => '10100101',
            'username' => 'petugas',
            'role' => 'petugas',

            'password' => Hash::make('1234567'),
        ]);

        $user = User::create([
            'email' => 'user@gmail.com',
            'phone' => '10100101212',
            'username' => 'petugas',
            'role' => 'masyarakat',
            'password' => Hash::make('1234567'),
        ]);

        Petugas::create([
            'user_id' => $petugas->id,
            'jenis_kelamin' => 'Laki-Laki',
            'nik' => '1023092093',
            'nkk' => '1921982183',
            'puskesmas_id' => $sejahtera->id,
        ]);

        Masyarakat::create([
            'jenis_kelamin' => 'Laki-Laki',
            'nik' => '1023092093',
            'nkk' => '1921982183',
            'user_id' => $user->id,
            'puskesmas_id' => $sejahtera->id,
        ]);
    }
}
