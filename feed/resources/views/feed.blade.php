@extends('principal')

@section('conteudo') 
    <!-- Estrutura de exemplo para exibição do card da noticia 
        Será feito um foreach o qual incluira um arquivo do modal para cada noticia, o qual será diferencido pelo ID da noticia.
    -->
@foreach($noticias as $noticia)
    <div class="row panel panel-default">
        <div class="panel-body">
            <div class="col-md-3">
                <div style="background-color: #f1f1f1; width: 250px; height: 200px;">Imagem da Noticia</div>
            </div>
            <div class="col-md-9">
                <h2><a href="" data-toggle="modal" data-target="#modal{{$noticia->id}}">{{$noticia->titulo}}</a></h2>
                <span class="label label-default">{{$noticia->created_at}}</span>
                <p>{!! str_limit($noticia->descricao, $limit = 150, $end = '....... <a href="" data-toggle="modal" data-target="#modal{{$noticia->id}}">Saiba mais...</a>') !!}</p>

                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal{{$noticia->id}}">Saiba mais..</button>

                <!-- Inclui o arquivo de modal passando o objeto noticia por parametro para o arquivo incluido -->
                @include('noticias.noticia-detalhes', ['notic' => $noticia])

            </div>
        </div>       
    </div>
@endforeach

@stop