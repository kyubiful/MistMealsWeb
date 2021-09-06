<?php

namespace App\Http\Controllers\Web;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\CartService;
use App\Models\User;
use App\Models\AvailableCP;

class OrderController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cart = $this->cartService->getFromCookie();
        $user = User::findOrFail(auth()->user()->id);

        if (!isset($cart) || $cart->products->isEmpty()) {
            return redirect()->back()->withErrors('Su carrito está vacío');
        }

        return view('web.orders.create')->with(['cart' => $cart, 'user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $user = $request->user();
        $availableCP = AvailableCP::select('cp')->pluck('cp')->toArray();

        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->address = $request->address;
        $user->cp = $request->cp;
        $user->city = $request->city;

        $user->save();

        if($request->invoice_check == null){
            $invoice = false;
        } else if($request->invoice_check=='on'){
            $invoice = true;
        }

        if(in_array($user->cp, $availableCP)==false) {
            return redirect()->back()->with('message','invalid cp');
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
        $orderCookie = cookie('order_id', $order->id, 60*24*30);

        return redirect()->route('web.orders.payments.create', ['order' => $order->id])->cookie($orderCookie);
    }
}
