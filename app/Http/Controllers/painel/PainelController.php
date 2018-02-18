<?php

namespace App\Http\Controllers\painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\painel\eleicao\Eleicao;
use App\models\painel\candidato\Candidato;
use App\models\painel\eleitor\Eleitor;
use Redirect;

class PainelController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    //Retorna a eleição que está ativa no sistema
    public function getEleicao(){
        $eleicao = Eleicao::get();
        $eleicaoAtiva = null;
        foreach($eleicao as $e){
            if($e->ativaEleicao == 1){
                $eleicaoAtiva = $e; //Passa todos os dados da eleição que está ativa
            }
        }
        return $eleicaoAtiva;
    }

    public function index(){
        $eleicao = $this->getEleicao();
        return view('painel.painel', compact('eleicao'));
    }
}
