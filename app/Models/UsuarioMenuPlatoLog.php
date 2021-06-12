<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuarioMenuPlatoLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'user_id',
        'menu_id',
        'plato_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }

    public function plato()
    {
        return $this->belongsTo(Plato::class, 'plato_id');
    }
}
