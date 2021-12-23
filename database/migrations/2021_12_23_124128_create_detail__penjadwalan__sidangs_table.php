<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPenjadwalanSidangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail__penjadwalan__sidangs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_sidang')->constrained('penjadwalan__sidangs');
            $table->foreignId('id_daftar_sidang')->constrained('pendaftaran__sidangs');
            $table->date('tgl_sidang')->default(date("Y-m-d"));
            $table->string('ruang_sidang',50);
            $table->time('jam_sidang');
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
        Schema::dropIfExists('detail__penjadwalan__sidangs');
    }
}
