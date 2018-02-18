<?php

namespace App\models\sisvoto;

use Illuminate\Database\Eloquent\Model;

class Voto extends Model
{
    //
    protected $table        = 'tbvotos';
    protected $primaryKey   = 'idVotos';
    public $timestamps   = false;

    protected $fillable     = [
        'tbEleicao_idEleicao',
        'tbCandidatos_idCandidatos'
    ];

    public function candidato(){
        return $this->hasOne('App\models\painel\candidato\Candidato', 'tbCandidatos_idCandidatos', 'idCandidatos');
    }

    public function eleicao(){
        return $this->hasOne('App\models\painel\eleicao\Eleicao', 'tbEleicao_idEleicao', 'idEleicao');
    }
}
