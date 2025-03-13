<?php

use App\Models\PengajuanSiswa;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('status_siswas', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(PengajuanSiswa::class,'pengajuan_siswa_id');
            $table->string('nama_siswa');
            $table->string('kelas');
            $table->string('nama_perusahaan');
            $table->string('posisi_magang');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->boolean('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('status_siswas');
    }
};
