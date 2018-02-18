<?php

namespace App\models\painel\candidato;

use Illuminate\Database\Eloquent\Model;

class Candidato extends Model
{
    //
    protected $table        = 'tbcandidatos';
    protected $primaryKey   = 'idCandidatos';

    protected $fillable = [
        'nomeCandidatos',
        'apelidoCandidatos',
        'cpfCandidatos',
        'numCandidatos',
        'fotoCandidatos',
        'tbPartidos_idPartidos'
    ];


    public function partido(){
        return $this->belongsTo('App\models\painel\partido\Partido', 'tbPartidos_idPartidos', 'idPartidos'); //Um candidato pertence a um partido
    }

    public function voto(){
        return $this->hasMany('App\models\sisvoto\Voto', 'tbCandidatos_idCandidatos');
    }

}
