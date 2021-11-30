<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plato extends Model
{
  use HasFactory;

  protected $fillable = [
    'codigo',
    'nombre',
    'ingredientes',
    'receta',
    'calorias',
    'precio',
    'plato_codigo_id',
    'base_proteina_id',
    'plato_peso_id',
    'imagen_1',
    'imagen_2',
    'peso',
    'active'
  ];

  public function plato_codigo()
  {
    return $this->hasOne(PlatoCodigo::class, 'id', 'plato_codigo_id');
  }

  public function base_proteina()
  {
    return $this->hasOne(BaseProteina::class, 'base_proteina_id');
  }

  public function plato_peso()
  {
    return $this->hasOne(PlatoPeso::class, 'id', 'plato_peso_id');
  }

  public function plato_info_nutricional()
  {
    return $this->hasOne(PlatoInfoNutricional::class, 'plato_id');
  }

  public function plato_alergeno()
  {
    return $this->belongsToMany(Alergeno::class, 'platos_alergenos', 'plato_id', 'alergeno_id');
  }

  public function plato_etiqueta()
  {
    return $this->belongsToMany(Etiqueta::class, 'platos_etiquetas', 'plato_id', 'etiqueta_id');
  }

  public function getImage1AltAttribute()
  {
    return explode('.', $this->imagen_1)[0];
  }

  public function getImage2AltAttribute()
  {
    return explode('.', $this->imagen_2)[0];
  }

  public function getUrlImage1Attribute()
  {
    if ($this->imagen_1 && existsResource($this->getFolder() . $this->imagen_1)) {
      return 'storage/'.$this->getFolder() . $this->imagen_1;
    }

    return '/assets/images/no-product.png';
  }

  public function getUrlImage2Attribute()
  {
    if ($this->imagen_2 && existsResource($this->getFolder() . $this->imagen_2)) {
      return 'storage/'.$this->getFolder() . $this->imagen_2;
    }

    return '/assets/images/no-product.png';
  }

  public function getUrlImagePdfAttribute()
  {
    if ($this->imagen_1 && existsResource($this->getFolder() . $this->imagen_1)) {
      return public_path('storage/plato/' . $this->id . '/' . $this->imagen_1);
    }

    return '/assets/images/no-product.png';
  }

  public function getFolder()
  {
    return '/plato/' . $this->id . '/';
  }

  public function carts(){
    return $this->morphedByMany(Cart::class, 'productable')->withPivot('quantity');
  }

  public function orders(){
    return $this->morphedByMany(Order::class, 'productable')->withPivot('quantity');
  }

  public function getTotalAttribute()
  {
    return $this->pivot->quantity * $this->precio;
  }

}
