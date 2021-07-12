<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlatoPeso extends Model
{
    use HasFactory;

    protected $table = 'platos_pesos';

    protected $fillable = [
        'valor',
        'peso',
    ];
}
