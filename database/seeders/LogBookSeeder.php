<?php

namespace Database\Seeders;

use App\Models\LogBook;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LogBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        LogBook::create([
            'isi' => '1',
            'status' => '1',
            'video' => '1',
            'comment' => '1',
            'status' => 'proses',
            'anak_id' => '1'
        ]);
    }
}
