<?php

namespace Feed\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Feed\Models\Noticia;
use Feed\Http\Requests;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\UploadedFile;

class RSSController extends Controller
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
    public function gerarRSS(){

        $base_url = 'http://'.$_SERVER['HTTP_HOST'].'';

        $noticias = Noticia::where("created_at",">", Carbon::now()->subMonths(2))->orderBy('created_at','desc')->get();   

        //Iniciar documento XML
        $xmlDoc = new \DOMDocument('1.0','utf-8');
        $xmlDoc->preserveWhiteSpace = false;
        $xmlDoc->formatOutput = true;
         
        //elemento RSS
        $xmlRSS = $xmlDoc->createElement('rss');
        $xmlRSS->setAttribute('version','2.0');
        $xmlRSS = $xmlDoc->appendChild($xmlRSS);

        //Elemento <channel>
        $channel = $xmlDoc->createElement('channel');
        $channel = $xmlRSS->appendChild($channel);

        //Elemento <title>
        $title = $xmlDoc->createElement('title', 'Feed Provider');
        $title = $channel->appendChild($title);

        //Elemento <link>
        $link = $xmlDoc->createElement('link');
        $link->setAttribute('href',$base_url);
        $link = $channel->appendChild($link);

        //Elemento <description>
        $description = $xmlDoc->createElement('description' , 'Ultimas noticias');
        $description = $channel->appendChild($description);

        //Elemento <language>
        $language = $xmlDoc->createElement('language', 'PT-BR');
        $language = $channel->appendChild($language);

        foreach ($noticias as $noticia) {
            //Elemento <item>
            $item = $xmlDoc->createElement('item');
            $item = $channel->appendChild($item);

            $linkItem = $xmlDoc->createElement('link');
            $linkItem->setAttribute('href','http://'.$_SERVER['HTTP_HOST'].$noticia->url.'');
            $linkItem = $item->appendChild($linkItem);

            $img = '<img alt="'.$noticia->imagem_nome.'" src="'.$base_url.'/images/noticias/'.$noticia->imagem_nome.'" />';

            //Elemento <pubDate>
            $pubDate = $xmlDoc->createElement('pubDate', $noticia->created_at);
            $pubDate = $item->appendChild($pubDate);

            $titleItem = $xmlDoc->createElement('title', $noticia->titulo);
            $titleItem = $item->appendChild($titleItem);



            $descriptionItem = $xmlDoc->createElement('description', $img.$noticia->descricao);
            $descriptionItem = $item->appendChild($descriptionItem);

        }

        header("Content-Type: text/xml");
        $xmlDoc->save("RSS.xml");
        $rss = $xmlDoc->saveXML();
        Storage::disk('public')->put('RSS.xml',$rss);

        print $xmlDoc->saveXML();
        header("Content-Type: text/xml");
        die();
    }

    function mostrarRSS(){

        $this->gerarRSS();

        
    }
}