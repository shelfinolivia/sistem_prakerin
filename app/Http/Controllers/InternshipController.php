<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;

// class InternshipController extends Controller
// {
//     // Menampilkan halaman pengajuan magang
//     public function create()
//     {
//         return view('internship.ajukan'); // Pastikan file Blade ini ada
//     }

//     // Menyimpan pengajuan magang
//     public function apply(Request $request)
//     {
//         // Simpan aplikasi magang ke database (contoh)
//         return redirect()->route('dashboard')->with('success', 'Aplikasi magang berhasil dikirim.');
//     }

//     // Menampilkan status magang
//     public function status()
//     {
//         return view('internship.status'); // Pastikan file Blade ini ada
//     }
// }

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InternshipController extends Controller
{
    public function create()
    {
        return view('internship.ajukan'); // Mengarah ke internship/ajukan.blade.php
    }

    public function apply(Request $request)
    {
        // Simpan data pengajuan magang ke database (contoh)
        return redirect()->route('internship.status')->with('success', 'Pengajuan magang berhasil dikirim.');
    }

    public function status()
    {
        return view('internship.status'); // Mengarah ke internship/status.blade.php
    }
}