<?php

namespace Database\Seeders;

use App\Models\Skripsi_Panduan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkripsiPanduanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Skripsi_Panduan::create([
            'title' => 'Panduan 1',
            'description' => 'Panduan 1',
            'file' => 'surat-panduan-skripsi.pdf',
        ]);
    }
}
