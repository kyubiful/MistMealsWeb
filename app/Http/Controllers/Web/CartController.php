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
        $availableDiscounts = DB::table('discount_code')->select('name', 'value', 'start', 'end', 'active')->get()->toArray();
        $time = Carbon::now()->toDateTimeString();
        //dd($availableDiscounts[0]->start, $time, $availableDiscounts[0]->start<$time);
        for($i=0; $i<count($availableDiscounts); $i++)
        {
            //dd($discount == $availableDiscounts[$i]->name,$availableDiscounts[$i]->start < $time,$availableDiscounts[$i]->end > $time);
            if($discount == $availableDiscounts[$i]->name AND $availableDiscounts[$i]->start < $time AND $availableDiscounts[$i]->end > $time AND $availableDiscounts[$i]->active == 1){
                $cookie = cookie('descuento', $availableDiscounts[$i]->value, 60);
                return redirect()->back()->withCookie($cookie)->with('discountMessageSuccess', 'Código correcto');
            }
        }
        return redirect()->back()->with('discountMessageError', 'Código no válido');
    }

    public function removeDiscountCookie()
    {
        return redirect()->back()->withoutCookie('descuento');
    }
}
