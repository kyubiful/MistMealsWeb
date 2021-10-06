<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Helper;
use App\Mail\MenuMail;
use App\Models\NivelEjercicio;
use App\Models\Objetivo;
use App\Models\Plato;
use App\Models\Sexo;
use App\Models\User;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use App\Services\CartService;

class MenuController extends Controller
{
    public $cartService;
    //
    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function index(Request $request)
    {
        // if (auth()->check() && !User::findOrFail(auth()->user()->id)->isAdmin()) {
        //     $user = User::findOrFail(auth()->user()->id);

        //     return redirect()->route('web.menu.step1', ['id' => $user->objetivo_id]);
        // }

        $objetivo = Objetivo::all();

        return view('web.menu.index', compact('objetivo'));
    }

    public function step1(Request $request, $id)
    {
        $user = null;

        if (auth()->check()) {
            $user = User::findOrFail(auth()->user()->id);
        }

        $objetivo = Objetivo::findOrFail($id);
        $ejercicio = NivelEjercicio::all();
        $sexo = Sexo::all();

        $bodyclass = "menu-step1";

        return view('web.menu.step1', compact('objetivo', 'ejercicio', 'sexo', 'user', 'bodyclass'));
    }

    public function step1Store(Request $request, $id)
    {
        if (auth()->check()) {
            $user = User::findOrFail(auth()->user()->id);
        } else {
            $user = User::create([
                'name' => $request->name,
                'email' => Str::random(10),
                'password' => bcrypt('test123'),
                'role_id' => 2,
                'sexo_id' => $request->sexo,
                'username' => '',
            ]);
        }

        $tmb = Helper::calculateTmb($request->peso, $request->altura, $request->edad, $request->sexo);
        $caloriasConsumidas = Helper::calculateCaloriesConsumed($request->peso, $request->altura, $request->edad, $request->sexo, $request->nivel_ejercicio);
        $caloriasPropuestas = Helper::calculateCaloriesProposed($request->peso, $request->altura, $request->edad, $request->sexo, $request->nivel_ejercicio, $id);

        $user->update([
            'peso' => $request->peso,
            'altura' => $request->altura,
            'edad' => $request->edad,
            'tmb' => $tmb,
            'calorias_consumidas' => $caloriasConsumidas,
            'calorias_propuestas' => $caloriasPropuestas,
            'sexo_id' => $request->sexo,
            'nivel_ejercicio_id' => $request->nivel_ejercicio,
            'objetivo_id' => $id
        ]);

        $request->session()->forget(['lunch', 'dinner', 'userid']);
        session(['userid' => $user->id]);

        return response()->json(array(
            'status' => 200,
            'message' => '',
            'link' => route('web.menu.step2')
        ));
    }

    public function step2(Request $request)
    {
        $userId = session('userid');
        $user = User::findOrFail($userId);
        $lunch = session('lunch');
        $dinner = session('dinner');

        if ($lunch == null && $dinner == null) {

            $dishes = Helper::calculateDishes($user->calorias_propuestas);

            $lunch =  $dishes[0];
            $dinner = $dishes[1];

            session(['lunch' => $lunch]);
            session(['dinner' => $dinner]);
        }

        $semana = ['Día 1', 'Día 2', 'Día 3', 'Día 4', 'Día 5', 'Día 6', 'Día 7'];

        $bodyclass = "menu-step2";

        return view('web.menu.step2', compact('user', 'lunch', 'dinner', 'semana', 'bodyclass'));
    }

    public function addToCart(Request $request)
    {
        $menu = $request->id;
        $cart = $this->cartService->getFromCookieOrCreate();

        for ($i = 0; $i < count($menu); $i++) {
            $quantity = $cart->products()->find($menu[$i])->pivot->quantity ?? 0;

            $cart->products()->syncWithoutDetaching([
                $menu[$i] => ['quantity' => $quantity + 1],
            ]);
        }

        $cookie = $this->cartService->makeCookie($cart);
        return redirect('carts')->cookie($cookie);
    }

    public function pdfMenu(Request $request)
    {
        $userId = session('userid');
        $user = User::findOrFail($userId);

        if (!$user->name && !str_contains($user->email, '@')) {

            if (!User::where('email', $request->email)->exists()) {
                $user->update([
                    'name' => "Name",
                    'email' => $request->email
                ]);
            } else {
                $user->update([
                    'name' => "Name"
                ]);
            }
        }

        $lunch = session('lunch');
        $dinner = session('dinner');

        if ($lunch == null && $dinner == null) {
            return view('errors.500');
        }

        $semana = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'];

        //$pdf = PDF::loadView('pdf.menu', $data);

        $data = [
            'user' => $user,
            'lunch' => $lunch,
            'dinner' => $dinner,
            'semana' => $semana
        ];

        // dd($lunch);
        // dd($lunch[3]->getUrlImagePdfAttribute());

        return PDF::loadView('pdf.menu', $data)->setPaper('a4', 'landscape')->stream('mist-meals-menu.pdf');
        //return PDF::loadView('pdf.menu', $data)->setPaper('a4', 'landscape')->setWarnings(false)->save('mist-meals-menu.pdf');

        //return view('pdf.menu', compact('user', 'lunch', 'dinner', 'semana'));

        // descargar
    }

    public function sendMailMenu(Request $request)
    {

        $userId = session('userid');
        $user = User::findOrFail($userId);

        if (!$user->name && !str_contains($user->email, '@')) {

            if (!User::where('email', $request->email)->exists()) {
                $user->update([
                    'name' => "Name",
                    'email' => $request->email
                ]);
            } else {
                $user->update([
                    'name' => "Name"
                ]);
            }
        }

        $lunch = session('lunch');
        $dinner = session('dinner');

        if ($lunch == null && $dinner == null) {
            return view('errors.500');
        }

        $semana = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'];

        //$pdf = PDF::loadView('pdf.menu', $data);

        $data = [
            'user' => $user,
            'lunch' => $lunch,
            'dinner' => $dinner,
            'semana' => $semana
        ];

        try {
            Mail::to($request->email)->send(new MenuMail($data));
        } catch (\Exception $e) {
            $t = response()->json(array(
                'status' => 500,
                'message' => 'Error!'
            ));
        }

        $t = response()->json(array(
            'status' => 200,
            'message' => 'Enviado!',
        ));

        return PDF::loadView('pdf.menu', $data)->setPaper('a4', 'landscape')->stream('mist-meals-menu.pdf');
    }
}
