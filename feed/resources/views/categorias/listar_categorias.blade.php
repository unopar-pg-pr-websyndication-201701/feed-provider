@extends('principal')
@section('conteudo') 
    <div class="panel-body">
        @if(Session::has('mensagem_sucesso'))
            {!! 'OK' !!}
        @endif
    <h2 class="page-header text-info">Categorias</h2>
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome Categoria</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <tr class="odd gradeX">
                    @foreach ($categorias as $c)
                        <td class="primary">{{$c->id}}</td>
                        <td class="primary">{{$c->nome}}</td>
                        <td>
                            <a href="{{url('/categorias/editar/'.$c->id)}}" class="btn btn-primary btn-sm" alt="editar">Editar</a>
                            <a href="{{url('categoria/remover/'.$c->id)}}" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete-modal">Excluir</a>
                        </td>
                </tr> 
                    @endforeach                                       
                </tbody>
        </table>
    </div>
</div>

    @if(isset($c))
    <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span></button> 
                    
                </div>  
                <div class="modal-body">
                   <h4 class="alert alert-danger" id="modalLabel">Deseja Excluir a Categoria</h4>
                </div>
                
                <div class="modal-footer">
                    
                    
                    <a href="{{action('CategoriaController@removerCategoria',$c->id)}}" title="Confirmar" class="btn btn-success ">Sim</a>
                    <a href="{{url('/categorias')}}" title="Cancelar" class="btn btn-danger ">Não</a>
                       
                    
                </div>   
            </div>
        </div>
    </div>
   @else
   @endif
@stop
