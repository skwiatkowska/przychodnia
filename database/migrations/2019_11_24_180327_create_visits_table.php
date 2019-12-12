<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visits', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_lekarza');
            $table->unsignedInteger('id_pacjenta');
            $table->date('rok_miesiac_dzien');
            $table->string('godzina_minuta');
            $table->timestamps();

            $table->foreign('id_lekarza')->references('id')->on('doctors');
            $table->foreign('id_pacjenta')->references('id_usr')->on('patients');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visits');
    }
}
