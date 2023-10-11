<?php

namespace Database\Seeders;

use App\Models\Skripsi_Pengumuman;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkripsiPengumumanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Skripsi_Pengumuman::create([
            'title' => 'Pengumuman 1',
            'description' => 'Pengumuman 1',
            'file' => 'surat-pengumuman-skripsi.pdf',
        ]);
    }
}
