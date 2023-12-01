<?php

namespace Database\Seeders;

use App\Models\PaymentSchedule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PaymentSchedule::create([
            'title' => 'Panduan Pembayaran SPP',
            'publisher' => 'Rektor Universitas Indo Global Mandiri',
            'recipient' => 'Mahasiswa/i UIGM Angkatan 2023 Kelas Reguler',
            'batch' => 'Tahap II',
            'start_date' => '2020-12-01',
            'end_date' => '2020-12-31',
            'desc' => 'Ini jadwal pembayaran SPP',
            'link' => 'https://drive.google.com/drive/folders/1-2-3-4-5-6-7-8-9-0',
        ]);
    }
}
