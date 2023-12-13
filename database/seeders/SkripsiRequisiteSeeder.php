<?php

namespace Database\Seeders;

use App\Models\SkripsiRequisite;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkripsiRequisiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SkripsiRequisite::create([
            'code' => 'Si001',
            'title' => 'Judul Syarat Skripsi',
            'desc' => 'Deskripsi Syarat Skripsi',
            'link' => 'https://drive.google.com/ini-link-nya',
        ]);
    }
}
