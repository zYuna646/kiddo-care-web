<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        User::create([
            'email' => 'admin@email.com',
            'phone' => '08530000001',
            'username' => 'admin',
            'password' => Hash::make(1234567),
            'token' => 'token',
            'role' => 'admin',
        ]);

        // $petugas = User::create([
        //     'email' => 'admin@email.com',
        //     'phone' => '085398298129',
        //     'username' => 'admin',
        //     'password' => Hash::make(1234567),
        //     'token' => 'token1234',
        //     'role' => 'petugas'
        // ]);

        // // Assign roles to users
        // $masyarakat->assignRole('masyarakat');
        // $petugas->assignRole('petugas');



    }
}
