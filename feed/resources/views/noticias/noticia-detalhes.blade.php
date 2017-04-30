<!-- Modal -->
<div class="modal fade" id="modal{{$notic->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close btn-danger" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">
          <ol class="breadcrumb">
            <li>{{$notic->categoria['nome']}}</li>
            <li>{{$notic->titulo}}</li>
          </ol>
        </h4>
        <p>{{$notic->descricao}}</p>
      </div>
      <div class="modal-body">
          <img src="/images/noticias/{{$notic->imagem_nome}}" alt="{{$notic->imagem_nome}}" style="width: 280px; height: 200px; padding:5px 5px 5px 5px;">
        <div class="col-md-6">
          {{$notic->conteudo}}
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>