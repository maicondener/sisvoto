<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbVotos', function (Blueprint $table) {
            $table->increments('idVotos');
            $table->integer('tbEleicao_idEleicao')->unsigned();
            $table->foreign('tbEleicao_idEleicao')->references('idEleicao')->on('tbEleicao')->onDelete('cascade');
            $table->integer('tbCandidatos_idCandidatos')->unsigned();
            $table->foreign('tbCandidatos_idCandidatos')->references('idCandidatos')->on('tbCandidatos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbVotos');
    }
}
