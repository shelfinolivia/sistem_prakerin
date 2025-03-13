<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\StatusSiswa;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil semua laporan dari database
        $reports = Report::all(); 
        $dataSiswa = StatusSiswa::where('pengajuan_siswa_id',Auth::user()->id)->first();
        return view('dashboard', ['reports' => $reports,'dataSiswa' => $dataSiswa]);
    }
    
}


