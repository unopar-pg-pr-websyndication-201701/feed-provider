@extends('principal')
@section('conteudo')
<div class="panel-body">
  	@if(Session::has('mensagem_sucesso'))
		{!! 'OK' !!}
  	@endif
  	<h2 class="page-header text-info">Cadastro de Noticias</h2>
</div>
<form method="POST" action="{{ route('salvarNoticia') }}" enctype="multipart/form-data">
	<input type="hidden" name="_token" value="{{ csrf_token() }}" />
  <div class="form-group col-md-12">
    <div class="col-md-5">
      <label for="titulo" class="col-sm-3 form-label">Titulo</label>
      <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Titulo" required="required">
    </div>
    <div class=" col-md-3 col-md-offset-1">
      <label for="data_ini" class="col-sm-5 form-label">Data Início</label>
      <input type="date" class="form-control" id="data_ini" name="data_ini" required="required">
    </div>
    <div class=" col-md-3">
      <label for="data_fim" class="col-sm-5 form-label">Data Fim</label>
      <input type="date" class="form-control" id="data_fim" name="data_fim" required="required">
    </div>
  </div>
  <div class="form-group col-md-12">
    <label for="desc" class="col-sm-2 form-label">Descrição</label>
    <input type="text" class="form-control" id="desc" name="descricao" placeholder="Descrição" required="required">
  </div>
  <div class="form-group col-md-12">
  		<label for="conteudo" class="col-sm-2 form-label">Conteudo</label>
  		<textarea class="form-control" rows="3" id="conteudo" name="conteudo" placeholder="Conteudo" required="required"></textarea>
  </div>
  <div class="form-group col-md-12"">
    <label for="autor" class="col-sm-2 form-label">Autor</label>
    <input type="text" class="form-control" id="autor" name="autor" placeholder="Autor" required="required">
  </div>
  <div class="form-group col-md-12"">
    <label for="select_categoria" class="col-sm-2 form-label">Categorias</label>
    <select name="categoria_id" id="select_categoria" class="form-control" required="required">
      <option value="">Selecione uma Categoria</option>
      @foreach($listcategorias as $cat)
        <option value="{{ $cat->id }}">{{ $cat->nome }}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group col-md-12">
    <label for="nome-imagem" class="form-label">Imagem</label>
    <input type="file" id="nome-imagem" name="imagem_nome">
    <button type="submit" class="btn btn-primary pull-right">Cadastrar Notícia</button>
  </div>
</form>
@stop