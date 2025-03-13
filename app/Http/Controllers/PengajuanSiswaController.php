<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PengajuanSiswa;
use App\Models\StatusSiswa;

class PengajuanSiswaController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nama_siswa' => 'required|string',
            'kelas' => 'required|string',
            'nama_perusahaan' => 'required|string',
            'posisi_magang' => 'required|string',
        ]);

        PengajuanSiswa::create([
            'nama_siswa' => $request->nama_siswa,
            'kelas' => $request->kelas,
            'nama_perusahaan' => $request->nama_perusahaan,
            'posisi_magang' => $request->posisi_magang,
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Pengajuan berhasil dikirim.');
    }

    public function updateStatus(Request $request, $id, $status)
    {
        $pengajuan = PengajuanSiswa::findOrFail($id);
        $pengajuan->update(['status' => $status]);

        if ($status === 'diterima') {
            $request->validate([
                'tanggal_mulai' => 'required|date',
                'tanggal_selesai' => 'required|date|after:tanggal_mulai',
            ]);

            StatusSiswa::create([
                'pengajuan_siswa_id' => $pengajuan->id,
                'nama_siswa' => $pengajuan->nama_siswa,
                'kelas' => $pengajuan->kelas,
                'nama_perusahaan' => $pengajuan->nama_perusahaan,
                'posisi_magang' => $pengajuan->posisi_magang,
                'tanggal_mulai' => $request->tanggal_mulai,
                'tanggal_selesai' => $request->tanggal_selesai,
                'status' => 'aktif',
            ]);
        }

        return redirect()->back()->with('success', 'Status berhasil diperbarui.');
    }
}
