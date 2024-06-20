<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeminjamanRuanganTable extends Migration
{
    public function up()
    {
        Schema::create('peminjaman_ruangan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_peminjam', 50);
            $table->integer('jumlah_peserta');
            $table->string('nama_kegiatan', 50);
            $table->timestamp('waktu_mulai');
            $table->timestamp('waktu_selesai');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('peminjaman_ruangan');
    }
}
