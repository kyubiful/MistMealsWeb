<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Services\CartService;

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
    public function build()
    {
        $data = $this->details;
        $pdf = $this->pdf;

        if($pdf == null){

            return $this->subject('Hemos recibido tu pedido')
            ->view('emails.orderMail')
            ->with('data', $data);

        } else {
            return $this->subject('Hemos recibido tu pedido')
                ->view('emails.orderMail')
                ->with('data', $data)
                ->attachData($pdf->output(), 'mist-meals-menu.pdf', [
                    'mime' => 'application/pdf',
            ]);

        }
    }
}
