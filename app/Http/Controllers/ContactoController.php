<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contacto;
use App\Agente;

class ContactoController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }

    public function saveContacto(Request $request){
   //recibir la informacion del formulario
   $nombre = $request->input('inputName');
   $correo = $request->input('inputEmail');
   $comentario = $request->input('inputMessage');
   $propiedad_id = $request->input('propiedad_id');

$agente= Agente::where('propiedad_id', $propiedad_id)->latest('id')->first();
        //mailtrap
   $contacto = new contacto();
   $contacto->nombre=$nombre;
   $contacto->correo=$correo;
   $contacto->comentario=$comentario;
   $contacto->propiedad_id=$propiedad_id;
   $contacto->agente_id=$agente->id;
   //$contacto->agente_id=1;
   if($contacto->save()){
    $data = array(
        'status' => 'success',
        'message' => 'Contacto guardado correctamente',
        'contacto' => $contacto
    );
   }else{
    $data = array(
        'status' => 'error',
        'message' => 'Contacto no fue guardado correctamente'
    );
   }    
   return response()->json($data);
    }

}
