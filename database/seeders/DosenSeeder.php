<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('dosen')->insert([
    [
        'nidn' => 'D001',
        'nama' => 'Budi Santoso',
        'created_at' => now(),
        'updated_at' => now()
    ],
    [
        'nidn' => 'D002',
        'nama' => 'Siti Aminah',
        'created_at' => now(),
        'updated_at' => now()
    ]
]);
    }
}
