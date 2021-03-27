<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Propiedad extends Model
{
    use Sluggable;
    public function sluggable(): array {
        return [
            'slug' => [
                'source' => 'titulo'
            ]
        ];
    }

    //Para cambiar el nombre de la tabla
    //protected $table = 'propiedades'
}
