<?php

namespace App\Http\Controllers\painel\eleicao;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\painel\eleicao\Eleicao;
use App\models\painel\candidato\Candidato;
use Redirect;

class EleicaoController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    //Inverter a data para o padrão brasileiro
    public function getDataExplode($idEleicao, $nomeColuna){
        $eleicao = Eleicao::findOrFail($idEleicao);
        $dataEleicao = $eleicao->$nomeColuna;
        $dataExplode = explode("-", $dataEleicao);
        return $dataExplode[2]."/".$dataExplode[1]."/".$dataExplode[0];
    }

    public function index(){
        $eleicao = Eleicao::get();
        return view('painel.eleicao.eleicaoLista', compact('eleicao'));
    }

    public function novaEleicao(){
        return view('painel.eleicao.eleicaoForm');
    }

    public function salvarEleicao(Request $req){
        $eleicao = new Eleicao();
        $eleicao->create($req->all());
        \Session::flash('mensagem_sucesso', 'Eleição cadastrada com sucesso');
        return Redirect::to( route('eleicaoNovo') );
    }

    public function editarEleicao($idEleicao){
        $eleicao = Eleicao::findOrFail($idEleicao);
        $candidatos = Candidato::get();
        return view('painel.eleicao.eleicaoForm', compact('eleicao', 'candidatos'));
    }

    public function atualizarEleicao($idEleicao, Request $req){
        $eleicao = Eleicao::findOrFail($idEleicao);
        $eleicao->update($req->all());
        \Session::flash('mensagem_sucesso', 'Dados da eleição atualizados com sucesso');
        return Redirect::to('admin/eleicao/'.$eleicao->idEleicao.'/editar');
    }

    public function excluirEleicao($idEleicao){
        $eleicao = Eleicao::findOrFail($idEleicao);
        $eleicao->delete();
        \Session::flash('mensagem_sucesso', 'Eleição excluída com sucesso');
        $eleicao = Eleicao::get();
        return view('painel.eleicao.eleicaoLista', compact('eleicao'));
    }
    
    
}
