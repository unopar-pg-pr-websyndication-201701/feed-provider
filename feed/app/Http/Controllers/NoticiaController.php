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
<<<<<<< HEAD
        $noticia->url = base_path();
        $noticia->categoria_id = "1";

        $foto = $noticia->id.'.'.$request->file('imagem_nome')->getClientOriginalExtension();
        $request->file('imagem_nome')->move(base_path().'/public/images/noticias', $foto);

        $noticia->imagem_nome = $foto;
        $noticia->save();
=======
        $noticia->categoria_id = $request->categoria_id;
        $url = $request->titulo;
        $url = preg_replace('/[^A-Za-z0-9_]/', '', $url);
        $noticia->url = $url;
>>>>>>> e868b4ed3b6d9a6e6fde640558dd53d27cfc830b
        
        $ext = $request->file('imagem_nome')->getClientOriginalExtension();
            if ($ext != 'jpg' && $ext != 'png') {
                return back()->with('mensagens_sucesso', 'Erro: Este arquivo não é uma imagem');
            }else{
                $request->file('imagem_nome')->move('images/noticias/', $url.".".$request->file('imagem_nome')->getClientOriginalExtension());
                $caminho = $url.".".$ext;
                $noticia->imagem_nome = $caminho;
                $noticia->save();
                \Session::flash('mensagens-sucesso', 'Cadastrada com Sucesso');
                return redirect()->action('NoticiaController@listarNoticia')->with('mensagens-sucesso', 'Notícia Cadastrada com Sucesso!');
            };
    }

    ///Exclusao de noticia 

    public function excluirNoticia($id){
        $models['noticia']=Noticia::find($id)->delete();
        \Session::flash('mensagens-sucesso', 'Excluido com Sucesso');
        return redirect()->action('NoticiaController@listarNoticia');
    }
}