<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DiscountCode;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;



class DiscountController extends Controller
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

    return view('admin.pages.discounts.index');
  }

  public function data(DataTables $datatables)
  {
    $query = DiscountCode::query();

    return $datatables->of($query)
      ->addColumn('action', 'admin.pages.discounts.partials.actions')
      ->editColumn('id', function ($q) {
        return $q->id;
      })
      ->editColumn('nombre', function ($q) {
        return $q->name;
      })
      ->editColumn('tipo', function ($q) {
        return $q->tipo;
      })
      ->editColumn('cantidad', function ($q) {
        return $q->value;
      })
      ->editColumn('inicio', function ($q) {
        return $q->start;
      })
      ->editColumn('fin', function ($q) {
        return $q->end;
      })
      ->editColumn('usos', function ($q) {
        return $q->uses;
      })
      ->editColumn('único', function ($q) {
        return $q->unique;
      })
      ->editColumn('activo', function ($q) {
        return $q->active;
      })
      ->rawColumns([0])
      ->make(true);
  }

  public function create()
  {
    $descuentos = DiscountCode::all();

    return view('admin.pages.discounts.create', compact('descuentos'));
  }

  public function store(Request $request)
  {
    if ($request->unique == 'on') {
      $unique = 1;
    } else {
      $unique = 0;
    }

    if ($request->active == 'on') {
      $active = 1;
    } else {
      $active = 0;
    }

    DiscountCode::create([
      'name' => $request->name,
      'tipo' => $request->tipo,
      'value' => $request->value,
      'start' => $request->start,
      'end' => $request->end,
      'unique' => $unique,
      'active' => $active
    ]);

    return redirect()->route('admin.discount');
  }

  public function edit($id)
  {
    $codigoDescuento = DiscountCode::findOrFail($id);

    return view('admin.pages.discounts.edit', compact('codigoDescuento'));
  }

  public function update(Request $request, $id)
  {
    $codigoDescuento = DiscountCode::findOrFail($id);

    if ($request->unique == 'on') {
      $unique = 1;
    } else {
      $unique = 0;
    }

    if ($request->active == 'on') {
      $active = 1;
    } else {
      $active = 0;
    }

    $codigoDescuento->update([
      'name' => $request->name,
      'tipo' => $request->tipo,
      'value' => $request->value,
      'start' => $request->start,
      'end' => $request->end,
      'unique' => $unique,
      'active' => $active
    ]);

    return redirect()->route('admin.discount');
  }

  public function destroy($id)
  {
    $codigoDescuento = DiscountCode::findOrFail($id);

    try {
      $codigoDescuento->delete();
    } catch (\Illuminate\Database\QueryException $e) {
      dd($e);
    }

    return redirect()->route('admin.discount');
  }
}
