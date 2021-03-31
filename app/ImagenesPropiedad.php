<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImagenesPropiedad extends Model
{
    //
    protected $appends = ['url_imagen'];

    public function getUrlImagenAttribute(){
        return "/images/propiedades/".$this->propiedad_id."/".$this->nombre_archivo;

    }
    public function propiedad(){
        return $this->belongsTo(Propiedad::class);
    }
}
