<?php

namespace App\Http\Controllers\Admin;

use App\Models\Configuracion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ConfiguracionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (!auth()->check() || (auth()->check() && !User::findOrFail(auth()->user()->id)->isAdmin())) {
            Auth::logout();
            return redirect('/admin/login');
        }

        $config = Configuracion::all();

        return view('admin.pages.configuracion.index', compact('config'));
    }

    public function update(Request $request)
    {
        foreach ($request->valor as $i => $el) {

            $config = Configuracion::findOrFail($i+1);
            $config->update([
                'valor' => $el
            ]);

        }

        return redirect()->route('admin.config');
    }

}
