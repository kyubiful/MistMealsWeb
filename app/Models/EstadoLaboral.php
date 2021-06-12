<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoLaboral extends Model
{
    use HasFactory;

    protected $table = 'estado_laboral';

    protected $fillable = [
        'nombre',
    ];
}
