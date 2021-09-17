<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvailableCP extends Model
{
    use HasFactory;

    protected $table = 'available_cp';

    protected $fillable = [
        'cp',
        'active'
    ];
}
