<?php

namespace App\Http\Controllers;




use App\Models\Departamentos;
use App\Models\Municipios;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\TraitCasos;

use PDF;

class PdfController extends Controller
{


    use TraitCasos;

    public function index($key)
    {
        $casoJson = $this->showCaso($key);
        $caso = json_decode($casoJson, true);

        $victima = $caso['victima'];
        // return view("exports.expediente.casoPDF");
        // $data = ['title' => 'Reporte de ejemplo', 'content' => 'Este es el contenido del reporte.'];

        // $pdf = PDF::loadView('exports.expediente.casoPDF', $caso);

        // return response()->json($caso);

        $caso['departamentoOcurrencia'] = $this->getDepartamento($caso['departamentoOcurrencia']);
        $caso['municipioOcurrencia'] = $this->getMunicipio($caso['municipioOcurrencia']);

        $caso['victima']['departamento'] = $this->getDepartamento($caso['victima']['departamento']);
        $caso['victima']['municipio'] = $this->getMunicipio($caso['victima']['municipio']);

        $caso['responsable']['departamento'] = $this->getDepartamento($caso['responsable']['departamento']);
        $caso['responsable']['municipio'] = $this->getMunicipio($caso['responsable']['municipio']);

        $caso['oficina'] = $this -> getOficina($caso['denuncia']);

        foreach( $caso['agresores'] as &$agresor){
            $agresor['departamento'] = $this->getDepartamento($agresor['departamento']);
            $agresor['municipio'] = $this->getMunicipio($agresor['municipio']);
        }

     //   $caso['agresoes']['departamento'] = $this->getDepartamento($caso['victima']['departamento']);
        // $caso['agresores']['municipio'] = $this->getMunicipio($caso['victima']['municipio']);

        return view('exports.expediente.casoPDF', $caso);
    }
    public function reporteCaso($key)
    {

        $casoJson = $this->showCaso($key);
        $caso = json_decode($casoJson, true);

        // return view("exports.expediente.casoPDF");
        $caso['departamentoOcurrencia'] = $this->getDepartamento($caso['departamentoOcurrencia']);
        $caso['municipioOcurrencia'] = $this->getMunicipio($caso['municipioOcurrencia']);

        $caso['victima']['departamento'] = $this->getDepartamento($caso['victima']['departamento']);
        $caso['victima']['municipio'] = $this->getMunicipio($caso['victima']['municipio']);

        $caso['responsable']['departamento'] = $this->getDepartamento($caso['responsable']['departamento']);
        $caso['responsable']['municipio'] = $this->getMunicipio($caso['responsable']['municipio']);

        $caso['oficina'] = $this -> getOficina($caso['denuncia']);

        foreach( $caso['agresores'] as &$agresor){
            $agresor['departamento'] = $this->getDepartamento($agresor['departamento']);
            $agresor['municipio'] = $this->getMunicipio($agresor['municipio']);
        }
        $data = ['title' => 'Reporte de ejemplo', 'content' => 'Este es el contenido del reporte.'];

        $pdf = PDF::loadView('exports.expediente.casoPDF', $caso);
        $correlativo = $caso['denuncia'] . '-' . $caso['mes'] . '-' . $caso['correlativo'];
        // return response()->json($caso);
        return $pdf->download('expediente - ' . $correlativo . '.pdf');

    }

    private function getDepartamento($id)
    {
        
        if ($id != null) {
         $departamento = Departamentos::find($id);
            return $departamento->departamento;
        }
        return "No aplica";
    }

    private function getMunicipio($id)
    {
        if ($id != null) {
        return Municipios::find($id)->municipio;
        }
        return "No aplica";
    }

    private function casoJsonify($casoJson){
        if (is_array($casoJson)) {
            foreach ($casoJson as &$subItem) {
               $this->casoJsonify($subItem);
            }
        } else {
            if (is_null($casoJson) || $casoJson === '') {
                $item = 'no aplica';
            }
        }
    }

    private function getOficina($denuncia){
        if(str_contains($denuncia, 'CD')){
            return "CD";
        }
        if(str_contains($denuncia, 'CH')){
            return "CH";
        }
        if(str_contains($denuncia, 'SM')){
            return "SM";
        }
        if(str_contains($denuncia, 'SS')){
            return "SS";
        }
    }

}
