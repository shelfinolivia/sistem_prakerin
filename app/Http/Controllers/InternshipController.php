<?php
namespace App\Http\Controllers;

use App\Models\StatusSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InternshipController extends Controller
{
    public function create()
    {
        return view('internship.ajukan'); // Mengarah ke internship/ajukan.blade.php
    }

    public function apply(Request $request)
    {
        return redirect()->route('internship.status')->with('success', 'Pengajuan magang berhasil dikirim.');
    }
    
    public function status()
    {
        $dataSiswa = StatusSiswa::where('pengajuan_siswa_id',Auth::user()->id)->first();
        return view('internship.status',['dataStatus' => $dataSiswa]); // Mengarah ke internship/status.blade.php
    }                                                                                                                                   
}