<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscountCode extends Model
{
    use HasFactory;

    protected $table = 'discount_code';

    protected $fillable = [
        'name',
        'value',
        'tipo',
        'start',
        'end',
        'active',
        'unique',
        'uses',
        'need_loged',
        'one_use'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
