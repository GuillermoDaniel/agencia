<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Propiedad;

class PropiedadesController extends Controller
{
    function createPropiedad(Request $request){
        $propiedad = new Propiedad;
        $propiedad->titulo = "Departamentos edificio Torre Empresarial";
        $propiedad->descripcion = "Hermosos departamentos en una zona exclusiva";
        $propiedad->precio = 1345000.00;
        $propiedad->localizacion = "Centro VHSA";
        $propiedad->area = "450m2";
        $propiedad->cuartos = 2;
        $propiedad->banios = 2;
        $propiedad->garages = 2;
        $propiedad->categoria_id = 1;
        if($propiedad->save()){
            $data = array(
                'status' => 'success',
                'message' => 'Propiedad creada correctamente',
                'propiedad' => $propiedad
            );
        }else{
            $data = array(
                'status' => 'error',
                'message' => 'Propiedad no fue creada correctamente'
            );
        }
    
        return response()->json($data);
        }

    function listPropiedades(Request $request){
    $data = Propiedad::paginate(4);
    return response()->json($data);
    }
    function detallePropiedad(Request $request, $slug){
        $propiedad = Propiedad::where('slug', $slug)->first();
        if($propiedad){
            $data = $propiedad;
        }else{ 
            return abort(404);
    }
        return response()->json($data);
    }
}
