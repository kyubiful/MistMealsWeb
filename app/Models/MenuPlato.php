<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuPlato extends Model
{
    use HasFactory;

    protected $fillable = [
        'menu_id',
        'plato_id',
    ];

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }

    public function plato()
    {
        return $this->belongsTo(Plato::class, 'plato_id');
    }
}
