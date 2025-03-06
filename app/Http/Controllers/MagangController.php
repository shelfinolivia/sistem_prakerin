<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MagangController extends Controller
{
    public function ajukan(Request $request)
    {
        // Validasi input
        $request->validate([
            'company' => 'required|string|max:255',
        ]);

        // Simpan pengajuan ke database atau lakukan aksi lain
        return redirect()->back()->with('success', 'Pengajuan magang berhasil dikirim.');
    }
}
