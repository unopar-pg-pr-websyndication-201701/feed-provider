<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*<<<<<<< HEAD

Route::get('/', function () {
    return view('home');
});
=======
>>>>>>> bef241fd4b67987b7a3892c0216091aaccad8c34*/

Auth::routes();

Route::get('/', 'HomeController@index');

Route::get('feed', [
    'as' => 'feed.listar',
    'uses' => 'FeedController@getFeed'
]);

Route::get('noticia/', [
    'as' => 'noticia.detalhes',
    'uses' => 'NoticiaController@getNoticiaDetalhes'
]);
Route::get('teste',function(){
	echo 'TESTE';
});

//rotas categorias

Route::get('/categorias','CategoriaController@listaCategorias');
Route::get('/adicionar/categoria','CategoriaController@novaCategoria');
Route::post('categoria/adiciona','CategoriaController@adicionarCategoria');
Route::get('categorias/remove/{id}','CategoriaController@removerCategoria');
Route::get('/categorias/editar/{id?}','CategoriaController@alterarCategoria');
Route::post('categorias/salvar','CategoriaController@salvarCategoria');