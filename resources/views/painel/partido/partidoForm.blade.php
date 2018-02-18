@extends('layouts.appBack')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    @if(Request::is('*/editar'))
                        Atualizar partido - Preencha os dados
                    @else
                        Inserir novo partido - Preencha os dados
                    @endif
                    <a type="button" class="btn btn-primary btn-xs pull-right" href="{{ route('partido') }}">Lista de partidos</a>
                </div>
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="panel-body">
                            <!-- Exibe mensagem de sucesso -->
                            @if(Session::has('mensagem_sucesso'))
                                <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span> {{ Session::get('mensagem_sucesso') }}</div>
                            @endif

                            <!-- De acordo com o tipo escolhe a ação do form -->
                            @if(Request::is('*/editar'))
                                {!! Form::model($partidos, ['method' => 'PATCH', 'url' => 'admin/partido/'.$partidos->idPartidos.'/atualizar']) !!}
                            @else
                                {!! Form::open(['url' => 'admin/partido/salvar']) !!}
                            @endif

                            <div class="row marginInputForm">
                                <div class="col-md-12">
                                    {!! Form::label('nomePartidos', 'Nome do partido') !!}
                                    {!! Form::input('text', 'nomePartidos', null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Nome do partido']) !!}
                                </div>
                            </div>
                            <div class="row marginInputForm">
                                <div class="col-md-3">
                                    {!! Form::label('siglaPartidos', 'Sigla do partido') !!}   
                                    {!! Form::input('text', 'siglaPartidos', null, ['class' => 'form-control', '', 'placeholder' => 'Sigla do partido']) !!}
                                </div>
                            </div>
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
                                                Deseja atualizar os dados do partido {{ $partidos->nomePartidos }}?
                                            @else
                                                Deseja adicionar o novo partido?
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