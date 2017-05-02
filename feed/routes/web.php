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


Route::get('/', function () {
    return view('home');
});

Route::get('/noticia/{$url?}', 'NoticiaController@exibirNoticia');

Auth::routes();

Route::get('/', 'HomeController@index');

Route::get('feed', [
    'as' => 'feed.listar',
    'uses' => 'FeedController@getFeed'
]);

Route::get('atom/gerar', [
    'as' => 'atom.gerar',
    'uses' => 'AtomController@gerarAtom'
]);
Route::get('rss/gerar', [
    'as' => 'rss.gerar',
    'uses' => 'RSSController@gerarRSS'
]);


Route::get('atom', [
    'as' => 'atom',
    'uses' => 'AtomController@mostrarAtom'
]);
Route::get('RSS', [
    'as' => 'RSS',
    'uses' => 'RSSController@mostrarRSS'
]);



Route::get('noticia/', [
    'as' => 'noticia.detalhes',
    'uses' => 'NoticiaController@getNoticiaDetalhes'
]);

Route::get('listarNoticia',[
	'as'=> 'listarNoticias',
	'uses'=> 'NoticiaController@listarNoticia']);

Route::get('cadNoticia',[
	'as'=> 'cadastrarNoticia',
	'uses'=> 'NoticiaController@cadNoticia']);

Route::post('salvarNoticia',[
	'as'=>'salvarNoticia',
	'uses'=>'NoticiaController@salvarNoticia']);


Route::get('excluiNoticia/{id}',[
	'as'=>'excluiNoticia',
	'uses'=>'NoticiaController@excluirNoticia'
]);

//rotas categorias

Route::get('/categorias','CategoriaController@listaCategorias');
Route::get('/adicionar/categoria','CategoriaController@novaCategoria');
Route::post('categoria/adiciona','CategoriaController@adicionarCategoria');
Route::get('categorias/remove/{id}','CategoriaController@removerCategoria');
Route::get('/categorias/editar/{id?}','CategoriaController@alterarCategoria');
Route::post('categorias/salvar','CategoriaController@salvarCategoria');

