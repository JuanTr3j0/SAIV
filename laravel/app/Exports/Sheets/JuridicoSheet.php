<?php

namespace App\Exports\Sheets;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use App\Exports\TraitConfig;

class JuridicoSheet implements FromView, WithTitle, WithStyles, WithDrawings{
    
    use TraitConfig;

    public $title;
    public $oficina;
    public $juridicos;
    public $tipo;
    public $mes;
    public $anio;
    public $reporte;


    public function __construct($oficina, $juridicos, $title, $tipo, $mes, $anio, $reporte){
        $this -> juridicos = $juridicos;
        $this -> oficina = $oficina;
        $this -> title = $title;
        $this -> tipo = $tipo;
        $this -> mes = $mes;
        $this -> anio = $anio;
        $this -> reporte = $reporte;
    }

    public function view(): View {

        try {

            #$this->ludotecas && $this->ludotecas = collect($this->ludotecas)->map(
            #    function($item){
            #        $caso = ((object)$item);
            #                
            #        $caso->institucionSeRemite = $this->concatenarArray($caso->institucionSeRemite);
            #        $caso->tipoAsistencia = $this->concatenarArray($caso->tipoAsistencia);
            #        $caso->delitoLeivs = $this->concatenarArray($caso->delitoLeivs);
            #        return $caso;
            #    }
            #);

            return view(

                'exports.juridico.juridico',[
                    'title' => $this->title,
                    'juridicos' => $this->juridicos,
                    'tipo' => $this->tipo,
                    'mes' => $this->mes,
                    'anio' => $this->anio,
                    'reporte' => $this->reporte,
                    'oficina' => $this->oficina,
                ]

            );

        } catch (\Exception $e) {
            bitacora_errores('JuridicoSheet.php', $e);
            return response()->json(['error' => 'Linea -> ' . $e->getLine() . ' Error -> ' . $e->getMessage()]);
        }

    }

    public function styles(Worksheet $sheet)
    {   

        $cells = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'AA', 'AB', 'AC', 'AD', 'AE', 'AF', 'AG', 'AH'];//CABECERAS DENTRO DEL EXCEL DE CADA LIBRO
        $this->configHead($sheet, $cells); //NOS RETORNA LA CONFIG DE LAS CABECERAS

    }
}

