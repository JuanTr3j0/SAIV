<?php

namespace App\Http\Controllers;




use Illuminate\Http\Request;
use App\Http\Controllers\Traits\TraitCasos;

use PDF;

class PdfController extends Controller
{

 
use TraitCasos;

public function index($key){
    $casoJson = $this->showCaso($key);
    $caso = json_decode($casoJson, true);
    // return view("exports.expediente.casoPDF");
   // $data = ['title' => 'Reporte de ejemplo', 'content' => 'Este es el contenido del reporte.'];
    
   // $pdf = PDF::loadView('exports.expediente.casoPDF', $caso);
    
   // return response()->json($caso);
    return view('exports.expediente.casoPDF', $caso);
}
    public function reporte($key){
      $casoJson = $this->showCaso($key);
      $caso = json_decode($casoJson, true);
        // return view("exports.expediente.casoPDF");
        $data = ['title' => 'Reporte de ejemplo', 'content' => 'Este es el contenido del reporte.'];
        
        $pdf = PDF::loadView('exports.expediente.casoPDF', $caso);
        $correlativo = $caso['denuncia'] . '-'.$caso['mes'].'-'.$caso['correlativo'];
       // return response()->json($caso);
        return $pdf->download('expediente - '.$correlativo.'.pdf');
    
    }

}
