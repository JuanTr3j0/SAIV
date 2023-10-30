<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArchivosCasos extends Model
{
    use HasFactory;
    protected $table = 'archivos_casos';
    protected $fillable = [
        'caso_fk',
        'archivo_fk'
    ];
}
