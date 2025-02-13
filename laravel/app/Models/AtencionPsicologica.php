<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AtencionPsicologica extends Model
{
    use HasFactory;

    protected $table = 'atencion_psicologica';
    protected $fillable = ['created_at'];
    protected $dates = ['date_begin'];
}
