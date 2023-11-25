<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;

use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithDrawings;

use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

use App\Exports\TraitConfig;
class CasoHechoViolenciaSheet implements FromView, WithTitle, WithStyles, WithDrawings
{
    use TraitConfig;

    public $title;
    public $oficina;
    public $hechos;
    public $tipo;
    public $mes;
    public $anio;
    public $reporte;

    public function __construct($oficina, $hechos, $title, $tipo, $mes, $anio, $reporte)
    {
        $this -> hechos = $hechos;
        $this -> oficina = $oficina;
        $this -> title = $title;
        $this -> tipo = $tipo;
        $this -> mes = $mes;
        $this -> anio = $anio;
        $this -> reporte = $reporte;
    }

    public function view(): View
    {

        try {
            $this->hechos && $this->hechos = collect($this->hechos)->map(
                function($item){
                    $caso = ((object)$item);
                            
                    $caso->institucionSeRemite = $this->concatenarArray($caso->institucionSeRemite);
                    $caso->tipoAsistencia = $this->concatenarArray($caso->tipoAsistencia);
                    $caso->delitoLeivs = $this->concatenarArray($caso->delitoLeivs);

                    return $caso;
                }
            );

            return view(
                'exports.casos.hecho',
                [
                    'title' => $this->title,
                    'oficina' => $this->oficina,
                    'hechos' => $this->hechos,
                    'tipo' => $this->tipo,
                    'mes' => $this->mes,
                    'anio' => $this->anio,
                    'reporte' => $this->reporte,
                ]
            );
        } catch (\Exception $e) {
            bitacora_errores('CasoHechoViolenciaSheet.php', $e);
            return response()->json(['error' => 'Linea -> ' . $e->getLine() . ' Error -> ' . $e->getMessage()]);
        }
    }

    public function styles(Worksheet $sheet)
    {   
        $cells = ['A','B','C','D','E','F','G','H','I','J','L','N','M','O',];
        $this->configHead($sheet, $cells);
    }

}
