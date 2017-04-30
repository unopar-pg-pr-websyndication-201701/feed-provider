</br></br></br>
<div class="container col-md-offset-1">
    <div class="row">
        <div class="col-sm-4 col-sm-offset-1">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="text-center">Total de Notícias</h3>
                </div>
                <div class="panel-body text-center">
                    <h1 class="text-info">
                        
                    </h1>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="text-center">Total de Categorias</h3>
                </div>
                <div class="panel-body text-center">
                    <h1 class="text-info">
                        
                    </h1>
                </div>
            </div>
        </div>
    </div>
        <div class="col-sm-4 col-md-offset-3">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="text-center">Mais Vistos</h3>
                </div>
                <div class="panel-body text-center">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Data</th>
                                    <th>Titulo</th>
                            </thead>
                            <tbody>
                                <tr class="odd gradeX">
                                    @foreach($notic as $noticia)
                                    <td>{{date( 'd / m / Y', strtotime($noticia->created_at))}}</td>
                                    <td>{{$noticia->titulo}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>