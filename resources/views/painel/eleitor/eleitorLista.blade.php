@extends('layouts.appBack')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Lista de Eleitores
                <a type="button" class="btn btn-primary btn-xs pull-right" href="{{ route('eleitorNovo') }}">Novo eleitor</a>
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
                            <th>Sobrenome</th>
                            <th>CPF</th>
                            <th>Data de Nascimento</th>
                            <th>Sexo</th>
                            <th>Ações</th>
                        </tr>
                        <tbody>
                            @foreach($eleitores as $eleitor)
                                <tr>
                                    <td>{{ $eleitor->idEleitor }}</td>
                                    <td>{{ $eleitor->nomeEleitor }}</td>
                                    <td>{{ $eleitor->sobrenomeEleitor }}</td>
                                    <td class="cpf-mascara">{{ $eleitor->cpfEleitor }}</td>
                                    <td class="data">{{ date('d-m-Y', strtotime($eleitor->dataNascEleitor)) }}</td>
                                    <td>{{ $eleitor->sexoEleitor }}</td>
                                    <td>
                                        <a href="/admin/eleitor/{{ $eleitor->idEleitor }}/editar" type="button" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span></a>
                                        <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-trash"></span></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if(isset($eleitor))
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
                                    Deseja excluir os dados do eleitor {{ $eleitor->nomeEleitor }}?
                                </div>
                                <div class="modal-footer">
                                    {!! Form::open(['method' => 'DELETE', 'url' => '/admin/eleitor/'.$eleitor->idEleitor.'/excluir', 'style' => 'display: inline;']) !!}
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