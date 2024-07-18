<?php

namespace App\Exports;

use App\Exports\Sheets\LudotecaSheet;
use App\Http\Controllers\Traits\TraitLudoteca;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class ExportLudoteca implements WithMultipleSheets
{

    use Exportable, TraitLudoteca;

    public $ludotecas;
    public $tipo;
    public $mes;
    public $anio;
    public $reporte;

    public function __construct($ludotecas, $tipo, $mes, $anio, $reporte)
    {
        $this -> ludotecas = $ludotecas;
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

            $sheets = [new LudotecaSheet($oficina, $this->ludotecas, 'LUDOTECAS', $this->tipo, $this->mes, $this->anio, $this->reporte)];

            return $sheets;

        } catch (\Exception $e) {

            bitacora_errores('ExportLudoteca.php', $e);
            return response()->json(['error' => 'Linea -> '.$e->getLine().' Error -> '.$e->getMessage()]);

        }  
    }
}