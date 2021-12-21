<?php

namespace App\Http\Controllers\Web;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\CartService;
use App\Models\User;
use App\Models\AvailableCP;
use App\Mail\SignUpUserMail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
  public $cartService;

  public function __construct(CartService $cartService)
  {
    $this->cartService = $cartService;
  }
  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create(Request $request)
  {

    $cart = $this->cartService->getFromCookie();
    $descuentoName = $request->cookie('descuento_name');
    $discountCode = DB::table('discount_code')->select('name', 'value', 'start', 'end', 'active', 'unique', 'tipo')->where('name', $descuentoName)->first();

    if($request->user() == null) {

      if(!is_null($discountCode) AND $discountCode->unique == 1){
        return redirect('/carts')->with('discountMessageError', 'Este código no puede ser usado sin estar registrado');
      }

      $user = new User;
      $register = false;

    } else {
      $user = User::findOrFail(auth()->user()->id);
      $register = true;
    }

    $descuentoName = $request->cookie('descuento_name');

    $discountCode = DB::table('discount_code')->select('name', 'value', 'start', 'end', 'active', 'unique')->where('name', $descuentoName)->first();

    if (!isset($cart) || $cart->products->isEmpty()) {
      return redirect()->back()->withErrors('Su carrito está vacío');
    }

    $numberProducts = $this->cartService->countProducts();

    if ($discountCode != null) {
      if ($discountCode->unique == 1) {
        if (count($user->discountCodes) > 0) {
          foreach ($user->discountCodes as $userDiscountCode) {
            if ($userDiscountCode->name == $discountCode->name) {
              return redirect()->back()->with('discountMessageError', 'Código usado anteriormente')->withoutCookie('descuento')->withoutCookie('descuento_name')->withoutCookie('descuento_type');
            }
          }
        }
      }
    }

    if ($numberProducts < 5) {
      return redirect('/carts')->with('message', 'Debe tener 5 platos en el carrito para poder realizar el pedido');
    }

    if($numberProducts > 14 AND $request->cookie('descuento_type') == 'free') {
      return redirect('/carts')->with('message', 'Máximo 14 platos para este código');
    }

    return view('web.orders.create')->with(['cart' => $cart, 'user' => $user, 'register' => $register]);

  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {

    $descuentoName = $request->cookie('descuento_name');
    $discountCode = DB::table('discount_code')->select('name', 'value', 'start', 'end', 'active', 'unique', 'tipo')->where('name', $descuentoName)->first();

    if($request->user() == null) {

      if(!is_null($discountCode) AND $discountCode->unique == 1){
        return redirect('/carts')->with('discountMessageError', 'Este código no puede ser usado sin estar registrado');
      }

      $user = new User;
      $user->email = str::random(10);
      $user->password = bcrypt('t01386hsd125k2n5k');
      $user->role_id = 2;
      $user->name = $request->name;
      $user->surname = $request->surname;
      $user->address = $request->address;
      $user->cp = $request->cp;
      $user->city = $request->city;
      $user->address_number = $request->address_number;
      $user->address_letter = $request->address_letter;
      $user->province = $request->province;
      $user->phone = $request->phone;

      $user->invoice_address = $request->invoice_address;
      $user->invoice_address_number = $request->invoice_address_number;
      $user->invoice_address_letter = $request->invoice_address_letter;
      $user->invoice_nif = $request->invoice_nif;
      $user->invoice_province = $request->invoice_province;
      $user->invoice_city = $request->invoice_city;
      $user->invoice_cp = $request->invoice_cp;

      $register = false;

      if($request->new_account_payment_boolean == 'true') {
        // Checks

        if($request->password == $request->confirm_password) {

          $user->email = $request->email;
          $user->password =  bcrypt($request->password);
          $register = true;


        } else {
          return redirect()->back()->with('error', 'Las contraseñas no coinciden');
        }

        if (User::where('email', $request->email)->exists()) {
            return redirect()->back()->with('error', 'El email ya existe en el sistema!');
        }

        $user->save();

        // Login

        $credentials = $request->only('email','password');

        Auth::attempt($credentials);

        // Send Mail

        $details = [
          'name' => $user->name,
          'email' => $user->email,
          'password' => $user->password
        ];

        try {
          Mail::to($request->email)->send(new SignUpUserMail($details));
        } catch (\Exception $e) {
          dd($e);
        }

      } else {
        session(['email' => $request->email]);
      }

    } else {

      $user = $request->user();
      $register = true;

      $user->name = $request->name;
      $user->surname = $request->surname;
      $user->address = $request->address;
      $user->cp = $request->cp;
      $user->city = $request->city;
      $user->address_number = $request->address_number;
      $user->address_letter = $request->address_letter;
      $user->province = $request->province;
      $user->phone = $request->phone;

      $user->invoice_address = $request->invoice_address;
      $user->invoice_address_number = $request->invoice_address_number;
      $user->invoice_address_letter = $request->invoice_address_letter;
      $user->invoice_nif = $request->invoice_nif;
      $user->invoice_province = $request->invoice_province;
      $user->invoice_city = $request->invoice_city;
      $user->invoice_cp = $request->invoice_cp;



    }

    $user->save();

    $availableCP = AvailableCP::select('cp')->pluck('cp')->toArray();

    session(['userid' => $user->id]);

    if ($request->invoice_check == null) {
      $invoice = false;
    } else if ($request->invoice_check == 'on') {
      $invoice = true;
    }

    if (in_array($user->cp, $availableCP) == false) {
      return redirect()->back()->with('message', 'invalid cp');
    }

    $order = $user->orders()->create(['status' => 'pendiente', 'invoice' => $invoice]);

    $cart = $this->cartService->getFromCookie();

    $cartProductsWithQuantity = $cart
      ->products
      ->mapWithKeys(
        function ($plato) {
          $element[$plato->id] = ['quantity' => $plato->pivot->quantity];
          return $element;
        }
      );

    $order->products()->attach($cartProductsWithQuantity->toArray());
    $orderCookie = cookie('order_id', $order->id, 60 * 24 * 30, '/', env('APP_URL'));
    $userId = cookie('id', $user->id, 60 * 24 * 30, '/', env('APP_URL'));

    return redirect()->route('web.orders.payments.create', ['order' => $order->id])->cookie($orderCookie)->cookie($userId);;
  }
}
