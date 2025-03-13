<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusSiswa extends Model
{
    use HasFactory;

    protected $table = 'status_siswas'; // Pastikan sesuai dengan nama tabel

    protected $fillable = [
        'pengajuan_siswa_id', // ✅ Tambahkan ini
        'nama_siswa',
        'kelas',
        'nama_perusahaan',
        'posisi_magang',
        'tanggal_mulai',
        'tanggal_selesai',
        'status',
    ];
}
