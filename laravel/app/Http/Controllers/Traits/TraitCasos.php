<?php



namespace App\Http\Controllers\Traits;



use Illuminate\Support\Facades\DB;



use App\Models\Casos;

use App\Models\Persona;

use App\Models\AgresoresCasos;

use App\Models\InstitucionSeRemitira;

use App\Models\TipoAsistencia;

use App\Models\ArchivosCasos;

use App\Models\Ingresos;

use App\Models\DelitosLeiv;

use App\Models\OtrasPersonas;

use App\Http\Requests;

use App\Exports\ExportCasos;

use Maatwebsite\Excel\Facades\Excel;



trait TraitCasos{

    public function showCaso($key){

        try{

            $whereIdCaso = 'md5(casos.id) like "'.$key.'"';

            if(!Casos::whereRaw($whereIdCaso)->where('estado', true)->exists())
                return response()->json(['error'=>'No se encontro el caso.('.$key.')'],204);

            $select = [
                DB::raw('md5(`casos`.`id`) as `key`'),
                DB::raw('case when `casos`.`fecha_registro` is NULL
                    then
                        DATE_FORMAT(`casos`.`created_at`, "%Y-%m-%d %H:%i")
                    else
                        DATE_FORMAT(`casos`.`fecha_registro`, "%Y-%m-%d %H:%i")

                    end as "fechaRegistro"'
                ),
                'denuncia                       as denuncia',
                'mes                            as mes',
                'correlativo',
                'anio                           as  anio',
                'circunstancia_del_hecho        as  circunstanciaDelHecho',
                'victima_fk                     as  victima',
                'responsable_fk                 as  responsable',
                'fecha_hecho                    as  fechaHecho',
                DB::raw('DATE_FORMAT(hora_hecho,  "%H:%i")  as  horaHecho'),
                'casos.id                       as  agresores',
                'tipos_violencia                as  tiposViolencia',
                'modalidad_violencia            as  modalidadViolencia',
                'delito_codigo_penal            as  delitoCodigoPenal',
                'delito_codigo_penal_otro       as  delitoCodigoPenalOtro',
                'departamentos.id               as  departamentoOcurrencia',
                'municipio_ocurrencia_fk        as  municipioOcurrencia',
                'institucion_remitente          as  institucionRemitente',
                'institucion_remitente_otra     as  institucionRemitenteOtra',
                "casos.id                       as  institucionSeRemite",
                "casos.id                       as  tipoAsistencia",
                "casos.id                       as  archivosCasos",
                "casos.id                       as  delitoLeivs",
            ];



            $caso = Casos::select($select)

            ->leftJoin('municipios', 'municipios.id', '=', 'casos.municipio_ocurrencia_fk')

            ->leftJoin('departamentos', 'departamentos.id', '=','municipios.departamento_fk')

            ->whereRaw($whereIdCaso)->where('casos.estado', true)->first();



            // Obtener Archivos

            $caso->archivosCasos = ArchivosCasos::select([DB::raw('md5(`archivos`.`id`) as `key`'), 'archivos.nombre_original'])

            ->where('archivos_casos.caso_fk', '=', $caso->archivosCasos)

            ->join('archivos', 'archivos.id', '=', 'archivos_casos.archivo_fk')

            ->get();



            // Obtener Personas Victima y Responsable

            $caso -> victima = $this->getPersona($caso->victima);

            $caso -> responsable = $this->getPersona($caso->responsable);



            // Obtener Agresores

            $caso -> agresores = $this->getAgresores($caso->agresores);



            // Obtener Opciones multiples

            $caso -> delitoLeivs = $this->getipoDelitosLeiv($caso->delitoLeivs);

            $caso -> tipoAsistencia = $this->getipoAsistencia($caso->tipoAsistencia);

            $caso -> institucionSeRemite = $this->getInstitucionSeRemite($caso->institucionSeRemite);



            $caso -> fechaRegistro = str_replace(' ', 'T',$caso  -> fechaRegistro); //No funciona aun



            return $caso;



        }catch (\Exception $e) {

            bitacora_errores('TraitCasos.php', $e);

            return response()->json(['error' => 'Linea -> '.$e->getLine().' Error -> '.$e->getMessage()]);

        }

    }

   

