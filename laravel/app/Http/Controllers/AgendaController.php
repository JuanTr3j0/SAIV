<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Ludoteca;
use App\Http\Requests\StoreAgendaRequest;
use App\Http\Requests\UpdateAgendaRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
class AgendaController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAgendaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        try{
            $validator = Validator::make($request->all(), [
                    'titulo'       => "required|string",
                    'fecha_inicio' => "required|date",
                    'fecha_final'  => "nullable|after_or_equal:fecha_inicio",
                ]
            );

            if($validator->fails()) { return response()->json(['error'=>$validator->errors()->all()]); }

            $agenda = Agenda::whereRaw('SHA1(id)  = "' . $request->key.'"')->first();
            $agenda ??= new Agenda();
            $agenda -> title    =   $request -> titulo;
            $agenda -> modulo   =   $request -> modulo;
            $agenda -> oficina  =   auth()->user()->oficina;
            $agenda -> start    =   $request -> fecha_inicio;
            $agenda -> end      =   $request -> fecha_final;
            $agenda -> save();

            return response()->json([
                "mensaje" => 'Exito, se guardo el registro.',
                "key" => DB::select(DB::raw("select SHA1(".$agenda->id.") as 'key';"))[0]->key
            ]);

        }catch (\Exception $e) {
            bitacora_errores('AgendaController.php', $e);
            return response()->json(['error' => 'Linea -> '.$e->getLine().' Error -> '.$e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try{
            $ok = Agenda::whereRaw('SHA1(id)  = "'.$request->key.'"')->update(['estado'=> false]);
            if($ok){
                return response()->json(
                    [
                        "borrado" => boolval($ok),
                        "mensaje" => "Actividad Eliminada de la Agenda"
                    ]
                );
            }else{
                return response()->json(
                    [
                        "error" => "Ups!, Ocurrio un Error."
                    ]
                );
            }
        }catch (\Exception $e) {
            bitacora_errores('AgendaController.php', $e);
            return response()->json(['error' => 'Linea -> '.$e->getLine().' Error -> '.$e->getMessage()]);
        }
    }

    public function fullCalendarEventsLudoteca(){
        try {
            $select = [
                DB::raw('SHA1(ludotecas.id) as "key"'),
                DB::raw("
                    concat( ' Próxima Cita ',
                        `casos`.`denuncia`,
                        ' ',
                        LPAD(`casos`.`correlativo`,3,'0'),
                        '-',
                        LPAD( `casos`.`mes`,2,'0'),
                        '-', 
                        `casos`.`anio`,
                        ' (Click Ver)'
                    ) as title
                "),
                DB::raw('DATE_FORMAT(proxima_cita, "%Y-%m-%dT%H:%i:%s") as start'),
                DB::raw('null as end'),
                DB::raw('false as agendaItem')
            ];

            $selectAgenda = [
                DB::raw('SHA1(id) as "key"'),
                DB::raw('concat(title, " (Click Ver Detalles)") as "title"'), 
                'start', 'end',
                DB::raw('true as agendaItem')
            ];

            $queryAgenda = Agenda::select($selectAgenda)
            ->where('modulo', 'like', 'Ludoteca')
            ->where('oficina', auth()->user()->oficina)
            ->where('estado', true);
             
            $query = Ludoteca::select($select)
                ->join('casos','casos.id', '=', 'ludotecas.caso_fk')
                ->leftJoin('municipios', 'municipios.id',"=","casos.municipio_ocurrencia_fk")
                ->leftJoin('departamentos', 'departamentos.id',"=","municipios.departamento_fk")
                ->where( function ($query){
                    $query->where('casos.denuncia','like', tipo_denuncia()->denuncia)
                    ->orWhere('casos.denuncia','like', tipo_denuncia()->sin_denuncia);
                })->union($queryAgenda)
                ->where('ludotecas.estado', true);
            return $query->get();
        } catch (\Exception $e) { 
            bitacora_errores('AgendaController.php', $e);
            return response()->json(['error' => 'Linea -> '.$e->getLine().' Error -> '.$e->getMessage()]);
        }
    }
}
