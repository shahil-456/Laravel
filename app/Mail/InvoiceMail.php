<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InvoiceMail extends Mailable
{
    use Queueable, SerializesModels;

    public $invoice;

    public function __construct($invoice)
    {
        $this->invoice = $invoice;
    }

    public function build()
    {
        // print_r($this->invoice);die;

        return $this->subject('Invoice Mail')
                    ->view('invoice.email')
                    ->with(['invoice' => $this->invoice]);
    }
}
