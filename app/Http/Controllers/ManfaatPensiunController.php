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

        $hasil = (new ManfaatPensiunService())->hitung(
            $karyawan,
            $request->jenis,
            $request->metode,
            (int) $request->kenaikan
        );

        $pdf = Pdf::loadView('mp.hasil', compact('karyawan', 'hasil'));
        return $pdf->stream('manfaat-pensiun.pdf');
    }
}
