@extends('layouts.appBack')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Lista de Candidatos
                <a type="button" class="btn btn-primary btn-xs pull-right" href="{{ route('candidatoNovo') }}">Novo candidato</a>
                </div>
                <div class="panel-body">
                    <!-- Exibe mensagem de sucesso -->
                    @if(Session::has('mensagem_sucesso'))
                        <div class="alert alert-success">{{ Session::get('mensagem_sucesso') }}</div>
                    @endif

                    <table class="table table-hover">
                        <tr>
                            <th>ID</th>
                            <th>Foto</th>
                            <th>Nome</th>
                            <th>Apelido</th>
                            <th>CPF</th>
                            <th>Número</th>
                            <th>Partido</th>
                            <th>Ações</th>
                        </tr>
                        <tbody>
                            @foreach($candidatos as $candidato)
                                <tr>
                                    <td>{{ $candidato->idCandidatos }}</td>
                                    <td><img src="/imagens/candidatos/{{  $candidato->fotoCandidatos }}" style="width: 60px;" alt=""></td>
                                    <td>{{ $candidato->nomeCandidatos }}</td>
                                    <td>{{ $candidato->apelidoCandidatos }}</td>
                                    <td class="cpf-mascara">{{ $candidato->cpfCandidatos }}</td>
                                    <td>{{ $candidato->numCandidatos }}</td>
                                    <td>{{ $candidato->partido->nomePartidos }}</td>
                                    <td>
                                        <a href="/admin/candidato/{{ $candidato->idCandidatos }}/editar" type="button" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span></a>
                                        <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-trash"></span></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if(isset($candidato))
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
                                    Deseja excluir os dados do eleitor {{ $candidato->nomeCandidatos }}?
                                </div>
                                <div class="modal-footer">
                                    {!! Form::open(['method' => 'DELETE', 'url' => '/admin/candidato/'.$candidato->idCandidatos.'/excluir', 'style' => 'display: inline;']) !!}
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