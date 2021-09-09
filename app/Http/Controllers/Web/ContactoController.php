<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use App\Models\Contacto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactoController extends Controller
{
    //

    public function index(Request $request) {

        return view('web.contacto.index');
    }

    public function send(Request $request)
    {
        if((auth()->check())){
            $user = User::findOrFail(auth()->user()->id);
            $name = $user->name;
            $email = $user->email;
            $content = $request->descripcion;
        }else{
            $name = $request->nombre;
            $email = $request->email;
            $content = $request->descripcion;
        }

        $mail = [
            'nombre' => $name,
            'content' => $content,
        ];
        try{
            Mail::to('hola@mistmeals.com')->send(new ContactMail($mail));
            return redirect()->back()->with('message', 'El mensaje ha sido enviado correctamente');
        } catch(\Exception $e){
            return redirect()->back()->with('message', 'Error a la hora de enviar el mensaje')->with('error', 'true');
        }

    }
}
