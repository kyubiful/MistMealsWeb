<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class MenuLandingController extends Controller
{
    public function firstLanding () {

        return view('web.landings.menus.first');

    }

    public function secondLanding () {

        return view('web.landings.menus.second');
        
    }

    public function thirdLanding () {

        return view('web.landings.menus.third');
        
    }

    public function fourthLanding () {

        return view('web.landings.menus.fourth');
        
    }

    public function fifthLanding () {

        return view('web.landings.menus.fifth');
        
    }
}
