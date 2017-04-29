<?php

namespace Feed\Http\Controllers;

use Illuminate\Http\Request;
use Feed\Http\Requests;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\UploadedFile;
//use Symfony\Component\HttpFoundation\File\UploadedFile;

class ImagemController extends Controller {

    function getImagemFile($nome) {
        $imagem = Storage::disk('public')->get($nome);
        return response($imagem,200)->header('Content-Type', 'image/jpeg');
    }

    static function setImagemFile($file) {
		$imagemNome = $file->getClientOriginalName();
        Storage::disk('public')->put($imagemNome, File::get($file));
        return $imagemNome;
    }

}
