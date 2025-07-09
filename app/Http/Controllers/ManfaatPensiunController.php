<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;
use App\Services\ManfaatPensiunService;
use Barryvdh\DomPDF\Facade\Pdf;

class ManfaatPensiunController extends Controller
{
    public function form($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        return view('mp.form', compact('karyawan'));
    }

    public function hitung(Request $request)
    {
        $karyawan = Karyawan::findOrFail($request->karyawan_id);

        // Set tanggal berhenti ke hari ini (selalu diperbarui setiap hitung MP)
        $karyawan->tanggal_berhenti = now();
        $karyawan->save(); // Simpan perubahan ke database

        // Hitung manfaat pensiun
        $hasil = (new ManfaatPensiunService())->hitung(
            $karyawan,
            $request->jenis,
            $request->metode,
            $request->kenaikan
        );

        // Generate PDF hasil perhitungan
        $pdf = PDF::loadView('mp.hasil', compact('karyawan', 'hasil'));
        return $pdf->stream('manfaat-pensiun.pdf');
    }
}
