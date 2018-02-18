<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbCandidatos', function (Blueprint $table) {
            $table->increments('idCandidatos');
            $table->string('nomeCandidatos');
            $table->string('apelidoCandidatos')->nullable();
            $table->string('cpfCandidatos', 11);
            $table->integer('numCandidatos');
            $table->string('fotoCandidatos', 200)->nullable();
            $table->integer('tbPartidos_idPartidos')->unsigned();
            $table->foreign('tbPartidos_idPartidos')->references('idPartidos')->on('tbPartidos');
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
        Schema::dropIfExists('tbCandidatos');
    }
}
