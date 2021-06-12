<?php

namespace App\Http\Controllers\Admin;

use App\Mail\MenuMail;
use App\Mail\SugerenciaMail;
use App\Models\Sugerencia;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;

class SugerenciaController extends Controller
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

        return view('admin.pages.sugerencia.index');
    }

    public function data(Datatables $datatables)
    {
        $query = Sugerencia::all();

        return $datatables->of($query)
            ->addColumn('action', 'admin.pages.sugerencia.partials.actions')
             ->editColumn('revisado', function ($q) {
                $html = $q->revisado ? '<button type="button" class="btn btn-success btn-icon" data-toggle="tooltip" data-placement="top" title="Revisado!"><i data-feather="eye"></i></button>' : '<button type="button" class="btn btn-danger btn-icon" data-toggle="tooltip" data-placement="top" title="Pendiente!"><i data-feather="eye-off"></i></button>';
                return $html;
            })
            ->editColumn('descripcion', function ($q) {
                return Str::limit($q->descripcion, 120);
            })
            ->rawColumns([0])
            ->make(true);
    }

    public function edit($id)
    {
        $sugerencia = Sugerencia::findOrFail($id);

        return view('admin.pages.sugerencia.edit', compact('sugerencia'));
    }

    public function update(Request $request, $id)
    {
        $request->merge([
            'respuesta_user_id' => auth()->user()->id,
            'revisado' => 1,
        ]);

        $sugerencia = Sugerencia::findOrFail($id);
        $sugerencia->update($request->all());

        // Send email
        $details = [
            'title' => 'Mist Meals - Sugerencia',
            'name' => $sugerencia->nombre,
            'message' => $request->respuesta,
        ];

        try {
            Mail::to($sugerencia->email)->send(new SugerenciaMail($details));
        } catch (\Exception $e) {
            return response()->json(array(
                'status' => 500,
                'message' => 'Error!'
            ));
        }

        return redirect()->route('admin.sugerencia');
    }

    public function destroy($id)
    {
        $sugerencia = Sugerencia::findOrFail($id);

        try {
            $sugerencia->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            //
        }

        return redirect()->route('admin.sugerencia');
    }
}
