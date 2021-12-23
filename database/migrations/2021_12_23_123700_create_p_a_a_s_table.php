<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePAASTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_a_a_s', function (Blueprint $table) {
            $table->id();
            $table->string('nama_paa',50);
            $table->string('alamat_paa',100);
            $table->string('hp',15);
            $table->string('email',50);
            $table->string('password');
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
        Schema::dropIfExists('p_a_a_s');
    }
}
