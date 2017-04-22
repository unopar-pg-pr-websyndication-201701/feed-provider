@extends('principal')

@section('conteudo')
    
    <!-- Estrutura de exemplo para exibição do card da noticia -->
    <div class="list-group">
        <div class="col-md-3">Imagem</div>
        <div class="col-md-9">
            <div class="list-group-item">
                <h3><a href="">Titulo da Noticia</a></h3>
                <p>Data da Publicação por Nome Autor</p>
            </div>
            <div class="list-group-item">
                <article>
                   <a href=''>Leia mais...</a>
                </article>
            </div>
        </div>
    </div>

@stop