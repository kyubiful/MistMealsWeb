<?php

namespace App\Http\Controllers\Web;

use App\Models\Order;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\CartService;

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
  public function create(Order $order)
  {

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

    $Ds_MerchanParameters = array(
      'DS_MERCHANT_AMOUNT' => $cart->total,
      'DS_MERCHANT_CURRENCY' => 978,
      "DS_MERCHANT_MERCHANTCODE" => 326251592,
      "DS_MERCHANT_ORDER" => 202100001,
      "DS_MERCHANT_TERMINAL" => 1,
      "DS_MERCHANT_TRANSACTIONTYPE" => 0,

    );

    $Ds_SignatureVersion = 'HMAC_SHA256_V1';

    $Ds_Signature = 'sq7HjrUOBfKmC576ILgskD5srU870gJ7';
    $Ds_Signature = base64_encode($Ds_Signature);

    $Ds_MerchanParameters = json_encode($Ds_MerchanParameters);
    $Ds_MerchanParameters = base64_encode($Ds_MerchanParameters);

    // dump($cart->total);
    // dump($order);
    // dump($Ds_SignatureVersion);
    // dump($Ds_MerchanParameters);
    // dump($Ds_Signature);
    // dd($request);
    // dd('fin');

    return redirect('https://sis-t.redsys.es:25443/sis/realizarPago')->with(['Ds_SignatureVersion' => $Ds_SignatureVersion, 'Ds_MerchantParameters' => $Ds_MerchanParameters, 'Ds_Signature' => $Ds_Signature]);
  }
}
