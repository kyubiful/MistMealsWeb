<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlatoCodigo extends Model
{
    use HasFactory;

    protected $table = 'platos_codigos';

    protected $fillable = [
        'codigo',
        'calorias',
        'plato_peso_id',
    ];

    public function plato_peso()
    {
        return $this->hasOne(PlatoPeso::class, 'id', 'plato_peso_id');
    }
}
