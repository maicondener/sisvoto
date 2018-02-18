<?php

namespace App\Http\Controllers\painel\candidato;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\painel\candidato\Candidato;
use App\models\painel\partido\Partido;
use Redirect;

class CandidatoController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $candidatos = Candidato::get();
        return view('painel.candidato.candidatoLista', compact('candidatos'));
    }

    public function novoCandidato(){
        $partidos = Partido::pluck('nomePartidos', 'idPartidos');
        return view('painel.candidato.candidatoForm', compact('partidos'));
    }

    public function salvarCandidato(Request $req){

        $candidato = new Candidato();

        $candidato->nomeCandidatos      = $req->nomeCandidatos;
        $candidato->apelidoCandidatos   = $req->apelidoCandidatos;
        $candidato->cpfCandidatos       = $req->cpfCandidatos;
        $candidato->numCandidatos       = $req->numCandidatos;
        $candidato->tbPartidos_idPartidos = $req->tbPartidos_idPartidos;

        //upload da foto do candidato
        if($req->hasFile('fotoCandidatos')) {
            $this->validate($req, ['fotoCandidatos' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096']);
            $file = $req->file('fotoCandidatos');
            $destino = public_path() . '\imagens\candidatos';
            $fileName = $req->fotoCandidatos->getClientOriginalName();
            $file->move($destino, $fileName);
            $candidato->fotoCandidatos = $fileName;
        }

        $candidato->save();
        \Session::flash('mensagem_sucesso', 'Candidato cadastrado com sucesso');
        return Redirect::to(route('candidatoNovo'));

    }

    public function editarCandidato($idCandidato){
        $candidato = Candidato::findOrFail($idCandidato);
        $partidos = Partido::pluck('nomePartidos', 'idPartidos');
        return view('painel.candidato.candidatoForm', compact('candidato', 'partidos'));
    }

    public function atualizarCandidato($idCandidato, Request $req){

        $candidato = Candidato::findOrFail($idCandidato);
        $candidato->update($req->all());
        \Session::flash('mensagem_sucesso', 'Candidato atualizado com sucesso');
        $partidos = Partido::get(['idPartidos', 'nomePartidos']);
        return Redirect::to('admin/candidato/'.$candidato->idCandidatos.'/editar');

    }

    public function excluirCandidato($idCandidato){
        $candidato = Candidato::findOrFail($idCandidato);
        $candidato->delete();
        \Session::flash('mensagem_sucesso', 'Candidato deletado com sucesso');
        $candidatos = Candidato::get();
        return view('painel.candidato.candidatoLista', compact('candidatos'));
    }

}
