<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtrasPersonas extends Model
{
    use HasFactory;
    protected $fillable = [
        'persona_fk',
        'tipo',
        'nombres',
        'sexo',
        'edad',
        'grado_escolar',
        'vive_con_ella',
        'discapacidad' ,
        'relacion_victima'
    ];
}
