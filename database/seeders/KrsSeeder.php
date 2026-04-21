<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KrsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('krs')->insert([
    [
        'npm' => 'M001',
        'kode_matakuliah' => 'MK001',
        'created_at' => now(),
        'updated_at' => now()
    ],
    [
        'npm' => 'M002',
        'kode_matakuliah' => 'MK002',
        'created_at' => now(),
        'updated_at' => now()
    ]
]);
    }
}
