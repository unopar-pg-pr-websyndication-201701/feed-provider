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
        $title = $xmlDoc->createElement('title');
        $title = $channel->appendChild($title);

        //Elemento <link>
        $link = $xmlDoc->createElement('link');
        $link = $channel->appendChild($link);

        //Elemento <description>
        $description = $xmlDoc->createElement('description');
        $description = $channel->appendChild($description);

        //Elemento <language>
        $language = $xmlDoc->createElement('language');
        $language = $channel->appendChild($language);

        //Elemento <image> ->
        $image = $xmlDoc->createElement('image');
        $image = $channel->appendChild($image);

        //Elemento <title> ->
        $title2 = $xmlDoc->createElement('title');
        $title2 = $image->appendChild($title2);

        //Elemento <url> ->
        $url = $xmlDoc->createElement('url');
        $url = $image->appendChild($url);

        //Elemento <link> ->
        $link2 = $xmlDoc->createElement('link');
        $link2 = $image->appendChild($link2);

        foreach ($noticias as $noticia) {
            //Elemento <item>
            $item = $xmlDoc->createElement('item');
            $item = $channel->appendChild($item);

            $linkItem = $xmlDoc->createElement('link');
            $linkItem->setAttribute('href',''.$noticia->url.'');
            $linkItem = $item->appendChild($linkItem);

            $titleItem = $xmlDoc->createElement('title', $noticia->titulo);
            $titleItem = $item->appendChild($titleItem);

            $descriptionItem = $xmlDoc->createElement('description', $noticia->descricao);
            $descriptionItem = $item->appendChild($descriptionItem);

        }

        header("Content-Type: text/xml");
        $xmlDoc->save("RSS.xml");
        $rss = $xmlDoc->saveXML();
        Storage::disk('public')->put('RSS.xml',$rss);

        return \Redirect::back()
            ->with('mensagens-sucesso', 'Feed RSS Gerado com Sucesso !!!');
    }

    function mostrarRSS(){

        $this->gerarRSS();

        $xmlDoc = new \DOMDocument('1.0','utf-8');
        $RSS = Storage::disk('public')->get('RSS.xml');
        $xmlDoc->load(base_path().'/public/RSS.xml');
        print $xmlDoc->saveXML();
        header("Content-Type: text/xml");
        die();
    }
}