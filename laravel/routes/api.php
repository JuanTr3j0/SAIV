<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CasosController;
use App\Http\Controllers\SeguimientoJuridicoController;
use App\Http\Controllers\LudotecaController;
use App\Http\Controllers\OpcionesController;
use App\Http\Controllers\ArchivosController;
use App\Http\Controllers\ProgramacionController;
use App\Http\Controllers\AtencionMenoresEdadController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\GraficasController;
use App\Http\Controllers\BitacoraErroresController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::controller(AuthController::class)
->prefix('/auth')->group(function () {
    Route::post('iniciar/sesion', 'login')->middleware('guest');
    Route::get('refrescar/sesion', 'refrescarInfoSession');
    Route::middleware('auth:api', 'role:Super Administrador|Administrador')->group(function() {
        Route::post('index','index');
        Route::post('registro','signUp');     
        
        Route::get('logout', 'logout');
        Route::get('opciones', 'opciones');  
        Route::get('obtener/{key}', 'show');
        
        Route::delete('registro', 'destroy');   
        Route::delete('estado/{key}','destroy');
    });
});

Route::controller(OpcionesController::class)->prefix('/saiv/opciones')
->middleware('auth:api','role:Super Administrador|Administrador|Usuaria/o')->group(function (){
    Route::get('index','index');
    Route::get('municipios/{departamento}','getMunicipios');
    Route::get('seguimiento/juridico/index','indexSeguimientoJuridico');
    Route::get('ludoteca/index','indexLudoteca');
    Route::get('seguimiento/juridico/atencionBrindada/{key}','indexSeguimientoJuridicoAtencionBrindada');
});

// Archivos de Casos
Route::controller(ArchivosController::class)->prefix('/saiv/archivos')
->middleware('auth:api', 'role:Super Administrador|Administrador|Usuaria/o')->group(function (){
    Route::post('cargar/caso','cargarArchivosCaso');
    Route::get('show/caso/{key}', 'showArchivosCasos');
    Route::get('descargar/{key}','descargarArchivo');
    Route::delete('eliminar/{key}','eliminarArchivo');
    Route::delete('caso/eliminar/{key}','eliminarArchivoCaso');
    //  saiv/archivos/show/caso/{key}
});

// Modulo Casos
Route::controller(CasosController::class)->prefix('/saiv/casos')
->group(function (){
    Route::middleware('auth:api', 'role:Super Administrador|Administrador|Usuaria/o')->group(function(){
        Route::post('index','index');
        Route::post('guardar','store');
        Route::post('show','showCaso');
        Route::get('obtener/{key}','showCaso');
        Route::get('periodos','showPeriodos');
        Route::get('cantidad/{key}/{dui}','obtenerCasosPersonas');
        Route::delete('borrar','destroy'); 
    }); 
    Route::middleware('auth:api')->group(function(){
        Route::post('indexSelect','indexSelect');
    });          
});

// Modulo Seguimiento Jurídico
Route::controller(SeguimientoJuridicoController::class)->prefix('/saiv/seguimiento/juridico')
->middleware('auth:api', 'role:Super Administrador|Administrador|Usuaria/o')->group(function (){
    Route::post('index','index');  
    Route::post('guardar','store');
    Route::get('obtener/{key}','show');
    Route::get('codigos','getCodigosCasos'); 
    Route::get('fullcalendar/evenst', 'fullCalendarEvents'); 
    Route::post('OpcionesCasos','cambiarOpcionesCaso');  
    Route::delete('borrar','destroy'); 
});

// Modulo Ludoteca
Route::controller(LudotecaController::class)->prefix('/saiv/ludoteca')
->middleware('auth:api', 'role:Super Administrador|Administrador|Usuaria/o')->group(function (){
    Route::post('index','index');  
    Route::post('historico/index','indexHistorico');  
    Route::post('guardar','store');
    Route::get('obtener/{key}','show');
    Route::delete('borrar','destroy'); 
    
});

// Modulo Camara Gessell
Route::controller(ProgramacionController::class)->prefix('/saiv/camara/gessell/programacion')
->middleware('auth:api', 'role:Super Administrador|Administrador|Usuaria/o')->group(function (){
    Route::post('index','index');  
    Route::post('guardar','store');
    Route::get('obtener/{key}','show');
    Route::delete('borrar','destroy'); 
    Route::get('fullcalendar/evenst', 'fullCalendarEvents');
});

Route::controller(AtencionMenoresEdadController::class)->prefix('/saiv/camara/gessell/atencion/menores')
->middleware('auth:api', 'role:Super Administrador|Administrador|Usuaria/o')->group(function (){
    Route::post('index','index');  
    Route::post('guardar','store');
    Route::get('obtener/{key}','show');
    Route::delete('borrar','destroy'); 
    Route::get('fullcalendar/evenst', 'fullCalendarEvents');
});

// Agendas
Route::controller(AgendaController::class)->prefix('/saiv/agenda')
->middleware('auth:api', 'role:Super Administrador|Administrador|Usuaria/o')->group(function (){
    Route::post('guardar','store');
    Route::get('obtener/{key}','show');
    Route::delete('borrar','destroy'); 
    Route::get('ludoteca/fullcalendar/evenst', 'fullCalendarEventsLudoteca');
});

//Bitacoras
Route::controller(BitacoraErroresController::class)->prefix('/saiv/bitacora/errores/controller/')
->middleware('auth:api', 'role:Super Administrador|Administrador')->group(function (){
    Route::post('index','index');  
});

//Estadisticas 
Route::controller(GraficasController::class)->prefix('saiv/estadisticas/')
->middleware('auth:api', 'role:Super Administrador|Administrador')->group(function (){
    Route::post('graficas','getGrafica');  
    Route::get('periodos','getPeriodos');  
});
