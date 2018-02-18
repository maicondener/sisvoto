<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEleitorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbEleitor', function (Blueprint $table) {
            $table->increments('idEleitor');
            $table->string('nomeEleitor');
            $table->string('sobrenomeEleitor');
            $table->string('cpfEleitor', 11);
            $table->date('dataNascEleitor');
            $table->string('sexoEleitor', 1);
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
        Schema::dropIfExists('tbEleitor');
    }
}
