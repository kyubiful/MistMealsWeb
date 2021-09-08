<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Order;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'surname',
        'email',
        'password',
        'username',
        'photo',
        'peso',
        'altura',
        'edad',
        'tmb',
        'calorias_consumidas',
        'calorias_propuestas',
        'sexo_id',
        'profesion_id',
        'menu_id',
        'role_id',
        'nivel_ejercicio_id',
        'objetivo_id',
        'estado_civil_id',
        'estado_laboral_id',
        'address',
        'address_number',
        'address_letter',
        'cp',
        'region',
        'province',
        'city',
        'invoice_address',
        'invoice_address_number',
        'invoice_address_letter',
        'invoice_cp',
        'invoice_region',
        'invoice_province',
        'invoice_city',
        'invoice_nif',
        'phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sexo()
    {
        return $this->belongsTo(Sexo::class, 'sexo_id');
    }

    public function profesion()
    {
        return $this->belongsTo(Profesion::class, 'profesion_id');
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function nivel_ejercicio()
    {
        return $this->hasOne(NivelEjercicio::class, 'id', 'nivel_ejercicio_id');
    }

    public function objetivo()
    {
        return $this->hasOne(Objetivo::class, 'id', 'objetivo_id');
    }

    public function estado_civil()
    {
        return $this->hasOne(EstadoCivil::class, 'id', 'estado_civil_id');
    }

    public function estado_laboral()
    {
        return $this->hasOne(EstadoLaboral::class, 'id', 'estado_laboral_id');
    }

    public function scopeIsAdmin($query)
    {
        return ($this->role != null && $this->role->name == 'admin');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'customer_id');
    }

    public function payments()
    {
        return $this->hasManyThrough(Payment::class, Order::class, 'customer_id');
    }
}
