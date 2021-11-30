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
    $this->middleware('user.auth');
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
    $discountCode = DB::table('discount_code')->select('name', 'value', 'start', 'end', 'active', 'unique', 'tipo')->where('name', $descuentoName)->first();
    $user = $request->user();
    $availableCP = AvailableCP::select('cp')->pluck('cp')->toArray();
    $user = User::findOrFail(auth()->user()->id);
    $cart = $this->cartService->getFromCookie();
    $amount = $cart->total;
    $numberProducts = $this->cartService->countProducts();

    if (in_array($user->cp, $availableCP) == false) return redirect()->back()->with('message', 'invalid cp');

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

    return view('web.payments.create')->with(['order' => $order, 'amount' => $amount, 'user' => $user, 'cart' => $cart]);
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