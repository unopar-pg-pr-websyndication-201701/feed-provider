<?php

namespace Feed\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use \Feed\Models\Noticia;

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
    public function getNoticiaDetalhes()

    {
        
        return view('noticias.noticia-detalhes');

    }

    public function listarNoticias(){
        return view('noticias.listarNoticias');
    }
    public function cadastrarNoticia(){
        return view('noticias.cadastrarNoticia');
    }

    public function cadastroNoticia(Request $request){
        $noticia=new Noticia;
        $noticia=$request->all();
     
        $noticia->save();
    }
}
