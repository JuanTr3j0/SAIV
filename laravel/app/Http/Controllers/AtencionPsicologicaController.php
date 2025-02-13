<?php

namespace App\Http\Controllers;

//Models
use App\Models\AtencionPsicologica;


use App\Models\Casos;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class AtencionPsicologicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $por_pagina = $request->porPagina ?? 10;
            $ordenColumnas = $request->ordenColumnas ?? [];

            $selectBusqueda = [
                DB::raw('case when `casos`.`fecha_registro` is NULL
                    then DATE_FORMAT(`casos`.`created_at`, "%Y-%m-%dT%H:%i")
                    else DATE_FORMAT(`casos`.`fecha_registro`, "%Y-%m-%dT%H:%i")
                    end'
                ),
                DB::raw("CONCAT(`casos`.`denuncia`,' ', LPAD(`casos`.`correlativo`,3,'0'), '-',LPAD( `casos`.`mes`,2,'0'), '-', `casos`.`anio`)"),
                DB::raw("date_format(casos.fecha_hecho, \"%d/%m/%Y\")"),
                'casos.denuncia',
                'casos.institucion_remitente',
                'departamentos.departamento',
                'municipios.municipio',
                DB::raw("CONCAT(p1.primer_nombre,' ',p1.segundo_nombre,' ',p1.primer_apellido,' ',p1.segundo_apellido) as responsable"),
                DB::raw("CONCAT(p2.primer_nombre,' ',p2.segundo_nombre,' ',p2.primer_apellido,' ',p2.segundo_apellido) as paciente")
            ];

            $select = [
                DB::raw('SHA1(atencion_psicologica.id) as "key"'),
                DB::raw("concat(`casos`.`denuncia`,' ', LPAD(`casos`.`correlativo`,3,'0'), '-',LPAD( `casos`.`mes`,2,'0'), '-', `casos`.`anio`) as caso_saiv"),
                DB::raw('atencion_psicologica.numero_sesion'),
                DB::raw('atencion_psicologica.objetivo_atencion'),
                DB::raw('atencion_psicologica.situacion_actual_caso'),
                DB::raw('DATE_FORMAT(atencion_psicologica.fecha_atencion, "%d/%m/%Y %H:%i") as fechaAtencion')
            ];

            $atencionPsicologica = query_busqueda(AtencionPsicologica::class, $selectBusqueda, $request->busqueda);

            $paginado = $atencionPsicologica->select($select)
                ->join('casos', 'casos.id', '=', 'atencion_psicologica.caso_fk')
                ->leftJoin('users', 'users.id', '=', 'profesional_responsable_fk')
                ->where('atencion_psicologica.estado', true);

            foreach ($ordenColumnas as $key => $value) {
                $columna = (object) $value;
                if (!boolval($columna->sort ?? false) || strlen($columna->order) == 0)
                    continue;
            }

            if ($request->filtro !== 'Todos' && $request->filtro !== null) {
                $tipo_caso = $request->filtro === 'Denuncia' ? tipo_denuncia()->denuncia : ($request->filtro === 'Sin Denuncia' ? tipo_denuncia()->sin_denuncia : null);
                $paginado->whereRaw('casos.denuncia like "' . $tipo_caso . '"');
            }

            return $paginado->paginate($por_pagina);
        } catch (\Exception $e) {
            bitacora_errores('AtencionPsicologicaController.php', $e);
            return response()->json(['error' => 'Linea -> ' . $e->getLine() . ' Error -> ' . $e->getMessage()]);
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    private function ENUM_OBJETIVO_ATENCION()
    {

        return [
            'Entrevista Inicial',
            'Seguimiento terapéutico',
            'Intervención en crisis',
            'Preparación para audiencia',
            'Acompañamiento a la audiencia',
            'Terapia familiar',
            'Grupo de autoayuda',
            'Evaluación de riesgo',
            'Elaboración de plan de seguridad',
        ];

    }

    private function ENUM_SITUACION_ACTUAL_CASO()
    {
        return [
            'Activo',
            'Cierre por cumplimiento de objetivo terapéutico',
            'Cierre por abandono de proceso voluntario',
            'Cierre por abandono por desplazamiento',
            'Cierre por abandono por trabajo',
            'Cierre por abandono por razones económicas',
            'Cierre atención en otra instancia'
        ];
    }

    private function ENUM_REFERENCIAS()
    {
        return [
            'Referir a trabajo social',
            'Referir a Ludoteca',
            'Referir a Legal',
            'Referir a Educadora',
            'Referir a Médica',
            'Referir a PNC',
            'Referir a Juzgados',
            'Referir a CONAPINA',
            'Otros Especificar'
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'caso_fk' => 'required|exists:casos,id',
            'fecha_atencion' => 'required|date',
            'hora_atencion' => 'required',
            'numero_sesion' => 'required|integer|min:1',
            'objetivo_atencion' => 'required|in:' . implode(',', $this->ENUM_OBJETIVO_ATENCION()),
            'objetivo_atencion_otro' => 'nullable|string',
            'situacion_actual_caso' => 'required|in:' . implode(',', $this->ENUM_SITUACION_ACTUAL_CASO()),
            'situacion_actual_caso_otro' => 'nullable|string',
            'observaciones' => 'nullable|string',
            'recomendaciones' => 'nullable|string',
            'referencias' => 'required|in:' . implode(',', $this->ENUM_REFERENCIAS()),
            'referencias_otro' => 'nullable|string',
            'profesional_responsable_fk' => 'nullable|exists:users,id'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $atencion = new AtencionPsicologica();
        $atencion->caso_fk = $request->input('caso_fk');
        $atencion->fecha_atencion = $request->input('fecha_atencion');
        $atencion->hora_atencion = $request->input('hora_atencion');
        $atencion->numero_sesion = $request->input('numero_sesion');
        $atencion->objetivo_atencion = $request->input('objetivo_atencion');
        $atencion->objetivo_atencion_otro = $request->input('objetivo_atencion_otro');
        $atencion->situacion_actual_caso = $request->input('situacion_actual_caso');
        $atencion->situacion_actual_caso_otro = $request->input('situacion_actual_caso_otro');
        $atencion->observaciones = $request->input('observaciones');
        $atencion->recomendaciones = $request->input('recomendaciones');
        $atencion->referencias = $request->input('referencias');
        $atencion->referencias_otro = $request->input('referencias_otro');
        $atencion->profesional_responsable_fk = $request->input('profesional_responsable_fk');
        $atencion->estado = $request->input('estado', true); // Si no envían 'estado', será 'true'

        $atencion->save();

        return response()->json($atencion, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(AtencionPsicologica $atencionPsicologica, $_key)
    {
        try {
            $select = [
                DB::raw('SHA1(id) as "key"'),
                'caso_fk                              as caso',
                'fecha_atencion                       as fechaAtencion',
                'hora_atencion                        as horaAtencion',
                'numero_sesion                        as numeroSesion',
                'objetivo_atencion                    as objetivoAtencion',
                'objetivo_atencion_otro               as objetivoAtencionOtro',
                'situacion_actual_caso                as situacionActualCaso',
                'situacion_actual_caso_otro           as situacionActualCasoOtro',
                'observaciones                        as observaciones',
                'recomendaciones                      as recomendaciones',
                'referencias                          as referencias',
                'referencias_otro                     as referenciasOtro',
                'profesional_responsable_fk           as profesionalResponsable'
            ];

            $atencionPsicologica = $atencionPsicologica::select($select)
                //asi debe ser, se lo comente para poder hacer pruebas ahorita
                //->whereRaw('SHA1(id) = ?', [$_key])
                ->whereRaw('id = ?', [$_key])
                ->firstOrFail();

            $atencionPsicologica->caso = Casos::select([
                DB::raw("CONCAT(denuncia, ' ', LPAD(correlativo, 3, '0'), '-', LPAD(mes, 2, '0'), '-', anio) as 'label'"),
                DB::raw('SHA1(casos.id) as "key"'),
                DB::raw('SHA1(personas.id) as "victimaKey"'),
                'personas.primer_nombre as victimaNombre',
                'personas.primer_apellido as victimaApellido',
                'personas.dui as victimaDui',
                'personas.fecha_nacimiento'
            ])
                ->join('personas', 'casos.victima_fk', '=', 'personas.id')
                ->first();


            $atencionPsicologica->profesionalResponsable = User::select([
                DB::raw('id as "key"'),
                'name as nombre',
                'email as correo'
            ])->find($atencionPsicologica->profesionalResponsable);

            return response()->json($atencionPsicologica);

        } catch (\Exception $e) {
            bitacora_errores('AtencionPsicologicaController.php', $e);
            return response()->json(['error' => 'Línea -> ' . $e->getLine() . ' Error -> ' . $e->getMessage()], 500);
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
