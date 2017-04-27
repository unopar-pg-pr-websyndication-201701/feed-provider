@extends('principal')

@section('conteudo') 


    <table class="table">
                <a href="{{ url ('/adicionar/categoria') }}" class="btn btn-primary">Nova Categoria</a>
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nome Categoria</th>
                        <th>Ações</th>
                    </tr>
                </thead>

                @foreach ($categorias as $c)
                    <tbody>
                        <tr>

                            <td class="primary">{{$c->id}}</td>
                            <td class="primary">{{$c->nome}}</td>
                            
                            <td><a style="text-decoration:none;" href="{{url('/categorias/editar/'.$c->id)}}" class=" glyphicon glyphicon-pencil" alt="editar">Editar</a>
                            <a style="text-decoration:none;" href="{{url('categoria/remover/'.$c->id)}}" class="glyphicon glyphicon-remove" data-toggle="modal" data-target="#delete-modal">Excluir</a></td>

                        </tr>
                                        
                    </tbody>

                @endforeach
    </table>



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