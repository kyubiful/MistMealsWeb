<?php

namespace App\Services;

use App\Models\DiscountCode;
use Illuminate\Support\Facades\Cookie;
use Carbon\Carbon;

class DiscountCodeService
{
  protected $algorithm = 'crc32b';

  public function generateRandomCode($user)
  {
    // El nombre del cupón será generado mediante la fecha realizandole un hash
    $date = Carbon::now();
    $code = hash('crc32b' , $user->id.$date->getTimestamp());
    return $code;
  }
  public function saveCode($code, $value, $tipo, $start, $end, $uses=0, $active=1, $unique=0, $one_use=1)
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
    return $discountCode;
  }
}
