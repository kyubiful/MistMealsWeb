<?php

namespace App\Http\Controllers\Web;

use App\Models\Cart;
use App\Models\Plato;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Services\CartService;

class PlatosCartController extends Controller
{
    public $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Plato  $plato
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Plato $plato)
    {
        $plateQuantity = $request->plateQuantity;
        if($plateQuantity<0){
            return redirect()->back()->with('message','<0');
        }

        $cart = $this->cartService->getFromCookieOrCreate();

        $quantity = $cart->products()->find($plato->id)->pivot->quantity ?? 0;

        $cart->products()->syncWithoutDetaching([
            $plato->id => ['quantity' => $quantity + $plateQuantity],
        ]);

        $infoName = $cart->products()->find($plato->id)->nombre;
        $infoPrice = $cart->products()->find($plato->id)->precio;
        $totalPrice = $infoPrice * $plateQuantity;

        $cookie = $this->cartService->makeCookie($cart);

        return response()->json([
            'status' => 500,
            'message' => 'test',
            'infoPrice' => $infoPrice,
            'infoName' => $infoName,
            'itemQuantity' => $plateQuantity
        ])->withCookie($cookie);

        // return redirect()->back()->cookie($cookie)->with('itemName',$infoName)->with('infoPrice', $totalPrice)->with('itemQuantity', $plateQuantity);
    }

    public function remove(Request $request, Plato $plato)
    {
        $plateQuantity = $request->plateQuantity;
        if($plateQuantity<0){
            return redirect()->back()->with('message','<0');
        }

        $cart = $this->cartService->getFromCookieOrCreate();

        $quantity = $cart->products()->find($plato->id)->pivot->quantity ?? 0;

        if($quantity-(int)$plateQuantity <= 0){
            $cart->products()->detach($plato->id);
            $cookie = $this->cartService->makeCookie($cart);

            return response()->json([
                'status' => 500,
                'message' => 'test',
                'itemQuantity' => $plateQuantity
            ])->withCookie($cookie);
        }

        $cart->products()->syncWithoutDetaching([
            $plato->id => ['quantity' => $quantity - (int)$plateQuantity],
        ]);

        $infoName = $cart->products()->find($plato->id)->nombre;
        $infoPrice = $cart->products()->find($plato->id)->precio;
        $totalPrice = $infoPrice * $plateQuantity;

        $cookie = $this->cartService->makeCookie($cart);

        return response()->json([
            'status' => 500,
            'message' => 'test',
            'itemQuantity' => $plateQuantity
        ])->withCookie($cookie);

        // return redirect()->back()->cookie($cookie)->with('itemName',$infoName)->with('infoPrice', $totalPrice)->with('itemQuantity', $plateQuantity);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plato  $plato
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plato $plato, Cart $cart)
    {
        $cart->products()->detach($plato->id);

        $cookie = $this->cartService->makeCookie($cart);

        return redirect()->back()->cookie($cookie);
    }
}
