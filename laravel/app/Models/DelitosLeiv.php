<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DelitosLeiv extends Model
{
    use HasFactory;
    protected $fillable = [
        'delito',
        'caso_fk',
    ];
}
