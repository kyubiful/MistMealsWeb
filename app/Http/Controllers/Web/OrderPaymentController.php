<?php

namespace App\Http\Controllers\Web;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderPaymentController extends Controller
{

    public function __construct()
    {
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
        return view('web.payments.create')->with(['order' => $order]);;
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
        //
    }
}
