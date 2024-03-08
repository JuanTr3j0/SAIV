<?php



namespace App\Exports;



use App\Exports\CasoPersonaSheet;

use App\Exports\CasoAgresoresSheet;

use App\Exports\CasoHechoViolenciaSheet;



use App\Http\Controllers\Traits\TraitCasos;



use Maatwebsite\Excel\Concerns\Exportable;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;



class ExportCasos implements WithMultipleSheets

{

    use Exportable, TraitCasos;



    public $victimas;

    public $responsables;

    public $hechos;

    public $agresores;

    public $tipo;

    public $mes;

    public $anio;

    public $reporte;



    public function __construct($victimas, $responsables, $hechos , $agresores, $tipo, $mes, $anio, $reporte)

    {

        $this -> victimas = $victimas;

        $this -> responsables = $responsables;

        $this -> hechos = $hechos;

        $this -> agresores = $agresores;

        $this -> tipo = $tipo;

        $this -> mes = $mes;

        $this -> anio = $anio;

        $this -> reporte = $reporte;



    }



    public function sheets(): array

    {

        try {

            //code...

            $oficina = \App\Models\User::select('oficinas.codigo as codigo')

                ->join('oficinas', 'oficinas.id', '=', 'users.oficina')

            ->findOrFail(auth()->id())->codigo;



            $sheets = [];

            // Agregas las hojas

            array_push($sheets, new CasoPersonaSheet($oficina, $this->victimas, 'VICTIMA', $this->tipo, $this->mes, $this->anio, $this->reporte));

            array_push($sheets, new CasoPersonaSheet($oficina, $this->responsables, 'RESPONSABLE', $this->tipo, $this->mes, $this->anio, $this->reporte));

            array_push($sheets, new CasoHechoViolenciaSheet($oficina, $this->hechos, 'HECHO VIOLENCIA', $this->tipo, $this->mes, $this->anio, $this->reporte));

            array_push($sheets, new CasoAgresoresSheet($oficina, $this->agresores, 'AGRESORES', $this->tipo, $this->mes, $this->anio, $this->reporte));            

            return $sheets;

        } catch (\Exception $e) {

            bitacora_errores('ExportCasos.php', $e);

            return response()->json(['error' => 'Linea -> '.$e->getLine().' Error -> '.$e->getMessage()]);

        }  

    }

}