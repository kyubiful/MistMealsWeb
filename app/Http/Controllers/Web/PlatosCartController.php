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
        $cart = $this->cartService->getFromCookieOrCreate();

        $quantity = $cart->products()->find($plato->id)->pivot->quantity ?? 0;

        $cart->products()->syncWithoutDetaching([
            $plato->id => ['quantity' => $quantity + 1],
        ]);

        $cookie = $this->cartService->makeCookie($cart);

        return redirect()->back()->cookie($cookie);
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
