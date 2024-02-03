<?php

namespace Database\Seeders;

use App\Models\Pemesanan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PemesananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pemesanan::create([
            'pemesan' => 'Nita',
            'jenis_kendaraan' => 'Mobil',
            'driver' => 'Lukman',
        ]);
    }
}
