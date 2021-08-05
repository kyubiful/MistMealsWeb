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

        $codeCaloriasHighMin = 1.9;
        $codeCaloriasLowMin = 1;

        $dishesCount1 = [0, 0, 0, 0];
        $dishesCount2 = [0, 0, 0, 0];

        $randonLunchDishes = [];
        $randonDinnerDishes = [];

        // High calories
        $caloriasMistDiarias = $caloriasDiariasTotales * ($caloriasPorcentaje / 100);

        $code1Calorias = $caloriasMistDiarias / PlatoCodigo::findOrFail(1)->calorias;
        if ($code1Calorias > $codeCaloriasHighMin) {
            $dishesCount1[0] = 1;
        }

        $code2Calorias = $caloriasMistDiarias / PlatoCodigo::findOrFail(2)->calorias;
        if ($code2Calorias > $codeCaloriasHighMin) {
            $dishesCount1[1] = 2;
        }

        $code3Calorias = $caloriasMistDiarias / PlatoCodigo::findOrFail(3)->calorias;
        if ($code3Calorias > $codeCaloriasHighMin) {
            $dishesCount1[2] = 3;
        }

        $code4Calorias = $caloriasMistDiarias / PlatoCodigo::findOrFail(4)->calorias;
        if ($code4Calorias > $codeCaloriasHighMin) {
            $dishesCount1[3] = 4;
        }


        // Low calories
        $caloriasMistDiarias = ($caloriasDiariasTotales * ($caloriasPorcentaje / 100)) - PlatoCodigo::findOrFail(max($dishesCount1))->calorias;

        $code1Calorias = $caloriasMistDiarias / PlatoCodigo::findOrFail(1)->calorias;
        if ($code1Calorias > $codeCaloriasLowMin) {
            $dishesCount2[0] = 1;
        }

        $code2Calorias = $caloriasMistDiarias / PlatoCodigo::findOrFail(2)->calorias;
        if ($code2Calorias > $codeCaloriasLowMin) {
            $dishesCount2[1] = 2;
        }

        $code3Calorias = $caloriasMistDiarias / PlatoCodigo::findOrFail(3)->calorias;
        if ($code3Calorias > $codeCaloriasLowMin) {
            $dishesCount2[2] = 3;
        }

        $code4Calorias = $caloriasMistDiarias / PlatoCodigo::findOrFail(4)->calorias;
        if ($code4Calorias > $codeCaloriasLowMin) {
            $dishesCount2[3] = 4;
        }

        // Num launches
        $lunch = max( max($dishesCount1), max($dishesCount2) );
        $lunchDishCode = PlatoCodigo::findOrFail($lunch);

        $dinner = min( max($dishesCount1), max($dishesCount2) );
        $dinnerDishCode = PlatoCodigo::findOrFail($dinner);


        // Others
        $caloriesMist = $lunchDishCode->calorias + $dinnerDishCode->calorias;
        $percentCalMist = round(($caloriesMist / $caloriasDiariasTotales) * 100, 0);
        $caloriesRest = $caloriasDiariasTotales - $caloriesMist;

        // Dishes
        $dishesLunch = Plato::where('plato_codigo_id', $lunchDishCode->id);
        for($i = 0; $i < 7; $i++) {

            $random = $dishesLunch->inRandomOrder()->first();

            while (in_array($random->id, $randonLunchDishes)) {
                $random = $dishesLunch->inRandomOrder()->first();
	    }

            array_push($randonLunchDishes, $random->id);
        }

        $dishesDinner = Plato::where('plato_codigo_id', $dinnerDishCode->id);
        for($i = 0; $i < 7; $i++) {

            $random = $dishesDinner->inRandomOrder()->first();

            while (in_array($random->id, $randonDinnerDishes) || $random->id == $randonLunchDishes[$i]) {
                $random = $dishesDinner->inRandomOrder()->first();
            }

            if ($i > 0 && $i < 6) {
                while (in_array($random->id, $randonDinnerDishes) || $random->id == $randonLunchDishes[$i] || $randonLunchDishes[$i - 1] == $random->id || $randonLunchDishes[$i + 1] == $random->id) {
                    $random = $dishesLunch->inRandomOrder()->first();
                }
            }

            if ($i == 6) {
                while (in_array($random->id, $randonDinnerDishes) || $random->id == $randonLunchDishes[$i] || $randonLunchDishes[$i - 1] == $random->id || $randonLunchDishes[0] == $random->id) {
                    $random = $dishesLunch->inRandomOrder()->first();
                }
            }

           /* if ($i < 6) {
                while ($randonLunchDishes[$i + 1] == $random->id) {
                    $random = $dishesLunch->inRandomOrder()->first();
                }
            }*/

            array_push($randonDinnerDishes, $random->id);

        }

        return [
            $randonLunchDishes,
            $randonDinnerDishes
        ];
    }

}
