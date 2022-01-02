<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenjadwalanSidangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjadwalan__sidangs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_nilai')->constrained('nilais');
            $table->string('dosen_penguji1',50);
            $table->string('dosen_penguji2',50);
            $table->string('dosen_penguji3',50);
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
        Schema::dropIfExists('penjadwalan__sidangs');
    }
}
