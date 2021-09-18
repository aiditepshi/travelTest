<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CreateAgenciesMail extends Mailable
{
    use Queueable, SerializesModels;

    private $agency;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($agency)
    {
        $this->agency = $agency;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('xhuendhysa@gmail.com')->view('mail/emails')->with(['agency'=>
        $this->agency]);
    }
}
