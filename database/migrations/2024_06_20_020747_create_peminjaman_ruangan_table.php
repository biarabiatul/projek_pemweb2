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
            $table->foreignId('ruangan_id')->constrained('ruangan')->onDelete('cascade');
            $table->integer('jumlah_peserta');
            $table->string('nama_kegiatan', 50);
            $table->timestamp('waktu_mulai');
            $table->timestamp('waktu_selesai');
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending'); // Menambahkan default 'pending'
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('peminjaman_ruangan');
    }
}
