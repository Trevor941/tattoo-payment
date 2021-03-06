<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TattooMePaymentMail extends Mailable
{
    use Queueable, SerializesModels;
    public $newestorder;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($newestorder)
    {
        $this->newestorder = $newestorder;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.tattoo.payment');
    }
}
