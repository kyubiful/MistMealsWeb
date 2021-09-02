<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Helper;
use App\Mail\MenuMail;
use App\Mail\SignUpUserMail;
use App\Models\EstadoCivil;
use App\Models\EstadoLaboral;
use App\Models\NivelEjercicio;
use App\Models\Objetivo;
use App\Models\Profesion;
use App\Models\Role;
use App\Models\Sexo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    //


    public function loginForm(Request $request)
    {
        $sexo = Sexo::all();
        $profesion = Profesion::all();
        $ejercicio = NivelEjercicio::all();
        $objetivo = Objetivo::all();
        $estadocivil = EstadoCivil::all();
        $estadolaboral = EstadoLaboral::all();

        return view('web.user.login', compact('sexo', 'ejercicio', 'objetivo', 'estadocivil', 'estadolaboral', 'profesion'));
    }

    public function signup(Request $request)
    {
        $sexo = Sexo::all();
        $profesion = Profesion::all();
        $ejercicio = NivelEjercicio::all();
        $objetivo = Objetivo::all();
        $estadocivil = EstadoCivil::all();
        $estadolaboral = EstadoLaboral::all();
        $bodyclass = "signupform";

        return view('web.user.signup', compact('sexo', 'ejercicio', 'objetivo', 'estadocivil', 'estadolaboral', 'profesion', 'bodyclass'));
    }

    public function signupStore(Request $request)
    {
        // Check
        if (User::where('email', $request->email)->exists()) {
            return response()->json(array(
                'status' => 500,
                'message' => 'El email ya existe en el sistema!'
            ));
        }

        // Login
        $credentials = $request->only('email', 'password');

        // Registro
        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ];

        $request->merge([
            'password' => bcrypt($request->password),
            'role_id' => 2,
            'username' => $request->email,
        ]);

        $user = User::create($request->all());

        // Login
        Auth::attempt($credentials);

        // Send mail

        try {
            Mail::to($request->email)->send(new SignUpUserMail($details));
        } catch (\Exception $e) {
            return response()->json(array(
                'status' => 500,
                'message' => $e->getMessage()
            ));
        }

        return response()->json(array(
            'status' => 200,
            'message' => '',
            'link' => route('web.home')
        ));
    }

    public function profile(Request $request)
    {

        if (!(auth()->check())) {
            return redirect()->route('web.home');
        }

        $sexo = Sexo::all();
        $profesion = Profesion::all();
        $ejercicio = NivelEjercicio::all();
        $objetivo = Objetivo::all();
        $estadocivil = EstadoCivil::all();
        $estadolaboral = EstadoLaboral::all();

        $user = User::findOrFail(auth()->user()->id);

        return view('web.user.profile', compact('sexo', 'ejercicio', 'objetivo', 'estadocivil', 'estadolaboral', 'user', 'profesion'));
    }

    public function profileEdit(Request $request)
    {
        if (!(auth()->check())) {
            return redirect()->route('web.home');
        }

        $user = User::findOrFail(auth()->user()->id);

        // Update
        if ($request->password) {
            $request->merge([
                'password' => bcrypt($request->password)
            ]);
        } else {
            $request->merge([
                'password' => $user->password
            ]);
        }

        $user->update($request->all());

        return response()->json(array(
            'status' => 200,
            'message' => 'Datos guardados correctamente!',
        ));
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            $user = User::findOrFail(auth()->user()->id);
        } else {
            return response()->json(array(
                'status' => 500,
                'message' => 'Datos incorrectos!'
            ));
        }

        return response()->json(array(
            'status' => 200,
            'message' => '',
            'link' => route('web.home')
        ));
    }

    public function logout(Request $request)
    {
        Auth::logout();

        return redirect()->route('web.home');
    }
}
