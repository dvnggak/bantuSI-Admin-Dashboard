<?php

namespace Database\Seeders;

use App\Models\Subjects;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Subjects::create([
            'subject_code' => 'IF-101',
            'subject_name' => 'Pemrograman Dasar',
            'subject_type' => 'Kelas Reguler',
            'subject_credit' => '4',
            'subject_lecturer' => 'Pak Budi',
            'subject_day' => 'Senin',
            'subject_time' => '08:00 - 10:00',
            'subject_enrollment_code' => 'IF-101',
            'subject_enrollment_link' => 'https://classroom.google.com/c/MTYxMjQwNjY5NjQ0',
            'subject_group_link' => 'https://classroom.google.com/c/MTYxMjQwNjY5NjQ0',
        ]);
    }
}
