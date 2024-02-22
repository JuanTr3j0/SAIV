<?php

namespace App\Exports;

use App\Exports\Sheets\JuridicoSheet;

use App\Http\Controllers\Traits\TraitJuridico;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class ExportJuridico implements WithMultipleSheets
{

    use Exportable, TraitJuridico;

    public $juridicos;
    public $tipo;
    public $mes;
    public $anio;
    public $reporte;

    public function __construct($juridicos, $tipo, $mes, $anio, $reporte)
    {
        $this -> juridicos = $juridicos;
        $this -> tipo = $tipo;
        $this -> mes = $mes;
        $this -> anio = $anio;
        $this -> reporte = $reporte;
    }

    public function sheets(): array
    {
        try {

            $oficina = \App\Models\User::select('oficinas.codigo as codigo')
            ->join('oficinas', 'oficinas.id', '=', 'users.oficina')
            ->findOrFail(auth()->id())->codigo;

            $sheets = [];

            // Agregas las hojas

            $sheets = [new JuridicoSheet($oficina, $this->juridicos, 'SEGUIMIENTO JURÍDICO', $this->tipo, $this->mes, $this->anio, $this->reporte)];

            return $sheets;

        } catch (\Exception $e) {

            bitacora_errores('ExportJuridico.php', $e);
            return response()->json(['error' => 'Linea -> '.$e->getLine().' Error -> '.$e->getMessage()]);

        }  
    }
}