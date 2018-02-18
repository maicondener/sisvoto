<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Nome da eleição atual</title> <!-- Alterar -->

    <!-- Styles -->
    <link href="{{ asset('css/front.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar flex">
                    
                    <!-- Aqui será inserido o nome da eleição atual -->
                    <!-- Recebe a variável que vem do controller -->
                    @if($eleicao)
                        <h2>{{ $eleicao->nomeEleicao }}</h2>
                    @else
                        <h2>Nenhuma eleição ativa</h2>
                    @endif

                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery.mask.min.js') }}"></script>
    <script src="{{ asset('js/front.js') }}"></script>
</body>
</html>
