<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanSiswa extends Model
{
    use HasFactory;

    protected $table = 'reports'; // Pastikan tabel sesuai dengan yang dibuat di migrasi

    protected $fillable = [
        'nama_file',
        'file_path',
        'status',
    ];

    /**
     * Scope untuk mengambil laporan yang sudah dikirim.
     */
    public function scopeTerkirim($query)
    {
        return $query->where('status', 'terkirim');
    }

    /**
     * Scope untuk mengambil laporan yang belum dikirim.
     */
    public function scopeBelumDikirim($query)
    {
        return $query->where('status', 'belum dikirim');
    }
}
