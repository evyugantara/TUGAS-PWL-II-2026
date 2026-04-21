<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mahasiswa')->insert([
    [
        'npm' => 'M001',
        'nidn' => 'D001',
        'nama' => 'Andi Pratama',
        'created_at' => now(),
        'updated_at' => now()
    ],
    [
        'npm' => 'M002',
        'nidn' => 'D002',
        'nama' => 'Rina Sari',
        'created_at' => now(),
        'updated_at' => now()
    ]
]);
    }
}
