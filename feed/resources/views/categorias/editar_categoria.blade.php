@extends('principal')
@section('conteudo') 
<div class="panel-body">
<h2 class="page-header text-info">Edição de Categorias</h2>
 {!!Form::model($categorias, array('url'=> array('categorias/salvar'),'method' => 'post')) !!}
            
        <div class="col-xs-5">
            {{Form::label('nome','Nome da Categoria')}}
            {{Form::text('nome', null, array('placeholder'=>'', 'class'=>'form-control'))}}
            {!! Form::hidden('id') !!}
        </div>
        <div class="col-xs-8" style="margin-left: 100px; margin-top:30px;">
            <a href="{{url('categorias')}}"><input type="submit" class="btn btn-outline btn-primary" size="" name="" value="Salvar" ></a>
            <a href="{{ url ('categorias') }}"><input type="button" class="btn btn-outline btn-danger " name="" value="Cancelar" style="margin-left: 10px;"></a>
        </div>         
    {{Form::close()}}

    
</div>
@stop