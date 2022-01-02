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
            $table->foreignId('nid')->constrained('dosens');
            $table->foreignId('nim')->constrained('mahasiswas');
            $table->date('tgl_daftar_sidang')->default(date("Y-m-d"));
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
