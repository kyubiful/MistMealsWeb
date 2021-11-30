<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Services\CartService;
use Illuminate\Http\Request;

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
        $discount = (int)$request->cookie('descuento');

        if($discount == null){
            $discount = 100;
        }
        $pdf = $this->pdf;

        if($pdf == null){

            return $this->subject('Hemos recibido tu pedido')
            ->view('emails.orderMail')
            ->with('discount', $discount)
            ->with('data', $data);

        } else {
            return $this->subject('Hemos recibido tu pedido')
                ->view('emails.orderMail')
                ->with('data', $data)
                ->with('discount', $discount)
                ->attachData($pdf->output(), 'mist-meals-menu.pdf', [
                    'mime' => 'application/pdf',
            ]);

        }
    }
}
