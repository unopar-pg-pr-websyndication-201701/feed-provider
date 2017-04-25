@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Não é possivel inserir novos usuarios</div>
                <div class="panel-body">
                    <a href="{{url('/')}}"><div class="btn btn-primary">Voltar</div></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
