<?php

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
    Schema::create('pengajuan_magangs', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Jika ada relasi ke tabel users
        $table->string('perusahaan');
        $table->string('posisi');
        $table->date('tanggal_mulai');
        $table->date('tanggal_selesai');
        $table->text('alasan');
        $table->enum('status', ['pending', 'diterima', 'ditolak'])->default('pending');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan-_magangs');
    }
};
