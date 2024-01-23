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
            'kecamatan' => 'tomilito',
            'name' => 'Sejahtera',
        ]);
        Puskesmas::create([
            'provinsi' => 'Gorontalo',
            'kabupaten' => 'Gorontalo Utara',
            'kecamatan' => 'kwandang',
            'name' => 'Tidak Sejahtera',
        ]);
    }
}
