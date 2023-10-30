<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstitucionSeRemitira extends Model
{
    use HasFactory;
    protected $fillable = ['caso_fk', 'institucion'];
}
