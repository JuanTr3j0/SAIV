<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use App\Models\Casos;
use App\Models\Agenda;
use App\Models\DelitosLeiv;
use App\Models\AtencionBrindada;
use App\Models\SeguimientoJuridico;

use App\Http\Requests\StoreSeguimientoJuridicoRequest;
use App\Http\Requests\UpdateSeguimientoJuridicoRequest;

class SeguimientoJuridicoController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        try {
            $por_pagina = $request->porPagina;
            $ordenColumnas = $request->ordenColumnas;
            $por_pagina ??= 10;
            $ordenColumnas ??= [];

            $select = [
                DB::raw('md5(seguimiento_juridicos.id) as "key"'),
                DB::raw("concat(`casos`.`denuncia`,' ', LPAD(`casos`.`correlativo`,3,'0'), '-',LPAD( `casos`.`mes`,2,'0'), '-', `casos`.`anio`) as codigo"),
                'seguimiento_juridicos.tipo_servicio_fecha_hora                         as tipoServicioFechaHora',
                'seguimiento_juridicos.tipo_servicio                                    as tipoServicio',
                'seguimiento_juridicos.servicio_que_remite                              as servicioQueRemite',
                'seguimiento_juridicos.cierre_expediente                                as cierreExpediente',
                'seguimiento_juridicos.cierre_expediente_hora_fecha                     as cierreExpedienteHoraFecha',
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
            
            $seguimiento_juridico = query_busqueda(SeguimientoJuridico::class, $selectBusqueda , $request->busqueda);

            $paginado = $seguimiento_juridico->select($select)
                ->join('casos','casos.id', '=', 'seguimiento_juridicos.caso_fk')
                ->leftJoin('municipios', 'municipios.id',"=","casos.municipio_ocurrencia_fk")
                ->leftJoin('departamentos', 'departamentos.id',"=","municipios.departamento_fk")
                ->leftJoin('personas as p1', 'p1.id',"=","casos.victima_fk")
                ->leftJoin('personas as p2', 'p2.id',"=","casos.responsable_fk")
                ->where( function ($query)
                    {
                        $query->where('casos.denuncia','like', tipo_denuncia()->denuncia)
                        ->orWhere('casos.denuncia','like', tipo_denuncia()->sin_denuncia);
                    }
                )
                ->where('seguimiento_juridicos.estado', true);
                    
            foreach ($ordenColumnas as $key => $value) {
                $columna = (object) $value;

                if(!boolval($columna->sort ?? false) || strlen($columna->order) == 0)
                    continue;
                    
                if($columna->columna === "Codigo")
                    $paginado->orderBy('casos.denuncia', $columna->order)->orderBy('casos.anio', $columna->order)->orderBy('casos.correlativo', $columna->order);
                else if($columna->columna === "Fecha Servicio")
                    $paginado->orderBy('seguimiento_juridicos.tipo_servicio_fecha_hora', $columna->order);
                else if($columna->columna === "Servicio")
                    $paginado->orderBy('seguimiento_juridicos.tipo_servicio', $columna->order);
                else if($columna->columna === "Fecha Cierre Exp.")
                    $paginado->orderBy('seguimiento_juridicos.cierre_expediente_hora_fecha', $columna->order);
                else if($columna->columna === "Razón Cierre Exp.")
                    $paginado->orderBy('seguimiento_juridicos.cierre_expediente', $columna->order);
            }

            if($request->filtro !== 'Todos' && $request->filtro!== null){
                $tipo_caso = $request->filtro === 'Denuncia' ? tipo_denuncia()->denuncia:($request->filtro === 'Sin Denuncia' ? tipo_denuncia()->sin_denuncia : null);
                $paginado->whereRaw('casos.denuncia like "'.$tipo_caso.'"');
            }

            return $paginado->paginate($por_pagina);

        }catch (\Exception $e) { 
            bitacora_errores('SeguimientoJuridicoController.php', $e);
            return response()->json(['error' => 'Linea -> '.$e->getLine().' Error -> '.$e->getMessage()]);
        }
    }

    public function getCodigosCasos(Request $request){
        try{
            $select = [
                DB::raw('md5(casos.id) as \'key\''),
                DB::raw('CONCAT(casos.denuncia, \' \', LPAD(casos.correlativo, 3, \'0\'), \'-\', LPAD(casos.mes, 2, \'0\'), \'-\', casos.anio) as codigo'),
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
                'casos.institucion_remitente',
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

            $where = [
                'estado' => true
            ];

            $casos = query_busqueda(Casos::class, $selectBusqueda , $request->busqueda);
            
            return $casos->select($select)
            ->leftJoin('municipios', 'municipios.id',"=","casos.municipio_ocurrencia_fk")
            ->leftJoin('departamentos', 'departamentos.id',"=","municipios.departamento_fk")
            ->leftJoin('personas as p1', 'p1.id',"=","casos.victima_fk")
            ->leftJoin('personas as p2', 'p2.id',"=","casos.responsable_fk")
            ->where($where)
            ->whereRaw('casos.denuncia not like "DIL%"')
            ->where( function ($query) 
                {
                    $query->where('denuncia','like', tipo_denuncia()->denuncia)
                    ->orWhere('denuncia','like', tipo_denuncia()->sin_denuncia);
                }
            )
            ->orderBy('casos.anio','Desc')
            ->orderBy('casos.mes','Desc')
            ->get();
        }catch (\Exception $e) { 
            bitacora_errores('SeguimientoJuridicoController.php', $e);
            return response()->json(['error' => 'Linea -> '.$e->getLine().' Error -> '.$e->getMessage()]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSeguimientoJuridicoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSeguimientoJuridicoRequest $request)
    {
        try{
            $validator = Validator::make($request->all(), [
                    'codigoCaso'   => "required",
                    'medidasProteccionDesde' => "nullable",
                    'medidasProteccionHasta' => "nullable|after_or_equal:medidas_proteccion_inicio"
                ]
            );

            if($validator->fails()) { return response()->json(['error'=>$validator->errors()->all()]); }

            // Obtenie el id del caso
            $caso_fk = Casos::whereRaw('md5(id) = "'.((object)$request -> codigoCaso) -> key.'"')->first()->id;
            
            $seguimiento_juridico = SeguimientoJuridico::whereRaw('md5(id) like "'.$request->key.'"')->first();
            $seguimiento_juridico ??= new SeguimientoJuridico ();
            $seguimiento_juridico -> caso_fk                                                =  $caso_fk;
            $seguimiento_juridico -> tipo_servicio_fecha_hora                               =  $this->formatDateTime($request -> tipoServicioFechaHora);
            $seguimiento_juridico -> tipo_servicio                                          =  $request -> tipoServicio;
            $seguimiento_juridico -> servicio_que_remite                                    =  $request -> servicioQueRemite;
            $seguimiento_juridico -> medidas_proteccion_inicio                              =  $request -> medidasProteccionDesde;
            $seguimiento_juridico -> medidas_proteccion_final                               =  $request -> medidasProteccionHasta;
            $seguimiento_juridico -> audiencia_preliminar                                   =  $this->formatDateTime($request -> audienciaPreliminar);
            $seguimiento_juridico -> audiencia_publica                                      =  $this->formatDateTime($request -> audienciaPublica);
            $seguimiento_juridico -> audiencia_preliminar_resolucion                        =  $request -> audienciaPreliminarResolucion;
            $seguimiento_juridico -> audiencia_publica_resolucion                           =  $request -> audienciaPublicaResolucion;
            $seguimiento_juridico -> familia_procuraduria_general_hora_fecha                =  $this->formatDateTime($request -> familiaProcuraduriaGeneralHoraFecha);
            $seguimiento_juridico -> familia_procuraduria_general_acuerdo                   =  $request -> familiaProcuraduriaGeneralAcuerdo;
            $seguimiento_juridico -> familia_audiencia_preliminar_hora_fecha                =  $this->formatDateTime($request -> familiaAudienciaPreliminarHoraFecha);
            $seguimiento_juridico -> familia_audiencia_preliminar_resolucion                =  $request -> familiaAudienciaPreliminarResolucion;
            $seguimiento_juridico -> familia_audiencia_sentencia_hora_fecha                 =  $this->formatDateTime($request -> familiaAudienciaSentenciaHoraFecha);
            $seguimiento_juridico -> familia_audiencia_sentencia_resolucion                 =  $request -> familiaAudienciaSentenciaResolucion;
            $seguimiento_juridico -> familia_demanda                                        =  $request -> familiaDemanda;
            $seguimiento_juridico -> familia_demanda_otro                                   =  ucfirst($request -> familiaDemandaOtro);
            $seguimiento_juridico -> violencia_mujer_diligencia                             =  $request -> violenciaMujerDiligencia;
            $seguimiento_juridico -> sede_judicial_diligencia                               =  $request -> sedeJudicialDiligencia;
            $seguimiento_juridico -> violencia_mujer_sede_municipio_fk                      =  $request -> violenciaMujerSedeJuzgadoMunicipio;
            $seguimiento_juridico -> violencia_mujer_resolucion                             =  $request -> violenciaMujerResolucion;
            $seguimiento_juridico -> derecho_nines_adolecencia                              =  $request -> derechoNinesAdolecencia;
            $seguimiento_juridico -> derecho_nines_adolecencia_vulneracion                  =  $request -> derechoNinesAdolecenciaVulneracion;
            $seguimiento_juridico -> derecho_nines_adolecencia_auto_vulneración_de_derechos =  $request -> derechoNinesAdolecenciaAutoVulneraciónDeDerechos;
            $seguimiento_juridico -> derecho_nines_adolecencia_otro                         =  $request -> derechoNinesAdolecenciaOtro;
            $seguimiento_juridico -> referencia_servicios                                   =  $request -> referenciaServicios;
            $seguimiento_juridico -> referencia_servicios_hora_fecha                        =  $this->formatDateTime($request -> referenciaServiciosHoraFecha);
            $seguimiento_juridico -> cierre_expediente                                      =  $request -> cierreExpediente;
            $seguimiento_juridico -> cierre_expediente_hora_fecha                           =  $this->formatDateTime($request -> cierreExpedienteHoraFecha);
            $seguimiento_juridico -> atencion_brindada_fk                                   =  $this->keyAtencionBrindada($request);
            $seguimiento_juridico -> institucion_a_la_que_se_refiere                        =  $request -> institucionALaQueSeRefiere;
            $seguimiento_juridico -> atencion_brindada_otro                                 =  ucfirst($request -> atencionBrindadaOtro);
            $seguimiento_juridico -> save();

            return response()->json([
                "mensaje" => 'Exito, se guardo el registro.', 
                "key" => DB::select(DB::raw("select md5(".$seguimiento_juridico->id.") as 'key';"))[0]->key,
            ]);
            
        }catch (\Exception $e) { 
            bitacora_errores('SeguimientoJuridicoController.php', $e);
            return response()->json(['error' => 'Linea -> '.$e->getLine().' Error -> '.$e->getMessage()]);
        }
    }

    private function keyAtencionBrindada($request) {
        if($request->atencionBrindada === null) 
            return null;

        if($request->atencionBrindadaSubMenu != null)
            return AtencionBrindada::whereRaw('md5(id) like "'.$request->atencionBrindadaSubMenu.'"')->first()->id;
        
        return AtencionBrindada::whereRaw('md5(id) like "'.$request->atencionBrindada.'"')->first()->id;  
    }

    private function formatDateTime($dateTime){
        if($dateTime===null)
            return null;
        return str_replace('T', ' ', $dateTime);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SeguimientoJuridico  $seguimientoJuridico
     * @return \Illuminate\Http\Response
     */
    public function show($key)
    {
        try{
            if(!SeguimientoJuridico::whereRaw('md5(id) like "'.$key.'"')->exists()){
                abort(505, 'Registro de "Seguimiento Juridico" no encontrado [Error 505]'); 
            }

            $select = [
                DB::raw('md5(seguimiento_juridicos.id) as "key"'),
                'caso_fk                                                as codigoCaso',
                'tipo_servicio_fecha_hora                               as tipoServicioFechaHora',
                'tipo_servicio                                          as tipoServicio',
                'casos.tipos_violencia                                  as tipoViolencia',
                'casos.modalidad_violencia                              as modalidadViolencia',
                'casos.delito_codigo_penal                              as violenciaMujerCodigoPenal',
                'casos.delito_codigo_penal_otro                         as violenciaMujerCodigoPenalOtro',
                'servicio_que_remite                                    as servicioQueRemite',
                'medidas_proteccion_inicio                              as medidasProteccionDesde',
                'medidas_proteccion_final                               as medidasProteccionHasta',
                'audiencia_preliminar                                   as audienciaPreliminar',
                'audiencia_publica                                      as audienciaPublica',
                'audiencia_preliminar_resolucion                        as audienciaPreliminarResolucion',
                'audiencia_publica_resolucion                           as audienciaPublicaResolucion',
                'familia_procuraduria_general_hora_fecha                as familiaProcuraduriaGeneralHoraFecha',
                'familia_procuraduria_general_acuerdo                   as familiaProcuraduriaGeneralAcuerdo',
                'familia_audiencia_preliminar_hora_fecha                as familiaAudienciaPreliminarHoraFecha',
                'familia_audiencia_preliminar_resolucion                as familiaAudienciaPreliminarResolucion',
                'familia_audiencia_sentencia_hora_fecha                 as familiaAudienciaSentenciaHoraFecha',
                'familia_audiencia_sentencia_resolucion                 as familiaAudienciaSentenciaResolucion',
                'familia_demanda                                        as familiaDemanda',
                'familia_demanda_otro                                   as familiaDemandaOtro',
                'violencia_mujer_diligencia                             as violenciaMujerDiligencia',
                'sede_judicial_diligencia                               as sedeJudicialDiligencia',
                'departamentos.id                                       as violenciaMujerSedeJuzgadoDepartamento',
                'violencia_mujer_sede_municipio_fk                      as violenciaMujerSedeJuzgadoMunicipio',
                'violencia_mujer_resolucion                             as violenciaMujerResolucion',
                'derecho_nines_adolecencia                              as derechoNinesAdolecencia',
                'derecho_nines_adolecencia_vulneracion                  as derechoNinesAdolecenciaVulneracion',
                'derecho_nines_adolecencia_auto_vulneración_de_derechos as derechoNinesAdolecenciaAutoVulneraciónDeDerechos',
                'derecho_nines_adolecencia_otro                         as derechoNinesAdolecenciaOtro',
                'referencia_servicios                                   as referenciaServicios',
                'referencia_servicios_hora_fecha                        as referenciaServiciosHoraFecha',
                'cierre_expediente                                      as cierreExpediente',
                'cierre_expediente_hora_fecha                           as cierreExpedienteHoraFecha',
                'seguimiento_juridicos.atencion_brindada_fk             as atencionBrindada',
                'seguimiento_juridicos.atencion_brindada_fk             as atencionBrindadaSubMenu',
                'seguimiento_juridicos.atencion_brindada_otro           as atencionBrindadaOtro',
                'seguimiento_juridicos.institucion_a_la_que_se_refiere  as institucionALaQueSeRefiere'
            ];

            $seguimientoJuridico = SeguimientoJuridico::select($select)
                ->join('casos', 'casos.id', '=', 'seguimiento_juridicos.caso_fk')
                ->leftJoin('municipios', 'municipios.id', '=', 'seguimiento_juridicos.violencia_mujer_sede_municipio_fk')
                ->leftJoin('departamentos', 'departamentos.id', '=','municipios.departamento_fk')
                ->where('seguimiento_juridicos.estado', true)
                ->whereRaw('md5(seguimiento_juridicos.id) = "'.$key.'"')
            ->first();

            $seguimientoJuridico->codigoCaso = Casos::select([
                DB::raw('md5(id) as "key"'), 
                DB::raw("CONCAT(`casos`.`denuncia`, ' ', LPAD(`casos`.`correlativo`, 3, '0'), '-', LPAD(casos.mes, 2, '0'), '-', casos.anio) as 'label'")]
            )->find($seguimientoJuridico->codigoCaso);            
                
            $seguimientoJuridico = $this->getAtencionBrindada($seguimientoJuridico);

            return $seguimientoJuridico;
        }catch (\Exception $e) { 
            bitacora_errores('SeguimientoJuridicoController.php', $e);
            return response()->json(['error' => 'Linea -> '.$e->getLine().' Error -> '.$e->getMessage()]);
        }   
    }

    private function getAtencionBrindada($seguimientoJuridico) {        

        if(AtencionBrindada::whereRaw('atencion_brindada_fk is not null')->where('id', $seguimientoJuridico->atencionBrindadaSubMenu)->exists()){
            $atencion = AtencionBrindada::select(
                    [
                        DB::raw('md5(subAtencion.id) as subAtencion'), 
                        DB::raw('md5(atencion_brindadas.id) as atencion')
                    ]
                )
            ->leftJoin('atencion_brindadas as subAtencion', 'subAtencion.atencion_brindada_fk', '=', 'atencion_brindadas.id')
            ->where('subAtencion.id', '=', $seguimientoJuridico->atencionBrindada)->first();

            $seguimientoJuridico -> atencionBrindada = $atencion -> atencion;
            $seguimientoJuridico -> atencionBrindadaSubMenu = $atencion -> subAtencion;

            return $seguimientoJuridico;
        }

        if(AtencionBrindada::whereRaw('atencion_brindada_fk is null')->whereRaw('md5(id) like "'.$seguimientoJuridico->atencionBrindada.'"')->exists()){
            $atencion = AtencionBrindada::select([DB::raw('md5(id) as atencion')])
            ->whereRaw('md5(id) like "'.$seguimientoJuridico->atencionBrindada.'"')
            ->first();

            $seguimientoJuridico -> atencionBrindada = $atencion -> atencion;
            $seguimientoJuridico -> atencionBrindadaSubMenu = null;
            
            return $seguimientoJuridico;
        }
        
        $seguimientoJuridico -> atencionBrindada = null;
        $seguimientoJuridico -> atencionBrindadaSubMenu = null;

        return $seguimientoJuridico;
    }

    public function fullCalendarEvents (){
        try{
            $selectArray = [
                ["columna"=>"audiencia_publica", "proceso"=>"Violencia Intrafamiliar", "tipo_audiencia"=>"Pública"],
                ["columna"=>"audiencia_publica", "proceso"=>"Violencia Intrafamiliar", "tipo_audiencia"=>"Pública"],
                ["columna"=>"familia_audiencia_preliminar_hora_fecha", "proceso"=>"Familia", "tipo_audiencia"=>"Preliminar"],
                ["columna"=>"familia_audiencia_sentencia_hora_fecha", "proceso"=>"Familia", "tipo_audiencia"=>"Sentencia"],
            ];

            $selectAgenda = [
                DB::raw('md5(id) as "key"'),
                DB::raw('concat(title, " (Click Ver Detalles)") as "title"'),
                'start', 'end',
                DB::raw('true as agendaItem')
            ];

            $query = Agenda::select($selectAgenda)
            ->where('estado',true)
            ->where('oficina', auth()->user()->oficina)
            ->where('modulo','like','Seguimiento Juridico')
            ->where('modulo', 'like', 'Seguimiento Juridico');

            foreach ($selectArray as $key => $value) {
                $item = (object) $value;
                $select = [
                    DB::raw('md5(seguimiento_juridicos.id) as "key"'),
                    DB::raw("
                        concat( 
                            IFNULL(sede_judicial_diligencia, 'No Seleccionado'),
                            ' - Audiencia ".$item->tipo_audiencia." - ".$item->proceso." - ',
                            `casos`.`denuncia`,
                            ' ',
                            LPAD(`casos`.`correlativo`,3,'0'),
                            '-',
                            LPAD( `casos`.`mes`,2,'0'),
                            '-', 
                            `casos`.`anio`,
                            ' (Click Ver Detalles)'
                        ) as title"),
                    DB::raw("DATE_FORMAT(".$item->columna.", '%Y-%m-%dT%H:%i:%s') as start"),
                    DB::raw('null as end'),
                    DB::raw('false as agendaItem')
                ];

                $queryAux = SeguimientoJuridico::select($select)
                    ->join('casos','casos.id', '=', 'seguimiento_juridicos.caso_fk')
                    ->leftJoin('municipios', 'municipios.id',"=","casos.municipio_ocurrencia_fk")
                    ->leftJoin('departamentos', 'departamentos.id',"=","municipios.departamento_fk")
                    ->where( function ($query){
                        $query->where('casos.denuncia','like', tipo_denuncia()->denuncia)
                        ->orWhere('casos.denuncia','like', tipo_denuncia()->sin_denuncia);
                    })
                ->where('seguimiento_juridicos.estado', true);

                $query -> union($queryAux);
            }

            return $query->get();
        }catch (\Exception $e) { 
            bitacora_errores('SeguimientoJuridicoController.php', $e);
            return response()->json(['error' => 'Linea -> '.$e->getLine().' Error -> '.$e->getMessage()]);
        }  
    }

    public function cambiarOpcionesCaso(Request $request){
        try{
            if(!($request->casoKey ?? false) && !($request->tipo ?? false) && !($request -> opcion ?? false))
                abort(505, 'No se cumplieron los requisitos para realizar la petición POST [Error 505]'); 
            
            $caso_query = Casos::whereRaw('md5(id) like "'.$request->casoKey.'"')->first();
            
            switch ($request->tipo) {

                case 'tipoViolencia':
                    $caso_query->tipos_violencia = $request -> opcion;
                    $caso_query->save();
                    return response()->json([
                        "mensaje" => 'Exito, modificación de la Opción Tipo de Violencia.', 
                    ]);
                    break;

                case 'modalidadViolencia':
                    $caso_query->modalidad_violencia = $request -> opcion;
                    $caso_query->save();
                    return response()->json([
                        "mensaje" => 'Exito, modificación de la Opción Modalidad de Violencia.', 
                    ]);
                    break;

                case 'codigoPenal':
                    $caso_query->delito_codigo_penal = $request -> opcion;
                    if($request -> opcion !== 'Otro') 
                        $caso_query -> delito_codigo_penal_otro = null;
                    $caso_query->save();
                    return response()->json([
                        "mensaje" => 'Exito, modificación de la Opción Delitos de Delito Codigo Penal.', 
                    ]);
                    break;

                case 'codigoPenalOtro':
                    $caso_query->delito_codigo_penal = 'Otro';
                    $caso_query->delito_codigo_penal_otro = $request -> opcion;
                    $caso_query->save();
                    return response()->json([
                        "mensaje" => 'Exito, modificación de la Opción Delitos del Delito Codigo Penal e Ingreso de Otro Delito Penal.', 
                    ]);
                    break;

                case 'delitosLeivs':
                    $caso = $caso_query;
                    DelitosLeiv::where('caso_fk', $caso->id)->delete();
                    foreach($request->opcion as $key => $value) {
                        DelitosLeiv::updateOrCreate(
                            ['caso_fk' => $caso->id, 'delito'=> $value]
                        );
                    }
                    return response()->json([
                        "mensaje" => 'Exito, modificación de la Delitos Leivs.', 
                    ]);
                    break;                
                default:
                    
                    break;
            }
        }catch (\Exception $e) { 
            bitacora_errores('SeguimientoJuridicoController.php', $e);
            return response()->json(['error' => 'Linea -> '.$e->getLine().' Error -> '.$e->getMessage()]);
        }  
    }

    /**
     * @param  \App\Models\SeguimientoJuridico  $seguimientoJuridico
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try{
            $_update = SeguimientoJuridico::whereRaw('md5(id) like "'.$request->key.'"')->update(['estado'=>false]);
            
            if(!$_update)
                abort(505, 'No se Elimino el Registro de Seguimiento Jurídico [Error 505]'); 

            return response()->json([
                "mensaje" => 'Exito, Registro Eliminado.', 
            ]);
        }catch (\Exception $e) { 
            bitacora_errores('SeguimientoJuridicoController.php', $e);
            return response()->json(['error' => 'Linea -> '.$e->getLine().' Error -> '.$e->getMessage()]);
        } 
    }
}
