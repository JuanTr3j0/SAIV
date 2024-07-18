<?php

namespace App\Http\Controllers\Traits;

use App\Models\Persona;
use Illuminate\Support\Facades\DB;
use App\Models\Ludoteca;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportLudoteca;
use App\Models\LudotecaTipoViolencia;
use App\Exports\TraitConfig;

trait TraitLudoteca{
    use TraitConfig;
    public function reporteLudoteca ($meses, $tipo, $anio, $reporte){

      
        try {

            $ludoteca = Ludoteca::whereRaw("YEAR(tipo_atencion_fecha_hora) = ". $anio)
                ->where(function($query) use ($meses) {
                    foreach ($meses as $m) {
                        $query->orWhereRaw("MONTH(tipo_atencion_fecha_hora) = " .$m);
                    }
                });

           $select = [
                DB::raw("concat(`casos`.`denuncia`,' ', LPAD(`casos`.`correlativo`,3,'0'),
                '-',LPAD(`casos`.`mes`,2,'0'), '-', `casos`.`anio`) as codigo")
                ,'parentesco_responsable'
                ,'parentesco_responsable_otro'
                ,'tipo_atencion'
                ,'escolaridad'
                ,'tipo_atencion_fecha_hora'
                ,'orientacion_responsables'
                ,'orientacion_responsables_fecha_hora'
                ,'proxima_cita'
            ];

            $ludoteca ->select($select)->leftJoin('casos','casos.id', '=', 'ludotecas.caso_fk');  

            //return $ludoteca->toSql();
            return Excel::download(new ExportLudoteca($ludoteca -> get(), $tipo, $meses, $anio, $reporte), 'ludoteca.xls', \Maatwebsite\Excel\Excel::XLS);

        } catch (\Exception $e) {

            bitacora_errores('ExcelController.php', $e);

            return response()->json(['error' => 'Linea -> '.$e->getLine().' Error -> '.$e->getMessage()]);

        } catch (\Exception $e) {

            bitacora_errores('ExcelController.php', $e);

            return response()->json(['error' => 'Linea -> '.$e->getLine().' Error -> '.$e->getMessage()]);

        } 

    }

}