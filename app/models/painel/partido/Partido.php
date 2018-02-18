<?php

namespace App\models\painel\partido;

use Illuminate\Database\Eloquent\Model;

class Partido extends Model
{
    //
    protected $table        = 'tbpartidos';
    protected $primaryKey   = 'idPartidos';

    protected $fillable = [
        'nomePartidos',
        'siglaPartidos'
    ];


    public function candidato(){
        return $this->hasMany('App\models\painel\candidato\Candidato', 'tbPartidos_idPartidos'); //Um partido possue muitos candidatos
    }

}
