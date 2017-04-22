<?php

namespace Feed\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

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
            Deixei comentado para nao dar problema na execução. Essa consulta serve para pegar somente as noticias dos ultimos dois meses. Isso será testado quando estiverem prontos os CRUDs.

            Por: Eliezer Borges

            $data['noticias'] = \Shoppvel\Models\Noticia::where("created_at",">", Carbon::now()->subMonths(2))->get()->orderBy('created_at','desc')->paginate(5);

        */

        return view('feed');

    }
}
