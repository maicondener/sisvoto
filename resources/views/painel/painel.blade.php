@extends('layouts.appBack')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    @if($eleicao != null)
                        {{ $eleicao->nomeEleicao}}
                    @else
                        <h4>Nenhuma eleição ativa</h4>
                    @endif
                </div>
                <div class="panel-body flex">

                </div>
            </div>
        </div>
    </div>
</div>
@endsection