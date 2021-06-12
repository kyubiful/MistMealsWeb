<?php

namespace App\Http\Controllers\Admin;

use App\Http\Helpers\Helper;
use App\Models\Menu;
use App\Models\MenuPeso;
use App\Models\Plato;
use App\Models\ProviderCategorySubcategory;
use App\Models\Sexo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProviderCategory;
use App\Models\ProviderSubcategory;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class MenuController extends Controller
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

        return view('admin.pages.menu.index');
    }

    public function data(Datatables $datatables)
    {
        $query = Menu::query();

        return $datatables->of($query)
            ->addColumn('action', 'admin.pages.menu.partials.actions')
            ->editColumn('nombre', function ($q) {
                return $q->nombre;
            })
            ->editColumn('sexo', function ($q) {
                return $q->sexo->nombre;
            })
            ->editColumn('menu_peso', function ($q) {
                return $q->menu_peso->valor;
            })
            ->rawColumns([0])
            ->make(true);
    }

    public function create()
    {
        $platos = Plato::all();
        $sexo = Sexo::all();
        $menu_peso = MenuPeso::all();

        return view('admin.pages.menu.create', compact('platos', 'sexo', 'menu_peso'));
    }

    public function htmlPlato()
    {
        $platos = Plato::all();

        $returnHTML = view('template.plato')->with('platos', $platos)->render();
        return response()->json(array('success' => true, 'html' => $returnHTML));
    }

    public function store(Request $request)
    {
        $menu = Menu::create($request->all());

        return redirect()->route('admin.menu');
    }

    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        $sexo = Sexo::all();
        $menu_peso = MenuPeso::all();

        return view('admin.pages.menu.edit', compact('menu', 'sexo', 'menu_peso'));
    }

    public function update(Request $request, $id)
    {
        $menu = Menu::findOrFail($id);
        $menu->update($request->all());

        return redirect()->route('admin.menu');
    }

    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);

        try {
            $menu->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            //
        }

        return redirect()->route('admin.menu');
    }
}
