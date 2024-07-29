<?php



namespace App\Http\Controllers;



use App\Http\Requests\StoreLudotecaRequest;

use App\Http\Requests\UpdateLudotecaRequest;



use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Validator;



// Modelos

use App\Models\Casos;

use App\Models\Agenda;

use App\Models\Persona;

use App\Models\Ludoteca;

use App\Models\LudotecaTipoViolencia;



class LudotecaController extends Controller

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

                'p1.telefono_movil',

                'p1.telefono_casa',

                'p1.otra_nacionalidad',

                'p1.nacionalidad',

                'p1.empresa',

                DB::raw("CONCAT(p1.primer_nombre,' ',p1.segundo_nombre,' ',p1.primer_apellido,' ',p1.segundo_apellido)"),

                'p2.dui',

                'p2.telefono_movil',

                'p2.telefono_casa',

                'p2.otra_nacionalidad',

                'p2.nacionalidad',

                'p2.empresa',

                DB::raw("CONCAT(p2.primer_nombre,' ',p2.segundo_nombre,' ',p2.primer_apellido,' ',p2.segundo_apellido)"),

            ];

            $select = [

                DB::raw('SHA1(ludotecas.id) as "key"'),

                DB::raw("concat(`casos`.`denuncia`,' ', LPAD(`casos`.`correlativo`,3,'0'), '-',LPAD( `casos`.`mes`,2,'0'), '-', `casos`.`anio`) as codigo"),

                'ludotecas.tipo_atencion as tipoAtencion',

                DB::raw('DATE_FORMAT(ludotecas.tipo_atencion_fecha_hora, "%d/%m/%Y %H:%i") as tipoAtencionFechaHora'),

                DB::raw('DATE_FORMAT(ludotecas.proxima_cita, "%d/%m/%Y %H:%i") as proximaCita'),

                DB::raw("CONCAT(pp1.primer_nombre, ' ', pp1.segundo_nombre ,' ', pp1.primer_apellido ,' ', pp1.segundo_apellido) responsable"),

                DB::raw("CONCAT(pp2.primer_nombre, ' ', pp2.segundo_nombre ,' ', pp2.primer_apellido ,' ', pp2.segundo_apellido) adolecenteNino"),

            ];

            $ludoteca = query_busqueda(Ludoteca::class, $selectBusqueda , $request->busqueda);



            $paginado = $ludoteca->select($select)

                ->join('casos','casos.id', '=', 'ludotecas.caso_fk')

                ->leftJoin('municipios', 'municipios.id',"=","casos.municipio_ocurrencia_fk")

                ->leftJoin('departamentos', 'departamentos.id',"=","municipios.departamento_fk")

                ->leftJoin('personas as pp1', 'pp1.id', "=", "ludotecas.responsable_fk")

                ->leftJoin('personas as pp2', 'pp2.id', "=", "ludotecas.adolecente_nino_fk")

                ->leftJoin('personas as p1', 'p1.id', "=", "casos.responsable_fk")

                ->leftJoin('personas as p2', 'p2.id', "=", "casos.responsable_fk")

                ->where( function ($query)

                    {

                        $query->where('casos.denuncia','like', tipo_denuncia()->denuncia)
                        ->orWhere('casos.denuncia','like', tipo_denuncia()->sin_denuncia);

                    }

                )

            ->where('ludotecas.estado', true);



            foreach ($ordenColumnas as $key => $value) {

                $columna = (object) $value;



                if(!boolval($columna->sort ?? false) || strlen($columna->order) == 0)

                    continue;



                if($columna->columna === "Fecha y Hora Atención")

                    $paginado->orderBy('ludotecas.tipo_atencion_fecha_hora', $columna->order);

                else if($columna->columna === "Código")

                    $paginado->orderBy('casos.denuncia', $columna->order)->orderBy('casos.anio', $columna->order)->orderBy('casos.correlativo', $columna->order);

                else if($columna->columna === "Tipo Atención")

                    $paginado->orderBy('ludotecas.tipo_atencion', $columna->order);

                else if($columna->columna === "Próxima Cita")

                    $paginado->orderBy('ludotecas.proxima_cita', $columna->order);

                else if($columna->columna === "Responsable")

                    $paginado

                    ->orderBy('pp1.primer_nombre', $columna->order)

                    ->orderBy('pp1.segundo_nombre', $columna->order)

                    ->orderBy('pp1.primer_apellido', $columna->order)

                    ->orderBy('pp1.segundo_nombre', $columna->order);

                else if($columna->columna === "Niña, Niño o Adolescente")

                    $paginado

                    ->orderBy('pp2.primer_nombre', $columna->order)

                    ->orderBy('pp2.segundo_nombre', $columna->order)

                    ->orderBy('pp2.primer_apellido', $columna->order)

                    ->orderBy('pp2.segundo_nombre', $columna->order);

            }

            if($request->filtro !== 'Todos' && $request->filtro!== null){

                $tipo_caso = $request->filtro === 'Denuncia' ? tipo_denuncia()->denuncia:($request->filtro === 'Sin Denuncia' ? tipo_denuncia()->sin_denuncia : null);

                $paginado->whereRaw('casos.denuncia like "'.$tipo_caso.'"');

            }



            return $paginado->paginate($por_pagina);



        }catch (\Exception $e) {

            bitacora_errores('LudotecaController.php', $e);

            return response()->json(['error' => 'Linea -> '.$e->getLine().' Error -> '.$e->getMessage()]);

        }

    }

    public function indexHistorico(Request $request)

    {

        try {

            $por_pagina = $request->porPagina;

            $por_pagina ??= 10;

            $ordenColumnas = $request->ordenColumnas;

            $ordenColumnas ??= [];



            $select = [

                DB::raw('SHA1(ludotecas.id) as "key"'),

                DB::raw("concat(`casos`.`denuncia`,' ', LPAD(`casos`.`correlativo`,3,'0'), '-',LPAD( `casos`.`mes`,2,'0'), '-', `casos`.`anio`) as codigo"),

                'ludotecas.tipo_atencion as tipoAtencion',

                DB::raw('DATE_FORMAT(ludotecas.tipo_atencion_fecha_hora, "%d/%m/%Y %H:%i") as tipoAtencionFechaHora'),

                DB::raw('DATE_FORMAT(ludotecas.proxima_cita, "%d/%m/%Y %H:%i") as proximaCita'),

                DB::raw("CONCAT(pp1.primer_nombre, ' ', pp1.segundo_nombre ,' ', pp1.primer_apellido ,' ', pp1.segundo_apellido) responsable"),

                DB::raw("CONCAT(pp2.primer_nombre, ' ', pp2.segundo_nombre ,' ', pp2.primer_apellido ,' ', pp2.segundo_apellido) adolecenteNino"),

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

                'p1.telefono_movil',

                'p1.telefono_casa',

                'p1.otra_nacionalidad',

                'p1.nacionalidad',

                'p1.empresa',

                DB::raw("CONCAT(p1.primer_nombre,' ',p1.segundo_nombre,' ',p1.primer_apellido,' ',p1.segundo_apellido)"),

                'p2.dui',

                'p2.telefono_movil',

                'p2.telefono_casa',

                'p2.otra_nacionalidad',

                'p2.nacionalidad',

                'p2.empresa',

                DB::raw("CONCAT(p2.primer_nombre,' ',p2.segundo_nombre,' ',p2.primer_apellido,' ',p2.segundo_apellido)"),

            ];



            $ludoteca = query_busqueda(Ludoteca::class, $selectBusqueda , $request->busqueda);



            $paginado = $ludoteca->select($select)

                ->join('casos','casos.id', '=', 'ludotecas.caso_fk')

                ->leftJoin('municipios', 'municipios.id',"=","casos.municipio_ocurrencia_fk")

                ->leftJoin('departamentos', 'departamentos.id',"=","municipios.departamento_fk")

                ->leftJoin('personas as pp1', 'pp1.id', "=", "ludotecas.responsable_fk")

                ->leftJoin('personas as pp2', 'pp2.id', "=", "ludotecas.adolecente_nino_fk")

                ->leftJoin('personas as p1', 'p1.id', "=", "casos.responsable_fk")

                ->leftJoin('personas as p2', 'p2.id', "=", "casos.responsable_fk")

                ->where( function ($query)

                    {

                        $query->where('casos.denuncia','like', tipo_denuncia()->denuncia)

                        ->orWhere('casos.denuncia','like', tipo_denuncia()->sin_denuncia);

                    }

                )

            ->where('ludotecas.estado', true);



            foreach ($ordenColumnas as $key => $value) {

                $columna = (object) $value;



                if(!boolval($columna->sort ?? false) || strlen($columna->order) == 0)

                    continue;



                if($columna->columna === "Fecha y Hora Atención")

                    $paginado->orderBy('ludotecas.tipo_atencion_fecha_hora', $columna->order);

                else if($columna->columna === "Código")

                    $paginado->orderBy('casos.denuncia', $columna->order)->orderBy('casos.anio', $columna->order)->orderBy('casos.correlativo', $columna->order);

                else if($columna->columna === "Tipo Atención")

                    $paginado->orderBy('ludotecas.tipo_atencion', $columna->order);

                else if($columna->columna === "Próxima Cita")

                    $paginado->orderBy('ludotecas.proxima_cita', $columna->order);

                else if($columna->columna === "Responsable")

                    $paginado

                    ->orderBy('pp1.primer_nombre', $columna->order)

                    ->orderBy('pp1.segundo_nombre', $columna->order)

                    ->orderBy('pp1.primer_apellido', $columna->order)

                    ->orderBy('pp1.segundo_nombre', $columna->order);

                else if($columna->columna === "Niña, Niño o Adolescente")

                    $paginado

                    ->orderBy('pp2.primer_nombre', $columna->order)

                    ->orderBy('pp2.segundo_nombre', $columna->order)

                    ->orderBy('pp2.primer_apellido', $columna->order)

                    ->orderBy('pp2.segundo_nombre', $columna->order);

            }

            

            $paginado->whereRaw('SHA1(casos.id) like ?', ($request->filtro ?? 'XXXX'));            



            return $paginado->paginate($por_pagina);



        }catch (\Exception $e) {

            bitacora_errores('LudotecaController.php', $e);

            return response()->json(['error' => 'Linea -> '.$e->getLine().' Error -> '.$e->getMessage()]);

        }

    }



    /**

     * Store a newly created resource in storage.

     *

     * @param  \App\Http\Requests\StoreLudotecaRequest  $request

     * @return \Illuminate\Http\Response

     */

    public function store(StoreLudotecaRequest $request)

    {

        try{

            $validator = Validator::make($request->all(), [

                    'codigoCaso'   => "required",

                    //'tipoAtencion' => "required",

                    'proximaCita'  => "nullable|date",

                ]

            );



            if($validator->fails()) { return response()->json(['error'=>$validator->errors()->all()]); }



            $_adolecente_nino = $this->guardarActualizarPersona((object) $request->ninoAdolecente);

            $_responsable = $this->guardarActualizarPersona((object) $request->responsable);



            $caso_fk = Casos::whereRaw('SHA1(id) = "'.((object) $request -> codigoCaso) -> key.'"')->first()->id;



            $ludoteca = Ludoteca::whereRaw('SHA1(id) like "' . $request->key . '"')->first();

            $ludoteca ??= new Ludoteca();

            $ludoteca -> caso_fk                                = $caso_fk;

            $ludoteca -> parentesco_responsable                 = $request -> parentescoResponsable;

            $ludoteca -> parentesco_responsable_otro            = $request -> parentescoResponsableOtro;

            $ludoteca -> tipo_atencion                          = $request -> tipoAtencion;

            $ludoteca -> escolaridad                            = $request -> escolaridad;

            $ludoteca -> tipo_atencion_fecha_hora               = $request -> tipoAtencion_fecha_hora;

            $ludoteca -> orientacion_responsables               = $request -> orientacionResponsables;

            $ludoteca -> orientacion_responsables_fecha_hora    = $request -> orientacionResponsables_fecha_hora;

            $ludoteca -> proxima_cita                           = $request -> proximaCita;

            // Llaves Foreaneas

            if($_adolecente_nino!==null) $ludoteca -> adolecente_nino_fk = $_adolecente_nino -> id;

            if($_responsable!==null)     $ludoteca -> responsable_fk     = $_responsable     -> id;

            $ludoteca -> save();



            // Tipos de Violencia

            LudotecaTipoViolencia::where('ludoteca_fk', $ludoteca->id)->delete();

            foreach ($request->tipoViolencia as $key => $value) {

                $tipo_violencia = new LudotecaTipoViolencia();

                $tipo_violencia -> opcion = $value;

                $tipo_violencia -> ludoteca_fk = $ludoteca -> id;

                $tipo_violencia -> save();

            }



            return response()->json([

                "mensaje" => 'Exito, se guardo el registro.', 

                "key" => DB::select(DB::raw("select SHA1(".$ludoteca->id.") as 'key';"))[0]->key,

                "ninoAdolecenteKey" => DB::select(DB::raw("select SHA1(".$ludoteca->adolecente_nino_fk.") as 'key';"))[0]->key,

                "responsableKey" => DB::select(DB::raw("select SHA1(".$ludoteca->responsable_fk.") as 'key';"))[0]->key,

            ]);



        } catch (\Exception $e) {

            bitacora_errores('LudotecaController.php', $e);

            return response()->json(['error' => 'Linea -> '.$e->getLine().' Error -> '.$e->getMessage()]);

        }

    }



    private function guardarActualizarPersona($_persona){

        try{

            //$persona = Persona::whereRaw('dui = "'.$_persona->dui.'"')->first();

            $persona ??= Persona::whereRaw('SHA1(id) = "'.$_persona->key.'"')->first();

            $persona ??= new Persona;

            $persona->dui              =  trim($_persona->dui ?? null);

            $persona->fecha_nacimiento =  $_persona->fechaNacimiento ?? null;

            $persona->primer_nombre    =  ucfirst($_persona->primerNombre ?? null);

            $persona->segundo_nombre   =  ucfirst($_persona->segundoNombre ?? null);

            $persona->primer_apellido  =  ucfirst($_persona->primerApellido ?? null);

            $persona->segundo_apellido =  ucfirst($_persona->segundoApellido ?? null);

            $persona->zona_residencial =  $_persona->areaResidencial ?? null;

            $persona->telefono_movil   =  $_persona->telefonoMovil ?? null;

            $persona->empresa          =  $_persona->empresaMovil ?? null;

            $persona->telefono_casa    =  $_persona->telefonoCasa ?? null;

            $persona->save();



            return $persona;

        } catch (\Exception $e) {

            bitacora_errores('LudotecaController.php', $e);

            return response()->json(['error' => 'Linea -> '.$e->getLine().' Error -> '.$e->getMessage()]);

        }

    }



    /**

     * Display the specified resource.

     *

     * @param  \App\Models\Ludoteca  $ludoteca

     * @return \Illuminate\Http\Response

     */

    public function show(Ludoteca $ludoteca, $_key)
    {

        try{

            $select = [

                DB::raw('SHA1(id) as "key"'),

                'caso_fk                                as codigoCaso',

                'id                                     as tipoViolencia',

                'escolaridad                            as escolaridad',

                'parentesco_responsable                 as parentescoResponsable',

                'parentesco_responsable_otro            as parentescoResponsableOtro',

                'tipo_atencion                          as tipoAtencion',

                'tipo_atencion_fecha_hora               as tipoAtencion_fecha_hora',

                'orientacion_responsables               as orientacionResponsables',

                'orientacion_responsables_fecha_hora    as orientacionResponsables_fecha_hora',

                'proxima_cita                           as proximaCita',

                'adolecente_nino_fk                     as ninoAdolecente',

                'responsable_fk                         as responsable',

            ];



            $ludoteca = $ludoteca::select($select)->whereRaw('SHA1(id) like "'.$_key.'"')->first();

            $ludoteca -> ninoAdolecente = $this->getPersona($ludoteca->ninoAdolecente);

            $ludoteca -> responsable = $this->getPersona($ludoteca->responsable);



            $ludoteca -> codigoCaso = Casos::select([

                DB::raw('SHA1(id) as "key"'), 

                DB::raw("CONCAT(`casos`.`denuncia`, ' ', LPAD(`casos`.`correlativo`, 3, '0'), '-', LPAD(casos.mes, 2, '0'), '-', casos.anio) as 'label'")]

            )->find($ludoteca->codigoCaso);



            $ludoteca -> tipoViolencia = LudotecaTipoViolencia::where(

                'ludoteca_fk', $ludoteca->tipoViolencia

            )->get()->map( function ($item) {return $item->opcion;});



            return $ludoteca;

        } catch (\Exception $e) {

            bitacora_errores('LudotecaController.php', $e);

            return response()->json(['error' => 'Linea -> '.$e->getLine().' Error -> '.$e->getMessage()]);

        }

    }



    private function getPersona($_key){

        try{



            $select = [

                DB::raw('SHA1(id) as "key"'),

                'dui               as  dui',

                'fecha_nacimiento  as  fechaNacimient',

                'primer_nombre     as  primerNombre',

                'segundo_nombre    as  segundoNombre',

                'primer_apellido   as  primerApellido',

                'segundo_apellido  as  segundoApellido',

                'zona_residencial  as  areaResidencia',

                'telefono_movil    as  telefonoMovi',

                'empresa           as  empresaMovi',

                'telefono_casa     as  telefonoCas',

            ];            

            $persona = Persona::select($select)->findOrFail($_key);



            return $persona;

        } catch (\Exception $e) {

            bitacora_errores('LudotecaController.php', $e);

            return response()->json(['error' => 'Linea -> '.$e->getLine().' Error -> '.$e->getMessage()]);

        }

    }



    /**

     * Remove the specified resource from storage.

     *

     * @param  \App\Models\Ludoteca  $ludoteca

     * @return \Illuminate\Http\Response

     */

    public function destroy(Request $request)

    {

        try{

            $_update = Ludoteca::whereRaw('SHA1(id) like "'.$request->key.'"')->update(['estado'=>false]);

            

            if(!$_update)

                abort(505, 'No se Elimino el Registro de Seguimiento Jurídico [Error 505]'); 



            return response()->json([

                "mensaje" => 'Exito, Registro Eliminado.', 

            ]);

        }catch (\Exception $e) { 

            bitacora_errores('LudotecaController.php', $e);

            return response()->json(['error' => 'Linea -> '.$e->getLine().' Error -> '.$e->getMessage()]);

        }        

    }

}

