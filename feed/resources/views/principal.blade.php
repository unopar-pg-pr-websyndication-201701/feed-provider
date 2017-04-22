<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap Core CSS-->
        <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        
    </head>
    <body>

        @include('principal-cabecalho')

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @yield('conteudo')
                </div>
            </div> 
        </div>

        <!-- jQuery 3.2.1 -->
        <script src="{{asset('bootstrap/js/jquery.js')}}"></script>

        <!-- ModalJS
        <script src="{{asset('bootstrap/js/modal.js')}}"></script> -->

        <!-- Bootstrap Core JavaScript -->
        <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>

    </body>
</html>
