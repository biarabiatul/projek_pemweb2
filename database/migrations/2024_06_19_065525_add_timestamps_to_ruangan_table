<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTimestampsToRuanganTable extends Migration
{
    public function up()
    {
        Schema::table('ruangan', function (Blueprint $table) {
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::table('ruangan', function (Blueprint $table) {
            $table->dropTimestamps();
        });
    }
}
