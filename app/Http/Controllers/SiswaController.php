<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function dashboard() {
        return view('siswa.dashboard');
    }

    public function ajukanMagang() {
        return view('siswa.ajukan-magang');
    }

    public function statusPengajuan() {
        return view('siswa.status-pengajuan');
    }

    public function unggahLaporan() {
        return view('siswa.unggah-laporan');
    }
}
