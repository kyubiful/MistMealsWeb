<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlatoAlergeno extends Model
{
    use HasFactory;

    protected $table = 'platos_alergenos';

    protected $fillable = [
        'plato_id',
        'alergeno_id',
    ];

    public function plato()
    {
        return $this->belongsTo(Plato::class, 'plato_id');
    }

    public function alergeno()
    {
        return $this->belongsTo(Alergeno::class, 'alergeno_id');
    }
}
