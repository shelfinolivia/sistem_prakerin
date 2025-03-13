<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('pengajuan_siswa', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class,'siswa_id');
            $table->string('nama_siswa');
            $table->string('kelas');
            $table->string('nama_perusahaan');
            $table->string('posisi_magang');
            $table->enum('status', ['pending', 'diterima', 'ditolak'])->default('pending');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pengajuan_siswa');
    }
};
