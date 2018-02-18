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

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
