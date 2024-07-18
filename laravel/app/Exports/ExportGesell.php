<?php

namespace App\Exports;

use App\Exports\Sheets\GesellSheet;


use App\Http\Controllers\Traits\TraitGesell;
use App\Http\Controllers\Traits\TraitJuridico;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class ExportGesell implements WithMultipleSheets
{

    use Exportable, TraitGesell;

    public $gesells;
    public $tipo;
    public $mes;
    public $anio;
    public $reporte;

    public function __construct($gesells, $tipo, $mes, $anio, $reporte)
    {
        $this -> gesells = $gesells;
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

            $sheets = [new GesellSheet($oficina, $this->gesells, 'SEGUIMIENTO JURÍDICO', $this->tipo, $this->mes, $this->anio, $this->reporte)];

            return $sheets;

        } catch (\Exception $e) {

            bitacora_errores('ExportGesell.php', $e);
            return response()->json(['error' => 'Linea -> '.$e->getLine().' Error -> '.$e->getMessage()]);

        }  
    }
}