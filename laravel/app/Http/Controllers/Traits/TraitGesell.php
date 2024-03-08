<?php

namespace App\Http\Controllers\Traits;

use Illuminate\Support\Facades\DB;
use App\Models\Programacion;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportGesell;

trait TraitGesell
{

    public function reporteGesell($meses, $tipo, $anio, $reporte)
    {

        try {

            $programacion = Programacion::whereRaw("YEAR(fecha) = " . $anio)
                ->where(function ($query) use ($meses) {
                    foreach ($meses as $m) {
                        $query->orWhereRaw("MONTH(fecha) = " . $m);
                    }
                });

            $select = [

                'correlativo',
                DB::raw("oficinas.lugar as nombreOficina"),
                'fecha',
                'hora',
                'solicitado_por',
                'nombres',
                'apellidos',
                'realizada',
            ];
            $programacion->select($select);
            $programacion->select($select)->leftJoin('oficinas', 'oficinas.id', '=', 'programacions.oficina');
            //$programacion ->select($select)->leftJoin('casos','casos.id', '=', 'programacions.caso_fk');  
            // return $programacion->toSql();
            return Excel::download(new ExportGesell($programacion->get(), $tipo, $meses, $anio, $reporte), 'gesell.xls', \Maatwebsite\Excel\Excel::XLS);

        } catch (\Exception $e) {

            bitacora_errores('ExcelController.php', $e);

            return response()->json(['error' => 'Linea -> ' . $e->getLine() . ' Error -> ' . $e->getMessage()]);

        }

    }

}