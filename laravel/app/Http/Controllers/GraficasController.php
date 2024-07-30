<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Casos;
use Carbon\Carbon;

class GraficasController extends Controller
{
    public function getPeriodos(){
        try {
            return response()->json(
                (Casos::select('casos.anio as periodo')
                ->groupBy('casos.anio')
                ->orderBy('casos.anio', 'desc')
                ->where('casos.estado', true)
                ->get()->map(function($item){
                    $periodo = (object) $item;
                    return intval($periodo->periodo);
                }))
            );
        }catch (\Exception $e) {
            bitacora_errores('GraficasController.php', $e);
            return response()->json(['error' => 'Linea -> '.$e->getLine().' Error -> '.$e->getMessage()]);
        }
    }

    public function getGrafica(Request $request){
        try {
            // Validar valores del post correctos
            if(!$request->estadistica){

            }           
            
            $mes = $request->mes ?? intval(Carbon::now()->format("m"));
            $periodo = $request->periodo ?? intval(Carbon::now()->format("Y"));
            
            // Variables
            $configuracion = [];
            $labels = $data =  $tabla = $query = [];
            $total = 0; $denuncia = $cantidad = $body = [];

            // condicionales variables del query
            $periodo = intval($request->periodo); $mes = intval($request->mes);
            $queryAño = $periodo === 0 || $periodo === null ? "" : " and casos.anio = " . intval($request->periodo); 
            $queryMes = $mes === 0 || $mes === null ? "" : " and casos.mes = " . intval($request->mes);

            $concact_denuncia = "CONCAT('Denuncia(', casos.denuncia,')')";
            $concact_sin_denuncia = "CONCAT('Sin Denuncia (', casos.denuncia,')')";
            $concact_diligencia = "CONCAT('Diligencia (', casos.denuncia,')')";

            switch ($request->estadistica) {
                case 'Tipos de Caso':                   
                    $queryGet = DB::select(
                        "select
                        case
                            when casos.denuncia like '".tipo_denuncia()->diligencia."' then 'Diligencia'
                            when casos.denuncia like '".tipo_denuncia()->denuncia."' then 'Denuncia'
                            when casos.denuncia like '".tipo_denuncia()->sin_denuncia."' then 'Sin Denuncia'
                        end  as label,
                        count(1) as frecuencia
                        from casos
                        where estado is true and (
                            denuncia like '".tipo_denuncia()->denuncia."' or
                            denuncia like '".tipo_denuncia()->sin_denuncia."' or
                            denuncia like '".tipo_denuncia()->diligencia."'
                        ) ".$queryAño." ".$queryMes." 
                        group by label;"
                    );

                    $titulo = 'Tipos de Caso '. ($mes === 0 ? '':$this->getMes($mes)).' '.($periodo === 0 ? '':$periodo);
                   
                    $configuracion = $this->configuracionFrecuenciaPorcentaje( $titulo, 'Casos', ['Tipo de Caso ', 'Frecuencia', '%'], $queryGet);

                break;

                case 'Tipos de Caso por Mes':
                    $queryGet = DB::select(
                        "select
                            case
                                when CAST(mes AS unsigned) = 1 then 'Enero'
                                when CAST(mes AS unsigned) = 2 then 'Febrero'
                                when CAST(mes AS unsigned) = 3 then 'Marzo'
                                when CAST(mes AS unsigned) = 4 then 'Abril'
                                when CAST(mes AS unsigned) = 5 then 'Mayo'
                                when CAST(mes AS unsigned) = 6 then 'Junio'
                                when CAST(mes AS unsigned) = 7 then 'Julio'
                                when CAST(mes AS unsigned) = 8 then 'Agosto'
                                when CAST(mes AS unsigned) = 9 then 'Septiembre'
                                when CAST(mes AS unsigned) = 10 then 'Octubre'
                                when CAST(mes AS unsigned) = 11 then 'Noviembre'
                                when CAST(mes AS unsigned) = 12 then 'Diciembre'
                            end mes,
                            sum(denuncia like '". tipo_denuncia()->denuncia."') as denuncia,
                            SUM(denuncia like '". tipo_denuncia()->sin_denuncia."') as sin_denuncia,
                            SUM(denuncia like '". tipo_denuncia()->diligencia."') as diligencia
                        from casos
                        where estado = true and (denuncia like '". tipo_denuncia()->diligencia."'
                            or denuncia like '". tipo_denuncia()->sin_denuncia."'
                            or denuncia like '". tipo_denuncia()->denuncia."') ".$queryAño." ".$queryMes." 
                        group by mes
                        order by cast(mes as unsigned) asc;"
                    );

                    // variables
                    $total_0 = $total_1 = $total_2  = 0;
                    $label = $datasets = array();
                    $array_denuncia = $array_sin_denuncia = $array_diligencia = [];

                    for ($i=0; $i < count($queryGet); $i++) { 
                        $item = (object)$queryGet[$i];
                        
                        //suma de totales
                        $total_0 += intval($item->denuncia);
                        $total_1 += intval($item->sin_denuncia);
                        $total_2 += intval($item->diligencia);

                        array_push($label, $item->mes); 

                        array_push($array_denuncia, intval($item->denuncia)); 
                        array_push($array_sin_denuncia, intval($item->sin_denuncia)); 
                        array_push($array_diligencia, intval($item->diligencia)); 
                    }
                    
                    array_push($datasets, $this->getDataSet(
                        // Label
                        'Denuncia',
                        // Data
                        $array_denuncia,
                         'rgba(8, 104, 145, 0.6)', 'rgba(78, 34, 90, 0.7)' 
                    ));
                    array_push($datasets, $this->getDataSet(
                        // Label
                        'Sin Denuncia',
                        // Data
                        $array_sin_denuncia,
                         'rgba(8, 104, 145, 0.6)', 'rgba(27, 190, 56, 0.7)' 
                    ));
                    array_push($datasets, $this->getDataSet(
                        // Label
                        'Diligencia',
                        // Data
                        $array_diligencia,
                         'rgba(8, 104, 145, 0.6)', 'rgb(180, 182, 255, 0.7)' 
                    ));

                    for ($i=0; $i < count($queryGet); $i++) { 
                        $item = (object)$queryGet[$i];
                        array_push($body, [
                            "fila" => [
                                $item->mes, $item->denuncia, $item->sin_denuncia, $item->diligencia, (intval($item->denuncia)+intval($item->sin_denuncia)+intval($item->diligencia))
                            ]
                        ]);
                    }    
                    
                    if(count($body)>0) 
                        array_push($body, ["fila" => ["Total", $total_0, $total_1, $total_2, ($total_0+$total_1+$total_2)]]);       

                    $tabla = [ "columnas" => ['Meses', 'Denuncia', 'Sin Denuncia', 'Diligencia', 'Sub Total'], "filas" => $body];
                    $titulo = 'Tipos de Casos por Mes '. ($mes === 0 ? '':$this->getMes($mes)).' '.($periodo === 0 ? '':$periodo);
                    $configuracion = $this->configuracion($titulo, $label, $datasets, $tabla );

                break;

                case 'Víctimas por Sexo':
                    $queryGet = DB::select(
                        "select
                            p.sexo label,
                            count(1) frecuencia
                        from casos 
                        inner join (select DISTINCT dui, id, sexo from personas) p on casos.victima_fk = p.id
                        where p.sexo is not null and casos.estado is true and casos.denuncia not like 'DIL%' and (denuncia like '".tipo_denuncia()->denuncia."' or
                        denuncia like '".tipo_denuncia()->sin_denuncia."') ".$queryAño." ".$queryMes."
                        group by p.sexo;"
                    );
                    $titulo = 'Víctimas por Sexo '. ($mes === 0 ? '':$this->getMes($mes)).' '.($periodo === 0 ? '':$periodo);                   
                    $configuracion = $this->configuracionFrecuenciaPorcentaje( $titulo, 'Casos', ['Sexo', 'Frecuencia', '%'], $queryGet);
                break;

                case 'Casos por Género':
                    $queryGet = DB::select("
                        select
                            p.genero label,
                            count(1) frecuencia
                        from casos
                        inner join (select DISTINCT dui, id, genero from personas) p on casos.victima_fk = p.id
                        where p.genero is not null and casos.estado = true and casos.denuncia not like 'DIL%' and (denuncia like '".tipo_denuncia()->denuncia."' or
                        denuncia like '".tipo_denuncia()->sin_denuncia."')".$queryAño." ".$queryMes."
                        group by p.genero;
                    ");
                    $titulo = 'Casos por Género '. ($mes === 0 ? '':$this->getMes($mes)).' '.($periodo === 0 ? '':$periodo);                   
                    $configuracion = $this->configuracionFrecuenciaPorcentaje( $titulo, 'Casos', ['Género', 'Frecuencia', '%'], $queryGet);
                break;

                case 'Víctimas Sexo Femenino por Edad':
                    $queryGet = DB::select("
                        select case
                            when TIMESTAMPDIFF(YEAR, fecha_nacimiento, NOW()) is null
                                then 'Desconocido'
                            when TIMESTAMPDIFF(YEAR, fecha_nacimiento, NOW()) >= 0 and
                                TIMESTAMPDIFF(YEAR, fecha_nacimiento, NOW()) < 5 
                                then '0 - 4 años'
                            when TIMESTAMPDIFF(YEAR, fecha_nacimiento, NOW()) >= 5 and
                                TIMESTAMPDIFF(YEAR, fecha_nacimiento, NOW()) < 9
                                then '5 - 8 años'
                            when TIMESTAMPDIFF(YEAR, fecha_nacimiento, NOW()) >= 9 and
                                TIMESTAMPDIFF(YEAR, fecha_nacimiento, NOW()) < 13
                                then '9 - 12 años'
                            when TIMESTAMPDIFF(YEAR, fecha_nacimiento, NOW()) >= 13 and
                                TIMESTAMPDIFF(YEAR, fecha_nacimiento, NOW()) < 19
                                then '13 - 18 años'
                            when TIMESTAMPDIFF(YEAR, fecha_nacimiento, NOW()) >= 19 and
                                TIMESTAMPDIFF(YEAR, fecha_nacimiento, NOW()) < 31
                                then '19 - 30 años'
                            when TIMESTAMPDIFF(YEAR, fecha_nacimiento, NOW()) >= 31 and
                                TIMESTAMPDIFF(YEAR, fecha_nacimiento, NOW()) < 60
                                then '31 - 59 años'
                            when TIMESTAMPDIFF(YEAR, fecha_nacimiento, NOW()) >= 60
                                then '60 o más años'
                            end  label,
                        count(*) frecuencia
                        from casos
                        inner join personas on casos.victima_fk = personas.id
                        where casos.estado is true
                        and casos.denuncia not like 'DIL%'
                        and sexo like '%Fem%'
                        and (denuncia like '".tipo_denuncia()->denuncia."' 
                        or denuncia like '".tipo_denuncia()->sin_denuncia."') ".$queryAño." ".$queryMes."
                        group by label;
                    ");

                    $array_edad = ['Desconocido','0 - 4 años','5 - 8 años','9 - 12 años','13 - 18 años','19 - 30 años','31 - 59 años','60 o más años'];
                    $array_query = [];
                    
                    for ($i = 0; $i < count($array_edad); $i++) {
                        
                        $frecuencia = 0;
                        $rango_edad = $array_edad[$i];
                        foreach ($queryGet as $key => $value) {
                            # code...
                            $item = (object) $value;
                            
                            if($item -> label !== $rango_edad)
                                continue;
    
                            $frecuencia = $item -> frecuencia;
                            break;
                        }

                        array_push($array_query, ["label" => $rango_edad, "frecuencia"=> intval($frecuencia)]);
                    }
                    
                    $titulo = 'Víctimas Sexo Femenino por Edad '. ($mes === 0 ? '':$this->getMes($mes)).' '.($periodo === 0 ? '':$periodo);                   
                    $configuracion = $this->configuracionFrecuenciaPorcentaje( $titulo, 'Casos', ['Edad', 'Frecuencia', '%'], $array_query);
                break;

                case 'Casos por Municipio de Residencia Víctima':
                    $queryGet = DB::select("
                        select
                            m.municipio as label,
                            count(1) frecuencia
                        from casos 
                        inner join (select DISTINCT dui, id, municipio_fk from personas) p on casos.victima_fk = p.id
                        inner join municipios m on p.municipio_fk = m.id
                        where estado is true and casos.denuncia not like 'DIL%' and m.municipio is not  null and (denuncia like '".tipo_denuncia()->denuncia."' or
                        denuncia like '".tipo_denuncia()->sin_denuncia."')".$queryAño." ".$queryMes."
                        group by m.municipio;
                    ");

                    $titulo = 'Casos por Municipio de Residencia Víctima '. ($mes === 0 ? '':$this->getMes($mes)).' '.($periodo === 0 ? '':$periodo);
                   
                    $configuracion = $this->configuracionFrecuenciaPorcentaje( $titulo, 'Casos', ['Municipios ', 'Frecuencia', '%'], $queryGet);
                break;
                
                case 'Casos por Departamento de Ocurrencia':
                    $queryGet = DB::select("
                        select
                            dep.departamento label,
                            count(1) as frecuencia
                        from casos
                        inner join municipios m on m.id = casos.municipio_ocurrencia_fk
                        inner join departamentos dep on dep.id = m.departamento_fk
                        where casos.estado = true and casos.denuncia not like 'DIL%' and (denuncia like '".tipo_denuncia()->denuncia."' or
                        denuncia like '".tipo_denuncia()->sin_denuncia."')".$queryAño." ".$queryMes."
                        group by dep.departamento;
                    ");

                    $titulo = 'Casos por Departamento de Ocurrencia '. ($mes === 0 ? '':$this->getMes($mes)).' '.($periodo === 0 ? '':$periodo);
                   
                    $configuracion = $this->configuracionFrecuenciaPorcentaje( $titulo, 'Casos', ['Departamentos ', 'Frecuencia', '%'], $queryGet);
                break;
                case 'Casos por Zona de Residencia de la Víctima':
                    $queryGet = DB::select("
                        select
                            p.zona_residencial label,
                            count(1) frecuencia
                        from casos
                        inner join personas p on casos.victima_fk = p.id
                        where  estado is true and casos.denuncia not like 'DIL%' and p.zona_residencial is not null and (denuncia like '".tipo_denuncia()->denuncia."' or
                        denuncia like '".tipo_denuncia()->sin_denuncia."')".$queryAño." ".$queryMes."
                        group by p.zona_residencial;
                    ");

                    $titulo = 'Casos por Zona de Residencia de la Víctima '. ($mes === 0 ? '':$this->getMes($mes)).' '.($periodo === 0 ? '':$periodo);
                   
                    $configuracion = $this->configuracionFrecuenciaPorcentaje( $titulo, 'Casos', ['Zona ', 'Frecuencia', '%'], $queryGet);
                break;
                case 'Casos por Tipo de Violencia':
                    $queryGet = DB::select("
                        select
                            tipo_violencia label,
                            count(1) frecuencia
                        from casos
                        INNER JOIN casos_tipos_violencias ctv on ctv.casos_fk = id
                        INNER JOIN tipo_violencias tv on tv.id = ctv.tipos_violencia_fk  
                        where casos.estado is true and tv.tipo_violencia is not null and casos.denuncia not like 'DIL%' and (denuncia like '".tipo_denuncia()->denuncia."' or
                        denuncia like '".tipo_denuncia()->sin_denuncia."')".$queryAño." ".$queryMes."
                        group by tv.tipo_violencia;
                    ");

                    $titulo = 'Casos por Tipo de Violencia '. ($mes === 0 ? '':$this->getMes($mes)).' '.($periodo === 0 ? '':$periodo);
                
                    $configuracion = $this->configuracionFrecuenciaPorcentaje( $titulo, 'Casos', ['Tipo de Violencia ', 'Frecuencia', '%'], $queryGet);
                break;
                case 'Casos por Modalidad de la Violencia':
                    $queryGet = DB::select("
                        select
                            modalidad_violencia label,
                            count(1) frecuencia
                        from casos
                        where casos.estado is true and denuncia not like 'DIL%' and modalidad_violencia is not null and (denuncia like '".tipo_denuncia()->denuncia."' or
                        denuncia like '".tipo_denuncia()->sin_denuncia."')".$queryAño." ".$queryMes."
                        group by modalidad_violencia;
                    ");

                    $titulo = 'Casos por Modalidad de la Violencia '. ($mes === 0 ? '':$this->getMes($mes)).' '.($periodo === 0 ? '':$periodo);
                
                    $configuracion = $this->configuracionFrecuenciaPorcentaje( $titulo, 'Casos', ['Modalidad de la Violencia ', 'Frecuencia', '%'], $queryGet);
                break;
                case 'Casos por Sabe Leer y Escribir':
                    $queryGet = DB::select("
                        select
                            sabe_escribir_leer label,
                            count(1) frecuencia
                        from casos
                        inner join (select DISTINCT dui, id, sabe_escribir_leer from personas) p on casos.victima_fk = p.id and p.sabe_escribir_leer like 'Si'
                        where casos.estado is true and casos.denuncia not like 'DIL%' and p.sabe_escribir_leer is not null
                        and modalidad_violencia is not null and (denuncia like '".tipo_denuncia()->denuncia."' or
                        denuncia like '".tipo_denuncia()->sin_denuncia."')".$queryAño." ".$queryMes."
                        group by p.sabe_escribir_leer;
                    ");

                    $titulo = 'Casos por Sabe Leer y Escribir '. ($mes === 0 ? '':$this->getMes($mes)).' '.($periodo === 0 ? '':$periodo);
                
                    $configuracion = $this->configuracionFrecuenciaPorcentaje( $titulo, 'Casos', ['Sabe Leer y Escribir ', 'Frecuencia', '%'], $queryGet);
                break;
                case 'Casos por Nacionalidad':
                    $queryGet = DB::select("
                        select
                            nacionalidad label,
                            count(1) frecuencia
                        from casos
                        inner join (select DISTINCT dui, id, nacionalidad from personas) p on casos.victima_fk = p.id
                        where casos.estado is true and p.nacionalidad is not null and denuncia not like 'DIL%' and (denuncia like '".tipo_denuncia()->denuncia."' or
                        denuncia like '".tipo_denuncia()->sin_denuncia."')".$queryAño." ".$queryMes."
                        group by nacionalidad;
                    ");

                    $titulo = 'Casos por Nacionalidad '. ($mes === 0 ? '':$this->getMes($mes)).' '.($periodo === 0 ? '':$periodo);
                
                    $configuracion = $this->configuracionFrecuenciaPorcentaje( $titulo, 'Casos', ['Nacionalidad', 'Frecuencia', '%'], $queryGet);
                break;
                case 'Casos por Nivel Escolaridad Víctima':
                    $queryGet = DB::select("
                        select
                            nivel_educacion label,
                            count(1) frecuencia
                        from casos
                        inner join (select DISTINCT dui, id, nivel_educacion from personas) p on casos.victima_fk = p.id
                        where casos.estado = true and denuncia not like 'DIL%' and nivel_educacion is not null and (denuncia like '".tipo_denuncia()->denuncia."' or
                        denuncia like '".tipo_denuncia()->sin_denuncia."')".$queryAño." ".$queryMes."
                        group by nivel_educacion;
                    ");

                    $titulo = 'Casos por Nivel Escolaridad Víctima '. ($mes === 0 ? '':$this->getMes($mes)).' '.($periodo === 0 ? '':$periodo);
                
                    $configuracion = $this->configuracionFrecuenciaPorcentaje( $titulo, 'Casos', ['Nivel Escolaridad Víctima', 'Frecuencia', '%'], $queryGet);
                break;
                case 'Casos por Ocupación':
                    $queryGet = DB::select("
                        select
                            ocupacion label,
                            count(1) frecuencia
                        from casos
                        inner join (select DISTINCT dui, id, ocupacion from personas) p on casos.victima_fk = p.id
                        where casos.estado is true and casos.denuncia not like 'DIL%' and p.ocupacion is not null and (denuncia like '".tipo_denuncia()->denuncia."' or
                        denuncia like '".tipo_denuncia()->sin_denuncia."')".$queryAño." ".$queryMes."
                        group by ocupacion;
                    ");

                    $titulo = 'Casos por Ocupación '. ($mes === 0 ? '':$this->getMes($mes)).' '.($periodo === 0 ? '':$periodo);
                
                    $configuracion = $this->configuracionFrecuenciaPorcentaje( $titulo, 'Casos', ['Ocupación', 'Frecuencia', '%'], $queryGet);
                break;
                case 'Casos por Fuente de Ingresos':
                    $queryGet = DB::select("
                        select
                            i.fuente_ingreso label,
                            count(1) frecuencia
                        from casos
                        inner join (select DISTINCT dui, id from personas) p on casos.victima_fk = p.id
                        inner join ingresos i on p.id = i.persona_fk
                        where casos.estado is true and denuncia not like 'DIL%' and (denuncia like '".tipo_denuncia()->denuncia."' or
                        denuncia like '".tipo_denuncia()->sin_denuncia."')".$queryAño." ".$queryMes."
                        group by i.fuente_ingreso;
                    ");

                    $titulo = 'Casos por Fuente de Ingresos '. ($mes === 0 ? '':$this->getMes($mes)).' '.($periodo === 0 ? '':$periodo);
                
                    $configuracion = $this->configuracionFrecuenciaPorcentaje( $titulo, 'Casos', ['Fuente de Ingresos', 'Frecuencia', '%'], $queryGet);
                break;
                case 'Casos por Discapacidad Víctima':
                    $queryGet = DB::select("
                        select
                            p.discapacidad label,
                            count(1) frecuencia
                        from casos
                        inner join (select DISTINCT dui, id, discapacidad from personas) p on casos.victima_fk = p.id
                        where casos.estado is true and casos.denuncia not like 'DIL%' and (denuncia like '".tipo_denuncia()->denuncia."' or
                        denuncia like '".tipo_denuncia()->sin_denuncia."')".$queryAño." ".$queryMes."
                        group by p.discapacidad
                    ");

                    $titulo = 'Casos por Discapacidad Víctima '. ($mes === 0 ? '':$this->getMes($mes)).' '.($periodo === 0 ? '':$periodo);
                
                    $configuracion = $this->configuracionFrecuenciaPorcentaje( $titulo, 'Casos', ['Discapacidad Víctima', 'Frecuencia', '%'], $queryGet);
                break;
                case 'Casos por Sabe Leer y Escribir': 
                    $queryGet = DB::select("
                        select
                            UPPER(p.sabe_escribir_leer) label,
                            count(1) frecuencia
                        from casos
                        inner join personas p on casos.victima_fk = p.id
                        where p.sabe_escribir_leer and casos.denuncia not like 'DIL%' and p.sabe_escribir_leer is not null and (denuncia like '".tipo_denuncia()->denuncia."' or
                        denuncia like '".tipo_denuncia()->sin_denuncia."')".$queryAño." ".$queryMes."
                        group by p.sabe_escribir_leer;
                    ");

                    $titulo = 'Casos por Sabe Leer y Escribir '. ($mes === 0 ? '':$this->getMes($mes)).' '.($periodo === 0 ? '':$periodo);
                
                    $configuracion = $this->configuracionFrecuenciaPorcentaje( $titulo, 'Casos', ['Sabe Leer y Escribir', 'Frecuencia', '%'], $queryGet);
                break;
                case 'Casos y Tiene Hijos Vivos':
                    $queryGet = DB::select("
                        select
                            UPPER(p.hijos_vivos) label,
                            count(1) frecuencia
                        from casos 
                        inner join personas p on casos.victima_fk = p.id
                        where casos.denuncia not like 'DIL%' and casos.estado is true and (denuncia like '".tipo_denuncia()->denuncia."' or
                        denuncia like '".tipo_denuncia()->sin_denuncia."')".$queryAño." ".$queryMes."
                        group by p.hijos_vivos;
                    ");

                    $titulo = 'Casos y Tiene Hijos Vivos '. ($mes === 0 ? '':$this->getMes($mes)).' '.($periodo === 0 ? '':$periodo);
                
                    $configuracion = $this->configuracionFrecuenciaPorcentaje( $titulo, 'Casos', ['Tiene Hijos Vivos', 'Frecuencia', '%'], $queryGet);
                break;
                case 'Casos e Institución que Remite':
                    $queryGet = DB::select("
                    select
                        institucion_remitente label,
                        count(1) frecuencia
                    from casos 
                    where institucion_remitente is not null and denuncia not like 'DIL%' and estado = true and (denuncia like '".tipo_denuncia()->denuncia."' or
                    denuncia like '".tipo_denuncia()->sin_denuncia."')".$queryAño." ".$queryMes."
                    group by institucion_remitente;
                ");

                    $titulo = 'Casos e Institución que Remite '. ($mes === 0 ? '':$this->getMes($mes)).' '.($periodo === 0 ? '':$periodo);
                
                    $configuracion = $this->configuracionFrecuenciaPorcentaje( $titulo, 'Casos', ['Institución que Remite', 'Frecuencia', '%'], $queryGet);
                break;
                case 'Casos y Tipo de Asistencia':
                    $queryGet = DB::select("
                        select
                            asistencia label,
                            count(1) frecuencia
                        from casos
                        inner join tipo_asistencias ta on casos.id = ta.caso_fk
                        where casos.estado is true and asistencia is not null and denuncia not like 'DIL%' and (denuncia like '".tipo_denuncia()->denuncia."' or
                        denuncia like '".tipo_denuncia()->sin_denuncia."')".$queryAño." ".$queryMes."
                        group by asistencia;
                    ");

                    $titulo = 'Casos y Tipo de Asistencia '. ($mes === 0 ? '':$this->getMes($mes)).' '.($periodo === 0 ? '':$periodo);                
                    $configuracion = $this->configuracionFrecuenciaPorcentaje( $titulo, 'Casos', ['Tipo de Asistencia', 'Frecuencia', '%'], $queryGet);
                break;
                case 'Casos y Circunstancia del Hecho':
                    $queryGet = DB::select("
                        select
                            circunstancia_del_hecho label,
                            count(1) frecuencia
                        from casos
                        where casos.estado is true and circunstancia_del_hecho is not null and denuncia not like 'DIL%' and (denuncia like '".tipo_denuncia()->denuncia."' or
                        denuncia like '".tipo_denuncia()->sin_denuncia."')".$queryAño." ".$queryMes."
                        group by circunstancia_del_hecho;
                    ");

                    $titulo = 'Casos y Circunstancia del Hecho '. ($mes === 0 ? '':$this->getMes($mes)).' '.($periodo === 0 ? '':$periodo);                
                    $configuracion = $this->configuracionFrecuenciaPorcentaje( $titulo, 'Casos', ['Circunstancia del Hecho', 'Frecuencia', '%'], $queryGet);               
                break;
                case 'Casos y Delitos del Código Penal':
                    $queryGet = DB::select("
                        select
                            delito_codigo_penal label,
                            count(1) frecuencia
                        from casos
                        where casos.estado is true and denuncia not like 'DIL%' and delito_codigo_penal is not null and (denuncia like '".tipo_denuncia()->denuncia."' or
                        denuncia like '".tipo_denuncia()->sin_denuncia."')".$queryAño." ".$queryMes."
                        group by delito_codigo_penal;
                    ");

                    $titulo = 'Casos y Delitos del Código Penal '. ($mes === 0 ? '':$this->getMes($mes)).' '.($periodo === 0 ? '':$periodo);                
                    $configuracion = $this->configuracionFrecuenciaPorcentaje( $titulo, 'Casos', ['Delitos del Código Penal', 'Frecuencia', '%'], $queryGet);               
                break;
                case 'Casos y Delitos LEIV':
                    $queryGet = DB::select("
                        select
                            delito label,
                            count(1) frecuencia
                        from casos inner join delitos_leivs dl on casos.id = dl.caso_fk
                        where casos.estado is true and denuncia not like 'DIL%' and delito is not null and (denuncia like '".tipo_denuncia()->denuncia."' or
                        denuncia like '".tipo_denuncia()->sin_denuncia."')".$queryAño." ".$queryMes."
                        group by delito;
                    ");
                    $titulo = 'Casos y Delitos LEIV '. ($mes === 0 ? '':$this->getMes($mes)).' '.($periodo === 0 ? '':$periodo);                
                    $configuracion = $this->configuracionFrecuenciaPorcentaje( $titulo, 'Casos', ['Delitos LEIV', 'Frecuencia', '%'], $queryGet);               
                break;
                case 'Casos por Conocimiento o No del Agresor':
                    $queryGet = DB::select("
                        select
                            if(ac.id is null, 'NO','SI') label,
                        count(1) frecuencia
                        from casos
                        left join agresores_casos ac on casos.id = ac.caso_fk
                        where casos.estado is true  and (denuncia like '".tipo_denuncia()->denuncia."' or
                        denuncia like '".tipo_denuncia()->sin_denuncia."')".$queryAño." ".$queryMes."
                        group by label;
                    ");
                    $titulo = 'Casos por Conocimiento o No del Agresor '. ($mes === 0 ? '':$this->getMes($mes)).' '.($periodo === 0 ? '':$periodo);
                    $configuracion = $this->configuracionFrecuenciaPorcentaje( $titulo, 'Casos', ['Conocimiento del Agresor', 'Frecuencia', '%'], $queryGet);
                break;
                case 'Casos por Relación Víctima con Agresor':
                    $queryGet = DB::select("
                        select
                        relacion_victima_agresor label,
                        count(1) frecuencia
                        from casos
                        inner join agresores_casos ac on casos.id = ac.caso_fk
                        where casos.estado is true and (denuncia like '".tipo_denuncia()->denuncia."' or
                        denuncia like '".tipo_denuncia()->sin_denuncia."')".$queryAño." ".$queryMes."
                        group by relacion_victima_agresor;
                    ");
                    $titulo = 'Casos por Relación Víctima con Agresor '. ($mes === 0 ? '':$this->getMes($mes)).' '.($periodo === 0 ? '':$periodo);
                    $configuracion = $this->configuracionFrecuenciaPorcentaje( $titulo, 'Casos', ['Relación Víctima con Agresor', 'Frecuencia', '%'], $queryGet);
                break;
                case 'Agresores por Municipio de Residencia':
                    $queryGet = DB::select("
                        select
                            municipio label,
                            count(1) frecuencia
                        from casos
                        inner join agresores_casos ac on casos.id = ac.caso_fk
                        inner join municipios m on ac.municipio_fk = m.id
                        where casos.estado is true and (denuncia like '".tipo_denuncia()->denuncia."' or
                        denuncia like '".tipo_denuncia()->sin_denuncia."')".$queryAño." ".$queryMes."
                        group by municipio order by municipio asc;
                    ");
                    $titulo = 'Agresores por Municipio de Residencia '. ($mes === 0 ? '':$this->getMes($mes)).' '.($periodo === 0 ? '':$periodo);
                    $configuracion = $this->configuracionFrecuenciaPorcentaje( $titulo, 'Casos', ['Municipio de Residencia', 'Frecuencia', '%'], $queryGet);
                break;
                case 'Casos por Edad del Agresor': 
                    $queryGet = DB::select("
                        select
                            case
                                when edad_agresor<15 then 'Menores de 14 años'
                                when edad_agresor>=15
                                and edad_agresor<19 then '14 - 19 años'
                                when edad_agresor>18
                                and edad_agresor<31 then '19 - 30 años'
                                when edad_agresor>30
                                and edad_agresor<60 then '31 - 59 años'
                                when edad_agresor>59 then '60 años a más'
                            end label,
                            count(1) frecuencia
                        from
                            casos
                        inner join agresores_casos ac on
                            casos.id = caso_fk
                        where
                            casos.estado is true
                            and (denuncia like '".tipo_denuncia()->denuncia."' or
                            denuncia like '".tipo_denuncia()->sin_denuncia."') 
                            and denuncia not like 'DIL%'
                            ".$queryAño." ".$queryMes."
                            AND denuncia not like 'DIL%'
                            and edad_agresor is not null
                        group by label order by label asc;
                    ");
                    $array_edad = ['Menores de 14 años','14 - 19 años','19 - 30 años','31 - 59 años','60 años a más'];
                    $array_query = [];
                    
                    for ($i = 0; $i < count($array_edad); $i++) {
                        
                        $frecuencia = 0;
                        $rango_edad = $array_edad[$i];
                        foreach ($queryGet as $key => $value) {
                            # code...
                            $item = (object) $value;
                            
                            if($item -> label !== $rango_edad)
                                continue;
    
                            $frecuencia = $item -> frecuencia;
                            break;
                        }

                        array_push($array_query, ["label" => $rango_edad, "frecuencia"=> intval($frecuencia)]);
                    }
                    $titulo = 'Casos por Edad del Agresor '. ($mes === 0 ? '':$this->getMes($mes)).' '.($periodo === 0 ? '':$periodo);
                    $configuracion = $this->configuracionFrecuenciaPorcentaje( $titulo, 'Casos', ['Edad del Agresor', 'Frecuencia', '%'], $array_query);
                break;
                case 'Agresores por Relacion con la Víctima':
                    $queryGet = DB::select("
                        select
                            relacion_victima_agresor label,
                            count(1) frecuencia
                        from casos
                        inner join agresores_casos ac on casos.id = ac.caso_fk
                        where casos.estado is true and (denuncia like '".tipo_denuncia()->denuncia."' or
                        denuncia like '".tipo_denuncia()->sin_denuncia."')".$queryAño." ".$queryMes."
                        group by relacion_victima_agresor order by relacion_victima_agresor asc;
                    ");
                    $titulo = 'Agresores por Relacion con la Víctima '. ($mes === 0 ? '':$this->getMes($mes)).' '.($periodo === 0 ? '':$periodo);
                    $configuracion = $this->configuracionFrecuenciaPorcentaje( $titulo, 'Casos', ['Relacion con la Víctima', 'Frecuencia', '%'], $queryGet);
                    break;
                case 'Ocupación Agresores':
                    $queryGet = DB::select("
                        select
                            ocupacion_agresor label,
                            count(1) frecuencia
                        from casos
                        inner join agresores_casos ac on casos.id = ac.caso_fk
                        where casos.estado is true and ocupacion_agresor is not null and (denuncia like '".tipo_denuncia()->denuncia."' or
                        denuncia like '".tipo_denuncia()->sin_denuncia."')".$queryAño." ".$queryMes."
                        group by ocupacion_agresor order by ocupacion_agresor asc;
                    ");
                    $titulo = 'Ocupación Agresores '. ($mes === 0 ? '':$this->getMes($mes)).' '.($periodo === 0 ? '':$periodo);
                    $configuracion = $this->configuracionFrecuenciaPorcentaje( $titulo, 'Casos', ['Ocupación', 'Frecuencia', '%'], $queryGet);
                break;
                case 'Agresores con Formación Militar': 
                    $queryGet = DB::select("
                        select
                            formacion_militar_policial label,
                            count(1) frecuencia
                        from casos
                        inner join agresores_casos ac on casos.id = ac.caso_fk
                        where casos.estado is true and formacion_militar_policial is not null and (denuncia like '".tipo_denuncia()->denuncia."' or
                        denuncia like '".tipo_denuncia()->sin_denuncia."')".$queryAño." ".$queryMes."
                        group by formacion_militar_policial order by formacion_militar_policial asc;
                    ");
                    $titulo = 'Agresores con Formación Militar '. ($mes === 0 ? '':$this->getMes($mes)).' '.($periodo === 0 ? '':$periodo);
                    $configuracion = $this->configuracionFrecuenciaPorcentaje( $titulo, 'Casos', ['Formación Militar', 'Frecuencia', '%'], $queryGet);
                break;
                case 'Agresores con Tipo de Armas': 
                    $queryGet = DB::select("
                        select
                            tipo_arma label,
                            count(1) frecuencia
                        from casos
                        inner join agresores_casos ac on casos.id = ac.caso_fk
                        where casos.estado is true and tipo_arma is not null and (denuncia like '".tipo_denuncia()->denuncia."' or
                        denuncia like '".tipo_denuncia()->sin_denuncia."')".$queryAño." ".$queryMes."
                        group by tipo_arma order by tipo_arma asc;");
                    $titulo = 'Agresores con Tipo de Armas '. ($mes === 0 ? '':$this->getMes($mes)).' '.($periodo === 0 ? '':$periodo);
                    $configuracion = $this->configuracionFrecuenciaPorcentaje( $titulo, 'Casos', ['Tipo de Armas', 'Frecuencia', '%'], $queryGet);
                break;
                case 'Agresores Poseen Armas': 
                    $queryGet = DB::select("
                        select
                            posee_arma label,
                            count(1) frecuencia
                        from casos
                        inner join agresores_casos ac on casos.id = ac.caso_fk
                        where casos.estado is true and posee_arma is not null and (denuncia like '".tipo_denuncia()->denuncia."' or
                        denuncia like '".tipo_denuncia()->sin_denuncia."')".$queryAño." ".$queryMes."
                        group by posee_arma order by posee_arma asc;");
                    $titulo = 'Agresores Poseen Armas '. ($mes === 0 ? '':$this->getMes($mes)).' '.($periodo === 0 ? '':$periodo);
                    $configuracion = $this->configuracionFrecuenciaPorcentaje( $titulo, 'Casos', ['Poseen Armas', 'Frecuencia', '%'], $queryGet);
                break;
                default:
                    return abort(501);
                break;
            }

            return response()->json($configuracion);

        }catch (\Exception $e) {
            bitacora_errores('GraficasController.php', $e);
            return response()->json(['error' => 'Linea -> '.$e->getLine().' Error -> '.$e->getMessage()]);
        }
    }

    private function configuracionFrecuenciaPorcentaje( $titulo, $label_barra, $columnas_tabla, $queryGet ){

        try {

            $array_frecuencia = $array_label = $filas = array();
            $total = 0;

            for ($i=0; $i < count($queryGet); $i++) {                
                $item = (object)$queryGet[$i];
                
                $total += intval($item->frecuencia);
                
                array_push($array_label, $item->label); 
                array_push($array_frecuencia, $item->frecuencia);
            }

            for ($i=0; $i < count($queryGet); $i++) { 
                $item = (object)$queryGet[$i];
                
                array_push($filas, [
                    "fila" => [
                        $item->label, 
                        $item->frecuencia, 
                        ($total>0 && intval($item->frecuencia) > 0 ? (round(intval($item->frecuencia)/$total, 4)*100):0)."%"
                    ]
                ]);
            }

            if(count($filas)>0) array_push($filas, ["fila" => ["Total", $total, "100%"]]);

            $tabla = [ "columnas" => $columnas_tabla, "filas" => $filas];

            $options = [
                "responsive" => true,
                "plugins" => [
                    "legend" => ["display" => true , "labels" => [ "font"=> ["size" => 14]]],
                    "title" => [ "display" => true, "text" => $titulo, "font" => ["size" => 20]],
                ],
            ];
            
            $data = [
                "labels" => $array_label,
                "datasets" => [[ 
                    "data" => $array_frecuencia, 
                    "label" => $label_barra, 
                    "borderColor" => 'rgba(8, 104, 145, 0.6)',
                    "backgroundColor" => 'rgb(89, 94, 255, 0.7)', 
                ],],
            ];
    
            return [
                'options' => $options,
                'data' => $data,
                'tabla' => $tabla
            ];
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    private function getDataSet($label, $data, $borderColor, $backgroundColor){
        return [ 
            "data" => $data, 
            "label" => $label, 
            "borderColor" => $borderColor,
            "backgroundColor" => $backgroundColor, 
        ];
    }


    private function configuracion( $titulo, $labels, $dataset, $tabla ){

        try {

            $options = [
                "responsive" => true,
                "plugins" => [
                    "legend" => ["display" => true , "labels" => [ "font"=> ["size" => 14]]],
                    "title" => [ "display" => true, "text" => $titulo, "font" => ["size" => 20]],
                ],
            ];
            
            $data = [
                "labels" => $labels,
                "datasets" => $dataset,
            ];

            return [
                'options' => $options,
                'data' => $data,
                'tabla' => $tabla
            ];

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    private function getQueryCasos(){
        return Casos:: where('casos.estado', true)
        // ->leftJoin('municipios', 'municipios.id',"=","casos.municipio_ocurrencia_fk")
        // ->leftJoin('departamentos', 'departamentos.id',"=","municipios.departamento_fk")
        // ->leftJoin('personas as p1', 'p1.id', "=", "casos.victima_fk")
        // ->leftJoin('personas as p2', 'p2.id', "=", "casos.responsable_fk")
        ->where( function ($query)
            {
                $query->where('denuncia','like', tipo_denuncia()->denuncia)
                ->orWhere('denuncia','like', tipo_denuncia()->sin_denuncia)
                ->orWhere('denuncia','like', tipo_denuncia()->diligencia);
            }
        );
    }

    private function getQueryCasosNoDiligencia() {
        return Casos::where('casos.estado', true)
        // ->leftJoin('municipios', 'municipios.id',"=","casos.municipio_ocurrencia_fk")
        // ->leftJoin('departamentos', 'departamentos.id',"=","municipios.departamento_fk")
        // ->leftJoin('personas as p1', 'p1.id', "=", "casos.victima_fk")
        // ->leftJoin('personas as p2', 'p2.id', "=", "casos.responsable_fk")
        ->where( function ($query)
            {
                $query->where('denuncia','like', tipo_denuncia()->denuncia)
                ->orWhere('denuncia','like', tipo_denuncia()->sin_denuncia);
            }
        );
    }

    private function getMes($mes){
        return [
            "Todos",
            "Enero",
            "Febrero",
            "Marzo",
            "Abril",
            "Mayo",
            "Junio",
            "Julio",
            "Agosto",
            "Septiembre",
            "Octubre",
            "Noviembre",
            "Diciembre",
        ]
        [$mes];
    }
}
