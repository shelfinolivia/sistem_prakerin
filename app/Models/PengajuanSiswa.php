<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanSiswa extends Model
{
    use HasFactory;

    protected $table = 'pengajuan_siswa';

    protected $fillable = [
        'nama_siswa',
        'kelas',
        'nama_perusahaan',
        'posisi_magang',
        'status',
    ];
}
