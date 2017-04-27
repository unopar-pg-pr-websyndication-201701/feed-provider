<?php

namespace Feed\Http\Controllers;

use Illuminate\Http\Request;
use Feed\Http\Requests;
use Carbon\Carbon;
use Feed\Models\Noticia;
use Illuminate\Models\Categoria;
use Symfony\Component\HttpFoundation\File\UploadedFile;

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

    public function listarNoticia(){
        $noticias['listnoticias'] = Noticia::all();
        return view('noticias.listNoticias', $noticias);
    }

    public function cadNoticia(){
        return view('noticias.cadNoticias');
    }

    public function salvarNoticia(Request $request){
        $noticia = new Noticia();
        $noticia->titulo = $request->titulo;
        $noticia->descricao = $request->descricao;
        $noticia->conteudo = $request->conteudo;
        $noticia->autor = $request->autor;
        $noticia->url = base_path();
        $noticia->categoria_id = "1";
        $noticia->save();

        $foto = $noticia->id.'.'.$request->file('imagem_nome')->getClientOriginalExtension();
        $request->file('imagem_nome')->move(base_path().'/public/images/noticias', $foto);
        
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
