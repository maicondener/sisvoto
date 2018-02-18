<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEleicaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbEleicao', function (Blueprint $table) {
            $table->increments('idEleicao');
            $table->string('nomeEleicao');
            $table->integer('ativaEleicao')->default(1);
            $table->date('dataInicioEleicao');
            $table->time('horaInicioEleicao');
            $table->date('dataFimEleicao');
            $table->time('horaFimEleicao');
            $table->integer('zeressimaEleicao')->default(0);
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
        Schema::dropIfExists('tbEleicao');
    }
}
