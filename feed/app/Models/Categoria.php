<?php

namespace Feed\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Exception;


class Categoria extends Model
{
    protected $table='categorias';
    protected $fillable= [
    	'nome',
    	'categoria_id'
    ];

    public function noticias()
    {
        return $this->hasMany(Noticia::class);
    }
 
    protected static function boot() {
        parent::boot();
        static::deleting(function($n) {
             if ($n->noticias()->count() > 0)
            {
                return abort(503);
            }
        });
    }
}

