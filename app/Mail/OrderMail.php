<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Services\CartService;
use Illuminate\Http\Request;
use App\Models\DiscountCode;
use App\Models\AvailableCP;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $details;
    public $cartService;
    public $pdf;

    public function __construct($details, $pdf)
    {
        $this->details=$details;
        $this->pdf=$pdf;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(Request $request)
    {
        $data = $this->details;
        
        if(!is_null($request->user())) {
            $user = $request->user();
        } else {
            $user = $request->session()->get('user');
        }

        $discountName = $request->cookie('descuento_name');

        $shippingAmount = (double)AvailableCP::where('cp', $user->cp)->first()->amount;
        
        $discount = DiscountCode::where('name', $discountName)->first();
        
        if( $discount == null ) {
            $discount = new DiscountCode;
            $discount->name = 'sindescuento';
            $discount->tipo = 'sindescuento';
            $discount->value = null;
        }

        $pdf = $this->pdf;

        if($pdf == null){

            return $this->subject('Hemos recibido tu pedido')
            ->view('emails.orderMail')
            ->with('discount', $discount)
            ->with('data', $data)
            ->with('shippingAmount', $shippingAmount);

        } else {
            return $this->subject('Hemos recibido tu pedido')
                ->view('emails.orderMail')
                ->with('data', $data)
                ->with('discount', $discount)
                ->with('shippingAmount', $shippingAmount)
                ->attachData($pdf->output(), 'mist-meals-menu.pdf', [
                    'mime' => 'application/pdf',
            ]);

        }
    }
}
