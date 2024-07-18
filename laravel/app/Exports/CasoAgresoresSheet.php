<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;

use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithDrawings;

use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

use App\Exports\TraitConfig;

class CasoAgresoresSheet implements FromView, WithTitle, WithStyles, WithDrawings
{
    use TraitConfig;

    public $oficina;
    public $agresores;
    public $title;
    public $tipo;
    public $mes;
    public $anio;
    public $reporte;

    public function __construct($oficina, $agresores, $title, $tipo, $mes, $anio, $reporte)
    {
        $this -> oficina = $oficina;
        $this -> agresores = $agresores;
        $this -> title = $title;
        $this -> tipo = $tipo;
        $this -> mes = $mes;
        $this -> anio = $anio;
        $this -> reporte = $reporte;
    }

    public function view(): View
    {
        // $this->agresores = collect($this->agresores)->map(
        //     function($item){
        //         $caso = ((object)$item);
        //         $caso -> fuenteIngresos = $this -> concatenarArray($caso->fuenteIngresos);
        //         return $caso;
        //     }
        // );
        return view('exports.casos.agresores', [
            'oficina' => $this->oficina,
            'agresores' => $this->agresores,
            'tipo' => $this->tipo,
            'mes' => $this->mes,
            'anio' => $this->anio,
            'reporte' => $this->reporte,
        ]);
    }


    public function styles(Worksheet $sheet)
    {   
        $cells = [
            "A","B","C","D","E","F","G","H","I","J","K","L","M","N","O",
            "P","Q","R","S","T","U","V"
        ];

        $this->configHead($sheet, $cells);
    }
}