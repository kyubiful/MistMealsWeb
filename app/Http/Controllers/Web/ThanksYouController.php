<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Web\HomeController;

class ThanksYouController extends Controller
{

    public function index(Request $request) {

        if( $request->session()->get('payed') != true ){

            return redirect('/');

        }

        session(['payed' => false]);
        return view('web.thanks.index');
    }
}
