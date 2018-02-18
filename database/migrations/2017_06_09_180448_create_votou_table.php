<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVotouTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbVotou', function (Blueprint $table) {
            $table->increments('idVotou');
            $table->integer('confirmaVotou')->default(1);
            $table->integer('tbEleitor_idEleitor')->unsigned();
            $table->foreign('tbEleitor_idEleitor')->references('idEleitor')->on('tbEleitor')->onDelete('cascade');
            $table->integer('tbEleicao_idEleicao')->unsigned();
            $table->foreign('tbEleicao_idEleicao')->references('idEleicao')->on('tbEleicao')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbVotou');
    }
}
