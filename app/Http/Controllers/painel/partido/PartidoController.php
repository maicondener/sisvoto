<?php

namespace App\Http\Controllers\painel\partido;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\painel\partido\Partido;
use Redirect;

class PartidoController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $partidos = Partido::get();
        return view('painel.partido.partidoLista', ['partidos' => $partidos]);      
    }

    public function novoPartido(){
        return view('painel.partido.partidoForm');
    }

    public function salvarPartido(Request $req){
        $partido = new Partido();
        $partido->create($req->all());        
        \Session::flash('mensagem_sucesso', 'Partido inserido com sucesso');
        return Redirect::to(route('partidoNovo'));
    }

    public function editarPartido($idPartido){    
        $partido = Partido::findOrFail($idPartido);       
        return view('painel.partido.partidoForm', ['partidos' => $partido]);
    }

    public function atualizarPartido($idPartido, Request $req){
        $partido = Partido::findOrFail($idPartido);
        $partido->update($req->all());
        \Session::flash('mensagem_sucesso', 'Partido atualizado com sucesso');
        return Redirect::to('admin/partido/'.$partido->idPartidos.'/editar');
    }

    public function excluirPartido($idPartido){
        $partido = Partido::findOrFail($idPartido);
        $partido->delete();      
        \Session::flash('mensagem_sucesso', 'Partido excluído com sucesso');
        $partidos = Partido::get();
        return view('painel.partido.partidoLista', ['partidos' => $partidos]);
    }
}
