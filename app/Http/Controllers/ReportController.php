<?php

namespace App\Http\Controllers;

use App\Models\Report; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{
    public function showForm()
    {
        $reports = Report::all(); // Mengambil semua laporan dari database
        return view('report.upload', compact('reports')); // Mengirimkan $reports ke view
    }

    public function upload(Request $request)
    {
        $request->validate([
            'report' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $file = $request->file('report');
        $fileName = time() . '_' . $file->getClientOriginalName(); // Generate nama unik
        $path = $file->storeAs('reports', $fileName, 'public'); // Simpan ke storage

        // Simpan ke database
        Report::create([
            'nama_file' => $fileName, // Simpan nama file
            'file_path' => $path,
            'status' => 'belum dikirim', // Default status
        ]);

        return redirect()->route('report.form')->with('success', 'Laporan berhasil diunggah.');
    }
    
    public function delete($id)
    {
        $report = Report::findOrFail($id);

        // Hapus file dari storage
        Storage::delete('public/' . $report->file_path);

        // Hapus dari database
        $report->delete();

        return redirect()->route('report.form')->with('success', 'Laporan berhasil dihapus.');
    }

    public function send($id)
    {
        $report = Report::findOrFail($id);

        // Update status laporan
        $report->update(['status' => 'terkirim']);

        return redirect()->route('report.form')->with('success', 'Laporan berhasil dikirim.');
    }
}
