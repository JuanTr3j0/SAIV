<?php



namespace App\Http\Controllers;



use App\Models\Departamentos;

use App\Models\Municipios;

use App\Models\AtencionBrindada;

use App\Models\Oficinas;
use Illuminate\Support\Facades\DB;



class OpcionesController extends Controller

{

    public function index(){

        // Departamentos 

        $departamentos = Departamentos::select('id as key','departamento')->orderBy('departamento', 'asc')->get();

        // Tipo de Caso

        $denuncia = [tipo_denuncia()->denuncia, tipo_denuncia()->sin_denuncia, tipo_denuncia()->diligencia];

        // Casos

      //  $tiposViolencia         = getEnunms('casos','tipos_violencia');

        $delitoCodigoPenal      = getEnunms('casos','delito_codigo_penal');

        $modalidadViolencia     = getEnunms('casos','modalidad_violencia');

        $institucionRemitente   = getEnunms('casos','institucion_remitente'); 

        $circunstanciaDelHecho  = getEnunms('casos','circunstancia_del_hecho'); 

        $delitosLeivs           = getEnunms('delitos_leivs','delito');    

        // Persona

        $discapacidad           = getEnunms('personas','discapacidad');

        $ocupacion              = getEnunms('personas','ocupacion');

        $zona_residencial       = getEnunms('personas','zona_residencial');

        $sexo                   = getEnunms('personas','sexo');

        $genero                 = getEnunms('personas','genero');

        $sabe_escribir_leer     = getEnunms('personas','sabe_escribir_leer');

        $nivel_educacion        = getEnunms('personas','nivel_educacion');

        $estado_familiar        = getEnunms('personas','estado_familiar');

        $nacionalidad           = getEnunms('personas','nacionalidad');

        $embarazada             = getEnunms('personas','embarazada');

        $empresa_movil          = getEnunms('personas','empresa');

        $propietario_residencia = getEnunms('personas','propietario_residencia');

        $relacionVictima        = getEnunms('personas','relacion_victima');

        // Fuente de Ingresos

        $fuente_ingreso         = getEnunms('ingresos','fuente_ingreso');

        // Tipo Asistencia

        $tiposAsistencia        = getEnunms('tipo_asistencias','asistencia');//Nuevo

        // Institucion Se Remite

        $institucionSeRemitira  = getEnunms('institucion_se_remitiras','institucion');

        //Agresores

        $relacionVictimaAgresor = getEnunms('agresores_casos','relacion_victima_agresor');

        $ocupacionAgresor       = getEnunms('agresores_casos','ocupacion_agresor');

        $tipo_arma              = getEnunms('agresores_casos','tipo_arma');


        return response()->json([

            "denuncia"                  => $denuncia,

            "departamentos"             => $departamentos,

            "tipoAsistencia"            => $tiposAsistencia,

         //   "tiposViolencia"            => $tiposViolencia,

            "delitoCodigoPenal"         => $delitoCodigoPenal,

            "modalidadViolencia"        => $modalidadViolencia,

            "institucionRemitente"      => $institucionRemitente,

            "institucionSeRemitira"     => $institucionSeRemitira,

            "relacionVictimaAgresor"    => $relacionVictimaAgresor,

            "relacionVictima"           => $relacionVictima,

            "ocupacionAgresor"          => $ocupacionAgresor,

            'discapacidad'              => $discapacidad,

            'ocupacion'                 => $ocupacion,

            'zona_residencial'          => $zona_residencial,

            'sexo'                      => $sexo,

            'genero'                    => $genero,

            'sabe_escribir_leer'        => $sabe_escribir_leer,

            'nivel_educacion'           => $nivel_educacion,

            'estado_familiar'           => $estado_familiar,

            'nacionalidad'              => $nacionalidad,

            'embarazada'                => $embarazada,

            'propietario_residencia'    => $propietario_residencia,

            'empresa_movil'             => $empresa_movil,

            'fuente_ingreso'            => $fuente_ingreso,

            'delitosLeivs'              => $delitosLeivs,

            'circunstanciaDelHecho'     => $circunstanciaDelHecho,

            'tipoArma'                  => $tipo_arma,

        ], 200);

    }



    public function getMunicipios($departamento){

        $municipios = Municipios::select('id as key','municipio')

            ->where('departamento_fk',$departamento)

            ->orderBy('municipio', 'asc')

        ->get();

        

        return response()->json(["municipios" => $municipios], 200);

    }

    // Seguimiento Jurídico

