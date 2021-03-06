<?php

namespace App\Http\Controllers\Web;

use App\Models\Order;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\CartService;
use App\Models\AvailableCP;
use Illuminate\Support\Facades\DB;

class OrderPaymentController extends Controller
{

  public $cartService;

  public function __construct(CartService $cartService)
  {
    $this->cartService = $cartService;
  }
  /**
   * Show the form for creating a new resource.
   *
   * @param  \App\Models\Order  $order
   * @return \Illuminate\Http\Response
   */
  public function create(Order $order, Request $request)
  {
    $descuentoName = $request->cookie('descuento_name');
    $discountCode = DB::table('discount_code')->select('name', 'value', 'start', 'end', 'active', 'unique', 'tipo','one_use','uses','free_shipping','need_loged')->where('name', $descuentoName)->first();
    $cart = $this->cartService->getFromCookie();
    $amount = $cart->total;
    $numberProducts = $this->cartService->countProducts();

    if($request->user() == null) {
      $user = User::findOrFail(session('userid'));
      if(!is_null($discountCode) AND $discountCode->unique == 1){
        return redirect('/carts')->with('discountMessageError', 'Este código no puede ser usado sin estar registrado');
      }
      $register = false;
    } else {
      $user = $request->user();
      $register = true;
    }

    $availableCP = AvailableCP::select('cp')->where('cp', $user->cp)->first();

    $freeShipping = 0;

    if($discountCode != null) {
      if($discountCode->need_loged == 1 AND $request->user() == null) {
          return redirect('/carts')->with('discountMessageError', 'Este código no puede ser usado sin estar registrado')->withoutCookie('descuento')->withoutCookie('descuento_name')->withoutCookie('descuento_type');
      }
    }

    if(!is_null($discountCode))
    {
      $freeShipping = $discountCode->free_shipping;
    }

    if ($availableCP == null) return redirect()->back()->with('message', 'invalid cp');
    $shippingAmount = AvailableCP::select('amount')->where('cp', $user->cp)->first()->amount;

    if (!is_null($discountCode)) {
      if ($discountCode->unique == 1) {
        if (count($user->discountCodes) > 0) {
          foreach ($user->discountCodes as $userDiscountCode) {
            if ($userDiscountCode->name == $discountCode->name) {
              return redirect('/carts')->with('discountMessageError', 'Código usado anteriormente')->withoutCookie('descuento')->withoutCookie('descuento_name')->withoutCookie('descuento_type');
            }
          }
        }
      }
      if($discountCode->one_use==1)
      {
        if($discountCode->uses!=0)
        {
          return redirect('/carts')->with('discountMessageError', 'Código usado anteriormente')->withoutCookie('descuento')->withoutCookie('descuento_name')->withoutCookie('descuento_type');
        }
      }
    }

    if (!is_null($request->cookie('descuento'))) {
      if($request->cookie('descuento_type')=='porcentaje'){
        $amount = $cart->total * ((100 - (int)$request->cookie('descuento')) / 100);
      }
      if($request->cookie('descuento_type')=='fijo'){
        $amount = $cart->total - $request->cookie('descuento');
      }
    }

    if($numberProducts < 4){
      return redirect('/carts')->with('message', 'Debe tener 5 platos en el carrito para poder realizar el pedido');
    }

    if($request->cookie('descuento_type') == 'free' AND $numberProducts > 14){
      return redirect('/carts')->with('message', 'Máximo 14 platos para este código');
    }

    if (!is_null($discountCode)) {
      if($discountCode->free_shipping == 0)
      {
        $amount += $shippingAmount;
      }
    } else {
      $amount += $shippingAmount;
    }

    $amount = round($amount, 2);

    return view('web.payments.create')->with(['order' => $order, 'amount' => $amount, 'user' => $user, 'cart' => $cart, 'register' => $register, 'email' => $request->session()->get('email'), 'shipping_amount' => $shippingAmount, 'freeShipping' => $freeShipping]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Order  $order
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request, Order $order)
  {
    $cart = $this->cartService->getFromCookie();
  }
}
