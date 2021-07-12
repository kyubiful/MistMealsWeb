<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CondicionesController extends Controller
{
    //

    public function avisolegal(Request $request) {
        return view('web.conditions.legal');
    }

    public function privacidad(Request $request) {
        return view('web.conditions.privacidad');
    }

    public function cookies(Request $request) {
        return view('web.conditions.cookies');
    }
}
