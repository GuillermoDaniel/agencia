<?php

use Illuminate\Support\Facades\Route;
use App\Categoria;
use App\Propiedad;
use App\Http\Controllers\PropiedadesController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AgentesController;
//use App\Http\Controllers\PhotoController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//funcional
Route::get('/', function () {
   // $propiedades = Propiedad::orderBy('id', 'DESC')->paginate(5);
    return view('template');
    //['propiedades'=> $propiedades
//]);
    //$data = Categoria::all();
    //return response()->json($data);
});
//prueba
Route::get('/crearpropiedad', [PropiedadesController::class, 'createPropiedad']);
//prueba
Route::get('/listapropiedades', [PropiedadesController::class, 'listPropiedades']);
//funcional
Route::get('/propiedad/{slug}', 
[PropiedadesController::class,
 'detallePropiedad'])->name('detallepropiedad');
//prueba
Route::resource('/photos', PhotoController::class);

Route::post('/guadar/contacto',  [ContactoController::class, 'saveContacto'])->name('save.contacto');


Route::get('/propiedad/{slug}', 
[PropiedadesController::class,
 'detallePropiedad'])->name('detallepropiedad');

Route::get('/api/propiedades', function(){
    $propiedades = Propiedad::orderBy('id','DESC')->with('Categoria')->paginate(5);
    return response()->json($propiedades);
})->name('home');
//administracion de las propiedades
Route::prefix('admin')->group(function (){
    Route::get('/', [UserController::class, 'index'])->name('login');
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::get('/agentes', [AgentesController::class, 'listaAgentes'])->name('lista.agentes');
});
