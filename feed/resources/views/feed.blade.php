@extends('principal')

@section('conteudo') 
    <!-- Estrutura de exemplo para exibição do card da noticia 
        Será feito um foreach o qual incluira um arquivo do modal para cada noticia, o qual será diferencido pelo ID da noticia.
    -->
@if (Auth::guest())

@foreach($noticias as $noticia)
    <div class="row panel panel-default" style="background-color: #f1f1f1;">
        <div class="panel-body">
            <div class="col-md-3">
                <div style="background-color: #f1f1f1; width: 250px; height: 200px;">
                    <img src="images/noticias/{{$noticia->imagem_nome}}" alt="{{$noticia->imagem_nome}}" style="width: 240px; height: 190px; padding:5px 5px 5px 5px;">
                </div>
            </div>
            <div class="col-md-9">
                <h2><a href="" data-toggle="modal" data-target="#modal{{$noticia->id}}">{{$noticia->titulo}}</a></h2>
                <span class="label label-default">{{ date( 'd / m / Y', strtotime($noticia->created_at))}}</span>
                <p>{!! str_limit($noticia->descricao, $limit = 150, $end = '....... <a href="" data-toggle="modal" data-target="#modal{{$noticia->id}}">Saiba mais...</a>') !!}</p>

                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal{{$noticia->id}}">Saiba mais...</button>

                <!-- Inclui o arquivo de modal passando o objeto noticia por parametro para o arquivo incluido -->
                @include('noticias.noticia-detalhes', ['notic' => $noticia])

            </div>
        </div>       
    </div>
@endforeach
@else
    @include('dashboard', ['notic' => $noticias])    
@endif
@stop