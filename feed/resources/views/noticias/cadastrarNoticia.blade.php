@extends('layouts.app')
@section('content')
<form class="form-horizontal col-md-6" method="post" action="{{ route('noticia.form') }}">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<input class="form-control " type="" name="titulo" placeholder="Título">
	<input class="form-control" type="" name="subtitulo" placeholder="Sub-Título">
	<input class="form-control" type="" name="descricao" placeholder="Descrição">
	<textarea class="form-control" name="conteudo" placeholder="Conteudo"></textarea>
	<select class="form-control">
		<option value="1">TESTE</option>
	</select>
	<input class="form-control" type="" name="autor" placeholder="Autor">
	<input class="form-control btn btn-primary" type="submit" value="Cadastrar">


</form>
@stop