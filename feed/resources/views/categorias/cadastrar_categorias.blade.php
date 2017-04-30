@extends('principal')
@section('conteudo')
<div class="panel-body">
    <h2 class="page-header text-info">Cadastro de Categorias</h2>
</div>
    {{Form::open(array('url'=>'categoria/adiciona', 'method'=>'POST'), array('role'=> 'form'))}}
        <div class="col-xs-5">
            {{Form::label('nome','Nome da Categoria')}}
            {{Form::text('nome', null, array('placeholder'=>'', 'class'=>'form-control'))}}
        </div>
        <div class="col-xs-8" style="margin-left: 100px; margin-top:30px;">
            <a href="{{url('/categorias')}}"><input type="submit" class="btn btn-outline btn-primary" size="" name="" value="Cadastrar" ></a>
            <a href="{{ url ('/categorias') }}"><input type="button" class="btn btn-outline btn-danger " name="" value="Cancelar" style="margin-left: 10px;"></a>
        </div>         
    {{Form::close()}}

    <div class="erros_formulario" style="margin-top:150px;">

        @if (count($errors) > 0)
            <strong style="color:red;">Erros No Formulário:</strong>
                <div class="alert alert-danger fade in" style="margin-top:10px;">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
        @endif
    </div>

@stop