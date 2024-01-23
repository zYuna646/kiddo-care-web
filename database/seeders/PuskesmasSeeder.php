<?php

namespace Database\Seeders;

use App\Models\Puskesmas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PuskesmasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Puskesmas::create([
            'provinsi' => 'Gorontalo',
            'kabupaten' => 'Gorontalo Utara',
            'kecamatan' => 'Tomolito',
            'name' => 'Sejahtera',
        ]);
        Puskesmas::create([
            'provinsi' => 'Gorontalo',
            'kabupaten' => 'Gorontalo Utara',
            'kecamatan' => 'Kwandang',
            'name' => 'Tidak Sejahtera',
        ]);
    }
}
