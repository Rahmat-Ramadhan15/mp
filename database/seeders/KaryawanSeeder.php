<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('karyawans')->insert([
            [
                'nama' => 'Andi',
                'jabatan' => 'pegawai',
                'phdp' => 5000000,
                'tanggal_masuk' => '2000-01-01',
                'tanggal_berhenti' => '2025-01-01',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Budi',
                'jabatan' => 'direksi',
                'phdp' => 10000000,
                'tanggal_masuk' => '1995-06-01',
                'tanggal_berhenti' => '2024-06-30',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
