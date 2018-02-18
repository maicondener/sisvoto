@extends('layouts.appFront')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <!-- Exibe mensagem-->
                        @if(Session::has('mensagem_alerta'))
                            <div class="alert alert-danger">{{ Session::get('mensagem_alerta') }}</div>
                        @endif
                        <div class="row text-center">
                            <h3>Escolha um candidato e clique no botão votar</h3>
                        </div>
                        <div class="row text-center">
                        @foreach($candidatos as $c)
                        {!! Form::open(['url' => '/registraVoto']) !!}
                            <div class="col-md-6">
                                <img src="/imagens/candidatos/{{ $c->fotoCandidatos }}" style="width: 100px; height: 100px; margin: 20px 0 0 0;" class="img-thumbnail" alt="">
                                <h4>Candidato: <b>{{ $c->apelidoCandidatos }}</b></h4>
                                <h4>Número: <b>{{ $c->numCandidatos }}</b></h4>
                                {!! Form::input('text', 'idCandidatos', $c->idCandidatos, ['hidden']) !!}
                                {!! Form::input('text', 'idEleitor', $eleitor->idEleitor, ['hidden']) !!}
                                {!! Form::input('text', 'idEleicao', $eleicao->idEleicao, ['hidden']) !!}
                                {!! Form::submit('Votar', ['class' => 'btn btn-primary']) !!}
                            </div>

                        {!! Form::close() !!}
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection