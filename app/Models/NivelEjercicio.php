<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NivelEjercicio extends Model
{
    use HasFactory;

    protected $table = 'nivel_ejercicio';

    protected $fillable = [
        'nombre',
        'coef',
    ];
}
