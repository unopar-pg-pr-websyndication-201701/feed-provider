<?php

namespace Feed\Http\Controllers;

use Illuminate\Http\Request;
use Feed\Http\Requests;
use Carbon\Carbon;
use Feed\Models\Noticia;
use Feed\Models\Categoria;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Symfony\Component\HttpFoundation\Response;
use DB;

class NoticiaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
    
     
    public function __construct()
    {
        $this->middleware('auth');
    }
    */
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function getNoticiaDetalhes(){
        return view('noticias.noticia-detalhes');
    }

    public function exibirNoticia($id){
        $noticia = Noticia::findOrFail($id);
        $return['noticia'] = $noticia;
        return view('noticias.exibe-noticia',$return);
    }

    public function listarNoticia(){
        $noticias['listnoticias'] = Noticia::all();
        $noticias['quantas_categorias'] = DB::table('categorias')
        ->select(DB::raw('count(*) as id'));
        return view('noticias.listNoticias', $noticias);
    }

    public function cadNoticia(){
        $noticias['listcategorias'] = Categoria::all();
        return view('noticias.cadNoticias',$noticias);
    }

    public function limpaVariavel($var){
        $novo = preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$var);
        $novo = str_replace(" ", "", $novo);
        return $novo;
    }

    public function salvarNoticia(Request $request){
        $noticia = new Noticia();
        $noticia->titulo = $request->titulo;
        $noticia->descricao = $request->descricao;
        $noticia->conteudo = $request->conteudo;
        $noticia->autor = $request->autor;
        $noticia->url = NoticiaController::limpaVariavel($request->titulo);
        $noticia->categoria_id = $request->categoria_id;
        $nome_foto = NoticiaController::limpaVariavel($request->titulo);

        $foto = $request->file('imagem_nome')->getClientOriginalExtension();
        $request->file('imagem_nome')->move(base_path().'/public/images/noticias', $nome_foto.'.'.$foto);

        $noticia->imagem_nome = $nome_foto.'.'.$foto;
        $noticia->save();
        
         \Session::flash('mensagens-sucesso', 'Notícia cadastrada com sucesso');
        return redirect()->action('NoticiaController@listarNoticia')->with('mensagens-sucesso', 'Notícia cadastrada com sucesso!');
    }

    ///Exclusao de noticia 

    public function excluirNoticia($id){
        $models['noticia']=Noticia::find($id)->delete();
        \Session::flash('mensagens-sucesso', 'Excluido com Sucesso');
        return redirect()->action('NoticiaController@listarNoticia');
    }
}