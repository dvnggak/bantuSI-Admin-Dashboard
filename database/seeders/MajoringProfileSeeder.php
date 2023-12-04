<?php

namespace Database\Seeders;

use App\Models\MajoringProfile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MajoringProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MajoringProfile::create([
            'majoring' => 'Sistem Informasi',
            'faculty' => 'Fakultas Ilmu Komputer & Sains',
            'university' => 'Universitas Indo Global Mandiri',
            'program_type' => 'Undergraduate Program',
            'accreditation' => 'B',
            'study_time' => '8 Semester',
            'vision' => 'Become an Information Systems Study Program that produces Professional Human Resources to Fill and Create Job Opportunities in 2023.',
            'mission' => 'Providing teaching and learning quality process to produce graduates who are professional and competent in the sector of Information Systems.',
            'student_competence' => 'Information System Analyst, Database Administrator',
            'description' => 'The Information Systems Study Program is a study program that studies the use of information technology in an organization.',
        ]);
    }
}
