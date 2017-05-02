@extends('principal')
@section('conteudo')
	@foreach($noticia as $not)
		<h2 class="page-header text-info">{{$not->titulo}}</h2>
	@endforeach
@stop