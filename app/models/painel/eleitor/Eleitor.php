<?php

namespace App\models\painel\eleitor;

use Illuminate\Database\Eloquent\Model;

class Eleitor extends Model
{
    //
    protected $table        = 'tbeleitor';
    protected $primaryKey   = 'idEleitor';

    //Informa quais os campos podem ser inseridos no banco
    protected $fillable = [
        'nomeEleitor',
        'sobrenomeEleitor',
        'cpfEleitor',
        'dataNascEleitor',
        'sexoEleitor'
    ];

    public function votou(){
        return $this->hasOne('App\models\sisvoto\Votou', 'tbEleitor_idEleitor');
    }
}
