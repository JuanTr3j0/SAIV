<?php

namespace App\Http\Controllers\Traits;

use App\Exports\ExportJuridico;
use Illuminate\Support\Facades\DB;
use App\Models\SeguimientoJuridico;
use Maatwebsite\Excel\Facades\Excel;


trait TraitJuridico{

    public function reporteJuridico($meses, $tipo, $anio, $reporte){

        try {

            $juridico = SeguimientoJuridico::whereRaw("YEAR(tipo_servicio_fecha_hora) = ". $anio)
                ->where(function($query) use ($meses) {
                    foreach ($meses as $m) {
                        $query->orWhereRaw("MONTH(tipo_servicio_fecha_hora) = " .$m);
                    }
                });
           
           $select = [
                DB::raw("concat(`casos`.`denuncia`,' ', LPAD(`casos`.`correlativo`,3,'0'),
                '-',LPAD(`casos`.`mes`,2,'0'), '-', `casos`.`anio`) as codigo"),
                'seguimiento_juridicos.estado',
                'atencion_brindada_otro',
                'tipo_servicio_fecha_hora',
                'medidas_proteccion_inicio',
                'medidas_proteccion_final',
                'audiencia_preliminar',
                'audiencia_publica',
                'familia_procuraduria_general_hora_fecha',
                'familia_procuraduria_general_acuerdo',
                'familia_audiencia_preliminar_hora_fecha',
                'familia_audiencia_preliminar_resolucion',
                'familia_audiencia_sentencia_hora_fecha',
                'familia_audiencia_sentencia_resolucion',
                'violencia_mujer_sede_municipio_fk',
                'derecho_nines_adolecencia_vulneracion',
                'referencia_servicios_hora_fecha',
                'cierre_expediente_hora_fecha',
                'derecho_nines_adolecencia_otro',
                'familia_demanda_otro',
                'tipo_servicio',
                'servicio_que_remite',
                'audiencia_preliminar_resolucion',
                'audiencia_publica_resolucion',
                'familia_demanda',
                'violencia_mujer_diligencia',
                'sede_judicial_diligencia',
                'violencia_mujer_resolucion',
                'derecho_nines_adolecencia',
                'referencia_servicios',
                'cierre_expediente',
                'institucion_a_la_que_se_refiere',
                'atencion_brindada_fk',
                
            ];

            $juridico ->select($select)->leftJoin('casos','casos.id', '=', 'seguimiento_juridicos.caso_fk');  
            
            //return $juridico->toSql();
            return Excel::download(new ExportJuridico($juridico -> get(), $tipo, $meses, $anio, $reporte), 'juridico.xls', \Maatwebsite\Excel\Excel::XLS);

        } catch (\Exception $e) {

            bitacora_errores('ExcelController.php', $e);

            return response()->json(['error' => 'Linea -> '.$e->getLine().' Error -> '.$e->getMessage()]);

        } 

    }

}