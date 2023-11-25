<?php

namespace App\Http\Controllers;

use App\Models\Oficinas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

// Modelos
use App\Models\Casos;
use App\Models\Persona;
use App\Models\AgresoresCasos;
use App\Models\InstitucionSeRemitira;
use App\Models\TipoAsistencia;
use App\Models\ArchivosCasos;
use App\Models\Ingresos;
use App\Models\DelitosLeiv;
use App\Models\OtrasPersonas;

use App\Http\Controllers\Traits\TraitCasos;

class CasosController extends Controller
{
    use TraitCasos;

    public function index(Request $request){
        try {
            $por_pagina = $request->porPagina;
            $ordenColumnas = $request->ordenColumnas;
            $por_pagina ??= 10;
            $ordenColumnas ??= [];
            $periodo = $request->periodo ?? 'Todos';

            $select = [
                DB::raw('md5(`casos`.`id`)  as `key`'),
                DB::raw('case when `casos`.`fecha_registro` is NULL
                    then
                        DATE_FORMAT(`casos`.`created_at`, "%d/%m/%Y %H:%i")
                    else
                        DATE_FORMAT(`casos`.`fecha_registro`, "%d/%m/%Y %H:%i")
                    end as "fechaRegistro"'
                ),
                DB::raw("concat(`casos`.`denuncia`,' ', LPAD(`casos`.`correlativo`,3,'0'), '-',LPAD( `casos`.`mes`,2,'0'), '-', `casos`.`anio`) as codigo"),
                'tipos_violencia            as tiposViolencia',
                'modalidad_violencia        as modalidadViolencia',
                DB::raw(" date_format(casos.fecha_hecho, \"%d/%m/%Y\") as fechaHecho"),
                'departamentos.departamento as departamento',
                'municipios.municipio       as municipio',
                'institucion_remitente      as institucionRemitente',
                'casos.id                   as institucionDondeSeRemite'
            ];

            $selectBusqueda = [
                DB::raw('case when `casos`.`fecha_registro` is NULL
                    then
                        DATE_FORMAT(`casos`.`created_at`, "%Y-%m-%dT%H:%i")
                    else
                        DATE_FORMAT(`casos`.`fecha_registro`, "%Y-%m-%dT%H:%i")
                    end'
                ),
                'casos.denuncia',
                DB::raw("CONCAT(`casos`.`denuncia`, ' ', LPAD(`casos`.`correlativo`, 3, '0'), '-', LPAD(casos.mes, 2, '0'), '-', casos.anio)"),
                'tipos_violencia',
                'modalidad_violencia',
                'delito_codigo_penal',
                'institucion_remitente',
                DB::raw(" date_format(casos.fecha_hecho, \"%d/%m/%Y\")"),
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

            $casos = query_busqueda(Casos::class, $selectBusqueda , $request->busqueda);

            $paginado = $casos->select($select)
                ->leftJoin('municipios', 'municipios.id',"=","casos.municipio_ocurrencia_fk")
                ->leftJoin('departamentos', 'departamentos.id',"=","municipios.departamento_fk")
                ->leftJoin('personas as p1', 'p1.id', "=", "casos.victima_fk")
                ->leftJoin('personas as p2', 'p2.id', "=", "casos.responsable_fk")
            ->where('casos.estado', true);

            //Cuando el usuario es administrador no se filtrara en base a
           $is_admin = auth()->user()->hasRole('Super Administrador');
            if(!$is_admin) 
                 $paginado = $paginado->where( function ($query)
                {
                    //esta parte de aquí está filtrando por oficinas
                    $query->where('denuncia','like', tipo_denuncia()->denuncia)
                    ->orWhere('denuncia','like', tipo_denuncia()->sin_denuncia)
                    ->orWhere('denuncia','like', tipo_denuncia()->diligencia);
                });
            else{
                $codigo = trim($request->oficina) == 'Todas' || $request->oficina === null ? null : Oficinas::select('codigo')->findOrFail($request->oficina)->codigo;
                $filtro  = $request->filtro == 'Todos' || $request->filtro === null ? null : $request->filtro;

                $tipo_caso = null;
                if($filtro === 'Denuncia')
                    $tipo_caso = 'D';
                if($filtro === 'Sin Denuncia')
                    $tipo_caso = 'SD';
                if($filtro === 'Diligencia')
                    $tipo_caso = 'DIL';

                $tipo_caso = $tipo_caso === null ? '': trim($tipo_caso);
                $codigo = $codigo === null ? '' : trim($codigo);
                
                $tipo_caso === '' && $codigo !== '' && $paginado = $paginado->whereRaw("casos.denuncia like '%".$codigo."'");
                $tipo_caso !== '' && $codigo === '' && $paginado = $paginado->whereRaw("casos.denuncia like '".$tipo_caso."'%");
                $tipo_caso !== '' && $codigo !== '' && $paginado = $paginado->whereRaw("casos.denuncia like '".$tipo_caso.$codigo."'");
                
            }

            foreach ($ordenColumnas as $key => $value) {
                $columna = (object) $value;

                if(!boolval($columna->sort ?? false) || strlen($columna->order) == 0)
                    continue;

                if($columna->columna === "Codigo")
                    $paginado->orderBy('denuncia', $columna->order)->orderBy('casos.anio', $columna->order)->orderBy('casos.correlativo', $columna->order);
                else if($columna->columna  === "Violencia")
                    $paginado->orderBy('tipos_violencia', $columna->order);
                else if($columna->columna  === "Mod. Violencia")
                    $paginado->orderBy('modalidad_violencia', $columna->order);
                else if($columna->columna  === "Instit. Que Remite")
                    $paginado->orderBy('institucion_remitente', $columna->order);
                else if($columna->columna  === "Fecha Registro")
                    $paginado->orderByRaw('case when `casos`.`fecha_registro` is NULL
                        then
                            DATE_FORMAT(`casos`.`created_at`, "%d/%m/%Y %H:%i")
                        else
                            DATE_FORMAT(`casos`.`fecha_registro`, "%d/%m/%Y %H:%i")
                        end '.$columna->order
                    );
                else if($columna->columna  === "Departamento")
                    $paginado->orderBy('departamentos.departamento', $columna->order);
                else if($columna->columna  === "Municipio")
                    $paginado->orderBy('municipios.municipio', $columna->order);
            }
            
            
            
            if($request->filtro !== 'Todos' && $request->filtro!== null && !$is_admin){
                $tipo_caso = $request->filtro === 'Denuncia' ? tipo_denuncia()->denuncia:($request->filtro === 'Sin Denuncia' ? tipo_denuncia()->sin_denuncia : ($request->filtro === 'Diligencia' ? tipo_denuncia()->diligencia: null));
                $paginado->whereRaw('casos.denuncia like "'.$tipo_caso.'"');
            }
          

            if($periodo !== 'Todos')
                $paginado->where('casos.anio', intval($periodo));

            $paginado = $paginado->paginate($por_pagina);

            $paginado->getCollection()->transform( function($value){

                $value -> institucionDondeSeRemite = InstitucionSeRemitira::where('caso_fk', $value -> institucionDondeSeRemite)
                    ->select('institucion')
                    ->get()
                ->map(function($value){ return $value->institucion; });

                return $value;
            });

            return  $paginado;
            
        }catch (\Exception $e) {
            bitacora_errores('CasosController.php', $e);
            return response()->json(['error' => 'Linea -> '.$e->getLine().' Error -> '.$e->getMessage()]);
        }
    }

    public function indexSelect(Request $request){
        try {
            $por_pagina = $request->porPagina;
            $por_pagina ??= 10;

            $select = [
                DB::raw('md5(`casos`.`id`)  as `key`'),
                DB::raw("concat(`casos`.`denuncia`,' ', LPAD(`casos`.`correlativo`,3,'0'), '-',LPAD( `casos`.`mes`,2,'0'), '-', `casos`.`anio`) as label"),
            ];

            $selectBusqueda = [
                DB::raw('case when `casos`.`fecha_registro` is NULL
                    then
                        DATE_FORMAT(`casos`.`created_at`, "%Y-%m-%dT%H:%i")
                    else
                        DATE_FORMAT(`casos`.`fecha_registro`, "%Y-%m-%dT%H:%i")
                    end'
                ),
                'casos.denuncia',
                DB::raw("CONCAT(`casos`.`denuncia`, ' ', LPAD(`casos`.`correlativo`, 3, '0'), '-', LPAD(casos.mes, 2, '0'), '-', casos.anio)"),
                'tipos_violencia',
                'modalidad_violencia',
                'delito_codigo_penal',
                'institucion_remitente',
                DB::raw(" date_format(casos.fecha_hecho, \"%d/%m/%Y\")"),
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

            $casos = query_busqueda(Casos::class, $selectBusqueda , $request->busqueda);

            $paginado = $casos->select($select)
                ->leftJoin('municipios', 'municipios.id',"=","casos.municipio_ocurrencia_fk")
                ->leftJoin('departamentos', 'departamentos.id',"=","municipios.departamento_fk")
                ->leftJoin('personas as p1', 'p1.id',"=","casos.victima_fk")
                ->leftJoin('personas as p2', 'p2.id',"=","casos.responsable_fk")
                ->where('casos.estado', 1)
                ->where( function ($query)
                    {
                        $query->where('denuncia','like', tipo_denuncia()->denuncia)
                        ->orWhere('denuncia','like', tipo_denuncia()->sin_denuncia);
                    }
                )
            ->orderBy('casos.anio','Desc')
            ->orderBy('casos.mes','Desc');

            return $paginado->paginate($por_pagina);
            // return $paginado->simplePaginate($por_pagina); // la respuesta del server es mas rapida
        }catch (\Exception $e) {
            bitacora_errores('CasosController.php', $e);
            return response()->json(['error' => 'Linea -> '.$e->getLine().' Error -> '.$e->getMessage()]);
        }
    }

    public function reglasCodigo(){
        return  [
            'denuncia' => 'required|string',
            'mes' => 'required',
            'anio' => 'required'
        ];
    }

    private function reglasVictima($edad){
        return [
            //Campos de Victima
            'victima.dui'               => ['nullable'],
            'victima.fechaNacimiento'   => ['nullable','date'],
            'victima.primerNombre'      => ['nullable','regex:/^[a-zA-Z\x{00C0}-\x{017F}\s]+$/u'],
            'victima.segundoNombre'     => ['nullable','regex:/^[a-zA-Z\x{00C0}-\x{017F}\s]+$/u'],
            'victima.primerApellido'    => ['nullable','regex:/^[a-zA-Z\x{00C0}-\x{017F}\s]+$/u'],
            'victima.segundoApellido'   => ['nullable','regex:/^[a-zA-Z\x{00C0}-\x{017F}\s]+$/u'],
        ];
    }
    
    private function reglasReponsable(){
        return [
            //Campos de Victima
            'responsable.dui'               => ['nullable'],
            'responsable.fechaNacimiento'   => ['nullable','date'],
            'responsable.primerNombre'      => ['nullable','regex:/^[a-zA-Z\x{00C0}-\x{017F}\s]+$/u'],
            'responsable.segundoNombre'     => ['nullable','regex:/^[a-zA-Z\x{00C0}-\x{017F}\s]+$/u'],
            'responsable.primerApellido'    => ['nullable','regex:/^[a-zA-Z\x{00C0}-\x{017F}\s]+$/u'],
            'responsable.segundoApellido'   => ['nullable','regex:/^[a-zA-Z\x{00C0}-\x{017F}\s]+$/u'],
        ];
    }

    private function mensajesVictima(){
        return [
            //Campos de Victima
            'victima.dui.required'              => 'El campo fecha dui de víctima es obligatorio',
            // 'victima.fechaNacimiento.required'  => 'El campo fecha nacimiento de  víctima es obligatorio',
            'victima.primerNombre.required'     => 'El campo primer nombre de víctima es obligatorio',
            'victima.primerNombre.regex'        => 'El campo primer nombre de víctima debe contener solo letras.',
            'victima.segundoNombre.regex'       => 'El campo segundo nombre de víctima debe contener solo letras.',
            'victima.primerApellido.required'   => 'El campo primer apellido de víctima es obligatorio',
            'victima.primerApellido.regex'      => 'El campo primer apellido de víctima debe contener solo letras.',
            'victima.segundoApellido.regex'     => 'El campo segundo apellido de víctima debe contener solo letras.',
        ];
    }

    private function mensajesReponsable(){
        return [
            //Campos de Victima
            // 'responsable.fechaNacimiento.required'  => 'El campo fecha nacimiento de responsable es obligatorio',
            'responsable.dui.required'              => 'El campo dui de responsable es obligatorio',
            'responsable.primerNombre.required'     => 'El campo primer nombre de responsable es obligatorio',
            'responsable.primerNombre.regex'        => 'El campo primer nombre de responsable debe contener solo letras.',
            'responsable.segundoNombre.regex'       => 'El campo segundo nombre de responsable debe contener solo letras.',
            'responsable.primerApellido.required'   => 'El campo primer apellido de responsable es obligatorio',
            'responsable.primerApellido.regex'      => 'El campo primer apellido de responsable debe contener solo letras.',
            'responsable.segundoApellido.regex'     => 'El campo segundo apellido de responsable debe contener solo letras.',
        ];
    }

    public function store(Request $request)
    {
        //Validacion de Codigo
        $validator = Validator::make($request->all(), $this->reglasCodigo(),
            [
                /*'mes.min' => 'El campo mes debe ser mayor a 1.',
                'mes.max' => 'El campo mes debe ser menor o igual a 12.',*/ 
                'denuncia.required' => 'El campo tipo de caso es obligatorio'
            ]
        );

        if($validator->fails()) { return response()->json(['error'=>$validator->errors()->all()]); }

        $__victima = (object)$request->victima;
        $edadVictima = edad($__victima->fechaNacimiento);

        //Validacion Victima
        $validator = Validator::make($request->all(), $this->reglasVictima($edadVictima), $this->mensajesVictima());
        if($validator->fails()) { return response()->json(['error'=>$validator->errors()->all()]); }

        $__responsable = (object)$request->responsable;
        $edadResponsable= edad($__responsable->fechaNacimiento);

        $validator = Validator::make($request->all(), $this->reglasReponsable(), $this->mensajesReponsable());
        if($validator->fails()) { return response()->json(['error'=>$validator->errors()->all()]); }

        // if($__responsable->fechaNacimiento!==null && intval($edadResponsable) < 18)
        //     return response()->json(['error'=>['El responsable debe ser mayor de edad (edad: '.intval($edadResponsable).' años).']]);
        
        if($request -> correlativo !== null){
            $correlativoExist = Casos::whereRaw('md5(id) not like "'.$request->key.'"')
                ->where('denuncia', $request->denuncia)
                ->where('anio', $request->anio)
                ->where('correlativo', $request->correlativo)
                ->where('estado', true)
                ->exists();
            if($correlativoExist)
                return response()->json(['error'=>['El correlativo '.$request->correlativo.' ya fue utilizado para este año '.$request->anio.' y tipo de denuncia '.$request->denuncia.'.']]);
            else if(intval($request->correlativo) <= 0)
                return response()->json(['error'=>['El correlativo debe ser mayor que cero.']]);
            else
                Casos::whereRaw('md5(id) like "'.$request->key.'"')->where('estado', true)->update(['correlativo' => intval($request->correlativo)]);
        }

        try {
            $caso = Casos::whereRaw('md5(`casos`.`id`)="'.trim($request->key).'"')->where('estado', true)->first();
            $caso ??= new Casos;

            $_victima = $this->actualizarCrearPersona((object)$request->victima);
            $_responsable = $this->actualizarCrearPersona((object)$request->responsable);


            $fecha_registracion = $request->fechaRegistro===null?null:str_replace('T', ' ', $request->fechaRegistro);
            $caso->fecha_registro               = $fecha_registracion;
            $caso->denuncia                     = $request->denuncia;
            $caso->mes                          = intval($request->mes);
            $caso->anio                         = intval($request->anio);
            $caso->fecha_hecho                  = $request->fechaHecho;
            $caso->hora_hecho                   = $request->horaHecho;
            $caso->tipos_violencia              = $request->tiposViolencia;
            $caso->modalidad_violencia          = $request->modalidadViolencia;
            $caso->delito_codigo_penal          = $request->delitoCodigoPenal;
            $caso->delito_codigo_penal_otro     = $request->delitoCodigoPenalOtro;
            $caso->municipio_ocurrencia_fk      = $request->municipioOcurrencia;
            $caso->institucion_remitente        = $request->institucionRemitente;
            $caso->institucion_remitente_otra   = $request->institucionRemitenteOtra;
            $caso->municipio_ocurrencia_fk      = $request->municipioOcurrencia;
            $caso->circunstancia_del_hecho      = $request->circunstanciaDelHecho;

            // Llaves Foreaneas
            if($_victima!==null) $caso->victima_fk = $_victima->id;
            if($_responsable!==null) $caso->responsable_fk = $_responsable->id;
            // Crear o actualizar el caso en la base de datos
            $caso_guardado = $caso->save();

            if($caso_guardado) {
                $this->actualizarCrearInstitucionSeRemite($caso, $request->institucionSeRemite);
                $this->actualizarCrearAgresores($caso, $request->agresores);
                $this->actualizarCrearTipoAsistencia($caso, $request->tipoAsistencia);

                DelitosLeiv::where('caso_fk', $caso->id)->delete();
                foreach($request->delitoLeivs as $key => $value) {
                    DelitosLeiv::updateOrCreate(
                        ['caso_fk' => $caso->id, 'delito'=> $value,]
                    );
                }
            }

            $correlativo = null;           

            if($caso -> correlativo === null){
                $correlativo  = DB::select(DB::raw('select asignar_correlativo_casos('.$caso->id.','.$caso->anio.',"'.$caso->denuncia.'") as "correlativo";'))[0]->correlativo;
            }

            $correlativo ??= $caso->correlativo;

            return response()->json([
                "mensaje" => 'Exito, se registro el caso.',
                "key" => DB::select(DB::raw("select md5(".$caso->id.") as 'key';"))[0]->key,
                "correlativo"=>$correlativo,
            ]);

        }catch (\Exception $e) {
            bitacora_errores('CasosController.php', $e);
            return response()->json(['error' => 'Linea -> '.$e->getLine().' Error -> '.$e->getMessage()]);
        }
    }

    private function isNullorEmpty($value){
        return is_null($value) || empty($value) || $value===null || trim($value) === '';
    }

    private function actualizarCrearPersona ($_persona){
        try {
            if($this->isNullPersona($_persona))
                return null;
            //$persona = Persona::whereRaw('dui = "'.$_persona->dui.'"')->first();
            $persona ??= Persona::whereRaw('md5(id) = "'.$_persona->key.'"')->first();
            $persona ??= new Persona;
            $persona->dui                           =  trim($_persona->dui);
            $persona->fecha_nacimiento              =  $_persona->fechaNacimiento;
            $persona->primer_nombre                 =  ucfirst($_persona->primerNombre);
            $persona->segundo_nombre                =  ucfirst($_persona->segundoNombre);
            $persona->primer_apellido               =  ucfirst($_persona->primerApellido);
            $persona->segundo_apellido              =  ucfirst($_persona->segundoApellido);
            $persona->telefono_movil                =  $_persona->telefonoMovil;
            $persona->telefono_casa                 =  $_persona->telefonoCasa;
            $persona->direccion                     =  ucfirst($_persona->direccion);
            $persona->municipio_fk                  =  $_persona->municipio;
            $persona->empresa                       =  $_persona->empresa;
            $persona->discapacidad                  =  $_persona->discapacidad;
            $persona->lugar_trabajo                 =  ucfirst($_persona->lugarTrabajo);
            $persona->direccion_trabajo             =  ucfirst($_persona->direccionTrabajo);
            $persona->otra_nacionalidad             =  ucfirst($_persona->nacionalidadOtra);
            $persona->ocupacion                     =  $_persona->ocupacion;
            $persona->ocupacion_otra                =  ucfirst($_persona->ocupacionOtra);
            $persona->fuente_ingresos_otro          =  ucfirst($_persona->fuenteIngresosOtro);
            $persona->zona_residencial              =  $_persona->zonaResidencial;
            $persona->sexo                          =  $_persona->sexo;
            $persona->genero                        =  $_persona->genero;
            $persona->sabe_escribir_leer            =  $_persona->sabeEscribirLeer;
            $persona->nivel_educacion               =  $_persona->nivelEducacion;
            $persona->estado_familiar               =  $_persona->estadoFamiliar;
            $persona->nacionalidad                  =  $_persona->nacionalidad;
            $persona->embarazada                    =  $_persona->embarazada;
            $persona->relacion_victima              =  $_persona->relacionVictima;
            $persona->relacion_victima_otro         =  ucfirst($_persona->relacionVictimaOtra);
            $persona->propietario_residencia        =  $_persona->propietarioResidencia;
            $persona->propietario_residencia_otro   =  ucfirst($_persona->propietarioResidenciaOtro);
            $persona->hijos_vivos                   =  $_persona->hijosVivos;
            $persona->otras_personas_convivientes   =  $_persona->otrasPersonasConvivientes;
            $persona->save();

            // Elimino registros opciones multiples anteriores
            OtrasPersonas::where('persona_fk', $persona->id)->delete();
            Ingresos::where('persona_fk', $persona->id)->delete();

            // Ingreso registros nuevos Otras Personas (Hijos y OtrasPersonas)
            $hijos = $_persona->hijos ?? [];
            foreach ($hijos as $key => $value) {
                $this->updateCreateOtraPersona($persona->id, 'hijo', (object)$value);
            }

            $otras_personas = $_persona->otrasPersonas ?? [];
            foreach ($otras_personas as $key => $value) {
                $this->updateCreateOtraPersona($persona->id, 'otra', (object)$value);
            }

            // Ingreso registros de opciones multiples Fuente de Ingreso
            foreach ($_persona->fuenteIngresos as $key => $value) {
                Ingresos::updateOrCreate(
                    [
                        'fuente_ingreso'=> $value,
                        'persona_fk' => $persona->id
                    ]
                );
            }

            return $persona;
        } catch (\Exception $e) {
            bitacora_errores('CasosController.php', $e);
            return response()->json(['error' => 'Linea -> '.$e->getLine().' Error -> '.$e->getMessage()]);
        }
    }

    private function isNullPersona($persona){
        return
        $persona->key                       === null &&
        $persona->dui                       === null &&
        $persona->primerNombre              === null &&
        $persona->segundoNombre             === null &&
        $persona->primerApellido            === null &&
        $persona->segundoApellido           === null &&
        $persona->departamento              === null &&
        $persona->municipio                 === null &&
        $persona->direccion                 === null &&
        $persona->telefonoMovil             === null &&
        $persona->telefonoCasa              === null &&
        $persona->fechaNacimiento           === null &&
        $persona->empresa                   === null &&
        $persona->lugarTrabajo              === null &&
        $persona->direccionTrabajo          === null &&
        $persona->otraNacionalidad          === null &&
        $persona->ocupacion                 === null &&
        $persona->ocupacionOtra             === null &&
        $persona->zonaResidencial           === null &&
        $persona->sexo                      === null &&
        $persona->genero                    === null &&
        $persona->sabeEscribirLeer          === null &&
        $persona->nivelEducacion            === null &&
        $persona->estadoFamiliar            === null &&
        $persona->nacionalidad              === null &&
        $persona->nacionalidadOtra          === null &&
        $persona->embarazada                === null &&
        $persona->propietarioResidencia     === null &&
        $persona->propietarioResidenciaOtro === null &&
        $persona->fuenteIngresosOtro        === null &&
        $persona->relacionVictima           === null &&
        $persona->relacionVictimaOtra       === null &&
        $persona->hijos                     === [] &&
        $persona->otrasPersonas             === [] &&
        $persona->fuenteIngresos            === [] &&
        $persona->hijosVivos                === 'No' &&
        $persona->otrasPersonasConvivientes === 'No' &&
        $persona->discapacidad              === 'Ninguna';
    }

    private function updateCreateOtraPersona($id, $tipo, $persona){

        OtrasPersonas::updateOrCreate([
            'persona_fk'        => $id,
            'tipo'              => $tipo,
            'nombres'           => ucwords($persona->nombres ?? null),
            'sexo'              => $persona->sexo ?? null,
            'edad'              => intval($persona->edad ?? null),
            'relacion_victima'  => $persona->relacionVictima ?? null,
            'vive_con_ella'     => $persona->viveConElla ?? null,
            'discapacidad'      => $persona->discapacidad ?? null,
            'grado_escolar'     => $persona->gradoEscolar ?? null,
        ]);
    }

    public function actualizarCrearAgresores($caso, $_agresores){
        try {

            AgresoresCasos::where('caso_fk', $caso->id)->delete();

            foreach ($_agresores as $key => $value) {
                $_agresor = (object)$value;

                AgresoresCasos::updateOrCreate([
                    'caso_fk'                       => $caso->id,
                    'municipio_fk'                  => $_agresor->municipio,
                    'direccion'                     => ucwords($_agresor->direccion),
                    'edad_agresor'                  => $_agresor->edad,
                    'primer_nombre'                 => ucwords($_agresor->primerNombre),
                    'segundo_nombre'                => ucwords($_agresor->segundoNombre),
                    'primer_apellido'               => ucwords($_agresor->primerApellido),
                    'segundo_apellido'              => ucwords($_agresor->segundoApellido),
                    'edad_desconocida'              => boolval($_agresor->edadDesconocida),
                    'ocupacion_agresor'             => $_agresor->ocupacion,
                    'ocupacion_agresor_otro'        => $_agresor->ocupacionOtro,
                    'relacion_victima_agresor'      => $_agresor->relacionVictimaAgresor,
                    'nombre_desconocido'            => boolval($_agresor->nombreDesconocido),
                    'lugar_trabajo'                 => ucwords($_agresor->lugarTrabajo),
                    'direccion_trabajo'             => ucwords($_agresor->direccionTrabajo),
                    'posee_arma'                    => $_agresor->poseeArma,
                    'tipo_arma'                     => $_agresor->tipoArma,
                    'formacion_militar_policial'    => $_agresor->formacionMilitarPolicial,
                    'zona_residencial'              => $_agresor->zonaResidencial,
                    'tipo_arma_otra'                => ucwords($_agresor->tipoArmaOtro),
                    'relacion_victima_agresor_otra' => ucwords($_agresor->otraRelacionVictima),
                ]);
            }

        } catch (\Exception $e) {
            bitacora_errores('CasosController.php', $e);
            return response()->json(['error' => 'Linea -> '.$e->getLine().' Error -> '.$e->getMessage()]);
        }
    }

    public function actualizarCrearInstitucionSeRemite($caso, $institucionSeRemite){
        try{
            InstitucionSeRemitira::where('caso_fk', $caso->id)->delete();
            foreach ($institucionSeRemite as $key => $value) {
                InstitucionSeRemitira::updateOrCreate(["caso_fk" => $caso->id,"institucion" => $value]);
            }
        } catch (\Exception $e) {
            bitacora_errores('CasosController.php', $e);
        }
    }

    public function actualizarCrearTipoAsistencia($caso, $tipoAsistencia){
        try{
            foreach ($tipoAsistencia as $key => $value) {
                TipoAsistencia::updateOrCreate(["caso_fk" => $caso->id, "asistencia" => $value,]);
            }
        } catch (\Exception $e) {
            bitacora_errores('CasosController.php', $e);
        }
    } 

   

    public function destroy(Request $request)
    {
        try{
            return Casos::whereRaw('md5(id)="'.$request->key.'"')->update(['estado' => false]);
        }catch (\Exception $e) {
            bitacora_errores('CasosController.php', $e);
        }
    }

    public function obtenerCasosPersonas($key, $dui){
        try{
            $bool = $key === "null" || $key === null;

            $query = 'select casos.denuncia as denuncia, count(p.dui) as cantidad from casos
            right join personas p on casos.victima_fk = p.id';

            $query .= $bool ? ' where p.dui like "'.$dui.'"' : ' where p.dui like "'.$dui.'" and md5(casos.id) not like "'.$key.'"';
            $query .=' group by casos.denuncia';
            return DB::select(DB::raw($query));

        }catch (\Exception $e) {
            bitacora_errores('CasosController.php', $e);
            return response()->json(['error' => 'Linea -> '.$e->getLine().' Error -> '.$e->getMessage()]);
        }
    }

    public function showPeriodos(){
        try{
            $periodos = Casos::select('casos.anio as periodo')
            ->where('casos.estado', true)
            ->groupBy('casos.anio')
            ->orderBy('casos.anio','desc')
            ->get()->map(function ($item){ return intval(((object) $item)->periodo);});

            return response()->json($periodos);
        }catch (\Exception $e) {
            bitacora_errores('CasosController.php', $e);
            return response()->json(['error' => 'Linea -> '.$e->getLine().' Error -> '.$e->getMessage()]);
        }
    }
}