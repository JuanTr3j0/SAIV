<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProgramacionRequest;
use App\Models\Oficinas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

// Models
use App\Models\Programacion;
use App\Models\Casos;
use App\Models\Agenda;


class ProgramacionController extends Controller

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index(Request $request)

    {

        try {

            $por_pagina = $request->porPagina;

            $por_pagina ??= 10;

            $ordenColumnas = $request->ordenColumnas;

            $ordenColumnas ??= [];

            $user_oficina = Oficinas::select('id')->findOrFail(auth()->user()->oficina)->id;

            $select = [
                DB::raw("concat(oficinas.codigo,' ', LPAD(programacions.correlativo,3,'0'),'-', 
                LPAD(MONTH (programacions.fecha) ,2,'0'),'-', LPAD(YEAR (programacions.fecha) ,4,'0')) as codigo"),

                DB::raw('SHA1(programacions.id) as "key"'),

                DB::raw('LPAD(`programacions`.`correlativo`,4,"0") as correlativo'),

                DB::raw('date_format(programacions.fecha, "%d/%m/%Y") as fecha'),

                DB::raw('date_format(programacions.hora, "%H:%i") as hora'),

                'programacions.solicitado_por   as solicitadoPor',

                'programacions.nombres          as nombres',

                'programacions.apellidos        as apellidos',

                'programacions.caso_saiv        as casoSaiv',

                'programacions.realizada        as realizada',
              
            ];



            $selectBusqueda = [

                DB::raw('case when `casos`.`fecha_registro` is NULL

                    then

                        DATE_FORMAT(`casos`.`created_at`, "%Y-%m-%dT%H:%i")

                    else

                        DATE_FORMAT(`casos`.`fecha_registro`, "%Y-%m-%dT%H:%i")

                    end'

                ),

                DB::raw("CONCAT(`casos`.`denuncia`, ' ', LPAD(`casos`.`correlativo`, 3, '0'), '-', LPAD(casos.mes, 2, '0'), '-', casos.anio)"),

                DB::raw(" date_format(casos.fecha_hecho, \"%d/%m/%Y\")"),

                'casos.denuncia',

                'casos.institucion_remitente',

                'departamentos.departamento',

                'municipios.municipio',

                'p1.dui',

                'p1.primer_nombre',

                'p1.segundo_nombre',

                'p1.primer_apellido',

                'p1.segundo_apellido',

                'p1.telefono_movil',

                'p1.telefono_casa',

                'p1.otra_nacionalidad',

                'p1.nacionalidad',

                'p1.empresa',

                'p2.dui',

                'p2.primer_nombre',

                'p2.segundo_nombre',

                'p2.primer_apellido',

                'p2.segundo_apellido',

                'p2.telefono_movil',

                'p2.telefono_casa',

                'p2.otra_nacionalidad',

                'p2.nacionalidad',

                'p2.empresa',

            ];



            $programacion = query_busqueda(Programacion::class, $selectBusqueda , $request->busqueda);



            $paginado = $programacion->select($select)

                ->leftJoin('casos','casos.id', '=', 'programacions.caso_fk')

                ->leftJoin('municipios', 'municipios.id',"=","casos.municipio_ocurrencia_fk")

                ->leftJoin('departamentos', 'departamentos.id',"=","municipios.departamento_fk")

                ->leftJoin('personas as p1', 'p1.id',"=","casos.victima_fk")

                ->leftJoin('personas as p2', 'p2.id',"=","casos.responsable_fk")

                ->where('programacions.estado', true)

                ->orderBy('casos.anio','Desc')

                ->orderBy('casos.mes','Desc')

                //para que filtre por oficina
                -> where('programacions.oficina', $user_oficina)
                
                -> join('oficinas', 'oficinas.id', '=', 'programacions.oficina');
            /**

             * Correlativo 

             * Fecha

             * Hora

             * Solicitado Por

             * Nombres Usuaria/o

             * Apellidos Usuaria/o

             * Caso SAIV

             * Realizada

             * */



            foreach ($ordenColumnas as $key => $value) {

                $columna = (object) $value;



                if(!boolval($columna->sort ?? false) || strlen($columna->order) == 0)

                    continue;

                

                if($columna->columna === "Correlativo")

                    $paginado->orderBy('programacions.correlativo', $columna->order);

                else if($columna->columna === "Fecha")

                    $paginado->orderBy('programacions.fecha', $columna->order);

                else if($columna->columna === "Codigo")

                $paginado->orderBy('codigo', $columna->order);

                else if($columna->columna === "Hora")

                    $paginado->orderBy('programacions.hora', $columna->order);

                else if($columna->columna === "Solicitado Por")

                    $paginado->orderBy('programacions.solicitado_por', $columna->order);

                else if($columna->columna === "Nombres Usuaria/o")

                    $paginado->orderBy('programacions.nombres', $columna->order);

                else if($columna->columna === "Apellidos Usuaria/o")

                    $paginado->orderBy('programacions.apellidos', $columna->order);

                else if($columna->columna === "Realizada")

                    $paginado->orderBy('programacions.realizada', $columna->order);

                else if($columna->columna === "Caso ".\App\Models\User::select('oficinas.codigo as codigo')->join('oficinas', 'oficinas.id', '=', 'users.oficina')->findOrFail(auth()->id())->codigo)

                    $paginado->orderBy('casos.denuncia', $columna->order)->orderBy('casos.anio', $columna->order)->orderBy('casos.correlativo', $columna->order);

            }

            if($request->filtro !== 'Todos' && $request->filtro!== null){

                $tipo_caso = $request->filtro === 'Denuncia' ? tipo_denuncia()->denuncia:($request->filtro === 'Sin Denuncia' ? tipo_denuncia()->sin_denuncia : null);

                $paginado->whereRaw('casos.denuncia like "?"',[$tipo_caso]);

            }

            return $paginado->paginate($por_pagina);



        }catch (\Exception $e) {

            bitacora_errores('ProgramacionController.php', $e);

            return response()->json(['error' => 'Linea -> '.$e->getLine().' Error -> '.$e->getMessage()]);

        }

    }



    /**

     * Store a newly created resource in storage.

     *

     * @param  \App\Http\Requests\StoreProgramacionRequest  $request

     * @return \Illuminate\Http\Response

     */

    public function store(StoreProgramacionRequest $request)

    {

        try {

            if ($request->fecha === null) {
                return response()->json(['error' => ['El campo fecha no debe estar vacío']]);
            }

            // Validación inicial
            if ($request->correlativo !== null) {
        
                $correlativoExist = Programacion::where(DB::raw('SHA1(id)'), $request->key)
                    ->where('oficina', auth()->user()->oficina)
                    ->where('correlativo','<>', $request->correlativo)
                    ->where('estado', true)
                    ->whereRaw('YEAR(fecha) = YEAR(?)', [$request->fecha])
                    ->exists();
                
                if ($correlativoExist) {
                    return response()->json(['error' => ['El correlativo '.$request->correlativo.' ya fue utilizado.']]);
                } else if (intval($request->correlativo) <= 0) {
                    return response()->json(['error' => ['El correlativo debe ser mayor que cero.']]);
                } else {
                    Programacion::whereRaw('SHA1(id) = ?', [$request->key])
                        ->where('estado', true)
                        ->update(['correlativo' => intval($request->correlativo)]);
                }
            }
            $programacion = Programacion::where(DB::raw('SHA1(id)'), $request->key)->first();
            $programacion = $programacion ?? new Programacion();
        
            $programacion->correlativo = $request->correlativo;
            $programacion->fecha = $request->fecha;
            $programacion->hora = $request->hora;
            $programacion->solicitado_por = ucfirst($request->solicitadoPor);
            $programacion->nombres = ucfirst($request->nombres);
            $programacion->apellidos = ucfirst($request->apellidos);
            $programacion->caso_saiv = boolval($request->casoSaiv ?? false);
            $programacion->oficina = auth()->user()->oficina;
        
            if (boolval($request->casoSaiv ?? false) && ($request->codigoCaso ?? null) !== null) {
                $programacion->caso_fk = Casos::where(DB::raw('SHA1(id)'), ((object) $request->codigoCaso)->key)->first()->id;
            } else {
                $programacion->caso_fk = null;
            }
        
            $programacion->realizada = boolval($request->realizada);
            $programacion->save();
        
            if ($programacion->correlativo === null) {

                // Obtén el próximo valor de correlativo
                $nextCorrelativo = Programacion::whereRaw('YEAR(fecha) = YEAR(?)', [$programacion->fecha])
                    ->where('estado', true)
                    ->where('oficina', auth()->user()->oficina)
                    ->max('correlativo');
                    
                // Si no se encuentra ningún correlativo, empieza con 1
                $nextCorrelativo = $nextCorrelativo ? $nextCorrelativo + 1 : 1;

                // Actualiza el registro específico
                $programacion->correlativo = $nextCorrelativo;
                $programacion->save();
    
            }
        
            return response()->json([
                "key" => DB::table(DB::raw('programacions'))
                    ->select(DB::raw('SHA1(id) as `key`'))
                    ->where('id', '=', $programacion->id)
                    ->pluck('key')
                    ->first(),
                "correlativo" => $programacion->correlativo,
                "mensaje" => 'Éxito, se guardó el registro.',
            ]);
        } catch (\Exception $e) {
            bitacora_errores('ProgramacionController.php', $e);
            return response()->json(['error' => 'Línea -> '.$e->getLine().' Error -> '.$e->getMessage()]);
        }

    }



    /**

     * Display the specified resource.

     *

     * @param  \App\Models\Programacion  $programacion

     * @return \Illuminate\Http\Response

     */

    public function show($key)

    {

        try{

            $select = [

                DB::raw('SHA1(id) as "key"'),

                'correlativo',

                'fecha            as fecha',

                'hora             as hora',

                'solicitado_por   as solicitadoPor',

                'nombres          as nombres',

                'apellidos        as apellidos',

                'caso_saiv        as casoSaiv',

                'realizada        as realizada',

                'caso_fk          as codigoCaso'

            ];



            $programacion = Programacion::select($select)->where(DB::raw('SHA1(id)'),$key)->first();

            $programacion -> codigoCaso = Casos::select([

                DB::raw('SHA1(id) as "key"'), 

                DB::raw("CONCAT(`casos`.`denuncia`, ' ', LPAD(`casos`.`correlativo`, 3, '0'), '-', LPAD(casos.mes, 2, '0'), '-', casos.anio) as 'label'")]

            )->find($programacion->codigoCaso);

            return $programacion;



        } catch (\Exception $e) {

            bitacora_errores('ProgramacionController.php', $e);

            return response()->json(['error' => 'Linea -> '.$e->getLine().' Error -> '.$e->getMessage()]);

        }

    }

    

    public function fullCalendarEvents(){

        try {

            $select = [

                DB::raw('SHA1(id) as "key"'),

                DB::raw("concat(' Programación ',' solicitado por ', programacions.solicitado_por) as title"),

                DB::raw('DATE_FORMAT(cast(concat(fecha, " ", hora) as datetime), "%Y-%m-%dT%H:%i:%s") as start'),

                DB::raw('null as end'),

                DB::raw('false as agendaItem')

            ];



            $selectAgenda = [

                DB::raw('SHA1(id) as "key"'),

                DB::raw('concat(title, " (Click Ver Detalles)") as "title"'),

                'start', 'end',

                DB::raw('true as agendaItem')

            ];



            $queryAgenda = Agenda::select($selectAgenda)

            ->where('modulo','like','Camara Gessell Programacion')

            ->where('estado', true);

            

            $query = Programacion::select($select)

                ->where('estado', true)

                ->where('oficina', auth()->user()->oficina)

                ->where('fecha','!=', null)

                ->where('hora', '!=', null)

                ->union($queryAgenda)

            ->where('programacions.estado', true);



            return $query->get();

        } catch (\Exception $e) {

            bitacora_errores('ProgramacionController.php', $e);

            return response()->json(['error' => 'Linea -> '.$e->getLine().' Error -> '.$e->getMessage()]);

        }

    }





    /**

     * Remove the specified resource from storage.

     *

     * @param  \App\Models\Programacion  $programacion

     * @return \Illuminate\Http\Response

     */

    public function destroy(Request $request)

    {

        try{

            return Programacion::where(DB::raw('SHA1(id)'),$request->key)->update(['estado' => false]);

        } catch (\Exception $e) {

            bitacora_errores('ProgramacionController.php', $e);

            return response()->json(['error' => 'Linea -> '.$e->getLine().' Error -> '.$e->getMessage()]);

        }

    }

}

