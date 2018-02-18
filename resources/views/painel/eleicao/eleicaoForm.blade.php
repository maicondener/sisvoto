@extends('layouts.appBack')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        @if(Request::is('*/editar'))
                            Atualizar eleição - Preencha os dados
                        @else
                            Inserir nova eleição - Preencha os dados
                        @endif
                        <a type="button" class="btn btn-primary btn-xs pull-right" href="{{ route('eleicao') }}">Lista das eleições</a>
                    </div>
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="panel-body">
                                <!-- Exibe mensagem de sucesso -->
                                @if(Session::has('mensagem_sucesso'))
                                    <div class="alert alert-success">{{ Session::get('mensagem_sucesso') }}</div>
                                @endif

                            <!-- De acordo com o tipo escolhe a ação do form -->
                                @if(Request::is('*/editar'))
                                    {!! Form::model($eleicao, ['method' => 'PATCH', 'url' => 'admin/eleicao/'.$eleicao->idEleicao.'/atualizar']) !!}
                                @else
                                    {!! Form::open(['url' => 'admin/eleicao/salvar']) !!}
                                @endif

                                <div class="row marginInputForm">
                                    <div class="col-md-12">
                                        {!! Form::label('nomeEleição', 'Nome') !!}
                                        {!! Form::input('text', 'nomeEleicao', null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Nome']) !!}
                                    </div>
                                </div>
                                <div class="row marginInputForm">
                                    <div class="col-md-3">
                                        {!! Form::label('dataInicioEleicao', 'Data de início') !!}
                                        {!! Form::input('date', 'dataInicioEleicao', null, ['class' => 'form-control', '']) !!}
                                    </div>
                                    <div class="col-md-3">
                                        {!! Form::label('horaInicioEleicao', 'Hora de início') !!}
                                        {!! Form::input('time', 'horaInicioEleicao', null, ['class' => 'form-control', '']) !!}
                                    </div>
                                </div>
                                <div class="row marginInputForm">
                                    <div class="col-md-3">
                                        {!! Form::label('dataFimEleicao', 'Data de encerramento') !!}
                                        {!! Form::input('date', 'dataFimEleicao', null, ['class' => 'form-control', '']) !!}
                                    </div>
                                    <div class="col-md-3">
                                        {!! Form::label('horaFimEleicao', 'Hora de encerramento') !!}
                                        {!! Form::input('time', 'horaFimEleicao', null, ['class' => 'form-control', '']) !!}
                                    </div>
                                </div>
                                @if(Request::is('*/editar'))
                                    <div class="row marginInputForm">
                                        <div class="col-md-3">
                                            {!! Form::label('ativaEleicao', 'Ativa') !!}
                                            {!! Form::select('ativaEleicao', ['0' => 'Desativada', '1' => 'Ativa'], null, ['class' => 'form-control']) !!}
                                        </div>
                                        <div class="col-md-3">
                                            {!! Form::label('zeressimaEleicao', 'Zeréssima emitida') !!}
                                            {!! Form::select('zeressimaEleicao', ['0' => 'Não', '1' => 'Sim'], null, ['class' => 'form-control', 'disabled' ]) !!}
                                        </div>
                                    </div>
                                    <div class="row marginInputForm">
                                        <h4>Total de votos: <b>{{ $eleicao->voto->where('tbEleicao_idEleicao', $eleicao->idEleicao)->count() }}</b> votos</h4>
                                        @foreach($candidatos as $c)
                                            <h5>{{ $c->nomeCandidatos }}: <b>{{ $c->voto->where('tbEleicao_idEleicao', $eleicao->idEleicao)->count() }}</b> votos</h5>
                                        @endforeach
                                    </div>
                                @endif
                                <div class="row marginInputForm">
                                    <div class="col-md-8">
                                        @if(Request::is('*/editar'))
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Atualizar</button>
                                        @else
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Adicionar</button>
                                        @endif
                                    </div>
                                </div>
                                <div id="myModal" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">
                                                    @if(Request::is('*/editar'))
                                                        Atualizar
                                                    @else
                                                        Adicionar
                                                    @endif
                                                </h4>
                                            </div>
                                            <div class="modal-body">
                                                @if(Request::is('*/editar'))
                                                    Deseja atualizar os dados do eleitor {{ $eleicao->nomeEleicao }}?
                                                @else
                                                    Deseja adicionar o novo eleitor?
                                                @endif
                                            </div>
                                            <div class="modal-footer">
                                                @if(Request::is('*/editar'))
                                                    {!! Form::submit('Atualizar', ['class' => 'btn btn-primary']) !!}
                                                @else
                                                    {!! Form::submit('Adicionar', ['class' => 'btn btn-primary']) !!}
                                                @endif
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection