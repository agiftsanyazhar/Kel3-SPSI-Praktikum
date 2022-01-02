<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBimbingansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bimbingans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nid')->constrained('dosens');
            $table->foreignId('nim')->constrained('mahasiswas');
            $table->date('tgl_konsultasi')->default(date("Y-m-d"));
            $table->text('materi_konsultasi');
            $table->string('status_bimbingan',50);
            $table->string('bukti_bimbingan');
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
        Schema::dropIfExists('bimbingans');
    }
}
