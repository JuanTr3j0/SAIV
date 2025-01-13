<?php



namespace App\Http\Controllers;



use App\Http\Requests\StoreAtencionMenoresEdadRequest;

use App\Http\Requests\UpdateAtencionMenoresEdadRequest;



use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Validator;



use App\Models\Casos;

use App\Models\Agenda;

use App\Models\AtencionMenoresEdad;


class AtencionMenoresEdadController extends Controller

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



            $select = [

                DB::raw('SHA1(atencion_menores_edads.id) as "key"'),

                DB::raw('LPAD(`atencion_menores_edads`.`correlativo`,4,"0") as correlativo'),

                DB::raw('date_format(atencion_menores_edads.fecha, "%d/%m/%Y") as fecha'),

                DB::raw('date_format(atencion_menores_edads.hora_ingreso, "%H:%i") as horaIngreso'),

                DB::raw('date_format(atencion_menores_edads.hora_salida, "%H:%i") as horaSalida'),

                'atencion_menores_edads.caso_saiv  as casoSaiv',

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


            $programacion = query_busqueda(AtencionMenoresEdad::class, $selectBusqueda , $request->busqueda);



            $paginado = $programacion->select($select)

                ->leftJoin('casos','casos.id', '=', 'atencion_menores_edads.caso_fk')

                ->leftJoin('municipios', 'municipios.id',"=","casos.municipio_ocurrencia_fk")

                ->leftJoin('departamentos', 'departamentos.id',"=","municipios.departamento_fk")

                ->leftJoin('personas as p1', 'p1.id',"=","casos.victima_fk")

                ->leftJoin('personas as p2', 'p2.id',"=","casos.responsable_fk")

                ->where('atencion_menores_edads.estado', true)

                ->orderBy('casos.anio','Desc')

                ->orderBy('casos.mes','Desc');

            /**

             * Correlativo

             * Fecha

             * Hora Ingreso

             * Hora Salida

             */

            $ordenColumnas = $request->ordenColumnas;

            $ordenColumnas ??= [];

            

            foreach ($ordenColumnas as $key => $value) {

                $columna = (object) $value;



                if(!boolval($columna->sort ?? false) || strlen($columna->order) == 0)

                    continue;

                

                if($columna->columna === "Correlativo")
                    $paginado->orderBy('atencion_menores_edads.correlativo', $columna->order);

                else if($columna->columna === "Fecha")

                    $paginado->orderBy('atencion_menores_edads.fecha', $columna->order);

                else if($columna->columna === "Hora Ingreso")

                    $paginado->orderBy('atencion_menores_edads.hora_ingreso', $columna->order);

                else if($columna->columna === "Hora Salida")

                    $paginado->orderBy('atencion_menores_edads.hora_salida', $columna->order);

            }


            if($request->filtro !== 'Todos' && $request->filtro!== null){

                $tipo_caso = $request->filtro === 'Denuncia' ? tipo_denuncia()->denuncia:($request->filtro === 'Sin Denuncia' ? tipo_denuncia()->sin_denuncia : null);

                $paginado->whereRaw('casos.denuncia like "'.$tipo_caso.'"');

            }



            return $paginado->paginate($por_pagina);



        }catch (\Exception $e) {
            bitacora_errores('AtencionMenoresEdadController.php', $e);

            return response()->json(['error' => 'Linea -> '.$e->getLine().' Error -> '.$e->getMessage()]);

        }

    }


    /**

     * Store a newly created resource in storage.

     *

     * @param  \App\Http\Requests\StoreAtencionMenoresEdadRequest  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request)

    {

        try{

            // Valido que no exista duplicidad de correlativos

            if($request -> correlativo !== null){

                $correlativoExist = AtencionMenoresEdad::whereRaw('SHA1(id) not like "'.$request->key.'"')

                    ->where('correlativo', $request->correlativo)

                    ->where('oficina', auth()->user()->oficina)

                    ->where('estado', true)

                    ->exists();

                if($correlativoExist)

                    return response()->json(['error' => ['El correlativo '.$request->correlativo.' ya fue utilizado.']]);

                else if(intval($request->correlativo) <= 0)

                    return response()->json(['error' => ['El correlativo debe ser mayor que cero.']]);

                else

                    AtencionMenoresEdad::whereRaw('SHA1(id)  = "'.$request->key.'"')->where('estado', true)->update(['correlativo' => intval($request->correlativo)]);

            }

            // Creo o actualizo un registro

            $atencionMenores = AtencionMenoresEdad::whereRaw('SHA1(id)  like "'.$request->key.'"')->first();

            $atencionMenores ??= new AtencionMenoresEdad();

            $atencionMenores -> fecha                               =   $request -> fecha;

            $atencionMenores -> correlativo                         =   $request -> correlativo;

            $atencionMenores -> hora_ingreso                        =   $request -> horaIngreso;        

            $atencionMenores -> ubicacion_adulto_responsable        =   $request -> ubicacionAdultoResponsable;

            $atencionMenores -> ubicacion_adulto_responsable_otro   =   $request -> ubicacionAdultoResponsableOtro;

            $atencionMenores -> nombres_menor                       =   $request -> nombresMenor;

            $atencionMenores -> apellidos_menor                     =   $request -> apellidosMenor;

            $atencionMenores -> edad                                =   $request -> edad;

            $atencionMenores -> enfermo                             =   $request -> enfermo;

            $atencionMenores -> nombres_responsable                 =   $request -> nombresResponsable;

            $atencionMenores -> apellidos_responsable               =   $request -> apellidosResponsable;

            $atencionMenores -> dui_responsable                     =   $request -> duiResponsable;

            $atencionMenores -> hora_salida                         =   $request -> horaSalida;

            $atencionMenores -> caso_saiv                           =   $request -> casoSaiv;

            $atencionMenores -> oficina                             =   auth()->user()->oficina;



            if(boolval($request->casoSaiv) && ($request->codigoCaso ?? null) !== null)

                    $atencionMenores->caso_fk = Casos::where('estado', true)->whereRaw('SHA1(id) = "'.((object) $request -> codigoCaso) -> key.'"')->first()->id;

                else 

                    $atencionMenores->caso_fk = null;

            $atencionMenores -> save(); 



            // Creacion y asignacion de correlativo

            $correlativo = null;

            if($atencionMenores -> correlativo === null){

                $correlativo  = DB::select(DB::raw('select asignar_correlativo_atencion_menores_edad('.$atencionMenores->id.','.auth()->user()->oficina.') as "correlativo";'))[0]->correlativo;

            }

            $correlativo ??= $atencionMenores->correlativo;

            

            return response()->json([

                "key"           => DB::select(DB::raw("select SHA1(".$atencionMenores->id.") as 'key';"))[0]->key,

                "correlativo"   => $correlativo,

                "mensaje"       => 'Exito, se guardo el registro.', 

            ]);



        } catch (\Exception $e) {

            bitacora_errores('AtencionMenoresEdadController.php', $e);

            return response()->json(['error' => 'Linea -> '.$e->getLine().' Error -> '.$e->getMessage()]);

        }

    }



    /**

     * Display the specified resource.

     *

     * @param  \App\Models\AtencionMenoresEdad  $atencionMenoresEdad

     * @return \Illuminate\Http\Response

     */

    public function show($key)

    {  

        try {

            $select = [

                DB::raw('SHA1(id) as "key"'),

                'fecha                               as fecha',

                'correlativo                         as correlativo',

                'hora_ingreso                        as horaIngreso',

                'ubicacion_adulto_responsable        as ubicacionAdultoResponsable',

                'ubicacion_adulto_responsable_otro   as ubicacionAdultoResponsableOtro',

                'nombres_menor                       as nombresMenor',

                'apellidos_menor                     as apellidosMenor',

                'edad                                as edad',

                'enfermo                             as enfermo',

                'nombres_responsable                 as nombresResponsable',

                'apellidos_responsable               as apellidosResponsable',

                'dui_responsable                     as duiResponsable',

                'hora_salida                         as horaSalida',

                'caso_saiv                           as casoSaiv',

                'caso_fk                             as codigoCaso'

            ];



            $atencion = AtencionMenoresEdad::select($select)->whereRaw('SHA1(id)  = "'.$key.'"')->first();



            $atencion -> codigoCaso = Casos::select([

                DB::raw('SHA1(id) as "key"'), 

                DB::raw("CONCAT(`casos`.`denuncia`, ' ', LPAD(`casos`.`correlativo`, 3, '0'), '-', LPAD(casos.mes, 2, '0'), '-', casos.anio) as 'label'")]

            )->find($atencion->codigoCaso);

            

            return $atencion;

        } catch (\Throwable $th) {

            //throw $th;

        }

    }



    public function fullCalendarEvents(){

        try {

            $select = [

                DB::raw('SHA1(atencion_menores_edads.id) as "key"'),

                DB::raw("' Atención a Menor ' as title"),

                DB::raw('DATE_FORMAT(cast(concat(fecha, " ", hora_ingreso) as datetime), "%Y-%m-%dT%H:%i:%s") as start'),

                DB::raw('DATE_FORMAT(cast(concat(fecha, " ", hora_salida) as datetime), "%Y-%m-%dT%H:%i:%s") as end'),

                DB::raw('false as agendaItem')

            ];



            $selectAgenda = [

                DB::raw('SHA1(id) as "key"'),

                DB::raw('concat(title, " (Click Ver Detalles)") as "title"'),

                'start', 'end',

                DB::raw('true as agendaItem'),

            ];



            $queryAgenda = Agenda::select($selectAgenda)

            ->where('modulo', 'like', 'Cámara Gessell Atencion de Menores')

            ->where('estado', true);

            

            $query = AtencionMenoresEdad::select($select)

                ->where('estado', true)

                ->where('oficina', auth()->user()->oficina)

                ->where('fecha','!=', null)

                ->where('hora_salida', '!=', null)

                ->where('hora_ingreso', '!=', null)

                ->union($queryAgenda)

            ->where('estado', true);



            return $query->get();

        } catch (\Exception $e) {

            bitacora_errores('AtencionMenoresEdadController.php', $e);

            return response()->json(['error' => 'Linea -> '.$e->getLine().' Error -> '.$e->getMessage()]);

        }

    }



    /**

     * Remove the specified resource from storage.

     *

     * @param  \App\Models\AtencionMenoresEdad  $atencionMenoresEdad

     * @return \Illuminate\Http\Response

     */

    public function destroy(Request $request)

    {

        try{

           return AtencionMenoresEdad::whereRaw('SHA1(id)  = "'. ($request->key ?? null).'"')->update(['estado' => false]);

        } catch (\Exception $e) {

            bitacora_errores('AtencionMenoresEdadController.php', $e);

            return response()->json(['error' => 'Linea -> '.$e->getLine().' Error -> '.$e->getMessage()]);

        }

    }

}

