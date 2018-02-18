@extends('layouts.appFront')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body flex">
                    <h1 class="text-center">Informe o seu CPF</h1>
                    <div class="input-group input-group-lg col-lg-4 margin10">
                        <input type="text" name="cpf" class="form-control text-center cpf-mascara" placeholder="000.000.000-00" autocomplete="off" maxlength="11" />
                    </div>
                    <div class="input-group margin10">
                        <a type="button" href="#" class="btn btn-primary">Validar</a>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection