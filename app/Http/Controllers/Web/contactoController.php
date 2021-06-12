<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Contacto;
use App\Models\User;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    //

    public function index(Request $request) {

        return view('web.contacto.index');
    }

    public function store(Request $request)
    {
        // Check exist with same email or user
        if (auth()->check() && !User::findOrFail(auth()->user()->id)->isAdmin()) {

            $request->merge([
                'mensaje_user_id' => auth()->user()->id,
                'email' => auth()->user()->email,
                'nombre' => auth()->user()->name,
            ]);

        }

        if (Contacto::where('email', $request->email)->exists()) {

            return response()->json(array(
                'status' => 500,
                'message' => 'Ya has enviado una sugerencia antes!'
            ));

        }

        $sugerencia = Contacto::create($request->all());

        return response()->json(array(
            'status' => 200,
            'message' => 'Mensaje enviado!'
        ));
    }
}
