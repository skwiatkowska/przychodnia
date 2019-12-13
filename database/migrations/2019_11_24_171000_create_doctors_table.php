<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_usr')->unique();
            $table->string('imie');
            $table->string('specjalizacja');
            $table->string('tytul');
            $table->string('nazwisko');
            $table->unsignedInteger('gabinet');
            $table->unsignedInteger('telefon');
            $table->string('email');
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
        Schema::dropIfExists('doctors');

    }
}
