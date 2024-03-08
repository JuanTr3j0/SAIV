<?php

namespace App\Http\Controllers\Traits;

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

            // Utilizamos el método whereYear y whereMonth para una sintaxis más limpia y legible.
            $ludoteca = Ludoteca::whereYear('tipo_atencion_fecha_hora', $anio)
            ->where(function($query) use ($meses) {
                foreach ($meses as $mes) {
                    $query->orWhereMonth('tipo_atencion_fecha_hora', $mes);
                }
            });

            // Seleccionamos los campos necesarios de una manera más ordenada.
            $select = [
                'ludotecas.id as ludoteca_id'
                ,'casos.id as id_caso',
                DB::raw("CONCAT(casos.denuncia, ' ', LPAD(casos.correlativo, 3, '0'), '-', LPAD(casos.mes, 2, '0'), '-', casos.anio) as codigo"),
                'parentesco_responsable',
                'parentesco_responsable_otro',
                'tipo_atencion',
                'escolaridad',
                'tipo_atencion_fecha_hora',
                'orientacion_responsables',
                'orientacion_responsables_fecha_hora',
                'proxima_cita',
                DB::raw("ludotecas.id  as ludoteca_tipo_violencia")
            ];

            // Hacemos el join de manera más concisa y seleccionamos los campos necesarios.
            $ludoteca -> select($select)->leftJoin('casos', 'casos.id', '=', 'ludotecas.caso_fk');
           

            // Obtenemos los IDs de los casos para evitar consultas dentro del bucle
            $ids = $ludoteca->pluck('ludoteca_id');

            // Obtenemos todos los tipos de violencia relacionados con los IDs de los casos
            $tiposViolencia = LudotecaTipoViolencia::whereIn('ludoteca_fk', $ids)
                ->select('ludoteca_fk', 'opcion')->get();

                $persona = Persona::whereIn('ludoteca_fk', $ids)
                ->select('ludoteca_fk', 'opcion')->get();
            $ludoteca = $ludoteca->get();

            foreach ($ludoteca as $value) {

                $tipos = $tiposViolencia
                ->where('ludoteca_fk', $value->ludoteca_tipo_violencia)
                ->pluck('opcion')->toArray();

                $value->ludoteca_tipo_violencia = count($tipos) === 0 ? ' -- ' : implode(', ',$tipos).'.';
            }

            
            return Excel::download(new ExportLudoteca($ludoteca, $tipo, $meses, $anio, $reporte), 'ludoteca.xls', \Maatwebsite\Excel\Excel::XLS);

        } catch (\Exception $e) {

            bitacora_errores('ExcelController.php', $e);

            return response()->json(['error' => 'Linea -> '.$e->getLine().' Error -> '.$e->getMessage()]);

        } 

    }

}