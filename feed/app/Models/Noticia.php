<?php

namespace Feed\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Models\Categoria;

class Noticia extends Model
{
    protected $fillable = [
		'titulo',
		'subtitulo',
		'descricao',
		'conteudo',
		'autor',
		'categoria_id',
		'imagem_nome',
		'data'
	];

}
