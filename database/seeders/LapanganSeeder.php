<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Lapangan;

class LapanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Lapangan::create([
            'nama' => 'Lapangan 1',
        ]);

        Lapangan::create([
            'nama' => 'Lapangan 2',
        ]);

        // Anda bisa menambahkan lebih banyak data lapangan di sini
    }
}
