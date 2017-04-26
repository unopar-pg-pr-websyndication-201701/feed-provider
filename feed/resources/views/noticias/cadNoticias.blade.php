@extends('principal')
@section('conteudo')
<div class="panel-body">
  	@if(Session::has('mensagem_sucesso'))
		{!! 'OK' !!}
  	@endif
  	<h2 class="page-header text-info">Cadastro de Noticias</h2>
</div>
<form method="POST" action="{{ route('salvarNoticia') }}" enctype="multipart/form-data">
	<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
  <div class="form-group">
    <label for="titulo">Titulo</label>
    <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Titulo">
  </div>
  <div class="form-group">
    <label for="desc">Descrição</label>
    <input type="text" class="form-control" id="desc" name="descricao" placeholder="Descrição">
  </div>
  <div class="form-group">
  		<label for="conteudo">Conteudo</label>
  		<textarea class="form-control" rows="3" id="conteudo" name="conteudo" placeholder="Conteudo"></textarea>
  </div>
  <div class="form-group">
    <label for="autor">Autor</label>
    <input type="text" class="form-control" id="autor" name="autor" placeholder="Autor">
  </div>
  <div class="form-group">
    <label for="autor">Categoria</label>
	  <select name="categoria_id">
	  	<option value="1">teste</option>
	  </select>
   </div>
  <div class="form-group">
    <label for="nome-imagem">Imagem</label>
    <input type="file" id="nome-imagem" name="imagem_nome">
  </div>
  <button type="submit" class="btn btn-primary">Cadastrar</button>
</form>
@stop