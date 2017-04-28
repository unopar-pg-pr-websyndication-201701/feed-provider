<?php

namespace Feed\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table='categorias';
    protected $fillable= [
    	'nome',
    	'categoria_id'
    ];
}

