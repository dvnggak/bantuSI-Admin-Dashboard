<?php

namespace Database\Seeders;

use App\Models\InternshipGuide;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InternshipGuideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        InternshipGuide::create([
            'code' => 'Si001',
            'title' => 'Ini Panduan Kp',
            'desc' => 'lorem ipsum dolor sit amet',
            'file' => 'https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf',
        ]);
    }
}
