<?php
// database/migrations/xxxx_xx_xx_xxxxxx_create_peminjaman_ruangan_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeminjamanRuanganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjaman_ruangan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_ruangan');
            $table->date('tanggal_peminjaman');
            $table->time('waktu_mulai');
            $table->time('waktu_selesai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peminjaman_ruangan');
    }
}
