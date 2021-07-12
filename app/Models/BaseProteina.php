<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaseProteina extends Model
{
    use HasFactory;

    protected $table = 'base_proteina';

    protected $fillable = [
        'name',
    ];
}
