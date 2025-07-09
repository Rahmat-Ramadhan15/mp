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
                'tanggal_masuk' => Carbon::create(2000, 1, 10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Budi',
                'jabatan' => 'direksi',
                'phdp' => 10000000,
                'tanggal_masuk' => Carbon::create(1995, 6, 20),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
