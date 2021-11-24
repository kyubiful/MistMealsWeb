<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use App\Models\Objetivo;
use App\Models\Plato;

class BlackFridayController extends Controller
{
    function index(){
        $platos = Plato::all();
        $objetivo = Objetivo::all();
        return view('web.blackfriday.index', compact('objetivo', 'platos'));
    }
}
