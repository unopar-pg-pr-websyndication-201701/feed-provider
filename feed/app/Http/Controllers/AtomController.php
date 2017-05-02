<?php

namespace Feed\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Feed\Models\Noticia;
use Feed\Http\Requests;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\UploadedFile;

class AtomController extends Controller
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
    public function gerarAtom(){

        $noticias = Noticia::where("created_at",">", Carbon::now()->subMonths(2))->orderBy('created_at','desc')->get();   

        //Iniciar documento XML
        $xmlDoc = new \DOMDocument('1.0','utf-8');
        $xmlDoc->preserveWhiteSpace = false;
        $xmlDoc->formatOutput = true;
         
        //elemento ATOM
        $xmlATOM = $xmlDoc->createElement('feed');
        $xmlATOM->setAttribute('xmlns','http://www.w3.org/2005/Atom');
        $xmlATOM = $xmlDoc->appendChild($xmlATOM);

        //Elemento <title>
        $title = $xmlDoc->createElement('title');
        $title = $xmlATOM->appendChild($title);

        //Elemento <link>
        $link = $xmlDoc->createElement('link');
        $link->setAttribute('rel','self');
        $link = $xmlATOM->appendChild($link);

        //Elemento <id>
        $id = $xmlDoc->createElement('id');
        $id = $xmlATOM->appendChild($id);

        //Elemento <author>
        $author = $xmlDoc->createElement('author');
        $author = $xmlATOM->appendChild($author);

        //Elemento <autor> -> <name>
        $nome_autor = $xmlDoc->createElement('name');
        $nome_autor = $author->appendChild($nome_autor);

        foreach ($noticias as $noticia) {
            //Elemento <entry>
            $entry = $xmlDoc->createElement('entry');
            $entry = $xmlATOM->appendChild($entry);

            $linkE = $xmlDoc->createElement('link');
            $linkE->setAttribute('href',''.$noticia->url.'');
            $linkE = $entry->appendChild($linkE);

            $titleE = $xmlDoc->createElement('title', $noticia->titulo);
            $titleE = $entry->appendChild($titleE);

            $contentE = $xmlDoc->createElement('content', $noticia->descricao);
            $contentE = $entry->appendChild($contentE);

        }

        header("Content-Type: text/xml");
        $xmlDoc->save("atom.xml");
        $atom = $xmlDoc->saveXML();
        Storage::disk('public')->put('atom.xml',$atom);

        return \Redirect::back()
            ->with('mensagens-sucesso', 'Feed Atom Gerado com Sucesso !!!');
    }

    function mostrarAtom(){

        $this->gerarAtom();

        $xmlDoc = new \DOMDocument('1.0','utf-8');
        $atom = Storage::disk('public')->get('atom.xml');
        $xmlDoc->load(base_path().'/public/atom.xml');
        print $xmlDoc->saveXML();
        header("Content-Type: text/xml");
        die();
    }

}