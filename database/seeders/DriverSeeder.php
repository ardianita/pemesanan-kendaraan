<?php

namespace Database\Seeders;

use App\Models\Driver;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DriverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $drivers = [
            [
                'name' => 'Lukman',
                'gender' => 'Laki-laki'
            ],
            [
                'name' => 'Fadil',
                'gender' => 'Laki-laki'
            ],
            [
                'name' => 'Lala',
                'gender' => 'Perempuan'
            ],
        ];

        foreach ($drivers as $driver) {
            Driver::create($driver);
        }
    }
}
