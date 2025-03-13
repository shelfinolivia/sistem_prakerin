<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanMagang extends Model
{
    use HasFactory;

    protected $table = 'pengajuan_magangs';

    protected $fillable = [
        'siswa_id',
        'nama_perusahaan',
        'posisi',
        'tanggal_mulai',
        'tanggal_selesai',
        'alasan',
        'status',
    ];

    // Relasi dengan tabel users (jika ada)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
