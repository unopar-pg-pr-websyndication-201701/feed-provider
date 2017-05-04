@extends('principal')
@section('conteudo')
<div class="panel-body">
  	@if(Session::has('mensagem_sucesso'))
		{!! 'OK' !!}
  	@endif
  	<h2 class="page-header text-info">Editar Noticia</h2>
</div>
<form method="POST" action="{{route('updateNoticia')}}" enctype="multipart/form-data">
	<input type="hidden" name="_token" value="{{ csrf_token() }}" />
  <input type="hidden" name="id" value="{{$listnoticias->id}}">
  <div class="form-group col-md-12">
    <div class="col-md-5">
      <label for="titulo" class="col-sm-2 form-label">Titulo</label>
      <input type="text" value="{{$listnoticias->titulo}}" class="form-control" id="titulo" name="titulo" placeholder="Titulo" required="required">
    </div>
    <div class=" col-md-6 col-md-offset-1">
      <label for="desc" class="col-sm-2 form-label">Descrição</label>
      <input type="text"  value="{{$listnoticias->descricao}}" class="form-control" id="desc" name="descricao" placeholder="Descrição" required="required">
    </div>
  </div>
  <div class="form-group col-md-12"">
    <div class="col-md-5">
      <label for="autor" class="col-sm-2 form-label">Autor</label>
      <input type="text" value="{{$listnoticias->autor}}" class="form-control" id="autor" name="autor" placeholder="Autor" required="required">
    </div>
  <div class="col-md-6 col-md-offset-1"">
      <label for="select_categoria" class="col-sm-2 form-label">Categorias</label>
      <select name="categoria_id" id="select_categoria" class="form-control" required="required">
       @foreach($listcategorias as $categoria) 
          @if($categoria->id == $listnoticias->categoria_id)
              <option selected="selected" value="{{$categoria->id}}"">{{$categoria->nome}}</option>
          @else
              <option value="value="{{$categoria->id}}"">{{$categoria->nome}}</option>
          @endif
      @endforeach 
      </select>
  </div>
  </div>
  <div class="form-group col-md-12">
      <label for="conteudo" class="col-sm-2 form-label">Conteudo</label>
      <textarea class="form-control" rows="3" id="conteudo" name="conteudo" placeholder="Conteudo" required="required">{{$listnoticias->conteudo}}</textarea>
  </div>
  <div class="form-group col-md-12">
    <label for="nome-imagem" class="form-label">Imagem</label>
    <img id="imagem_preview" src="/images/noticias/{{$listnoticias->imagem_nome}}" class="col-sm-4">
    <input type="file" onchange="alteraImagem()" id="nome-imagem" name="imagem_nome">
    <button type="submit"  class="btn btn-primary pull-right">Alterar Notícia</button>
  </div>
</form>
<script type="text/javascript">
function alteraImagem(){
  document.getElementById('imagem_preview').setAttribute('hidden','true');
}
</script>
@stop