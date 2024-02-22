<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\TraitJuridico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


use App\Http\Controllers\Traits\TraitCasos;
use App\Http\Controllers\Traits\TraitLudoteca;

class ExcelController extends Controller
{
    use TraitCasos, TraitLudoteca,TraitJuridico;

    public function caso($id){
        try {
            //code...
            // $caso = Casos::select(
            //     [
            //         "id",
            //         DB::raw(
            //             "concat(`casos`.`denuncia`,' ',
            //                 LPAD(`casos`.`correlativo`,3,'0'), '-',
            //                 LPAD( `casos`.`mes`,2,'0'), '-', `casos`.`anio`)
            //             as codigo"
            //         ),
            //         "id as key",
            //         "victima_fk",
            //         "responsable_fk"
            //     ]
            // )
            // ->whereRaw("md5(id) like '".($id ?? "null")."'")
            // ->where('estado', true)
            // ->first();

            // $titulo = "Caso ".($caso->codigo ?: "Desconocido");

            // $caso->key = $id;
            
            // return Excel::download(new ExportCaso($caso), $titulo, \Maatwebsite\Excel\Excel::XLS);
            //return (new ExportCaso($caso->victima_fk))->download('reporte-general.xlsx');
        } catch (\Exception $e) {
            bitacora_errores('ExcelController.php', $e);
            return response()->json(['error' => 'Linea -> '.$e->getLine().' Error -> '.$e->getMessage()]);
        }       
    }

    public function casos($reporte, $tipo, $mes, $anio){
        try {
            $meses = [];
            $tipo === 'MENSUAL' && $meses = [$mes];
            $tipo ==='PRIMER TRIMESTRE' && $meses = [1,2,3];
            $tipo ==='SEGUNDO TRIMESTRE' && $meses = [4,5,6];
            $tipo ==='TERCER TRIMESTRE' && $meses = [7,8,9];  
            $tipo ==='CUARTO TRIMESTRE' && $meses = [10,11,12]; 

            switch ($reporte) {
                case 'CASOS':
                    switch ($tipo) {
                        case 'MENSUAL':
                            $where = ['casos.mes' => $mes, 'casos.anio' => $anio];                        
                            return $this -> reporteCasos($where, $meses, $tipo, $mes, $anio, $reporte);
                        case 'PRIMER TRIMESTRE': case 'SEGUNDO TRIMESTRE': case'TERCER TRIMESTRE':
                            $where = ['casos.anio' => $anio];
                            return $this -> reporteCasos($where, $meses, $tipo, $mes, $anio, $reporte);
                        case 'ANUAL':
                            $where = ['casos.anio' => $anio];                        
                            return $this -> reporteCasos($where, [], $tipo, $mes, $anio, $reporte);                   
                        default:
                            return $this -> reporteCasos([], [], [], [], [], []);
                    }         
                case 'LUDOTECA':
                   return $this -> reporteLudoteca($meses, $tipo, $anio, $reporte);            
                
                case 'JURÍDICO':
                    return $this -> reporteJuridico($meses, $tipo, $anio, $reporte);            
                default:
                    # code...
                break;
            }
        } catch (\Exception $e) {
            bitacora_errores('ExcelController.php', $e);
            return response()->json(['error' => 'Linea -> '.$e->getLine().' Error -> '.$e->getMessage()]);
        } 
    }
}
