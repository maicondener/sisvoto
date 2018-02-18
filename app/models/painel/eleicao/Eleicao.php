<?php

namespace App\models\painel\eleicao;

use Illuminate\Database\Eloquent\Model;

class Eleicao extends Model
{
    //
    protected $table      = 'tbeleicao';
    protected $primaryKey = 'idEleicao';

    protected $fillable = [
        'nomeEleicao',
        'ativaEleicao',
        'dataInicioEleicao',
        'horaInicioEleicao',
        'dataFimEleicao',
        'horaFimEleicao',
        'zeressimaEleicao'
    ];

    public function voto(){
        return $this->hasOne('App\models\sisvoto\Voto', 'tbEleicao_idEleicao');
    }

}
