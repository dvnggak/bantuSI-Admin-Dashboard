<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // $this->call(FilesSeeder::class);
        // $this->call(PaymentGuideSeeder::class);
        // $this->call(PaymentScheduleSeeder::class);
        // $this->call(MajoringProfileSeeder::class);
        // $this->call(LecturersSeeder::class);
        // $this->call(InternshipRequisiteSeeder::class);
        // $this->call(InternshipGuideSeeder::class);
        // $this->call(SkripsiRequisiteSeeder::class);
        $this->call(SkripsiGuideSeeder::class);
    }
}