    public function getPersona ($_id){

        try{

            if( $_id === null){

                return[

                    'key'=>null,

                    'dui'=>null,

                    'primerNombre'=>null,

                    'segundoNombre'=>null,

                    'primerApellido'=>null,

                    'segundoApellido'=>null,

                    'departamento'=>null,

                    'municipio'=>null,

                    'direccion'=>null,

                    'telefonoMovil'=>null,

                    'telefonoCasa'=>null,

                    'fechaNacimiento'=>null,

                    'empresa'=>null,

                    'lugarTrabajo'=>null,

                    'direccionTrabajo'=>null,

                    'otraNacionalidad'=>null,

                    'ocupacion'=>null,

                    'ocupacionOtra'=>null,

                    'zonaResidencial'=>null,

                    'sexo'=>null,

                    'genero'=>null,

                    'sabeEscribirLeer'=>null,

                    'nivelEducacion'=>null,

                    'estadoFamiliar'=>null,

                    'nacionalidad'=>null,

                    'nacionalidadOtra'=>null,

                    'embarazada'=>null,

                    'propietarioResidencia'=>null,

                    'propietarioResidenciaOtro'=>null,

                    'discapacidad'=>'Ninguna',

                    'hijos'=>[],

                    'otrasPersonas'=>[],

                    'fuenteIngresos'=>[],

                    'fuenteIngresosOtro'=>null,

                    'relacionVictima'=>null,

                    'relacionVictimaOtra'=>null,

                    'hijosVivos'=>'No',

                    'otrasPersonasConvivientes'=>'No',

                ];

            }



            $select = [

                DB::raw('md5(personas.id) as `key`'),

                'dui               as dui',

                'primer_nombre     as primerNombre',

                'segundo_nombre    as segundoNombre',

                'primer_apellido   as primerApellido',

                'segundo_apellido  as segundoApellido',

                'departamentos.id  as departamento',

                'municipio_fk      as municipio',

                'direccion         as direccion',

                'telefono_movil    as telefonoMovil',

                'telefono_casa     as telefonoCasa',

                'fecha_nacimiento  as fechaNacimiento',

                'empresa',

                'discapacidad',

                'lugar_trabajo      as lugarTrabajo',

                'direccion_trabajo  as direccionTrabajo',

                'otra_nacionalidad  as otraNacionalidad',

                'ocupacion          as ocupacion',

                'ocupacion_otra     as ocupacionOtra',

                'zona_residencial   as zonaResidencial',

                'sexo               as sexo',

                'genero             as genero',

                'sabe_escribir_leer as sabeEscribirLeer',

                'nivel_educacion    as nivelEducacion',

                'estado_familiar    as estadoFamiliar',

                'nacionalidad       as nacionalidad',

                'otra_nacionalidad  as nacionalidadOtra',

                'embarazada         as embarazada',

                "personas.id        as hijos",

                "personas.id        as otrasPersonas",

                "personas.id        as fuenteIngresos",

                'hijos_vivos        as hijosVivos',

                'otras_personas_convivientes as otrasPersonasConvivientes',

                'relacion_victima        as relacionVictima',

                'relacion_victima_otro   as relacionVictimaOtra',

                'fuente_ingresos_otro as fuenteIngresosOtro',

                'propietario_residencia as propietarioResidencia',

                'propietario_residencia_otro as propietarioResidenciaOtro',

            ];



            $persona = Persona::select($select)

            ->leftJoin('municipios', 'municipios.id', '=', 'personas.municipio_fk')

            ->leftJoin('departamentos', 'departamentos.id', '=','municipios.departamento_fk')

            ->where(['personas.id' => $_id])->first();



            // Obtener Hijos y Otras Personas            

            ($persona -> hijos ?: []) && $persona -> hijos = $this->getOtrasPersonas($persona -> hijos, 'hijo');            

            ($persona -> otrasPersonas ?: []) && $persona -> otrasPersonas = $this->getOtrasPersonas($persona -> otrasPersonas, 'otra');



            // Obtener Fuentes de Ingresos            

            $persona -> fuenteIngresos = Ingresos::select('fuente_ingreso')

                ->whereRaw('md5(persona_fk) like "'.$persona -> key.'"')

                ->get()->map(function($value){ return $value->fuente_ingreso; });



            return $persona;

        }catch (\Exception $e) {

            bitacora_errores('TraitCasos.php', $e);

            return response()->json(['error' => 'Linea -> '.$e->getLine().' Error -> '.$e->getMessage()]);

        }

    }

