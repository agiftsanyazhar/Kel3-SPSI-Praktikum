<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('paas', function (Blueprint $table) {
            $table->id();
            // $table->id()->unsigned();
            $table->string('nama_paa',50);
            $table->string('alamat_paa',100);
            $table->string('hp',15);
            $table->string('email',50);
            $table->string('password');
            $table->timestamps();
        });

        // DB::update("ALTER TABLE paas AUTO_INCREMENT = 132011513001;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paas');
    }
}
