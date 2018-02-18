<?php

namespace App\Http\Controllers\painel\eleitor;

use App\models\painel\eleitor\Eleitor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Redirect;

class EleitorController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $eleitores = Eleitor::get();

        return view('painel.eleitor.eleitorLista', ['eleitores' => $eleitores]);
    }

    public function novoEleitor(){
        return view('painel.eleitor.eleitorForm');
    }

    public function salvarEleitor(Request $req){
        $eleitor = new Eleitor();
        $eleitor->create($req->all());
        //Passa Mensagem de cadastrado com sucesso
        \Session::flash('mensagem_sucesso', 'Eleitor cadastrado com sucesso!');
        return Redirect::to('admin/eleitor/novo');
    }

    public function editarEleitor($idEleitor){

        $eleitor = Eleitor::findOrFail($idEleitor);

        //Retorna para a view o eleitor selecionado
        return view('painel.eleitor.eleitorForm', ['eleitor' => $eleitor]);
    }

    public function atualizarEleitor($idEleitor, Request $req){
        
        //Verifica se existe o id passado
        $eleitor = Eleitor::findOrFail($idEleitor);

        $eleitor->update($req->all());

        \Session::flash('mensagem_sucesso', 'Eleitor atualizado com sucesso!');

        return Redirect::to('admin/eleitor/'.$eleitor->idEleitor.'/editar');
    }

    public function excluirEleitor($idEleitor){
        
        //Verifica se existe o id passado
        $eleitor = Eleitor::findOrFail($idEleitor);

        $eleitor->delete();

        \Session::flash('mensagem_sucesso', 'Eleitor excluído com sucesso!');

        $eleitores = Eleitor::get();
        return view('painel.eleitor.eleitorLista', ['eleitores' => $eleitores]);
    }
}
