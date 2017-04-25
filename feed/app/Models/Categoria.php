<?php

namespace Feed;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = [
    	'nome'
    ];

    
    public function noticias(){
    	return $this->hasMany(Noticia::class);
    }
}
