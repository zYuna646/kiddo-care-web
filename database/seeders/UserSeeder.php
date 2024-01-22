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

       
        $masyarakat = User::create([
            'email' => 'test@email.com',
            'phone' => '08530000001',
            'username' => 'test',
            'password' => Hash::make(1234567),
            'token' => 'token',
            'role' => 'masyarakat',
        ]);

        $petugas = User::create([
            'email' => 'admin@email.com',
            'phone' => '085398298129',
            'username' => 'admin',
            'password' => Hash::make(1234567),
            'token' => 'token1234',
            'role' => 'petugas'
        ]);

        // Assign roles to users
        $masyarakat->assignRole('masyarakat');
        $petugas->assignRole('petugas');

        // Give permissions to users (replace 'permission_name' with the actual permission)
    }
}
