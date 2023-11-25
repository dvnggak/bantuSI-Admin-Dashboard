<?php

namespace Database\Seeders;

use App\Models\Students;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Students::create([
            'nim' => '2020210005',
            'name' => 'Devangga Kertawijaya',
            'email' => '2020210005@students.uigm.ac.id',
            'phone_number' => '081234567890',
            'first_name' => 'Devangga',
            'last_name' => 'Kertawijaya',
            'gender' => 'Laki-laki',
            'batch' => '2020',
            'faculty' => 'Fakultas Ilmu Komputer',
            'study_program' => 'Sistem Informasi',
        ]);
    }
}
