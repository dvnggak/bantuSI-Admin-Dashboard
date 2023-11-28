<?php

namespace Database\Seeders;

use App\Models\Announcements;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnnouncementsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Announcements::create([
            'code' => 'SI012',
            'title' => 'Ini pengumumaan terbaru',
            'date' => '2023-11-27',
            'category' => 'Perkuliahan',
            'publisher' => 'Admin',
            'desc' => 'ini pengumuman mengenai skripsi',
            'link' => 'https://drive.google.com/drive/folders/1-2-3-4-5-6-7-8-9-0',
        ]);
    }
}
