@extends('layouts.appFront')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <!-- Exibe mensagem-->
                        @if(Session::has('mensagem_alerta'))
                            <div class="alert alert-danger text-center">{{ Session::get('mensagem_alerta') }}</div>
                        @elseif(Session::has('mensagem_sucesso'))
                            <div class="alert alert-success text-center">{{ Session::get('mensagem_sucesso') }}</div>
                        @endif
                        <div class="row text-center">
                            <h3>Informe seu CPF</h3>
                        </div>
                        {!! Form::open(['url' => '/votar']) !!}
                        <div class="row text-center">
                            <div class="col-md-6 col-md-offset-3">
                                {!! Form::input('text', 'cpfEleitor', null, ['class' => 'form-control cpf-mascara text-center']) !!}
                                {!! Form::input('text', 'idEleicao', $eleicao->idEleicao, ['hidden']) !!}
                            </div>
                        </div>
                        <div class="row text-center">
                            <div style="margin: 10px 0 0 0;">
                                {!! Form::submit('Verificar', ['class' => 'btn btn-primary']) !!}
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection