<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


use App\Http\Controllers\Traits\TraitCasos;

class ExcelController extends Controller
{
    use TraitCasos;

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
            switch ($reporte) {
                case 'CASOS':
                    switch ($tipo) {
                        case 'MENSUAL':
                            $where = ['casos.mes' => $mes, 'casos.anio' => $anio];                        
                            return $this -> reporteCasos($where, [], $tipo, $mes, $anio, $reporte);
                            break;
                        case 'PRIMER TRIMESTRE': case 'SEGUNDO TRIMESTRE': case'TERCER TRIMESTRE':
                            $where = ['casos.anio' => $anio];
                            $tipo ==='PRIMER TRIMESTRE' && $whereIn = [1,2,3,4];
                            $tipo ==='SEGUNDO TRIMESTRE' && $whereIn = [5,6,7,8];
                            $tipo ==='TERCER TRIMESTRE' && $whereIn = [9,10,11,12];                        
                            return $this -> reporteCasos($where, $whereIn, $tipo, $mes, $anio, $reporte);
                            break;
                        case 'ANUAL':
                            $where = ['casos.anio' => $anio];                        
                            return $this -> reporteCasos($where, [], $tipo, $mes, $anio, $reporte);
                            break;                        
                        default:
                            return $this -> reporteCasos([], [], [], [], [], []);
                            break;
                    }                    
                break; 
                case 'JURIDICO':
                break;               
                case 'LUDOTECA':
                break;               
                case 'GESELL':
                break;               
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
