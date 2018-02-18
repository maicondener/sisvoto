@extends('layouts.appBack')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Lista de Partidos
                <a type="button" class="btn btn-primary btn-xs pull-right" href="{{ route('partidoNovo') }}">Novo partido</a>
                </div>
                <div class="panel-body">
                    <!-- Exibe mensagem de sucesso -->
                    @if(Session::has('mensagem_sucesso'))
                        <div class="alert alert-success">{{ Session::get('mensagem_sucesso') }}</div>
                    @endif

                    <table class="table table-hover">
                        <tr>
                            <th>ID</th>
                            <th>Partido</th>
                            <th>Sigla</th>
                            <th>Ações</th>
                        </tr>
                        <tbody>
                            @foreach($partidos as $partido)
                                <tr>
                                    <td>{{ $partido->idPartidos }}</td>
                                    <td>{{ $partido->nomePartidos }}</td>
                                    <td>{{ $partido->siglaPartidos }}</td>
                                    <td>
                                        <a href="/admin/partido/{{ $partido->idPartidos }}/editar" type="button" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span></a>
                                        <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-trash"></span></button>
                                    </td>
                                </tr>
                            @endforeach
                            @if(isset($partido))
                                <div id="myModal" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">
                                                    Excluir
                                                </h4>
                                            </div>
                                            <div class="modal-body">
                                                Deseja excluir os dados do partido {{ $partido->nomePartidos }}?
                                            </div>
                                            <div class="modal-footer">
                                                {!! Form::open(['method' => 'DELETE', 'url' => '/admin/partido/'.$partido->idPartidos.'/excluir', 'style' => 'display: inline;']) !!}
                                                        <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>Excluir</button>
                                                {!! Form::close() !!}
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection