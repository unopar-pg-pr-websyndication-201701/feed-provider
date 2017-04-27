@extends('principal')
@section('conteudo')
<div class="panel-body">
  	@if(Session::has('mensagem_sucesso'))
		{!! 'OK' !!}
  	@endif
  	<h2 class="page-header text-info">Noticias</h2>
    <div class="table-responsive">
	  	<table class="table table-striped table-bordered table-hover" id="tabela_noticias">
	  		<thead>
	  			<tr>
		            <th>Data</th>
		            <th>Titulo</th>
		            <th>Ação</th>
		        </tr>
		    </thead>
		    <tbody>
		    	<tr class="odd gradeX">
			    	@foreach($listnoticias as $notice)
			        <td>{{$notice->created_at}}</td>
			        <td>{{$notice->titulo}}</td>
			        <td>
			        	<a href="" data-toggle="modal" data-target="#myModal" class="btn glyphicon glyphicon-eye-open"></a>
			            <a href="" class="btn btn-primary btn-sm">editar</a>
			            <a  onclick="confirmacao()" class="btn btn-danger btn-sm">excluir</a>
			        </td>
		    	</tr>
		    @endforeach
		    </tbody>
		</table>
			<!-- Inclui o arquivo de modal passando o objeto noticia por parametro para o arquivo incluido -->
                @include('noticias.noticia-detalhes') <!-- , ['notic' => $noticia] -->
	</div>		
</div>
<script type="text/javascript">
	function confirmacao(){
		var confirmacao=confirm('Confirma a exclusão da notícia?');
		if(confirmacao){
			location.href="excluiNoticia/{{$notice->id}}";
		}
	}
</script>
@stop