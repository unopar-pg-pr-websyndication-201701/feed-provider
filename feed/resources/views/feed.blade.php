@extends('principal')

@section('conteudo') 
    <!-- Estrutura de exemplo para exibição do card da noticia -->
    <div class="row panel panel-default">
        <div class="panel-body">
            <div class="col-md-3">
                <div style="background-color: #f1f1f1; width: 250px; height: 200px;">Imagem da Noticia</div>
            </div>
            <div class="col-md-9">
                <h2><a href="{{route('noticia.detalhes')}}">Titulo da Noticia</a></h2>
                <p>This example is a quick exercise to illustrate how the default, static navbar and fixed to top navbar work. It includes the responsive CSS and HTML, so it also adapts to your viewport and device.</p>
                <p>
                    <a class="btn btn-primary" href="" role="button">Saiba Mais..</a>
                </p>
            </div>
        </div>
    </div>
@stop
