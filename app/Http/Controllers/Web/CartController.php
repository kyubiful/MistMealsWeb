<?php

namespace App\Http\Controllers\Web;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DiscountCode;
use App\Services\CartService;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Cookie;

class CartController extends Controller
{
    public $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('web.carts.index')->with(['cart' => $this->cartService->getFromCookie()]);
    }

    public function verifyDiscountCode(Request $request)
    {

      if($request->discount_name == null) {
        return redirect()->back()->with('discountMessageError', 'Código no válido');
      }

        $discount = $request->discount_name;
        $discountCode = DB::table('discount_code')->select('name', 'value', 'tipo', 'start', 'end', 'active','unique','one_use','uses')->where('name', $discount)->first();
        $time = Carbon::now()->toDateTimeString();

        // Inicialización de las cookies a devolver
        $cookieDiscountValue = cookie('descuento', $discountCode->value, 60);
        $cookieDiscountName = cookie('descuento_name', $discountCode->name, 60);
        $cookieDiscountType = cookie('descuento_type', $discountCode->tipo, 60);

        // Si el usuario no se ha registrado no puede usar los códigos de un sólo uso por usuario
        if($request->user() == null) {
          if(!is_null($discountCode) AND $discountCode->unique == 1) {
            return redirect()->back()->with('discountMessageError', 'Este código no puede ser usado sin estar registrado');
          }
        }

        // Si el código el tiempo de uso del código ha terminado se enviará un mensaje al usuario
        if($discountCode==null OR ($discountCode->start > $time OR $discountCode->end < $time OR $discountCode->active == 0))
        {
          return redirect()->back()->with('discountMessageError', 'Código no válido');
        }

        // Lógica código de descuento un sólo uso por usuario
        if($discountCode->unique==1)
        {
          // Si el usuario ha iniciado sesión (los usuarios no pueden usar códigos de un sólo uso por usuario)
          if(auth()->check())
          {
            $user = auth()->user();
            // Comprobaremos si el usuario ha usado algún código anteriormente
            if(count($user->discountCodes)>0)
            {
              // Recorremos los códigos usados anteriormente, si coincide con el código ingresado se le envia un mensaje
              foreach($user->discountCodes as $userDiscountCode)
              {
                if($userDiscountCode->name == $discountCode->name)
                {
                  return redirect()->back()->with('discountMessageError', 'Código usado anteriormente');
                }
              }
              // Si no coincide se le devuelve las cookies con la información del código de descuento
              return redirect()->back()->withCookie($cookieDiscountValue)->withCookie($cookieDiscountName)->withCookie($cookieDiscountType)->with('discountMessageSuccess', 'Código correcto');

            }else{
              // Si el usuario no ha usado ningún código anteriormente se le devolverá las cookies con la información del código de descuento
              return redirect()->back()->withCookie($cookieDiscountValue)->withCookie($cookieDiscountName)->withCookie($cookieDiscountType)->with('discountMessageSuccess', 'Código correcto');
            }
          }else{
            // Si no está registrado se le enviará un mensaje
            return redirect()->back()->with('discountMessageError', 'Este código no puede ser usado sin estar registrado');
          }
        } else {
          // Si el código tiene usos ilimitados
          return redirect()->back()->withCookie($cookieDiscountValue)->withCookie($cookieDiscountName)->withCookie($cookieDiscountType)->with('discountMessageSuccess', 'Código correcto');
        }

        // Lógica código de descuento un uso
        if($discountCode->one_use==1)
        {
          // Si el código ha sido usado se le enviará un mensaje avisando de que el código ha sido usado
          if($discountCode->uses!=0)
          {
            return redirect()->back()->with('discountMessageError', 'Código usado anteriormente');
          }
          // Si el código no tiene un uso se le enviará un mensaje y se le enviarán las coookies con la información del código de descuento
          return redirect()->back()->withCookie($cookieDiscountValue)->withCookie($cookieDiscountName)->withCookie($cookieDiscountType)->with('discountMessageSuccess', 'Código correcto');
        }

        return redirect()->back()->with('discountMessageError','Error');
    }

    public function removeDiscountCookie()
    {
        return redirect()->back()->withoutCookie('descuento')->withoutCookie('descuento_name')->withoutCookie('descuento_type');
    }
}
