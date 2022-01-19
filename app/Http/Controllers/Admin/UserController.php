<?php

namespace App\Http\Controllers\Admin;

use App\Models\EstadoCivil;
use App\Models\EstadoLaboral;
use App\Models\NivelEjercicio;
use App\Models\Objetivo;
use App\Models\Profesion;
use App\Models\Sexo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class UserController extends Controller
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

        return view('admin.pages.user.index');
    }

    public function data(Datatables $datatables)
    {
        $query = User::all();

        return $datatables->of($query)
            ->addColumn('action', 'admin.pages.user.partials.actions')
            ->editColumn('sexo', function ($q) {
                return $q->sexo != null ? $q->sexo->nombre : '';
            })
            ->rawColumns([0])
            ->make(true);
    }

    public function create()
    {
        $sexo = Sexo::all();
        $profesion = Profesion::all();
        $ejercicio = NivelEjercicio::all();
        $objetivo = Objetivo::all();
        $estadocivil = EstadoCivil::all();
        $estadolaboral = EstadoLaboral::all();

        return view('admin.pages.user.create', compact('sexo', 'ejercicio', 'objetivo', 'estadocivil', 'estadolaboral', 'profesion'));
    }

    public function store(Request $request)
    {
        // Check
        if (User::where('email', $request->email)->exists()) {
            return response()->json(array(
                'status' => 500,
                'message' => 'El email ya existe en el sistema!'
            ));
        }

        // Registro
        $request->merge([
            'password' => bcrypt($request->password),
            'role_id' => 2,
            'username' => $request->email,
        ]);

        $user = User::create($request->all());

        return redirect()->route('admin.user');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        $sexo = Sexo::all();
        $profesion = Profesion::all();
        $ejercicio = NivelEjercicio::all();
        $objetivo = Objetivo::all();
        $estadocivil = EstadoCivil::all();
        $estadolaboral = EstadoLaboral::all();

        return view('admin.pages.user.edit', compact('user', 'sexo', 'ejercicio', 'objetivo', 'estadocivil', 'estadolaboral', 'profesion'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

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

        return redirect()->route('admin.user');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        try {
            $user->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            dd($e);
        }

        return redirect()->route('admin.user');
    }
}
