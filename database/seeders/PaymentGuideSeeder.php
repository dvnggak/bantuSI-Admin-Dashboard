<?php

namespace Database\Seeders;

use App\Models\PaymentGuide;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentGuideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PaymentGuide::create([
            'title' => 'Panduan Pembayaran SPP',
            'desc' => 'Panduan pembayaran SPP',
            'category' => 'Reguler',
            'batch' => '2023',
            'year' => '2020',
            'link' => 'https://drive.google.com/drive/folders/1-2-3-4-5-6-7-8-9-0',
        ]);
    }
}
