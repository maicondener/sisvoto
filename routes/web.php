<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Rotas front-end */
Route::get('/', 'sisvoto\SisvotoController@index');
Route::post('votar', 'sisvoto\SisvotoController@votar');
Route::get('zeressima', 'sisvoto\SisvotoController@emitirZeressima')->name('zeressima');
Route::patch('zeressima/{idEleicao}', 'sisvoto\SisvotoController@emitirZeressima');
Route::post('registraVoto', 'sisvoto\SisvotoController@registraVoto');


/* Rotas back-end */
Route::group(['middleware' => ['web']], function () {
    Auth::routes();
    //Rota do painel inicial
    Route::get('admin', 'painel\PainelController@index')->name('admin');
    
    //Rotas para eleitores
    Route::get('admin/eleitor', 'painel\eleitor\EleitorController@index')->name('eleitor');
    Route::get('admin/eleitor/novo', 'painel\eleitor\EleitorController@novoEleitor')->name('eleitorNovo');
    Route::get('admin/eleitor/{eleitor}/editar', 'painel\eleitor\EleitorController@editarEleitor');
    Route::post('admin/eleitor/salvar', 'painel\eleitor\EleitorController@salvarEleitor');
    Route::patch('admin/eleitor/{eleitor}/atualizar', 'painel\eleitor\EleitorController@atualizarEleitor');
    Route::delete('admin/eleitor/{eleitor}/excluir', 'painel\eleitor\EleitorController@excluirEleitor');

   
    //Rotas para candidatos
    Route::get('admin/candidato', 'painel\candidato\CandidatoController@index')->name('candidato');
    Route::get('admin/candidato/novo', 'painel\candidato\CandidatoController@novoCandidato')->name('candidatoNovo');
    Route::get('admin/candidato/{candidato}/editar', 'painel\candidato\CandidatoController@editarCandidato');
    Route::post('admin/candidato/salvar', 'painel\candidato\CandidatoController@salvarCandidato');
    Route::patch('admin/candidato/{candidato}/atualizar', 'painel\candidato\CandidatoController@atualizarCandidato');
    Route::delete('admin/candidato/{candidato}/excluir', 'painel\candidato\CandidatoController@excluirCandidato');


    //Rotas para Eleição
    Route::get('admin/eleicao', 'painel\eleicao\EleicaoController@index')->name('eleicao');
    Route::get('admin/eleicao/novo', 'painel\eleicao\EleicaoController@novaEleicao')->name('eleicaoNovo');
    Route::get('admin/eleicao/{eleicao}/editar', 'painel\eleicao\EleicaoController@editarEleicao');
    Route::post('admin/eleicao/salvar', 'painel\eleicao\EleicaoController@salvarEleicao');
    Route::patch('admin/eleicao/{eleicao}/atualizar', 'painel\eleicao\EleicaoController@atualizarEleicao');
    Route::delete('admin/eleicao/{eleicao}/excluir', 'painel\eleicao\EleicaoController@excluirEleicao');



    //Rotas para Partidos
    Route::get('admin/partido', 'painel\partido\PartidoController@index')->name('partido');
    Route::get('admin/partido/novo', 'painel\partido\PartidoController@novoPartido')->name('partidoNovo');
    Route::get('admin/partido/{partido}/editar', 'painel\partido\PartidoController@editarPartido');
    Route::post('admin/partido/salvar', 'painel\partido\PartidoController@salvarPartido');
    Route::patch('admin/partido/{partido}/atualizar', 'painel\partido\PartidoController@atualizarPartido');
    Route::delete('admin/partido/{partido}/excluir', 'painel\partido\PartidoController@excluirPartido');


});
