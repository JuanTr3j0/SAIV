<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use App\Models\Persona;
use App\Http\Requests\StorePersonaRequest;
use App\Http\Controllers\Traits\TraitCasos;
use App\Http\Requests\UpdatePersonaRequest;

class PersonaController extends Controller
{
    use TraitCasos;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePersonaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePersonaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {   
        try {
            $persona = Persona::select("id")->whereRaw("SHA1(id) = '".$request->key."'");
        
            if (!$persona->exists()) {
                // Si no se encuentra ninguna persona con ese ID hash, se genera una respuesta de personas vacía o nula.
                return $this->getPersona(null);
            }
        
            // Si se encuentra la persona, se obtiene su ID real y se devuelve la información de la persona.
            return $this->getPersona($persona->first()->id);
            
        } catch (\Exception $e) {
            // En caso de que ocurra una excepción, se registra en la bitácora de errores y se devuelve una respuesta JSON con detalles del error.
            bitacora_errores('PersonaController.php', $e);
            return response()->json(['error' => 'Linea -> '.$e->getLine().' Error -> '.$e->getMessage()]);
        }        
                
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function edit(Persona $persona)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePersonaRequest  $request
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePersonaRequest $request, Persona $persona)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function destroy(Persona $persona)
    {
        //
    }

    /**
     * Método para buscar y paginar registros de personas por su DUI.
     *
     * @param Request $request La solicitud HTTP que contiene los parámetros de búsqueda y paginación.
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator Una colección paginada de resultados de la búsqueda.
    */
    public function indexPersonaDui(Request $request)
    {
        try {
            // Obtener el número de elementos por página de la solicitud, o usar 10 por defecto
            $por_pagina = $request->input('porPagina', 10);
            $busqueda = $request->input('busqueda', '');

            // Definición de las columnas a seleccionar en la consulta principal
            $select = [
                DB::raw("dui as label"),  // Selecciona el campo 'dui' como 'label'
                DB::raw("SHA1(MAX(id)) as `key`")  // Selecciona el hash MD5 del valor máximo del campo 'id' como 'key'
            ];

            // Realiza la consulta de búsqueda utilizando una función externa 'query_busqueda'
            $dui_personas = query_busqueda(Persona::class, ['dui'], $busqueda);

            // Consulta para obtener los datos paginados y agrupados
            $paginado = $dui_personas->select($select)
                ->whereRaw("dui REGEXP '^[0-9]{8}-[0-9]{1}$'")  // Filtra los resultados para que el 'dui' coincida con el patrón de formato específico
                ->groupBy('dui');  // Agrupa los resultados por el campo 'dui'

            // Si no se encuentran resultados en la consulta principal
            if ($paginado->count() == 0) {
                $label = $busqueda;
                // Verifica si la búsqueda no coincide con el patrón 'dui', de lo contrario, asigna 'N/A'
                if (!preg_match('/^[0-9]{8}-[0-9]{1}$/', $label)) {
                    $label = 'N/A';
                }

                // Crea una consulta alternativa para manejar el caso de "no aplica"
                $paginado = DB::table(DB::raw("(select '$label' AS label, null as `key`) as no_aplica_query"));
            }

            // Devuelve los resultados paginados
            return $paginado->paginate($por_pagina);

        } catch (\Exception $e) {
            // Captura cualquier excepción, registra en la bitácora de errores y devuelve una respuesta JSON con detalles del error
            bitacora_errores('PersonaController.php', $e);
            return response()->json(['error' => 'Linea -> ' . $e->getLine() . ' Error -> ' . $e->getMessage()]);
        }
    }
}
