<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuPeso extends Model
{
    use HasFactory;

    protected $table = 'menus_pesos';

    protected $fillable = [
        'valor',
    ];
}
