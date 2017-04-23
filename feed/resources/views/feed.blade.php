@extends('principal')

@section('conteudo') 
    <!-- Estrutura de exemplo para exibição do card da noticia 
        Será feito um foreach o qual incluira um arquivo do modal para cada noticia, o qual será diferencido pelo ID da noticia.
    -->
    <div class="row panel panel-default">
        <div class="panel-body">
            <div class="col-md-3">
                <div style="background-color: #f1f1f1; width: 250px; height: 200px;">Imagem da Noticia</div>
            </div>
            <div class="col-md-9">
                <h2><a href="" data-toggle="modal" data-target="#myModal">Titulo da Noticia</a></h2>
                <p>This example is a quick exercise to illustrate how the default, static navbar and fixed to top navbar work. It includes the responsive CSS and HTML, so it also adapts to your viewport and device.</p>

                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Saiba mais..</button>

                <!-- Inclui o arquivo de modal passando o objeto noticia por parametro para o arquivo incluido -->
                @include('noticias.noticia-detalhes') <!-- , ['notic' => $noticia] -->

            </div>
        </div>
        
    </div>

@stop
