<?php

namespace Database\Seeders;

use App\Models\SkripsiGuide;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkripsiGuideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SkripsiGuide::create([
            'code' => 'SI001',
            'title' => 'Ini Panduan Skripsi',
            'desc' => 'Ini Deskripsi Panduan Skripsi untuk mahasiswa',
            'link' => 'https:/drive.google.com/ini-link-nya',
        ]);
    }
}
