<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\BitacoraErrores;

class BitacoraErroresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        try {
            $por_pagina = $request->porPagina;
            $por_pagina ??= 10;

            $select = [ 
                'error',
                'archivo',
                'users.email as usuario',
                DB::raw('DATE_FORMAT(bitacora_errores.created_at, "%d/%m/%Y %H:%i") as fechaCreacion')
            ];

            $selectBusqueda = [
                'users.email',
                'error',
                'archivo',
                'bitacora_errores.created_at'
            ];
            
            $bitacora = query_busqueda(BitacoraErrores::class, $selectBusqueda , $request->busqueda);

            $paginado = $bitacora->select($select)
            ->join('users', 'users.id', '=', 'bitacora_errores.usuario')
            ->orderBy('bitacora_errores.created_at', 'Desc');

            return $paginado->paginate($por_pagina);
        }catch (\Exception $e) { 
            bitacora_errores('BitacoraErroresController.php', $e);
            return response()->json(['error' => 'Linea -> '.$e->getLine().' Error -> '.$e->getMessage()]);
        }
    }
}
