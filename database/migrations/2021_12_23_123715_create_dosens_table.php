<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateDosensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dosens', function (Blueprint $table) {
            $table->id();
            // $table->id()->unsigned();
            $table->string('nama_dosen',50);
            $table->string('alamat_dosen',100);
            $table->string('hp',15);
            $table->string('email',50);
            $table->string('password');
            $table->timestamps();
        });

        // DB::update("ALTER TABLE dosens AUTO_INCREMENT = 142011513001;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dosens');
    }
}
