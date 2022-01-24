<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Plato;

class PlatosController extends Controller
{
    public function index(Request $request)
    {
        session(['lastPlateId' => 0]);
        // Inicializamos variables
        $allPlatesQuery = Plato::get();
        $firstPlatePosition = 0;
        $lastPlatePosition = 15;

        $allPlates = array();
        $platos = array();

        do{

            if($lastPlatePosition > (count($allPlatesQuery) - 1)) {
                $finishReload = true;
                return view('web.platos.index', compact('platos', 'finishReload'));
            }

            $allPlates = [];
            $platos = [];

            // Guardamos los 16 platos que necesitamos en $allPlates
            for($i=$firstPlatePosition; $i<=$lastPlatePosition; $i++) {
                $allPlates[$i]=$allPlatesQuery[$i];
            }

            $allPlates = array_values($allPlates);

            // Guardamos los platos en pares en $plotes
            for($i=0; $i<count($allPlates); $i++) {
                if($i%2==0) {
                    $dualPlate = [];
                    // Si el plato no está activo lo guardaremos como null
                    if($allPlates[$i]->active==1) $dualPlate[0] = $allPlates[$i];
                    if($allPlates[$i]->active==0) $dualPlate[0] = null;

                } else {
                    // Si el plato no está activo lo guardaremos como null
                    if($allPlates[$i]->active==1) $dualPlate[1] = $allPlates[$i];
                    if($allPlates[$i]->active==0) $dualPlate[1] = null;
                    array_push($platos, $dualPlate);
                }
            }

            // Si uno de los platos tiene los dos platos desactivados se eliminará del array

            $deletePlateList = [];
            foreach($platos as $i => $plate) {
                if($plate[0] == null AND $plate[1] == null) {
                    array_push($deletePlateList, $i);
                }
            }

            foreach($deletePlateList as $deletePlate) {
               unset($platos[$deletePlate]);
            }

            $platos = array_values($platos);

            $lastPlatePosition += 2;

        } while (count($platos) < 8);

        $lastPlatePosition -= 2;
        $platos = array_values($platos);
        session(['lastPlateId' => $lastPlatePosition]);

        return view('web.platos.index', compact('platos'));
    }

    public function scroll(Request $request)
    {

        // Inicializamos variables
        $allPlatesQuery = Plato::get();
        $firstPlatePosition = $request->session()->get('lastPlateId') + 1;
        $lastPlatePosition = $firstPlatePosition + 15;

        $allPlates = array();
        $platos = array();

        do{

            if($lastPlatePosition > (count($allPlatesQuery) - 1)) {
                $finishReload = true;
                return view('web.platos.scroll', compact('platos', 'finishReload'));
            }

            $allPlates = [];
            $platos = [];

            // Guardamos los 16 platos que necesitamos en $allPlates
            for($i=$firstPlatePosition; $i<=$lastPlatePosition; $i++) {
                $allPlates[$i]=$allPlatesQuery[$i];
            }

            $allPlates = array_values($allPlates);

            // Guardamos los platos en pares en $plotes
            for($i=0; $i<count($allPlates); $i++) {
                if($i%2==0) {
                    $dualPlate = [];
                    // Si el plato no está activo lo guardaremos como null
                    if($allPlates[$i]->active==1) $dualPlate[0] = $allPlates[$i];
                    if($allPlates[$i]->active==0) $dualPlate[0] = null;

                } else {
                    // Si el plato no está activo lo guardaremos como null
                    if($allPlates[$i]->active==1) $dualPlate[1] = $allPlates[$i];
                    if($allPlates[$i]->active==0) $dualPlate[1] = null;
                    array_push($platos, $dualPlate);
                }
            }

            // Si uno de los platos tiene los dos platos desactivados se eliminará del array

            $deletePlateList = [];
            foreach($platos as $i => $plate) {
                if($plate[0] == null AND $plate[1] == null) {
                    array_push($deletePlateList, $i);
                }
            }

            foreach($deletePlateList as $deletePlate) {
               unset($platos[$deletePlate]);
            }

            $platos = array_values($platos);

            $lastPlatePosition += 2;

        } while (count($platos) < 8);

        $lastPlatePosition -= 2;
        $platos = array_values($platos);
        session(['lastPlateId' => $lastPlatePosition]);


        return view('web.platos.scroll', compact('platos'));
    }

    public function addToCart()
    {
    }
}
