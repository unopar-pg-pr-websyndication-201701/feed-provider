<?php

namespace Feed\Http\Controllers;

use Illuminate\Http\Request;
use Feed\Http\Requests;
use Carbon\Carbon;
use Feed\Models\Noticia;
use Feed\Models\Categoria;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\UploadedFile;
//use Symfony\Component\HttpFoundation\File\UploadedFile;

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
        return view('noticias.listNoticias', $noticias);
    }

    public function cadNoticia(){
        $noticias['listcategorias'] = Categoria::all();
        return view('noticias.cadNoticias',$noticias);
    }

    function salvarNoticia(Request $request){
        $noticia = new Noticia();
        $noticia->titulo = $request->titulo;
        $noticia->descricao = $request->descricao;
        $noticia->conteudo = $request->conteudo;
        $noticia->autor = $request->autor;
        $noticia->categoria_id = $request->categoria_id;
        $url = $request->titulo;
        $url = preg_replace('/[^A-Za-z0-9_]/', '', $url);
        $noticia->url = $url;
        
            if ($request->hasFile('imagem_nome')) {
                $cam = $request->imagem_nome->storeAs('public',$url);
                    $noticia->save();
                    
                    \Session::flash('mensagens-sucesso', 'Notícia cadastrada com sucesso');
                return redirect()->action('NoticiaController@listarNoticia')->with('mensagens-sucesso', 'Notícia cadastrada com sucesso!');
            }else{
                $noticia->save();
                
                \Session::flash('mensagens-sucesso', 'Notícia cadastrada com sucesso');
                return redirect()->action('NoticiaController@listarNoticia')->with('mensagens-sucesso', 'Notícia cadastrada com sucesso e sem imagem!');
            }
        //$request['imagem_nome'] = ImagemController::setImagemFile($request['imagem_nome']);
        //$noticia->imagem_nome = $request['imagem_nome'];
        //$foto = $noticia->id.'.'.$request->file('imagem_nome')->getClientOriginalExtension();
        //$request->file('imagem_nome')->move(base_path().'/public/images/noticias', $foto);
        
    }
}
