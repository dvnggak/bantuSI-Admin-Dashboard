<?php

namespace Database\Seeders;

use App\Models\Lecturers;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LecturersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Lecturers::create([
            'nik' => '1999010011',
            'nidn' => '0212087601',
            'name' => 'Nining Ariati, S.Kom., M.Kom.',
            'gender' => 'Perempuan',
            'university' => 'Universitas Indo Global Mandiri',
            'faculty' => 'Fakultas Ilmu Komputer & Sains',
            'study_program' => 'Sistem Informasi',
            'functional_position' => 'Lektor',
            'employment_status' => 'Aktif',
            'highest_education' => 'S2',
            'status' => 'Dosen Tetap',
            'email' => 'nining@uigm.ac.id',
            'phone_number' => '085379279976',
        ]);
    }
}
