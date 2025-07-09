<?php

namespace App\Services;

use App\Models\Karyawan;
use Carbon\Carbon;

class ManfaatPensiunService
{
    public function hitung(Karyawan $karyawan, $jenis, $metode, $kenaikan)
    {
        $tanggalMasuk = Carbon::parse($karyawan->tanggal_masuk);
        $tanggalBerhenti = $karyawan->tanggal_berhenti
            ? Carbon::parse($karyawan->tanggal_berhenti)
            : Carbon::now();

        // Masa kerja dalam tahun desimal (6 angka di belakang koma)
        $masaKerja = round($tanggalMasuk->diffInDays($tanggalBerhenti) / 365, 6);

        $phdp = $karyawan->phdp;
        $jabatan = $karyawan->jabatan;

        $mp = 2.5 * $masaKerja * $phdp;
        $maksimum = 0.8 * $phdp;
        $total = $mp + $kenaikan;

        if ($jenis === 'normal' && $metode === 'bulanan') {
            $hasil = min($total, $maksimum);

            return [
                'masa_kerja' => $masaKerja,
                'mp' => $mp,
                'kenaikan' => $kenaikan,
                'maksimum' => $maksimum,
                'hasil' => $hasil,
            ];
        }

        if ($jenis === 'normal' && $metode === 'sekaligus') {
            $hasil = $mp * 12;

            return [
                'masa_kerja' => $masaKerja,
                'mp' => $mp,
                'kenaikan' => 0,
                'maksimum' => null,
                'hasil' => $hasil,
            ];
        }

        return [
            'masa_kerja' => $masaKerja,
            'mp' => 0,
            'kenaikan' => 0,
            'maksimum' => null,
            'hasil' => 0,
        ];
    }
}