    public function getAgresores($_caso){

        try{

            $select = [

                DB::raw('md5(`agresores_casos`.`id`) as `key`'),

                'primer_nombre              as primerNombre',

                'segundo_nombre             as segundoNombre',

                'primer_apellido            as primerApellido',

                'segundo_apellido           as segundoApellido',

                'direccion                  as direccion',

                'edad_agresor               as edad',

                'edad_desconocida           as edadDesconocida',

                'ocupacion_agresor          as ocupacion',

                'relacion_victima_agresor   as relacionVictimaAgresor',

                'ocupacion_agresor_otro     as ocupacionOtro',

                'municipio_fk               as municipio',

                'departamentos.id           as departamento',

                'nombre_desconocido         as nombreDesconocido',

                'agresores_casos.id         as selected',

                'lugar_trabajo              as lugarTrabajo',

                'direccion_trabajo             as direccionTrabajo',

                'posee_arma                    as poseeArma',

                'tipo_arma                     as tipoArma',

                'formacion_militar_policial    as formacionMilitarPolicial',

                'zona_residencial              as zonaResidencial',

                'tipo_arma_otra                as tipoArmaOtro',

                'relacion_victima_agresor_otra as otraRelacionVictima',

            ];



            $_agresores = AgresoresCasos::where('caso_fk', $_caso)

                ->select($select)

                ->leftJoin('municipios', 'municipios.id', '=', 'agresores_casos.municipio_fk')

                ->leftJoin('departamentos', 'departamentos.id', '=','municipios.departamento_fk')

            ->get();



            if(count($_agresores)>0)

                $_agresores->each( function( $val, $key ) {

                    (object)$val->selected = intval($key)  === 0;

                });



            return  $_agresores;

        } catch (\Exception $e) {

            bitacora_errores('TraitCasos.php', $e);

            return response()->json(['error' => 'Linea -> '.$e->getLine().' Error -> '.$e->getMessage()]);

        }

    }

    public function getipoDelitosLeiv($_caso){

        try{

            $_delitos_leiv = DelitosLeiv::where('caso_fk', $_caso)->select('delito')->get();

            return  $_delitos_leiv->map(function($value){ return $value->delito; });

        }catch (\Exception $e) {

            bitacora_errores('TraitCasos.php', $e);

        }

    }

    public function getipoAsistencia($_caso){

        try{

            $_tipo_asistencia = TipoAsistencia::where('caso_fk', $_caso)->select('asistencia')->get();

            return  $_tipo_asistencia->map(function($value){ return $value->asistencia; });

        }catch (\Exception $e) {

            bitacora_errores('TraitCasos.php', $e);

        }

    }

    public function getInstitucionSeRemite($_caso){

        try{

            $_institucion_se_remite = InstitucionSeRemitira::where('caso_fk',$_caso)->select('institucion')->get();

            return $_institucion_se_remite->map(function($value){ return $value->institucion; });

        }catch (\Exception $e) {

            bitacora_errores('TraitCasos.php', $e);

        }

    }

