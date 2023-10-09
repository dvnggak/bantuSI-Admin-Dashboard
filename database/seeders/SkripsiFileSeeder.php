<?php

namespace Database\Seeders;

use App\Models\Skripsi_File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkripsiFileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Skripsi_File::create([
            'title' => 'File 1',
            'description' => 'File 1',
            'file' => 'surat-syarat-skripsi.pdf',
        ]);
    }
}
