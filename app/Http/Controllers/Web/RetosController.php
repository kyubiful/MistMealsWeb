<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RetosController extends Controller
{
    function landing(){
        return view('web.retos.landing');
    }


}
