<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ComoFuncionaController extends Controller
{
    function index(){
        return view('web.comofunciona.index');
    }
}
