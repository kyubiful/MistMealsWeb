<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sugerencia extends Model
{
    use HasFactory;

    protected $table = 'sugerencias';

    protected $fillable = [
        'nombre',
        'email',
        'descripcion',
        'respuesta',
        'revisado',
        'mensaje_user_id',
        'respuesta_user_id',
    ];

    public function mensaje_user()
    {
        return $this->hasOne(User::class, 'id', 'mensaje_user_id');
    }

    public function respuesta_user()
    {
        return $this->hasOne(User::class, 'id', 'respuesta_user_id');
    }
}
