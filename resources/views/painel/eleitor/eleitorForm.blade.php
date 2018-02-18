@extends('layouts.appBack')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    @if(Request::is('*/editar'))
                        Atualizar eleitor - Preencha os dados
                    @else
                        Inserir novo eleitor - Preencha os dados
                    @endif
                    <a type="button" class="btn btn-primary btn-xs pull-right" href="{{ route('eleitor') }}">Lista de eleitores</a>
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
                                {!! Form::model($eleitor, ['method' => 'PATCH', 'url' => 'admin/eleitor/'.$eleitor->idEleitor.'/atualizar']) !!}
                            @else
                                {!! Form::open(['url' => 'admin/eleitor/salvar']) !!}
                            @endif

                            <div class="row marginInputForm">
                                <div class="col-md-12">
                                    {!! Form::label('nomeEleitor', 'Nome') !!}
                                    {!! Form::input('text', 'nomeEleitor', null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Nome']) !!}
                                </div>
                            </div>
                            <div class="row marginInputForm">
                                <div class="col-md-12">
                                    {!! Form::label('sobrenomeEleitor', 'Sobrenome') !!}   
                                    {!! Form::input('text', 'sobrenomeEleitor', null, ['class' => 'form-control', '', 'placeholder' => 'Sobrenome']) !!}
                                </div>
                            </div>
                            <div class="row marginInputForm">
                                <div class="col-md-2">
                                    {!! Form::label('sexoEleitor', 'Sexo') !!}
                                    {!! Form::select('sexoEleitor', ['m' => 'Masculino', 'f' => 'Feminino'], null,['class' => 'form-control', 'placeholder' => 'Escolha']) !!}
                                </div>
                                <div class="col-md-5">
                                    {!! Form::label('cpfEleitor', 'CPF') !!}
                                    {!! Form::input('text', 'cpfEleitor', null, ['class' => 'form-control cpf-mascara', '', 'placeholder' => '000.000.000-00']) !!}
                                </div>
                                <div class="col-md-5">
                                    {!! Form::label('dataNascEleitor', 'Data de Nascimento') !!}
                                    {!! Form::input('date', 'dataNascEleitor', null, ['class' => 'form-control', '', 'placeholder' => '00/00/0000']) !!}
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
                                                Deseja atualizar os dados do eleitor {{ $eleitor->nomeEleitor }}?
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