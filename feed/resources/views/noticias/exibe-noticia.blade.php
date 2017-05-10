@extends('principal')
@section('conteudo')
	<ol class="breadcrumb">
            <li><a href="{{route('feed.listar')}}">Veja Todas as Notícias</a></li>
    </ol>
	@foreach($noticia as $not)
		<div>
			<p style="font-size:14px;letter-spacing:-0.04em;">{{ date( 'd/m/Y', strtotime($not->created_at))}}, às {{ date( 'H:m', strtotime($not->created_at))}}, por
			 {{$not->autor}}</p>
		</div>
		<h2 class="page-header text-info" style="font-weight:bold;">{{$not->titulo}}</h2>
		<div class="container col-md-8" id="conteudo">
			<img src="/images/noticias/{{$not->imagem_nome}}" alt="{{$not->imagem_nome}}" style="height:600px;width:600px;">
			<p>{{$not->conteudo}}</p>
		</div>
		<div class="container col-md-4" id="aside_autor">
			<h3 style="font-weight:bold;">AUTOR</h3>
			<div style="border:1px solid black;border-radius:10px;">
				<p>
					<img src="/images/outras/autor.png" class="img-responsive img-circle" alt="{{$not->imagem_nome}}" style="height:75px;width:75px;margin:10px 10px 10px 10px;">
					<span style="font-weight:bold;text-transform:uppercase;margin-left:10px;">{{$not->autor}}</span>		
				</p>
			</div>
		</div>
	@endforeach
@stop