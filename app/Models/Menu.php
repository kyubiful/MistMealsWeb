<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'num_total_platos',
        'plato_codigo_id',
        'sexo_id',
        'menu_peso_id',
    ];


    public function plato_codigo()
    {
        return $this->hasOne(PlatoCodigo::class, 'plato_codigo_id');
    }

    public function sexo()
    {
        return $this->belongsTo(Sexo::class, 'sexo_id');
    }

    public function menu_peso()
    {
        return $this->belongsTo(MenuPeso::class, 'menu_peso_id');
    }
}
