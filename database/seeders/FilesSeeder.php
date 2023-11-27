<?php

namespace Database\Seeders;

use App\Models\Files;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Files::create([
            'code' => '2020210005',
            'title' => 'Pengumuman terbaru Skripsi',
            'date' => '2023-11-27',
            'desc' => 'ini file mengenai skripsi',
            'link' => 'https://drive.google.com/drive/folders/1-2-3-4-5-6-7-8-9-0',
        ]);
    }
}
