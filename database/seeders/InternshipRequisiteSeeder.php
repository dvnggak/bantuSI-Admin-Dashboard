<?php

namespace Database\Seeders;

use App\Models\InternshipRequisite;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InternshipRequisiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        InternshipRequisite::create([
            'code' => 'IR01',
            'title' => 'Syarat Skripsi',
            'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla euismod, nisl eget ultricies ultrices, nunc nisl aliquet nunc, eget aliquam nisl nunc vitae nunc. Sed vitae nisl eget nisl aliquam aliquet. Sed vitae nisl eget nisl aliquam aliquet.',
            'link' => 'https://drive.google.com/f',
        ]);
    }
}
