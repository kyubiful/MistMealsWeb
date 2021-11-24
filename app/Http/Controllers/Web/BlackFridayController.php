<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use App\Models\Objetivo;
use App\Models\Plato;

class BlackFridayController extends Controller
{
    function index(){
        $objetivo = Objetivo::all();
        return view('web.blackfriday.index', compact('objetivo'));
    }

    function index2(){
        $platos = Plato::all();
        return view('web.blackfriday.index2', compact('platos'));
    }
}
