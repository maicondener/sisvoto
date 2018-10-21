<?php

namespace App\Http\Controllers\sisvoto;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\painel\eleicao\Eleicao;
use App\models\painel\candidato\Candidato;
use App\models\painel\eleitor\Eleitor;
use App\models\sisvoto\Voto;
use App\models\sisvoto\Votou;
use Redirect;

class SisvotoController extends Controller
{
    //    

    //Retorna a eleição que está ativa no sistema
    public function getEleicao(){
        $eleicao = Eleicao::get();
        foreach($eleicao as $e){
            if($e->ativaEleicao == 1){
                return $e;
            }
        }
    }

    //Verifica se a data da eleição ativa é igual a data atual
    public function getDataEleicao($eleicao){
        date_default_timezone_set('America/Sao_Paulo');
        $dataAtual = date('Y-m-d');
        if($dataAtual == $eleicao->dataInicioEleicao){
            return $dataAtual;
        }
    }

    //Verifica se a hora atual é maior que a hora para início da votação
    public function getHoraEleicao($eleicao){
        date_default_timezone_set('America/Sao_Paulo');
        $horaAtual = date('H:i:s');
        if($horaAtual >= $eleicao->horaInicioEleicao && $horaAtual <= $eleicao->horaFimEleicao){
            return TRUE;
        }
    }

    public function verificaZeressima($eleicao){
        if($eleicao->zeressimaEleicao){
            return TRUE;
        }
    }

    public function verificaVotou($idEleitor, $idEleicao){
        $eleicao = Votou::where([['tbEleitor_idEleitor','=', $idEleitor], ['tbEleicao_idEleicao','=', $idEleicao]])->get();
        foreach($eleicao as $e){
            return $e;
        }
    }


    public function index(){
        $eleicao = $this->getEleicao();
        if($eleicao) {
            if($this->getDataEleicao($eleicao)){ //Verifica data
                if($this->getHoraEleicao($eleicao)){ //Verifica hora
                    if($this->verificaZeressima($eleicao)){ //Verifica zeréssima
                        return view('sisvoto.verificaCPF', compact('eleicao'));
                        //return view('sisvoto.index', compact('eleicao'));
                    }else{
                        return view('sisvoto.emitirZeressima', compact('eleicao'));
                    }
                }else{
                    \Session::flash('mensagem_alerta', 'Aguarde o horário de início da votação');
                    return view('sisvoto.index', compact('eleicao'));
                }
            }else{
                \Session::flash('mensagem_alerta', 'Verifique a data da eleição');
                return view('sisvoto.index', compact('eleicao'));
            }
        }else{
            \Session::flash('mensagem_alerta', 'Não existem nenhuma eleição ativa no momento');
            return view('sisvoto.index', compact('eleicao'));
        }
    }

    public function votar(Request $req){
        $eleitor = Eleitor::where('cpfEleitor', $req->cpfEleitor)->first(); //Retorna somente o eleitor com o CPF digitado
        if($eleitor){
            if(!$this->verificaVotou($eleitor->idEleitor, $req->idEleicao)){ //Verifica se o eleitor já votou
                $eleicao = $this->getEleicao();
                $candidatos = Candidato::get();
                return view('sisvoto.listCandidatos', compact('eleicao', 'candidatos', 'eleitor'));
            }else{
                \Session::flash('mensagem_alerta', 'Esse eleitor já votou!!! Informe o CPF de outro eleitor que não tenha votado.');
                return Redirect::to('/');
            }
        }else{
            \Session::flash('mensagem_alerta', 'Informe um CPF válido');
            return Redirect::to('/');
        }

    }

    public function emitirZeressima($idEleicao, Request $req){
        $eleicao = Eleicao::findOrFail($idEleicao);
        $eleicao->update($req->all());
        return Redirect::to('/');
    }

    public function registraVoto(Request $req){
        if(!$this->verificaVotou($req->idEleitor, $req->idEleicao)){
            $voto   = new Voto();
            $voto->tbEleicao_idEleicao = $req->idEleicao;
            $voto->tbCandidatos_idCandidatos = $req->idCandidatos;

            $votou  = new Votou();
            $votou->tbEleicao_idEleicao = $req->idEleicao;
            $votou->tbEleitor_idEleitor = $req->idEleitor;

            $voto->save();
            $votou->save();

            \Session::flash('mensagem_sucesso', 'Você votou com sucesso!!! Informe o próximo CPF');
            return Redirect::to('/');

        }else{
            \Session::flash('mensagem_alerta', 'Esse eleitor já votou!!! Informe o CPF de outro eleitor que não tenha votado.');
            return Redirect::to('/');
        }
    }

}
