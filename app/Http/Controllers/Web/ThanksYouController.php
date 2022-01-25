<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Web\HomeController;

class ThanksYouController extends Controller
{

    public function index() {
        return view('web.thanks.index');
    }
}
