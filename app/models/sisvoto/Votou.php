<?php

namespace App\models\sisvoto;

use Illuminate\Database\Eloquent\Model;

class Votou extends Model
{
    //
    protected $table        = 'tbvotou';
    protected $primaryKey   = 'idVotou';
    public $timestamps   = false;

    protected $fillable     = [
        'tbEleitor_idEleitor',
        'tbEleicao_idEleicao'
    ];

    public function eleitor(){
        return $this->hasOne('App\models\eleitor\Eleitor', 'tbEleitor_idEleitor', 'idEleitor');
    }

    public function eleicao(){
        return $this->hasOne('App\models\eleicao\Eleicao', 'tbEleicao_idEleicao', 'idEleicao');
    }
}
