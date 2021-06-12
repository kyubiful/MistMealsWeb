<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlatoEtiqueta extends Model
{
    use HasFactory;

    protected $table = 'platos_etiquetas';

    protected $fillable = [
        'plato_id',
        'etiqueta_id',
    ];

    public function plato()
    {
        return $this->belongsTo(Plato::class, 'plato_id');
    }

    public function etiqueta()
    {
        return $this->belongsTo(Etiqueta::class, 'etiqueta_id');
    }
}
