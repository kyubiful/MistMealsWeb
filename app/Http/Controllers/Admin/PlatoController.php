<?php

namespace App\Http\Controllers\Admin;

use App\Http\Helpers\Helper;
use App\Models\Alergeno;
use App\Models\BaseProteina;
use App\Models\Etiqueta;
use App\Models\Menu;
use App\Models\MenuPeso;
use App\Models\Plato;
use App\Models\PlatoCodigo;
use App\Models\PlatoInfoNutricional;
use App\Models\PlatoPeso;
use App\Models\ProviderCategorySubcategory;
use App\Models\Sexo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProviderCategory;
use App\Models\ProviderSubcategory;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class PlatoController extends Controller
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

    return view('admin.pages.plato.index');
  }

  public function data(Datatables $datatables)
  {
    $query = Plato::query();

    return $datatables->of($query)
      ->addColumn('action', 'admin.pages.plato.partials.actions')
      ->editColumn('id', function ($q) {
        return $q->id;
      })
      ->editColumn('codigo', function ($q) {
        return $q->plato_codigo->codigo;
      })
      ->editColumn('peso', function ($q) {
        return $q->plato_peso->valor;
      })
      ->editColumn('calorias', function ($q) {
        return round($q->calorias, 1);
      })
      ->editColumn('proteinas', function ($q) {
        return $q->plato_info_nutricional->proteinas;
      })
      ->editColumn('hidratos', function ($q) {
        return $q->plato_info_nutricional->carbohidratos;
      })
      ->editColumn('grasas', function ($q) {
        return $q->plato_info_nutricional->grasas;
      })
      ->rawColumns([0])
      ->make(true);
  }

  public function create()
  {
    $platos_codigos = PlatoCodigo::all();
    $bases_proteina = BaseProteina::all();
    $platos_pesos = PlatoPeso::all();
    $alergenos = Alergeno::all();
    $etiquetas = Etiqueta::all();

    return view('admin.pages.plato.create', compact('platos_codigos', 'bases_proteina', 'platos_pesos', 'alergenos', 'etiquetas'));
  }

  public function store(Request $request)
  {
    $platos = Plato::where('plato_codigo_id', $request->plato_codigo_id);
    $platosCodeCount = $platos->count() ? $platos->count() + 1 : 0;

    $request->merge([
      'imagen_1' => '',
      'imagen_2' => ''
    ]);

    // string codigo plato compuesto

    $cod_plato = PlatoCodigo::find($request->plato_codigo_id)->codigo;
    $cod_plato_comp = $request->codigo . '-' . $cod_plato;
    if(Plato::orWhere('codigo', 'like', $cod_plato_comp . '%')->first() != null){
      $find_last_cod = Plato::orWhere('codigo', 'like', $cod_plato_comp . '%')->orderBy('codigo', 'desc')->first()->codigo;
      $number = explode('-', $find_last_cod)[2];
      $number++;
    } else {
      $number = 1;
    }

    if ($number >= 100) {
      $cod_plato_comp = $cod_plato_comp . '-' . $number;
    } else if ($number < 100 && $number >= 10) {
      $cod_plato_comp = $cod_plato_comp . '-0' . $number;
    } else if ($number < 10) {
      $cod_plato_comp = $cod_plato_comp . '-00' . $number;
    }

    // fin string codigo plato compuesto

    $plato = Plato::create([
      'codigo' => $cod_plato_comp,
      'nombre' => $request->nombre,
      'ingredientes' => $request->ingredientes,
      'receta'=> $request->receta,
      'calorias' => $request->calorias,
      'precio' => $request->precio,
      'plato_codigo_id' => $request->plato_codigo_id,
      'base_proteina_id' => $request->base_proteina_id,
      'plato_peso_id' => $request->plato_peso_id,
      'imagen_1' => $request->imagen_1,
      'imagen_2' => $request->imagen_2,
    ]);

    $plato->plato_alergeno()->sync($request->alergenos);
    $plato->plato_etiqueta()->sync($request->etiquetas);

    $plato_info_nutri = PlatoInfoNutricional::updateOrCreate(
      ['plato_id' => $plato->id],
      [
        'energia' => $request->energia,
        'calorias' => $request->info_nutri_calorias,
        'proteinas' => $request->proteinas,
        'grasas' => $request->grasas,
        'saturadas' => $request->saturadas,
        'carbohidratos' => $request->carbohidratos,
        'azucar' => $request->azucar,
        'fibra' => $request->fibra,
        'sodio' => $request->sodio,
      ]
    );

    // Photo
    if ($request->hasFile('photo1')) {
      // Name
      $filename = str_slug($plato->id) . '_1_' . str_slug($plato->nombre) . '.' . $request->photo1->getClientOriginalExtension();

      // Upload
      $image = Helper::saveImage($request->photo1, $plato->getFolder(), $filename);

      // Update photo name
      $plato->update([
        'imagen_1' => $filename
      ]);
    }

    if ($request->hasFile('photo2')) {
      // Name
      $filename = str_slug($plato->id) . '_2_' . str_slug($plato->nombre) . '.' . $request->photo2->getClientOriginalExtension();

      // Upload
      $image = Helper::saveImage($request->photo2, $plato->getFolder(), $filename);

      // Update photo name
      $plato->update([
        'imagen_2' => $filename
      ]);
    }

    return redirect()->route('admin.plato');
  }

  public function edit($id)
  {
    $plato = Plato::findOrFail($id);
    $platos_codigos = PlatoCodigo::all();
    $bases_proteina = BaseProteina::all();
    $platos_pesos = PlatoPeso::all();
    $alergenos = Alergeno::all();
    $etiquetas = Etiqueta::all();

    $cod = explode('-', $plato->codigo)[0];

    return view('admin.pages.plato.edit', compact('plato', 'platos_codigos', 'bases_proteina', 'platos_pesos', 'alergenos', 'etiquetas'))->with(['cod' => $cod]);
  }

  public function update(Request $request, $id)
  {
    $plato = Plato::findOrFail($id);

    // string codigo plato compuesto

    $cod_plato = PlatoCodigo::find($request->plato_codigo_id)->codigo;
    $cod_plato_comp = $request->codigo . '-' . $cod_plato;
    // dd(Plato::orWhere('codigo', 'like', $cod_plato_comp . '%')->first());

    if(Plato::orWhere('codigo', 'like', $cod_plato_comp . '%')->first() != null){
      $find_last_cod = Plato::orWhere('codigo', 'like', $cod_plato_comp . '%')->orderBy('codigo', 'desc')->first()->codigo;
      $number = explode('-', $find_last_cod)[2];
      $number++;
    } else {
      $number = 1;
    }
    

    if ($number >= 100) {
      $cod_plato_comp = $cod_plato_comp . '-' . $number;
    } else if ($number < 100 && $number >= 10) {
      $cod_plato_comp = $cod_plato_comp . '-0' . $number;
    } else if ($number < 10) {
      $cod_plato_comp = $cod_plato_comp . '-00' . $number;
    }

    // fin string codigo plato compuesto

    $plato->update([
      'codigo' => $cod_plato_comp,
      'nombre' => $request->nombre,
      'ingredientes' => $request->ingredientes,
      'receta' => $request->receta,
      'calorias' => $request->calorias,
      'precio' => $request->precio,
      'plato_codigo_id' => $request->plato_codigo_id,
      'base_proteina_id' => $request->base_proteina_id,
      'plato_peso_id' => $request->plato_peso_id,
      'imagen_1' => $request->imagen_1 == null ? $plato->imagen_1 : $request->imgen_1,
      'imagen_2' => $request->imagen_2 == null ? $plato->imagen_2 : $request->imgen_2,
    ]);

    $plato->plato_alergeno()->sync($request->alergenos);
    $plato->plato_etiqueta()->sync($request->etiquetas);

    $plato_info_nutri = PlatoInfoNutricional::updateOrCreate(
      ['plato_id' => $id],
      [
        'energia' => $request->energia,
        'calorias' => $request->info_nutri_calorias,
        'proteinas' => $request->proteinas,
        'grasas' => $request->grasas,
        'saturadas' => $request->saturadas,
        'carbohidratos' => $request->carbohidratos,
        'azucar' => $request->azucar,
        'fibra' => $request->fibra,
        'sodio' => $request->sodio,
      ]
    );

    // Photo
    if ($request->hasFile('photo1')) {
      // Name
      $filename = str_slug($plato->id) . '_1_' . str_slug($plato->nombre) . '.' . $request->photo1->getClientOriginalExtension();

      // Upload
      deleteResource($plato->getFolder() . $plato->image1);
      $image = Helper::saveImage($request->photo1, $plato->getFolder(), $filename);

      // Update photo name
      $plato->update([
        'imagen_1' => $filename
      ]);
    }

    if ($request->hasFile('photo2')) {
      // Name
      $filename = str_slug($plato->id) . '_2_' . str_slug($plato->nombre) . '.' . $request->photo2->getClientOriginalExtension();

      // Upload
      deleteResource($plato->getFolder() . $plato->image2);
      $image = Helper::saveImage($request->photo2, $plato->getFolder(), $filename);

      // Update photo name
      $plato->update([
        'imagen_2' => $filename
      ]);
    }

    return redirect()->route('admin.plato');
  }

  public function destroy($id)
  {
    $plato = Plato::findOrFail($id);

    try {
      // Delete photo
      deleteDirectory($plato->getFolder());

      $plato->plato_alergeno()->detach();
      $plato->plato_etiqueta()->detach();
      $plato->plato_info_nutricional()->delete();
      $plato->delete();
    } catch (\Illuminate\Database\QueryException $e) {
      dd($e);
    }

    return redirect()->route('admin.plato');
  }
}
