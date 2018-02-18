@extends('layouts.appFront')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body flex">
                        <!-- Exibe mensagem-->
                        @if(Session::has('mensagem_alerta'))
                            <div class="alert alert-danger">{{ Session::get('mensagem_alerta') }}</div>
                        @elseif(Session::has('mensagem_sucesso'))
                            <div class="alert alert-success">{{ Session::get('mensagem_sucesso') }}</div>
                        @endif
                        <div class="row">
                            <div class="col-lg-4 col-lg-offset-2">
                                {!! Form::model($eleicao, ['method' => 'PATCH', 'url' => 'zeressima/'.$eleicao->idEleicao]) !!}

                                {!! Form::hidden('zeressimaEleicao', 1) !!}
                                {!! Form::submit('Emitir zeréssima', ['class' => 'btn btn-primary']) !!}

                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection