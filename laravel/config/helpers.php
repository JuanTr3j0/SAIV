<?php

if (! function_exists('query_busqueda')) {

    function query_busqueda($objeto, $columns, $term)

    {

        if($term){ 

            $words_search = explode(" ",$term);

            $objeto = $objeto::where(function ($query) use ($columns,$words_search) {

                foreach ($words_search as $word) {

                    $query = $query->where(function ($query) use ($columns, $word) {

                        foreach ($columns as $column) {

                            $query->orWhere($column,'like',"%$word%");

                        }

                    });

                }

            });

            return $objeto;

        }else 

            return new $objeto;

    }

}



if (!function_exists('getEnunms')) {

    function getEnunms($tabla, $column) {
        try {
            $result = \Illuminate\Support\Facades\DB::select(
                \Illuminate\Support\Facades\DB::raw('SHOW COLUMNS FROM ' . $tabla . ' WHERE Field = ?'),
                [$column]
            );

            // Validar si el resultado está vacío
            if (empty($result)) {
                throw new Exception("No se encontró la columna '{$column}' en la tabla '{$tabla}' o no es del tipo ENUM.");
            }

            $type = $result[0]->Type;

            // Validar si el tipo es ENUM
            if (!preg_match('/^enum\((.*)\)$/', $type, $matches)) {
                throw new Exception("La columna '{$column}' no es del tipo ENUM.");
            }

            // Extraer y limpiar los valores
            return array_map(function ($value) {
                return trim($value, "'");
            }, explode(',', $matches[1]));
        } catch (Exception $e) {
            // Manejo de errores
            return ['error' => $e->getMessage()];
        }
    }
}




if (! function_exists('edad')) {

    function edad($fecha_nacimiento){

        $nacimiento = strval($fecha_nacimiento)." 06:00:00";

        $actual = \Carbon\Carbon::now();

        return $actual->diffInYears($nacimiento, $actual->toDateTimeString());

    }        

}



if (! function_exists('tipo_denuncia')) {

    function tipo_denuncia(){

        $oficina = \App\Models\User::select('oficinas.codigo as codigo')

        ->join('oficinas', 'oficinas.id', '=', 'users.oficina')

        ->findOrFail(auth()->id());

        

        // return (object)[

        //     "denuncia" => 'UAI'.$oficina->codigo,

        //     "sin_denuncia" => 'SUAI'.$oficina->codigo

        // ];

        if($oficina->codigo === 'ES')
            return (object)[

                "denuncia" => 'D%',

                "sin_denuncia" => 'SD%',

                "diligencia" => 'DIL%',

            ];
        
        else 
            return (object)[

                "denuncia" => 'D'.$oficina->codigo,

                "sin_denuncia" => 'SD'.$oficina->codigo,

                "diligencia" => 'DIL'.$oficina->codigo,

            ];

    }        

}

if (! function_exists('tipo_oficina')) {

    function tipo_oficina(){

        $oficina = \App\Models\User::select('oficinas.codigo as codigo')

        ->join('oficinas', 'oficinas.id', '=', 'users.oficina')

        ->findOrFail(auth()->id());

        

        // return (object)[

        //     "denuncia" => 'UAI'.$oficina->codigo,

        //     "sin_denuncia" => 'SUAI'.$oficina->codigo

        // ];



        return (object)[

            "chalatenango" => 'CH'.$oficina->codigoOficina,
            "san_salvador" => 'SS'.$oficina->codigoOficina,
            "soyapango" => 'S'.$oficina->codigoOficina,
            "ciudad_delgado" => 'CD'.$oficina->codigoOficina,

        ];

    }        

}


if (! function_exists('bitacora_errores')) {

    function bitacora_errores($archivo, $e){

        $bitacora = new \App\Models\BitacoraErrores();        

        $bitacora -> usuario    = auth()->id();

        $bitacora -> error      = 'Linea -> '.$e->getLine().' Error -> '.$e->getMessage();

        $bitacora -> archivo    = $archivo;

        $bitacora -> save();

    }        

}

if (! function_exists('obtener_mes')) {

    function obtener_mes($mesInt){

        $meses = ['ENERO','FEBRERO','MARZO','ABRIL','MAYO','JUNIO','JULIO'

            ,'AGOSTO','SEPTIEMBRE','OCTUBRE','NOVIEMBRE','DICIEMBRE'];



        if(!intval($mesInt))

            return null;

        error_log($meses[intval($mesInt)-1]);

        error_log(intval($mesInt)-1);

        return $meses[intval($mesInt)-1];

    }        

}


if (! function_exists('sesion_codigo_oficina')) {

    function sesion_codigo_oficina(){
       return $user_oficina = \App\Models\Oficinas::select('codigo')->findOrFail(auth()->user()->oficina)->codigo; 
    }
}