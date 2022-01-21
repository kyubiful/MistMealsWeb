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
        $paginate = 16;

        do {

            $platos = array();
            $allPlatos = Plato::paginate($paginate);

            for($i=0; $i < count($allPlatos); $i++) {

                if($i%2==0) {

                    $subPlatos = [];

                    if($allPlatos[$i]->active == 1) {
                        $subPlatos[0] = $allPlatos[$i];
                    } else {
                        $subPlatos[0] = null;
                    }

                }

                if($i%2==1) {
                    if($allPlatos[$i]->active == 1) {
                        $subPlatos[1] = $allPlatos[$i];
                    } else {
                        $subPlatos[1] = null;
                    }
                    array_push($platos, $subPlatos);
                }

            }

            for($i=0; $i < count($platos); $i++) {
                if($platos[$i][0] == null AND $platos[$i][1] == null) {
                    unset($platos[$i]);
                }
            }
            $paginate = $paginate + 2;

        } while(count($platos)<8);


        $platos = array_values($platos);

        $lastPlateId = $platos[7][1]->id == null ? $platos[7][0]->id : $platos[7][1]->id;
        session(['lastPlateId' => $lastPlateId]);

        return view('web.platos.index', compact('platos'));
    }

    public function scroll(Request $request)
    {
        // $platos = Plato::where( 'active', true )->paginate(16);

        $numPlatos = 15;
        $id = (int)$request->session()->get('lastPlateId') + 1;
        $platos = array();

        do {

            $endId = $id+$numPlatos;
            $platos = [];
            $allPlatos = Plato::whereBetween('id', [$id, $endId])->get();

            if(count($allPlatos)<16) {

                for($i=0; $i < count($allPlatos); $i++) {

                    if($i%2==0) {

                        $subPlatos = [];

                        if($allPlatos[$i]->active == 1) {
                            $subPlatos[0] = $allPlatos[$i];
                        } else {
                            $subPlatos[0] = null;
                        }

                    }

                    if($i%2==1) {
                        if($allPlatos[$i]->active == 1) {
                            $subPlatos[1] = $allPlatos[$i];
                        } else {
                            $subPlatos[1] = null;
                        }
                        array_push($platos, $subPlatos);
                    }

                }

                for($i=0; $i < count($platos); $i++) {
                    if($platos[$i][0] == null AND $platos[$i][1] == null) {
                        unset($platos[$i]);
                    }
                }

                $finishReload = true;

                return view('web.platos.scroll', compact('platos', 'finishReload'));
            }

            for($i=0; $i < count($allPlatos); $i++) {

                if($i%2==0) {

                    $subPlatos = [];

                    if($allPlatos[$i]->active == 1) {
                        $subPlatos[0] = $allPlatos[$i];
                    } else {
                        $subPlatos[0] = null;
                    }

                }

                if($i%2==1) {
                    if($allPlatos[$i]->active == 1) {
                        $subPlatos[1] = $allPlatos[$i];
                    } else {
                        $subPlatos[1] = null;
                    }
                    array_push($platos, $subPlatos);
                }

            }

            for($i=0; $i < count($platos); $i++) {
                if($platos[$i][0] == null AND $platos[$i][1] == null) {
                    unset($platos[$i]);
                }
            }

            $numPlatos = $numPlatos + 2;

        } while(count($platos)<8);


        $platos = array_values($platos);

        $lastPlateId = $platos[7][1]->id == null ? $platos[7][0]->id : $platos[7][1]->id;
        session(['lastPlateId' => $lastPlateId]);

        return view('web.platos.scroll', compact('platos'));
    }

    public function addToCart()
    {
    }
}
