<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class comoFuncionaController extends Controller
{
    function index(){
        return view('web.comofunciona.index');
    }
}