<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Barryvdh\DomPDF\Facade as PDF;

class MenuMail extends Mailable
{
    use Queueable, SerializesModels;

    public $details;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data = $this->details;

        $pdf = PDF::loadView('pdf.menu', $data)->setPaper('a4', 'landscape');

        return $this->subject('Mist Meals - Menú')
            ->view('emails.menuMail', $data)
            ->attachData($pdf->output(), 'mist-meals-menu.pdf', [
                'mime' => 'application/pdf',
            ]);
    }
}
