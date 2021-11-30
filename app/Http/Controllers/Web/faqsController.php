<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class faqsController extends Controller
{
    function index(){
        return view('web.faqs.index');
    }
}
