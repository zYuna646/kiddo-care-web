<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'email' => 'test@email.com',
            'phone' => '08530000001',
            'username' => 'test',
            'password' => Hash::make(12345),
            'token' => 'token'
        ]);

        User::create([
            'email' => 'admin@email.com',
            'phone' => '085398298129',
            'username' => 'admin',
            'password' => Hash::make(1234567),
            'token' => 'token1234'
        ]);
    }
}
