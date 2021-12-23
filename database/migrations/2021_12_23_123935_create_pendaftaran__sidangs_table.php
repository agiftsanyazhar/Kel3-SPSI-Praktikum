<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendaftaranSidangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftaran__sidangs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_paa')->nullable();
            $table->foreignId('id_dosen')->nullable();
            $table->foreignId('id_mahasiswa')->nullable();
            $table->timestamp('tgl_daftar_sidang')->default(date("Y-m-d"));
            $table->string('dosen_pembimbing',50);
            $table->boolean('aktif')->default(1);
            $table->string('proposal');
            $table->string('khs');
            $table->string('toefl');

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
        Schema::dropIfExists('pendaftaran__sidangs');
    }
}
