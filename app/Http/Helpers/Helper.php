<?php

namespace App\Http\Helpers;

use App\Models\Configuracion;
use App\Models\NivelEjercicio;
use App\Models\Objetivo;
use App\Models\Plato;
use App\Models\PlatoCodigo;
use File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class Helper
{

  public static function saveImage($file, $path, $filename, $width = 1024, $height = null, $option = 'resize')
  {
    $image = Image::make($file)->widen($width);

    switch ($option) {
      case 'rezise':
        $image->resize($width, $height, function ($constraint) use ($height, $width) {
          $constraint->aspectRatio();
          $constraint->upsize();
        });
        break;
      case 'crop':
        $image = $image->crop($width, $height);
        break;
      case 'heighten':
        $image->heighten($height, function ($constraint) use ($height, $width) {
          $constraint->upsize();
        });
        break;
      case 'widen':
        $image->heighten($width, function ($constraint) use ($height, $width) {
          $constraint->upsize();
        });
        break;
      default:
        $image->resize($width, $height, function ($constraint) use ($height, $width) {
          $constraint->aspectRatio();
          $constraint->upsize();
        });
        break;
    }
    Storage::disk(getDisk())->put($path . $filename, (string)$image->encode());

    return $image;
  }

  public static function saveIcon($file, $path, $filename)
  {
    $image = Image::make($file);

    Storage::disk(getDisk())->put($path . $filename, (string)$image->encode());

    return $image;
  }


  // ----- Calculos

  public static function calculateProtein($calories)
  {
    $percent = Configuracion::where('clave', 'proteina')->first()->valor;

    return round($calories * ($percent / 100) / 4, 1);
  }

  public static function calculateHydrates($calories)
  {
    $percent = Configuracion::where('clave', 'hidrados')->first()->valor;

    return round($calories * ($percent / 100) / 4, 1);
  }

  public static function calculateFats($calories)
  {
    $percent = Configuracion::where('clave', 'grasas')->first()->valor;

    return round($calories * ($percent / 100) / 9, 1);
  }

  public static function calculateTmb($peso, $altura, $edad, $sexo)
  {
    $calc = 10 * $peso + 6.25 * $altura - 5 * $edad + ($sexo == 1 ? -161 : 5);

    return round($calc, 0);
  }

  public static function calculateCaloriesConsumed($peso, $altura, $edad, $sexo, $nivelejercicio)
  {
    $tmb = self::calculateTmb($peso, $altura, $edad, $sexo);
    $coefNivelEjercicio = NivelEjercicio::findOrFail($nivelejercicio);

    $calc = $tmb * $coefNivelEjercicio->coef;

    return round($calc, 0);
  }

  public static function calculateCaloriesProposed($peso, $altura, $edad, $sexo, $nivelejercicio, $objetivo)
  {
    $caloriasConsumidas = self::calculateCaloriesConsumed($peso, $altura, $edad, $sexo, $nivelejercicio);
    $coefObjetivo = Objetivo::findOrFail($objetivo);

    $calc = $caloriasConsumidas * (1 + ($coefObjetivo->coef / 100));

    return round($calc, 0);
  }

  public static function calculateDishes($caloriasDiariasTotales)
  {

    $caloriasPorcentaje = Configuracion::where('clave', 'calorias')->first()->valor;

    // High calories
    $caloriasMistDiarias = $caloriasDiariasTotales * ($caloriasPorcentaje / 100);
    $lunch = [];
    $dinner = [];

    if ($caloriasDiariasTotales > 1851 and $caloriasDiariasTotales < 3800) {
      $dishes = Plato::where('codigo', 'like', '%2B%')->get();
      $randomDishes = $dishes->shuffle();
      $j = 0;
      for ($i = 0; $i < 14; $i++) {
        if (count($randomDishes) == 0) {
          $randomDishes = $dishes->shuffle();
          $j = 0;
        }
        if ($i < 7) {
          array_push($lunch, $randomDishes[$j]);
          unset($randomDishes[$j]);
          $j++;
        } else {
          array_push($dinner, $randomDishes[$j]);
          unset($randomDishes[$j]);
          $j++;
        }
      }
    }

    if ($caloriasDiariasTotales > 1551 and $caloriasDiariasTotales < 1850) {
      $dinnerDishes = Plato::where('codigo', 'like', '%2B%')->get();
      $lunchDishes = Plato::where('codigo', 'like', '%1B%')->get();

      $randomDinnerDishes = $dinnerDishes->shuffle();
      $randomLunchDishes = $lunchDishes->shuffle();

      $j = 0;
      $k = 0;

      for ($i = 0; $i < 7; $i++) {
        if (count($randomDinnerDishes) == 0) {
          $randomDinnerDishes = $dinnerDishes->shuffle();
          $j = 0;
        }
        array_push($dinner, $randomDinnerDishes[$j]);
        unset($randomDinnerDishes[$j]);
        $j++;
      }

      for ($i = 0; $i < 7; $i++) {
        if (count($randomLunchDishes) == 0) {
          $randomLunchDishes = $lunchDishes->shuffle();
          $k = 0;
        }
        array_push($lunch, $randomLunchDishes[$k]);
        unset($randomLunchDishes[$k]);
        $k++;
      }
    }
    if ($caloriasDiariasTotales > 1400 and $caloriasDiariasTotales < 1550) {
      $dinnerDishes = Plato::where('codigo', 'like', '%2B%')->get();
      $lunchDishes = Plato::where('codigo', 'like', '%1A%')->get();

      $randomDinnerDishes = $dinnerDishes->shuffle();
      $randomLunchDishes = $lunchDishes->shuffle();

      $j = 0;
      $k = 0;

      for ($i = 0; $i < 7; $i++) {
        if (count($randomDinnerDishes) == 0) {
          $randomDinnerDishes = $dinnerDishes->shuffle();
      $j = 0;
        }
        array_push($dinner, $randomDinnerDishes[$j]);
        unset($randomDinnerDishes[$j]);
      $j++;
      }

      for ($i = 0; $i < 7; $i++) {
        if (count($randomLunchDishes) == 0) {
          $randomLunchDishes = $lunchDishes->shuffle();
      $k = 0;
        }
        array_push($lunch, $randomLunchDishes[$k]);
        unset($randomLunchDishes[$k]);
      $k++;
      }
    }
    if ($caloriasDiariasTotales > 1151 and $caloriasDiariasTotales < 1399) {
      $dinnerDishes = Plato::where('codigo', 'like', '%1B%')->get();
      $lunchDishes = Plato::where('codigo', 'like', '%2A%')->get();

      $randomDinnerDishes = $dinnerDishes->shuffle();
      $randomLunchDishes = $lunchDishes->shuffle();

      $j = 0;
      $k = 0;

      for ($i = 0; $i < 7; $i++) {
        if (count($randomDinnerDishes) == 0) {
          $randomDinnerDishes = $dinnerDishes->shuffle();
      $j = 0;
        }
        array_push($dinner, $randomDinnerDishes[$j]);
        unset($randomDinnerDishes[$j]);
      $j++;
      }

      for ($i = 0; $i < 7; $i++) {
        if (count($randomLunchDishes) == 0) {
          $randomLunchDishes = $lunchDishes->shuffle();
      $k = 0;
        }
        array_push($lunch, $randomLunchDishes[$k]);
        unset($randomLunchDishes[$k]);
      $k++;
      }
    }
    if ($caloriasDiariasTotales > 1000 and $caloriasDiariasTotales < 1150) {
      $dinnerDishes = Plato::where('codigo', 'like', '%2A%')->get();
      $lunchDishes = Plato::where('codigo', 'like', '%1A%')->get();

      $randomDinnerDishes = $dinnerDishes->shuffle();
      $randomLunchDishes = $lunchDishes->shuffle();

      $j = 0;
      $k = 0;

      for ($i = 0; $i < 7; $i++) {
        if (count($randomDinnerDishes) == 0) {
          $randomDinnerDishes = $dinnerDishes->shuffle();
      $j = 0;
        }
        array_push($dinner, $randomDinnerDishes[$j]);
        unset($randomDinnerDishes[$j]);
      $j++;
      }

      for ($i = 0; $i < 7; $i++) {
        if (count($randomLunchDishes) == 0) {
          $randomLunchDishes = $lunchDishes->shuffle();
      $k = 0;
        }
        array_push($lunch, $randomLunchDishes[$k]);
        unset($randomLunchDishes[$k]);
      $k++;
      }
    }

    return [
      $lunch,
      $dinner
    ];

  }
}
