<?php

namespace App\Http\Controllers\Web;

use App\Models\Order;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\CartService;
use App\Models\AvailableCP;

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
    $user = $request->user();
        $availableCP = AvailableCP::select('cp')->pluck('cp')->toArray();
        if(in_array($user->cp, $availableCP)==false) {
            return redirect()->back()->with('message','invalid cp');
        }

    $user = User::findOrFail(auth()->user()->id);
    $cart = $this->cartService->getFromCookie();

    return view('web.payments.create')->with(['order' => $order, 'amount' => $cart->total, 'user' => $user]);
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
