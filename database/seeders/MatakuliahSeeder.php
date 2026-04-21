<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MatakuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('matakuliah')->insert([
    [
        'kode_matakuliah' => 'MK001',
        'nama_matakuliah' => 'Pemrograman Web',
        'sks' => 3,
        'created_at' => now(),
        'updated_at' => now()
    ],
    [
        'kode_matakuliah' => 'MK002',
        'nama_matakuliah' => 'Basis Data',
        'sks' => 3,
        'created_at' => now(),
        'updated_at' => now()
    ]
]);
    }
}
