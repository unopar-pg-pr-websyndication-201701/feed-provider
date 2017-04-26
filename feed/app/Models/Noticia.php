<?php

namespace Feed\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Models\Categoria;

class Noticia extends Model
{
    protected $fillable = [
		'autor',
		'titulo',
		'descricao',
        'conteudo',
        'subtitulo',
 
	];
}
