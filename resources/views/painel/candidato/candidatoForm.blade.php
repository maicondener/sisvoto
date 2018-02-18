@extends('layouts.appBack')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    @if(Request::is('*/editar'))
                        Atualizar candidato - Preencha os dados
                    @else
                        Inserir novo candidato - Preencha os dados
                    @endif
                    <a type="button" class="btn btn-primary btn-xs pull-right" href="{{ route('candidato') }}">Lista de candidatos</a>
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
                                {!! Form::model($candidato, ['method' => 'PATCH', 'url' => 'admin/candidato/'.$candidato->idCandidatos.'/atualizar']) !!}
                            @else
                                {!! Form::open(['url' => 'admin/candidato/salvar', 'enctype' => 'multipart/form-data']) !!}
                            @endif
                            {{ csrf_field() }}
                            <div class="row marginInputForm">
                                <div class="col-md-12">
                                    {!! Form::label('nomeCandidatos', 'Nome') !!}
                                    {!! Form::input('text', 'nomeCandidatos', null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Nome']) !!}
                                </div>
                            </div>
                            <div class="row marginInputForm">
                                <div class="col-md-12">
                                    {!! Form::label('apelidoCandidatos', 'Apelido') !!}   
                                    {!! Form::input('text', 'apelidoCandidatos', null, ['class' => 'form-control', '', 'placeholder' => 'Apelido']) !!}
                                </div>
                            </div>
                            <div class="row marginInputForm">
                                <div class="col-md-5">
                                    {!! Form::label('cpfCandidatos', 'CPF') !!}
                                    {!! Form::input('text', 'cpfCandidatos', null, ['class' => 'form-control cpf-mascara', '', 'placeholder' => '000.000.000-00']) !!}
                                </div>
                                <div class="col-md-5">
                                    {!! Form::label('numCandidatos', 'Número do candidato') !!}
                                    {!! Form::input('text', 'numCandidatos', null, ['class' => 'form-control', '', 'placeholder' => 'Ex.: 12431']) !!}
                                </div>
                            </div>
                            <div class="row marginInputForm">
                                <div class="col-md-6">
                                    {!! Form::label('tbPartidos_idPartidos', 'Partido') !!}
                                    {!! Form::select('tbPartidos_idPartidos', $partidos, null, ['class' => 'form-control']) !!}
                                </div>
                                <div class="col-md-6">
                                    {!! Form::label('fotoCandidatos', 'Escolha uma foto') !!}
                                    {!! Form::input('file', 'fotoCandidatos', null, ['class' => 'form-control']) !!}
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
                                                Deseja atualizar os dados do eleitor {{ $candidato->nomeCandidatos }}?
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