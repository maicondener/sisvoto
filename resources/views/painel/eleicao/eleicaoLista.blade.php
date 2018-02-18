@extends('layouts.appBack')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Lista de Eleições
                        <a type="button" class="btn btn-primary btn-xs pull-right" href="{{ route('eleicaoNovo') }}">Nova eleição</a>
                    </div>
                    <div class="panel-body">
                        <!-- Exibe mensagem de sucesso -->
                        @if(Session::has('mensagem_sucesso'))
                            <div class="alert alert-success">{{ Session::get('mensagem_sucesso') }}</div>
                        @endif
                        <table class="table table-hover">
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Data início</th>
                                <th>Hora início</th>
                                <th>Data fim</th>
                                <th>Hora fim</th>
                                <th>Ativa</th>
                                <th>Zeréssima emitida</th>
                                <th>Ações</th>
                            </tr>
                            <tbody>
                            @foreach($eleicao as $e)
                                <tr>
                                    <td>{{ $e->idEleicao }}</td>
                                    <td>{{ $e->nomeEleicao }}</td>
                                    <td class="data">{{ date('d-m-Y', strtotime($e->dataInicioEleicao)) }}</td>
                                    <td>{{ $e->horaInicioEleicao }}</td>
                                    <td class="data">{{ date('d-m-Y', strtotime($e->dataFimEleicao)) }}</td>
                                    <td>{{ $e->horaFimEleicao }}</td>
                                    <td>
                                        @if($e->ativaEleicao == 0)
                                            Não
                                        @else
                                            Sim
                                        @endif
                                    </td>
                                    <td>
                                        @if($e->zeressimaEleicao == 0)
                                            Não
                                        @else
                                            Sim
                                        @endif
                                    </td>
                                    <td>
                                        <a href="/admin/eleicao/{{ $e->idEleicao }}/editar" type="button" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span></a>
                                        <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-trash"></span></button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @if(isset($e))
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
                                            Deseja excluir os dados da eleição {{ $e->nomeEleicao }}?
                                        </div>
                                        <div class="modal-footer">
                                            {!! Form::open(['method' => 'DELETE', 'url' => '/admin/eleicao/'.$e->idEleicao.'/excluir', 'style' => 'display: inline;']) !!}
                                            <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>Excluir</button>
                                            {!! Form::close() !!}
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection