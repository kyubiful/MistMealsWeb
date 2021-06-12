<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Objetivo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    //

    public function index(Request $request) {
        $objetivo = Objetivo::all();

        return view('web.home.index', compact('objetivo'));
    }
}
