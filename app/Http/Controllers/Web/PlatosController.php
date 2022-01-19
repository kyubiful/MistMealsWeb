<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Plato;

class PlatosController extends Controller
{
    public function index(Request $request)
    {
        $platos = Plato::where( 'active', true )->paginate(16);
        return view('web.platos.index', compact('platos'));
    }

    public function scroll()
    {
        $platos = Plato::where( 'active', true )->paginate(16);
        return view('web.platos.scroll', compact('platos'));
    }

    public function addToCart()
    {
    }
}
