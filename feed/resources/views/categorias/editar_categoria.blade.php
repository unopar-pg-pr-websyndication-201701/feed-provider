@extends('principal')

@section('conteudo') 


 {!!Form::model($categorias, array('url'=> array('categorias/salvar'))) !!}
            
        <div class="col-xs-5">
            {{Form::label('nome','Nome da Categoria')}}
            {{Form::text('nome', null, array('placeholder'=>'', 'class'=>'form-control'))}}
        </div>
        <div class="col-xs-8" style="margin-left: 100px; margin-top:30px;">
            <a href="{{url('/categorias')}}"><input type="submit" class="btn btn-outline btn-success" size="" name="" value="Salvar" ></a>
            <a href="{{ url ('/categorias') }}"><input type="button" class="btn btn-outline btn-warning " name="" value="Cancelar" style="margin-left: 10px;"></a>
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