    public function indexSeguimientoJuridico(){

    

        $tipo_servicio                              = getEnunms('seguimiento_juridicos', 'tipo_servicio');

        $servicio_que_remite                        = getEnunms('seguimiento_juridicos', 'servicio_que_remite');

        $audiencia_preliminar_resolucion            = getEnunms('seguimiento_juridicos', 'audiencia_preliminar_resolucion');

        $audiencia_publica_resolucion               = getEnunms('seguimiento_juridicos', 'audiencia_publica_resolucion');

        $familia_demanda                            = getEnunms('seguimiento_juridicos', 'familia_demanda');

        $violencia_mujer_diligencia                 = getEnunms('seguimiento_juridicos', 'violencia_mujer_diligencia');

        $sede_judicial_diligencia                   = getEnunms('seguimiento_juridicos', 'sede_judicial_diligencia');

        $violencia_mujer_resolucion                 = getEnunms('seguimiento_juridicos', 'violencia_mujer_resolucion');    

        $derecho_nines_adolecencia                  = getEnunms('seguimiento_juridicos', 'derecho_nines_adolecencia'); 

        $referencia_servicios                       = getEnunms('seguimiento_juridicos', 'referencia_servicios');

        $cierre_expediente                          = getEnunms('seguimiento_juridicos', 'cierre_expediente');

        $institucion_a_la_que_se_refiere            = getEnunms('seguimiento_juridicos', 'institucion_a_la_que_se_refiere');

        $derecho_nines_adolecencia_vulneracion      = getEnunms('seguimiento_juridicos', 'derecho_nines_adolecencia_vulneracion');

        $derecho_nines_adolecencia_auto_vulneración_de_derechos = getEnunms('seguimiento_juridicos', 'derecho_nines_adolecencia_auto_vulneración_de_derechos');



        // Casos

        $tipo_violencia                             = getEnunms('casos','tipos_violencia');

        $delito_codigo_penal                        = getEnunms('casos','delito_codigo_penal');

        $modalidad_violencia                        = getEnunms('casos','modalidad_violencia');

        $delitos_leivs                              = getEnunms('delitos_leivs','delito'); 



        $atencion_brindada = AtencionBrindada::select([DB::raw('SHA1(id) as "key"'), 'opcion'])

        ->orderBy('opcion', 'asc')->where('atencion_brindada_fk', null)->get();



        return response()->json([

            'tipoServicio'                              => $tipo_servicio,

            'tipoViolencia'                             => $tipo_violencia,

            'modalidadViolencia'                        => $modalidad_violencia,

            'servicioQueRemite'                         => $servicio_que_remite,

            'audienciaPreliminarResolucion'             => $audiencia_preliminar_resolucion,

            'audienciaPublicaResolucion'                => $audiencia_publica_resolucion,

            'familiaDemanda'                            => $familia_demanda,

            'violenciaMujerDiligencia'                  => $violencia_mujer_diligencia,

            'sedeJudicialDiligencia'                    => $sede_judicial_diligencia,

            'violenciaMujerResolucion'                  => $violencia_mujer_resolucion,

            'derechoNinesAdolecencia'                   => $derecho_nines_adolecencia,

            'referenciaServicios'                       => $referencia_servicios,

            'cierreExpediente'                          => $cierre_expediente,

            'atencionBrindada'                          => $atencion_brindada,

            'delitoCodigoPenal'                         => $delito_codigo_penal,

            'delitosLeivs'                              => $delitos_leivs, 

            'institucionALaQueSeRefiere'                => $institucion_a_la_que_se_refiere,

            'derechoNinesAdolecenciaVulneracion'=>  $derecho_nines_adolecencia_vulneracion,

            'derechoNinesAdolecenciaAutoVulneraciónDerechos'=>  $derecho_nines_adolecencia_auto_vulneración_de_derechos,

        ], 200);

    }



    public function indexSeguimientoJuridicoAtencionBrindada($key){

        return AtencionBrindada::select([DB::raw('SHA1(id) as "key"'), 'opcion'])

        ->orderBy('opcion', 'asc')->whereRaw('SHA1(atencion_brindada_fk) like "'.$key.'"')->get();

    }



    //Ludoteca

    public function indexLudoteca(){

        // Ludoteca

        $parentesco_responsable   = getEnunms('ludotecas', 'parentesco_responsable');

        $orientacion_responsables = getEnunms('ludotecas', 'orientacion_responsables');

        $tipo_atencion            = getEnunms('ludotecas', 'tipo_atencion');

        $escolaridad              = getEnunms('ludotecas', 'escolaridad');



        //Ludoteca Tipo Violencia

        $tipos_violencia   = getEnunms('ludoteca_tipo_violencias', 'opcion');



        //Personas 

        $zona_residencial       = getEnunms('personas','zona_residencial');

        $empresa_movil          = getEnunms('personas','empresa');

        return response()->json([

            'parentescoResponsable'  => $parentesco_responsable,

            'orientacionResponsable' => $orientacion_responsables,

            'tipoAtencion'           => $tipo_atencion,

            'tiposViolencia'         => $tipos_violencia,

            'zonaResidencial'        => $zona_residencial,

            'escolaridad'           => $escolaridad,

            'empresaMovil'         => $empresa_movil

        ], 200);

    }

}

