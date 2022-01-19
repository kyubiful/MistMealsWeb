<?php

namespace App\Services;

use App\Models\DiscountCode;
use Illuminate\Support\Facades\Cookie;

class DiscountCodeService
{
  protected $algorithm = 'crc32b';

  public function generateRandomCode()
  {
    // El nombre del cupón será generado mediante la fecha realizandole un hash
    $date = new Date();
    $code = hash($this->algorithm ,$date->getTimestamp());
    return $code;
  }
  public function saveCode($code, $value, $tipo, $start, $end, $uses=0, $active=0, $unique=0, $one_use=0)
  {
    $discountCode = new DiscountCode;

    $discountCode->name = $code;
    $discountCode->value = $value;
    $discountCode->tipo = $tipo;
    $discountCode->start = $start;
    $discountCode->end = $end;
    $discountCode->uses = $uses;
    $discountCode->active = $active;
    $discountCode->unique = $unique;
    $discountCode->one_use = $one_use;

    $discountCode->save();
    return $discount;
  }
}
