<?php

namespace Database\Seeders;

use App\Models\Skripsi_Syarat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkripsiSyaratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Skripsi_Syarat::create([
            'title' => 'Syarat 1',
            'description' => 'Syarat 1',
            'file' => 'surat-syarat-skripsi.pdf',
        ]);
    }
}
