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
        $discount = $request->discount_name;
        $discountCode = DB::table('discount_code')->select('name', 'value', 'tipo', 'start', 'end', 'active','unique')->where('name', $discount)->first();
        $time = Carbon::now()->toDateTimeString();

        if($request->user() == null) {

          if(!is_null($discountCode) AND $discountCode->unique == 1) {
            return redirect()->back()->with('discountMessageError', 'Este código no puede ser usado sin estar registrado');
          }

        }


        if($discountCode==null OR ($discountCode->start > $time OR $discountCode->end < $time OR $discountCode->active == 0))
        {
          return redirect()->back()->with('discountMessageError', 'Código no válido');
        }

        $cookieDiscountValue = cookie('descuento', $discountCode->value, 60);
        $cookieDiscountName = cookie('descuento_name', $discountCode->name, 60);
        $cookieDiscountType = cookie('descuento_type', $discountCode->tipo, 60);

        if($discountCode->unique==1)
        {
          if(auth()->check())
          {
            $user = auth()->user();
            if(count($user->discountCodes)>0)
            {
              foreach($user->discountCodes as $userDiscountCode)
              {
                if($userDiscountCode->name == $discountCode->name)
                {
                  return redirect()->back()->with('discountMessageError', 'Código usado anteriormente');
                }
              }
              return redirect()->back()->withCookie($cookieDiscountValue)->withCookie($cookieDiscountName)->withCookie($cookieDiscountType)->with('discountMessageSuccess', 'Código correcto');

            }else{
              return redirect()->back()->withCookie($cookieDiscountValue)->withCookie($cookieDiscountName)->withCookie($cookieDiscountType)->with('discountMessageSuccess', 'Código correcto');
            }
          }else{
            return redirect()->back()->withCookie($cookieDiscountValue)->withCookie($cookieDiscountName)->withCookie($cookieDiscountType)->with('discountMessageSuccess', 'Código correcto');
          }
        }else{
          return redirect()->back()->withCookie($cookieDiscountValue)->withCookie($cookieDiscountName)->withCookie($cookieDiscountType)->with('discountMessageSuccess', 'Código correcto');
        }

        // for($i=0; $i<count($availableDiscounts); $i++)
        // {
        //     if($discount == $availableDiscounts[$i]->name AND $availableDiscounts[$i]->start < $time AND $availableDiscounts[$i]->end > $time AND $availableDiscounts[$i]->active == 1){
        //         $cookie = cookie('descuento', $availableDiscounts[$i]->value, 60);
        //         return redirect()->back()->withCookie($cookie)->with('discountMessageSuccess', 'Código correcto');
        //     }
        // }
        // return redirect()->back()->with('discountMessageError', 'Código no válido');
    }

    public function removeDiscountCookie()
    {
        return redirect()->back()->withoutCookie('descuento')->withoutCookie('descuento_name')->withoutCookie('descuento_type');
    }
}
