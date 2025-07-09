<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;
use Carbon\Carbon;

class KaryawanController extends Controller
{
    public function index()
    {
        $karyawan = Karyawan::all();

        // Hitung masa kerja secara dinamis
        foreach ($karyawan as $k) {
            $masuk = Carbon::parse($k->tanggal_masuk);
            $berhenti = $k->tanggal_berhenti ? Carbon::parse($k->tanggal_berhenti) : Carbon::now();
            $k->masa_kerja = $masuk->diffInYears($berhenti); // tambahkan properti sementara
        }

        return view('karyawan.index', compact('karyawan'));
    }
}
