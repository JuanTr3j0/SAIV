<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;

use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithDrawings;

use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

use App\Exports\TraitConfig;
use App\Models\Persona;

class CasoPersonaSheet implements FromView, WithTitle, WithStyles, WithDrawings
{
    use TraitConfig;

    public $oficina;
    public $personas;
    public $title;
    public $tipo;
    public $mes;
    public $anio;
    public $reporte;

    public function __construct($oficina, $personas, $title, $tipo, $mes, $anio, $reporte)
    {
        $this -> oficina = $oficina;
        $this -> personas = $personas;
        $this -> title = $title;
        $this -> tipo = $tipo;
        $this -> mes = $mes;
        $this -> anio = $anio;
        $this -> reporte = $reporte;
    }

    public function view(): View
    {
        $this->personas = collect($this->personas)->map(
            function($item){
                $caso = ((object)$item);
                $caso -> fuenteIngresos = $this -> concatenarArray($caso->fuenteIngresos);
                return $caso;
            }
        );
        return view('exports.casos.persona', [
            'oficina' => $this->oficina,
            'personas' => $this->personas,
            'tipo' => $this->tipo,
            'mes' => $this->mes,
            'anio' => $this->anio,
            'reporte' => $this->reporte,
            'title' =>  $this -> title
        ]);
    }


    public function styles(Worksheet $sheet)
    {   
        $cells = [
            "A","B","C","D","E","F","G","H","I","J","K","L","M","N","O",
            "P","Q","R","S","U","V","W","X","Y","Z",
            "AA","AB","AC","AD","AE","AF","AG","AH"
        ];

        $this->configHead($sheet, $cells);
    }
}