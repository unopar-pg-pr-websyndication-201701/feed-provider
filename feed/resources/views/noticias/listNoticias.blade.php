@extends('principal')
@section('conteudo')
<div class="panel-body">
  	@if(Session::has('mensagem_sucesso'))
		{!! 'OK' !!}
  	@endif
  	<h2 class="page-header text-info">Noticias</h2>
    <div class="table-responsive">
	  	<table class="table table-striped table-bordered table-hover" id="dataTables-example">
	  		<thead>
	  			<tr>
		            <th>Data</th>
		            <th>Titulo</th>
		            <th>Ação</th>
		        </tr>
		    </thead>
		    <tbody>
		    	<tr class="odd gradeX">
			    	@foreach($listnoticias as $noticia)
			        <td>{{date( 'd / m / Y', strtotime($noticia->created_at))}}</td>
			        <td>{{$noticia->titulo}}</td>
			        <td>
			        	<a href="" data-toggle="modal" data-target="#modal{{$noticia->id}}" class="btn btn-success glyphicon glyphicon-eye-open"></a>
			            <a href="editarNoticia/{{$noticia->id}}" class="btn btn-primary btn-sm">Editar</a>
			            <a href="" onclick="pegaId({{$noticia->id}})" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete-modal">Excluir</a>
			        </td>
		    	</tr>
		    	<!-- Inclui o arquivo de modal passando o objeto noticia por parametro para o arquivo incluido -->
                @include('noticias.noticia-detalhes', ['notic' => $noticia])
		    @endforeach
		    </tbody>
		</table>
		
	</div>		
</div>
@if(isset($noticia->id))
    <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span></button> 
                </div>  
                <div class="modal-body">
                   <h4 class="alert alert-danger" id="modalLabel">Deseja Excluir a Noticia</h4>
                </div>
                <div class="modal-footer">
                    <a id="sim" href="" title="Confirmar" class="btn btn-success ">Sim</a>
                	<a href="{{ route('listarNoticias') }}" title="Cancelar" class="btn btn-danger ">Não</a>
                </div>   
            </div>
        </div>
    </div>
@else
@endif
<script type="text/javascript">
	function pegaId(id){
		var idexcluir=id;
		sim.setAttribute("href","excluiNoticia/"+idexcluir);
	}	
</script>
@stop