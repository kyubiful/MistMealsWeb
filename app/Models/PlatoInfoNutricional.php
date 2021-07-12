<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlatoInfoNutricional extends Model
{
    use HasFactory;

    protected $table = 'platos_info_nutricional';

    protected $fillable = [
        'energia',
        'calorias',
        'proteinas',
        'grasas',
        'saturadas',
        'carbohidratos',
        'azucar',
        'fibra',
        'sodio',
        'plato_id'
    ];

    public function plato()
    {
        return $this->hasOne(Plato::class, 'id', 'plato_id');
    }
}
