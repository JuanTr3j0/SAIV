<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgresoresCasos extends Model
{
    use HasFactory;
    protected $fillable = [
        'caso_fk'                   ,
        'municipio_fk'              ,
        'direccion'                 ,
        'edad_agresor'              ,
        'primer_nombre'             ,
        'segundo_nombre'            ,
        'edad_desconocida'          ,
        'primer_apellido'           ,
        'ocupacion_agresor'         ,
        'segundo_apellido'          ,
        'ocupacion_agresor_otro'    ,
        'relacion_victima_agresor'  ,
        'nombre_desconocido'        ,
        'lugar_trabajo'             ,
        'direccion_trabajo'         ,
        'posee_arma'                ,
        'tipo_arma'                 ,
        'formacion_militar_policial',
        'zona_residencial'          ,
        'tipo_arma_otra'            ,
        'relacion_victima_agresor_otra'
    ];
}
