<?php

namespace Database\Seeders;

use App\Models\Transportation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransportationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $transportations = [
            [
                'type' => 'motor',
                'name' => 'Honda Suzuku',
            ],
            [
                'type' => 'mobil',
                'name' => 'Xenua',
            ],
        ];

        foreach ($transportations as $transportation) {
            Transportation::create($transportation);
        }
    }
}