    public function getOtrasPersonas($id, $tipo){

        try{

            $select = [];

            $where = ['persona_fk' => $id, 'tipo' => $tipo];



            if($tipo === 'hijo'){

                $select = [

                    'nombres        as nombres',

                    'sexo           as sexo',

                    'edad           as edad',

                    'grado_escolar  as gradoEscolar',

                    'vive_con_ella  as viveConElla',

                    'discapacidad   as discapacidad',

                ];

            }



            if($tipo === 'otra'){

                $select = [

                    'nombres            as nombres',

                    'sexo               as sexo',

                    'edad               as edad',

                    'relacion_victima   as relacionVictima',

                ];

            }



            return OtrasPersonas::where($where)->select($select)->get();

        }catch (\Exception $e) {

            bitacora_errores('TraitCasos.php', $e);

            return response()->json(['error' => 'Linea -> '.$e->getLine().' Error -> '.$e->getMessage()]);

        }

    }



    // METODOS PARA LA CREACION DE LOS REPORTES DE LOS CASOS

    public function showCasos(){

        try{

            $orderBy='Asc';

            $select = [

                DB::raw("concat(`casos`.`denuncia`,' ', LPAD(`casos`.`correlativo`,3,'0'),

                 '-',LPAD( `casos`.`mes`,2,'0'), '-', `casos`.`anio`) as codigo"),

                DB::raw('md5(`casos`.`id`) as `key`'),

                DB::raw('case when `casos`.`fecha_registro` is NULL

                    then

                        DATE_FORMAT(`casos`.`created_at`, "%Y-%m-%d %H:%i")

                    else

                        DATE_FORMAT(`casos`.`fecha_registro`, "%Y-%m-%d %H:%i")

                    end as "fechaRegistro"'),

                'denuncia                       as denuncia',

                'mes                            as mes',

                'correlativo',

                'anio                           as  anio',

                'circunstancia_del_hecho        as  circunstanciaDelHecho',

                DB::raw('DATE_FORMAT(fecha_hecho, "%d/%m/%Y") as  fechaHecho'),

                DB::raw('DATE_FORMAT(hora_hecho,  "%H:%i")  as  horaHecho'),

                'tipos_violencia                as  tiposViolencia',

                'modalidad_violencia            as  modalidadViolencia',

                'delito_codigo_penal            as  delitoCodigoPenal',

                'delito_codigo_penal_otro       as  delitoCodigoPenalOtro',

                'departamentos.departamento     as  departamentoOcurrencia',

                'municipios.municipio           as  municipioOcurrencia',

                'institucion_remitente          as  institucionRemitente',

                'institucion_remitente_otra     as  institucionRemitenteOtra',

                "casos.id                       as  institucionSeRemite",

                "casos.id                       as  tipoAsistencia",

                "casos.id                       as  archivosCasos",

                "casos.id                       as  delitoLeivs",

            ];



            $query = Casos::select($select)

            -> leftJoin('municipios', 'municipios.id', '=', 'casos.municipio_ocurrencia_fk')

            -> leftJoin('departamentos', 'departamentos.id', '=','municipios.departamento_fk')

            -> where('casos.estado', true)

            -> orderBy('casos.denuncia', $orderBy)

            -> orderBy('casos.anio', $orderBy)

            -> orderBy('casos.correlativo', $orderBy);



            return $query;

        }catch (\Exception $e) {

            bitacora_errores('TraitCasos.php', $e);

            return response()->json(['error' => 'Linea -> '.$e->getLine().' Error -> '.$e->getMessage()]);

        }

    }



    public function getPersonas (){

        try{

            $orderBy='Asc';

            $select = [

                DB::raw("concat(`casos`.`denuncia`,' ', LPAD(`casos`.`correlativo`,3,'0'),

                 '-',LPAD( `casos`.`mes`,2,'0'), '-', `casos`.`anio`) as codigo"),

                 DB::raw('case when `casos`.`fecha_registro` is NULL

                    then

                        DATE_FORMAT(`casos`.`created_at`, "%d/%m/%Y %H:%i")

                    else

                        DATE_FORMAT(`casos`.`fecha_registro`, "%d/%m/%Y %H:%i")

                    end as "fechaRegistro"'

                ),

                DB::raw('personas.id as `key`'),

                'dui               as dui',

                'primer_nombre     as primerNombre',

                'segundo_nombre    as segundoNombre',

                'primer_apellido   as primerApellido',

                'segundo_apellido  as segundoApellido',

                'departamentos.departamento as departamento',

                'municipios.municipio as municipio',

                'direccion         as direccion',

                'telefono_movil    as telefonoMovil',

                'telefono_casa     as telefonoCasa',

                DB::raw('DATE_FORMAT(fecha_nacimiento, "%d/%m/%Y") as fechaNacimiento'),

                'empresa',

                'discapacidad',

                'lugar_trabajo      as lugarTrabajo',

                'direccion_trabajo  as direccionTrabajo',

                'otra_nacionalidad  as otraNacionalidad',

                'ocupacion          as ocupacion',

                'ocupacion_otra     as ocupacionOtra',

                'zona_residencial   as zonaResidencial',

                'sexo               as sexo',

                'genero             as genero',

                'sabe_escribir_leer as sabeEscribirLeer',

                'nivel_educacion    as nivelEducacion',

                'estado_familiar    as estadoFamiliar',

                'nacionalidad       as nacionalidad',

                'otra_nacionalidad  as nacionalidadOtra',

                'embarazada         as embarazada',

                "personas.id        as hijos",

                "personas.id        as otrasPersonas",

                "personas.id        as fuenteIngresos",

                'hijos_vivos        as hijosVivos',

                'otras_personas_convivientes as otrasPersonasConvivientes',

                'relacion_victima        as relacionVictima',

                'relacion_victima_otro   as relacionVictimaOtra',

                'fuente_ingresos_otro as fuenteIngresosOtro',

                'propietario_residencia as propietarioResidencia',

                'propietario_residencia_otro as propietarioResidenciaOtro', 

            ];



            $query = Casos::select($select)

            ->where('casos.estado',true) 

            ->orderBy('casos.denuncia', $orderBy)

            ->orderBy('casos.anio', $orderBy)

            ->orderBy('casos.correlativo', $orderBy);



            return $query;

        }catch (\Exception $e) {

            bitacora_errores('TraitCasos.php', $e);

            return response()->json(['error' => 'Linea -> '.$e->getLine().' Error -> '.$e->getMessage()]);

        }

    }



    public function generarPersonas($query){

        try{

            $personas = $query 

            -> leftJoin('municipios', 'municipios.id', '=', 'personas.municipio_fk')

            -> leftJoin('departamentos', 'departamentos.id', '=','municipios.departamento_fk') 

            -> get() 

            -> map(function($item){

                $persona = (object)$item;

                //Obtener Fuentes de Ingresos            

                $persona -> fuenteIngresos = \App\Models\Ingresos::select('fuente_ingreso')

                -> where('id', $persona -> key)-> get() -> map(function($value){ return $value -> fuente_ingreso; });

                return $persona;

            });

            return $personas;

        }catch (\Exception $e) {

            bitacora_errores('TraitCasos.php', $e);

            return response()->json(['error' => 'Linea -> '.$e->getLine().' Error -> '.$e->getMessage()]);

        }

    }



    public function showAgresores($where){

        try{

            $orderBy='Asc';

            $select = [

                DB::raw("concat(`casos`.`denuncia`,' ', LPAD(`casos`.`correlativo`,3,'0'),

                 '-',LPAD( `casos`.`mes`,2,'0'), '-', `casos`.`anio`) as codigo"),

                DB::raw('md5(`agresores_casos`.`id`) as `key`'),

                'primer_nombre                 as primerNombre',

                'segundo_nombre                as segundoNombre',

                'primer_apellido               as primerApellido',

                'segundo_apellido              as segundoApellido',

                'direccion                     as direccion',

                'edad_agresor                  as edad',

                'edad_desconocida              as edadDesconocida',

                'ocupacion_agresor             as ocupacion',

                'relacion_victima_agresor      as relacionVictimaAgresor',

                'ocupacion_agresor_otro        as ocupacionOtro',

                'municipios.municipio          as municipio',

                'departamentos.departamento    as departamento',

                'nombre_desconocido            as nombreDesconocido',

                'lugar_trabajo                 as lugarTrabajo',

                'direccion_trabajo             as direccionTrabajo',

                'posee_arma                    as poseeArma',

                'tipo_arma                     as tipoArma',

                'formacion_militar_policial    as formacionMilitarPolicial',

                'zona_residencial              as zonaResidencial',

                'tipo_arma_otra                as tipoArmaOtro',

                'relacion_victima_agresor_otra as otraRelacionVictima',

            ];



            $query = AgresoresCasos::where($where) 

            -> select($select)

            -> join('casos', 'agresores_casos.caso_fk', '=', 'casos.id')

            -> leftJoin('municipios', 'municipios.id', '=', 'agresores_casos.municipio_fk')

            -> leftJoin('departamentos', 'departamentos.id', '=','municipios.departamento_fk')

            -> where('casos.estado', true)

            -> orderBy('casos.denuncia', $orderBy)

            -> orderBy('casos.anio', $orderBy)

            -> orderBy('casos.correlativo', $orderBy);



            return  $query;

        } catch (\Exception $e) {

            bitacora_errores('TraitCasos.php', $e);

            return response()->json(['error' => 'Linea -> '.$e->getLine().' Error -> '.$e->getMessage()]);

        }

    }



    public function reporteCasos ($where, $whereIn, $tipo, $mes, $anio, $reporte){

        try {

            $casos_query = $this -> showCasos() -> where($where);

            $victima_query = $this -> getPersonas() -> where($where) -> join('personas', 'casos.victima_fk', '=', 'personas.id');

            $responsable_query = $this -> getPersonas() -> where($where) -> join('personas', 'casos.responsable_fk', '=', 'personas.id');

            $agresores_query = $this -> showAgresores($where);
     

            count($whereIn) 

            && $casos_query -> whereIn('casos.mes', $whereIn) 

            && $victima_query -> whereIn('casos.mes', $whereIn) 

            && $responsable_query -> whereIn('casos.mes', $whereIn)

            && $agresores_query -> whereIn('casos.mes', $whereIn);

            

            $victimas = $this -> generarPersonas($victima_query);

            $responsables = $this -> generarPersonas($responsable_query);

            $agresores = $agresores_query -> get();



            $hechos = $casos_query->get()->map(function($item){

                $caso = ((object)$item);



                $caso -> delitoLeivs            = $this -> getipoDelitosLeiv($caso->delitoLeivs);

                $caso -> tipoAsistencia         = $this -> getipoAsistencia($caso->tipoAsistencia);

                $caso -> institucionSeRemite    = $this -> getInstitucionSeRemite($caso->institucionSeRemite);



                return $caso;

            });

            

            return Excel::download(new ExportCasos($victimas, $responsables, $hechos, $agresores, $tipo, $mes, $anio, $reporte), 'casos.xls', \Maatwebsite\Excel\Excel::XLS);

        } catch (\Exception $e) {

            bitacora_errores('ExcelController.php', $e);

            return response()->json(['error' => 'Linea -> '.$e->getLine().' Error -> '.$e->getMessage()]);

        } 

    }

}