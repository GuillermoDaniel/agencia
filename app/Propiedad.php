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
    protected $appends = ['precio_formato'];

    //Para cambiar el nombre de la tabla
    //protected $table = 'propiedades'

    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }

    /*public function agente(){
        return $this->hasOne(Agente::class);
    }*/

    public function agente(){
        return $this->hasMany(Agente::class);
    }

    public function imagenes_propiedad(){
        return $this->hasMany(ImagenesPropiedad::class);
    }

    public function getPrecioFormatoAttribute(){
        return "$ ".$this->precio." MX";
    }
}
