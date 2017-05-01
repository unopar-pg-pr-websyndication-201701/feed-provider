<?php

namespace Feed\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Feed\Models\Noticia;

class RssController extends Controller
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
    public function gerarRss()

    {
        $data['noticias'] = Noticia::where("created_at",">", Carbon::now()->subMonths(2))->orderBy('created_at','desc')->get();   

        

    }
}
