<?php

namespace Feed\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Feed\Models\Noticia;


class FeedController extends Controller
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
    public function getFeed()

    {
        /*
           Essa consulta serve para pegar somente as noticias dos ultimos dois meses. Isso será testado quando estiverem prontos os CRUDs.
        */

        $data['noticias'] = Noticia::where("created_at",">", Carbon::now()->subMonths(2))->orderBy('created_at', 'desc')->get();

        //dd($data['noticias']);

        return view('feed', $data);

    }
}
